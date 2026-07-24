<?php

require('db1.php');
require_once('tcpdf/tcpdf.php');

$mother="Mother's Name";
$father="Father's Name";

class MYPDF extends TCPDF {

    //Page header
    public function Header() {

        $this->allowLocalFiles = true;

		// Logo
		//$image_file = K_PATH_IMAGES.'xampp/htdocs/sfmm/logo1.jpg';
		//$this->Image('logo1.jpg');
        //$this->Ln(50);
        $this->Image('kpj_logo.jpeg', 20, 30, 40, 20, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        

		// Set font
		$this->SetFont('Courier', 'B', 20);
		// Title
        $this->Ln(5);
		$this->Cell(0, 20, '     KPJ SPECILAIZED HOSPITAL', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(8);
        $this->SetFont('Courier', '', 12);
        $this->Cell(0, 15, '         C/12, Tetuibari Kashimpur, Gazipur, Bangladesh', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        
	}

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'BI', 8);
        // Page number
        //$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 10, 'Contact Numbers: Ambulance: +880244077029, +8801896317401, Appointments: +880244077030, +8801703788561 (KPJDHAKA/NSG/MR-30)', 0, false, 'R', 0, '', 0, false, 'T', 'M');
//        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

    }
}





// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(216, 279), true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Birth Certificate');
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

//$pdf->setPrintHeader(true);
//$pdf->setPrintFooter(true);
$pdf->SetMargins(20, 30, 10, false);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font

$pmrn=$_REQUEST['pmrn'];
            $dname=$_REQUEST['dname'];
            
            $eid=$_REQUEST['eid'];
            $id=$_REQUEST['id'];
			
			
$query = mysqli_query($con,"select * from birth where pmrn='$pmrn' and eid='$eid'and status!='Waiting For Approval'");
            $data = mysqli_fetch_array($query);
                       
            $iby=$data['iby'];

            $query1 = mysqli_query($con,"select * from user where uname='$iby'");
            $data1 = mysqli_fetch_array($query1);
            $full=$data1['fullname']; 


//$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

//$pdf->Write(0, 'Example of HTML tables', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('Courier', '', 26);

// -----------------------------------------------------------------------------


$tbl .= 
'<div style="border:.5px black;width:800px;display: block;padding-left: 40px;">
<br /><br /><br /><br /><br />
<table width="100%" border="0">
                    <tr>
                        
                        <td width="100%" align="center" style="font-size:26px;font-family:Courier;text-decoration:underline"><b>BIRTH CERTIFICATE</b></td>
                        
                    </tr>
					
                </table>
               

';
            
			$pdf->SetFont('helvetica', '', 10);

// -----------------------------------------------------------------------------


$tbl .= 
'
<br><br>

                <table   cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="left" width="70%"><b>Certificate Serial NO: SFMM-'.$data['year'].'/'.$data['id'].'</b></td>
                        
                        <td width="12%" align="right"><b>Issue Date:</b></td>
                        <td width="2%" align="right"><b></b></td>
                        <td width="10%" align="right"><b>'.$data['idate'].'</b></td>
                    </tr>
                </table>
            
                ';




				$tbl .= 
'
<br><br>
<table   style="border-collapse: separate;border-spacing: 0 10px;">
<tr>
    <td align="left" width="20%"><b>Name Of The Child:</b></td>
    <td align="left" width="5%"><b>:</b></td>
    <td width="32%" align="left"><b>'.strtoupper($data['bname']).'</b></td>

    <td align="left" width="7%"><b>MRN:</b></td>
    
    <td width="14%" align="left"><b>'.$data['pmrn'].'</b></td>
';

if($data['sex']=='M'){

$tbl .='
<td align="left" width="6%"><b>Sex:</b></td>
    <td width="14%" align="left"><b>Male</b></td>';
}


else if($data['sex']=='F'){

    $tbl .='
    <td align="left" width="6%"><b>Sex:</b></td>
        <td width="14%" align="left"><b>Female</b></td>';
    }
    
$tbl .='
    
</tr>

<tr>
    <td align="left" width="25%"><b>Date & Time Of Birth &nbsp;:</b></td>
    
