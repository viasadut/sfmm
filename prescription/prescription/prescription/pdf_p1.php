<!DOCTYPE html>
<html lang="en">
<head>
    <title>PMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

            $query = mysqli_query($con,"select * from presnew where pmrn='$pmrn' and dname='$dname' and date='$date' and eid='$eid'");
            $data = mysqli_fetch_array($query);
            $d=$data['date'];
            $b = date( 'j-F-Y', strtotime( $d) );

            $query43 = "SELECT COUNT(pmrn) FROM alltest where pmrn= '$pmrn' and eid='$eid' and dname='$dname';"; 
            $result43 = mysqli_query($con, $query43) or die(mysqli_error());
            $row43 = mysqli_fetch_assoc($result43);
            $count10=$row43['COUNT(pmrn)'];

            $query44 = "SELECT COUNT(pmrn) FROM pmedi where pmrn= '$pmrn' and eid='$eid' and dname='$dname';"; 
            $result44 = mysqli_query($con, $query44) or die(mysqli_error());
            $row44 = mysqli_fetch_assoc($result44);
            $count11=$row44['COUNT(pmrn)'];

            $query2 = mysqli_query($con,"select * from pappnew where pmrn='$pmrn' and dname='$dname' and adate='$date'");
            $data2 = mysqli_fetch_array($query2);

            $query3 = mysqli_query($con,"select * from doctor1 where dname='$dname'");
            $data3 = mysqli_fetch_array($query3);

            $d=$data['date'];
            $b = date( 'j-F-Y', strtotime( $d) );

            $output .='
                <p align="right">Episode: '.$data['eid'].', Date: '.$b.'</p>
                
                <h1 align="center" style="color:black;">OUTPATIENT RECORD</h1>
                <table>
                    <tr>
                        <td width="20%"><b>Consultant Name: </b></td>
                        <td width="70%">'.$data['dname'].'</td>
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
            ';

            $output .='
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td><b>Patient Name :</b> '.$data['pname'].'</td>
                        <td style="color:black;"><b>MRN :</b>'.$data['pmrn'].'</td>
                        <td><b>GENDER :</b>'.$data['psex'].'</td>
                        <td><b>AGE :</b>'.$data['page'].'</td>
                    </tr>
                </table>
            ';
            $output .='
                
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td><b>H(CM) :</b> '.$data2['height'].'</td>
                        <td><b>W(KG) :</b>'.$data2['weight'].'</td>
                        <td><b>BMI :</b>'.$data2['pbmi'].'</td>
                        <td><b>Pluse :</b>'.$data2['ppluse'].'</td>
                        <td><b>BP :</b>'.$data2['pbp'].'</td>
                        <td><b>Temp(F) :</b>'.$data2['temp'].'</td>
                        <td><b>SPO2 :</b>'.$data2['spo2'].'</td>
                        <td><b>RR :</b>'.$data2['rr'].'</td>
                    </tr>
                </table>
            ';

            $output .='
                
                <table>
                    <tr>
                        <td><b>Clinical Details : </b></td>
                    </tr>
                    <tr>
                        <td>'.$data['cdetails'].'</td>
                    </tr>
                </table>
            ';

            $output .='
                
                <table>
                    <tr>
                        <td><b>Diagnosis : </b></td>
                    </tr>
                    <tr>
                        <td>'.$data['diagnosis'].'</td>
                    </tr>
                </table>
            ';

            if($count11==0){
            }
            else {
                $query1 = mysqli_query($con,"select * from pmedi where pmrn='$pmrn' and dname='$dname'  and eid='$eid'");
                $output .="<h3>Medication Advised</h3>";
                    $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
                    $output .='
                        <table>
                            <tr>
                                <td><b>'.$count.'. </b></td>
                                <td> '.$data1['brand'].'('.$data1['medi'].')</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>'.$data1['pdos'].', <mark style="font-family: bangla;  font-size: 18px; background:none; "> '.$data1['pdos_b'].' </mark></td>
                            </tr>
                        </table><br>
                    ';
                    $count++;
                }
            }

            if($count10==0){
            }
            else {
                $query1 = mysqli_query($con,"select * from alltest where pmrn='$pmrn' and dname='$dname' and eid='$eid'");
                $output .="<h3>LAB Advised</h3>";
                    $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
                    $output .='
                        <table>
                            <tr>
                                <td><b>'.$count.'. </b>'.$data1['medi'].'('.$data1['ins'].')</td>
                            </tr>
                        </table><br>
                    ';
                    $count++;
                }
            }

            if($data['pdiet']==''){
            }
            else {
                $output .='
                    <table>
                        <tr>
                            <td><b>DIET : '.$data['pdiet'].'</b></td>
                        </tr>
                        
                    </table>
                ';
            }

            if($data['other']==''){
            }
            else {
                $output .='
                    <table>
                        <tr>
                            <td><b>Other Advise : </b></td>
                        </tr>
                        <tr>
                            <td>'.$data['other'].' </p></td>
                        </tr>
                        <tr>
                            <td><div style="font-family: bangla; font-size: 18px;"> '.$data['other_b'].' </div></td>
                        </tr>
                    </table>
                '; 
            }

            if($data['reffer']=='' and $data['reffer2']=='' and $data['reffer3']==''and $data['reffer4']==''and $data['reffer5']==''and $data['reffer6']==''){
            }
            else {
                $output .='
                    <table>
                        <tr>
                            <td><b>Reffered To : </b></td>
                            <td>'.$data['reffer']." ".$data['pdiet2']." ".$data['reffer2']." ".$data['pdiet3']." ".$data['reffer3']." ".$data['pdiet4']." ".$data['reffer4']." ".$data['pdiet5']." ".$data['reffer5']." ".$data['pdiet6']." ".$data['reffer6']." ".$data['pdiet7'].'</td>
                        </tr>
                    </table><br>
                ';
            }

            if($data['fdate']=='1970-01-01' or '0000-00-00'){
            }
            else {
                $output .='
                    <table>
                        <tr>
                            <td><b>Next Follow Up Date : </b></td>
                        </tr>
                        <tr>
                            <td>'.date('j-F-Y',strtotime($data['fdate'])).'</td>
                        </tr>
                    </table><br>
                ';
            }

            $output .= '<br><br><p align="right">Computer Generated Summary, No Signature Required</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'bangla',
                'default_font' => 'arial',
                'mode' => 'utf-8'
            ]);
            $mpdf->SetWatermarkImage(
                '1001.jpg',
                5,
                '',
                array(170,55)
            );
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
            ');

            $mpdf->SetHTMLFooter('
                <br><br><br>
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
            $mpdf->Output($fileName, 'D');
        ?>
        </div>
    </div>
</div>

</body>
</html>

<!-- http://localhost/sfmm/ticket/pdf_p.php?pmrn=123456&eid=3&date=07/20/2018&dname=Dr.%20Razeeb%20Hassan -->