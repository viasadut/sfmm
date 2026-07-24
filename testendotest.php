<?php
require('testfpdf.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    // Title
    $this->SetFont('Arial','u',18);
    

    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
}

// Connect to database
$link = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
//$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];
//$eid=$_REQUEST['eid'];
$dd=date('m/d/Y');
$query2 = mysqli_query($link,"Select dname,count(*) from endoreport where r1date BETWEEN '$start' and '$end'" );
$data2 = mysqli_fetch_array($query2);

$pdf = new PDF();
$pdf->AddPage('L','A4',0);
$pdf->SetLeftMargin('26');
// First table: output all columns
//$pdf->Table($link,"select * from imedi2 where pmrn='$pmrn' and eid='$eid'");
//$pdf->AddPage();
// Second table: specify 3 columns

$pdf->ln(8);
$pdf->Cell('100',5,'TOTAL NO OF MONTHLY ENDOSCOPIC PROCEDURES CENSUS:',0,0,'L');
$pdf->Cell('110',5,$data2['count(*)'],0,1,'R');
$pdf->ln(10);


$pdf->AddCol('type',100,'Name of Procedure');
$pdf->AddCol('dname',70,'Consultant Name');
$pdf->AddCol('count(*)',50,'Total Number','R');



$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
			'color3'=>array(255,255,210),
			'color4'=>array(255,255,210),
            'padding'=>2);
$pdf->Table($link,"Select type,dname,count(*) from endoreport where r1date BETWEEN '$start' and '$end' group by dname, type order by type",$prop);
$pdf->Output();
?>