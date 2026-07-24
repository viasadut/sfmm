<?php
session_start();
include 'db.php';

$user_id = "1274";

$allowed_users = ['1274', 'md'];
if (!isset($user_id) || !in_array($user_id, $allowed_users)) {
    $_SESSION['fail'] = "Unauthorized access!";
    header("Location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Reporting Portal - KPJ Specialized Hospital & Nursing College">
    <link rel="icon" href="images/logo-kpj.png">
    <title>Reporting Portal - KPJ Specialized Hospital</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #007bff;
            --dark:    #343a40;
            --light-bg:#f0f2f5;
        }

        * { box-sizing: border-box; }

        body {
            background-color: var(--light-bg);
            padding-top: 70px;
            padding-bottom: 70px;
            font-size: 15px;
        }

        /* ── NAVBAR ── */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0,0,0,0.12);
            background: #fff !important;
            padding: 10px 16px;
        }

        .navbar-brand {
            font-size: 14px;
            font-weight: 600;
            color: #dc3545 !important;
            padding: 4px 8px;
            border-radius: 6px;
            transition: background .2s;
        }

        .navbar-brand:hover {
            background: #fff0f0;
            text-decoration: none;
        }

        .navbar-toggler {
            border: none;
            font-size: 20px;
            color: #dc3545;
        }

        /* ── CARDS / SECTIONS ── */
        .form-section {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        }

        .form-section h5 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 16px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        /* ── TABLE ── */
        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border-radius: 8px;
        }

        .table {
            min-width: 680px;
            font-size: 13px;
            margin-bottom: 0;
        }

        .table thead th {
            background: #343a40;
            color: #fff;
            white-space: nowrap;
            vertical-align: middle;
            font-size: 13px;
        }

        .table tbody td {
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: #f0f4ff;
        }

        /* ── BADGES ── */
        .badge {
            font-size: 11px;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .bg-danger  { background-color: #dc3545 !important; color: #fff; }
        .bg-success { background-color: #28a745 !important; color: #fff; }
        .bg-warning { background-color: #ffc107 !important; }

        /* ── BUTTONS ── */
        .btn-sm {
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 6px;
            white-space: nowrap;
        }

        .action-btns { display: flex; gap: 4px; flex-wrap: wrap; }

        /* ── FORM ── */
        .form-control {
            border-radius: 8px;
            font-size: 14px;
        }

        label {
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 4px;
            color: #555;
        }

        /* ── FOOTER ── */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 50px;
            line-height: 50px;
            background: #343a40;
            color: #adb5bd;
            font-size: 12px;
            z-index: 1000;
            text-align: center;
        }

        /* ── ALERTS ── */
        .alert {
            border-radius: 10px;
            font-size: 14px;
        }

        /* ════════════════════════════
           RESPONSIVE BREAKPOINTS
        ════════════════════════════ */

        /* Tablet (768px and below) */
        @media (max-width: 768px) {
            body { padding-top: 65px; font-size: 14px; }

            .navbar-brand { font-size: 13px; padding: 3px 6px; }

            .form-section { padding: 14px; border-radius: 10px; }

            .form-section h5 { font-size: 15px; }

            .table { font-size: 12px; }

            .table thead th,
            .table tbody td { padding: 8px 10px; }

            .btn-sm { font-size: 11px; padding: 3px 8px; }

            /* Stack filter form to 2 columns on tablet */
            .filter-row .col-md-3 {
                flex: 0 0 50%;
                max-width: 50%;
                margin-bottom: 10px;
            }

            .filter-row .col-search {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        /* Mobile (576px and below) */
        @media (max-width: 576px) {
            body { padding-top: 60px; font-size: 13px; }

            .navbar { padding: 8px 12px; }

            .navbar-brand { font-size: 12px; }

            .form-section { padding: 12px; border-radius: 8px; }

            /* Stack all filter fields to full width on mobile */
            .filter-row .col-md-3,
            .filter-row .col-search {
                flex: 0 0 100%;
                max-width: 100%;
                margin-bottom: 10px;
            }

            .table { font-size: 11px; min-width: 580px; }

            .table thead th,
            .table tbody td { padding: 6px 8px; }

            .btn-sm { font-size: 10px; padding: 3px 7px; }

            .footer { font-size: 11px; height: 44px; line-height: 44px; }

            .badge { font-size: 10px; padding: 3px 8px; }
        }

        /* Large screen (1200px+) */
        @media (min-width: 1200px) {
            body { font-size: 15px; }
            .table { font-size: 14px; }
            .form-section { padding: 24px; }
        }
    </style>
</head>
<body>

<!-- ── NAVBAR ── -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <!-- Brand / Logo -->
            <span class="navbar-brand fw-bold text-danger" style="font-size:15px;">
                KPJ Reporting
            </span>

            <!-- Mobile toggle -->
            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navMenu"
                aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                ☰
            </button>

            <!-- Nav links -->
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto gap-1">
                    <li class="nav-item">
                        <a href="/sfmm/homestaff" class="navbar-brand text-danger">
                            ← Back To PMS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php" class="navbar-brand text-danger">
                            🏠 Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="reports-list.php" class="navbar-brand text-danger">
                            📋 View Reports
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</header>

<main role="main" class="container-fluid mt-3">
<div class="container-lg px-3">

    <!-- ── ALERTS ── -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION['success']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['fail'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION['fail']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php unset($_SESSION['fail']); ?>
    <?php endif; ?>

    <!-- ── SEARCH PANEL ── -->
    <div class="form-section">
        <h5 class="text-success">🔍 Search Reports</h5>

        <form method="GET">
            <div class="row filter-row g-2 align-items-end">

                <div class="col-md-3 col-sm-6 col-12">
                    <label>From Date</label>
                    <input type="date" name="from_date"
                        value="<?= htmlspecialchars($_GET['from_date'] ?? '') ?>"
                        class="form-control">
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <label>To Date</label>
                    <input type="date" name="to_date"
                        value="<?= htmlspecialchars($_GET['to_date'] ?? '') ?>"
                        class="form-control">
                </div>

                 <div class="col-md-2 col-sm-6 col-12">
                    <label>Status</label>

                    <select name="status" class="form-control">

                        <option value="pending"
                            <?= (($_GET['status'] ?? 'pending') == 'pending') ? 'selected' : '' ?>>
                            Pending
                        </option>

                        <option value="accepted"
                            <?= (($_GET['status'] ?? '') == 'accepted') ? 'selected' : '' ?>>
                            Accepted
                        </option>

                        <option value="rejected"
                            <?= (($_GET['status'] ?? '') == 'rejected') ? 'selected' : '' ?>>
                            Rejected
                        </option>

                    </select>
                </div>

                <div class="col-md-2 col-sm-6 col-12">
                    <label>Department</label>
                    <select name="department" class="form-control">
                        <option value="">All Departments</option>
                        <?php
                        $dept_q = $db->query("SELECT DISTINCT department FROM reporting_portal ORDER BY department ASC");
                        while ($d = $dept_q->fetch_assoc()) {
                            $selected = (($_GET['department'] ?? '') == $d['department']) ? 'selected' : '';
                            echo "<option value='" . htmlspecialchars($d['department']) . "' $selected>"
                               . htmlspecialchars($d['department']) . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-2 col-sm-6 col-12 col-search">
                    <label class="d-none d-md-block">&nbsp;</label>
                    <button class="btn btn-primary w-100">
                        Search
                    </button>
                </div>

            </div>
        </form>
    </div>

    <!-- ── REPORT TABLE ── -->
    <div class="form-section">
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <h5 class="text-primary mb-0">📋 Reports</h5>
            <?php if (!empty($_GET['from_date']) || !empty($_GET['to_date']) || !empty($_GET['department'])): ?>
                <a href="reports-list.php" class="btn btn-sm btn-outline-secondary">Clear Filters</a>
            <?php endif; ?>
        </div>

        <div class="table-wrapper">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Date</th>
                    <th>From - To</th>
                    <th>Department</th>
                    <th>Submitted By</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php

                $sl = 1;

                $where  = [];
                $params = [];
                $types  = "";

                // DEFAULT STATUS FILTER

                $status_filter = $_GET['status'] ?? 'pending';

                // FROM DATE FILTER

                if (!empty($_GET['from_date'])) {

                    $where[]  = "report_date >= ?";
                    $params[] = $_GET['from_date'];
                    $types   .= "s";
                }


                // TO DATE FILTER

                if (!empty($_GET['to_date'])) {

                    $where[]  = "report_date <= ?";
                    $params[] = $_GET['to_date'];
                    $types   .= "s";
                }

                // DEPARTMENT FILTER

                if (!empty($_GET['department'])) {

                    $where[]  = "department = ?";
                    $params[] = $_GET['department'];
                    $types   .= "s";
                }


                //STATUS FILTER

                if (!empty($status_filter)) {

                    if ($status_filter == 'pending') {

                        $where[]  = "approve_status = ?";
                        $params[] = '1';
                        $types   .= "s";

                    } elseif ($status_filter == 'accepted') {

                        $where[]  = "approve_status = ?";
                        $params[] = '2';
                        $types   .= "s";

                    } elseif ($status_filter == 'rejected') {

                        $where[]  = "approve_status = ?";
                        $params[] = '3';
                        $types   .= "s";
                    }
                }

                
               // FINAL QUERY

                $sql = "SELECT * FROM reporting_portal WHERE delete_status = '1'";

                if (!empty($where)) {

                    $sql .= " AND " . implode(" AND ", $where);
                }

                $sql .= " ORDER BY id DESC";

                
                //PREPARE QUERY

                $stmt = $db->prepare($sql);

                if (!empty($params)) {

                    $stmt->bind_param($types, ...$params);
                }

                $stmt->execute();

                $res = $stmt->get_result();


            if ($res->num_rows > 0):
                while ($row = $res->fetch_assoc()):

                    // Get submitted by name
                    $uid    = $row['created_by'];
                    $u_stmt = $db->prepare("SELECT fullname FROM user WHERE uname = ?");
                    $u_stmt->bind_param("s", $uid);
                    $u_stmt->execute();
                    $u_res      = $u_stmt->get_result()->fetch_assoc();
                    $created_by = ($u_res['fullname'] ?? 'N/A') . " ($uid)";

                    // Status badge
                    $status = $row['approve_status'];
                    if ($status == '1')      $badge = '<span class="badge bg-danger">Pending</span>';
                    elseif ($status == '2')  $badge = '<span class="badge bg-success">Accepted</span>';
                    elseif ($status == '3')  $badge = '<span class="badge bg-warning text-dark">Rejected</span>';
                    else                     $badge = '<span class="badge bg-secondary">Unknown</span>';
            ?>
                <tr>
                    <td><?= $sl++ ?></td>
                    <td style="white-space:nowrap"><?= htmlspecialchars($row['report_date']) ?></td>
                    <td style="white-space:nowrap">
                        <?= htmlspecialchars($row['from_date']) ?>
                        <span class="text-muted">→</span>
                        <?= htmlspecialchars($row['to_date']) ?>
                    </td>
                    <td><?= htmlspecialchars($row['department']) ?></td>
                    <td><?= htmlspecialchars($created_by) ?></td>
                    <td><?= $badge ?></td>
                    <td>
                        <div class="action-btns">
                            <?php if ($status == '1' && in_array($user_id, $allowed_users)): ?>
                                <a href="decision.php?action=accept&id=<?= $row['id'] ?>"
                                   onclick="return confirm('Accept this report?');"
                                   class="btn btn-sm btn-success">✓ Accept</a>

                                <a href="decision.php?action=reject&id=<?= $row['id'] ?>"
                                   onclick="return confirm('Reject this report?');"
                                   class="btn btn-sm btn-warning">✗ Reject</a>
                            <?php endif; ?>

                            <a href="view.php?id=<?= $row['id'] ?>"
                               class="btn btn-sm btn-info text-white">👁 View</a>
                        </div>
                    </td>
                </tr>
            <?php
                endwhile;
            else:
            ?>
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">
                        No reports found for the selected filters.
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
        </div>

    </div>

</div>
</main>

<footer class="footer">
    © Copyright KPJSH — All Rights Reserved | Developed by IT
</footer>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>