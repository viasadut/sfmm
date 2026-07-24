<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

ob_start();

require('db1.php');
require('vendor/autoload.php');

// -------------------- Helpers --------------------
function normalizeSpaces($s) { return trim(preg_replace('/\s+/', ' ', $s)); }

function numberToWordsLakh($number) {
    $number = (int)$number;
    if ($number === 0) return 'zero';

    $words = [
        0 => '', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',
        5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen',
        14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen',
        17 => 'seventeen', 18 => 'eighteen', 19 => 'nineteen',
        20 => 'twenty', 30 => 'thirty', 40 => 'forty', 50 => 'fifty',
        60 => 'sixty', 70 => 'seventy', 80 => 'eighty', 90 => 'ninety'
    ];

    $result = '';
    $units = [10000000 => 'crore', 100000 => 'lakh', 1000 => 'thousand', 100 => 'hundred'];

    foreach ($units as $value => $name) {
        if ($number >= $value) {
            $count = intdiv($number, $value);
            $number = $number % $value;
            $result .= numberToWordsLakh($count) . " $name ";
        }
    }

    if ($number > 0) {
        if ($number < 20) {
            $result .= $words[$number] . ' ';
        } else {
            $tens = intdiv($number, 10) * 10;
            $unit = $number % 10;
            $result .= $words[$tens] . ' ' . $words[$unit] . ' ';
        }
    }

    return normalizeSpaces($result);
}

function wrapIntoTwoLines40($text, $max = 40) {
    $text = normalizeSpaces($text);
    $wrapped = wordwrap($text, $max, "\n", false);
    $lines = explode("\n", $wrapped);

    if (count($lines) === 1) return [trim($lines[0]), ''];

    if (count($lines) > 2) {
        $lines = [$lines[0], implode(' ', array_slice($lines, 1))];
    }

    return [trim($lines[0]), trim($lines[1] ?? '')];
}

// Date boxes "DDMMYYYY"
function dateBoxes($date = null) {
    if (!$date) $date = date('dmy'); // ddmmyy
    // If you want ddmmyyyy:
    // $date = date('dmY');

    $digits = str_split($date);
    $html = "<div style='text-align:right;'>";
    foreach ($digits as $d) {
        $html .= "<span style='display:inline-block;width:6mm;height:6mm;line-height:6mm;border:0.3mm solid #000;text-align:center;font-size:12px;margin-left:1mm;'>$d</span>";
    }
    $html .= "</div>";
    return $html;
}

// -------------------- mPDF Setup --------------------
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [216, 89],
    'margin_left' => 0,
    'margin_right' => 0,
    'margin_top' => 0,
    'margin_bottom' => 0,
    'default_font' => 'dejavusans',
]);

$sno = $_REQUEST['sno'] ?? '';
if ($sno === '') die("No cheque no (sno) found");

// Amount
$queryp = mysqli_query($con, "SELECT SUM(gtotal) AS total_amount FROM pms_bill_payment WHERE chequeno='$sno'");
$rowp = mysqli_fetch_assoc($queryp);
$amount = (int)($rowp['total_amount'] ?? 0);

// Row data
$query1 = mysqli_query($con, "SELECT * FROM pms_bill_payment WHERE chequeno='$sno' ORDER BY billno ASC LIMIT 1");

while ($data1 = mysqli_fetch_assoc($query1)) {

    $mpdf->AddPage();
    $mpdf->SetFont('dejavusans');

    // -------------------- 1) Date boxes top-right --------------------
    $mpdf->WriteHTML("
        <div style='position:absolute; right:8mm; top:6mm;'>
            ".dateBoxes(date('dmY'))."
        </div>
    ");

    // -------------------- 2) A/C Payee diagonal top-left (GUARANTEED) --------------------
    // Position where you want the diagonal text to start
    $x = 8;   // mm
    $y = 10;  // mm

    $mpdf->SetFontSize(12);

    // Draw two lines like cheque style (also rotated)
    $mpdf->StartTransform();
    $mpdf->Rotate(40, $x, $y);

    // Top line
    $mpdf->Line($x -6, $y - 6, $x + 40, $y - 3);
    // Bottom line
    $mpdf->Line($x -8, $y + 4, $x + 40, $y + 4);

    // Text
    $mpdf->WriteText($x - 8, $y + 3, "A/C Payee");

    $mpdf->StopTransform();

    // -------------------- 3) Payee name --------------------
    $mpdf->SetFontSize(13);
    $mpdf->WriteText(8, 22, "ADSV COMPANY");

    // -------------------- 4) Amount in words (2 lines, 40 chars max) --------------------
    '<br><br><br><br><br><br><br><br>';
    $amountWords = ucwords(numberToWordsLakh($amount)) . " Taka Only";
    [$line1, $line2] = wrapIntoTwoLines40($amountWords, 40);

    $mpdf->SetFontSize(15);
    $mpdf->WriteText(60, 40, $line1);
    $mpdf->WriteText(60, 52, $line2);

    // -------------------- 5) Amount number (right side) --------------------
    $mpdf->SetFontSize(20);
    $mpdf->WriteText(150, 65, (string)$amount);
}

if (ob_get_length()) ob_clean();
$mpdf->Output('cheque.pdf', 'I');
exit;