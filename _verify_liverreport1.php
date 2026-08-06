<?php
ob_start();
ini_set('display_errors', 0);
error_reporting(0);

@session_start(); $_SESSION['sess_username'] = $_SESSION['sess_username'] ?? 'claudetest';
$user=$_SESSION["sess_username"];

//require('force_justify.php');
//require('fpdf/fpdf.php');
$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew;charset=utf8mb4','root','',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
]);

//$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','');
//require('force_justify.php');
require('force_justify1_test.php');


$pmrn=$_REQUEST['pmrn'];
$id='O'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from liver where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);

//$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);
$barcode=$data3['barcode1'];
$sdate=date('d/m/Y H:i:s',strtotime($data3["retime"]));
//$sdate=strtotime('d/m/Y H:i:s', ($data3['retime']));
//$sdate=date('d/m/Y h:i:s',strtotime($data3["retime"]));


//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');

/* -------------------- HELPERS: wrap text in fixed width cell -------------------- */
function normalizeText($txt): string {
    $txt = (string)$txt;
    $txt = trim(preg_replace('/\s+/', ' ', $txt));
    return $txt;
}
function multicellFit($pdf, $w, $h, $txt, $border=0, $align='L'){
    $txt = normalizeText($txt);
    if ($txt === '') { $pdf->MultiCell($w, $h, '', $border, $align); return; }

    $words = explode(' ', $txt);
    $line = '';
    $out  = '';

    foreach($words as $word){
        $test = ($line==='') ? $word : $line.' '.$word;
        if($pdf->GetStringWidth($test) <= $w){
            $line = $test;
        } else {
            $out .= $line."\n";
            $line = $word;
        }
    }
    $out .= $line;

    $pdf->MultiCell($w, $h, $out, $border, $align);
}

/**
 * ✅ Wrap only first column and keep cursor at next column in same row.
 * returns used height
 */
function wrappedCellKeepRow($pdf, $w, $h, $txt, $align='L', $border=0): float {
    $x = $pdf->GetX();
    $y = $pdf->GetY();

    // estimate line count (for height)
    $txt = normalizeText($txt);
    $lines = 1;
    if($txt !== ''){
        $words = explode(' ', $txt);
        $line = '';
        $lines = 1;
        foreach($words as $word){
            $test = ($line==='') ? $word : $line.' '.$word;
            if($pdf->GetStringWidth($test) <= $w){
                $line = $test;
            } else {
                $lines++;
                $line = $word;
            }
        }
    }

    multicellFit($pdf, $w, $h, $txt, $border, $align);

    // go to next column start (same top Y)
    $pdf->SetXY($x + $w, $y);

    return $lines * $h;
}
/* ------------------------------------------------------------------------------ */



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

$pdf->Cell('60',5,'Referring Consultant Name: '. $data3['dname'],0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '. $data3['pname'],0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data3['pmrn'],0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data3['pgender'],0,0,'L');
$pdf->Cell('50',5,'Age: '.$data3['page'],0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$sdate,0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data3['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
//$pdf->Cell('50',5,'Result Status: '. $data3['resultstatus'],0,1,'L');
$pdf->Cell('50',5,'',0,1,'L');
$pdf->SetFont('Times', 'b',14);

//$pdf->ln(6);

$pdf->ln(8);
$pdf->SetFont('Times', '',14);
$pdf->Cell('110',5,'SNO-'.$barcode,0,1,'L');	

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

// -------------------- Approval-flow footer (Updated By / Checked By / Consultant) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db1, 'PROFILE', $data3['resultby'] ?? '');

$pdf->Ln(15);

// ✅ Clear buffer (prevents "Some data already output")
ob_end_clean();
$pdf->Output();
exit;
?>