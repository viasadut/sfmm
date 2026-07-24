<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');

$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
require('force_justify1.php');
$pmrn=$_REQUEST['pmrn'];
$id='O'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from renal where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);

//$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);
$barcode=$data3['barcode'];



//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
$pdf=new PDF_Code128();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);





$pdf->SetXY(150,745);
$pdf->Code128(18,90,$barcode,40,10);
$pdf->SetXY(50,45);




$pdf->ln(1);
$pdf->SetFont('Times', 'bu',14);
$pdf->Cell('182',6,$data3['medi'].' Report',0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',12);

$pdf->Cell('60',5,'Referring Consultant Name: '. $data3['dname'],0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '. $data3['pname'],0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data3['pmrn'],0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data3['pgender'],0,0,'L');
$pdf->Cell('50',5,'Age: '.$data3['page'],0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$data3['retime'],0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data3['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data3['resultstatus'],0,1,'L');

$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);



$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);



$pdf->SetFont('Arial' , 'b' , 10);



$pdf->Cell('80',5,'Particulars',1,0,'C');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');



$pdf->Cell('80',5,'Uric Acid',1,0,'C');
$pdf->Cell('30',5,$data['uacid'],1,0,'C');
$pdf->Cell('31',5,'umol/L',1,0,'C');
$pdf->Cell('40',5,'202-434',1,1,'C');

$pdf->Cell('80',5,'Creatinine',1,0,'C');
$pdf->Cell('30',5,$data['creatinine'],1,0,'C');
$pdf->Cell('31',5,'mg/dL',1,0,'C');
$pdf->Cell('40',5,'0.58-1.30',1,1,'C');

$pdf->Cell('80',5,'Urea',1,0,'C');
$pdf->Cell('30',5,$data['urea'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,0,'C');
$pdf->Cell('40',5,'2.0-6.8',1,1,'C');

$pdf->Cell('80',5,'Sodium',1,0,'C');
$pdf->Cell('30',5,$data['sodium'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,0,'C');
$pdf->Cell('40',5,'135-145',1,1,'C');

$pdf->Cell('80',5,'Potassium',1,0,'C');
$pdf->Cell('30',5,$data['potassium'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,0,'C');
$pdf->Cell('40',5,'3.5-5.0',1,1,'C');


$pdf->Cell('80',5,'Chloride',1,0,'C');
$pdf->Cell('30',5,$data['chloride'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,0,'C');
$pdf->Cell('40',5,'94-110',1,1,'C');


$pdf->Cell('80',5,'Bicarbonate',1,0,'C');
$pdf->Cell('30',5,$data['bicarbonate'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,0,'C');
$pdf->Cell('40',5,'22-28',1,1,'C');

$pdf->Cell('80',5,'Total Protein',1,0,'C');
$pdf->Cell('30',5,$data['tprotein'],1,0,'C');
$pdf->Cell('31',5,'g/L',1,0,'C');
$pdf->Cell('40',5,'63-83',1,1,'C');

$pdf->Cell('80',5,'MicroAlbumin, Urine',1,0,'C');
$pdf->Cell('30',5,$data['micro_albu_urine'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,0,'C');
$pdf->Cell('40',5,'<20.0',1,1,'C');


$pdf->Cell('80',5,'Creatinine, Urine',1,0,'C');
$pdf->Cell('30',5,$data['creatinine_urine'],1,0,'C');
$pdf->Cell('31',5,'mg/L',1,0,'C');
$pdf->Cell('40',5,'2.0-20.0',1,1,'C');


$pdf->Cell('80',5,'Urine Albumin / Creatinine Ratio',1,0,'C');
$pdf->Cell('30',5,$data['urine_albumin_creatinine_ratio'],1,0,'C');
$pdf->Cell('31',5,'mg/mmoL',1,0,'C');
$pdf->Cell('40',5,'<3.5',1,1,'C');



$pdf->Cell('80',5,'Serum Calcium',1,0,'C');
$pdf->Cell('30',5,$data['scal'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,0,'C');
$pdf->Cell('40',5,'2.12-2.52',1,1,'C');


$pdf->Cell('80',5,'Serum Inorganic Phosphate (PO4)',1,0,'C');
$pdf->Cell('30',5,$data['po4'],1,0,'C');
$pdf->Cell('31',5,'mg/dL',1,0,'C');
$pdf->Cell('40',5,'2.4-5.1',1,1,'C');


$pdf->Cell('80',5,'eGFR(Estimated Glomerular Filration Rate',1,0,'C');
$pdf->Cell('30',5,$data['egfr'],1,0,'C');
$pdf->Cell('31',5,'mL/min/1.72mv',1,0,'C');
$pdf->Cell('40',5,'90-137',1,1,'C');




$pdf->Ln(15);







if($data3['cby'] !='')
{


$rby=$data3['resultby'];
$query24 = $db1->query("select * from user where uname='$rby'");
$data24 = $query24->Fetch(PDO::FETCH_OBJ);
$rby1=$data24->fullname;


$cby=$data3['cby'];
$query25 = $db1->query("select * from user where uname='$cby'");
$data25 = $query25->Fetch(PDO::FETCH_OBJ);
$cby1=$data25->fullname;


$query26 = $db1->query("select * from doctor1 where dname='$cby1'");
$data26 = $query26->Fetch(PDO::FETCH_OBJ);
$cby3=$data26->Discipline;







$pdf->Cell('100',5,'Result Updated By',0,0,'L');

$pdf->Cell('100',5,'Result Confirmed By',0,1,'L');



$pdf->Ln(1);

$pdf->Cell('100',5,$rby1,0,0,'L');

$pdf->Cell('100',5,$cby1,0,1,'L');

$pdf->Ln(1);

$pdf->Cell('100',5,'Lab Technologist',0,0,'L');

$pdf->Cell('100',5,$cby3,0,1,'L');

}



else 
{


$rby=$data3['resultby'];
$query24 = $db1->query("select * from user where uname='$rby'");
$data24 = $query24->Fetch(PDO::FETCH_OBJ);
$rby1=$data24->fullname;


//$cby=$data->cby;
//$query25 = $db->query("select * from user where uname='$cby'");
//$data25 = $query25->Fetch(PDO::FETCH_OBJ);
//$cby1=$data25->fullname;


//$query26 = $db->query("select * from doctor1 where dname='$cby1'");
//$data26 = $query26->Fetch(PDO::FETCH_OBJ);
//$cby3=$data26->Discipline;







$pdf->Cell('100',5,'Result Updated By',0,1,'L');

//$pdf->Cell('100',5,'Result Confirmed By',0,1,'L');



$pdf->Ln(1);

$pdf->Cell('100',5,$rby1,0,1,'L');

//$pdf->Cell('100',5,$cby1,0,1,'L');

$pdf->Ln(1);

$pdf->Cell('100',5,'Lab Technologist',0,1,'L');

//$pdf->Cell('100',5,$cby3,0,1,'L');

}




$pdf->ln(15);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Computer Generated Report, No Signature Required',0,1,'R');

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