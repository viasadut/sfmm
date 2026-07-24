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


$id=$_REQUEST['id'];
//$bar=$_REQUEST['bar'];
//$pname=$_REQUEST['pname'];
//$rinfusion=$_REQUEST['rinfusion'];
$dd=date('Y-m-d');
//$pdf->ln(10);
//$code=$pmrn;
//$code='123456789';




//$pdf->Write(1.2,$sid);
//$pdf->SetXY(10,1.6);


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query1 = mysqli_query($db,"select * from iinves where id='$id' and type in('lab','LAB','Lab') and rstatus ='RECEIVED' and barcode1!=''");

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

if($data1['barcode2']!='' || $data1['barcode3']!='')
{
$pdf->Cell('30',4,$data1['medi'],0,0,'L');
$pdf->SetXY(1,20.8);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,$data1['rtime'].'(IPD-1st)',0,0,'L');

}

if($data1['barcode2']=='' and  $data1['barcode3']=='')
{
$pdf->Cell('30',4,$data1['medi'],0,0,'L');
$pdf->SetXY(1,20.8);
$pdf->SetFont('Courier' , 'b' , 7);
$pdf->Cell('30',4,$data1['rtime'].'(IPD)',0,0,'L');

}




//$pdf->SetFont('arial' , 'b' , 7);
$pdf->Code128(4,1,$data1['barcode'],23,8);
//$pdf->ln(10);
}


$query2 = mysqli_query($db,"select * from iinves where id='$id' and type in('lab','LAB','Lab') and rstatus ='RECEIVED' and barcode2 !=''");

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

//$pdf->SetFont('arial' , 'b' , 7);
$pdf->Code128(4,1,$data2['barcode2'],23,8);
//$pdf->ln(10);
}





$query3 = mysqli_query($db,"select * from iinves where id='$id' and type in('lab','LAB','Lab') and rstatus ='RECEIVED' and barcode3 !=''");

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
$pdf->Cell('30',4,$data3['rtime'].'(IPD-3rd)',0,0,'L');

//$pdf->SetFont('arial' , 'b' , 7);
$pdf->Code128(4,1,$data3['barcode3'],23,8);
//$pdf->ln(10);
}







$pdf->Output();

?>