<?php

//require('code128.php');
require('force_justify1.php');





//$pdf1->AddPage();
$pdf=new PDF_Code128();


$pdf->AliasNbPages();
$pdf->AddPage('L','lbar',0);
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 13);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);

//$pdf1->AddPage();
//$pdf1->SetFont('Arial','',10);

//$sid=$_REQUEST['sid'];
//$cname=$_REQUEST['cname'];


//$pmrn=$_REQUEST['pmrn'];
//$id='O'.$_REQUEST['id'];
//$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
//$eid=$_REQUEST['eid'];
$sno=$_REQUEST['bagno'];
//$bgno=$_REQUEST['bgno'];


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from bcross1 where bagno='$sno'");
$data = mysqli_fetch_array($query);
$hcv=$data['hcv'];
$vdrl=$data['vdrl'];
$abo=$data['abo'];
$hbs=$data['hbs'];
$hiv=$data['hiv'];
$plas=$data['plas'];
$plas1=$data['plas1'];
$udate=$data['udate'];
$rhe=$data['rhe'];
//$pdf->ln(20);
$code=$sno;
//$code1=$eid;

$query1 = mysqli_query($db,"select * from bcross1 where bagno='$sno'");
$data1 = mysqli_fetch_array($query1);



//$pdf->SetXY(1,3.7);
//$pdf->Write(2,$cname);


$pdf->SetFont('Arial' , 'ub' , 8);
$pdf->SetXY(40,6);
$pdf->Cell('62',1,'SFMMKPJSH Blood Bank',0,1,'L');


$pdf->SetFont('Arial' , 'b' , 8);
$pdf->SetXY(9,10);
$pdf->Cell('32',1,'Collected',0,1,'L');

$pdf->SetXY(9,7);
$pdf->Cell('31.4',15.2,date('d/m/Y', strtotime($data1['udate'])),0,1,'L');


$pdf->SetFont('Arial' , 'b' , 8);
$pdf->SetXY(47,10);
$pdf->Cell('62',1,'Bag No',0,1,'L');
$pdf->SetXY(41.6,12);
$pdf->Cell('30.7',15.2,'',0,1,'L');






$pdf->SetFont('Arial' , 'b' , 8);
$pdf->SetXY(84.1,10);
$pdf->Cell('30',1,'Expires',0,1,'L');
$pdf->SetXY(84.1,7);
$pdf->Cell('35',15.2,date('d/m/Y',strtotime($data1['edate'])),0,1,'L');



$pdf->SetXY(45,20);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('13',2,$data1['bagno'],0,1,'C');
$pdf->SetXY(1,3.69);






$pdf->SetXY(85,30);
$pdf->SetFont('Arial' , 'b' , 18);
$pdf->Cell('13',2,$abo.' '.$rhe,0,1,'C');




$pdf->SetXY(10,30);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('13',2,$data['btype'],0,1,'L');
//$pdf->SetXY(1,3.69);

$pdf->SetXY(10,35);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('10',2,'Volume: '.$data['bqty'].'mL',0,1,'L');




$pdf->SetXY(50,15);
$pdf->SetFont('Arial' , 'b' , 5);
//$pdf->Cell('30',1,$id,0,1,'C');


$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->SetXY(10,43);
$pdf->Cell('30',1,'Screening Test:',0,1,'L');
$pdf->SetFont('Arial' , 'b' , 8);
$pdf->SetXY(10,50);
$pdf->Cell('30',1,'HCVAb'.' : '.$hcv,0,1,'L');
$pdf->SetXY(10,55);

$pdf->Cell('30',1,'HbsAg'.' : '.$hbs,0,1,'L');

//$pdf->SetXY(10,60);
//$pdf->Cell('30',1,'HbsAg'.' : '.$hbs,0,1,'L');

$pdf->SetXY(10,60);
$pdf->Cell('30',1,'HIV'.'       : '.$hiv,0,1,'L');


$pdf->SetXY(10,65);
$pdf->Cell('30',1,'VDRL'.'   : '.$vdrl,0,1,'L');

$pdf->SetXY(10,70);
$pdf->Cell('30',1,'MPpf'.'    : '.$plas,0,1,'L');

$pdf->SetXY(10,75);
$pdf->Cell('30',1,'MPpv'.'   : '.$plas1,0,1,'L');


$pdf->SetFont('Arial' , 'b' , 7);
$pdf->SetXY(10,95);
$pdf->Cell('30',1,'PROPERLY IDENTIFY INTENDED RECEPIENT',0,1,'L');
$pdf->SetXY(10,98);
$pdf->SetFont('Arial' , 'b' , 6.5);
$pdf->Cell('30',1,'This product may transmit infection agents',0,1,'L');

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->SetXY(65,98);

$pdf->Cell('40',1,'Bag No:'.' '. $data1['bagno'],0,1,'L');



//$pdf->Write(1.2,$sid);

$pdf->SetXY(70,25);
$pdf->Code128(32,12.6,$code,40,6);

//$pdf->SetXY(10,1.6);


$pdf->Output();

?>