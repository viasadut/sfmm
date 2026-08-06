<?php


$db2 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','');


$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','');
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
$sno='O'.$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$query8= $db->query("select * from alltest where id='$id'");
$data = $query8->Fetch(PDO::FETCH_OBJ);

//$dname=$data['dname'];
$query2 = $db->query("select * from mtb where sno='$sno'");
$data2 = $query2->Fetch(PDO::FETCH_OBJ);
$dname2=$data->dname;

$tt1=$data->code;
$code=$data->barcode;

$queryc = $db->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

// Print out result


$cr=$resultc->remarks;
$unit=$resultc->unit;
$inter=$resultc->interpretation;
//require('code128.php');


$query3 = $db->query("select * from pappnew where pmrn='$pmrn'");
$data3 = $query3->Fetch(PDO::FETCH_OBJ);

require('force_justify1.php');





//$pdf1->AddPage();
$pdf=new PDF_Code128();


$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);

//$pdf1->AddPage();
//$pdf1->SetFont('Arial','',10);



//$code=$pmrn;
//$code1=$eid;
$pdf->SetXY(150,745);
$pdf->Code128(18,90,$code,40,10);
$pdf->SetXY(50,45);
//$pdf->Write(5,'A set: "'.$code.'"');

$pdf->ln(2);

//$pdf->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Times', 'bu',14);
$pdf->Cell('182',6,$data->medi.' Report',0,1,'C');
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
$pdf->Cell('110',5,'Sample Date: '.$data->retime,0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data->resulttime,0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data->resultstatus,0,1,'L');

$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);

$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);

$pdf->SetFont('Times', 'B', 12);

$pdf->ln(5);
$pdf->Cell(90,5,'Investigation Name',1,0,'L');
$pdf->Cell(90,5,'Result ',1,1,'C');
$pdf->Cell(90,5,$data->medi ,1,0,'L');
$pdf->Cell(90,5,$data2->type ,1,1,'C');
$pdf->ln(7);


$pdf->Cell(100,5,'Specimen Tested: '. $data2->s_test ,0,1,'L');
$pdf->ln(2);
$pdf->Cell(100,5,'Test Advised: '. $data2->result ,0,1,'L');
$pdf->ln(2);
$pdf->Cell(100,5,'Method used: '. $data2->crate ,0,1,'L');
$pdf->ln(5);

$pdf->Cell(100,5,'Note:',0,1,'L');
$pdf->SetFont('Times', '', 12);

$pdf->MultiCell(180,5,$data2->opinion);

$pdf->SetFont('Times', 'b', 12);
$pdf->ln(10);

$pdf->Cell(90,5,'Test Platform:',0,1,'L');

$pdf->SetFont('Times', '', 12);
$pdf->ln(2);

$pdf->MultiCell(180,5,'PCR kit	: CE marked kit
Extraction	: ExiprepTM 16 Dx, Bioneer corporation, Republic of korea
Amplification	: Exicycler TM 96, Bioneer corporation, Republic of korea
Specificity	: All M. Tuberculosis complex
Primer/Probe	: Temra
');




$pdf->Ln(15);



$pdf->SetFont('Times', 'b', 12);



// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db, 'BACTERIOLOGY', (isset($data->resultby)?$data->resultby:''));
$pdf->Ln(10);

$pdf->Output();
?>