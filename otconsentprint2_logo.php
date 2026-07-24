<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['dname'];
$pro=$_REQUEST['pro'];
$id=$_REQUEST['id'];
$anes=$_REQUEST['anes'];
//$id=$_REQUEST['id'];
$date=date('d/m/Y');


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from otconsent2 where pmrn='$pmrn' and eid='$id' and pro='$pro' and dname='$anes'");
$data = mysqli_fetch_array($query);


$query1 = mysqli_query($db,"select * from ot where pmrn='$pmrn' and id='$id'");
$data1 = mysqli_fetch_array($query1);

//$query1 = mysqli_query($db,"select * from preadm where id='$id'");
//$data1 = mysqli_fetch_array($query1);




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
$this->SetY(-14);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Page'.$this->PageNo().' / (SFMMKPJSH/MR-67)',0,0,'R');

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
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 16);
$pdf->Cell('183',6,'CONSENT FOR MODERATE SEADATION',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('148',5,'S/No:',0,0,'R');
$pdf->Cell('10',5,$data['eid'],0,0,'L');

$pdf->Cell('5',5,$data['tdate1'],0,0,'L');




$pdf->ln(5);

$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('20',5,$data['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('15',5,$data['page'],1,1,'L');

$pdf->Cell('25',5,'Ward:',1,0,'L');
$pdf->Cell('83',5,$data1['room'],1,0,'L');
$pdf->Cell('15',5,'Bed:',1,0,'L');
$pdf->Cell('60',5,$data1['room1'],1,1,'L');

$pdf->ln(5);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('183',5,'I ,'.' '.$data['dname'].' , '.'hereby' ,0,1);
$pdf->ln(2);
$pdf->MultiCell('183',5,'Doctor Performing the Procedure: '.' '.$data['pro'] ,0,1);


$pdf->MultiCell('183',5,'The benefit of moderate sedation is to make the procedure as comfortable as possible. This will help to achieve the goal, Intravenous sedation is often used. Medicines are given through a vein at arm or hand and monitoring devices are continually used to monitor the vital sign such as: blood pressure, heart rhythm and breathing. 
Although common and quite safe, any sedation carries some degree of risk and it is important for you to be aware of these risks prior to consenting to the procedure.

RISKS:
1) Allergic reactions to any of the medications used.
2) Discomfort or bruising at the site where the drugs are placed into a vein.
3) Vein irritation, called phlebitis, where the needle is placed into a vein. Sometimes this may progress to a level where arm or hand motion may be restricted temporarily and further medication or care may be required.
4) Nausea and vomiting, although not common, may occur with intravenous sedation.
5) Intravenous sedation is a serious medical procedure and, carries with it the risk of brain damage, stroke, heart attack or rarely death.
6) There is a risk of depressed respiration "stopped breathing" where it becomes necessary for intubation or placement of a breathing tube.

*) I have been explained about the complications which include serious possible damage to vital organs such as the brain,   Heart, lung, liver, and kidney, and that in  some cases use of these medications may result in paralysis, cardiac arrest.
*) I have been explained about possible problems related to recovery which I understood. 
*) I have been also explained that there are no other alternatives.
*) I have been explained about the outcome, likelihood of success and failure, results of non treatment.

All these have been explained to me /my patient in my own language which I clearly understood.
I have had the opportunity to ask questions, about all aspects of this medical treatment explained to my satisfaction.
',0,1);
$pdf->ln(2);
$pdf->Cell('5',15,'',1,0,'C');
$pdf->Cell('40',15,'',1,0,'C');
$pdf->Cell('25',15,'Signature',1,0,'C');
$pdf->Cell('75',15,'Name(Relation with Patient(if Applicable)',1,0,'C');
$pdf->Cell('20',15,'Date',1,0,'C');
$pdf->Cell('20',15,'Time',1,1,'C');

$pdf->Cell('5',15,'1',1,0,'L');
$pdf->Cell('40',15,'Patient / Legal Gurdian',1,0,'C');
$pdf->Cell('25',15,'',1,0,'L');
$pdf->Cell('75',15,'',1,0,'L');
$pdf->Cell('20',15,'',1,0,'L');
$pdf->Cell('20',15,'',1,1,'L');

$pdf->Cell('5',15,'2',1,0,'L');
$pdf->Cell('40',15,'Witness',1,0,'C');
$pdf->Cell('25',15,'',1,0,'L');
$pdf->Cell('75',15,'',1,0,'L');
$pdf->Cell('20',15,'',1,0,'L');
$pdf->Cell('20',15,'',1,1,'L');

$pdf->Cell('5',15,'3',1,0,'L');
$pdf->Cell('40',15,'Doctor',1,0,'C');
$pdf->Cell('25',15,'',1,0,'L');
$pdf->Cell('75',15,'',1,0,'L');
$pdf->Cell('20',15,'',1,0,'L');
$pdf->Cell('20',15,'',1,1,'L');





$pdf->Output();