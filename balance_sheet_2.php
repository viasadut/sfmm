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

    // For proper BS, profit should usually be Year Start -> To Date
    $yearStart = date('Y-01-01', strtotime($to_date));

    /* =========================
       1) Balance Sheet Accounts
       Pull opening from tb_master + period DR/CR from pms_tb
       ========================= */
    $sqlBS = "
    SELECT 
        m.acct_code,
        m.acct_name,
        m.acct_type,
        COALESCE(m.opening_balance, 0) AS opening_balance,
        COALESCE(SUM(CASE WHEN UPPER(TRIM(t.trans_type))='DR' THEN t.amount ELSE 0 END), 0) AS period_dr,
        COALESCE(SUM(CASE WHEN UPPER(TRIM(t.trans_type))='CR' THEN t.amount ELSE 0 END), 0) AS period_cr
    FROM tb_master m
    LEFT JOIN pms_tb t
        ON t.acct_code = m.acct_code
       AND DATE(t.date) BETWEEN ? AND ?
    WHERE m.acct_type IN ('A','L','C','EQ')
    GROUP BY m.acct_code, m.acct_name, m.acct_type, m.opening_balance
    ORDER BY m.acct_type, m.acct_code
    ";

    $stmt = mysqli_prepare($conn, $sqlBS);
    mysqli_stmt_bind_param($stmt, "ss", $from_date, $to_date);
    mysqli_stmt_execute($stmt);
    $resultBS = mysqli_stmt_get_result($stmt);

    if (!$resultBS) die("Balance Sheet query failed: " . mysqli_error($conn));

    /* =========================
       2) Net Profit (Year Start -> To Date)
       ========================= */
    $sqlPL = "
    SELECT 
        COALESCE(SUM(
            CASE 
                WHEN m.acct_type='R' AND UPPER(TRIM(t.trans_type))='CR' THEN t.amount
                WHEN m.acct_type='R' AND UPPER(TRIM(t.trans_type))='DR' THEN -t.amount
                ELSE 0
            END
        ),0) AS revenue,
        COALESCE(SUM(
            CASE
                WHEN m.acct_type='E' AND UPPER(TRIM(t.trans_type))='DR' THEN t.amount
                WHEN m.acct_type='E' AND UPPER(TRIM(t.trans_type))='CR' THEN -t.amount
                ELSE 0
            END
        ),0) AS expense
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
       3) Build sections
       ========================= */
    $assets = [];
    $liabs  = [];
    $equity = [];

    $totalAssets = 0;
    $totalLiabs  = 0;
    $totalEquity = 0;

    while ($row = mysqli_fetch_assoc($resultBS)) {

        $type = $row['acct_type'];
        $opening = (float)$row['opening_balance'];
        $dr = (float)$row['period_dr'];
        $cr = (float)$row['period_cr'];

        // Calculate closing exactly like your sheet
        if ($type === 'A') {
            $closing = $opening + $dr - $cr;
            if (abs($closing) > 0.0001) {
                $assets[] = [$row['acct_name'], $row['acct_code'], $closing];
                $totalAssets += $closing;
            }
        } elseif ($type === 'L') {
            $closing = $opening + $cr - $dr;
            if (abs($closing) > 0.0001) {
                $liabs[] = [$row['acct_name'], $row['acct_code'], $closing];
                $totalLiabs += $closing;
            }
        } else { // C / EQ
            $closing = $opening + $cr - $dr;
            if (abs($closing) > 0.0001) {
                $equity[] = [$row['acct_name'], $row['acct_code'], $closing];
                $totalEquity += $closing;
            }
        }
    }

    // Add Profit/Loss into equity
    $profitLabel = ($netProfitYTD >= 0) ? "Net Profit (YTD)" : "Net Loss (YTD)";
    $equity[] = [$profitLabel, "", $netProfitYTD];
    $totalEquity += $netProfitYTD;

    $rightSide = $totalLiabs + $totalEquity;
    $difference = $totalAssets - $rightSide;

    /* =========================
       4) Display
       ========================= */
    echo "<h2 style='margin:10px 0;'>Balance Sheet</h2>";
    echo "<div style='margin-bottom:6px;'><b>As of:</b> $to_date</div>";
    echo "<div style='margin-bottom:12px;'><small><b>Note:</b> Profit included from <b>$yearStart</b> to <b>$to_date</b>.</small></div>";

    echo "<table border='1' cellpadding='8' cellspacing='0' width='900' style='border-collapse:collapse;'>";
    echo "<tr style='background:#f7f7f7;'>
            <th align='left'>Particulars</th>
            <th width='120'>Code</th>
            <th width='180' align='right'>Amount</th>
          </tr>";

    $printSection = function($title, $rows) {
        echo "<tr style='background:#e9eef6;'><td colspan='3'><b>$title</b></td></tr>";
        if (count($rows) === 0) {
            echo "<tr><td colspan='3'>No records.</td></tr>";
            return;
        }
        foreach ($rows as $r) {
            $note = ($r[2] < 0) ? " <span style='color:#b00020'>(Credit Balance)</span>" : "";
            echo "<tr>
                    <td style='padding-left:20px;'>{$r[0]}$note</td>
                    <td align='center'>{$r[1]}</td>
                    <td align='right'>" . number_format(abs($r[2]), 2) . "</td>
                  </tr>";
        }
    };

    // ASSETS
    $printSection("ASSETS", $assets);
    echo "<tr style='background:#f7f7f7;'>
            <td align='right' colspan='2'><b>Total Assets</b></td>
            <td align='right'><b>" . number_format(abs($totalAssets), 2) . "</b></td>
          </tr>";

    // LIABILITIES
    $printSection("LIABILITIES", $liabs);
    echo "<tr style='background:#f7f7f7;'>
            <td align='right' colspan='2'><b>Total Liabilities</b></td>
            <td align='right'><b>" . number_format(abs($totalLiabs), 2) . "</b></td>
          </tr>";

    // EQUITY
    $printSection("EQUITY", $equity);
    echo "<tr style='background:#f7f7f7;'>
            <td align='right' colspan='2'><b>Total Equity</b></td>
            <td align='right'><b>" . number_format(abs($totalEquity), 2) . "</b></td>
          </tr>";

    echo "<tr style='background:#dff0d8;'>
            <td align='right' colspan='2'><b>Total Liabilities + Equity</b></td>
            <td align='right'><b>" . number_format(abs($rightSide), 2) . "</b></td>
          </tr>";

    if (abs($difference) > 0.01) {
        echo "<tr style='background:#fff3cd;'>
                <td align='right' colspan='2'><b>Difference (Assets - (L+E))</b></td>
                <td align='right'><b>" . number_format($difference, 2) . "</b></td>
              </tr>";
        echo "<tr><td colspan='3'><small><b>Reason:</b> Capital/Retained earnings opening not present in Equity accounts, or account types missing in tb_master.</small></td></tr>";
    }

    echo "</table>";

    mysqli_close($conn);
}
?>
