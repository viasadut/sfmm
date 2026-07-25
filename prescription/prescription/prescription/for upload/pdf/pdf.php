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
  <h1>Generate PDF</h1>
</div>
  
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
        <?php
            require('../db1.php');
            
            require_once 'vendor/autoload.php';
            $pmrn = '123456';
            $eid=1;
            $query = "SELECT * FROM idismedi where pmrn='$pmrn'";

            $result = mysqli_query($con, $query); 

            $output = "";



            $query1 = mysqli_query($con,"select * from idischarge1 where pmrn='$pmrn' and eid='$eid'");
            $data1 = mysqli_fetch_array($query1);
            $query2 = mysqli_query($con,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
            $data2 = mysqli_fetch_array($query2);

            $output .='
                <br><br><br><br> <hr>
                <h1 align="center" style="color:red;">DISCHARGE SUMMARY</h1>
                <table>
                    <tr>
                        <td><b>Patient Discharge By: </b></td>
                        <td>'.$data1['emo'].'</td>
                    </tr>
                    <tr>
                        <td><b>Consultant(s) Involved: </b></td>
                        <td>'.$data1['dname'].'</td>
                    </tr>
                </table>
            ';

            $output .='
                <table style="border: 1px solid black">
                    <tr>
                        <td><b>Patient Name:</b></td>
                        <td colspan="2">TEST PATIENTTEST PATIENT'.$data1['pname'].'</td>
                        <td><b>GENDER:</b></td>
                        <td>'.$data1['psex'].'</td>
                    </tr>
                    <tr>
                        <td><b>MRN:</b></td>
                        <td colspan="2" style="color:red;">'.$data1['pmrn'].'</td>
                        <td><b>AGE:</b></td>
                        <td>'.$data1['page'].'</td>
                    </tr>
                    <tr>
                        <td><b>Date Of Admission:</b></td>
                        <td>'.$data2['adate'].'</td>
                        <td><b>WARD/CABIN:</b></td>
                        <td>'.$data2['room'].'</td>
                        <td><b>Bed:</b></td>
                        <td>'.$data2['room1'].'</td>
                    </tr>
                </table>
            ';

            $output .='
                <br>
                <table>
                    <tr>
                        <td><b>Discharge Type: </b></td>
                        <td>'.$data1['discharge'].'</td>
                    </tr>
                    <tr>
                        <td><b>Surgery or Procedure (In Any): </b></td>
                        <td>'.$data1['surgery'].'</td>
                    </tr>
                    <tr>
                        <td><b>Discharge Diagnosis: </b></td>
                        <td>'.$data1['ddia'].'</td>
                    </tr>
                    <tr>
                        <td><b>Case Summary: </b></td>
                        <td>'.$data1['ill'].'</td>
                    </tr>
                    <tr>
                        <td><b>Investigation Done: </b></td>
                        <td>'.$data1['dinves'].'</td>
                    </tr>
                </table> <br>
            ';

            $output .="
                <h3>Medication Advised</h3>
                <table class='table table-striped' >
                    <thead >
                        <tr >
                            <th >Id</th>
                            <th >Medicine</th>
                            <th >Dose</th>
                            <th >Suggestion</th>
                        </tr>
                    </thead>
            ";
            
            if (mysqli_num_rows($result) > 0) { 
            while ($row = mysqli_fetch_assoc($result)) {
            $output.='<tbody>
                        <tr style="">
                            <td style=""> '.$row['id'].' </td>
                            <td style="font-family: sans_fonts; ">A-Cerumen Ear Hygine solution 2ml (A-Cerumen)A-Cerumen Ear Hygine solution 2ml (A-Cerumen)'.$row['medi'].' </td>
                            <td ><div style="font-family: sans_fonts; "> '.$row['pdos'].' </div></td>
                            <td ><div style="font-family: bangla; "> '.$row['pdos_b'].' </div></td>
                        </tr>
                    </tbody>';
                }
            }else{
                $output = "No record found";
            }
            $output .="</table>";
            // $output .="<h3>Medication Advised</h3>";
            // if (mysqli_num_rows($result) > 0) {
            //     $count=1;
            //     while ($row = mysqli_fetch_assoc($result)) {
            //         $output .='
            //             <table>
            //                 <tr>
            //                     <td><b>'.$count.'-Medicine: </b></td>
            //                     <td>'.$row['medi'].'</td>
            //                 </tr>
            //                 <tr>
            //                     <td><b>Suggestion: </b></td>
            //                     <td>'.$row['pdos'].',<div style="font-family: bangla;">'.$row['pdos_b'].'</div></td>
            //                 </tr>
            //             </table>
            //         ';
            //         $count++;
            //     }
            // }
            // else {
            //     $output = "No record found";
            // }
            
            $output .='<p><b>Follow Up Investigation Advised</b></p>';
            
            $query3 = mysqli_query($con,"select * from idinves where pmrn='$pmrn'and eid='$eid'");
            while($data3 = mysqli_fetch_array($query3)){
                echo $data3['medi'];
                echo $data3['ins'];
            }

            $output .='
                <table>
                    <tr>
                        <td><b>Advise On Discharge: </b></td>
                        <td>'.$data1['other'].'</td>
                    </tr>
                    <tr>
                        <td><b>Follow Up Plan: </b></td>
                        <td>'.$data1['plan'].'</td>
                    </tr>
                </table>
            ';

            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'bangla',
                'default_font' => 'sans_fonts',
                'mode' => 'utf-8'
            ]);
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
            ');

            $mpdf->SetHTMLFooter('
            <p align="right">Computer Generated Summary, No Signature Required</p> 
            <br><br><br>
                <table width="100%">
                    <tr>
                        <td width="25%">Date-{DATE j-m-Y}</td>
                        <td width="25%" align="center">Page-{PAGENO}/{nbpg}</td>
                        <td width="50%" style="text-align: right; color:red;">Contact Numbers: 01810008080 (SFMMKPJSH/NSG/MR-20)</td>
                    </tr>
                </table>
            ');
            
            $mpdf->WriteHTML($output);
            $fileName = $data1['pname'].'.pdf';
            $mpdf->Output($fileName, 'D');

        ?>
        </div>
    </div>
</div>

</body>
</html>