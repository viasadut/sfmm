<?php
require("fpdf/fpdf.php");  
class PDF1 extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Cell(0,10,'APPLICATION FORM FOR ADMISSION INTO MEDICAL PG DEGREE/DIPLOMA COURSES',0,0,'C');
    $this->Ln(6);
    $this->Cell(0,10,'UNDER MANAGEMENT QUOTA FOR THE ACADEMIC YEAR 2014-2015',0,0,'C');
    $this->Ln(6);
    $this->Cell(0,10,'-----',0,'C');
    // Line break
    $this->Ln(15);
}
}
$link=mysql_connect('localhost','root','Godiloveu16');
mysql_select_db('sfmmkpjnew');
$pdf = new PDF1();
 $pdf->AddPage();
$query=mysql_query("select image from photo where id=14");
$result = mysql_query($link, query);
header("Content-type: image/jpg");
$row=mysql_fetch_row($result);
$name=$row[0];
$pdf->Image($name);

$pdf->Cell(0,500,'image'.$row['image'],0,1);
$pdf->Output();
header('Location: '. ".pdf");
?>