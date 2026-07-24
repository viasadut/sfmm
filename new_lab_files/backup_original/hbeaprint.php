<?php
//DB
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
//GET Value
$pmrn = $_GET['pmrn'] ?? null;
$eid = $_GET['eid'] ?? null;
$id = $_GET['id'] ?? null;
$sno = $_GET['sno'] ?? null;

if(empty($pmrn) || empty($eid) || empty($id)|| empty($sno)) {
    header('Location: http://192.168.100.252:8081/sfmm');
    exit;
}
//PATIENT TEST DATA
$Rdata = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM hbea WHERE pmrn='$pmrn' and eid='$eid' and sno='$sno' ORDER BY id DESC LIMIT 1"));

$check_sno = $sno;
switch ($check_sno[0]) {
    case 'I':
        $Tdata = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM iinves WHERE pmrn='$pmrn' and eid='$eid' and id='$id' ORDER BY id DESC LIMIT 1"));
        break;
    case 'E':
        $Tdata = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM einves WHERE pmrn='$pmrn' and eid='$eid' and id='$id' ORDER BY id DESC LIMIT 1"));
        break;
    default:     
        $Tdata = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM alltest WHERE pmrn='$pmrn' and eid='$eid' and id='$id' ORDER BY id DESC LIMIT 1"));
}

$barcode=$Tdata['barcode'];
$sdate=date('d/m/Y H:i:s',strtotime($Tdata["retime"] ?? $Tdata["rtime"]));

$resultby= $Tdata['resultby'];
$resultby1= $Tdata['rby'];
$cby=$Tdata['cby'] ;
$conby=$Tdata['conby'];
$rub=mysqli_fetch_assoc(mysqli_query($db,"SELECT sname as name,desig as designation FROM staff3 WHERE status='Active' AND sid IN('$resultby','$resultby1')"));
$rcb=mysqli_fetch_assoc(mysqli_query($db,"SELECT mname as name,designation FROM staff1 WHERE astatus='Active' AND sid IN('$cby','$conby')"));

//PDF
require('fpdf2/code128.php');

$pdf=new PDF_Code128();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4');
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
$pdf->SetTitle('Hb Electrophoresis Analysis Report');

$pdf->SetXY(150,745);
$pdf->Code128(18,85,$barcode,40,10);
$pdf->SetXY(50,40);


$pdf->ln(1);
$pdf->SetFont('Times', 'bu',14);
$pdf->Cell('182',6,'Hb Electrophoresis Analysis'.' Report',0,1,'C');

$pdf->Ln(2);
$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L'); 

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',12);
$pdf->Cell('60',5,'Referring Consultant Name: '. $Tdata['dname'],0,1,'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '.$Tdata['pname'],0,0,'L');
$pdf->Cell('50',5,'MRN: '.$Tdata['pmrn'],0,1,'L');

