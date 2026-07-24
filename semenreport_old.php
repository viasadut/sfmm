<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify1.php');
$pmrn=$_REQUEST['pmrn'];
$id='I'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from semen1 where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);

//$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($db,"select * from iinves where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);


$barcode=$data3['barcode'];
$sdate=date('d/m/Y H:i:s',strtotime($data3["rtime"]));



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

$pdf->Cell('60',5,'Referring Consultant Name: '. $data2['adoc'],0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '. $data2['pname'],0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data2['pmrn'],0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data2['gender'],0,0,'L');
$pdf->Cell('50',5,'Age: '.$data2['age'],0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$sdate,0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data3['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data3['resultstatus'],0,1,'L');

$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);



$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);


$pdf->SetFont('Arial' , 'b' , 10);



$pdf->Cell('80',5,'Particulars',1,0,'C');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');



$pdf->Cell('80',5,'Time Of Collection',1,0,'C');
$pdf->Cell('30',5,$data['tc'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Time Of Examination',1,0,'C');
$pdf->Cell('30',5,$data['te'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Colour',1,0,'C');
$pdf->Cell('30',5,$data['color'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Volume',1,0,'C');
$pdf->Cell('30',5,$data['vol'],1,0,'C');
$pdf->Cell('31',5,'ml',1,0,'C');
$pdf->Cell('40',5,'> OR =1.5',1,1,'C');

$pdf->Cell('80',5,'Liquefaction',1,0,'C');
$pdf->Cell('30',5,$data['liq'],1,0,'C');
$pdf->Cell('31',5,'Mins',1,0,'C');
$pdf->Cell('40',5,'WIthin 30 Mins',1,1,'C');



$pdf->Cell('80',5,'Fructose Test',1,0,'C');
$pdf->Cell('30',5,$data['fru'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'POSITIVE',1,1,'C');


$pdf->Cell('80',5,'pH',1,0,'C');
$pdf->Cell('30',5,$data['ph'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'ALKALINE',1,1,'C');

$pdf->Cell('80',5,'Sperm Concentration',1,0,'C');
$pdf->Cell('30',5,$data['scon'],1,0,'C');
$pdf->Cell('31',5,' M/ml',1,0,'C');
$pdf->Cell('40',5,'> OR = 15',1,1,'C');

$pdf->Cell('80',5,'Total Sperm Count',1,0,'C');
$pdf->Cell('30',5,$data['tsc'],1,0,'C');
$pdf->Cell('31',5,' M/ ejaculate',1,0,'C');
$pdf->Cell('40',5,'> OR = 39',1,1,'C');

$pdf->Cell('80',5,'Morphology',1,0,'C');
$pdf->Cell('30',5,$data['mor'],1,0,'C');
$pdf->Cell('31',5,'% Normal',1,0,'C');
$pdf->Cell('40',5,'> OR = 4',1,1,'C');

$pdf->Cell('80',5,'Vitality',1,0,'C');
$pdf->Cell('30',5,$data['vitality'],1,0,'C');
$pdf->Cell('31',5,'% Live',1,0,'C');
$pdf->Cell('40',5,'> OR = 58',1,1,'C');


$pdf->Cell('80',5,'Total Molility',1,0,'C');
$pdf->Cell('30',5,$data['tmot'],1,0,'C');
$pdf->Cell('31',5,'PR +NP, %',1,0,'C');
$pdf->Cell('40',5,'> OR = 40',1,1,'C');

$pdf->Cell('80',5,'Ogressive Motility',1,0,'C');
$pdf->Cell('30',5,$data['ogressive'],1,0,'C');
$pdf->Cell('31',5,'PR +NP, %',1,0,'C');
$pdf->Cell('40',5,'> OR = 32',1,1,'C');


$pdf->Cell('80',5,'Pus Cells',1,0,'C');
$pdf->Cell('30',5,$data['pus'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'/HPF',1,1,'C');

$pdf->Cell('80',5,'RBCs',1,0,'C');
$pdf->Cell('30',5,$data['rbc'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'/HPF',1,1,'C');

$pdf->Cell('80',5,'Epithelial Cells',1,0,'C');
$pdf->Cell('30',5,$data['epi'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');


$pdf->Cell('80',5,'Small Agglutinates',1,0,'C');
$pdf->Cell('30',5,$data['sagg'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Large Agglutinates',1,0,'C');
$pdf->Cell('30',5,$data['lagg'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Aggregates',1,0,'C');
$pdf->Cell('30',5,$data['agg'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Comments',1,0,'C');
$pdf->Cell('30',5,$data['com'],1,0,'C');


$pdf->Cell('80',5,'Epithelial Cell, Stool',1,0,'C');
$pdf->Cell('30',5,$data['ecell'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Pus Cell, Stool',1,0,'C');
$pdf->Cell('30',5,$data['pcell'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Red Blood Cell(RBC), Stool',1,0,'C');
$pdf->Cell('30',5,$data['rbc'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Macrophage, Stool',1,0,'C');
$pdf->Cell('30',5,$data['mac'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Fat Globules, Stool',1,0,'C');
$pdf->Cell('30',5,$data['fat'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Vegetable Cells, Stool',1,0,'C');
$pdf->Cell('30',5,$data['veg'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Starch Granules, Stool',1,0,'C');
$pdf->Cell('30',5,$data['starch'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Muscle Fibre, Stool',1,0,'C');
$pdf->Cell('30',5,$data['muscle'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Yeasts, Stool',1,0,'C');
$pdf->Cell('30',5,$data['yeasts'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Other, Stool',1,0,'C');
$pdf->Cell('30',5,$data['other'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');



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
$pdf->Output();