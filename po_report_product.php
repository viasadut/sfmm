<?php
session_start();
require('db1.php');

$role   = $_SESSION['sess_userrole'] ?? '';
$usernm = $_SESSION['sess_username'] ?? '';

/* =========================
   ROLE CHECK
========================= */
$queryc  = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('mng','staff','store','doctor')";
$resultc = mysqli_query($con, $queryc) or die(mysqli_error($con));
$rowc    = mysqli_fetch_assoc($resultc);
$c1      = (int)($rowc['c'] ?? 0);

if ($usernm === '' || $c1 == 0) {
    header('Location: login2?err=2');
    exit;
}

/* =========================
   USER FULL NAME
========================= */
$query39  = "SELECT * FROM user WHERE uname='" . mysqli_real_escape_string($con, $usernm) . "' LIMIT 1";
$result39 = mysqli_query($con, $query39) or die(mysqli_error($con));
$row39    = mysqli_fetch_assoc($result39);
$full     = $row39['fullname'] ?? $usernm;

/* =========================
   GET FILTERS
========================= */
$today = date('Y-m-d');

$product_code = trim($_GET['product_code'] ?? '');
$st_in        = $_GET['stdate'] ?? $today;
$en_in        = $_GET['endate'] ?? $today;

$st_in = date('Y-m-d', strtotime($st_in));
$en_in = date('Y-m-d', strtotime($en_in));

$stdate = $st_in . ' 00:00:00';
$endate = $en_in . ' 23:59:59';

if ($product_code === '') {
    die("Product code missing.");
}

$product_code_esc = mysqli_real_escape_string($con, $product_code);

/* =========================
   PRODUCT NAME
========================= */
$product_name = $product_code;
$product_sql = "
    SELECT name
    FROM po_table1
    WHERE code = '$product_code_esc'
    LIMIT 1
";
$product_res = mysqli_query($con, $product_sql) or die(mysqli_error($con));
if ($product_row = mysqli_fetch_assoc($product_res)) {
    $product_name = $product_row['name'] ?? $product_code;
}

/* =========================
   DETAIL QUERY
========================= */
$sql = "
    SELECT
        p.id,
        
        p.ceo_a_time,
        p.creditor_code,
        p.status,
        d.code,
        d.name,
        d.o_qty,
        d.uprice,
        d.tprice
    FROM po_table p
    INNER JOIN po_table1 d ON d.po_id = p.id
    WHERE p.status = 'Approved'
      AND d.code = '$product_code_esc'
      AND p.ceo_a_time BETWEEN '$stdate' AND '$endate'
    ORDER BY p.ceo_a_time DESC, p.id DESC
";
$res = mysqli_query($con, $sql) or die(mysqli_error($con));

/* =========================
   TOTALS
========================= */
$total_sql = "
    SELECT
        COALESCE(SUM(d.o_qty), 0)   AS total_qty,
        COALESCE(SUM(d.tprice), 0)  AS total_amount
    FROM po_table p
    INNER JOIN po_table1 d ON d.po_id = p.id
    WHERE p.status = 'Approved'
      AND d.code = '$product_code_esc'
      AND p.ceo_a_time BETWEEN '$stdate' AND '$endate'
";
$total_res = mysqli_query($con, $total_sql) or die(mysqli_error($con));
$total_row = mysqli_fetch_assoc($total_res);

$total_qty    = (float)($total_row['total_qty'] ?? 0);
$total_amount = (float)($total_row['total_amount'] ?? 0);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Product Wise PO Details</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body{
            font-family: Arial, sans-serif;
        }
        .style1{
            font-size:x-large;
            font-weight:bold;
            font-style:italic;
        }
        table{
            border-collapse:collapse;
            width:100%;
        }
        th, td{
            padding:8px;
            text-align:center;
            border:1px solid #999;
        }
        th{
            background:#f2f2f2;
        }
        .top-box{
            background:#FFFF99;
            padding:12px;
            margin-bottom:12px;
            border:1px solid #ccc;
        }
        .btn-back{
            display:inline-block;
            padding:7px 14px;
            font-weight:bold;
            text-decoration:none;
            border:1px solid #999;
            background:#ddd;
            color:#000;
        }
    </style>
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a href='viewnew11'><span>Home</span></a></li>
   <li><a href='javascript:history.back()'><span>Back</span></a></li>
   <li><a href='logout'><span>Logout</span></a></li>
