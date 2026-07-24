<?php
session_start();
require('db1.php');

$role   = $_SESSION['sess_userrole'] ?? '';
$usernm = $_SESSION['sess_username'] ?? '';

function h($str) {
    return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8');
}

/* =========================
   ROLE CHECK
========================= */
$queryc  = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('mng','staff','store','doctor')";
$resultc = mysqli_query($con, $queryc) or die(mysqli_error($con));
$rowc    = mysqli_fetch_assoc($resultc);
$c1      = (int)($rowc['c'] ?? 0);

if ($usernm === '' || $c1 === 0) {
    header('Location: login2?err=2');
    exit;
}

/* =========================
   USER FULL NAME
========================= */
$usernm_esc = mysqli_real_escape_string($con, $usernm);
$query39    = "SELECT * FROM user WHERE uname='$usernm_esc' LIMIT 1";
$result39   = mysqli_query($con, $query39) or die(mysqli_error($con));
$row39      = mysqli_fetch_assoc($result39);
$full       = $row39['fullname'] ?? $usernm;

/* =========================
   INPUTS
========================= */
$today = date('Y-m-d');

$product_code = trim($_GET['product_code'] ?? '');
$product_name = trim($_GET['product_name'] ?? '');
$st_in        = trim($_GET['stdate'] ?? $today);
$en_in        = trim($_GET['endate'] ?? $today);

/* Safe fallback */
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $st_in)) {
    $st_in = $today;
}
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $en_in)) {
    $en_in = $today;
}

$stdate = $st_in . ' 00:00:00';
$endate = $en_in . ' 23:59:59';

$product_code_esc = mysqli_real_escape_string($con, $product_code);
$product_name_esc = mysqli_real_escape_string($con, $product_name);

/* =========================
   LOAD PRODUCT LIST
========================= */
$product_list = [];
$product_sql = "
    SELECT DISTINCT TRIM(name) AS name
    FROM po_table1
    WHERE name IS NOT NULL
      AND TRIM(name) <> ''
    ORDER BY TRIM(name) ASC
";
$product_res = mysqli_query($con, $product_sql) or die(mysqli_error($con));
while ($prow = mysqli_fetch_assoc($product_res)) {
    $product_list[] = $prow['name'];
}

/* =========================
   AUTO LOAD PRODUCT NAME FROM CODE
========================= */
if ($product_name === '' && $product_code !== '') {
    $pinfo_sql = "
        SELECT TRIM(name) AS product_name
        FROM po_table1
        WHERE code = '$product_code_esc'
          AND name IS NOT NULL
          AND TRIM(name) <> ''
        LIMIT 1
    ";
    $pinfo_res = mysqli_query($con, $pinfo_sql) or die(mysqli_error($con));
    if ($pinfo_row = mysqli_fetch_assoc($pinfo_res)) {
        $product_name = $pinfo_row['product_name'] ?? '';
        $product_name_esc = mysqli_real_escape_string($con, $product_name);
    }
}

/* =========================
   FILTER
========================= */
$filter_sql = "";
if ($product_code !== '') {
    $filter_sql .= " AND d.code = '$product_code_esc' ";
} elseif ($product_name !== '') {
    $filter_sql .= " AND TRIM(LOWER(d.name)) = TRIM(LOWER('$product_name_esc')) ";
}

/* =========================
   DETAILS REPORT
========================= */
$sql = "
    SELECT
        p.id AS po_id,
        p.ceo_a_time,
        TRIM(d.name) AS product_name,
        d.code AS product_code,
        COALESCE(d.o_qty, 0) AS ordered_qty,
        COALESCE(d.r_qty, 0) AS received_qty,
        COALESCE(d.tprice, 0) AS total_price,
        CASE
            WHEN COALESCE(d.o_qty, 0) > 0 THEN COALESCE(d.tprice, 0) / d.o_qty
            ELSE 0
        END AS unit_price,
        CASE
            WHEN COALESCE(d.o_qty, 0) > 0 THEN (COALESCE(d.tprice, 0) / d.o_qty) * COALESCE(d.r_qty, 0)
            ELSE 0
        END AS received_amount
    FROM po_table p
    INNER JOIN po_table1 d ON d.po_id = p.id
    WHERE TRIM(LOWER(p.status)) = 'approved'
      AND p.ceo_a_time IS NOT NULL
      AND p.ceo_a_time <> ''
      AND p.ceo_a_time BETWEEN '$stdate' AND '$endate'
      AND COALESCE(d.r_qty, 0) > 0
      $filter_sql
    ORDER BY p.ceo_a_time DESC, p.id DESC
