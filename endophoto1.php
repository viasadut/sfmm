<?php
require('testfpdf.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    // Title
    $this->SetFont('Arial','u',18);
    $this->Cell(0,6,' Daily Medicine Order Sheet',0,1,'C');

    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
}

// Connect to database
$link = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
$pmrn=$_REQUEST['pmrn'];
//$dd=$_REQUEST['tdate'];
//$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];
//$dd=date('m/d/Y');


$pdf = new PDF();
$pdf->AddPage('L','A4',0);
$pdf->SetLeftMargin('26');
// First table: output all columns
//$pdf->Table($link,"select * from imedi2 where pmrn='$pmrn' and eid='$eid'");
//$pdf->AddPage();
// Second table: specify 3 columns



$pdf->ln(10);

$pdf->AddCol('id',100,'Medicine');
$pdf->AddCol(pdf->Image('uploads/.'image',40,'Instruction');
//$pdf->Image('uploads/'.$data1['image']);

$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
			'color3'=>array(255,255,210),
			'color4'=>array(255,255,210),
            'padding'=>2);
$pdf->Table($link,"select * from image_gallery ",$prop);
$pdf->Output();
?>