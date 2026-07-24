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
            $dname=$_REQUEST['dname'];
            
            $eid=$_REQUEST['eid'];
            
            $output = "";

            $query = mysqli_query($con,"select * from radreport where pmrn='$pmrn' and eid='$eid'");
            $data = mysqli_fetch_array($query);
                       
            $query3 = mysqli_query($con,"select * from doctor1 where dname='$dname'");
            $data3 = mysqli_fetch_array($query3);

            
            $output .='
			<br>
                <table>
                    <tr>
                        <td><b>Detail Report : </b></td>
                    </tr><br><br>
                    <tr>
                        <td>'.$data['report'].'</td>
                    </tr>
                </table>
            ';

            

            

            $output .= '<p align="right">Computer Generated Summary, No Signature Required</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'bangla',
                'default_font' => 'serif_fonts,mono_fonts,sans_fonts,BMPonly,fonttrans',
                'default_font_size' => 9,
                //'mode' => 'utf-8',
				'margin_left' => 20
            ]);
            
	
            $mpdf->showWatermarkImage = true;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHTMLHeader('
                
				<br><br><br><br><br><br><br><br>
                <hr>

                <table width="100%">
                    <tr>
                        
                        <td width="100%" align="center"><b><h2 align="laft">'.$data['type'].' REPORT</h2> </b></td>
                        
                    </tr>
                </table>
               
			   <hr>
			   <br><br>
                <table>
                    <tr>
                        <td width="25%" ><h3 align="laft"><b>Consultant Name:</b></h3></td>
                        <td width="75%" style="font-weight: bold !important;"><h3 align="laft"><b>'.$data['dname'].'</h3></b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><h3 align="laft"><b>'.$data3['degree'].'</b></h3></td>
                    </tr>
                    <tr>
                        <td></td>
						<td><h3 align="laft"><b>'.$data3['Discipline'].'</b></h3></td>
                        
                    </tr>
                </table>
            <br>
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td> <b>Patient Name : '.$data['pname'].'</b></td>
                        <td><b>MRN :'.$data['pmrn'].'</b></td>
                        <td><b>GENDER :</b>'.$data['gender'].'</td>
                        <td align="right"><b>AGE :</b>'.$data['age'].'</td>
                    </tr>
                </table>
            
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td><b>Referral From: '.$data['dreffer'].'</b></td>
                       <td align="right"><b>Reporting Date & Time: '.$data['date2'].' '.$data['time'].'</b></td>
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