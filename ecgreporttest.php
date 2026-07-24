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
$query = mysqli_query($db,"SELECT * from ecg where pmrn='$pmrn' and eid='$eid' " );
$data = mysqli_fetch_array($query);
//$dname=$data['dname'];

//$query2 = mysqli_query($db,"SELECT * from inpatient where pmrn='$pmrn'");
//$data2 = mysqli_fetch_array($query2);

$dname=$data['dname1'];
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
$this->Cell(0,10,'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801703788561 (SFMMKPJSH/SPD/MR-01)',0,0,'C');


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
$pdf->Cell('183',6,$data['ron'].'  '.'REPORT',1,1,'C');

//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->Cell('142',5,'Report Done Date & Time:',0,0,'R');
$pdf->Cell('40',5,$data['date2'].', '.$data['stime'],0,1,'L');


$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('42',5,'Report Done By:',0,0,'L');
$pdf->Cell('65',5,$data['dname1'],0,1,'L');
$pdf->SetFont('Arial','', 11);
$pdf->Cell('42',5);
$pdf->Cell('95',5,$data3['degree'],0,1,'L');
$pdf->Cell('42',3);
$pdf->Cell('80',3,$data3['Discipline'],0,1,'L');
$pdf->ln(2);
$pdf->SetFont('Arial' ,'', 12);
$pdf->Cell('42',5,'Referral From:',0,0,'L');
$pdf->Cell('65',5,$data['dname'],0,1,'L');
$pdf->ln(6);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('15',5,$data['page'],1,1,'L');





$pdf->ln(7);
$pdf->SetFont('Arial' , '' , 9);

$pdf->Cell('50',5,'Q Wave:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['qwave'],1,1);
$pdf->ln(1);
$pdf->Cell('50',5,'Auric. Rate (Per Min):',1,0,'L');
$pdf->MultiCell('132' , 5,$data['arate'],1,1);
$pdf->ln(1);
$pdf->Cell('50',5,'S-T Segment:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['st'],1,1);
$pdf->ln(1);
$pdf->Cell('50',5,'Rhythm:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['rhy'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'T Wave:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['twave'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'P-Wave:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['pwave'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Q-T Interval (Sec):',1,0,'L');
$pdf->MultiCell('132' , 5,$data['qt'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'P-R Interval (Sec):',1,0,'L');
$pdf->MultiCell('132' , 5,$data['pr'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'QTc (Sec): ',1,0,'L');
$pdf->MultiCell('132' , 5,$data['qtc'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'QRS Interval (Sec):',1,0,'L');
$pdf->MultiCell('132' , 5,$data['qrs'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'U-Wave:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['uwave'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'QRS Configuration:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['qrsc'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Ectopic Beats:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['ebeats'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'QRS Voltage (mim):',1,0,'L');
$pdf->MultiCell('132' , 5,$data['qrsvol'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Others:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['others'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Elec. Axis:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['eaxis'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Position / Rotation:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['poro'],1,1);

$pdf->ln(5);

$pdf->SetFont('Arial' , '' , 12);
$pdf->Cell('182',5,'Comments:',0,1,'L');

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 12);

$pdf->MultiCell('182' , 5,$data['comments'],0,1);

$pdf->ln(2);
$pdf->MultiCell('182' , 5,$data['advice'],0,1);

$pdf->ln(5);


$pdf->Image('spdpic/'.$data['upload'],15,7);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'System Generated Report, No Need Signature',0,1,'R');




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