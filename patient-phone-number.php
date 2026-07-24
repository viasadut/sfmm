<?php
//Session
session_start();
if(!isset($_SESSION["sess_username"])){
    header('location:http://192.168.100.252:8081/sfmm');
  }
//DB
require 'OES1/backend/db.php';
//User Photo Logic
$u_id=$_SESSION['sess_username'];
$user_photo_db=mysqli_fetch_assoc(mysqli_query($db,"SELECT sid,pic FROM staff3 WHERE sid='$u_id'"));
if(empty($user_photo_db['sid'])){
$_SESSION['user_photo']="http://192.168.100.252:8081/sfmm/doctor/".$u_id.".jpg";
}
else{
$_SESSION['user_photo']="http://192.168.100.252:8081/sfmm/staff_pic/".$user_photo_db['pic'];
}


//Patient Update Logic

$ddt=date('Y-m-d H:i:s');
if($_SERVER['REQUEST_METHOD'] == 'GET') {

  

    if(isset($_GET['pmrn']) && isset($_GET['pphone'])){
       
        $pmrn = $_GET['pmrn'];
        $pphone = $_GET['pphone'];
        mysqli_query($db, "UPDATE patient SET pphone='$pphone',phone_no_changed_by='$u_id', phone_change_at='$ddt' WHERE pmrn='$pmrn'");
        $_SESSION['success'] = "Patient Phone Number Update Successful";
        echo "<script>window.location.href = 'patient-phone-number.php?mrn=".$pmrn."'</script>";
        exit();
    } 
}

?>
<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge bottom-footer" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Mobile App Banner Panel | Sheikh Fazilatunnessa Mujib Memorial KPJ Specialized Hospital & Nursing College">
  <meta name="author" content="Md.Nur Sami Noman">
  <link href="OES1/assets/images/logo.png" type="image/x-icon" rel="icon">
  <title>Patient Phone Number Update Panel | Sheikh Fazilatunnessa Mujib Memorial KPJ Specialized Hospital & Nursing College</title>
  <link href="OES1/assets/css/vendor/all.css" rel="stylesheet">
  <link href="OES1/assets/css/app/app.css" rel="stylesheet">
  <style>
  .alert_danger {
    padding: 20px;
    background-color: red;
    color: white;
    border
  }  
  .alert_success {
    padding: 20px;
    background-color: green;
    color: white;
    border
  }
  .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
  }

  .closebtn:hover {
    color: black;
  }
</style>
</head>

