<!DOCTYPE html>
<html lang="en">
<head>
    <title>PMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body{
            font-family: freesans;
            
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
$n_did=$data['did'];

$n_did=$data['did'];

$query435 = "SELECT * FROM user where uname='$n_did';" ;
$result435 = mysqli_query($con, $query435) or die(mysqli_error());
$row435 = mysqli_fetch_assoc($result435);
$bb=$row435['fullname'];


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

            $query2 = mysqli_query($con,"select * from pappnew where pmrn='$pmrn' and adate='$date' and eid='$eid'");
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
			
			
			
			$query_eye = "SELECT COUNT(pmrn) FROM eye_medi where pmrn= '$pmrn' and eid='$eid' and dname='$dname';"; 
            $result_eye = mysqli_query($con, $query_eye) or die(mysqli_error());
            $row_eye = mysqli_fetch_assoc($result_eye);
            $count_eye=$row_eye['COUNT(pmrn)'];
			
			$query_eye1 = "SELECT * FROM eye_medi where pmrn= '$pmrn' and eid='$eid' and dname='$dname';"; 
            $result_eye1 = mysqli_query($con, $query_eye1) or die(mysqli_error());
            $row_eye1 = mysqli_fetch_assoc($result_eye1);			
			
            $d=$data['date'];
            $b = date( 'j-F-Y', strtotime( $d) );

			
			
			
			
	
        $output .='
                <table>
                    <tr>
                        <td><b style="font-family: freesans; font-size: 14px;">CLINICAL DETAILS</b></td>
                    </tr>
                    <tr>
                        <td style="font-family: freesans; font-size: 14px;">'.$data['cdetails'].'</td>
                    </tr>
					
					
                </table>
';	
	


            $output .='
                <table>
                    <tr>
                        <td style="font-family: freesans; font-size: 14px;"><b>DIAGNOSIS</b></td>
                    </tr>
                    <tr>
                        <td style="font-family: freesans; font-size: 14px;">'.$data['diagnosis'].'</td>
                    </tr>
                </table>
            ';
			
			
			if($dar_count=='1'){
				
				$output .='
                <table width="100%">
                    					
					<tr>
					
                        <td width="100%" align="center"><img src="../../set_pic/'.$first.'"
         style="width: 60mm; height: 60mm; margin: 0;" /></td>
                    </tr>
                </table><br>
';
				
			}
			
			else if($dar_count=='2'){
				
				$output .='
                <table width="100%">
                    					
					<tr>
					
                        <td width="50%" align="center"><img src="../../set_pic/'.$first.'"
         style="width: 60mm; height: 60mm; margin: 0;" /></td>
		 <td width="50%" align="center"><img src="../../set_pic/'.$second.'"
         style="width: 60mm; height: 60mm; margin: 0;" /></td>
                    </tr>
                </table><br>
';
				
			}
			
			
			else if($dar_count=='3'){
				
				$output .='
                <table width="100%">
                    					
					<tr>
					
                        <td width="30%" align="center"><img src="../../set_pic/'.$first.'"
         style="width: 60mm; height: 60mm; margin: 0;" /></td>
		 <td width="30%" align="center"><img src="../../set_pic/'.$second.'"
         style="width: 60mm; height: 60mm; margin: 0;" /></td>
		 
		 <td width="30%" align="center"><img src="../../set_pic/'.$third.'"
         style="width: 60mm; height: 60mm; margin: 0;" /></td>
                    </tr>
                </table><br>
';
				
			}
			

            if($count11==0){
            }
            else {
                $output .='<table>
                                <tr>
                                    <th style="font-family: freesans; font-size: 14px;"><b>MEDICATION ADVISE</b></th>
                                </tr>
                            </table>
                            <table>';
                $query1 = mysqli_query($con,"select * from pmedi where pmrn='$pmrn' and eid='$eid' order by page_order asc");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
                    $output .='
                            <tr>
                                <td style="font-family: freesans; font-size: 14px;"><b>'.$count.'. </b>
								
								
								</td>
                                <td style="font-family: freesans; font-size: 14px;"><b> '.$data1['brand'].'('.$data1['medi'].')<b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-family:freesans;font-size: 16px;">'.nl2br($data1['pdos']).',   '.$data1['duration'].',  '.$data1['frelation'].'</td>
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
                                <td style="font-family: freesans; font-size: 14px;"><p><b>LAB ADVISE</b></p></td>
                            </tr>
                        </table>';
                $query1 = mysqli_query($con,"select * from alltest where pmrn='$pmrn' and eid='$eid' and medi !='Sample Collection Charge' order by page_order asc");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
					
					
                    $output .='
                    
                        <table>
                            <tr>';
                              if($data1['ins']!=''){
							  $output .='<td style="font-family: freesans; font-size: 14px;"><b>'.$count.'. </b>'.$data1['medi'].' - '.$data1['ins'].'</td>';}
							  
							  if($data1['ins']==''){
							  $output .='<td style="font-family: freesans; font-size: 14px;"><b>'.$count.'. </b>'.$data1['medi'].'</td>';}
							$output .='	
                            </tr>
                        </table>';
					
				
				
				
                    $count++;
                
				
				
				
				}
            }
			
			if($count11_c==0){
            }
            else {
                $output .='<table>
                                <tr>
                                    <th style="font-family: freesans; font-size: 12px;"><b>Care Shop Item(s) Advised</b></th>
                                </tr>
                            </table>
                            <table>';
                $query1 = mysqli_query($con,"select * from care_shop where pmrn='$pmrn' and eid='$eid' order by page_order asc");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
                    $output .='
                            <tr>
                                <td style="font-family: freesans; font-size: 14px;"><b>'.$count.'. </b></td>
                                <td style="font-family: freesans; font-size: 14px;"><b> '.$data1['iname'].'<b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-family: freesans; font-size: 15px;">'.$data1['ins'].'</td>
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
                            <td style="font-family: freesans; font-size: 14px;"><b>DIET</b></td>
                        </tr>
                        <tr>
                            <td style="font-family: freesans; font-size: 14px;">'.$data['pdiet'].'</td>
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
                            <td style="font-family: freesans; font-size: 14px;"><b>OTHER ADVISE</b></td>
                        </tr>
                        <tr>
                            <td style="font-family:freesans;font-size: 15px;">'.$data['other'].' </p></td>
                        </tr>
                        <tr>
                            <td><div style="font-family: freesans; font-size: 18px;">'.nl2br($data['other_b']).'</div></td>
                        </tr>
                    </table>
                '; 
            }

           


