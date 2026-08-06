<?php
//DB
$db = mysqli_connect('localhost','root','');
mysqli_select_db($db,'sfmmkpjnew');
//GET Value
$pmrn = $_GET['pmrn'] ?? null;
$eid = $_GET['eid'] ?? null;
$id = $_GET['id'] ?? null;
$sno = $_GET['sno'] ?? null;

if(empty($pmrn) || empty($eid) || empty($id)|| empty($sno)) {
    header('Location: http://192.168.100.252:8081/sfmm');
    exit;
}
//PATIENT TEST DATA
$Rdata = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM rhantibody WHERE pmrn='$pmrn' and eid='$eid' and sno='$sno' ORDER BY id DESC LIMIT 1"));

$check_sno = $sno;
switch ($check_sno[0]) {
    case 'I':
        $Tdata = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM iinves WHERE pmrn='$pmrn' and eid='$eid' and id='$id' ORDER BY id DESC LIMIT 1"));
        break;
    case 'E':
        $Tdata = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM einves WHERE pmrn='$pmrn' and eid='$eid' and id='$id' ORDER BY id DESC LIMIT 1"));
        break;
    default:     
        $Tdata = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM alltest WHERE pmrn='$pmrn' and eid='$eid' and id='$id' ORDER BY id DESC LIMIT 1"));
}

$barcode=$Tdata['barcode'];
$sdate=date('d/m/Y H:i:s',strtotime($Tdata["retime"] ?? $Tdata["rtime"]));

$resultby= $Tdata['resultby'];
$cby=$Tdata['cby'] ?? $Tdata['conby'];

$rub=mysqli_fetch_assoc(mysqli_query($db,"SELECT sname as name,desig as designation FROM staff3 WHERE status='Active' AND sid='$resultby'"));
$rcb=mysqli_fetch_assoc(mysqli_query($db,"SELECT mname as name,designation FROM staff1 WHERE astatus='Active' AND sid='$cby'"));

//PDF
require('fpdf2/code128.php');
//require('force_justify1.php');

$pdf=new PDF_Code128();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4');
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
$pdf->SetTitle('Rh Antibody Identification & Titration Analysis Report');

$pdf->SetXY(150,745);
$pdf->Code128(18,85,$barcode,40,10);
$pdf->SetXY(50,40);


$pdf->ln(1);
$pdf->SetFont('Times', 'bu',14);
$pdf->Cell('182',6,'Rh Antibody Identification & Titration Analysis'.' Report',0,1,'C');

$pdf->Ln(2);
$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L'); 

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',12);
$pdf->Cell('60',5,'Referring Consultant Name: '. $Tdata['dname'],0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '.$Tdata['pname'],0,0,'L');
$pdf->Cell('50',5,'MRN: '.$Tdata['pmrn'],0,1,'L');

$pdf->Cell('110',5,'Gender: '.$Tdata['pgender'],0,0,'L');
$pdf->Cell('50',5,'Age: '.$Tdata['page'],0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$sdate,0,0,'L');
$pdf->Cell('50',5,'Result Time: '.$Tdata['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $Tdata['resultstatus'],0,1,'L');

$pdf->SetFont('Times', 'b',14);
$pdf->ln(6);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L'); 

//Chart Image

$pdf->ln(2);
$pdf->SetFont('Arial' , 'ub' , 10);

$pdf->Cell('80',5,'Particulars',0,0,'L');
$pdf->Cell('100',5,'Value',0,1,'C');

$pdf->ln(4);
$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('80',5,'Rh Antibody',0,0,'L');
$pdf->Cell('100',5,$Rdata['a1'],0,1,'C');

$pdf->ln(2);
$pdf->Cell('80',5,'Titre',0,0,'L');
$pdf->Cell('100',5,$Rdata['a2'],0,1,'C');


$pdf->ln(3);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(17, 5, 'Remarks:', 2, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(162, 5, $Rdata['comment'], 0);


$pdf->Ln(15);
$pdf->SetFont('Arial' , 'b' , 10);
// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db, 'BLOOD BANK', (isset($data3['resultby'])?$data3['resultby']:(isset($data['resultby'])?$data['resultby']:'')));
$pdf->Ln(10);

$pdf->Output('Rh Antibody Identification & Titration Analysis-Report-'.$Tdata['pmrn'].'.pdf', 'I');
?>