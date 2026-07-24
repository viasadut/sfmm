<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

ob_start();

require('db1.php');
require('vendor/autoload.php');

// -------------------- Helpers --------------------
function normalizeSpaces($s) {
    return trim(preg_replace('/\s+/', ' ', $s));
}

// Lakh/Crore number to words
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

    $units = [
        10000000 => 'crore',
        100000   => 'lakh',
        1000     => 'thousand',
        100      => 'hundred'
    ];

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

// Wrap into max 2 lines, max 40 chars per line, no word cutting
function wrapIntoTwoLines40($text, $max = 40) {
    $text = normalizeSpaces($text);

    // Wrap at 40 chars, do not cut words
    $wrapped = wordwrap($text, $max, "\n", false);
    $lines = explode("\n", $wrapped);

    if (count($lines) === 1) {
        return [trim($lines[0]), ''];
    }

    // If more than 2 lines, merge extras into line 2
    if (count($lines) > 2) {
        $lines = [
            $lines[0],
            implode(' ', array_slice($lines, 1))
        ];
    }

    return [
        trim($lines[0]),
        trim($lines[1] ?? '')
    ];
}

// -------------------- mPDF Setup --------------------
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [216, 89], // width, height in mm (your cheque size)
    'margin_left' => 5,
    'margin_right' => 2,
    'margin_top' => 5,
    'margin_bottom' => 2,
    'default_font' => 'dejavusans', // built-in, safe for English
]);

$sno = $_REQUEST['sno'] ?? '';
if ($sno === '') {
    die("No cheque no (sno) found");
}

// -------------------- Get Amount --------------------
$queryp = mysqli_query($con, "SELECT SUM(gtotal) AS total_amount FROM pms_bill_payment WHERE chequeno='$sno'");
$rowp = mysqli_fetch_assoc($queryp);
$amount = (int)($rowp['total_amount'] ?? 0);

// -------------------- Get First Row --------------------
$query1 = mysqli_query($con, "SELECT * FROM pms_bill_payment WHERE chequeno='$sno' ORDER BY billno ASC LIMIT 1");

while ($data1 = mysqli_fetch_assoc($query1)) {

    $mpdf->AddPage();

    // Convert amount to words
    $amountWords = ucwords(numberToWordsLakh($amount)) . " only";

    // Wrap into 2 lines, 40 chars max per line
    list($line1, $line2) = wrapIntoTwoLines40($amountWords, 40);

    // Make HTML safe
    $line1 = htmlspecialchars($line1, ENT_QUOTES, 'UTF-8');
    $line2 = htmlspecialchars($line2, ENT_QUOTES, 'UTF-8');

    $mpdf->WriteHTML('
   

    
        <table width="100%">
            <tr>
                
            <td style="font-size:16px; text-align:right;" width="65%"></td>    
            <td style="font-size:16px; text-align:left;" width="35%">
            <div style="font-size:13pt; line-height:1.5;"><br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1 &nbsp;&nbsp;1
            &nbsp;&nbsp;1
            &nbsp;&nbsp;1
            &nbsp;1
            &nbsp;1
            &nbsp;1
            &nbsp;1
                </div>
                </td>
            </tr>
        </table>

        <table width="100%">

        <tr>
                <td style="font-size:13px; text-align:left;">
                 
                    <div style="font-size:13pt; line-height:2;">
                    
                    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    ADSV COMPANY
                    
                        
                    </div>
                </td>
            </tr>
            <tr>
                <td style="font-size:15px; text-align:left;">
                    <div style="font-size:13pt; line-height:1.2;">
                    
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        '.$line1.'<br><br>
                        &nbsp;&nbsp;&nbsp;
                    
                        
                        '.$line2.'
                    </div>
                </td>

                <td style="font-size:15px; text-align:right;">
                 
                    <div style="font-size:16pt; line-height:1.2;">
                    
                        
                    '.$amount.'
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                    </div>
                </td>
            </tr>

            
        </table>
    ');

    // -------------------- 2) A/C Payee diagonal top-left (GUARANTEED) --------------------
    // Position where you want the diagonal text to start
    $x = 16;   // mm
    $y = 18;  // mm

    $mpdf->SetFontSize(12);

    // Draw two lines like cheque style (also rotated)
    $mpdf->StartTransform();
    $mpdf->Rotate(30, $x, $y);

    // Top line
    $mpdf->Line($x -12, $y - 1, $x + 30, $y - 1);
    // Bottom line
    $mpdf->Line($x -14, $y + 8, $x + 37, $y + 8);

    // Text
    $mpdf->WriteText($x - 12, $y + 6, "A/C Payee");

    $mpdf->StopTransform();
    
    $date='2026-02-25';
    $letters = mb_str_split($date);   // PHP 7.4+
    //print_r($letters);

    $mpdf->WriteText($x - 12, $y + 6, $letters);
    
}

// Output PDF
if (ob_get_length()) ob_clean();
$mpdf->Output();
exit;