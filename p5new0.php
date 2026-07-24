<?php
//require('force_justify.php');
require('fpdf/fpdf1.php');


//require('force_justify.php');
$sid=$_REQUEST['sid'];
$sdate=$_REQUEST['sdate'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from cafesale where sid='$sid' and sdate='$sdate'");
$data = mysqli_fetch_array($query);
$eby=$data['eby'];
$stime=$data['stime'];
//$b = date( 'j-F-Y', strtotime( $d) );




//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{



//$this->Ln();
}
//$pdf = new FPDF('P','mm',array(100,150));

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','yy',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('2');
//$pdf->headerTable();
//$pdf->viewTable($db);



$pdf->ln(0);




$pdf->SetFont('Arial' , 'b' , 8);
$pdf->Cell('182',5,'Sheikh Fazilatunessa Mujib Memorial KPJ Specialized Hospital',0,1,'L');

$pdf->ln(5);
$pdf->Cell('40',5,'------------------------------------- INVOICE -------------------------------------',0,0,'L');

$pdf->ln(5);
$pdf->Cell('40',5,'Sales By:',0,0,'L');
$pdf->Cell('40',5,$eby,0,1,'R');
$pdf->Cell('40',5,'Sales Time:',0,0,'L');
$pdf->Cell('40',5,$stime,0,1,'R');
$pdf->SetFont('Arial' , '' , 10);





$pdf->ln(5);
$pdf->Cell('75',5,'----------------------------------------------------------------------',0,1,'L');
$pdf->SetFont('Arial' , 'b' , 7);
$pdf->Cell('3',5,'Sno',0,0,'L');
$pdf->Cell('52',5,'Item Description',0,0,'C');
$pdf->Cell('10',5,'U.Price',0,0,'L');
$pdf->Cell('10',5,'Qty',0,0,'L');
$pdf->Cell('10',5,'Price',0,1,'L');
$pdf->Cell('75',5,'----------------------------------------------------------------------------------------------------',0,1,'L');
$count=1;
$query1 = mysqli_query($db,"select * from cafesale where sid='$sid' and sdate='$sdate'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 7);
$pdf->Cell('3' , 5,$count,0,0,'L');
$pdf->Cell('52' , 5,$data1['ename'],0,0,'L');
$pdf->Cell('10' , 5,$data1['uprice'],0,0,'L');
$pdf->Cell('10' , 5,$data1['eqty'],0,0,'L');
$pdf->Cell('10' , 5,$data1['tprice'],0,1,'L');
$count++;
}


$query498 = mysqli_query($db,"SELECT SUM(tprice) FROM cafesale where sdate='$sdate' and sid='$sid'"); 
	 
$result498 = mysqli_fetch_array($query498) or die(mysqli_error());

// Print out result
//$row498 = mysqli_fetch_array($result498);

$test4=	$result498['SUM(tprice)'];

$pdf->SetFont('Arial' , 'b' , 8);

$pdf->Cell('75',5,'---------------------------------------------------------------------------------------',0,1,'L');
$pdf->Cell('40',5,'Total Price:',0,0,'L');
$pdf->Cell('45',5,$test4.' Tk.',0,1,'R');


$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 8);
$pdf->Cell('90',5,'*** Thank You ***',0,0,'C');



//$pdf->MultiCell('160' , 5,$data['xl'],1,1);
//$pdf->Cell('30' , 5,'Doasge',1,1);
//$pdf->MultiCell('160' , 5,'jashfjh sjfh jsdhfjsdhjfh jsdhjf hjsdhfj dsjhf djsh jfdshjf dsjhf jdsh fdhsf hjsdhf sdhf jdhsf hdsjfhjsdhf sdhf jdshjfhjskdhf jsdh fjhsdjkf hjdsfjd s',1,1);
//$dd=$data['refer']

//$dd = rtrim($dd, ',');
//$string = rtrim($string, ',');

$pdf->Output();