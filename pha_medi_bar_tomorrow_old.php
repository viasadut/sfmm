<?php

require('code128.php');
//require('force_justify1.php');

require('db1.php');

$dd= date('m/d/Y',strtotime("+1 days")); 
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

$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
//$bar=$_REQUEST['bar'];
//$pname=$_REQUEST['pname'];
//$rinfusion=$_REQUEST['rinfusion'];
$nn=date('Y-m-d');
//$pdf->ln(10);
//$code=$pmrn;
//$code='123456789';

$sel96="SELECT * FROM imedi3 WHERE `pmrn`='$pmrn' and eid='$eid' and pstatus='Served' and status !='Cancel' order by id desc limit 1;";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);

$pno=$b_chk_m['pno'];

//$pdf->Write(1.2,$sid);
//$pdf->SetXY(10,1.6);


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query1 = mysqli_query($db,"select * from imedi3 where pmrn='$pmrn' and eid='$eid' and pstatus ='Served' and status !='Cancel' and pno='$pno' and odate='$dd' order by infusion asc");

while($data1 = mysqli_fetch_array($query1))
{
	
$pdf->AddPage('L','cbar1');
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9.5);
$pdf->SetLeftMargin('17');
$pdf->SetXY(1,1);
//$pdf->SetXY(23,1);
$pdf->Cell('5',2,$data1['rfid'],0,0,'L');

$pdf->SetXY(25,1);
$pdf->SetFont('Arial' , 'b' , 5);
$pdf->Cell('5',2,'DT-'.$data1['ndate'],0,1,'L');
//$pdf->Cell('5',2,$data1['barcode'],0,0,'L');
$pdf->SetXY(1,3.5);
$pdf->SetFont('Arial' , 'b' , 5);
$pdf->Cell('5',1,'MRN-'.$data1['pmrn'].'  (Time-'.$data1['time'].')',0,1,'L');

/*$pdf->SetXY(1,5.1);
$pdf->SetFont('Arial' , 'b' , 4.5);
$pdf->Cell('50',1,'Time:'. $data1['time'],0,1);
*/
$pdf->SetXY(1,5);
$pdf->SetFont('Arial' , 'b' , 5);
$pdf->MultiCell('35',1.2,$data1['infusion']);
$pdf->SetXY(1,7);
$pdf->Code128(2,9,$data1['rfid'],35,10);
}












$pdf->Output();

?>