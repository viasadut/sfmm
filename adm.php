<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['adoc'];
$date=$_REQUEST['adate'];
$eid=$_REQUEST['eid'];



$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from ipres where pmrn='$pmrn' and dname='$dname' and date='$date' and eid='$eid'");
$data = mysqli_fetch_array($query);





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
$this->SetY(-8);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Page'.$this->PageNo().' /(SFMMKPJ)',0,0,'C');

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
$pdf->SetFont('Arial' , 'b' , 16);
$pdf->Cell('183',6,'ADMISSION FORM',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('178',5,'Episode:',0,0,'R');
$pdf->Cell('5',5,$data['eid'],0,0,'L');

$pdf->ln(6);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Patient Name:',1,0,'L');
$pdf->Cell('90',5,$data['pname'],1,0,'L');
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->Cell('5');
$pdf->Cell('30',5,'MRN:',1,0,'L');
$pdf->Cell('28',5,$data['pmrn'],1,1,'L');
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Patient Adress:',1,0,'L');
$pdf->Cell('90',5,$data['padd'],1,0,'L');
$pdf->Cell('5');
$pdf->Cell('30',5,'Gender:',1,0,'L');
$pdf->Cell('28',5,$data['psex'],1,1,'L');
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Patient Age:',1,0,'L');
$pdf->Cell('20',5,$data['page'],1,0,'L');
$pdf->Cell('2');
$pdf->Cell('30',5,'Admission Date:',1,0,'L');
$pdf->Cell('38',5,$data['date'],1,0,'L');
$pdf->Cell('5');
$pdf->Cell('30',5,'Room:',1,0,'L');
$pdf->Cell('28',5,$data['room'],1,1,'L');
$pdf->ln(2);
$pdf->Cell('50',5,'Special Diagnosis:',1,0,'L');
$pdf->MultiCell('133',5,$data['cdetails'],1,1);
$pdf->ln(2);
$pdf->Cell('50',5,'Instruction On Admission:',1,0,'L');
$pdf->MultiCell('133',5,$data['diagnosis'],1,1);

$pdf->ln(5);
$pdf->Cell('100',5,'Urgent Investigation Required on Admission:',1,0,'L');
$pdf->Cell('2');
$pdf->Cell('35',25,'Hospital Services:',1,0,'L');
$pdf->Cell('35',5,'Medical',1,0,'L');
$pdf->Cell('10',5,'',1,1,'L');
$pdf->Cell('40',5,'Test:',1,0,'L');
$pdf->Cell('40',5,'Details Required:',1,0,'L');
$pdf->Cell('20',5,'Tick:',1,0,'L');
$pdf->Cell('37');
$pdf->Cell('35',5,'Surgical',1,0,'L');
$pdf->Cell('10',5,'',1,1,'L');
$pdf->Cell('40',5,'Blood:',1,0,'L');
$pdf->Cell('40',5,'',1,0,'L');
$pdf->Cell('20',5,'',1,0,'L');
$pdf->Cell('37');
$pdf->Cell('35',5,'O&G',1,0,'L');
$pdf->Cell('10',5,'',1,1,'L');
$pdf->Cell('40',5,'Urine:',1,0,'L');
$pdf->Cell('40',5,'',1,0,'L');
$pdf->Cell('20',5,'',1,0,'L');
$pdf->Cell('37');
$pdf->Cell('35',5,'Orthopedic',1,0,'L');
$pdf->Cell('10',5,'',1,1,'L');

$pdf->Cell('40',5,'Diagnostic Imaging:',1,0,'L');
$pdf->Cell('40',5,'',1,0,'L');
$pdf->Cell('20',5,'',1,0,'L');
$pdf->Cell('37');
$pdf->Cell('35',5,'Peadiatrician',1,0,'L');
$pdf->Cell('10',5,'',1,1,'L');

$pdf->Cell('40',5,'Others:',1,0,'L');
$pdf->Cell('40',5,'',1,0,'L');
$pdf->Cell('20',5,'',1,0,'L');
$pdf->ln(25);
$pdf->Cell('140');
$pdf->Cell('35',5,'Consultant Signature',0,0,'L');
$pdf->ln(15);
$pdf->Cell('182',5,'FOR BUSINESS OFFICE PERSONNEL USES ONLY',1,0,'L');
$pdf->ln(10);
$pdf->Cell('91',5,'ADMISSION',1,0,'L');
$pdf->Cell('2');
$pdf->Cell('89',5,'ADMISSION DEPOSIT',1,1,'L');
$pdf->Cell('31',15,'PAYMENT MODE',1,0,'L');
$pdf->Cell('30',5,'CASH',1,0,'L');
$pdf->Cell('30',5,'',1,0,'L');
$pdf->Cell('2');
$pdf->Cell('44',5,'ANGIOGRAM',1,0,'L');
$pdf->Cell('45',5,'BDT- 8000',1,1,'L');
$pdf->Cell('31');
$pdf->Cell('30',5,'CREDIT CARD',1,0,'L');
$pdf->Cell('30',5,'',1,0,'L');
$pdf->Cell('2');
$pdf->Cell('44',5,'ANGIOPLASTY',1,0,'L');
$pdf->Cell('45',5,'BDT- 20000',1,1,'L');
$pdf->Cell('31');
$pdf->Cell('30',5,'CREDIT CARD',1,0,'L');
$pdf->Cell('30',5,'',1,0,'L');
$pdf->Cell('2');
$pdf->Cell('44',5,'DAYCARE',1,0,'L');
$pdf->Cell('45',5,'BDT- 3000',1,1,'L');
$pdf->Cell('39',5,'COMPANY NAME (IF)',1,0,'L');
$pdf->Cell('26',5,'',1,0,'L');
$pdf->Cell('26',5,'',1,0,'L');
$pdf->Cell('2');
$pdf->Cell('44',5,'CESARIAN',1,0,'L');
$pdf->Cell('45',5,'BDT- 10000',1,1,'L');
$pdf->Cell('91',5,'RATES PER DAY',1,0,'L');
$pdf->Cell('2');
$pdf->Cell('44',5,'NORMAL DELIVERY',1,0,'L');
$pdf->Cell('45',5,'BDT- 5000',1,1,'L');
$pdf->Cell('50',5,'SINGLE DELUX',1,0,'L');
$pdf->Cell('41',5,'BDT- 4000',1,0,'L');

$pdf->Cell('2');
$pdf->Cell('44',5,'GENERAL WARD',1,0,'L');
$pdf->Cell('45',5,'BDT- 3000',1,1,'L');
$pdf->Cell('50',5,'SINGLE AC (CABIN)',1,0,'L');
$pdf->Cell('41',5,'BDT- 3000',1,0,'L');
$pdf->Cell('2');
$pdf->Cell('44',5,'ICU/CCU/HDU',1,0,'L');
$pdf->Cell('45',5,'BDT- 12000',1,1,'L');


$pdf->Cell('50',5,'SINGLE NON AC (CABIN)',1,0,'L');
$pdf->Cell('41',5,'BDT- 3000',1,0,'L');
$pdf->Cell('2');
$pdf->Cell('44',10,'ORTHOPEDIC SURGERY',1,0,'L');
$pdf->MultiCell('45',5,'80% OF IMPLANT + SURGERY COST',1,1);

$pdf->Cell('50',5,'TWO BEDED ROOM',1,0,'L');
$pdf->Cell('41',5,'BDT- 1500',1,0,'L');
$pdf->Cell('2');
$pdf->Cell('44',5,'SINGLE BED-AC',1,0,'L');
$pdf->Cell('45',5,'BDT- 7000',1,1);

$pdf->Cell('50',5,'FOUR BEDED ROOM',1,0,'L');
$pdf->Cell('41',5,'BDT- 1200',1,0,'L');
$pdf->Cell('2');
$pdf->Cell('44',5,'SINGLE BED-NON AC',1,0,'L');
$pdf->Cell('45',5,'BDT- 5000',1,1);

$pdf->Cell('50',5,'SIX BEDED ROOM',1,0,'L');
$pdf->Cell('41',5,'BDT- 800',1,0,'L');
$pdf->Cell('2');
$pdf->Cell('44',5,'SURGICAL',1,0,'L');
$pdf->Cell('45',5,'90% OF SURGICAL COST',1,1);

$pdf->Cell('50',5,'DAY CARE',1,0,'L');
$pdf->Cell('41',5,'BDT- 500',1,0,'L');
$pdf->Cell('2');
$pdf->Cell('44',5,'VIP ROOM',1,0,'L');
$pdf->Cell('45',5,'BDT - 12000',1,1);

$pdf->Cell('50',5,'PEDIATRICS WARD',1,0,'L');
$pdf->Cell('41',5,'BDT- 800',1,1,'L');

$pdf->Cell('50',5,'SCABU',1,0,'L');
$pdf->Cell('41',5,'BDT- 2000',1,1,'L');

$pdf->Cell('50',5,'ICU',1,0,'L');
$pdf->Cell('41',5,'BDT- 5600',1,1,'L');

$pdf->Cell('50',5,'CCU',1,0,'L');
$pdf->Cell('41',5,'BDT- 4800',1,1,'L');

$pdf->Cell('50',5,'HDU',1,0,'L');
$pdf->Cell('41',5,'BDT- 4000',1,1,'L');
//$pdf->ln();
$pdf->Cell('120');
$pdf->Cell('35',5,'Business Office Officer Signature',0,0,'L');


$pdf->Output();