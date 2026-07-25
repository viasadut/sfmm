<!DOCTYPE html>
<html lang="en">
<head>
    <title>PMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body{
            font-family: bangla;
            font-family: serif; font-size: 10pt;
        }
		
		
		div.relative {
  position: relative;
  width: 400px;
  height: 200px;
  border: 3px solid #73AD21;
} 

div.absolute {
  position: absolute;
  top: 80px;
  right: 0;
  width: 200px;
  height: 100px;
  border: 3px solid #73AD21;
}
    </style>
</head>
<body>

<div class="jumbotron text-center">
    <h1>PMS PDF</h1>
</div>
  
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
        <?php
            require('db1.php');
            
            require_once 'vendor/autoload.php';
            $pmrn=$_REQUEST['pmrn'];
            $dname=$_REQUEST['dname'];
            $date=$_REQUEST['date'];
            $eid=$_REQUEST['eid'];
            
            $output = "";

            $query = mysqli_query($con,"select * from presnew where pmrn='$pmrn' and dname='$dname' and date='$date' and eid='$eid'");
            $data = mysqli_fetch_array($query);
            $d=$data['date'];
            $b = date( 'j-F-Y', strtotime( $d) );

            $query43 = "SELECT COUNT(pmrn) FROM alltest where pmrn= '$pmrn' and eid='$eid';"; 
            $result43 = mysqli_query($con, $query43) or die(mysqli_error());
            $row43 = mysqli_fetch_assoc($result43);
            $count10=$row43['COUNT(pmrn)'];

            $query44 = "SELECT COUNT(pmrn) FROM pmedi where pmrn= '$pmrn' and eid='$eid';"; 
            $result44 = mysqli_query($con, $query44) or die(mysqli_error());
            $row44 = mysqli_fetch_assoc($result44);
            $count11=$row44['COUNT(pmrn)'];
			
			$query44_c = "SELECT COUNT(pmrn) FROM care_shop where pmrn= '$pmrn' and eid='$eid';"; 
            $result44_c = mysqli_query($con, $query44_c) or die(mysqli_error());
            $row44_c = mysqli_fetch_assoc($result44_c);
            $count11_c=$row44_c['COUNT(pmrn)'];
			
			$query45 = "SELECT COUNT(pmrn) FROM opd_referral where pmrn= '$pmrn' and eid='$eid' and ref_by='$dname';"; 
            $result45 = mysqli_query($con, $query45) or die(mysqli_error());
            $row45 = mysqli_fetch_assoc($result45);
            $count12=$row45['COUNT(pmrn)'];

            $query2 = mysqli_query($con,"select * from pappnew where pmrn='$pmrn' and dname='$dname' and adate='$date'");
            $data2 = mysqli_fetch_array($query2);

            $query3 = mysqli_query($con,"select * from doctor1 where dname='$dname'");
            $data3 = mysqli_fetch_array($query3);
			
			$darma_count = "SELECT COUNT(id) FROM set_attach_pic where pmrn= '$pmrn' and eid='$eid' and dname='$dname';"; 
            $darma_result_count = mysqli_query($con, $darma_count) or die(mysqli_error());
            $darma_row_count = mysqli_fetch_assoc($darma_result_count);
            $dar_count=$darma_row_count['COUNT(id)'];

			
			$darma_query = "SELECT * FROM set_attach_pic where pmrn= '$pmrn' and eid='$eid' and dname='$dname' order by id asc limit 1;"; 
            $darma_result = mysqli_query($con, $darma_query) or die(mysqli_error());
            $darma_row = mysqli_fetch_assoc($darma_result);
            $first=$darma_row['iname'];
			
			$darma_query2 = "SELECT * FROM set_attach_pic where pmrn= '$pmrn' and eid='$eid' and dname='$dname' order by id asc limit 1,1;"; 
            $darma_result2 = mysqli_query($con, $darma_query2) or die(mysqli_error());
            $darma_row2 = mysqli_fetch_assoc($darma_result2);
            $second=$darma_row2['iname'];
			
			$darma_query3 = "SELECT * FROM set_attach_pic where pmrn= '$pmrn' and eid='$eid' and dname='$dname' order by id asc limit 2,1;"; 
            $darma_result3 = mysqli_query($con, $darma_query3) or die(mysqli_error());
            $darma_row3 = mysqli_fetch_assoc($darma_result3);
            $third=$darma_row3['iname'];
			
			
			
            $d=$data['date'];
            $b = date( 'j-F-Y', strtotime( $d) );

			
			if($dar_count=='1'){
				
				$output .='
                <table width="100%">
                    					
					<tr>
					<td width="20%"></td>
                        <td width="80%" align="right"><img src="../../set_pic.'.$first.'"
         style="width: 10mm; height: 10mm; margin: 0;" /></td>
                    </tr>
                </table>
';
				
			}
			
			else if($dar_count=='2'){
				
				$output .='
                <table width="100%">
                    					
					<tr>
					
                        <td width="50%" align="right"><img src="../../set_pic.'.$first.'"
         style="width: 10mm; height: 10mm; margin: 0;" /></td>
		 <td width="50%" align="right"><img src="../../set_pic.'.$second.'"
         style="width: 10mm; height: 10mm; margin: 0;" /></td>
                    </tr>
                </table>
';
				
			}
			
			
			else if($dar_count=='3'){
				
				$output .='
                <table width="100%">
                    					
					<tr>
					
                        <td width="30%" align="right"><img src="../../set_pic.'.$first.'"
         style="width: 10mm; height: 10mm; margin: 0;" /></td>
		 <td width="30%" align="right"><img src="../../set_pic.'.$second.'"
         style="width: 10mm; height: 10mm; margin: 0;" /></td>
		 
		 <td width="30%" align="right"><img src="../../set_pic.'.$third.'"
         style="width: 10mm; height: 10mm; margin: 0;" /></td>
                    </tr>
                </table>
';
				
			}
			
			
			if($data['cdetails']==''){
            $output .='
                <table width="100%">
                    					
					<tr>
					<td width="20%"></td>
                        <td width="80%" align="right"><img src="1.png"
         style="width: 10mm; height: 10mm; margin: 0;" /></td>
                    </tr>
                </table>
';}

else {
	
        $output .='
                <table>
                    <tr>
                        <td><b>Clinical Details : </b></td>
                    </tr>
                    <tr>
                        <td>'.$data['cdetails'].'</td>
                    </tr>
					
					
                </table>
';	
	
}

            $output .='
                <table>
                    <tr>
                        <td><b>Diagnosis : </b></td>
                    </tr>
                    <tr>
                        <td>'.$data['diagnosis'].'</td>
                    </tr>
                </table>
            ';

            if($count11==0){
            }
            else {
                $output .='<table>
                                <tr>
                                    <th><b>Medication Advised:</b></th>
                                </tr>
                            </table>
                            <table>';
                $query1 = mysqli_query($con,"select * from pmedi where pmrn='$pmrn' and eid='$eid' order by page_order asc");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
                    $output .='
                            <tr>
                                <td><b>'.$count.'. </b>
								
								
								</td>
                                <td><b> '.$data1['brand'].'('.$data1['medi'].')<b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>'.$data1['pdos'].',   '.$data1['duration'].',  '.$data1['frelation'].'</td>
                            </tr>
                    ';
                    $count++;
                }
                $output .= '</table>';
            }

            if($count10==0){
            }

            else {
                $output .='
                        <table>
                            <tr>
                                <td><p><b>LAB Advised</b></p></td>
                            </tr>
                        </table>';
                $query1 = mysqli_query($con,"select * from alltest where pmrn='$pmrn' and eid='$eid' order by page_order asc");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
					
					
                    $output .='
                    
                        <table>
                            <tr>
                               
								<td><b>'.$count.'. </b>'.$data1['medi'].'   '.$data1['ins'].'</td>
								
                            </tr>
                        </table>
                    ';
                    $count++;
                }
            }
			
			if($count11_c==0){
            }
            else {
                $output .='<table>
                                <tr>
                                    <th><b>Care Shop Item(s) Advised:</b></th>
                                </tr>
                            </table>
                            <table>';
                $query1 = mysqli_query($con,"select * from care_shop where pmrn='$pmrn' and eid='$eid' order by page_order asc");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
                    $output .='
                            <tr>
                                <td><b>'.$count.'. </b></td>
                                <td><b> '.$data1['iname'].'<b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>'.$data1['ins'].'</td>
                            </tr>
                    ';
                    $count++;
                }
                $output .= '</table>';
            }
			

            if($data['pdiet']==''){
            }
            else {
                $output .='
                    <table>
                        <tr>
                            <td><b>DIET : </b></td>
                        </tr>
                        <tr>
                            <td>'.$data['pdiet'].'</td>
                        </tr>
                    </table>
                ';
            }

            if($data['other']=='' && $data['other_b']==''){
            }
            else {
                $output .='
                    <table>
                        <tr>
                            <td><b>Other Advise : </b></td>
                        </tr>
                        <tr>
                            <td>'.$data['other'].' </p></td>
                        </tr>
                        <tr>
                            <td><div style="font-family: bangla; font-size: 18px;"> '.$data['other_b'].' </div></td>
                        </tr>
                    </table>
                '; 
            }

           


