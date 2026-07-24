<?php
require('force_justify.php');

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
//require('fpdf/fpdf.php');

class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',30,9);
$this->Image('logo1.jpg',150,9);
$this->SetFont('Arial','B',10);
$this->Cell(180,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',10);
$this->Cell(180,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',10);
$this->Cell(180,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
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


}









function headerTable(){

$this->SetFont('Times', 'b', 10);

$this->Cell(10,5,'SNO',1,0,'C');
$this->Cell(15,5,'SID',1,0,'C');
$this->Cell(15,5,'LAB ID',1,0,'C');
$this->Cell(90,5,'Name',1,0,'C');
$this->Cell(15,5,'Age',1,0,'C');
$this->Cell(15,5,'Sex',1,0,'C');

$this->Cell(30,5,'Result',1,0,'C');
$this->Ln();
}
function viewTable($db){

$this->SetFont('Times', '',10);

$count=1;
$start=$_REQUEST['date'];


$stmt = $db->query("Select * from covidopd where status= 'collected' and sentto='SFMMKPJSH' and ssent ='$start' and lstatus='Received'order by `lid` asc;");
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
	$this->SetFont('Times', '',10);
	$this->Cell(10,($line * $cellHeight),$count,1,0);
$this->Cell(15,($line * $cellHeight),$data->sid,1,0);
$this->Cell(15,($line * $cellHeight),$data->lid,1,0);
$this->Cell(90,($line * $cellHeight),$data->name,1,0);
$this->Cell(15,($line * $cellHeight),$data->page,1,0);
$this->Cell(15,($line * $cellHeight),$data->psex,1,0);


$this->SetFont('Times', 'b',7);
$this->Cell(30,($line * $cellHeight),'',1,0);



$this->Ln();
$count++;
	

}
}
}
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->tt();
$pdf->rr();
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
?>