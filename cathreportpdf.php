<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['adoc'];
//$date=$_REQUEST['adate'];
$eid=$_REQUEST['eid'];



$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from cathreport where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_array($query);



$dstatus1=$data['pperform'];
$treat=explode(',',$dstatus1);





//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{



//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('15');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->ln(30);
$pdf->SetFont('Arial' , 'b' , 16);
$pdf->Cell('180',6,'CORONARY ANGIOGRAM REPORT',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->Cell('120',5,'Reporting Date & Time:',0,0,'R');
$pdf->Cell('40',5,$data['rdate'],0,0,'L');

$pdf->Cell('14',5,'Episode:',0,0,'L');
$pdf->Cell('40',5,$data['eid'],0,0,'L');

$pdf->ln(6);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('8',5,$data['pgender'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('24',5,$data['page'],1,1,'L');

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);




$pdf->Cell('180',5,'Performing Physician',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['pperform'],1,1);

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Route',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['route'],1,1);

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Diagnosis',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['iprocedure'],1,1);

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'TECHNIQUE OF PROCEDURE',1,1,'L');
$pdf->ln(1);

$pdf->Cell('180',5,'Diag. Catheter',1,1,'L');

$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['tprocedure'],1,1);

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Diag. Wire',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['tprocedure1'],1,1);

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Introducer Sheath',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['tprocedure2'],1,1);

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Contrast',1,1,'L');

$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['tprocedure3'],1,1);

$pdf->ln(1);


$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('180',5,'ANTICOAGULATION & OTHER MED',1,1,'L');

$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['anti'],1,1);

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'PROCEDURE FINDINGS',1,1,'L');
$pdf->ln(1);

$pdf->Cell('180',5,'LMCA',1,1,'L');

$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['pfind'],1,1);

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'LAD',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['pfind1'],1,1);

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'LCX',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['pfind2'],1,1);

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'RAMUS',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['ramus'],1,1);

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'RCA',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['pfind3'],1,1);

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'LIMA',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['pfind4'],1,1);

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Findings',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['con'],1,1);

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Recommendation',1,1,'L');

$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180',5,$data['plan'],1,1);
//$pdf->ln();
$pdf->ln(10);
$pdf->SetFont('Arial' , 'b' , 10);
foreach ($treat as $item) {
	    //$pdf->$item = trim($item);

	
	//echo "<span class=''>".$item."</span>";

//foreach ($treat as $item) {


//$pdf->$item;

$query_d = mysqli_query($db,"select * from doctor where dname='$item'");
$data_d = mysqli_fetch_array($query_d);
$degree=$data_d['degree'];
$desig=$data_d['desig'];


$pdf->Cell('120',5,$item,0,0);


}	



//$pdf->ln(10);
//$pdf->Cell('100');
//$pdf->Cell('55',5,'Computer Generated Report, No need signature',0,0,'L');




$pdf->Output();