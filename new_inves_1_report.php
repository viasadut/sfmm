<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');

$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
//require('force_justify.php');
require('force_justify1.php');
$pmrn=$_REQUEST['pmrn'];
$id='I'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from b_gas_a where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);


//$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($db,"select * from iinves where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);
$barcode=$data3['id'];



$tt1=$data3['code'];


$queryc = $db1->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

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
$pdf->Cell('182',6,$data3['infusion'].' Report',0,1,'C');
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
$pdf->Cell('110',5,'Sample Date: '.$data3['rtime'],0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data3['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data3['resultstatus'],0,1,'L');

$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);



$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);


//$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('40',5,'Referral From:',1,0,'L');
//$pdf->Cell('141', 5,$data['dreffer'],1,1,'L');

$pdf->ln(3);


$pdf->SetFont('Arial' , 'b' , 10);



$pdf->Cell('80',5,'Particulars',1,0,'C');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('31',5,'Reference Range',1,1,'C');




$pdf->Cell('80',5,'Ph',1,0,'C');
$pdf->Cell('30',5,$data['ph'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('31',5,'7.35-7.45',1,1,'C');


 
$pdf->Cell('80',5,'PCO2',1,0,'C');
$pdf->Cell('30',5,$data['pco2'],1,0,'C');
$pdf->Cell('31',5,'mmHg',1,0,'C');
$pdf->Cell('31',5,'35-45',1,1,'C');




$pdf->Cell('80',5,'PO2',1,0,'C');
$pdf->Cell('30',5,$data['po2'],1,0,'C');
$pdf->Cell('31',5,'mmHg',1,0,'C');
$pdf->Cell('31',5,'80-100',1,1,'C');



$pdf->Cell('80',5,'BEecf',1,0,'C');
$pdf->Cell('30',5,$data['beecf'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('31',5,'-4 to +2',1,1,'C');



$pdf->Cell('80',5,'HCO3',1,0,'C');
$pdf->Cell('30',5,$data['hco3'],1,0,'C');
$pdf->Cell('31',5,'mEq/L',1,0,'C');
$pdf->Cell('31',5,'22-26',1,1,'C');



$pdf->Cell('80',5,'TCO2',1,0,'C');
$pdf->Cell('30',5,$data['tco2'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,0,'C');
$pdf->Cell('31',5,'23-29',1,1,'C');



$pdf->Cell('80',5,'sO2',1,0,'C');
$pdf->Cell('30',5,$data['so2'],1,0,'C');
$pdf->Cell('31',5,'%',1,0,'C');
$pdf->Cell('31',5,'95-100',1,1,'C');



$pdf->Cell('80',5,'Lac',1,0,'C');
$pdf->Cell('30',5,$data['lac'],1,0,'C');
$pdf->Cell('31',5,'mmol/dL',1,0,'C');
$pdf->Cell('31',5,'0.5-2.0',1,1,'C');


$pdf->Ln(15);



$pdf->SetTextColor(000,0,0);








// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db1, 'PROFILE', (isset($data3['resultby'])?$data3['resultby']:''), (isset($data3['checked_by'])?$data3['checked_by']:''), (isset($data3['conby'])?$data3['conby']:''));
$pdf->Ln(10);

$pdf->Output();