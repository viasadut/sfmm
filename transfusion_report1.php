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
$this->ln(15);
    $this->SetFont('Arial','',14);
    
    $this->Cell(71,6,' Dept. Of Transfusion Medicine',1,0,'L');
    $this->Cell(24,6,' ',0,0,'L');
    $this->Cell(95,6,' Transfusion Reaction Investigation Form',1,1,'L');

    $this->Ln(5);
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


$query1= mysqli_query($link,"SELECT * from lab_transfusion_reporting where bid='$id' " );
$data1 = mysqli_fetch_array($query1);


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
$pdf->SetFont('Arial','', 8);
$pdf->AddCol('user',25,'Order BY','L');
$pdf->AddCol('odate',35,'Order Date','L');
$pdf->AddCol('infusion',30,'Blood Group');
$pdf->AddCol('room',60,'Blood Type');
$pdf->AddCol('amount1',15,'Amount','C');

//$pdf->AddCol('alert',20,'Caution','R');
$pdf->AddCol('bagno',25,'Bagno','R');


$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
			'color3'=>array(255,255,210),
			'color4'=>array(255,255,210),
            'padding'=>2);
$pdf->Table($link,"select * from iblood where pmrn='$pmrn' and id='$id'",$prop);

$pdf->SetFont('Arial','', 8);
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
$pdf->Cell('49',15,'Name & Sign Of Attending Doctor',1,0,'L');
$pdf->Cell('50',15,'',1,0,'L');
$pdf->Cell('48',15,'Name & Sign Of Attending Nurse',1,0,'L');

$pdf->Cell('50',15,'',1,1,'L');

$pdf->ln(5);
$pdf->SetFont('Arial','b', 10);
$pdf->Cell('113',5,'------------------------------------------------------For Blood Bank Use Only------------------------------------------------------------------------',0,1,'L');
$pdf->ln(5);
$pdf->SetFont('Arial','', 10);
$pdf->Cell('197',5,'1. Check Patients ID No. Donor Unit Labels. Forms and records for any Discrepancy',0,1,'L');
$pdf->ln(2);
$pdf->Cell('197',5,'2. Visual Inspection of Patient Serum:  '.$data['vserum'].'',0,1,'L');
$pdf->ln(2);
$pdf->Cell('197',5,'3. Direct Anti Globulin Test Pre Transfusion: '.$data['globulin_pre'].'',0,1,'L');
$pdf->ln(2);
$pdf->Cell('197',5,'3. Direct Anti Globulin Test Post Transfusion: '.$data['globulin_post'].'',0,1,'L');
$pdf->ln(2);
$pdf->Cell('197',5,'4. Bacteriological Studies Done On: '.$data['bac_con'].'',0,1,'L');
$pdf->ln(2);
$pdf->Cell('197',5,'5. First Voided Fresh Specimen of Urine, Hemolysis: '.$data['hemolysis'].'',0,1,'L');
$pdf->ln(2);
$pdf->Cell('197',5,'6. Antibody Screening (ICT): '.$data['antibody'].'',0,1,'L');
$pdf->ln(2);

$pdf->MultiCell('197',5,'Medication Given: '.$data['medi'].'');
$pdf->ln(2);
$pdf->SetFont('Arial','ub', 10);
$pdf->Cell('197',5,'Confirmation Of ABO & Rh Type',0,1,'C');
$pdf->ln(2);
$pdf->SetFont('Arial','', 10);
$pdf->Cell('50',5,'Information Of ABO Rh Type',1,0,'L');
$pdf->Cell('60',5,'Anti Serum',1,0,'C');
$pdf->Cell('30',5,'Known Cell',1,0,'C');
$pdf->Cell('50',5,'Blood Group & Rh Type',1,1,'C');

$pdf->Cell('50',5,'',1,0,'L');
$pdf->Cell('15',5,'A',1,0,'C');
$pdf->Cell('15',5,'B',1,0,'C');
$pdf->Cell('15',5,'C',1,0,'C');
$pdf->Cell('15',5,'D',1,0,'C');
$pdf->Cell('15',5,'A',1,0,'C');
$pdf->Cell('15',5,'B',1,0,'C');


$pdf->Cell('50',5,'',1,1,'C');
$pdf->Cell('20',10,'RECIPIENT',1,0,'L');
$pdf->Cell('30',5,'Pre-Transfusion',1,0,'C');
$pdf->SetFont('Arial','b', 10);
$pdf->Cell('15',5,$data1['anti_serum_re_pre_a'],1,0,'C');
$pdf->Cell('15',5,$data1['anti_serum_re_pre_b'],1,0,'C');
$pdf->Cell('15',5,$data1['anti_serum_re_pre_ab'],1,0,'C');
$pdf->Cell('15',5,$data1['anti_serum_re_pre_d'],1,0,'C');
$pdf->Cell('15',5,$data1['anti_serum_re_pre_k_a'],1,0,'C');
$pdf->Cell('15',5,$data1['anti_serum_re_pre_k_b'],1,0,'C');

