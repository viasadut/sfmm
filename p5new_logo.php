<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['dname'];
$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];
require('db1.php');

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from presnew where pmrn='$pmrn' and dname='$dname' and date='$date' and eid='$eid'");
$data = mysqli_fetch_array($query);
$d=$data['date'];
$b = date( 'j-F-Y', strtotime( $d) );

$query43 = "SELECT COUNT(pmrn) FROM alltest where pmrn= '$pmrn' and eid='$eid' and dname='$dname';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count10=$row43['COUNT(pmrn)'];

$query44 = "SELECT COUNT(pmrn) FROM pmedi where pmrn= '$pmrn' and eid='$eid' and dname='$dname';"; 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);
$count11=$row44['COUNT(pmrn)'];






$query2 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and dname='$dname' and adate='$date'");
$data2 = mysqli_fetch_array($query2);

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

//$pdf->AddFont('SundayMorning','I','SundayMorning.php');


$pdf->AddPage('P','A4',0);


//$pdf->SetFont('SundayMorning','',8);

//$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('22');
//$pdf->headerTable();
//$pdf->viewTable($db);
//$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('183',6,'OUTPATIENT RECORD',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('130',5,'Episode:',0,0,'R');
$pdf->Cell('5',5,$data['eid'],0,0,'L');
$pdf->Cell('18',5,'DATE:',0,0,'R');
$pdf->Cell('30',5,$b,0,0,'R');


$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('42',5,'Consultant Name:',0,0,'L');
$pdf->Cell('95',5,$data['dname'],0,1,'L');
$pdf->SetFont('Arial','', 11);
$pdf->Cell('42',5);
$pdf->MultiCell('160',5,$data3['degree'],0,1);
$pdf->Cell('42',3);
$pdf->Cell('80',3,$data3['Discipline'],0,1,'L');
$pdf->SetFont('Arial' , 'b' , 9);


$pdf->ln(2);

//$pdf->Image('1001.jpg',180,42);

$pdf->ln(6);

$pdf->Cell('23',5,'Patient Name:',1,0,'L');
$pdf->Cell('57',5,$data['pname'],1,0,'L');
$pdf->Cell('10',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('25',5,$data['page'],1,1,'L');

$pdf->ln(3);

$pdf->Cell('12',5,'H(CM):',1,0,'L');
$pdf->Cell('10',5,$data2['height'],1,0,'L');
$pdf->Cell('12',5,'W(KG):',1,0,'L');
$pdf->Cell('10',5,$data2['weight'],1,0,'L');
$pdf->Cell('12',5,'BMI:',1,0,'L');
$pdf->Cell('10',5,$data2['pbmi'],1,0,'L');
$pdf->Cell('15',5,'Pluse:',1,0,'L');
$pdf->Cell('10',5,$data2['ppluse'],1,0,'L');
$pdf->Cell('7',5,'BP:',1,0,'L');
$pdf->Cell('18',5,$data2['pbp'],1,0,'L');
$pdf->Cell('15',5,'Temp(F):',1,0,'L');
$pdf->Cell('10',5,$data2['temp'],1,0,'L');
$pdf->Cell('12',5,'SPO2:',1,0,'L');
$pdf->Cell('10',5,$data2['spo2'],1,0,'L');
$pdf->Cell('10',5,'RR:',1,0,'L');
$pdf->Cell('10',5,$data2['rr'],1,0,'L');

$pdf->ln(8);




$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Clinical Details:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['cdetails'],0,1);


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Diagnosis:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['diagnosis'],0,1);


if($count11==0){
}
else {
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Medication Advised:',0,1,'L');
$count=1;
$query1 = mysqli_query($db,"select * from pmedi where pmrn='$pmrn' and dname='$dname'  and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('3' , 5,$count.'.',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'  '.$data1['brand'].' ('.$data1['medi'].')',0,1);
$pdf->MultiCell('182' , 5,'     '.$data1['pdos'],0,1);
$count++;
$pdf->ln(1);
}}



if($count10==0){
}
else {
$pdf->ln(3);	
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'LAB Advised:',0,1,'L');
$count=1;
$query1 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and dname='$dname' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('3' , 5,$count.'.',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'  '.$data1['medi']. " -" .$data1['ins'],0,1);
$count++;

}}
//$pdf->Cell('92' , 5,'Dosages',1,1,'C');


if($data['pdiet']==''){
}
else {
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('10',5,'DIET:',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('162' , 5,$data['pdiet'],0,1);


}


if($data['other']==''){
}
else {
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Other Advise:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['other'],0,1);

}

if($data['reffer']=='' and $data['reffer2']=='' and $data['reffer3']==''and $data['reffer4']==''and $data['reffer5']==''and $data['reffer6']==''){
}
else {
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Reffered To:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell ('182' , 5,$data['reffer']." ".$data['pdiet2']." ".$data['reffer2']." ".$data['pdiet3']." ".$data['reffer3']." ".$data['pdiet4']." ".$data['reffer4']." ".$data['pdiet5']." ".$data['reffer5']." ".$data['pdiet6']." ".$data['reffer6']." ".$data['pdiet7'],0,1);
}

if($data['fdate']=='1970-01-01' or '0000-00-00'){
}
else {
$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('40',5,'Next Follow Up Date:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 11);
	
$pdf->Cell('110' , 5,date('j-F-Y',strtotime($data['fdate'])),0,1);	
}

$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Computer Generated Prescription, No Signature Required',0,1,'R');


$pdf->Output();