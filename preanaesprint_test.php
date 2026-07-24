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
$query = mysqli_query($db,"select * from preanaes where id='$id'");
$data = mysqli_fetch_array($query);
$eid=$data['eid'];
$eid1=$data['eid1'];
$pmrn=$data['pmrn'];
$dname=$data['surgeon'];
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
$pdf->Cell('183',6,'Preanaesthetic Checkup',1,1,'C');
$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('183',5,'Date & Time: '.$data['time'],0,1,'R');
//$this->SetFont('Arial','B',);
$pdf->ln(5);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40',5,'Anaesthetist Name:',0,0,'L');
$pdf->Cell('90',5,$data['surgeon'],0,0,'L');
$pdf->ln(4);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40');
$pdf->Cell('160',5,$data2['degree'],0,0,'L');
$pdf->ln(4);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40');
$pdf->Cell('160',5,$data2['Discipline'],0,0,'L');
$pdf->ln(6);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('40',5,'Surgeon Name:',0,0,'L');
$pdf->Cell('90',5,$data['dname'],0,0,'L');


$pdf->ln(6);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Patient Name:',1,0,'L');
$pdf->Cell('65',5,$data['pname'],1,0,'L');
$pdf->Cell('12',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('10',5,'Age:',1,0,'L');
$pdf->Cell('18',5,$data['page'],1,0,'L');
$pdf->Cell('15',5,'Sex:',1,0,'L');
$pdf->Cell('18',5,$data['psex'],1,1,'L');


$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Diagnosis',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['otherins'],0,1);
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Name Of The Operation',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['otname'],0,1);
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Previous Anaesthesia',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['preanae'],0,1);
$pdf->ln(2);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Associate Medical Problem',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['mediprob'],0,1);
$pdf->ln(2);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Present Medication',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['premedi'],0,1);
$pdf->ln(2);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Clinical Examination',0,1,'L');
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('18',5,'Pulse',1,0,'L');
$pdf->Cell('18',5,'BP',1,0,'L');
$pdf->Cell('18',5,'Temp',1,0,'L');
$pdf->Cell('18',5,'Jaundice',1,0,'L');
$pdf->Cell('18',5,'Cyanosis',1,0,'L');
$pdf->Cell('18',5,'Edema',1,0,'L');
$pdf->Cell('25',5,'GIT',1,0,'L');
$pdf->Cell('25',5,'CNS',1,0,'L');
$pdf->Cell('18',5,'Height',1,0,'L');
$pdf->Cell('18',5,'Weight',1,1,'L');







$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('18',5,$data['pulse'],1,0,'L');

$pdf->Cell('18',5,$data['bp'],1,0,'L');

$pdf->Cell('18',5,$data['temp'],1,0,'L');

$pdf->Cell('18',5,$data['jaundice'],1,0,'L');
$pdf->Cell('18',5,$data['cyanosis'],1,0,'L');
$pdf->Cell('18',5,$data['edema'],1,0,'L');
$pdf->Cell('25',5,$data['git'],1,0,'L');
$pdf->Cell('25',5,$data['cns'],1,0,'L');
$pdf->Cell('18',5,$data['height'],1,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('18',5,$data['weight'],1,1,'L');


$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('40',5,'Allergy',1,0,'L');
$pdf->Cell('40',5,'Teeth',1,0,'L');
$pdf->Cell('40',5,'Airway',1,0,'L');
$pdf->Cell('70',5,'Mallampati Score',1,1,'L');








$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('40',5,$data['allergy'],1,0,'L');

$pdf->Cell('40',5,$data['teeth'],1,0,'L');

$pdf->Cell('40',5,$data['airway'],1,0,'L');

$pdf->Cell('70',5,$data['mscore'],1,1,'L');



$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('190',5,'CVS',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('190' , 5,$data['cvs'],1,1);

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('190',5,'Resp Sys.',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('190' , 5,$data['resp'],1,1);


$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('190',5,'Others',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('190' , 5,$data['others1'],1,1);



$pdf->ln(2);



$pdf->ln(3);




$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Investigation',0,1,'L');
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('18',5,'HB',1,0,'L');
$pdf->Cell('18',5,'WBC',1,0,'L');
$pdf->Cell('18',5,'Platelets',1,0,'L');
$pdf->Cell('18',5,'PT',1,0,'L');
$pdf->Cell('18',5,'INR',1,0,'L');
$pdf->Cell('16',5,'BT',1,0,'L');
$pdf->Cell('15',5,'CT',1,0,'L');
$pdf->Cell('18',5,'APTT',1,0,'L');
$pdf->Cell('16',5,'UREA',1,0,'L');
$pdf->Cell('20',5,'Creatinine',1,0,'L');
$pdf->Cell('16',5,'NA',1,1,'L');




$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('18',5,$data['hb'],1,0,'L');

$pdf->Cell('18',5,$data['wbc'],1,0,'L');

$pdf->Cell('18',5,$data['pla'],1,0,'L');

$pdf->Cell('18',5,$data['pt'],1,0,'L');
$pdf->Cell('18',5,$data['inr'],1,0,'L');
$pdf->Cell('16',5,$data['bt'],1,0,'L');
$pdf->Cell('15',5,$data['ct'],1,0,'L');
$pdf->Cell('18',5,$data['aptt'],1,0,'L');
$pdf->Cell('16',5,$data['urea'],1,0,'L');
$pdf->Cell('20',5,$data['creatinine'],1,0,'L');
$pdf->Cell('16',5,$data['na'],1,1,'L');


$pdf->ln(2);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('18',5,'K',1,0,'L');
$pdf->Cell('18',5,'Cl',1,0,'L');
$pdf->Cell('18',5,'HCO3',1,0,'L');
$pdf->Cell('18',5,'Glucose',1,0,'L');
$pdf->Cell('18',5,'HBsAg',1,0,'L');
$pdf->Cell('16',5,'HCV',1,0,'L');
$pdf->Cell('15',5,'HIV',1,0,'L');
$pdf->Cell('18',5,'ABG',1,0,'L');
$pdf->Cell('16',5,'PFT',1,0,'L');
$pdf->Cell('20',5,'TFT/LFT',1,0,'L');
$pdf->Cell('18',5,'TSH',1,1,'L');


$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('18',5,$data['k'],1,0,'L');

$pdf->Cell('18',5,$data['cl'],1,0,'L');

$pdf->Cell('18',5,$data['hco3'],1,0,'L');

$pdf->Cell('18',5,$data['glucose'],1,0,'L');
$pdf->Cell('18',5,$data['hbs'],1,0,'L');
$pdf->Cell('16',5,$data['hcv'],1,0,'L');
$pdf->Cell('15',5,$data['hiv'],1,0,'L');
$pdf->Cell('18',5,$data['abg'],1,0,'L');
$pdf->Cell('16',5,$data['pft'],1,0,'L');
$pdf->Cell('20',5,$data['tft'],1,0,'L');
$pdf->Cell('18',5,$data['tsh'],1,1,'L');



$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('190',5,'Echo',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('190' , 5,$data['echo'],1,1);

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('190',5,'X-Ray',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('190' , 5,$data['xray'],1,1);

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('190',5,'ECG',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('190' , 5,$data['ecg'],1,1);



$pdf->ln(2);

$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('60',5,'Blood Group',1,0,'L');
$pdf->Cell('60',5,'Corss Match',1,0,'L');
$pdf->Cell('70',5,'Urine R/E',1,1,'L');

$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('60',5,$data['bgroup'],1,0,'L');

$pdf->Cell('60',5,$data['crossm'],1,0,'L');
$pdf->Cell('70',5,$data['urinere'],1,1,'L');


$pdf->ln(2);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Type Of Anaesthesia Discussed',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['tanaesthesia'],0,1);


$pdf->ln(2);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Pain Relief Discussed',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['prelief'],0,1);



$pdf->ln(2);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Risk Factors',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['rfactor'],0,1);


$pdf->ln(2);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Type Of Surgery: ',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('150' , 5,$data['tsurgery'],0,1);



$pdf->ln(2);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Premedication Advised',0,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['premedication'],0,1);


$pdf->ln(2);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('18',5,'Remarks: ',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('160' , 5,$data['remarks'],0,1);


$pdf->ln(2);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('15',5,'Charge: ',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('82' , 5,$data['charge'].' BDT',0,1);





$pdf->ln(3);	
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'LAB Advised:',0,1,'L');
$count=1;
$query1 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and dname='$dname' and eid='$eid1'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('3' , 5,$count.'.',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,'  '.$data1['medi']. " -" .$data1['ins'],0,1);
$count++;

}

$pdf->ln(2);
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