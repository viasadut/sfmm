<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['dname'];
$pro=$_REQUEST['pro'];
$id=$_REQUEST['id'];
//$anes=$_REQUEST['anes'];
//$id=$_REQUEST['id'];
$date=date('d/m/Y');


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from otconsent3 where pmrn='$pmrn' and eid='$id' and pro='$pro' and dname='$dname'");
$data = mysqli_fetch_array($query);

$query1 = mysqli_query($db,"select * from ot where pmrn='$pmrn' and id='$id'");
$data1 = mysqli_fetch_array($query1);

//$query1 = mysqli_query($db,"select * from preadm where id='$id'");
//$data1 = mysqli_fetch_array($query1);




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
$this->SetY(-20);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801703788561 (SFMMKPJSH/NSG/MR-23)',0,0,'C');


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
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 16);
$pdf->Cell('183',6,'CONSENT FOR HIGH RISK CASES',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('148',5,'S/No:',0,0,'R');
$pdf->Cell('10',5,$data['eid'],0,0,'L');
$pdf->Cell('5',5,$data['tdate1'],0,0,'L');




$pdf->ln(5);

$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('15',5,$data['page'],1,1,'L');

$pdf->Cell('25',5,'Ward:',1,0,'L');
$pdf->Cell('83',5,$data1['room'],1,0,'L');
$pdf->Cell('15',5,'Bed:',1,0,'L');
$pdf->Cell('60',5,$data1['room1'],1,1,'L');

$pdf->ln(5);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('183',5,'I ,'.' '.$data['dname'].' , '.'hereby' ,0,1);
$pdf->ln(2);
$pdf->MultiCell('183',5,'Doctor Performing the Procedure: '.' '.$data['pro'] ,0,1);


$pdf->MultiCell('183',5,'I/We Have been explined bout the disease / condition of the patient, high risk of Surgery / Anaesthesia / Procedure, risk nd benefits of the Surgery / Anesthesia / Procedure, complications, the possible lternatives, likelihood of success, consequence of non tretment.
I/We have been explined by the doctors that the causes of High Risk are due to following -',0,1);
$pdf->ln(2);

$pdf->MultiCell('183',5,'I/We also stte that I/We or my/our familly shall not hold SHEIKH FAZILATUNNASSA MUJIB MEMORIAL KPJ SPECIALIZED HOSPITAL & NURSING COLLEGE or its doctors for any consequences whatsoever. It has also been explined to me/us that PCAKAGE TRIFF FOR THE HIGH RISK CASES IS SUBSTNTIALLY HIGHER THAN NON-RISK CASES.',0,1);
$pdf->ln(2);

$pdf->MultiCell('183',5,'Name of relative uthorizing the Surgeon / Anaesthetist to caryy out the Operation / Anaesthetsia / Procedure',0,1);
$pdf->ln(2);

$pdf->Cell('5',15,'',1,0,'C');
$pdf->Cell('40',15,'',1,0,'C');
$pdf->Cell('25',15,'Signature',1,0,'C');
$pdf->Cell('75',15,'Name(Relation with Patient(if Applicable)',1,0,'C');
$pdf->Cell('20',15,'Date',1,0,'C');
$pdf->Cell('20',15,'Time',1,1,'C');

$pdf->Cell('5',15,'1',1,0,'L');
$pdf->Cell('40',15,'Patient / Legal Gurdian',1,0,'C');
$pdf->Cell('25',15,'',1,0,'L');
$pdf->Cell('75',15,'',1,0,'L');
$pdf->Cell('20',15,'',1,0,'L');
$pdf->Cell('20',15,'',1,1,'L');

$pdf->Cell('5',15,'2',1,0,'L');
$pdf->Cell('40',15,'Witness 1',1,0,'C');
$pdf->Cell('25',15,'',1,0,'L');
$pdf->Cell('75',15,'',1,0,'L');
$pdf->Cell('20',15,'',1,0,'L');
$pdf->Cell('20',15,'',1,1,'L');


$pdf->Cell('5',15,'3',1,0,'L');
$pdf->Cell('40',15,'Witness 2',1,0,'C');
$pdf->Cell('25',15,'',1,0,'L');
$pdf->Cell('75',15,'',1,0,'L');
$pdf->Cell('20',15,'',1,0,'L');
$pdf->Cell('20',15,'',1,1,'L');


$pdf->Cell('5',15,'4',1,0,'L');
$pdf->Cell('40',15,'Anaesthetist',1,0,'C');
$pdf->Cell('25',15,'',1,0,'L');
$pdf->Cell('75',15,'',1,0,'L');
$pdf->Cell('20',15,'',1,0,'L');
$pdf->Cell('20',15,'',1,1,'L');


$pdf->Cell('5',15,'5',1,0,'L');
$pdf->Cell('40',15,'Doctor',1,0,'C');
$pdf->Cell('25',15,'',1,0,'L');
$pdf->Cell('75',15,'',1,0,'L');
$pdf->Cell('20',15,'',1,0,'L');
$pdf->Cell('20',15,'',1,1,'L');

$pdf->ln(20);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->MultiCell('183',5,'*** PLEASE ENTER HIGH RISK STATUS ON THE ACTIVITY CARD ***',0,1);
$pdf->ln(2);


$pdf->Output();