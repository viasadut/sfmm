<?php
include "phpqrcode/qrlib.php";    
$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['dname'];
$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from presnew where pmrn='$pmrn' and dname='$dname' and date='$date' and eid='$eid'");
$data = mysqli_fetch_array($query);

$query2 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and dname='$dname' and adate='$date'");
$data2 = mysqli_fetch_array($query2);

//$dname=$data['dname'];
$query3 = mysqli_query($db,"select * from doctor1 where dname='$dname'");
$data3 = mysqli_fetch_array($query3);
$pmrn=$_REQUEST['pmrn'];
//require('code128.php');
require('force_justify1.php');





//$pdf1->AddPage();
$pdf=new PDF_Code128();


$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);

//$pdf1->AddPage();
//$pdf1->SetFont('Arial','',10);


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
$pdf->ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561',0,0,'C');

$pdf->ln(10);
$code=$pmrn;
//$code1=$eid;
$pdf->SetXY(150,745);
$pdf->Code128(160,35,$code,40,10);
$pdf->SetXY(50,45);
//$pdf->Write(5,'A set: "'.$code.'"');

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('183',6,'OUTPATIENT RECORD',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('135',5,'Episode:',0,0,'R');
$pdf->Cell('5',5,$data['eid'],0,0,'L');
$pdf->Cell('20',5,'DATE:',0,0,'R');
$pdf->Cell('23',5,$data['date'],0,0,'R');


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

$pdf->ln(6);

$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('15',5,$data['page'],1,1,'L');

$pdf->ln(3);

$pdf->Cell('12',5,'H(CM):',1,0,'L');
$pdf->Cell('10',5,$data2['height'],1,0,'L');
$pdf->Cell('12',5,'W(KG):',1,0,'L');
$pdf->Cell('10',5,$data2['weight'],1,0,'L');
$pdf->Cell('12',5,'BMI:',1,0,'L');
$pdf->Cell('10',5,$data2['pbmi'],1,0,'L');
$pdf->Cell('15',5,'Pluse:',1,0,'L');
$pdf->Cell('10',5,$data2['ppluse'],1,0,'L');
$pdf->Cell('7',5,'BP:',1,0,'L');
$pdf->Cell('18',5,$data2['pbp'],1,0,'L');
$pdf->Cell('15',5,'Temp(F):',1,0,'L');
$pdf->Cell('10',5,$data2['temp'],1,0,'L');
$pdf->Cell('12',5,'SPO2:',1,0,'L');
$pdf->Cell('10',5,$data2['spo2'],1,0,'L');
$pdf->Cell('10',5,'RR:',1,0,'L');
$pdf->Cell('10',5,$data2['rr'],1,0,'L');

$pdf->ln(8);




$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Clinical Details:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['cdetails'],0,1);


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Diagnosis:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['diagnosis'],0,1);

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Medication Advised:',0,1,'L');
$query1 = mysqli_query($db,"select * from pmedi where pmrn='$pmrn' and dname='$dname'  and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['medi'],0,1);
$pdf->MultiCell('182' , 5,$data1['pdos'],0,1);
$pdf->ln(1);
}
$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'LAB Advised:',0,1,'L');
$query1 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and dname='$dname' and eid='$eid'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['medi']. " -" .$data1['ins'],0,1);
}
//$pdf->Cell('92' , 5,'Dosages',1,1,'C');

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('10',5,'DIET:',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('162' , 5,$data['pdiet'],0,1);

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Other Advise:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['other'],0,1);


$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Reffered To:',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell ('182' , 5,$data['reffer']." ".$data['pdiet2']." ".$data['reffer2']." ".$data['pdiet3']." ".$data['reffer3']." ".$data['pdiet4']." ".$data['reffer4']." ".$data['pdiet5']." ".$data['reffer5']." ".$data['pdiet6']." ".$data['reffer6']." ".$data['pdiet7'],0,1);

$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Consultants Signature:',0,1,'R');




//$pdf->SetFont('Arial' , 'b' , 15);
//$pdf->Cell('90',5,'OUT PATIENT RECORD',1,0,'L');


//$pdf->ln(10);
//$pdf->MultiCell('160' , 5,$data['xl'],1,1);
//$pdf->Cell('30' , 5,'Doasge',1,1);
//$pdf->MultiCell('160' , 5,'jashfjh sjfh jsdhfjsdhjfh jsdhjf hjsdhfj dsjhf djsh jfdshjf dsjhf jdsh fdhsf hjsdhf sdhf jdhsf hdsjfhjsdhf sdhf jdshjfhjskdhf jsdh fjhsdjkf hjdsfjd s',1,1);
//$dd=$data['refer']

//$dd = rtrim($dd, ',');
//$string = rtrim($string, ',');


$tempDir ='qr_images/';
$pmrn='123456';
$eid='12';
//$codeContents = 'http://192.168.100.252:8081/sfmm/test?pmrn='.$pmrn.'&eid='.$eid.'';

$codeContents = 'http://192.168.100.252:8081/sfmm/tender/equipment/asset_view_new.php?id=13';

$fileName = 'qrcode_ame.png';

$pngAbsoluteFilePath = $tempDir.$fileName;
$urlRelativeFilePath = EXAMPLE_TMP_URLRELPATH.$fileName;

QRcode::png($codeContents, $pngAbsoluteFilePath); 

$pdf->Image($pngAbsoluteFilePath,170,65,15);

$pdf->Output();

?>