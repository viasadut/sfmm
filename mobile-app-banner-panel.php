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
$_SESSION['user_photo']="doctor/".$u_id.".jpg";
}
else{
$_SESSION['user_photo']="staff_pic/".$user_photo_db['pic'];
}
//Banner Upload Logic
if(isset($_POST['submit'])){

    // Maximum file size in bytes (2MB)
    $filesize = $_FILES['banner']['size'];
    $max_file_size = 2 * 1024 * 1024;
    // Allowed file types gif, jpg, JPEG, jpeg, png
    $allowed_extensions = ['gif', 'jpg', 'JPG', 'JPEG', 'jpeg', 'png'];
    $filename = $_FILES['banner']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

    if ($filesize <= $max_file_size) {
        if (in_array(strtolower($file_extension), $allowed_extensions)) {

            $random_number = uniqid();
            $new_filename = $random_number . '.' . $file_extension;
            $upload_directory = 'mobile-app-banner/';
            $target_path = $upload_directory . $new_filename;

            // Move uploaded file to target path
            if (move_uploaded_file($_FILES['banner']['tmp_name'], $target_path)) {

                // Resize Image
                $resized_image_path = resizeImage($target_path, $file_extension, 390, 844);

                if ($resized_image_path !== false) {
                    //resized_image_path insert to database
                     $created_by=$_SESSION['sess_fullname']."(".$_SESSION['sess_username'].")";
                     mysqli_query($db,"INSERT INTO app_banner (image,created_by) values('$new_filename','$created_by')");
                     unset($_SESSION['fail']);
                    $_SESSION['success'] = "Image Upload Successfull";
                    header("location:mobile-app-banner-panel.php"); 
                } else {
                    unset($_SESSION['success']);
                    $_SESSION['fail'] = "Failed to resize image";
                    header("location:mobile-app-banner-panel.php"); 
                }
            } else {
                unset($_SESSION['success']);
                $_SESSION['fail'] = "Image Upload Failed";
                header("location:mobile-app-banner-panel.php"); 
            }
        } else {
            unset($_SESSION['success']);
            $_SESSION['fail'] = "Only GIF, JPG, JPEG, PNG Image Allowed";
            header("location:mobile-app-banner-panel.php"); 
        }
    } else {
        unset($_SESSION['success']);
        $_SESSION['fail'] = "Maximum 2 MB Image Allowed";
        header("location:mobile-app-banner-panel.php"); 
    }
}

