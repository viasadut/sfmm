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


$id=$_REQUEST['id'];
//$bar=$_REQUEST['bar'];
//$pname=$_REQUEST['pname'];
//$rinfusion=$_REQUEST['rinfusion'];
$dd=date('Y-m-d');
//$pdf->ln(10);
//$code=$pmrn;
//$code='123456789';




//$pdf->Write(1.2,$sid);
//$pdf->SetXY(10,1.6);


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query1 = mysqli_query($db,"select * from alltest where id='$id' and billstatus='Billed' and type='lab' and rstatus ='Received'");

while($data1 = mysqli_fetch_array($query1))
{
	
$pdf->AddPage('L','cbar1');
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 8);
$pdf->SetLeftMargin('17');
$pdf->SetXY(1,1);
//$pdf->SetXY(23,1);
$pdf->Cell('5',2,$data1['barcode1'],0,0,'L');

$pdf->SetXY(25,1);
$pdf->SetFont('Arial' , 'b' , 5);
$pdf->Cell('5',2,'DT-'.$data1['date1'],0,1,'L');
//$pdf->Cell('5',2,$data1['barcode'],0,0,'L');
$pdf->SetXY(1,3.4);
$pdf->SetFont('Arial' , '' , 5);
$pdf->Cell('5',1,$data1['pname'],0,1,'L');
$pdf->SetFont('Arial' , 'b' , 8);
$pdf->SetXY(1,5);
$pdf->SetFont('Arial' , 'b' , 5);
$pdf->Cell('30',1,$data1['pmrn'],0,0,'L');

$pdf->SetXY(1,6.5);
$pdf->SetFont('Arial' , '' , 5);
$pdf->Cell('30',1,$data1['medi'],0,0,'L');
$pdf->SetXY(1,7.5);
$pdf->Code128(1,9,$data1['barcode1'],35,15);
//$pdf->ln(10);
}












$pdf->Output();

?>