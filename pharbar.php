<?php

//$db1 = mysqli_connect('localhost','root','Godiloveu16');
//mysqli_select_db($db1,'sfmmkpjnew');


//$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$pmrn=$_REQUEST['pmrn'];
//$id=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$date=date('m/d/Y');
//require('code128.php');
require('force_justify1.php');





//$pdf1->AddPage();
$pdf=new PDF_Code128();


$pdf->AliasNbPages();
$pdf->AddPage('L','lbar',0);
//$pdf->AddPage('P','A4',0);
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);

//$pdf1->AddPage();
//$pdf1->SetFont('Arial','',10);




//$code=$pmrn;
//$code1=$eid;
//$pdf->SetXY(150,745);
//$pdf->Code128(18,90,$code,40,10);
//$pdf->SetXY(50,45);
//$pdf->Write(5,'A set: "'.$code.'"');

$pdf->ln(2);

//$pdf->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Times', 'bu',14);
$pdf->Cell('182',6,' Report',0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',12);



$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);

$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);

$pdf->SetFont('Times', 'B', 10);





$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);

$count=1;
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');


$query1 = mysqli_query($db,"Select * from pmedi where pmrn='$pmrn' and eid='$eid';");

while($data1 = mysqli_fetch_array($query1))
{




//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('3' , 5,$count.'.',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('90' , 5,$data1['medi'],0,1);


$pdf->Cell('25' , 5,'   '.$data1['dname'],0,1);
$pdf->Cell('25' , 5,'   '.$data1['pdos'],0,1);


$count++;
$pdf->ln(1);
}





$pdf->ln(15);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Computer Generated Report, No Signature Required',0,1,'R');


$pdf->Output();

?>