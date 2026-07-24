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

$barcode=$_REQUEST['barcode'];
//$eid=$_REQUEST['eid'];
//$bar=$_REQUEST['bar'];
//$pname=$_REQUEST['pname'];
//$rinfusion=$_REQUEST['rinfusion'];
$dd=date('d/m/Y');
//$pdf->ln(10);
//$code=$pmrn;
//$code='123456789';




//$pdf->Write(1.2,$sid);
//$pdf->SetXY(10,1.6);


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query1 = mysqli_query($db,"select * from iinves where barcode='$barcode' and type in('lab','LAB','Lab') and barcode2='' and barcode3=''");

while($data1 = mysqli_fetch_array($query1))
{
	
$pdf->AddPage('L','cbar13');
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Courier' , 'b' , 14);
$pdf->SetLeftMargin('17');
$pdf->SetXY(1,10.3);
//$pdf->SetXY(23,1);
$pdf->Cell('5',2,$data1['barcode'],0,0,'L');


//$pdf->Cell('5',2,$data1['barcode'],0,0,'L');


$pdf->SetFont('Courier' , 'b' , 7.5);
$pdf->SetXY(1,12.8);

$pdf->Cell('30',3,$data1['pname'],0,0,'L');






$pdf->SetXY(1,15.5);
$pdf->SetFont('Courier' , 'b' , 7.5);
$pdf->Cell('5',2,'MRN:'. $data1['pmrn'],0,1,'L');


$pdf->SetXY(1,16.4);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,'Sex:'.$data1['pgender'].' '.'Age:'.$data1['page'],0,0,'L');



$pdf->SetXY(1,18.5);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,$data1['infusion'],0,0,'L');




$pdf->SetXY(1,20.8);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,$data1['rtime'].'(IPD)',0,0,'L');


$pdf->Code128(8,1,$data1['barcode'],23,8);
//$pdf->ln(10);
}


$query11 = mysqli_query($db,"select * from iinves where barcode='$barcode' and type in('lab','LAB','Lab') and barcode2 !='' and barcode3 !=''");

while($data11 = mysqli_fetch_array($query11))
{
	
$pdf->AddPage('L','cbar13');
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Courier' , 'b' , 14);
$pdf->SetLeftMargin('17');
$pdf->SetXY(1,10.3);
//$pdf->SetXY(23,1);
$pdf->Cell('5',2,$data11['barcode'],0,0,'L');


//$pdf->Cell('5',2,$data1['barcode'],0,0,'L');


$pdf->SetFont('Courier' , 'b' , 7.5);
$pdf->SetXY(1,12.8);

$pdf->Cell('30',3,$data11['pname'],0,0,'L');






$pdf->SetXY(1,15.5);
$pdf->SetFont('Courier' , 'b' , 7.5);
$pdf->Cell('5',2,'MRN:'. $data11['pmrn'],0,1,'L');


$pdf->SetXY(1,16.4);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,'Sex:'.$data11['pgender'].' '.'Age:'.$data11['page'],0,0,'L');



$pdf->SetXY(1,18.5);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,$data11['infusion'],0,0,'L');




$pdf->SetXY(1,20.8);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,$data11['rtime'].'(IPD)-1st',0,0,'L');


$pdf->Code128(8,1,$data11['barcode'],23,8);
//$pdf->ln(10);
}


$query111 = mysqli_query($db,"select * from iinves where barcode='$barcode' and type in('lab','LAB','Lab') and barcode2 !='' and barcode3 =''");

while($data111 = mysqli_fetch_array($query111))
{
	
$pdf->AddPage('L','cbar13');
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Courier' , 'b' , 14);
$pdf->SetLeftMargin('17');
$pdf->SetXY(1,10.3);
//$pdf->SetXY(23,1);
$pdf->Cell('5',2,$data111['barcode'],0,0,'L');


//$pdf->Cell('5',2,$data1['barcode'],0,0,'L');


$pdf->SetFont('Courier' , 'b' , 7.5);
$pdf->SetXY(1,12.8);

$pdf->Cell('30',3,$data111['pname'],0,0,'L');






$pdf->SetXY(1,15.5);
$pdf->SetFont('Courier' , 'b' , 7.5);
$pdf->Cell('5',2,'MRN:'. $data111['pmrn'],0,1,'L');


$pdf->SetXY(1,16.4);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,'Sex:'.$data111['pgender'].' '.'Age:'.$data111['page'],0,0,'L');



$pdf->SetXY(1,18.5);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,$data111['infusion'],0,0,'L');




$pdf->SetXY(1,20.8);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,$data111['rtime'].'(IPD)-1st',0,0,'L');


$pdf->Code128(8,1,$data111['barcode'],23,8);
//$pdf->ln(10);
}





$query2 = mysqli_query($db,"select * from iinves where barcode='$barcode' and type in('lab','LAB','Lab') and barcode2 !=''");

while($data2 = mysqli_fetch_array($query2))
{
	
$pdf->AddPage('L','cbar13');
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Courier' , 'b' , 14);
$pdf->SetLeftMargin('17');
$pdf->SetXY(1,10.3);
//$pdf->SetXY(23,1);
$pdf->Cell('5',2,$data2['barcode2'],0,0,'L');


//$pdf->Cell('5',2,$data1['barcode'],0,0,'L');


$pdf->SetFont('Courier' , 'b' , 7.5);
$pdf->SetXY(1,12.8);

$pdf->Cell('30',3,$data2['pname'],0,0,'L');






$pdf->SetXY(1,15.5);
$pdf->SetFont('Courier' , 'b' , 7.5);
$pdf->Cell('5',2,'MRN:'. $data2['pmrn'],0,1,'L');


$pdf->SetXY(1,16.4);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,'Sex:'.$data2['pgender'].' '.'Age:'.$data2['page'],0,0,'L');



$pdf->SetXY(1,18.5);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,$data2['infusion'],0,0,'L');




$pdf->SetXY(1,20.8);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,$data2['rtime'].'(IPD)-2nd',0,0,'L');


$pdf->Code128(8,1,$data2['barcode2'],23,8);
//$pdf->ln(10);
}




$query3 = mysqli_query($db,"select * from iinves where barcode='$barcode' and type in('lab','LAB','Lab') and barcode3 !=''");

while($data3 = mysqli_fetch_array($query3))
{
	
$pdf->AddPage('L','cbar13');
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Courier' , 'b' , 14);
$pdf->SetLeftMargin('17');
$pdf->SetXY(1,10.3);
//$pdf->SetXY(23,1);
$pdf->Cell('5',2,$data3['barcode3'],0,0,'L');


//$pdf->Cell('5',2,$data1['barcode'],0,0,'L');


$pdf->SetFont('Courier' , 'b' , 7.5);
$pdf->SetXY(1,12.8);

$pdf->Cell('30',3,$data3['pname'],0,0,'L');






$pdf->SetXY(1,15.5);
$pdf->SetFont('Courier' , 'b' , 7.5);
$pdf->Cell('5',2,'MRN:'. $data3['pmrn'],0,1,'L');


$pdf->SetXY(1,16.4);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,'Sex:'.$data3['pgender'].' '.'Age:'.$data3['page'],0,0,'L');



$pdf->SetXY(1,18.5);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,$data3['infusion'],0,0,'L');




$pdf->SetXY(1,20.8);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,$data3['rtime'].'(IPD)-3rd',0,0,'L');


$pdf->Code128(8,1,$data3['barcode3'],23,8);
//$pdf->ln(10);
}







$pdf->Output();

?>