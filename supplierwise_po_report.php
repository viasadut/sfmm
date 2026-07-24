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

$supplier_code = trim($_GET['supplier_code'] ?? '');
$st_in         = $_GET['stdate'] ?? $today;
$en_in         = $_GET['endate'] ?? $today;

$st_in = date('Y-m-d', strtotime($st_in));
$en_in = date('Y-m-d', strtotime($en_in));

$stdate = $st_in . ' 00:00:00';
$endate = $en_in . ' 23:59:59';

$supplier_code_esc = mysqli_real_escape_string($con, $supplier_code);

/* =========================
   SUPPLIER LIST FOR SELECT2
========================= */
$suppliers = [];
$sup_sql = "SELECT supplier_code, supplier_name FROM suppliers_master ORDER BY supplier_name ASC";
$sup_res = mysqli_query($con, $sup_sql) or die(mysqli_error($con));
while ($sup_row = mysqli_fetch_assoc($sup_res)) {
    $suppliers[] = $sup_row;
}

/* =========================
   SUPPLIER NAME
========================= */
$supplier_name = '';
if ($supplier_code !== '') {
    $sup_sql2 = "SELECT supplier_name FROM suppliers_master WHERE supplier_code='$supplier_code_esc' LIMIT 1";
    $sup_res2 = mysqli_query($con, $sup_sql2) or die(mysqli_error($con));
    if ($sup_row2 = mysqli_fetch_assoc($sup_res2)) {
        $supplier_name = $sup_row2['supplier_name'];
    }
}

/* =========================
   PO LIST
========================= */
$res = false;
$grand_total = 0;

if ($supplier_code !== '') {
    $sql = "
        SELECT id, creditor_code, total_amount, status, ceo_a_time,ono
        FROM po_table
        WHERE status='Approved'
          AND creditor_code='$supplier_code_esc'
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
<title>Supplier PO Breakdown Report</title>

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

<h2>Supplier Wise PO Breakdown Report</h2>

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
                <strong>Supplier Name:</strong><br>
                <select name="supplier_code" id="supplier_code" required>
                    <option value="">Select Supplier</option>
                    <?php foreach ($suppliers as $sup) { ?>
                        <option value="<?php echo htmlspecialchars($sup['supplier_code']); ?>" <?php echo ($supplier_code === $sup['supplier_code']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($sup['supplier_name']); ?>
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

<?php if ($supplier_code !== '') { ?>
<p>
    Supplier: <strong><?php echo htmlspecialchars($supplier_name); ?></strong><br>
    Period: <strong><?php echo htmlspecialchars($st_in); ?></strong> to <strong><?php echo htmlspecialchars($en_in); ?></strong>
</p>

<table>
    <tr>
        <th width="5%">S.No</th>
        <th width="15%">PO No</th>
        <th width="20%">Approved Date</th>
        <th width="15%">Status</th>
        <th width="15%">Amount</th>
        <th width="15%">Print</th>
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
                <td align="center"><?php echo htmlspecialchars($row['status'] ?? ''); ?></td>
                <td align="right"><?php echo number_format($amt, 2); ?></td>
                <td align="right" >
<a href="po_print_new?ono=<?php echo $row["ono"]; ?>">Print</a> 
</td>

            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="5" align="center" style="color:red; font-weight:bold;">
                No approved PO found for this supplier in selected date range.
            </td>
        </tr>
        <?php
    }
    ?>

    <tr class="total-row">
        <td colspan="4" align="right">Grand Total</td>
        <td align="right"><?php echo number_format($grand_total, 2); ?></td>
        <td colspan="4" align="right"></td>
    </tr>
</table>
<?php } ?>

<script>
$(document).ready(function () {
    $('#supplier_code').select2({
        placeholder: 'Search and select supplier',
        allowClear: true,
        width: '320px'
    });
});
</script>

</body>
</html>