<!DOCTYPE html>
<html lang="en">
<head>
    <title>PMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body{
            font-family: nikosh;
            font-family: serif; font-size: 10pt;
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
            $pmrn=$_REQUEST['pmrn'];
            $dname=$_REQUEST['dname'];
            $date=$_REQUEST['date'];
            $eid=$_REQUEST['eid'];
            
            $output = "";

            $query = mysqli_query($con,"select * from o_topic where id='5'");
            $data = mysqli_fetch_array($query);
            
            $b = date( 'j-F-Y', strtotime( $d) );

            
			
	
        $output .='
                <table>
                    <tr>
                        <td><b>Clinical Details : </b></td>
                    </tr>
                    <tr>
                        <td><div style="font-family: bangla; font-size: 18px;"> '.$data['topic1'].' </div></td>
                    </tr>
					 <tr>
                        <td>'.$data['topic1'].'</td>
                    </tr>
					
                </table>
';	
	


            

            $output .= '<p align="right">Computer Generated Summary, No Signature Required</p> ';
            
		
			$mpdf = new \Mpdf\Mpdf([
			
			
		
                // 'default_font' => 'bangla',
                'default_font' => 'Nikosh',
                'default_font_size' => 9,
                
				'margin_left' => 23
            ]);
			
			
			
            $mpdf->SetWatermarkImage(
                '1001.jpg',
                5,
                '',
                array(177,43)
            );
            $mpdf->showWatermarkImage = true;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHTMLHeader('
                <table width="100%">
                    <tr>
                        <td width="15%"><img src="1.png"></td>
                        <td width="70%" align="center" style="text-align: center; font-weight: bold; font-size:17px;">SHEIKH FAZILATUNNESA MUJIB MEMORIAL<br>
                        KPJ SPECIALIZED HOSPITAL <br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        <td width="15%" style="text-align: right;"><img src="2.png"></td>
                    </tr>
                </table>
                <hr>

                <table width="100%">
                    <tr>
                        <td width="23%"></td>
                        <td width="50%"><b><h1 align="laft">OUTPATIENT RECORD</h1> </b></td>
                        <td width="31%"><p align="right">Episode: '.$data['eid'].', <br>Date: '.$b.'</p></td>
                    </tr>
                </table>
               
                <table>
                    <tr>
                        <td width="30%" ><h2 align="laft"><b>Consultant Name:</b></h2></td>
                        <td width="70%" style="font-weight: bold !important;"><h2 align="laft"><b>'.$data['dname'].'</h2></b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>'.$data3['degree'].'</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>'.$data3['Discipline'].'</td>
                    </tr>
                </table>
            
			<table width="100%">
			<tr>
			<td width="10%" align="center">
			<barcode code="'.$data['pmrn'].'" type="C128A" class="barcode" />
			MRN-'.$data['pmrn'].'
			</td>
					<td width="80%" align="center">
					
					</td>
					
					<td class="verticalTableHeader" width="10%" align="center">
					<barcode code="'.$data['id'].'" type="C128A" class="barcode" />
					Prescription ID-'.$data['id'].'
					</td>
					</tr>
			</table>
			
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td> <b>Patient Name : '.$data['pname'].'</b></td>
                        <td><b>MRN :'.$data['pmrn'].'</b></td>
                        <td><b>GENDER :</b>'.$data['psex'].'</td>
                        <td><b>AGE :</b>'.$data['page'].'</td>
                    </tr>
                </table>
            
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td><b>H(CM) :</b> '.$data2['height'].'</td>
                        <td><b>W(KG) :</b>'.$data2['weight'].'</td>
                        <td><b>BMI :</b>'.$data2['pbmi'].'</td>
                        <td><b>PuLse :</b>'.$data2['ppluse'].'</td>
                        <td><b>BP :</b>'.$data2['pbp'].''.'/'.$data2['pbp1'].'</td>
                        <td><b>Temp(F) :</b>'.$data2['temp'].'</td>
                        <td><b>SPO2 :</b>'.$data2['spo2'].'</td>
                        <td><b>RR :</b>'.$data2['rr'].'</td>
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