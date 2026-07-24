<?php


require('WriteHTML.php');





//require('html2pdf.php');
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');

require('db1.php');
$query43 = "SELECT COUNT(name) FROM covid where fresult='P'"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$qty=$row43['COUNT(name)'];


$pdf = new PDF_HTML();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('20');
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


$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('183',6,'Details COVID Records',0,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(2);



$pdf->Cell('183',6,$qty.' Records Found',0,1,'C');





$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);

$query1 = mysqli_query($db,"Select * from covid where fresult='P' order by ssent desc;");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);

$pdf->SetFont('Arial' , 'b' , 10);

$pdf->WriteHTML('Name :   ' .  $data1['name'] .' ('.$data1['desig'].', '.$data1['depart'].')');


$pdf->ln(5);


$pdf->SetFont('Arial' , 'b' , 10);

$pdf->WriteHTML('Staff ID                   : '.' SFMM'.$data1['sid']);

$pdf->ln(5);


$pdf->SetFont('Arial' , '' , 10);

$pdf->WriteHTML('Address                   : '.$data1['padd']);
$pdf->ln(4);
$pdf->WriteHTML('Phone                      : '.$data1['phone']);
$pdf->ln(4);
$pdf->WriteHTML('Contact Pattern       : '.$data1['cp']);
$pdf->ln(4);
$pdf->WriteHTML('Sent To                    : '.$data1['sentto']);
$pdf->ln(4);
$pdf->WriteHTML('Sample Sent            :'.$data1['ssent1']);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->ln(4);
if($data1["fresult"]=='N'){
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->WriteHTML('Result                      : '.$data1['fresult']);}

else {
	$pdf->SetTextColor(255,0,0);
	$pdf->SetFont('Arial' , 'b' , 10);
$pdf->WriteHTML('Result                      : '.$data1['fresult']);

}
$pdf->ln(4);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial' , '' , 10);
$pdf->WriteHTML('Last Contact            : '.$data1['ldate1']);
$pdf->ln(4);
$pdf->WriteHTML('Distance >1m          : '.$data1['distance']);
$pdf->ln(4);
$pdf->WriteHTML('Contact Duration     : '.$data1['cduration']);
$pdf->ln(4);
$pdf->WriteHTML('Quarantine Duration: '.$data1['quntil1']);
$pdf->ln(4);
$pdf->WriteHTML('Retest                      : '.$data1['retest1']);
$pdf->ln(4);
$pdf->WriteHTML('Primary Case           : '.$data1['pcase']);
$pdf->ln(4);
$pdf->WriteHTML('Remarks                  : '.$data1['remarks']);

$pdf->ln(8);

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



