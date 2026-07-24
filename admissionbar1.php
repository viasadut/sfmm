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
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data = mysqli_fetch_assoc($query4);
$dname=$data['adoc'];

$query5 = mysqli_query($db,"select * from doctor1 where dname='$dname'");
$data1 = mysqli_fetch_assoc($query5);
$dis=$data1['Discipline'];

$query59 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data59 = mysqli_fetch_assoc($query59);



$code=$pmrn;
//$code1=$eid;


//$pdf->SetXY(1,3.7);
//$pdf->Write(2,$cname);


$pdf->SetFont('Courier' , '' , 6.5);
$pdf->SetXY(9,6);
$pdf->Cell('62',1,'Sheikh Fazilatuness Mujib Memorial KPJ Specialized Hospital',0,1,'L');
$pdf->Ln(2);


$pdf->SetFont('Courier' , 'b' , 16);
$pdf->SetXY(10,10.7);
$pdf->Cell('32',1,'MRN-'.$data['pmrn'],0,1,'L');


$pdf->SetFont('Courier' , '' , 10);
$pdf->SetXY(10,18);
$pdf->Cell('32',1,'Admission Date:'.$data['adate'],0,1,'L');

$pdf->SetXY(10,21);
$pdf->Cell('32',1,'Bed:'.$data['room1'],0,0,'L');

$pdf->SetXY(50,21);
$pdf->Cell('32',1,'Ward:'.$data['room'],0,1,'L');

$pdf->SetXY(10,24);
$pdf->Cell('32',1,'Consultant Name:'.$data['adoc'],0,1,'L');

$pdf->SetXY(10,27);
$pdf->Cell('32',1,$dis,0,1,'L');



$pdf->SetXY(10,30);
$pdf->Cell('32',1,'Patient Name:'.$data['pname'],0,1,'L');

$pdf->SetXY(10,33);
$pdf->Cell('32',1,'Age:'.$data['age'],0,0,'L');

$pdf->SetXY(40,33);
$pdf->Cell('32',1,'Gender:'.$data['gender'],0,1,'L');

$pdf->SetXY(58,33);
$pdf->Cell('32',1,'Phone:'.$data['pphone'],0,1,'L');

$pdf->SetXY(10,36);
$pdf->Multicell('80',1,'Address:'.$data['padd']);



//$pdf->SetXY(1,3.69);



//$pdf->Write(1.2,$sid);

$pdf->SetXY(20,25);
$pdf->Code128(48,8.7,$code,40,6);

//$pdf->SetXY(10,1.6);


$pdf->Output();

?>