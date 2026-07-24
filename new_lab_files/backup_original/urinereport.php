<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');

$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
require('force_justify1.php');
$pmrn=$_REQUEST['pmrn'];
$id='I'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from urine where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);

//$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($db,"select * from iinves where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);


$barcode=$data3['barcode1'];

$tt1=$data3['code'];
$sdate=date('d/m/Y H:i:s',strtotime($data3["rtime"]));


$queryc = $db1->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);




$pdf=new PDF_Code128();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');






$pdf->SetXY(150,745);
$pdf->Code128(18,87,$barcode,40,10);
$pdf->SetXY(50,45);





$pdf->ln(1);
$pdf->SetFont('Times', 'bu',14);
$pdf->Cell('182',6,$data['iname'].' Report',0,1,'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',12);

$pdf->Cell('60',5,'Referring Consultant Name: '. $data2['adoc'],0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '. $data2['pname'],0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data2['pmrn'],0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data2['gender'],0,0,'L');
$pdf->Cell('50',5,'Age: '.$data2['age'],0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$sdate,0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data3['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data3['resultstatus'],0,1,'L');

$pdf->SetFont('Times', 'b',14);

$pdf->ln(6);
$pdf->SetFont('Times', '',14);
$pdf->Cell('110',5,'SNO-'.$barcode,0,0,'L');		
//$pdf->SetFont('Times', 'b',14);

$pdf->ln(1);


$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
$pdf->ln(3);


$pdf->SetFont('Arial' , 'b' , 10);



$pdf->Cell('70',5,'Particulars',1,0,'C');
$pdf->Cell('50',5,'Value',1,0,'C');
$pdf->Cell('21',5,'Unit',1,0,'C');
$pdf->Cell('40',5,'Reference Range',1,1,'C');



$pdf->Cell('70',5,'Appearance',1,0,'L');
$pdf->Cell('50',5,$data['aurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Clear ',1,1,'C');

if($data['color']!='')
{
$pdf->Cell('70',5,'Colour',1,0,'L');
$pdf->Cell('50',5,$data['color'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Pale Yellow ',1,1,'C');
}

if($data['sediment']!='' and $data['sediment']=='Absent')
{
$pdf->Cell('70',5,'Sediment',1,0,'L');
$pdf->Cell('50',5,$data['sediment'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}

if($data['sediment']!='' and $data['sediment']=='Present')
{
$pdf->Cell('70',5,'Sediment',1,0,'L');
$pdf->Cell('50',5,$data['sedi_v'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}
$pdf->Cell('70',5,'Specific Gravity',1,0,'L');
$pdf->Cell('50',5,$data['surine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'1.002-1.028',1,1,'C');

$pdf->Cell('70',5,'pH',1,0,'L');
$pdf->Cell('50',5,$data['purine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'4.8-7.5',1,1,'C');

$pdf->Cell('70',5,'Protein',1,0,'L');
$pdf->Cell('50',5,$data['prurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');

$pdf->Cell('70',5,'Glucose',1,0,'L');
$pdf->Cell('50',5,$data['gurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');

$pdf->Cell('70',5,'Ketone',1,0,'L');
$pdf->Cell('50',5,$data['kurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');

$pdf->Cell('70',5,'Bilirubin',1,0,'L');
$pdf->Cell('50',5,$data['burine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');


$pdf->Cell('70',5,'Urobilinogen',1,0,'L');
$pdf->Cell('50',5,$data['uurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');



$pdf->Cell('70',5,'WBC',1,0,'L');
$pdf->Cell('50',5,$data['wurine'],1,0,'C');
$pdf->Cell('21',5,'HPF',1,0,'C');
$pdf->Cell('40',5,'0-5 ',1,1,'C');


$pdf->Cell('70',5,'RBC',1,0,'L');
$pdf->Cell('50',5,$data['rurine'],1,0,'C');
$pdf->Cell('21',5,'HPF',1,0,'C');
$pdf->Cell('40',5,'Nil ',1,1,'C');


$pdf->Cell('70',5,'Epithelial Cell',1,0,'L');
$pdf->Cell('50',5,$data['eurine'],1,0,'C');
$pdf->Cell('21',5,'HPF',1,0,'C');
$pdf->Cell('40',5,'0-5 ',1,1,'C');


if($data['curine']=='Positive'){

    $pdf->SetFont('Arial' , 'b' , 12);
    $pdf->Cell('70',5,'Cast',1,0,'L');
    $pdf->SetFont('Arial' , 'b' , 10);
    $pdf->Cell('50',5,$data['curine'],1,0,'C');
    $pdf->Cell('21',5,'',1,0,'C');
    $pdf->Cell('40',5,'Negative',1,1,'C');
    
}

if($data['hyaline_c']!=''){
$pdf->Cell('70',5,'Hayline Cast',1,0,'L');
$pdf->Cell('50',5,$data['hyaline_c'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}
if($data['granular_c']!=''){
$pdf->Cell('70',5,'Granular Cast',1,0,'L');
$pdf->Cell('50',5,$data['granular_c'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}

if($data['wbc']!=''){
$pdf->Cell('70',5,'WBC Cast',1,0,'L');
$pdf->Cell('50',5,$data['wbc'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}
if($data['rbc']!=''){
$pdf->Cell('70',5,'RBC Cast',1,0,'L');
$pdf->Cell('50',5,$data['rbc'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}

if($data['curine']=='Negative'){
   
    $pdf->Cell('70',5,'Cast',1,0,'L');
    $pdf->Cell('50',5,$data['curine'],1,0,'C');
    $pdf->Cell('21',5,'',1,0,'C');
    $pdf->Cell('40',5,'Negative',1,1,'C');
    
}

/*
$pdf->Cell('70',5,'Crystal',1,0,'L');
$pdf->Cell('50',5,$data['crurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');
*/

if($data['crurine']=='Positive'){

    $pdf->SetFont('Arial' , 'b' , 12);
    $pdf->Cell('70',5,'Crystal',1,0,'L');
    $pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('50',5,$data['crurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');
}

if($data['cal_ox']!=''){
    $pdf->Cell('70',5,'Calcium Oxalate',1,0,'L');
    $pdf->Cell('50',5,$data['cal_ox'],1,0,'C');
    $pdf->Cell('21',5,'',1,0,'C');
    $pdf->Cell('40',5,'',1,1,'C');
}

if($data['uric_acid']!=''){
    $pdf->Cell('70',5,'Uric Acid',1,0,'L');
$pdf->Cell('50',5,$data['uric_acid'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}

if($data['triple_phosphate']!=''){
$pdf->Cell('70',5,'Triple Phosphate',1,0,'L');
$pdf->Cell('50',5,$data['triple_phosphate'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}
if($data['c_others']!=''){
$pdf->Cell('70',5,'Others Crystal',1,0,'L');
$pdf->Cell('50',5,$data['c_others'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'',1,1,'C');
}

if($data['crurine']=='Negative'){


    $pdf->Cell('70',5,'Crystal',1,0,'L');
    
$pdf->Cell('50',5,$data['crurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');

}
$pdf->Cell('70',5,'Bacteria',1,0,'L');
$pdf->Cell('50',5,$data['baurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');


$pdf->Cell('70',5,'Yeast',1,0,'L');
$pdf->Cell('50',5,$data['yurine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');


$pdf->Cell('70',5,'Others',1,0,'L');
$pdf->Cell('50',5,$data['ourine'],1,0,'C');
$pdf->Cell('21',5,'',1,0,'C');
$pdf->Cell('40',5,'Negative',1,1,'C');


$pdf->Ln(2);
if($data['comment']!=''){
$pdf->Cell('140',5,'Comments: '.$data['comment'],0,0,'L');
}



$pdf->Ln(6);







if($data3['conby'] !='')
{


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



else 
{


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