";
$res = mysqli_query($con, $sql) or die(mysqli_error($con));

/* =========================
   GRAND TOTAL
========================= */
$total_sql = "
    SELECT
        SUM(COALESCE(d.o_qty, 0)) AS grand_ordered_qty,
        SUM(COALESCE(d.r_qty, 0)) AS grand_received_qty,
        SUM(
            CASE
                WHEN COALESCE(d.o_qty, 0) > 0 THEN (COALESCE(d.tprice, 0) / d.o_qty) * COALESCE(d.r_qty, 0)
                ELSE 0
            END
        ) AS grand_received_amount
    FROM po_table p
    INNER JOIN po_table1 d ON d.po_id = p.id
    WHERE TRIM(LOWER(p.status)) = 'approved'
      AND p.ceo_a_time IS NOT NULL
      AND p.ceo_a_time <> ''
      AND p.ceo_a_time BETWEEN '$stdate' AND '$endate'
      AND COALESCE(d.r_qty, 0) > 0
      $filter_sql
";
$total_res = mysqli_query($con, $total_sql) or die(mysqli_error($con));
$total_row = mysqli_fetch_assoc($total_res);

$grand_ordered_qty     = (float)($total_row['grand_ordered_qty'] ?? 0);
$grand_received_qty    = (float)($total_row['grand_received_qty'] ?? 0);
$grand_received_amount = (float)($total_row['grand_received_amount'] ?? 0);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Product GRN Details Report</title>

    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="styles.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        body{ font-family: Arial, sans-serif; }
        .style1{
            font-size: x-large;
            font-weight: bold;
            font-style: italic;
        }
        table{
            border-collapse: collapse;
            width: 100%;
        }
        th, td{
            padding: 8px;
            text-align: center;
            border: 1px solid #999;
        }
        th{ background: #f2f2f2; }

        .filter-box{
            background: #FFFF99;
            padding: 14px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
        }

        .filter-row{
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: flex-start;
        }

        .filter-row label{
            font-weight: bold;
            font-size: 16px;
            margin: 0;
        }

        .filter-row input[type="date"]{
            padding: 6px 8px;
            height: 40px;
            box-sizing: border-box;
            min-width: 160px;
        }

        .btn-search,
        .btn-reset{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 40px;
            padding: 0 18px;
            font-weight: bold;
            text-decoration: none;
            border: 1px solid #999;
            cursor: pointer;
            box-sizing: border-box;
            font-size: 16px;
            color: #000;
        }

        .btn-search{ background: #e6e6e6; }
        .btn-reset{ background: #ddd; }

        #product_name{
            width: 350px;
        }

        .select2-container{
            width: 350px !important;
            min-width: 350px !important;
            vertical-align: middle !important;
        }

        .select2-container--default .select2-selection--single{
            height: 40px !important;
            border: 1px solid #aaa !important;
            border-radius: 4px !important;
            display: flex !important;
            align-items: center !important;
            text-align: left !important;
            box-sizing: border-box !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered{
            line-height: 40px !important;
            padding-left: 10px !important;
            padding-right: 35px !important;
            text-align: left !important;
            width: 100% !important;
            box-sizing: border-box !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow{
            height: 40px !important;
            top: 0 !important;
            right: 6px !important;
        }

        .select2-dropdown,
        .select2-container--open{
            z-index: 99999 !important;
        }

        .text-left{
            text-align: left;
            padding-left: 10px;
        }

        @media (max-width:768px){
            .filter-row{
                flex-direction: column;
                align-items: flex-start;
            }
            #product_name,
            .select2-container{
                width: 100% !important;
                min-width: 100% !important;
            }
        }
    </style>
</head>
<body>

<div id="cssmenu">
    <ul>
        <li><a href="viewnew11"><span>Home</span></a></li>
        <li><a href="javascript:history.back()"><span>Back</span></a></li>
        <li><a href="logout"><span>Logout</span></a></li>
    </ul>
</div>

<p align="center" class="style1">
    Product-wise GRN Details Report - <?php echo h($full); ?>
</p>

<p align="right">
    Today: <?php echo date('d/m/Y'); ?>
</p>

<form action="" method="GET">
    <div class="filter-box">
        <div class="filter-row">
            <label for="stdate">From:</label>
            <input type="date" name="stdate" id="stdate" value="<?php echo h($st_in); ?>" required>

            <label for="endate">To:</label>
            <input type="date" name="endate" id="endate" value="<?php echo h($en_in); ?>" required>

            <label for="product_name">Product:</label>
            <select name="product_name" id="product_name">
                <option value="">All Products</option>
                <?php foreach ($product_list as $pname) { ?>
                    <option value="<?php echo h($pname); ?>" <?php echo (trim(strtolower($product_name)) === trim(strtolower($pname))) ? 'selected' : ''; ?>>
                        <?php echo h($pname); ?>
                    </option>
                <?php } ?>
            </select>

            <input type="hidden" name="product_code" value="">
            <input type="submit" value="Search" class="btn-search">
            <a href="<?php echo h($_SERVER['PHP_SELF']); ?>" class="btn-reset">Reset</a>
        </div>
    </div>
</form>

<p align="center" style="font-size:18px; font-weight:bold; color:#003366;">
    Product Name: <?php echo h($product_name); ?>
</p>

<p align="center" style="font-size:18px; font-weight:bold; color:blue;">
    Date Range: <?php echo h($st_in); ?> to <?php echo h($en_in); ?>
</p>

<p align="center" style="font-size:18px; font-weight:bold; color:green;">
    Grand Ordered Qty: <?php echo number_format($grand_ordered_qty, 2); ?>
    &nbsp;&nbsp; | &nbsp;&nbsp;
    Grand Received Qty: <?php echo number_format($grand_received_qty, 2); ?>
    &nbsp;&nbsp; | &nbsp;&nbsp;
    Grand Received Amount: <?php echo number_format($grand_received_amount, 2); ?>
</p>

<table bgcolor="#FFFF99">
    <tr>
        <th width="5%">S.No</th>
        <th width="12%">Date</th>
        <th width="10%">PO ID</th>
        <th width="26%">Product Name</th>
        <th width="10%">Product Code</th>
        <th width="10%">Ordered Qty</th>
        <th width="10%">Received Qty</th>
        <th width="10%">Balance Qty</th>
        <th width="7%">Rate</th>
        <th width="10%">Received Amount</th>
    </tr>

    <?php
    $count = 1;
    while ($row = mysqli_fetch_assoc($res)) {
        $po_id           = $row['po_id'] ?? '';
        $ceo_a_time      = $row['ceo_a_time'] ?? '';
        $product_name_r  = $row['product_name'] ?? '';
        $product_code_r  = $row['product_code'] ?? '';
        $ordered_qty     = (float)($row['ordered_qty'] ?? 0);
        $received_qty    = (float)($row['received_qty'] ?? 0);
        $unit_price      = (float)($row['unit_price'] ?? 0);
        $received_amount = (float)($row['received_amount'] ?? 0);
        $balance_qty     = $ordered_qty - $received_qty;

        $show_date = '';
        if (!empty($ceo_a_time) && $ceo_a_time !== '0000-00-00 00:00:00') {
            $show_date = date('d-m-Y', strtotime($ceo_a_time));
        }
    ?>
    <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo h($show_date); ?></td>
        <td><?php echo h($po_id); ?></td>
        <td class="text-left"><?php echo h($product_name_r); ?></td>
        <td><?php echo h($product_code_r); ?></td>
        <td><?php echo number_format($ordered_qty, 2); ?></td>
        <td><?php echo number_format($received_qty, 2); ?></td>
        <td><?php echo number_format($balance_qty, 2); ?></td>
        <td><?php echo number_format($unit_price, 2); ?></td>
        <td style="font-weight:bold;"><?php echo number_format($received_amount, 2); ?></td>
    </tr>
    <?php
        $count++;
    }

    if ($count === 1) {
        echo "<tr><td colspan='10' style='color:red; font-weight:bold;'>No details found.</td></tr>";
    }
    ?>

    <tr style="background:#f2f2f2; font-weight:bold;">
        <td colspan="5">Grand Total</td>
        <td><?php echo number_format($grand_ordered_qty, 2); ?></td>
        <td><?php echo number_format($grand_received_qty, 2); ?></td>
        <td>-</td>
        <td>-</td>
        <td><?php echo number_format($grand_received_amount, 2); ?></td>
    </tr>
</table>

<script>
$(document).ready(function(){
    $('#product_name').select2({
        placeholder: "Select product",
        allowClear: true,
        width: '350px'
    });
});
</script>

</body>
</html>