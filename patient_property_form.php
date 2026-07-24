<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['dname'];
$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];
$pgender=$_REQUEST['gender'];
require('db1.php');


//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){
$this->Image('logo1.jpg',15,7);
//$this->Image('logo1.jpg',180,7);
$this->SetFont('Arial','B',12);
//$this->Cell(190,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',12);
$this->Cell(195,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',12);
$this->Cell(190,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(10);

}
function footer(){
$this->SetY(-15);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801703788561 (SFMMKPJSH/OPD/MR-01)',0,0,'C');


}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();

//$pdf->AddFont('SundayMorning','I','SundayMorning.php');


$pdf->AddPage('P','A4',0);


//$pdf->SetFont('SundayMorning','',8);

//$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('12');
//$pdf->headerTable();
//$pdf->viewTable($db);
//$pdf->SetFont('Arial' , 'b' , 12);


//$pdf->Image('1001.jpg',180,42);


$pdf->SetFont('Times');
// Arial bold 14
$pdf->SetFont('Arial', 'B', 8);

//$pdf->ln(6);

$pdf->Cell('23',5,'Patient Name:',1,0,'L');
$pdf->Cell('57',5,$_REQUEST['pname'],1,0,'L');
$pdf->Cell('10',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$_REQUEST['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$_REQUEST['gender'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('25',5,$_REQUEST['page'],1,1,'L');

//$pdf->ln(20);

$pdf->Image('nursing_form_pic/patient_property_form.jpg',0,35, 210, 220);






$pdf->Output();