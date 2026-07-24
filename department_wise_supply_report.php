<?php
session_start();
require('db1.php');

$role   = $_SESSION['sess_userrole'] ?? '';
$usernm = $_SESSION['sess_username'] ?? '';

$queryc  = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('mng','staff','store','doctor')";
$resultc = mysqli_query($con, $queryc) or die(mysqli_error($con));
$rowc    = mysqli_fetch_assoc($resultc);
$c1      = (int)($rowc['c'] ?? 0);

if ($usernm === '' || $c1 == 0) {
    header('Location: login2?err=2');
    exit;
}

/* =========================
   FILTER VALUES
========================= */
$today = date('Y-m-d');

$department = trim($_GET['department'] ?? '');
$st_in      = $_GET['stdate'] ?? $today;
$en_in      = $_GET['endate'] ?? $today;

$st_in = date('Y-m-d', strtotime($st_in));
$en_in = date('Y-m-d', strtotime($en_in));

$stdate = $st_in . ' 00:00:00';
$endate = $en_in . ' 23:59:59';

$department_esc = mysqli_real_escape_string($con, $department);

/* =========================
   DEPARTMENT LIST FOR SELECT2
========================= */
$departments = [];
$dept_sql = "
    SELECT DISTINCT location
    FROM purchase_stock3
    WHERE location IS NOT NULL
      AND TRIM(location) <> ''
    ORDER BY location ASC
";
$dept_res = mysqli_query($con, $dept_sql) or die(mysqli_error($con));
while ($dept_row = mysqli_fetch_assoc($dept_res)) {
    $departments[] = $dept_row['location'];
}

/* =========================
   SUPPLY LIST
========================= */
$res = false;
$grand_total_qty = 0;

if ($department !== '') {
    $sql = "
        SELECT id, location, add_qty, re_time, g_name
        FROM purchase_stock3
        WHERE location = '$department_esc'
          AND re_time BETWEEN '$stdate' AND '$endate'
          AND add_qty>0
        ORDER BY re_time DESC, id DESC
    ";
    $res = mysqli_query($con, $sql) or die(mysqli_error($con));
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Department Wise Supply Report</title>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 20px;
        }
        h2, p {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
        }
        th {
            background: #f2f2f2;
        }
        .total-row td {
            font-weight: bold;
            background: #fff3cd;
        }
        .filter-table td {
            border: none;
            padding: 10px;
        }
        .filter-box {
            background: #ffffcc;
            border: 1px solid #ccc;
            padding: 12px;
            margin-bottom: 15px;
        }
        .select2-container {
            min-width: 320px !important;
        }
        .btn {
            padding: 7px 14px;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-reset {
            text-decoration: none;
            border: 1px solid #999;
            background: #ddd;
            color: #000;
            padding: 7px 14px;
            display: inline-block;
        }
    </style>
</head>
<body>

<h2>Department Wise Supply Report</h2>

<form method="GET" action="">
    <div class="filter-box">
        <table class="filter-table">
            <tr>
                <td>
                    <strong>From Date:</strong><br>
                    <input type="date" name="stdate" value="<?php echo htmlspecialchars($st_in); ?>" required>
                </td>

                <td>
                    <strong>To Date:</strong><br>
                    <input type="date" name="endate" value="<?php echo htmlspecialchars($en_in); ?>" required>
                </td>

                <td>
                    <strong>Department:</strong><br>
                    <select name="department" id="department" required>
                        <option value="">Select Department</option>
                        <?php foreach ($departments as $dept) { ?>
                            <option value="<?php echo htmlspecialchars($dept); ?>" <?php echo ($department === $dept) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($dept); ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>

                <td style="vertical-align: bottom;">
                    <input type="submit" value="Search" class="btn">
                    <a href="<?php echo htmlspecialchars(basename($_SERVER['PHP_SELF'])); ?>" class="btn-reset">Reset</a>
                </td>
            </tr>
        </table>
    </div>
</form>

<?php if ($department !== '') { ?>
<p>
    Department: <strong><?php echo htmlspecialchars($department); ?></strong><br>
    Period: <strong><?php echo htmlspecialchars($st_in); ?></strong> to <strong><?php echo htmlspecialchars($en_in); ?></strong>
</p>

<table>
    <tr>
        <th width="8%">S.No</th>
        <th width="15%">ID</th>
        <th width="15%">Product</th>
        <th width="25%">Date Time</th>
        <th width="27%">Department</th>
        <th width="25%">Qty</th>
    </tr>

    <?php
    $i = 1;

    if ($res && mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $qty = (float)($row['add_qty'] ?? 0);
            $grand_total_qty += $qty;
            ?>
            <tr>
                <td align="center"><?php echo $i++; ?></td>
                <td align="center"><?php echo htmlspecialchars($row['id'] ?? ''); ?></td>
                <td align="center"><?php echo htmlspecialchars($row['g_name'] ?? ''); ?></td>
                <td align="center"><?php echo date('d M Y h:i A', strtotime($row['re_time'])); ?></td>
                <td align="center"><?php echo htmlspecialchars($row['location'] ?? ''); ?></td>
                <td align="right"><?php echo number_format($qty, 2); ?></td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="5" align="center" style="color:red; font-weight:bold;">
                No supply found for this department in selected date range.
            </td>
        </tr>
        <?php
    }
    ?>

    <tr class="total-row">
        <td colspan="4" align="right">Grand Total Qty</td>
        <td align="right"></td>
        <td align="right"><?php echo number_format($grand_total_qty, 2); ?></td>
        
    </tr>
</table>
<?php } ?>

<script>
$(document).ready(function () {
    $('#department').select2({
        placeholder: 'Search and select department',
        allowClear: true,
        width: '320px'
    });
});
</script>

</body>
</html>