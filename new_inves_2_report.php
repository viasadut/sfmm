<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');

$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
//require('force_justify.php');
require('force_justify1.php');
$pmrn=$_REQUEST['pmrn'];
$id='I'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from b_gas_a where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);


//$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($db,"select * from iinves where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);
$barcode=$data3['barcode'];



$tt1=$data3['code'];


$queryc = $db1->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');



$pdf=new PDF_Code128();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);




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
$pdf->Cell('110',5,'Sample Date: '.$data3['rtime'],0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data3['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data3['resultstatus'],0,1,'L');

$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);



$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);


//$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('40',5,'Referral From:',1,0,'L');
//$pdf->Cell('141', 5,$data['dreffer'],1,1,'L');

$pdf->ln(3);


$pdf->SetFont('Arial' , 'b' , 10);



$pdf->Cell('80',5,'Particulars',1,0,'C');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,1,'C');




$pdf->Cell('80',5,'Ph',1,0,'C');
$pdf->Cell('30',5,$data['ph'],1,0,'C');
$pdf->Cell('31',5,'g/dL',1,1,'C');



 
$pdf->Cell('80',5,'PCO2',1,0,'C');
$pdf->Cell('30',5,$data['pco2'],1,0,'C');
$pdf->Cell('31',5,'mmHg',1,1,'C');




$pdf->Cell('80',5,'PO2',1,0,'C');
$pdf->Cell('30',5,$data['po2'],1,0,'C');
$pdf->Cell('31',5,'mmHg',1,1,'C');



$pdf->Cell('80',5,'BEecf',1,0,'C');
$pdf->Cell('30',5,$data['beecf'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,1,'C');



$pdf->Cell('80',5,'HCO3',1,0,'C');
$pdf->Cell('30',5,$data['hco3'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,1,'C');



$pdf->Cell('80',5,'TCO2',1,0,'C');
$pdf->Cell('30',5,$data['tco2'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,1,'C');



$pdf->Cell('80',5,'sO2',1,0,'C');
$pdf->Cell('30',5,$data['so2'],1,0,'C');
$pdf->Cell('31',5,'%',1,1,'C');



$pdf->Cell('80',5,'Na',1,0,'C');
$pdf->Cell('30',5,$data['na'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,1,'C');



$pdf->Cell('80',5,'K',1,0,'C');
$pdf->Cell('30',5,$data['k'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,1,'C');



$pdf->Cell('80',5,'iCa',1,0,'C');
$pdf->Cell('30',5,$data['ica'],1,0,'C');
$pdf->Cell('31',5,'mmol/L',1,1,'C');



$pdf->Cell('80',5,'Glu',1,0,'C');
$pdf->Cell('30',5,$data['glu'],1,0,'C');
$pdf->Cell('31',5,'mg/dL',1,1,'C');



$pdf->Cell('80',5,'Hct',1,0,'C');
$pdf->Cell('30',5,$data['hct'],1,0,'C');
$pdf->Cell('31',5,'%PCV',1,1,'C');



$pdf->Cell('80',5,'Hb',1,0,'C');
$pdf->Cell('30',5,$data['hb'],1,0,'C');
$pdf->Cell('31',5,'g/dL',1,1,'C');




$pdf->Ln(15);



$pdf->SetTextColor(000,0,0);








if($data3['conby'] !='')
{
$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');

$rby=$data3['resultby'];
$query24 = $db1->query("select * from user where uname='$rby'");
$data24 = $query24->Fetch(PDO::FETCH_OBJ);
$rby1=$data24->fullname;


$cby=$data3['conby'];
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




$pdf->Output();