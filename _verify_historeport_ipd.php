<?php
$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','');
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$query8= $db->query("select * from iinves where id='$id'");
$data = $query8->Fetch(PDO::FETCH_OBJ);
$sno='I'.$id;

//$dname=$data['dname'];
$query2 = $db->query("select * from histo where pmrn='$pmrn' and eeid='$eid' and sno='$sno'");
$data1 = $query2->Fetch(PDO::FETCH_OBJ);
$dname2=$data1->dname;

$tt1=$data->code;
$code=$data->barcode;

//require('code128.php');




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

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('119',5,'Detail Report:',1,0,'L');
$pdf->Cell('62',5,'Date & Time: '.$data1->rdate.' '.$data1->rtime,1,1,'L');

$pdf->SetFont('Arial' , '' , 10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->ln(5);
$pdf->Cell('182',5,'Clinical Information:',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->ln(5);
$pdf->MultiCell('182' , 5,$data1->cinfo,0,1);




$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Specimen:',0,0,'L');
$pdf->ln(5);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1->spe,0,1);
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Gross Description:',0,0,'L');
$pdf->ln(5);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1->gdes,0,1);
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Microscopic Description:',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->ln(5);
$pdf->MultiCell('182' , 5,$data1->mdes,0,1);
//$pdf->ln(3);
//$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('182',5,'Tumor Work:',0,0,'L');
//$pdf->SetFont('Arial' , '' , 10);
//$pdf->ln(5);
$pdf->MultiCell('182' , 5,$data1->twork,0,1);
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Diagnosis:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->ln(5);
$pdf->MultiCell('182' , 5,$data1->dia,0,1);




$pdf->Ln(50);

$pdf->SetFont('Times', 'B', 12);
// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db, 'HISTOLOGY', (isset($data->resultby)?$data->resultby:''), (isset($data->checked_by)?$data->checked_by:''), (isset($data->conby)?$data->conby:''));
$pdf->Ln(10);

$pdf->Output();

?>