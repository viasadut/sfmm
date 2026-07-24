<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');


$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
//$bkdate=$_REQUEST['bkdate'];
//$id=['id'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from ot where id='$id'");
$data = mysqli_fetch_array($query);

$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from doctor1 where dname='$dname'");
$data2 = mysqli_fetch_array($query2);

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
$this->ln(15);

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
$pdf->Cell('183',6,'SURGERY / PROCEDURE NOTE',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(10);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40',5,'Consultant Name:',0,0,'L');
$pdf->Cell('90',5,$data['dname'],0,0,'L');
$pdf->ln(4);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40');
$pdf->Cell('160',5,$data2['degree'],0,0,'L');
$pdf->ln(4);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40');
$pdf->Cell('160',5,$data2['Discipline'],0,0,'L');
$pdf->ln(8);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('40',5,'Assistant Surgeon:',0,0,'L');
$pdf->Cell('90',5,$data['asdoc'],0,0,'L');


$pdf->ln(8);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('14',5,$data['page'],1,1,'L');

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Admission date:',1,0,'L');
$pdf->Cell('20',5,$data['adate'],1,0,'L');
$pdf->Cell('20',5,'OT date:',1,0,'L');
$pdf->Cell('20',5,$data['otdate'],1,0,'L');
$pdf->Cell('25',5,'Booking date:',1,0,'L');
$pdf->Cell('20',5,$data['bookingdt'],1,0,'L');
$pdf->Cell('28',5,'Booking Time:',1,0,'L');
$pdf->Cell('20',5,$data['duration'],1,0,'L');
$pdf->ln(6);

$pdf->Cell('28',5,'Patient Type:',1,0,'L');
$pdf->Cell('30',5,$data['ptype'],1,0,'L');
$pdf->Cell('30',5,'Special Req.:',1,0,'L');
$pdf->Cell('30',5,$data['spereq'],1,0,'L');
$pdf->Cell('35',5,'Duration:',1,0,'L');
$pdf->Cell('30',5,$data['duration1'],1,0,'L');

$pdf->ln(5);
$pdf->Cell('40',5,'Name of Anaethesist:',1,0,'L');
$pdf->Cell('50',5,$data['nanes'],1,0,'L');
$pdf->Cell('35',5,'Type of Anaethesia:',1,0,'L');
$pdf->Cell('58',5,$data['tanes'],1,0,'L');


$pdf->ln(5);
$pdf->Cell('40',5,'Name of Nurses:',1,0,'L');
$pdf->Cell('50',5,$data['nurse'],1,0,'L');
$pdf->ln(8);


$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Procedure:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['proce'].".".$data['Otherins'],0,1);
$pdf->ln(2);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Diagnosis:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['diagnosis'],0,1);
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'OT:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['operation'],0,1);
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'REMARKS:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['remarks'],0,1);
$pdf->ln(2);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Indication:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['Indication'],0,1);
$pdf->ln(2);


$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Prep and Drape:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['prep'],0,1);

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Incision/port placement:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['incision'],0,1);

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Findings:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['findings'],0,1);

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Procedure:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['procedure2'],0,1);

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Peroperative Complications:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['peroperative'],0,1);

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Drain:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['drain'],0,1);
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'CS?:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['cs'],0,1);
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Position:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['position'],0,1);
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Biospy Specimen:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['biopsyspe'],0,1);
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Biospy For:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['biopsy'],0,1);
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Blood Loss:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['bloss'],0,1);
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Hospital Stay Plan:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['pplan'],0,1);
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Immediate Postoperative plan:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['hplan'],0,1);

$pdf->ln(4);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('182',5,'Post Operative Order:',0,1,'L');

$pdf->ln(2);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Order For o2 :',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['o2'],0,1);


$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Infusion Order :',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['inorder'],0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Medication Order :',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['morder'],0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Non Medication Order :',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['nmorder'],0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Dietary Instruction :',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['di'],0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'NG Instruction :',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['ngi'],0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Catheter Instruction :',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['ci'],0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Other Order :',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['oo'],0,1);




$pdf->ln(20);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Consultants Signature:',0,1,'R');




//$pdf->SetFont('Arial' , 'b' , 15);
//$pdf->Cell('90',5,'OUT PATIENT RECORD',1,0,'L');


//$pdf->ln(10);
//$pdf->MultiCell('160' , 5,$data['xl'],1,1);
//$pdf->Cell('30' , 5,'Doasge',1,1);
//$pdf->MultiCell('160' , 5,'jashfjh sjfh jsdhfjsdhjfh jsdhjf hjsdhfj dsjhf djsh jfdshjf dsjhf jdsh fdhsf hjsdhf sdhf jdhsf hdsjfhjsdhf sdhf jdshjfhjskdhf jsdh fjhsdjkf hjdsfjd s',1,1);





$pdf->Output();
?>