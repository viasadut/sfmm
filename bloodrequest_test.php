<?php
require('testfpdf.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    // Title
    $this->Image('logo1.jpg',15,7);
$this->SetFont('Arial','B',12);
$this->Cell(195,7,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(20);
    $this->SetFont('Arial','u',18);
    $this->Cell(0,6,' BLOOD REQUEST FORM',0,1,'C');

    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}

function footer(){
$this->SetY(-20);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561 (SFMMKPJSH/LAB/MR-02)',0,0,'C');


}
}

// Connect to database
$link = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];
$id=$_REQUEST['id'];
$dd=date('m/d/Y');
$dd1=date('d/m/Y');
$query = mysqli_query($link,"SELECT * from iblood where pmrn='$pmrn' and id='$id'" );
$data = mysqli_fetch_array($query);

$query2 = mysqli_query($link,"SELECT * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$dname=$data['user'];
$query3 = mysqli_query($link,"select * from user where uname='$dname'");
$data3 = mysqli_fetch_array($query3);


$pdf = new PDF();
$pdf->AddPage('P','A4',0);
$pdf->SetLeftMargin('10');
// First table: output all columns
//$pdf->Table($link,"select * from imedi2 where pmrn='$pmrn' and eid='$eid'");
//$pdf->AddPage();
// Second table: specify 3 columns
$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('185',5,'Order Type: '.$data['order_type'].'',0,1,'R');

$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('25',5,'Order By:',0,0,'L');
$pdf->Cell('75',5,$data2['adoc'],0,0,'L');
$pdf->Cell('60',5,'Date:',0,0,'R');
$pdf->Cell('75',5,$data['otime'],0,1,'L');
$pdf->SetFont('Arial','', 11);
$pdf->Cell('42',5);
//$pdf->Cell('95',5,$data3['degree'],0,1,'L');
//$pdf->Cell('42',3);
//$pdf->Cell('80',3,$data3['Discipline'],0,1,'L');
$pdf->SetFont('Arial' , 'b' , 9);

$pdf->ln(3);
$pdf->SetFont('Arial','b', 10);
$pdf->Cell('30',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data2['pname'],1,0,'L');
$pdf->Cell('12',5,'MRN:',1,0,'L');
$pdf->Cell('20',5,$data2['pmrn'],1,0,'L');
$pdf->Cell('25',5,'GENDER:',1,0,'L');
$pdf->Cell('10',5,$data2['gender'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('28',5,$data2['age'],1,1,'L');



$pdf->Cell('25',5,'WARD:',1,0,'L');
$pdf->Cell('47',5,$data2['room'],1,0,'L');
$pdf->Cell('15',5,'BED:',1,0,'L');
$pdf->Cell('30',5,$data2['room1'],1,0,'L');
$pdf->Cell('30',5,'Admission Date:',1,0,'L');
$pdf->Cell('48',5,$data2['adate'],1,0,'L');


$pdf->ln(10);
$pdf->SetFont('Arial','b', 8);
$pdf->AddCol('user',25,'Order BY','L');
$pdf->AddCol('odate',35,'Order Date','L');
$pdf->AddCol('infusion',30,'Blood Group');
$pdf->AddCol('room',60,'Blood Type');
$pdf->AddCol('amount1',15,'Amount','C');

//$pdf->AddCol('alert',20,'Caution','R');
$pdf->AddCol('signature',25,'Signature','R');


$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
			'color3'=>array(255,255,210),
			'color4'=>array(255,255,210),
            'padding'=>2);
$pdf->Table($link,"select * from iblood where pmrn='$pmrn' and id='$id' and status ='Data Updated'",$prop);


$pdf->ln(5);
$pdf->Cell('25',5,'Diagnosis:',0,1,'L');
$pdf->Cell('180',5,$data['diagnosis'],0,1,'L');
$pdf->ln(2);

$pdf->Cell('10',5,'Hb%:',0,0,'L');
$pdf->Cell('180',5,$data['hb'],0,1,'L');
$pdf->ln(2);

if($data2['gender']=='F'){
$pdf->Cell('35',5,'Obstetrical History:',0,0,'L');
$pdf->Cell('100',5,$data['obs'],0,1,'L');
}
$pdf->ln(2);
$pdf->Cell('56',5,'H/O Previous Blood Transfusion:',0,0,'L');
$pdf->Cell('20',5,$data['hpt'],0,0,'L');
//$pdf->ln(4);
if($data['hpt']=='Yes'){
$pdf->Cell('25',5,'No Of Units:',0,0,'L');
$pdf->Cell('20',5,$data['nou'],0,0,'L');

$pdf->Cell('40',5,'Date Of Transfusion:',0,0,'L');
$pdf->Cell('20',5,date('d/m/Y', strtotime($data['dot'])),0,1,'L');
$pdf->ln(2);
$pdf->Cell('70',5,'Any Reaction Occur During Transfusion:',0,0,'L');
$pdf->Cell('20',5,$data['reaction'],0,1,'L');
$pdf->ln(2);
if($data['reaction']=='Yes'){

    $pdf->Cell('40',5,'What Type Of Reaction:',0,0,'L');
$pdf->Cell('180',5,$data['reaction_type'],0,1,'L');
}
}
$pdf->ln(6);
$pdf->Cell('113',5,'HbsAg, HIV, HCV, VDRL, Malaria (If Positive Should be mentioned):',0,0,'L');
$pdf->Cell('40',5,$data['positive'],0,1,'L');



$pdf->ln(6);
$pdf->Cell('18',5,'Remarks:',0,0,'L');
$pdf->Cell('170',5,$data['order_remarks'],0,1,'L');

/*$pdf->ln(5);
$pdf->Cell('113',5,'-----------------------------------------------------For Blood Bank Use Only------------------------------------------------------------------------',0,0,'L');


$pdf->ln(10);
$pdf->Cell('113',5,'# Whole Blood:---------------------------------------------------',0,1,'L');
$pdf->ln(4);
$pdf->Cell('113',5,'# Packed Cell / PRBC / RCC:---------------------------------------------------',0,1,'L');
$pdf->ln(4);
$pdf->Cell('113',5,'# Platelet (RDP / SDP / Aphenesis):---------------------------------------------------',0,1,'L');
$pdf->ln(4);
$pdf->Cell('113',5,'# FFP (fresh Frozen Plasma):---------------------------------------------------',0,1,'L');
$pdf->ln(4);
$pdf->Cell('113',5,'# PRP (Platelet Rich Plasma):---------------------------------------------------',0,1,'L');
$pdf->ln(4);
$pdf->Cell('113',5,'# Cryo Precipitate:---------------------------------------------------',0,1,'L');
$pdf->ln(5);
$pdf->Cell('80',5,'Date Of Request:----------------------------------------',0,0,'L');
$pdf->Cell('80',5,'Date Of Transfusion:---------------------------------------------------',0,0,'L');
$pdf->ln(15);
$pdf->Cell('60',5,"Doctor's Signature:---------------------------------------------------",0,1,'L');
*/
$pdf->Output();
?>