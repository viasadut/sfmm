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
		$this->Cell(0, 10, 'Computer Generated Report No Signature Required', 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}





// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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
$pdf->SetMargins(20, 30, 10, false);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font


            //$dname=$_REQUEST['dname'];
            
            $id=$_REQUEST['id'];
			
			
$query = mysqli_query($con,"select * from patient_pic where id='$id'");
            $data = mysqli_fetch_array($query);
            $did=$data['add_by']; 
$pmrn=$data['pmrn'];			
            $query4 = mysqli_query($con,"select * from doctor where sid='$did'");
            $data4 = mysqli_fetch_array($query4);
$dname=$data4['dname'];			
			$query3 = mysqli_query($con,"select * from doctor1 where dname='$dname'");
			
            $data3 = mysqli_fetch_array($query3);                       
            
			$query5 = mysqli_query($con,"select * from patient where pmrn='$pmrn'");
            $data5 = mysqli_fetch_array($query5);                       
            


$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

//$pdf->Write(0, 'Example of HTML tables', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 26);
$image4 = 'cam_test/upload/'.$data['image'];
$image5 = "cfo.jpg";

//$pdf->Cell('50',20,'jkh',1,0,'L');



$pdf->Image($image4, 60, 80, 100, 100, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// test fitbox with all alignment combinations



// -----------------------------------------------------------------------------


$tbl .= 
'
<table width="100%">
                    <tr>
                        
                        <td width="100%" align="center" style="font-size:17px;text-decoration: underline;"><b>'.$data['type'].' REPORT</b></td>
                        
                    </tr>
					
                </table>
               
<br><br><br>
			   
                <table width="100%">
                    <tr>
                        <td width="25%" style="font-weight: bold !important;font-size:14px;" align="left"><b>Consultant Name:</b></td>
                        <td width="75%" style="font-weight: bold !important;font-size:14px;" align="left"><b>'.$data3['dname'].'</b></td>
                    </tr>
                    <tr>
                        <td width="25%" align="left"></td>
                        <td width="75%" style="font-weight: bold !important;font-size:10px;" align="left"><b>'.$data3['degree'].'</b></td>
                    </tr>
                    <tr>
                        <td width="25%"align="left"></td>
						<td width="75%"style="font-weight: bold !important;font-size:10px;" align="left">
						
						<b>'.$data3['Discipline'].'</b>
						
						
						</td>
                        
                    </tr>
                </table>';
            
			$pdf->SetFont('helvetica', '', 10);

// -----------------------------------------------------------------------------


$tbl .= 
'
<br><br>

                <table style="border: 1px solid black"  cellspacing="0" cellpadding="1">
                    <tr>
                        <td align="left" width="45%"><b>Patient Name : '.$data5['pname'].'</b></td>
                        <td width="15%"><b>MRN :'.$data5['pmrn'].'</b></td>
                        <td width="15%"><b>GENDER :</b>'.$data5['psex'].'</td>
                        <td align="right" width="25%"><b>AGE :</b>'.$data5['age'].'</td>
                    </tr>
                </table>
            
                <table style="border: 1px solid black; cellspacing:0; cellpadding:=1">
                    <tr>
                       <td align="left" width="50%"><b>Referral From: '.$data3['dname'].'</b></td>
                       <td align="right" width="50%"><b>Reporting Date & Time: '.$data['add_time'].' '.$data['time'].'</b></td>
                    </tr>
                </table>';




				$tbl .= 
'
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
                <table style=cellspacing="0" cellpadding="1">
                    <tr>
                        <td align="left">'.$data['remarks'].'</td>
                        
                    </tr>
					
					                    <tr>
                        <td align="center" style="font-weight:bold">-- Report End --</td>
						
						
						<td>
						
						
						</td>
						</tr>
						
						
					
					
                </table>';



$pdf->writeHTML($tbl, '',0,'L',false, 0, false, false, 0);

// -----------------------------------------------------------------------------


//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+