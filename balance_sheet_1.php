<form action="" method="post" name="bs" id="bs">
    From: <input type="date" name="from_date" required>
    To: <input type="date" name="to_date" required>
    <button type="submit" name="Submit">Show Balance Sheet</button>
</form>

<?php
if (isset($_POST['Submit'])) {

    /* =========================
       1. Database Connection
       ========================= */
    $host = "localhost";
    $user = "root";
    $pass = "Godiloveu16";
    $db   = "sfmmkpjnew";

    $conn = mysqli_connect($host, $user, $pass, $db);
    if (!$conn) die("Database connection failed: " . mysqli_connect_error());

    /* =========================
       2. Date Range
       ========================= */
    $from_date = $_POST['from_date'];
    $to_date   = $_POST['to_date'];

    /* =========================
       3A) Balance Sheet Accounts (A, L, C/EQ)
       Rules:
       - Assets normal balance = DR - CR
       - Liabilities/Equity normal balance = CR - DR
       ========================= */
    $sqlBS = "
    SELECT 
        t.acct_code,
        m.acct_name,
        m.acct_type,
        SUM(CASE WHEN UPPER(TRIM(t.trans_type))='DR' THEN t.amount ELSE 0 END) AS total_dr,
        SUM(CASE WHEN UPPER(TRIM(t.trans_type))='CR' THEN t.amount ELSE 0 END) AS total_cr
    FROM pms_tb t
    JOIN tb_master m ON t.acct_code = m.acct_code
    WHERE m.acct_type IN ('A','L','C','EQ')
      AND DATE(t.date) <= ?
    GROUP BY t.acct_code, m.acct_name, m.acct_type
    ORDER BY m.acct_type, t.acct_code
    ";

    $stmt = mysqli_prepare($conn, $sqlBS);
    mysqli_stmt_bind_param($stmt, "s", $to_date);
    mysqli_stmt_execute($stmt);
    $resultBS = mysqli_stmt_get_result($stmt);

    if (!$resultBS) die("Balance Sheet query failed: " . mysqli_error($conn));

    /* =========================
       3B) Net Profit for period (R/E)
       Added into Equity so BS balances
       - Revenue = CR - DR
       - Expense = DR - CR
       ========================= */
    $sqlPL = "
    SELECT 
        SUM(
            CASE 
                WHEN m.acct_type='R' AND UPPER(TRIM(t.trans_type))='CR' THEN t.amount
                WHEN m.acct_type='R' AND UPPER(TRIM(t.trans_type))='DR' THEN -t.amount
                ELSE 0
            END
        ) AS revenue,
        SUM(
            CASE
                WHEN m.acct_type='E' AND UPPER(TRIM(t.trans_type))='DR' THEN t.amount
                WHEN m.acct_type='E' AND UPPER(TRIM(t.trans_type))='CR' THEN -t.amount
                ELSE 0
            END
        ) AS expense
    FROM pms_tb t
    JOIN tb_master m ON t.acct_code = m.acct_code
    WHERE m.acct_type IN ('R','E')
      AND DATE(t.date) BETWEEN ? AND ?
    ";

    $stmt2 = mysqli_prepare($conn, $sqlPL);
    mysqli_stmt_bind_param($stmt2, "ss", $from_date, $to_date);
    mysqli_stmt_execute($stmt2);
    $resultPL = mysqli_stmt_get_result($stmt2);

    $rev = 0; $exp = 0;
    if ($rowPL = mysqli_fetch_assoc($resultPL)) {
        $rev = (float)$rowPL['revenue'];
        $exp = (float)$rowPL['expense'];
    }
    $netProfit = $rev - $exp;

    /* =========================
       4) Build arrays
       ========================= */
    $assets = [];
    $liabs  = [];
    $equity = [];

    $totalAssets = 0;
    $totalLiabs  = 0;
    $totalEquity = 0;

    while ($row = mysqli_fetch_assoc($resultBS)) {
        $type = $row['acct_type'];
        $dr   = (float)$row['total_dr'];
        $cr   = (float)$row['total_cr'];

        if ($type === 'A') {
            $bal = $dr - $cr; // assets
            if (abs($bal) > 0.0001) {
                $assets[] = [$row['acct_name'], $row['acct_code'], $bal];
                $totalAssets += $bal;
            }
        } elseif ($type === 'L') {
            $bal = $cr - $dr; // liabilities
            if (abs($bal) > 0.0001) {
                $liabs[] = [$row['acct_name'], $row['acct_code'], $bal];
                $totalLiabs += $bal;
            }
        } else { // 'C' or 'EQ'
            $bal = $cr - $dr; // equity
            if (abs($bal) > 0.0001) {
                $equity[] = [$row['acct_name'], $row['acct_code'], $bal];
                $totalEquity += $bal;
            }
        }
    }

    // Add profit/loss into equity
    $equityLabel = ($netProfit >= 0) ? "Net Profit (Period)" : "Net Loss (Period)";
    $equity[] = [$equityLabel, "", $netProfit];
    $totalEquity += $netProfit;

    $rightSide = $totalLiabs + $totalEquity;
    $difference = $totalAssets - $rightSide;

    /* =========================
       5) Display Balance Sheet
       ========================= */
    echo "<h2 style='margin:10px 0;'>Balance Sheet</h2>";
    echo "<div style='margin-bottom:6px;'><b>As of:</b> $to_date</div>";
    echo "<div style='margin-bottom:12px;'><small>Profit/Loss included from <b>$from_date</b> to <b>$to_date</b> under Equity.</small></div>";

    echo "<table border='1' cellpadding='8' cellspacing='0' width='900' style='border-collapse:collapse;'>";
    echo "<tr style='background:#f7f7f7;'>
            <th align='left'>Particulars</th>
            <th width='120'>Code</th>
            <th width='180' align='right'>Amount</th>
          </tr>";

    // ASSETS
    echo "<tr style='background:#e9eef6;'><td colspan='3'><b>ASSETS</b></td></tr>";
    if (count($assets) === 0) echo "<tr><td colspan='3'>No asset balances.</td></tr>";
    foreach ($assets as $a) {
        echo "<tr>
                <td style='padding-left:20px;'>{$a[0]}</td>
                <td align='center'>{$a[1]}</td>
                <td align='right'>" . number_format($a[2], 2) . "</td>
              </tr>";
    }
    echo "<tr style='background:#f7f7f7;'>
            <td align='right' colspan='2'><b>Total Assets</b></td>
            <td align='right'><b>" . number_format($totalAssets, 2) . "</b></td>
          </tr>";

    // LIABILITIES
    echo "<tr style='background:#e9eef6;'><td colspan='3'><b>LIABILITIES</b></td></tr>";
    if (count($liabs) === 0) echo "<tr><td colspan='3'>No liability balances.</td></tr>";
    foreach ($liabs as $l) {
        echo "<tr>
                <td style='padding-left:20px;'>{$l[0]}</td>
                <td align='center'>{$l[1]}</td>
                <td align='right'>" . number_format($l[2], 2) . "</td>
              </tr>";
    }
    echo "<tr style='background:#f7f7f7;'>
            <td align='right' colspan='2'><b>Total Liabilities</b></td>
            <td align='right'><b>" . number_format($totalLiabs, 2) . "</b></td>
          </tr>";

    // EQUITY
    echo "<tr style='background:#e9eef6;'><td colspan='3'><b>EQUITY</b></td></tr>";
    if (count($equity) === 0) echo "<tr><td colspan='3'>No equity balances.</td></tr>";
    foreach ($equity as $e) {
        echo "<tr>
                <td style='padding-left:20px;'>{$e[0]}</td>
                <td align='center'>{$e[1]}</td>
                <td align='right'>" . number_format($e[2], 2) . "</td>
              </tr>";
    }
    echo "<tr style='background:#f7f7f7;'>
            <td align='right' colspan='2'><b>Total Equity</b></td>
            <td align='right'><b>" . number_format($totalEquity, 2) . "</b></td>
          </tr>";

    // TOTAL LIAB + EQUITY
    echo "<tr style='background:#dff0d8;'>
            <td align='right' colspan='2'><b>Total Liabilities + Equity</b></td>
            <td align='right'><b>" . number_format($rightSide, 2) . "</b></td>
          </tr>";

    // Difference check
    if (abs($difference) > 0.01) {
        echo "<tr style='background:#fff3cd;'>
                <td align='right' colspan='2'><b>Difference (Assets - (L+E))</b></td>
                <td align='right'><b>" . number_format($difference, 2) . "</b></td>
              </tr>";
        echo "<tr><td colspan='3'><small><b>Note:</b> Difference means opening balances / account types / date logic may be missing.</small></td></tr>";
    }

    echo "</table>";

    mysqli_close($conn);
}
?>
