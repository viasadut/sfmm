<?php

//require('code128.php');
require('force_justify1.php');





//$pdf1->AddPage();
$pdf=new PDF_Code128();


$pdf->AliasNbPages();

//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 13);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);

//$pdf1->AddPage();
//$pdf1->SetFont('Arial','',10);

//$sid=$_REQUEST['sid'];
//$cname=$_REQUEST['cname'];



//include("auth.php");
//$pmrn=$_REQUEST['pmrn'];
//$eid=$_REQUEST['eid'];
$sno=$_REQUEST['sno'];

//$code1=$eid;


//$pdf->SetXY(1,3.7);
//$pdf->Write(2,$cname);
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query1 = mysqli_query($db,"select * from phar_sale where sno='$sno' order by id asc");

while($data = mysqli_fetch_array($query1))
{
$pdf->AddPage('L','adbar',0);

$pdf->SetFont('Arial' , '' , 9);
$pdf->SetXY(10,6);
$pdf->Cell('62',1,'Sheikh Fazilatunnessa Mujib Memorial',0,1,'C');
$pdf->SetXY(10,9);
$pdf->Cell('62',1,'KPJ Specialized Hospital',0,1,'C');



$pdf->SetFont('Arial' , 'b' , 16);
$pdf->SetXY(10,14);
$pdf->Cell('32',1,'BillNO-'.$data['sno'],0,1,'L');


$pdf->SetFont('Arial' , '' , 9);
$pdf->SetXY(10,18);
$pdf->MultiCell('80',3,$data['medi']);

$pdf->SetXY(10,22);
$pdf->MultiCell('80',3,'('.$data['brand'].')');

$pdf->SetXY(10,26);
$pdf->MultiCell('80',3,'Qty:-'.$data['qty'].' Pcs');
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetXY(10,30);
$pdf->MultiCell('62',3,'Instruction: '.$data['ins']);



//$pdf->SetXY(1,3.69);



//$pdf->Write(1.2,$sid);


//$pdf->SetXY(10,1.6);
}

$pdf->Output();

?>