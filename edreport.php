<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];
//$id=$_REQUEST['id'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from edischarge where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);
mysqli_set_charset($db,"utf8");




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

$this->ln(5);
$this->SetFont('Arial','B',10);
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561',0,0,'C');


}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddFont('NirmalaB','','NirmalaB.php');
//$pdf->SetFont('NirmalaB' , '' , 15);
$pdf->AddPage('P','A4',0);

//$pdf->AddFont('NirmalaS' , 'b' , 9);
$pdf->SetLeftMargin('15');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('183',6,'DISCHARGE SUMMARY',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('178',5,'Episode:',0,0,'R');
$pdf->Cell('5',5,$data['eid'],0,0,'L');

$pdf->ln(10);
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('50',5,'Consultant Name:',0,0,'L');
$pdf->Cell('90',5,$data['dname'],0,0,'L');
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->Cell('15',5,'DATE:',0,0,'R');
$pdf->Cell('30',5,$data['date'],0,0,'R');

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
$pdf->Cell('182',5,'Clinical Details:',1,1,'L');
$pdf->SetFont('NirmalaB' , '' , 10);
$pdf->MultiCell('182' , 5,$data['cdetails'],1,1);


$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Diagnosis:',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['diagnosis'],1,1);

$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Medication Advised:',1,1,'L');
$query1 = mysqli_query($db,"select * from edmedi where pmrn='$pmrn' and eid='$eid' ");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['medi']. "<---- Dosage --->" .$data1['pdos'],1,1);
}

$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'DIET:',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['pdiet'],1,1);

$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Other Advise:',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['other'],1,1);


$pdf->ln(5);


$pdf->ln(20);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'EMO Signature:',0,1,'R');




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