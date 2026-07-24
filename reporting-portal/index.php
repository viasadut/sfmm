<?php
//Session
session_start();
//DB
include 'db.php';
if(!isset($_SESSION["sess_username"])){
    header('location:http://192.168.100.252:8081/sfmm');
  }

//$user_id="1274";
$user_id = $_SESSION["sess_username"];
$staff_data = mysqli_fetch_assoc(mysqli_query($db, "SELECT dept AS department FROM staff3 WHERE sid='$user_id'"));
$department=$staff_data['department'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Reporting Portal - KPJ Specialized Hospital & Nursing College">
    <meta name="author" content="Md. Nur Sami Noman">
    <link rel="icon" href="images/logo-kpj.png">
    <title>Reporting Portal - KPJ Specialized Hospital & Nursing College</title>
    <!-- ckeditor/js -->
    <script src="vendor/ckeditor/ckeditor.js" ></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <style type="text/css">
      body {
        padding-top: 80px; /* Set padding-top to the height of the header */
        padding-bottom: 60px; /* Set padding-bottom to the height of the footer */
        background-color: #f8f9fa; /* Light background for better contrast */
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
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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

      .menu {
        border: 1px solid black;
      }
      
      a {
        text-decoration: none;
        color: #FFFFFF;
      }

      .form-section {
        background: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      }

      .vital-input {
        margin-bottom: 15px;
      }

      .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
      }

      .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
      }
    </style>
  </head>
  <body style="background-color: #e9ecef;">

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a href="/sfmm/<?php
                    $role = $_SESSION['sess_userrole'];
                    if ($role == 'mng') {
                        echo 'homemng';
                    } else if ($role == 'staff') {
                        echo 'homestaff';
                    } else if ($role == 'doctor') {
                        echo 'viewnew11';
                    } else if ($role == 'nurse') {
                        echo 'viewnewnurse';
                    } else if ($role == 'lab') {
                        echo 'teslab';
                    }
                    else if ($role == 'emergency') {
                        echo 'viewnewemergency';
                    }
                    else if ($role == 'ot') {
                        echo 'otdash1';
                    }
                    else if ($role == 'diet') {
                        echo 'viewnew11diet';
                    }
                ?>" class="navbar-brand text-danger"><h5><b>Back To PMS</b></h5></a>
            <a href="index.php" class="navbar-brand text-danger"><h5><b>Home</b></h5></a>
            <a href="reports-list.php" class="navbar-brand text-danger"><h5><b>View Reports</b></h5></a>
          </div>
        </nav>
    </header>

    <main role="main" class="container-fluid mt-4">

    <div class="container">

        <!-- Alert Messages -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success border-0 alert-dismissible">
                <span><?= $_SESSION['success']; ?></span>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['fail'])): ?>
            <div class="alert alert-danger border-0 alert-dismissible">
                <span><?= $_SESSION['fail']; ?></span>
            </div>
            <?php unset($_SESSION['fail']); ?>
        <?php endif; ?>

        <!-- Page Title -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-primary"><b>📊 Department Reporting Portal</b></h4>
        </div>

        <!-- REPORT FORM -->
        <form action="save.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="created_by" value="<?= $user_id ?>" required>

            <!-- Date Section -->
            <div class="form-section">
                <h5 class="text-success">🏢 Reporting Department</h5>
                <div class="row">
                    <div class="col-md-6 vital-input">
                        <label>Department <span class="text-danger">*</span></label>
                        <select name="department" class="form-control" required>
                        <option value="">Select Department</option>
                                <?php
                                $dept_q = $db->query("SELECT DISTINCT dept AS department FROM staff3");
                                while($d = $dept_q->fetch_assoc()){
                                    $selected = (($department ?? '') == $d['department']) ? 'selected' : '';
                                    echo "<option value='{$d['department']}' $selected>{$d['department']}</option>";
                                }
                                ?>
                        </select>
                    </div>
                    <div class="col-md-6 vital-input">
                        <label>Sub Department (Optional)</label>
                        <select name="sub_department" class="form-control">
                        <option value="">Select Sub Department</option>
                                <?php
                                $dept_q = $db->query("
                                    SELECT DISTINCT subdept AS sub_department 
                                    FROM staff3 
                                    WHERE subdept IS NOT NULL 
                                    AND subdept != ''
                                ");

                                while($d = $dept_q->fetch_assoc()){
                                    $selected = (($sub_department ?? '') == $d['sub_department']) ? 'selected' : '';
                                    echo "<option value='".htmlspecialchars($d['sub_department'])."' $selected>"
                                        .htmlspecialchars($d['sub_department'])."</option>";
                                }
                                ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Date Section -->
            <div class="form-section">
                <h5 class="text-success">📅 Report Duration</h5>
                <div class="row">
                    <div class="col-md-4 vital-input">
                        <label>Report Date <span class="text-danger">*</span></label>
                        <input type="date" name="report_date" class="form-control" required>
                    </div>
                    <div class="col-md-4 vital-input">
                        <label>From Date <span class="text-danger">*</span></label>
                        <input type="date" name="from_date" class="form-control" required>
                    </div>
                    <div class="col-md-4 vital-input">
                        <label>To Date <span class="text-danger">*</span></label>
                        <input type="date" name="to_date" class="form-control" required>
                    </div>
                </div>
            </div>

            <!-- Manpower -->
            <div class="form-section">
                <h5 class="text-success">👨‍⚕️ 1. Manpower Status</h5>
                <div class="row">
                    <div class="col-md-4 vital-input">
                        <input type="number" name="approved" class="form-control" placeholder="Total Approved Post">
                    </div>
                    <div class="col-md-4 vital-input">
                        <input type="number" name="staff" class="form-control" placeholder="Current Staff">
                    </div>
                    <div class="col-md-4 vital-input">
                        <input type="number" name="vacant" class="form-control" placeholder="Vacant Post">
                    </div>
                </div>
            </div>

            <!-- Stock -->
            <div class="form-section">
                <h5 class="text-success">📦 2. Departmental Stock Update</h5>
                <textarea name="stock" id="stock-update" class="form-control" rows="3" placeholder="Write stock update..."></textarea>
            </div>

            <!-- Stock Value -->
            <div class="form-section">
                <h5 class="text-success">💰 3. Total Stock Value (BDT)</h5>
                <input type="text" name="stock_value" class="form-control" placeholder="Enter amount">
            </div>

            <!-- Performance -->
            <div class="form-section">
                <h5 class="text-success">📈 4. Performance Statistics</h5>
                <textarea name="performance" id="performance" class="form-control" rows="3"></textarea>
            </div>

            <!-- Requirement -->
            <div class="form-section">
                <h5 class="text-success">📝 5. Any requirement</h5>
                <textarea name="requirement"  id="requirement" class="form-control" rows="3"></textarea>
            </div>

            <!-- Misc -->
            <div class="form-section">
                <h5 class="text-success">📌 6. Miscellaneous</h5>
                <textarea name="misc"   id="miscellaneous" class="form-control" rows="3"></textarea>
            </div>


            <!-- File Upload -->
            <div class="form-section">
                <h5 class="text-success">📎 Upload Documents</h5>
                <input type="file" name="files[]" class="form-control" multiple>
                <small class="text-danger">(Allow PDF,JPG,PNG,JPEG File MAX 5 MB)</small>
            </div>

            <!-- Submit -->
            <div class="text-center mb-5">
                <button class="btn btn-primary px-5">💾 Save Report</button>
            </div>

        </form>


        <!-- REPORT TABLE -->
        <div class="form-section mt-5">
            <h5 class="text-primary">📋 Recent Reports</h5>
            <div class="table-responsive">
            <table class="table table-bordered table-hover mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>From - To</th>
                        <th>Department</th>
                        <th>Sub Department</th>
                        <th>Submitted By</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                $sl=1;
                $sub_department = $_GET['sub_department'] ?? '';

                $stmt = $db->prepare("
                SELECT r.*, u.fullname
                FROM reporting_portal r
                LEFT JOIN user u ON r.created_by = u.uname
                WHERE 
                    r.delete_status = 1
                    AND (
                        (
                            r.department = ?
                            AND (
                                ? = '' 
                                OR r.sub_department = ?
                            )
                        )
                        OR r.created_by = ?
                    )
                ORDER BY r.id DESC;
                ");

                $stmt->bind_param("ssss", $department, $sub_department, $sub_department, $user_id);
                $stmt->execute();

                $res = $stmt->get_result();

                while($row = $res->fetch_assoc())
                {
                ?>
                    <tr>
                        <td><?= $sl ?></td>
                        <td><?= $row['report_date'] ?></td>
                        <td><?= $row['from_date'] ?> - <?= $row['to_date'] ?></td>
                        <td><?= $row['department'] ?></td>
                        <td><?= $row['sub_department'] ?? 'N/A'?></td>
                        <td><?= $row['fullname']. " (".$row['created_by'].")" ?></td>
                        <td>
                            <?php
                            $status = $row['approve_status'];

                            if($status == '1'){
                                echo '<span class="badge bg-danger">Pending</span>';
                            }
                            elseif($status == '2'){
                                echo '<span class="badge bg-success">Accept</span>';
                            }
                            elseif($status == '3'){
                                echo '<span class="badge bg-warning text-dark">Reject</span>';
                            }
                            ?>
                        </td>
                        <td>
                            <a href="view.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info">View</a>
                        </td>
                    </tr>
                <?php 
               $sl++;
               } 
               ?>

                </tbody>
            </table>
            </div>
        </div>

    </div>

    </main>

    <footer class="footer text-center">
        <p>© Copyright KPJSH All Rights Reserved - Develop By IT</p>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

        CKEDITOR.replace('stock-update',{
            height: "200px",
            extraPlugins: 'youtube,videoembed,uploadimage',
            filebrowserUploadUrl: 'FileUpload.php',
            filebrowserUploadMethod: 'form',


            // Pasted image handling
            on: {
                paste: function (event) {
                    var dataTransfer = event.data.dataTransfer;

                    if (dataTransfer && dataTransfer.getFilesCount() > 0) {
                        var file = dataTransfer.getFile(0);

                        if (file.type.indexOf('image') === 0) {
                            event.cancel();

                            var reader = new FileReader();

                            reader.onload = function (e) {
                                var imageUrl = e.target.result;
                                var editor = event.editor;

                                // Send the base64 image data to upload.php
                                var formData = new FormData();
                                formData.append('upload', imageUrl);

                                var xhr = new XMLHttpRequest();
                                xhr.open('POST', 'FileUpload.php?CKEditorFuncNum=' + event.data.CKEditorFuncNum);
                                xhr.onload = function () {
                                    if (xhr.status === 200) {
                                        var response = xhr.responseText;
                                        editor.insertHtml(response);
                                    } else {
                                        console.log('Image upload failed.');
                                    }
                                };
                                xhr.send(formData);
                            };

                            reader.readAsDataURL(file);
                        }
                    }
                }
            }

        });    

        CKEDITOR.replace('performance',{

            height: "200px",
            extraPlugins: 'youtube,videoembed,uploadimage',
            
            filebrowserUploadUrl: 'FileUpload.php',
            filebrowserUploadMethod: 'form',


            // Pasted image handling
            on: {
                paste: function (event) {
                    var dataTransfer = event.data.dataTransfer;

                    if (dataTransfer && dataTransfer.getFilesCount() > 0) {
                        var file = dataTransfer.getFile(0);

                        if (file.type.indexOf('image') === 0) {
                            event.cancel();

                            var reader = new FileReader();

                            reader.onload = function (e) {
                                var imageUrl = e.target.result;
                                var editor = event.editor;

                                // Send the base64 image data to upload.php
                                var formData = new FormData();
                                formData.append('upload', imageUrl);

                                var xhr = new XMLHttpRequest();
                                xhr.open('POST', 'FileUpload.php?CKEditorFuncNum=' + event.data.CKEditorFuncNum);
                                xhr.onload = function () {
                                    if (xhr.status === 200) {
                                        var response = xhr.responseText;
                                        editor.insertHtml(response);
                                    } else {
                                        console.log('Image upload failed.');
                                    }
                                };
                                xhr.send(formData);
                            };

                            reader.readAsDataURL(file);
                        }
                    }
                }
            }

        });

        CKEDITOR.replace('requirement',{

        height: "200px",
        extraPlugins: 'youtube,videoembed,uploadimage',

        filebrowserUploadUrl: 'FileUpload.php',
        filebrowserUploadMethod: 'form',


        // Pasted image handling
        on: {
            paste: function (event) {
                var dataTransfer = event.data.dataTransfer;

                if (dataTransfer && dataTransfer.getFilesCount() > 0) {
                    var file = dataTransfer.getFile(0);

                    if (file.type.indexOf('image') === 0) {
                        event.cancel();

                        var reader = new FileReader();

                        reader.onload = function (e) {
                            var imageUrl = e.target.result;
                            var editor = event.editor;

                            // Send the base64 image data to upload.php
                            var formData = new FormData();
                            formData.append('upload', imageUrl);

                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', 'FileUpload.php?CKEditorFuncNum=' + event.data.CKEditorFuncNum);
                            xhr.onload = function () {
                                if (xhr.status === 200) {
                                    var response = xhr.responseText;
                                    editor.insertHtml(response);
                                } else {
                                    console.log('Image upload failed.');
                                }
                            };
                            xhr.send(formData);
                        };

                        reader.readAsDataURL(file);
                    }
                }
            }
        }

        });

        CKEDITOR.replace('miscellaneous',{

        height: "200px",
        extraPlugins: 'youtube,videoembed,uploadimage',

        filebrowserUploadUrl: 'FileUpload.php',
        filebrowserUploadMethod: 'form',


        // Pasted image handling
        on: {
            paste: function (event) {
                var dataTransfer = event.data.dataTransfer;

                if (dataTransfer && dataTransfer.getFilesCount() > 0) {
                    var file = dataTransfer.getFile(0);

                    if (file.type.indexOf('image') === 0) {
                        event.cancel();

                        var reader = new FileReader();

                        reader.onload = function (e) {
                            var imageUrl = e.target.result;
                            var editor = event.editor;

                            // Send the base64 image data to upload.php
                            var formData = new FormData();
                            formData.append('upload', imageUrl);

                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', 'FileUpload.php?CKEditorFuncNum=' + event.data.CKEditorFuncNum);
                            xhr.onload = function () {
                                if (xhr.status === 200) {
                                    var response = xhr.responseText;
                                    editor.insertHtml(response);
                                } else {
                                    console.log('Image upload failed.');
                                }
                            };
                            xhr.send(formData);
                        };

                        reader.readAsDataURL(file);
                    }
                }
            }
        }

        });

        </script>
  </body>
</html>
