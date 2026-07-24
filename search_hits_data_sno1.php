<?php
require('db1.php'); // provides $con (mysqli)

header('Content-Type: application/json; charset=utf-8');

$term = $_POST['searchTerm'] ?? '';
$term = trim($term);

if ($term === '' || mb_strlen($term) < 2) {
  echo json_encode([]);
  exit;
}

$termSafe = mysqli_real_escape_string($con, $term);

$results = [];

/* =========================================================
   1) STOCK ITEMS (sno + location + qty)
   - join purchase_stock3 with hits_list by code
   ========================================================= */
$sqlStock = "
  SELECT
    hl.id AS hit_id,
    hl.item_name,
    hl.code,
    ps.sno,
    ps.location,
    ps.add_qty AS qty
  FROM purchase_stock3 ps
  INNER JOIN hits_list hl ON hl.code = ps.code
  WHERE (hl.item_name LIKE '%$termSafe%' OR hl.code LIKE '%$termSafe%')
    AND ps.add_qty IS NOT NULL
  ORDER BY hl.item_name ASC
  LIMIT 30
";
$qStock = mysqli_query($con, $sqlStock);

if ($qStock) {
  while ($r = mysqli_fetch_assoc($qStock)) {
    $results[] = [
      "id"        => $r["hit_id"],                  // ✅ hits_list.id goes to form select
      "text"      => $r["item_name"],               // ✅ select2 needs text
      "item_name" => $r["item_name"],
      "code"      => $r["code"],
      "location"  => $r["location"],
      "qty"       => (int)$r["qty"],
      "sno"       => $r["sno"],
      "item_type" => "STOCK"
    ];
  }
}

/* =========================================================
   2) PACKAGE ITEMS
   - item is package if exists in set_package.iname
   ========================================================= */
$sqlPackage = "
  SELECT
    hl.id AS hit_id,
    hl.item_name,
    hl.code
  FROM hits_list hl
  INNER JOIN set_package sp ON sp.iname = hl.item_name
  WHERE (hl.item_name LIKE '%$termSafe%' OR hl.code LIKE '%$termSafe%')
  GROUP BY hl.id
  ORDER BY hl.item_name ASC
  LIMIT 20
";
$qPack = mysqli_query($con, $sqlPackage);

if ($qPack) {
  while ($r = mysqli_fetch_assoc($qPack)) {
    $results[] = [
      "id"        => $r["hit_id"],
      "text"      => $r["item_name"],
      "item_name" => $r["item_name"],
      "code"      => $r["code"],
      "location"  => "",
      "qty"       => null,
      "sno"       => "",
      "item_type" => "PACKAGE"
    ];
  }
}

/* =========================================================
   3) NO-STOCK ITEMS
   - from hits_list that are NOT package
   - (and not duplicated by stock results)
   ========================================================= */
$sqlNoStock = "
  SELECT
    hl.id AS hit_id,
    hl.item_name,
    hl.code
  FROM hits_list hl
  LEFT JOIN set_package sp ON sp.iname = hl.item_name
  WHERE (hl.item_name LIKE '%$termSafe%' OR hl.code LIKE '%$termSafe%')
    AND sp.id IS NULL
  ORDER BY hl.item_name ASC
  LIMIT 50
";
$qNo = mysqli_query($con, $sqlNoStock);

if ($qNo) {
  while ($r = mysqli_fetch_assoc($qNo)) {
    $results[] = [
      "id"        => $r["hit_id"],
      "text"      => $r["item_name"],
      "item_name" => $r["item_name"],
      "code"      => $r["code"],
      "location"  => "",
      "qty"       => null,
      "sno"       => "",
      "item_type" => "NOSTOCK"
    ];
  }
}

/* ✅ optional: remove duplicates (same id + type + sno + location) */
$uniq = [];
$out = [];
foreach ($results as $row) {
  $k = ($row["id"] ?? '') . "|" . ($row["item_type"] ?? '') . "|" . ($row["sno"] ?? '') . "|" . ($row["location"] ?? '');
  if (!isset($uniq[$k])) {
    $uniq[$k] = 1;
    $out[] = $row;
  }
}

echo json_encode($out);