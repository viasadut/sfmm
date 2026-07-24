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
$sno = 'O'.$id;
$a1 = $_POST['a1'];
$a2 = $_POST['a2'];
$comment = $_POST['comment'];
$user=$_SESSION['sess_username'];
$adate= date('d/m/Y H:i:s');
$adate2 = date('Y-m-d H:i:s');
$rr='Rh antibody:'.$a1."<br />".'Titre:'.$a2;
$rr1='Rh antibody:'.$a1."<br />".'Titre:'.$a2;
//$explode=explode('.',$_FILES['file']['name']);
//$ext=end($explode);
//$file_name=$sno.'.'.$ext;
//$file_location='hbea-chart/'.$file_name;
//move_uploaded_file($_FILES['file']['tmp_name'],$file_location);


if($action_type=="new"){

  mysqli_query($db,"INSERT INTO rhantibody (pname,pmrn,pphone,psex,page,a1,a2,comment,uby,udate,eid,iname,inid,sno) VALUES 
  ('$pname','$pmrn','$pphone','$psex','$page','$a1','$a2','$comment','$user','$adate2','$eid','$iname','$id','$sno')");
}
else{
   
   mysqli_query($db,"UPDATE rhantibody SET a1='$a1', a2='$a2', comment='$comment', uby='$user', udate='$adate2', chart='$file_name' WHERE pmrn='$pmrn' AND eid='$eid' AND sno='$sno'");
}

mysqli_query($db,"UPDATE alltest SET resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr',result1='$rr1' WHERE id='$id'");

echo'<script>alert("Report Confirm Successfull !")</script>';
exit;

}
else{
   
//GET Value
if($_GET['e']!='Y'){
$pmrn = $_GET['pmrn'] ?? null;
$eid = $_GET['eid'] ?? null;
$id = $_GET['id'] ?? null;
}
else {
$encryption=$_GET['id'] ?? null;
    $options = 0;
    $ciphering = "AES-192-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "kpj";
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    $id = $decryption;

    //$sno='O'.$id;

    // $pmrn=$_REQUEST['pmrn'];
    $encryption=$_GET['pmrn'] ?? null;
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    $pmrn = $decryption;

    // $eid=$_REQUEST['eid'];
    $encryption=$_GET['eid'] ?? null;
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    $eid = $decryption;
}
if(empty($pmrn) || empty($eid) || empty($id)) {
    header('Location: http://192.168.100.252:8081/sfmm');
    exit;
}

//PATIENT TEST LIS DATA
$Tdata = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM alltest WHERE id='$id'"));
$eid=$Tdata['eid'];
$iname=$Tdata['medi'];
$lis_code=$Tdata['barcode1'];
$icode=$Tdata['code'];


$sno = 'O'.$id;
$Existing_data_check= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM rhantibody WHERE pmrn='$pmrn' AND eid='$eid' AND inid='$id' AND sno='$sno'"));

if($Existing_data_check==null){
    
$LIS_a1_data= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lab_machine_response WHERE LAB_CODE='$lis_code' and machine_ATTRIB='A0' and MACHINE_CODE='D10' and TEST_NO_FK='$icode' ORDER BY response_no_pk DESC LIMIT 1"));
$LIS_a2_data= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lab_machine_response WHERE LAB_CODE='$lis_code' and machine_ATTRIB='A2' and MACHINE_CODE='D10' and TEST_NO_FK='$icode' ORDER BY response_no_pk DESC LIMIT 1"));
}else{

  $LIS_a1_data['machine_result']=$Existing_data_check['a1'];
  $LIS_a2_data['machine_result']=$Existing_data_check['a2'];
}

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Rh Antibody Identification & Titration Analysis">
    <meta name="author" content="Nur Sami Noman">
    <link rel="icon" href="cafe/logo.png">
    <title>Rh Antibody Identification & Titration Analysis Report OPD</title>
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
          <h3><b>Rh Antibody Identification & Titration Analysis Report OPD</b></h3>
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
               <form action="rhantibody-report-opd.php" method="POST" enctype="multipart/form-data">
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
                          
                        </tr>                        
                        <tr>
                          <th><b>Rh Antibody</b></th>
                          <th><b><input value="<?= $LIS_a1_data['machine_result'] ?>" oninput="getHbValues()" id="a1" name="a1" type="text" class="form-control text-danger" placeholder="Enter Value"  required></b></th>
                          
                        </tr>                        
                        <tr>
                          <th><b>Titre</b></th>
                          <th><b><input value="<?= $LIS_a2_data['machine_result'] ?>" oninput="getHbValues()" id="a2" name="a2" type="text" class="form-control text-danger" placeholder="Enter Value" required></b></th>
                         
                        </tr>                        
                        
                    </thead>
                </table>                

                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th colspan="3"><b>Remarks:</b></th>
                        </tr>                        
                        <tr>
                          <th colspan="3">
                            <textarea class="form-control text-danger" name="comment" required placeholder="Enter Comment"> <?= $Existing_data_check['comment'] ?? ''?></textarea>
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
  
  </body>
</html>