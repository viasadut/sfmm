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
$query = mysqli_query($db,"SELECT * from emergency where pmrn='$pmrn' and eid='$eid'" );
$data = mysqli_fetch_array($query);
//$dname=$data['dname'];


$querye = mysqli_query($db,"SELECT * from eassess where pmrn='$pmrn' and eid='$eid'" );
$datae = mysqli_fetch_array($querye);



$query2 = mysqli_query($db,"SELECT * from emergency where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

//$dname=$data['dname'];
//$query3 = mysqli_query($db,"select * from doctor1 where dname='$dname'");
//$data3 = mysqli_fetch_array($query3);

$query4 = mysqli_query($db,"SELECT * from incmedi where pmrn='$pmrn' and eid='$eid'");
$data4 = mysqli_fetch_array($query4);

$query5 = mysqli_query($db,"SELECT * from pastsurgery where pmrn='$pmrn' and eid='$eid'");
$data5 = mysqli_fetch_array($query5);

$query6 = mysqli_query($db,"SELECT * from allcomor where pmrn='$pmrn' and eid='$eid'");
$data6 = mysqli_fetch_array($query6);

$query7 = mysqli_query($db,"SELECT * from allvacine where pmrn='$pmrn' and eid='$eid'");
$data7 = mysqli_fetch_array($query7);

$query8 = mysqli_query($db,"SELECT * from pasthistory where pmrn='$pmrn' and eid='$eid'");
$data8 = mysqli_fetch_array($query8);

$query9 = mysqli_query($db,"SELECT * from familyhistory where pmrn='$pmrn' and eid='$eid'");
$data9 = mysqli_fetch_array($query9);

$query10 = mysqli_query($db,"SELECT * from feedhistory where pmrn='$pmrn' and eid='$eid'");
$data10 = mysqli_fetch_array($query10);

$query11 = mysqli_query($db,"SELECT * from dhistory where pmrn='$pmrn' and eid='$eid'");
$data11 = mysqli_fetch_array($query11);

$query12 = mysqli_query($db,"select * from gcs where pmrn='$pmrn' and eid='$eid'");
$data12 = mysqli_fetch_array($query12);


//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){
$this->Image('logo1.jpg',15,7);
//$this->Image('logo1.jpg',180,7);
$this->SetFont('Arial','B',12);
//$this->Cell(190,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
//$this->Ln(3);
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
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561 (SFMMKPJSH/A&E/MR-03)',0,0,'C');


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
$pdf->Cell('183',6,'A&E SUMMARY REPORT',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('135',5,'Episode:',0,0,'R');
$pdf->Cell('5',5,$data['eid'],0,0,'L');




$pdf->ln(6);

$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data2['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data2['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data2['gender'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('15',5,$data2['age'],1,1,'L');



$pdf->Cell('15',5,'ZONE:',1,0,'L');
$pdf->Cell('25',5,$data2['room'],1,0,'L');
$pdf->Cell('20',5,'Adm. Date:',1,0,'L');
$pdf->Cell('35',5,$data2['adate'],1,1,'L');

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'TRIAGE SUMMARY BY('.$data12['ad_by_name'].')',1,1,'L');

$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('30',5,'Mode Of Arrival',1,0,'L');
$pdf->Cell('25',5,$data12['moa'],1,0,'L');
$pdf->Cell('23',5,'Accompany',1,0,'L');
$pdf->Cell('30',5,$data12['accom'],1,0,'L');
$pdf->Cell('46',5,'Level of Consciousness',1,0,'L');
$pdf->Cell('28',5,$data12['lcon'],1,1,'L');
$pdf->Cell('25',5,'Mental Status',1,0,'L');
$pdf->Cell('20',5,$data12['mstatus'],1,0,'L');
$pdf->Cell('25',5,'Height (CM):	',1,0,'L');
$pdf->Cell('20',5,$data12['ph'],1,0,'L');
$pdf->Cell('25',5,'Weight (KG)',1,0,'L');
$pdf->Cell('20',5,$data12['pw'],1,0,'L');
$pdf->Cell('30',5,'Temperature(C)',1,0,'L');
$pdf->Cell('17',5,$data12['pt'],1,1,'L');
$pdf->Cell('17',5,'Pluse',1,0,'L');
$pdf->Cell('20',5,$data12['pp'],1,0,'L');
$pdf->Cell('8',5,'BP',1,0,'L');
$pdf->Cell('20',5,$data12['pbp'],1,0,'L');
$pdf->Cell('32',5,'Respiration(bpm)',1,0,'L');
$pdf->Cell('20',5,$data12['pr'],1,0,'L');
$pdf->Cell('37',5,'O2 Sat%',1,0,'L');
$pdf->Cell('28',5,$data12['po'],1,1,'L');
$pdf->Cell('45',5,'Glucosemmol/l:',1,0,'L');
$pdf->Cell('20',5,$data12['pb'],1,1,'L');

$pdf->ln(1);

$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('60',5,'Pain Score:',1,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('122' , 5,$data12['pain'],1,1);

$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('60',5,'COMA SCALE(GCS):',1,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('122' , 5,$data12['c4'],1,1);

$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('60',5,'Presenting Complaints:',1,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('122' , 5,$data12['pc'],1,1);



$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('60',5,'CO-Morbidities:',1,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('122' , 5,$data12['pcom'],1,1);

$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('60',5,'Allergies:',1,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('122' , 5,$data12['pall'],1,1);

$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('60',5,'Past Medical / Surgical History:',1,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('122' , 5,$data12['psur'],1,1);


$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'DOCTORS ASSESSMENT',1,1,'L');


$pdf->Cell('20',5,'Ass. Time:',1,0,'L');
$pdf->Cell('40',5,$datae['astime'],1,0,'L');

$pdf->Cell('20',5,'Ass. By:',1,0,'L');
$pdf->Cell('102',5,$datae['dname'],1,1,'L');

$pdf->ln(3);

$pdf->Cell('50',5,'Source Of History:',1,0,'L');
$pdf->Cell('132',5,$datae['shistory'],1,1,'L');

$pdf->ln(1);
$pdf->Cell('50',5,'Chief Complaints:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['ccom'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'History Of Present Illness:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['pill'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'General Examination:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['gexam'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Abdomen:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['abdomen'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Respiratory:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['res'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Cardiovascular:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['car'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Nervous System:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['nsys'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'ENT:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['ent'],1,1);


$pdf->ln(1);
$pdf->Cell('50',5,'Breast:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['breast'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Genitalia:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['gen'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Musculoskeletal:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['mus'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Extrimities:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['ex'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Urological:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['uro'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Functional Assessment:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['func'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Diagnosis:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['diag'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Management Plan:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['mplan'],1,1);

$pdf->ln(1);
$pdf->Cell('50',5,'Discharge Plan:',1,0,'L');
$pdf->MultiCell('132' , 5,$datae['dplan'],1,1);





$pdf->ln(5);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'NURSES NOTE:',1,1,'L');
$pdf->ln(1);
$query1 = mysqli_query($db,"select * from ennote where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , 'b' , 10);
$yy=$data1['user'];
$queryeb = mysqli_query($db,"SELECT * from user where uname='$yy'" );
$dataeb = mysqli_fetch_array($queryeb);


$pdf->Cell('182' , 5,$dataeb['fullname'].'-'.$data1['odate'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['inves'],1,1);

}
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'DOCTORS NOTE:',1,1,'L');
$pdf->ln(1);
$query1 = mysqli_query($db,"select * from ecnote where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['pnote'],1,1);

}

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'NURSES PROCEDURE NOTE:',1,1,'L');
$pdf->ln(1);
$query1 = mysqli_query($db,"select * from enprocedure where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['infusion'],1,1);

}
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'DOCTORS PROCEDURE NOTE:',1,1,'L');
$pdf->ln(1);
$query1 = mysqli_query($db,"select * from edprocedure where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['infusion'],1,1);

}

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'INFUSION USED:',1,1,'L');
$pdf->ln(1);
$query1 = mysqli_query($db,"select * from einfusion where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['infusion'],1,1);

}
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'STAT MEDICATION USED:',1,1,'L');
$pdf->ln(1);
$query1 = mysqli_query($db,"select * from estat where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['infusion'],1,1);

}
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'MEDICATION USED:',1,1,'L');
$pdf->ln(1);
$query1 = mysqli_query($db,"select * from emedi2 where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['infusion'],1,1);

}
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'SPECIAL TREATMENT:',1,1,'L');
$pdf->ln(1);
$query1 = mysqli_query($db,"select * from estret where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['infusion'],1,1);

}

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'DIET ADVISED:',1,1,'L');
$pdf->ln(1);
$query1 = mysqli_query($db,"select * from eidiet where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['infusion'],1,1);

}

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'INVESTIGATION DONE:',1,1,'L');
$pdf->ln(1);
$query1 = mysqli_query($db,"select * from einves where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['infusion'],1,1);

}

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'BLOOD REQUEST:',1,1,'L');
$pdf->ln(1);
$query1 = mysqli_query($db,"select * from eblood where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['infusion'],1,1);

}

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'DISPOSIBLE ITEMS USED:',1,1,'L');
$pdf->ln(1);
$query1 = mysqli_query($db,"select * from edisposible where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['dcode'].' - '.$data1['infusion'].' - '.$data1['room'],1,1);

}
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'USED EQUIPMENT ITEMS LIST:',1,1,'L');
$pdf->ln(1);
$query1 = mysqli_query($db,"select * from eequipment where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['infusion'],1,1);

}
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'REFERRAL DOCTORS LIST:',1,1,'L');
$pdf->ln(1);
$query1 = mysqli_query($db,"select * from erefferal where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['infusion'],1,1);

}
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'VISITED CONSULTANT LIST:',1,1,'L');
$pdf->ln(1);
$query1 = mysqli_query($db,"select * from evisit where pmrn='$pmrn' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['infusion'],1,1);

}
$pdf->ln(3);


$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'System Generated Report, No Signature Required',0,1,'R');




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