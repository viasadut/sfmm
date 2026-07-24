<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];
$id=$_REQUEST['id'];
$eid1=date('dmY').$eid;

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from procedure1 where id='$id'");
$data = mysqli_fetch_array($query);


//$dname=$data['dname'];
$query3 = mysqli_query($db,"select * from doctor1 where dname='$dname'");
$data3 = mysqli_fetch_array($query3);




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
$this->SetY(-10);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',10);
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561',0,0,'C');


}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('183',6,'PROCEDURE SUMMARY',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('135',5,'Episode:',0,0,'R');
$pdf->Cell('5',5,$data['eid'],0,0,'L');
$pdf->Cell('20',5,'DATE:',0,0,'R');
$pdf->Cell('23',5,$data['pdate'],0,0,'R');


$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('42',5,'Consultant Name:',0,0,'L');
$pdf->Cell('95',5,$data['dname'],0,1,'L');
$pdf->SetFont('Arial','', 11);
$pdf->Cell('42',5);
$pdf->Cell('95',5,$data3['degree'],0,1,'L');
$pdf->Cell('42',3);
$pdf->Cell('80',3,$data3['Discipline'],0,1,'L');
$pdf->SetFont('Arial' , 'b' , 9);

$pdf->ln(6);

$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,'',1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('8',5,$data['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('27',5,$data['page'],1,1,'L');

$pdf->ln(3);

$pdf->Cell('15',5,'Pluse:',1,0,'L');
$pdf->Cell('20',5,$data['pulse'],1,0,'L');
$pdf->Cell('13',5,'BP:',1,0,'L');
$pdf->Cell('30',5,$data['bp'],1,0,'L');
$pdf->Cell('15',5,'Temp(F):',1,0,'L');
$pdf->Cell('30',5,$data['temp'],1,0,'L');
$pdf->Cell('30',5,'Pain Score:',1,0,'L');
$pdf->Cell('30',5,$data['pscore'],1,0,'L');
$pdf->ln(8);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Procedure Name:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['proname1'],0,1);


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Diagnosis:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['diagnosis'],0,1);


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Procedure Note:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['pnote'],0,1);


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Medication Advised:',0,1,'L');
$pdf->ln(3);
$query1 = mysqli_query($db,"select * from promedi where pmrn='$pmrn' and dname='$dname'  and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['medi'].' ('.$data1['brand'].')',0,1);

if($data1['frelation']!='' and $data1['duration']!='')
{
$pdf->MultiCell('182' , 5,$data1['pdos'].'-'.$data1['frelation'].'-'.$data1['duration'],0,1);
$pdf->ln(1);}

else if($data1['frelation']!='' and $data1['duration']=='')
{
$pdf->MultiCell('182' , 5,$data1['pdos'].'-'.$data1['frelation'],0,1);
$pdf->ln(1);}


else if($data1['frelation']=='' and $data1['duration']!='')
{
$pdf->MultiCell('182' , 5,$data1['pdos'].'-'.$data1['duration'],0,1);
$pdf->ln(1);}

else if($data1['frelation']=='' and $data1['duration']=='')
{
$pdf->MultiCell('182' , 5,$data1['pdos'],0,1);
$pdf->ln(1);}


}
//$pdf->Cell('92' , 5,'Dosages',1,1,'C');



$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Investigation Advised:',0,1,'L');
$pdf->ln(3);
$query1 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and dname='$dname'  and eid='$eid1'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['medi'],0,1);
$pdf->MultiCell('182' , 5,$data1['ins'],0,1);
$pdf->ln(1);
}



$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Computer Generated Report, No Signature Required',0,1,'R');




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