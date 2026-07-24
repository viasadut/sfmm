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

$po_type = trim($_GET['po_type'] ?? '');
$st_in   = $_GET['stdate'] ?? $today;
$en_in   = $_GET['endate'] ?? $today;

$st_in = date('Y-m-d', strtotime($st_in));
$en_in = date('Y-m-d', strtotime($en_in));

$stdate = $st_in . ' 00:00:00';
$endate = $en_in . ' 23:59:59';

$po_type_esc = mysqli_real_escape_string($con, $po_type);

/* =========================
   PO TYPE LIST FOR SELECT2
========================= */
$po_types = [];
$type_sql = "
    SELECT DISTINCT po_type
    FROM po_table
    WHERE po_type IS NOT NULL
      AND TRIM(po_type) <> ''
    ORDER BY po_type ASC
";
$type_res = mysqli_query($con, $type_sql) or die(mysqli_error($con));
while ($type_row = mysqli_fetch_assoc($type_res)) {
    $po_types[] = $type_row['po_type'];
}

/* =========================
   PO LIST WITH ITEM NAMES
   po_table.id = po_table1.po_id
========================= */
$res = false;
$grand_total = 0;

if ($po_type !== '') {
    $sql = "
        SELECT 
            p.id,
            p.creditor_code,
            p.total_amount,
            p.status,
            p.ceo_a_time,
            p.ono,
            p.po_type,
            GROUP_CONCAT(DISTINCT pt1.name ORDER BY pt1.name SEPARATOR ', ') AS item_names
        FROM po_table p
        LEFT JOIN po_table1 pt1 ON p.id = pt1.po_id
        WHERE p.status = 'Approved'
          AND p.po_type = '$po_type_esc'
          AND p.ceo_a_time BETWEEN '$stdate' AND '$endate'
        GROUP BY p.id, p.creditor_code, p.total_amount, p.status, p.ceo_a_time, p.ono, p.po_type
        ORDER BY p.ceo_a_time DESC, p.id DESC
    ";
    $res = mysqli_query($con, $sql) or die(mysqli_error($con));
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PO Type Wise PO Breakdown Report</title>

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
            vertical-align: top;
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

<h2>PO Type Wise PO Breakdown Report</h2>

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
                    <strong>PO Type:</strong><br>
                    <select name="po_type" id="po_type" required>
                        <option value="">Select PO Type</option>
                        <?php foreach ($po_types as $type) { ?>
                            <option value="<?php echo h($type); ?>" <?php echo ($po_type === $type) ? 'selected' : ''; ?>>
                                <?php echo h($type); ?>
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

<?php if ($po_type !== '') { ?>
<p>
    PO Type: <strong><?php echo h($po_type); ?></strong><br>
    Period: <strong><?php echo h($st_in); ?></strong> to <strong><?php echo h($en_in); ?></strong>
</p>

<table>
    <tr>
        <th width="5%">S.No</th>
        <th width="10%">PO No</th>
        <th width="22%">Item Name</th>
        <th width="15%">Approved Date</th>
        <th width="15%">PO Type</th>
        <th width="10%">Status</th>
        <th width="13%">Amount</th>
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
                <td align="center"><?php echo h($row['id'] ?? ''); ?></td>
                <td><?php echo h($row['item_names'] ?? ''); ?></td>
                <td align="center">
                    <?php echo !empty($row['ceo_a_time']) ? date('d M Y h:i A', strtotime($row['ceo_a_time'])) : ''; ?>
                </td>
                <td align="center"><?php echo h($row['po_type'] ?? ''); ?></td>
                <td align="center"><?php echo h($row['status'] ?? ''); ?></td>
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
            <td colspan="8" align="center" style="color:red; font-weight:bold;">
                No approved PO found for this PO type in selected date range.
            </td>
        </tr>
        <?php
    }
    ?>

    <tr class="total-row">
        <td colspan="6" align="right">Grand Total</td>
        <td align="right"><?php echo number_format($grand_total, 2); ?></td>
        <td></td>
    </tr>
</table>
<?php } ?>

<script>
$(document).ready(function () {
    $('#po_type').select2({
        placeholder: 'Search and select PO type',
        allowClear: true,
        width: '320px'
    });
});
</script>

</body>
</html>