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
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
//$bkdate=$_REQUEST['bkdate'];
//$id=['id'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$queryn = mysqli_query($db,"select * from otreport where eid='$eid' and pmrn='$pmrn'");
$datan = mysqli_fetch_array($queryn);




$query = mysqli_query($db,"select * from ot where id='$eid'");
$data = mysqli_fetch_array($query);

$dname=$data['dname'];


$query2 = mysqli_query($db,"select * from doctor1 where dname='$dname'");
$data2 = mysqli_fetch_array($query2);



            $output .= ' ';
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
                        
                        <td align="center"><b><h1>SURGERY / PROCEDURE NOTE </h1> </b></td>
                        
                    </tr>
					<hr>
                </table>
               <br><br>
                <table>
                    <tr>
                        <td width="30%" ><h2 align="laft"><b>Surgeon Name:</b></h2></td>
                        <td width="70%" style="font-weight: bold !important;"><h2 align="laft"><b>'.$data['dname'].'</h2></b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>'.$data2['degree'].'</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>'.$data2['Discipline'].'</td>
                    </tr>
					
					
					 <tr>
                        <td width="30%" ><b>Name Of 2nd / 3rd Surgeon:</b></td>
                        <td width="70%" style="font-weight: bold !important;">'.$data['dname1'].','.$data['dname2'].'</td>
                    </tr>



					
					 <tr>
                        <td width="30%" ><b>Name Of Anaethesist:</b></td>
                        <td width="70%" style="font-weight: bold !important;">'.$data['nanes'].'</td>
                    </tr>
                    
                </table>
            <br><br>
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td align="left"> <b>Patient Name :</b> '.$data['pname'].'</td>
                        <td align="left"><b>MRN :'.$data['pmrn'].'</td>
                        <td align="left"><b>GENDER :</b>'.$data['psex'].'</td>
                        <td align="left"><b>AGE :</b>'.$data['page'].'</td>
                    </tr>
                </table>
            
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td align="left"><b>Admission Date :</b></td>
                        <td align="left"><b>OT date :</b></td>
                        <td align="left"><b>Booking Date:</td>
                        <td align="left"><b>Booking Time :</td>
                        
                    </tr>
					
					<tr>
                        <td align="left">'.$data['adate'].'</td>
                        <td align="left">'.$data['otdate'].'</td>
                        <td align="left">'.$data['bookingdt'].'</td>
                        <td align="left">'.$data['stime'].' To '.$data['etime'].'</td>
                        
                    </tr>
                </table>
				
				 <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td align="left"><b>Patient Type :</b></td>
                        <td align="left"><b>Special Requirement. :</b></td>
                        <td align="left"><b>Duration:</td>
                       
                        
                    </tr>
					
					<tr>
                        <td align="left">'.$data['ptype'].'</td>
                        <td align="left">'.$data['spereq'].'</td>
                        <td align="left">'.$data['duration1'].'hr(s)</td>
                        
                        
                    </tr>
                </table>
				
				<table style="border: 1px solid black" width="100%">
                    <tr>
                        <td align="left"><b>Type of Anaethesia:</b> '.$data['tanes'].'</td>
                        
                        
                    </tr>
					
					
                </table>
				
				<table style="border: 1px solid black" width="100%">
                    <tr>
                        <td align="left"><b>Name of The Nurses (A / C / S1 / S2):</b></td>
                        
                        
                    </tr>
					
					<tr>
                        <td align="left">'.$data['anurse'].','.$data['cnurse'].','.$data['snurse1'].','.$data['snurse2'].'</td>
                        
                        
                        
                    </tr>
                </table>
            ');

			
			
                $query1 = mysqli_query($con,"select * from otreport where pmrn='$pmrn' and eid='$eid' and c_status=''");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
					
					
                    $output .='
                    <br>
                        <table>
                            <tr>
                               
								<td><b>Surgeon Name: '.$data1['sname'].'</b></td></tr>
								<tr>
								<td><b>Procedure Name: '.$data1['pname'].$data1['others'].'</b></td></tr>
								<tr>
								<td><b>Details Note:</b></td>						
                            </tr>
							<tr>
								<td>'.$data1['sreport'].'</td>						
                            </tr>
							<br><br>
                        </table>
						
                    ';
                    
                }
				
				$output .='
                        <p align="right">Computer Generated Summary, No Signature Required</p>';
			
			
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