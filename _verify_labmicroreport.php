<?php
/**
 * COMPLETE FPDF CODE (HEADER GAP SAME ON ALL PAGES)
 * ✅ Fixes: 2nd page header space not same as 1st page
 *
 * HOW it works:
 * - We move ALL “top area” (barcode + title + line) into Header()
 * - Header() reserves a fixed height (same every page)
 * - Body always starts at the same Y on every page
 *
 * NOTE:
 * - You already include force_justify1_test.php which likely includes:
 *   - FPDF
 *   - PDF_Code128
 * So we only require that file.
 */

ob_start();
ini_set('display_errors', 0);
error_reporting(0);

@session_start(); $_SESSION['sess_username'] = $_SESSION['sess_username'] ?? 'claudetest';
$user = $_SESSION["sess_username"] ?? '';

require('force_justify1_test.php');

// -------------------- DB (PDO) --------------------
$DB_HOST = 'localhost';
$DB_NAME = 'sfmmkpjnew';
$DB_USER = 'root';
$DB_PASS = '';

$dsn = "mysql:host={$DB_HOST};dbname={$DB_NAME};charset=utf8mb4";
$db  = new PDO($dsn, $DB_USER, $DB_PASS, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

// -------------------- INPUTS --------------------
$pmrn = $_REQUEST['pmrn'] ?? '';
$id   = $_REQUEST['id']   ?? '';
$eid  = $_REQUEST['eid']  ?? '';
$sno  = $_REQUEST['sno']  ?? '';

if ($pmrn === '' || $id === '' || $eid === '' || $sno === '') {
    http_response_code(400);
    echo "Missing required parameters (pmrn, id, eid, sno).";
    exit;
}

// -------------------- HELPERS --------------------
function normalizeText($txt): string {
    $txt = (string)$txt;
    $txt = trim(preg_replace('/\s+/', ' ', $txt));
    return $txt;
}

function multicellFit(FPDF $pdf, float $w, float $h, string $txt, $border = 0, string $align = 'L'): void {
    $txt = normalizeText($txt);
    if ($txt === '') {
        $pdf->MultiCell($w, $h, '', $border, $align);
        return;
    }
    $words = explode(' ', $txt);
    $line = '';
    $out  = '';
    foreach ($words as $word) {
        $test = ($line === '') ? $word : $line . ' ' . $word;
        if ($pdf->GetStringWidth($test) <= $w) {
            $line = $test;
        } else {
            $out .= $line . "\n";
            $line = $word;
        }
    }
    $out .= $line;
    $pdf->MultiCell($w, $h, $out, $border, $align);
}

function wrappedCellKeepRow(FPDF $pdf, float $w, float $lh, string $txt, string $align = 'L', $border = 0): float {
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $txt = normalizeText($txt);

    $lines = 1;
    if ($txt !== '') {
        $words = explode(' ', $txt);
        $line = '';
        $lines = 1;
        foreach ($words as $word) {
            $test = ($line === '') ? $word : $line . ' ' . $word;
            if ($pdf->GetStringWidth($test) <= $w) {
                $line = $test;
            } else {
                $lines++;
                $line = $word;
            }
        }
    }

    multicellFit($pdf, $w, $lh, $txt, $border, $align);
    $pdf->SetXY($x + $w, $y);
    return $lines * $lh;
}

// -------------------- PDF CLASS (HEADER SAME ALL PAGES) --------------------
class MyPDF extends PDF_Code128
{
    // Set from outside:
    //public string $reportCode  = '';
    //public string $reportTitle = '';

    // Control header spacing:
    public float $topMargin = 12;        // same as SetMargins top
    public float $headerBlockHeight = 26; // reserved header space for ALL pages

    function Header()
    {
        // Always start header at same top
        $this->SetY($this->topMargin);

        // Barcode (same position on every page)
        if ($this->reportCode !== '') {
         //   $this->Code128(18, $this->topMargin + 2, $this->reportCode, 40, 10);
        }

        // Title (same position on every page)
        if ($this->reportTitle !== '') {
            $this->SetFont('Times', 'BU', 14);
            //$this->SetXY(17, $this->topMargin + 14);
            //$this->Cell(0, 6, $this->reportTitle, 0, 1, 'C');

            $this->SetFont('Times', 'B', 12);
            $this->SetX(17);
            //$this->Cell(0, 5, str_repeat('_', 95), 0, 1, 'L');
        }

        // ✅ Reserve fixed header height so body starts same Y on every page
        $this->SetY($this->topMargin + $this->headerBlockHeight);
    }

    function Footer()
    {
        $this->SetY(-20);
        $this->SetFont('Arial', 'B', 8);
        /*$this->Cell(
            0,
            10,
            'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801703788561 (SFMMKPJSH/OPD/MR-01)',
            0,
            0,
            'C'
        );*/
    }

    function CheckPageBreak($h)
    {
        if ($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage($this->CurOrientation);
        }
    }
}

// -------------------- FETCH DATA --------------------
$stmt = $db->prepare("SELECT * FROM alltest WHERE pmrn = ? AND eid = ? AND id = ? LIMIT 1");
$stmt->execute([$pmrn, $eid, $id]);
$data = $stmt->fetch();

if (!$data) {
    http_response_code(404);
    echo "No record found in alltest for given parameters.";
    exit;
}

$barcode = $data['barcode1'] ?? '';
$sdate   = (!empty($data['retime'])) ? date('d/m/Y H:i:s', strtotime($data['retime'])) : '';
$medi    = $data['medi'] ?? 'Test';
$codeForBarcode = $data['barcode'] ?? ($data['barcode1'] ?? $pmrn);

// pappnew
$stmt = $db->prepare("SELECT * FROM pappnew WHERE pmrn = ? AND eid = ? LIMIT 1");
$stmt->execute([$pmrn, $eid]);
$data2 = $stmt->fetch();

// micro (main)
$stmt = $db->prepare("SELECT * FROM micro WHERE pmrn = ? AND sno = ? AND dstatus != 'Deleted' LIMIT 1");
$stmt->execute([$pmrn, $sno]);
$data6 = $stmt->fetch() ?: [];

$smm1    = $data6['mm1'] ?? '';
$smm2    = $data6['mm2'] ?? '';
$spe     = $data6['medi2'] ?? '';
$sm11    = $data6['mm3'] ?? '';
$sm22    = $data6['mm4'] ?? '';
$cul     = $data6['culture'] ?? '';
$atime   = $data6['atime'] ?? '';
$fstatus = $data6['fstatus'] ?? '';

// staff3 for resultby
$rby   = $data['resultby'] ?? '';
$rby1  = '';
$desig = '';
if (!empty($rby)) {
    $stmt = $db->prepare("SELECT sname, desig FROM staff3 WHERE sid = ? LIMIT 1");
    $stmt->execute([$rby]);
    $staff = $stmt->fetch();
    $rby1  = $staff['sname'] ?? '';
    $desig = $staff['desig'] ?? '';
}

// micro rows AST table
$stmt = $db->prepare("SELECT * FROM micro WHERE pmrn = ? AND sno = ? AND dstatus != 'Deleted'");
$stmt->execute([$pmrn, $sno]);
$microRows = $stmt->fetchAll();

// -------------------- PDF BUILD --------------------
$pdf = new MyPDF();

// margins must match header topMargin
$pdf->SetMargins(17, 12, 17);
$pdf->SetAutoPageBreak(true, 20);

$pdf->AliasNbPages();

// Set header values (so Header() prints them on ALL pages)
$pdf->reportCode  = $codeForBarcode;
//$pdf->reportTitle = $medi . ' Report';

// ✅ Now add page (Header() runs automatically)
$pdf->AddPage('P', 'A4');

// ✅ BODY starts automatically after header reserved space
$pdf->SetFont('Times', 'B', 12);
$pdf->Ln(2);

// ---- Title ----
$pdf->SetFont('Times', 'BU', 14);
$pdf->Cell(0, 1, ($data['medi'] ?? 'Test') . ' Report', 0, 1, 'C');
$pdf->Ln(2);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 5, str_repeat('_', 95), 0, 1, 'L');

