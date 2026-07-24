<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


//require('force_justify.php');

//require('html5.php');
require('html_table.php');
$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from radreport where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_array($query);

$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from doctor1 where dname='$dname'");
$data2 = mysqli_fetch_array($query2);




//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');



//$pdf = new PDF_HTML();
$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('22');

//$pdf->headerTable();
//$pdf->viewTable($db);


$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('182',6,$data['type'].' REPORT',1,1,'C');
//$this->SetFont('Arial','B',);

$pdf->ln(10);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40',5,'Consultant Name:',0,0,'L');
$pdf->Cell('90',5,$data['dname'],0,0,'L');
$pdf->ln(4);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40');
$pdf->Cell('160',5,$data2['degree'],0,0,'L');
$pdf->ln(4);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40');
$pdf->Cell('160',5,$data2['Discipline'],0,0,'L');

$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['pname'],1,0,'L');
$pdf->Cell('12',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('8',5,$data['gender'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('27',5,$data['age'],1,1,'L');

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('40',5,'Referral From:',1,0,'L');
$pdf->Cell('141', 5,$data['dreffer'],1,1,'L');

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('120',5,'Detail Report:',1,0,'L');
$pdf->Cell('62',5,'Time & Date: '.$data['time'].' '.$data['date2'],1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
//$pdf->MultiCell('182' , 5,$data['report'],0,1);
$pdf->WriteHTML($data['report']);
//$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('182' , 5,$data['find'],0,1);




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