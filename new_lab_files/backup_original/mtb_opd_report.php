<?php


$db2 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');


$db = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
$sno='O'.$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$query8= $db->query("select * from alltest where id='$id'");
$data = $query8->Fetch(PDO::FETCH_OBJ);

//$dname=$data['dname'];
$query2 = $db->query("select * from mtb where sno='$sno'");
$data2 = $query2->Fetch(PDO::FETCH_OBJ);
$dname2=$data->dname;

$tt1=$data->code;
$code=$data->barcode;

$queryc = $db->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

// Print out result


$cr=$resultc->remarks;
$unit=$resultc->unit;
$inter=$resultc->interpretation;
//require('code128.php');


$query3 = $db->query("select * from pappnew where pmrn='$pmrn'");
$data3 = $query3->Fetch(PDO::FETCH_OBJ);

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
$pdf->Cell('182',6,$data->medi.' Report',0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',12);

$pdf->Cell('60',5,'Referring Consultant Name: '. $data->dname,0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '. $data->pname,0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data->pmrn,0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data->pgender,0,0,'L');
$pdf->Cell('50',5,'Age: '.$data->page,0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$data->retime,0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data->resulttime,0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data->resultstatus,0,1,'L');

$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);

$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);

$pdf->SetFont('Times', 'B', 12);

$pdf->ln(5);
$pdf->Cell(90,5,'Investigation Name',1,0,'L');
$pdf->Cell(90,5,'Result ',1,1,'C');
$pdf->Cell(90,5,$data->medi ,1,0,'L');
$pdf->Cell(90,5,$data2->type ,1,1,'C');
$pdf->ln(7);


$pdf->Cell(100,5,'Specimen Tested: '. $data2->s_test ,0,1,'L');
$pdf->ln(2);
$pdf->Cell(100,5,'Test Advised: '. $data2->result ,0,1,'L');
$pdf->ln(2);
$pdf->Cell(100,5,'Method used: '. $data2->crate ,0,1,'L');
$pdf->ln(5);

$pdf->Cell(100,5,'Note:',0,1,'L');
$pdf->SetFont('Times', '', 12);

$pdf->MultiCell(180,5,$data2->opinion);

$pdf->SetFont('Times', 'b', 12);
$pdf->ln(10);

$pdf->Cell(90,5,'Test Platform:',0,1,'L');

$pdf->SetFont('Times', '', 12);
$pdf->ln(2);

$pdf->MultiCell(180,5,'PCR kit	: CE marked kit
Extraction	: ExiprepTM 16 Dx, Bioneer corporation, Republic of korea
Amplification	: Exicycler TM 96, Bioneer corporation, Republic of korea
Specificity	: All M. Tuberculosis complex
Primer/Probe	: Temra
');




$pdf->Ln(15);



$pdf->SetFont('Times', 'b', 12);



if($data->cby !='')
{


$rby=$data->resultby;
$query24 = $db2->query("select * from user where uname='$rby'");
$data24 = $query24->Fetch(PDO::FETCH_OBJ);
$rby1=$data24->fullname;


$cby=$data->cby;
$query25 = $db2->query("select * from user where uname='$cby'");
$data25 = $query25->Fetch(PDO::FETCH_OBJ);
$cby1=$data25->fullname;


$query26 = $db2->query("select * from doctor1 where dname='$cby1'");
$data26 = $query26->Fetch(PDO::FETCH_OBJ);
$cby3=$data26->Discipline;







$pdf->Cell('60',5,'Result Updated By',0,0,'L');

$pdf->Cell('60',5,'Result Checked By',0,0,'L');

$pdf->Cell('60',5,'Result Confirmed By',0,1,'L');





$pdf->Cell('60',5,$rby1,0,0,'L');

$pdf->Cell('60',5,'Rahima Akter Rita',0,0,'L');

$pdf->Cell('60',5,$cby1,0,1,'L');



$pdf->Cell('60',5,'Lab Technologist',0,0,'L');
$pdf->Cell('60',5,'Biochemist',0,0,'L');

$pdf->Cell('60',5,$cby3,0,1,'L');

}



else 
{


$rby=$data->resultby;
$query24 = $db2->query("select * from user where uname='$rby'");
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





$pdf->Cell('100',5,$rby1,0,1,'L');

//$pdf->Cell('100',5,$cby1,0,1,'L');



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