if($count12==0){
            }
            else {
                $output .='<table>
                                <tr>
                                    <th style="font-family: freesans; font-size: 14px;"><b>REFERRAL:</b></th>
                                </tr>
                            </table>
                            <table>';
                $query1 = mysqli_query($con,"select * from opd_referral where pmrn='$pmrn' and ref_by='$dname'  and eid='$eid'");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
                    $output .='
                            <tr>
                                <td style="font-family: freesans; font-size: 14px;"><b>'.$count.'. </b></td>
                                <td style="font-family: freesans; font-size: 14px;"> '.$data1['ref_name'].'  '.$data1['dis'].'  '.$data1['reason'].'</td>
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
                            <td style="font-family: freesans; font-size: 14px;"><b>NEXT FOLLOW UP DATE: </b></td>
                        
                        
                            <td style="font-family: freesans; font-size: 14px;">'.date('d/m/Y',strtotime($data['fdate'])).'</td>
                        </tr>
                    </table>
                ';
            }
			
			
			
						 if($count_eye==0){
            }
           
			else{
				
				$output .='
                    <table>
                        <tr>
                            <td style="font-family: freesans; font-size: 14px;"><b> SPECTACLES POWER</b></td>
                        
                        
                            
                        </tr>
                    </table>
                ';
				
				
				 $output .='
                <table style="border: 1px solid black " width="100%">
                    <tr>
                        <td style="font-family: freesans; font-size: 12px;"align="center"><b>TYPE</b></td>
						<td style="font-family: freesans; font-size: 12px;"align="center"><b>VA</b></td>
						<td style="font-family: freesans; font-size: 12px;"align="center"><b>SPH</b></td>
						<td style="font-family: freesans; font-size: 12px;"align="center"><b>CYL</b></td>
						<td style="font-family: freesans; font-size: 12px;"align="center"><b>AXIS(Degree)</b></td>
						<td style="font-family: freesans; font-size: 12px;"align="center"><b>VA</b></td>
                    </tr>
                    <tr>
                        <td style="font-family: freesans; font-size: 12px;"align="center"><b>R</b></td>
						<td style="font-family: freesans; font-size: 12px;"align="center"><b>DV</b></td>
						
						<td style="font-family: freesans; font-size: 12px;"align="center"><b><b> '.$row_eye1['dv_sph'].'<b></b></td>
						<td style="font-family: freesans; font-size: 12px;"align="center"><b><b> '.$row_eye1['dv_cyl'].'<b></b></td>
						<td style="font-family: freesans; font-size: 12px;"align="center"><b><b> '.$row_eye1['dv_axis'].'<b></b></td>
						<td style="font-family: freesans; font-size: 12px;"align="center"><b><b> '.$row_eye1['dv_va'].'<b></b></td>
                    </tr>
					
					<tr>
                        <td style="font-family: freesans; font-size: 12px;"align="center"><b></b></td>
						<td style="font-family: freesans; font-size: 12px;" align="center"><b>NV</b></td>
						
						<td style="font-family: freesans; font-size: 12px;" align="center"><b><b> '.$row_eye1['nv_sph'].'<b></b></td>
						<td style="font-family: freesans; font-size: 12px;" align="center"><b><b> '.$row_eye1['nv_cyl'].'<b></b></td>
						<td style="font-family: freesans; font-size: 12px;" align="center" border="1"><b><b> '.$row_eye1['nv_axis'].'<b></b></td>
						<td style="font-family: freesans; font-size: 12px;" align="center"><b><b> '.$row_eye1['nv_va'].'<b></b></td>
                    </tr>
					
					
					
					<tr>
                        <td style="font-family: freesans; font-size: 12px;" align="center"><b>L</b></td>
						<td style="font-family: freesans; font-size: 12px;" align="center"><b>DV</b></td>
						
						<td style="font-family: freesans; font-size: 12px;" align="center"><b><b> '.$row_eye1['dv_sph1'].'<b></b></td>
						<td style="font-family: freesans; font-size: 12px;" align="center"><b><b> '.$row_eye1['dv_cyl1'].'<b></b></td>
						<td style="font-family: freesans; font-size: 12px;" align="center"><b><b> '.$row_eye1['dv_axis1'].'<b></b></td>
						<td style="font-family: freesans; font-size: 12px;" align="center"><b><b> '.$row_eye1['dv_va1'].'<b></b></td>
                    </tr>
					
					<tr>
                        <td style="font-family: freesans; font-size: 12px;" align="center"><b></b></td>
						<td style="font-family: freesans; font-size: 12px;" align="center"><b>NV</b></td>
						
						<td style="font-family: freesans; font-size: 12px;" align="center"><b><b> '.$row_eye1['nv_sph1'].'<b></b></td>
						<td style="font-family: freesans; font-size: 12px;"align="center"><b><b> '.$row_eye1['nv_cyl1'].'<b></b></td>
						<td style="font-family: freesans; font-size: 12px;"align="center"><b><b> '.$row_eye1['nv_axis1'].'<b></b></td>
						<td style="font-family: freesans; font-size: 12px;"align="center"><b><b> '.$row_eye1['nv_va1'].'<b></b></td>
                    </tr>
					
					
                </table>
            ';
				
			$output .='
                <table>
                    <tr>
                        <td style="font-family: freesans; font-size: 12px;"><b>COMMENTS</b></td>
                    </tr>
                    <tr>
                        <td style="font-family: freesans; font-size: 12px;">'.$row_eye1['comments'].'</td>
                    </tr>
                </table>
            ';
			
			$output .='
                <table>
                    <tr>
                        <td style="font-family: freesans; font-size: 12px;"><b>IPD: </b></td>
                    </tr>
                    <tr>
                        <td style="font-family: freesans; font-size: 12px;">'.$row_eye1['ipd'].'</td>]
                    </tr>
                </table>
            ';	
				
			}

            $output .= '<p align="right" style="font-family: freesans;">Software Generated Report, No Signature Required</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'freesans',
               // 'default_font' => 'freesans',
                'default_font_size' => 9,
                'mode' => 'utf-8',
				'margin_left' => 23
            ]);
           /* $mpdf->SetWatermarkImage(
                '1001.jpg',
                5,
                '',
                array(177,43)
            );*/
            $mpdf->showWatermarkImage = true;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
           if($data['did']==''){
			
			$mpdf->SetHTMLHeader('
            <table width="100%">
                    <tr>
                        <td width="20%" style="font-family: freesans; text-align:left;vertical-align: center;"><img src="KPJ_Updated_Logo.jpg" style="width:100px;">
                        </td>
                        <td width="80%" style="font-family: freesans; text-align:center;vertical-align: top;"><img src="kpj_new_logo_add2.png" style="width:480px;">
                        </td>
					                      
                    </tr>
                </table>
                <hr>

                <table width="100%">
                    <tr>
                        
                        <td width="80%" style="font-family: freesans;text-align: center;"><h1>OUTPATIENT RECORD</h1></td>
                         <td width="20%" style="font-family: freesans; text-align: right; font-weight:bold;font-size:10px;">Date: '.$b.'<br> Episode: '.$data['eid'].'</td>
                    </tr>
                </table>
               
                <table width="100%">
                    <tr>
                        <td width="20%" style="font-family: freesans;text-align:left"><h2><b>Doctor Name:</b></h2></td>
                        <td width="80%" style="font-weight: bold !important;font-family: freesans;text-align:left"><h2 ><b>'.$bb.'</h2></b></td>
                    </tr>
                    <tr>
                        <td width="20%"></td>
                        <td width="80%" style="font-family: freesans;">'.$data3['degree'].'</td>
                    </tr>
                    <tr>
                        <td width="20%"></td>
                        <td width="80%" style="font-family: freesans;font-weight:bold;">'.$data3['Discipline'].'</td>
                    </tr>
                </table>
            
			<table width="100%">
			<tr>
			<td width="10%" align="center" style="font-family: freesans;">
			<barcode code="'.$data['pmrn'].'" type="C128A" class="barcode" />
			MRN-'.$data['pmrn'].'
			</td>
					<td width="80%" align="center">
					
					</td>
					
					<td class="verticalTableHeader" width="10%" align="center" style="font-family: freesans;">
					<barcode code="'.$data['id'].'" type="C128A" class="barcode" />
					Prescription ID-'.$data['id'].'
					</td>
					</tr>
			</table>
			
                <table style="border: 1px solid black" width="100%" >
                    <tr>
                        <td style="font-family: freesans;"> <b>Patient Name : '.$data['pname'].'</b></td>
                        <td style="font-family: freesans;"><b>MRN :'.$data['pmrn'].'</b></td>
                        <td style="font-family: freesans;"><b>GENDER :</b>'.$data['psex'].'</td>
                        <td style="font-family: freesans;"><b>AGE :</b>'.$data['page'].'</td>
                    </tr>
                </table>
            
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td style="font-family: freesans;"><b>H(CM) :</b> '.$data2['height'].'</td>
                        <td style="font-family: freesans;"><b>W(KG) :</b>'.$data2['weight'].'</td>
                        <td style="font-family: freesans;"><b>BMI :</b>'.$data2['pbmi'].'</td>
                        <td style="font-family: freesans;"><b>Pulse :</b>'.$data2['ppluse'].'</td>
                        <td style="font-family: freesans;"><b>BP :</b>'.$data2['pbp'].''.'/'.$data2['pbp1'].'</td>
                        <td style="font-family: freesans;"><b>Temp(F) :</b>'.$data2['temp'].'</td>
                        <td style="font-family: freesans;"><b>SPO2 :</b>'.$data2['spo2'].'</td>
                        <td style="font-family: freesans;"><b>RR :</b>'.$data2['rr'].'</td>
                    </tr>
                </table>
            ');}
			
			
			else if($data['did']!=''){
			
			$mpdf->SetHTMLHeader('
                <table width="100%">
                    <tr>
                        <td width="20%" style="font-family: freesans; text-align:left;vertical-align: center;"><img src="KPJ_Updated_Logo.jpg" style="width:100px;">
                        </td>
                        <td width="80%" style="font-family: freesans; text-align:center;vertical-align: top;"><img src="kpj_new_logo_add2.png" style="width:480px;">
                        </td>
					                      
                    </tr>
                </table>
                <hr>

                <table width="100%">
                    <tr>
                        
                        <td width="80%" style="font-family: freesans;text-align: center;"><h1>OUTPATIENT RECORD</h1></td>
                         <td width="20%" style="font-family: freesans; text-align: right; font-weight:bold;font-size:10px;">Date: '.$b.'<br> Episode: '.$data['eid'].'</td>
                    </tr>
                </table>
               
                <table width="100%">
                <tr>
                    <td width="20%" style="font-family: freesans;text-align:left"><h2><b>Doctor Name:</b></h2></td>
                    <td width="80%" style="font-weight: bold !important;font-family: freesans;text-align:left"><h2 ><b>'.$bb.'</h2></b></td>
                </tr>
                <tr>
                    <td width="20%"></td>
                    <td width="80%" style="font-family: freesans;">'.$data3['degree'].'</td>
                </tr>
                <tr>
                    <td width="20%"></td>
                    <td width="80%" style="font-family: freesans;font-weight:bold;">'.$data3['Discipline'].'</td>
                </tr>
            </table>
            
			<table width="100%">
			<tr>
			<td width="10%" align="center" style="font-family: freesans;">
			<barcode code="'.$data['pmrn'].'" type="C128A" class="barcode" />
			MRN-'.$data['pmrn'].'
			</td>
					<td width="80%" align="center">
					
					</td>
					
					<td class="verticalTableHeader" width="10%" align="center" style="font-family: freesans;">
					<barcode code="'.$data['id'].'" type="C128A" class="barcode" />
					Prescription ID-'.$data['id'].'
					</td>
					</tr>
			</table>
			
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td style="font-family: freesans;"> <b>Patient Name : '.$data['pname'].'</b></td>
                        <td style="font-family: freesans;"><b>MRN :'.$data['pmrn'].'</b></td>
                        <td style="font-family: freesans;"><b>GENDER :</b>'.$data['psex'].'</td>
                        <td style="font-family: freesans;"><b>AGE :</b>'.$data['page'].'</td>
                    </tr>
                </table>
            
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td style="font-family: freesans;"><b>H(CM) :</b> '.$data2['height'].'</td>
                        <td style="font-family: freesans;"><b>W(KG) :</b>'.$data2['weight'].'</td>
                        <td style="font-family: freesans;"><b>BMI :</b>'.$data2['pbmi'].'</td>
                        <td style="font-family: freesans;"><b>Pulse :</b>'.$data2['ppluse'].'</td>
                        <td style="font-family: freesans;"><b>BP :</b>'.$data2['pbp'].''.'/'.$data2['pbp1'].'</td>
                        <td style="font-family: freesans;"><b>Temp(F) :</b>'.$data2['temp'].'</td>
                        <td style="font-family: freesans;"><b>SPO2 :</b>'.$data2['spo2'].'</td>
                        <td style="font-family: freesans;"><b>RR :</b>'.$data2['rr'].'</td>
                    </tr>
                </table>
            ');}
            $mpdf->SetHTMLFooter('
                <table width="100%">
                    <tr>
                        <td width="25%" align="center" style="font-family: freesans;">Page-{PAGENO}/{nbpg}</td>
                    </tr>
                    <tr>
                        <td width="100%" style="color:red; font-size:10px; font-family: freesans;">Contact Numbers: Ambulance: 01810008074, +880244077029, Appointments: 01810008080, +880244077030 | (SFMMKPJSH/OPD/MR-01)</td>
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