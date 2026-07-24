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

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    /* =========================
       2. Date Range (INPUT)
       ========================= */
    $from_date = $_REQUEST['from_date'];
    $to_date   = $_REQUEST['to_date'];

    /* =========================
       3A. Account-wise P&L SQL (DR/CR separate)
       ========================= */
    $sql = "
    SELECT 
        t.acct_code,
        m.acct_name,
        m.acct_type,
        SUM(CASE WHEN UPPER(TRIM(t.trans_type)) = 'CR' THEN t.amount ELSE 0 END) AS total_cr,
        SUM(CASE WHEN UPPER(TRIM(t.trans_type)) = 'DR' THEN t.amount ELSE 0 END) AS total_dr
    FROM pms_tb t
    JOIN tb_master m 
        ON t.acct_code = m.acct_code
    WHERE m.acct_type IN ('R','E')
      AND t.date BETWEEN '$from_date' AND '$to_date'
    GROUP BY t.acct_code, m.acct_name, m.acct_type
    ORDER BY m.acct_type, t.acct_code
    ";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    /* =========================
       4A. Display Account-wise P&L
       ========================= */
    echo "<h3>Account-wise Profit & Loss from $from_date to $to_date</h3>";

    echo "<table border='1' cellpadding='6' cellspacing='0'>";
    echo "<tr>
            <th>Account Name</th>
            <th>Account Code</th>
            <th>Type</th>
            <th align='right'>Debit (DR)</th>
            <th align='right'>Credit (CR)</th>
          </tr>";

    $totalRevenue = 0;
    $totalExpense = 0;

    while ($row = mysqli_fetch_assoc($result)) {

        $dr = (float)$row['total_dr'];
        $cr = (float)$row['total_cr'];

        // P&L logic
        if ($row['acct_type'] === 'R') {
            $totalRevenue += ($cr - $dr);
        } else { // E
            $totalExpense += ($dr - $cr);
        }

        echo "<tr>
                <td>{$row['acct_name']}</td>
                <td>{$row['acct_code']}</td>
                <td>{$row['acct_type']}</td>
                <td align='right'>" . number_format($dr, 2) . "</td>
                <td align='right'>" . number_format($cr, 2) . "</td>
              </tr>";
    }

    $netProfit = $totalRevenue - $totalExpense;

    echo "<tr>
            <td><b>Total Revenue</b></td>
            <td></td><td></td>
            <td></td>
            <td align='right'><b>" . number_format($totalRevenue, 2) . "</b></td>
          </tr>";

    echo "<tr>
            <td><b>Total Expense</b></td>
            <td></td><td></td>
            <td align='right'><b>" . number_format($totalExpense, 2) . "</b></td>
            <td></td>
          </tr>";

    echo "<tr>
            <td><b>Net Profit</b></td>
            <td></td><td></td>
            <td colspan='2' align='right'><b>" . number_format($netProfit, 2) . "</b></td>
          </tr>";

    echo "</table>";

    /* =========================
       3B. Monthly P&L SQL (ONE statement)
       ========================= */
    $sqlMonthly = "
    SELECT
        DATE_FORMAT(t.date, '%Y-%m') AS month,

        SUM(
            CASE
                WHEN m.acct_type = 'R' AND UPPER(TRIM(t.trans_type)) = 'CR' THEN t.amount
                WHEN m.acct_type = 'R' AND UPPER(TRIM(t.trans_type)) = 'DR' THEN -t.amount
                ELSE 0
            END
        ) AS revenue,

        SUM(
            CASE
                WHEN m.acct_type = 'E' AND UPPER(TRIM(t.trans_type)) = 'DR' THEN t.amount
                WHEN m.acct_type = 'E' AND UPPER(TRIM(t.trans_type)) = 'CR' THEN -t.amount
                ELSE 0
            END
        ) AS expense,

        (
            SUM(
                CASE
                    WHEN m.acct_type = 'R' AND UPPER(TRIM(t.trans_type)) = 'CR' THEN t.amount
                    WHEN m.acct_type = 'R' AND UPPER(TRIM(t.trans_type)) = 'DR' THEN -t.amount
                    ELSE 0
                END
            )
            -
            SUM(
                CASE
                    WHEN m.acct_type = 'E' AND UPPER(TRIM(t.trans_type)) = 'DR' THEN t.amount
                    WHEN m.acct_type = 'E' AND UPPER(TRIM(t.trans_type)) = 'CR' THEN -t.amount
                    ELSE 0
                END
            )
        ) AS net_profit

    FROM pms_tb t
    JOIN tb_master m 
        ON t.acct_code = m.acct_code
    WHERE m.acct_type IN ('R','E')
      AND t.date BETWEEN '$from_date' AND '$to_date'
    GROUP BY DATE_FORMAT(t.date, '%Y-%m')
    ORDER BY month
    ";

    $resultMonthly = mysqli_query($conn, $sqlMonthly);
    if (!$resultMonthly) {
        die("Monthly query failed: " . mysqli_error($conn));
    }

    /* =========================
       4B. Display Monthly P&L
       ========================= */