</ul>
</div>

<p align="center" class="style1">
    Product Wise PO Detail Report - <?php echo htmlspecialchars($full); ?>
</p>

<div class="top-box">
    <p align="center" style="font-size:22px; font-weight:bold; color:blue; margin:6px 0;">
        Product: <?php echo htmlspecialchars($product_name); ?>
    </p>

    <p align="center" style="font-size:18px; font-weight:bold; margin:6px 0;">
        Product Code: <?php echo htmlspecialchars($product_code); ?>
    </p>

    <p align="center" style="font-size:18px; font-weight:bold; color:#444; margin:6px 0;">
        Date Range: <?php echo htmlspecialchars($st_in); ?> to <?php echo htmlspecialchars($en_in); ?>
    </p>

    <p align="center" style="font-size:20px; font-weight:bold; color:green; margin:6px 0;">
        Total Qty: <?php echo number_format($total_qty, 2); ?>
        &nbsp;&nbsp; | &nbsp;&nbsp;
        Total Amount: <?php echo number_format($total_amount, 2); ?>
    </p>

    <p align="center" style="margin-top:10px;">
        <a class="btn-back" href="javascript:history.back()">Back</a>
    </p>
</div>

<table bgcolor="#FFFF99">
    <tr>
        <th width="5%">S.No</th>
        <th width="10%">PO No</th>
        <th width="16%">Approved Time</th>
        <th width="10%">Supplier Code</th>
        <th width="12%">Product Code</th>
        <th width="22%">Product Name</th>
        <th width="8%">Qty</th>
        <th width="8%">Rate</th>
        <th width="9%">Amount</th>
    </tr>

    <?php
    $count = 1;
    while ($row = mysqli_fetch_assoc($res)) {
        $po_no         = $row['po_no'] ?? ($row['id'] ?? '');
        $approved_time = $row['ceo_a_time'] ?? '';
        $supplier_code = $row['creditor_code'] ?? '';
        $code          = $row['code'] ?? '';
        $name          = $row['name'] ?? '';
        $qty           = (float)($row['o_qty'] ?? 0);
        $rate          = (float)($row['rate'] ?? 0);
        $amount        = (float)($row['tprice'] ?? 0);
    ?>
    <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo htmlspecialchars($po_no); ?></td>
        <td><?php echo htmlspecialchars($approved_time); ?></td>
        <td><?php echo htmlspecialchars($supplier_code); ?></td>
        <td><?php echo htmlspecialchars($code); ?></td>
        <td align="left" style="padding-left:10px;"><?php echo htmlspecialchars($name); ?></td>
        <td><?php echo number_format($qty, 2); ?></td>
        <td><?php echo number_format($rate, 2); ?></td>
        <td style="font-weight:bold;"><?php echo number_format($amount, 2); ?></td>
        <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
<a href="po_print_new3?ono=<?php echo $po_no; ?>">Print</a> 
</td>
    </tr>
    <?php
        $count++;
    }

    if ($count == 1) {
        echo "<tr><td colspan='9' style='color:red; font-weight:bold;'>No record found.</td></tr>";
    }
    ?>

    <tr style="background:#f2f2f2; font-weight:bold;">
        <td colspan="6">Grand Total</td>
        <td><?php echo number_format($total_qty, 2); ?></td>
        <td></td>
        <td><?php echo number_format($total_amount, 2); ?></td>
    </tr>
</table>

</body>
</html>