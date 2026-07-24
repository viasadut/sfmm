<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');


$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
//$bkdate=$_REQUEST['bkdate'];
//$id=['id'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$queryn = mysqli_query($db,"select * from otreport where eid='$eid' and pmrn='$pmrn'");
$datan = mysqli_fetch_array($queryn);




$query = mysqli_query($db,"select * from ot where id='$eid'");
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
$pdf->Cell('183',6,'Post Operative Order',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(10);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('50',5,'Surgeon Name:',0,0,'L');
$pdf->Cell('90',5,$data['dname'],0,0,'L');
$pdf->ln(4);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('50');
$pdf->Cell('160',5,$data2['degree'],0,0,'L');
$pdf->ln(4);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('50');
$pdf->Cell('160',5,$data2['Discipline'],0,0,'L');
$pdf->ln(8);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Name Of 2nd / 3rd Surgeon:',0,0,'L');
$pdf->MultiCell('170',5,$data['dname1'].','.$data['dname2'],0,1);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,'Name Of Anaethesist:',0,0,'L');
$pdf->MultiCell('170',5,$data['nanes'],0,1);


$pdf->ln(8);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('26',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('14',5,$data['page'],1,1,'L');

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->Cell('26',5,'Admission date:',1,0,'L');
$pdf->SetFont('Arial' , 'b' , 8);
$pdf->Cell('29',5,$data['adate'],1,0,'L');
$pdf->SetFont('Arial' , 'b' , 9.5);
$pdf->Cell('15',5,'OT date:',1,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('20',5,$data['otdate'],1,0,'L');
$pdf->Cell('25',5,'Booking date:',1,0,'L');
$pdf->Cell('20',5,$data['bookingdt'],1,0,'L');
$pdf->SetFont('Arial' , 'b' , 8);
$pdf->Cell('18',5,'Book Time:',1,0,'L');
$pdf->Cell('30',5,$data['stime'].' To '.$data['etime'],1,0,'L');
$pdf->ln(6);
$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('28',5,'Patient Type:',1,0,'L');
$pdf->Cell('30',5,$data['ptype'],1,0,'L');
$pdf->Cell('30',5,'Special Req.:',1,0,'L');
$pdf->Cell('30',5,$data['spereq'],1,0,'L');
$pdf->Cell('35',5,'Duration:',1,0,'L');
$pdf->Cell('30',5,$data['duration1'].' hr(s)',1,0,'L');

$pdf->ln(5);
$pdf->Cell('35',5,'Type of Anaethesia:',1,0,'L');
$pdf->Cell('148',5,$data['tanes'],1,0,'L');


$pdf->ln(5);
$pdf->Cell('183',5,'Name of The Nurses (A / C / S1 / S2):',1,1,'L');
$pdf->MultiCell('183',5,$data['anurse'].','.$data['cnurse'].','.$data['snurse1'].','.$data['snurse2'],1,1);
$pdf->ln(8);


$pdf->ln(4);


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