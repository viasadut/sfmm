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

//$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$bar=$_REQUEST['bar'];
//$pname=$_REQUEST['pname'];
//$rinfusion=$_REQUEST['rinfusion'];
$nn=date('Y-m-d');
//$pdf->ln(10);
//$code=$pmrn;
//$code='123456789';




//$pdf->Write(1.2,$sid);
//$pdf->SetXY(10,1.6);


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query1 = mysqli_query($db,"select * from medi_stock where id='$id'");

while($data1 = mysqli_fetch_array($query1))
{
	
$pdf->AddPage('L','cbar1');
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
$pdf->SetXY(1,1);
//$pdf->SetXY(23,1);
$pdf->Cell('5',2,$data1['sno'],0,0,'L');

$pdf->SetXY(23.5,1);
$pdf->SetFont('Arial' , '' , 4.5);
$pdf->Cell('5',2,'EX-'.$data1['exdate'],0,1,'L');
//$pdf->Cell('5',2,$data1['barcode'],0,0,'L');
$pdf->SetXY(1,3.4);
$pdf->SetFont('Arial' , '' , 4.5);
if($data1['location1']==''){
$pdf->Cell('5',1,$data1['location'].'-'.$data1['code'].'      BNO-'.$data1['batch_no'],0,1,'L');}

else{
$pdf->Cell('5',1,$data1['location1'].'-'.$data1['code'].'     BNO-'.$data1['batch_no'],0,1,'L');}
$pdf->SetXY(1,5);
$pdf->SetFont('Arial' , '' , 4.5);
$pdf->Cell('50',1,'Qty-'.$data1['add_qty'],0,1);


$pdf->SetXY(1,6.5);
$pdf->SetFont('Arial' , '' , 4.5);
$pdf->Cell('50',1,$data1['g_name'],0,1);
$pdf->SetXY(1,7.5);
$pdf->Code128(1,9,$data1['sno'],35,15);
//$pdf->ln(10);
}












$pdf->Output();

?>