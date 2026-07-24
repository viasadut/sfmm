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
$this->Cell(190,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(10);

}
function footer(){
$this->SetY(-20);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
//$this->Cell(0,10,'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801703788561 (SFMMKPJSH/OPD/MR-01)',0,0,'C');


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



$pdf->ln(20);
$pdf->Cell('183',6,$data['ename'],0,1,'C');
//$this->SetFont('Arial','B',);
$pdf->Cell('183',5,'Date:'. date('j-F-Y',strtotime($data['edate'])),0,0,'C');



$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);




$pdf->ln(10);
$pdf->SetFont('Arial' , 'b' , 14);

$pdf->Cell('186',5,$data['emoto'],0,1,'C');





$pdf->ln(2);

//$pdf->Image('1001.jpg',180,42);







//$pdf->Image('euploads/'.$epic,180,142,-300);














list($x1, $y1) = getimagesize('euploads/'.$epic);
$x2 = 22;
$y2 = 40;

$pdf->Cell(90, 120, "", 0, 0, 'C',$pdf->Image('euploads/'.$epic,$x2,$y2,0,50));








$pdf->ln(20);

$pdf->SetFont('Arial' , 'ub' , 14);
$pdf->Cell('183',6,'Basic Screeing Details',0,1,'C');


$pdf->SetFont('Arial','', 8);
$pdf->ln(5);


$pdf->Cell('23',5,'Patient Name:',1,0,'L');
$pdf->SetFont('Arial','b', 8);
$pdf->Cell('57',5,$data1['pname'],1,0,'L');
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
$pdf->Cell('88',5,$data1['padd'],1,1,'L');

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
$pdf->Cell('20',5,'Pluse:',1,0,'L');
$pdf->SetFont('Arial','b', 8);
$pdf->Cell('15',5,$data1['pulse'],1,0,'L');
$pdf->SetFont('Arial','', 8);
$pdf->Cell('7',5,'BP:',1,0,'L');
$pdf->SetFont('Arial','b', 8);
$pdf->Cell('24',5,$data1['sbp'],1,1,'L');
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
$pdf->Cell('66',5,$data1['bsugar'],1,1,'L');





if($bmi>25 and $bmi<30)
{
$pdf->Cell('183',5,'Remarks: Over Weight (BMI- 25-29.9)',1,0,'L');}

if($bmi>18.99 and $bmi<24.9)
{
$pdf->Cell('183',5,'Remarks: Normal Weight (BMI- 19-24.9)',1,0,'L');}


if($bmi<18.5)
{
$pdf->Cell('183',5,'Remarks: Under Weight (BMI- <18.5 )',1,0,'L');}
//$pdf->ln(8);


if($bmi>30)
{
$pdf->Cell('183',5,'Remarks: Obese ( BMI- 30 >)',1,0,'L');}




list($x1, $y1) = getimagesize('d_offer.jpg');
$x2 = 40;
$y2 = 149;

$pdf->Cell(90, 120, "", 0, 0, 'C',$pdf->Image('d_offer.jpg',$x2,$y2,130,130));

$pdf->ln(12);

$pdf->SetFont('Arial' , 'ub' , 14);
$pdf->Cell('183',6,'Special Offer:',0,1,'L');




$pdf->Output();