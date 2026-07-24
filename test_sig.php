<?php
/**
 * SINGLE-FILE FIX for:
 * - Deprecated warnings printing before PDF output
 * - "FPDF error: Some data has already been output"
 *
 * ✅ This is a safe “single complete code” you can use RIGHT NOW
 *    WITHOUT editing fpdf1.php.
 *
 * NOTE:
 * - This code assumes your existing files still exist:
 *   1) D:\xampp\htdocs\sfmm\fpdf\fpdf1.php   (your old FPDF)
 *   2) force_justify1_test.php              (your PDF_Code128 class)
 *
 * If force_justify1_test.php already includes fpdf1.php, keep as-is.
 */

// -------------------- MUST BE FIRST (no spaces before <?php) --------------------
ob_start();                  // buffer ANY accidental output (warnings/notices/echo)
ini_set('display_errors', 0);
error_reporting(0);          // hide deprecated warnings so PDF headers are not broken
// -----------------------------------------------------------------------------

// ------------------------------ DB -------------------------------------------
$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew;charset=utf8mb4', 'root', 'Godiloveu16', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
]);

// ------------------------------ INPUTS ---------------------------------------
$pmrn = isset($_REQUEST['pmrn']) ? trim($_REQUEST['pmrn']) : '';
$id   = isset($_REQUEST['id'])   ? trim($_REQUEST['id'])   : '';
$eid  = isset($_REQUEST['eid'])  ? trim($_REQUEST['eid'])  : '';

if ($id === '') {
    ob_end_clean();
    die('Missing id');
}

// ------------------------------ HELPERS --------------------------------------
function normalizeText($txt): string {
    $txt = (string)$txt;
    $txt = trim(preg_replace('/\s+/', ' ', $txt));
    return $txt;
}

/**
 * Wrap text by actual PDF width (more accurate than wordwrap).
 */
