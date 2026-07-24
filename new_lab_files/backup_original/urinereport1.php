<?php
ob_start();
ini_set('display_errors', 0);
error_reporting(0);

session_start();
$user=$_SESSION["sess_username"];

//require('force_justify.php');
//require('fpdf/fpdf.php');
$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew;charset=utf8mb4','root','Godiloveu16',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
]);
require('force_justify1_test.php');


$pmrn=$_REQUEST['pmrn'];
$id='O'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from urine where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);

//$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);
$barcode=$data3['barcode1'];
$sdate=date('d/m/Y H:i:s',strtotime($data3["retime"]));

$tt1=$data3['code'];


$queryc = $db1->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);





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





$pdf->SetXY(150,745);
$pdf->Code128(18,87,$barcode,40,10);
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
$pdf->Cell('110',5,'Sample Date: '.$sdate,0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data3['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
//$pdf->Cell('50',5,'Result Status: '. $data3['resultstatus'],0,1,'L');
$pdf->Cell('50',5,'',0,1,'L');
$pdf->SetFont('Times', 'b',14);


$pdf->ln(6);
$pdf->SetFont('Times', '',14);
$pdf->Cell('110',5,'SNO-'.$barcode,0,0,'L');		
//$pdf->SetFont('Times', 'b',14);

$pdf->ln(1);

$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);


$pdf->SetFont('Arial' , 'b' , 10);



$pdf->Cell('70',5,'Particulars',1,0,'C');
$pdf->Cell('50',5,'Value',1,0,'C');
$pdf->Cell('21',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');



$pdf->Cell('70',5,'Appearance',1,0,'L');
$pdf->Cell('50',5,$data['aurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Clear ',1,1,'C');

if($data['color']!='')
{
$pdf->Cell('70',5,'Colour',1,0,'L');
$pdf->Cell('50',5,$data['color'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Pale Yellow ',1,1,'C');
}

if($data['sediment']!='' and $data['sediment']=='Absent')
{
$pdf->Cell('70',5,'Sediment',1,0,'L');
$pdf->Cell('50',5,$data['sediment'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}

if($data['sediment']!='' and $data['sediment']=='Present')
{
$pdf->Cell('70',5,'Sediment',1,0,'L');
$pdf->Cell('50',5,$data['sedi_v'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}

$pdf->Cell('70',5,'Specific Gravity',1,0,'L');
$pdf->Cell('50',5,$data['surine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'1.002-1.028',1,1,'C');

$pdf->Cell('70',5,'pH',1,0,'L');
$pdf->Cell('50',5,$data['purine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'4.8-7.5',1,1,'C');

$pdf->Cell('70',5,'Protein',1,0,'L');
$pdf->Cell('50',5,$data['prurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');

$pdf->Cell('70',5,'Glucose',1,0,'L');
$pdf->Cell('50',5,$data['gurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');

$pdf->Cell('70',5,'Ketone',1,0,'L');
$pdf->Cell('50',5,$data['kurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');

$pdf->Cell('70',5,'Bilirubin',1,0,'L');
$pdf->Cell('50',5,$data['burine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');


$pdf->Cell('70',5,'Urobilinogen',1,0,'L');
$pdf->Cell('50',5,$data['uurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');



$pdf->Cell('70',5,'WBC',1,0,'L');
$pdf->Cell('50',5,$data['wurine'],1,0,'C');
$pdf->Cell('21',5,'HPF',1,0,'C');
$pdf->Cell('40',5,'0-5 ',1,1,'C');


$pdf->Cell('70',5,'RBC',1,0,'L');
$pdf->Cell('50',5,$data['rurine'],1,0,'C');
$pdf->Cell('21',5,'HPF',1,0,'C');
$pdf->Cell('40',5,'Nil ',1,1,'C');


$pdf->Cell('70',5,'Epithelial Cell',1,0,'L');
$pdf->Cell('50',5,$data['eurine'],1,0,'C');
$pdf->Cell('21',5,'HPF',1,0,'C');
$pdf->Cell('40',5,'0-5 ',1,1,'C');


/*$pdf->Cell('70',5,'Cast',1,0,'L');
$pdf->Cell('50',5,$data['curine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');
*/
if($data['curine']=='Positive'){

    $pdf->SetFont('Arial' , 'b' , 12);
    $pdf->Cell('70',5,'Cast',1,0,'L');
    $pdf->SetFont('Arial' , 'b' , 10);
    $pdf->Cell('50',5,$data['curine'],1,0,'C');
    $pdf->Cell('21',5,'',1,0,'C');
    $pdf->Cell('40',5,'Negative',1,1,'C');
    
}

if($data['hyaline_c']!=''){
$pdf->Cell('70',5,'Hayline Cast',1,0,'L');
$pdf->Cell('50',5,$data['hyaline_c'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}
if($data['granular_c']!=''){
$pdf->Cell('70',5,'Granular Cast',1,0,'L');
$pdf->Cell('50',5,$data['granular_c'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}

if($data['wbc']!=''){
$pdf->Cell('70',5,'WBC Cast',1,0,'L');
$pdf->Cell('50',5,$data['wbc'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}
if($data['rbc']!=''){
$pdf->Cell('70',5,'RBC Cast',1,0,'L');
$pdf->Cell('50',5,$data['rbc'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}

if($data['curine']=='Negative'){
   
    $pdf->Cell('70',5,'Cast',1,0,'L');
    $pdf->Cell('50',5,$data['curine'],1,0,'C');
    $pdf->Cell('21',5,'',1,0,'C');
    $pdf->Cell('40',5,'Negative',1,1,'C');
    
}

/*
$pdf->Cell('70',5,'Crystal',1,0,'L');
$pdf->Cell('50',5,$data['crurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');
*/

if($data['crurine']=='Positive'){

    $pdf->SetFont('Arial' , 'b' , 12);
    $pdf->Cell('70',5,'Crystal',1,0,'L');
    $pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,$data['crurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');
}

if($data['cal_ox']!=''){
    $pdf->Cell('70',5,'Calcium Oxalate',1,0,'L');
    $pdf->Cell('50',5,$data['cal_ox'],1,0,'C');
    $pdf->Cell('21',5,'',1,0,'C');
    $pdf->Cell('40',5,'',1,1,'C');
}

if($data['uric_acid']!=''){
    $pdf->Cell('70',5,'Uric Acid',1,0,'L');
$pdf->Cell('50',5,$data['uric_acid'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}

if($data['triple_phosphate']!=''){
$pdf->Cell('70',5,'Triple Phosphate',1,0,'L');
$pdf->Cell('50',5,$data['triple_phosphate'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}
if($data['c_others']!=''){
$pdf->Cell('70',5,'Others Crystal',1,0,'L');
$pdf->Cell('50',5,$data['c_others'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}

if($data['crurine']=='Negative'){


    $pdf->Cell('70',5,'Crystal',1,0,'L');
    
$pdf->Cell('50',5,$data['crurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');

}

$pdf->Cell('70',5,'Bacteria',1,0,'L');
$pdf->Cell('50',5,$data['baurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');


$pdf->Cell('70',5,'Yeast',1,0,'L');
$pdf->Cell('50',5,$data['yurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');


$pdf->Cell('70',5,'Others',1,0,'L');
$pdf->Cell('50',5,$data['ourine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');

$pdf->Ln(2);
if($data['comment']!=''){
$pdf->Cell('140',5,'Comments: '.$data['comment'],0,0,'L');
}



$pdf->Ln(6);





// -------------------- ✅ WRAPTEXT rby1 in MultiCell --------------------
$blockHeight = (!empty($data3['resultby'])) ? 3*6 : 3*4;
if(method_exists($pdf,'CheckPageBreak')){
    $pdf->CheckPageBreak($blockHeight);
}

$pdf->SetFont('Times','B',8);

if(!empty($data3['resultby'])){

    $rby = $data3['resultby'];
    $query24 = $db1->query("select * from staff3 where sid='$rby'");
    $data24  = $query24->fetch();
    $rby1    = $data24->sname ?? '';
    $desig   = $data24->desig ?? '';

    // Titles row
    $pdf->Cell(45,5,'Result Updated By',0,0,'L');
    $pdf->Cell(50,5,'',0,0,'L');
    $pdf->Cell(38,5,'',0,0,'L');
    $pdf->Cell(50,5,'',0,1,'L');
    $pdf->Ln(1);

    // widths
    $w1=45; $w2=50; $w3=38; $w4=50; $lh=4;

    // Names row with wrapped rby1
    $rowX = $pdf->GetX();
    $rowY = $pdf->GetY();

    if($rby1 === ''){
        $pdf->Cell($w1,5,'',0,0,'L');
        $pdf->Cell($w2,5,'Dr. Kamrun Nahar',0,0,'L');
        $pdf->Cell($w3,5,'Dr. Md. Ahad Ur Rahman',0,0,'L');
        $pdf->Cell($w4,5,'Dr. Umma Asma Saki',0,1,'L');
        $usedH = 5;
    } else {
        $usedH = wrappedCellKeepRow($pdf,$w1,$lh,$rby1,'L',0); // ✅ WRAPPED
        $pdf->Cell($w2,5,'Dr. Kamrun Nahar',0,0,'L');
        $pdf->Cell($w3,5,'Dr. Md. Ahad Ur Rahman',0,0,'L');
        $pdf->Cell($w4,5,'Dr. Umma Asma Saki',0,1,'L');
    }

    // move below tallest name cell
    $pdf->SetXY($rowX, $rowY + max($usedH,5));
    $pdf->Ln(1);

    // Designation row (wrap designation too)
    $rowX = $pdf->GetX();
    $rowY = $pdf->GetY();

    $usedH2 = wrappedCellKeepRow($pdf,$w1,$lh,$desig,'L',0); // ✅ optional wrap
    $pdf->Cell($w2,5,'Consultant , Microbiology and virology',0,0,'L');
    $pdf->Cell($w3,5,'Consultant , Pathology',0,0,'L');
    $pdf->Cell($w4,5,'Sessional Specialist , Transfusion Medicine',0,1,'L');

    $pdf->SetXY($rowX, $rowY + max($usedH2,5));

} else {

    // If resultby empty
    $pdf->Cell(100,5,'Result Updated By',0,1,'L');
    $pdf->Ln(1);

    $rby = $data3['resultby'] ?? '';
    $query24 = $db1->query("select * from staff3 where sid='$rby'");
    $data24  = $query24->fetch();

    $rby1  = $data24->sname ?? '';
    $desig = $data24->desig ?? '';

    multicellFit($pdf,100,4,$rby1,0,'L');
    $pdf->Ln(1);
    multicellFit($pdf,100,4,$desig,0,'L');
}

$pdf->Ln(15);

// ✅ Clear buffer (prevents "Some data already output")
ob_end_clean();
$pdf->Output();
exit;
?>