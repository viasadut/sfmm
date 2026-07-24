<?php


require('WriteHTML.php');





//require('html2pdf.php');
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
//$id=$_REQUEST["id"];



$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');

$query7 = mysqli_query($db,"Select * from inpatient where pmrn='$pmrn' and eid='$eid';");

$data7 = mysqli_fetch_array($query7);

$pname=$data7['pname'];
$page=$data7['age'];
$psex=$data7['gender'];



$pdf = new PDF_HTML();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('22');
//$pdf->headerTable();
//$pdf->viewTable($db);






$pdf->Image('logo.jpg',15,7);
$pdf->Image('logo1.jpg',180,7);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(170,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$pdf->Ln(3);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(165,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$pdf->ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(165,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$pdf->ln(15);


$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('183',6,'Name:  '.$pname,0,1,'L');
$pdf->Cell('183',6,'Age:     '.$page.'         Gender: ' .  $psex.'          MRN: '.$pmrn,0,1,'L');
//$pdf->Cell('183',6,'MRN:   '.$pmrn,0,1,'L');
//$this->SetFont('Arial','B',);
$pdf->ln(2);



//$pdf->Cell('183',6,'FROM  '.$start1. '  TO  ' .$end1,0,1,'C');





$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);

$query1 = mysqli_query($db,"Select * from iinves where pmrn='$pmrn' and eid='$eid' and type='lab'order by ndate desc;");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);

$pdf->SetFont('Arial' , 'b' , 10);

$pdf->WriteHTML($data1['infusion'] .' ('.$data1['barcode'].' / '.$data1['pmrn'].' / '.$data1['ndate'].')');

$pdf->ln(5);


$tt1=$data1['code'];

require('db1.php');
$queryc = "SELECT * FROM radio where code= '$tt1'"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['reference'];
$unit=$rowc['unit'];








$pdf->SetFont('Arial' , '' , 10);
//$pdf->WriteHTML('Result:  '.$data1['result'].'('.$cr.')');
$pdf->WriteHTML($data1['result']);
$pdf->ln(10);

}




//$pdf->SetFont('Arial' , 'b' , 15);
//$pdf->Cell('90',5,'OUT PATIENT RECORD',1,0,'L');


//$pdf->ln(10);
//$pdf->MultiCell('160' , 5,$data['xl'],1,1);
//$pdf->Cell('30' , 5,'Doasge',1,1);
//$pdf->MultiCell('160' , 5,'jashfjh sjfh jsdhfjsdhjfh jsdhjf hjsdhfj dsjhf djsh jfdshjf dsjhf jdsh fdhsf hjsdhf sdhf jdhsf hdsjfhjsdhf sdhf jdshjfhjskdhf jsdh fjhsdjkf hjdsfjd s',1,1);
//$dd=$data['refer']

//$dd = rtrim($dd, ',');
//$string = rtrim($string, ',');




$pdf->Output();