function multicellFit($pdf, $w, $h, $txt, $border = 0, $align = 'L') {
    $txt = normalizeText($txt);

    if ($txt === '') {
        $pdf->MultiCell($w, $h, '', $border, $align);
        return;
    }

    $words = explode(' ', $txt);
    $line  = '';
    $out   = '';

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
 * Prints a wrapped MultiCell but keeps the “row” alignment for next columns.
 * Returns used height.
 */
function wrappedCellKeepRow($pdf, $w, $h, $txt, $align = 'L', $border = 0): float {
    $x = $pdf->GetX();
    $y = $pdf->GetY();

    // Estimate line count by simulating wrap
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

    multicellFit($pdf, $w, $h, $txt, $border, $align);

    // Restore cursor to right side of wrapped cell, same top Y
    $pdf->SetXY($x + $w, $y);

    return $lines * $h;
}

// ------------------------------ LOAD DATA ------------------------------------
$stmt8 = $db->prepare("SELECT * FROM einves WHERE id = :id LIMIT 1");
$stmt8->execute([':id' => $id]);
$data = $stmt8->fetch();

if (!$data) {
    ob_end_clean();
    die("No record in einves for id=$id");
}

$sdate = '';
if (!empty($data->rtime)) {
    $sdate = date('d/m/Y H:i:s', strtotime($data->rtime));
}

$stmt2 = $db->prepare("SELECT * FROM emergency WHERE pmrn = :pmrn AND eid = :eid LIMIT 1");
$stmt2->execute([':pmrn' => $pmrn, ':eid' => $eid]);
$data2 = $stmt2->fetch();

if (!$data2) {
    $data2 = (object)[
        'pname'  => '',
        'gender' => '',
    ];
}

$dname2 = $data->user ?? '';
$tt1    = $data->code ?? '';
$code   = $data->barcode1 ?? '';

$stmtc = $db->prepare("SELECT * FROM radio WHERE code = :code LIMIT 1");
$stmtc->execute([':code' => $tt1]);
$resultc = $stmtc->fetch();

if (!$resultc) {
    $resultc = (object)[
        'remarks'        => '',
        'unit'           => '',
        'interpretation' => '',
    ];
}

$cr   = $resultc->remarks ?? '';
$unit = $resultc->unit ?? '';

// Referring consultant fullname
$dname23 = '';
if ($dname2 !== '') {
    $stmt23 = $db->prepare("SELECT * FROM user WHERE uname = :uname LIMIT 1");
    $stmt23->execute([':uname' => $dname2]);
    $data23 = $stmt23->fetch();
    if ($data23) $dname23 = $data23->fullname ?? '';
}

// ------------------------------ PDF REQUIRE ----------------------------------
// If force_justify1_test.php does NOT include fpdf1.php, include it here.
// Uncomment next line only if needed.
// require('fpdf/fpdf1.php');

require('force_justify1_test.php'); // defines PDF_Code128 & Code128()

// ------------------------------ PDF START ------------------------------------
$pdf = new PDF_Code128();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4', 0);

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetLeftMargin(22);

// Barcode
$pdf->SetXY(150, 745);
$pdf->Code128(23, 90, $code, 40, 10);

// Title
$pdf->SetXY(50, 45);
$pdf->Ln(1);
$pdf->SetFont('Times', 'BU', 14);
$pdf->Cell(182, 6, ($data->infusion ?? '') . ' Report', 0, 1, 'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(30, 5, '_________________________________________________________________________', 0, 1, 'L');
$pdf->Ln(4);

$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(60, 5, 'Referring Consultant Name: ' . $dname23, 0, 1, 'L');
$pdf->Ln(4);

$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(110, 5, 'Patient Name: ' . ($data2->pname ?? ''), 0, 0, 'L');
$pdf->Cell(50, 5, 'MRN: ' . ($data->pmrn ?? ''), 0, 1, 'L');

$pdf->Cell(110, 5, 'Gender: ' . ($data2->gender ?? ''), 0, 0, 'L');
$pdf->Cell(50, 5, 'Age: ' . ($data->page ?? ''), 0, 1, 'L');

$pdf->Cell(110, 5, 'Sample Date: ' . $sdate, 0, 0, 'L');
$pdf->Cell(50, 5, 'Result Time: ' . ($data->resulttime ?? ''), 0, 1, 'L');

$pdf->Ln(13);

$pdf->SetFont('Times', '', 14);
$pdf->Cell(110, 5, 'SNO-' . $code, 0, 0, 'L');
$pdf->SetFont('Times', 'B', 14);
$pdf->Ln(2);

$pdf->Cell(30, 5, '_________________________________________________________________________', 0, 1, 'L');
$pdf->Ln(3);

// Table header
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(50, 5, 'Result', 0, 0, 'L');
$pdf->Cell(50, 5, 'Unit', 0, 0, 'L');
$pdf->Cell(80, 5, 'Reference Value', 0, 1, 'L');

$pdf->SetFont('Times', '', 12);

// Table row with wrapping Reference Value
$cellWidth  = 80;
$cellHeight = 5;

$xPos = $pdf->GetX();
$yPos = $pdf->GetY();

$pdf->Cell(50, 5, ($data->result ?? ''), 0, 0);
$pdf->Cell(50, 5, $unit, 0, 0);

// wrapped remarks
$pdf->MultiCell($cellWidth, $cellHeight, strtolower((string)$cr), 0, 'L');

// restore cursor (optional)
$pdf->SetXY($xPos, $yPos + 10);

$pdf->Ln(40);

// Interpretation
if (!empty($resultc->interpretation)) {
    $pdf->MultiCell(180, 5, $resultc->interpretation);
}

$pdf->Ln(20);

// ------------------------------ SIGNATURE BLOCK (WRAP rby1) -------------------
$pdf->SetFont('Times', 'B', 8);

if (!empty($data->resultby)) {

    $rby = $data->resultby;

    $stmt24 = $db->prepare("SELECT * FROM staff3 WHERE sid = :sid LIMIT 1");
    $stmt24->execute([':sid' => $rby]);
    $data24 = $stmt24->fetch();

    $rby1  = $data24->sname ?? '';
    $desig = $data24->desig ?? '';

    // Header
    $pdf->Cell(45, 5, 'Result Updated By', 0, 0, 'L');
    $pdf->Cell(50, 5, '', 0, 0, 'L');
    $pdf->Cell(38, 5, '', 0, 0, 'L');
    $pdf->Cell(50, 5, '', 0, 1, 'L');
    $pdf->Ln(1);

    // Column widths
    $wRby = 45;
    $wC1  = 50;
    $wC2  = 38;
    $wC3  = 50;
    $h    = 4;

    // Names row
    $rowX = $pdf->GetX();
    $rowY = $pdf->GetY();

    if ($rby1 === '') {
        $pdf->Cell($wRby, 5, 'Dr. Kamrun Nahar', 0, 0, 'L');
        $pdf->Cell($wC1, 5, 'Dr. Kamrun Nahar', 0, 0, 'L');
        $pdf->Cell($wC2, 5, 'Dr. Md. Ahad Ur Rahman', 0, 0, 'L');
        $pdf->Cell($wC3, 5, 'Dr. Umma Asma Saki', 0, 1, 'L');
        $usedH = 5;
    } else {
        $usedH = wrappedCellKeepRow($pdf, $wRby, $h, $rby1, 'L', 0);
        $pdf->Cell($wC1, 5, 'Dr. Kamrun Nahar', 0, 0, 'L');
        $pdf->Cell($wC2, 5, 'Dr. Md. Ahad Ur Rahman', 0, 0, 'L');
        $pdf->Cell($wC3, 5, 'Dr. Umma Asma Saki', 0, 1, 'L');
    }

    // Move below tallest cell
    $pdf->SetXY($rowX, $rowY + max($usedH, 5));
    $pdf->Ln(1);

    // Designation row (wrap)
    $rowX = $pdf->GetX();
    $rowY = $pdf->GetY();

    $usedH2 = wrappedCellKeepRow($pdf, $wRby, $h, $desig, 'L', 0);
    $pdf->Cell($wC1, 5, 'Consultant , Microbiology and virology', 0, 0, 'L');
    $pdf->Cell($wC2, 5, 'Consultant , Pathology', 0, 0, 'L');
    $pdf->Cell($wC3, 5, 'Sessional Specialist , Transfusion Medicine', 0, 1, 'L');

    $pdf->SetXY($rowX, $rowY + max($usedH2, 5));

} else {

    // If resultby empty
    $pdf->Cell(100, 5, 'Result Updated By', 0, 1, 'L');
    $pdf->Ln(1);

    $rby = $data->resultby ?? '';
    $stmt24 = $db->prepare("SELECT * FROM staff3 WHERE sid = :sid LIMIT 1");
    $stmt24->execute([':sid' => $rby]);
    $data24 = $stmt24->fetch();

    $rby1  = $data24->sname ?? '';
    $desig = $data24->desig ?? '';

    multicellFit($pdf, 100, 4, $rby1, 0, 'L');
    $pdf->Ln(1);
    multicellFit($pdf, 100, 4, $desig, 0, 'L');
}

$pdf->Ln(10);

// ------------------------------ OUTPUT (IMPORTANT) ---------------------------
// Clear anything that was buffered (warnings, spaces, accidental echoes)
ob_end_clean();

// Now output PDF safely
$pdf->Output();
exit;
?>