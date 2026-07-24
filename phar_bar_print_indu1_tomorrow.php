

        <?php
		
		
            require('db1.php');
$dd= date('m/d/Y',strtotime("+1 days")); 
$retime=date('Y-m-d');
            
            
            $id=$_REQUEST['id'];
            $nn=date('Y-m-d');
            
           //$output = "";

                 
             require('vendor/autoload.php');         
		 $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'freesans',
                'default_font' => 'freesans',
                //'default_font_size' => 9,
                'mode' => 'utf-8',
				 'format' => 'A8-L',
				 //'orientation' => 'P',
				
				'margin_left' => 2,
				'margin_right' => 1,
				'margin_top' => 1,
				'margin_bottom' => 1,
            ]);
             
                
				
                $query1 = mysqli_query($con,"select * from imedi3 where id='$id'");
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


$rfid1=$data1['rfid1'];

$sel95="SELECT * FROM medi_stock WHERE `sno`='$rfid1';";
$result95 = mysqli_query($con,$sel95);
$b_chk=mysqli_fetch_assoc($result95);
$batch_no=$b_chk['batch_no'];

$mpdf->AddPage();
				 
           
            		
			  /*$output .='
			 
                       
					   <b>'.$data1['medi'].'
					   
								
                         
						 
   
         ';*/
		 
		   
			   /*<div style="page-break-after:always"></div>*/
		   
         $mpdf->WriteHTML(
		 
		 '

			
			<barcode code="'.$data1['rfid'].'" type="C128A" class="barcode" size=".52" height="1.2" style="text-align:left;">
			
			

			<div style="font-family: freesans; font-size: 8px; font-weight:bold; text-align:left; position: relative;left: 100px;">'.$data1['rfid'].'&nbsp;&nbsp;&nbsp;&nbsp;
			'.date('d/m/y',  strtotime($data1['ndate'])).'('.$data1['time'].')<br>
			MRN: '.$data1['pmrn'].'&nbsp;&nbsp;
			
			Batch: '.$batch_no.'
			
			</div>
			
			
			
			<div style="font-family: freesans; font-size: 9px;  text-align:left; position: relative;left: 100px;">'.$data1['infusion'].'</div>
            

			
			
						'
		 );   
		// $mpdf->WriteHTML($data1['medi']);   
				}
            
		$mpdf->Output();		//
		//$mpdf-> pagebreak;

		  
              


            
        ?>

<!-- http://localhost/sfmm/ticket/pdf_p.php?pmrn=123456&eid=3&date=07/20/2018&dname=Dr.%20Razeeb%20Hassan -->