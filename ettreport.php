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
$query = mysqli_query($db,"SELECT * from ett where pmrn='$pmrn' and eid='$eid' " );
$data = mysqli_fetch_array($query);
//$dname=$data['dname'];

//$query2 = mysqli_query($db,"SELECT * from inpatient where pmrn='$pmrn'");
//$data2 = mysqli_fetch_array($query2);

$dname=$data['dname'];
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
$this->ln(15);

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
$pdf->Cell('183',6,'ETT REPORT',1,1,'C');

//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->Cell('142',5,'Report Done Date & Time:',0,0,'R');
//$pdf->Cell('40',5,$data['date2'].', '.$data['stime'],0,1,'L');


$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('42',5,'Report Done By:',0,0,'L');
$pdf->Cell('65',5,$data['dname'],0,1,'L');
$pdf->SetFont('Arial','', 11);
$pdf->Cell('42',5);
$pdf->Cell('95',5,$data3['degree'],0,1,'L');
$pdf->Cell('42',3);
$pdf->Cell('80',3,$data3['Discipline'],0,1,'L');
$pdf->ln(2);
$pdf->SetFont('Arial' ,'', 12);
$pdf->Cell('42',5,'Referral From:',0,0,'L');
$pdf->Cell('65',5,$data['rname'],0,1,'L');
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





$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Clinical Diagnosis:',0,1,'L');
$pdf->SetFont('Arial' , '' , 9);
$pdf->MultiCell('170',5,$data['cdiag'],0,1);



