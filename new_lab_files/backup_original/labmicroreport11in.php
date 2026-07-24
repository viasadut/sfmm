<?php

$db1 = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db1,'sfmmkpjnew');


$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];
$sno=$_REQUEST['sno'];
$query8= $db->query("select * from iinves where id='$id'");
$data = $query8->Fetch(PDO::FETCH_OBJ);
$sdate=date('d/m/Y H:i:s',strtotime($data->rtime));
//$dname=$data['dname'];
$query2 = $db->query("select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data2 = $query2->Fetch(PDO::FETCH_OBJ);
$dname2=$data2->adoc;

$tt1=$data->code;
$code=$data->barcode1;

$queryc = $db->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

// Print out result


$cr=$resultc->remarks;
$unit=$resultc->unit;



$query3 = mysqli_query($db1,"select * from micro where pmrn='$pmrn' and sno='$sno' order by id desc limit 1");
$data3 = mysqli_fetch_assoc($query3);
$smm1=$data3['mm1'];
$smm2=$data3['mm2'];

$sins1=$data3['ins1'];
$sins2=$data3['ins2'];
$spe=$data3['medi2'];



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
$pdf->Cell('182',6,$data->infusion.' Report',0,1,'C');
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

$pdf->Cell('110',5,'Gender: '.$data->pgender,0,0,'L');
$pdf->Cell('50',5,'Age: '.$data->page,0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$sdate,0,0,'L');
$pdf->Cell('50',5,'Result Time: '.$data->resulttime,0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data->resultstatus,0,1,'L');

$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);
$pdf->SetFont('Times', '',14);
$pdf->Cell('110',5,'SNO-'.$code,0,0,'L');		
//$pdf->SetFont('Times', 'b',14);

$pdf->ln(1);


$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);

$pdf->SetFont('Times', 'B', 10);

$pdf->ln(3);
$pdf->Cell('17',5,'Specimen:',0,0,'L');
$pdf->Cell('100',5,$spe,0,1,'L');



$pdf->ln(5);
$pdf->SetFont('Times', 'BI', 12);
$pdf->Cell('17',5,'Microscopic / Macroscopic:',0,1,'L');

$pdf->ln(3);
$pdf->SetFont('Times', 'B', 10);
$pdf->MultiCell('100',5,$sins1);

if($sins2 !=''){
$pdf->Cell('17',5,'Remarks:',0,1,'L');
$pdf->MultiCell('100',5,$sins2);
}



$pdf->Ln(50);







if($data->conby !='')
{


$rby=$data->resultby;
$query24 = $db->query("select * from user where uname='$rby'");
$data24 = $query24->Fetch(PDO::FETCH_OBJ);
$rby1=$data24->fullname;


$cby=$data->conby;
$query25 = $db->query("select * from user where uname='$cby'");
$data25 = $query25->Fetch(PDO::FETCH_OBJ);
$cby1=$data25->fullname;


$query26 = $db->query("select * from doctor1 where dname='$cby1'");
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


$rby=$data->resultby;
$query24 = $db->query("select * from user where uname='$rby'");
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