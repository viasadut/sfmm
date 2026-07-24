<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from cbctbl where pmrn='$pmrn' and eid='$eid' and inid='$id'");
$data = mysqli_fetch_array($query);

//$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);




//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){

$this->ln(35);

}

function footer(){
$this->SetY(-15);
$this->SetFont('Arial','B',8);

$this->ln(5);
$this->SetFont('Arial','B',10);
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561',0,0,'C');


}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('15');
//$pdf->headerTable();
//$pdf->viewTable($db);


$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('182',6,$data['iname'].' REPORT',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 8);
$pdf->Cell('155',5,'Date&Time:',0,0,'R');
$pdf->Cell('43',5,$data['udate'],0,0,'L');
$pdf->ln(10);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40',5,'Consultant Name:',0,0,'L');
$pdf->Cell('90',5,'DR. ABC',0,0,'L');
$pdf->ln(4);

$pdf->Cell('60',5,'Referral Consultant Name:',0,0,'L');
$pdf->Cell('90',5,$data2['adoc'],0,0,'L');

$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40');
//$pdf->Cell('160',5,$data2['degree'],0,0,'L');
$pdf->ln(4);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('40');
//$pdf->Cell('160',5,$data2['Discipline'],0,0,'L');

$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('13',5,$data['page'],1,1,'L');

$pdf->ln(3);

//$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('40',5,'Referral From:',1,0,'L');
//$pdf->Cell('141', 5,$data['dreffer'],1,1,'L');

$pdf->ln(3);


$pdf->SetFont('Arial' , 'b' , 10);



$pdf->Cell('80',5,'Particulars',1,0,'C');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');


$pdf->Cell('80',5,'Haemoglobin',1,0,'C');
$pdf->Cell('30',5,$data['haemo'],1,0,'C');
$pdf->Cell('31',5,'g/dL',1,0,'C');
$pdf->Cell('40',5,'13.0-18.0',1,1,'C');

$pdf->Cell('80',5,'Red Cell Count',1,0,'C');
$pdf->Cell('30',5,$data['red'],1,0,'C');
$pdf->Cell('31',5,'10^12/L',1,0,'C');
$pdf->Cell('40',5,'4.5-5.9',1,1,'C');

$pdf->Cell('80',5,'Haematocrit (PCV)',1,0,'C');
$pdf->Cell('30',5,$data['pcv'],1,0,'C');
$pdf->Cell('31',5,'%',1,0,'C');
$pdf->Cell('40',5,'41-53',1,1,'C');

$pdf->Cell('80',5,'MCV',1,0,'C');
$pdf->Cell('30',5,$data['mcv'],1,0,'C');
$pdf->Cell('31',5,'fL',1,0,'C');
$pdf->Cell('40',5,'76-103',1,1,'C');

$pdf->Cell('80',5,'MCH',1,0,'C');
$pdf->Cell('30',5,$data['mch'],1,0,'C');
$pdf->Cell('31',5,'pg',1,0,'C');
$pdf->Cell('40',5,'26-34',1,1,'C');

$pdf->Cell('80',5,'MCHC',1,0,'C');
$pdf->Cell('30',5,$data['mchc'],1,0,'C');
$pdf->Cell('31',5,'g/dL',1,0,'C');
$pdf->Cell('40',5,'31-36',1,1,'C');

$pdf->Cell('80',5,'RDW',1,0,'C');
$pdf->Cell('30',5,$data['rdw'],1,0,'C');
$pdf->Cell('31',5,'%',1,0,'C');
$pdf->Cell('40',5,'8.0-14.6',1,1,'C');

$pdf->Cell('80',5,'Platelet Count',1,0,'C');
$pdf->Cell('30',5,$data['pla'],1,0,'C');
$pdf->Cell('31',5,'10^3/uL',1,0,'C');
$pdf->Cell('40',5,'150-450',1,1,'C');

$pdf->Cell('80',5,'MPV',1,0,'C');
$pdf->Cell('30',5,$data['mpv'],1,0,'C');
$pdf->Cell('31',5,'fL',1,0,'C');
$pdf->Cell('40',5,'5.8-12.0',1,1,'C');

$pdf->Cell('80',5,'White Blood Cell Count',1,0,'C');
$pdf->Cell('30',5,$data['wbc'],1,0,'C');
$pdf->Cell('31',5,'10^3/uL',1,0,'C');
$pdf->Cell('40',5,'4.3-10.5',1,1,'C');

$pdf->Cell('80',5,'Neutrophil',1,0,'C');
$pdf->Cell('30',5,$data['neu'],1,0,'C');
$pdf->Cell('31',5,'%',1,0,'C');
$pdf->Cell('40',5,'40-75',1,1,'C');

$pdf->Cell('80',5,'Lymphocyte',1,0,'C');
$pdf->Cell('30',5,$data['lym'],1,0,'C');
$pdf->Cell('31',5,'%',1,0,'C');
$pdf->Cell('40',5,'20-45',1,1,'C');

$pdf->Cell('80',5,'Eosinophil',1,0,'C');
$pdf->Cell('30',5,$data['eos'],1,0,'C');
$pdf->Cell('31',5,'%',1,0,'C');
$pdf->Cell('40',5,'0-6.0',1,1,'C');

$pdf->Cell('80',5,'Monocyte',1,0,'C');
$pdf->Cell('30',5,$data['mono'],1,0,'C');
$pdf->Cell('31',5,'%',1,0,'C');
$pdf->Cell('40',5,'1-11',1,1,'C');

$pdf->Cell('80',5,'Basophil',1,0,'C');
$pdf->Cell('30',5,$data['bas'],1,0,'C');
$pdf->Cell('31',5,'%',1,0,'C');
$pdf->Cell('40',5,'0-2',1,1,'C');

$pdf->Cell('80',5,'ESR',1,0,'C');
$pdf->Cell('30',5,$data['esr'],1,0,'C');
$pdf->Cell('31',5,'mm/h',1,0,'C');
$pdf->Cell('40',5,'0-20',1,1,'C');






$pdf->ln(90);

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