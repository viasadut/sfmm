<?php
session_start();
$db1 = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db1,'sfmmkpjnew');

$user=$_SESSION["sess_username"];
$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];
$sno='I'.$_REQUEST['id'];
$query3 = mysqli_query($db1,"select * from iinves where pmrn='$pmrn' and eid='$eid' and id='$id'");
$data = mysqli_fetch_array($query3);
$barcode=$data['barcode'];
$sdate=date('d/m/Y H:i:s',strtotime($data["rtime"]));

//$dname=$data['dname'];
$query2 = $db->query("select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data2 = $query2->Fetch(PDO::FETCH_OBJ);
$dname2=$data['dname'];


$adoc=$data2->adoc;

$tt1=$data['code'];
$code=$data['barcode'];

$queryc = $db->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

// Print out result


$cr=$resultc->remarks;
$unit=$resultc->unit;




$query6 = mysqli_query($db1,"select * from micro where pmrn='$pmrn' and sno='$sno' and dstatus!='Deleted'"); 
$data6 = mysqli_fetch_assoc($query6);
$smm1=$data6['mm1'];
$smm2=$data6['mm2'];

$sins1=$data6['ins1'];
$sins2=$data6['ins2'];
$spe=$data6['medi2'];

$sm11=$data6['mm3'];
$sm22=$data6['mm4'];
$smic1=$data6['mic1'];
$smic2=$data6['mic2'];
$cul=$data6['culture'];

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
$pdf->Cell('182',6,$data['infusion'].' Report',0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',12);

$pdf->Cell('60',5,'Referring Consultant Name: '. $adoc,0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '. $data['pname'],0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data['pmrn'],0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data['pgender'],0,0,'L');
$pdf->Cell('50',5,'Age: '.$data['page'],0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$sdate,0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data['resultstatus'],0,1,'L');


$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);

$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);

$pdf->SetFont('Times', 'B', 10);


$pdf->Cell('30',5,'Specimen:',0,0,'L');
$pdf->Cell('100',5,$spe,0,1,'L');

$pdf->Cell('30',5,'Stain:',0,0,'L');
$pdf->Cell('100',5,$data6['stain'],0,1,'L');

$pdf->Cell('30',5,'Culture:',0,0,'L');
$pdf->Cell('100',5,$data6['culture'],0,1,'L');


$pdf->Cell('30',5,'Analysis Time:',0,0,'L');
$pdf->Cell('100',5,$data6['atime'].' Hours',0,1,'L');

$pdf->Cell('30',5,'Final Status:',0,0,'L');
$pdf->Cell('100',5,$data6['fstatus'],0,1,'L');

$pdf->Cell('90',5,'Growth:',0,1,'L');


if($cul=='Negative')
{

if($data['infusion']=='Blood C/S- Aerobic')

{
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'No pathogen is isolated at 37 degree centigrade after 72 hours of aerobic incubation.',0,1,'L');	
}


else if($data['infusion']=='Urine C/S- Aerobic')

{
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'No pathogen is isolated at 37 degree centigrade after 24 hours of aerobic incubation.',0,1,'L');	
}

else if($data['infusion']=='Blood C/S- Aerobic & Anaerobic')

{
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'No pathogen is isolated at 37 degree centigrade after 5 Days of aerobic incubation.',0,1,'L');	
}

else if($data['infusion']=='Anaerobic Blood C/S')

{
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'No pathogen is isolated at 37 degree centrigad after 5 days of anaerobic incubation.',0,1,'L');	
}

else if($data['infusion']=='Anaerobic C/S')

{
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'No pathogen is isolated at 37 degree centigrade after '.' '.$data6['atime'].' Hours'.' of anaerobic incubation.',0,1,'L');	
}

/*else if($data['infusion']=='Anaerobic')

{
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'No pathogen is isolated at 37 degree centigrade after '.' '.$data6['atime'].' Hours'.' of anaerobic incubation.',0,1,'L');	
}*/


else

{
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'No pathogen is isolated at 37 degree centigrade after '.' '.$data6['atime'].' Hours'.' of aerobic incubation.',0,1,'L');	
}


}


else if($cul=='Mixed')
{




$pdf->SetFont('Arial' , 'b' , 10);
$pdf->MultiCell('180',5,'Growth of mixed bacteria probable due to sample contamination. Please repeat a fresh clean catch MSU sample if clinically indicated.');	
}








if($smm1 !=''){
$pdf->Cell('200',5,'ISOLATE-1. '.$smm1.' (Colony Count- '.$sm11.')',0,1,'L');
}

if($smm2 !=''){
$pdf->Cell('200',5,'ISOLATE-2. '.$smm2.' (Colony Count- '.$sm22.')',0,1,'L');
}


$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('90',5,'Susceptiblity Test :',0,0,'L');
if($smm1 !='' and $smm2 !=''){

$pdf->Cell('90',5,'Antibiotic Susceptiblity Testing (AST) :',0,0,'L');

$pdf->Cell('30',5,'MIC/Z            ISOLATE-1            MIC/Z      ISOLATE-2',0,1,'L');
}
if($smm1 !='' and $smm2 =='')
{
	$pdf->Cell('90',5,'Antibiotic Susceptiblity Testing (AST) :',0,0,'L');
$pdf->Cell('30',5,'MIC/Z            ISOLATE-1',0,1,'L');
}


if($sm11 ='' and $smm1 !='')
{
	//$pdf->Cell('90',5,'Susceptiblity Test :',0,0,'L');
//	$pdf->Cell('30',5,'1',0,1,'L');
}



$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);

$count=1;
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');


$query1 = mysqli_query($db,"select * from micro where pmrn='$pmrn' and sno='$sno' and dstatus!='Deleted'");

while($data1 = mysqli_fetch_array($query1))
{




//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('3' , 5,$count.'.',0,0,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('90' , 5,$data1['medi1'],0,0);

if($data1['mm1'] !='' and $data1['mm2'] !=''){
$pdf->Cell('25' , 5,'   '.$data1['mic1'],0,0);
$pdf->Cell('25' , 5,'   '.$data1['ins1'],0,0);
$pdf->Cell('25' , 5,'   '.$data1['mic2'],0,0);
$pdf->Cell('25' , 5,'   '.$data1['ins2'],0,1);

}



else{
$pdf->Cell('30' , 5,     '   '.$data1['mic1'],0,0);
$pdf->Cell('30' , 5,     '   '.$data1['ins1'],0,1);
}


$count++;
$pdf->ln(1);
}

if($data6['ocom']!='')
{
	
$pdf->Cell('30',5,'Other Comments:',0,0,'L');
$pdf->Cell('100',5,$data6['ocom'],0,1,'L');
}



$pdf->Ln(15);


// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db1, '', (isset($data['resultby'])?$data['resultby']:''), (isset($data['checked_by'])?$data['checked_by']:''), (isset($data['conby'])?$data['conby']:''));
$pdf->Ln(10);

$pdf->Output();

?>