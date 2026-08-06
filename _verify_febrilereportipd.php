<?php
$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','');
require('force_justify1.php');
$pmrn=$_REQUEST['pmrn'];
$id='I'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from febrile where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);

//$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);
$dd=$data2['adoc'];

$query3 = mysqli_query($db,"select * from iinves where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);
$barcode=$data3['barcode'];
$testname=$data['iname'];


$query4 = mysqli_query($db,"select * from radio where iname='$testname'");
$data4 = mysqli_fetch_array($query4);



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
$pdf->Cell('182',6,$data['iname'].' Report',0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',12);

$pdf->Cell('60',5,'Referring Consultant Name: '. $dd,0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '. $data3['pname'],0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data3['pmrn'],0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data3['pgender'],0,0,'L');
$pdf->Cell('50',5,'Age: '.$data3['page'],0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$data3['rtime'],0,0,'L');	
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



$pdf->Cell('80',5,'Salmonella Paratyphi A-O (AO)',1,0,'C');
$pdf->Cell('30',5,$data['ao'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');

$pdf->Cell('80',5,'Salmonella Paratyphi A-H (AH)',1,0,'C');
$pdf->Cell('30',5,$data['ah'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');

$pdf->Cell('80',5,'Salmonella Paratyphi B-O (BO)',1,0,'C');
$pdf->Cell('30',5,$data['bo'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');


$pdf->Cell('80',5,'Salmonella Paratyphi B-H (BH)',1,0,'C');
$pdf->Cell('30',5,$data['bh'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');

$pdf->Cell('80',5,'Salmonella typhi-O (TO)',1,0,'C');
$pdf->Cell('30',5,$data['toa'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');


$pdf->Cell('80',5,'Salmonella typhi-H (TH)',1,0,'C');
$pdf->Cell('30',5,$data['th'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');



$pdf->Cell('80',5,'OX2',1,0,'C');
$pdf->Cell('30',5,$data['ox2'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');


$pdf->Cell('80',5,'OX19',1,0,'C');
$pdf->Cell('30',5,$data['ox19'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');


$pdf->Cell('80',5,'OXK',1,0,'C');
$pdf->Cell('30',5,$data['oxk'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');


$pdf->Cell('80',5,'Brucella Melitensis',1,0,'C');
$pdf->Cell('30',5,$data['brum'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');

$pdf->Cell('80',5,'Brucella Abortus',1,0,'C');
$pdf->Cell('30',5,$data['brua'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');

if($data4['interpretation']!='')
{
$pdf->ln(5);

$pdf->MultiCell('180',5,$data4['interpretation'],0,1);

}

$pdf->ln(15);




// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db1, 'IMMUNOLOGY/SEROLOGY', (isset($data3['resultby'])?$data3['resultby']:''));
$pdf->Ln(10);

$pdf->Output();