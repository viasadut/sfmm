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

$pdf->SetXY(30,60);
$pdf->SetFont('Arial' , 'b' , 12);
$c_id=$data1['c_id'];
$query2 = mysqli_query($db,"select * from contact_tbl where id='$c_id'");

$data2 = mysqli_fetch_array($query2);


if($data1['cat']=='VIP1'){
$pdf->Image('vip_test.jpg', 25, 45, 20, 0,);
}

else if($data1['cat']=='VVIP1'){
$pdf->Image('vvip.jpg', 25, 45, 20, 0,);
}

else if($data1['cat']=='Special Guest1'){
$pdf->Image('sp_guest.jpg', 25, 45, 20, 0,);
}

else if($data1['cat']=='Guest1'){
$pdf->Image('guest.jpg', 25, 45, 20, 0,);
}

else {
	
	$pdf->MultiCell('90',3,$data1['cat']);
}
$pdf->SetXY(120,68);
$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->SetXY(23,1);
$pdf->MultiCell('80',2,$data1['invitee']);

$pdf->SetFont('Arial' , '' , 7);

if($data1['desig']!=''){
$pdf->SetXY(120,74);
$pdf->MultiCell('80',2.5,$data1['desig']);

}

if($data1['organization'] !=''){
$pdf->SetXY(120,79);
$pdf->MultiCell('80',2.5,$data1['organization']);

}

if($data2['address']!=''){
$pdf->SetXY(120,86);
$pdf->MultiCell('80',2.5,$data2['address']);
}
$pdf->SetXY(50,68);

$l=$data1['qr'];


$image1 = "tender/equipment/invite_qr/".$l."";
$image2 = "qr_itinary.jpg";

if($l!=''){
	$pdf->SetXY(120,91);
	$image1 = "tender/equipment/invite_qr/".$l."";
$pdf->Cell( 50, 15, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 20), 0, 0, 'L', false );
$pdf->SetFont('Arial' , 'b' , 5.5);
$pdf->SetXY(32,110);
$pdf->Cell('120',2,'Scan for Update Deliver Status',0,1,'R');
}

}












$pdf->Output();

?>