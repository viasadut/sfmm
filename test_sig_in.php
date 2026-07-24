<?php
// ✅ MUST be first line (no spaces/newlines before <?php)
ob_start();
ini_set('display_errors', 0);
error_reporting(0);

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew;charset=utf8mb4','root','Godiloveu16',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
]);

$pmrn = $_REQUEST['pmrn'] ?? '';
$id   = $_REQUEST['id'] ?? '';
$eid  = $_REQUEST['eid'] ?? '';

/**
 * ✅ Wrap text by actual PDF width (better than wordwrap).
 */
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
        }else{
            $out .= $line."\n";
            $line = $word;
        }
    }
    $out .= $line;
    $pdf->MultiCell($w, $h, $out, $border, $align);
}

/**
 * ✅ Print wrapped cell BUT keep cursor to next column (same row).
 * Returns used height.
 */
function wrappedCellKeepRow($pdf, $w, $h, $txt, $align='L', $border=0): float{
    $x = $pdf->GetX();
    $y = $pdf->GetY();

    // estimate line count
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
            }else{
                $lines++;
                $line = $word;
            }
        }
    }

    multicellFit($pdf, $w, $h, $txt, $border, $align);
    $pdf->SetXY($x + $w, $y);

    return $lines * $h;
}

// ---------------- DATA LOAD ----------------
$query8 = $db->query("select * from iinves where id='$id'");
$data   = $query8->fetch();

if(!$data){
    ob_end_clean();
    die('No data found');
}

$sdate = date('d/m/Y H:i:s', strtotime($data->rtime));

$query2 = $db->query("select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data2  = $query2->fetch();

$dname2 = $data->dname ?? '';

$tt1  = $data->code ?? '';
$code = $data->barcode1 ?? '';

$queryc  = $db->query("SELECT * FROM radio where code= '$tt1'");
$resultc = $queryc->fetch();

$cr   = $resultc->remarks ?? '';
$unit = $resultc->unit ?? '';

require('force_justify1_test.php');

$pdf = new PDF_Code128();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('22');

// Barcode
$pdf->SetXY(150,745);
$pdf->Code128(23,90,$code,40,10);

// Header
$pdf->SetXY(50,45);
$pdf->Ln(1);
$pdf->SetFont('Times', 'bu',14);
$pdf->Cell(182,6,($data->infusion ?? '').' Report',0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell(30,5,'_________________________________________________________________________',0,1,'L');
$pdf->Ln(4);

$pdf->SetFont('Times', 'b',12);
$pdf->Cell(60,5,'Referring Consultant Name: '. $dname2,0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell(110,5,'Patient Name: '.($data2->pname ?? ''),0,0,'L');
$pdf->Cell(50,5,'MRN: '.($data->pmrn ?? ''),0,1,'L');

$pdf->Cell(110,5,'Gender: '.($data2->gender ?? ''),0,0,'L');
$pdf->Cell(50,5,'Age: '.($data->page ?? ''),0,1,'L');
$pdf->Cell(110,5,'Sample Date: '.$sdate,0,0,'L');
$pdf->Cell(50,5,'Result Time: '.($data->resulttime ?? ''),0,1,'L');

$pdf->Ln(13);
$pdf->SetFont('Times', '',14);
$pdf->Cell(110,5,'SNO-'.$code,0,0,'L');
$pdf->Ln(2);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell(30,5,'_________________________________________________________________________',0,1,'L');
$pdf->Ln(3);

// Table header
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(50,5,'Result',0,0,'L');
$pdf->Cell(50,5,'Unit',0,0,'L');
$pdf->Cell(80,5,'Reference Value',0,1,'L');

$pdf->SetFont('Times', '', 12);

// Result row
$cellWidth  = 80;
$cellHeight = 5;

$pdf->Cell(50,5,($data->result ?? ''),0,0,'L');
$pdf->Cell(50,5,$unit,0,0,'L');
$pdf->MultiCell($cellWidth,$cellHeight,$cr,0,'L');

$pdf->Ln(50);

// Interpretation
if(!empty($resultc->interpretation)){
    $pdf->MultiCell(180,5,$resultc->interpretation);
}

$pdf->Ln(30);

// ================== ✅ WRAP rby1 SECTION ==================
$blockHeight = (!empty($data->resultby)) ? 5*6 : 5*4;
if(method_exists($pdf,'CheckPageBreak')){
    $pdf->CheckPageBreak($blockHeight);
}
$pdf->SetFont('Times','B',8);

if(!empty($data->resultby)){

    $rby = $data->resultby;
    $query24 = $db->query("select * from staff3 where sid='$rby'");
    $data24  = $query24->fetch();

    $rby1 = $data24->sname ?? '';
    $desg = $data24->desig ?? '';

    // Titles row
    $pdf->Cell(45,5,'Result Updated By',0,0,'L');
    $pdf->Cell(50,5,'',0,0,'L');
    $pdf->Cell(38,5,'',0,0,'L');
    $pdf->Cell(50,5,'',0,1,'L');
    $pdf->Ln(1);

    // Column widths
    $w1 = 45; // rby1 column width (wrap here)
    $w2 = 50;
    $w3 = 38;
    $w4 = 50;
    $lh = 4;  // wrapped line height

    // Names row (wrap ONLY rby1)
    $rowX = $pdf->GetX();
    $rowY = $pdf->GetY();

    if($rby1 === ''){
        $pdf->Cell($w1,5,'Dr. Kamrun Nahar',0,0,'L');
        $pdf->Cell($w2,5,'Dr. Kamrun Nahar',0,0,'L');
        $pdf->Cell($w3,5,'Dr. Md. Ahad Ur Rahman',0,0,'L');
        $pdf->Cell($w4,5,'Dr. Umma Asma Saki',0,1,'L');
        $usedH = 5;
    } else {
        $usedH = wrappedCellKeepRow($pdf, $w1, $lh, $rby1, 'L', 0);
        $pdf->Cell($w2,5,'Dr. Kamrun Nahar',0,0,'L');
        $pdf->Cell($w3,5,'Dr. Md. Ahad Ur Rahman',0,0,'L');
        $pdf->Cell($w4,5,'Dr. Umma Asma Saki',0,1,'L');
    }

    // Go below the tallest wrapped cell
    $pdf->SetXY($rowX, $rowY + max($usedH, 5));
    $pdf->Ln(1);

    // Designation row (optional wrap for designation too)
    $rowX = $pdf->GetX();
    $rowY = $pdf->GetY();

    $usedH2 = wrappedCellKeepRow($pdf, $w1, $lh, $desg, 'L', 0);
    $pdf->Cell($w2,5,'Consultant , Microbiology and virology',0,0,'L');
    $pdf->Cell($w3,5,'Consultant , Pathology',0,0,'L');
    $pdf->Cell($w4,5,'Sessional Specialist , Transfusion Medicine',0,1,'L');

    $pdf->SetXY($rowX, $rowY + max($usedH2, 5));

} else {

    // simple block
    $pdf->Cell(100,5,'Result Updated By',0,1,'L');
    $pdf->Ln(1);

    $rby = $data->resultby ?? '';
    $query24 = $db->query("select * from staff3 where sid='$rby'");
    $data24  = $query24->fetch();

    $rby1 = $data24->sname ?? '';
    $desg = $data24->desig ?? '';

    multicellFit($pdf, 100, 4, $rby1, 0, 'L');
    $pdf->Ln(1);
    multicellFit($pdf, 100, 4, $desg, 0, 'L');
}

$pdf->Ln(15);

// ✅ IMPORTANT: clear buffered warnings/outputs before Output()
ob_end_clean();
$pdf->Output();
exit;
?>