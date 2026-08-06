<?php
ob_start();
ini_set('display_errors', 0);
error_reporting(0);

session_start();
$user=$_SESSION["sess_username"];

//require('force_justify.php');
//require('fpdf/fpdf.php');
$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew;charset=utf8mb4','root','Godiloveu16',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
]);

//$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
//require('force_justify.php');
require('force_justify1_test.php');

$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$query8= $db->query("select * from alltest where id='$id'");
$data = $query8->Fetch(PDO::FETCH_OBJ);

//$dname=$data['dname'];
$query2 = $db->query("select * from pappnew where pmrn='$pmrn' and eid='$eid'");
$data2 = $query2->Fetch(PDO::FETCH_OBJ);
$dname2=$data->dname;



$tt1=$data->code;
$code=$data->barcode1;

$queryc = $db->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

// Print out result


$cr=$resultc->remarks;
$unit=$resultc->unit;
//require('code128.php');



$query23 = $db->query("select * from patient where pmrn='$pmrn'");
$data23 = $query23->Fetch(PDO::FETCH_OBJ);
//$dname23=$data23->fullname;



//require('force_justify1.php');


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



//$pdf1->AddPage();
$pdf=new PDF_Code128();


$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);

//$pdf1->AddPage();
//$pdf1->SetFont('Arial','',10);





//$code=$pmrn;
//$code1=$eid;
$pdf->SetXY(150,745);
$pdf->Code128(18,90,$code,40,10);
$pdf->SetXY(50,45);
//$pdf->Write(5,'A set: "'.$code.'"');

$pdf->ln(2);

//$pdf->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Times', 'bu',14);
$pdf->Cell('182',6,$data->medi.' Report',0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',12);

$pdf->Cell('60',5,'Referring Consultant Name: '. $data->dname,0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '. $data23->pname,0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data->pmrn,0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data->pgender,0,0,'L');
$pdf->Cell('50',5,'Age: '.$data->page,0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$data->retime,0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data->resulttime,0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
//$pdf->Cell('50',5,'Result Status: '. $data->resultstatus,0,1,'L');
$pdf->Cell('50',5,'',0,1,'L');
$pdf->SetFont('Times', 'b',14);

//$pdf->ln(6);
$pdf->ln(8);
$pdf->SetFont('Times', '',14);
$pdf->Cell('110',5,'SNO-'.$code,0,1,'L');	

$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);

$pdf->SetFont('Times', 'B', 12);

$pdf->Cell('30',5,'Peripheral Blood Flim Comment:',0,1,'L');

$pdf->ln(5);
$pdf->SetFont('Times', '', 12);
$cellWidth=200;//wrapped cell width
	
	$cellHeight=5;//normal one-line cell height
	
	//check whether the text is overflowing
	if($pdf->GetStringWidth($cr) < $cellWidth){
		//if not, then do nothing
		$line=2;
	}else{
		//if it is, then calculate the height needed for wrapped cell
		//by splitting the text to fit the cell width
		//then count how many lines are needed for the text to fit the cell
		
		$textLength=strlen($resultc->remarks);	//total text length
		$errMargin=10;		//cell width error margin, just in case
		$startChar=0;		//character start position for each line
		$maxChar=0;			//maximum character in a line, to be incremented later
		$textArray=array();	//to hold the strings for each line
		$tmpString="";		//to hold the string for a line (temporary)
		
		while($startChar < $textLength){ //loop until end of text
			//loop until maximum character reached
			while( 
			$pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
			($startChar+$maxChar) < $textLength ) {
				$maxChar++;
				$tmpString=substr($resultc->remarks,$startChar,$maxChar);
			}
			//move startChar to next line
			$startChar=$startChar+$maxChar;
			//then add it into the array so we know how many line are needed
			array_push($textArray,$tmpString);
			//reset maxChar and tmpString
			$maxChar=0;
			$tmpString='';
			
		}
		//get number of line
		$line=count($textArray);
	}
	
	//write the cells
	
	//use MultiCell instead of Cell
	//but first, because MultiCell is always treated as line ending, we need to 
	//manually set the xy position for the next cell to be next to it.
	//remember the x and y position before writing the multicell
	
$xPos=$pdf->GetX();
	$yPos=$pdf->GetY();



	
	
	
	
	$pdf->MultiCell($cellWidth,$cellHeight,$data->result,0);
	
	
	//return the position for next cell next to the multicell
	//and offset the x with multicell width
	
	//$pdf->SetXY($xPos + $cellWidth , $yPos);
	//$pdf->MultiCell($cellWidth,$cellHeight,$data->padd,1);
	//$pdf->Cell(40,($line * $cellHeight),$item[],1,1); //adapt height to number of lines
	$pdf->SetXY($xPos + $cellWidth , $yPos);
	


//$pdf->Cell(120,10,$data->padd,1,0,'L');




$pdf->ln(100);


// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db, 'HAEMATOLOGY', (isset($data->resultby)?$data->resultby:''));
$pdf->Ln(10);

// ✅ Clear buffer (prevents "Some data already output")
ob_end_clean();
$pdf->Output();
exit;
?>