<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');
$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');

require('force_justify1.php');
$pmrn=$_REQUEST['pmrn'];
$id='I'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from gtolerance where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);

//$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);




$query3 = mysqli_query($db,"select * from iinves where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);
$sdate=date('d/m/Y H:i:s',strtotime($data3["rtime"]));

$barcode=$data3['barcode'];




//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
$pdf=new PDF_Code128();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');






$pdf->SetXY(150,745);
$pdf->Code128(18,90,$barcode,40,10);
$pdf->SetXY(50,45);





$pdf->ln(1);
$pdf->SetFont('Times', 'bu',14);
$pdf->Cell('182',6,$data['iname'],0,1,'C');
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


$pdf->SetFont('Arial' , 'b' , 14);





$pdf->Cell('80',5,'--Blood Glucose--',0,1,'L');

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('80',5,'Particulars',0,0,'L');
$pdf->Cell('30',5,'Value',0,0,'C');
$pdf->Cell('31',5,'Unit',0,0,'C');
$pdf->Cell('40',5,'Reference Range',0,1,'C');



$pdf->Cell('80',5,'Glucose, Blood (Fasting)',0,0,'L');
$pdf->Cell('30',5,$data['gfast'],0,0,'C');
$pdf->Cell('31',5,'mmol/L',0,0,'C');
$pdf->Cell('40',5,'3.9 -5.5	 ',0,1,'C');


if($data['gone']!=''){
$pdf->Cell('80',5,'Glucose, Blood (1.0 Hour)',0,0,'L');
$pdf->Cell('30',5,$data['gone'],0,0,'C');
$pdf->Cell('31',5,'mmol/L',0,0,'C');
$pdf->Cell('40',5,'6.7- 9.4 ',0,1,'C');
}
$pdf->Cell('80',5,'Glucose, Blood (2.0 Hour)',0,0,'L');
$pdf->Cell('30',5,$data['gtwo'],0,0,'C');
$pdf->Cell('31',5,'mmol/L',0,0,'C');
$pdf->Cell('40',5,'<7.8 ',0,1,'C');



$pdf->ln(6);

$pdf->SetFont('Arial' , 'b' , 14);

$pdf->Cell('80',5,'--Urine Glucose--',0,1,'L');

$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('80',5,'Particulars',0,0,'L');
$pdf->Cell('30',5,'Value',0,0,'C');
$pdf->Cell('31',5,'Unit',0,0,'C');
$pdf->Cell('40',5,'Reference Range',0,1,'C');


$pdf->Cell('80',5,'Glucose, Urine (Fasting)',0,0,'L');
$pdf->Cell('30',5,$data['gufast'],0,0,'C');
$pdf->Cell('31',5,'',0,0,'C');
$pdf->Cell('40',5,'Negative',0,1,'C');

if($data['guone']!=''){
$pdf->Cell('80',5,'Glucose, Urine (1.0 Hour)',0,0,'L');
$pdf->Cell('30',5,$data['guone'],0,0,'C');
$pdf->Cell('31',5,' ',0,0,'C');
$pdf->Cell('40',5,'Negative',0,1,'C');
}
$pdf->Cell('80',5,'Glucose, Urine (2.0 Hour)',0,0,'L');
$pdf->Cell('30',5,$data['gutwo'],0,0,'C');
$pdf->Cell('31',5,'',0,0,'C');
$pdf->Cell('40',5,'Negative',0,1,'C');


$pdf->ln(15);

if($data3['cby'] !='')
{


$rby=$data3['resultby'];
$query24 = $db1->query("select * from user where uname='$rby'");
$data24 = $query24->Fetch(PDO::FETCH_OBJ);
$rby1=$data24->fullname;


$cby=$data3['cby'];
$query25 = $db1->query("select * from user where uname='$cby'");
$data25 = $query25->Fetch(PDO::FETCH_OBJ);
$cby1=$data25->fullname;


$query26 = $db1->query("select * from doctor1 where dname='$cby1'");
$data26 = $query26->Fetch(PDO::FETCH_OBJ);
$cby3=$data26->Discipline;







$pdf->Cell('100',5,'Result Updated By',0,0,'L');

$pdf->Cell('100',5,'Result Confirmed By',0,1,'L');



$pdf->Ln(1);

$pdf->Cell('100',5,$rby1,0,0,'L');

$pdf->Cell('100',5,$cby1,0,1,'L');

$pdf->Ln(1);

$pdf->Cell('100',5,'Lab Technologist',0,0,'L');

$pdf->Cell('100',5,$cby3,0,1,'L');

}



else 
{


$rby=$data3['resultby'];
$query24 = $db1->query("select * from user where uname='$rby'");
$data24 = $query24->Fetch(PDO::FETCH_OBJ);
$rby1=$data24->fullname;






$pdf->Cell('100',5,'Result Updated By',0,1,'L');

//$pdf->Cell('100',5,'Result Confirmed By',0,1,'L');



$pdf->Ln(1);

$pdf->Cell('100',5,$rby1,0,1,'L');

//$pdf->Cell('100',5,$cby1,0,1,'L');

$pdf->Ln(1);

$pdf->Cell('100',5,'Lab Technologist',0,1,'L');

//$pdf->Cell('100',5,$cby3,0,1,'L');

}




$pdf->ln(15);

$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('182',5,'Computer Generated Report, No Signature Required',0,1,'R');



$pdf->Output();