/* =========================
   4. Display P&L (Grouped)
   ========================= */

   echo "<h3>Profit & Loss from $from_date to $to_date</h3>";

   echo "<table border='1' cellpadding='6' cellspacing='0' width='700'>";
   echo "<tr>
           <th align='left'>Account</th>
           <th>Code</th>
           <th align='right'>Debit (DR)</th>
           <th align='right'>Credit (CR)</th>
           <th align='right'>Net</th>
         </tr>";
   
   $totalRevenue = 0;
   $totalExpense = 0;
   
   $printedRevenueHeader = false;
   $printedExpenseHeader = false;
   
   /*
     IMPORTANT:
     Your SQL is ordered by acct_type then acct_code,
     so all R rows come first, then E rows.
   */
   
   while ($row = mysqli_fetch_assoc($result)) {
   
       $type = $row['acct_type'];
       $dr   = (float)$row['total_dr'];
       $cr   = (float)$row['total_cr'];
   
       // Revenue heading
       if ($type === 'R' && !$printedRevenueHeader) {
           echo "<tr><td colspan='5' style='background:#f2f2f2;'><b>Revenue</b></td></tr>";
           $printedRevenueHeader = true;
       }
   
       // When we hit first Expense row, print Revenue Total then Expense heading
       if ($type === 'E' && !$printedExpenseHeader) {
           // Revenue Total row (print once before expenses start)
           echo "<tr>
                   <td colspan='4' align='right'><b>Total Revenue</b></td>
                   <td align='right'><b>" . number_format($totalRevenue, 2) . "</b></td>
                 </tr>";
   
           echo "<tr><td colspan='5' style='background:#f2f2f2;'><b>Expenses</b></td></tr>";
           $printedExpenseHeader = true;
       }
   
       // Net per account
       if ($type === 'R') {
           $net = $cr - $dr;              // Revenue net
           $totalRevenue += $net;
       } else { // E
           $net = $dr - $cr;              // Expense net
           $totalExpense += $net;
       }
   
       echo "<tr>
               <td>{$row['acct_name']}</td>
               <td align='center'>{$row['acct_code']}</td>
               <td align='right'>" . number_format($dr, 2) . "</td>
               <td align='right'>" . number_format($cr, 2) . "</td>
               <td align='right'>" . number_format($net, 2) . "</td>
             </tr>";
   }
   
   /* =========================
      5. Final Totals
      ========================= */
   
   // If there were no Expense rows, we still need to print Total Revenue once
   if ($printedRevenueHeader && !$printedExpenseHeader) {
       echo "<tr>
               <td colspan='4' align='right'><b>Total Revenue</b></td>
               <td align='right'><b>" . number_format($totalRevenue, 2) . "</b></td>
             </tr>";
   }
   
   // Expense Total row
   echo "<tr>
           <td colspan='4' align='right'><b>Total Expenses</b></td>
           <td align='right'><b>" . number_format($totalExpense, 2) . "</b></td>
         </tr>";
   
   $netProfit = $totalRevenue - $totalExpense;
   
   echo "<tr>
           <td colspan='4' align='right'><b>Net Profit</b></td>
           <td align='right'><b>" . number_format($netProfit, 2) . "</b></td>
         </tr>";
   
   echo "</table>";
   
    mysqli_close($conn);
}
?>
