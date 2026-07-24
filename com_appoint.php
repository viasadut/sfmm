<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$cname=$_REQUEST['cname'];
$mname=$_REQUEST['mname'];
$date=$_REQUEST['date'];
$id=$_REQUEST['id'];
require('db1.php');

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from ccomm where id='$id'");
$data = mysqli_fetch_array($query);
$cname=$data['cname'];
$mname=$data['mname'];
$mrole=$data['mrole'];
$sdate=$data['sdate'];
$edate=$data['edate'];
$b = date( 'j-F-Y', strtotime( $d) );

//$dname=$data['dname'];
$query3 = mysqli_query($db,"select * from doctor1 where dname='$mname'");
$data3 = mysqli_fetch_array($query3);


$query4 = mysqli_query($db,"select * from staff3 where sname='$mname' and status='Active'");
$data4 = mysqli_fetch_array($query4);
//echo $dd=$data4['desig'];


//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
/*function header(){
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
$this->SetY(-20);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801703788561 (SFMMKPJSH/OPD/MR-01)',0,0,'C');


}*/


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();

//$pdf->AddFont('SundayMorning','I','SundayMorning.php');


$pdf->AddPage('P','A4',0);

$pdf->ln(20);
//$pdf->SetFont('SundayMorning','',8);

//$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('22');
//$pdf->headerTable();
//$pdf->viewTable($db);
//$pdf->SetFont('Arial' , 'b' , 15);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'REF:',0,1,'L');
$pdf->Cell('80',5,'Date:',0,1,'L');

$pdf->ln(10);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('95',5,$data['mname'],0,1,'L');
$pdf->SetFont('Arial','', 11);

if($data3['degree']!='')
{

$pdf->MultiCell('160',5,$data3['degree'],0,1);

$pdf->Cell('80',3,$data3['Discipline'],0,1,'L');
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->ln(2);}


if($data3['degree']=='')
{

$pdf->MultiCell('160',5,$data4['desig'],0,1);

$pdf->Cell('80',3,$data4['dept'],0,1,'L');
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->ln(2);}



$pdf->ln(6);



$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Dear'.' '.$mname.',',0,1,'L');

$pdf->ln(8);
$pdf->MultiCell('182' , 5,'Appointment as'.' '.$data['mrole'].' '.'Of'.' '.$cname.' '.'FOR THE PERIOD OF'.' '.$data['sdate'].' To '.$data['edate'],0,1);



$pdf->SetFont('Arial' , 'b' , 14);

$pdf->Cell('182',5,'_________________________________________________________________',0,1,'L');
$pdf->ln(8);




$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'We are pleased to inform that the Management of Sheikh Fazilatunnessa Mujib Memorial KPJ Specialized Hospital & Nursing College (SFMMKPJSH & NC) has appointed you as the'.' '.$mrole.' OF'.' '.$cname.' for a period of two (2) years',0,1);




$pdf->ln(5);
$pdf->MultiCell('182' , 5,'The above committee (s) will meet every quarterly or as when necessary. We are confident that your support and participation as committee member will ensure that SFMMKPJSH & NC be able to discuss, deliberate and propose clinical policies to further enhance best clinical practices and clinical protocols. 

Kindly confirm your acceptance of the above by signing and returning the duplicate copy attached within one week from the date of this letter.
',0,1);



$pdf->ln(5);
$pdf->MultiCell('182' , 5,'Thank you.
Care for life

Yours sincerely

',0,1);
$pdf->SetFont('Arial' , 'b' , 10);

$pdf->MultiCell('182' , 5,'Sheikh Fazilatunnessa Mujib Memorial KPJ Specialized Hospital & Nursing College
',0,1);

$pdf->ln(15);
$pdf->MultiCell('182' , 5,'MOHD TAUFIK BIN ISMAIL 
CHIEF EXECUTIVE OFFICER 

',0,1);


$pdf->SetFont('Arial' , '' , 10);
$pdf->ln(5);
$pdf->MultiCell('182' , 8,'I, ---------------------------------------------------------------------------- Office ID No: ---------------------------------------------------
Hereby accept the appointment as mentioned above.


Signature: -----------------------------------------------------------------------     Date: --------------------------------------------------

',0,1);


$pdf->Output();