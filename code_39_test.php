<?php
require('code_39.php');

$pdf=new PDF_Code39();
$pdf->AddPage();
$pdf->Code39(80,40,'123456',.6,10);
$pdf->Output();
?>