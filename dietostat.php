<?php
require('force_justify.php');

$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
//require('fpdf/fpdf.php');


/*session_start();*/
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '618'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);


$full = $row39['fullname'];

$rr=date('Y-m-d');
$rr1=date('Y-m-d', strtotime('-30 days') );



class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',25,9);
$this->Image('logo1.jpg',165,9);
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
function tt(){
$this->SetFont('Arial' , 'b' , 15);
$this->Cell('183',6,'Monthly OPD Report ',0,1,'C');
$this->Ln();
}



function rr(){

$this->SetFont('Times', 'B', 12);
$bt=$_REQUEST['dname'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];
$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$stmt = $db->query("Select * from pappnew where dname='$bt' and adate1 BETWEEN '$start' and '$end' and status='SEEN'");
$data = $stmt->Fetch(PDO::FETCH_OBJ);
$stmt1 = $db->query("SELECT COUNT(dname) as tt FROM pappnew where dname= '$bt' and adate1 BETWEEN '$start' and '$end' and status='SEEN'");
$data1 = $stmt1->Fetch(PDO::FETCH_OBJ);

{

$this->Cell(193,10,$data->dname.' has '.'Seen '.$data1->tt.' Patients'. ' From '.$_REQUEST['date'].' TO '.$_REQUEST['date1'],0,0,'C');


}


$this->Ln();


}

function headerTable(){

$this->SetFont('Times', 'B', 12);

$this->Cell(10,10,'SNO',1,0,'C');
$this->Cell(45,10,'Patient Name',1,0,'C');
$this->Cell(15,10,'MRN',1,0,'C');
$this->Cell(30,10,'Phone',1,0,'C');
$this->Cell(25,10,'Date',1,0,'C');
$this->Cell(25,10,'Seen Time',1,0,'C');
$this->Cell(48,10,'Refer By',1,0,'C');

$this->Ln();
}
function viewTable($db){

$this->SetFont('Times', '',9);


$bt=$_REQUEST['dname'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];
$count=1;
$stmt = $db->query("Select * from pappnew where dname='$bt' and adate1 BETWEEN '$start' and '$end' and status='SEEN'");
while($data = $stmt->Fetch(PDO::FETCH_OBJ)){

$this->Cell(10,10,$count,1,0,'L');
$this->Cell(45,10,$data->pname,1,0,'L');
$this->Cell(15,10,$data->pmrn,1,0,'L');
$this->Cell(30,10,$data->pphone,1,0,'L');
$this->Cell(25,10,$data->adate,1,0,'L');
$this->Cell(25,10,$data->stime,1,0,'L');
 
	  
	  
		$pp=$data->pmrn;
		//$ee=$data->eid;
		
$stmtd = $db->query("select * from opd_referral where pmrn='$pp' and ref_name='$bt' and rdate between '$start' and '$end'");
$datad = $stmtd->Fetch(PDO::FETCH_OBJ);

//$dd=$datad->ref_by;

	 

$this->Cell(48,10,$datad->ref_by,1,0,'L');
$count++;

$this->Ln();


}
$this->Ln();
$count1=1;
$this->SetFont('Arial' , 'b' , 15);
$this->Cell('183',6,'Monthly IPD Report ',0,1,'C');
$this->Ln();
$this->SetFont('Arial' , '' , 9);

$stmt1 = $db->query("Select * from icnote where user='$bt' and daten BETWEEN '$start' and '$end'");
while($data1 = $stmt1->Fetch(PDO::FETCH_OBJ)){

$this->Cell(10,10,$count1,1,0,'L');
$this->Cell(45,10,$data1->pname,1,0,'L');
$this->Cell(15,10,$data1->pmrn,1,0,'L');
$this->Cell(30,10,$data1->odate,1,0,'L');
$this->Cell(25,10,$data1->pphone,1,0,'L');
$this->Cell(25,10,$data1->pnote,1,0,'L');
 
	  
	  
		$pp1=$data1->pmrn;
		$ee1=$data1->eid;
		
$stmtd1 = $db->query("select * from inpatient where pmrn='$pp1' and eid='$ee1'");
$datad1 = $stmtd1->Fetch(PDO::FETCH_OBJ);

//$dd=$datad->ref_by;

	 

$this->Cell(48,10,$datad1->adoc,1,0,'L');
$count1++;

$this->Ln();


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