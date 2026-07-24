<?php

//require('code128.php');
require('force_justify1.php');





//$pdf1->AddPage();
$pdf=new PDF_Code128();


$pdf->AliasNbPages();
$pdf->AddPage('L','cbar1',0);
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 13);
$pdf->SetLeftMargin('17');
$pdf->SetbottomtMargin('.3');
//$pdf->headerTable();
//$pdf->viewTable($db);

//$pdf1->AddPage();
//$pdf1->SetFont('Arial','',10);

//$sid=$_REQUEST['sid'];
//$cname=$_REQUEST['cname'];





$id=$_REQUEST['id'];
$sno='O'.$id;
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from alltest where id='$id'");
$data = mysqli_fetch_assoc($query4);
$eid=$data['eid'];
$iname=$data['medi'];
$pname=$data['pname'];






//$pdf->ln(10);
//$code=$sid;
//$code1=$eid;
//$pdf->SetXY(1,6.4);

//$pdf->SetXY(1,3.7);
//$pdf->Write(2,$cname);

$pdf->SetFont('Arial' , 'b' , 8);
//$pdf->Cell('13',1,$eid,0,1,'C');

$pdf->SetFont('Courier' , 'b' , 5);
$pdf->SetXY(1,8.5);
$pdf->Cell('30',1,$iname,0,1,'L');
//$pdf->Cell('30',1,$pname,0,1,'L');
//$pdf->Cell('30',1,$eid,0,1,'L');


//$pdf->Write(1.2,$sid);

//$pdf->Code128(3,2,$pmrn,25,8);
//$pdf->SetXY(10,1.6);


$pdf->Output();

?>