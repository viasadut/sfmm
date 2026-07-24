<?php

//require('code128.php');
require('force_justify1.php');





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
$bagno=$_REQUEST['bagno'];
$sno=$_REQUEST['sno'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');


$query59 = mysqli_query($db,"select * from bcross1 where bagno='$bagno' and sno='$sno'");
$data59 = mysqli_fetch_assoc($query59);
$pmrn=$data59['dmrn'];

$query0 = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
$data0 = mysqli_fetch_assoc($query0);


$code=$pmrn;
//$code1=$eid;

$rr=date('d/m/Y',strtotime($data59["udate"]));
//$pdf->SetXY(1,3.7);
//$pdf->Write(2,$cname);


$pdf->SetFont('Arial' , '' , 6.5);
$pdf->SetXY(9,6);
$pdf->Cell('62',1,'Sheikh Fazilatuness Mujib Memorial KPJ Specialized Hospital',0,1,'L');
$pdf->Ln(2);


$pdf->SetFont('Arial' , 'ubi' , 16);
$pdf->SetXY(10,11);
$pdf->Cell('32',1,'BLOOD GROUP CARD',0,1,'L');


$pdf->SetFont('Arial' , 'b' , 16);
$pdf->SetXY(10,18);
$pdf->Cell('32',1,'MRN-'.$pmrn,0,1,'L');


$pdf->SetFont('Arial' , 'b' , 10);

$pdf->SetXY(10,24);
$pdf->Cell('32',1,'Name:'.$data0['pname'],0,1,'L');
$pdf->SetFont('Arial' , '' , 8);




$pdf->SetFont('Arial' , 'b' , 10);
$pdf->SetXY(10,28);
$pdf->Cell('32',1,'Blood Group: '.$data59['abo'],0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->SetXY(40,28);
$pdf->Cell('32',1,'Rh Factor: '.$data59['rhe'],0,1,'L');


$pdf->SetXY(10,32);
$pdf->Cell('80',1,'Donation Date:'.$rr,0,0,'L');
$pdf->SetXY(10,36);
$pdf->Cell('80',1,'Bag No:'.$data59['bagno'],0,0,'L');
$pdf->SetXY(48,36);
$pdf->Cell('80',1,'Center: SFMMKPJSH',0,1,'L');



//$pdf->SetXY(1,3.69);



//$pdf->Write(1.2,$sid);

$pdf->SetXY(20,25);
$pdf->Code128(48,14.7,$code,40,6);

//$pdf->SetXY(10,1.6);


$pdf->Output();

?>