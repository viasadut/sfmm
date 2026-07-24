<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
//$pmrn=$_REQUEST['pmrn'];
//$dname1=$_REQUEST['dname1'];
//$date=$_REQUEST['date'];
$id=$_REQUEST['id'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from histo where id='$id'");
$data = mysqli_fetch_array($query);

$dname=$data['dname'];
$dname1=$data['dname1'];
$query2 = mysqli_query($db,"select * from doctor1 where dname='$dname1'");
$data2 = mysqli_fetch_array($query2);




//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){

$this->ln(30);

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
$pdf->AddPage('P','A4',1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('15');
//$pdf->headerTable();
//$pdf->viewTable($db);




$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('182',6,'HISTOPATHOLOGICAL REPORT',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 8);
$pdf->Cell('100',5,'',0,0,'L');
$pdf->Cell('90',5,'Histopathological Serial No: '.$data['hno'],0,1,'L');



$pdf->ln(10);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40',5,'Consultant Name:',0,0,'L');
$pdf->Cell('90',5,$dname1,0,0,'L');
$pdf->ln(4);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40');
$pdf->Cell('160',5,$data2['degree'],0,0,'L');
$pdf->ln(4);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40');
$pdf->Cell('160',5,$data2['Discipline'],0,0,'L');

$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('13',5,$data['page'],1,1,'L');

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('40',5,'Referral From:',1,0,'L');
$pdf->Cell('141', 5,$data['dname'],1,1,'L');

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('119',5,'Detail Report:',1,0,'L');
$pdf->Cell('62',5,'Date & Time: '.$data['rdate'].' '.$data['rtime'],1,1,'L');

$pdf->SetFont('Arial' , '' , 10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->ln(5);
$pdf->Cell('182',5,'Clinical Information:',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->ln(5);
$pdf->MultiCell('182' , 5,$data['cinfo'],0,1);




$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Specimen:',0,0,'L');
$pdf->ln(5);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['spe'],0,1);
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Gross Description:',0,0,'L');
$pdf->ln(5);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['gdes'],0,1);
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Microscopic Description:',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->ln(5);
$pdf->MultiCell('182' , 5,$data['mdes'],0,1);
//$pdf->ln(3);
//$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('182',5,'Tumor Work:',0,0,'L');
//$pdf->SetFont('Arial' , '' , 10);
//$pdf->ln(5);
$pdf->MultiCell('182' , 5,$data['twork'],0,1);
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Diagnosis:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->ln(5);
$pdf->MultiCell('182' , 5,$data['dia'],0,1);
//$pdf->ln(2);
//$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->MultiCell('182' , 5,$data['find'],0,1);




$pdf->ln(15);

$pdf->SetFont('Arial' , '' , 8);
$pdf->Cell('182',5,'Computer Generated Report',0,1,'R');
$pdf->Cell('182',5,'No Need Signature',0,1,'R');

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