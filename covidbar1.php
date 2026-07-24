<?php

//require('code128.php');
require('force_justify1.php');





//$pdf1->AddPage();
$pdf=new PDF_Code128();


$pdf->AliasNbPages();
$pdf->AddPage('L','cbar',0);
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);

//$pdf1->AddPage();
//$pdf1->SetFont('Arial','',10);

$sid=$_REQUEST['sid'];
//$cname=$_REQUEST['cname'];

//$pdf->ln(10);
$code=$sid;
//$code1=$eid;
$pdf->SetXY(10,10);
$pdf->Code128(5,7.5,$code,25,8);

$pdf->SetFont('Arial' , 'b' , 14.8);
$pdf->SetXY(10,1);
$pdf->Write(3,$sid);



$pdf->Output();

?>