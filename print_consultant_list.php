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
		$this->Cell(0, 10, 'Computer Generated Report', 0, false, 'R', 0, '', 0, false, 'T', 'M');
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
$pdf->SetMargins(20, 40, 10, false);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font


//$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

//$pdf->Write(0, 'Example of HTML tables', '', 0, 'C', true, 0, false, false, 0);

//$pdf->SetFont('helvetica', '', 26);
$pdf->SetFont('helvetica', '', 10);
// -----------------------------------------------------------------------------


$tbl .= 
'
<table width="100%" border="1" style="padding:5px;">
<tr>
    <th><h2>Resident Consultant List:</h2></th>
</tr>

<tr>
<th width="10%" style="font-family: freesans; font-size: 12px;"><strong>S.No</strong></th>
<th width="40%" style="font-family: freesans; font-size: 12px;"><strong>Doctor Name</strong></th>
<th width="30%" style="font-family: freesans; font-size: 12px;"><strong>Department</strong></th>

<th width="20%" style="font-family: freesans; font-size: 12px;"><strong>Phone</strong>   </th>



</tr>


';
            


// -----------------------------------------------------------------------------

$query1 = mysqli_query($con,"Select * from staff1 where astatus='Active' and ugroup='doctor' and stype in('permanent','Contractual')order by sdepartment asc;");
$count=1;
while ($row = mysqli_fetch_array($query1)) {
$tbl .= 
'
<tr>
                              
      <td align="left" style="font-family: freesans; font-size: 12px;">'.$count.'</td>
      <td align="left"  style="font-family: freesans; font-size: 12px;">'.$row["mname"].'</td>
      <td align="left" style="font-family: freesans; font-size: 12px;">'.$row["sdepartment"].'  </td>
	   
      
      <td align="left"  style="font-family: freesans; font-size: 12px;">'.$row["phone"].'  </td>
      

	  


	  
      </tr>
                          
                    ';
                    $count++;
                }


				$tbl .= 
'
</table>';



$tbl .= 
'
<table width="100%" border="1" style="padding:5px;">
<tr>
    <th><h2>Sessional Consultant List:</h2></th>
</tr>

<tr>
<th width="10%" style="font-family: freesans; font-size: 12px;"><strong>S.No</strong></th>
<th width="40%" style="font-family: freesans; font-size: 12px;"><strong>Doctor Name</strong></th>
<th width="30%" style="font-family: freesans; font-size: 12px;"><strong>Department</strong></th>

<th width="20%" style="font-family: freesans; font-size: 12px;"><strong>Phone</strong>   </th>



</tr>


';
            


// -----------------------------------------------------------------------------

$query1 = mysqli_query($con,"Select * from staff1 where astatus='Active' and ugroup='doctor' and stype in('Sessional','out')order by sdepartment asc;");
$count=1;
while ($row = mysqli_fetch_array($query1)) {

    $sid=$row['sid'];

    $queryd = "SELECT * FROM doctor where sid='$sid'"; 
    $resultd = mysqli_query($con, $queryd) or die(mysqli_error());
    $rowd = mysqli_fetch_array($resultd);
    


$tbl .= 
'
<tr>
                              
      <td align="left" style="font-family: freesans; font-size: 12px;">'.$count.'</td>
      <td align="left"  style="font-family: freesans; font-size: 12px;">'.$row["mname"].'</td>
      <td align="left" style="font-family: freesans; font-size: 12px;">'.$row["sdepartment"].'  </td>
	   
      
      <td align="left"  style="font-family: freesans; font-size: 12px;">'.$row["phone"].'  </td>
      

	  


	  
      </tr>
                          
                    ';
                    $count++;
                }


				$tbl .= 
'
</table>';



$pdf->writeHTML($tbl, '',0,'L',false, 0, false, false, 0);

// -----------------------------------------------------------------------------


//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+