// Referring consultant
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 5, 'Referring Consultant Name: ' . ($data['dname'] ?? ''), 0, 1, 'L');
$pdf->Ln(3);

// Patient info
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(110, 5, 'Patient Name: ' . ($data['pname'] ?? ''), 0, 0, 'L');
$pdf->Cell(50, 5, 'MRN: ' . ($data['pmrn'] ?? ''), 0, 1, 'L');

$pdf->Cell(110, 5, 'Gender: ' . ($data['pgender'] ?? ''), 0, 0, 'L');
$pdf->Cell(50, 5, 'Age: ' . ($data['page'] ?? ''), 0, 1, 'L');

$pdf->Cell(110, 5, 'Sample Date: ' . $sdate, 0, 0, 'L');
$pdf->Cell(50, 5, 'Result Time: ' . ($data['resulttime'] ?? ''), 0, 1, 'L');

$pdf->Cell(110, 5, '', 0, 0, 'L');
//$pdf->Cell(50, 5, 'Result Status: ' . ($data['resultstatus'] ?? ''), 0, 1, 'L');
$pdf->Cell(50, 5, '', 0, 1, 'L');

$pdf->Ln(6);
$pdf->SetFont('Times', '', 14);
$pdf->Cell(0, 5, 'SNO-' . $barcode, 0, 1, 'L');
$pdf->Cell(0, 5, str_repeat('_', 95), 0, 1, 'L');
$pdf->Ln(3);
$pdf->Code128(18, 71, $codeForBarcode, 40, 10);


// Specimen etc.
$pdf->SetFont('Times', 'B', 10);

$pdf->Cell(30, 5, 'Specimen:', 0, 0, 'L');
$pdf->Cell(100, 5, $spe, 0, 1, 'L');

$pdf->Cell(30, 5, 'Stain:', 0, 0, 'L');
$pdf->Cell(100, 5, ($data6['stain'] ?? ''), 0, 1, 'L');

