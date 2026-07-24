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
            $pmrn=$_REQUEST['pmrn'];
            $type=$_REQUEST['type'];
            $day=$_REQUEST['day'];
            $id=$_REQUEST['id'];
			$a_by=$_REQUEST['assess_by'];
            
            $output = "";

            $query = mysqli_query($con,"select * from weight_loss_assess where pmrn='$pmrn' and id='$id'");
            $data = mysqli_fetch_array($query);
			
			$query1 = mysqli_query($con,"select * from weight_loss where pmrn='$pmrn' and status='Active'");
            $data1 = mysqli_fetch_array($query1);
            
            

            $query3 = mysqli_query($con,"select * from doctor1 where dname='$a_by'");
            $data3 = mysqli_fetch_array($query3);

            $d=$data1['sdate'];
            $b = date( 'j-F-Y', strtotime( $d) );

            $output .='
                <table>
                    
                </table>
            ';
$output .='
			
			<table width="100%">
                    <tr>
                        <td width="15%"><img src="dis.jpg"></td>
                        
                    </tr>
                </table>
                <hr>';
           

            
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
                        <td width="15%"><img src="1.png"></td>
                        <td width="70%" align="center" style="text-align: center; font-weight: bold; font-size:17px;">SHEIKH FAZILATUNNESA MUJIB MEMORIAL<br>
                        KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE<br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        <td width="15%" style="text-align: right;"><img src="2.png"></td>
                    </tr>
                </table>
                <hr>

                <table width="100%">
                    <tr>
                        <td width="23%"></td>
                        <td width="50%"><b><h3 align="laft">WEIGHT LOSS PROGRAM DISCOUNT</h3> </b></td>
                        <td width="31%"><p align="right">Date: '.$b.'</p></td>
                    </tr>
                </table>
               
                
            
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td> <b>Patient Name : '.$data1['pname'].'</b></td>
                        <td><b>MRN :'.$data1['pmrn'].'</b></td>
                        <td><b>GENDER :</b>'.$data1['psex'].'</td>
                        <td><b>AGE :</b>'.$data1['page'].'</td>
                    </tr>
                </table>
            
                
            ');

            $mpdf->SetHTMLFooter('
                <table width="100%">
                    <tr>
                        <td width="25%" align="center">Page-{PAGENO}/{nbpg}</td>
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