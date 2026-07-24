<?php
require('force_justify.php');
$pname=$_REQUEST['pname'];

$db = mysqli_connect('localhost','root','');
mysqli_select_db($db,'sfmmkpj');
$query = mysqli_query($db,"select * from pres where pname='$pname'");
$data = mysqli_fetch_array($query);


$pdf = new FPDF('p', 'mm' , 'A4');
$pdf->AddPage();
$pdf->Image('logo.jpg',10,2);
$pdf->Image('logo1.jpg',170,2);
$pdf->ln(40);
$pdf->SetFillColor(0,180,200);
$pdf->SetFont('Arial' , 'b' , 10);

//$pdf->Cell('30' , 5,'Investigation',1,0);
//$pdf->MultiCell('160' , 5,$data1['medi'],1,1);


$pdf->Cell('30' , 5,'Investigation',1,1);
$pdf->MultiCell('160' , 5,$data['xl'],1,1);


$pdf->Cell('30' , 5,'date',1,1);
$pdf->MultiCell('160' , 5,$data['date'],1,1);

$query1 = mysqli_query($db,"select * from pmedi where pmrn='99779'");

while($data1 = mysqli_fetch_array($query1))
{


$pdf->MultiCell('160', 5,$data1['medi'],1,1);
}

//$pdf->MultiCell('200' , 5,$data['m1']. "-" .$data['d1'],0,1);
//$pdf->ln(1);


$pdf->Cell('30' , 5,'Doasge',1,1);
$pdf->MultiCell('160' , 5,'jashfjh sjfh jsdhfjsdhjfh jsdhjf hjsdhfj dsjhf djsh jfdshjf dsjhf jdsh fdhsf hjsdhf sdhf jdhsf hdsjfhjsdhf sdhf jdshjfhjskdhf jsdh fjhsdjkf hjdsfjd s',1,1);
$pdf->ln(10);

$pdf->Output();
?>
