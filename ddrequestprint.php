<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['adoc'];
//$date=$_REQUEST['adate'];
$eid=$_REQUEST['eid'];
$id=$_REQUEST['id'];



$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_array($query);

$query1 = mysqli_query($db,"select * from preadm where id='$id'");
$data1 = mysqli_fetch_array($query1);




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
$this->SetY(-8);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Page'.$this->PageNo().' / (SFMM/BMTCSR/001/18)',0,0,'R');

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
$pdf->SetFont('Arial' , 'b' , 16);
$pdf->Cell('183',6,'ADMISSION FORM',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('178',5,'Episode:',0,0,'R');
$pdf->Cell('5',5,$data['eid'],0,0,'L');

$pdf->ln(6);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Patient Name:',1,0,'L');
$pdf->Cell('90',5,$data1['pname'],1,0,'L');
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->Cell('5');
$pdf->Cell('30',5,'MRN:',1,0,'L');
$pdf->Cell('28',5,$data1['pmrn'],1,1,'L');
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Patient Adress:',1,0,'L');
$pdf->Cell('90',5,$data1['padd'],1,0,'L');
$pdf->Cell('5');
$pdf->Cell('30',5,'Gender:',1,0,'L');
$pdf->Cell('28',5,$data1['gender'],1,1,'L');
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Patient Age:',1,0,'L');
$pdf->Cell('20',5,$data1['page'],1,1,'L');
$pdf->Cell('2');

$pdf->ln(5);



$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('60',5,'Father / Husband Name:',1,0,'L');
$pdf->MultiCell('123',5,$data1['fname'],1,1);
$pdf->Cell('60',5,'Mother Name:',1,0,'L');
$pdf->MultiCell('123',5,$data1['mname'],1,1);
$pdf->Cell('60',5,'Permanent Address:',1,0,'L');
$pdf->MultiCell('123',5,$data1['peradd'],1,1);
$pdf->Cell('60',5,'National / Birth ID:',1,0,'L');
$pdf->MultiCell('123',5,$data1['nid'],1,1);
$pdf->Cell('60',5,'Phone No:',1,0,'L');
$pdf->MultiCell('123',5,$data1['pphone'],1,1);



$pdf->Cell('60',5,'Occupation:',1,0,'L');
$pdf->MultiCell('123',5,$data1['pocu'],1,1);
$pdf->Cell('60',5,'Monthly:',1,0,'L');
$pdf->MultiCell('123',5,$data1['mincome'],1,1);
$pdf->Cell('60',5,'No Of Spouse:',1,0,'L');
$pdf->MultiCell('123',5,$data1['wife'],1,1);
$pdf->Cell('60',5,'No Of Children:',1,0,'L');
$pdf->MultiCell('123',5,$data1['child'],1,1);
$pdf->Cell('60',5,'Income Source Of Dependent:',1,0,'L');
$pdf->MultiCell('123',5,$data1['isource'],1,1);
$pdf->Cell('60',5,'Land in Favor of Patients (in Acre):',1,0,'L');
$pdf->MultiCell('123',5,$data1['land'],1,1);
$pdf->Cell('60',5,'Service Place:',1,0,'L');
$pdf->MultiCell('123',5,$data1['service'],1,1);
$pdf->Cell('60',5,'Patients possession:',1,0,'L');
$pdf->MultiCell('123',5,$data1['poss'],1,1);
$pdf->Cell('60',5,'Member of any political party:',1,0,'L');
$pdf->MultiCell('123',5,$data1['political'],1,1);



$pdf->ln(10);

$pdf->Cell('35',5,'Patient Party Signature',0,0,'L');
$pdf->Cell('95');
$pdf->Cell('85',5,'Business Office Officer Signature',0,1,'L');
$pdf->ln(3);
$pdf->Cell('55',5,'Supporting Documents Given:',0,1,'L');
$pdf->MultiCell('123',5,$data1['nidcard'].' '.$data1['bcard'].' '.$data1['vgcard'].' '.$data1['ocard'].' '.$data1['wcard'].' '.$data1['hcard'].' '.$data1['fcard'],0,1);


$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 16);
$pdf->Cell('183',5,'PART 2:',0,1,'L');

$pdf->ln(6);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Patient Name:',1,0,'L');
$pdf->Cell('90',5,$data1['pname'],1,0,'L');
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->Cell('5');
$pdf->Cell('30',5,'MRN:',1,0,'L');
$pdf->Cell('28',5,$data1['pmrn'],1,1,'L');
$pdf->ln(2);

