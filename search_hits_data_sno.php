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
  item_type:
  - STOCK   => sno-wise from purchase_stock3 (qty/location)
  - PACKAGE => from set_package (no stock)
  - NOSTOCK => from hits_list (no stock)
*/

$sql = "
(
  /* ✅ STOCK (SNO wise) */
  SELECT
    hl.id AS item_id,
    hl.item_name,
    hl.code,
    ps.sno,
    ps.add_qty AS qty,
    UPPER(ps.location) AS location,
    'STOCK' AS item_type
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
  /* ✅ PACKAGE (show even without stock) */
  SELECT
    hl.id AS item_id,
    hl.item_name,
    hl.code,
    '' AS sno,
    0  AS qty,
    'PACKAGE' AS location,
    'PACKAGE' AS item_type
  FROM set_package sp
  JOIN hits_list hl ON hl.item_name = sp.iname
  WHERE sp.iname LIKE '%$searchSafe%'
     OR hl.item_name LIKE '%$searchSafe%'
     OR hl.code LIKE '%$searchSafe%'
)
UNION
(
  /* ✅ NO STOCK (hits_list only, exclude packages) */
  SELECT
    hl.id AS item_id,
    hl.item_name,
    hl.code,
    '' AS sno,
    0  AS qty,
    'NO STOCK' AS location,
    'NOSTOCK' AS item_type
  FROM hits_list hl
  WHERE (
      hl.item_name LIKE '%$searchSafe%'
      OR hl.code LIKE '%$searchSafe%'
  )
  AND NOT EXISTS (
      SELECT 1 FROM set_package sp WHERE sp.iname = hl.item_name
  )
)
ORDER BY item_name ASC, item_type ASC, sno ASC
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
  $loc     = $row['location'];
  $type    = strtoupper($row['item_type']);

  $key = $item_id.'|'.$type.'|'.$sno.'|'.$loc;
  if(isset($seen[$key])) continue;
  $seen[$key] = true;

  if($type === 'STOCK'){
    $label = "{$name} ({$code}) | [STOCK] SNO: {$sno} | Qty: {$qty} | Loc: {$loc}";
  } elseif($type === 'PACKAGE'){
    $label = "{$name} ({$code}) | [PACKAGE] no stock check";
  } else {
    $label = "{$name} ({$code}) | [NO STOCK]";
  }

  $data[] = [
    "id" => $item_id,
    "text" => $label,
    "item_name" => $name,
    "code" => $code,
    "sno" => $sno,
    "qty" => ($type === 'STOCK') ? $qty : "",
    "location" => $loc,
    "item_type" => $type
  ];
}

echo json_encode($data);