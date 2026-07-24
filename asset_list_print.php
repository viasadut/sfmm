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
$stmt1 = $db->query("SELECT COUNT(id) as tt FROM storenew where etype='Asset' and estatus!='Deleted' and installdate between'$start' and '$end'");


$data1 = $stmt1->Fetch(PDO::FETCH_OBJ);


$yy=$data1->tt;
{

$this->Cell(300,10,'Total '.$yy.' Record(s) Are Found in the Search'. ' From '.$start1.' TO '.$end1,0,1,'C');

}




$this->Ln();


}

function headerTable(){

$this->SetFont('Times', 'B', 7.5);

$this->Cell(9,10,'SNO',1,0,'C');
$this->Cell(10,10,'MSNO',1,0,'C');
$this->Cell(25,10,'Date of Purchase',1,0,'C');
$this->Cell(90,10,'Asset Name',1,0,'C');

$this->Cell(50,10,'Current Location',1,0,'C');

$this->Cell(60,10,'Supplier',1,0,'C');
$this->Cell(30,10,'Warrenty',1,0,'C');





$this->Ln();
}
function viewTable($db){

$this->SetFont('Times', '',7);

$count=1;
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];
$start1=date('d/m/Y',strtotime($_REQUEST["date"]));
$end1=date('d/m/Y',strtotime($_REQUEST["date1"]));


$stmt = $db->query("Select * from storenew where etype='Asset' and estatus!='Deleted' and installdate between'$start' and '$end' ORDER BY ename1 asc");
while($data = $stmt->Fetch(PDO::FETCH_OBJ)){
	
	






	$cellWidth=30;//wrapped cell width
	
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
$this->Cell(10,($line * $cellHeight),strtolower($data->msno),1,0);
$this->SetFont('Times', '',7);
$this->Cell(25,($line * $cellHeight),strtolower($data->installdate),1,0);
$this->SetFont('Times', '',7);
$this->Cell(90,($line * $cellHeight),strtoupper($data->ename1),1,0);
$this->SetFont('Times', '',7);

$this->Cell(50,($line * $cellHeight),strtolower($data->c_loc),1,0);

$this->Cell(60,($line * $cellHeight),strtolower($data->supplier),1,0);




	
	$xPos=$this->GetX();
	$yPos=$this->GetY();
	$this->MultiCell($cellWidth,$cellHeight,strtolower($data->warrenty),1);
	
	//return the position for next cell next to the multicell
	//and offset the x with multicell width
	
	//$this->SetXY($xPos + $cellWidth , $yPos);
	//$this->MultiCell($cellWidth,$cellHeight,$data->padd,1);
	//$pdf->Cell(40,($line * $cellHeight),$item[],1,1); //adapt height to number of lines
	$this->SetXY($xPos + $cellWidth , $yPos);
	


//$this->Cell(120,10,$data->padd,1,0,'L');



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