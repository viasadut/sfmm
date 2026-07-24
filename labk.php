<?php
require('force_justify2.php');



$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
//require('fpdf/fpdf.php');

require('db1.php');





class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',20,9);
$this->Image('logo1.jpg',175,9);
$this->SetFont('Arial','B',10);
$this->Cell(190,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',10);
$this->Cell(190,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',10);
$this->Cell(190,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(15);

}
function footer(){
$this->SetY(-10);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Report- Page'.$this->PageNo().' ',0,0,'C');

}




function viewTable1($db){


$this->SetLeftMargin('20');




$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];





$query8= $db->query("select * from iinves where id='$id'");
$data = $query8->Fetch(PDO::FETCH_OBJ);

//$dname=$data['dname'];
$query2 = $db->query("select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data2 = $query2->Fetch(PDO::FETCH_OBJ);
$dname2=$data2->adoc;

$tt1=$data->code;


$queryc = $db->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

// Print out result


$cr=$resultc->remarks;
$unit=$resultc->unit;

$this->SetFont('Times', 'bu',14);
$this->Cell('182',6,$data->infusion.' REPORT',0,1,'C');
$this->Ln(4);

$this->SetFont('Times', 'b',14);
$this->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

$this->Ln(4);
$this->SetFont('Times', 'b',12);

$this->Cell('60',5,'Referring Consultant Name: '. $dname2,0,1,'L');

$this->Ln(4);
$this->SetFont('Times', 'b',10);
$this->Cell('109',5,'Patient Name: '. $data2->pname,0,0,'L');
$this->Cell('30',5,'Result Status: '. $data->resultstatus,0,1,'L');

$this->Ln(4);
$this->Cell('25',5,'MRN: '.$data->pmrn,0,0,'L');
$this->Cell('20',5,'Gender: '.$data2->gender,0,0,'L');
$this->Cell('35',5,'Age: '.$data->page,0,0,'L');
$this->Cell('40',5,'Sample Date: '.$data->ordate,0,0,'L');	
$this->Cell('40',5,'Result Time: '.$data->resulttime,0,1,'L');
$this->SetFont('Times', 'b',14);



$this->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

}


function headerTable(){
	
	$this->SetLeftMargin('20');

$this->ln(20);

$this->SetFont('Times', 'B', 12);

$this->Cell('50',5,'Result',0,0,'L');
$this->Cell('50',5,'Unit',0,0,'L');
$this->Cell('80',5,'Reference Value',0,1,'L');



}
function viewTable($db){


$this->SetLeftMargin('20');


$this->SetFont('Times', '',10);

$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];





$query8= $db->query("select * from iinves where id='$id'");
$data = $query8->Fetch(PDO::FETCH_OBJ);

//$dname=$data['dname'];
$query2 = $db->query("select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data2 = $query2->Fetch(PDO::FETCH_OBJ);
$dname2=$data2->adoc;

$tt1=$data->code;


$queryc = $db->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

// Print out result


$cr=$resultc->remarks;
$unit=$resultc->unit;


	$cellWidth=80;//wrapped cell width
	
	$cellHeight=5;//normal one-line cell height
	
	//check whether the text is overflowing
	if($this->GetStringWidth($cr) < $cellWidth){
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
			$this->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
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
	
$xPos=$this->GetX();
	$yPos=$this->GetY();

$this->Cell(50,($line * $cellHeight),strtolower($data->result),0,0);
$this->Cell(50,($line * $cellHeight),strtolower($data->unit),0,0);

	
	
	
	
	$this->MultiCell($cellWidth,$cellHeight,strtolower($cr),0);
	
	
	//return the position for next cell next to the multicell
	//and offset the x with multicell width
	
	//$this->SetXY($xPos + $cellWidth , $yPos);
	//$this->MultiCell($cellWidth,$cellHeight,$data->padd,1);
	//$pdf->Cell(40,($line * $cellHeight),$item[],1,1); //adapt height to number of lines
	$this->SetXY($xPos + $cellWidth , $yPos);
	


//$this->Cell(120,10,$data->padd,1,0,'L');





$this->Ln();

	
}
}
//$code=$data->barcode;
//$code1=$eid;



$pdf=new PDF_Code128();
$pdf1 = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);

$pdf1->AliasNbPages();
$pdf1->AddPage('P','A4',0);
//$pdf->tt();
//$pdf->rr();
//$pdf->headerTable1();
$pdf1->viewTable1($db);

$pdf1->headerTable();
$pdf1->viewTable($db);

$pdf->SetXY(150,745);
$pdf->Code128(160,35,'12345678',40,10);
$pdf->SetXY(50,45);

$pdf->Output();
?>