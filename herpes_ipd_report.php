<?php

$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');

$pmrn=$_REQUEST['pmrn'];
$id='I'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];



$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from herpes where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);



//$dname=$data['dname'];
$query3 = mysqli_query($db,"select * from iinves where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);

$barcode=$data3['barcode'];
$code=$data3['code'];

$queryc = $db1->query("SELECT * FROM radio where code= '$code'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

// Print out result


$cr=$resultc->remarks;
$unit=$resultc->unit;
$inter=$resultc->interpretation;
//require('code128.php');



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

$pdf->Cell('60',5,'Referring Consultant Name: '. $data3['adoc'],0,1,'L');

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

	
	





if($data['pvalue']!='')
{
	
$pdf->Ln(3);
$pdf->SetFont('Times', 'B', 12);		
$pdf->Cell('80',5,'Herpes Simplex Virus (HSV) Type 1 IgG',0,1,'L');

$pdf->SetFont('Times', '', 12);
$pdf->Cell('80',5,'',0,1,'C');
$pdf->Cell('80',5,'Particulars',1,0,'L');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');

$pdf->Cell('80',5,'Patient Value',1,0,'L');
$pdf->Cell('30',5,$data['pvalue'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Cut Off Value',1,0,'L');
$pdf->Cell('30',5,$data['cvalue'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Interpretation',1,0,'L');
$pdf->Cell('30',5,$data['inter'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}

if($data['pvaluea']!='')
{
$pdf->Ln(3);	
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell('80',5,'Herpes Simplex Virus (HSV) Type 2 IgM',0,1,'L');

$pdf->SetFont('Times', '', 12);
$pdf->Cell('80',5,'',0,1,'C');
$pdf->Cell('80',5,'Particulars',1,0,'L');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');

$pdf->Cell('80',5,'Patient Value',1,0,'L');
$pdf->Cell('30',5,$data['pvalue'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Cut Off Value',1,0,'L');
$pdf->Cell('30',5,$data['cvalue'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Interpretation',1,0,'L');
$pdf->Cell('30',5,$data['inter'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}


if($data['pvalueb']!='')
{
	
$pdf->Ln(3);	
$pdf->SetFont('Times', 'B', 12);	
$pdf->Cell('80',5,'Herpes Simplex Virus (HSV) Type 2 IgG',0,1,'L');

$pdf->SetFont('Times', '', 12);
$pdf->Cell('80',5,'',0,1,'C');
$pdf->Cell('80',5,'Particulars',1,0,'L');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');

$pdf->Cell('80',5,'Patient Value',1,0,'L');
$pdf->Cell('30',5,$data['pvalue'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Cut Off Value',1,0,'L');
$pdf->Cell('30',5,$data['cvalue'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Interpretation',1,0,'L');
$pdf->Cell('30',5,$data['inter'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}

$pdf->ln(5);



	
/*
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
}*/


$pdf->Ln(45);







if($data3['conby'] !='')
{


$rby=$data3['resultby'];
$query24 = $db1->query("select * from user where uname='$rby'");
$data24 = $query24->Fetch(PDO::FETCH_OBJ);
$rby1=$data24->fullname;


$cby=$data3['conby'];
$query25 = $db1->query("select * from user where uname='$cby'");
$data25 = $query25->Fetch(PDO::FETCH_OBJ);
$cby1=$data25->fullname;


$query26 = $db1->query("select * from doctor1 where dname='$cby1'");
$data26 = $query26->Fetch(PDO::FETCH_OBJ);
$cby3=$data26->Discipline;







$pdf->Cell('100',5,'Result Updated By',0,0,'L');

$pdf->Cell('100',5,'Result Confirmed By',0,1,'L');



$pdf->Ln(1);

$pdf->Cell('100',5,$rby1,0,0,'L');

$pdf->Cell('100',5,$cby1,0,1,'L');

$pdf->Ln(1);

$pdf->Cell('100',5,'Lab Technologist',0,0,'L');

$pdf->Cell('100',5,$cby3,0,1,'L');

}



else 
{


$rby=$data3['resultby'];
$query24 = $db1->query("select * from user where uname='$rby'");
$data24 = $query24->Fetch(PDO::FETCH_OBJ);
$rby1=$data24->fullname;


//$cby=$data->cby;
//$query25 = $db->query("select * from user where uname='$cby'");
//$data25 = $query25->Fetch(PDO::FETCH_OBJ);
//$cby1=$data25->fullname;


//$query26 = $db->query("select * from doctor1 where dname='$cby1'");
//$data26 = $query26->Fetch(PDO::FETCH_OBJ);
//$cby3=$data26->Discipline;







$pdf->Cell('100',5,'Result Updated By',0,1,'L');

//$pdf->Cell('100',5,'Result Confirmed By',0,1,'L');



$pdf->Ln(1);

$pdf->Cell('100',5,$rby1,0,1,'L');

//$pdf->Cell('100',5,$cby1,0,1,'L');

$pdf->Ln(1);

$pdf->Cell('100',5,'Lab Technologist',0,1,'L');

//$pdf->Cell('100',5,$cby3,0,1,'L');

}

$pdf->Ln(15);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Computer Generated Report, No Signature Required',0,1,'R');

$pdf->Output();

?>