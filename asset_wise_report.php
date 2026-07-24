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
   HELPER
========================= */
function h($str) {
    return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8');
}

/* =========================
   FILTER VALUES
========================= */
$today = date('Y-m-d');

$asset_name = trim($_GET['asset_name'] ?? '');
$st_in      = $_GET['stdate'] ?? $today;
$en_in      = $_GET['endate'] ?? $today;

$st_in = date('Y-m-d', strtotime($st_in));
$en_in = date('Y-m-d', strtotime($en_in));

$stdate = $st_in . ' 00:00:00';
$endate = $en_in . ' 23:59:59';

$asset_name_esc = mysqli_real_escape_string($con, $asset_name);

/* =========================
   ASSET NAME LIST FOR SELECT2
   pull distinct g_name where ptype='New Purchase'
========================= */
$asset_names = [];
$asset_sql = "
    SELECT DISTINCT g_name
    FROM purchase_stock3
    WHERE ptype = 'New Purchase'
      AND g_name IS NOT NULL
      AND TRIM(g_name) <> ''
    ORDER BY g_name ASC
";
$asset_res = mysqli_query($con, $asset_sql) or die(mysqli_error($con));
while ($asset_row = mysqli_fetch_assoc($asset_res)) {
    $asset_names[] = $asset_row['g_name'];
}

/* =========================
   REPORT DATA
========================= */
$res = false;
$grand_total_qty = 0;

if ($asset_name !== '') {
    $sql = "
        SELECT id, g_name, add_qty, re_time, location, ptype
        FROM purchase_stock3
        WHERE ptype = 'New Purchase'
          AND g_name = '$asset_name_esc'
          AND re_time BETWEEN '$stdate' AND '$endate'
          AND add_qty > 0
        ORDER BY re_time DESC, id DESC
    ";
    $res = mysqli_query($con, $sql) or die(mysqli_error($con));
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Asset Report</title>

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

<h2>Asset Report</h2>

<form method="GET" action="">
    <div class="filter-box">
        <table class="filter-table">
            <tr>
                <td>
                    <strong>From Date:</strong><br>
                    <input type="date" name="stdate" value="<?php echo h($st_in); ?>" required>
                </td>

                <td>
                    <strong>To Date:</strong><br>
                    <input type="date" name="endate" value="<?php echo h($en_in); ?>" required>
                </td>

                <td>
                    <strong>Asset Name:</strong><br>
                    <select name="asset_name" id="asset_name" required>
                        <option value="">Select Asset</option>
                        <?php foreach ($asset_names as $asset) { ?>
                            <option value="<?php echo h($asset); ?>" <?php echo ($asset_name === $asset) ? 'selected' : ''; ?>>
                                <?php echo h($asset); ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>

                <td style="vertical-align: bottom;">
                    <input type="submit" value="Search" class="btn">
                    <a href="<?php echo h(basename($_SERVER['PHP_SELF'])); ?>" class="btn-reset">Reset</a>
                </td>
            </tr>
        </table>
    </div>
</form>

<?php if ($asset_name !== '') { ?>
<p>
    Asset Name: <strong><?php echo h($asset_name); ?></strong><br>
    Period: <strong><?php echo h($st_in); ?></strong> to <strong><?php echo h($en_in); ?></strong>
</p>

<table>
    <tr>
        <th width="8%">S.No</th>
        <th width="10%">ID</th>
        <th width="22%">Asset Name</th>
        <th width="18%">Type</th>
        <th width="18%">Department/Location</th>
        <th width="18%">Date Time</th>
        <th width="12%">Qty</th>
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
                <td align="center"><?php echo h($row['id'] ?? ''); ?></td>
                <td><?php echo h($row['g_name'] ?? ''); ?></td>
                <td align="center"><?php echo h($row['ptype'] ?? ''); ?></td>
                <td align="center"><?php echo h($row['location'] ?? ''); ?></td>
                <td align="center"><?php echo !empty($row['re_time']) ? date('d M Y h:i A', strtotime($row['re_time'])) : ''; ?></td>
                <td align="right"><?php echo number_format($qty, 2); ?></td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="7" align="center" style="color:red; font-weight:bold;">
                No asset found for this selection in selected date range.
            </td>
        </tr>
        <?php
    }
    ?>

    <tr class="total-row">
        <td colspan="6" align="right">Grand Total Qty</td>
        <td align="right"><?php echo number_format($grand_total_qty, 2); ?></td>
    </tr>
</table>
<?php } ?>

<script>
$(document).ready(function () {
    $('#asset_name').select2({
        placeholder: 'Search and select asset',
        allowClear: true,
        width: '320px'
    });
});
</script>

</body>
</html>