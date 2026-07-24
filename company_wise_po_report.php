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

function h($str)
{
    return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8');
}

$today = date('Y-m-d');

$st_in = $_GET['stdate'] ?? date('Y-01-01');
$en_in = $_GET['endate'] ?? $today;

$st_ts = strtotime($st_in);
$en_ts = strtotime($en_in);

$st_in = $st_ts ? date('Y-m-d', $st_ts) : date('Y-01-01');
$en_in = $en_ts ? date('Y-m-d', $en_ts) : $today;

$stdate = $st_in . ' 00:00:00';
$endate = $en_in . ' 23:59:59';

$sql = "
    SELECT
        COALESCE(NULLIF(TRIM(s.supplier_name), ''), TRIM(p.creditor_code)) AS company_name,

        SUM(CASE WHEN MONTH(p.ceo_a_time) = 1  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS jan,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 2  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS feb,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 3  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS mar,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 4  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS apr,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 5  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS may,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 6  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS jun,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 7  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS jul,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 8  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS aug,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 9  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS sep,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 10 THEN COALESCE(p.total_amount,0) ELSE 0 END) AS oct,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 11 THEN COALESCE(p.total_amount,0) ELSE 0 END) AS nov,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 12 THEN COALESCE(p.total_amount,0) ELSE 0 END) AS `dec`,
        SUM(COALESCE(p.total_amount,0)) AS grand_total

    FROM po_table p
    LEFT JOIN suppliers_master s
        ON TRIM(CAST(s.supplier_code AS CHAR)) COLLATE utf8mb4_unicode_ci
         = TRIM(CAST(p.creditor_code AS CHAR)) COLLATE utf8mb4_unicode_ci

    WHERE p.po_type = 'Pharmacy'
      AND p.status = 'Approved'
      AND p.ceo_a_time BETWEEN '$stdate' AND '$endate'

    GROUP BY COALESCE(NULLIF(TRIM(s.supplier_name), ''), TRIM(p.creditor_code))
    ORDER BY company_name ASC
";

$res = mysqli_query($con, $sql) or die(mysqli_error($con));

$totals = [
    'jan' => 0, 'feb' => 0, 'mar' => 0, 'apr' => 0,
    'may' => 0, 'jun' => 0, 'jul' => 0, 'aug' => 0,
    'sep' => 0, 'oct' => 0, 'nov' => 0, 'dec' => 0,
    'grand_total' => 0
];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pharmacy PO Monthly Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            margin: 20px;
        }
        h2, p {
            text-align: center;
        }
        .table-wrap {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            min-width: 1600px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            vertical-align: middle;
            white-space: nowrap;
        }
        th {
            background: #f2f2f2;
            text-align: center;
        }
        td.num {
            text-align: right;
        }
        td.center {
            text-align: center;
        }
        .total-row td {
            font-weight: bold;
            background: #fff3cd;
        }
        .filter-table {
            width: auto;
            margin: 0 auto;
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
        .btn {
            padding: 7px 14px;
            font-weight: bold;
            cursor: pointer;
            border: 1px solid #666;
            background: #e9ecef;
        }
        .btn-reset {
            text-decoration: none;
            border: 1px solid #999;
            background: #ddd;
            color: #000;
            padding: 7px 14px;
            display: inline-block;
        }
        .btn-pdf {
            text-decoration: none;
            border: 1px solid #0b5ed7;
            background: #0d6efd;
            color: #fff;
            padding: 7px 14px;
            display: inline-block;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Company Wise Approved PO Report (Pharmacy)</h2>

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

                <td style="vertical-align: bottom;">
                    <input type="submit" value="Search" class="btn">
                    <a href="<?php echo h(basename($_SERVER['PHP_SELF'])); ?>" class="btn-reset">Reset</a>
                    <a class="btn-pdf" target="_blank"
                       href="company_wise_po_report_pdf_pharmacy.php?stdate=<?php echo urlencode($st_in); ?>&endate=<?php echo urlencode($en_in); ?>">
                        Print / PDF
                    </a>
                </td>
            </tr>
        </table>
    </div>
</form>

<p>
    Period: <strong><?php echo h($st_in); ?></strong> to <strong><?php echo h($en_in); ?></strong>
</p>

<div class="table-wrap">
    <table>
        <tr>
            <th>S.No</th>
            <th>Company Name</th>
            <th>Jan</th>
            <th>Feb</th>
            <th>Mar</th>
            <th>Apr</th>
            <th>May</th>
            <th>Jun</th>
            <th>Jul</th>
            <th>Aug</th>
            <th>Sep</th>
            <th>Oct</th>
            <th>Nov</th>
            <th>Dec</th>
            <th>Grand Total</th>
        </tr>

        <?php
        $i = 1;

        if ($res && mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                foreach ($totals as $k => $v) {
                    $totals[$k] += (float)($row[$k] ?? 0);
                }
                ?>
                <tr>
                    <td class="center"><?php echo $i++; ?></td>
                    <td><?php echo h($row['company_name'] ?? ''); ?></td>
                    <td class="num"><?php echo number_format((float)$row['jan'], 2); ?></td>
                    <td class="num"><?php echo number_format((float)$row['feb'], 2); ?></td>
                    <td class="num"><?php echo number_format((float)$row['mar'], 2); ?></td>
                    <td class="num"><?php echo number_format((float)$row['apr'], 2); ?></td>
                    <td class="num"><?php echo number_format((float)$row['may'], 2); ?></td>
                    <td class="num"><?php echo number_format((float)$row['jun'], 2); ?></td>
                    <td class="num"><?php echo number_format((float)$row['jul'], 2); ?></td>
                    <td class="num"><?php echo number_format((float)$row['aug'], 2); ?></td>
                    <td class="num"><?php echo number_format((float)$row['sep'], 2); ?></td>
                    <td class="num"><?php echo number_format((float)$row['oct'], 2); ?></td>
                    <td class="num"><?php echo number_format((float)$row['nov'], 2); ?></td>
                    <td class="num"><?php echo number_format((float)$row['dec'], 2); ?></td>
                    <td class="num"><strong><?php echo number_format((float)$row['grand_total'], 2); ?></strong></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="15" align="center" style="color:red; font-weight:bold;">
                    No approved PO found in selected date range.
                </td>
            </tr>
            <?php
        }
        ?>

        <tr class="total-row">
            <td colspan="2" align="right">Grand Total</td>
            <td class="num"><?php echo number_format($totals['jan'], 2); ?></td>
            <td class="num"><?php echo number_format($totals['feb'], 2); ?></td>
            <td class="num"><?php echo number_format($totals['mar'], 2); ?></td>
            <td class="num"><?php echo number_format($totals['apr'], 2); ?></td>
            <td class="num"><?php echo number_format($totals['may'], 2); ?></td>
            <td class="num"><?php echo number_format($totals['jun'], 2); ?></td>
            <td class="num"><?php echo number_format($totals['jul'], 2); ?></td>
            <td class="num"><?php echo number_format($totals['aug'], 2); ?></td>
            <td class="num"><?php echo number_format($totals['sep'], 2); ?></td>
            <td class="num"><?php echo number_format($totals['oct'], 2); ?></td>
            <td class="num"><?php echo number_format($totals['nov'], 2); ?></td>
            <td class="num"><?php echo number_format($totals['dec'], 2); ?></td>
            <td class="num"><?php echo number_format($totals['grand_total'], 2); ?></td>
        </tr>
    </table>
</div>

</body>
</html>