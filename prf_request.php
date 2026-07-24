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
     $sno=$_REQUEST['sno'];
    
            
            $output = "";

           $query = mysqli_query($con,"select * from purchase_stock3 where rfid='$sno'");
           //$data = mysqli_fetch_array($query);
		   
		   $query2 = mysqli_query($con,"select SUM(t_price) from purchase_stock3 where rfid='$sno'");
           $data2 = mysqli_fetch_array($query2);
			
			$query3 = mysqli_query($con,"select * from purchase_stock3 where rfid='$sno'");
           $data3 = mysqli_fetch_array($query3);
		   $name=$data3['req_by'];
		   
		   $query4 = mysqli_query($con,"select * from staff3 where sid='$name'");
           $data4 = mysqli_fetch_array($query4);
		   $hos=$data4['hos'];
		   
		   $query5 = mysqli_query($con,"select * from staff3 where sid1='$hos'");
           $data5 = mysqli_fetch_array($query5);
           // $d=$data['date'];
           // $b = date( 'j-F-Y', strtotime( $d) );

			
			
			
			
	
        	

            if(mysqli_fetch_array($query)==false){
            }
            else {
                $output .='
				
				<table border="1" style="border-collapse: collapse" width=100%>
                                
								
								<tr>
                                    <td align="center" rowspan="2"><b>Request BY</b></td>
									<td align="center"><b>Name</b></td>
									<td align="center"><b>Signature</b></td>
									<td align="center"><b>Date</b></td>
									
                                </tr>
                        ';
                    $output .='
                            <tr>
                                
								
								
								</td>
                
														<td align="left"><b>'.$data4['sname'].'<b></td>
														<td align="center"><b> <b></td>
														
														<td align="center"><b>'.$data3['auth_date'].' <b></td>
														
                            </tr>
							
                            
                    ';
					
					
					$output .='
				
				
                                
								
								<tr>
                                    <td align="center"><b>Designation</b></td>
										<td align="left" colspan="2"><b>'.$data4['desig'].'<b></td>
										
										<td align="center"><b>Staff NO</b></td>
										
									
                                </tr>
								
								<tr>
                                    <td align="center"><b>Department</b></td>
										<td align="left" colspan="2"><b>'.$data3['location'].'<b></td>
									<td align="center"><b>'.$data4['sid1'].'</b></td>
                                </tr>
								
								<tr>
                                    <td align="center"><b>Department Head</b></td>
										<td align="left" colspan="2"><b>'.$data5['sname'].'<b></td>
									<td align="center"><b>'.$data4['hos'].'</b></td>
                                </tr>
								
								
								<tr>
                                    <td align="center" colspan="4"><b>Purchase Justification ( PRF NO- '.$sno.')</b></td>
										
									
                                </tr>
								<tr><td align="left" colspan="4">
								
								
								
                        ';
                  $query15 = mysqli_query($con,"select remarks from purchase_stock3 where rfid='$sno' order by id asc");
                
                while ($data15 = mysqli_fetch_array($query15)) {
                	
                 $output .='
                            
								
                                    <b>'.$data15['remarks'].', </b>
										
									
                                ';
					
					
					
					
					
               
				}		
				
                $output .= '</td></tr></table>';
				
				
				
				 $output .='<br><table border="1" style="border-collapse: collapse">
                                <tr>
                                    <th colspan="11" align="center"><b>Purchase Details</b></th></tr>
								
								<tr>
                                    <th><b>SNO</b></th>
									<th><b>Item Description</b></th>
									<th><b>Purchase Code</b></th>
									<th><b>Charge Code</b></th>
									<th><b>Date Of Last Purchase</b></th>
									<th><b>Per Level</b></th>
									<th><b>Stock Balance</b></th>
									<th><b>Monthly Avg. Usage</b></th>
									<th><b>Req. Qty</b></th>
									<th><b>Unit Cost</b></th>
									<th><b>Total Cost</b></th>
                                </tr>
                        ';
                $query1 = mysqli_query($con,"select * from purchase_stock3 where rfid='$sno' order by id asc");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
                    $output .='
                            <tr>
                                <td align="center"><b>'.$count.' </b>
								
								
								</td>
                                <td><b> '.$data1['g_name'].'<b></td>
								    <td align="center"><b><b></td>
									    <td align="center"><b> '.$data1['code'].'<b></td>
										    
											<td align="center"><b>'.$data1['lpdate'].'<b></td>
											    <td align="center"><b>'.$data1['plevel'].'<b></td>
												    <td align="center"><b> '.$data1['balance'].'<b></td>
													    <td align="center"><b>'.$data1['musage'].'<b></td>
														<td align="center"><b> '.$data1['req_qty'].'<b></td>
														<td align="center"><b> '.$data1['u_price'].'<b></td>
														<td align="center"><b> '.$data1['t_price'].'<b></td>
														
                            </tr>
							
                            
                    ';
                    $count++;
					
					
					
					
               
				}
				
				 $output.='<tr>
				 <td align="right" colspan="10"><b>Total Amount<b></td>
														<td align="center"><b>'.$data2['SUM(t_price)'].'<b></td>
							</tr>';
				
                $output .= '</table>';
				
				
				if($data3['fstatus']=='1'){
				
				$output .='<br><table border="1" style="border-collapse: collapse" width=100%>
                                <tr>
                                    <th align="center" colspan="5"><b>Approvals</b></th></tr>
								
								<tr>
                                    <th><b>Name</b></th>
									<th><b>Designation</b></th>
									<th><b>Signature</b></th>
									<th><b>Date Approval</b></th>
									<th><b>Remarks</b></th>
									
                                </tr>
								
								<tr>
                                    <th align="left"><b>Dr. Razeeb Hassan</b></th>
									<th><b>Medical Director</b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
									
									
                                </tr>
								<tr>
                                    <th align="left"><b>Amit Kumar Dhali</b></th>
									<th><b>CFO(Acting)</b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
									
                                </tr>
								<tr>
                                    <th><b><br></b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
									
									
                                </tr>
                        ';
                
				
				 
				
                $output .= '</table>';
				}
				
				
				
				
				else if($data3['fstatus']==3){
				
				$output .='<br><table border="1" style="border-collapse: collapse" width=100%>
                                <tr>
                                    <th align="center" colspan="5"><b>Approvals</b></th></tr>
								
								<tr>
                                    <th><b>Name</b></th>
									<th><b>Designation</b></th>
									<th><b>Signature</b></th>
									<th><b>Date Approval</b></th>
									<th><b>Remarks</b></th>
									
                                </tr>
								
								<tr>
                                    <th align="left"><b>Dr. Razeeb Hassan</b></th>
									<th><b>Medical Director</b></th>
									<th><b></b></th>
									<th><b></b></th>
									<th><b><br></b></th>
									
									
                                </tr>
								<tr>
                                    <th align="left"><b>Amit Kumar Dhali</b></th>
									<th><b>CFO(Acting)</b></th>
									<th><b><img src="1601.jpg"  style="height:30px; width:80px;"></b></th>
									<th><b>'.$data3['cfo_time'].'</b></th>
									<th><b><br></b></th>
									
                                </tr>
								<tr>
                                    <th><b><br></b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
									
									
                                </tr>
                        ';
                
				
				 
				
                $output .= '</table>';
				
				}
				
				else if($data3['fstatus']==4){
				
				$output .='<br><table border="1" style="border-collapse: collapse" width=100%>
                                <tr>
                                    <th align="center" colspan="5"><b>Approvals</b></th></tr>
								
								<tr>
                                    <th><b>Name</b></th>
									<th><b>Designation</b></th>
									<th><b>Signature</b></th>
									<th><b>Date Approval</b></th>
									<th><b>Remarks</b></th>
									
                                </tr>
								
								<tr>
                                    <th align="left"><b>Dr. Razeeb Hassan</b></th>
									<th><b>Medical Director</b></th>
									<th><b><img src="118.jpg" style="height:30px; width:80px;"></b></th>
									<th><b>'.$data3['ceo_time'].'</b></th>
									<th><b><br></b></th>
									
									
                                </tr>
								<tr>
                                    <th align="left"><b>Amit Kumar Dhali</b></th>
									<th><b>CFO(Acting)</b></th>
									<th><b><img src="1601.jpg" style="height:30px; width:80px;"></b></th>
									<th><b>'.$data3['cfo_time'].'</b></th>
									<th><b><br></b></th>
									
                                </tr>
								<tr>
                                    <th><b><br></b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
									
									
                                </tr>
                        ';
                
				
				 
				
                $output .= '</table>';
				
				}
				
				$output .='<br><table border="1" style="border-collapse: collapse" width=100%>
                                <tr>
                                    <th align="center" colspan="6"><b>Item Received By</b></th></tr>
								
								<tr>
                                    <th><b>Name</b></th>
									<th><b>Designation</b></th>
									<th><b>Department</b></th>
									<th><b>Signature</b></th>
									<th><b>Received Date</b></th>
									<th><b>Remarks</b></th>
									
                                </tr>
								    
								<tr>
                                    
									<th><b><br></b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
									<th><b><br></b></th>
                                </tr>
			</table>
<table border="0" style="border-collapse: collapse" width=100%>
<tr>
<td align="left" colspan="5" border="0">Issue No:2, Date:01 June,2023</td>
<td align="right" border="0">SFMMKPJSH/PCS/-14</td>

</tr>			
                        ';
						$output .= '</table>';
            }
			
			
			

            

           // $output .= '<p align="left">Issue No:2, Date:01 June 2023</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'bangla',
                'default_font' => 'Roboto',
                'default_font_size' => 9,
                'mode' => 'utf-8',
				'margin_left' => 23
            ]);
            $mpdf->SetWatermarkImage(
               
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
                    <td width="100%" style="font-family: freesans; text-align:center;vertical-align: top;"><img src="kpj_new_logo_add2.png" style="width:480px;">
                        
                    </tr>
                </table>
                <hr>

                
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
           // $fileName = $data['pname'].'-'.$data['pmrn'].'.pdf';
            ob_clean(); 
            $mpdf->Output();
        ?>
        </div>
    </div>
</div>

</body>
</html>

<!-- http://localhost/sfmm/ticket/pdf_p.php?pmrn=123456&eid=3&date=07/20/2018&dname=Dr.%20Razeeb%20Hassan -->