

        <?php
		
		
            require('db1.php');
            
            
            $sno=$_REQUEST['sno'];
            
            
           //$output = "";

                 
             require('vendor/autoload.php');         
		 $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'freeserif',
                'default_font' => 'freeserif',
                //'default_font_size' => 9,
                'mode' => 'utf-8',
				 'format' => 'A10-L',
				 //'orientation' => 'P',
				
				'margin_left' => 10,
				'margin_right' => 2,
				'margin_top' => 5,
				'margin_bottom' => 2,
            ]);
             
                
				
                $query1 = mysqli_query($con,"select * from phar_sale where sno='$sno' order by id asc");
                //$count=1;
               while ($data1 = mysqli_fetch_array($query1)) {		
				
				/* while ($data1 = mysqli_fetch_array($query1)) $row[] = $data1; 
        foreach ($row as $x){
			
			$id_producto = $x[0];
			$id_producto1 = $x[1];
			$id_producto2 = $x[2];
			$id_producto3 = $x[3];
			$id_producto4 = $x[4];
				
//		*/



$mpdf->AddPage();
				 
           
            		
			  /*$output .='
			 
                       
					   <b>'.$data1['medi'].'
					   
								
                         
						 
   
         ';*/
		 
		   
			   /*<div style="page-break-after:always"></div>*/
		   
         $mpdf->WriteHTML(
		 
		 '<table width="100%">
                            <tr>
                               
								<td style="font-family: freeserif; font-size: 9.5px; align:left" width="100%" ><b>Sheikh Fazilatunnessa Mujib Memorial KPJ Specialized Hospital</b></td>
								
                            </tr>
							
                        </table>
						
						
						<table width="100%">
                            
							<tr>
                               
								<td style="font-family: freeserif; font-size: 12px; align:left" width="50%"><b>Date: '.date('d/m/Y').'</b></td>
								<td style="font-family: freeserif; font-size: 12px; align:right" width="50%"><b>Bill NO: '.$data1['sno'].'</b></td>
								
                            </tr>
                        </table>
						
						<table width="100%">
                            
							<tr>
                               
								<td style="font-family: freeserif; font-size: 12px; align:left" width="100%">Name: '.$data1['pname'].'</td>
								
								
                            </tr>
                        </table>
						<table width="100%">
                            
							<tr>
                               
								<td style="font-family: freeserif; font-size: 12px; align:left" width="50%"><b>MRN: '.$data1['pmrn'].'</b></td>
								<td style="font-family: freeserif; font-size: 12px; align:left" width="50%"><b>Qty: '.$data1['qty'].' Pc/s</b></td>
								
								
                            </tr>
							</table>
							
							<table width="100%">
														<tr>
                               
								<td style="font-family: freeserif; font-size: 12px; align:left" width="100%"><b>'.$data1['brand'].'('.$data1['medi'].')'.'</b></td>
								
								
								
                            </tr>
                        </table>
						<table width="100%">
														<tr>
                               
								<td style="font-family: freeserif; font-size: 12px; align:left" width="100%">Instruction: '.$data1['ins'].'</td>
								
								
								
                            </tr>
                        </table>
						'
		 );   
		// $mpdf->WriteHTML($data1['medi']);   
				}
            
		$mpdf->Output();		//
		//$mpdf-> pagebreak;

		  
              


            
        ?>

<!-- http://localhost/sfmm/ticket/pdf_p.php?pmrn=123456&eid=3&date=07/20/2018&dname=Dr.%20Razeeb%20Hassan -->