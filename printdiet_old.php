<?php
require('testfpdf.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    // Title
    $this->Ln(10);
	$this->SetFont('Arial','u',18);
    $this->Cell(0,6,' Morning Diet Order Sheet',0,1,'C');

    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
}

// Connect to database
$link = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
//$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
//$eid=$_REQUEST['eid'];
$dd=date('Y-m-d');
$dd1=date('d/m/Y');


$pdf = new PDF();
$pdf->AddPage('L','A4',0);
$pdf->SetLeftMargin('26');
// First table: output all columns
//$pdf->Table($link,"select * from imedi2 where pmrn='$pmrn' and eid='$eid'");
//$pdf->AddPage();
// Second table: specify 3 columns


//$pdf->AddCol('dmenu',180,'Menu');
$pdf->Cell('220',5,'Date:',0,0,'R');
$pdf->Cell('75',5,$dd1,0,1,'L');

$pdf->ln(10);

$pdf->AddCol('pmrn',15,'MRN');
$pdf->AddCol('pname',30,'Name');
$pdf->AddCol('room',20,'Ward','L');
$pdf->AddCol('bed',30,'Bed','L');

$pdf->AddCol('infusion',50,'Diet Type');
$pdf->AddCol('dmenu',145,'Menu');




$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
			'color3'=>array(255,255,210),
			'color4'=>array(255,255,210),
            'padding'=>2);
$pdf->Table($link,"select * from iidiet where odate ='$dd' and status='Diet Ordered' and diettime in('Morning','Extra Food') and status1!='Cancel'order by room",$prop);

$pdf->Output();
?>