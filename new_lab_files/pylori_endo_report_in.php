<?php

$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$pmrn=$_REQUEST['pmrn'];
$id='I'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$query8= $db->query("select * from pylori where sno='$id'");
$data = $query8->Fetch(PDO::FETCH_OBJ);
//$iname=$data->iname;


$query3 = $db->query("select * from iinves where id='$id1'");
$data3 = $query3->Fetch(PDO::FETCH_OBJ);
//$dname=$data['dname'];
$query2 = $db->query("select * from iinves where pmrn='$pmrn' and eid='$eid'");
$data2 = $query2->Fetch(PDO::FETCH_OBJ);
$dname2=$data3->dname;

$tt1=$data3->code;
$code=$data3->barcode;

$queryc = $db->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

// Print out result


$cr=$resultc->remarks;
$unit=$resultc->unit;
//require('code128.php');




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
$pdf->Cell('182',6,$data3->infusion.' Report',0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',12);

$pdf->Cell('60',5,'Referring Consultant Name: '. $data3->dname,0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '. $data3->pname,0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data3->pmrn,0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data3->pgender,0,0,'L');
$pdf->Cell('50',5,'Age: '.$data3->page,0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$data3->rtime,0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data3->resulttime,0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data3->resultstatus,0,1,'L');

$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);

$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);

$pdf->SetFont('Times', 'B', 12);






	
$pdf->Cell('80',5,'Investigation Name',10,0,'L');
$pdf->Cell('50',5,'Result',0,0,'C');

$pdf->Cell('40',5,'Reference Range',0,1,'C');



$pdf->SetFont('Times', '', 12);
$pdf->Ln(5);

$pdf->Cell('80',5,$data3->infusion,0,0,'L');


$pdf->Cell('50',5,$data->result,0,0,'C');


$pdf->Cell('40',5,'Negative',0,0,'C');
	
	

//$pdf->Cell(120,10,$data->padd,1,0,'L');




$pdf->Ln(15);







// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db1, 'IMMUNOLOGY/SEROLOGY', (isset($data3->resultby)?$data3->resultby:''));
$pdf->Ln(10);

$pdf->Output();
?>