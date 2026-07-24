<?php

//require('code128.php');
require('force_justify1.php');

require_once 'phpqrcode/qrlib.php';



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

$pdf->SetFont('Arial' , 'b' , 7.5);
$pdf->SetXY(10,6);
$pdf->Cell('62',1,'Sheikh Fazilatuness Mujib Memorial KPJ Specialized Hospital',0,1,'L');



$pdf->SetFont('Arial' , 'b' , 16);
$pdf->SetXY(10,12);
$pdf->Cell('32',1,'BillNO-'.$data['sno'],0,1,'L');


$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetXY(10,18);
$pdf->MultiCell('80',3,$data['medi']);

$pdf->SetXY(10,22);
$pdf->MultiCell('80',3,'('.$data['brand'].')');

$pdf->SetXY(10,26);
$pdf->MultiCell('80',3,'Qty:-'.$data['qty'].' Pcs');
$pdf->SetFont('Arial' , 'b' , 7.5);
$pdf->SetXY(10,30);
$pdf->MultiCell('62',3,'Instruction: '.$data['ins']);

$text1=$data['pmrn'];
$text2=$data['brand'];


//$pdf->SetXY(1,3.69);



//$pdf->Write(1.2,$sid);


//$pdf->SetXY(10,1.6);


$file='qr_images/'.uniqid().".png";
$url = "http://192.168.100.252:8081/sfmm/p5new?pmrn=$text1&eid=$text2";	  
$file1='qr_images/'.uniqid().".png";

//$file1='qr_images/'.test.".png";
$url1 = "http://182.168.100.252:8081/sfmm/p5new?pmrn=$text1&eid=$text2";	  
//$text=$data['pmrn'];
//$text.=$data['eid'];

//QRcode:: png($idept);

//QRcode:: png($url, $file,'L',2,2);

//$pdf-><img src='".$file."'>;
//$pdf->Image($file,180,42);


QRcode:: png($url1, $file1,'L',1,1);
$pdf->Image($file1,72,10);




}




$pdf->Output();

?>