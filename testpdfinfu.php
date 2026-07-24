<?php
require('testpdf34.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	$this->Ln(15);
    // Title
    $this->SetFont('Arial','u',18);
    $this->Cell(0,6,' Daily Infusion Order Sheet',0,1,'C');

    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
function footer(){
$this->SetY(-20);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561 (SFMMKPJSH/IPD/MR-03)',0,0,'C');


}
}

// Connect to database
$link = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];
$dd=date('m/d/Y');
$query = mysqli_query($link,"SELECT * from iinfusion where pmrn='$pmrn' and eid='$eid' " );
$data = mysqli_fetch_array($query);

$query2 = mysqli_query($link,"SELECT * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$dname=$data2['adoc'];
$query3 = mysqli_query($link,"select * from doctor1 where dname='$dname'");
$data3 = mysqli_fetch_array($query3);


$pdf = new PDF();
$pdf->AddPage('L','A4',0);
$pdf->SetLeftMargin('10');
// First table: output all columns
//$pdf->Table($link,"select * from imedi2 where pmrn='$pmrn' and eid='$eid'");
//$pdf->AddPage();
// Second table: specify 3 columns

$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('42',5,'Consultant Name:',0,0,'L');
$pdf->Cell('75',5,$data3['dname'],0,0,'L');
$pdf->Cell('130',5,'Date:',0,0,'R');
$pdf->Cell('75',5,$dd,0,1,'L');
$pdf->SetFont('Arial','', 11);
$pdf->Cell('42',5);
$pdf->Cell('95',5,$data3['degree'],0,1,'L');
$pdf->Cell('42',3);
$pdf->Cell('80',3,$data3['Discipline'],0,1,'L');
$pdf->SetFont('Arial' , 'b' , 9);

$pdf->ln(6);
$pdf->SetFont('Arial','b', 12);
$pdf->Cell('60',5,'Patient Name:',1,0,'L');
$pdf->Cell('100',5,$data2['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('20',5,$data2['pmrn'],1,0,'L');
$pdf->Cell('25',5,'GENDER:',1,0,'L');
$pdf->Cell('30',5,$data2['gender'],1,0,'L');
$pdf->Cell('13',5,'AGE:',1,0,'L');
$pdf->Cell('15',5,$data2['age'],1,1,'L');



$pdf->Cell('42',5,'WARD:',1,0,'L');
$pdf->Cell('47',5,$data2['room'],1,0,'L');
$pdf->Cell('15',5,'BED:',1,0,'L');
$pdf->Cell('70',5,$data2['room1'],1,0,'L');
$pdf->Cell('40',5,'Admission Date:',1,0,'L');
$pdf->Cell('64',5,$data2['adate'],1,0,'L');


$pdf->ln(10);

$pdf->AddCol('odate',17,'O.Date');
$pdf->AddCol('otime',12,'O.Time');
$pdf->AddCol('infusion',70,'Infusion');
$pdf->AddCol('addi',59,'Additive1');
$pdf->AddCol('qty1',16,'Qty');
$pdf->AddCol('add1',59,'Additive2');
$pdf->AddCol('qty2',16,'Qty');
$pdf->AddCol('infu1',29,'Instruction');


$pdf->AddCol('signature',10,'Sign','R');


$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
			'color3'=>array(255,255,210),
			'color4'=>array(255,255,210),
            'padding'=>2);
$pdf->Table($link,"select * from iinfusion where pmrn='$pmrn' and eid='$eid' and odate='$dd' and status1='Active'order by otime asc",$prop);
$pdf->Output();
?>