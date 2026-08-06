<?php
$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','');
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$query8= $db->query("select * from einves where id='$id'");
$data = $query8->Fetch(PDO::FETCH_OBJ);

//$dname=$data['dname'];
$query2 = $db->query("select * from emergency where pmrn='$pmrn' and eid='$eid'");
$data2 = $query2->Fetch(PDO::FETCH_OBJ);
$dname2=$data->dname;

$tt1=$data->code;
$code=$data->barcode;

$queryc = $db->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

// Print out result


$cr=$resultc->remarks;
$unit=$resultc->unit;
//require('code128.php');


$query3 = $db->query("select * from emergency where pmrn='$pmrn'");
$data3 = $query3->Fetch(PDO::FETCH_OBJ);

require('force_justify1.php');





//$pdf1->AddPage();
$pdf=new PDF_Code128();


$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('22');
//$pdf->headerTable();
//$pdf->viewTable($db);

//$pdf1->AddPage();
//$pdf1->SetFont('Arial','',10);




//$code=$pmrn;
//$code1=$eid;
$pdf->SetXY(150,745);
$pdf->Code128(23,90,$code,40,10);
$pdf->SetXY(50,45);
//$pdf->Write(5,'A set: "'.$code.'"');

$pdf->ln(2);

//$pdf->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Times', 'bu',14);
$pdf->Cell('182',6,$data->infusion.' Report',0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',12);

$pdf->Cell('60',5,'Referring Consultant Name: '. $data->dname,0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '. $data->pname,0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data->pmrn,0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data->pgender,0,0,'L');
$pdf->Cell('50',5,'Age: '.$data->page,0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$data->rtime,0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data->resulttime,0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data->resultstatus,0,1,'L');




$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);

$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);

$pdf->SetFont('Times', 'B', 12);

$pdf->Cell('120',5,'Investigation Name',0,0,'L');
$pdf->Cell('80',5,'Result',0,1,'L');



$pdf->SetFont('Times', '', 12);
$pdf->ln(3);

	$pdf->Cell(120,5,$data->infusion,0,0);
	$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell(80,5,$data->result,0,0);


$pdf->ln(20);	
	
$pdf->Cell('120',5,'Method: Immunochromatography (ICT)',0,0,'L');	
	
$pdf->ln(10);	
	
$pdf->Cell('120',5,'Specimen: Nasopharyngeal swab.',0,0,'L');	

$pdf->ln(30);	
$pdf->SetFont('Times', 'bi', 12);	
$pdf->MultiCell('180',5,'Note: Test is carried out by SD Biosensor (Korea). This test is done as screening purpose. For Confirmation, please do the RT-PCR Covid Test.');	



$pdf->Ln(50);

$pdf->SetFont('Times', 'B', 12);
// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db, 'IMMUNOLOGY/SEROLOGY', (isset($data->resultby)?$data->resultby:''), '', (isset($data->conby)?$data->conby:''));
$pdf->Ln(10);

$pdf->Output();

?>