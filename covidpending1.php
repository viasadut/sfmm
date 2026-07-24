<?php
require('force_justify.php');

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
//require('fpdf/fpdf.php');

class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',70,9);
$this->Image('logo1.jpg',220,9);
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
$this->Cell('300',6,'Total Covid-19 Report',0,1,'C');
$this->Ln();
}



function rr(){

$this->SetFont('Times', 'B', 12);
//$bt=$_REQUEST['dname'];

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$stmt = $db->query("Select * from covid");
$data = $stmt->Fetch(PDO::FETCH_OBJ);
$stmt1 = $db->query("SELECT COUNT(mname) as tt1 FROM staff1 where astatus='Active' and ugroup='doctor' and tt=''");
$data1 = $stmt1->Fetch(PDO::FETCH_OBJ);

{

$this->Cell(300,10,$data1->tt1.' Samples Has Not Been Sent  ',0,0,'C');


}


$this->Ln();


}

function headerTable(){

$this->SetFont('Times', 'B', 7.5);
$this->Cell(8,10,'S/No',1,0,'C');
$this->Cell(14,10,'S/ID',1,0,'C');
$this->Cell(58,10,'Name',1,0,'C');

$this->Cell(20,10,'Phone',1,0,'C');
$this->Cell(40,10,'Department',1,0,'C');

$this->Cell(40,10,'Desigation',1,0,'C');
$this->Cell(86,10,'Address',1,0,'C');

$this->Ln();
}
function viewTable($db){

$this->SetFont('Times', '',7.5);



$count=1;

$stmt = $db->query("Select * from staff1 where astatus='Active' and ugroup='doctor' and tt='' order by sdepartment asc;");
while($data = $stmt->Fetch(PDO::FETCH_OBJ)){
$this->Cell(8,10,$count,1,0,'L');
$this->Cell(14,10,'SFMM'.$data->sid,1,0,'L');
$this->Cell(58,10,$data->mname,1,0,'L');

$this->Cell(20,10,$data->phone,1,0,'L');
$this->Cell(40,10,$data->sdepartment,1,0,'L');
$this->Cell(40,10,$data->designation,1,0,'L');
$this->Cell(86,10,$data->preadd,1,0,'L');

$count++;
$this->Ln();


}
}
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->SetLeftMargin('20');
$pdf->tt();
$pdf->rr();
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
?>