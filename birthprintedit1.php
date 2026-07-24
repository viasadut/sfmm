<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from birth where pmrn='$pmrn' and eid='$eid' and status!='Waiting For Approval'");
$data = mysqli_fetch_array($query);
//$data1=date('d/m/Y');

$iby=$data['iby'];

$query1 = mysqli_query($db,"select * from user where uname='$iby'");
$data1 = mysqli_fetch_array($query1);
$full=$data1['fullname'];
//$data1=date('d/m/Y');

//$data2 = date( 'Y-m-d', strtotime( $data1 ) );




//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){
$this->SetY(20);
$this->Image('logo1.jpg',25,15);
//$this->Image('logo1.jpg',259,15);
$this->SetFont('Arial','B',16);
//$this->Cell(273,10,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
//$this->Ln(5);
$this->SetFont('Arial','B',16);
$this->Cell(273,10,'KPJ SPECIALIZED HOSPITAL',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',16);
$this->Cell(273,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(15);

}
function footer(){
$this->SetY(-15);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(273,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561 (SFMMKPJSH/NSG/MR-16)',0,0,'C');


}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('25');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'b' , 20);
$pdf->Cell('253',10,'BIRTH CERTIFICATE',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('185',5,'Serial No:',0,0,'R');
$pdf->Cell('22',5,'SFMM-'.$data['year'].'/'.$data['id'],0,0,'L');
$pdf->Cell('28',5,'ISSUE DATE:',0,0,'R');
$pdf->Cell('48',5,$data['idate'],0,0,'L');

$pdf->ln(14);
$pdf->SetFont('Arial' , 'BI' , 16);
$pdf->Cell('253',5,'THIS IS TO CERTIFY THAT THE BABY',0,1,'C');
$pdf->ln(7);
$pdf->Cell('253',5,strtoupper($data['bname'].' (MRN-'.''.$data['pmrn'].')'),0,1,'C');

$pdf->ln(7);

$pdf->Cell('253',5,'OF  MRS. '.'  '.strtoupper($data['mname']).' (MOTHER NAME)',0,1,'C');
$pdf->ln(7);
$pdf->Cell('253',5,'AND MR. '.'  '.strtoupper($data['fname']).' (FATHER NAME)',0,1,'C');

$pdf->ln(7);
$pdf->Cell('253',12,'SEX: '.'  '.strtoupper($data['sex']).' , BIRTH WEIGHT: ' .$data['weight'].' KG',0,1,'C');
$pdf->Cell('253',12,'WAS BORN IN THIS HOSPITAL AT  '.$data['btime'].' ON '.$data['bdate'],0,1,'C');
$pdf->Cell('253',12,'UNDER OBSTETRICIAN- '.strtoupper($data['dname']),0,1,'C');
$pdf->Cell('253',12,'AND PEDIATRICIAN- '.strtoupper($data['dname1']),0,1,'C');


//$pdf->Cell('60',5,$data['bname'],0,0,'L');
//$pdf->Cell('15',5,'MRN:',1,0,'L');
//$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
//$pdf->Cell('20',5,'GENDER:',1,0,'L');
//$pdf->Cell('20',5,$data['sex'],1,0,'L');
//$pdf->Cell('10',5,'AGE:',1,0,'L');
//$pdf->Cell('15',5,$data['page'],1,1,'L');




$pdf->ln(7);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('203');
$pdf->Cell('53',5,'Name and Signature of certifying Doctor',0,1,'C');
$pdf->Cell('203');
$pdf->Cell('53',5,$data['dname'],0,1,'C');




//$pdf->SetFont('Arial' , 'b' , 15);
//$pdf->Cell('90',5,'OUT PATIENT RECORD',1,0,'L');


//$pdf->ln(10);
//$pdf->MultiCell('160' , 5,$data['xl'],1,1);
//$pdf->Cell('30' , 5,'Doasge',1,1);
//$pdf->MultiCell('160' , 5,'jashfjh sjfh jsdhfjsdhjfh jsdhjf hjsdhfj dsjhf djsh jfdshjf dsjhf jdsh fdhsf hjsdhf sdhf jdhsf hdsjfhjsdhf sdhf jdshjfhjskdhf jsdh fjhsdjkf hjdsfjd s',1,1);
//$dd=$data['refer']

//$dd = rtrim($dd, ',');
//$string = rtrim($string, ',');


if($data['eid']>1){
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'**Corrected Copy**',0,1,'L');
}

else if($data['eid']==1){
$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('182',5,'**Corrected Copy**',0,1,'L');
}


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