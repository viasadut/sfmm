<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$bt=$_REQUEST['status'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
//$query = mysqli_query($db,"Select * from presnew where status='$bt' and date BETWEEN '$start' and '$end'");
//$data = mysqli_fetch_assoc($query);


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
$this->ln(10);

}
function footer(){
$this->SetY(-15);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Page'.$this->PageNo().' /(SFMMKPJ)',0,0,'C');

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
$pdf->Cell('183',6,'OUTPATIENT RECORD',1,1,'C');
//$this->SetFont('Arial','B',);


$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'Medication Advised:',1,0,'L');
$pdf->Cell('80',5,'Medication Advised:',1,1,'L');
$query1 = mysqli_query($db,"Select * from presnew where status='$bt' and date BETWEEN '$start' and '$end'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('80' , 5,$data1['pname'],1,0);
$pdf->MultiCell('40' , 5,$data1['dname'],1,0);
}
//$pdf->Cell('92' , 5,'Dosages',1,1,'C');

$pdf->ln(5);




$pdf->Output();