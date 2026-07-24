<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');


$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];

//$dname=$_REQUEST['dname'];
//$bkdate=$_REQUEST['bkdate'];
//$id=['id'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from pac where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_array($query);



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
$this->ln(15);

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
$pdf->Cell('183',6,'Anaesthetic Chart',1,1,'C');
$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('183',5,'Date & Time: '.$data['etime'],0,1,'R');
//$this->SetFont('Arial','B',);
$pdf->ln(5);
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
$pdf->ln(6);


$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Patient Name:',1,0,'L');
$pdf->Cell('65',5,$data['pname'],1,0,'L');
$pdf->Cell('12',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('10',5,'Age:',1,0,'L');
$pdf->Cell('18',5,$data['page'],1,0,'L');
$pdf->Cell('15',5,'Sex:',1,0,'L');
$pdf->Cell('18',5,$data['psex'],1,1,'L');


$pdf->ln(2);
$pdf->Cell('30',5,'Induction Time:',1,0,'L');
$pdf->Cell('20',5,$data['induction'],1,0,'L');
$pdf->Cell('30',5,'Intubation Time:',1,0,'L');
$pdf->Cell('20',5,$data['intubation'],1,0,'L');
$pdf->Cell('30',5,'Patient Position:',1,0,'L');
$pdf->Cell('56',5,$data['pposition'],1,1,'L');

$pdf->ln(2);
$pdf->Cell('18',5,'Eye Care:',0,0,'L');
$pdf->MultiCell('150' , 5,$data['ecare'],0,1);

$pdf->ln(2);
$pdf->Cell('34',5,'Pressure Area Care:',0,0,'L');
$pdf->MultiCell('150' , 5,$data['acare'],0,1);

$pdf->ln(2);
$pdf->Cell('20',5,'Monitoring:',0,0,'L');
$pdf->MultiCell('150' , 5,$data['monitoring'],0,1);

$pdf->ln(2);
$pdf->SetFont('Arial' , 'Ub', 12);
$pdf->Cell('30',5,'Vascular Access',0,1,'L');

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('20',5,'Peripheral-',0,0,'L');
$pdf->Cell('10',5,'Site:',0,0,'L');
$pdf->Cell('26',5,$data['psite'].',',0,0,'L');
$pdf->Cell('10',5,'Size:',0,0,'L');
$pdf->Cell('30',5,$data['psize'],0,1,'L');



$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('20',5,'Central-',0,0,'L');
$pdf->Cell('10',5,'Site:',0,0,'L');
$pdf->Cell('26',5,$data['csite'],0,1,'L');



$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('25',5,'Arterial Line-',0,0,'L');
$pdf->Cell('10',5,'Site:',0,0,'L');
$pdf->Cell('26',5,$data['asite'],0,1,'L');


$pdf->ln(2);
$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('40',5,'Respiratory Management-',0,1,'L');

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'* Guedal Airway:',0,0,'L');
$pdf->Cell('10',5,$data['ga'],0,0,'L');
$pdf->Cell('40',5,'* Guedal Airway Size:',0,0,'L');
$pdf->Cell('60',5,$data['gasize'],0,1,'L');


$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'* LM:',0,0,'L');
$pdf->Cell('10',5,$data['lm'],0,0,'L');
$pdf->Cell('40',5,'* LM Size:',0,0,'L');
$pdf->Cell('60',5,$data['lmsize'],0,1,'L');


$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'* ETT:',0,0,'L');
$pdf->Cell('10',5,$data['ett'],0,0,'L');
$pdf->Cell('40',5,'* ETT Type:',0,0,'L');
$pdf->Cell('30',5,$data['ett1'],0,0,'L');
$pdf->Cell('40',5,'* ETT Size:',0,0,'L');
$pdf->Cell('60',5,$data['ett2'],0,1,'L');

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'* Tracheostomy:',0,0,'L');
$pdf->Cell('10',5,$data['trache'],0,0,'L');
$pdf->Cell('40',5,'* Tracheostomy Size:',0,0,'L');
$pdf->Cell('60',5,$data['trache1'],0,1,'L');

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'* HG Tube:',0,0,'L');
$pdf->Cell('10',5,$data['ng'],0,0,'L');
$pdf->Cell('40',5,'* NG Type:',0,0,'L');
$pdf->Cell('30',5,$data['ng1'],0,0,'L');
$pdf->Cell('40',5,'* NG Size:',0,0,'L');
$pdf->Cell('60',5,$data['ng2'],0,1,'L');



$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('17',5,'Circuit-',0,0,'L');
$pdf->Cell('40',5,$data['circuit'],0,0,'L');
$pdf->Cell('20',5,'Ventilation-',0,0,'L');
$pdf->Cell('50',5,$data['ventilation'],0,1,'L');


$pdf->ln(2);
$pdf->Cell('40',5,'Gas Flow-',0,1,'L');
$pdf->Cell('180',5,$data['gasflow'],0,1,'L');

$pdf->ln(2);
$pdf->Cell('40',5,'Spontaneous Respiration-',0,1,'L');
$pdf->Cell('180',5,$data['spontaneous'],0,1,'L');

$pdf->ln(2);
$pdf->Cell('40',5,'PPV-',0,1,'L');
$pdf->Cell('180',5,$data['ppv'],0,1,'L');

$pdf->ln(2);
$pdf->Cell('40',5,'VT-',0,1,'L');
$pdf->Cell('180',5,$data['vt'],0,1,'L');

