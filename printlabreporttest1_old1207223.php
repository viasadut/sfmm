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
$eeid=$data7['emerid'];



//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');





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
$pdf->Cell('183',6,'____________________________________________________________________________',0,1,'L');
$pdf->Cell('183',6,'Name:  '.$pname,0,1,'L');
$pdf->Cell('183',6,'Age:     '.$page.'         Gender: ' .  $psex.'          MRN: '.$pmrn,0,1,'L');
$pdf->Cell('183',6,'____________________________________________________________________________',0,1,'L');
//$pdf->Cell('183',6,'MRN:   '.$pmrn,0,1,'L');
//$this->SetFont('Arial','B',);
$pdf->ln(2);



$pdf->SetFont('Arial' , 'bu' , 15);
$pdf->Cell('183',6,'LAB INVESTIGATION RECORD (INPATIENT)',0,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(2);



//$pdf->Cell('183',6,'FROM  '.$start1. '  TO  ' .$end1,0,1,'C');


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);

$query11 = mysqli_query($db,"Select * from einves where pmrn='$pmrn' and eid='$eeid' and type='lab' and status='Received' order by odate1 desc;");

while($data11 = mysqli_fetch_array($query11))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);

$pdf->SetFont('Arial' , 'b' , 10);

$pdf->WriteHTML('Investigation Name :   ' .  $data11['infusion'] .' ('.$data11['barcode'].' / '.$data11['pmrn'].' / '.$data11['odate1'].')');

$pdf->ln(5);


$tt1=$data11['code'];

require('db1.php');
$queryc = "SELECT * FROM radio where code= '$tt1'"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['reference'];
$unit=$rowc['unit'];








if($data11['result']!=''){
$pdf->SetFont('Arial' , '' , 10);
//$pdf->WriteHTML('Result:  '.$data1['result'].'('.$cr.')');
$pdf->WriteHTML('Result:  '.$data11['result1']);
$pdf->ln(10);
}
else if($data11['result']==''){
$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->WriteHTML('Result:  '.$data1['result'].'('.$cr.')');
$pdf->WriteHTML('Result: Report Pending  ');
$pdf->ln(10);
}

}


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);

$query1 = mysqli_query($db,"Select * from iinves where pmrn='$pmrn' and eid='$eid' and type='lab' and status='RECEIVED'order by ndate desc;");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);

$pdf->SetFont('Arial' , 'b' , 10);

$pdf->WriteHTML('Investigation Name :   ' .  $data1['infusion'] .' ('.$data1['barcode'].' / '.$data1['pmrn'].' / '.$data1['ndate'].')');

$pdf->ln(5);


$tt1=$data1['code'];

require('db1.php');
$queryc = "SELECT * FROM radio where code= '$tt1'"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['reference'];
$unit=$rowc['unit'];







if($data1['result']!=''){
$pdf->SetFont('Arial' , '' , 10);
//$pdf->WriteHTML('Result:  '.$data1['result'].'('.$cr.')');
$pdf->WriteHTML('Result:  '.$data1['result1']);
$pdf->ln(10);
}
else if($data1['result']==''){
$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->WriteHTML('Result:  '.$data1['result'].'('.$cr.')');
$pdf->WriteHTML('Result: Report Pending  ');
$pdf->ln(10);
}
}

$pdf->SetFont('Arial' , 'bu' , 15);
$pdf->Cell('183',6,'RADIOLOGY INVESTIGATION RECORD (INPATIENT)',0,1,'C');
$pdf->ln(10);



$query1 = mysqli_query($db,"Select * from radreport where pmrn='$pmrn' and emerid='$eeid' order by id desc;");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);




$pdf->SetFont('Arial' , 'b' , 10);

$pdf->WriteHTML('Investigation Name :   ' .  $data1['type']);

$pdf->ln(5);
$pdf->Cell('62',5,'Time & Date: '.$data1['time'].' '.$data1['date2'],0,1,'L');
$pdf->MultiCell('182' , 5,$data1['report'],0,1);
//$pdf->WriteHTML('Detail Report:  '.$data1['report']);
$pdf->WriteHTML('Findings:  '.$data1['find']);
$pdf->ln(10);

}





$query1 = mysqli_query($db,"Select * from radreport where pmrn='$pmrn' and ineid='$eid' order by id desc;");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);




$pdf->SetFont('Arial' , 'b' , 10);

$pdf->WriteHTML('Investigation Name :   ' .  $data1['type']);

$pdf->ln(5);
$pdf->Cell('62',5,'Time & Date: '.$data1['time'].' '.$data1['date2'],0,1,'L');
if($data1['report1']=='')
{
$pdf->MultiCell('182' , 5,$data1['report'],0,1);
$pdf->WriteHTML('Findings:  '.$data1['find']);
$pdf->ln(10);

}

if($data1['report1']!='')
{
$pdf->MultiCell('182' , 5,$data1['report1'],0,1);
}
//$pdf->WriteHTML('Detail Report:  '.$data1['report']);

}




$pdf->Output();



