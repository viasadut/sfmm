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
$start1=date('d/m/Y',strtotime($_REQUEST["date"]));
$end1=date('d/m/Y',strtotime($_REQUEST["date1"]));

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$stmt = $db->query("Select * from covidopd where rdate BETWEEN '$start' and '$end' and tresult='P'and dconfirm='confirmed'");
$data = $stmt->Fetch(PDO::FETCH_OBJ);
$stmt1 = $db->query("SELECT COUNT(name) as tt FROM covidopd where rdate BETWEEN '$start' and '$end' and sam='NEW'and tresult='P'and dconfirm='confirmed'");
$data1 = $stmt1->Fetch(PDO::FETCH_OBJ);
$stmt2 = $db->query("SELECT COUNT(name) as tt FROM covidopd where rdate BETWEEN '$start' and '$end'and sam='FollowUp'and tresult='P'and dconfirm='confirmed'");
$data2 = $stmt2->Fetch(PDO::FETCH_OBJ);
$stmt3 = $db->query("SELECT COUNT(name) as tt FROM covidopd where rdate BETWEEN '$start' and '$end'and sam='Death'and tresult='P'and dconfirm='confirmed'");
$data3 = $stmt3->Fetch(PDO::FETCH_OBJ);



$stmta = $db->query("Select * from covidopd where rdate BETWEEN '$start' and '$end' and status='collected'and tresult!='' and dconfirm='confirmed'");
$dataa = $stmta->Fetch(PDO::FETCH_OBJ);
$stmt1a = $db->query("SELECT COUNT(name) as tt FROM covidopd where rdate BETWEEN '$start' and '$end' and sam='NEW'and status='collected'and tresult!='' and dconfirm='confirmed'");
$data1a = $stmt1a->Fetch(PDO::FETCH_OBJ);
$stmt2a = $db->query("SELECT COUNT(name) as tt FROM covidopd where rdate BETWEEN '$start' and '$end'and sam='FollowUp'and status='collected'and tresult!='' and dconfirm='confirmed'");
$data2a = $stmt2a->Fetch(PDO::FETCH_OBJ);
$stmt3a = $db->query("SELECT COUNT(name) as tt FROM covidopd where rdate BETWEEN '$start' and '$end'and sam='Death'and status='collected'and tresult!='' and dconfirm='confirmed'");
$data3a = $stmt3a->Fetch(PDO::FETCH_OBJ);



$yy=$data1->tt+$data2->tt+$data3->tt;
$yy1=$data1->tt;
$yy2=$data2->tt;
$yy3=$data3->tt;

$yya=$data1a->tt+$data2a->tt+$data3a->tt;
$yy1a=$data1a->tt;
$yy2a=$data2a->tt;
$yy3a=$data3a->tt;


{
$this->Cell(300,10,'Total '.$yya.' Samples Has Been Tested  '.'(New Sample- '. $yy1a.' & FollowUp Sample- '.  $yy2a.' & Death Sample- '.  $yy3a.')'. ' From '.$start1.' TO '.$end1,0,1,'C');

$this->Cell(300,10,'Total '.$yy.' Positive Case Has Been Detected  '.'(New Sample- '. $yy1.' & FollowUp Sample- '.  $yy2.' & Death Sample- '.  $yy3.')'. ' From '.$start1.' TO '.$end1,0,0,'C');


}



$yy1=$data1->tt;
{

$this->Cell(300,10,$yy1.' Positive Cases were found',0,0,'C');


}


$this->Ln();


}

function headerTable(){

$this->SetFont('Times', 'B', 7.5);

$this->Cell(7,5,'SNO',1,0,'C');
$this->Cell(10,5,'SID',1,0,'C');
$this->Cell(15,5,'LAB ID',1,0,'C');
$this->Cell(40,5,'Name',1,0,'C');
$this->Cell(10,5,'Age',1,0,'C');
$this->Cell(10,5,'Sex',1,0,'C');
$this->Cell(12,5,'B-Group',1,0,'C');
$this->Cell(16,5,'Phone',1,0,'C');
$this->Cell(14,5,'CollectDate',1,0,'C');
$this->Cell(14,5,'Result Date',1,0,'C');


$this->Cell(11,5,'Type',1,0,'C');
$this->Cell(80,5,'Address',1,0,'C');
//$this->Cell(40,10,'Address',1,0,'C');

$this->Cell(15,5,'District',1,0,'C');
$this->Cell(40,5,'Company',1,0,'C');
$this->Cell(23,5,'Profession',1,0,'C');
$this->Cell(15,5,'Result',1,0,'C');
$this->Ln();
}
function viewTable($db){

$this->SetFont('Times', '',7);

$count=1;
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];
$start1=date('d/m/Y',strtotime($_REQUEST["date"]));
$end1=date('d/m/Y',strtotime($_REQUEST["date1"]));


$stmt = $db->query("Select * from covidopd where rdate BETWEEN '$start' and '$end' and tresult!='' and dconfirm='confirmed' order by sid asc");
while($data = $stmt->Fetch(PDO::FETCH_OBJ)){
	
	






	$cellWidth=80;//wrapped cell width
	$cellHeight=5;//normal one-line cell height
	
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
	$this->SetFont('Times', '',7);
	$this->Cell(7,($line * $cellHeight),$count,1,0);
$this->Cell(10,($line * $cellHeight),$data->sid,1,0);
$this->Cell(15,($line * $cellHeight),$data->lid,1,0);
$this->Cell(40,($line * $cellHeight),$data->name,1,0);
$this->Cell(10,($line * $cellHeight),$data->page,1,0);
$this->Cell(10,($line * $cellHeight),$data->psex,1,0);
$this->Cell(12,($line * $cellHeight),$data->bgroup,1,0);

$this->Cell(16,($line * $cellHeight),$data->phone,1,0);

$this->Cell(14,($line * $cellHeight),$data->rdate1,1,0);
$this->Cell(14,($line * $cellHeight),$data->rdate1,1,0);


$this->Cell(11,($line * $cellHeight),$data->sam,1,0);

	
	
	
	$xPos=$this->GetX();
	$yPos=$this->GetY();
	$this->MultiCell($cellWidth,$cellHeight,$data->padd,1);
	
	//return the position for next cell next to the multicell
	//and offset the x with multicell width
	
	//$this->SetXY($xPos + $cellWidth , $yPos);
	//$this->MultiCell($cellWidth,$cellHeight,$data->padd,1);
	//$pdf->Cell(40,($line * $cellHeight),$item[],1,1); //adapt height to number of lines
	$this->SetXY($xPos + $cellWidth , $yPos);
	


//$this->Cell(120,10,$data->padd,1,0,'L');


$this->Cell(15,($line * $cellHeight),$data->district,1,0);
$this->Cell(40,($line * $cellHeight),$data->com,1,0);
$this->Cell(23,($line * $cellHeight),$data->pro,1,0);
if($data->tresult=='P'){
	$this->SetFont('Times', 'b',7);
$this->Cell(15,($line * $cellHeight),'POSITIVE',1,0);
}

else if($data->tresult=='N'){
	$this->SetFont('Times', '',7);
$this->Cell(15,($line * $cellHeight),'NEGATIVE',1,0);
}



$this->Ln();
$count++;
	

}
}
}
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','legal',0);
$pdf->tt();
$pdf->rr();
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
?>