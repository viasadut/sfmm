<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
require('db1.php');
$id=$_REQUEST['id'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from covidopd where id='$id'");
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
$this->SetY(-30);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801703788561 (SFMMKPJSH/COVID-19/MR-3)',0,0,'C');


}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('16');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'b' , 20);

$pdf->ln(10);
$pdf->Cell('183',6,'RT-PCR For COVID-19 Test Report And Advice',0,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('23',5,'_______________________________________________________________',0,0,'L');


$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('8',5,'ID:',0,0,'L');

$pdf->Cell('73',5,$data['sid'],0,1,'L');

$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('11',5,'Name:',0,0,'L');
$pdf->Cell('70',5,$data['name'],0,0,'L');
$pdf->Cell('8',5,'Age:',0,0,'L');
$pdf->Cell('18',5,$data['page'],0,0,'L');
$pdf->Cell('8',5,'Sex:',0,0,'L');
$pdf->Cell('17',5,$data['psex'],0,0,'L');
$pdf->Cell('5',5,'',0,0,'L');
$pdf->Cell('18',5,'Phone No:',0,0,'L');
$pdf->Cell('25',5,$data['phone'],0,1,'L');
$pdf->ln(1);
$pdf->Cell('15',5,'Address:',0,0,'L');
$pdf->Cell('122',5,$data['padd'],0,0,'L');
$pdf->Cell('13',5,'District:',0,0,'L');
$pdf->Cell('18',5,$data['district'],0,1,'L');

$pdf->ln(1);
$pdf->Cell('18',5,'Specimen:',0,0,'L');
$pdf->Cell('45',5,$data['specimen'],0,0,'L');
$pdf->Cell('41',5,'Specimen Collection Site:',0,0,'L');
$pdf->Cell('33',5,'SFMMKPJSH',0,0,'L');
$pdf->Cell('25',5,'Collection Date:',0,0,'L');
$pdf->Cell('18',5,$data['ssent1'],0,1,'L');

$pdf->Cell('25',5,'Email Address:',0,0,'L');
$pdf->Cell('18',5,$data['email'],0,1,'L');



$pdf->ln(5);
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('23',5,'_______________________________________________________________',0,0,'L');
$pdf->ln(12);

$pdf->SetFont('Arial' , 'b' , 20);
$pdf->Cell('182',5,'Result',0,1,'C');
$pdf->ln(3);
$pdf->SetFont('Arial' , 'bu',  10);
$pdf->Cell('182',5,'CONFIDENTIAL',0,1,'C');

$pdf->ln(6);


$pdf->SetFont('Arial' , 'b' , 11);

if($data['rdate']=='1970-01-01')
{
$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('45',5,'Result Date:',0,1,'L');
$pdf->ln(3);

}
else 
{
$pdf->Cell('45',5,'Result Date:',0,0,'L');
$pdf->SetFont('Arial' , '' , 11);
$pdf->MultiCell('170' , 5,$data['rdate1'],0,1);
$pdf->ln(3);
	
}


$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('45',5,'Test Center Name:',0,0,'L');
$pdf->SetFont('Arial' , '' , 11);
$pdf->MultiCell('170' , 5,$data['sentto'],0,1);
$pdf->ln(3);


$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('45',5,'Result:',0,0,'L');
if($data['tresult']=='P')
{
	$pdf->SetFont('Arial' , 'b' , 13);
$pdf->MultiCell('170' , 5,'Positive for COVID-19',0,1);
}
else if($data['tresult']=='N')
{
	$pdf->SetFont('Arial' , 'b' , 13);
	$pdf->MultiCell('170' , 5,'Negative for COVID-19',0,1);
	
}

else 
{
	$pdf->SetFont('Arial' , '' , 11);
	$pdf->MultiCell('170' , 5,'',0,1);
	
}

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('45',5,'Comments:',0,0,'L');
$pdf->SetFont('Arial' , '' , 11);
$pdf->MultiCell('170' , 5,'Please Correlate Clinically',0,1);





if($data['advice']==''){
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('45',5,'Advice:',0,1,'L');
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 11);
$pdf->MultiCell('170' , 5,'1) Hand Hygiene,Each time Atleast For 20 Seconds
2) Maintain Social Distance 1 Meter
3) Maintain Cough Hygiene.
4) Use Mask All The Time.',0,1);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->ln(20);	
$pdf->Cell('45',5,'* Computer Generated Report, Signature Not Required *',0,1,'L');	

$pdf->ln(10);	
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('45',5,'*** To verify the test result kindly contact our HOTLINE number +8801810008080 from 10:00AM to 04:00PM.',0,1,'L');
$pdf->Cell('45',5,'      Note: All the results are reserved in our secured local server. ***',0,1,'L');

}
else {
	
$pdf->ln(3);


$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('45',5,'Advice:',0,1,'L');
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 11);
$pdf->MultiCell('170' , 5,$data['advice'],0,1);
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('45',5,'Other Advice:',0,1,'L');
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 11);
$pdf->MultiCell('170' , 5,'1) Hand Hygiene,Each time Atleast For 20 Seconds
2) Maintain Social Distance 1 Meter
3) Maintain Cough Hygiene.
4) Use Mask All The Time.',0,1);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->ln(20);	
$pdf->Cell('45',5,'* Computer Generated Report, Signature Not  Required *',0,1,'L');	


$pdf->ln(10);	
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('45',5,'*** To verify the test result kindly contact our HOTLINE number +8801810008080 from 10:00AM to 04:00PM.',0,1,'L');
$pdf->Cell('45',5,'      Note: All the results are reserved in our secured local server. ***',0,1,'L');

}
$pdf->Output();