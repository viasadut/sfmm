<?php
require('force_justify.php');

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from pres where pname='dias adman'");
$data = mysqli_fetch_array($query);
$pdf = new FPDF('p', 'mm' , 'A4');
$pdf->AddPage();
$pdf->Image('logo.jpg',10,2);
$pdf->Image('logo1.jpg',170,2);
$pdf->ln(40);
$pdf->SetFillColor(0,180,200);
$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('30' , 5,'Investigation',1,0);
$pdf->MultiCell('160' , 5,$data['xl'],1,1);

$pdf->Cell('30' , 5,'Medicine',1,0);
$pdf->multiCell('160' , 5,$data['d1']. "," .$data['m1'].",".$data['m2']." ,".$data['dname']. "," .$data['pname'].",".$data['pphone'],1,1);

$pdf->Cell('30' , 5,'Doasge',1,0);
$pdf->MultiCell('160' , 5,'jashfjh sjfh jsdhfjsdhjfh jsdhjf hjsdhfj dsjhf djsh jfdshjf dsjhf jdsh fdhsf hjsdhf sdhf jdhsf hdsjfhjsdhf sdhf jdshjfhjskdhf jsdh fjhsdjkf hjdsfjd s',1,1);

$pdf->Cell('30' , 5,'Medicine',1,0);
$pdf->Cell('160' , 5,$data['m2'],1,1);

$pdf->Cell('190' , 5,'Doasge',1,1);
$pdf->MultiCell('190' , 5,$data['d1']. "," .$data['m1'].",".$data['m2']." ,".$data['dname']. "," .$data['pname'].",".$data['pphone'],1,1);

$pdf->Cell('190' , 5,'Doasge',1,1);
$pdf->MultiCell('190' , 5,$data['d1']. "," .$data['m1'].",".$data['m2']." ,".$data['dname']. "," .$data['pname'].",".$data['pphone'],1,1);


$pdf->Cell('190' , 5,'Doasge',1,1);
$pdf->MultiCell('190' , 5,$data['d1']. "," .$data['m1'].",".$data['m2']." ,".$data['dname']. "," .$data['pname'].",".$data['pphone'],1,1);


$pdf->Cell('190' , 5,'Doasge',1,1);
$pdf->MultiCell('190' , 5,$data['d1']. "," .$data['m1'].",".$data['m2']." ,".$data['dname']. "," .$data['pname'].",".$data['pphone'],1,1);


$pdf->Cell('190' , 5,'Doasge',1,1);
$pdf->MultiCell('190' , 5,$data['d1']. "," .$data['m1'].",".$data['m2']." ,".$data['dname']. "," .$data['pname'].",".$data['pphone'].",".$data['m3']. "," .$data['m4'].",".$data['m5']." ,".$data['m6']. "," .$data['m7'].",".$data['m8'],1,1);


$pdf->Cell('30' , 5,'Medicine2',1,0);
$pdf->multiCell('160' , 5,$data['d1']. "," .$data['m1'].",".$data['m2']." ,".$data['dname']. "," .$data['pname'].",".$data['pphone'],1,1);

$pdf->Cell('30' , 5,'Medicine3',1,0);
$pdf->multiCell('160' , 5,$data['d1']. "," .$data['m1'].",".$data['m2']." ,".$data['dname']. "," .$data['pname'].",".$data['pphone'],1,1);

$pdf->Cell('190' , 5,'Doasge2',1,1);
$pdf->MultiCell('190' , 5,$data['d1']. "," .$data['m1'].",".$data['m2']." ,".$data['dname']. "," .$data['pname'].",".$data['pphone'].",".$data['m3']. "," .$data['m4'].",".$data['m5']." ,".$data['m6']. "," .$data['m7'].",".$data['m8'],1,1);



$pdf->Output();
?>
