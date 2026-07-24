<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
//$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];
$full=$_REQUEST['full'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from endopapp where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_array($query);
$date2=$data['adate'];

$cdate = date('d/m/Y', strtotime($date2));
$yy=date('Y-m-d');

//$dname=$data['dname'];
$query3 = mysqli_query($db,"select * from endohoscharge1 where pmrn='$pmrn' and eid='$eid'");
$data3 = mysqli_fetch_array($query3);


$query4 = mysqli_query($db,"select * from endohoscharge where pmrn='$pmrn' and eid='$eid'");
$data4 = mysqli_fetch_array($query4);



$query5 = mysqli_query($db,"Select * from endomedi where pmrn= '$pmrn' and eid='$eid' and status='Active' and pstatus='Given'order by `id` DESC;");
$data5 = mysqli_fetch_array($query5);




$query6 = mysqli_query($db,"Select * from endoinfusion where pmrn= '$pmrn' and eid='$eid' and status='Given' and status1='Active'order by `id` DESC;");
$data6 = mysqli_fetch_array($query6);




$query7 = mysqli_query($db,"Select * from endostret where pmrn= '$pmrn' and eid='$eid' and status1='' and status='Given'order by `id` DESC;");
$data7 = mysqli_fetch_array($query7);


$query33 = mysqli_query($db,"select * from doctor1 where dname='$full'");
$data33 = mysqli_fetch_array($query33);


$query333 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and eid='$yy'");
$data333 = mysqli_fetch_array($query333);


//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){
$this->Image('logo1.jpg',15,7);
//$this->Image('logo1.jpg',180,7);
$this->SetFont('Arial','B',12);
$this->Cell(190,5,'KPJ SPECIALIZED HOSPITAL',0,0,'C');
//$this->Ln(3);
$this->SetFont('Arial','B',12);
//$this->Cell(195,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',12);
$this->Cell(190,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(10);

}
function footer(){
$this->SetY(-10);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',10);
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561',0,0,'C');


}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('183',6,'List Of Disposable & Medicine Used',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('135',5,'Episode:',0,0,'R');
$pdf->Cell('5',5,$data['eid'],0,0,'L');
$pdf->Cell('20',5,'DATE:',0,0,'R');
$pdf->Cell('23',5,$cdate,0,0,'R');


$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('42',5,'Consultant Name:',0,0,'L');
$pdf->Cell('95',5,$full,0,1,'L');
$pdf->SetFont('Arial','', 11);
$pdf->Cell('42',5);
$pdf->Cell('95',5,$data33['degree'],0,1,'L');
$pdf->Cell('42',3);
$pdf->Cell('80',3,$data33['Discipline'],0,1,'L');
$pdf->SetFont('Arial' , 'b' , 9);

$pdf->ln(6);

$pdf->Cell('25',5,'Patient Name:',1,0,'L');
$pdf->Cell('60',5,$data['pname'],1,0,'L');
$pdf->Cell('15',5,'MRN:',1,0,'L');
$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
$pdf->Cell('20',5,'GENDER:',1,0,'L');
$pdf->Cell('10',5,$data['psex'],1,0,'L');
$pdf->Cell('10',5,'AGE:',1,0,'L');
$pdf->Cell('25',5,$data['page'],1,1,'L');

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 12);

$pdf->Cell('40',5,'Consultant Charge:',0,1,'L');


$pdf->ln(2);
$query1 = mysqli_query($db,"Select * from ivisitendo where pmrn= '$pmrn' and eid='$eid'  order by `id` DESC;");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['infusion'].' - '.$data1['vtype'].' -'.$data1['room'].' BDT' ,0,1);

$pdf->ln(3);
}





$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('182',5,'List Of Medicine Used:',0,1,'L');
$pdf->ln(3);
$query1 = mysqli_query($db,"Select * from endohoscharge1 where pmrn= '$pmrn' and eid='$eid'order by `id` DESC;");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['medi'].' - '.$data1['pdos'].', Code-'.$data1['code'].' Price-'.$data1['price'],0,1);

$pdf->ln(1);
}
//$pdf->Cell('92' , 5,'Dosages',1,1,'C');


$pdf->ln(3);



$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('182',5,'List Of Disposible & Equipment Used:',0,1,'L');
$pdf->ln(3);
$query1 = mysqli_query($db,"Select * from endohoscharge where pmrn= '$pmrn' and eid='$eid'order by `id` DESC;");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['medi'].' - '.$data1['pdos'].' Pcs, Price:'.$data1['price'],0,1);

$pdf->ln(1);
}
//$pdf->Cell('92' , 5,'Dosages',1,1,'C');



$pdf->ln(3);





$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('182',5,'List Of Medicine Ordered:',0,1,'L');
$pdf->ln(3);
$query1 = mysqli_query($db,"Select * from endomedi where pmrn= '$pmrn' and eid='$eid' and status='Active' and pstatus='Given'order by `id` DESC;");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['infusion'].' - '.$data1['instruc'].' Pcs',0,1);

$pdf->ln(1);
}
//$pdf->Cell('92' , 5,'Dosages',1,1,'C');




$pdf->ln(3);





$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('182',5,'List Of Infusion Used:',0,1,'L');
$pdf->ln(3);
$query1 = mysqli_query($db,"Select * from endoinfusion where pmrn= '$pmrn' and eid='$eid' and status='Given' and status1='Active'order by `id` DESC;");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['infusion'].' - '.$data1['infu1'].' Pcs',0,1);

$pdf->ln(1);
}
//$pdf->Cell('92' , 5,'Dosages',1,1,'C');




$pdf->ln(3);





$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('182',5,'List Of Special Treatment Done:',0,1,'L');
$pdf->ln(3);
$query1 = mysqli_query($db,"Select * from endostret where pmrn= '$pmrn' and eid='$eid' order by `id` DESC;");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['infusion'].' - '.$data1['dtime'].' Pcs',0,1);

$pdf->ln(1);
}
//$pdf->Cell('92' , 5,'Dosages',1,1,'C');



$pdf->ln(3);





$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('182',5,'Investigation Request:',0,1,'L');
$pdf->ln(3);
$query1 = mysqli_query($db,"Select * from alltest where pmrn= '$pmrn' and date1='$yy' and location='Endoscopy' order by `id` DESC;");

while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data1['medi'].' - '.$data1['ins'],0,1);

$pdf->ln(1);
}



$pdf->ln(10);

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