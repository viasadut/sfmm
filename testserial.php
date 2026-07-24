<?php
require('force_justify.php');

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
//require('fpdf/fpdf.php');

require('db1.php');




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
function tt(){
$this->SetFont('Arial' , 'b' , 15);
$this->Cell('183',6,'Number of Appointment  ',0,1,'C');
$this->Ln();
}



function rr(){

$this->SetFont('Times', 'B', 12);
$bt=$_REQUEST['dname'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];
$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$stmt = $db->query("Select * from radpapp where dname='$bt' and adate BETWEEN '$start' and '$end'");
$data = $stmt->Fetch(PDO::FETCH_OBJ);
$stmt1 = $db->query("SELECT COUNT(dname) as tt FROM radpapp where dname= '$bt' and adate BETWEEN '$start' and '$end'");
$data1 = $stmt1->Fetch(PDO::FETCH_OBJ);

{

$this->Cell(193,10,$data->dname.'   Prescribed  '.$data1->tt.' Prescriptions  '. 'From '.$_REQUEST['date'].' TO '.$_REQUEST['date1'],0,0,'C');


}


$this->Ln();


}

function headerTable(){

$this->SetFont('Times', 'B', 9);

$this->Cell(30,10,'Type',1,0,'C');
$this->Cell(50,10,'Patient Name',1,0,'C');
$this->Cell(15,10,'MRN',1,0,'C');
$this->Cell(22,10,'Date',1,0,'C');
$this->Cell(20,10,'Slot',1,0,'C');
$this->Cell(60,10,'Investigation',1,0,'C');

$this->Ln();
}
function viewTable($db){

$this->SetFont('Times', '',9);


$bt=$_REQUEST['dname'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];


$stmt2 = $db->query("Select count(*) as cnt from radpapp where dname='$bt' and adate BETWEEN '$start' and '$end'");
$data2 = $stmt2->Fetch(PDO::FETCH_OBJ);

$id=$data2+1;




$stmt = $db->query("Select * from radpapp where dname='$bt' and adate BETWEEN '$start' and '$end'");
while($data = $stmt->Fetch(PDO::FETCH_OBJ)){
$this->Cell(30,10,$id,1,0,'L');
$this->Cell(30,10,$data->dname,1,0,'L');
$this->Cell(50,10,$data->pname,1,0,'L');
$this->Cell(15,10,$data->pmrn,1,0,'L');
$this->Cell(22,10,$data->adate,1,0,'L');
$this->Cell(20,10,$data->aslot,1,0,'L');
$this->Cell(60,10,$data->tname,1,0,'L');


$this->Ln();


}
}
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->tt();
$pdf->rr();
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
?>