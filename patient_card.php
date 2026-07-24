<?php

//require('code128.php');
require('force_justify1_new.php');





//$pdf1->AddPage();
$pdf=new PDF_Code128();


$pdf->AliasNbPages();
$pdf->AddPage('P','adbar',0);
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 13);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);

//$pdf1->AddPage();
//$pdf1->SetFont('Arial','',10);

//$sid=$_REQUEST['sid'];
//$cname=$_REQUEST['cname'];
//function footer(){
//$this->SetY(-);
//}




//include("auth.php");
//$pmrn=$_REQUEST['pmrn'];
$pmrn='123456';
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');


$query59 = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
$data = mysqli_fetch_assoc($query59);
//$pmrn=$data59['dmrn'];



$code=$pmrn;
//$code1=$eid;

$rr=date('d/m/Y',strtotime($data59["udate"]));
//$pdf->SetXY(1,3.7);
//$pdf->Write(2,$cname);


//$pdf->Ln(2);
//$pdf->Image('prescription/prescription/doctor/118.jpg',20,7,10);
$pdf->ClippingCircle(27,14,9,true);
$pdf->Image('prescription/prescription/doctor/780.jpg',17,7,20);
$pdf->UnsetClipping();

$pdf->SetFont('Arial' , 'ubi' , 16);
$pdf->SetXY(7,27);
$pdf->Cell('32',1,'PATIENT CARD',0,1,'L');


$pdf->SetFont('Arial' , 'b' , 10);
$pdf->SetXY(5,33);
$pdf->Cell('32',1,'MRN-'.$pmrn,0,1,'L');


$pdf->SetFont('Arial' , 'b' , 8);

$pdf->SetXY(5,38);
$pdf->Cell('32',1,'NAME:'.$data['pname'],0,1,'L');
$pdf->SetFont('Arial' , '' , 8);




$pdf->SetFont('Arial' , 'b' , 8);
$pdf->SetXY(5,42);
$pdf->Cell('32',1,'PHONE NO: '.$data['pphone'],0,0,'L');
$pdf->SetFont('Arial' , 'b' , 8);



$pdf->SetFont('Arial' , 'B' , 8);
$pdf->SetXY(5,67);
$pdf->Cell('47',1,'Sheikh Fazilatuness Mujib Memorial',0,1,'C');
$pdf->SetXY(5,70);
$pdf->Cell('47',1,'KPJ Specialized Hospital',0,1,'C');




$pdf->Image('logo-kpj.jpg',27,79,10);
$pdf->Image('logo-sfmm.jpg',15,75,10);

//$pdf->SetXY(1,3.69);



//$pdf->Write(1.2,$sid);

$pdf->SetXY(6,25);
$pdf->Code128(6,50,$code,40,6);

//$pdf->SetXY(10,1.6);


$pdf->Output();

?>