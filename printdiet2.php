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

            $dd=date('Y-m-d');
$dd1=date('d/m/Y');

            $output = "";

            


           
           


                $output .='<table style="border:0px;border-collapse:collapse;border-spacing:0px;" width="100%">
                                
                                    <tr>
                                <td style="border: 1px solid black" width="5%" align="center"><b>sno</b></td>
                                <td style="border: 1px solid black" width="5%" align="center"><b>MRN</td>
								<td style="border: 1px solid black" width="10%" align="center"><b>Name</td>
								<td style="border: 1px solid black" width="10%" align="center"><b>Ward</td>
								<td style="border: 1px solid black" width="10%" align="center"><b>Bed</td>
								<td style="border: 1px solid black" width="10%" align="center"><b>Diet Type</td>
								<td style="border: 1px solid black" width="40%" align="center"><b>Menu</td>
								<td style="border: 1px solid black" width="10%" align="center"><b>Instruction</td>
                            </tr>
                                
                            
                            ';
                $query1 = mysqli_query($con,"select * from iidiet where odate ='$dd' and status='Diet Ordered' and diettime in ('Mid Morning','Extra Food') and status1!='Cancel'order by room");
                $count=1;
                
                while ($data1 = mysqli_fetch_array($query1)) {
                    $pmrn=$data1['pmrn'];
                    $eid=$data1['eid'];
                                        $query2 = mysqli_query($con,"select * from inpatient where pmrn ='$pmrn' and eid='$eid'");    
                                        $data2 = mysqli_fetch_array($query2);

                    $output .='
                            <tr>
                                <td style="border: 1px solid black" align="center" width="5%"><b>'.$count.' </b></td>
								<td style="border: 1px solid black" width="5%" align="center"><b>'.$data1['pmrn'].' </b></td>
                                <td style="border: 1px solid black" width="10%" align="center"> '.$data1['pname'].'</td>
								<td style="border: 1px solid black" width="10%" align="center"> '.$data2['room'].'</td>
								<td style="border: 1px solid black" width="10%" align="center"> '.$data2['room1'].'</td>
								<td style="border: 1px solid black" width="10%" align="center"> '.$data1['infusion'].'</td>
								<td style="border: 1px solid black" width="10%" align="center"> '.$data1['dmenu'].'</td>
								<td style="border: 1px solid black" width="10%" align="center"> '.$data1['dtime'].'</td>
                            </tr>
                            
                    ';
                    $count++;
                }
                $output .= '</table>';




          
            
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'bangla',
                'default_font' => 'Roboto',
                'default_font_size' => 9,
                'mode' => 'utf-8',
				'format' => 'A4-L'
            ]);
            
            $mpdf->showWatermarkImage = true;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHTMLHeader('
                <table width="100%">
                    <tr>
                        <td width="15%"><img src="1.png"></td>
                        <td width="70%" align="center" style="text-align: center; font-weight: bold;">SHEIKH FAZILATUNNESA MUJIB MEMORIAL
                        KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
                        <td width="15%" style="text-align: right;"><img src="2.png"></td>
                    </tr>
                </table>
                <hr>

                <table width="100%">
                    <tr>
                        
                        <td width="80%" align="center"><b><h1 align="center"> Mid Morning Diet Order Sheet</h1> </b></td>
                        <td width="20%" align="center"><b><h1 align="right"><b><p align="right">Date: '.$dd1.'</p></td>
                    </tr>
                </table>
               
                
            ');

            $mpdf->SetHTMLFooter('
                <table width="100%">
                    <tr>
                        <td width="25%" align="center">Page-{PAGENO}/{nbpg}</td>
                    </tr>
                    <tr>
                        <td width="100%" style="color:red; font-size:10px;" align="center">Contact Numbers: Ambulance: 01810008074, +880244077029, Appointments: 01810008080, +880244077030 | (SFMMKPJSH/OPD/MR-01)</td>
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