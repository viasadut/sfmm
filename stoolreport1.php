<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');

$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
require('force_justify1.php');
$pmrn=$_REQUEST['pmrn'];
$id='O'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from stool where pmrn='$pmrn' and eid='$eid' and sno='$id'");
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
$pdf->Cell('110',5,'Sample Date: '.$sdate,0,0,'L');		
$pdf->Cell('50',5,'Result Time: '.$data3['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data3['resultstatus'],0,1,'L');

$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);



$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);





$pdf->Cell('80',5,'Particulars',1,0,'L');
$pdf->Cell('30',5,'Value',1,0,'C');
$pdf->Cell('31',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');



$pdf->Cell('80',5,'Colour',1,0,'L');
$pdf->Cell('30',5,$data['colors'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Consistency',1,0,'L');
$pdf->Cell('30',5,$data['consis'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Mucus',1,0,'L');
$pdf->Cell('30',5,$data['mucus'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');

$pdf->Cell('80',5,'Blood',1,0,'L');
$pdf->Cell('30',5,$data['blood'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');

$pdf->Cell('80',5,'Helminths',1,0,'L');
$pdf->Cell('30',5,$data['helmin'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'Not Seen',1,1,'C');


$pdf->Cell('80',5,'pH',1,0,'L');
$pdf->Cell('30',5,$data['ph'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Occult Blood',1,0,'L');
$pdf->Cell('30',5,$data['oblood'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');

$pdf->Cell('80',5,'Reducing Substances',1,0,'L');
$pdf->Cell('30',5,$data['rsub'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');


$pdf->Cell('80',5,'Epithelial Cell',1,0,'L');
$pdf->Cell('30',5,$data['ecell'],1,0,'C');
$pdf->Cell('31',5,'/HPF',1,0,'C');
$pdf->Cell('40',5,'<4',1,1,'C');

$pdf->Cell('80',5,'Pus Cell',1,0,'L');
$pdf->Cell('30',5,$data['pcell'],1,0,'C');
$pdf->Cell('31',5,'/HPF',1,0,'C');
$pdf->Cell('40',5,'<5',1,1,'C');

$pdf->Cell('80',5,'RBC',1,0,'L');
$pdf->Cell('30',5,$data['rbc'],1,0,'C');
$pdf->Cell('31',5,'/HPF',1,0,'C');
$pdf->Cell('40',5,'<5',1,1,'C');

$pdf->Cell('80',5,'Macrophage',1,0,'L');
$pdf->Cell('30',5,$data['mac'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'Not Seen',1,1,'C');

$pdf->Cell('80',5,'Fat Globules',1,0,'L');
$pdf->Cell('30',5,$data['fat'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'Not Seen',1,1,'C');

$pdf->Cell('80',5,'Vegetable Cells',1,0,'L');
$pdf->Cell('30',5,$data['veg'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'Not Seen',1,1,'C');

$pdf->Cell('80',5,'Starch Granules',1,0,'L');
$pdf->Cell('30',5,$data['starch'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'Not Seen',1,1,'C');

$pdf->Cell('80',5,'Muscle Fibre',1,0,'L');
$pdf->Cell('30',5,$data['muscle'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'Not Seen',1,1,'C');

$pdf->Cell('80',5,'Yeasts',1,0,'L');
$pdf->Cell('30',5,$data['yeasts'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'Not Seen',1,1,'C');

$pdf->Cell('80',5,'Other',1,0,'L');
$pdf->Cell('30',5,$data['other'],1,0,'C');
$pdf->Cell('31',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');



$pdf->ln(15);

// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db1, 'FLUIDS & EXCREATIONS', (isset($data3['resultby'])?$data3['resultby']:(isset($data['resultby'])?$data['resultby']:'')), (isset($data3['checked_by'])?$data3['checked_by']:''), (isset($data3['cby'])?$data3['cby']:''));
$pdf->Ln(10);

$pdf->Output();