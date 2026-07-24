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
            $date=$_REQUEST['date'];
            $eid=$_REQUEST['eid'];
            
            $output = "";

            $query = mysqli_query($con,"select * from presnew where pmrn='$pmrn' and dname='$dname' and eid='$eid' and eid='$eid'");
            $data = mysqli_fetch_array($query);
            $d=$data['date'];
            $b = date( 'j-F-Y', strtotime( $d) );


            $query2 = mysqli_query($con,"select * from pappnew where pmrn='$pmrn' and dname='$dname' and eid='$eid'");
            $data2 = mysqli_fetch_array($query2);

            $query3 = mysqli_query($con,"select * from doctor1 where dname='$dname'");
            $data3 = mysqli_fetch_array($query3);

			$query_eye = "SELECT COUNT(pmrn) FROM eye_medi where pmrn= '$pmrn' and eid='$eid' and dname='$dname';"; 
            $result_eye = mysqli_query($con, $query_eye) or die(mysqli_error());
            $row_eye = mysqli_fetch_assoc($result_eye);
            $count_eye=$row_eye['COUNT(pmrn)'];
			
			$query_eye1 = "SELECT * FROM eye_medi where pmrn= '$pmrn' and eid='$eid' and dname='$dname';"; 
            $result_eye1 = mysqli_query($con, $query_eye1) or die(mysqli_error());
            $row_eye1 = mysqli_fetch_assoc($result_eye1);			
			
			
            $d=$data['date'];
            $b = date( 'j-F-Y', strtotime( $d) );

			

			
						 if($count_eye==0){
            }
           
			else{
				
				$output .='
                    <table>
                        <tr>
                            <td><b>Spectacles Power : </b></td>
                        
                        
                            
                        </tr>
                    </table>
                ';
				
				
				 $output .='
                <table style="border: 1px solid black " width="100%">
                    <tr>
                        <td align="center"><b>TYPE</b></td>
						<td align="center"><b>VA</b></td>
						<td align="center"><b>SPH</b></td>
						<td align="center"><b>CYL</b></td>
						<td align="center"><b>AXIS(Degree)</b></td>
						<td align="center"><b>VA</b></td>
                    </tr>
                    <tr>
                        <td align="center"><b>R</b></td>
						<td align="center"><b>DV</b></td>
						
						<td align="center"><b><b> '.$row_eye1['dv_sph'].'<b></b></td>
						<td align="center"><b><b> '.$row_eye1['dv_cyl'].'<b></b></td>
						<td align="center"><b><b> '.$row_eye1['dv_axis'].'<b></b></td>
						<td align="center"><b><b> '.$row_eye1['dv_va'].'<b></b></td>
                    </tr>
					
					<tr>
                        <td align="center"><b></b></td>
						<td align="center"><b>NV</b></td>
						
						<td align="center"><b><b> '.$row_eye1['nv_sph'].'<b></b></td>
						<td align="center"><b><b> '.$row_eye1['nv_cyl'].'<b></b></td>
						<td align="center" border="1"><b><b> '.$row_eye1['nv_axis'].'<b></b></td>
						<td align="center"><b><b> '.$row_eye1['nv_va'].'<b></b></td>
                    </tr>
					
					
					
					<tr>
                        <td align="center"><b>L</b></td>
						<td align="center"><b>DV</b></td>
						
						<td align="center"><b><b> '.$row_eye1['dv_sph1'].'<b></b></td>
						<td align="center"><b><b> '.$row_eye1['dv_cyl1'].'<b></b></td>
						<td align="center"><b><b> '.$row_eye1['dv_axis1'].'<b></b></td>
						<td align="center"><b><b> '.$row_eye1['dv_va1'].'<b></b></td>
                    </tr>
					
					<tr>
                        <td align="center"><b></b></td>
						<td align="center"><b>NV</b></td>
						
						<td align="center"><b><b> '.$row_eye1['nv_sph1'].'<b></b></td>
						<td align="center"><b><b> '.$row_eye1['nv_cyl1'].'<b></b></td>
						<td align="center"><b><b> '.$row_eye1['nv_axis1'].'<b></b></td>
						<td align="center"><b><b> '.$row_eye1['nv_va1'].'<b></b></td>
                    </tr>
					
					
                </table>
            ';
				
			$output .='
                <table>
                    <tr>
                        <td><b>Comments: </b></td>
                    </tr>
                    <tr>
                        <td>'.$row_eye1['comments'].'</td>
                    </tr>
                </table>
            ';
			
			$output .='
                <table>
                    <tr>
                        <td><b>IPD: </b></td>
                    </tr>
                    <tr>
                        <td>'.$row_eye1['ipd'].'</td>]
                    </tr>
                </table>
            ';	
				
			}
			
			
			

            $output .= '<p align="right">Computer Generated Summary, No Signature Required</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'bangla',
                'default_font' => 'Roboto',
                'default_font_size' => 9,
                'mode' => 'utf-8',
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
                        <td width="31%"><p align="right">Episode: '.$row_eye1['eid'].', <br>Date: '.$b.'</p></td>
                    </tr>
                </table>
               
                <table>
                    <tr>
                        <td width="30%" ><h2 align="laft"><b>Consultant Name:</b></h2></td>
                        <td width="70%" style="font-weight: bold !important;"><h2 align="laft"><b>'.$row_eye1['dname'].'</h2></b></td>
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
			<barcode code="'.$row_eye1['pmrn'].'" type="C128A" class="barcode" />
			MRN-'.$row_eye1['pmrn'].'
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
                        <td> <b>Patient Name : '.$row_eye1['pname'].'</b></td>
                        <td><b>MRN :'.$row_eye1['pmrn'].'</b></td>
                        <td><b>GENDER :</b>'.$data['psex'].'</td>
                        <td><b>AGE :</b>'.$data['page'].'</td>
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