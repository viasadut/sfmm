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
$query = mysqli_query($db,"select * from endoreport where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_array($query);

$queryn = mysqli_query($db,"select * from endopapp where pmrn='$pmrn' and eid='$eid'");
$datan = mysqli_fetch_array($queryn);

$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from doctor1 where dname='$dname'");
$data2 = mysqli_fetch_array($query2);




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
$pdf->AddPage('P','A4',1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('15');
//$pdf->headerTable();
//$pdf->viewTable($db);


$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('182',6,$datan['tname'].' REPORT',1,1,'C');
//$this->SetFont('Arial','B',);

$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('166',5,'Reporting time:',0,0,'R');
$pdf->Cell('180',5,$data['rtime'],0,0,'L');

$pdf->ln(10);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40',5,'Consultant Name:',0,0,'L');
$pdf->Cell('90',5,$data['dname'],0,0,'L');
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
$pdf->Cell('20',5,$data['gender'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('13',5,$data['age'],1,1,'L');

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('40',5,'Referral From:',1,0,'L');
$pdf->Cell('141', 5,$data['dreffer'],1,1,'L');

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('150',5,'Detail Report:',1,0,'L');
$pdf->Cell('32',5,'Date: '.$data['r1date'],1,1,'L');
$pdf->SetFont('Arial' , '' , 10);


$query11 = mysqli_query($db,"select * from endoreport where pmrn='$pmrn' and eid='$eid'");

while($data11 = mysqli_fetch_array($query11))
{


$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('182' , 5,'Surgeon Name: '.$data11['dname'],0,1);
$pdf->MultiCell('182' , 5, 'Procedure Name: '.$data11['type'],0,1);

$pdf->MultiCell('182' , 5,'Details Note:',0,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data11['report'],0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('182' , 5,$data11['find'],0,1);
$pdf->ln(1);

}

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Other Therapeutic Done:',0,1,'L');
$pdf->ln(1);
$query1 = mysqli_query($db,"select * from addtherapeutic where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('182' , 5,$data1['medi'],0,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['ins'],0,1);
$pdf->ln(1);
}


$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Computer Generated Report, No Signature Required',0,1,'R');
//$pdf->Cell('182',5,$data['dname'],0,1,'R');
//$pdf->Cell('182',5,$data2['degree'],0,1,'R');
//$pdf->Cell('182',5,$data2['Discipline'],0,0,'R');

//$pdf->ln(15);
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