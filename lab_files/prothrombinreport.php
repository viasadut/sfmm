<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');

$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew', 'root', 'Godiloveu16');
require('force_justify1.php');
$pmrn = $_REQUEST['pmrn'];
$id = 'I' . $_REQUEST['id'];
$id1 = $_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid = $_REQUEST['eid'];

$db = mysqli_connect('localhost', 'root', 'Godiloveu16');
mysqli_select_db($db, 'sfmmkpjnew');
$query = mysqli_query($db, "select * from prothrombin where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);

//$dname=$data['dname'];
$query2 = mysqli_query($db, "select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($db, "select * from iinves where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);


$barcode = $data3['barcode'];



//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');


$pdf = new PDF_Code128();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4');
$pdf->SetFont('Arial', 'b', 9);
$pdf->SetLeftMargin('17');





$pdf->SetXY(150, 745);
$pdf->Code128(18, 90, $barcode, 40, 10);
$pdf->SetXY(50, 45);





$pdf->ln(1);
$pdf->SetFont('Times', 'bu', 14);
$pdf->Cell('182', 6, $data['iname'] . ' Report', 0, 1, 'C');
$pdf->Ln(2);

$pdf->SetFont('Times', 'b', 14);
$pdf->Cell('30', 5, '_________________________________________________________________________', 0, 1, 'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b', 12);

$pdf->Cell('60', 5, 'Referring Consultant Name: ' . $data2['adoc'], 0, 1, 'L');

$pdf->Ln(4);
$pdf->SetFont('Times', 'b', 10);
$pdf->Cell('110', 5, 'Patient Name: ' . $data2['pname'], 0, 0, 'L');
$pdf->Cell('50', 5, 'MRN: ' . $data2['pmrn'], 0, 1, 'L');

$pdf->Cell('110', 5, 'Gender: ' . $data2['gender'], 0, 0, 'L');
$pdf->Cell('50', 5, 'Age: ' . $data2['age'], 0, 1, 'L');
$pdf->Cell('110', 5, 'Sample Date: ' . $data3['rtime'], 0, 0, 'L');
$pdf->Cell('50', 5, 'Result Time: ' . $data3['resulttime'], 0, 1, 'L');

$pdf->Cell('110', 5, '', 0, 0, 'L');
$pdf->Cell('50', 5, 'Result Status: ' . $data3['resultstatus'], 0, 1, 'L');

$pdf->SetFont('Times', 'b', 14);

$pdf->ln(6);



$pdf->Cell('30', 5, '_________________________________________________________________________', 0, 1, 'L');
$pdf->ln(3);




$pdf->SetFont('Arial', 'b', 10);



$pdf->Cell('80', 5, 'Particulars', 1, 0, 'C');
$pdf->Cell('30', 5, 'Value', 1, 0, 'C');
$pdf->Cell('31', 5, 'Unit', 1, 0, 'C');
$pdf->Cell('40', 5, 'Reference Range', 1, 1, 'C');



$pdf->Cell('80', 5, 'Prothrombin Time', 1, 0, 'C');
$pdf->Cell('30', 5, $data['ptime'], 1, 0, 'C');
$pdf->Cell('31', 5, 'sec', 1, 0, 'C');
$pdf->Cell('40', 5, '11.0-16.0', 1, 1, 'C');

$pdf->Cell('80', 5, 'PT Control(Normal)', 1, 0, 'C');
$pdf->Cell('30', 5, $data['pcontrol'], 1, 0, 'C');
$pdf->Cell('31', 5, 'sec', 1, 0, 'C');
$pdf->Cell('40', 5, '11.5-15.5', 1, 1, 'C');


$pdf->Cell('80', 5, 'PT Ratio', 1, 0, 'C');
$pdf->Cell('30', 5, $data['pratio'], 1, 0, 'C');
$pdf->Cell('31', 5, '', 1, 0, 'C');
$pdf->Cell('40', 5, '0.80-1.20', 1, 1, 'C');

$pdf->Cell('80', 5, '% Activity PT', 1, 0, 'C');
$pdf->Cell('30', 5, $data['pt'], 1, 0, 'C');
$pdf->Cell('31', 5, '%', 1, 0, 'C');
$pdf->Cell('40', 5, '', 1, 1, 'C');

$pdf->Cell('80', 5, 'Internationl Sensitivity Index(ISI)', 1, 0, 'C');
$pdf->Cell('30', 5, $data['isi'], 1, 0, 'C');
$pdf->Cell('31', 5, '', 1, 0, 'C');
$pdf->Cell('40', 5, '', 1, 1, 'C');

$pdf->Cell('80', 5, 'INR', 1, 0, 'C');
$pdf->Cell('30', 5, $data['inr'], 1, 0, 'C');
$pdf->Cell('31', 5, '', 1, 0, 'C');
$pdf->Cell('40', 5, '0.85-1.35', 1, 1, 'C');




$pdf->Ln(55);







// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db1, 'HAEMATOLOGY', (isset($data3['resultby'])?$data3['resultby']:''));
$pdf->Ln(10);

$pdf->Output();
