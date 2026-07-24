<?php

//require('code128.php');
require('force_justify1.php');





//$pdf1->AddPage();
$pdf=new PDF_Code128();


$pdf->AliasNbPages();
$pdf->AddPage('L','cbar',0);
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 13);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);

//$pdf1->AddPage();
//$pdf1->SetFont('Arial','',10);

$g_name=$_REQUEST['g_name'];
$rfid=$_REQUEST['rfid'];

//$pdf->ln(10);
$code=$rfid;
//$code1=$eid;
$pdf->SetXY(10,1);

//$pdf->SetXY(1,3.7);
//$pdf->Write(2,$cname);

$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('13',2,$rfid,0,1,'C');
$pdf->SetXY(1,3.69);
$pdf->SetFont('Arial' , 'b' , 5);
$pdf->Cell('5',1,$g_name,0,1,'L');


//$pdf->Write(1.2,$sid);

$pdf->Code128(5,5.5,$code,25,8);
//$pdf->SetXY(10,1.6);


$pdf->Output();

?>