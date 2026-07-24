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
$query = mysqli_query($db,"select * from endoreport where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_array($query);

$queryn = mysqli_query($db,"select * from endopapp where pmrn='$pmrn' and eid='$eid'");
$datan = mysqli_fetch_array($queryn);

$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from doctor1 where dname='$dname'");
$data2 = mysqli_fetch_array($query2);




//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){
$this->ln(10);

}

function footer(){
$this->SetY(-15);
$this->SetFont('Arial','B',8);



}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('15');
//$pdf->headerTable();
//$pdf->viewTable($db);


$pdf->SetFont('Arial' , 'b' , 15);

$pdf->ln(210);

$query11 = mysqli_query($db,"select * from endoreport where pmrn='$pmrn' and eid='$eid'");

while($data11 = mysqli_fetch_array($query11))
{


$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('80',5,'',0,0,'L');
$pdf->MultiCell('102' , 5,'Comments:'.$data11['report'],0,0);

$pdf->ln(6);

}



$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 10);

//$pdf->Cell('182',5,$data['dname'],0,1,'R');
//$pdf->Cell('182',5,$data2['degree'],0,1,'R');
//$pdf->Cell('182',5,$data2['Discipline'],0,0,'R');

//$pdf->ln(15);
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