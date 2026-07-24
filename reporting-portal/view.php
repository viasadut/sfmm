<?php
session_start();
include 'db.php';

// ==========================
// GET REPORT ID
// ==========================
if (!isset($_GET['id'])) {
    $_SESSION['fail'] = "Invalid Request";
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);

// ==========================
// FETCH REPORT
// ==========================
$stmt = $db->prepare("SELECT * FROM reporting_portal WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$report = $stmt->get_result()->fetch_assoc();

if (!$report) {
    $_SESSION['fail'] = "Report not found";
    header("Location: index.php");
    exit;
}

// ==========================
// FETCH DOCUMENTS
// ==========================
$stmt2 = $db->prepare("SELECT * FROM reporting_portal_documents WHERE report_id=?");
$stmt2->bind_param("i", $id);
$stmt2->execute();
$docs = $stmt2->get_result();

$user_id= $report['created_by'];
$user_data=mysqli_fetch_assoc(mysqli_query($db,"SELECT fullname FROM user WHERE uname='$user_id'"));
$created_by= $user_data['fullname']. " (".$user_id.")" ?? 'N/A'." (".$user_id.")";

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
      .ck-content {
        max-width: 100%;
        overflow-x: auto;
    }

    .ck-content img {
        max-width: 100%;
        height: auto;
    }

    .ck-content table {
        width: 100% !important;
        border-collapse: collapse;
    }

    .ck-content * {
        font-size: 14px !important;
    }
      @media print {
        body {
            background: #fff;
        }

        .navbar, .footer, .btn {
            display: none !important;
        }

        .form-section {
            box-shadow: none;
            border: 1px solid #000;
            margin-bottom: 10px;
        }

        h4, h5 {
            color: black;
        }
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

    <div class="container mt-4" id="printArea">

        <!-- ALERTS -->
        <?php if(isset($_SESSION['fail'])): ?>
            <div class="alert alert-danger"><?= $_SESSION['fail']; unset($_SESSION['fail']); ?></div>
        <?php endif; ?>

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-primary">📄 Report Details</h4>
        </div>

        <!-- REPORT INFO -->
        <div class="form-section">
            <h5 class="text-success">📅 Report Info</h5>
            <p><b>Date:</b> <?= htmlspecialchars($report['report_date']) ?></p>
            <p><b>Period:</b> <?= htmlspecialchars($report['from_date']) ?> → <?= htmlspecialchars($report['to_date']) ?></p>
            <p><b>Department:</b> <?= htmlspecialchars($report['department']) ?></p>
            <p><b>Sub Department:</b> <?= htmlspecialchars($report['sub_department'] ?? 'N/A') ?></p>
        </div>

        <!-- MANPOWER -->
        <div class="form-section">
            <h5 class="text-success">👨‍⚕️ Manpower Status</h5>
            <p><b>Approved:</b> <?= $report['approved_manpower'] ?></p>
            <p><b>Current Staff:</b> <?= $report['current_staff'] ?></p>
            <p><b>Vacant:</b> <?= $report['vacant_post'] ?></p>
        </div>

        <!-- STOCK -->
        <div class="form-section">
            <h5 class="text-success">📦 Stock Update</h5>
            <div class="ck-content">
                <?= $report['departmental_stock_update'] ?>
            </div>
            <p><b>Total Value:</b> <?= htmlspecialchars($report['stock_value']) ?> BDT</p>
        </div>

        <!-- PERFORMANCE -->
        <div class="form-section">
            <h5 class="text-success">📈 Performance</h5>
            <div class="ck-content">
                <?= $report['performance_statistics'] ?>
            </div>
        </div>

        <!-- REQUIREMENT -->
        <div class="form-section">
            <h5 class="text-success">📝 Requirements</h5>
            <div class="ck-content">
                <?= $report['any_requirement'] ?>
            </div>
        </div>

        <!-- MISC -->
        <div class="form-section">
            <h5 class="text-success">📌 Miscellaneous</h5>
            <div class="ck-content">
            <?= $report['miscellaneous'] ?>
            </div>
        </div>



        <!-- DOCUMENTS -->
        <div class="form-section">
            <h5 class="text-success">📎 Documents</h5>

            <?php if($docs->num_rows > 0): ?>
                <ul>
                <?php while($d = $docs->fetch_assoc()): ?>
                    <li>
                        <a href="uploads/<?= htmlspecialchars($d['file_name']) ?>" target="_blank">
                            📄 <?= htmlspecialchars($d['file_name']) ?>
                        </a>
                    </li>
                <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p class="text-muted">No documents uploaded</p>
            <?php endif; ?>
        </div>

        <!-- SUBMITTED -->
        <div class="form-section">
            <h5 class="text-success">✍️ Submitted By</h5>
            <p><b>Name:</b> <?= $created_by ?></p>
        </div>        

        <!-- PRINT -->
        <div class="text-center">
            <button onclick="printReport()" class="btn btn-primary mb-3">🖨 Print Report</button>
        </div>
    </div>

    </main>

    <footer class="footer text-center">
        <p>© Copyright KPJSH All Rights Reserved - Develop By IT</p>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
    function printReport() {
        var printContents = document.getElementById("printArea").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    </script>

  </body>
</html>
