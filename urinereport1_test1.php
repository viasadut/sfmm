<?php
declare(strict_types=1);

session_start();

// -----------------------------
// 1) Basic security / inputs
// -----------------------------
$user = $_SESSION['sess_username'] ?? '';

// Use GET/POST safely
$pmrn = isset($_REQUEST['pmrn']) ? trim((string)$_REQUEST['pmrn']) : '';
$eid  = isset($_REQUEST['eid'])  ? trim((string)$_REQUEST['eid'])  : '';
$id1  = isset($_REQUEST['id'])   ? trim((string)$_REQUEST['id'])   : '';

if ($pmrn === '' || $eid === '' || $id1 === '') {
    http_response_code(400);
    exit('Missing required parameters.');
}

// Your urine table uses sno like "O{id}"
$sno = 'O' . $id1;

// -----------------------------
// 2) DB connection (PDO only)
// -----------------------------
$dsn  = 'mysql:host=localhost;dbname=sfmmkpjnew;charset=utf8mb4';
$dbUser = 'root';
$dbPass = 'Godiloveu16';

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (Throwable $e) {
    http_response_code(500);
    exit('Database connection failed.');
}

// -----------------------------
// 3) Helpers: fetchers
// -----------------------------
function fetchOne(PDO $pdo, string $sql, array $params): ?array {
    $st = $pdo->prepare($sql);
    $st->execute($params);
    $row = $st->fetch();
    return $row ?: null;
}

// urine data
$urine = fetchOne(
    $pdo,
    "SELECT * FROM urine WHERE pmrn = :pmrn AND eid = :eid AND sno = :sno LIMIT 1",
    [':pmrn' => $pmrn, ':eid' => $eid, ':sno' => $sno]
);

// patient/app data (if you really need it)
$papp = fetchOne(
    $pdo,
    "SELECT * FROM pappnew WHERE pmrn = :pmrn AND eid = :eid LIMIT 1",
    [':pmrn' => $pmrn, ':eid' => $eid]
);

// alltest data
$alltest = fetchOne(
    $pdo,
    "SELECT * FROM alltest WHERE pmrn = :pmrn AND eid = :eid AND id = :id LIMIT 1",
    [':pmrn' => $pmrn, ':eid' => $eid, ':id' => $id1]
);

if (!$urine || !$alltest) {
    http_response_code(404);
    exit('No report data found.');
}

$barcode = (string)($alltest['barcode1'] ?? '');
$retime  = (string)($alltest['retime'] ?? '');
$sdate   = $retime ? date('d/m/Y H:i:s', strtotime($retime)) : '';

$rbyUname = (string)($alltest['resultby'] ?? '');
$cbyUname = (string)($alltest['cby'] ?? '');

$rbyFull = '';
$cbyFull = '';
$cbyDiscipline = '';

if ($rbyUname !== '') {
    $u = fetchOne($pdo, "SELECT fullname FROM user WHERE uname = :u LIMIT 1", [':u' => $rbyUname]);
    $rbyFull = $u['fullname'] ?? '';
}

if ($cbyUname !== '') {
    $u = fetchOne($pdo, "SELECT fullname FROM user WHERE uname = :u LIMIT 1", [':u' => $cbyUname]);
    $cbyFull = $u['fullname'] ?? '';

    if ($cbyFull !== '') {
        $d = fetchOne($pdo, "SELECT Discipline FROM doctor1 WHERE dname = :n LIMIT 1", [':n' => $cbyFull]);
        $cbyDiscipline = $d['Discipline'] ?? '';
    }
}

// -----------------------------
// 4) PDF setup (standardized)
// -----------------------------
require 'force_justify1.php'; // contains PDF_Code128 / Code128

/**
 * IMPORTANT:
 * To fix "2nd page header gap", we use a consistent body start Y (like 45)
 * and enforce it in Header() OR immediately after AddPage() in CheckPageBreak().
 *
 * Best practice: implement both in your PDF class.
 */

// Create PDF
$pdf = new PDF_Code128();
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15); // bottom margin
$pdf->SetMargins(17, 15, 17);

// Start page
$pdf->AddPage('P', 'A4');

// Optional: set initial body start position (consistent with other pages)
$pdf->SetXY(17, 45);