$pdf->ln(2);
$pdf->Cell('40',5,'V-',0,1,'L');
$pdf->Cell('180',5,$data['v'],0,1,'L');

$pdf->ln(2);
$pdf->Cell('40',5,'F-',0,1,'L');
$pdf->Cell('180',5,$data['f'],0,1,'L');

$pdf->ln(2);
$pdf->Cell('40',5,'inmax-',0,1,'L');
$pdf->Cell('180',5,$data['inmax'],0,1,'L');





$pdf->ln(2);
$pdf->Cell('47',5,'Rapid Sequence Intubation-',0,0,'L');
$pdf->Cell('10',5,$data['rapid'],0,1,'L');
$pdf->ln(2);
$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('40',5,'Laryngoscopy Grading-',0,1,'L');


$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('40',5,'Regional Technique-',0,0,'L');
$pdf->Cell('60',5,$data['rtechnique'],0,1,'L');

$pdf->ln(2);
$pdf->Cell('40',5,'Level-',0,1,'L');
$pdf->Cell('180',5,$data['rlevel'],0,1,'L');

$pdf->ln(2);
$pdf->Cell('40',5,'Drugs-',0,1,'L');
$pdf->Cell('180',5,$data['rdrugs'],0,1,'L');

$pdf->ln(2);
$pdf->Cell('40',5,'Others-',0,1,'L');
$pdf->Cell('180',5,$data['rothers'],0,1,'L');


$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('100',5,'Difficulities / Critical Events-',0,1,'L');
$pdf->MultiCell('180',5,$data['rtechnique'],0,1);


$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Medication Chart:',0,1,'L');
$query1 = mysqli_query($db,"select * from dialysismedi where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['time'].', Medication - '.$data1['infusion'].',Doasge- '.$data1['instruc'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'infusion Chart:',0,1,'L');
$query1 = mysqli_query($db,"select * from dialysisinfusion where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['otime'].', Infusion - '.$data1['infusion'].',Additive- '.$data1['addi'].' + '.$data1['add1'].',Doasge- '.$data1['infu1'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'N2O/Air:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaesn2o where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['odate'].', Infusion - '.$data1['infusion'].' Flow- '.$data1['room'],0,1);

$pdf->ln(1);
}



$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Volatile Agent:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaesagent where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['odate'].', Medication - '.$data1['infusion'].' Flow- '.$data1['room'],0,1);

$pdf->ln(1);
}

$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Blood Sugar:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaesbsugar where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['odate'].', Blood Sugar - '.$data1['infusion'].' Remarks-  '.$data1['room'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Blood Loss:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaesbloss where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['odate'].', Blood Loss - '.$data1['infusion'].' Remarks-  '.$data1['room'],0,1);

$pdf->ln(1);
}



$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Urine Output:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaesurine where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['odate'].', Amount - '.$data1['infusion'].' Remarks- '.$data1['room'],0,1);

$pdf->ln(1);
}



$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Peroperative Investigations:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaesinves where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['odate'].', Investigation - '.$data1['infusion'].' Result-  '.$data1['room'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Blood Transfusion Order:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaesbtrans where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['odate'].', Blood Type - '.$data1['infusion'].' Amount- '.$data1['room'],0,1);

$pdf->ln(1);
}



$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Other Fluid Loss:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaesother where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['odate'].', Type - '.$data1['infusion'].' Amount- '.$data1['room'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Tourniqute:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaestour where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['odate'].', Type - '.$data1['infusion'].' Site- , '.$data1['room'].' Padding- , '.$data1['pad'].' Application Time- , '.$data1['atime'].' Release Time- , '.$data1['rtime'],0,1);

$pdf->ln(1);
}




$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Pulse:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaespulse where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['date2'].', Score - '.$data1['score1'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'SBP:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaessbp where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['date2'].', Score - '.$data1['score1'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'DBP:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaessbp where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['date2'].', Score - '.$data1['score2'],0,1);

$pdf->ln(1);
}

$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'RR:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaesrr where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['date2'].', Score - '.$data1['score1'],0,1);

$pdf->ln(1);
}

$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Temparature:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaestemp where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['date2'].', Score - '.$data1['score1'],0,1);

$pdf->ln(1);
}

$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'SPO2:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaesspo2 where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['date2'].', Score - '.$data1['score1'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'ETCO2:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaesetco2 where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['date2'].', Score - '.$data1['score1'],0,1);

$pdf->ln(1);
}

$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'CVP:',0,1,'L');
$query1 = mysqli_query($db,"select * from anaescvp where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['date2'].', Score - '.$data1['score1'],0,1);

$pdf->ln(1);
}








$pdf->ln(20);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Consultants Signature:',0,1,'R');




//$pdf->SetFont('Arial' , 'b' , 15);
//$pdf->Cell('90',5,'OUT PATIENT RECORD',1,0,'L');


//$pdf->ln(10);
//$pdf->MultiCell('160' , 5,$data['xl'],1,1);
//$pdf->Cell('30' , 5,'Doasge',1,1);
//$pdf->MultiCell('160' , 5,'jashfjh sjfh jsdhfjsdhjfh jsdhjf hjsdhfj dsjhf djsh jfdshjf dsjhf jdsh fdhsf hjsdhf sdhf jdhsf hdsjfhjsdhf sdhf jdshjfhjskdhf jsdh fjhsdjkf hjdsfjd s',1,1);





$pdf->Output();
?>