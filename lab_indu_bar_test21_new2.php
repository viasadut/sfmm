<?php

require('codabar.php');
//require('force_justify1.php');

require('db1.php');

$dd=date('d/m/Y');
$retime=date('Y-m-d');

//$pdf1->AddPage();
$pdf=new PDF_Codabar();



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

$query1 = mysqli_query($db,"select * from alltest where id='$id' and billstatus='Billed' and type in('lab','LAB','Lab') and rstatus ='Received' and barcode1!=''");

while($data1 = mysqli_fetch_array($query1))
{
	
//$pdf->AddPage('A4');
//$pdf1->AddPage('P','A4',0);
$pdf->AddPage('L','cbar13');


//$pdf->SetFont('arial' , '' , 7);
$pdf->Codabar(7,.7,'123456');
//$pdf->ln(10);

}







$pdf->Output();

?>