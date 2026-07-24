<?php
require('force_justify.php');

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
//require('fpdf/fpdf.php');

class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',85,9);
$this->Image('logo1.jpg',215,9);
$this->SetFont('Arial','B',10);
$this->Cell(300,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',10);
$this->Cell(300,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',10);
$this->Cell(300,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(15);

}
function footer(){
$this->SetY(-10);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Report- Page'.$this->PageNo().' ',0,0,'C');

}
function tt(){
$this->SetFont('Arial' , 'b' , 15);

$this->Ln();
}



function rr(){

$this->SetFont('Times', 'B', 12);
//$bt=$_REQUEST['dname'];

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$stmt = $db->query("Select * from covidopd where tresult='P'");
$data = $stmt->Fetch(PDO::FETCH_OBJ);
$stmt1 = $db->query("SELECT COUNT(name) as tt FROM covidopd where tresult='P'");
$data1 = $stmt1->Fetch(PDO::FETCH_OBJ);



$yy1=$data1->tt;
{

$this->Cell(300,10,$yy1.' Positive Cases were found',0,0,'C');


}


$this->Ln();


}

function headerTable(){

$this->SetFont('Times', 'B', 7.5);

$this->Cell(7,10,'SNO',1,0,'C');
$this->Cell(10,10,'SID',1,0,'C');
$this->Cell(50,10,'Name',1,0,'C');


$this->Cell(16,10,'Phone',1,0,'C');
$this->Cell(13,10,'Sent TO',1,0,'C');


$this->Cell(15,10,'Type',1,0,'C');
$this->Cell(120,10,'Address',1,0,'C');
$this->Cell(20,10,'Ward',1,0,'C');
$this->Cell(23,10,'District',1,0,'C');
$this->Cell(10,10,'Result',1,0,'C');

$this->Ln();
}
function viewTable($db){

$this->SetFont('Times', '',7);

$count=1;


$stmt = $db->query("Select * from covidopd where tresult='P'");
while($data = $stmt->Fetch(PDO::FETCH_OBJ)){


$this->Cell(7,10,$count,1,0,'L');
$this->Cell(10,10,$data->sid,1,0,'L');
$this->Cell(50,10,$data->name,1,0,'L');


$this->Cell(16,10,$data->phone,1,0,'L');

$this->Cell(13,10,$data->sentto,1,0,'L');


$this->Cell(15,10,$data->sam,1,0,'L');



$this->Cell(120,10,$data->padd,1,0,'L');

$this->Cell(20,10,$data->ward,1,0,'L');
$this->Cell(23,10,$data->district,1,0,'L');
$this->Cell(10,10,$data->tresult,1,0,'C');
$this->Ln();
$count++;


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