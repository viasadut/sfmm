

        <?php
		
		
            require('db1.php');
            
            
            $sno=$_REQUEST['sno'];
            
            
           //$output = "";

                 
             require('vendor/autoload.php');         
		 $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'freemono',
                'default_font' => 'freemono',
                'default_font_size' => 9,
                'mode' => 'utf-8',
				 'format' => 'A10-L',
				 //'orientation' => 'P',
				
				'margin_left' => 10,
				'margin_top' => 5
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
		 
		 '<table>
                            <tr>
                               
								<td style="font-family: freemono; font-size: 12px; align:left"><b>'.$data1['medi'].'</td>
								
                            </tr>
                        </table>'
		 );   
		// $mpdf->WriteHTML($data1['medi']);   
				}
            
		$mpdf->Output();		//
		//$mpdf-> pagebreak;

		  
              


            
        ?>

<!-- http://localhost/sfmm/ticket/pdf_p.php?pmrn=123456&eid=3&date=07/20/2018&dname=Dr.%20Razeeb%20Hassan -->