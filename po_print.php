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
     $encryption=$_REQUEST['ono'];
    $options = 0;
    $ciphering = "AES-256-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "kpj";
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    $ono4 = $decryption;
            
            $output = "";

           $query = mysqli_query($con,"select * from po_table1 where po_ono='$ono4'");
           $data = mysqli_fetch_array($query);
		   
		   $query2 = mysqli_query($con,"select SUM(tprice) from po_table1 where po_ono='$ono4'");
           $data2 = mysqli_fetch_array($query2);
			
			$query3 = mysqli_query($con,"select * from po_table where ono='$ono4'");
           $data3 = mysqli_fetch_array($query3);
		   $name=$data3['issue_person'];
		   
		   $query4 = mysqli_query($con,"select * from staff3 where sid='$name'");
           $data4 = mysqli_fetch_array($query4);
		   
		   
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
										<td align="left" colspan="2"><b>'.$data4['dept'].'<b></td>
									<td align="center"><b>'.$data4['sid1'].'</b></td>
                                </tr>
								
								<tr>
                                    <td align="center"><b>Department Head</b></td>
										<td align="left" colspan="2"><b>'.$data4['hos'].'<b></td>
									<td align="center"><b>'.$data4['hos'].'</b></td>
                                </tr>
								
								
								<tr>
                                    <td align="center" colspan="4"><b>Purchase Justification</b></td>
										
									
                                </tr>
								
								
								<tr>
                                    <td align="left" colspan="4"><b>asdasd<br>ajhdjash<br>ajsdhjh</b></td>
										
									
                                </tr>
								
								
                        ';
                    
                	
               
							
				
                $output .= '</table>';
				
				
				
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
                $query1 = mysqli_query($con,"select * from po_table1 where po_ono='$ono4' order by id asc");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
                    $output .='
                            <tr>
                                <td align="center"><b>'.$count.' </b>
								
								
								</td>
                                <td><b> '.$data1['name'].'<b></td>
								    <td align="center"><b><b></td>
									    <td align="center"><b> '.$data1['code'].'<b></td>
										    
											<td align="center"><b><b></td>
											    <td align="center"><b><b></td>
												    <td align="center"><b> '.$data1['stock'].'<b></td>
													    <td align="center"><b><b></td>
														<td align="center"><b> '.$data1['o_qty'].'<b></td>
														<td align="center"><b> '.$data1['uprice'].'<b></td>
														<td align="center"><b> '.$data1['tprice'].'<b></td>
														
                            </tr>
							
                            
                    ';
                    $count++;
					
					
					
					
               
				}
				
				 $output.='<tr>
				 <td align="right" colspan="10"><b>Total Amount<b></td>
														<td align="center"><b>'.$data2['SUM(tprice)'].'<b></td>
							</tr>';
				
                $output .= '</table>';
				
				
				
				
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
                                    <th><b>Mohd. Taufik Bin Ismail</b></th>
									<th><b>CEO</b></th>
									<th><b>CEO</b></th>
									<th><b>CEO</b></th>
									<th><b>CEO</b></th>
									
									
                                </tr>
								<tr>
                                    <th><b>Nuradilah Binti Shuib</b></th>
									<th><b>CFO</b></th>
									<th><b>CEO</b></th>
									<th><b>CEO</b></th>
									<th><b>CEO</b></th>
									
                                </tr>
								<tr>
                                    <th><b></b></th>
									<th><b>CEO</b></th>
									<th><b>CEO</b></th>
									<th><b>CEO</b></th>
									<th><b>CEO</b></th>
									
									
                                </tr>
                        ';
                
				
				 
				
                $output .= '</table>';
				
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
                                    
									<th><b></b></th>
									<th><b></b></th>
									<th><b></b></th>
									<th><b></b></th>
									<th><b></b></th>
									<th><b></b></th>
                                </tr>
								
                        ';
						$output .= '</table>';
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
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.<br><br>Purchase Request Form(PRF) </td>
						
                        <td width="15%" style="text-align: right;"><img src="2.png"></td>
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