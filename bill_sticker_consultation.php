

        <?php
		
		//window.print();
            require('db1.php');
            
            
            $id=$_REQUEST['billno'];
            $nn=date('Y-m-d');
            
           //$output = "";

                 
             require('vendor/autoload.php');         
		 $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'freesans',
                'default_font' => 'freesans',
                //'default_font_size' => 9,
                'mode' => 'utf-8',
				 'format' => 'A6-P',
				 //'orientation' => 'P',
				
				'margin_left' => 4,
				'margin_right' => 1,
				'margin_top' => 4,
				'margin_bottom' => 1,
            ]);
             
                
				
                $query1 = mysqli_query($con,"select * from pappnew where billno='$id'");
                //$count=1;
               while ($data1 = mysqli_fetch_array($query1)) {		
$dname=$data1['dname'];
$query2 = mysqli_query($con,"select * from doctor1 where dname='$dname'");
                //$count=1;
               $data2 = mysqli_fetch_array($query2);				
				/* while ($data1 = mysqli_fetch_array($query1)) $row[] = $data1; 
        foreach ($row as $x){
			
			$id_producto = $x[0];
			$id_producto1 = $x[1];
			$id_producto2 = $x[2];
			$id_producto3 = $x[3];
			$id_producto4 = $x[4];





Refer By: <?php echo $data1['dreffer'].' '.$data1['dreffer'];?>
				
//		*/


$mpdf->AddPage();
				 
           
            		
			  /*$output .='
			 
                       
					   <b>'.$data1['medi'].'
					   
								
                         
						 
   
         ';*/
		 
		   
			   /*<div style="page-break-after:always"></div>*/
			   $mpdf->WriteHTML('
			   <div style="font-family: freesans; font-size: 10px; font-weight:bold; text-align:center;">KPJ Specialized Hospital</div>
			   

			   <div style="font-family: freesans; font-size: 14px; text-align:left; position: relative;left: 100px; font-weight:bold;">
			   ID: '.$data1['ID'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			   Date: '.date("d/m/Y", strtotime($data1['adate1'])).'
			   </div>
			   
			   <div style="font-family: freesans; font-size: 20px; font-weight:bold; text-align:left;vertical-align:top;">
			   MRN: '.$data1['pmrn'].' &nbsp;&nbsp;<barcode code="'.$data1['pmrn'].'" type="C128A" class="barcode" size=".82" height=".8" style="text-align:right;"></div>
			   
			   
			   <div style="font-family: freesans; font-size: 18px; text-align:left; position: relative;left: 100px; font-weight:bold;" >
			   Name: '.ucwords(strtolower($data1['pname'])).'
			   </div>
			   
			   <div style="font-family: freesans; font-size: 14px; text-align:left; position: relative;left: 100px; font-weight:bold;">
			   Age: '.$data1['page'].'
			   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			   &nbsp;&nbsp;&nbsp;  
			   Gender: '.$data1['psex'].'
			   </div>
			   
			   
			   
			   ');
		// $mpdf->WriteHTML($data1['medi']);   
				}
            
		$mpdf->Output();		//
		//$mpdf-> pagebreak;

		  
              


            
        ?>

