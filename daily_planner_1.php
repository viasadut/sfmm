<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['dname'];
$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];
require('db1.php');

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from presnew where pmrn='$pmrn' and dname='$dname' and date='$date' and eid='$eid'");
$data = mysqli_fetch_array($query);
$d=$data['date'];
$b = date( 'j-F-Y', strtotime( $d) );

$query43 = "SELECT COUNT(pmrn) FROM alltest where pmrn= '$pmrn' and eid='$eid' and dname='$dname';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count10=$row43['COUNT(pmrn)'];

$query44 = "SELECT COUNT(pmrn) FROM pmedi where pmrn= '$pmrn' and eid='$eid' and dname='$dname';"; 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);
$count11=$row44['COUNT(pmrn)'];






$query2 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and dname='$dname' and adate='$date'");
$data2 = mysqli_fetch_array($query2);

//$dname=$data['dname'];
$query3 = mysqli_query($db,"select * from doctor1 where dname='$dname'");
$data3 = mysqli_fetch_array($query3);



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

}*/
function footer(){
$this->SetY(-2);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
//$this->Cell(0,10,'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801703788561 (SFMMKPJSH/OPD/MR-01)',0,0,'C');


}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();

//$pdf->AddFont('SundayMorning','I','SundayMorning.php');


$pdf->AddPage('P','A4',0);


//$pdf->SetFont('SundayMorning','',8);

//$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('22');
//$pdf->headerTable();
//$pdf->viewTable($db);
//$pdf->SetFont('Arial' , 'b' , 15);



$pdf->ln(2);

$pdf->Image('nursing_form_pic/daily_planner.jpeg',2,10);




$pdf->Output();