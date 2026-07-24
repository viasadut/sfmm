<?php
require('force_justify.php');

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
//require('fpdf/fpdf.php');

class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',70,9);
$this->Image('logo1.jpg',200,9);
$this->SetFont('Arial','B',10);
$this->Cell(270,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',10);
$this->Cell(270,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',10);
$this->Cell(270,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(15);

}
function footer(){
$this->SetY(-10);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Report- Page'.$this->PageNo().' ',0,0,'C');

}
function tt(){
$this->SetFont('Arial' , 'b' , 15);
$this->Cell('270',6,'ADMISSION REQUEST REPORT ',0,1,'C');
$this->Ln();
}



function rr(){

$this->SetFont('Times', 'B', 12);
$bt=$_REQUEST['dname'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];
$start1= date('d/m/Y', strtotime($start));
$end1= date('d/m/Y', strtotime($end));
$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$stmt = $db->query("Select * from preadm where tstatus='$bt' and rdate BETWEEN '$start' and '$end' and staff='Staff' order by rdate asc");
$data = $stmt->Fetch(PDO::FETCH_OBJ);
$stmt1 = $db->query("SELECT COUNT(tstatus) as tt FROM preadm where tstatus= '$bt' and rdate BETWEEN '$start' and '$end' and staff='Staff'");
$data1 = $stmt1->Fetch(PDO::FETCH_OBJ);

{

$this->Cell(270,10,$data1->tt.'  Admission Request Has Been  '.$data->tstatus. '  From '.$start1.' TO '.$end1,0,0,'C');


}


$this->Ln();


}

function headerTable(){

$this->SetFont('Times', 'B', 10);

$this->Cell(15,10,'Date',1,0,'C');
$this->Cell(13,10,'MRN',1,0,'C');
$this->Cell(40,10,'Name',1,0,'C');
$this->Cell(10,10,'Age',1,0,'C');
$this->Cell(15,10,'Gender',1,0,'C');
$this->Cell(100,10,'Diagnosis',1,0,'C');
$this->Cell(50,10,'TM Comments',1,0,'C');
$this->Cell(40,10,'Consultant',1,0,'C');

$this->Ln();
}
function viewTable($db){

$this->SetFont('Times', '',8);


$bt=$_REQUEST['dname'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];

$stmt = $db->query("Select * from preadm where tstatus='$bt' and rdate BETWEEN '$start' and '$end' and staff='Staff' order by rdate asc");
while($data = $stmt->Fetch(PDO::FETCH_OBJ)){
$this->Cell(15,10,$data->rdate,1,0,'L');
$this->Cell(13,10,$data->pmrn,1,0,'L');
$this->Cell(40,10,$data->pname,1,0,'L');
$this->Cell(10,10,$data->page,1,0,'L');
$this->Cell(15,10,$data->gender,1,0,'L');
$this->Cell(100,10,$data->diagnosis,1,0,'L');
$this->Cell(50,10,$data->rcom,1,0,'L');
$this->Cell(40,10,$data->dname,1,0,'L');


$this->Ln();


}
}
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->tt();
$pdf->rr();
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
?>