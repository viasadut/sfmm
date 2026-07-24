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
$query = mysqli_query($db,"SELECT * from echo where pmrn='$pmrn' and eid='$eid' " );
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
$this->ln(10);

}
function footer(){
$this->SetY(-20);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801703788561 (SFMMKPJSH/SPD/MR-02)',0,0,'C');


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
$pdf->Cell('183',6,$data['proname'].'  '.'REPORT',1,1,'C');

//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->Cell('182',5,'Report Done Date & Time:'.$data['dtime'],0,0,'R');
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





$pdf->ln(7);
$pdf->SetFont('Arial' , '' , 9);

$pdf->Cell('50',5,'Procedure Name:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['proname'],1,1);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->ln(3);
$pdf->Cell('50',5,'FINDINGS:',0,1,'L');
$pdf->SetFont('Arial' , '' , 9);
$pdf->MultiCell('170' , 5,$data['find'],0,1);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->ln(3);
$pdf->Cell('50',5,'ECHO WINDOW:',0,1,'L');
$pdf->SetFont('Arial' , '' , 9);
$pdf->MultiCell('170' , 5,$data['ewin'],0,1);


$pdf->SetFont('Arial' , 'b' , 12);

$pdf->Cell('50',5,'MEASUREMENTS:',0,0,'L');
$pdf->SetFont('Arial' , '' , 9);
$pdf->ln(8);
$pdf->Cell('30',5,'AO:',1,0,'L');
$pdf->Cell('25' , 5,$data['ao'].' '.'mm',1,0,'L');
$pdf->Cell('20',5,'LV-ID:',1,0,'L');
$pdf->Cell('25' , 5,$data['lvid'].' '.'mm',1,0,'L');
$pdf->Cell('20',5,'EF:',1,0,'L');
$pdf->Cell('25' , 5,$data['ef'].' '.'%',1,0,'L');
$pdf->Cell('20',5,'MVA:',1,0,'L');
$pdf->Cell('25' , 5,$data['mva'].' '.'cm2',1,1,'L');
$pdf->Cell('30',5,'LA:',1,0,'L');
$pdf->Cell('25' , 5,$data['la'].' '.'mm',1,0,'L');
$pdf->Cell('20',5,'LV-IDS:',1,0,'L');
$pdf->Cell('25' , 5,$data['lvids'].' '.'mm',1,0,'L');
$pdf->Cell('20',5,'IVSD:',1,0,'L');
$pdf->Cell('25' , 5,$data['ivsd'].' '.'mm',1,0,'L');
$pdf->Cell('20',5,'AV-RING:',1,0,'L');
$pdf->Cell('25' , 5,$data['avring'].' '.'mm',1,1,'L');
$pdf->Cell('30',5,'ACS:',1,0,'L');
$pdf->Cell('25' , 5,$data['acs'].' '.'mm',1,0,'L');
$pdf->Cell('20',5,'FS:',1,0,'L');
$pdf->Cell('25' , 5,$data['fs'].' '.'%',1,0,'L');
$pdf->Cell('20',5,'PWT:',1,0,'L');
$pdf->Cell('25' , 5,$data['pwt'].' '.'mm',1,0,'L');



$pdf->Cell('20',5,'EPSS:',1,0,'L');
$pdf->Cell('25' , 5,$data['epss'].' '.'mm',1,1,'L');
$pdf->Cell('30',5,'RVID:',1,0,'L');
$pdf->Cell('25' , 5,$data['rvid'].' '.'mm',1,0,'L');
$pdf->Cell('20',5,'MV-Annuals:',1,0,'L');
$pdf->Cell('25' , 5,$data['mvan'].' '.'mm',1,0,'L');
$pdf->Cell('20',5,'PA:',1,0,'L');
$pdf->Cell('25' , 5,$data['pa'].' '.'mm',1,0,'L');
$pdf->Cell('20',5,'TAPSE:',1,0,'L');
$pdf->Cell('25' , 5,$data['rvot'].' '.'mm',1,1,'L');
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('50',5,'CHAMBERS:',0,0,'L');
$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'LA:',0,0,'L');
$pdf->MultiCell('170',5,$data['la1'],0,1);
$pdf->Cell('50',5,'LV:',0,0,'L');
$pdf->MultiCell('170',5,$data['lv'],0,1);
$pdf->Cell('50',5,'RA:',0,0,'L');
$pdf->MultiCell('170',5,$data['ra'],0,1);
$pdf->Cell('50',5,'RV:',0,0,'L');
$pdf->MultiCell('170',5,$data['rv'],0,1);
$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('50',5,'VALVES :',0,0,'L');
$pdf->ln(5);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'MV:',0,0,'L');
$pdf->MultiCell('170',5,$data['mv'],0,1);
$pdf->Cell('50',5,'AV:',0,0,'L');
$pdf->MultiCell('170',5,$data['av'],0,1);
$pdf->Cell('50',5,'PV:',0,0,'L');
$pdf->MultiCell('170',5,$data['pv'],0,1);
$pdf->Cell('50',5,'TV:',0,0,'L');
$pdf->MultiCell('170',5,$data['tv'],0,1);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('50',5,'SEPTUM :',0,0,'L');
$pdf->ln(5);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'IAS:',0,0,'L');
$pdf->MultiCell('170',5,$data['ias'],0,1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'IVS:',0,0,'L');
$pdf->MultiCell('170',5,$data['ivs'],0,1);


