<?php
session_start();
require('db1.php');

$role   = $_SESSION['sess_userrole'] ?? '';
$usernm = $_SESSION['sess_username'] ?? '';

/* =========================
   SMALL HELPER
========================= */
function h($str)
{
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
   DATE FILTER
========================= */
$today = date('Y-m-d');

$st_in = trim($_GET['stdate'] ?? $today);
$en_in = trim($_GET['endate'] ?? $today);
$search_product = trim($_GET['product_name'] ?? '');

/* Safe date fallback */
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $st_in)) {
    $st_in = $today;
}
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $en_in)) {
    $en_in = $today;
}

$stdate = $st_in . ' 00:00:00';
$endate = $en_in . ' 23:59:59';

/* =========================
   PRODUCT SEARCH FILTER
========================= */
$search_sql = '';
if ($search_product !== '') {
    $search_esc = mysqli_real_escape_string($con, $search_product);
    $search_sql = " AND TRIM(LOWER(d.name)) = TRIM(LOWER('$search_esc')) ";
}

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
   PRODUCT-WISE SUMMARY
   FIXES:
   1. status compare trimmed + lowercase
   2. product name trimmed before grouping
   3. MIN(code) used because same product may have multiple rows
========================= */
$sql = "
    SELECT 
        TRIM(d.name) AS product_name,
        MIN(d.code) AS product_code,
        SUM(COALESCE(d.o_qty, 0)) AS total_qty,
        SUM(COALESCE(d.tprice, 0)) AS total_amount
    FROM po_table p
    INNER JOIN po_table1 d ON d.po_id = p.id
    WHERE TRIM(LOWER(p.status)) = 'approved'
      AND p.ceo_a_time IS NOT NULL
      AND p.ceo_a_time <> ''
      AND p.ceo_a_time BETWEEN '$stdate' AND '$endate'
      AND p.po_type !='Pharmacy'
      $search_sql
    GROUP BY TRIM(d.name)
    ORDER BY total_amount DESC, TRIM(d.name) ASC
";

$res = mysqli_query($con, $sql) or die(mysqli_error($con));

/* =========================
   GRAND TOTAL
========================= */
$total_sql = "
    SELECT 
        SUM(COALESCE(d.o_qty, 0)) AS grand_qty,
        SUM(COALESCE(d.tprice, 0)) AS grand_amount
    FROM po_table p
    INNER JOIN po_table1 d ON d.po_id = p.id
    WHERE TRIM(LOWER(p.status)) = 'approved'
      AND p.ceo_a_time IS NOT NULL
      AND p.ceo_a_time <> ''
      AND p.ceo_a_time BETWEEN '$stdate' AND '$endate'
      $search_sql
";
$total_res = mysqli_query($con, $total_sql) or die(mysqli_error($con));
$total_row = mysqli_fetch_assoc($total_res);

$grand_qty    = (float)($total_row['grand_qty'] ?? 0);
$grand_amount = (float)($total_row['grand_amount'] ?? 0);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Product Wise PO Report</title>

    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="styles.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        body{
            font-family: Arial, sans-serif;
        }

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
        }

        th{
            background: #f2f2f2;
        }

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
        }

        .btn-search{
            background: #e6e6e6;
            color: #000;
        }

        .btn-reset{
            background: #ddd;
            color: #000;
        }

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

        .select2-container--default .select2-selection--single .select2-selection__placeholder{
            text-align: left !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow{
            height: 40px !important;
            top: 0 !important;
            right: 6px !important;
        }

        .select2-dropdown{
            z-index: 99999 !important;
        }

        .select2-container--open{
            z-index: 99999 !important;
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
    Date-wise Product Wise PO Report - <?php echo h($full); ?>
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
                    <option value="<?php echo h($pname); ?>" <?php echo (trim(strtolower($search_product)) === trim(strtolower($pname))) ? 'selected' : ''; ?>>
                        <?php echo h($pname); ?>
                    </option>
                <?php } ?>
            </select>

            <input type="submit" value="Search" class="btn-search">
            <a href="<?php echo h($_SERVER['PHP_SELF']); ?>" class="btn-reset">Reset</a>
        </div>
    </div>
</form>

<p align="center" style="font-size:20px; font-weight:bold; color:blue;">
    Date Range: <?php echo h($st_in); ?> to <?php echo h($en_in); ?>
</p>

<?php if ($search_product !== '') { ?>
<p align="center" style="font-size:18px; font-weight:bold; color:#444;">
    Selected Product: <?php echo h($search_product); ?>
</p>
<?php } ?>

<p align="center" style="font-size:20px; font-weight:bold; color:green;">
    Grand Total Qty: <?php echo number_format($grand_qty, 2); ?>
    &nbsp;&nbsp; | &nbsp;&nbsp;
    Grand Total Amount: <?php echo number_format($grand_amount, 2); ?>
</p>

<table border="1" bgcolor="#FFFF99">
    <tr>
        <th width="8%">S.No</th>
        <th width="52%">Product Name</th>
        <th width="20%">Total Qty</th>
        <th width="20%">Total Amount</th>
    </tr>

    <?php
    $count = 1;
    while ($row = mysqli_fetch_assoc($res)) {
        $product_name = $row['product_name'] ?? '';
        $product_code = $row['product_code'] ?? '';
        $total_qty    = (float)($row['total_qty'] ?? 0);
        $total_amount = (float)($row['total_amount'] ?? 0);
    ?>
    <tr>
        <td><?php echo $count; ?></td>
        <td align="left" style="padding-left:10px;">
        <a href="po_report_product.php?product_code=<?php echo urlencode($product_code); ?>&stdate=<?php echo urlencode($st_in); ?>&endate=<?php echo urlencode($en_in); ?>">
                <?php echo h($product_name); ?>
            </a>
        </td>
        <td><?php echo number_format($total_qty, 2); ?></td>
        <td style="font-weight:bold;"><?php echo number_format($total_amount, 2); ?></td>
    </tr>
    <?php
        $count++;
    }

    if ($count === 1) {
        echo "<tr><td colspan='4' style='color:red; font-weight:bold;'>No record found.</td></tr>";
    }
    ?>

    <tr style="background:#f2f2f2; font-weight:bold;">
        <td colspan="2">Grand Total</td>
        <td><?php echo number_format($grand_qty, 2); ?></td>
        <td><?php echo number_format($grand_amount, 2); ?></td>
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