<!DOCTYPE html>
<html lang="en">
<head>
    <title>PMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body{
            font-family: freesans;
            
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
            $id=$_REQUEST['id'];
            $pmrn=$_REQUEST['d_pmrn'];
            //$dname=$_REQUEST['dname'];
            
            
			
			
$query = mysqli_query($con,"select * from vitals_report_format where id='$id'");
            $data = mysqli_fetch_array($query);
                       
            
            $query39 = mysqli_query($con,"select * from transplant_donor where donor_mrn='$pmrn'");
            $row39 = mysqli_fetch_array($query39);   
            //$result39 = mysqli_query($con, $query39) or die(mysqli_error());
            
            // Print out result
            //$row39 = mysqli_fetch_array($result39);
            
			
			$b=date('d/m/Y');
			
			
	
        $output .='
                <table>
                   
                    <tr>
                        <td style="font-family: freesans;">
                        '.$data['report'].'
                        </td>
                    </tr>
					
					
                </table>
';	
			

            $output .= '<p align="right" style="font-family: freesans;">Software Generated Report, No Signature Required</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'freesans',
               // 'default_font' => 'freesans',
                'default_font_size' => 9,
                'mode' => 'utf-8',
				'margin_left' => 23
            ]);
           /* $mpdf->SetWatermarkImage(
                '1001.jpg',
                5,
                '',
                array(177,43)
            );*/
            $mpdf->showWatermarkImage = true;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
           
			
			$mpdf->SetHTMLHeader('
                <table width="100%">
                    <tr>
                        <td width="15%"><img src="1.png"></td>
                        <td width="70%" align="center" style="text-align: center; font-weight: bold; font-size:17px; font-family: freesans;">SHEIKH FAZILATUNNESA MUJIB MEMORIAL<br>
                        KPJ SPECIALIZED HOSPITAL <br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        <td width="15%" style="text-align: right;"><img src="2.png"></td>
                    </tr>
                </table>
                <hr>

                <table width="100%">
                    <tr>
                        
                        <td width="80%" style="font-family: freesans;text-align: center;"><h1></h1></td>
                         <td width="20%" style="font-family: freesans; text-align: right; font-weight:bold;font-size:10px;">Date: '.$b.'</td>
                    </tr>
                </table>
               
               
			
                <table style="border: 1px solid black" width="100%" >
                    <tr>
                        <td style="font-family: freesans;"> <b>Patient Name : '.$row39['donor_name'].'</b></td>
                        <td style="font-family: freesans;"><b>MRN :'.$row39['donor_mrn'].'</b></td>
                        <td style="font-family: freesans;"><b>GENDER :</b>'.$row39['gender'].'</td>
                        <td style="font-family: freesans;"><b>AGE :</b>'.$row39['dob'].'</td>
                    </tr>
                </table>
            
                
            ');
			
			
			
            $mpdf->SetHTMLFooter('
                <table width="100%">
                    <tr>
                        <td width="25%" align="center" style="font-family: freesans;">Page-{PAGENO}/{nbpg}</td>
                    </tr>
                    <tr>
                        <td width="100%" style="color:red; font-size:10px; font-family: freesans;">Contact Numbers: Ambulance: 01810008074, +880244077029, Appointments: 01810008080, +880244077030 | (SFMMKPJSH/OPD/MR-01)</td>
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