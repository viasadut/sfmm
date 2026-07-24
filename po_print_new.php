<?php
function convert_to_words_array($number)
{
    $words = array(
        '0' => 'Zero', '1' => 'One', '2' => 'Two',
        '3' => 'Three', '4' => 'Four', '5' => 'Five',
        '6' => 'Six', '7' => 'Seven', '8' => 'Eight',
        '9' => 'Nine', '10' => 'Ten', '11' => 'Eleven',
        '12' => 'Twelve', '13' => 'Thirteen', '14' => 'Fourteen',
        '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
        '18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty',
        '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty', '60' => 'Sixty',
        '70' => 'Seventy', '80' => 'Eighty', '90' => 'Ninety'
    );

    if ($number <= 20) {
        return $words[$number];
    }
    elseif ($number < 100) {
        return $words[10 * floor($number / 10)]
            . ($number % 10 > 0 ? ' ' . $words[$number % 10] : '');
    }
    else {
        $output = '';
        if ($number >= 1000000000) {
            $output .= convert_to_words_array(floor($number / 1000000000))
                . ' Billion ';
            $number %= 1000000000;
        }
        if ($number >= 100000) {
            $output .= convert_to_words_array(floor($number / 100000))
                . ' Lac ';
            $number %= 100000;
        }
		
		
        if ($number >= 1000) {
            $output .= convert_to_words_array(floor($number / 1000))
                . ' Thousand ';
            $number %= 1000;
        }
        if ($number >= 100) {
            $output .= convert_to_words_array(floor($number / 100))
                . ' Hundred ';
            $number %= 100;
        }
        if ($number > 0) {
            $output .= ($number <= 20) ? $words[$number] :
            $words[10 * floor($number / 10)] . ' '
                . ($number % 10 > 0 ? $words[$number % 10] : '');
        }
        return trim($output); 
    }
}


?>


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
     $ono=$_REQUEST['ono'];
    
            
            $output = "";

           $query = mysqli_query($con,"select * from po_table1 where po_ono='$ono'");
           //$data = mysqli_fetch_array($query);
		  
           $query22 = mysqli_query($con,"select * from po_table where ono='$ono'");
           $data22 = mysqli_fetch_array($query22);
            $sup_name=$data22['sup_code'];
            $issue=$data22['issue_person'].'.jpg';

            $po_date=date('d/m/Y', strtotime($data22['enter_date']));
