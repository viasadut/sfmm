<?php
ob_start();
ini_set('display_errors', 0);
error_reporting(0);

@session_start(); $_SESSION['sess_username'] = $_SESSION['sess_username'] ?? 'claudetest';
$user=$_SESSION["sess_username"];

//require('force_justify.php');
//require('fpdf/fpdf.php');
$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew;charset=utf8mb4','root','',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
]);

//$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','');
//require('force_justify.php');
require('force_justify1_test.php');
$pmrn=$_REQUEST['pmrn'];
$id='O'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from widal where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);

//$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);
$barcode=$data3['barcode1'];



//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');

/* -------------------- HELPERS: wrap text in fixed width cell -------------------- */
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
        } else {
            $out .= $line."\n";
            $line = $word;
        }
    }
    $out .= $line;

    $pdf->MultiCell($w, $h, $out, $border, $align);
}

/**
 * ✅ Wrap only first column and keep cursor at next column in same row.
 * returns used height
 */
function wrappedCellKeepRow($pdf, $w, $h, $txt, $align='L', $border=0): float {
    $x = $pdf->GetX();
    $y = $pdf->GetY();

    // estimate line count (for height)
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
            } else {
                $lines++;
                $line = $word;
            }
        }
    }

    multicellFit($pdf, $w, $h, $txt, $border, $align);

    // go to next column start (same top Y)
    $pdf->SetXY($x + $w, $y);

    return $lines * $h;
}
/* ------------------------------------------------------------------------------ */


$pdf=new PDF_Code128();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);

/*$pdf->Image('logo3.jpg',15,7);
$pdf->Image('logo4.jpg',180,7);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$pdf->Ln(3);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(195,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$pdf->ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$pdf->ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561',0,0,'C');
*/



$pdf->SetXY(150,745);
$pdf->Code128(18,90,$barcode,40,10);
$pdf->SetXY(50,45);




$pdf->ln(1);
$pdf->SetFont('Times', 'bu',14);
$pdf->Cell('182',6,$data['iname'].' Report',0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',12);

$pdf->Cell('60',5,'Referring Consultant Name: '. $data3['dname'],0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '. $data3['pname'],0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data3['pmrn'],0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data3['pgender'],0,0,'L');
$pdf->Cell('50',5,'Age: '.$data3['page'],0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$data3['retime'],0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data3['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
//$pdf->Cell('50',5,'Result Status: '. $data3['resultstatus'],0,1,'L');
$pdf->Cell('50',5,'',0,1,'L');
$pdf->SetFont('Times', 'b',14);

//$pdf->ln(6);

$pdf->ln(8);
$pdf->SetFont('Times', '',14);
$pdf->Cell('110',5,'SNO-'.$barcode,0,1,'L');		


$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);



$pdf->SetFont('Arial' , 'b' , 10);



$pdf->Cell('80',5,'Particulars',1,0,'C');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');



$pdf->Cell('80',5,'Salmonella Paratyphi A-O (AO)',1,0,'C');
$pdf->Cell('30',5,$data['sparaao'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');

$pdf->Cell('80',5,'Salmonella Paratyphi A-H (AH)',1,0,'C');
$pdf->Cell('30',5,$data['sparaah'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');

$pdf->Cell('80',5,'Salmonella Paratyphi B-O (BO)',1,0,'C');
$pdf->Cell('30',5,$data['sparabo'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');


$pdf->Cell('80',5,'Salmonella Paratyphi B-H (BH)',1,0,'C');
$pdf->Cell('30',5,$data['sparabh'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');

$pdf->Cell('80',5,'Salmonella Typhi T-O (TO)',1,0,'C');
$pdf->Cell('30',5,$data['sparato'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');


$pdf->Cell('80',5,'Salmonella Typhi T-H (TH)',1,0,'C');
$pdf->Cell('30',5,$data['sparath'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');



$pdf->ln(15);




// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db1, 'IMMUNOLOGY/SEROLOGY', (isset($data3['resultby'])?$data3['resultby']:(isset($data['resultby'])?$data['resultby']:'')));
$pdf->Ln(10);

// ✅ Clear buffer (prevents "Some data already output")
ob_end_clean();
$pdf->Output();
exit;
?>