<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');


/*$id=$_REQUEST['id'];
$pmrn2=$_REQUEST['pmrn'];
$pmrn=$_REQUEST['pmrn'];*/

$print_time=date('d/m/Y H:i:s');
$id=$_REQUEST['id'];
$eid=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];

//$dname=$_REQUEST['dname'];
//$bkdate=$_REQUEST['bkdate'];
//$id=['id'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from otpac where id='$id'");
$data = mysqli_fetch_array($query);


$query_ot= mysqli_query($db,"select * from ot where id='$id'");
$data_ot = mysqli_fetch_array($query_ot);



/*$query = mysqli_query($db,"select * from otpac where eid='$id' and pmrn='$pmrn2'");
$data = mysqli_fetch_array($query);

//$pmrn=$data['pmrn'];
$eid=$_REQUEST['id'];


$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from doctor1 where dname='$dname'");
$data2 = mysqli_fetch_array($query2);
*/
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
$pdf->Cell('65',5,$data_ot['pname'],1,0,'L');
$pdf->Cell('12',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data_ot['pmrn'],1,0,'L');
$pdf->Cell('10',5,'Age:',1,0,'L');
$pdf->Cell('18',5,$data_ot['page'],1,0,'L');
$pdf->Cell('15',5,'Sex:',1,0,'L');
$pdf->Cell('18',5,$data_ot['psex'],1,1,'L');



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




$pdf->ln(2);
$pdf->Cell('30',5,'Induction Time:',1,0,'L');
$pdf->Cell('56',5,$data['induction'],1,0,'L');
$pdf->Cell('30',5,'Intubation Time:',1,0,'L');
$pdf->Cell('70',5,$data['intubation'],1,1,'L');

$pdf->ln(2);
$pdf->Cell('18',5,'Name Of The Surgery:',0,0,'L');
$pdf->MultiCell('150' , 5,$data['proce'],0,1);

$pdf->ln(2);
$pdf->Cell('34',5,'Anesthesia start time:',0,0,'L');
$pdf->MultiCell('150' , 5,$data['anaestime'],0,1);

$pdf->ln(2);
$pdf->Cell('20',5,'Communication With Patient:',0,0,'L');
$pdf->MultiCell('150' , 5,$data['com'],0,1);



$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Type Of Anesthesia:',0,1,'L');
$querya = mysqli_query($db,"select * from otanaestype where pmrn='$pmrn' and eid='$eid'");

while($dataa = mysqli_fetch_array($querya))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$dataa['odate'].', Type - '.$dataa['infusion'].', User - '.$dataa['user'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Patient Position:',0,1,'L');
$queryb = mysqli_query($db,"select * from otanaesposition where pmrn='$pmrn' and eid='$eid'");

while($datab = mysqli_fetch_array($queryb))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$datab['odate'].', Type - '.$datab['infusion'].', User - '.$datab['user'],0,1);

$pdf->ln(1);
}




$pdf->ln(2);
$pdf->Cell('20',5,'Difficulty level of the case:',0,0,'L');
$pdf->MultiCell('150' , 5,$data['dl'],0,1);



$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Care and Monitor:',0,1,'L');
$queryc = mysqli_query($db,"select * from otanaescare where pmrn='$pmrn' and eid='$eid'");

while($datac = mysqli_fetch_array($queryc))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$datac['odate'].', Type - '.$datac['infusion'].', Remarks - '.$datac['room'].', User - '.$datac['user'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Vascular Access:',0,1,'L');
$queryd = mysqli_query($db,"select * from otanaesvas where pmrn='$pmrn' and eid='$eid'");

while($datad = mysqli_fetch_array($queryd))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$datad['odate'].', Type - '.$datad['infusion'].', Remarks - '.$datad['room'].', User - '.$datad['user'],0,1);

$pdf->ln(1);
}



$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Respiratory Management:',0,1,'L');
$querye = mysqli_query($db,"select * from otanaesres where pmrn='$pmrn' and eid='$eid'");

while($datae = mysqli_fetch_array($querye))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$datae['odate'].', Type - '.$datae['infusion'].', Remarks - '.$datae['room'].', User - '.$datae['user'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Volatile Agents:',0,1,'L');
$queryf = mysqli_query($db,"select * from otanaesvol where pmrn='$pmrn' and eid='$eid'");

while($dataf = mysqli_fetch_array($queryf))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$dataf['odate'].', Type - '.$dataf['infusion'].', Remarks - '.$dataf['room'].', User - '.$dataf['user'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Volatile Agents:',0,1,'L');
$queryg = mysqli_query($db,"select * from circuit where pmrn='$pmrn' and eid='$eid'");

while($datag = mysqli_fetch_array($queryg))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Date - '.$datag['adate1'].', Time - '.$datag['time'].', Score - '.$datag['cval'].', User - '.$datag['user'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'HME:',0,1,'L');
$queryh = mysqli_query($db,"select * from hme where pmrn='$pmrn' and eid='$eid'");

while($datah = mysqli_fetch_array($queryh))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Date - '.$datah['adate1'].', Time - '.$datah['time'].', Score - '.$datah['cval'].', User - '.$datah['user'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Preoxygenation:',0,1,'L');
$queryi = mysqli_query($db,"select * from peroxy where pmrn='$pmrn' and eid='$eid'");

while($datai = mysqli_fetch_array($queryi))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Date - '.$datai['adate1'].', Time - '.$datai['time'].', Score - '.$datai['cval'].', User - '.$datai['user'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Ventilation:',0,1,'L');
$queryj = mysqli_query($db,"select * from ventilation where pmrn='$pmrn' and eid='$eid'");