$pdf->Cell('25',5,$data1['anti_serum_re_pre_bg'],1,0,'C');
$pdf->Cell('25',5,$data1['anti_serum_re_pre_rh'],1,1,'C');
//$pdf->Cell('50',5,'',0,0,'L');
$pdf->SetFont('Arial','', 10);
$pdf->Cell('20',10,'',0,0,'L');
$pdf->Cell('30',5,'Post-Transfusion',1,0,'C');
$pdf->SetFont('Arial','b', 10);
$pdf->Cell('15',5,$data1['anti_serum_re_po_a'],1,0,'C');
$pdf->Cell('15',5,$data1['anti_serum_re_po_b'],1,0,'C');
$pdf->Cell('15',5,$data1['anti_serum_re_po_ab'],1,0,'C');
$pdf->Cell('15',5,$data1['anti_serum_re_po_d'],1,0,'C');
$pdf->Cell('15',5,$data1['anti_serum_re_po_k_a'],1,0,'C');
$pdf->Cell('15',5,$data1['anti_serum_re_po_k_b'],1,0,'C');

$pdf->Cell('25',5,$data1['anti_serum_re_po_bg'],1,0,'C');
$pdf->Cell('25',5,$data1['anti_serum_re_po_rh'],1,1,'C');
//$pdf->Cell('50',5,'',0,0,'L');
/*$pdf->Cell('15',5,'',1,0,'C');
$pdf->Cell('15',5,'',1,0,'C');
$pdf->Cell('15',5,'',1,0,'C');
$pdf->Cell('50',5,'',1,1,'C');*/
$pdf->SetFont('Arial','', 10);
$pdf->Cell('20',5,'DONOR',1,0,'L');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->SetFont('Arial','b', 10);
$pdf->Cell('15',5,$data1['anti_serum_do_a'],1,0,'C');
$pdf->Cell('15',5,$data1['anti_serum_do_b'],1,0,'C');
$pdf->Cell('15',5,$data1['anti_serum_do_ab'],1,0,'C');

$pdf->Cell('15',5,$data1['anti_serum_do_d'],1,0,'C');
$pdf->Cell('15',5,$data1['anti_serum_do_k_a'],1,0,'C');
$pdf->Cell('15',5,$data1['anti_serum_do_k_b'],1,0,'C');
/*$pdf->Cell('15',5,'',1,0,'C');
$pdf->Cell('15',5,'',1,0,'C');
$pdf->Cell('15',5,'',1,0,'C');
$pdf->Cell('50',5,'',1,1,'C');*/
//$pdf->Cell('20',5,'',0,0,'L');
$pdf->Cell('25',5,$data1['anti_serum_do_bg'],1,0,'C');
$pdf->Cell('25',5,$data1['anti_serum_do_rh'],1,1,'C');

$pdf->SetFont('Arial','ub', 10);
$pdf->Cell('197',5,'Reconfirmation Of Cross Match',0,1,'C');
$pdf->ln(2);
$pdf->SetFont('Arial','', 10);
$pdf->Cell('70',5,'Cross Match',1,0,'L');
$pdf->Cell('40',5,'Room Temp in Slides',1,0,'C');
$pdf->Cell('30',5,'37*C',1,0,'C');
$pdf->Cell('20',5,'AHG',1,0,'C');
$pdf->Cell('30',5,'Compatible',1,1,'C');

$pdf->Cell('70',5,'Patient Serum + Donor(Pre)',1,0,'L');
$pdf->SetFont('Arial','b', 10);
$pdf->Cell('40',5,$data['cross_pre_room'],1,0,'C');
$pdf->Cell('30',5,$data['cross_pre_37'],1,0,'C');
$pdf->Cell('20',5,$data['cross_pre_ahg'],1,0,'C');
$pdf->Cell('30',5,$data['cross_pre_com'],1,1,'C');
$pdf->SetFont('Arial','', 10);
$pdf->Cell('70',5,'Patient Serum + Donor(Post)',1,0,'L');
$pdf->SetFont('Arial','b', 10);
$pdf->Cell('40',5,$data['cross_post_room'],1,0,'C');
$pdf->Cell('30',5,$data['cross_post_37'],1,0,'C');
$pdf->Cell('20',5,$data['cross_post_ahg'],1,0,'C');
$pdf->Cell('30',5,$data['cross_post_com'],1,1,'C');


$pdf->Cell('190',5,'Remarks: '.$data['remarks'].'',1,1,'L');

$pdf->ln(2);
$pdf->Cell('70',5,'Consultant / MO Name & Signature: ',0,1,'L');
$pdf->ln(4);
$pdf->Cell('40',5,'Technologist Name & Signature:' ,0,1,'L');

$pdf->Output();
?>