$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Indication:',0,1,'L');
$pdf->SetFont('Arial' , '' , 9);
$pdf->MultiCell('170',5,$data['indication'],0,1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Clinical Data:',0,1,'L');
$pdf->SetFont('Arial' , '' , 9);
$pdf->MultiCell('170',5,$data['cdata'],0,1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Medication:',0,1,'L');
$pdf->SetFont('Arial' , '' , 9);
$pdf->MultiCell('170',5,$data['medication'],0,1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Protocol Used:',0,1,'L');
$pdf->SetFont('Arial' , '' , 9);
$pdf->MultiCell('170',5,$data['ssummary'],0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Test Summary:',0,1,'L');
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('25',50,'Excercise',1,0,'L');
$pdf->Cell('35',5,$data['ssummary'].' Protocol',1,0,'L');
$pdf->Cell('22',5,'Speed(MPH)',1,0,'L');
$pdf->Cell('29',5,'Elevation(% Grade)',1,0,'L');
$pdf->Cell('25',5,'Heart Rate(bpm)',1,0,'L');
$pdf->Cell('18',5,'BP(mm Hg)',1,0,'L');
$pdf->Cell('35',5,'Symptoms & Signs',1,1,'L');

$pdf->Cell('25');
$pdf->Cell('35',5,'Rest1',1,0,'L');
$pdf->Cell('22',5,'',1,0,'L');
$pdf->Cell('29',5,'',1,0,'L');
$pdf->Cell('25',5,'',1,0,'L');
$pdf->Cell('18',5,'',1,0,'L');
$pdf->Cell('35',5,'',1,1,'L');

$pdf->Cell('25');
$pdf->Cell('35',5,'Rest2',1,0,'L');
$pdf->Cell('22',5,'1.7',1,0,'C');
$pdf->Cell('29',5,'0',1,0,'C');
$pdf->Cell('25',5,$data['b5'],1,0,'C');
$pdf->Cell('18',5,$data['b6'],1,0,'C');
$pdf->Cell('35',5,$data['b7'],1,1,'C');

$pdf->Cell('25');
$pdf->Cell('35',5,'Rest3',1,0,'L');
$pdf->Cell('22',5,'1.7',1,0,'C');
$pdf->Cell('29',5,'5',1,0,'C');
$pdf->Cell('25',5,$data['c5'],1,0,'C');
$pdf->Cell('18',5,$data['c6'],1,0,'C');
$pdf->Cell('35',5,$data['c7'],1,1,'C');

$pdf->Cell('25');
$pdf->Cell('35',5,'Stage-1',1,0,'L');
$pdf->Cell('22',5,'1.7',1,0,'C');
$pdf->Cell('29',5,'10',1,0,'C');
$pdf->Cell('25',5,$data['d5'],1,0,'C');
$pdf->Cell('18',5,$data['d6'],1,0,'C');
$pdf->Cell('35',5,$data['d7'],1,1,'C');

$pdf->Cell('25');
$pdf->Cell('35',5,'Stage-2',1,0,'L');
$pdf->Cell('22',5,'2.5',1,0,'C');
$pdf->Cell('29',5,'12',1,0,'C');
$pdf->Cell('25',5,$data['e5'],1,0,'C');
$pdf->Cell('18',5,$data['e6'],1,0,'C');
$pdf->Cell('35',5,$data['e7'],1,1,'C');

$pdf->Cell('25');
$pdf->Cell('35',5,'Stage-3',1,0,'L');
$pdf->Cell('22',5,'3.4',1,0,'C');
$pdf->Cell('29',5,'14',1,0,'C');
$pdf->Cell('25',5,$data['f5'],1,0,'C');
$pdf->Cell('18',5,$data['f6'],1,0,'C');
$pdf->Cell('35',5,$data['f7'],1,1,'C');


$pdf->Cell('25');
$pdf->Cell('35',5,'Stage-4',1,0,'L');
$pdf->Cell('22',5,'4.2',1,0,'C');
$pdf->Cell('29',5,'16',1,0,'C');
$pdf->Cell('25',5,$data['g5'],1,0,'C');
$pdf->Cell('18',5,$data['g6'],1,0,'C');
$pdf->Cell('35',5,$data['g7'],1,1,'C');

$pdf->Cell('25');
$pdf->Cell('35',5,'Stage-5',1,0,'L');
$pdf->Cell('22',5,'5.0',1,0,'C');
$pdf->Cell('29',5,'18',1,0,'C');
$pdf->Cell('25',5,$data['h5'],1,0,'C');
$pdf->Cell('18',5,$data['h6'],1,0,'C');
$pdf->Cell('35',5,$data['h7'],1,1,'C');

$pdf->Cell('25');
$pdf->Cell('35',5,'Stage-6',1,0,'L');
$pdf->Cell('22',5,'5.5',1,0,'C');
$pdf->Cell('29',5,'20',1,0,'C');
$pdf->Cell('25',5,$data['i5'],1,0,'C');
$pdf->Cell('18',5,$data['i6'],1,0,'C');
$pdf->Cell('35',5,$data['i7'],1,1,'C');


$pdf->Cell('25',20,'Recovery',1,0,'L');
$pdf->Cell('35',5,'2 Min',1,0,'L');
$pdf->Cell('22',5,$data['j2'],1,0,'C');
$pdf->Cell('29',5,$data['j3'],1,0,'C');
$pdf->Cell('25',5,$data['j5'],1,0,'C');
$pdf->Cell('18',5,$data['j6'],1,0,'C');
$pdf->Cell('35',5,$data['j7'],1,1,'C');

$pdf->Cell('25');
$pdf->Cell('35',5,'4 Min',1,0,'L');
$pdf->Cell('22',5,$data['k2'],1,0,'C');
$pdf->Cell('29',5,$data['k3'],1,0,'C');
$pdf->Cell('25',5,$data['k5'],1,0,'C');
$pdf->Cell('18',5,$data['k6'],1,0,'C');
$pdf->Cell('35',5,$data['k7'],1,1,'C');

$pdf->Cell('25');
$pdf->Cell('35',5,'6 Min',1,0,'L');
$pdf->Cell('22',5,$data['l2'],1,0,'C');
$pdf->Cell('29',5,$data['l3'],1,0,'C');
$pdf->Cell('25',5,$data['l5'],1,0,'C');
$pdf->Cell('18',5,$data['l6'],1,0,'C');
$pdf->Cell('35',5,$data['l7'],1,1,'C');

$pdf->Cell('25');
$pdf->Cell('35',5,'8 Min',1,0,'L');
$pdf->Cell('22',5,$data['m2'],1,0,'C');
$pdf->Cell('29',5,$data['m3'],1,0,'C');
$pdf->Cell('25',5,$data['m5'],1,0,'C');
$pdf->Cell('18',5,$data['m6'],1,0,'C');
$pdf->Cell('35',5,$data['m7'],1,1,'C');








$pdf->ln(8);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('20',5,'Reson For Termination:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('170',5,$data['rt'],0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('100',5,'STRESS TEST DATA AND SUMMARY',0,1,'L');

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'Exercise time:',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('100',5,$data['etime1'],0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'Maximum Speed :',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('100',5,$data['mspeed'].' MPH',0,1);


$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'Estimated Maximum workload :',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('100',5,$data['emw'].' MPH',0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'Maximum Grade :',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('100',5,$data['mg'].' MPH',0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'Peak HR achieved :',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('100',5,$data['pha'].' MPH',0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'Resting ECG : WNL  :',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('100',5,$data['recg'].' MPH',0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'Maximum ST depression / elevation (>1mm) :',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('100',5,$data['msd'].' MPH',0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('90',5,'Leads with ST depression / elevation (>1mm):',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('100',5,$data['lsd'].' MPH',0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('90',5,'Type of ST-changes (depression / elevation):',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('100',5,$data['tsc'].' MPH',0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('90',5,'Exercise induced arrhythmia / heart block:',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('100',5,$data['eia'].' MPH',0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('90',5,'Exercise capacity:',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('100',5,$data['ec'].' MPH',0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('90',5,'Heart rate respose:',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('100',5,$data['hrr'].' MPH',0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('90',5,'Blood pressure respose:',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('100',5,$data['bpr'].' MPH',0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('90',5,'ECG changes during and or after the procedure:',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('100',5,$data['ecd'].' MPH',0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('90',5,'Recovery:',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('100',5,$data['recover'].' MPH',0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('90',5,'Other information (if any):',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('100',5,$data['oi'].' MPH',0,1);


$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('170',5,'OVERALL IMPRESSION: Positive / Negative / Equivocal / Inconclusive- ETT for electrocardiographic evidence of provocable myocardial ischemia. ',1,1);




$pdf->ln(5);
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