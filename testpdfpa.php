<?php
require('testfpdf.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    // Title
    $this->Ln(10);
	$this->SetFont('Arial','u',18);
    $this->Cell(0,6,' INPATIENT LIST',0,1,'C');

    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
}

// Connect to database
$link = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
//$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
//$eid=$_REQUEST['eid'];
$dd=date('d/m/Y');


$pdf = new PDF();
$pdf->AddPage('L','A4',0);
$pdf->SetLeftMargin('15');
// First table: output all columns
//$pdf->Table($link,"select * from imedi2 where pmrn='$pmrn' and eid='$eid'");
//$pdf->AddPage();
// Second table: specify 3 columns
$pdf->SetFont('Arial','b', 12);
$pdf->Cell('235',5,'Date:',0,0,'R');
$pdf->Cell('30',5,$dd,0,1,'R');
$pdf->SetFont('Arial','b', 14);
$pdf->Cell('55',5,'Consultant Name:',0,0,'L');
$pdf->Cell('75',5,$dname,0,0,'L');


$pdf->ln(10);

$pdf->AddCol('pname',90,'Patient Name','L');
$pdf->AddCol('pmrn',20,'MRN','L');
$pdf->AddCol('aadate',40,'Admission Date','L');
$pdf->AddCol('room',60,'Ward','L');
$pdf->AddCol('room1',60,'Bed No','L');



$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
			'color3'=>array(255,255,210),
			'color4'=>array(255,255,210),
            'padding'=>2);
$pdf->Table($link,"Select * from inpatient where adoc= '$dname' and discharge=''",$prop);


$pdf->ln(10);
$pdf->SetFont('Arial','b', 14);
$pdf->Cell('100',5,'Referred Patients:',0,0,'L');
$pdf->ln(10);

$pdf->AddCol('pname',80,'Patient Name','L');
$pdf->AddCol('pmrn',20,'MRN','L');
$pdf->AddCol('user',40,'Referred By','L');
$pdf->AddCol('odate',40,'Admission Date','L');
$pdf->AddCol('ward',40,'Ward','L');
$pdf->AddCol('bed1',50,'Bed No','L');



$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
			'color3'=>array(255,255,210),
			'color4'=>array(255,255,210),
            'padding'=>2);
$pdf->Table($link,"Select * from irefferal where infusion= '$dname' and status='' and tstatus='' and bed='Continuous' and cstatus='Active'",$prop);

$pdf->Output();
?>