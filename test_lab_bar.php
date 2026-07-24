

        <?php
		
		
            require('db1.php');
            
            
            $id=$_REQUEST['id'];
            $nn=date('Y-m-d');
            
           //$output = "";

                 
             require('vendor/autoload.php');         
		 $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'freesans',
                'default_font' => 'freesans',
                //'default_font_size' => 9,
                'mode' => 'utf-8',
				 'format' => 'A10',
				 //'orientation' => 'P',
				
				'margin_left' => 2,
				'margin_right' => 2,
				'margin_top' => 1,
				'margin_bottom' => 1,
            ]);
             
                
				
                $query1 = mysqli_query($con,"select * from alltest where id='$id' and billstatus='Billed' and type in('lab','LAB','Lab') and rstatus ='Received' and barcode1!=''");
                //$count=1;
               while ($data1 = mysqli_fetch_array($query1)) {		
				$bar='1234567987';
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
		 
		 '
		 
			
<div style="text-align:left;padding-left:5px;" >
<barcode code="'.$bar.'" type="C128C" class="barcode" size="1.1" height=".9">
			</div>
			
			<div style="font-family: freesans; font-size: 14px; font-weight:bold; text-align:left; padding-left:60px;">'.$data1['barcode1'].'
			
		
			
			</div>
			
			<div style="font-family: freesans; font-size: 8px; font-weight:bold; text-align:left; position: relative;left: 100px;">'.$data1['pname'].'
			
			&nbsp;(MRN: '.$data1['pmrn'].')
			
		
			
			</div>
			
			<div style="font-family: freesans; font-size: 8px;  text-align:left; position: relative;left: 100px;">Sex: '.$data1['pgender'].'&nbsp; Age: '.$data1['page'].'</div>
			
			<div style="font-family: freesans; font-size: 8px;  text-align:left; position: relative;left: 100px;">'.$data1['medi'].'</div>
			<div style="font-family: freesans; font-size: 8px;  text-align:left; position: relative;left: 100px;">'.$data1['retime'].'</div>
            

			
			
						'
		 );   
		// $mpdf->WriteHTML($data1['medi']);   
				}
            
		$mpdf->Output();		//
		//$mpdf-> pagebreak;

		  
              


            
        ?>

<!-- http://localhost/sfmm/ticket/pdf_p.php?pmrn=123456&eid=3&date=07/20/2018&dname=Dr.%20Razeeb%20Hassan -->