<?php
/**
 * COMPLETE, CLEAN, PAGE-BREAK-SAFE FPDF REPORT (A4)
 * - Uses PDO everywhere (no mixed mysqli + PDO)
 * - Adds proper Header/Footer + CheckPageBreak()
 * - Avoids weird extra “default header gap” on new pages
 * - Uses safe margins + AutoPageBreak
 *
 * ✅ IMPORTANT:
 * 1) Put your DB password in a config file (recommended). I left placeholders below.
 * 2) Ensure these files exist and are included correctly:
 *    - fpdf/fpdf.php
 *    - code128.php  (PDF_Code128 class)
 *    - force_justify1_test.php (if you use it; optional)
 */

// -------------------- OUTPUT BUFFER (prevents "Some data already output") --------------------
ob_start();
ini_set('display_errors', 0);
error_reporting(0);

session_start();
$user = $_SESSION["sess_username"] ?? '';

// -------------------- INCLUDES --------------------
//require_once __DIR__ . '/fpdf/fpdf.php';
//require_once __DIR__ . 'code128.php';             // must define PDF_Code128
//require_once __DIR__ . 'force_justify1_test.php'; // if needed; can remove if not used

require('force_justify1_test.php');

// -------------------- DB (PDO only) --------------------
$DB_HOST = 'localhost';
$DB_NAME = 'sfmmkpjnew';
$DB_USER = 'root';
$DB_PASS = 'Godiloveu16'; // <-- CHANGE

