<?php
require('force_justify.php');

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
//require('fpdf/fpdf.php');

class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',50,9);
$this->Image('logo1.jpg',215,9);
$this->SetFont('Arial','B',10);
$this->Cell(260,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',10);
$this->Cell(260,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',10);
$this->Cell(260,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(15);

}
function footer(){
$this->SetY(-10);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Report- Page'.$this->PageNo().' ',0,0,'C');

}
function tt(){
$this->SetFont('Arial' , 'b' , 15);
$this->Cell('260',6,'PATIENTS BED TRANSFER HISTORY',0,1,'C');
$this->Ln();
}



function rr(){

$this->SetFont('Times', 'B', 12);
$bt=$_REQUEST['pmrn'];
$bt1=$_REQUEST['eid'];

$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','Godiloveu16');
$stmt = $db->query("Select * from newbed where pmrn='$bt' and eid='$bt1'");
$data = $stmt->Fetch(PDO::FETCH_OBJ);
$stmt1 = $db->query("SELECT COUNT(pmrn) as tt FROM newbed where pmrn= '$bt' and eid='$bt1'");
$data1 = $stmt1->Fetch(PDO::FETCH_OBJ);

{

$this->Cell(260,10,$data->pname.'   Have been transfered '.$data1->tt.' Times  '. 'in episode '.$_REQUEST['eid'],0,0,'C');


}


$this->Ln();


}

function headerTable(){

$this->SetFont('Times', 'B', 12);

$this->Cell(60,10,'Doctor Name',1,0,'C');
$this->Cell(60,10,'Patient Name',1,0,'C');
$this->Cell(15,10,'MRN',1,0,'C');
$this->Cell(40,10,'Transfer Date/Time',1,0,'C');
$this->Cell(20,10,'Bed Type',1,0,'C');
$this->Cell(18,10,'Bed No',1,0,'C');
$this->Cell(25,10,'Episode No',1,0,'C');

$this->Ln();
}
function viewTable($db){

$this->SetFont('Times', '',12);


$bt=$_REQUEST['pmrn'];
$bt1=$_REQUEST['eid'];


$stmt = $db->query("Select * from newbed where pmrn='$bt' and eid='$bt1'");
while($data = $stmt->Fetch(PDO::FETCH_OBJ)){
$this->Cell(60,10,$data->dname,1,0,'C');
$this->Cell(60,10,$data->pname,1,0,'C');
$this->Cell(15,10,$data->pmrn,1,0,'C');
$this->Cell(40,10,$data->adate,1,0,'C');
$this->Cell(20,10,$data->type,1,0,'C');
$this->Cell(18,10,$data->bno,1,0,'C');
$this->Cell(25,10,$data->eid,1,0,'C');


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