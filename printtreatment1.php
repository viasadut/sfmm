<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
//$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
$id=$_REQUEST['id'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from mtreatment where id='$id'");
$data = mysqli_fetch_array($query);
$data5=$data['rdate'];
$bdate = date( 'd/m/Y', strtotime( $data5) );
//$iby=$data['iby'];

//$query1 = mysqli_query($db,"select * from user where uname='$iby'");
//$data1 = mysqli_fetch_array($query1);
//$full=$data1['fullname'];
//$data1=date('d/m/Y');

//$data2 = date( 'Y-m-d', strtotime( $data1 ) );




//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){
$this->SetY(20);
$this->Image('logo.jpg',25,15);
$this->Image('logo1.jpg',259,15);
$this->SetFont('Arial','B',16);
$this->Cell(273,10,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(5);
$this->SetFont('Arial','B',16);
$this->Cell(273,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',16);
$this->Cell(273,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(15);

}
function footer(){
$this->SetY(-20);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(273,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561 (SFMM/MR -89)',0,0,'C');


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
$pdf->Cell('253',10,'FINDINGS AND TREATMENT CERTIFICATE',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('185',5,'Serial No:',0,0,'R');
$pdf->Cell('22',5,'SFMM-'.$data['year'].'/'.$data['id'],0,0,'L');
$pdf->Cell('28',5,'ISSUE DATE:',0,0,'R');
$pdf->Cell('48',5,$data['idate'],0,0,'L');

$pdf->ln(10);
$pdf->SetFont('Arial' , 'BI' , 16);
$pdf->Cell('253',5,'THIS IS TO CERTIFY THAT THE I HAVE EXAMINED',0,1,'C');
$pdf->ln(4);
$pdf->Cell('253',5,strtoupper($data['m1'].' '.$data['pname']),0,1,'C');
$pdf->ln(3);
$pdf->Cell('253',5,strtoupper($data['nid'].'- '.$data['nid1'].','.' MRN '.'- ' .$data['pmrn']) ,0,0,'C');
$pdf->ln(8);
$pdf->Cell('253',5,strtoupper('AND I AM OF THE OPINION THAT, '),0,1,'C');
$pdf->ln(3);
$pdf->Cell('253',5,strtoupper($data['m2']. ' '.'IS DIAGNOSED AS- '.' '.$data['diagnosis']),0,1,'C');
$pdf->ln(3);
$pdf->Cell('253',5,strtoupper($data['m2'].' ' .'WAS UNDER TREATMENT'.' '.'FOR'. ' '.$data['tdays'].' '.'DAYS'),0,1,'C');
$pdf->ln(3);
$pdf->Cell('253',5,strtoupper('ON / FROM -'.' ' .$data['fdate1'].' '.'TO'. ' '.$data['tdate1']),0,1,'C');

$pdf->ln(3);
$pdf->Cell('253',5,strtoupper($data['m2'].' '. 'HAD GIVEN THE FOLLOWING FINDINGS AND TREATMENT-'),0,1,'C');
$pdf->ln(3);
$pdf->SetFont('Arial' , 'BI' , 16);
$pdf->MultiCell('253',5,strtoupper($data['ffor']),'0','C',false);
$pdf->ln(3);
$pdf->SetFont('Arial' , 'BI' , 16);
$pdf->MultiCell('253',5,strtoupper($data['rdate']),'0','C',false);




//$pdf->Cell('60',5,$data5,0,0,'L');
//$pdf->Cell('15',5,'MRN:',1,0,'L');
//$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
//$pdf->Cell('20',5,'GENDER:',1,0,'L');
//$pdf->Cell('20',5,$data['sex'],1,0,'L');
//$pdf->Cell('10',5,'AGE:',1,0,'L');
//$pdf->Cell('15',5,$data['page'],1,1,'L');




$pdf->ln(15);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('53');
$pdf->Cell('200',5,strtoupper('Name and Signature of certifying Doctor'),0,1,'R');
$pdf->Cell('203');
$pdf->Cell('53',5,strtoupper($data['user']),0,1,'C');



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