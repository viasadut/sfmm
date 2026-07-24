<?php

require('db1.php');
//require_once('tcpdf/tcpdf.php');
require_once('tcpdf/config/tcpdf_config.php');
require_once('tcpdf/tcpdf.php');




class MYPDF extends TCPDF {

    //Page header
    

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('dejavusansmono', 'BI', 8);
//        $this->Cell(0,10,'これはテストです',0,1);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 10, 'Computer Generated Report No Signature Required', 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }


    public function Header() {
        // Position at 15 mm from bottom
        $this->SetFont('helvetica', '', 26);



        $this->Image('logo.jpg',15,7);
        $this->Image('logo1.jpg',180,7);
        $this->SetFont('helvetica','B',12);
        $this->Cell(170,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
        $this->Ln(3);
        $this->SetFont('helvetica','B',12);
        $this->Cell(165,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
        $this->ln(5);
        $this->SetFont('helvetica','B',12);
        $this->Cell(165,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
        $this->ln(15);
        
    }
}





// create new PDF document
//$pdf = new MYPDF('P', 'mm', 'A4', true, 'UTF-8', false);
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'ISO-639-2', false);
$pdf = new  TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Radiology Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->setPrintHeader(false);
$pdf->SetMargins(25, 10, 10, false);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font

$pmrn=$_REQUEST['pmrn'];
            //$dname=$_REQUEST['dname'];
            
            $type=$_REQUEST['type'];
            $dname=$_REQUEST['dname'];
            $id=$_REQUEST['id'];
            
			
			
            $query = mysqli_query($con,"select * from vitals_report_format where id='$id'");
            $data = mysqli_fetch_array($query);
                       
            $query3 = mysqli_query($con,"select * from doctor1 where dname='$dname'");
            $data3 = mysqli_fetch_array($query3);                       
            


//$pdf->SetFont('helvetica', 'B', 20);

$pdf->SetFont('freesans', '', 8);

// Add custom TTF font
//$pdf->addTTFfont('/tcpdf/fonts/nikosh.ttf', 'TrueTypeUnicode', '', 32);

// Set font
//$pdf->SetFont('nikosh', '', 14);



// add a page
$pdf->AddPage();

//$pdf->Write(0, 'Example of HTML tables', '', 0, 'C', true, 0, false, false, 0);




$pdf->SetFont('helvetica', '', 26);



$pdf->Image('logo.jpg',15,7);
$pdf->Image('logo1.jpg',180,7);
$pdf->SetFont('helvetica','B',12);
$pdf->Cell(170,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$pdf->Ln(3);
$pdf->SetFont('helvetica','B',12);
$pdf->Cell(165,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$pdf->ln(5);
$pdf->SetFont('helvetica','B',12);
$pdf->Cell(165,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$pdf->ln(15);


// -----------------------------------------------------------------------------


/*$tbl .= 
'
<table width="100%">
                    <tr>
                        
                        <td width="100%" align="center" style="font-size:17px;text-decoration: underline;"><b>'.$data['type'].' REPORT</b></td>
                        
                    </tr>
					
                </table>
               

			   
                ';
            
*/			
          // $fontname = $pdf->addTTFfont('tcpdf/fonts/nikosh1.ttf', 'TrueTypeUnicode', '', 32);
//$pdf->SetFont('solaimanlipi_22022012', '', 10);

$strBNFont = TCPDF_FONTS::addTTFfont('tcpdf/fonts/SolaimanLipi_22-02-2012.ttf', 'TrueTypeUnicode', '', 32, '', 3, 1);
// -----------------------------------------------------------------------------
$pdf->SetFont($strBNFont, '', 12, '', 'true');





$tbl .= 
'
<br><br>

                <table style="border: 1px solid black"  cellspacing="0" cellpadding="1">
                    <tr>
                        <td align="left" width="45%"><b>Patient Name : '.$data['pname'].'</b></td>
                        <td width="15%"><b>MRN :'.$data['pmrn'].'</b></td>
                        <td width="15%"><b>GENDER :</b>'.$data['gender'].'</td>
                        <td align="right" width="25%"><b>AGE :</b>'.$data['age'].'</td>
                    </tr>
                </table>
            
               ';




				$tbl .= 
'
<br><br>
                <table style=cellspacing="0" cellpadding="1">
                    <tr>
                        <td align="left">'.$data['report'].'</td>
                        
                    </tr>
					
					                    <tr>
                        <td align="center" style="font-weight:bold">-- End --</td>
						</tr>
						
						
					
					
                </table>';



//$pdf->writeHTML($tbl, '',0,'L',false, 0, false, false, 0);
$pdf->writeHTML($tbl, true, false, true, false, '');

// -----------------------------------------------------------------------------


//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+