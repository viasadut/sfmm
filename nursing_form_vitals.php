<!DOCTYPE html>
<html lang="en">
<head>
    <title>PMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        img {
            height: 100px;
            width: 100px;
        }

        table {
            margin-left: 0%;
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
            $pmrn=$_REQUEST['pmrn'];
			$pname=$_REQUEST['pname'];
			$eid=$_REQUEST['eid'];
			$dname=$_REQUEST['dname'];
            $page=$_REQUEST['page'];
			$pgender=$_REQUEST['gender'];

            $output = "";

			
			
			
            $d=$data['date'];
            $b = date( 'j-F-Y', strtotime( $d) );

			
            $output .='
            

            <div style="position: absolute; left:50; width: 100%;" >
            <img src="nursing_form_pic/Daily_Intake.jpg">
</div>
';	


			
			
	

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
                <table width="100%">
                    <tr>
                        <td width="15%"><img src="2.png"></td>
                        <td width="70%" align="center" style="text-align: center; font-weight: bold; font-size:17px;">
                        KPJ SPECIALIZED HOSPITAL <br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        <td width="15%" style="text-align: right;"></td>
                    </tr>
                </table>
                <hr>

            
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td> <b>Patient Name : '.$pname.'</b></td>
                        <td><b>MRN :'.$pmrn.'</b></td>
                        <td><b>GENDER :</b>'.$pgender.'</td>
                        <td><b>AGE :</b>'.$page.'</td>
                    </tr>
                </table>
            
               
            ');

            $mpdf->SetHTMLFooter('
                <table width="100%">
                    <tr>
                        <td width="100%" align="center">Page-{PAGENO}/{nbpg}</td>
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