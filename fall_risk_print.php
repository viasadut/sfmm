<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['dname'];
$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];
require('db1.php');

$query22 = "SELECT * from inpatient where pmrn='$pmrn' and eid='$eid' order by id desc"; 
$result22 = mysqli_query($con, $query22) or die ( mysqli_error());
$row72 = mysqli_fetch_assoc($result22);


$query2 = "SELECT * from frisk where pmrn='$pmrn' and eid='$eid' order by id desc"; 
$result2 = mysqli_query($con, $query2) or die ( mysqli_error());
$row7 = mysqli_fetch_assoc($result2);

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
$pdf->Cell('57',5,$row72['pname'],1,0,'L');
$pdf->Cell('10',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$row72['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$row72['gender'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('25',5,$row72['age'],1,1,'L');
$pdf->ln(10);

$pdf->SetFont('Arial', 'B', 28);
if($row7['fscore']<=6){
$pdf->Cell('190',5,'Fall Risk Score is: '. $row7['fscore']. ' (Low Fall Risk)',0,1,'C');
}

if($row7['fscore']>6 and $row7['fscore']<=13){
    $pdf->Cell('190',5,'Fall Risk Score is: '. $row7['fscore']. ' (Modarate Fall Risk)',0,1,'C');
    }

    if($row7['fscore']>13){
        $pdf->Cell('190',5,'Fall Risk Score is: '. $row7['fscore']. ' (High Fall Risk)',0,1,'C');
        }
        $pdf->ln(10);
        $pdf->Cell('190',5,'Assessment Date: '. $row7['date'],0,1,'C');
//$pdf->ln(20);

$pdf->Image('nursing_form_pic/high_fall_risk.jpg',50,80, 100, 100);






$pdf->Output();