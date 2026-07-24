<?php
require('ena13.php');

$pdf=new PDF_EAN13();
$pdf->AddPage();
$pdf->EAN13(10,10,'123456789012',9,.26);
$pdf->Output();
?>