<?php
//Session
session_start();
if(!isset($_SESSION['sess_username']) || isset($_SESSION['sess_userrole'])!="lab"){
    header('location:http://192.168.100.252:8081/sfmm');
    exit;
  }

//DB
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

//REQUEST_METHOD
if($_SERVER['REQUEST_METHOD']=='POST'){
//POST Value
$action_type = $_POST['action_type'];
$pname = $_POST['pname'];
$pmrn = $_POST['pmrn'];
$pphone = $_POST['pphone'];
$psex = $_POST['psex'];
$page = $_POST['page'];
$eid = $_POST['eid'];
$iname = $_POST['iname'];
$id = $_POST['id'];
$sno = 'E'.$id;
$a = $_POST['a'];
$a2 = $_POST['a2'];
$c = $_POST['c'];
$d = $_POST['d'];
$e = $_POST['e'];
$f = $_POST['f'];
$h = $_POST['h'];
$j = $_POST['j'];
$o = $_POST['o'];
$q = $_POST['q'];
$s = $_POST['s'];
$lepore = $_POST['lepore'];
$barts = $_POST['barts'];
$comment = $_POST['comment'];
$advice = $_POST['advice'];
$user=$_SESSION['sess_username'];
$adate= date('d/m/Y H:i:s');
$adate2 = date('Y-m-d H:i:s');
$rr='HB A:'.$a."<br />".'HB A<sub>2</sub>:'.$a2."<br />".'HB C:'.$c."<br />".'HB D:'.$d."<br />".'HB E:'.$e."<br />".'HB F:'.$f."<br />".'HB H:'.$h."<br />".'HB J:'.$j."<br />".'HB O:'.$o."<br />".'HB Q:'.$q."<br />".'HB S:'.$s."<br />".'HB Lepore:'.$lepore."<br />".'HB Barts:'.$barts;
$rr1='HB A:'.$a.' '.'%'."<br />".'HB A<sub>2</sub>:'.$a2.' '.'%'."<br />".'HB C:'.$c.'%'."<br />".'HB D:'.$d.'%'."<br />".'HB E:'.$e.'%'."<br />".'HB F:'.$f.'%'."<br />".'HB H:'.$h.'%'."<br />".'HB J:'.$j.'%'."<br />".'HB O:'.$o.'%'."<br />".'HB Q:'.$q.'%'."<br />".'HB S:'.$s.'%'."<br />".'HB Lepore:'.$lepore.'%'."<br />".'HB Barts:'.$barts;
$explode=explode('.',$_FILES['file']['name']);
$ext=end($explode);
$file_name=$sno.'.'.$ext;
$file_location='hbea-chart/'.$file_name;
move_uploaded_file($_FILES['file']['tmp_name'],$file_location);


if($action_type=="new"){

  mysqli_query($db,"INSERT INTO hbea (pname,pmrn,pphone,psex,page,a,a2,c,d,e,f,h,j,o,q,s,lepore,barts,comment,advice,uby,udate,eid,iname,inid,sno,chart) VALUES 
  ('$pname','$pmrn','$pphone','$psex','$page','$a','$a2','$c','$d','$e','$f','$h','$j','$o','$q','$s','$lepore','$barts','$comment','$advice','$user','$adate2','$eid','$iname','$id','$sno','$file_name')");
}
else{
   
   mysqli_query($db,"UPDATE hbea SET a='$a', a2='$a2', c='$c', d='$d', e='$e', f='$f', h='$h', j='$j', o='$o', q='$q', s='$s', lepore='$lepore', barts='$barts', comment='$comment', advice='$advice', uby='$user', udate='$adate2', chart='$file_name' WHERE pmrn='$pmrn' AND eid='$eid' AND sno='$sno'");
}

mysqli_query($db,"UPDATE einves SET resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr',result1='$rr1' WHERE id='$id'");

//echo'<script>alert("Report Confirm Successfull !")</script>';
echo '<script>
    alert("Report Confirm Successful!");
    window.location.href = "emerlab1?pmrn='.$pmrn.'&eid='.$eid.'";
</script>';
exit;

}
else{
   
//GET Value
$pmrn = $_GET['pmrn'] ?? null;
$eid = $_GET['eid'] ?? null;
$id = $_GET['id'] ?? null;

if(empty($pmrn) || empty($eid) || empty($id)) {
    header('Location: http://192.168.100.252:8081/sfmm');
    exit;
}

//PATIENT TEST LIS DATA
$Tdata = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM einves WHERE id='$id'"));
$eid=$Tdata['eid'];
$iname=$Tdata['medi'];
$lis_code=$Tdata['barcode1'];
$icode=$Tdata['code'];


$sno = 'E'.$id;
$Existing_data_check= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM hbea WHERE pmrn='$pmrn' AND eid='$eid' AND inid='$id' AND sno='$sno'"));

if($Existing_data_check==null){
    
$LIS_a_data= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lab_machine_response WHERE LAB_CODE='$lis_code' and machine_ATTRIB='A0' and MACHINE_CODE='D10' and TEST_NO_FK='$icode' ORDER BY response_no_pk DESC LIMIT 1"));
$LIS_a2_data= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lab_machine_response WHERE LAB_CODE='$lis_code' and machine_ATTRIB='A2' and MACHINE_CODE='D10' and TEST_NO_FK='$icode' ORDER BY response_no_pk DESC LIMIT 1"));
$LIS_c_data= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lab_machine_response WHERE LAB_CODE='$lis_code' and machine_ATTRIB='C' and MACHINE_CODE='D10' and TEST_NO_FK='$icode' ORDER BY response_no_pk DESC LIMIT 1"));
$LIS_d_data= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lab_machine_response WHERE LAB_CODE='$lis_code' and machine_ATTRIB='D' and MACHINE_CODE='D10' and TEST_NO_FK='$icode' ORDER BY response_no_pk DESC LIMIT 1"));
$LIS_e_data= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lab_machine_response WHERE LAB_CODE='$lis_code' and machine_ATTRIB='E' and MACHINE_CODE='D10' and TEST_NO_FK='$icode' ORDER BY response_no_pk DESC LIMIT 1"));
$LIS_f_data= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lab_machine_response WHERE LAB_CODE='$lis_code' and machine_ATTRIB='F' and MACHINE_CODE='D10' and TEST_NO_FK='$icode' ORDER BY response_no_pk DESC LIMIT 1"));
$LIS_h_data= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lab_machine_response WHERE LAB_CODE='$lis_code' and machine_ATTRIB='H' and MACHINE_CODE='D10' and TEST_NO_FK='$icode' ORDER BY response_no_pk DESC LIMIT 1"));
$LIS_j_data= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lab_machine_response WHERE LAB_CODE='$lis_code' and machine_ATTRIB='J' and MACHINE_CODE='D10' and TEST_NO_FK='$icode' ORDER BY response_no_pk DESC LIMIT 1"));
$LIS_o_data= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lab_machine_response WHERE LAB_CODE='$lis_code' and machine_ATTRIB='O' and MACHINE_CODE='D10' and TEST_NO_FK='$icode' ORDER BY response_no_pk DESC LIMIT 1"));
$LIS_q_data= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lab_machine_response WHERE LAB_CODE='$lis_code' and machine_ATTRIB='Q' and MACHINE_CODE='D10' and TEST_NO_FK='$icode' ORDER BY response_no_pk DESC LIMIT 1"));
$LIS_s_data= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lab_machine_response WHERE LAB_CODE='$lis_code' and machine_ATTRIB='S' and MACHINE_CODE='D10' and TEST_NO_FK='$icode' ORDER BY response_no_pk DESC LIMIT 1"));
$LIS_lepore_data= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lab_machine_response WHERE LAB_CODE='$lis_code' and machine_ATTRIB='Lepore' and MACHINE_CODE='D10' and TEST_NO_FK='$icode' ORDER BY response_no_pk DESC LIMIT 1"));
$LIS_barts_data= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lab_machine_response WHERE LAB_CODE='$lis_code' and machine_ATTRIB='Barts' and MACHINE_CODE='D10' and TEST_NO_FK='$icode' ORDER BY response_no_pk DESC LIMIT 1"));
}else{

  $LIS_a_data['machine_result']=$Existing_data_check['a'];
  $LIS_a2_data['machine_result']=$Existing_data_check['a2'];
  $LIS_c_data['machine_result']=$Existing_data_check['c'];
  $LIS_d_data['machine_result']=$Existing_data_check['d'];
  $LIS_e_data['machine_result']=$Existing_data_check['e'];
  $LIS_f_data['machine_result']=$Existing_data_check['f'];
  $LIS_h_data['machine_result']=$Existing_data_check['h'];
  $LIS_j_data['machine_result']=$Existing_data_check['j'];
  $LIS_o_data['machine_result']=$Existing_data_check['o'];
  $LIS_q_data['machine_result']=$Existing_data_check['q'];
  $LIS_s_data['machine_result']=$Existing_data_check['s'];
  $LIS_lepore_data['machine_result']=$Existing_data_check['lepore'];
  $LIS_barts_data['machine_result']=$Existing_data_check['barts'];
}

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Hb Electrophoresis Analysis - Sheikh Fazilatunnesa Mujib Memorial KPJ Specialized Hospital & Nursing College">
    <meta name="author" content="Nur Sami Noman">
    <link rel="icon" href="cafe/logo.png">
    <title>Hb Electrophoresis Analysis Report A&E - Sheikh Fazilatunnesa Mujib Memorial KPJ Specialized Hospital & Nursing College</title>
    <!-- Bootstrap core CSS -->
    <link href="cafe/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cafe/vendors/font_awesome/css/all.min.css" />
    <!-- Custom styles for this template -->
    <style type="text/css">
      body {
        padding-top: 60px; /* Set padding-top to the height of the header */
        padding-bottom: 60px; /* Set padding-bottom to the height of the footer */
      }
      
      #hbChart {
        position: absolute;
        left: -9999px;
        visibility: hidden;
        width: 982px !important;
        height: 504px !important;
      }

      .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        background-color: #fff;
        z-index: 1000;
      }

      .footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 60px;
        line-height: 60px;
        background-color: #f5f5f5;
        z-index: 1000;
      }

      .menu{
        border:1px solid black;
      }
      a{

        text-decoration: none;color: #FFFFFF; 
      }
    </style>
  </head>

  <body  style="background-color: rgb(144, 238, 144);">

    <header>
        <nav class="navbar navbar-light bg-light">
          <a href="/sfmm/<?php
                    $role       = "homestaff";//$_SESSION['sess_userrole']
                    if ($role =='mng') {
                        echo 'homemng';
                    } else if ($role =='staff') {
                        echo 'homestaff';
                    }
                    else if ($role =='doctor') {
                        echo 'viewnew11';
                    }                    
                    else if ($role =='nurse') {
                        echo 'viewnewnurse';
                    }                    
                    else if ($role =='lab') {
                        echo 'teslab';
                    }
                ?>"><h3 class="text-danger"><b>Back To PMS</b></h3></a>
          <h3><b>Hb Electrophoresis Analysis Report A&E</b></h3>
        </nav>
    </header>
    <main role="main" class="container-fluid">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th><b>Patient MRN:</b> <?= $Tdata['pmrn']?></th>
                          <th><b>Patient Name:</b> <?= $Tdata['pname']?></th>
                          <th><b>Patient Phone:</b> <?= $Tdata['pphone']?></th>
                        </tr>
                        <tr>
                          <th><b>Patient Gender:</b> <?= $Tdata['pgender']?></th>
                          <th><b>Patient Age:</b> <?= $Tdata['page']?></th>
                          <th><b>Episode:</b> <?= $Tdata['eid']?></th>
                        </tr>
                    </thead>
                </table>                
               <form action="hbea-report-ae.php" method="POST" enctype="multipart/form-data">
                <?php
                if($Existing_data_check==null){
                ?>
                <input type="hidden" name="action_type" value="new" required>
                <?php
                }
                else{
                ?>
                <input type="hidden" name="action_type" value="old" required>
                <?php
                }
                ?>
                <input type="hidden" name="pmrn" value="<?= $Tdata['pmrn']?>" required>
                <input type="hidden" name="pname" value="<?= $Tdata['pname']?>" required>
                <input type="hidden" name="pphone" value="<?= $Tdata['pphone']?>" required>
                <input type="hidden" name="psex" value="<?= $Tdata['pgender']?>" required>
                <input type="hidden" name="page" value="<?= $Tdata['page']?>" required>
                <input type="hidden" name="eid" value="<?= $Tdata['eid']?>" required>
                <input type="hidden" name="iname" value="<?= $iname ?>" required>
                <input type="hidden" name="id" value="<?= $id ?>" required>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                           <th colspan="3"><b>Result: </b></th>
                        </tr>
                        <tr>
                          <th><b>Particulars</b></th>
                          <th><b>Value (%)</b></th>
                          <th><b>Reference Value (%)</b></th>
                        </tr>                        
                        <tr>
                          <th><b>HB A</b></th>
                          <th><b><input value="<?= $LIS_a_data['machine_result'] ?? ''?>" oninput="getHbValues()" id="a" name="a" type="text" class="form-control text-danger" placeholder="Enter Value"  required></b></th>
                          <th class="text-danger" ><b>96.1 - 98.5</b></th>
                        </tr>                        
                        <tr>
                          <th><b>HB A<sub>2</sub></b></th>
                          <th><b><input value="<?= $LIS_a2_data['machine_result'] ?? ''?>" oninput="getHbValues()" id="a2" name="a2" type="text" class="form-control text-danger" placeholder="Enter Value" required></b></th>
                          <th class="text-danger"><b>2 - 3.8</b></th>
                        </tr>                        
                        <tr>                        
                          <tr>
                          <th><b>HB C</b></th>
                          <th><b><input value="<?= $LIS_c_data['machine_result']  ?? ''?>" id="c" name="c" type="text" class="form-control text-danger" placeholder="Enter Value"></b></th>
                          <th class="text-danger"><b>-----</th>
                        </tr>                         
                        <tr>                        
                          <tr>
                          <th><b>HB D</b></th>
                          <th><b><input value="<?= $LIS_d_data['machine_result']  ?? ''?>" id="d" name="d" type="text" class="form-control text-danger" placeholder="Enter Value"></b></th>
                          <th class="text-danger"><b>-----</th>
                        </tr>                        
                        <tr>                        
                          <tr>
                          <th><b>HB E</b></th>
                          <th><b><input value="<?= $LIS_e_data['machine_result']  ?? ''?>" id="e" name="e" type="text" class="form-control text-danger" placeholder="Enter Value"></b></th>
                          <th class="text-danger"><b>-----</th>
                        </tr>                        
                        <tr>                        
                          <tr>
                          <th><b>HB F</b></th>
                          <th><b><input value="<?= $LIS_f_data['machine_result']  ?? ''?>" id="f" name="f" type="text" class="form-control text-danger" placeholder="Enter Value"></b></th>
                          <th class="text-danger"><b> =<2.0 </th>
                        </tr>                         
                        <tr>                        
                          <tr>
                          <th><b>HB H</b></th>
                          <th><b><input value="<?= $LIS_h_data['machine_result']  ?? ''?>" id="h" name="h" type="text" class="form-control text-danger" placeholder="Enter Value"></b></th>
                          <th class="text-danger"><b>-----</th>
                        </tr>                        
                        <tr>                        
                          <tr>
                          <th><b>HB J</b></th>
                          <th><b><input value="<?= $LIS_j_data['machine_result']  ?? ''?>" id="j" name="j" type="text" class="form-control text-danger" placeholder="Enter Value"></b></th>
                          <th class="text-danger"><b>-----</th>
                        </tr>                        
                        <tr>                        
                          <tr>
                          <th><b>HB O</b></th>
                          <th><b><input value="<?= $LIS_o_data['machine_result']  ?? ''?>" id="o" name="o" type="text" class="form-control text-danger" placeholder="Enter Value"></b></th>
                          <th class="text-danger"><b>-----</th>
                        </tr>                         
                        <tr>                        
                          <tr>
                          <th><b>HB Q</b></th>
                          <th><b><input value="<?= $LIS_q_data['machine_result']  ?? ''?>" id="q" name="q" type="text" class="form-control text-danger" placeholder="Enter Value"></b></th>
                          <th class="text-danger"><b>-----</th>
                        </tr>                         
                        <tr>                        
                          <tr>
                          <th><b>HB S</b></th>
                          <th><b><input value="<?= $LIS_s_data['machine_result']  ?? ''?>" id="s" name="s" type="text" class="form-control text-danger" placeholder="Enter Value"></b></th>
                          <th class="text-danger"><b>-----</th>
                        </tr>                        
                        <tr>                        
                          <tr>
                          <th><b>HB Lepore</b></th>
                          <th><b><input value="<?= $LIS_lepore_data['machine_result']  ?? ''?>" id="lepore" name="lepore" type="text" class="form-control text-danger" placeholder="Enter Value"></b></th>
                          <th class="text-danger"><b>-----</th>
                        </tr>                         
                        <tr>                        
                          <tr>
                          <th><b>HB Barts</b></th>
                          <th><b><input value="<?= $LIS_barts_data['machine_result']  ?? ''?>" id="barts" name="barts" type="text" class="form-control text-danger" placeholder="Enter Value"></b></th>
                          <th class="text-danger"><b>-----</th>
                        </tr>                        
                        <tr>
                          <th>Chart</b></th>
                          <th><b><input name="file" type="file" accept=".png" class="form-control text-danger" required></b></th>
                          <th><b><a  class="text-danger" href="#" id="downloadBtn">Download Chart</a><canvas id="hbChart" width="982" height="504"></canvas></b></th>
                        </tr>
                    </thead>
                </table>                

                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th colspan="3"><b>Comment:</b></th>
                        </tr>                        
                        <tr>
                          <th colspan="3">
                            <textarea class="form-control text-danger" name="comment" required placeholder="Enter Comment"> <?= $Existing_data_check['comment'] ?? ''?></textarea>
                          </th>
                        </tr>

                        <tr>
                          <th colspan="3"><b>Advice:</b></th>
                        </tr>                        
                        <tr>
                          <th colspan="3">
                            <textarea class="form-control text-danger" name="advice" required placeholder="Enter Advice"> <?= $Existing_data_check['advice'] ?? ''?></textarea>
                          </th>
                        </tr>

                        <tr>
                          <th colspan="3" class="text-center">
                              <button type="submit" title="Confirm" class="btn btn-primary btn-lg btn-block " href="#">Confirm <i class="fa fa-check"></i></button>
                          </th>
                        </tr>
                    </thead>
                </table>
               </form>
    </main>
    <footer class="footer text-center">
        <p>© Copyright SFMMKPJSH All Rights Reserved - Develop By IT</p>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="cafe/js/jquery-3.5.1.js"></script>
    <script src="cafe/js/popper.min.js"></script>
    <script src="cafe/js/bootstrap.min.js"></script>
    <!-- Chart JS -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    let chart = null;

    function getHbValues() {
      const hbAValue = parseFloat(document.getElementById("a").value) || 0;
      const hbA2Value = parseFloat(document.getElementById("a2").value) || 0;

      const labels = Array.from({ length: 300 }, (_, i) => i);
      const dataHbA = labels.map(x => hbAValue * Math.exp(-0.002 * Math.pow(x - 100, 2)));
      const dataHbA2 = labels.map(x => hbA2Value * Math.exp(-0.002 * Math.pow(x - 160, 2)));

      if (chart) {
        chart.destroy(); // destroy existing chart before re-creating
      }

      const ctx = document.getElementById('hbChart').getContext('2d');
      chart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [
            {
              label: 'Hb A',
              data: dataHbA,
              borderColor: 'rgba(54, 162, 235, 1)',
              backgroundColor: 'rgba(54, 162, 235, 0.2)',
              fill: true,
              tension: 0.3,
              pointRadius: 0
            },
            {
              label: 'Hb A2',
              data: dataHbA2,
              borderColor: 'rgba(255, 99, 132, 1)',
              backgroundColor: 'rgba(255, 99, 132, 0.2)',
              fill: true,
              tension: 0.3,
              pointRadius: 0
            }
          ]
        },
        options: {
          responsive: false,
          animation: false,
          plugins: {
            legend: {
              position: 'bottom'
            },
            tooltip: {
              callbacks: {
                label: function (context) {
                  return `${context.dataset.label}: ${parseFloat(context.raw).toFixed(2)}`;
                }
              }
            }
          },
          scales: {
            x: {
              title: {
                display: true,
                text: 'Time'
              }
            },
            y: {
              title: {
                display: true,
                text: 'Area'
              },
              min: 0,
              max: 120
            }
          }
        },
        plugins: [{
          id: 'peak-labels',
          afterDatasetsDraw(chart) {
            const { ctx, scales: { x, y } } = chart;
            ctx.save();
            ctx.font = 'bold 14px Arial';

            ctx.fillStyle = 'blue';
            ctx.fillText(`${hbAValue}% Hb A`, x.getPixelForValue(100) - 30, y.getPixelForValue(hbAValue) - 20);

            ctx.fillStyle = 'red';
            ctx.fillText(`${hbA2Value}% Hb A2`, x.getPixelForValue(160) - 30, y.getPixelForValue(hbA2Value) - 20);

            ctx.restore();
          }
        }]
      });
    }

    //Initialize chart on page load
    window.addEventListener('DOMContentLoaded', getHbValues);

    //Chart download button
    document.getElementById('downloadBtn').addEventListener('click', () => {
      setTimeout(() => {
        const link = document.createElement('a');
        link.download = '<?= $sno ?>.png';
        link.href = document.getElementById('hbChart').toDataURL('image/png');
        link.click();
      }, 500);
    });
  </script>
  </body>
</html>