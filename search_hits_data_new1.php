<?php
require('db1.php');
header('Content-Type: application/json; charset=utf-8');

$search = $_POST['searchTerm'] ?? '';
$search = trim(preg_replace('/\s+/', ' ', $search));

if ($search === '' || strlen($search) < 2) {
  echo json_encode([]);
  exit;
}

$searchSafe = mysqli_real_escape_string($con, $search);

/*
  PART A: Stock items (SNO wise) -> includes location
  PART B: Package items -> no stock required, location="PACKAGE"
*/
$sql = "
(
  SELECT
    hl.id AS item_id,
    hl.item_name,
    hl.code,
    ps.sno,
    ps.add_qty AS qty,
    ps.location,
    (SELECT COUNT(*) FROM set_package sp WHERE sp.iname = hl.item_name) AS is_package
  FROM purchase_stock3 ps
  JOIN hits_list hl ON hl.code = ps.code
  WHERE ps.add_qty > 0
    AND (
      hl.item_name LIKE '%$searchSafe%'
      OR hl.code LIKE '%$searchSafe%'
      OR ps.sno LIKE '%$searchSafe%'
      OR ps.location LIKE '%$searchSafe%'
    )
)
UNION
(
  SELECT
    hl.id AS item_id,
    hl.item_name,
    hl.code,
    '' AS sno,
    0  AS qty,
    'PACKAGE' AS location,
    1  AS is_package
  FROM set_package sp
  JOIN hits_list hl ON hl.item_name = sp.iname
  WHERE sp.iname LIKE '%$searchSafe%'
     OR hl.item_name LIKE '%$searchSafe%'
     OR hl.code LIKE '%$searchSafe%'
)
ORDER BY item_name ASC, sno ASC
LIMIT 80
";

$res = mysqli_query($con, $sql);

$data = [];
$seen = [];

while ($row = mysqli_fetch_assoc($res)) {

  $item_id = $row['item_id'];
  $name    = $row['item_name'];
  $code    = $row['code'];
  $sno     = $row['sno'];
  $qty     = (int)$row['qty'];
  $loc     = strtoupper($row['location']);
  $is_pack = ((int)$row['is_package'] > 0) ? 1 : 0;

  $stock_required = $is_pack ? 0 : 1;

  $key = $item_id . '|' . $sno . '|' . $loc;
  if(isset($seen[$key])) continue;
  $seen[$key] = true;

  if($is_pack){
    $label = "{$name} ({$code}) | (PACKAGE - no stock check)";
  } else {
    $label = "{$name} ({$code}) | SNO: {$sno} | Stock: {$qty} | Location: {$loc}";
  }

  $data[] = [
    "id" => $item_id,
    "text" => $label,
    "item_name" => $name,
    "code" => $code,
    "sno" => $sno,
    "qty" => $is_pack ? "" : $qty,
    "location" => $loc,
    "is_package" => $is_pack,
    "stock_required" => $stock_required
  ];
}

echo json_encode($data);