// Function to resize image
function resizeImage($image_path, $file_extension, $new_width, $new_height) {
    // Load image based on extension
    switch ($file_extension) {
        case 'jpg':
        case 'jpeg':
            $source_image = imagecreatefromjpeg($image_path);
            break;
        case 'png':
            $source_image = imagecreatefrompng($image_path);
            break;
        case 'gif':
            $source_image = imagecreatefromgif($image_path);
            break;
        default:
            return false;
    }

    // Get original dimensions
    $source_width = imagesx($source_image);
    $source_height = imagesy($source_image);

    // Create new image resource
    $destination_image = imagecreatetruecolor($new_width, $new_height);

    // Resize image
    imagecopyresampled($destination_image, $source_image, 0, 0, 0, 0, $new_width, $new_height, $source_width, $source_height);

    // Save resized image
    $resized_image_path = 'mobile-app-banner/' . basename($image_path);
    switch ($file_extension) {
        case 'jpg':
        case 'jpeg':
            imagejpeg($destination_image, $resized_image_path);
            break;
        case 'png':
            imagepng($destination_image, $resized_image_path);
            break;
        case 'gif':
            imagegif($destination_image, $resized_image_path);
            break;
    }

    // Free memory
    imagedestroy($source_image);
    imagedestroy($destination_image);

    return $resized_image_path;
}
//Banner Update & Delete Logic
if(isset($_GET['action'])){

   if($_GET['action']=="edit"){
        //GET Data
         $id=$_GET['id'];
         $status=$_GET['status'];
        //data Update in database
       if(mysqli_query($db,"UPDATE app_banner SET status='$status' WHERE id='$id'")){
        unset($_SESSION['fail']);
        $_SESSION['success'] = "Banner Update Successfull";
        header("location:mobile-app-banner-panel.php");
      }
      else{
        unset($_SESSION['fail']);
        $_SESSION['success'] = "Banner Update Failed";
        header("location:mobile-app-banner-panel.php");
           }
   }
   else{
        
         //GET Data
         $id=$_GET['id'];
         $images=$_GET['image'];
        //data Delete from database & image folder
        if (file_exists('mobile-app-banner/'.$image)){
         unlink('mobile-app-banner/'.$images);
        }
       if(mysqli_query($db,"DELETE FROM app_banner WHERE id='$id'")){
        unset($_SESSION['success']);
        $_SESSION['fail'] = "Banner Delete Successfull";
        header("location:mobile-app-banner-panel.php");
      }
      else{
        unset($_SESSION['success']);
        $_SESSION['fail'] = "Banner Delete Failed";
        header("location:mobile-app-banner-panel.php");
           }
     //data Delete from database end
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
  <title>Mobile App Banner Panel | Sheikh Fazilatunnessa Mujib Memorial KPJ Specialized Hospital & Nursing College</title>
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

                <li><a href="mobile-app-banner-panel.php">Dashboard</a></li>

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

               <form action="mobile-app-banner-panel.php" method="POST" enctype="multipart/form-data">
                <div class="col-xs-8">
                   <div class="form-group">
                    <label for="banner"><span class="text-danger">*</span> Banner : <small style="font-size:12px" class="text-danger">(Only 844x390 GIF, JPG, JPEG, PNG & Size 2 MB Allow)</small></label>
                    <input style="background-color:#fff;" id="banner" type="file" name="banner" class="form-control" required>
                    </div>
                </div>               

                <div class="col-xs-4">
                   <div class="form-group">
                    <label for="program"><span class="text-danger">*</span> Submit :</label>
                    <button name="submit" type="submit" class="btn btn-success form-control">Submit</button>
                   </div>
                </div>
                </form>

          </div> 

          <div class="row" style="font-size:18px;">
             <div class="item col-xs-12 col-lg-12">
                <div class="panel panel-default" data-z="0.5">
                <div class="panel-heading">
                  <h4 class="text-center margin-none">Banner List</h4>
                </div>
                  <div class="table-responsive">
                        <table data-toggle="data-table" class="table table-bordered" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                               <th class="text-center">SL</th>
                               <th class="text-center">Image</th>
                               <th class="text-center">Status</th>
                               <th class="text-center">Created</th>
                               <th class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tboday>
                             <?php
                                $sl=1;
                                foreach(mysqli_query($db,"SELECT * FROM app_banner ORDER BY id DESC") as $value){
                                 ?>
                                 <tr>
                                    <td class="text-center"><?= $sl++ ?></td>
                                    <td class="text-center"><a target="_blank" href="mobile-app-banner/<?= $value['image'] ?>"><img src="mobile-app-banner/<?= $value['image'] ?>" width="50px" height="50px"></a></td>
                                    <td class="text-center">
                                        <?php
                                         if($value['status']=='1'){
                                            ?>
                                            <span class="badge badge-pill" style="background-color:green;color:black;">Active</span>
                                            <?php 
                                         }
                                         else{
                                            ?>
                                            <span class="badge badge-pill" style="background-color:red;color:black;">Inactive</span>
                                            <?php
                                         }
                                        ?>
                                    </td>
                                    <td class="text-center"><?= $value['created_at'] ?></td>
                                    <td class="text-center">
                                    <a title="View Banner" target="_blank" href="mobile-app-banner/<?= $value['image'] ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                    <button data-toggle="modal" data-target="#exampleModal<?= $value['id'] ?>" class="btn btn-success"><i class="fa fa-edit"></i></button>
                                    <a title="Delete Banner" onclick="BannerDelete(<?= $value['id'] ?>,'<?= $value['image'] ?>')" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                    </td>


                                     <!--Edit Modal -->
                                        <div class="modal fade" id="exampleModal<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="mobile-app-banner-panel.php" method="GET">
                                        <input type="hidden" name="action" value="edit">
                                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Banner</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                  <div class="form-group">
                                                        <label for="status">Status : <span class="text-danger">*</span></label>
                                                        <select id="status" style="width:100%;" class="form-control" name="status" required>
                                                            <option value="">Select One</option>
                                                            <option value="1">Active</option>
                                                            <option value="2">Inactive</option>
                                                         
                                                        </select>
                                                    </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                              </div>
                                            </div>
                                              </div>
                                            </div>
                                          </div>
                                          </form>
                                        </div>
                                        <!--Edit Modal -->

                                 </tr>
                                 <?php
                                }
                             ?>
                          </tboday>
                        </table>
                   </div>
              </div>
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

    //BannerDelete
    function BannerDelete(id,image) {
      let text = "Are you sure? You want to delete this banner!";
      if (confirm(text) == true) {
        window.location="mobile-app-banner-panel.php?action=delete&id="+id+"&image="+image;
      }
    }
  </script>
  <script src="OES1/assets/js/vendor/all.js"></script>
  <script src="OES1/assets/js/app/app.js"></script>
</body>
</html>