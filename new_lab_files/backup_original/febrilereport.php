<?php
$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
require('force_justify1.php');
$pmrn=$_REQUEST['pmrn'];
$id='O'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from febrile where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);

//$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);
$barcode=$data3['barcode'];

$testname=$data['iname'];


$query4 = mysqli_query($db,"select * from radio where iname='$testname'");
$data4 = mysqli_fetch_array($query4);




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
$pdf->Cell('110',5,'Sample Date: '.$data3['retime'],0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data3['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data3['resultstatus'],0,1,'L');

$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);



$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);



$pdf->SetFont('Arial' , 'b' , 10);



$pdf->Cell('80',5,'Particulars',1,0,'C');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');



$pdf->Cell('80',5,'Salmonella Paratyphi A-O (AO)',1,0,'C');
$pdf->Cell('30',5,$data['ao'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');

$pdf->Cell('80',5,'Salmonella Paratyphi A-H (AH)',1,0,'C');
$pdf->Cell('30',5,$data['ah'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');

$pdf->Cell('80',5,'Salmonella Paratyphi B-O (BO)',1,0,'C');
$pdf->Cell('30',5,$data['bo'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');


$pdf->Cell('80',5,'Salmonella Paratyphi B-H (BH)',1,0,'C');
$pdf->Cell('30',5,$data['bh'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');

$pdf->Cell('80',5,'Salmonella typhi-O (TO)',1,0,'C');
$pdf->Cell('30',5,$data['toa'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');


$pdf->Cell('80',5,'Salmonella typhi-H (TH)',1,0,'C');
$pdf->Cell('30',5,$data['th'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');


$pdf->Cell('80',5,'OX2',1,0,'C');
$pdf->Cell('30',5,$data['ox2'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');


$pdf->Cell('80',5,'OX19',1,0,'C');
$pdf->Cell('30',5,$data['ox19'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');


$pdf->Cell('80',5,'OXK',1,0,'C');
$pdf->Cell('30',5,$data['oxk'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');


$pdf->Cell('80',5,'Brucella Melitensis',1,0,'C');
$pdf->Cell('30',5,$data['brum'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');

$pdf->Cell('80',5,'Brucella Abortus',1,0,'C');
$pdf->Cell('30',5,$data['brua'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'<1:80',1,1,'C');



if($data4['interpretation']!='')
{
$pdf->ln(5);

$pdf->MultiCell('180',5,$data4['interpretation'],0,1);

}

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





$pdf->Ln(1);

$pdf->Cell('100',5,$rby1,0,1,'L');



$pdf->Ln(1);

$pdf->Cell('100',5,'Lab Technologist',0,1,'L');



}




$pdf->ln(15);

$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('182',5,'Computer Generated Report, No Signature Required',0,1,'R');


$pdf->Output();