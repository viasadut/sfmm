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
$pdf->SetTitle('Endoscopy Discharge Report');
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

$pmrn=$_REQUEST['pmrn'];
           
            
            $eid=$_REQUEST['eid'];
			$eid1=date('dmY').$eid;
			
			
$query = mysqli_query($con,"select * from endoreport where pmrn='$pmrn' and eid='$eid'");
            $data = mysqli_fetch_array($query);
                 $dname=$data['dname'];       
            $query3 = mysqli_query($con,"select * from doctor1 where dname='$dname'");
            $data3 = mysqli_fetch_array($query3);   

$query35 = mysqli_query($con,"select * from endopapp where eid='$eid' and pmrn='$pmrn'");
            $data35 = mysqli_fetch_array($query35);  			
            

			$query45 = "SELECT COUNT(pmrn) FROM alltest where pmrn= '$pmrn' and eid='$eid1';"; 
            $result45 = mysqli_query($con, $query45) or die(mysqli_error());
            $row45 = mysqli_fetch_assoc($result45);
            $count12=$row45['COUNT(pmrn)'];

			
			
			$query45a = "SELECT COUNT(pmrn) FROM postendomedi where pmrn= '$pmrn' and eid='$eid';"; 
            $result45a = mysqli_query($con, $query45a) or die(mysqli_error());
            $row45a = mysqli_fetch_assoc($result45a);
            $count12a=$row45a['COUNT(pmrn)'];


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
                        
                        <td width="100%" align="center" style="font-size:17px;text-decoration: underline;"><b>DISCHARGE REPORT</b></td>
                        
                    </tr>
					
                </table>
               
<br><br><br>
			   
                <table width="100%">
                    <tr>
                        <td width="25%" style="font-weight: bold !important;font-size:14px;" align="left"><b>Consultant Name:</b></td>
                        <td width="75%" style="font-weight: bold !important;font-size:14px;" align="left"><b>'.$data['dname'].'</b></td>
                    </tr>
                    <tr>
                        <td width="25%" align="left"></td>
                        <td width="75%" style="font-weight: bold !important;font-size:10px;" align="left"><b>'.$data3['degree'].'</b></td>
                    </tr>
                    <tr>
                        <td width="25%"align="left"></td>
						<td width="75%"style="font-weight: bold !important;font-size:10px;" align="left"><b>'.$data3['Discipline'].'</b></td>
                        
                    </tr>
                </table>';
            
			$pdf->SetFont('helvetica', '', 10);

// -----------------------------------------------------------------------------


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
				
				 <table style="border: 1px solid black; cellspacing:0; cellpadding:=1">
                    <tr>
                       
                       <td align="left" width="100%"><b>Admission Date & Time: '.$data35['adate'].' '.$data35['aslot'].'</b></td>
                    </tr>
                </table>
            
                <table style="border: 1px solid black; cellspacing:0; cellpadding:=1">
                    <tr>
                       <td align="left" width="50%"><b>Referral From: '.$data['dreffer'].'</b></td>
                       <td align="right" width="50%"><b>Discharge Date & Time: '.$data['rdate'].' '.$data['rtime'].'</b></td>
                    </tr>
                </table>';




				$tbl .= 
'

                <table style=cellspacing="0" cellpadding="1">
                    <tr>
                        <td align="left">'.$data['discharge'].'</td>
                        
                    </tr>
					
					                    
						
					
					
                </table>';
				if($count12a==0){
            }
            else {
				$tbl .= 
'<span style="font-size:14px;font-weight:bold">Medication Advise:</span> <br><br>';
				
				 $query1 = mysqli_query($con,"select * from postendomedi where pmrn='$pmrn' and eid='$eid'");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
                    
				$tbl .= 
'

                <table style=cellspacing="0" cellpadding="1" style="font-size:11px;">
                   <tr>
                        
						<td align="left"><span style="font-weight:bold;">'.$count.') '.$data1['brand'].'('.$data1['medi'].')'.'</span></td>
                        
                    </tr>
					<tr>
                        
						<td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data1['pdos'].','.$data1['duration'].''.','.$data1['frelation'].''.'</td>
                        
                    </tr><br>
					
					                    ';
						
					$count++;	
				}
				
$tbl .= 
'				
			</table>';}
				
				
				
				if($count12==0){
            }
            else {
				$tbl .= 

'<br><br><span style="font-size:14px;font-weight:bold">Investigation Advise:</span><br>';
				$query1 = mysqli_query($con,"select * from alltest where pmrn='$pmrn' and eid='$eid1'");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
                    
					
					
				$tbl .= 
'

                <table style=cellspacing="0" cellpadding="1">
                    <tr>
                        
						<td align="left">'.$count.') '.$data1['medi'].'</td>
                        
                    </tr>
					<tr>
                        
						<td align="left">'.$data1['ins'].'</td>
                        
                    </tr>
					<br>
					
					                   ';
						
					$count++;	
				}
				
$tbl .= 
'				
			</table>';}

$tbl .= 
'				

<tr>
                        <td align="center" style="font-weight:bold">-- Report End --</td>
						</tr>';

$pdf->writeHTML($tbl, '',0,'L',false, 0, false, false, 0);

// -----------------------------------------------------------------------------


//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+