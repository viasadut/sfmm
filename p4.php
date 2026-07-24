<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['dname'];
$date=$_REQUEST['date'];

$db = mysqli_connect('localhost','root','');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from pres where pmrn='$pmrn' and dname='$dname' and date='$date'");
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
$this->SetY(-15);
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
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('183',6,'OUTPATIENT RECORD',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(10);
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('50',5,'Consultant Name:',0,0,'L');
$pdf->Cell('90',5,$data['dname'],0,0,'L');
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->Cell('20',5,'DATE:',0,0,'R');
$pdf->Cell('23',5,$data['date'],0,0,'R');
$pdf->ln(10);


$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('13',5,$data['page'],1,1,'L');

$pdf->ln(5);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Patient Physical Records:',1,1,'L');
$pdf->ln(5);
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('30',5,'Height:',1,0,'L');
$pdf->Cell('30',5,$data['pheight'],1,0,'L');
$pdf->Cell('30',5,'Weight:',1,0,'L');
$pdf->Cell('30',5,$data['pweight'],1,0,'L');
$pdf->Cell('30',5,'Tempareture:',1,0,'L');
$pdf->Cell('32',5,$data['ptemp'],1,0,'L');

$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Clinical Details:',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['cdetails'],1,1);


$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Diagnosis:',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['diagnosis'],1,1);

$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Investigation Advised:',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['xl'],1,1);

$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Medication Advised:',1,1,'L');
$query1 = mysqli_query($db,"select * from pmedi where pmrn='$pmrn' and dname='$dname' and date='$date'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['medi']. "<---- Dosage --->" .$data1['pdos']."<---- Instructions --->" .$data1['ins'],1,1);
}
//$pdf->Cell('92' , 5,'Dosages',1,1,'C');

$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'DIET:',1,1,'L');
$pdf->Cell('182' , 5,$data['pdiet'],1,1,'L');

$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Other Advise:',1,1,'L');
$pdf->Cell('182' , 5,$data['other'],1,1,'L');


$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Reffered To:',1,1,'L');
$pdf->Cell('182' , 5,$data['reffer'],1,1,'L');

$pdf->ln(70);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Consultants Signature:',0,1,'R');




//$pdf->SetFont('Arial' , 'b' , 15);
//$pdf->Cell('90',5,'OUT PATIENT RECORD',1,0,'L');


//$pdf->ln(10);
//$pdf->MultiCell('160' , 5,$data['xl'],1,1);
//$pdf->Cell('30' , 5,'Doasge',1,1);
//$pdf->MultiCell('160' , 5,'jashfjh sjfh jsdhfjsdhjfh jsdhjf hjsdhfj dsjhf djsh jfdshjf dsjhf jdsh fdhsf hjsdhf sdhf jdhsf hdsjfhjsdhf sdhf jdshjfhjskdhf jsdh fjhsdjkf hjdsfjd s',1,1);




$pdf->Output();