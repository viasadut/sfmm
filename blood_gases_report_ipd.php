<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify1.php');
$pmrn=$_REQUEST['pmrn'];
$id='I'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];


$db = mysqli_connect('localhost','root','');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from blood_gases where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);
// var_dump($data);

//$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($db,"select * from iinves where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);
$barcode=$data3['barcode'];



//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');


$pdf=new PDF_Code128();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');


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




$pdf->SetXY(150,745);
$pdf->Code128(18,90,$barcode,40,10);
$pdf->SetXY(50,45);





$pdf->ln(1);
$pdf->SetFont('Times', 'bu',14);
$pdf->Cell('182',6,$data['iname'].' Report',0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',12);

$pdf->Cell('60',5,'Referring Consultant Name: '. $data3['dname'],0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '. $data3['pname'],0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data3['pmrn'],0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data3['pgender'],0,0,'L');
$pdf->Cell('50',5,'Age: '.$data3['page'],0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$data3['retime'],0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data3['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data3['resultstatus'],0,1,'L');

$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);



$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);




$pdf->SetFont('Arial' , 'b' , 10);


$pdf->Cell('80',5,'BLOOD GASES, ARTERIAL (GP39A)',0,1,'L');
$pdf->Cell('80',5,'ACID/BASE 37.0°C:',0,1,'L');

$pdf->Cell('80',5,'Particulars',1,0,'C');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');



$pdf->Cell('80',5,'pH',1,0,'C');
$pdf->Cell('30',5,$data['pH'],1,0,'C');
$pdf->Cell('31',5,' ',1,0,'C');
$pdf->Cell('40',5,'6.500 - 7.800',1,1,'C');

$pdf->Cell('80',5,'PCO2',1,0,'C');
$pdf->Cell('30',5,$data['PCO2'],1,0,'C');
$pdf->Cell('31',5,'mmHg',1,0,'C');
$pdf->Cell('40',5,'5.0 - 200.0',1,1,'C');

$pdf->Cell('80',5,'PO2',1,0,'C');
$pdf->Cell('30',5,$data['PO2'],1,0,'C');
$pdf->Cell('31',5,'mmHg',1,0,'C');
$pdf->Cell('40',5,'10.0 - 700.0',1,1,'C');

$pdf->Cell('80',5,'Be (ecf)',1,0,'C');
$pdf->Cell('30',5,$data['Be_ecf'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,0,'C');
$pdf->Cell('40',5,' ',1,1,'C');

$pdf->Cell('80',5,'HCO3-act',1,0,'C');
$pdf->Cell('30',5,$data['HCO3_act'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,0,'C');
$pdf->Cell('40',5,' ',1,1,'C');

$pdf->Cell('80',5,'HOC3-std',1,0,'C');
$pdf->Cell('30',5,$data['HOC3_std'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,0,'C');
$pdf->Cell('40',5,' ',1,1,'C');

$pdf->Cell('80',5,'BE (B)',1,0,'C');
$pdf->Cell('30',5,$data['BE_B'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,0,'C');
$pdf->Cell('40',5,' ',1,1,'C');

$pdf->Cell('80',5,'tCO2',1,0,'C');
$pdf->Cell('30',5,$data['tCO2'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,0,'C');
$pdf->Cell('40',5,' ',1,1,'C');

$pdf->ln(5);
$pdf->Cell('80',5,'Oxygen Status 37.0 C:',0,1,'L');

$pdf->Cell('80',5,'O2 SAT (est)',1,0,'C');
$pdf->Cell('30',5,$data['O2_SAT_est'],1,0,'C');
$pdf->Cell('31',5,' %',1,0,'C');
$pdf->Cell('40',5,' ',1,1,'C');

$pdf->ln(5);
$pdf->Cell('80',5,'Elecrtolytes:',0,1,'L');

$pdf->Cell('80',5,'Na+',1,0,'C');
$pdf->Cell('30',5,$data['Na'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,0,'C');
$pdf->Cell('40',5,'100.0 - 200.0 ',1,1,'C');

$pdf->Cell('80',5,'K+',1,0,'C');
$pdf->Cell('30',5,$data['K'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,0,'C');
$pdf->Cell('40',5,' 0.50 - 15.00',1,1,'C');

$pdf->Cell('80',5,'Cl-',1,0,'C');
$pdf->Cell('30',5,$data['Cl'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,0,'C');
$pdf->Cell('40',5,' 65 - 140',1,1,'C');

$pdf->Cell('80',5,'AnGap',1,0,'C');
$pdf->Cell('30',5,$data['AnGap'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,' ',1,1,'C');

$pdf->ln(5);
$pdf->Cell('80',5,'Metabolites:',0,1,'L');

$pdf->Cell('80',5,'pAtm',1,0,'C');
$pdf->Cell('30',5,$data['pAtm'],1,0,'C');
$pdf->Cell('31',5,'mmHg',1,0,'C');
$pdf->Cell('40',5,' ',1,1,'C');

$pdf->ln(50);

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