$dsn = "mysql:host={$DB_HOST};dbname={$DB_NAME};charset=utf8mb4";
$db  = new PDO($dsn, $DB_USER, $DB_PASS, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

// -------------------- INPUTS (basic) --------------------
$pmrn = $_REQUEST['pmrn'] ?? '';
$id   = $_REQUEST['id']   ?? '';
$eid  = $_REQUEST['eid']  ?? '';
$sno  = $_REQUEST['sno']  ?? '';

if ($pmrn === '' || $id === '' || $eid === '' || $sno === '') {
    http_response_code(400);
    echo "Missing required parameters (pmrn, id, eid, sno).";
    exit;
}

// -------------------- HELPERS: WRAP TEXT IN FIXED WIDTH CELL --------------------
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

/**
 * Wrap only first column, keep cursor at next column start (same row).
 * returns used height in mm
 */
function wrappedCellKeepRow(FPDF $pdf, float $w, float $lh, string $txt, string $align = 'L', $border = 0): float {
    $x = $pdf->GetX();
    $y = $pdf->GetY();

    $txt = normalizeText($txt);

    // estimate lines
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

    // move to next column
    $pdf->SetXY($x + $w, $y);

    return $lines * $lh;
}

// -------------------- PDF CLASS --------------------
class MyPDF extends PDF_Code128 {

    // Optional header. Keep it minimal to avoid “extra gap”.
    function Header() {
        // If you want a header text/logo, put it here.
        // Don't do big Ln() here.
        // Example:
        // $this->SetFont('Arial','B',10);
        // $this->Cell(0,5,'SFMMKPJ',0,1,'C');
        // $this->Ln(2);
    }

    function Footer() {
        $this->SetY(-20);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(
            0,
            10,
            'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801703788561 (SFMMKPJSH/OPD/MR-01)',
            0,
            0,
            'C'
        );
    }

    // ✅ critical for clean page breaks with consistent top margin
    function CheckPageBreak(float $h): void {
        if ($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage($this->CurOrientation);
            // Cursor is now at top margin; no extra “default” gap if margins are correct.
        }
    }
}

// -------------------- FETCH DATA (PDO prepared statements) --------------------

// alltest
$stmt = $db->prepare("SELECT * FROM alltest WHERE pmrn = ? AND eid = ? AND id = ? LIMIT 1");
$stmt->execute([$pmrn, $eid, $id]);
$data = $stmt->fetch();

if (!$data) {
    http_response_code(404);
    echo "No record found in alltest for given parameters.";
    exit;
}

$barcode = $data['barcode1'] ?? '';
$sdate   = '';
if (!empty($data['retime'])) {
    $sdate = date('d/m/Y H:i:s', strtotime($data['retime']));
}

$tt1 = $data['code'] ?? '';
$codeForBarcode = $data['barcode'] ?? ($data['barcode1'] ?? $pmrn);

// pappnew
$stmt = $db->prepare("SELECT * FROM pappnew WHERE pmrn = ? AND eid = ? LIMIT 1");
$stmt->execute([$pmrn, $eid]);
$data2 = $stmt->fetch(); // not heavily used below, but kept

// radio
$resultc = null;
if ($tt1 !== '') {
    $stmt = $db->prepare("SELECT * FROM radio WHERE code = ? LIMIT 1");
    $stmt->execute([$tt1]);
    $resultc = $stmt->fetch();
}
$cr   = $resultc['remarks'] ?? '';
$unit = $resultc['unit'] ?? '';

// micro (main row)
$stmt = $db->prepare("SELECT * FROM micro WHERE pmrn = ? AND sno = ? AND dstatus != 'Deleted' LIMIT 1");
$stmt->execute([$pmrn, $sno]);
$data6 = $stmt->fetch() ?: [];

$smm1  = $data6['mm1'] ?? '';
$smm2  = $data6['mm2'] ?? '';
$sins1 = $data6['ins1'] ?? '';
$sins2 = $data6['ins2'] ?? '';
$spe   = $data6['medi2'] ?? '';
$sm11  = $data6['mm3'] ?? '';
$sm22  = $data6['mm4'] ?? '';
$smic1 = $data6['mic1'] ?? '';
$smic2 = $data6['mic2'] ?? '';
$cul   = $data6['culture'] ?? '';
$atime = $data6['atime'] ?? '';
$fstatus = $data6['fstatus'] ?? '';

// patient
$stmt = $db->prepare("SELECT * FROM patient WHERE pmrn = ? LIMIT 1");
$stmt->execute([$pmrn]);
$data26 = $stmt->fetch(); // not heavily used below

// staff3 for resultby
$rby  = $data['resultby'] ?? '';
$rby1 = '';
$desig = '';
if (!empty($rby)) {
    $stmt = $db->prepare("SELECT sname, desig FROM staff3 WHERE sid = ? LIMIT 1");
    $stmt->execute([$rby]);
    $staff = $stmt->fetch();
    $rby1  = $staff['sname'] ?? '';
    $desig = $staff['desig'] ?? '';
}

// micro rows for AST table
$stmt = $db->prepare("SELECT * FROM micro WHERE pmrn = ? AND sno = ? AND dstatus != 'Deleted'");
$stmt->execute([$pmrn, $sno]);
$microRows = $stmt->fetchAll();

// -------------------- PDF BUILD --------------------
$pdf = new MyPDF();

// ✅ consistent margins (fixes top gap on new pages)
$pdf->SetMargins(17, 12, 17);     // left, top, right
$pdf->SetAutoPageBreak(true, 20); // bottom margin (matches footer area)

$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4');

// ---- Barcode (use sane Y in mm) ----
$pdf->Code128(18, 18, $codeForBarcode, 40, 10);
$pdf->SetY(32);

// ---- Title ----
$pdf->SetFont('Times', 'BU', 14);
$pdf->Cell(0, 6, ($data['medi'] ?? 'Test') . ' Report', 0, 1, 'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 5, str_repeat('_', 95), 0, 1, 'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 5, 'Referring Consultant Name: ' . ($data['dname'] ?? ''), 0, 1, 'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'B', 10);

$pdf->Cell(110, 5, 'Patient Name: ' . ($data['pname'] ?? ''), 0, 0, 'L');
$pdf->Cell(50, 5, 'MRN: ' . ($data['pmrn'] ?? ''), 0, 1, 'L');

$pdf->Cell(110, 5, 'Gender: ' . ($data['pgender'] ?? ''), 0, 0, 'L');
$pdf->Cell(50, 5, 'Age: ' . ($data['page'] ?? ''), 0, 1, 'L');

$pdf->Cell(110, 5, 'Sample Date: ' . $sdate, 0, 0, 'L');
$pdf->Cell(50, 5, 'Result Time: ' . ($data['resulttime'] ?? ''), 0, 1, 'L');

$pdf->Cell(110, 5, '', 0, 0, 'L');
$pdf->Cell(50, 5, 'Result Status: ' . ($data['resultstatus'] ?? ''), 0, 1, 'L');

$pdf->Ln(8);
$pdf->SetFont('Times', '', 14);
$pdf->Cell(0, 5, 'SNO-' . $barcode, 0, 1, 'L');

$pdf->Cell(0, 5, str_repeat('_', 95), 0, 1, 'L');
$pdf->Ln(3);

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

// ---- Growth logic ----
$medi = $data['medi'] ?? '';

if ($cul === 'Negative') {
    $pdf->SetFont('Arial', 'B', 10);

    if ($medi === 'Anaerobic Blood C/S' || $medi === 'Anaerobic C/S') {
        $pdf->MultiCell(180, 5, 'No pathogen is isolated at 37 degree centigrade after ' . $atime . ' Hours of anaerobic incubation.');
    } else {
        $pdf->MultiCell(180, 5, 'No pathogen is isolated at 37 degree centigrade after ' . $atime . ' Hours of aerobic incubation.');
    }
} elseif ($cul === 'Mixed') {
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->MultiCell(180, 5, 'Growth of mixed bacteria probable due to sample contamination. Please repeat a fresh clean catch MSU sample if clinically indicated.');
}

// ---- Isolates ----
$pdf->SetFont('Arial', 'B', 10);

if ($smm1 !== '') {
    $pdf->Cell(0, 5, 'ISOLATE-1. ' . $smm1 . ' (Colony Count- ' . $sm11 . ')', 0, 1, 'L');
}
if ($smm2 !== '') {
    $pdf->Cell(0, 5, 'ISOLATE-2. ' . $smm2 . ' (Colony Count- ' . $sm22 . ')', 0, 1, 'L');
}

$pdf->Ln(3);

// ---- AST header ----
$pdf->SetFont('Arial', 'B', 10);

if ($smm1 !== '' && $smm2 !== '') {
    $pdf->Cell(90, 5, 'Antibiotic Susceptiblity Testing (AST) :', 0, 0, 'L');
    $pdf->Cell(0, 5, 'MIC/Z            ISOLATE-1            MIC/Z      ISOLATE-2', 0, 1, 'L');
} elseif ($smm1 !== '' && $smm2 === '') {
    $pdf->Cell(90, 5, 'Antibiotic Susceptiblity Testing (AST) :', 0, 0, 'L');
    $pdf->Cell(0, 5, 'MIC/Z            ISOLATE-1', 0, 1, 'L');
}

$pdf->Ln(3);

// ---- AST rows (page-break safe) ----
$pdf->SetFont('Arial', '', 10);

foreach ($microRows as $row) {
    // each row height ~6mm total (5 + 1 gap)
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

// ---- Other Comments ----
if (!empty($data6['ocom'])) {
    $pdf->CheckPageBreak(20);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 5, 'Other Comments:', 0, 1, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(180, 5, $data6['ocom']);
}

$pdf->Ln(12);

// -------------------- RESULT UPDATED BY BLOCK (wrapped + page-break safe) --------------------
$blockHeight = (!empty($data['resultby'])) ? (3 * 6) : (3 * 4);
$pdf->CheckPageBreak($blockHeight);

$pdf->SetFont('Times', 'B', 8);

if (!empty($data['resultby'])) {

    // Titles row
    $pdf->Cell(45, 5, 'Result Updated By', 0, 0, 'L');
    $pdf->Cell(50, 5, '', 0, 0, 'L');
    $pdf->Cell(38, 5, '', 0, 0, 'L');
    $pdf->Cell(50, 5, '', 0, 1, 'L');
    $pdf->Ln(1);

    // widths and line height
    $w1 = 45; $w2 = 50; $w3 = 38; $w4 = 50; $lh = 4;

    // Names row (wrap first cell)
    $rowX = $pdf->GetX();
    $rowY = $pdf->GetY();

    $usedH = wrappedCellKeepRow($pdf, $w1, $lh, $rby1, 'L', 0);
    $pdf->Cell($w2, 5, 'Dr. Kamrun Nahar', 0, 0, 'L');
    $pdf->Cell($w3, 5, 'Dr. Md. Ahad Ur Rahman', 0, 0, 'L');
    $pdf->Cell($w4, 5, 'Dr. Umma Asma Saki', 0, 1, 'L');

    // move below tallest
    $pdf->SetXY($rowX, $rowY + max($usedH, 5));
    $pdf->Ln(1);

    // Designations row (wrap first cell too)
    $rowX = $pdf->GetX();
    $rowY = $pdf->GetY();

    $usedH2 = wrappedCellKeepRow($pdf, $w1, $lh, $desig, 'L', 0);
    $pdf->Cell($w2, 5, 'Consultant , Microbiology and virology', 0, 0, 'L');
    $pdf->Cell($w3, 5, 'Consultant , Pathology', 0, 0, 'L');
    $pdf->Cell($w4, 5, 'Sessional Specialist , Transfusion Medicine', 0, 1, 'L');

    $pdf->SetXY($rowX, $rowY + max($usedH2, 5));

} else {

    $pdf->Cell(100, 5, 'Result Updated By', 0, 1, 'L');
    $pdf->Ln(1);

    multicellFit($pdf, 100, 4, $rby1, 0, 'L');
    $pdf->Ln(1);
    multicellFit($pdf, 100, 4, $desig, 0, 'L');
}

$pdf->Ln(10);

// -------------------- OUTPUT --------------------
ob_end_clean(); // ✅ important (prevents output destination errors)
//$pdf->Output('I', 'report.pdf');
$pdf->Output('REPORT.PDF','I');
exit;
