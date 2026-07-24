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

$req_department = trim($_GET['req_department'] ?? '');
$st_in          = $_GET['stdate'] ?? $today;
$en_in          = $_GET['endate'] ?? $today;

$st_in = date('Y-m-d', strtotime($st_in));
$en_in = date('Y-m-d', strtotime($en_in));

$stdate = $st_in . ' 00:00:00';
$endate = $en_in . ' 23:59:59';

$req_department_esc = mysqli_real_escape_string($con, $req_department);

/* =========================
   DEPARTMENT LIST FOR SELECT2
========================= */
$departments = [];
$dept_sql = "
    SELECT DISTINCT req_department
    FROM po_table
    WHERE req_department IS NOT NULL
      AND TRIM(req_department) <> ''
    ORDER BY req_department ASC
";
$dept_res = mysqli_query($con, $dept_sql) or die(mysqli_error($con));
while ($dept_row = mysqli_fetch_assoc($dept_res)) {
    $departments[] = $dept_row['req_department'];
}

/* =========================
   PO LIST
========================= */
$res = false;
$grand_total = 0;

if ($req_department !== '') {
    $sql = "
        SELECT id, creditor_code, total_amount, status, ceo_a_time, ono, req_department
        FROM po_table
        WHERE status='Approved'
          AND req_department='$req_department_esc'
          AND ceo_a_time BETWEEN '$stdate' AND '$endate'
        ORDER BY ceo_a_time DESC, id DESC
    ";
    $res = mysqli_query($con, $sql) or die(mysqli_error($con));
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Department Wise PO Breakdown Report</title>

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

<h2>Department Wise PO Breakdown Report</h2>

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
                    <select name="req_department" id="req_department" required>
                        <option value="">Select Department</option>
                        <?php foreach ($departments as $dept) { ?>
                            <option value="<?php echo htmlspecialchars($dept); ?>" <?php echo ($req_department === $dept) ? 'selected' : ''; ?>>
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

<?php if ($req_department !== '') { ?>
<p>
    Department: <strong><?php echo htmlspecialchars($req_department); ?></strong><br>
    Period: <strong><?php echo htmlspecialchars($st_in); ?></strong> to <strong><?php echo htmlspecialchars($en_in); ?></strong>
</p>

<table>
    <tr>
        <th width="5%">S.No</th>
        <th width="15%">PO No</th>
        <th width="20%">Approved Date</th>
        <th width="20%">Department</th>
        <th width="15%">Status</th>
        <th width="15%">Amount</th>
        <th width="10%">Print</th>
    </tr>

    <?php
    $i = 1;

    if ($res && mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $amt = (float)($row['total_amount'] ?? 0);
            $grand_total += $amt;
            ?>
            <tr>
                <td align="center"><?php echo $i++; ?></td>
                <td align="center"><?php echo htmlspecialchars($row['id'] ?? ''); ?></td>
                <td align="center"><?php echo htmlspecialchars($row['ceo_a_time'] ?? ''); ?></td>
                <td align="center"><?php echo htmlspecialchars($row['req_department'] ?? ''); ?></td>
                <td align="center"><?php echo htmlspecialchars($row['status'] ?? ''); ?></td>
                <td align="right"><?php echo number_format($amt, 2); ?></td>
                <td align="center">
                    <a href="po_print_new?ono=<?php echo urlencode($row['ono']); ?>">Print</a>
                </td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="7" align="center" style="color:red; font-weight:bold;">
                No approved PO found for this department in selected date range.
            </td>
        </tr>
        <?php
    }
    ?>

    <tr class="total-row">
        <td colspan="5" align="right">Grand Total</td>
        <td align="right"><?php echo number_format($grand_total, 2); ?></td>
        <td></td>
    </tr>
</table>
<?php } ?>

<script>
$(document).ready(function () {
    $('#req_department').select2({
        placeholder: 'Search and select department',
        allowClear: true,
        width: '320px'
    });
});
</script>

</body>
</html>