$pdf->Cell(30, 5, 'Culture:', 0, 0, 'L');
$pdf->Cell(100, 5, ($data6['culture'] ?? ''), 0, 1, 'L');

$pdf->Cell(30, 5, 'Analysis Time:', 0, 0, 'L');
$pdf->Cell(100, 5, $atime . ' Hours', 0, 1, 'L');

$pdf->Cell(30, 5, 'Final Status:', 0, 0, 'L');
$pdf->Cell(100, 5, $fstatus, 0, 1, 'L');

$pdf->Cell(90, 5, 'Growth:', 0, 1, 'L');

// Growth text
$mediName = $data['medi'] ?? '';
if ($cul === 'Negative') {
    $pdf->SetFont('Arial', 'B', 10);
    if ($mediName === 'Anaerobic Blood C/S' || $mediName === 'Anaerobic C/S') {
        $pdf->MultiCell(180, 5, 'No pathogen is isolated at 37 degree centigrade after ' . $atime . ' Hours of anaerobic incubation.');
    } else {
        $pdf->MultiCell(180, 5, 'No pathogen is isolated at 37 degree centigrade after ' . $atime . ' Hours of aerobic incubation.');
    }
} elseif ($cul === 'Mixed') {
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->MultiCell(180, 5, 'Growth of mixed bacteria probable due to sample contamination. Please repeat a fresh clean catch MSU sample if clinically indicated.');
}

$pdf->SetFont('Arial', 'B', 10);
if ($smm1 !== '') $pdf->Cell(0, 5, 'ISOLATE-1. ' . $smm1 . ' (Colony Count- ' . $sm11 . ')', 0, 1, 'L');
if ($smm2 !== '') $pdf->Cell(0, 5, 'ISOLATE-2. ' . $smm2 . ' (Colony Count- ' . $sm22 . ')', 0, 1, 'L');

$pdf->Ln(3);

// AST header
$pdf->SetFont('Arial', 'B', 10);
if ($smm1 !== '' && $smm2 !== '') {
    $pdf->Cell(90, 5, 'Antibiotic Susceptiblity Testing (AST) :', 0, 0, 'L');
    $pdf->Cell(0, 5, 'MIC/Z            ISOLATE-1            MIC/Z      ISOLATE-2', 0, 1, 'L');
} elseif ($smm1 !== '' && $smm2 === '') {
    $pdf->Cell(90, 5, 'Antibiotic Susceptiblity Testing (AST) :', 0, 0, 'L');
    $pdf->Cell(0, 5, 'MIC/Z            ISOLATE-1', 0, 1, 'L');
}

$pdf->Ln(3);

// AST rows (page-break safe)
$pdf->SetFont('Arial', '', 10);
foreach ($microRows as $row) {
    $pdf->CheckPageBreak(6);

    $pdf->Cell(90, 5, $row['medi1'] ?? '', 0, 0);

    if (!empty($row['mm1']) && !empty($row['mm2'])) {
        $pdf->Cell(25, 5, '   ' . ($row['mic1'] ?? ''), 0, 0);
        $pdf->Cell(25, 5, '   ' . ($row['ins1'] ?? ''), 0, 0);
        $pdf->Cell(25, 5, '   ' . ($row['mic2'] ?? ''), 0, 0);
        $pdf->Cell(25, 5, '   ' . ($row['ins2'] ?? ''), 0, 1);
    } else {
        $pdf->Cell(30, 5, '   ' . ($row['mic1'] ?? ''), 0, 0);
        $pdf->Cell(30, 5, '   ' . ($row['ins1'] ?? ''), 0, 1);
    }

    $pdf->Ln(1);
}

// Other Comments
if (!empty($data6['ocom'])) {
    $pdf->CheckPageBreak(20);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 5, 'Other Comments:', 0, 1, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(180, 5, $data6['ocom']);
}

$pdf->Ln(4);

// Result updated by (wrapped)
$blockHeight = 18; // minimum block height

if (!empty($data['resultby'])) {
    $nameLines  = 1;
    $desigLines = 1;

    if ($rby1 !== '') {
        $nameLines = ceil($pdf->GetStringWidth($rby1) / 45);
        if ($nameLines < 1) $nameLines = 1;
    }

    if ($desig !== '') {
        $desigLines = ceil($pdf->GetStringWidth($desig) / 45);
        if ($desigLines < 1) $desigLines = 1;
    }

    $blockHeight = 8 + max($nameLines * 4, 5) + 2 + max($desigLines * 4, 5) + 8;
}

$pdf->CheckPageBreak($blockHeight);
$pdf->SetFont('Times', 'B', 8);

// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db, 'BACTERIOLOGY', (isset($data['resultby'])?$data['resultby']:''));
$pdf->Ln(10);

// -------------------- OUTPUT (FIXED ORDER) --------------------
if (ob_get_length()) { ob_end_clean(); }

header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="REPORT.PDF"');
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');

// ✅ Correct Output order: destination first, filename second
//$pdf->Output('I', 'REPORT.PDF');
$pdf->Output('REPORT.PDF','I');
exit;
?>