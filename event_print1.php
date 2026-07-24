<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$eid1=$_REQUEST['eid'];

require('db1.php');

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query1 = mysqli_query($db,"select * from pinfo where id='$eid1'");
$data1 = mysqli_fetch_array($query1);
$eid=$data1['event'];


$bmi2=$data1['weight'] / $data1['height']/$data1['height'] *10000;

$bmi=number_format($bmi2, 2);


$query = mysqli_query($db,"select * from event where id='$eid'");
$data = mysqli_fetch_array($query);


$epic=$data['epic'];

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
$this->Cell(190,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,1,'C'); 
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801810008080 (SFMMKPJSH/OPD/MR-01)',0,0,'C');

$this->ln(4);

}
function footer(){
$this->SetY(-10);
$this->SetFont('Arial','B',8);

//$this->ln(2);
$this->SetFont('Arial','B',8);



}


//$this->Ln();
}






$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('22');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'b' , 15);


$pdf->Cell('180',5,'_______________________________________________________________________________',0,1,'C');



$pdf->ln(18);
$pdf->Cell('183',6,$data['ename'],0,1,'C');
//$this->SetFont('Arial','B',);
$pdf->Cell('183',5,'Date:'. date('j-F-Y',strtotime($data['edate'])),0,0,'C');



$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);




$pdf->ln(7);
$pdf->SetFont('Arial' , 'b' , 14);

$pdf->Cell('228',5,'THEME: '.$data['emoto'],0,1,'C');





$pdf->ln(2);

//$pdf->Image('1001.jpg',180,42);







//$pdf->Image('euploads/'.$epic,180,142,-300);














list($x1, $y1) = getimagesize('euploads/'.$epic);
$x2 = 22;
$y2 = 40;

$pdf->Cell(90, 120, "", 0, 0, 'C',$pdf->Image('euploads/'.$epic,$x2,$y2,0,50));




list($x1, $y1) = getimagesize('dd_pa.jpg');
$x2 = 77;
$y2 = 149;

$pdf->Cell(90, 120, "", 0, 0, 'C',$pdf->Image('dd_pa.jpg',$x2,$y2,0,25));


list($x1, $y1) = getimagesize('dd_pa.jpg');
$x2 = 77;
$y2 = 198;

$pdf->Cell(90, 120, "", 0, 0, 'C',$pdf->Image('dd_pa.jpg',$x2,$y2,0,25));




list($x1, $y1) = getimagesize('gluco.jpg');
$x2 = 40;
$y2 = 249.5;

$pdf->Cell(90, 120, "", 0, 0, 'C',$pdf->Image('gluco.jpg',$x2,$y2,0,25));


$pdf->ln(10);

$pdf->SetFont('Arial' , 'ub' , 14);
$pdf->Cell('183',6,'Basic Screeing Details',0,1,'C');


$pdf->SetFont('Arial','', 8);
$pdf->ln(5);


