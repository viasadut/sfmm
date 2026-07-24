<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');
require('db1.php');
$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
//require('force_justify.php');
require('force_justify1.php');
$pmrn=$_REQUEST['pmrn'];
$sno=$_REQUEST['sno'];
$id1=$_REQUEST['bagno'];

$remaining   = substr($sno, 1);
//$date=$_REQUEST['date'];
//$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from bcross where pmrn='$pmrn'and sno='$sno'");
$data = mysqli_fetch_array($query);

$querya = mysqli_query($db,"select * from bcross1 where sno='$sno'");
$data1 = mysqli_fetch_array($querya);
$pmrn3=$data1['pmrn'];

$queryx = mysqli_query($db,"select * from inpatient where pmrn='$pmrn3'");
$datax = mysqli_fetch_array($queryx);



$sel_query50="Select COUNT(id) from bcross1 where sno='$sno'";
$result50 = mysqli_query($con, $sel_query50) or die(mysqli_error());
$row50 = mysqli_fetch_array($result50);
$qty=$row50['COUNT(id)'];


//$dname=$data['dname'];
//$query2 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
//$data2 = mysqli_fetch_array($query2);

//$query3 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and bagno='$id1'");
$query3 = mysqli_query($db,"select * from alltest where id='$remaining'");
$data3 = mysqli_fetch_array($query3);
$barcode=$data3['barcode1'];

$sdate=date('d/m/Y H:i:s',strtotime($data3["retime"]));

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
$pdf->Cell('110',5,'Patient Name: '. $datax['pname'],0,0,'L');
$pdf->Cell('50',5,'MRN: '.$datax['pmrn'],0,1,'L');

$pdf->Cell('110',5,'Gender: '.$datax['gender'],0,0,'L');
$pdf->Cell('50',5,'Age: '.$datax['age'],0,1,'L');

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





$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Ln(5);
$pdf->Cell('50',5,$data1['btype'],1,0,'L');
$pdf->Cell('40',5,$qty,1,1,'L');
//$pdf->SetFont('Arial' , 'b' , 14);
//$pdf->Cell('80',5,'LOCATION: '.strtoupper($data1['location']),0,1,'R');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Ln(3);
$pdf->Cell('80',5,'Blood Grouping',0,1,'L');

$pdf->Cell('20',5,'Anti-A',1,0,'L');
$pdf->Cell('20',5,'Anti-B',1,0,'C');
$pdf->Cell('20',5,'Anti-AB',1,0,'C');
$pdf->Cell('20',5,'A Cells',1,0,'C');
$pdf->Cell('20',5,'B Cells',1,0,'C');
$pdf->Cell('20',5,'O Cells',1,0,'C');
$pdf->Cell('25',5,'ABO Group',1,0,'C');
$pdf->Cell('40',5,'Rhesus(D) Group',1,1,'C');





$pdf->Cell('20',5,$data['antia'],1,0,'C');
$pdf->Cell('20',5,$data['antib'],1,0,'C');
$pdf->Cell('20',5,$data['antiab'],1,0,'C');
$pdf->Cell('20',5,$data['acell'],1,0,'C');
$pdf->Cell('20',5,$data['bcell'],1,0,'C');
$pdf->Cell('20',5,$data['ocell'],1,0,'C');
$pdf->Cell('25',5,$data['group1'],1,0,'C');
$pdf->Cell('40',5,$data['rhd'],1,1,'C');
$pdf->Ln(5);


$pdf->Ln(3);

$pdf->Cell('80',5,'Compatibility Test',0,1,'L');

$pdf->SetFont('Arial' , 'b' , 8);
$pdf->Cell('8',5,'S/NO',1,0,'L');
$pdf->Cell('45',5,'Component',1,0,'L');
$pdf->Cell('50',5,'Blood Bag No',1,0,'C');
$pdf->Cell('15',5,'Sal(RT)',1,0,'C');
$pdf->Cell('15',5,'37c',1,0,'C');
$pdf->Cell('15',5,'Alb',1,0,'C');
$pdf->Cell('15',5,'AHG',1,0,'C');
$pdf->Cell('25',5,'Result',1,1,'C');



$pdf->SetFont('Arial' , 'b' , 8);


$count=1;
$query11 = mysqli_query($db,"select * from bcross1 where sno='$sno'");

while($data11 = mysqli_fetch_array($query11))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , 'b' , 8);
$pdf->Cell('8' , 5,$count.'.',1,0,'L');



$pdf->Cell('45',5,$data11['btype'],1,0,'L');
$pdf->Cell('50',5,$data11['abo'].' / '.$data11['bagno'],1,0,'C');
$pdf->Cell('15',5,$data11['sal'],1,0,'C');
$pdf->Cell('15',5,$data11['cc'],1,0,'C');
$pdf->Cell('15',5,$data11['alb'],1,0,'C');
$pdf->Cell('15',5,$data11['ahg'],1,0,'C');
$pdf->Cell('25',5,$data11['result'],1,1,'C');
$count++;
}




$pdf->Ln(5);



$pdf->Cell('15',5,'Remarks: ',0,0,'L');
$pdf->MultiCell('170',5,$data1['remarks']);



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