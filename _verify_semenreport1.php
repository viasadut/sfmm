<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');

$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','');
require('force_justify1.php');
$pmrn=$_REQUEST['pmrn'];
$id='O'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from semen where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);

//$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);
$barcode=$data3['barcode'];
$sdate=date('d/m/Y H:i:s',strtotime($data3["retime"]));



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
$pdf->SetXY(50,50);




$pdf->ln(1);
$pdf->SetFont('Times', 'bu',14);
$pdf->Cell('182',6,$data3['medi'].' Report',0,1,'C');
//$pdf->Ln(1);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

$pdf->Ln(1);
$pdf->SetFont('Times', 'b',12);

$pdf->Cell('60',5,'Referring Consultant Name: '. $data3['dname'],0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '. $data3['pname'],0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data3['pmrn'],0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data3['pgender'],0,0,'L');
$pdf->Cell('50',5,'Age: '.$data3['page'],0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$sdate,0,0,'L');		
$pdf->Cell('50',5,'Result Time: '.$data3['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data3['resultstatus'],0,1,'L');

$pdf->SetFont('Times', 'b',14);

$pdf->ln(3);



$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);



$pdf->SetFont('Arial' , 'b' , 14);

$pdf->Cell('160',5,'SEMINAL FLUID FOR ANALYSIS(SemenAn2)',0,1,'L');
$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'Particulars',1,0,'C');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Ref. Range'.'(WHO 2021)',1,1,'C');



$pdf->Cell('80',5,'Appearance',1,0,'L');
$pdf->Cell('101',5,$data['ap'],1,1,'L');


$pdf->Cell('80',5,'Volume',1,0,'L');
$pdf->Cell('30',5,$data['vo'],1,0,'L');
$pdf->Cell('31',5,'mL',1,0,'L');
$pdf->Cell('40',5,'2.0-5.0',1,1,'L');



$pdf->Cell('80',5,'Viscosity',1,0,'L');
$pdf->Cell('30',5,$data['vis'],1,0,'L');
$pdf->Cell('31',5,'',1,0,'L');
$pdf->Cell('40',5,'',1,1,'L');


$pdf->Cell('80',5,'Sperm Count',1,0,'L');
$pdf->Cell('30',5,$data['sc'],1,0,'L');
$pdf->Cell('31',5,'million/mL',1,0,'L');
$pdf->Cell('40',5,'>15',1,1,'L');

$pdf->ln(1);


$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('160',5,'Sperm Motility',0,1,'L');
$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'Particulars',1,0,'C');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');



$pdf->Cell('80',5,'Total Motility',1,0,'L');
$pdf->Cell('30',5,$data['sm'],1,0,'L');
$pdf->Cell('31',5,'%',1,0,'L');
$pdf->Cell('40',5,'>40(a+b+c)',1,1,'L');



$pdf->Cell('80',5,'Rapid Progression Motility(a)',1,0,'L');
$pdf->Cell('30',5,$data['rpm'],1,0,'L');
$pdf->Cell('31',5,'%',1,0,'L');
$pdf->Cell('40',5,'',1,1,'L');



$pdf->Cell('80',5,'Slow or Sluggish Forward Progression(b)',1,0,'L');
$pdf->Cell('30',5,$data['sfp'],1,0,'L');
$pdf->Cell('31',5,'%',1,0,'L');
$pdf->Cell('40',5,'',1,1,'L');


$pdf->Cell('80',5,'Non-Progressive Motility(c)',1,0,'L');
$pdf->Cell('30',5,$data['npm'],1,0,'L');
$pdf->Cell('31',5,'%',1,0,'L');
$pdf->Cell('40',5,'',1,1,'L');


$pdf->ln(1);


$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('80',5,'Immotile Sperm',0,0,'L');
$pdf->Cell('30',5,$data['iss'],0,0,'L');
$pdf->Cell('31',5,'%',0,1,'L');

$pdf->ln(1);


$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('160',5,'Sperm Morphology',0,1,'L');
$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'Particulars',1,0,'C');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');



$pdf->Cell('80',5,'Normal Form Sperm',1,0,'L');
$pdf->Cell('30',5,$data['nfss'],1,0,'L');
$pdf->Cell('31',5,'%',1,0,'L');
$pdf->Cell('40',5,'>4',1,1,'L');



$pdf->Cell('80',5,'Head Defect Sperm',1,0,'L');
$pdf->Cell('30',5,$data['hds'],1,0,'L');
$pdf->Cell('31',5,'%',1,0,'L');
$pdf->Cell('40',5,'',1,1,'L');



$pdf->Cell('80',5,'Neck or Midpiece Defect Sperm',1,0,'L');
$pdf->Cell('30',5,$data['nmdf'],1,0,'L');
$pdf->Cell('31',5,'%',1,0,'L');
$pdf->Cell('40',5,'',1,1,'L');


$pdf->Cell('80',5,'Tail Defect Sperm',1,0,'L');
$pdf->Cell('30',5,$data['tds'],1,0,'L');
$pdf->Cell('31',5,'%',1,0,'L');
$pdf->Cell('40',5,'',1,1,'L');


$pdf->Cell('80',5,'Immature Sperm',1,0,'L');
$pdf->Cell('30',5,$data['ims'],1,0,'L');
$pdf->Cell('31',5,'%',1,0,'L');
$pdf->Cell('40',5,'',1,1,'L');



$pdf->ln(1);


$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('80',5,'Sperm Viability',0,0,'L');

$pdf->Cell('30',5,$data['sv'],0,0,'L');
$pdf->Cell('31',5,'%',0,0,'L');
$pdf->Cell('40',5,'>58',0,1,'L');


$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'Particulars',1,0,'C');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');



$pdf->Cell('80',5,'Red Blood Cell(RBC)',1,0,'L');
$pdf->Cell('30',5,$data['rbcf'],1,0,'L');
$pdf->Cell('31',5,'/hpf',1,0,'L');
$pdf->Cell('40',5,'0-5',1,1,'L');



$pdf->Cell('80',5,'Epithelial Cells',1,0,'L');
$pdf->Cell('30',5,$data['ecsf'],1,0,'L');
$pdf->Cell('31',5,'/hpf',1,0,'L');
$pdf->Cell('40',5,'0-5',1,1,'L');



$pdf->Cell('80',5,'White Blood Cell(WBC)',1,0,'L');
$pdf->Cell('30',5,$data['wbcsf'],1,0,'L');
$pdf->Cell('31',5,'/hpf',1,0,'L');
$pdf->Cell('40',5,'0-5',1,1,'L');



$pdf->Cell('80',5,'Cellular Debris',1,0,'L');
$pdf->Cell('30',5,$data['cdsf'],1,0,'L');
$pdf->Cell('31',5,'/hpf',1,0,'L');
$pdf->Cell('40',5,'',1,1,'L');

$pdf->Cell('80',5,'Sperm agglutination',1,0,'L');
$pdf->Cell('30',5,$data['sasf'],1,0,'L');
$pdf->Cell('31',5,'/hpf',1,0,'L');
$pdf->Cell('40',5,'',1,1,'L');

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->ln(1);

$pdf->MultiCell('181',5,'Interpretation: '.$data['inter']);




$pdf->ln(1);

$pdf->MultiCell('181',5,'Advice: '.$data['advice']);

$pdf->Ln(3);


$pdf->SetFont('Arial' , 'b' , 10);




// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db1, 'FLUIDS & EXCREATIONS', (isset($data3['resultby'])?$data3['resultby']:(isset($data['resultby'])?$data['resultby']:'')));
$pdf->Ln(10);

$pdf->Output();
