<!DOCTYPE html>
<html lang="en">
<head>
    <title>PMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body{
            font-family: bangla;
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
            $d=date('Y-m-d');
            $b = date( 'j-F-Y', strtotime( $d) );
            
            $output = "";

            $query = mysqli_query($con,"select * from iidiet where pmrn='$pmrn' and eid='$eid'");
            $data = mysqli_fetch_array($query);
            


            $query33 = mysqli_query($con,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
            $data33 = mysqli_fetch_array($query33);
            $dname=$data33['adoc'];

            $query3 = mysqli_query($con,"select * from doctor1 where dname='$dname'");
            $data3 = mysqli_fetch_array($query3);
			

            
			

			
			
			
			
	
        	
			
		
            
                $output .='<table border="1">
                                <tr>
                                <th><b>SNO</b></th> 
                                <th><b>Date</b></th>    
                                <th><b>Diet</b></th>
                                    <th><b>Menu</b></th>
                                </tr>
                            ';
                $query1 = mysqli_query($con,"select * from iidiet where pmrn='$pmrn' and eid='$eid' and status in ('Data Updated','Diet Ordered') order by `rtime` and `infusion` desc");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {

                    $odate=date('d/m/Y', strtotime($data1['odate']));
                    $output .='
                            <tr>
                                <td><b>'.$count.'. </b>
								
								
								</td>
                                <td><b> '.$odate.'<b></td>
                                <td><b> '.$data1['infusion'].'<b></td>
                                <td><b> '.$data1['dmenu'].'<b></td>
                            </tr>
                            
                    ';
                    $count++;
                }
                $output .= '</table>';
        
$ptime=date('d/m/Y H:i:s');
            $output .= '<p align="right">Computer Generated Summary, No Signature Required (Print Time: '.$ptime.')</p>';
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
                <td width="20%" style="font-family: freesans; text-align:left;vertical-align: center;"><img src="prescription/prescription/KPJ_Updated_Logo.jpg" style="width:100px;">
                </td>
                <td width="80%" style="font-family: freesans; text-align:center;vertical-align: top;"><img src="prescription/prescription/kpj_new_logo_add2.png" style="width:480px;">
                </td>
                                  
            </tr>
        </table>
    
                <hr>

                <table width="100%">
                    <tr>
                        <td width="23%"></td>
                        <td width="50%"><b><h1 align="laft">DIET RECORD</h1> </b></td>
                        <td width="31%"><p align="right">Episode: '.$data['eid'].', <br>Date: '.$b.'</p></td>
                    </tr>
                </table>
               
                <table>
                    <tr>
                        <td width="30%" ><h2 align="laft"><b>Consultant Name:</b></h2></td>
                        <td width="70%" style="font-weight: bold !important;"><h2 align="laft"><b>'.$data33['adoc'].'</h2></b></td>
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
					Order ID-'.$data['id'].'
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
                        <td><b>Bed :</b>'.$data33['room'].'</td>
                        <td><b>Ward :</b>'.$data33['room1'].'</td>
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