    <td width="25%" align="left"><b>'.$data['bdate'].' At '.$data['btime'].'</b></td>
    <td width="20%" align="left"></td>
    <td align="left" width="14%"><b>Birth Weight:</b></td>
    <td width="11%" align="left"><b>'.$data['weight'].' KG</b></td>
</tr>

<tr>
    <td align="left" width="20%"><b>'.$mother.'</b></td>
    <td align="left" width="5%"><b>:</b></td>
    <td width="45%" align="left"><b>'.$data['mname'].' </b></td>
    <td width="7%" align="left"></td>
    <td align="left" width="7%"><b>MRN:</b></td>
    <td width="15%" align="left"><b>'.$data['mo_mrn'].'</b></td>
</tr>

<tr>
    <td align="left" width="20%"><b>Nationality</b></td>
    <td align="left" width="5%"><b>:</b></td>
    <td width="45%" align="left"><b>'.$data['mo_nationality'].' </b></td>
    <td width="4%" align="left"></td>
    <td align="left" width="10%"><b>Religion:</b></td>
    <td width="13%" align="left"><b>'.$data['mo_religion'].'</b></td>
</tr>

<tr>
    <td align="left" width="20%"><b>Passport</b></td>
    <td align="left" width="5%"><b>:</b></td>
    <td width="43%" align="left"><b>'.$data['mo_passport'].' </b></td>
    
    <td align="left" width="16%"><b>National ID NO:</b></td>
    <td width="18%" align="left"><b>'.$data['mo_national_id'].'</b></td>
</tr>


<tr>
    <td align="left" width="20%"><b>Present Address</b></td>
    <td align="left" width="5%"><b>:</b></td>
    <td width="80%" align="left"><b>'.$data['mo_present'].' </b></td>
    
</tr>

<tr>
    <td align="left" width="20%"><b>Permanent Address</b></td>
    <td align="left" width="5%"><b>:</b></td>
    <td width="80%" align="left"><b>'.$data['mo_permanent'].' </b></td>
    
</tr>



<tr>
    <td align="left" width="20%"><b>'.$father.'</b></td>
    <td align="left" width="5%"><b>:</b></td>
    <td width="45%" align="left"><b>'.$data['fname'].' </b></td>
    <td width="7%" align="left"></td>
    <td align="left" width="7%"><b>MRN:</b></td>
    <td width="15%" align="left"><b>'.$data['fa_mrn'].'</b></td>
</tr>

<tr>
    <td align="left" width="20%"><b>Nationality</b></td>
    <td align="left" width="5%"><b>:</b></td>
    <td width="45%" align="left"><b>'.$data['fa_nationality'].' </b></td>
    <td width="4%" align="left"></td>
    <td align="left" width="10%"><b>Religion:</b></td>
    <td width="13%" align="left"><b>'.$data['fa_religion'].'</b></td>
</tr>

<tr>
    <td align="left" width="20%"><b>Passport</b></td>
    <td align="left" width="5%"><b>:</b></td>
    <td width="43%" align="left"><b>'.$data['fa_passport'].' </b></td>
    
    <td align="left" width="16%"><b>National ID NO:</b></td>
    <td width="18%" align="left"><b>'.$data['fa_national_id'].'</b></td>
</tr>


<tr>
    <td align="left" width="20%"><b>Present Address</b></td>
    <td align="left" width="5%"><b>:</b></td>
    <td width="80%" align="left"><b>'.$data['fa_present'].' </b></td>
    
</tr>

<tr>
    <td align="left" width="20%"><b>Permanent Address</b></td>
    <td align="left" width="5%"><b>:</b></td>
    <td width="80%" align="left"><b>'.$data['fa_permanent'].' </b></td>
    
</tr>
<tr>
<td align="left" width="100%"></td>
</tr>


<tr>
    <td align="justify" width="100%"><b>This is to certify that the above mentioned baby '.$data['bname'].' (MRN: '.$data['pmrn'].') was born in KPJ Specialized Hospital at '.$data['btime'].' on '.$data['bdate'].' under OBSTETRICIAN '.$data['dname'].' and PEDIATRICIAN '.$data['dname1'].', and all the above information provided in this certificate is accurate and verified as per official records and hard copies of the proof provided by the parents.
    
    </b></td>
    
    
</tr>

<tr>
<td align="left" width="100%"></td>
</tr>
<tr>
<td align="left" width="100%"></td>
</tr>
<tr>
    <td align="left" width="100%"><b>Name and Signature of certifying Doctor<br>'.$data['dname0'].'
    
    </b></td>
    
    
</tr>

</table></div>';




$pdf->writeHTML($tbl, '',0,'L',false, 0, false, false, 0);

// -----------------------------------------------------------------------------


//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+