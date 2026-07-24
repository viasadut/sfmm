<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
//$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['adoc'];
//$date=$_REQUEST['adate'];
require('db1.php');
//include("auth.php");
$cdate=date('Y-m-d');
$id=$_REQUEST['id'];
$ctopic=$_REQUEST['topic'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from cme where id='$id'");
$data59 = mysqli_fetch_assoc($query4);

$date=$data59['date'];

$speaker=$data59['speaker'];

$cdate1=date('d/m/Y',strtotime($date));



$query21 = "SELECT COUNT(sid) FROM cmea where ctopic='$ctopic'"; 
$result21 = mysqli_query($con, $query21) or die(mysqli_error());
$row21 = mysqli_fetch_array($result21);





//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',45,7);
$this->Image('logo1.jpg',240,7);
$this->SetFont('Arial','B',12);
$this->Cell(280,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',12);
$this->Cell(280,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',12);
$this->Cell(280,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(20);

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
$pdf->AddPage('L','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('15');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'ub' , 16);


$pdf->SetFont('Arial' , 'b' , 12);
$pdf->MultiCell('280',5,'CME Topic:'.' '.$data59["topic"],0,1);
$pdf->MultiCell('280',5,'Key Note Speaker:'.' '.$data59["speaker"],0,1);
$pdf->MultiCell('280',5,'Date & Time:'.' '.$data59["date"].' , '.$data59['time'],0,1);
$pdf->MultiCell('280',5,'Venue:'.' '.$data59["venue"],0,1);
$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('10',5,'SNO',1,0,'L');
$pdf->Cell('90',5,'Name',1,0,'L');
$pdf->Cell('110',5,'Designation & Depatment',1,0,'L');
$pdf->Cell('45',5,'Attendance Time',1,1,'L');
$query1 = mysqli_query($db,"Select * from cmea where ctopic= '$ctopic' and sid!='0' order by `etime` ASC");
$count=1;
while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);

$pdf->Cell('10' , 5,$count,1,0);
$s=$data1['sid'];

$query3 = mysqli_query($db,"Select * from staff1 where sid= '$s'");

$data3 = mysqli_fetch_array($query3);

$query4 = mysqli_query($db,"Select * from staff3 where sid= '$s'");

$data4 = mysqli_fetch_array($query4);


if($data4!='')
{

$pdf->Cell('90' , 5,$data4['sname'],1,0);
$pdf->Cell('110' , 5,$data4['desig'].' ,'.$data4['dept'],1,0);
}

else if($data4=='')
{

$pdf->Cell('90' , 5,$data3['mname'],1,0);
$pdf->Cell('110' , 5,$data3['designation'].' ,'.$data3['sdepartment'],1,0);
}


$pdf->Cell('45' , 5,$data1['etime'],1,1);
$pdf->ln(2);
$count++;
}





//$pdf->ln();
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->ln(10);
$pdf->Cell('100');
$pdf->Cell('55',5,'~~ The End ~~',0,0,'L');


$pdf->Output();