while($dataj = mysqli_fetch_array($queryj))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Date - '.$dataj['adate1'].', Time - '.$dataj['time'].', Score - '.$dataj['cval'].', User - '.$dataj['user'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Gasflow:',0,1,'L');
$queryk = mysqli_query($db,"select * from gasflow where pmrn='$pmrn' and eid='$eid'");

while($datak = mysqli_fetch_array($queryk))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Date - '.$datak['adate1'].', Time - '.$datak['time'].', Score - '.$datak['cval'].', User - '.$datak['user'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'PPV:',0,1,'L');
$queryl = mysqli_query($db,"select * from ppv where pmrn='$pmrn' and eid='$eid'");

while($datal = mysqli_fetch_array($queryl))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Date - '.$datal['adate1'].', Time - '.$datal['time'].', Score - '.$datal['cval'].', User - '.$datal['user'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Spontaneous Respiration:',0,1,'L');
$querym = mysqli_query($db,"select * from res where pmrn='$pmrn' and eid='$eid'");

while($datam = mysqli_fetch_array($querym))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Date - '.$datam['adate1'].', Time - '.$datam['time'].', Score - '.$datam['cval'].', User - '.$datam['user'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Tidal Volume (VT):',0,1,'L');
$queryn = mysqli_query($db,"select * from vt where pmrn='$pmrn' and eid='$eid'");

while($datan = mysqli_fetch_array($queryn))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Date - '.$datan['adate1'].', Time - '.$datan['time'].', Score - '.$datan['cval'].', User - '.$datan['user'],0,1);

$pdf->ln(1);
}



$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Minute Volume (MV):',0,1,'L');
$queryo = mysqli_query($db,"select * from mv where pmrn='$pmrn' and eid='$eid'");

while($datao = mysqli_fetch_array($queryo))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Date - '.$datao['adate1'].', Time - '.$datao['time'].', Score - '.$datao['cval'].', User - '.$datao['user'],0,1);

$pdf->ln(1);
}



$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Frequency (F):',0,1,'L');
$queryp= mysqli_query($db,"select * from f where pmrn='$pmrn' and eid='$eid'");

while($datap = mysqli_fetch_array($queryp))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Date - '.$datap['adate1'].', Time - '.$datap['time'].', Score - '.$datap['cval'].', User - '.$datap['user'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'CO2 Absorption:',0,1,'L');
$queryq = mysqli_query($db,"select * from co2a where pmrn='$pmrn' and eid='$eid'");

while($dataq = mysqli_fetch_array($queryq))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Date - '.$dataq['adate1'].', Time - '.$dataq['time'].', Score - '.$dataq['cval'].', User - '.$dataq['user'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);


$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Medication Chart:',0,1,'L');
$query1 = mysqli_query($db,"select * from otanaesmedi where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['ortime'].', Medication - '.$data1['infusion'].',Doasge- '.$data1['instruc'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'infusion Chart:',0,1,'L');
$query1 = mysqli_query($db,"select * from otanaesinfusion where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaesn2o where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaesagent where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaesbsugar1 where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaesbloss where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaesurine where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaesinves where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaesbtrans where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaesother where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaestour where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaespulse where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaessbp where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaessbp where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaesrr where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaestemp where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaesspo2 where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaesetco2 where pmrn='$pmrn' and eid='$eid'");

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
$query1 = mysqli_query($db,"select * from otanaescvp where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$data1['date2'].', Score - '.$data1['score1'],0,1);

$pdf->ln(1);
}



$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Invasive BP:',0,1,'L');
$querykk = mysqli_query($db,"select * from otanaesibp where pmrn='$pmrn' and eid='$eid'");

while($datakk = mysqli_fetch_array($querykk))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$datakk['date2'].', Score - '.$datakk['score1'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Urine Output:',0,1,'L');
$queryll = mysqli_query($db,"select * from otanaesurine where pmrn='$pmrn' and eid='$eid'");

while($datall = mysqli_fetch_array($queryll))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$datall['date2'].', Score - '.$datall['score1'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Blood Sugar:',0,1,'L');
$queryll = mysqli_query($db,"select * from otanaesbsugar1 where pmrn='$pmrn' and eid='$eid'");

while($datall = mysqli_fetch_array($queryll))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$datall['odate'].', Score - '.$datall['infusion'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Blood loss (ml)	:',0,1,'L');
$queryll1 = mysqli_query($db,"select * from otanaesbloss where pmrn='$pmrn' and eid='$eid'");

while($datall1 = mysqli_fetch_array($queryll1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$datall1['odate'].', Score - '.$datall1['infusion'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Blood transfusion (ml):',0,1,'L');
$queryll2 = mysqli_query($db,"select * from otanaesbtrans where pmrn='$pmrn' and eid='$eid'");

while($datall2 = mysqli_fetch_array($queryll2))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$datall2['odate'].', Score - '.$datall2['infusion'],0,1);

$pdf->ln(1);
}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('182',5,'Other fluid loss (ml):',0,1,'L');
$queryll3 = mysqli_query($db,"select * from otanaesother where pmrn='$pmrn' and eid='$eid'");

while($datall3 = mysqli_fetch_array($queryll3))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'Time - '.$datall3['odate'].', Score - '.$datall3['infusion'],0,1);

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