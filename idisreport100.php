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
$query = mysqli_query($db,"select * from idischarge1 where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_array($query);

$query2 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
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

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561 (SFMMKPJSH/NSG/MR-20)',0,0,'C');


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
$pdf->Cell('183',6,'DISCHARGE SUMMARY',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('110',5,'Episode:',0,0,'R');
$pdf->Cell('2',5,$data['eid'],0,0,'L');
$pdf->Cell('40',5,'DATE OF DISCHARGE:',0,0,'R');
$pdf->Cell('48',5,$data['ddate'],0,0,'L');

$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('60',5,'Patient Discharge By :',0,0,'L');
$pdf->Cell('70',5,$data['emo'],0,0,'L');



$pdf->ln(5);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('60',5,'Consultant(s) Involved:',0,0,'L');
$pdf->Cell('70',5,$data['dname'],0,0,'L');
$pdf->Image('1001.jpg',173,40);
$pdf->ln(12);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('15',5,$data['page'],1,1,'L');
$pdf->Cell('35',5,'Date Of Admission:',1,0,'L');
$pdf->Cell('35',5,$data2['adate'],1,0,'L');
$pdf->Cell('30',5,'WARD/CABIN:',1,0,'L');
$pdf->Cell('35',5,$data2['room'],1,0,'L');
$pdf->Cell('10',5,'Bed:',1,0,'L');
$pdf->Cell('38',5,$data2['room1'],1,1,'L');

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Discharge Type:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['discharge'],0,1);


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Surgery or Procedure (In Any):',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['surgery'],0,1);


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Discharge Diagnosis :',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['ddia'],0,1);

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Case Summary :',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['ill'],0,1);

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Investigation Done :',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['dinves'],0,1);

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Medication Advised:',0,1,'L');
$pdf->ln(3);
$query1 = mysqli_query($db,"select * from idismedi where pmrn='$pmrn'and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);

$pdf->MultiCell('182' , 5,$data1['brand'].' ('.$data1['medi'].')',0,1);
$pdf->MultiCell('182' , 5,$data1['pdos'],0,1);
$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Follow Up Investigation Advised:',0,1,'L');
$pdf->ln(3);
$query11 = mysqli_query($db,"select * from idinves where pmrn='$pmrn'and eid='$eid'");

while($data11 = mysqli_fetch_array($query11))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);

$pdf->MultiCell('182' , 5,$data11['medi'],0,1);
$pdf->MultiCell('182' , 5,$data11['ins'],0,1);
$pdf->ln(1);
}
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Advise On Discharge:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['other'],0,1);

$pdf->ln(3);


$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Follow Up Plan:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['plan'],0,1);


$pdf->ln(10);


$pdf->SetFont('Arial' , 'b' , 8);
$pdf->Cell('70',5,$data2['dconfirm'],0,'L');
$pdf->SetFont('Arial' , 'b' , 8);
$pdf->Cell('112',5,'Computer Generated Summary, No Signature Required.',0,1,'R');




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