$pdf->Cell('23',5,'Patient Name:',1,0,'L');
$pdf->SetFont('Arial','b', 8);
$pdf->Cell('57',5,strtoupper($data1['pname']),1,0,'L');
$pdf->SetFont('Arial','', 8);
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data1['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('15',5,$data1['gender'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('25',5,$data1['age1'],1,1,'L');


$pdf->Cell('23',5,'Cell NO:',1,0,'L');
$pdf->Cell('57',5,$data1['cno'],1,0,'L');
$pdf->Cell('15',5,'Address:',1,0,'L');
$pdf->Cell('88',5,strtoupper($data1['padd']),1,1,'L');

$pdf->ln(3);

$pdf->Cell('30',5,'Height(CM):',1,0,'L');
$pdf->SetFont('Arial','b', 8);
$pdf->Cell('15',5,$data1['height'],1,0,'L');
$pdf->SetFont('Arial','', 8);
$pdf->Cell('30',5,'Weight(KG):',1,0,'L');

$pdf->SetFont('Arial','b', 8);
$pdf->Cell('15',5,$data1['weight'],1,0,'L');
$pdf->SetFont('Arial','', 8);
$pdf->Cell('12',5,'BMI:',1,0,'L');
$pdf->SetFont('Arial','b', 8);
$pdf->Cell('15',5,$bmi,1,0,'L');
$pdf->SetFont('Arial','', 8);
$pdf->Cell('25',5,'Pluse:',1,0,'L');
$pdf->SetFont('Arial','b', 8);
$pdf->Cell('12',5,$data1['pulse'],1,0,'L');
$pdf->SetFont('Arial','', 8);
$pdf->Cell('7',5,'BP:',1,0,'L');
$pdf->SetFont('Arial','b', 8);
$pdf->Cell('22',5,$data1['sbp'],1,1,'L');
$pdf->SetFont('Arial','', 8);
$pdf->Cell('30',5,'PulseOximeter:',1,0,'L');
$pdf->SetFont('Arial','b', 8);
$pdf->Cell('15',5,$data1['pulseoxi'],1,0,'L');
$pdf->SetFont('Arial','', 8);
$pdf->Cell('30',5,'SPO2:',1,0,'L');
$pdf->SetFont('Arial','b', 8);
$pdf->Cell('15',5,$data1['spo2'],1,0,'L');
$pdf->SetFont('Arial','', 8);
$pdf->Cell('27',5,'Blood Sugar:',1,0,'L');
$pdf->SetFont('Arial','b', 8);
$pdf->Cell('25',5,$data1['bsugar'],1,0,'L');

$pdf->SetFont('Arial','', 8);
$pdf->Cell('30',5,'Waist circumference:',1,0,'L');

$pdf->SetFont('Arial','b', 8);
$pdf->Cell('11',5,$data1['waist'],1,1,'L');



$pdf->SetFont('Arial' , 'b' , 12);

if($bmi>25 and $bmi<30)
{
$pdf->Cell('183',5,'Remarks: Over Weight ('.$bmi.')',1,1,'L');}

if($bmi>18.99 and $bmi<24.9)
{
$pdf->Cell('183',5,'Remarks: Normal Weight ('.$bmi.')',1,1,'L');}


if($bmi<18.5)
{
$pdf->Cell('183',5,'Remarks: Under Weight ('.$bmi.')',1,1,'L');}
//$pdf->ln(8);


if($bmi>30)
{
$pdf->Cell('183',5,'Remarks: Obese ('.$bmi.')',1,1,'L');}

$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('183',5,'Reference Range: Under Weight: <18.5, Normal Weight: 18.5 - 25, Over Weight: 25.1 - 30, Obese: >30 ',1,1,'L');




$pdf->SetFont('Arial' , 'b' , 15);


$pdf->Cell('180',5,'_______________________________________________________________________________',0,1,'C');

$pdf->ln(2);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('90',5,'Consultation Package-1 ',0,0,'L');
$pdf->Cell('90',5,'Consultation Package-2 ',0,1,'L');

$pdf->ln(3);
$pdf->SetFont('Arial' , '' , 8);
$pdf->Cell('90',5,'* Diabetologist',0,0,'L');
$pdf->Cell('90',5,'* Diabetologist',0,1,'L');


$pdf->Cell('90',5,'* Ophthalmologist',0,0,'L');
$pdf->Cell('90',5,'* Ophthalmologist',0,1,'L');


$pdf->Cell('90',5,'* Dietician',0,0,'L');
$pdf->Cell('90',5,'* Cardiologist',0,1,'L');


$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('90',5,'Regular Price:-1600 BDT',0,0,'L');
$pdf->SetFont('Arial' , '' , 8);
$pdf->Cell('90',5,'* Dietician',0,1,'L');

$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('90',5,'Package Price:-1000 BDT',0,0,'L');

$pdf->SetFont('Arial' , '' , 8);
$pdf->Cell('90',5,'* Diabetic foot care by physiotherapy',0,1,'L');


$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('90',5,'',0,0,'L');
$pdf->Cell('90',5,'Regular Price:-2500 BDT',0,1,'L');


$pdf->SetFont('Arial' , 'b' , 12);


$pdf->Cell('90',5,'',0,0,'L');
$pdf->Cell('90',5,'Package Price:-1500 BDT',0,1,'L');





$pdf->SetFont('Arial' , 'b' , 15);


$pdf->Cell('180',5,'_______________________________________________________________________________',0,1,'C');



$pdf->ln(1);




$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('90',5,'Investigation Package-1 ',0,0,'L');
$pdf->Cell('90',5,'Investigation Package-2 ',0,1,'L');

$pdf->ln(3);
$pdf->SetFont('Arial' , '' , 8);
$pdf->Cell('90',3.5,'CBC with ESR',0,0,'L');
$pdf->Cell('90',3.5,'CBC with ESR',0,1,'L');


$pdf->Cell('90',3.5,'OGTT / RBS',0,0,'L');
$pdf->Cell('90',3.5,'OGTT / RBS',0,1,'L');


$pdf->Cell('90',3.5,'HbA1c',0,0,'L');
$pdf->Cell('90',3.5,'HbA1c',0,1,'L');



$pdf->Cell('90',3.5,'Urine for RME',0,0,'L');
$pdf->Cell('90',3.5,'Urine for RME',0,1,'L');


$pdf->Cell('90',3.5,'Fasting Lipid Profile',0,0,'L');
$pdf->Cell('90',3.5,'Fasting Lipid Profile',0,1,'L');



$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('90',3.5,'Regular Price:-3930 BDT',0,0,'L');

$pdf->SetFont('Arial' , '' , 8);
$pdf->Cell('90',3.5,'TSH',0,1,'L');



$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('90',5,'Package Price:-2500 BDT',0,0,'L');

$pdf->SetFont('Arial' , '' , 8);
$pdf->Cell('90',3.5,'Kidney Function Test',0,1,'L');



$pdf->Cell('90',3.5,'',0,0,'L');
$pdf->Cell('90',3.5,'Liver Function Test',0,1,'L');


$pdf->Cell('90',3.5,'',0,0,'L');
$pdf->Cell('90',3.5,'Urine Micro Albumin',0,1,'L');


$pdf->Cell('90',3.5,'',0,0,'L');
$pdf->Cell('90',3.5,'ECG',0,1,'L');


$pdf->Cell('90',3.5,'',0,0,'L');
$pdf->Cell('90',3.5,'Chest X-ray PA View',0,1,'L');

$pdf->Cell('90',3.5,'',0,0,'L');
$pdf->Cell('90',3.5,'USG Of Whole Abdomen',0,1,'L');







$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('90',5,'',0,0,'L');
$pdf->Cell('90',5,'Regular Price:-13210 BDT',0,1,'L');


$pdf->SetFont('Arial' , 'b' , 12);


$pdf->Cell('90',5,'',0,0,'L');
$pdf->Cell('90',5,'Package Price:-9000 BDT',0,1,'L');



$pdf->SetFont('Arial' , 'b' , 15);


$pdf->Cell('180',5,'_______________________________________________________________________________',0,1,'C');

$pdf->SetFont('Arial' , 'b' , 8);

$pdf->Cell('200',5,'More Offers:',0,0,'L');

$pdf->ln(21);
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('180',3,'_______________________________________________________________________________',0,1,'C');






$pdf->Output();