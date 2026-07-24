<?php

require('code128.php');
//require('force_justify1.php');

require('db1.php');

$dd=date('d/m/Y');
$retime=date('Y-m-d');

//$pdf1->AddPage();
$pdf=new PDF_Code128();



//$pdf->AliasNbPages();

//$pdf->SetXY(1,1);
//$pdf->SetXY(23,1);
//$pdf->SetXY(1,3.8);
//$pdf->SetXY(1,6.3);
//$pdf->headerTable();
//$pdf->viewTable($db);

//$pdf1->AddPage();
//$pdf1->SetFont('Arial','',10);

//$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$bar=$_REQUEST['bar'];
//$pname=$_REQUEST['pname'];
//$rinfusion=$_REQUEST['rinfusion'];
$nn=date('Y-m-d');
//$pdf->ln(10);
//$code=$pmrn;
//$code='123456789';




//$pdf->Write(1.2,$sid);
//$pdf->SetXY(10,1.6);




$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query1 = mysqli_query($db,"select * from event_invitee_list where id='$id'");

while($data1 = mysqli_fetch_array($query1))
{
	
$pdf->AddPage('P','a4');
//$pdf1->AddPage('P','A4',0);
//$pdf->SetFont('Arial' , 'b' , 9.5);


$pdf->SetLeftMargin('17');
//$pdf->ln(200);

$pdf->SetXY(145,98);
$pdf->SetFont('Arial' , 'b' , 12);
//$pdf->SetXY(23,1);
$pdf->Cell('140',3,$data1['invitee'],0,1,'L');
$pdf->SetXY(145,101);
$pdf->SetFont('Arial' , '' , 8);
$pdf->Cell('140',3,$data1['desig'],0,1,'L');
//$pdf->ln(2);
$pdf->SetXY(145,104);
$pdf->MultiCell('50',4,$data1['organization']);

$pdf->SetXY(75,98);

$l=$data1['qr'];


$image1 = "tender/equipment/invite_qr/".$l."";
$image2 = "qr_itinary.jpg";

if($l!=''){
	$pdf->SetXY(178,120);
	$image1 = "tender/equipment/invite_qr/".$l."";
$pdf->Cell( 75, 15, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 12), 0, 0, 'L', false );
$pdf->SetFont('Arial' , 'b' , 5.5);
$pdf->SetXY(70,132);
$pdf->Cell('138',2,'Scan for Update Deliver Status',0,1,'R');
}
$pdf->SetXY(146,120);
$pdf->Cell( 160, 35, $pdf->Image($image2, $pdf->GetX(), $pdf->GetY(), 10.78), 0, 0, 'L', false );
$pdf->SetFont('Arial' , 'b' , 5.5);
$pdf->SetXY(152,132);
$pdf->Cell('20',2,'Scan for Program Itinerary',0,1,'R');

}












$pdf->Output();

?>