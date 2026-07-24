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
		
		
		
.profile_img {
    position: absolute;
    width: 120px;
    height: 120px;
    border-radius: 120px;
    border-style: solid;
    border-color: white;
    border-width: medium;

    overflow: hidden;

    background-size: 150px 150px;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center; 
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
           // $dname=$_REQUEST['dname'];
            $date=$_REQUEST['date'];
            $eid=$_REQUEST['eid'];
			$id=$_REQUEST['id'];
            
            $output = "";

            $query = mysqli_query($con,"select * from alltest where id='$id'");
            $data = mysqli_fetch_array($query);
            $d=$data['date'];
            $b = date( 'j-F-Y', strtotime( $d) );
$dname=$data['dname'];
			
			$query3 = mysqli_query($con,"select * from doctor where dname='$dname'");
            $data3 = mysqli_fetch_array($query3);
          
$darma_count = "SELECT COUNT(id) FROM darma_gallery where pmrn= '$pmrn' and eid='$eid';"; 
            $darma_result_count = mysqli_query($con, $darma_count) or die(mysqli_error());
            $darma_row_count = mysqli_fetch_assoc($darma_result_count);
            $dar_count=$darma_row_count['COUNT(id)'];
			
		  
            $darma_query = "SELECT * FROM darma_gallery where pmrn= '$pmrn' and eid='$eid' order by id asc limit 1;"; 
            $darma_result = mysqli_query($con, $darma_query) or die(mysqli_error());
            $darma_row = mysqli_fetch_assoc($darma_result);
            $first=$darma_row['image'];
			
			$darma_query2 = "SELECT * FROM darma_gallery where pmrn= '$pmrn' and eid='$eid' order by id asc limit 1,1;"; 
            $darma_result2 = mysqli_query($con, $darma_query2) or die(mysqli_error());
            $darma_row2 = mysqli_fetch_assoc($darma_result2);
            $second=$darma_row2['image'];
			
			$darma_query3 = "SELECT * FROM darma_gallery where pmrn= '$pmrn' and eid='$eid' order by id asc limit 2,1;"; 
            $darma_result3 = mysqli_query($con, $darma_query3) or die(mysqli_error());
            $darma_row3 = mysqli_fetch_assoc($darma_result3);
            $third=$darma_row3['image'];
			
			
			$darma_query4 = "SELECT * FROM darma_gallery where pmrn= '$pmrn' and eid='$eid' order by id asc limit 3,1;"; 
            $darma_result4 = mysqli_query($con, $darma_query4) or die(mysqli_error());
            $darma_row4 = mysqli_fetch_assoc($darma_result4);
            $forth=$darma_row4['image'];
			
			$darma_query5 = "SELECT * FROM darma_gallery where pmrn= '$pmrn' and eid='$eid' order by id asc limit 4,1;"; 
            $darma_result5 = mysqli_query($con, $darma_query5) or die(mysqli_error());
            $darma_row5 = mysqli_fetch_assoc($darma_result5);
            $fifth=$darma_row5['image'];
			
			
            $d=$data['date'];
            $b = date( 'j-F-Y', strtotime( $d) );

			

			
			
            

         
			if(
			
			$dar_count=='5')
			{ 
          $output .=' <div style="position: absolute; left:80; right: 0; top: 425; bottom: 0;">
    <img src="darma/'.$first.'"
         style="width: 30mm; height: 30mm; margin: 0;" />
</div>

<div style="position: absolute; left:220; right: 0; top: 425; bottom: 0;">
    <img src="darma/'.$second.'"
         style="width: 30mm; height: 30mm; margin: 0;" />
</div>

<div style="position: absolute; left:425; right: 0; top: 425; bottom: 0;">
    <img src="darma/'.$third.'"
         style="width: 30mm; height: 30mm; margin: 0;" />
</div>


<div style="position: absolute; left:500; right: 0; top: 425; bottom: 0;">
    <img src="darma/'.$forth.'"
         style="width: 30mm; height: 30mm; margin: 0;" />
</div>


<div style="position: absolute; left:600; right: 0; top: 425; bottom: 0;">
    <img src="darma/'.$fifth.'"
         style="width: 30mm; height: 30mm; margin: 0;" />
</div>

			';}

			
			else if(
			
			$dar_count=='3')
			{ 
          $output .=' <div class="profile_img" style="position: absolute; left:80; right: 0; top: 425; bottom: 0;">
    <img src="darma/'.$first.'"
         style="width: 50mm; height: 50mm; margin: 0;" border-radius:50;>
</div>

<div class="profile_img" style="position: absolute; left:320; right: 0; top: 425; bottom: 0;">
    <img src="darma/'.$second.'"
         style="width: 50mm; height: 50mm; margin: 0; border-radius:50;" >
</div>

<div class="profile_img" style="position: absolute; left:550; right: 0; top: 425; bottom: 0;">
    <img src="darma/'.$third.'"
         style="width: 50mm; height: 50mm; margin: 0; border-radius:50;" >
</div>


			';}



           $output .='<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <table>
                    <tr>
                        <td><b><h2>Detail Report: </h2></b></td>
                    </tr>
                    <tr>
                        <td>'.$data['result'].'</td>
                    </tr>
                </table>
            ';

            
			
			
			

            $output .= '<p align="right">Computer Generated Summary, No Signature Required</p> ';
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
                        KPJ SPECIALIZED HOSPITAL <br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        <td width="15%" style="text-align: right;"><img src="2.png"></td>
                    </tr>
                </table>
                <hr>

                <table width="100%">
                    <tr>
                        <td width="13%"></td>
                        <td width="70%"><b><u><h1 align="laft">Darmascopy Examination Report</h1> </u></b></td>
                        <td width="25%"><p align="right">Episode: '.$data['eid'].', <br>Date: '.$b.'</p></td>
                    </tr>
                </table>
               <br><br><br>
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