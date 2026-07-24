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
function tt(){
	
$bt=$_REQUEST['bt'];
$this->SetFont('Arial' , 'b' , 15);
//$this->Cell('183',6,$f.' '. $bt.' '.'Done From' ,0,1,'C');
//$this->Cell('183',6,$date.' TO '. $date1,0,1,'C');
$this->Ln();
}



function rr(){
require('db1.php');
$this->SetFont('Times', 'B', 12);
//$bt=$_REQUEST['bt'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];
$bt=$_REQUEST['bt'];
$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$query43 = "SELECT COUNT(proce) FROM ot where otdate BETWEEN '$start' and '$end' and proce LIKE '%$bt%' and status IN ('Done','Received');"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$query433 = "SELECT COUNT(Otherins) FROM ot where otdate BETWEEN '$start' and '$end' and Otherins LIKE '%$bt%' and status IN ('Done','Received');"; 
$result433 = mysqli_query($con, $query433) or die(mysqli_error());
$row433 = mysqli_fetch_assoc($result433);


$f=$row43['COUNT(proce)'] + $row433['COUNT(Otherins)'];

{

//$this->Cell(193,10,$f. 'From '.$_REQUEST['date'].' TO '.$_REQUEST['date1'],0,0,'C');

$this->SetFont('Arial' , 'b' , 15);
$this->Cell('183',6,$f.' - '. $bt.' '.'DONE FROM' ,0,1,'C');
$this->Cell('183',6,$start.' TO '. $end,0,1,'C');

}


$this->Ln();


}

function headerTable(){

$this->SetFont('Times', 'B', 9);

$this->Cell(50,10,'Patient Name',1,0,'C');
$this->Cell(15,10,'MRN',1,0,'C');
$this->Cell(40,10,'Doctor Name',1,0,'C');
$this->Cell(20,10,'OT Date',1,0,'C');
$this->Cell(50,10,'Procedure',1,0,'C');
$this->Cell(20,10,'Type',1,0,'C');

$this->Ln();
}
function viewTable($db){

$this->SetFont('Times', '',9);


$bt=$_REQUEST['bt'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];

$stmt = $db->query("Select * from ot where otdate BETWEEN '$start' and '$end' and proce LIKE '%$bt%' and status IN ('Done','Received');");
while($data = $stmt->Fetch(PDO::FETCH_OBJ)){
$this->Cell(50,10,$data->pname,1,0,'L');
$this->Cell(15,10,$data->pmrn,1,0,'L');
$this->Cell(40,10,$data->dname,1,0,'L');
$this->Cell(20,10,$data->otdate,1,0,'L');
$this->Cell(50,10,$data->proce,1,0,'L');
$this->Cell(20,10,$data->typeo,1,0,'L');


$this->Ln();


}
}

function viewTable1($db){

$this->SetFont('Times', '',9);


$bt=$_REQUEST['bt'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];

$stmt = $db->query("Select * from ot where otdate BETWEEN '$start' and '$end' and Otherins like '%$bt%' and status IN ('Done','Received');");
while($data = $stmt->Fetch(PDO::FETCH_OBJ)){
$this->Cell(50,10,$data->pname,1,0,'L');
$this->Cell(15,10,$data->pmrn,1,0,'L');
$this->Cell(40,10,$data->dname,1,0,'L');
$this->Cell(20,10,$data->otdate,1,0,'L');
$this->Cell(50,10,$data->Otherins,1,0,'L');
$this->Cell(20,10,$data->typeo,1,0,'L');




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
$pdf->viewTable1($db);
$pdf->Output();
?>