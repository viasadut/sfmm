

        <?php


function numberToWordsLakh($number) {
    if ($number == 0) return 'zero';

    $words = [
        0 => '', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',
        5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen',
        14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen',
        17 => 'seventeen', 18 => 'eighteen', 19 => 'nineteen',
        20 => 'twenty', 30 => 'thirty', 40 => 'forty', 50 => 'fifty',
        60 => 'sixty', 70 => 'seventy', 80 => 'eighty', 90 => 'ninety'
    ];

    $result = '';

    $units = [
        10000000 => 'crore',
        100000   => 'lakh',
        1000     => 'thousand',
        100      => 'hundred'
    ];

    foreach ($units as $value => $name) {
        if ($number >= $value) {
            $count = floor($number / $value);
            $number %= $value;

            $result .= numberToWordsLakh($count) . " $name ";

            if ($number > 0 && $value == 100) {
                $result .= '';
            }
        }
    }

    if ($number > 0) {
        if ($number < 20) {
            $result .= $words[$number] . ' ';
        } else {
            $tens = floor($number / 10) * 10;
            $unit = $number % 10;
            $result .= $words[$tens] . ' ' . $words[$unit] . ' ';
        }
    }

    return trim(preg_replace('/\s+/', ' ', $result));
}

$number = 3045875;

		
            require('db1.php');
            
            
            $sno=$_REQUEST['sno'];
            
            
           //$output = "";

                 
             require('vendor/autoload.php');         
		 $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'freesans',
                'default_font' => 'freesans',
                //'default_font_size' => 9,
                'mode' => 'utf-8',
	//			 'format' => 'A9-L',
	'format' => [216, 89],   // width, height in mm
				 //'orientation' => 'P',
				
				'margin_left' => 5,
				'margin_right' => 2,
				'margin_top' => 5,
				'margin_bottom' => 2,
	
    
            ]);
             
			$queryp = mysqli_query($con, "SELECT SUM(gtotal) FROM pms_bill_payment WHERE chequeno='$sno'");

			$rowp = mysqli_fetch_array($queryp);
			
		$amount=$rowp['SUM(gtotal)'];
		
				
                $query1 = mysqli_query($con,"select * from pms_bill_payment where chequeno='$sno' order by billno asc limit 1");
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
			
			<td style="font-family: freesans; font-size: 15px; align:left" width="50%" colspan="3">Bill NO: '.$data1['chequeno'].'<br>
			
			Date: '.date('d/m/Y').'
			</td>
			
			
			<td style="font-family: freesans; font-size: 13px; text-align:right" width="50%" colspan="3">
			
			<barcode code="'.$data1['billno'].'" type="C128A" class="barcode" size="1" height="0.8">
			
			
			</td>
			
								
                            </tr>
							
							
							
                        </table>
						
						
						
						<table width="100%">
                            
							<tr>
                               
								<td style="font-family: freesans; font-size: 15px; align:left" width="100%">Name: '.$amount.'
								
								'.numberToWordsLakh($number).'
								
								</td>
								
								
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