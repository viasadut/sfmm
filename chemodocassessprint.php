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
$query = mysqli_query($db,"SELECT * from chemomassess where pmrn='$pmrn' and eid='$eid'" );
$data = mysqli_fetch_array($query);
//$dname=$data['dname'];

$query2 = mysqli_query($db,"SELECT * from chemopapp where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$dname=$data['dname'];
$query3 = mysqli_query($db,"select * from doctor1 where dname='$dname'");
$data3 = mysqli_fetch_array($query3);

$query4 = mysqli_query($db,"SELECT * from incmedi where pmrn='$pmrn' and eid='$eid'");
$data4 = mysqli_fetch_array($query4);

$query5 = mysqli_query($db,"SELECT * from pastsurgery where pmrn='$pmrn'");
$data5 = mysqli_fetch_array($query5);

$query6 = mysqli_query($db,"SELECT * from allcomor where pmrn='$pmrn'");
$data6 = mysqli_fetch_array($query6);

$query7 = mysqli_query($db,"SELECT * from allvacine where pmrn='$pmrn'");
$data7 = mysqli_fetch_array($query7);

$query8 = mysqli_query($db,"SELECT * from pasthistory where pmrn='$pmrn'");
$data8 = mysqli_fetch_array($query8);

$query9 = mysqli_query($db,"SELECT * from familyhistory where pmrn='$pmrn'");
$data9 = mysqli_fetch_array($query9);

$query10 = mysqli_query($db,"SELECT * from feedhistory where pmrn='$pmrn'");
$data10 = mysqli_fetch_array($query10);

$query11 = mysqli_query($db,"SELECT * from dhistory where pmrn='$pmrn'");
$data11 = mysqli_fetch_array($query11);


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
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561 (SFMMKPJSH/IPD/MR-01)',0,0,'C');


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
$pdf->Cell('183',6,'Doctors Assessment',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('135',5,'Episode:',0,0,'R');
$pdf->Cell('5',5,$data['eid'],0,0,'L');



$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('54',5,'Assessment Done By:',0,0,'L');
$pdf->Cell('75',5,$data['dname'],0,1,'L');
$pdf->SetFont('Arial','', 11);
$pdf->Cell('42',5);
$pdf->Cell('95',5,$data3['degree'],0,1,'L');
$pdf->Cell('42',3);
$pdf->Cell('80',3,$data3['Discipline'],0,1,'L');
$pdf->SetFont('Arial' , 'b' , 9);

$pdf->ln(6);

$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data2['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data2['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data2['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('15',5,$data2['page'],1,1,'L');



$pdf->Cell('15',5,'WARD:',1,0,'L');
$pdf->Cell('25',5,'Onchology',1,0,'L');
$pdf->Cell('15',5,'BED:',1,0,'L');
$pdf->Cell('33',5,'Onchology-01',1,0,'L');
$pdf->Cell('20',5,'Adm. Date:',1,0,'L');
$pdf->Cell('35',5,$data2['adate'],1,0,'L');
$pdf->Cell('20',5,'Ass. Time:',1,0,'L');
$pdf->Cell('20',5,$data['astime'],1,1,'L');


$pdf->ln(3);

$pdf->Cell('50',5,'Source Of History:',1,0,'L');
$pdf->Cell('132',5,$data['shistory'],1,1,'L');

$pdf->ln(1);
$pdf->Cell('50',5,'Chief Complaints:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['ccom'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'History Of Present Illness:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['pill'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'General Examination:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['gexam'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Abdomen:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['abdomen'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Respiratory:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['res'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Cardiovascular:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['car'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Nervous System:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['nsys'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'ENT:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['ent'],1,1);


$pdf->ln(1);
$pdf->Cell('50',5,'Breast:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['breast'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Genitalia:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['gen'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Musculoskeletal:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['mus'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Extrimities:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['ex'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Urological:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['uro'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Functional Assessment:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['func'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Diagnosis:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['diag'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Management Plan:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['mplan'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Discharge Plan:',1,0,'L');
$pdf->MultiCell('132' , 5,$data['dplan'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Current Medication:',1,0,'L');
$pdf->MultiCell('132' , 5,$data4['ins'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Reconciled The Medicine:',1,0,'L');
$pdf->MultiCell('132' , 5,$data4['ins1'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Past Surgery History:',1,0,'L');
$pdf->MultiCell('132' , 5,$data5['ins'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Comorbidities :',1,0,'L');
$pdf->MultiCell('132' , 5,$data6['medi'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Vaccine History :',1,0,'L');
$pdf->MultiCell('132' , 5,$data7['medi'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Past History :',1,0,'L');
$pdf->MultiCell('132' , 5,$data8['ins'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Family History :',1,0,'L');
$pdf->MultiCell('132' , 5,$data9['ins'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Feed History :',1,0,'L');
$pdf->MultiCell('132' , 5,$data10['ins'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Development History :',1,0,'L');
$pdf->MultiCell('132' , 5,$data11['ins'],1,1);



//$pdf->Cell('92' , 5,'Dosages',1,1,'C');

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