$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('50',5,'PERICARDIUM:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('165',5,$data['peri'],0,1);

$pdf->Cell('50',5,'INTRACARDIAC MASS:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('170',5,$data['intramass'],0,1);

$pdf->Cell('50',5,'IVC:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('170',5,$data['ivc'],0,1);


$pdf->ln(5);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('30',5,'DOPPLER STUDY:',0,1,'L');

$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('30',5,'MEASUREMENT:',0,1,'L');
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('30',5,'Valves:',1,0,'L');
$pdf->Cell('30',5,'Velocity (m/sec):',1,0,'L');
$pdf->Cell('30',5,'PPG (mmHg):',1,0,'L');
$pdf->Cell('30',5,'MPG (mmHg):',1,0,'L');
$pdf->Cell('30',5,'Regurgitation:',1,0,'L');
$pdf->Cell('30',5,'Valve Area(cm2)',1,1,'L');
$pdf->Cell('30',5,'MV(0.6-1.3)',1,0,'L');
$pdf->Cell('30',5,$data['v1'],1,0,'L');
$pdf->Cell('30',5,$data['p1'],1,0,'L');
$pdf->Cell('30',5,$data['m1'],1,0,'L');
$pdf->Cell('30',5,$data['r1'],1,0,'L');
$pdf->Cell('30',5,$data['va1'],1,1,'L');
$pdf->Cell('30',5,'AV (1.0-1.7)',1,0,'L');
$pdf->Cell('30',5,$data['v2'],1,0,'L');
$pdf->Cell('30',5,$data['p2'],1,0,'L');
$pdf->Cell('30',5,$data['m2'],1,0,'L');
$pdf->Cell('30',5,$data['r2'],1,0,'L');
$pdf->Cell('30',5,$data['va2'],1,1,'L');
$pdf->Cell('30',5,'PV (0.6-0.7)',1,0,'L');
$pdf->Cell('30',5,$data['v3'],1,0,'L');
$pdf->Cell('30',5,$data['p3'],1,0,'L');
$pdf->Cell('30',5,$data['m3'],1,0,'L');
$pdf->Cell('30',5,$data['r3'],1,0,'L');
$pdf->Cell('30',5,$data['va3'],1,1,'L');
$pdf->Cell('30',5,'TV (0.3-0.7)',1,0,'L');
$pdf->Cell('30',5,$data['v4'],1,0,'L');
$pdf->Cell('30',5,$data['p4'],1,0,'L');
$pdf->Cell('30',5,$data['m4'],1,0,'L');
$pdf->Cell('30',5,$data['r4'],1,0,'L');
$pdf->Cell('30',5,$data['va4'],1,1,'L');
$pdf->ln(10);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('30',5,'Others:',0,1,'L');
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('15',5,'PHT:',1,0,'L');
$pdf->Cell('30',5,$data['pht'].' m/sec',1,0,'L');

$pdf->Cell('20',5,'EA- ration:',1,0,'L');
$pdf->Cell('30',5,$data['earation'].' m/sec',1,0,'L');

$pdf->Cell('15',5,'PASP:',1,0,'L');
$pdf->Cell('30',5,$data['pasp'].' mmHg',1,0,'L');

$pdf->Cell('15',5,'PADP:',1,0,'L');
$pdf->Cell('30',5,$data['padp'].' mmHg',1,1,'L');



$pdf->ln(2);
$pdf->Cell('40',5,'',0,1,'L');


$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40',5,'COLOUR FLOW MAPPING: Consistent with:',0,1,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('40',5,'Mitral Valve:',0,0,'L');
$pdf->MultiCell('150',5,$data['mvalve'],0,1);
$pdf->Cell('40',5,'Tricuspid Valve:',0,0,'L');
$pdf->MultiCell('150',5,$data['dvalve'],0,1);
$pdf->Cell('40',5,'Aortic Valve:',0,0,'L');
$pdf->MultiCell('150',5,$data['avalve'],0,1);
$pdf->Cell('40',5,'Pulmonary Valve:',0,0,'L');
$pdf->MultiCell('150',5,$data['pvalve'],0,1);
$pdf->Cell('40',5,'Corg. H. Disease:',0,0,'L');
$pdf->MultiCell('150',5,$data['eorg'],0,1);

$pdf->ln(5);

$pdf->Cell('90',5,'TEE/DSE/TISSUE DOPPLER/ OTHER INFORMATION:',0,0,'L');
$pdf->MultiCell('100',5,$data['tee'],0,1);

$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 12);


$pdf->ln(5);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('20',5,'Impression:',0,1,'L');
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('180',5,$data['impression'],0,1);

$pdf->ln(5);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('20',5,'Advice:',0,0,'L');
$pdf->MultiCell('180',5,$data['advice'],0,1);

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