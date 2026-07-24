<?php
require('fpdf/fpdf1.php');

class PDF_Codabar extends FPDF
{
function Codabar($xpos, $ypos, $code, $basewidth=0.35, $height=16) {
    $barChar = array (
        '0' => array (6.5, 10.4, 6.5, 10.4, 6.5, 24.3, 17.9),
        '1' => array (6.5, 10.4, 6.5, 10.4, 17.9, 24.3, 6.5),
        '2' => array (6.5, 10.0, 6.5, 24.4, 6.5, 10.0, 18.6),
        '3' => array (17.9, 24.3, 6.5, 10.4, 6.5, 10.4, 6.5),
        '4' => array (6.5, 10.4, 17.9, 10.4, 6.5, 24.3, 6.5),
        '5' => array (17.9,    10.4, 6.5, 10.4, 6.5, 24.3, 6.5),
        '6' => array (6.5, 24.3, 6.5, 10.4, 6.5, 10.4, 17.9),
        '7' => array (6.5, 24.3, 6.5, 10.4, 17.9, 10.4, 6.5),
        '8' => array (6.5, 24.3, 17.9, 10.4, 6.5, 10.4, 6.5),
        '9' => array (18.6, 10.0, 6.5, 24.4, 6.5, 10.0, 6.5),
        
        'A' => array (6.5, 8.0, 19.6, 19.4, 6.5, 16.1, 6.5),
        
    );
    $this->SetFont('Arial','',13);
    $this->Text($xpos, $ypos + $height + 4, $code);
    $this->SetFillColor(0);
    $code = strtoupper($start.$code.$end);
    for($i=0; $i<strlen($code); $i++){
        $char = $code[$i];
        if(!isset($barChar[$char])){
            $this->Error('Invalid character in barcode: '.$char);
        }
        $seq = $barChar[$char];
        for($bar=0; $bar<7; $bar++){
            $lineWidth = $basewidth*$seq[$bar]/6.5;
            if($bar % 2 == 0){
                $this->Rect($xpos, $ypos, $lineWidth, $height, 'F');
            }
            $xpos += $lineWidth;
        }
        $xpos += $basewidth*10.4/6.5;
    }
}
}
?>