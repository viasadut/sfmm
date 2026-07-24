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

//header('Content-type: text/html; charset=utf-8');

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Inatient Summary Report');
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
$dname=$_REQUEST['dname'];
$eid=$_REQUEST["eid"];
            $ac_no=$_REQUEST['acno'];
			
			
$query = mysqli_query($con,"select * from radreport where pmrn='$pmrn' and ac_no='$ac_no'");
            $data = mysqli_fetch_array($query);
                    
					
            $query3 = mysqli_query($con,"select * from doctor1 where dname='$dname'");
            $data3 = mysqli_fetch_array($query3);                       
            
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
			
			$query7 = mysqli_query($db,"Select * from inpatient where pmrn='$pmrn' and eid='$eid';");

$data7 = mysqli_fetch_array($query7);

$pname=$data7['pname'];
$page=$data7['age'];
$psex=$data7['gender'];
$eeid=$data7['emerid'];


//$pdf->SetFont('helvetica', 'B', 20);
$pdf->SetFont('dejavusans', '', 10);


// add a page
$pdf->AddPage();

//$pdf->Write(0, 'Example of HTML tables', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 26);

// -----------------------------------------------------------------------------





$pdf->Image('logo1.jpg',15,7);
//$pdf->Image('logo1.jpg',180,7);
$pdf->SetFont('helvetica','B',12);
//$pdf->Cell(170,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$pdf->Ln(3);
$pdf->SetFont('helvetica','B',12);
$pdf->Cell(165,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$pdf->ln(5);
$pdf->SetFont('helvetica','B',12);
$pdf->Cell(165,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$pdf->ln(15);



$pdf->SetFont('helvetica','',10);


$tbl .='<table width="100%" border="1">
                                <tr>
                                    <td style="font-family: freesans; font-size: 12px; text-align:left" colspan="6"><b>Patient Name: '.$data7['pname'].'</b> </td>
									
                                </tr>
								
								                                <tr>
                                    <td style="font-family: freesans; font-size: 12px; text-align:left"><b>MRN:</b> </td>
									<td style="font-family: freesans; font-size: 12px; text-align:center"><b>'.$data7['pmrn'].'</b> </td>
									<td style="font-family: freesans; font-size: 12px; text-align:left"><b>GENDER:</b> </td>
									<td style="font-family: freesans; font-size: 12px; text-align:center"><b>'.$data7['gender'].'</b> </td>
									<td style="font-family: freesans; font-size: 12px; text-align:left"><b>AGE:</b> </td>
									<td style="font-family: freesans; font-size: 12px; text-align:center"><b>'.$data7['age'].'</b> </td>
									
                                </tr>
								
								<tr>
								<td style="font-family: freesans; font-size: 12px; text-align:left"colspan="4"><b>Admission Under: '.$data7['adoc'].'</b> </td>
								<td style="font-family: freesans; font-size: 12px; text-align:left" colspan="2"><b>Admission Date: '.$data7['adate'].'</b> </td>
								</tr>
                            </table>
                            ';




				
				
				
				
				
				
				
				
				$tbl .='<table>
				<tr>
                                    <th style="font-family: freesans; font-size: 14px;text-align:center"><b>RADIOLOGY INVESTIGATION RECORD (INPATIENT)<br></b></th>
                                </tr>
				
				
				';
                $query1r = mysqli_query($con,"Select * from radreport where pmrn='$pmrn' and emerid='$eeid' order by id desc");
                $count=1;
                while ($data11r = mysqli_fetch_array($query1r)) {
                    $tbl .='
					
					
                            <br><tr>
                                <td style="font-family: freesans; font-size: 12px; text-align:left"><b>'.$count.') '.$data11r['type'].' </b>
								
								
								</td>
                                
                            </tr>
                            
							<tr>
                                
                               <td style="font-family:freesans;font-size: 12px; text-align:left">'.$data11r['report'].'</td>
                            </tr>
                    ';
                    $count++;
                }
                $tbl .= '</table>';
				
					$tbl .='<table>';
                $query1rr = mysqli_query($con,"Select * from radreport where pmrn='$pmrn' and ineid='$eid' order by id desc");
                //$count=1;
                while ($data11rr = mysqli_fetch_array($query1rr)) {
                    $tbl .='
                            <br><tr>
                                <td style="font-family: freesans; font-size: 12px; text-align:left"><b>'.$count.') '.$data11rr['type'].' </b>
								
								
								</td>
                                
                            </tr>
                            
							<tr>
                                
                               <td style="font-family:freesans;font-size: 12px; text-align:left">'.$data11rr['report'].'</td>
                            </tr>
                    ';
                    $count++;
                }
                $tbl .= '</table>';
				

//$tbl = UTF8_encode($tbl);
//$tbl = UTF8_decode($tbl);


//$pdf->writeHTML($tbl, '',0,'L',true, 0, true, true, 0);

$pdf->writeHTML($tbl, true, false, true, false, '');

   // $pdf->writeHTMLCell(0, 0, '', '', $tbl, 0, 1, 0, true, '', true);   


// -----------------------------------------------------------------------------


//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+