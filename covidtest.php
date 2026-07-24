<?php
require('testfpdf.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    // Title
    $this->Ln(10);
	$this->SetFont('Arial','u',18);
    $this->Cell(0,6,' Daily Medicine Order Sheet',0,1,'C');

    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
function footer(){
$this->SetY(-20);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801703788561 (SFMMKPJSH/IPD/MR-05)',0,0,'C');


}

}

// Connect to database
$link = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];

$dd=date('m/d/Y');
$pdf = new PDF();
$pdf->AddPage('L','A4',0);
$pdf->SetLeftMargin('26');

$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 14);


$pdf->Cell('90',5,'Date:',0,0,'R');
$pdf->Cell('75',5,$dd,0,1,'L');
$pdf->SetFont('Arial','', 11);
$pdf->SetFont('Arial' , 'b' , 9);

$pdf->ln(6);
$pdf->SetFont('Arial','b', 12);






$pdf->ln(10);

$pdf->SetFont('Arial','b', 5);
$pdf->AddCol('name',105,'Medicine');
$pdf->AddCol('ssent',90,'Instruction');
//$pdf->AddCol('root',25,'Route','R');


$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
			'color3'=>array(255,255,210),
			'color4'=>array(255,255,210),
            'padding'=>2);
$pdf->Table($link,"Select * from covid where ssent BETWEEN '$start' and '$end'",$prop);
$pdf->Output();
?>