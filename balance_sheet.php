<form action="" method="post" name="bs" id="bs">
    From: <input type="date" name="from_date" required>
    To: <input type="date" name="to_date" required>
    <button type="submit" name="Submit">Show Balance Sheet</button>
</form>

<?php
if (isset($_POST['Submit'])) {

    $host = "localhost";
    $user = "root";
    $pass = "Godiloveu16";
    $db   = "sfmmkpjnew";

    $conn = mysqli_connect($host, $user, $pass, $db);
    if (!$conn) die("Database connection failed: " . mysqli_connect_error());

    $from_date = $_POST['from_date'];
    $to_date   = $_POST['to_date'];

    // For Balance Sheet, retained earnings should be from YEAR START to TO DATE
    $yearStart = date('Y-01-01', strtotime($to_date));

    /* =========================
       1) BALANCE SHEET ACCOUNTS
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
       2) PROFIT (YEAR START → TO DATE)
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
    mysqli_stmt_bind_param($stmt2, "ss", $yearStart, $to_date);
    mysqli_stmt_execute($stmt2);
    $resultPL = mysqli_stmt_get_result($stmt2);

    $rev = 0; $exp = 0;
    if ($rowPL = mysqli_fetch_assoc($resultPL)) {
        $rev = (float)$rowPL['revenue'];
        $exp = (float)$rowPL['expense'];
    }
    $netProfitYTD = $rev - $exp;

    /* =========================
       3) Build arrays
       ========================= */
    $assets = [];
    $liabs  = [];
    $equity = [];

    $totalAssets = 0;
    $totalLiabs  = 0;
    $totalEquity = 0;

    function fmt($n) { return number_format($n, 2); }

    while ($row = mysqli_fetch_assoc($resultBS)) {

        $type = $row['acct_type'];
        $dr   = (float)$row['total_dr'];
        $cr   = (float)$row['total_cr'];

        if ($type === 'A') {
            $bal = $dr - $cr; // Asset normal
            if (abs($bal) > 0.0001) {
                $assets[] = [$row['acct_name'], $row['acct_code'], $bal];
                $totalAssets += $bal;
            }
        } elseif ($type === 'L') {
            $bal = $cr - $dr; // Liability normal
            if (abs($bal) > 0.0001) {
                $liabs[] = [$row['acct_name'], $row['acct_code'], $bal];
                $totalLiabs += $bal;
            }
        } else { // Equity
            $bal = $cr - $dr; // Equity normal
            if (abs($bal) > 0.0001) {
                $equity[] = [$row['acct_name'], $row['acct_code'], $bal];
                $totalEquity += $bal;
            }
        }
    }

    // Add retained earnings / profit for the year-to-date
    $profitLabel = ($netProfitYTD >= 0) ? "Retained Earnings / Net Profit (YTD)" : "Retained Earnings / Net Loss (YTD)";
    $equity[] = [$profitLabel, "", $netProfitYTD];
    $totalEquity += $netProfitYTD;

    $rightSide  = $totalLiabs + $totalEquity;
    $difference = $totalAssets - $rightSide;

    /* =========================
       4) Display Balance Sheet
       ========================= */
    echo "<h2 style='margin:10px 0;'>Balance Sheet</h2>";
    echo "<div style='margin-bottom:6px;'><b>As of:</b> $to_date</div>";
    echo "<div style='margin-bottom:12px;'><small><b>Note:</b> Retained earnings calculated from <b>$yearStart</b> to <b>$to_date</b>.</small></div>";

    echo "<table border='1' cellpadding='8' cellspacing='0' width='900' style='border-collapse:collapse;'>";
    echo "<tr style='background:#f7f7f7;'>
            <th align='left'>Particulars</th>
            <th width='120'>Code</th>
            <th width='180' align='right'>Amount</th>
          </tr>";

    // Helper to print section
    $printSection = function($title, $rows) {
        echo "<tr style='background:#e9eef6;'><td colspan='3'><b>$title</b></td></tr>";
        if (count($rows) === 0) {
            echo "<tr><td colspan='3'>No records.</td></tr>";
            return;
        }
        foreach ($rows as $r) {
            $name = $r[0];
            $code = $r[1];
            $amt  = $r[2];

            // show as positive but mark if negative
            $note = "";
            if ($amt < 0) $note = " <span style='color:#b00020'>(Credit Balance)</span>";

            echo "<tr>
                    <td style='padding-left:20px;'>$name$note</td>
                    <td align='center'>$code</td>
                    <td align='right'>" . fmt(abs($amt)) . "</td>
                  </tr>";
        }
    };

    $printSection("ASSETS", $assets);
    echo "<tr style='background:#f7f7f7;'>
            <td align='right' colspan='2'><b>Total Assets</b></td>
            <td align='right'><b>" . fmt(abs($totalAssets)) . "</b></td>
          </tr>";

    $printSection("LIABILITIES", $liabs);
    echo "<tr style='background:#f7f7f7;'>
            <td align='right' colspan='2'><b>Total Liabilities</b></td>
            <td align='right'><b>" . fmt(abs($totalLiabs)) . "</b></td>
          </tr>";

    $printSection("EQUITY", $equity);
    echo "<tr style='background:#f7f7f7;'>
            <td align='right' colspan='2'><b>Total Equity</b></td>
            <td align='right'><b>" . fmt(abs($totalEquity)) . "</b></td>
          </tr>";

    echo "<tr style='background:#dff0d8;'>
            <td align='right' colspan='2'><b>Total Liabilities + Equity</b></td>
            <td align='right'><b>" . fmt(abs($rightSide)) . "</b></td>
          </tr>";

    if (abs($difference) > 0.01) {
        echo "<tr style='background:#fff3cd;'>
                <td align='right' colspan='2'><b>Difference (Assets - (L+E))</b></td>
                <td align='right'><b>" . fmt($difference) . "</b></td>
              </tr>";
        echo "<tr><td colspan='3'><small><b>Reason:</b> Missing opening balances or equity/capital accounts not included in acct_type (C/EQ), or wrong account typing.</small></td></tr>";
    }

    echo "</table>";

    mysqli_close($conn);
}
?>
