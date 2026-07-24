<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
//$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['adoc'];
//$date=$_REQUEST['adate'];
$id=$_REQUEST['id'];



$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from conleavedetails where id='$id'");
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
$pdf->Cell('180',6,'Leave Application',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('157',5,'Staff ID:',0,0,'R');
$pdf->Cell('5',5,'SFMM'.$data['sid'],0,0,'L');

$pdf->ln(6);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('55',5,'Name Of The Consultant:',1,0,'L');
$pdf->Cell('125',5,$data['sname'],1,1,'L');
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('5');
$pdf->ln(3);
$pdf->Cell('45',5,'Leave Stars From:',1,0,'L');
$pdf->Cell('28',5,$data['sdate'],1,0,'L');

$pdf->Cell('35',5,'Leave End On:',1,0,'L');
$pdf->Cell('28',5,$data['edate'],1,0,'L');

$pdf->Cell('25',5,'Total Days:',1,0,'L');
$pdf->Cell('19',5,$data['tdays'],1,1,'L');

$pdf->ln(2);

$pdf->ln(2);

$pdf->Cell('40',5,'Type Of Leave',1,0,'L');

$pdf->Cell('140',5,$data['tleave'],1,1);


$pdf->SetFont('Arial' , 'b' , 12);


$pdf->ln(2);

$pdf->Cell('180',5,'Reason For Leave',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['reason'],1,1);

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('65',5,'Replacement Consultant Name:',1,0,'L');
$pdf->Cell('115',5,$data['rdoc'],1,1,'L');


$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('65',5,'Leave Application Status:',1,0,'L');
$pdf->Cell('115',5,$data['status'],1,1,'L');


//$pdf->ln();
$pdf->SetFont('Arial' , '' , 9);
$pdf->ln(10);
$pdf->Cell('100');
$pdf->Cell('55',5,'Computer Generated Report, No need signature',0,0,'L');


$pdf->Output();