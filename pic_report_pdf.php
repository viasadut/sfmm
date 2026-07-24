<?php

require_once('tcpdf/tcpdf.php');
require('db1.php'); // must define $con (mysqli)
/* ============================
   SAMPLE DATA (replace with DB)
============================ */

$id=$_REQUEST['ID'];
//$id=$_REQUEST['id'];
//$queryc  = "SELECT * FROM procedure_reports WHERE id='$id'";
$queryc  = "SELECT * FROM procedure_reports WHERE identity_no='$id'";
$resultc = mysqli_query($con, $queryc);
$row    = mysqli_fetch_assoc($resultc);


$identity_no = $row['identity_no'];

$patient_name = $row['patient_name'];
$mrn = $row['mrn'];
$visit_date = $row['visit_date'];
$age_sex = $row['age_sex'];
$referrer = $row['referrer'];
$bed = $row['bed'];
$instrument = $row['instrument'];

$procedure = $row['procedure_name'];
$indication = $row['indication'];
$medication = $row['medication'];

$surgeon = $row['surgeon_name'];
$procedure_name = $row['procedure_name'];

$details = $row['details_note'];

$comments = $row['comments_text'];


$query1  = "SELECT * FROM doctor1 WHERE dname='$surgeon'";
$result1 = mysqli_query($con, $query1);
$row1    = mysqli_fetch_assoc($result1);

/* ===== Example images ===== */

$image1 = $row['image1'];
$image2 = $row['image2'];
$image3 = $row['image3'];
$image4 = $row['image4'];

/* ============================
   CREATE PDF
============================ */

class MYPDF extends TCPDF {

   public function Header() {

       $logo = 'prescription/prescription/kpj_new_logo_add2.png';

       $this->Image($logo, 60, 8, 90, 15, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

       $this->Ln(15);
   }

}

//$pdf = new TCPDF('P','mm','A4',true,'UTF-8',false);
$pdf = new MYPDF('P','mm','A4',true,'UTF-8',false);

$pdf->SetMargins(10,10,10);
$pdf->SetAutoPageBreak(false);

$pdf->AddPage();

/* ============================
   HEADER
============================ */

$pdf->SetFont('times','B',16);
//$pdf->Cell(0,8,"SHEIKH FAZILATUNNESSA MUJIB MEMORIAL",0,1,'C');

$pdf->SetFont('times','B',14);
//$pdf->Cell(0,7,"KPJ SPECIALIZED HOSPITAL & NURSING COLLEGE",0,1,'C');

$pdf->SetFont('times','',10);
//$pdf->Cell(0,5,"Tetulbaria, Kashimpur, Gazipur, Dhaka, Bangladesh",0,1,'C');

//$pdf->Image('prescription/prescription/kpj_new_logo_add2.png',$x,$y,90,25);
$pdf->Ln(3);

/* ============================
   PATIENT INFORMATION
============================ */
$pdf->Ln(20);
$pdf->SetFont('helvetica','',10);

$html = '
<table border="1" cellpadding="4">
<tr>
<td width="25%"><b>Identity No</b></td>
<td width="25%">'.$identity_no.'</td>
<td width="25%"><b>Visit Date</b></td>
<td width="25%">'.$visit_date.'</td>
</tr>

<tr>
<td><b>Patient Name</b></td>
<td>'.$patient_name.'</td>
<td><b>Age/Sex</b></td>
<td>'.$age_sex.'</td>
</tr>

<tr>
<td><b>MRN</b></td>
<td>'.$mrn.'</td>
<td><b>Bed</b></td>
<td>'.$bed.'</td>
</tr>

<tr>
<td><b>Referrer</b></td>
<td>'.$referrer.'</td>
<td><b>Instrument</b></td>
<td>'.$instrument.'</td>
</tr>
</table>';

$pdf->writeHTML($html);

$pdf->Ln(2);

/* ============================
   PROCEDURE TITLE
============================ */

$pdf->SetFont('times','UB',12);
$pdf->Cell(0,8,"PROCEDURE REPORT",0,1,'C');

$pdf->Ln(2);
$pdf->SetFont('times','B',10);
/* ============================
   LEFT TEXT
============================ */

$left_html = '

<table cellpadding="3">


<tr>
<td width="35%"><b>Surgeon Name :</b></td>
<td>'.$surgeon.'</td>
</tr>

<tr>
<td ><b>Procedure :</b></td>
<td>'.$procedure.'</td>
</tr>

<tr>
<td ><b>Indication :</b></td>
<td>'.$indication.'</td>
</tr>

<tr>
<td ><b>Medication :</b></td>
<td>'.$medication.'</td>
</tr>

<tr><td colspan="2"></td></tr>


<tr>
<td><b>Procedure Name :</b></td>
<td>'.$procedure_name.'</td>
</tr>

<tr>
<td valign="top"><b>Details Note :</b></td>
<td>'.nl2br($details).'</td>
</tr>

<tr>
<td><b>Comments :</b></td>
<td>'.$comments.'</td>
</tr>

</table>
';

$pdf->writeHTMLCell(120,'',10,80,$left_html);

/* ============================
   RIGHT SIDE IMAGES
============================ */

$x = 135;
$y = 80;

$pdf->Image($image1,$x,$y,60,45);
$y += 48;

$pdf->Image($image2,$x,$y,60,45);
$y += 48;

$pdf->Image($image3,$x,$y,60,45);
$y += 48;

$pdf->Image($image4,$x,$y,60,45);

/* ============================
   DOCTOR SIGNATURE
============================ */

$pdf->SetY(260);

$pdf->SetFont('times','B',11);
$pdf->Cell(0,6,$row['surgeon_name'],0,1,'L');

$pdf->SetFont('times','',10);
$pdf->Cell(0,6,$row1['degree'],0,1,'L');
$pdf->SetFont('times','',10);
$pdf->Cell(0,6,$row1['Discipline'],0,1,'L');

/* ============================
   OUTPUT
============================ */

$pdf->Output('procedure_report.pdf','I');

?>