// -----------------------------
// 5) Layout helpers (standard)
// -----------------------------
/**
 * Keep blocks together: if remaining space < block height => new page
 */
function ensureSpace(PDF_Code128 $pdf, float $neededHeight, float $bodyStartY = 45): void {
    if ($pdf->GetY() + $neededHeight > $pdf->PageBreakTrigger) {
        $pdf->AddPage($pdf->CurOrientation);
        $pdf->SetXY(17, $bodyStartY);
    }
}

/**
 * Table row helper
 */
function row4(PDF_Code128 $pdf, string $c1, string $c2, string $c3, string $c4): void {
    $pdf->Cell(70, 5, $c1, 1, 0, 'L');
    $pdf->Cell(50, 5, $c2, 1, 0, 'C');
    $pdf->Cell(21, 5, $c3, 1, 0, 'C');
    $pdf->Cell(40, 5, $c4, 1, 1, 'C');
}

// -----------------------------
// 6) Header area content
// -----------------------------
$pdf->SetFont('Times', 'BU', 14);
$pdf->Cell(182, 6, ($urine['iname'] ?? 'Urine') . ' Report', 0, 1, 'C');

$pdf->Ln(2);
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(182, 5, str_repeat('_', 90), 0, 1, 'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(182, 5, 'Referring Consultant Name: ' . ($alltest['dname'] ?? ''), 0, 1, 'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(110, 5, 'Patient Name: ' . ($alltest['pname'] ?? ''), 0, 0, 'L');
$pdf->Cell(50,  5, 'MRN: ' . ($alltest['pmrn'] ?? ''), 0, 1, 'L');

$pdf->Cell(110, 5, 'Gender: ' . ($alltest['pgender'] ?? ''), 0, 0, 'L');
$pdf->Cell(50,  5, 'Age: ' . ($alltest['page'] ?? ''), 0, 1, 'L');

$pdf->Cell(110, 5, 'Sample Date: ' . $sdate, 0, 0, 'L');
$pdf->Cell(50,  5, 'Result Time: ' . ($alltest['resulttime'] ?? ''), 0, 1, 'L');

$pdf->Cell(110, 5, '', 0, 0, 'L');
$pdf->Cell(50,  5, 'Result Status: ' . ($alltest['resultstatus'] ?? ''), 0, 1, 'L');

$pdf->Ln(6);
$pdf->SetFont('Times', '', 14);
$pdf->Cell(110, 5, 'SNO-' . $barcode, 0, 1, 'L');

$pdf->Ln(1);
$pdf->Cell(182, 5, str_repeat('_', 90), 0, 1, 'L');
$pdf->Ln(3);

// Barcode (keep it near top area; avoid magic Y=745 style)
if ($barcode !== '') {
    // Put barcode on top-right nicely
    $pdf->Code128(150, 20, $barcode, 40, 10);
}

// -----------------------------
// 7) Result table
// -----------------------------
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(70, 5, 'Particulars', 1, 0, 'C');
$pdf->Cell(50, 5, 'Value', 1, 0, 'C');
$pdf->Cell(21, 5, 'Unit', 1, 0, 'C');
$pdf->Cell(40, 5, 'Reference Range', 1, 1, 'C');

row4($pdf, 'Appearance', (string)($urine['aurine'] ?? ''), '', 'Clear');

if (!empty($urine['color'])) {
    row4($pdf, 'Colour', (string)$urine['color'], '', 'Pale Yellow');
}

if (!empty($urine['sediment'])) {
    if ($urine['sediment'] === 'Absent') {
        row4($pdf, 'Sediment', 'Absent', '', '');
    } elseif ($urine['sediment'] === 'Present') {
        row4($pdf, 'Sediment', (string)($urine['sedi_v'] ?? 'Present'), '', '');
    }
}

row4($pdf, 'Specific Gravity', (string)($urine['surine'] ?? ''), '', '1.002-1.028');
row4($pdf, 'pH', (string)($urine['purine'] ?? ''), '', '4.8-7.5');
row4($pdf, 'Protein', (string)($urine['prurine'] ?? ''), '', 'Negative');
row4($pdf, 'Glucose', (string)($urine['gurine'] ?? ''), '', 'Negative');
row4($pdf, 'Ketone', (string)($urine['kurine'] ?? ''), '', 'Negative');
row4($pdf, 'Bilirubin', (string)($urine['burine'] ?? ''), '', 'Negative');
row4($pdf, 'Urobilinogen', (string)($urine['uurine'] ?? ''), '', 'Negative');

row4($pdf, 'WBC', (string)($urine['wurine'] ?? ''), 'HPF', '0-5');
row4($pdf, 'RBC', (string)($urine['rurine'] ?? ''), 'HPF', 'Nil');
row4($pdf, 'Epithelial Cell', (string)($urine['eurine'] ?? ''), 'HPF', '0-5');

// Cast block (keep consistent fonts; no random font jumps unless needed)
$cast = (string)($urine['curine'] ?? '');
if ($cast !== '') {
    row4($pdf, 'Cast', $cast, '', 'Negative');
    if (!empty($urine['hyaline_c']))  row4($pdf, 'Hyaline Cast', (string)$urine['hyaline_c'], '', '');
    if (!empty($urine['granular_c'])) row4($pdf, 'Granular Cast', (string)$urine['granular_c'], '', '');
    if (!empty($urine['wbc']))        row4($pdf, 'WBC Cast', (string)$urine['wbc'], '', '');
    if (!empty($urine['rbc']))        row4($pdf, 'RBC Cast', (string)$urine['rbc'], '', '');
}

// Crystal block
$crystal = (string)($urine['crurine'] ?? '');
if ($crystal !== '') {
    row4($pdf, 'Crystal', $crystal, '', 'Negative');
    if (!empty($urine['cal_ox']))          row4($pdf, 'Calcium Oxalate', (string)$urine['cal_ox'], '', '');
    if (!empty($urine['uric_acid']))       row4($pdf, 'Uric Acid', (string)$urine['uric_acid'], '', '');
    if (!empty($urine['triple_phosphate']))row4($pdf, 'Triple Phosphate', (string)$urine['triple_phosphate'], '', '');
    if (!empty($urine['c_others']))        row4($pdf, 'Others Crystal', (string)$urine['c_others'], '', '');
}

row4($pdf, 'Bacteria', (string)($urine['baurine'] ?? ''), '', 'Negative');
row4($pdf, 'Yeast', (string)($urine['yurine'] ?? ''), '', 'Negative');
row4($pdf, 'Others', (string)($urine['ourine'] ?? ''), '', 'Negative');

$pdf->Ln(2);
if (!empty($urine['comment'])) {
    $pdf->SetFont('Times', 'B', 10);
    $pdf->Cell(182, 5, 'Comments: ' . (string)$urine['comment'], 0, 1, 'L');
}

$pdf->Ln(6);

// -----------------------------
// 8) Signature block (NO SPLIT)
// -----------------------------
$hasConfirm = ($cbyUname !== '' && $cbyFull !== '');
$blockHeight = $hasConfirm ? 5 * 6 : 5 * 4;

// Ensure the entire block stays together and also fixes page 2 starting position
ensureSpace($pdf, $blockHeight, 45);

$pdf->SetFont('Times', 'B', 10);

if ($hasConfirm) {
    $pdf->Cell(100, 5, 'Result Updated By', 0, 0, 'L');
    $pdf->Cell(100, 5, 'Result Confirmed By', 0, 1, 'L');

    $pdf->Ln(1);
    $pdf->Cell(100, 5, $rbyFull, 0, 0, 'L');
    $pdf->Cell(100, 5, $cbyFull, 0, 1, 'L');

    $pdf->Ln(1);
    $pdf->Cell(100, 5, 'Lab Technologist', 0, 0, 'L');
    $pdf->Cell(100, 5, $cbyDiscipline, 0, 1, 'L');
} else {
    $pdf->Cell(100, 5, 'Result Updated By', 0, 1, 'L');
    $pdf->Ln(1);
    $pdf->Cell(100, 5, $rbyFull, 0, 1, 'L');
    $pdf->Ln(1);
    $pdf->Cell(100, 5, 'Lab Technologist', 0, 1, 'L');
}

// -----------------------------
// 9) Output
// -----------------------------
$pdf->Output();
