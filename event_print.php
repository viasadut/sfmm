<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$eid=$_REQUEST['eid'];

require('db1.php');

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
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
$this->Cell(0,10,'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801703788561 (SFMMKPJSH/OPD/MR-01)',0,0,'C');


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
$pdf->Cell('183',6,$data['ename'],1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);

$pdf->Cell('148',5,'DATE:',0,0,'R');
$pdf->Cell('30',5,$data['edate'],0,0,'R');


$pdf->ln(70);
$pdf->SetFont('Arial' , 'b' , 14);

$pdf->Cell('180',5,$data['emoto'],0,1,'C');
$pdf->SetFont('Arial','', 8);


$pdf->ln(2);

//$pdf->Image('1001.jpg',180,42);







//$pdf->Image('euploads/'.$epic,180,142,-300);














/*list($x1, $y1) = getimagesize('euploads/'.$epic);
$x2 = 75;
$y2 = 50;

$pdf->Cell(90, 120, "", 0, 0, 'C',$pdf->Image('euploads/'.$epic,$x2,$y2,0,50));
*/







$pdf->ln(10);

$pdf->Cell('23',5,'Patient Name:',1,0,'L');
$pdf->Cell('57',5,'',1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,'',1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('15',5,'',1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('25',5,'',1,1,'L');


$pdf->Cell('23',5,'Cell NO:',1,0,'L');
$pdf->Cell('57',5,'',1,0,'L');
$pdf->Cell('15',5,'Address:',1,0,'L');
$pdf->Cell('88',5,'',1,1,'L');

$pdf->ln(3);

$pdf->Cell('30',5,'Height(CM):',1,0,'L');
$pdf->Cell('15',5,'',1,0,'L');
$pdf->Cell('30',5,'Weight(KG):',1,0,'L');
$pdf->Cell('15',5,'',1,0,'L');
$pdf->Cell('12',5,'BMI:',1,0,'L');
$pdf->Cell('15',5,'',1,0,'L');
$pdf->Cell('20',5,'Pluse:',1,0,'L');
$pdf->Cell('15',5,'',1,0,'L');
$pdf->Cell('7',5,'BP:',1,0,'L');
$pdf->Cell('23',5,'',1,1,'L');
$pdf->Cell('30',5,'PulseOximeter:',1,0,'L');
$pdf->Cell('15',5,'',1,0,'L');
$pdf->Cell('30',5,'SPO2:',1,0,'L');
$pdf->Cell('15',5,'',1,0,'L');
$pdf->Cell('27',5,'Blood Sugar:',1,0,'L');
$pdf->Cell('65',5,'',1,0,'L');

$pdf->ln(8);






$pdf->Output();