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
$this->Cell('300',6,'Datewise Covid Situation Report',0,1,'C');
$this->Ln();
}



function rr(){

$this->SetFont('Times', 'B', 12);
//$bt=$_REQUEST['dname'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];
$start1=date('d/m/Y',strtotime($_REQUEST["date"]));
$end1=date('d/m/Y',strtotime($_REQUEST["date1"]));

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$stmt = $db->query("Select * from covid where ssent BETWEEN '$start' and '$end'");
$data = $stmt->Fetch(PDO::FETCH_OBJ);
$stmt1 = $db->query("SELECT COUNT(name) as tt FROM covid where ssent BETWEEN '$start' and '$end'");
$data1 = $stmt1->Fetch(PDO::FETCH_OBJ);
$stmt2 = $db->query("SELECT COUNT(name) as tt FROM covid where retest BETWEEN '$start' and '$end'");
$data2 = $stmt2->Fetch(PDO::FETCH_OBJ);
$stmt3 = $db->query("SELECT COUNT(name) as tt FROM covid where sam2 BETWEEN '$start' and '$end'");
$data3 = $stmt3->Fetch(PDO::FETCH_OBJ);


$yy=$data1->tt+$data2->tt+$data3->tt;
$yy1=$data1->tt;
$yy2=$data2->tt;
$yy3=$data3->tt;
{

$this->Cell(300,10,$yy.' Samples Has Been Sent  '.'(New Sample- '. $yy1.' & Retest Sample- '.  $yy2.' & Re-retest Sample- '.  $yy3.')'. ' From '.$start1.' TO '.$end1,0,0,'C');


}


$this->Ln();


}

function headerTable(){

$this->SetFont('Times', 'B', 7.5);

$this->Cell(5,10,'SNO',1,0,'C');
$this->Cell(44,10,'Name',1,0,'C');

$this->Cell(30,10,'Desigation',1,0,'C');
$this->Cell(16,10,'Phone',1,0,'C');
$this->Cell(13,10,'Sent TO',1,0,'C');
$this->Cell(15,10,'Sent Date',1,0,'C');
$this->Cell(8,10,'Result',1,0,'C');
$this->Cell(15,10,'Retest',1,0,'C');
$this->Cell(15,10,'Q. Until',1,0,'C');
$this->Cell(30,10,'Remarks',1,0,'C');
$this->Cell(90,10,'Address',1,0,'C');
$this->Ln();
}
function viewTable($db){

$this->SetFont('Times', '',7);

$count=1;

$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];

$stmt = $db->query("Select * from covid where ssent BETWEEN '$start' and '$end' order by ssent desc");
while($data = $stmt->Fetch(PDO::FETCH_OBJ)){


$this->Cell(5,10,$count,1,0,'L');
$this->Cell(44,10,$data->name,1,0,'L');

$this->Cell(30,10,$data->desig,1,0,'L');
$this->Cell(16,10,$data->phone,1,0,'L');

$this->Cell(13,10,$data->sentto,1,0,'L');

if($data->ssent=='1970-01-01'){
$this->Cell(15,10,'',1,0,'L');
}
else {

$this->Cell(15,10,$data->ssent1,1,0,'L');
}

if($data->tresult=='N'){
	
$this->Cell(8,10,$data->tresult,1,0,'L');}

else {
	$this->SetFont('Times', 'b',8.5);
	$this->SetTextColor(255,0,0);
$this->Cell(8,10,$data->tresult,1,0,'L');	
}
$this->SetFont('Times', '',7.5);
$this->SetTextColor(0,0,0);


if($data->retest=='1970-01-01'){
$this->Cell(15,10,'',1,0,'L');
}
else {

$this->Cell(15,10,$data->retest1,1,0,'L');
}



if($data->quntil=='1970-01-01'){
$this->Cell(15,10,'',1,0,'L');
}
else {

$this->Cell(15,10,$data->quntil1,1,0,'L');
}
$this->Cell(30,10,$data->remarks,1,0,'L');

$this->Cell(90,10,$data->padd,1,0,'L');
$this->Ln();
$count++;








}

$stmt = $db->query("Select * from covid where retest BETWEEN '$start' and '$end' order by retest desc");
while($data = $stmt->Fetch(PDO::FETCH_OBJ)){


$this->Cell(5,10,$count,1,0,'L');
$this->Cell(44,10,$data->name,1,0,'L');

$this->Cell(30,10,$data->desig,1,0,'L');
$this->Cell(16,10,$data->phone,1,0,'L');

$this->Cell(13,10,$data->sentto,1,0,'L');

if($data->ssent=='1970-01-01'){
$this->Cell(15,10,'',1,0,'L');
}
else {

$this->Cell(15,10,$data->ssent1,1,0,'L');
}

if($data->tresult=='N'){
	
$this->Cell(8,10,$data->tresult,1,0,'L');}

else {
	$this->SetFont('Times', 'b',8.5);
	$this->SetTextColor(255,0,0);
$this->Cell(8,10,$data->tresult,1,0,'L');	
}
$this->SetFont('Times', '',7.5);
$this->SetTextColor(0,0,0);


if($data->retest=='1970-01-01'){
$this->Cell(15,10,'',1,0,'L');
}
else {

$this->Cell(15,10,$data->retest1,1,0,'L');
}



if($data->quntil=='1970-01-01'){
$this->Cell(15,10,'',1,0,'L');
}
else {

$this->Cell(15,10,$data->quntil1,1,0,'L');
}
$this->Cell(30,10,$data->remarks,1,0,'L');

$this->Cell(90,10,$data->padd,1,0,'L');
$this->Ln();
$count++;








}

$stmt = $db->query("Select * from covid where sam2 BETWEEN '$start' and '$end' order by retest desc");
while($data = $stmt->Fetch(PDO::FETCH_OBJ)){


$this->Cell(5,10,$count,1,0,'L');
$this->Cell(44,10,$data->name,1,0,'L');

$this->Cell(30,10,$data->desig,1,0,'L');
$this->Cell(16,10,$data->phone,1,0,'L');

$this->Cell(13,10,$data->sentto,1,0,'L');

if($data->ssent=='1970-01-01'){
$this->Cell(15,10,'',1,0,'L');
}
else {

$this->Cell(15,10,$data->ssent1,1,0,'L');
}

if($data->tresult=='N'){
	
$this->Cell(8,10,$data->tresult,1,0,'L');}

else {
	$this->SetFont('Times', 'b',8.5);
	$this->SetTextColor(255,0,0);
$this->Cell(8,10,$data->tresult,1,0,'L');	
}
$this->SetFont('Times', '',7.5);
$this->SetTextColor(0,0,0);


if($data->retest=='1970-01-01'){
$this->Cell(15,10,'',1,0,'L');
}
else {

$this->Cell(15,10,$data->retest1,1,0,'L');
}



if($data->quntil=='1970-01-01'){
$this->Cell(15,10,'',1,0,'L');
}
else {

$this->Cell(15,10,$data->quntil1,1,0,'L');
}
$this->Cell(30,10,$data->remarks,1,0,'L');

$this->Cell(90,10,$data->padd,1,0,'L');
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