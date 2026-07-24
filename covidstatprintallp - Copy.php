<?php
require('force_justify.php');

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
//require('fpdf/fpdf.php');

class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',40,9);
$this->Image('logo1.jpg',160,9);
$this->SetFont('Arial','B',10);
$this->Cell(200,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',10);
$this->Cell(200,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',10);
$this->Cell(200,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(15);

}
function footer(){
$this->SetY(-10);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Report- Page'.$this->PageNo().' ',0,0,'C');

}
function tt(){
$this->SetFont('Arial' , 'b' , 15);
$this->Cell('200',6,'Total Covid-19 Report',0,1,'C');
$this->Ln();
}



function rr(){

$this->SetFont('Times', 'B', 12);
//$bt=$_REQUEST['dname'];

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$stmt = $db->query("Select * from covid");
$data = $stmt->Fetch(PDO::FETCH_OBJ);
$stmt1 = $db->query("SELECT COUNT(name) as tt FROM covid where tresult='P'");
$data1 = $stmt1->Fetch(PDO::FETCH_OBJ);

{

$this->Cell(200,10,$data1->tt.' Samples Has Been Sent  ',0,0,'C');


}


$this->Ln();


}

function headerTable(){

$this->SetFont('Times', 'B', 7.5);

$this->Cell(58,10,'Name',1,0,'C');

$this->Cell(40,10,'Desigation',1,0,'C');
$this->Cell(18,10,'Phone',1,0,'C');

$this->Cell(13,10,'Sent TO',1,0,'C');
$this->Cell(15,10,'Sample Sent',1,0,'C');
$this->Cell(8,10,'Result',1,0,'C');

$this->Cell(15,10,'Q.Duration',1,0,'C');
$this->Cell(15,10,'Retest',1,0,'C');

$this->Ln();
}
function viewTable($db){

$this->SetFont('Times', '',7.5);




$stmt = $db->query("Select * from covid where tresult='P' order by ssent desc");
while($data = $stmt->Fetch(PDO::FETCH_OBJ)){
$this->Cell(58,10,$data->name,1,0,'L');

$this->Cell(40,10,$data->desig,1,0,'L');
$this->Cell(18,10,$data->phone,1,0,'L');
$this->Cell(13,10,$data->sentto,1,0,'L');
$this->Cell(15,10,$data->ssent1,1,0,'L');
if($data->tresult=='N'){
	
$this->Cell(8,10,$data->tresult,1,0,'L');}

else {
	$this->SetFont('Times', 'b',8.5);
	$this->SetTextColor(255,0,0);
$this->Cell(8,10,$data->tresult,1,0,'L');	
}
$this->SetFont('Times', '',7.5);
$this->SetTextColor(0,0,0);
if($data->quntil=='1970-01-01'){
$this->Cell(15,10,'',1,0,'L');
}
else {

$this->Cell(15,10,$data->quntil1,1,0,'L');
}
if($data->retest=='1970-01-01'){
$this->Cell(15,10,'',1,0,'L');
}
else {
$this->Cell(15,10,$data->retest1,1,0,'L');
}

$this->Ln();


}
}
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetLeftMargin('20');
$pdf->tt();
$pdf->rr();
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
?>