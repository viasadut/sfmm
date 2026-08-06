<?php
$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','');
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$date=$_REQUEST['date'];


$eid=$_REQUEST['eid'];

$sno='O'.$_REQUEST['id'];


$query8= $db->query("select * from alltest where id='$id'");
$data = $query8->Fetch(PDO::FETCH_OBJ);
$sdate=date('d/m/Y H:i:s',strtotime($data->retime));
//$dname=$data['dname'];
$query2 = $db->query("select * from pappnew where pmrn='$pmrn' and eid='$eid'");
$data2 = $query2->Fetch(PDO::FETCH_OBJ);
$dname2=$data->dname;

$tt1=$data->code;
$code=$data->barcode;

$queryc = $db->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

// Print out result


$cr=$resultc->remarks;
$unit=$resultc->unit;
//require('code128.php');


$query3 = $db->query("select * from pappnew where pmrn='$pmrn'");
$data3 = $query3->Fetch(PDO::FETCH_OBJ);






$query4 = $db->query("select * from dengue where pmrn='$pmrn' and eid='$eid' and sno='$sno'");
$data4 = $query4->Fetch(PDO::FETCH_OBJ);



require('force_justify1.php');





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
$pdf->Cell('110',5,'Patient Name: '. $data->pname,0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data->pmrn,0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data->pgender,0,0,'L');
$pdf->Cell('50',5,'Age: '.$data->page,0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$sdate,0,0,'L');
$pdf->Cell('50',5,'Result Time: '.$data->resulttime,0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data->resultstatus,0,1,'L');




$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);

$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);

$pdf->SetFont('Times', 'B', 12);

$pdf->Cell('50',5,'Investigation',0,0,'L');
$pdf->Cell('50',5,'Patient Value',0,0,'L');
$pdf->Cell('50',5,'Cut Off Value',0,0,'L');
$pdf->Cell('80',5,'Interpretation',0,1,'L');


$pdf->SetFont('Times', '', 12);
$cellWidth=80;//wrapped cell width
	
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

if($data4->dengue1!='')
{$pdf->ln(5);
	$pdf->Cell(50,5,'Dengue IgG, Antibodies',0,0);	
	
$pdf->Cell(50,5,$data4->dengue1,0,0);
$pdf->Cell(50,5,$data4->pv1,0,0);

	
	
	
	
	$pdf->MultiCell($cellWidth,$cellHeight,$data4->in1,0,1);
}



if($data4->dengue2!='')
	
	{
		$pdf->ln(5);
	$pdf->Cell(50,5,'Dengue IgM, Antibodies',0,0);	
	
$pdf->Cell(50,5,$data4->dengue2,0,0);
$pdf->Cell(50,5,$data4->pv2,0,0);

	
	
	
	
	$pdf->MultiCell($cellWidth,$cellHeight,$data4->in2,0,1);
	
	}	
	//return the position for next cell next to the multicell
	//and offset the x with multicell width
	
	//$pdf->SetXY($xPos + $cellWidth , $yPos);
	//$pdf->MultiCell($cellWidth,$cellHeight,$data->padd,1);
	//$pdf->Cell(40,($line * $cellHeight),$item[],1,1); //adapt height to number of lines
	$pdf->SetXY($xPos + $cellWidth , $yPos);
	

	
$pdf->SetFont('Times', 'B', 12);	
$pdf->Ln(30);
$pdf->Cell(120,10,"Method: ELISA (Enzyme- Linked Immunosorbent Assay)",0,0,'L');





$pdf->Ln(20);



if($resultc->interpretation !='')
{
$pdf->MultiCell(180,5,'Interpretation- '.$resultc->interpretation);

}

$pdf->Ln(30);

$pdf->SetFont('Times', 'B', 12);
// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db, 'IMMUNOLOGY/SEROLOGY', (isset($data->resultby)?$data->resultby:''));
$pdf->Ln(10);

$pdf->Output();

?>