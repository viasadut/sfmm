<form action="" method="post" name="invoice" id="invoice">
    From: <input type="date" name="from_date" required>
    To: <input type="date" name="to_date" required>
    <button type="submit" name="Submit">Show P&amp;L</button>
</form>

<?php
if(isset($_POST['Submit']))
{
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
       2. Date Range (INPUT)
       ========================= */
    $from_date = $_POST['from_date'];
    $to_date   = $_POST['to_date'];

    /* =========================
       3. P&L SQL
       - Revenue amount = CR - DR
       - Expense amount = DR - CR
       ========================= */
    $sql = "
    SELECT 
        t.acct_code,
        m.acct_name,
        m.acct_type,
        SUM(CASE WHEN UPPER(TRIM(t.trans_type)) = 'CR' THEN t.amount ELSE 0 END) AS total_cr,
        SUM(CASE WHEN UPPER(TRIM(t.trans_type)) = 'DR' THEN t.amount ELSE 0 END) AS total_dr
    FROM pms_tb t
    JOIN tb_master m ON t.acct_code = m.acct_code
    WHERE m.acct_type IN ('R','E')
      AND t.date BETWEEN '$from_date' AND '$to_date'
    GROUP BY t.acct_code, m.acct_name, m.acct_type
    ORDER BY m.acct_type, t.acct_code
    ";

    $result = mysqli_query($conn, $sql);
    if (!$result) die("Query failed: " . mysqli_error($conn));

    /* =========================
       4. Build arrays (Revenue + Expense)
       ========================= */
    $revenues = [];
    $expenses = [];

    $totalRevenue = 0;
    $totalExpense = 0;

    while ($row = mysqli_fetch_assoc($result)) {

        $dr = (float)$row['total_dr'];
        $cr = (float)$row['total_cr'];

        if ($row['acct_type'] === 'R') {
            $amount = $cr - $dr;                 // Revenue net
            if ($amount != 0) {
                $revenues[] = [$row['acct_name'], $row['acct_code'], $amount];
                $totalRevenue += $amount;
            }
        } else { // E
            $amount = $dr - $cr;                 // Expense net
            if ($amount != 0) {
                $expenses[] = [$row['acct_name'], $row['acct_code'], $amount];
                $totalExpense += $amount;
            }
        }
    }

    $netProfit = $totalRevenue - $totalExpense;

    /* =========================
       5. Display Proper P&L
       ========================= */
    echo "<h2 style='margin:10px 0;'>Profit &amp; Loss Statement</h2>";
    echo "<div style='margin-bottom:10px;'><b>Period:</b> $from_date to $to_date</div>";

    echo "<table border='1' cellpadding='8' cellspacing='0' width='800' style='border-collapse:collapse;'>";
    echo "<tr style='background:#f7f7f7;'>
            <th align='left'>Particulars</th>
            <th width='120'>Code</th>
            <th width='180' align='right'>Amount</th>
          </tr>";

    /* ---- Revenue Section ---- */
    echo "<tr style='background:#e9eef6;'><td colspan='3'><b>REVENUE</b></td></tr>";

    if (count($revenues) === 0) {
        echo "<tr><td colspan='3'>No revenue transactions in this period.</td></tr>";
    } else {
        foreach ($revenues as $r) {
            echo "<tr>
                    <td style='padding-left:20px;'>{$r[0]}</td>
                    <td align='center'>{$r[1]}</td>
                    <td align='right'>" . number_format($r[2], 2) . "</td>
                  </tr>";
        }
    }

    echo "<tr style='background:#f7f7f7;'>
            <td align='right' colspan='2'><b>Total Revenue</b></td>
            <td align='right'><b>" . number_format($totalRevenue, 2) . "</b></td>
          </tr>";

    /* ---- Expense Section ---- */
    echo "<tr style='background:#e9eef6;'><td colspan='3'><b>EXPENSES</b></td></tr>";

    if (count($expenses) === 0) {
        echo "<tr><td colspan='3'>No expense transactions in this period.</td></tr>";
    } else {
        foreach ($expenses as $e) {
            echo "<tr>
                    <td style='padding-left:20px;'>{$e[0]}</td>
                    <td align='center'>{$e[1]}</td>
                    <td align='right'>" . number_format($e[2], 2) . "</td>
                  </tr>";
        }
    }

    echo "<tr style='background:#f7f7f7;'>
            <td align='right' colspan='2'><b>Total Expenses</b></td>
            <td align='right'><b>" . number_format($totalExpense, 2) . "</b></td>
          </tr>";

    /* ---- Net Profit ---- */
    echo "<tr style='background:#dff0d8;'>
            <td align='right' colspan='2'><b>NET PROFIT</b></td>
            <td align='right'><b>" . number_format($netProfit, 2) . "</b></td>
          </tr>";

    echo "</table>";

    mysqli_close($conn);
}
?>
