<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');


$pm=$_REQUEST['pmrn'];
$dname=$_REQUEST['dname'];
$bkdate=$_REQUEST['bkdate'];
//$adate=$_REQUEST['adate'];
//$id=['id'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from ot where pmrn='$pm' and dname='$dname' and bookingdt='$bkdate'");
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
$this->SetY(-15);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Page'.$this->PageNo().' /(SFMMKPJ)',0,0,'C');

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
$pdf->Cell('183',6,'OT BOOKING FORM',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('50',5,'Consultant Name:',0,0,'L');
$pdf->Cell('90',5,$data['dname'],0,0,'L');
$pdf->SetFont('Arial' , 'b' , 9);

$pdf->ln(8);


$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('14',5,$data['page'],1,1,'L');

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Admission date:',1,0,'L');
$pdf->Cell('20',5,$data['adate'],1,0,'L');
$pdf->Cell('20',5,'OT date:',1,0,'L');
$pdf->Cell('20',5,$data['otdate'],1,0,'L');
$pdf->Cell('25',5,'Booking date:',1,0,'L');
$pdf->Cell('20',5,$data['bookingdt'],1,0,'L');
$pdf->Cell('28',5,'Booking Time:',1,0,'L');
$pdf->Cell('20',5,$data['duration'],1,0,'L');
$pdf->ln(8);

$pdf->Cell('28',5,'Patient Type:',1,0,'L');
$pdf->Cell('30',5,$data['ptype'],1,0,'L');
$pdf->Cell('30',5,'Special Req.:',1,0,'L');
$pdf->Cell('30',5,$data['spereq'],1,0,'L');
$pdf->Cell('35',5,'Type of Anaethesia:',1,0,'L');
$pdf->Cell('30',5,$data['tanes'],1,0,'L');
$pdf->ln(5);
$pdf->Cell('40',5,'Name of Anaethesist:',1,0,'L');
$pdf->Cell('50',5,$data['nanes'],1,0,'L');
$pdf->Cell('40',5,'Duration:',1,0,'L');
$pdf->Cell('50',5,$data['duration1'],1,0,'L');

$pdf->ln(10);


$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Procedure:',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['proce'].".".$data['Otherins'],1,1);
$pdf->ln(4);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Diagnosis:',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['diagnosis'],1,1);
$pdf->ln(4);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'OT:',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['proce'],1,1);
$pdf->ln(4);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'REMARKS:',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['remarks'],1,1);
$pdf->ln(15);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Consultants Signature:',0,1,'R');
$pdf->ln(8);



//$pdf->SetFont('Arial' , 'b' , 15);
//$pdf->Cell('90',5,'OUT PATIENT RECORD',1,0,'L');


//$pdf->ln(10);
//$pdf->MultiCell('160' , 5,$data['xl'],1,1);
//$pdf->Cell('30' , 5,'Doasge',1,1);
//$pdf->MultiCell('160' , 5,'jashfjh sjfh jsdhfjsdhjfh jsdhjf hjsdhfj dsjhf djsh jfdshjf dsjhf jdsh fdhsf hjsdhf sdhf jdhsf hdsjfhjsdhf sdhf jdshjfhjskdhf jsdh fjhsdjkf hjdsfjd s',1,1);


$pdf->Image('logo3.jpg',15,7);
$pdf->Image('logo4.jpg',180,7);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$pdf->Ln(3);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(195,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$pdf->ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$pdf->ln(10);


$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('183',6,'OT BOOKING FORM',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('50',5,'Consultant Name:',0,0,'L');
$pdf->Cell('90',5,$data['dname'],0,0,'L');
$pdf->SetFont('Arial' , 'b' , 9);

$pdf->ln(5);


$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('14',5,$data['page'],1,1,'L');

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Admission date:',1,0,'L');
$pdf->Cell('20',5,$data['adate'],1,0,'L');
$pdf->Cell('20',5,'OT date:',1,0,'L');
$pdf->Cell('20',5,$data['otdate'],1,0,'L');
$pdf->Cell('25',5,'Booking date:',1,0,'L');
$pdf->Cell('20',5,$data['bookingdt'],1,0,'L');
$pdf->Cell('28',5,'Booking Time:',1,0,'L');
$pdf->Cell('20',5,$data['duration'],1,0,'L');
$pdf->ln(8);

$pdf->Cell('28',5,'Patient Type:',1,0,'L');
$pdf->Cell('30',5,$data['ptype'],1,0,'L');
$pdf->Cell('30',5,'Special Req.:',1,0,'L');
$pdf->Cell('30',5,$data['spereq'],1,0,'L');
$pdf->Cell('35',5,'Type of Anaethesia:',1,0,'L');
$pdf->Cell('30',5,$data['tanes'],1,0,'L');
$pdf->ln(5);
$pdf->Cell('40',5,'Name of Anaethesist:',1,0,'L');
$pdf->Cell('50',5,$data['nanes'],1,0,'L');

$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Diagnosis:',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['diagnosis'],1,1);
$pdf->ln(4);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'OT:',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['proce'],1,1);
$pdf->ln(15);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Consultants Signature:',0,1,'R');
$pdf->ln(15);






$pdf->Output();
?>