<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$ed=$_REQUEST['ed'];

require('db1.php');

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from radio where ittime1='$ed'");
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
$this->SetY(-20);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801703788561 (SFMMKPJSH/OPD/MR-01)',0,0,'C');


}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();

//$pdf->AddFont('SundayMorning','I','SundayMorning.php');


$pdf->AddPage('P','A4',0);


//$pdf->SetFont('SundayMorning','',8);

//$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('22');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'ub' , 15);
$pdf->Cell('183',6,'ADD CODE / CHARGES FORM',0,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);

$pdf->Cell('11',5,'DATE:',0,0,'R');



$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('25',5,'Effective Date:',0,0,'L');
$pdf->Cell('95',5,$ed,0,1,'L');




$pdf->Cell('25',5,'Request For:',0,0,'L');
$pdf->Cell('95',5,$data['type'],0,1,'L');




$pdf->SetFont('Arial','', 11);
$pdf->Cell('42',5);


$pdf->ln(2);



$pdf->ln(6);
$pdf->SetFont('Arial' , 'b' , 7);


$pdf->Cell('20',5,'Code',1,0,'L');

$pdf->Cell('60',5,'Description',1,0,'L');

$pdf->Cell('15',5,'TR/IS',1,0,'L');
$pdf->Cell('15',5,'Reuse',1,0,'L');
$pdf->Cell('15',5,'Cost/ Unit',1,0,'L');
$pdf->Cell('15',5,'P.Price(IP)',1,0,'L');
$pdf->Cell('15',5,'P.Price(OP)',1,0,'L');
$pdf->Cell('15',5,'IP',1,0,'L');
$pdf->Cell('15',5,'OP',1,1,'L');



$pdf->SetFont('Arial' , 'b' , 8);

$count=1;
$query1 = mysqli_query($db,"select * from radio where ittime1='$ed'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);

$pdf->SetFont('Arial' , '' , 6);
$pdf->Cell('20' , 5,$data1['code'],1,0,'L');
$pdf->Cell('60' , 5,$data1['iname'],1,0,'L');
$pdf->Cell('15' , 5,$data1['price'],1,0,'L');
$pdf->Cell('15' , 5,$data1['price'],1,0,'L');
$pdf->Cell('15' , 5,$data1['price'],1,0,'L');
$pdf->Cell('15' , 5,$data1['price'],1,0,'L');
$pdf->Cell('15' , 5,$data1['price'],1,0,'L');
$pdf->Cell('15' , 5,$data1['price'],1,0,'L');
$pdf->Cell('15' , 5,$data1['price'],1,1,'L');

$count++;

}


$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 7);


$pdf->Cell('21',5,'',1,0,'L');

$pdf->Cell('50',5,'Request By: '.' '.$data['aby'],1,0,'L');

$pdf->Cell('57',5,'Verified By: '.' '.$data['cfo'],1,0,'L');

$pdf->Cell('57',5,'Authorized By: '.' '.$data['ceo'],1,1,'L');


$pdf->Cell('21',20,'Signature',1,0,'L');

$pdf->Cell('50',20,'',1,0,'L');

$pdf->Cell('57',20,'',1,0,'L');
$pdf->Cell('57',20,'',1,1,'L');

//$pdf->Image('ceo.jpg'),55,235);
$pdf->Image('ceo1.jpg',145,95);
$pdf->Image('cfo.jpg',95,95);

$pdf->Cell('21',5,'Date',1,0,'L');

$pdf->Cell('50',5,$data['atime'],1,0,'L');

$pdf->Cell('57',5,$data['cfotime'],1,0,'L');

$pdf->Cell('57',5,$data['ceotime'],1,1,'L');

$pdf->ln(6);
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('20',5,'______________________________________________________________',0,1,'L');
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->ln(3);
$pdf->Cell('20',5,'For IT Use',0,1,'L');
$pdf->ln(6);


$pdf->SetFont('Arial' , 'b' , 7);


$pdf->Cell('20',5,'CHR Code',1,0,'L');

$pdf->Cell('60',5,'CHG CLASS',1,0,'L');

$pdf->Cell('15',5,'CHG GROUP',1,0,'L');
$pdf->Cell('15',5,'CGH TYPE',1,0,'L');


$pdf->Cell('15',5,'IP',1,0,'L');
$pdf->Cell('15',5,'OP',1,1,'L');



$pdf->SetFont('Arial' , 'b' , 8);

$count=1;
$query1 = mysqli_query($db,"select * from radio where ittime1='$ed'");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);


$pdf->SetFont('Arial' , '' , 6);
$pdf->Cell('20' , 5,$data1['code'],1,0,'L');
$pdf->Cell('60' , 5,$data1['iname'],1,0,'L');
$pdf->Cell('15' , 5,$data1['price'],1,0,'L');
$pdf->Cell('15' , 5,$data1['price'],1,0,'L');
$pdf->Cell('15' , 5,$data1['price'],1,0,'L');
$pdf->Cell('15' , 5,$data1['price'],1,1,'L');

$count++;

}

$pdf->ln(6);

$pdf->SetFont('Arial' , 'b' , 12);
$pdf->ln(3);
$pdf->Cell('20',5,'Remarks',0,1,'L');

$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('20',5,'______________________________________________________________',0,1,'L');
$pdf->ln(6);


$pdf->SetFont('Arial' , 'b' , 7);


$pdf->Cell('20',5,'CHR Code',1,0,'L');

$pdf->Cell('60',5,'CHG CLASS',1,0,'L');

$pdf->Cell('15',5,'CHG GROUP',1,0,'L');
$pdf->Cell('15',5,'CGH TYPE',1,0,'L');


$pdf->Cell('15',5,'IP',1,0,'L');
$pdf->Cell('15',5,'OP',1,1,'L');

$pdf->ln(10);



$pdf->Cell('70',5,'Done By: '.' '.$data['aby'],1,0,'L');


$pdf->Cell('15',5);
$pdf->Cell('90',5,'Verified By: '.' '.'aby',1,1,'L');



$pdf->Cell('20',20,'Signature',1,0,'L');

$pdf->Cell('50',20,'',1,0,'L');
$pdf->Cell('15',5);
$pdf->Cell('20',20,'Signature',1,0,'L');

$pdf->Cell('70',20,'234',1,1,'L');



$pdf->Cell('20',5,'Date',1,0,'L');

$pdf->Cell('50',5,$data['atime'],1,0,'L');


$pdf->Cell('15',5);



$pdf->Cell('20',5,'Date',1,0,'L');

$pdf->Cell('70',5,'adate',1,0,'L');







$pdf->Output();