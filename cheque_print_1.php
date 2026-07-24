<?php
//require_once __DIR__ . "/fpdf.php";
require('fpdf/fpdf.php');

// -------- INPUT --------
$payeeName  = "SUMAIYA TRADERS";
$amountNum  = 12360050.75;   // <-- Auto converted to words
$chequeDate = "25/01/2026";

// Auto convert to words
$amountWords = strtoupper(amountToWordsBDT($amountNum)) . " ONLY";

// -------- CHEQUE SIZE (CHANGE TO YOUR REAL SIZE IN MM) --------
$chequeWidth  = 210;
$chequeHeight = 100;

$pdf = new FPDF("P", "mm", array($chequeWidth, $chequeHeight));
$pdf->AddPage();
$pdf->SetFont("Arial", "", 11);

// -------- POSITIONS (ADJUST IF NEEDED) --------
$posDateX   = 150;  $posDateY   = 12;
$posPayeeX  = 20;   $posPayeeY  = 35;
$posWordsX  = 20;   $posWordsY  = 45;
$posAmountX = 155;  $posAmountY = 45;

// -------- PRINT DATE --------
$pdf->SetXY($posDateX, $posDateY);
$pdf->Cell(40, 6, $chequeDate, 0, 0, "L");

// -------- PRINT PAYEE --------
$pdf->SetXY($posPayeeX, $posPayeeY);
$pdf->Cell(120, 6, $payeeName, 0, 0, "L");

// -------- PRINT AMOUNT IN WORDS (AUTO) --------
$pdf->SetXY($posWordsX, $posWordsY);
$pdf->MultiCell(120, 6, $amountWords, 0, "L");

// -------- PRINT AMOUNT IN NUMBERS --------
$pdf->SetXY($posAmountX, $posAmountY);
$pdf->Cell(40, 6, number_format($amountNum, 2), 0, 0, "R");

// -------- OUTPUT --------
//$pdf->Output("I", "cheque.pdf");
$pdf->Output("CHEQUE.PDF", "I");


// ================= HELPER FUNCTIONS =================

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