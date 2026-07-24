<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from gcs where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_array($query);

$query1 = mysqli_query($db,"select * from discharge1 where pmrn='$pmrn' and eid='$eid'");
$data1 = mysqli_fetch_array($query1);





//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',15,7);
$this->Image('logo1.jpg',180,7);
$this->SetFont('Arial','B',12);
$this->Cell(190,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',12);
$this->Cell(195,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',12);
$this->Cell(190,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(10);

}
function footer(){
$this->SetY(-20);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561 (SFMMKPJSH/A&E/MR-01)',0,0,'C');


}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('15');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('183',6,'TRIAGE SUMMARY',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('133',5,'Episode:',0,0,'R');
$pdf->Cell('2',5,$data['eid'],0,0,'L');
$pdf->Cell('15',5,'DATE:',0,0,'R');
$pdf->Cell('48',5,$data1['ddate'],0,0,'L');

$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('60',5,'Patient Discharge By (EMO):',0,0,'L');
$pdf->Cell('70',5,$data1['emo'],0,0,'L');




$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data1['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data1['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('15',5,$data1['page'],1,1,'L');

//$pdf->ln(3);
$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Mode Of Arrival',1,0,'L');
$pdf->Cell('25',5,$data['moa'],1,0,'L');
$pdf->Cell('23',5,'Accompany',1,0,'L');
$pdf->Cell('30',5,$data['accom'],1,0,'L');
$pdf->Cell('46',5,'Level of Consciousness',1,0,'L');
$pdf->Cell('30',5,$data['lcon'],1,1,'L');
$pdf->Cell('25',5,'Mental Status',1,0,'L');
$pdf->Cell('20',5,$data['mstatus'],1,0,'L');
$pdf->Cell('25',5,'Height (CM):	',1,0,'L');
$pdf->Cell('20',5,$data['ph'],1,0,'L');
$pdf->Cell('25',5,'Weight (KG)',1,0,'L');
$pdf->Cell('20',5,$data['pw'],1,0,'L');
$pdf->Cell('30',5,'Temperature(C)',1,0,'L');
$pdf->Cell('19',5,$data['pt'],1,1,'L');
$pdf->Cell('17',5,'Pluse',1,0,'L');
$pdf->Cell('20',5,$data['pp'],1,0,'L');
$pdf->Cell('8',5,'BP',1,0,'L');
$pdf->Cell('20',5,$data['pbp'],1,0,'L');
$pdf->Cell('32',5,'Respiration(bpm)',1,0,'L');
$pdf->Cell('20',5,$data['pr'],1,0,'L');
$pdf->Cell('37',5,'O2 Sat%',1,0,'L');
$pdf->Cell('30',5,$data['po'],1,1,'L');
$pdf->Cell('45',5,'Glucosemmol/l:',1,0,'L');
$pdf->Cell('20',5,$data['pb'],1,1,'L');

$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('60',5,'Pain Score:',1,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('120' , 5,$data['pain'],1,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('60',5,'COMA SCALE(GCS):',1,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('120' , 5,$data['c4'],1,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('60',5,'Presenting Complaints:',1,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('120' , 5,$data['pc'],1,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('60',5,'Details Complaints:',1,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('120' , 5,$data['pd'],1,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('60',5,'CO-Morbidities:',1,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('120' , 5,$data['pcom'],1,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('60',5,'Allergies:',1,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('120' , 5,$data['pall'],1,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('60',5,'Past Medical / Surgical History:',1,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('120' , 5,$data['psur'],1,1);



$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'EMO Signature',0,1,'R');




//$pdf->SetFont('Arial' , 'b' , 15);
//$pdf->Cell('90',5,'OUT PATIENT RECORD',1,0,'L');


//$pdf->ln(10);
//$pdf->MultiCell('160' , 5,$data['xl'],1,1);
//$pdf->Cell('30' , 5,'Doasge',1,1);
//$pdf->MultiCell('160' , 5,'jashfjh sjfh jsdhfjsdhjfh jsdhjf hjsdhfj dsjhf djsh jfdshjf dsjhf jdsh fdhsf hjsdhf sdhf jdhsf hdsjfhjsdhf sdhf jdshjfhjskdhf jsdh fjhsdjkf hjdsfjd s',1,1);
//$dd=$data['refer']

//$dd = rtrim($dd, ',');
//$string = rtrim($string, ',');

$pdf->Output();