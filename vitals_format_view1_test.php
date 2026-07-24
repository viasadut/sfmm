<?php

require('db1.php');
require_once('tcpdf/tcpdf.php');



class MYPDF extends TCPDF {

    //Page header
    

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'BI', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		//$this->Cell(0, 10, 'Computer Generated Report No Signature Required', 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}





// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Nursing Form');
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
$pdf->SetMargins(10, 10, 15, false);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font

$id=$_REQUEST['id'];
            $pmrn=$_REQUEST['pmrn'];
			$pname=$_REQUEST['pname'];
			$eid=$_REQUEST['eid'];
			$dname=$_REQUEST['dname'];
            $page=$_REQUEST['page'];
			$pgender=$_REQUEST['pgender'];
            
	$date=date('d/m/Y H:i:s');		
			
$query = mysqli_query($con,"select * from vitals_report_format where id='$id'");
            $data = mysqli_fetch_array($query);
                       
            $query3 = mysqli_query($con,"select * from doctor1 where dname='$dname'");
            $data3 = mysqli_fetch_array($query3);                       
            


$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

//$pdf->Write(0, 'Example of HTML tables', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 26);

// -----------------------------------------------------------------------------


$tbl .= 
'
<table width="100%">
                    
					 <tr>
                        <td width="25%" style="text-align: right;"><img src="1.png" style="width:40px;height:40px;"></td>
                        <td width="50%" align="center" style="text-align: center; font-weight: bold; font-size:10px;">SHEIKH FAZILATUNNESA MUJIB MEMORIAL<br>
                        KPJ SPECIALIZED HOSPITAL <br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        <td width="25%" style="text-align: left;"><img src="2.png" style="width:40px;height:40px;"></td>
                    </tr>
					
					
					
                </table>
               

			   
                ';
            
			$pdf->SetFont('helvetica', '', 10);

// -----------------------------------------------------------------------------


$tbl .= 
'


                <table style="border: 1px solid black"  cellspacing="0" cellpadding="1">
                    <tr>
                        <td align="left" width="45%"><b>Patient Name : '.$pname.'</b></td>
                        <td width="15%"><b>MRN :'.$pmrn.'</b></td>
                        <td width="15%"><b>GENDER :</b>'.$pgender.'</td>
                        <td align="right" width="25%"><b>AGE :</b>'.$page.'</td>
                    </tr>
                </table>
            
                <table style="border: 1px solid black; cellspacing:0; cellpadding:=1">
                    <tr>
                       <td align="left" width="50%"><b>Surgeon Name: '.$dname.'</b></td>
                       <td align="right" width="50%"><b>print Date & Time: '.$date.' </b></td>
                    </tr>
                    
                </table>';




				$tbl .= 
'

                <table style"=cellspacing:1;cellpadding:1;">
                    <tr>
                        <td align="left" width="100%"><img src="nursing_form/Daily_Intake.jpg" style="width:800px;height:600px;"></td>
                        
                    </tr>
					
					                    
						
					
					
                </table>';
				
				
				



$pdf->writeHTML($tbl, '',0,'L',false, 0, false, false, 0);

// -----------------------------------------------------------------------------


//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+