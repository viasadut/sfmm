<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');

$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
require('force_justify1.php');
//require('code128.php');
$pmrn=$_REQUEST['pmrn'];
$sno=$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
//$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');




$query3 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and id='$id1'");
$data3 = mysqli_fetch_array($query3);
$barcode=$data3['barcode1'];
$bagno=$data3['bagno'];
$sdate=date('d/m/Y H:i:s',strtotime($data3["retime"]));

$query = mysqli_query($db,"select * from bcross1 where bagno='$bagno'");
$data = mysqli_fetch_array($query);


//$dname=$data['dname'];
//$query2 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
//$data2 = mysqli_fetch_array($query2);





$tt1=$data3['code'];


$queryc = $db1->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

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
$pdf->Cell('182',6,$data3['medi'].' Report',0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',12);

$pdf->Cell('60',5,'Referring Consultant Name: '. $data3['dname'],0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Donar Name: '. $data3['pname'],0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data3['pmrn'],0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data3['pgender'],0,0,'L');
$pdf->Cell('50',5,'Age: '.$data3['page'],0,1,'L');

$pdf->Cell('110',5,'Sample Date: '.$sdate,0,0,'L');
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


$pdf->SetFont('Arial' , 'b' , 14);


$pdf->Cell('80',5,'BLOOD DONOR PROFILE',0,0,'L');
$pdf->Cell('80',5,'LOCATION: '.strtoupper($data['location']),0,1,'R');


$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Ln(5);
$pdf->Cell('80',5,'--Haematology--',0,1,'L');

$pdf->Cell('80',5,'Particulars',1,0,'L');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');





$pdf->Cell('80',5,'Haemoglobin',1,0,'L');
$pdf->Cell('30',5,$data['hae'],1,0,'C');
$pdf->Cell('31',5,'g/dL',1,0,'C');
$pdf->Cell('40',5,'13.0-18.0',1,1,'C');
$pdf->Ln(5);

$pdf->Cell('80',5,'--Blood Group--',0,1,'L');



$pdf->Cell('80',5,'Particulars',1,0,'L');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');

$pdf->Cell('80',5,'ABO Group',1,0,'L');
$pdf->Cell('30',5,$data['abo'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');



$pdf->Cell('80',5,'Rhesus (D) Group',1,0,'L');
$pdf->Cell('30',5,$data['rhe'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');


$pdf->Ln(5);

$pdf->Cell('80',5,'--Serology--',0,1,'L');



$pdf->Cell('80',5,'Particulars',1,0,'L');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');




$pdf->Cell('80',5,'VDRL(RPR)',1,0,'L');
$pdf->Cell('30',5,$data['vdrl'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'HIV I/II Antigen / Antibodies',1,0,'L');
$pdf->Cell('30',5,$data['hiv'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'HBs Antigen',1,0,'L');
$pdf->Cell('30',5,$data['hbs'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Anti-HCV',1,0,'L');
$pdf->Cell('30',5,$data['hcv'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Ln(5);

$pdf->Cell('80',5,'--Malarial Parasite Antigen Test --',0,1,'L');



$pdf->Cell('100',5,'Particulars',1,0,'L');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('21',5,'Unit',1,0,'C');
$pdf->Cell('30',5,'Reference Range',1,1,'C');



$pdf->Cell('100',5,'Plasmodium Falciparum Ag(HRP-II P. Falciparum)',1,0,'L');
$pdf->Cell('30',5,$data['plas'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('30',5,'',1,1,'C');

$pdf->Cell('100',5,'Plasmodium Vivax Ag(Specific pLDH P. Vivax)',1,0,'L');
$pdf->Cell('30',5,$data['plas1'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('30',5,'',1,1,'C');






$pdf->Ln(15);







if($data3['cby'] !='')
{
$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');

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

$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$rby=$data3['resultby'];
$query24 = $db1->query("select * from user where uname='$rby'");
$data24 = $query24->Fetch(PDO::FETCH_OBJ);
$rby1=$data24->fullname;


//$cby=$data->cby;
//$query25 = $db->query("select * from user where uname='$cby'");
//$data25 = $query25->Fetch(PDO::FETCH_OBJ);
//$cby1=$data25->fullname;


//$query26 = $db->query("select * from doctor1 where dname='$cby1'");
//$data26 = $query26->Fetch(PDO::FETCH_OBJ);
//$cby3=$data26->Discipline;







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