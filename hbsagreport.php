<?php

$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');

$pmrn=$_REQUEST['pmrn'];
$id='I'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from hbsag where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);



//$dname=$data['dname'];
$query3 = mysqli_query($db,"select * from iinves where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);


$tt1=$data3['code'];
$code=$data3['barcode'];

$queryc = $db1->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

// Print out result


$cr=$resultc->remarks;
$unit=$resultc->unit;
$inter=$resultc->interpretation;
//require('code128.php');


$query2 = $db1->query("select * from inpatient where pmrn='$pmrn'and eid='$eid'");
$data2 = $query2->Fetch(PDO::FETCH_OBJ);

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
$pdf->Cell('182',6,$data3['infusion'].' Report',0,1,'C');
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
$pdf->Cell('110',5,'Sample Date: '.$data3['rtime'],0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data3['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data3['resultstatus'],0,1,'L');

$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);

$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);

$pdf->SetFont('Times', 'B', 12);





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

	
	
	$pdf->Cell('80',5,'Particulars',1,0,'C');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');





$pdf->Cell('80',5,'Patient Value',1,0,'C');
$pdf->Cell('30',5,$data['pvalue'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Cut Off Value',1,0,'C');
$pdf->Cell('30',5,$data['cvalue'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Interpretation',1,0,'C');
$pdf->Cell('30',5,$data['inter'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');



$pdf->ln(5);


	
	
if($data['type']=='Competitive'){
$pdf->SetFont('Arial' , 'b' , 8);
$pdf->MultiCell('182',5,'Method:'.$data['type'].'  ELISA (Enzyme-Linked Immunosorbent Assay)
Sample Rate>Cut Off Rate, Opinion is Negative.
Sample Rate<Cut Off Rate, Opinion is Positive.',0,1);
}

else if($data['type']=='Direct' or $data['type']=='Indirect' or $data['type']=='Sandwich'){
$pdf->SetFont('Arial' , 'b' , 8);
$pdf->MultiCell('182',5,'Method:'.$data['type'].'  ELISA (Enzyme-Linked Immunosorbent Assay)
Sample Rate<Cut Off Rate, Opinion is Negative.
Sample Rate>Cut Off Rate, Opinion is Positive.',0,1);
}


else if($data['type']=='None'){
$pdf->SetFont('Arial' , 'b' , 8);
$pdf->MultiCell('182',5,'Method:ELISA (Enzyme-Linked Immunosorbent Assay)',0,1);
}


	
	
	
	
	//return the position for next cell next to the multicell
	//and offset the x with multicell width
	
	//$pdf->SetXY($xPos + $cellWidth , $yPos);
	//$pdf->MultiCell($cellWidth,$cellHeight,$data->padd,1);
	//$pdf->Cell(40,($line * $cellHeight),$item[],1,1); //adapt height to number of lines
	$pdf->SetXY($xPos + $cellWidth , $yPos);
	


//$pdf->Cell(120,10,$data->padd,1,0,'L');

$pdf->Ln(40);

//$pdf->MultiCell(160,5,'Method: ELISA (Enzyme-Linked Immunosorbent Assay)',0,0);




$pdf->Ln(45);

// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db1, 'IMMUNOLOGY/SEROLOGY', (isset($data3['resultby'])?$data3['resultby']:''), (isset($data3['cby'])?$data3['cby']:''), (isset($data3['conby'])?$data3['conby']:''));
$pdf->Ln(10);

$pdf->Output();
?>