<?php

require('code128.php');
//require('force_justify1.php');

require('db1.php');

$dd=date('d/m/Y');
$retime=date('Y-m-d');

//$pdf1->AddPage();
$pdf=new PDF_Code128();



//$pdf->AliasNbPages();

//$pdf->SetXY(1,1);
//$pdf->SetXY(23,1);
//$pdf->SetXY(1,3.8);
//$pdf->SetXY(1,6.3);
//$pdf->headerTable();
//$pdf->viewTable($db);

//$pdf1->AddPage();
//$pdf1->SetFont('Arial','',10);

//$barcode=$_REQUEST['barcode'];
//$eid=$_REQUEST['eid'];
//$bar=$_REQUEST['bar'];
//$pname=$_REQUEST['pname'];
//$rinfusion=$_REQUEST['rinfusion'];
$dd=date('d/m/Y');
//$pdf->ln(10);
//$code=$pmrn;
//$code='123456789';




//$pdf->Write(1.2,$sid);
//$pdf->SetXY(10,1.6);


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

/*$query1 = mysqli_query($db,"select * from alltest where barcode1='$barcode' and type='lab' and billstatus='Billed'");

while($data1 = mysqli_fetch_array($query1))
{*/
	
$pdf->AddPage('L','cbar13');
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Courier' , 'b' , 14);
$pdf->SetLeftMargin('17');

//$pdf->SetXY(23,1);

$image1='asset_qr.jpg';

//$pdf->Cell('5',2,$data1['barcode'],0,0,'L');


$pdf->SetFont('Courier' , 'b' , 20);

//$pdf->Cell( 30, 10, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 10.78), 0, 0, 'L', false );
$pdf->Image('asset_qr.jpg',12,1,23,23);

//$pdf->ln(10);













$pdf->Output();

?>