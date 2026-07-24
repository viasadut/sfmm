

        <?php
		
		
            require('db1.php');
            
            
            $sno=$_REQUEST['sno'];
            
            
           //$output = "";

                 
             require('vendor/autoload.php');         
		 $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'freesans',
                'default_font' => 'freesans',
                //'default_font_size' => 9,
                'mode' => 'utf-8',
				 'format' => 'A9-L',
				 //'orientation' => 'P',
				
				'margin_left' => 5,
				'margin_right' => 2,
				'margin_top' => 5,
				'margin_bottom' => 2,
            ]);
             
                
				
                $query1 = mysqli_query($con,"select * from medi_stock2 where billno='$sno' order by id asc");
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

$code=$data1['code'];

$queryp = mysqli_query($con, "SELECT * FROM phar_sale WHERE billno='$sno' and code='$code'");

	$rowp = mysqli_fetch_array($queryp);
	
$pname=$rowp['pname'];


$mpdf->AddPage();
				 
           
            		
			  /*$output .='
			 
                       
					   <b>'.$data1['medi'].'
					   
								
                         
						 
   
         ';*/
		 
		   
			   /*<div style="page-break-after:always"></div>*/
		   
         $mpdf->WriteHTML(
		 
		 '<table width="100%">
                            <tr>
                               
								<td style="font-family: freesans; font-size: 10px; text-align:left" width="100%" ><b>KPJ Specialized Hospital</b>
								</td></tr>
								
			<tr></table>
			
			<table width="100%">
                            <tr>
			
			<td style="font-family: freesans; font-size: 15px; align:left" width="50%" colspan="3">Bill NO: '.$data1['billno'].'<br>
			
			Date: '.date('d/m/Y').'
			</td>
			
			
			<td style="font-family: freesans; font-size: 13px; text-align:right" width="50%" colspan="3">
			
			<barcode code="'.$data1['billno'].'" type="C128A" class="barcode" size="1" height="0.8">
			
			
			</td>
			
								
                            </tr>
							
							
							
                        </table>
						
						
						
						<table width="100%">
                            
							<tr>
                               
								<td style="font-family: freesans; font-size: 15px; align:left" width="100%">Name: '.$pname.'</td>
								
								
                            </tr>
                        </table>
						<table width="100%">
                            
							<tr>
                               
								<td style="font-family: freesans; font-size: 12px; align:left" width="25%">MRN: '.$rowp['pmrn'].'</td>
								<td style="font-family: freesans; font-size: 12px; align:left" width="20%">Qty: '.$data1['given_qty'].' Pc/s</td>
								<td style="font-family: freesans; font-size: 12px; align:left" width="30%">B.No: '.$data1['batch_no'].'</td>
								<td style="font-family: freesans; font-size: 12px; align:left" width="25%">EX: '.date('d/m/Y',strtotime($data1['exdate'])).'</td>
								
								
                            </tr>
							</table>
							
							<table width="100%">
														<tr>
                               
								<td style="font-family: freesans; font-size: 15px; align:left" width="100%"><b>'.$data1['b_name'].'('.$data1['g_name'].')'.'</b></td>
								
								
								
                            </tr>
                        </table>
						<table width="100%">
														<tr>
                               
								<td style="font-family: freesans; font-size: 13px; align:justify" width="100%">Instruction: '.$rowp['ins'].'</td>
								
								
								
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