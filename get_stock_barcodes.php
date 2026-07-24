<?php
// ===============================
// FILE: get_stock_barcodes.php
// Put this in the SAME folder
// ===============================
session_start();
require('db1.php');

header('Content-Type: application/json');

$code = $_GET['code'] ?? '';
$code = trim($code);

if ($code === '') {
  echo json_encode([]);
  exit;
}

$stmt = $con->prepare("
  SELECT rfid, g_name
  FROM medi_stock
  WHERE code = ?
    AND location = 'Pharmacy'
    AND add_qty > 0
  ORDER BY exdate ASC, id ASC
");
$stmt->bind_param("s", $code);
$stmt->execute();
$res = $stmt->get_result();

$out = [];
while ($r = $res->fetch_assoc()) {
  $out[] = [
    "rfid"  => $r["rfid"],
    "label" => $r["rfid"] . " (" . $r["g_name"] . ")"
  ];
}

echo json_encode($out);