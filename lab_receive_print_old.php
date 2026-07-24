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
            $barcode=$_REQUEST['barcode'];
            
            $output = "";

            $query3 = mysqli_query($con,"select * from alltest where barcode1='$barcode'");
					$data3 = mysqli_fetch_array($query3);
			
            
                $output .='<table>
                                <tr>
                                    <th align="left"><b>Date: '.$data3['rdate'].'</b><br><b>Consultant Name: '.$data3['dname'].'</b></th>
                                </tr>
                            </table>
                            <table border="1" width="100%">';
                $query1 = mysqli_query($con,"select * from alltest where barcode1='$barcode'");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
					
					
					$dd=$data1['medi'];
					
					
					$query2 = mysqli_query($con,"select * from radio where iname='$dd'");
					$data2 = mysqli_fetch_array($query2);
					
                    $output .='
                            <tr>
                                <td width="5%"><b>'.$count.'. </b></td>
								<td width="50%" align="center">
			<barcode code="'.$data1['barcode1'].'" type="C128A" class="barcode" /><br>
			<b>'.$data1['barcode1'].'</b><br>
			'.$data1['pname'].'<br>
			'.$data1['pmrn'].'<br>
			'.$data1['medi'].'<br>
			'.$data1['retime'].'
			</td>
                                <td width="45%" >
								'.$data2['s_data'].'<br>
								
								
								</td>
                            </tr>
                            
                    ';
                    $count++;
                }
                $output .= '</table>';
            
			
			
			

            //$output .= '<p align="right">Computer Generated Summary, No Signature Required</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'bangla',
                'default_font' => 'Roboto',
                'default_font_size' => 9,
                'mode' => 'utf-8',
				'margin_left' => 23
            ]);
            
            $mpdf->showWatermarkImage = true;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHTMLHeader('
               
            ');

            $mpdf->SetHTMLFooter('
                
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