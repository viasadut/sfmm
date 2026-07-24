<?php
require('testfpdf.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{//$this->Ln(20);
    // Title
    
    $this->Image('logo1.jpg',15,7);
$this->SetFont('Arial','B',12);
$this->Cell(195,7,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(20);
    $this->SetFont('Arial','',14);
    
    $this->Cell(71,6,' Dept. Of Transfusion Medicine',1,0,'L');
    $this->Cell(24,6,' ',0,0,'L');
    $this->Cell(95,6,' Transfusion Reaction Investigation Form',1,1,'L');

    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}

function footer(){
$this->SetY(-20);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561 (SFMMKPJSH/LAB/MR-)',0,0,'C');


}
}

// Connect to database
$link = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
$id=$_REQUEST['id'];
$eid=$_REQUEST['eid'];
$dd=date('m/d/Y');
$dd1=date('d/m/Y');
$query = mysqli_query($link,"SELECT * from iblood where pmrn='$pmrn' and id='$id' " );
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

//$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('25',5,'Order By:',0,0,'L');
$pdf->Cell('75',5,$data2['adoc'],0,0,'L');
$pdf->Cell('60',5,'Date:',0,0,'R');
$pdf->Cell('75',5,$dd1,0,1,'L');
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
$pdf->AddCol('bed',15,'Unit','C');

//$pdf->AddCol('alert',20,'Caution','R');
$pdf->AddCol('bagno',25,'Bagno','R');


$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
			'color3'=>array(255,255,210),
			'color4'=>array(255,255,210),
            'padding'=>2);
$pdf->Table($link,"select * from iblood where pmrn='$pmrn' and id='$id' and status ='Data Updated'",$prop);

$pdf->SetFont('Arial','b', 8);
$pdf->ln(5);
$pdf->Cell('50',5,'Time & Date Of Transfusion Started',1,0,'L');
$pdf->Cell('30',5,$data['tst'],1,0,'L');
$pdf->Cell('35',5,'Time of Reaction Started',1,0,'L');
$pdf->Cell('30',5,$data['rst'],1,0,'L');
$pdf->Cell('37',5,'Amount Remaining in Bag',1,0,'L');
$pdf->Cell('15',5,$data['blood_remaining'],1,1,'L');


$pdf->Cell('30',5,'Symptoms',1,0,'L');
$pdf->Cell('167',5,$data['symptoms'],1,1,'L');

$pdf->Cell('197',5,'Before Transfusion',1,1,'L');
//$pdf->Cell('167',5,$data['symptoms'],1,0,'L');


$pdf->Cell('50',5,'Temperature',1,0,'L');
$pdf->Cell('30',5,$data['b_temp'],1,0,'L');
$pdf->Cell('35',5,'Pulse',1,0,'L');
$pdf->Cell('30',5,$data['b_pulse'],1,0,'L');
$pdf->Cell('37',5,'Blood Pressure',1,0,'L');
$pdf->Cell('15',5,$data['b_bp'],1,1,'L');

$pdf->Cell('197',5,'After Transfusion',1,1,'L');
//$pdf->Cell('167',5,$data['symptoms'],1,0,'L');


$pdf->Cell('50',5,'Temperature',1,0,'L');
$pdf->Cell('30',5,$data['a_temp'],1,0,'L');
$pdf->Cell('35',5,'Pulse',1,0,'L');
$pdf->Cell('30',5,$data['a_pulse'],1,0,'L');
$pdf->Cell('37',5,'Blood Pressure',1,0,'L');
$pdf->Cell('15',5,$data['a_bp'],1,1,'L');



$pdf->Cell('50',5,'Time Of Reporting To Blood Bank',1,0,'L');
$pdf->Cell('147',5,$data['reporting_time'],1,1,'L');
$pdf->Cell('50',25,'Sign Of Attending Doctor',1,0,'L');
$pdf->Cell('47',25,'',1,0,'L');
$pdf->Cell('40',25,'Name Of Attending Doctor',1,0,'L');
$pdf->Cell('60',25,'',1,1,'L');
$pdf->Cell('50',25,'Sign Of Attending Nurse',1,0,'L');
$pdf->Cell('47',25,'',1,0,'L');
$pdf->Cell('40',25,'Name Of Attending Nurse',1,0,'L');
$pdf->Cell('60',25,'',1,1,'L');

$pdf->ln(5);
$pdf->SetFont('Arial','b', 10);
$pdf->Cell('113',5,'------------------------------------------------------For Blood Bank Use Only------------------------------------------------------------------------',0,1,'L');
$pdf->ln(5);
$pdf->SetFont('Arial','b', 10);
$pdf->Cell('197',5,'1. Check Patients ID No. Donor Unit Labels. Forms and records for any Discrepancy',0,1,'L');
$pdf->ln(2);
$pdf->Cell('197',5,'2. Visual Inspection of Patient serum  1) Normal   2) Hemolysis (Pink)  3) Bilirbin ',0,1,'L');
$pdf->ln(2);
$pdf->Cell('197',5,'3. Direct Anti Globulin Test',0,1,'L');
$pdf->ln(2);
$pdf->Cell('197',5,'   ----> Positive          1) Pre Transfusion      2) Post Transfusion',0,1,'L');
$pdf->ln(2);
$pdf->Cell('197',5,'   ----> Negative         1) Pre Transfusion      2) Post Transfusion',0,1,'L');
$pdf->ln(2);
$pdf->Cell('197',5,'4. Bacteriological Studies Done On            1) Positive         2) Negative',0,1,'L');
$pdf->ln(2);
$pdf->Cell('197',5,'5. First Voided Fresh Specimen of Urine, Hemolysis            1) Yes         2) No',0,1,'L');
$pdf->ln(2);
$pdf->Cell('197',5,'6. Antibody Screening (ICT)            1) Positive         2) Negative',0,1,'L');
$pdf->ln(2);

$pdf->Cell('197',5,'Medication Given:',0,1,'L');


$pdf->Output();
?>