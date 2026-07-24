<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['dname'];
$pro=$_REQUEST['pro'];
$eid=$_REQUEST['eid'];
//$id=$_REQUEST['id'];
$date=date('d/m/Y');


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from consent1 where pmrn='$pmrn' and eid='$eid' and pro='$pro' and dname='$dname'");
$data = mysqli_fetch_array($query);



$query1 = mysqli_query($db,"select * from user where fullname='$dname'");
$data1 = mysqli_fetch_array($query1);
$image3=$data1['uname'].'.jpg';



//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){
$this->Image('logo1.jpg',15,7);
//$this->Image('logo1.jpg',180,7);
$this->SetFont('Arial','B',12);
$this->Cell(190,5,'KPJ SPECIALIZED HOSPITAL',0,0,'C');
//$this->Ln(3);
$this->SetFont('Arial','B',12);
//$this->Cell(195,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
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
$this->Cell(0,10,'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801703788561 (SFMMKPJSH/NSG/MR-22)',0,0,'C');


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
$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 16);
$pdf->Cell('183',6,'CONSENT FOR OPERATION / TREATMENT / PROCEDURE',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('178',5,'Episode:',0,0,'R');
$pdf->Cell('5',5,$data['eid'],0,0,'L');

$pdf->ln(10);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('183',5,'I ,'.' '.$data['pname1'].', '.' National Identity Card Number / Passport Number: '.' '.$data['passno1'] ,0,1);
$pdf->ln(2);
$pdf->MultiCell('183',5,'Of (Address): '.' '.$data['padd'] ,0,1);
$pdf->ln(2);
$pdf->MultiCell('183',5,'Hereby consent to the submission of'.' '.$data['pname'] ,0,1);
$pdf->ln(2);
$pdf->MultiCell('183',5,'to undergo the Operation / Treatment / Procedure of :'.' '.$data['pro'] ,0,1);
$pdf->ln(2);
$pdf->MultiCell('183',5,'the nature and effect of which have been explained to me by :'.' '.$data['dname'] ,0,1);
$pdf->ln(4);
$pdf->MultiCell('183',5,'I also consent to such further of alteranative operative measures or treatment as may be found necessary during the course of the operation / treatment / procedure and to the administration of general, local or other anaesthesia or any of these purposes. I further consent to any disposition deemed proper by the staff of the Sheikh Fazilatunnessa Mujib Memorial KPJ Specialized Hospital of the parts and tissues removed in the process of performing such procedures.',0,1);
$pdf->ln(15);
$pdf->Cell('130',5,'Date:'.' '.$data['tdate1'],0,0,'L');
$pdf->Cell('100',5,'Signature Or Thumbprint:',0,1,'L');
$pdf->ln(15);
$pdf->SetFont('Arial' , 'b' , 9);

$pdf->Cell('70');
$pdf->Cell('30',5,'IN THE PRESENCE OF:',0,1,'L');
//$pdf->Cell('28',5,$data['pmrn'],1,1,'L');
$pdf->ln(15);
$pdf->Cell('130',5,'Name:'.' '.$data['wname'],0,0,'L');
$pdf->Cell('100',5,'Signature:',0,1,'L');
$pdf->Cell('130',5,'NID:'.' '.$data['spass'],0,1,'L');
$pdf->Cell('130',5,'Designation:'.' '.$data['sdesig'],0,1,'L');
$pdf->ln(10);
//$image3 = "118.jpg";
$pdf->Image($image3,140,207);
$pdf->MultiCell('183',5,'I confirm that I have explained to the patient the nature and effect of the above mention operation / treatment / procedure.',0,1);

$pdf->ln(15);
$pdf->Cell('130',5,'Date:'.' '.$date,0,0,'L');

$pdf->Cell('100',5,'Signature Or Thumbprint:',0,1,'L');

$pdf->ln(15);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('183',5,'CONSENT FOR OPERATION / TREATMENT / PROCEDURE: '.' '.$data['pro'],1,1);

$pdf->MultiCell('183',5,'NAME: '.' '.$data['pname'],1,1);
$pdf->MultiCell('183',5,'MRN: '.' '.$data['pmrn'],1,1);
$pdf->MultiCell('183',5,'AGE: '.' '.$data['page'],1,1);
$pdf->MultiCell('183',5,'ROOM & BED: '.' '.$data['ward'].' '.$data['bed'],1,1);
$pdf->MultiCell('183',5,'SEX: '.' '.$data['psex'],1,1);


$pdf->Output();