<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');

$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
require('force_justify1.php');
$pmrn=$_REQUEST['pmrn'];
$id='E'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from liver where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);

//$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from emergency where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($db,"select * from einves where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);

$sdate=date('d/m/Y H:i:s',strtotime($data3["rtime"]));
$barcode=$data3['barcode'];

$dname2=$data3['user'];

$query23 = $db1->query("select * from user where uname='$dname2'");
$data23 = $query23->Fetch(PDO::FETCH_OBJ);
$dname23=$data23->fullname;


//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
$pdf=new PDF_Code128();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');





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

$pdf->Cell('60',5,'Referring Consultant Name: '. $dname23,0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '. $data2['pname'],0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data2['pmrn'],0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data2['gender'],0,0,'L');
$pdf->Cell('50',5,'Age: '.$data2['age'],0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$sdate,0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data3['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data3['resultstatus'],0,1,'L');

$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);



$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);



$pdf->Cell('60',5,'Particulars',1,0,'C');
$pdf->Cell('20',5,'Value',1,0,'C');
$pdf->Cell('21',5,'Unit',1,0,'C');
$pdf->Cell('80',5,'Reference Range',1,1,'C');



$pdf->Cell('60',5,'Total Bilirubin',1,0,'C');
$pdf->Cell('20',5,$data['tb'],1,0,'C');
$pdf->Cell('21',5,'mg/dL',1,0,'C');
$pdf->Cell('80',5,'0.2-1.2',1,1,'C');

if($data['db']!=''){

    $pdf->Cell('60',5,'Direct Bilirubin',1,0,'C');
    $pdf->Cell('20',5,$data['db'],1,0,'C');
    $pdf->Cell('21',5,'mg/dL',1,0,'C');
    $pdf->Cell('80',5,'Adult: < 0.4, New Born: < 1.50',1,1,'C');
    
}


$pdf->Cell('60',5,'SGOT/AST',1,0,'C');
$pdf->Cell('20',5,$data['sgot'],1,0,'C');
$pdf->Cell('21',5,'U/L',1,0,'C');
$pdf->Cell('80',5,'7-44',1,1,'C');

$pdf->Cell('60',5,'SGPT /ALT',1,0,'C');
$pdf->Cell('20',5,$data['sgpt'],1,0,'C');
$pdf->Cell('21',5,'U/L',1,0,'C');
$pdf->Cell('80',5,'7-48',1,1,'C');

$pdf->Cell('60',5,'Alkaline Phosphatase',1,0,'C');
$pdf->Cell('20',5,$data['al'],1,0,'C');
$pdf->Cell('21',5,'U/L',1,0,'C');
$pdf->Cell('80',5,'32-104',1,1,'C');



$pdf->ln(20);

// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db1, 'PROFILE', (isset($data3['resultby'])?$data3['resultby']:''), (isset($data3['checked_by'])?$data3['checked_by']:''), (isset($data3['conby'])?$data3['conby']:''));
$pdf->Ln(10);

$pdf->Output();