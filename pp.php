<?php
require('force_justify.php');

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
//require('fpdf/fpdf.php');

class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',25,9);
$this->Image('logo1.jpg',165,9);
$this->SetFont('Arial','B',10);
$this->Cell(190,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',10);
$this->Cell(190,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',10);
$this->Cell(190,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(15);

}
function footer(){
$this->SetY(-10);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Report- Page'.$this->PageNo().' ',0,0,'C');

}


function rr(){

$this->SetFont('Times', 'B', 12);
$bt=$_REQUEST['status'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];
$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$stmt = $db->query("Select * from presnew where status='$bt' and date BETWEEN '$start' and '$end'");
$data = $stmt->Fetch(PDO::FETCH_OBJ);
$stmt1 = $db->query("SELECT COUNT(status) as tt FROM presnew where status= '$bt' and date BETWEEN '$start' and '$end'");
$data1 = $stmt1->Fetch(PDO::FETCH_OBJ);

{

$this->Cell(193,10,$data1->tt.'  - Prescription Have  '.$_REQUEST['status']. ' '.'  From '.$_REQUEST['date'].' TO '.$_REQUEST['date1'],0,0,'C');


}


$this->Ln();


}

function headerTable(){

$this->SetFont('Times', 'B', 12);

$this->Cell(65,10,'Doctor Name',1,0,'C');
$this->Cell(65,10,'Patient Name',1,0,'C');
$this->Cell(28,10,'MRN',1,0,'C');
$this->Cell(35,10,'Date',1,0,'C');

$this->Ln();
}
function viewTable($db){

$this->SetFont('Times', '',12);


$bt=$_REQUEST['status'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];

$stmt = $db->query("Select * from presnew where status='$bt' and date BETWEEN '$start' and '$end'");
while($data = $stmt->Fetch(PDO::FETCH_OBJ)){
$this->Cell(65,10,$data->dname,1,0,'L');
$this->Cell(65,10,$data->pname,1,0,'L');
$this->Cell(28,10,$data->pmrn,1,0,'L');
$this->Cell(35,10,$data->date,1,0,'L');


$this->Ln();


}
}
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->rr();
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
?>