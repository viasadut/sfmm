<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
//$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['adoc'];
//$date=$_REQUEST['adate'];
$pmrn=$_REQUEST['pmrn'];
$date2=date('Y-m-d');


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from allvacine where pmrn='$pmrn'");
$data = mysqli_fetch_array($query);





//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',15,7);
$this->Image('logo1.jpg',180,7);
$this->SetFont('Arial','B',12);
$this->Cell(190,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',12);
$this->Cell(195,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',12);
$this->Cell(190,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(10);

}
function footer(){
$this->SetY(-8);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Page'.$this->PageNo().' /(SFMMKPJ)',0,0,'C');

}




//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('15');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'ub' , 16);
$pdf->Cell('180',6,'Vanccination Detials',0,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('45',5,'Patient MRN              :',0,0,'L');
$pdf->Cell('125',5,$data['pmrn'],0,0,'L');

$pdf->ln(6);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('45',5,'Name Of The Patient:',0,0,'L');
$pdf->Cell('125',5,$data['pname'],0,1,'L');
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('5');
$pdf->ln(6);


$pdf->SetFont('Arial' , 'ub' , 12);
$pdf->Cell('180',5,'Name Of The Vactination',0,1,'L');
$pdf->ln(3);
$query1 = mysqli_query($db,"select * from allvacine where pmrn='$pmrn'");
$count=1;
while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , 'b' , 12);

$pdf->MultiCell('182' , 5,$count.') '.$data1['medi'].' (Vacination Date: '.$data1['date2'].')',0,1);
$pdf->SetFont('Arial' , '' , 12);

if($data1['next']=='1970-01-01')
{

}
else if ($data1['next']=='')
	
	{
		
	}


	else 
{
$pdf->MultiCell('182' , 5,'    '.'Next Vacination Date:' .$data1['next'],0,1);
}



$pdf->MultiCell('182' , 5,'    '.'Remarks:'. $data1['remarks'],0,1);
$pdf->ln(2);
$count++;
}



$pdf->ln(6);

//$pdf->ln();
$pdf->SetFont('Arial' , '' , 9);
$pdf->ln(10);
$pdf->Cell('100');
$pdf->Cell('55',5,'Computer Generated Report, No need signature',0,0,'L');


$pdf->Output();