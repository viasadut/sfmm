<?php
// ✅ Must be the first line (no spaces/newlines before <?php)
ob_start();
ini_set('display_errors', 0);
error_reporting(0);

@session_start(); $_SESSION['sess_username'] = $_SESSION['sess_username'] ?? 'claudetest';
$user = $_SESSION["sess_username"] ?? '';

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew;charset=utf8mb4','root','',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
]);

$pmrn = $_REQUEST['pmrn'] ?? '';
$id   = $_REQUEST['id'] ?? '';
$eid  = $_REQUEST['eid'] ?? '';

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

// -------------------- DATA LOAD --------------------
$query8 = $db->query("select * from alltest where id='$id'");
$data   = $query8->fetch();
if(!$data){
    ob_end_clean();
    die('No data found in alltest');
}

$sdate = date('d/m/Y H:i:s', strtotime($data->retime));

$query2 = $db->query("select * from pappnew where pmrn='$pmrn' and eid='$eid'");
$data2  = $query2->fetch();

$tt1  = $data->code ?? '';
$code = $data->barcode1 ?? '';

$queryc  = $db->query("SELECT * FROM radio where code= '$tt1'");
$resultc = $queryc->fetch();



$cr1   = $resultc->remarks ?? '';

$cr = iconv('UTF-8', 'windows-1252//TRANSLIT', $cr1) ?? '';
//$unit = $resultc->unit ?? '';
$unit = iconv('UTF-8', 'windows-1252//TRANSLIT', $resultc->unit) ?? '';

require('force_justify1_test.php');

$pdf = new PDF_Code128();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'B' , 9);
$pdf->SetLeftMargin(20);

// Barcode
$pdf->SetXY(150,745);
$pdf->Code128(22,90,$code,40,10);

// Header
$pdf->SetXY(50,45);
$pdf->Ln(1);
$pdf->SetFont('Times', 'BU', 14);
$pdf->Cell(182,6,($data->medi ?? '').' Report',0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times','B',14);
$pdf->Cell(30,5,'_________________________________________________________________________',0,1,'L');
$pdf->Ln(4);

$pdf->SetFont('Times','B',12);
$pdf->Cell(60,5,'Referring Consultant Name: '.($data->dname ?? ''),0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times','B',10);
$pdf->Cell(110,5,'Patient Name: '.($data->pname ?? ''),0,0,'L');
$pdf->Cell(50,5,'MRN: '.($data->pmrn ?? ''),0,1,'L');

$pdf->Cell(110,5,'Gender: '.($data->pgender ?? ''),0,0,'L');
$pdf->Cell(50,5,'Age: '.($data->page ?? ''),0,1,'L');

$pdf->Cell(110,5,'Sample Date: '.$sdate,0,0,'L');
$pdf->Cell(50,5,'Result Time: '.($data->resulttime ?? ''),0,1,'L');
//$pdf->Cell(50,5,'',0,1,'L');

$pdf->Ln(13);
$pdf->SetFont('Times','',14);
$pdf->Cell(110,5,'SNO-'.$code,0,0,'L');
$pdf->Ln(2);

$pdf->SetFont('Times','B',14);
$pdf->Cell(30,5,'_________________________________________________________________________',0,1,'L');
$pdf->Ln(3);

// Table header
$pdf->SetFont('Times','B',12);
$pdf->Cell(50,5,'Result',0,0,'L');
$pdf->Cell(50,5,'Unit',0,0,'L');
$pdf->Cell(80,5,'Reference Value',0,1,'L');

$pdf->SetFont('Times','',12);

// Result row
$cellWidth  = 80;
$cellHeight = 5;

$pdf->Cell(50,5,($data->result ?? ''),0,0,'L');
$pdf->Cell(50,5,$unit,0,0,'L');
$pdf->MultiCell($cellWidth,$cellHeight,$cr,0,'L');
if(empty($resultc->interpretation)){
$pdf->Ln(50);
}
if(!empty($resultc->interpretation)){
    $pdf->Ln(10);
    $pdf->MultiCell(180,5,$resultc->interpretation);
    $pdf->Ln(10);
}

//$pdf->Ln(30);

// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db, (isset($data->subtype)?$data->subtype:''), (isset($data->resultby)?$data->resultby:''), (isset($data->cby)?$data->cby:''), '');
$pdf->Ln(10);

// ✅ Clear buffer (prevents "Some data already output")
ob_end_clean();
$pdf->Output();
exit;
?>