$sid=$data22['issue_person'];

            $query22s = mysqli_query($con,"select * from staff3 where sid='$sid'");
            $data22s = mysqli_fetch_array($query22s);

        $query222 = mysqli_query($con,"select * from suppliers_master where supplier_code='$sup_name'");
           $data222 = mysqli_fetch_array($query222);

		   $query2 = mysqli_query($con,"select SUM(t_price) from purchase_stock where ono='$ono'");
           $data2 = mysqli_fetch_array($query2);
			
    	    $query3 = mysqli_query($con,"select * from purchase_stock where ono='$ono'");
           $data3 = mysqli_fetch_array($query3);
		   $name=$data3['re_by'];
           $sno=$data3['rfid'];
		   
		   $query4 = mysqli_query($con,"select * from staff3 where sid='$name'");
           $data4 = mysqli_fetch_array($query4);
		   $hos=$data4['hos'];
		   
		   $query5 = mysqli_query($con,"select * from staff3 where sid1='$hos'");
           $data5 = mysqli_fetch_array($query5);
           // $d=$data['date'];
           // $b = date( 'j-F-Y', strtotime( $d) );

           $queryz = mysqli_query($con,"select SUM(tprice) from po_table1 where po_ono='$ono'");
           $dataz = mysqli_fetch_array($queryz);
			
		$final_price=$dataz['SUM(tprice)']-$data22['amount_discount'];	
			
           
        	

            if(mysqli_fetch_array($query)==false){
            }
            else {
                $output .='

                            
				<table border="0" style="border-collapse: collapse" width=100%>
                <tr>                
                <td style="font-family: freesans; text-align:left;" width="20%"><barcode code="'.$data22['ono'].'" type="C128A" class="barcode" />
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;ID-'.$data22['ono'].'
                </td>
                
                <td style="font-family: freesans; text-align:left;" width="60%">
                </td>
                <td style="font-family: freesans; text-align:left;" width="20%"><barcode code="'.$data22['id'].'" type="C128A" class="barcode" />
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                PO NO-'.$data22['id'].'
                </td>
					</tr>
                    </table>
                    <table border="0" style="border-collapse: collapse" width=100%>
                    <tr>
                    <td width=100%>
                    __________________________________________________________________________________________</td>
                    </tr>
                    </table>
                    <table border="0" style="border-collapse: collapse" width=100%>
                    <tr>
                                    <td style="text-align:left;vertical-align:top" width="60%"><b>Supplier:'.$data222['supplier_name'].'<br>'.$data222['address'].'</b></td>
                                    <td style="text-align:left;vertical-align:top" width="40%"><b>Supplier Code&nbsp;&nbsp;&nbsp;&nbsp;:'.$data222['supplier_code'].' 
                                    <br>Purchase Order No:'.$data22['id'].'
                                    <br>PO Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:'.$data22['po_type'].'
                                    <br>Order Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:'.$po_date.'</b></td>
									
                                </tr>
                                </table>
                                <table border="0" style="border-collapse: collapse" width=100%>
                    <tr>
                    <td width=100%>
                    __________________________________________________________________________________________</td>
                    </tr>
                    </table>
                    <table border="0" style="border-collapse: collapse" width=100%>

                                <tr>
                                    <td style="text-align:left;vertical-align:top" width="60%"><b>Delivery To&nbsp;&nbsp;&nbsp;:KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE
                                    <br>Receiving Area:'.$data22['d_department'].'</b></td>
                                    <td style="text-align:left;vertical-align:top" width="40%"><b>Expected Date&nbsp;&nbsp;&nbsp;&nbsp;:'.date('d/m/Y', strtotime($data22['ex_date'])).' 
                                    <br>Payment terms&nbsp;&nbsp;&nbsp;&nbsp;:0
                                    </b></td>
									
                                </tr>
                                </table>
                        ';
                    $output .='
                    <table border="0" style="border-collapse: collapse" width=100%>
                    <tr>
                    <td width=100%>
                    __________________________________________________________________________________________</td>
                    </tr>
                    </table>
                    
                    <br>
                    <table border="0" style="border-collapse: collapse" width=100%>
                            
                    <tr>
                                
								
								
						
														<td style="text-align:left" width="5%">S/N</td>
														<td style="text-align:left" width="60%">Item</td>
                                                        <td style="text-align:left" width="10%">Qty</td>
                                                        <td style="text-align:left" width="15%">Unit Price</td>
                                                        <td style="text-align:left" width="10%">Amount(BDT)</td>
                                                        
														
														
                            </tr>
							
                            </table>
                            <table border="0" style="border-collapse: collapse" width=100%>
                    <tr>
                    <td width=100%>
                    __________________________________________________________________________________________</td>
                    </tr>
                    </table>
                            
							
                    ';
                    $count=1;
					$query15 = mysqli_query($con,"select * from po_table1 where po_ono='$ono' order by id asc");
                
                while ($data15 = mysqli_fetch_array($query15)) {
                	
                 $output .='
                 <table border="0" style="border-collapse: collapse" width=100%>
								
                 <tr>
                                
								
								
						
                 <td style="text-align:left" width="5%">'.$count.'.</td>
                 <td style="text-align:left" width="60%">'.$data15['name'].'('.$data15['brand'].')
                 <br> ('.$data15['code'].') - '.$data15['p_remarks'].'
                 </td>
                 <td style="text-align:left" width="10%">'.$data15['o_qty'].'</td>
                 <td style="text-align:left" width="15%">'.$data15['uprice'].'</td>
                 <td style="text-align:left" width="10%">'.$data15['tprice'].'</td>
                 
                 
                 
</tr>
</table>

										
									
                                ';
					
                                $count++;	
					
					
					
               
				}
                $output .= '</table>';



					
                
                $output .='
                <table border="0" style="border-collapse: collapse" width=100%>
<tr>
<td width=100% style="text-align:right;">
_________________________________________</td>
</tr>
</table>
<table border="0" style="border-collapse: collapse" width=100%>
<tr>
                                
								
								
						
<td style="text-align:left" width="5%"></td>
<td style="text-align:left" width="60%"></td>
<td style="text-align:left" width="10%"></td>
<td style="text-align:left" width="15%"><b>Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
<td style="text-align:left" width="10%"><b>'.$dataz['SUM(tprice)'].'</b></td>



</tr>

<tr>
                                
								
								
						
<td style="text-align:left" width="5%"></td>
<td style="text-align:left" width="60%"></td>
<td style="text-align:left" width="10%"></td>
<td style="text-align:left" width="15%"><b>Discount&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
<td style="text-align:left" width="10%"><b>'.$data22['amount_discount'].'</b></td>



</tr>

<tr>
                                
								
								
						
<td style="text-align:left" width="5%"></td>
<td style="text-align:left" width="60%"></td>
<td style="text-align:left" width="10%"></td>
<td style="text-align:left" width="15%"><b>Total Amount:</b></td>
<td style="text-align:left" width="10%"><b>'.$final_price.'</b></td>



</tr>


</table>

<table border="0" style="border-collapse: collapse" width=100%>
<tr>
                                
								
								
						

<td style="text-align:left" width="100%">In Words: '.convert_to_words_array($final_price).'	Taka Only.</td>



</tr>
</table>
                <table border="0" style="border-collapse: collapse" width=100%>
                <tr>
                <td width=100%>
                __________________________________________________________________________________________</td>
                </tr>
                </table>
                <br>
				<table border="0" style="border-collapse: collapse" width=100%>
                                
								
								<tr>
                                    <td align="center" width="30%"><b>Issued By<br><br><br><br>
                                    <img src="'.$issue.'" style="height:30px; width:80px; text-align:left">
<br />
                                    '.$data22s['sname'].'<br>'.$data22s['desig'].'<br>'.$data22s['dept'].'</b>
                                    
                                    </td>
                                    ';

                                    if($data22['status']=='Approved'){
                                    $output .='

                                    <td align="center" width="30%"><b>Verified By<br><br><br><br>
                                    <img src="cfo.jpg" style="height:30px; width:80px; text-align:left">
                                    <br />
                                    Amit Kumar Dhali<br>CHIEF FINANCE OFFICER<br>(Acting)</b></b></td>

                                    <td align="center" width="40%"><b>Approved By<br><br><br><br>
                                    <img src="118.jpg" style="height:30px; width:80px; text-align:left">
                                    <br />
                                    Dr. Razeeb Hassan<br>Medical Director <br>.</b></b></td>
                                    ';
                                    }

                                    else if($data22['status']=='FORWARD FOR CEO APPROVAL'){
                                        $output .='
    
                                        <td align="center" width="30%"><b>Verified By<br><br><br><br>
                                        <img src="cfo.jpg" style="height:30px; width:80px; text-align:left">
                                        <br />
                                        Amit Kumar Dhali<br>CHIEF FINANCE OFFICER<br>(Acting)</b></b></td>
    
                                        <td align="center" width="40%"><b>Approved By<br><br><br><br>
                                        
                                        <br />
                                        Dr. Razeeb Hassan<br>Medical Director <br>.</b></b></td>
                                        ';
                                        }

                                        else if($data22['status']=='FORWARD FOR APPROVAL' || $data22['status']==''){
                                            $output .='
        
                                            <td align="center" width="30%"><b>Verified By<br><br><br><br>
                                            
                                            <br />
                                            Amit Kumar Dhali<br>CHIEF FINANCE OFFICER<br>(Acting)</b></b></td>
        
                                            <td align="center" width="40%"><b>Approved By<br><br><br><br>
                                            
                                            <br />
                                            Dr. Razeeb Hassan<br>Medical Director <br>.</b></b></td>
                                            ';
                                            }
                                    
                                    $output .='</tr>

                                </table>
                          
                    
                        ';

                        $output .='
                <table border="0" style="border-collapse: collapse" width=100%>
                <tr>
                <td width=100%>
                __________________________________________________________________________________________</td>
                </tr>
                </table>
                <br>
				<table border="0" style="border-collapse: collapse" width=100%>
                                
                <tr>
                                    <td align="left" width="100%"><b>Remarks:</b> '.nl2br($data22['remarks']).'
                                    </td>
                                    
                                </tr>
								
								<tr>
                                    <td align="left" width="10%"><b>Terms And Conditions:
                                    </b></td></tr>
                                    <tr>
                                    <td align="left" width="100%">'.nl2br($data22['terms']).'
                                    </td>
                                    
                                </tr>
                                </table>
                          
                    
                        ';
                

                        
                        
                    }
			
			
                    
                    
                    
            

           // $output .= '<p align="left">Issue No:2, Date:01 June 2023</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'bangla',
                'default_font' => 'freemono',
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
                        <td width="10%"><img src="kpj_logo.jpeg" style="height:80px; width:150px; text-align:left"></td>
                        <td width="90%" style="text-align: left; font-weight: bold; font-size:18px;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KPJ SPECIALIZED HOSPITAL <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PURCHASE ORDER</td>
						
                        
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