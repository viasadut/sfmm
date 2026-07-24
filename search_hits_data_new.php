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
✅ Goal:
- Show ONLY items that exist in purchase_stock3 with location='ccu'
- And map them to hits_list.id so your insert code works (SELECT * FROM hits_list WHERE id='$medi6')
*/

$sql = "
SELECT DISTINCT
  hl.id,
  hl.item_name,
  hl.code
FROM purchase_stock3 ps
JOIN hits_list hl ON hl.code = ps.code
WHERE ps.location = 'ccu'
  AND ps.add_qty > 0
  AND (
      hl.item_name LIKE '%$searchSafe%'
      OR hl.code LIKE '$searchSafe%'
      OR ps.sno LIKE '$searchSafe%'
  )
ORDER BY hl.item_name ASC
LIMIT 20
";

$res = mysqli_query($con, $sql);
$data = [];

while ($row = mysqli_fetch_assoc($res)) {
  $data[] = [
    "id"   => $row['id'], // ✅ your PHP uses hits_list.id
    "text" => $row['item_name'] . " (" . $row['code'] . ")"
  ];
}

echo json_encode($data);