<body>

  <!-- Fixed navbar -->
  <div class="navbar navbar-default navbar-fixed-top navbar-size-large navbar-size-xlarge paper-shadow" data-z="0" data-animated role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-brand navbar-brand-logo">
          <a  href="index.php">
          <img src="OES1/assets/images/logo.png" width="45px" height="45px">
          </a>
        </div>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="main-nav">
        <ul class="nav navbar-nav navbar-nav-margin-left">
       

              <li>
                <a href="/sfmm/<?php
                    $role=$_SESSION['sess_userrole'];
                    if($role =='mng'){
                        echo 'homemng';
                    } 
                    else if($role =='staff'){
                        echo 'homestaff';
                    }
                    else if ($role =='doctor') {
                        echo 'viewnew11';
                    }                    
                    else if ($role =='nurse') {
                        echo 'viewnewnurse';
                    }
                ?>">PMS</a>
              </li>            

                <li><a href="patient-phone-number.php">Dashboard</a></li>

        </ul>
        <div class="navbar-right">
          <ul class="nav navbar-nav navbar-nav-bordered navbar-nav-margin-right">
            <!-- user -->
            <li class="dropdown user">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= $_SESSION['user_photo']?>" alt="" class="img-circle" /><?= $_SESSION['sess_fullname'] ?><span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="mobile-app-banner-panel.php"><i class="fa fa-bar-chart-o"></i> Dashboard</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
              </ul>
            </li>
            <!-- // END user -->
          </ul>
        </div>
      </div>
      <!-- /.navbar-collapse -->

    </div>
  </div>

  <div class="container-fluid">
    <div class="page-section">
    
        <!-- <div class="col-md-9"> -->
        <div class="col-xs-12 col-lg-12">

          <div class="row" style="font-size:18px;">

                      <!-- Notification Start -->
                      <?php
                      if(isset($_SESSION['success'])){
                        ?>
                        <div class="alert_success">
                          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                          <b><?= $_SESSION['success'] ?></b>
                        </div><br>
                        <?php
                        
                      }
                      ?>

                                     
                      <?php
                        if(isset($_SESSION['fail'])){
                            ?>
                            <div class="alert_danger">
                              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                              <b><?= $_SESSION['fail'] ?></b>
                            </div><br>
                            <?php
                            
                        }

                        ?>
                       <!-- Notification End -->


                       <form action="patient-phone-number.php" method="GET">
                        <div class="col-xs-8">
                           <div class="form-group">
                            <label for="mrn"><span class="text-danger">*</span> Patient MRN : </label>
                            <input style="background-color:#fff;" id="mrn" type="text" name="mrn" class="form-control" placeholder="Enter Patient MRN" required>
                            </div>
                        </div>               

                        <div class="col-xs-4">
                           <div class="form-group">
                            <label for="program"><span class="text-danger">*</span> Search :</label>
                            <button type="submit" class="btn btn-success form-control">Search</button>
                           </div>
                        </div>
                        </form>

          </div> 

          <div class="row" style="font-size:18px;">
             <div class="item col-xs-12 col-lg-12">
                <div class="panel panel-default" data-z="0.5">
                <div class="panel-heading">
                  <h4 class="text-center margin-none">Patient Number List</h4>
                </div>   
                        
                        <table id="DataTable" data-toggle="data-table" class="table table-bordered" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                               <th class="text-center">SL</th>
                               <th class="text-center">Patient MRN</th>
                               <th class="text-center">Patient DOB</th>
                               <th class="text-center">Patient Name</th>
                               <th class="text-center">Patient Number</th>
                               <th class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tboday>
                             <?php
                                $sl=1;
                                $mrn=$_GET['mrn'] ?? '';
                                foreach(mysqli_query($db,"SELECT id, pmrn, pname, pphone, bdate FROM patient WHERE pmrn='$mrn'") as $value){
                                 ?> 
                                <tr>
                                    <td class="text-center"><?= $sl++ ?></td>
                                    <td class="text-center"><?= $value['pmrn'] ?></td>
                                    <td class="text-center"><?= $value['bdate'] ?></td>
                                    <td class="text-center"><?= $value['pname'] ?></td>
                                    <td class="text-center">
                                        <input class="text-center" type="text" id="pphone_<?= $value['pmrn'] ?>" value="<?= $value['pphone']  ?>">
                                    </td>
                                    <td class="text-center">
                                        <button title="Update Phone Number" class="btn btn-success" onclick="UpdatePhoneNumber(<?= $value['pmrn'] ?>)" type="button"><i class="fa fa-check"></i></button>
                                    </td>
                                </tr>
                                <script>
                                    function UpdatePhoneNumber(pmrn) {
                                        var pphone = document.getElementById("pphone_" + pmrn).value;
                                        if (confirm("Are you sure? You want to update this number!") == true) {
                                            window.location.href = "patient-phone-number.php?pmrn=" + pmrn + "&pphone=" + pphone;
                                        }
                                    }
                                </script>

                                 <?php
                                }
                             ?>
                          </tboday>
                        </table>
              </div>
             </div>

  <!-- Footer -->
  <footer class="footer">
  © Copyright SFMMKPJSH All Rights Reserved - Develop By IT
  </footer>
  <!-- Footer -->
  <script>
    var colors = {
      "danger-color": "#e74c3c",
      "success-color": "#81b53e",
      "warning-color": "#f0ad4e",
      "inverse-color": "#2c3e50",
      "info-color": "#2d7cb5",
      "default-color": "#6e7882",
      "default-light-color": "#cfd9db",
      "purple-color": "#9D8AC7",
      "mustard-color": "#d4d171",
      "lightred-color": "#e15258",
      "body-bg": "#f6f6f6"
    };
    var config = {
      theme: "html",
      skins: {
        "default": {
          "primary-color": "#42a5f5"
        }
      }
    };
  </script>
  <script src="OES1/assets/js/vendor/all.js"></script>
  <script src="OES1/assets/js/app/app.js"></script>
  
</body>
</html>

<?php
if (isset($_SESSION['fail']) || isset($_SESSION['success'])) {
    unset($_SESSION['success']);
    unset($_SESSION['fail']);
}
?>