$pdf->Cell('110',5,'Gender: '.$Tdata['pgender'],0,0,'L');
$pdf->Cell('50',5,'Age: '.$Tdata['page'],0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$sdate,0,0,'L');
$pdf->Cell('50',5,'Result Time: '.$Tdata['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $Tdata['resultstatus'],0,1,'L');

$pdf->SetFont('Times', 'b',14);
$pdf->ln(6);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L'); 

//Chart Image
$pdf->ln(2);
$pdf->Image('hbea-chart/'.$Rdata['chart'], 3, 98, 200, 80);
$pdf->SetY(98 + 80 + 5);

$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('80',5,'Particulars',1,0,'C');
$pdf->Cell('50',5,'Value (%)',1,0,'C');
$pdf->Cell('52',5,'Reference Value (%)',1,1,'C');

$pdf->Cell('80',5,'HB A',1,0,'C');
$pdf->Cell('50',5,$Rdata['a'],1,0,'C');
$pdf->Cell('52',5,'96.1 - 98.5',1,1,'C');

$pdf->Cell('80',5,'HB A2',1,0,'C');
$pdf->Cell('50',5,$Rdata['a2'],1,0,'C');
$pdf->Cell('52',5,'2 - 3.8',1,1,'C');

if($Rdata['c']!=Null){
$pdf->Cell('80',5,'HB C',1,0,'C');
$pdf->Cell('50',5,$Rdata['c'],1,0,'C');
$pdf->Cell('52',5,'-----',1,1,'C');
}

if($Rdata['d']!=Null){
$pdf->Cell('80',5,'HB D',1,0,'C');
$pdf->Cell('50',5,$Rdata['d'],1,0,'C');
$pdf->Cell('52',5,'-----',1,1,'C');
}

if($Rdata['e']!=Null){
$pdf->Cell('80',5,'HB E',1,0,'C');
$pdf->Cell('50',5,$Rdata['e'],1,0,'C');
$pdf->Cell('52',5,'-----',1,1,'C');
}

if($Rdata['f']!=Null){
$pdf->Cell('80',5,'HB F',1,0,'C');
$pdf->Cell('50',5,$Rdata['f'],1,0,'C');
$pdf->Cell('52',5,'=<2.0',1,1,'C');
}

if($Rdata['h']!=Null){
$pdf->Cell('80',5,'HB H',1,0,'C');
$pdf->Cell('50',5,$Rdata['h'],1,0,'C');
$pdf->Cell('52',5,'-----',1,1,'C');
}

if($Rdata['j']!=Null){
$pdf->Cell('80',5,'HB J',1,0,'C');
$pdf->Cell('50',5,$Rdata['j'],1,0,'C');
$pdf->Cell('52',5,'-----',1,1,'C');
}

if($Rdata['o']!=Null){
$pdf->Cell('80',5,'HB O',1,0,'C');
$pdf->Cell('50',5,$Rdata['o'],1,0,'C');
$pdf->Cell('52',5,'-----',1,1,'C');
}

if($Rdata['q']!=Null){
$pdf->Cell('80',5,'HB Q',1,0,'C');
$pdf->Cell('50',5,$Rdata['q'],1,0,'C');
$pdf->Cell('52',5,'-----',1,1,'C');
}

if($Rdata['s']!=Null){
$pdf->Cell('80',5,'HB S',1,0,'C');
$pdf->Cell('50',5,$Rdata['s'],1,0,'C');
$pdf->Cell('52',5,'-----',1,1,'C');
}

if($Rdata['lepore']!=Null){
$pdf->Cell('80',5,'HB Lepore',1,0,'C');
$pdf->Cell('50',5,$Rdata['lepore'],1,0,'C');
$pdf->Cell('52',5,'-----',1,1,'C');
}

if($Rdata['barts']!=Null){
$pdf->Cell('80',5,'HB Barts',1,0,'C');
$pdf->Cell('50',5,$Rdata['barts'],1,0,'C');
$pdf->Cell('52',5,'-----',1,1,'C');
}


$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, 'Comment:', 2, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(162, 5, $Rdata['comment'], 0, 'L');

$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, 'Advice:', 2, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(162, 5, $Rdata['advice'], 0, 'L');


$pdf->Ln(15);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('100',5,'Result Updated By',0,0,'L');
$pdf->Cell('100',5,'Result Confirmed By',0,1,'L');

$pdf->Ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('100',5,$rub['designation'] ?? '',0,0,'L');
$pdf->Cell('100',5,$rcb['designation'] ?? '',0,1,'L');

$pdf->Ln(1);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('100',5,$rub['name'] ?? '',0,0,'L');
$pdf->Cell('100',5,$rcb['name'] ?? '',0,1,'L');


$pdf->ln(5);
$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('182',5,'Computer Generated Report, No Signature Required',0,1,'R');

$pdf->Output('Hb-Electrophoresis-Analysis-Report-'.$Tdata['pmrn'].'.pdf', 'I');
?>