<?php
require('db1.php');
header('Content-Type: application/json; charset=utf-8');

// ✅ Optional browser cache (faster repeated searches)
header("Cache-Control: public, max-age=60");

$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$q = preg_replace('/\s+/', ' ', $q);
$q_safe = mysqli_real_escape_string($con, $q);

$out = [];

// ✅ Don't query for very small input
if ($q === '' || strlen($q) < 2) {
    echo json_encode($out);
    exit;
}

$isNumeric = ctype_digit(str_replace(' ', '', $q));

// ------------------------------------------
// ✅ SEARCH QUERY (CCU + stock > 0 only)
// ------------------------------------------

if ($isNumeric) {
    // Faster numeric search
    $sql = "
        SELECT ps.sno, ps.code, ps.add_qty, hl.item_name
        FROM purchase_stock3 ps
        LEFT JOIN hits_list hl ON hl.code = ps.code
        WHERE ps.location = 'ccu'
          AND ps.add_qty > 0
          AND (
                ps.sno LIKE '{$q_safe}%'
             OR ps.code LIKE '{$q_safe}%'
          )
        ORDER BY ps.sno DESC
        LIMIT 20
    ";
} else {
    // Text search
    $sql = "
        SELECT ps.sno, ps.code, ps.add_qty, hl.item_name
        FROM purchase_stock3 ps
        LEFT JOIN hits_list hl ON hl.code = ps.code
        WHERE ps.location = 'ccu'
          AND ps.add_qty > 0
          AND (
                ps.code LIKE '{$q_safe}%'
             OR hl.item_name LIKE '%{$q_safe}%'
          )
        ORDER BY ps.sno DESC
        LIMIT 20
    ";
}

$res = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($res)) {

    $itemName = $row['item_name'] ?? '';
    $qty = (int)($row['add_qty'] ?? 0);

    $out[] = [
        'id'        => $row['sno'],  // this is medi6
        'text'      => $row['sno'].' | '.$row['code'].' | '.$itemName,
        'item_name' => $itemName,
        'qty'       => $qty,
    ];
}

echo json_encode($out);