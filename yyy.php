<?php
require('force_justify.php');
$bt=$_REQUEST['status'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpj');
//require('fpdf/fpdf.php');
$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',20,2);
$this->Image('logo1.jpg',250,2);
$this->SetFont('Arial','B',16);
$this->Cell(276,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(5);
$this->SetFont('Arial','B',16);
$this->Cell(270,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',16);
$this->Cell(270,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(20);

}
function footer(){
$this->SetY(-15);
$this->SetFont('Arial','B',16);
$this->Cell(0,10,'Page'.$this->PageNo().' /(rb)',0,0,'C');

}

function headerTable(){

$this->SetFont('Times', 'B', 12);

$this->Cell(100,10,'Doctor Name',1,0,'C');

$this->Ln();
}
function viewTable($db){

$this->SetFont('Times', '',12);
$query1 = mysqli_query($db,"Select * from presnew where status='$bt' and date BETWEEN '$start' and '$end'");
while($data1 = mysqli_fetch_array($query1)){
$this->Cell(100,10,$data1->pname,1,0,'L');


$this->Ln();
}
}
}
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();