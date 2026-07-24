<?php
// Include the main TCPDF library (search for installation path).
require_once('tcpdf/config/tcpdf_config.php');
require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new  TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 15, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 15);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page
$pdf->AddPage();

$strBNFont = TCPDF_FONTS::addTTFfont('tcpdf/fonts/SolaimanLipi_22-02-2012.ttf', 'TrueTypeUnicode', '', 32, '', 3, 1);
$pdf->SetFont($strBNFont, '', 8, '', 'true');

//$pdf->SetFont('times', '', 8);

$txt = '; স্কাউট হওয়া ভারি মজা ;   ; তোমাদের  জন্য মুক্তিযুদ্ধের গল্প ;';
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

//Close and output PDF document
$pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/' . time() . '.pdf', 'F');

echo $pdf;
