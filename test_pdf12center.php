<?php
require('force_justify.php');

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
//require('fpdf/fpdf.php');

class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',85,9);
$this->Image('logo1.jpg',215,9);
$this->SetFont('Arial','B',10);
$this->Cell(300,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',10);
$this->Cell(300,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',10);
$this->Cell(300,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(15);

}
function footer(){
$this->SetY(-10);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Report- Page'.$this->PageNo().' ',0,0,'C');

}
function tt(){
$this->SetFont('Arial' , 'b' , 15);

$this->Ln();
}



function rr(){

$this->SetFont('Times', 'B', 12);
//$bt=$_REQUEST['dname'];




$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];
$bt=$_REQUEST['bt'];
$start1=date('d/m/Y',strtotime($_REQUEST["date"]));
$end1=date('d/m/Y',strtotime($_REQUEST["date1"]));

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$stmt = $db->query("Select * from covidopd where ssent BETWEEN '$start' and '$end' and status='collected' and sentto='$bt'");
$data = $stmt->Fetch(PDO::FETCH_OBJ);
$stmt1 = $db->query("SELECT COUNT(name) as tt FROM covidopd where ssent BETWEEN '$start' and '$end' and sam='NEW'and status='collected'and sentto='$bt'");
$data1 = $stmt1->Fetch(PDO::FETCH_OBJ);
$stmt2 = $db->query("SELECT COUNT(name) as tt FROM covidopd where ssent BETWEEN '$start' and '$end'and sam='FollowUp'and status='collected'and sentto='$bt'");
$data2 = $stmt2->Fetch(PDO::FETCH_OBJ);
$stmt3 = $db->query("SELECT COUNT(name) as tt FROM covidopd where ssent BETWEEN '$start' and '$end'and sam='Death'and status='collected'and sentto='$bt'");
$data3 = $stmt3->Fetch(PDO::FETCH_OBJ);


$yy=$data1->tt+$data2->tt+$data3->tt;
$yy1=$data1->tt;
$yy2=$data2->tt;
$yy3=$data3->tt;
{

$this->Cell(300,10,$yy.' Samples Has Been Sent  '.'(New Sample- '. $yy1.' & FollowUp Sample- '.  $yy2.' & Death Sample- '.  $yy3.')'. ' From '.$start1.' TO '.$end1,0,0,'C');


}



$yy1=$data1->tt;
{




}


$this->Ln();


}

function headerTable(){

$this->SetFont('Times', 'B', 7.5);

$this->Cell(9,10,'SNO',1,0,'C');
$this->Cell(10,10,'SID',1,0,'C');
$this->Cell(25,10,'LID',1,0,'C');
$this->Cell(60,10,'Name',1,0,'C');
$this->Cell(7,10,'Age',1,0,'C');
$this->Cell(9,10,'Sex',1,0,'C');

$this->Cell(16,10,'Phone',1,0,'C');



$this->Cell(11,10,'Type',1,0,'C');
$this->Cell(80,10,'Address',1,0,'C');
//$this->Cell(40,10,'Address',1,0,'C');
$this->Cell(15,10,'Ward',1,0,'C');
$this->Cell(12,10,'District',1,0,'C');
$this->Cell(25,10,'Result',1,0,'C');


$this->Ln();
}
function viewTable($db){

$this->SetFont('Times', '',7);

$count=1;
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];
$bt=$_REQUEST['bt'];
$start1=date('d/m/Y',strtotime($_REQUEST["date"]));
$end1=date('d/m/Y',strtotime($_REQUEST["date1"]));


$stmt = $db->query("Select * from covidopd where ssent BETWEEN '$start' and '$end' and status='collected'and sentto='$bt' order by sid asc ");
while($data = $stmt->Fetch(PDO::FETCH_OBJ)){
	
	






	$cellWidth=80;//wrapped cell width
	
	$cellHeight=10;//normal one-line cell height
	
	//check whether the text is overflowing
	if($this->GetStringWidth($data->padd) < $cellWidth){
		//if not, then do nothing
		$line=1;
	}else{
		//if it is, then calculate the height needed for wrapped cell
		//by splitting the text to fit the cell width
		//then count how many lines are needed for the text to fit the cell
		
		$textLength=strlen($data->padd);	//total text length
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
				$tmpString=substr($data->padd,$startChar,$maxChar);
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
	$this->SetFont('Times', 'b',9);
	$this->Cell(9,($line * $cellHeight),$count,1,0);
	$this->SetFont('Times', 'b',9);
$this->Cell(10,($line * $cellHeight),strtolower($data->sid),1,0);
$this->SetFont('Times', '',7);
$this->Cell(25,($line * $cellHeight),strtolower($data->lid),1,0);
$this->SetFont('Times', '',10);
$this->Cell(60,($line * $cellHeight),strtoupper($data->name),1,0);
$this->SetFont('Times', '',7);
$this->Cell(7,($line * $cellHeight),strtolower($data->page),1,0);
$this->Cell(9,($line * $cellHeight),strtolower($data->psex),1,0);

$this->Cell(16,($line * $cellHeight),strtolower($data->phone),1,0);




$this->Cell(11,($line * $cellHeight),strtolower($data->sam),1,0);

	
	
	
	$xPos=$this->GetX();
	$yPos=$this->GetY();
	$this->MultiCell($cellWidth,$cellHeight,strtolower($data->padd),1);
	
	//return the position for next cell next to the multicell
	//and offset the x with multicell width
	
	//$this->SetXY($xPos + $cellWidth , $yPos);
	//$this->MultiCell($cellWidth,$cellHeight,$data->padd,1);
	//$pdf->Cell(40,($line * $cellHeight),$item[],1,1); //adapt height to number of lines
	$this->SetXY($xPos + $cellWidth , $yPos);
	


//$this->Cell(120,10,$data->padd,1,0,'L');

$this->Cell(15,($line * $cellHeight),strtolower($data->ward),1,0);
$this->Cell(12,($line * $cellHeight),strtolower($data->district),1,0);
$this->Cell(25,($line * $cellHeight),strtolower($data->tresult),1,0);

$this->Ln();
$count++;
	

}
}
}
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->tt();
$pdf->rr();
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
?>