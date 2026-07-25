<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['adoc'];
$rdate=$_REQUEST['rdate'];
$id=$_REQUEST['id'];
//$eid=$_REQUEST['eid'];



$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
$data = mysqli_fetch_array($query);

$query1 = mysqli_query($db,"select * from preadm where id='$id' order by id desc");
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
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561 (SFMMKPJSH/OPD/MR-02)',0,0,'C');


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
$pdf->Cell('183',6,'ADMISSION REQUEST FORM',1,1,'C');
//$this->SetFont('Arial','B',);

$pdf->ln(6);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->Cell('30',5,'Consultant Name:',1,0,'L');
$pdf->Cell('90',5,$data1['dname'],1,0,'L');
$pdf->Cell('5');
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->Cell('30',5,'Phone No:',1,0,'L');
$pdf->Cell('28',5,$data1['pphone'],1,0,'L');



$pdf->ln(6);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Patient Name:',1,0,'L');
$pdf->Cell('90',5,$data1['pname'],1,0,'L');
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->Cell('5');
$pdf->Cell('30',5,'MRN:',1,0,'L');
$pdf->Cell('28',5,$data1['pmrn'],1,1,'L');
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Patient Adress:',1,0,'L');
$pdf->Cell('90',5,$data1['padd'],1,0,'L');
$pdf->Cell('5');
$pdf->Cell('30',5,'Gender:',1,0,'L');
$pdf->Cell('28',5,$data1['gender'],1,1,'L');
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Patient Age:',1,0,'L');
$pdf->Cell('40',5,$data1['page'],1,0,'L');

$pdf->ln(10);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('60',5,'Diagnosis:',1,0,'L');
$pdf->MultiCell('123',5,$data1['diagnosis'],1,1);
$pdf->ln(2);
$pdf->Cell('60',5,'Instruction On Admission For(MO):',1,0,'L');
$pdf->MultiCell('123',5,$data1['formo'],1,1);
$pdf->ln(2);
$pdf->Cell('60',5,'Suggested Date Of Admission:',1,0,'L');
$pdf->MultiCell('123',5,$data1['sda'],1,1);

$pdf->ln(2);
$pdf->Cell('60',5,'Plan:',1,0,'L');
$pdf->MultiCell('123',5,$data1['plan'],1,1);

$pdf->ln(2);
$pdf->Cell('60',5,'Probable Date of Discharge:',1,0,'L');
$pdf->MultiCell('123',5,$data1['pdischarge'],1,1);

$pdf->ln(2);
$pdf->Cell('60',5,'Remarks:',1,0,'L');
$pdf->MultiCell('123',5,$data1['remarks'],1,1);

$pdf->ln(20);
$pdf->Cell('60');
$pdf->Cell('120',5,'Consultant Signature',0,0,'R');


$pdf->Output();