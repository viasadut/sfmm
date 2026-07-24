<?php


require('WriteHTML.php');





//require('html2pdf.php');
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
$desig=$_REQUEST["dept"];
require('db1.php');


$query43m = "SELECT COUNT(name) FROM covid where desig='medical officer' and fresult='P'"; 
	 
$result43m = mysqli_query($con, $query43m) or die(mysqli_error());
$row43m = mysqli_fetch_assoc($result43m);
$qtym=$row43m['COUNT(name)'];


$query43s = "SELECT COUNT(name) FROM covid where desig not in ('Staff Nurse','Junior Nurse','Trainee Nurse','Consultant','Specialist','Sonologist','Medical Officer')and desig !='' and fresult='P'"; 
	 
$result43s = mysqli_query($con, $query43s) or die(mysqli_error());
$row43s = mysqli_fetch_assoc($result43s);
$qtys=$row43s['COUNT(name)'];



$query43c = "SELECT COUNT(name) FROM covid where desig in ('Consultant','Specialist','Sonologist')and desig !='' and fresult='P'"; 
	 
$result43c = mysqli_query($con, $query43c) or die(mysqli_error());
$row43c = mysqli_fetch_assoc($result43c);
$qtyc=$row43c['COUNT(name)'];


$query43n = "SELECT COUNT(name) FROM covid where desig in ('Staff Nurse','Junior Nurse','Trainee Nurse')and desig !='' and fresult='P'"; 
	 
$result43n = mysqli_query($con, $query43n) or die(mysqli_error());
$row43n = mysqli_fetch_assoc($result43n);
$qtyn=$row43n['COUNT(name)'];


$query43o = "SELECT COUNT(name) FROM covid where desig ='' and fresult='P'"; 
	 
$result43o = mysqli_query($con, $query43o) or die(mysqli_error());
$row43o = mysqli_fetch_assoc($result43o);
$qtyo=$row43o['COUNT(name)'];


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

if($desig=='Consultant'){
$pdf->SetFont('Arial' , 'b' , 13);
//$pdf->Cell('183',6,$qtyc.' Consultants Are Found'},0,1,'C');}
$pdf->WriteHTML($qtyc.' Consultants Are Found');
$pdf->ln(10);

}

if($desig=='Medical Officer'){
$pdf->SetFont('Arial' , 'b' , 13);
//$pdf->Cell('183',6,$qtyc.' Consultants Are Found'},0,1,'C');}
$pdf->WriteHTML($qtym.' Medical Officers Are Found');
$pdf->ln(10);

}


if($desig=='Nurse'){
$pdf->SetFont('Arial' , 'b' , 13);
//$pdf->Cell('183',6,$qtyc.' Consultants Are Found'},0,1,'C');}
$pdf->WriteHTML($qtyn.' Nurses Are Found');
$pdf->ln(10);

}

if($desig=='Staff'){
$pdf->SetFont('Arial' , 'b' , 13);
//$pdf->Cell('183',6,$qtyc.' Consultants Are Found'},0,1,'C');}
$pdf->WriteHTML($qtys.' Staffs Are Found');
$pdf->ln(10);

}

if($desig=='Others'){
$pdf->SetFont('Arial' , 'b' , 13);
//$pdf->Cell('183',6,$qtyc.' Consultants Are Found'},0,1,'C');}
$pdf->WriteHTML($qtyo.' Other People Are Found');
$pdf->ln(10);

}

$pdf->SetFont('Arial' , 'b' , 10);
if($desig=='Consultant'){
$query1 = mysqli_query($db,"Select * from covid where desig in ('Consultant','Specialist','Sonologist') and fresult='P' order by ssent desc;");

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
}

if($desig=='Nurse'){
$query1 = mysqli_query($db,"Select * from covid where desig in ('Staff Nurse','Junior Nurse','Trainee Nurse') and fresult='P' order by ssent desc;");

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
}


if($desig=='Staff'){
$query1 = mysqli_query($db,"Select * from covid where desig not in ('Staff Nurse','Junior Nurse','Trainee Nurse','Consultant','Specialist','Sonologist','Medical Officer')and desig !='' and fresult='P' order by ssent desc;");

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
}



if($desig=='Others'){
$query1 = mysqli_query($db,"Select * from covid where desig =''and fresult='P' order by ssent desc;");

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
}


if($desig=='Medical Officer'){
$query1 = mysqli_query($db,"Select * from covid where fresult='P' and desig ='medical Officer'order by ssent desc;");

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



