<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
require('db1.php');

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$start=date($_REQUEST["date"]);
$end=date($_REQUEST["date1"]);

//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',15,7);
$this->Image('logo1.jpg',180,7);
$this->SetFont('Arial','B',12);
$this->Cell(190,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',12);
$this->Cell(195,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',12);
$this->Cell(190,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(15);

}
function footer(){
$this->SetY(-20);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801703788561 (SFMMKPJSH/OPD/MR-01)',0,0,'C');


}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('15');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('190',6,'Covid Test Records From '.$start.' To '.$end,1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('12',5,'S/NO',1,0,'L');
$pdf->Cell('22',5,'Date',1,0,'L');
$pdf->Cell('18',5,'Staff',1,0,'L');
$pdf->Cell('18',5,'OPD',1,0,'L');
$pdf->Cell('20',5,'IPD',1,0,'L');
$pdf->Cell('20',5,'Corporate',1,0,'L');
$pdf->Cell('20',5,'Police',1,0,'L');
$pdf->Cell('20',5,'Outsource',1,0,'L');
$pdf->Cell('20',5,'Outside',1,0,'L');

$pdf->Cell('20',5,'Total',1,1,'L');






$count=1;
$query1 = mysqli_query($db,"Select * from covidopd where ssent between '$start' and '$end' and bstatus='Paid' and status='collected' group by ssent;");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('12' , 5,$count.'.',1,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('22' , 5,'  '.$data1['ssent1'],1,0);


$tdate=$data1['ssent'];
	  
$query46 = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and status='collected'"; 
	 
$result46 = mysqli_query($con, $query46) or die(mysqli_error());
$row46 = mysqli_fetch_assoc($result46);
	  


$query43s = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and tp='Staff' and status='collected'"; 
	 
$result43s = mysqli_query($con, $query43s) or die(mysqli_error());
$row43s = mysqli_fetch_assoc($result43s);

$query43o = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and tp in('OPD') and status='collected'"; 
	 
$result43o = mysqli_query($con, $query43o) or die(mysqli_error());
$row43o = mysqli_fetch_assoc($result43o);

$query43i = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and tp='InPatient' and status='collected'"; 
	 
$result43i = mysqli_query($con, $query43i) or die(mysqli_error());
$row43i = mysqli_fetch_assoc($result43i);

$query43c = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and tp='Corporate' and status='collected'"; 
	 
$result43c = mysqli_query($con, $query43c) or die(mysqli_error());
$row43c = mysqli_fetch_assoc($result43c);

$query43p = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and tp='Police' and status='collected'"; 
	 
$result43p = mysqli_query($con, $query43p) or die(mysqli_error());
$row43p = mysqli_fetch_assoc($result43p);

$query43ot = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and tp='Outsource' and status='collected'"; 
	 
$result43ot = mysqli_query($con, $query43ot) or die(mysqli_error());
$row43ot = mysqli_fetch_assoc($result43ot);

$query43out = "SELECT COUNT(id) FROM covidopd where ssent ='$tdate' and bstatus='Paid' and tp='Outside' and status='collected'"; 
	 
$result43out = mysqli_query($con, $query43out) or die(mysqli_error());
$row43out = mysqli_fetch_assoc($result43out);


$pdf->Cell('18' , 5,'  '.$row43s['COUNT(id)'],1,0);
$pdf->Cell('18' , 5,'  '.$row43o['COUNT(id)'],1,0);
$pdf->Cell('20' , 5,'  '.$row43i['COUNT(id)'],1,0);
$pdf->Cell('20' , 5,'  '.$row43c['COUNT(id)'],1,0);
$pdf->Cell('20' , 5,'  '.$row43p['COUNT(id)'],1,0);
$pdf->Cell('20' , 5,'  '.$row43ot['COUNT(id)'],1,0);
$pdf->Cell('20' , 5,'  '.$row43out['COUNT(id)'],1,0);
$pdf->Cell('20' , 5,'  '.$row46['COUNT(id)'],1,1);

$count++;

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