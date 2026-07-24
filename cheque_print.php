<?php
//require_once __DIR__ . "/fpdf.php";
require('fpdf/fpdf.php');
// -------------------- INPUT DATA --------------------
$payeeName  = "SUMAIYA TRADERS";
$amountNum  = 360050.00;
$chequeDate = "25/01/2026"; // DD/MM/YYYY
$accountPayeeOnly = true;

// Convert amount to words (Taka)
$amountWords = amountToWordsBDT($amountNum) . " Only";

// -------------------- PDF SETUP --------------------
$pdf = new FPDF("P", "mm", "A4");
$pdf->AddPage();
$pdf->SetFont("Arial", "", 11);

// Uncomment this once to see grid and fine-tune positions
// drawGrid($pdf);

// If your cheque is not at exact top, move everything using these:
$baseX = 0;   // move right (+) or left (-)
$baseY = 20;  // move down (+) or up (-)

// -------------------- POSITIONS (ADJUST IF NEEDED) --------------------
// These are based on your photo layout

// Date boxes area (right top)
$posDateX = $baseX + 150;
$posDateY = $baseY + 20;

// Payee line
$posPayeeX = $baseX + 25;
$posPayeeY = $baseY + 38;

// Amount in words
$posWordsX = $baseX + 25;
$posWordsY = $baseY + 48;

// Amount in numbers (Tk box)
$posAmountX = $baseX + 155;
$posAmountY = $baseY + 48;

// A/C Payee text (top left)
$posACX = $baseX + 15;
$posACY = $baseY + 15;

// -------------------- PRINT DATE --------------------
$pdf->SetXY($posDateX, $posDateY);
$pdf->Cell(40, 6, $chequeDate, 0, 0, "L");

// -------------------- PRINT PAYEE --------------------
$pdf->SetXY($posPayeeX, $posPayeeY);
$pdf->Cell(120, 6, $payeeName, 0, 0, "L");

// -------------------- PRINT AMOUNT IN WORDS --------------------
$pdf->SetXY($posWordsX, $posWordsY);
$pdf->MultiCell(120, 6, strtoupper($amountWords), 0, "L");

// -------------------- PRINT AMOUNT IN NUMBERS --------------------
$pdf->SetXY($posAmountX, $posAmountY);
$pdf->Cell(40, 6, number_format($amountNum, 2), 0, 0, "R");

// -------------------- A/C PAYEE MARK --------------------
if ($accountPayeeOnly) {
    $pdf->SetFont("Arial", "B", 10);
    $pdf->SetXY($posACX, $posACY);
    $pdf->Cell(40, 6, "A/C PAYEE", 0, 0, "L");
    $pdf->SetFont("Arial", "", 11);
}

// Output PDF
//$pdf->Output("I", "cheque.pdf");
//$pdf->Output("D", "CHEQUE.PDF");
$pdf->Output("CHEQUE.PDF", "I");

// -------------------- HELPERS --------------------

function amountToWordsBDT(float $amount): string
{
    $taka  = (int) floor($amount);
    $paisa = (int) round(($amount - $taka) * 100);

    $takaWords = numberToWords($taka) . " Taka";
    if ($paisa > 0) {
        return $takaWords . " and " . numberToWords($paisa) . " Paisa";
    }
    return $takaWords;
}

function numberToWords(int $num): string
{
    if ($num === 0) return "Zero";

    $ones = [
        "", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine",
        "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen",
        "Seventeen", "Eighteen", "Nineteen"
    ];
    $tens = ["", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];

    $parts = [];

    $units = [
        10000000 => "Crore",
        100000   => "Lakh",
        1000     => "Thousand",
        100      => "Hundred"
    ];

    foreach ($units as $value => $label) {
        if ($num >= $value) {
            $count = intdiv($num, $value);
            $num = $num % $value;
            $parts[] = trim(numberToWords($count) . " " . $label);
        }
    }

    if ($num >= 20) {
        $parts[] = $tens[intdiv($num, 10)] . ($num % 10 ? " " . $ones[$num % 10] : "");
    } elseif ($num > 0) {
        $parts[] = $ones[$num];
    }

    return trim(implode(" ", $parts));
}

function drawGrid(FPDF $pdf): void
{
    $pdf->SetDrawColor(200, 200, 200);
    for ($x = 0; $x <= 210; $x += 10) {
        $pdf->Line($x, 0, $x, 297);
    }
    for ($y = 0; $y <= 297; $y += 10) {
        $pdf->Line(0, $y, 210, $y);
    }
    $pdf->SetDrawColor(0, 0, 0);
}