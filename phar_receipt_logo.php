<!DOCTYPE html>
<html lang="en">
<head>
    <title>PMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body, div {
            font-family: bangla;
            font-family: serif; font-size: 10pt;
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
			$sno=$_REQUEST['sno'];
            
            $output = "";

            

			$query_eye = "SELECT SUM(tprice),pmrn FROM phar_sale where sno= '$sno';"; 
            $result_eye = mysqli_query($con, $query_eye) or die(mysqli_error());
            $row_eye = mysqli_fetch_assoc($result_eye);
            $total_price=$row_eye['SUM(tprice)'];
			
			
            
                $output .='<br><br><br>
                        <table width="100%">
                            <tr>
                               
								<td width="5%" align="left"><b>SNO</b></td>
								<td width="55%" align="left"><b>Medicine</b></td>
								<td width="20%" align="center"><b>Quantity</b></td>
								<td width="20%" align="center"><b>Price</b></td>
								
								
                            </tr>
                        </table>';
                $query1 = mysqli_query($con,"select * from phar_sale where sno='$sno' order by id asc");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
					
					
                    $output .='
                    
                        <table width="100%">
                            <tr>
                               
								<td width="5%" align="center"><b>'.$count.'.</td>
								<td width="55%" align="left">'.$data1['medi'].'</td>
								<td width="20%" align="center">'.$data1['qty'].'</td>
								<td width="20%" align="center">'.$data1['tprice'].'</td>
								
								
                            </tr>
                        </table>
                    ';
                    $count++;
                }
            
			
			
			$output .= '<br><table width="100%">
                            <tr>
                               
							   <td width="80%" align="right"><b>Total Price:</td>
								<td width="20%" align="center"><b>'.$total_price.'</td>
								
								</tr>
								</table>
								';
			

            $output .= '<br><br><br><p align="right">Computer Generated Bill</p> ';
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
                        <td width="67%"><b><h1 align="laft">SFMMKPJSH MODEL PHARMACY</h1> </b></td>
                        
                    </tr>
                </table>
               <br>
                <table>
                    <tr>
                        <td width="30%" ><h2 align="laft"><b>Bill NO:</b></h2></td>
                        <td width="70%" style="font-weight: bold !important;"><h2 align="laft"><b>'.$sno.'</h2></b></td>
                    </tr>
					<tr>
                        <td width="30%" ><h2 align="laft"><b>MRN:</b></h2></td>
                        <td width="70%" style="font-weight: bold !important;"><h2 align="laft"><b>'.$row_eye["pmrn"].'</h2></b></td>
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