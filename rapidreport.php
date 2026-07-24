<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('WriteHTML.php');
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from alltest where id='$id'");
$data = mysqli_fetch_array($query);
$dname=$data['dname'];

//$dname=$data['dname'];
//$query2 = mysqli_query($db,"select * from doctor1 where dname='$dname'");
//$data2 = mysqli_fetch_array($query2);


$query3 = mysqli_query($db,"select * from doctor1 where dname='$dname'");
$data3 = mysqli_fetch_array($query3);


$query4 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn'and eid='$eid'");
$data4 = mysqli_fetch_array($query4);


//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
/*class myPDF extends FPDF{
function header(){

$this->ln(35);

}

function footer(){
$this->SetY(-15);
$this->SetFont('Arial','B',8);

$this->ln(5);
$this->SetFont('Arial','B',10);
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561',0,0,'C');


}*/

$pdf = new PDF_HTML();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('22');
//$pdf->headerTable();
//$pdf->viewTable($db);






$pdf->Image('logo.jpg',15,7);
$pdf->Image('logo1.jpg',180,7);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(170,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$pdf->Ln(3);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(165,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$pdf->ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(165,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$pdf->ln(15);


//$this->Ln();
//}


//$pdf->headerTable();
//$pdf->viewTable($db);


$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('182',6,$data['medi'].' REPORT',1,1,'C');
//$this->SetFont('Arial','B',);

$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('42',5,'Consultant Name:',0,0,'L');
$pdf->Cell('95',5,$data['dname'],0,1,'L');
$pdf->SetFont('Arial','', 11);
$pdf->Cell('42',5);
$pdf->Cell('95',5,$data3['degree'],0,1,'L');
$pdf->Cell('42',3);
$pdf->Cell('80',3,$data3['Discipline'],0,1,'L');
$pdf->SetFont('Arial' , 'b' , 9);

$pdf->ln(2);
//$pdf->Cell('160',5,$data2['Discipline'],0,0,'L');

$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['pname'],1,0,'L');
$pdf->Cell('12',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('18',5,'GENDER:',1,0,'L');
$pdf->Cell('8',5,$data4['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('30',5,$data4['page'],1,1,'L');


$pdf->Cell('15',5,'LAB ID:',1,0,'L');
$pdf->Cell('35',5,$data['barcode'],1,0,'L');
$pdf->Cell('29',5,'Received time:',1,0,'L');
$pdf->Cell('36',5,$data['retime'],1,0,'L');
$pdf->Cell('30',5,'Result Time:',1,0,'L');
$pdf->Cell('36',5,$data['resulttime'],1,0,'L');

$pdf->ln(3);

//$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('40',5,'Referral From:',1,0,'L');
//$pdf->Cell('141', 5,$data['dreffer'],1,1,'L');

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);


//$pdf->MultiCell('182' , 5,$data['report'],0,1);
//$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->MultiCell('95' , 10,$data['result'],1,"L",false);
//$pdf->MultiCell('95' , 10,$data['unit'],1,"L",false);
//$pdf->MultiCell('62' , 5,$data['reference'],0,"L",false);

$pdf->ln(3);

$pdf->SetFont('Arial' , 'bu' , 10);

$pdf->Cell('100',5,'Result',0,1,'L');
$pdf->ln(5);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->WriteHTML($data['result']);

$pdf->ln(10);
$pdf->Cell('182',5,'Method: ICT (Immunochromatography)',0,1,'L');

$pdf->ln(120);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Computer Generated Report, No Signature Required',0,1,'R');

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