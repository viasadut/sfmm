<?php

//require('code128.php');
require('force_justify1_new.php');





//$pdf1->AddPage();
$pdf=new PDF_Code128();


$pdf->AliasNbPages();
$pdf->AddPage('L','adbar',0);
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 13);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);

//$pdf1->AddPage();
//$pdf1->SetFont('Arial','',10);

//$sid=$_REQUEST['sid'];
//$cname=$_REQUEST['cname'];
function footer(){
//$this->SetY(-);
}




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
$pdf->ClippingCircle(19,14,9,true);
$pdf->Image('prescription/prescription/doctor/780.jpg',10,7,20);
$pdf->UnsetClipping();


$pdf->SetFont('Arial' , 'ubi' , 16);
$pdf->SetXY(14,14);
$pdf->Cell('74',1,'PATIENT CARD',0,1,'C');


$pdf->SetFont('Arial' , 'b' , 10);
$pdf->SetXY(5,26);
$pdf->Cell('32',1,'MRN-'.$pmrn,0,1,'L');


$pdf->SetFont('Arial' , 'b' , 10);

$pdf->SetXY(5,30);
$pdf->Cell('32',1,'NAME:'.$data['pname'],0,1,'L');
$pdf->SetFont('Arial' , '' , 10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->SetXY(46,26);
$pdf->Cell('32',1,'PHONE NO: 01711898765 ',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 8);

$pdf->SetFont('Arial' , 'B' , 8);
$pdf->SetXY(5,36);
$pdf->Cell('47',1,'Sheikh Fazilatuness Mujib Memorial KPJ Specialized Hospital',0,1,'L');

$pdf->Image('logo-kpj.jpg',50,44,10);
$pdf->Image('logo-sfmm.jpg',35,40,10);


//$pdf->SetXY(1,3.69);



//$pdf->Write(1.2,$sid);

//$pdf->SetXY(6,25);
$pdf->Code128(45,2,$code,40,6);

//$pdf->SetXY(10,1.6);


$pdf->Output();

?>