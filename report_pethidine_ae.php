<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
$id=$_REQUEST['id'];
$mo_name=$_REQUEST['mo_name'];
$d_name=$_REQUEST['d_name'];
$phar_name=$_REQUEST['phar_name'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from estat where id='$id'");
$data = mysqli_fetch_array($query);

$mo_name=$data['user'];
$phar_name=$data['m_received'];
$patient_pmrn=$data['pmrn'];
$patient_eid=$data['eid'];
$nurse_name=$data['udone'];


$query_pa = mysqli_query($db,"select * from emergency where eid='$patient_eid' and pmrn='$patient_pmrn'");
$data_patient = mysqli_fetch_array($query_pa);


$queryn = mysqli_query($db,"select * from user where uname='$mo_name'");
$data_mo = mysqli_fetch_array($queryn);


$query2 = mysqli_query($db,"select * from user where uname='$phar_name'");
$data_phar = mysqli_fetch_array($query2);


$query4 = mysqli_query($db,"select * from user where uname='$nurse_name'");
$data_nurse = mysqli_fetch_array($query4);


//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){

}

function footer(){
$this->SetY(-15);
$this->SetFont('Arial','B',8);



}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('15');
//$pdf->headerTable();
//$pdf->viewTable($db);


$pdf->Image('logo1.jpg',15,7);
//$this->Image('logo1.jpg',180,7);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'KPJ SPECIALIZED HOSPITAL',0,0,'C');
//$this->Ln(3);
$pdf->SetFont('Arial','B',12);
//$this->Cell(195,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$pdf->ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$pdf->ln(10);


$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('182',6,'Narcotic Drug Requisition',0,1,'C');
//$this->SetFont('Arial','B',);

$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data_patient['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data_patient['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('5',5,$data_patient['gender'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('28',5,$data_patient['age'],1,1,'L');
$pdf->Cell('30',5,'Admission Date:',1,0,'L');
$pdf->Cell('38',5,$data_patient['adate'],1,0,'L');
$pdf->Cell('13',5,'Date:',1,0,'L');
$pdf->Cell('38',5,$data['odate'],1,0,'L');
$pdf->Cell('13',5,'Area:',1,0,'L');
$pdf->Cell('49',5,'A&E',1,1,'L');

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('40',5,'Doctor Name:',1,0,'L');
$pdf->Cell('141', 5,$data_mo['fullname'],1,1,'L');

$pdf->ln(3);

$pdf->Cell('120',5,'Item Name:',1,0,'L');
$pdf->Cell('61',5,'Quantity:',1,1,'L');
$pdf->Cell('120',5,$data['infusion'],1,0,'L');

$pdf->Cell('61',5,'1',1,1,'L');

$pdf->Cell('120',5,'Use',1,0,'L');

$pdf->Cell('61',5,'50mg',1,1,'L');

$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('182',5,'Computer Generated Report, No Signature Required',0,1,'R');

//$this->ln(5);
$pdf->SetFont('Arial','B',10);
//$pdf->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561',0,0,'C');

$pdf->ln(3);

$pdf->Cell('60',5,$data_nurse['fullname'],1,0,'L');
$pdf->Cell('60',5,$data_mo['fullname'],1,0,'L');
$pdf->Cell('60',5,$data_phar['fullname'],1,1,'L');

$pdf->Cell('60',5,'Charge Nurse',1,0,'L');
$pdf->Cell('60',5,'Doctor',1,0,'L');
$pdf->Cell('60',5,'Pharmacist',1,1,'L');


$pdf->ln(5);
$pdf->Cell(0,10,'Note: Ample should return to pharmacy after use                                                                              SFMM/MR-45',0,0,'L');



$pdf->ln(60);


$pdf->Image('logo1.jpg',15,150);
//$this->Image('logo1.jpg',180,7);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'KPJ SPECIALIZED HOSPITAL',0,0,'C');
//$this->Ln(3);
$pdf->SetFont('Arial','B',12);
//$this->Cell(195,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$pdf->ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$pdf->ln(10);


$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('182',6,'Narcotic Drug Requisition',0,1,'C');
//$this->SetFont('Arial','B',);

$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data_patient['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data_patient['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('5',5,$data_patient['gender'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('28',5,$data_patient['age'],1,1,'L');
$pdf->Cell('30',5,'Admission Date:',1,0,'L');
$pdf->Cell('38',5,$data_patient['adate'],1,0,'L');
$pdf->Cell('13',5,'Date:',1,0,'L');
$pdf->Cell('38',5,$data['odate'],1,0,'L');
$pdf->Cell('13',5,'Area:',1,0,'L');
$pdf->Cell('49',5,'A&E',1,1,'L');


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('40',5,'Doctor Name:',1,0,'L');
$pdf->Cell('141', 5,$data_mo['fullname'],1,1,'L');

$pdf->ln(3);

$pdf->Cell('120',5,'Item Name:',1,0,'L');
$pdf->Cell('61',5,'Quantity:',1,1,'L');
$pdf->Cell('120',5,$data['infusion'],1,0,'L');

$pdf->Cell('61',5,'1',1,1,'L');

$pdf->Cell('120',5,'Use',1,0,'L');

$pdf->Cell('61',5,'50mg',1,1,'L');

$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('182',5,'Computer Generated Report, No Signature Required',0,1,'R');

//$this->ln(5);
$pdf->SetFont('Arial','B',10);
//$pdf->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561',0,0,'C');

$pdf->ln(3);

$pdf->Cell('60',5,$data_nurse['fullname'],1,0,'L');
$pdf->Cell('60',5,$data_mo['fullname'],1,0,'L');
$pdf->Cell('60',5,$data_phar['fullname'],1,1,'L');

$pdf->Cell('60',5,'Charge Nurse',1,0,'L');
$pdf->Cell('60',5,'Doctor',1,0,'L');
$pdf->Cell('60',5,'Pharmacist',1,1,'L');


$pdf->ln(5);
$pdf->Cell(0,10,'Note: Ample should return to pharmacy after use                                                                              SFMM/MR-45',0,0,'L');
$pdf->Output();