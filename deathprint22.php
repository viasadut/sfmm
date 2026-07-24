<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
//$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from death where pmrn='$pmrn'");
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
$this->SetY(-10);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561 (SFMMKPJSH/NSG/MR-30)',0,0,'C');


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
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('183',6,'BROUGHT IN DEATH CERTIFICATE',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('113',5,'Serial No:',0,0,'R');
$pdf->Cell('22',5,'SFMM-'.$data['id'],0,0,'L');
$pdf->Cell('15',5,'DATE:',0,0,'R');
$pdf->Cell('48',5,$data['rdate1'],0,0,'L');

$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['name'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('15',5,$data['page'],1,1,'L');

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Father / Husband Name:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('132' , 5,$data['fname'],0,1);

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Permanent Address:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('132' , 5,$data['ppadd'],0,1);

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Present Address:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('132' , 5,$data['padd'],0,1);

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Name Of Receving Doctor:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('132' , 5,$data['rdoc'],0,1);

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Diagnosis:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('132' , 5,$data['diag'],0,1);

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Date and Time of Receiving:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('132' , 5,$data['rdate1'].' ,'.$data['rtime'],0,1);

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Who brought the patient?:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('132' , 5,$data['bp'],0,1);


$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Name:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('132' , 5,$data['bname'],0,1);

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Address:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('132' , 5,$data['badd'],0,1);

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Relationship:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('132' , 5,$data['brel'],0,1);

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Cause of Death:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('132' , 5,$data['cdeath'],0,1);

$pdf->ln(3);



$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'**Duplicate Copy**',0,0,'L');
$pdf->Cell('152',5,'Name and Signature of certifying Doctor:',0,1,'R');





//$pdf->SetFont('Arial' , 'b' , 15);
//$pdf->Cell('90',5,'OUT PATIENT RECORD',1,0,'L');


//$pdf->ln(10);
//$pdf->MultiCell('160' , 5,$data['xl'],1,1);
//$pdf->Cell('30' , 5,'Doasge',1,1);
//$pdf->MultiCell('160' , 5,'jashfjh sjfh jsdhfjsdhjfh jsdhjf hjsdhfj dsjhf djsh jfdshjf dsjhf jdsh fdhsf hjsdhf sdhf jdhsf hdsjfhjsdhf sdhf jdshjfhjskdhf jsdh fjhsdjkf hjdsfjd s',1,1);
//$dd=$data['refer']

//$dd = rtrim($dd, ',');
//$string = rtrim($string, ',');

$pdf->Output();