$pdf->Cell('30',5,'Gender:',1,0,'L');
$pdf->Cell('28',5,$data1['gender'],1,0,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('2');
$pdf->Cell('30',5,'Patient Age:',1,0,'L');

$pdf->Cell('20',5,$data1['page'],1,0,'L');
$pdf->Cell('2');

$pdf->Cell('30',5,'Admission Date:',1,0,'L');
$pdf->Cell('41',5,$data1['rdate'],1,1,'L');
$pdf->ln(2);
$pdf->Cell('60',5,'Primary Consultant:',1,0,'L');
$pdf->Cell('123',5,$data1['dname'],1,1,'L');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->ln(2);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('60',5,'Diagnosis:',1,0,'L');
$pdf->MultiCell('123',5,$data1['dia1'],1,1);
$pdf->ln(2);
$pdf->Cell('60',5,'Estimated cost for treatment:',1,0,'L');
$pdf->MultiCell('123',5,$data1['ecost1'],1,1);
$pdf->ln(2);
$pdf->Cell('60',6,'Clinical Condition:',1,0,'L');
$pdf->MultiCell('123',6,$data1['cinfo'],1,1);

$pdf->ln(4);
$pdf->Cell('183',5,'Mention if considered as a special case and give reasons ',1,1,'L');
$pdf->MultiCell('183',5,$data1['scase'],1,1);
$pdf->ln(2);
$pdf->Cell('60',5,'Financial condition of the patient',1,0,'L');
$pdf->MultiCell('123',5,$data1['vpoor'],1,1);




$pdf->ln(15);




$pdf->ln(50);

$pdf->ln(80);
$pdf->SetFont('Arial' , 'b' , 16);
//$pdf->ln(20);
$pdf->Cell('183',6,'APPLICATION FOR BANGABANDHU MEMORIAL TRUST',0,1,'C');
$pdf->Cell('183',6,'DORIDRO RUGIR SHEBA THABIL FORM',0,1,'C');
//$this->SetFont('Arial','B',);
$pdf->SetFont('Arial' , 'b' , 10);

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 16);
$pdf->Cell('183',5,'PART 3:',0,1,'L');

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('183',5,'Recommendation by "Very poor patients selection committee":Reference to the application with other justification, this patient is very poor.He / She didn’t get any other facilities from this hospital.We recommend to grant the patient as follows from the Honorable prime minister’s donation fund 
',0,1);
$pdf->ln(6);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('60',5,'BDT in Figures:',1,0,'L');
$pdf->MultiCell('123',5,$data1['bfigure'],1,1);
$pdf->ln(2);
$pdf->Cell('60',5,'BDT in Words:',1,0,'L');
$pdf->MultiCell('123',5,$data1['bword'],1,1);
$pdf->ln(2);

$pdf->Cell('183',5,'Members Signature',1,1,'L');
$pdf->Cell('5',5,'',1,0,'L');
$pdf->Cell('88',5,'Member Name',1,0,'L');
$pdf->Cell('50',5,'Signature',1,0,'L');
$pdf->Cell('40',5,'Seal',1,1,'L');



$pdf->Cell('5',15,'1',1,0,'L');
$pdf->Cell('88',15,'Administrative Manager / Member Secretary',1,0,'L');
$pdf->Cell('50',15,'',1,0,'L');
$pdf->Cell('40',15,'',1,1,'L');

$pdf->Cell('5',15,'2',1,0,'L');
$pdf->Cell('88',15,'Hospital Finance Service Representative',1,0,'L');
$pdf->Cell('50',15,'',1,0,'L');
$pdf->Cell('40',15,'',1,1,'L');

$pdf->Cell('5',15,'3',1,0,'L');
$pdf->Cell('88',15,'Related Departmental Consultant',1,0,'L');
$pdf->Cell('50',15,'',1,0,'L');
$pdf->Cell('40',15,'',1,1,'L');

$pdf->Cell('5',15,'4',1,0,'L');
$pdf->Cell('88',15,'Representative From Bangabandhu Memorial Trust',1,0,'L');
$pdf->Cell('50',15,'',1,0,'L');
$pdf->Cell('40',15,'',1,1,'L');

$pdf->ln(2);
$pdf->Cell('70',15,'Chairman / Medical Directors Signature:',1,0,'L');
$pdf->MultiCell('113',15,'',1,1);

$pdf->ln(2);
$pdf->Cell('92',5,'Name: Dr. Razeeb Hassan',1,0,'L');
$pdf->Cell('91',5,'Date:',1,1,'L');





$pdf->ln(10);
//$this->SetFont('Arial','B',);
$pdf->SetFont('Arial' , 'b' , 10);

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 16);
$pdf->Cell('183',5,'PART 4:',0,1,'L');

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('183',5,'Approved by Chief Executive Officer (CEO) of the hospital:',0,1);

$pdf->MultiCell('183',5,'As recommended by "Very poor patient selection committee" the following has been approved for the patient',0,1);  

$pdf->ln(6);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('60',5,'BDT in Figures:',1,0,'L');
$pdf->MultiCell('123',5,$data1['bfigure'],1,1);
$pdf->ln(2);
$pdf->Cell('60',5,'BDT in Words:',1,0,'L');
$pdf->MultiCell('123',5,$data1['bword'],1,1);
$pdf->ln(2);

$pdf->ln(2);
$pdf->Cell('183',20,'CEO Signature:',1,1,'L');
$pdf->ln(2);
$pdf->Cell('83',15,'Name: Mohd. Taufik Bin Ismail',1,0,'L');
$pdf->Cell('40',15,'Date:',1,0,'L');
$pdf->Cell('60',15,'Seal:',1,0,'L');



$pdf->Output();