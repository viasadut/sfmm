<?php
require('db1.php'); // must provide $con (mysqli)

header('Content-Type: application/json; charset=utf-8');

// ✅ TEMP DEBUG (turn on only while testing)
ini_set('display_errors', 0);
error_reporting(E_ALL);

$term = trim($_POST['searchTerm'] ?? '');
if ($term === '' || mb_strlen($term) < 2) {
  echo json_encode([]);
  exit;
}

if (!isset($con) || !$con) {
  echo json_encode([]);
  exit;
}

mysqli_set_charset($con, 'utf8mb4');

$termLike = '%' . $term . '%';
$termLikeEsc = mysqli_real_escape_string($con, $termLike);

/* ✅ Allowed STOCK locations (must be LOWER to match LOWER(TRIM(location))) */
$allowedStockLocs = [
  '5th floor block ab',
  '5th floor block cd',
  '6th floor block (a+b)',
  '6th floor block c',
  '6th floor block d',
  'ccu',
  'dialysis',
  'hmd unit',
  'icu',
  'ipd',
  'ipd-gynae',
  'ipd-pedi',
  'nicu',
  'nursing services',
  'medical icu',
  'surgical icu',
  'hdu'
];

$allowedStockLocsLower = array_map(function($x){
  return strtolower(trim($x));
}, $allowedStockLocs);

$locIn = "'" . implode("','", array_map(function($v) use ($con){
  return mysqli_real_escape_string($con, $v);
}, $allowedStockLocsLower)) . "'";

$out = [];

/* ============================================================
   1) STOCK (hits_list + purchase_stock3)
   ✅ SEARCH BY: item_name / code / sno / location
   ============================================================ */
$sqlStock = "
  SELECT 
    hl.id AS id,
    hl.item_name,
    hl.code,
    ps.sno,
    LOWER(TRIM(ps.location)) AS location,
    ps.add_qty AS qty
  FROM purchase_stock3 ps
  INNER JOIN hits_list hl ON hl.code = ps.code
  WHERE LOWER(TRIM(ps.location)) IN ($locIn)
    AND (
      hl.item_name LIKE '$termLikeEsc'
      OR hl.code LIKE '$termLikeEsc'
      OR ps.sno LIKE '$termLikeEsc'
      OR ps.location LIKE '$termLikeEsc'
    )
  ORDER BY
    (ps.sno LIKE '$termLikeEsc') DESC,
    (hl.code LIKE '$termLikeEsc') DESC,
    hl.item_name ASC
  LIMIT 50
";

$resStock = mysqli_query($con, $sqlStock);
if ($resStock) {
  while ($r = mysqli_fetch_assoc($resStock)) {
    $out[] = [
      "id"        => $r["id"],          // hits_list.id (your form expects this)
      "text"      => $r["item_name"],
      "item_name" => $r["item_name"],
      "code"      => $r["code"],
      "item_type" => "STOCK",
      "sno"       => $r["sno"],
      "location"  => $r["location"],
      "qty"       => (int)$r["qty"],
    ];
  }
}

/* ============================================================
   2) PACKAGE (set_package + hits_list)
   ============================================================ */
$sqlPkg = "
  SELECT DISTINCT hl.id, hl.item_name, hl.code
  FROM set_package sp
  INNER JOIN hits_list hl ON hl.item_name = sp.iname
  WHERE sp.iname LIKE '$termLikeEsc'
     OR hl.item_name LIKE '$termLikeEsc'
     OR hl.code LIKE '$termLikeEsc'
  ORDER BY hl.item_name ASC
  LIMIT 30
";
$resPkg = mysqli_query($con, $sqlPkg);
if ($resPkg) {
  while ($r = mysqli_fetch_assoc($resPkg)) {
    $out[] = [
      "id"        => $r["id"],
      "text"      => $r["item_name"],
      "item_name" => $r["item_name"],
      "code"      => $r["code"],
      "item_type" => "PACKAGE",
      "sno"       => "",
      "location"  => "",
      "qty"       => null,
    ];
  }
}

/* ============================================================
   3) NO STOCK (hits_list only)
   ============================================================ */
$seen = [];
foreach ($out as $x) {
  if (!empty($x['id'])) $seen[(string)$x['id']] = true;
}

$sqlNo = "
  SELECT id, item_name, code
  FROM hits_list
  WHERE item_name LIKE '$termLikeEsc'
     OR code LIKE '$termLikeEsc'
  ORDER BY item_name ASC
  LIMIT 60
";
$resNo = mysqli_query($con, $sqlNo);
if ($resNo) {
  while ($r = mysqli_fetch_assoc($resNo)) {
    $idStr = (string)$r['id'];
    if (isset($seen[$idStr])) continue;

    $out[] = [
      "id"        => $r["id"],
      "text"      => $r["item_name"],
      "item_name" => $r["item_name"],
      "code"      => $r["code"],
      "item_type" => "NOSTOCK",
      "sno"       => "",
      "location"  => "",
      "qty"       => null,
    ];
  }
}

echo json_encode($out);