<?php


require('WriteHTML.php');





//require('html2pdf.php');
$start=date('Y-m-d',strtotime($_REQUEST["start"]));
$end=date('Y-m-d',strtotime($_REQUEST["end"]));


$start1=date('d/m/Y',strtotime($_REQUEST["start"]));
$end1=date('d/m/Y',strtotime($_REQUEST["end"]));

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');





$pdf = new PDF_HTML();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('22');
//$pdf->headerTable();
//$pdf->viewTable($db);






$pdf->Image('logo.jpg',15,7);
$pdf->Image('logo1.jpg',180,7);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(170,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$pdf->Ln(3);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(165,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$pdf->ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(165,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$pdf->ln(15);


$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('183',6,'LAB INVESTIGATION RECORD (INPATIENT)',0,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(2);



$pdf->Cell('183',6,'FROM  '.$start1. '  TO  ' .$end1,0,1,'C');





$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);

$query1 = mysqli_query($db,"Select * from iinves where ndate BETWEEN '$start' and '$end' and status IN ('RECEIVED','DONE') and barcode !='' order by barcode asc;");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);

$pdf->SetFont('Arial' , 'b' , 10);

$pdf->WriteHTML('Investigation Name :   ' .  $data1['infusion'] .' ('.$data1['barcode'].' / '.$data1['pmrn'].')');

$pdf->ln(5);


$pdf->SetFont('Arial' , '' , 10);
$pdf->WriteHTML('Result:  '.$data1['result']);
$pdf->ln(10);

}




//$pdf->SetFont('Arial' , 'b' , 15);
//$pdf->Cell('90',5,'OUT PATIENT RECORD',1,0,'L');


//$pdf->ln(10);
//$pdf->MultiCell('160' , 5,$data['xl'],1,1);
//$pdf->Cell('30' , 5,'Doasge',1,1);
//$pdf->MultiCell('160' , 5,'jashfjh sjfh jsdhfjsdhjfh jsdhjf hjsdhfj dsjhf djsh jfdshjf dsjhf jdsh fdhsf hjsdhf sdhf jdhsf hdsjfhjsdhf sdhf jdshjfhjskdhf jsdh fjhsdjkf hjdsfjd s',1,1);
//$dd=$data['refer']

//$dd = rtrim($dd, ',');
//$string = rtrim($string, ',');




$pdf->Output();



