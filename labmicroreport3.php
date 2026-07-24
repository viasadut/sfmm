<?php

$db1 = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db1,'sfmmkpjnew');


$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];
$sno=$_REQUEST['sno'];
$query8= $db->query("select * from einves where id='$id'");
$data = $query8->Fetch(PDO::FETCH_OBJ);

//$dname=$data['dname'];
$query2 = $db->query("select * from emergency where pmrn='$pmrn' and eid='$eid'");
$data2 = $query2->Fetch(PDO::FETCH_OBJ);
$dname2=$data->dname;

$tt1=$data->code;
$code=$data->barcode;

$queryc = $db->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

// Print out result


$cr=$resultc->remarks;
$unit=$resultc->unit;



$query6 = mysqli_query($db1,"select * from micro where pmrn='$pmrn' and sno='$sno'");
$data6 = mysqli_fetch_assoc($query6);
$smm1=$data6['mm1'];
$smm2=$data6['mm2'];

$sins1=$data6['ins1'];
$sins2=$data6['ins2'];
$spe=$data6['medi2'];



$query26 = $db->query("select * from patient where pmrn='$pmrn'");
$data26 = $query26->Fetch(PDO::FETCH_OBJ);


//require('code128.php');
require('force_justify1.php');





//$pdf1->AddPage();
$pdf=new PDF_Code128();


$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);

//$pdf1->AddPage();
//$pdf1->SetFont('Arial','',10);


$pdf->Image('logo3.jpg',15,7);
$pdf->Image('logo4.jpg',180,7);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$pdf->Ln(3);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(195,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$pdf->ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$pdf->ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561',0,0,'C');


//$code=$pmrn;
//$code1=$eid;
$pdf->SetXY(150,745);
$pdf->Code128(18,90,$code,40,10);
$pdf->SetXY(50,45);
//$pdf->Write(5,'A set: "'.$code.'"');

$pdf->ln(2);

//$pdf->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Times', 'bu',14);
$pdf->Cell('182',6,$data->medi.' Report',0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',12);

$pdf->Cell('60',5,'Referring Consultant Name: '. $dname2,0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '. $data->pname,0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data->pmrn,0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data26->psex,0,0,'L');
$pdf->Cell('50',5,'Age: '.$data26->page,0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$data->rtime,0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data->resulttime,0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data->resultstatus,0,1,'L');

$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);

$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);

$pdf->SetFont('Times', 'B', 10);


$pdf->Cell('17',5,'Specimen:',0,0,'L');
$pdf->Cell('100',5,$spe,0,1,'L');


$pdf->Cell('90',5,'Organism Test:',0,1,'L');
$pdf->Cell('200',5,'1. '.$sm11.'Growth Of-'.$smm1,0,1,'L');
if($smm2 !=''){
$pdf->Cell('200',5,'2. '.$sm22.'Growth Of-'.$smm2,0,1,'L');
}



$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('90',5,'Susceptibility Data:',0,0,'L');
if($smm1 !='' and $smm2 !=''){
$pdf->Cell('30',5,'1        2',0,1,'L');
}
else 
{
	
	$pdf->Cell('30',5,'1',0,1,'L');
}


$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);

$count=1;
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');


$query1 = mysqli_query($db,"select * from micro where pmrn='$pmrn' and sno='$sno'");

while($data1 = mysqli_fetch_array($query1))
{




//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('3' , 5,$count.'.',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('90' , 5,$data1['medi1'],0,0);
if($data1['mm1'] !='' and $data1['mm2'] !=''){
$pdf->Cell('30' , 5,$data1['ins1'].'        '.$data1['ins2'],0,1);
}

else{
$pdf->Cell('30' , 5,$data1['ins1'],0,1);
}


$count++;
$pdf->ln(1);
}



if(cby=$data->'cby' !='')
{

$db8 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$rby=$data->resultby;
$query24 = $db8->query("select * from user where uname='$rby'");
$data24 = $query24->Fetch(PDO::FETCH_OBJ);
$rby1=$data24->fullname;


$cby=$data->cby;
$query25 = $db8->query("select * from user where uname='$cby'");
$data25 = $query25->Fetch(PDO::FETCH_OBJ);
$cby1=$data25->fullname;


$query26 = $db8->query("select * from doctor1 where dname='$cby1'");
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

$db8 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$rby=cby=$data->resultby;
$query24 = $db8->query("select * from user where uname='$rby'");
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

?>