if($count12==0){
            }
            else {
                $output .='<table>
                                <tr>
                                    <th><b>Referral:</b></th>
                                </tr>
                            </table>
                            <table>';
                $query1 = mysqli_query($con,"select * from opd_referral where pmrn='$pmrn' and ref_by='$dname'  and eid='$eid'");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
                    $output .='
                            <tr>
                                <td><b>'.$count.'. </b></td>
                                <td> '.$data1['ref_name'].'  '.$data1['reason'].'</td>
                            </tr>
                            
                    ';
                    $count++;
                }
                $output .= '</table>';
            }



            if($data['fdate']=='' or $data['fdate']=='1970-01-01'){
            }
            else {
                $output .='
                    <table>
                        <tr>
                            <td><b>Next Follow Up Date : </b></td>
                        
                        
                            <td>'.date('d/m/Y',strtotime($data['fdate'])).'</td>
                        </tr>
                    </table>
                ';
            }

            $output .= '<p align="right">Computer Generated Summary, No Signature Required</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'bangla',
                'default_font' => 'Roboto',
                'default_font_size' => 9,
                'mode' => 'utf-8',
				'margin_left' => 23
            ]);
            $mpdf->SetWatermarkImage(
                '1001.jpg',
                5,
                '',
                array(177,43)
            );
            $mpdf->showWatermarkImage = true;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHTMLHeader('
                <table width="100%">
                    <tr>
                        <td width="15%"><img src="1.png"></td>
                        <td width="70%" align="center" style="text-align: center; font-weight: bold; font-size:17px;">SHEIKH FAZILATUNNESA MUJIB MEMORIAL<br>
                        KPJ SPECIALIZED HOSPITAL <br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        <td width="15%" style="text-align: right;"><img src="2.png"></td>
                    </tr>
                </table>
                <hr>

                <table width="100%">
                    <tr>
                        <td width="23%"></td>
                        <td width="50%"><b><h1 align="laft">OUTPATIENT RECORD</h1> </b></td>
                        <td width="31%"><p align="right">Episode: '.$data['eid'].', <br>Date: '.$b.'</p></td>
                    </tr>
                </table>
               
                <table>
                    <tr>
                        <td width="30%" ><h2 align="laft"><b>Consultant Name:</b></h2></td>
                        <td width="70%" style="font-weight: bold !important;"><h2 align="laft"><b>'.$data['dname'].'</h2></b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>'.$data3['degree'].'</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>'.$data3['Discipline'].'</td>
                    </tr>
                </table>
            
			<table width="100%">
			<tr>
			<td width="10%" align="center">
			<barcode code="'.$data['pmrn'].'" type="C128A" class="barcode" />
			MRN-'.$data['pmrn'].'
			</td>
					<td width="80%" align="center">
					
					</td>
					
					<td class="verticalTableHeader" width="10%" align="center">
					<barcode code="'.$data['id'].'" type="C128A" class="barcode" />
					Prescription ID-'.$data['id'].'
					</td>
					</tr>
			</table>
			
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td> <b>Patient Name : '.$data['pname'].'</b></td>
                        <td><b>MRN :'.$data['pmrn'].'</b></td>
                        <td><b>GENDER :</b>'.$data['psex'].'</td>
                        <td><b>AGE :</b>'.$data['page'].'</td>
                    </tr>
                </table>
            
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td><b>H(CM) :</b> '.$data2['height'].'</td>
                        <td><b>W(KG) :</b>'.$data2['weight'].'</td>
                        <td><b>BMI :</b>'.$data2['pbmi'].'</td>
                        <td><b>PuLse :</b>'.$data2['ppluse'].'</td>
                        <td><b>BP :</b>'.$data2['pbp'].''.'/'.$data2['pbp1'].'</td>
                        <td><b>Temp(F) :</b>'.$data2['temp'].'</td>
                        <td><b>SPO2 :</b>'.$data2['spo2'].'</td>
                        <td><b>RR :</b>'.$data2['rr'].'</td>
                    </tr>
                </table>
            ');

            $mpdf->SetHTMLFooter('
                <table width="100%">
                    <tr>
                        <td width="25%" align="center">Page-{PAGENO}/{nbpg}</td>
                    </tr>
                    <tr>
                        <td width="100%" style="color:red; font-size:10px;">Contact Numbers: Ambulance: 01810008074, +880244077029, Appointments: 01810008080, +880244077030 | (SFMMKPJSH/OPD/MR-01)</td>
                    </tr>
                </table>
            ');
            
            $mpdf->WriteHTML($output);
            $fileName = $data['pname'].'-'.$data['pmrn'].'.pdf';
            ob_clean(); 
            $mpdf->Output();
        ?>
        </div>
    </div>
</div>

</body>
</html>

<!-- http://localhost/sfmm/ticket/pdf_p.php?pmrn=123456&eid=3&date=07/20/2018&dname=Dr.%20Razeeb%20Hassan -->