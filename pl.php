
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

//$from_date = $_GET['from_date'] ?? '2026-01-01';
//$to_date   = $_GET['to_date']   ?? '2026-01-31';

$from_date = $_REQUEST['from_date'];
$to_date   = $_REQUEST['to_date'];


/* =========================
   3. Profit & Loss SQL
   ========================= */

$sql = "
SELECT 
    t.acct_code,
    m.acct_name,
    m.acct_type,
    t.trans_type
    ABS(SUM(t.amount)) AS amount
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
   4. Display P&L
   ========================= */

$totalRevenue = 0;
$totalExpense = 0;

echo "<h3>Profit & Loss from $from_date to $to_date</h3>";

echo "<table border='1' cellpadding='6' cellspacing='0'>";
echo "<tr>
        <th>Account Name</th>
        <th>Account Code</th>
        <th>Type</th>
        <th align='right'>Amount</th>
      </tr>";

while ($row = mysqli_fetch_assoc($result)) {

    $amount = $row['amount'];

    if ($row['acct_type'] === 'R') {
        $totalRevenue += $amount;
    } else {
        $totalExpense += $amount;
    }

    echo "<tr>
            <td>{$row['acct_name']}</td>
            <td>{$row['acct_code']}</td>
            <td>{$row['acct_type']}</td>
            <td align='right'>" . number_format($amount, 2) . "</td>
          </tr>";
}

/* =========================
   5. Totals
   ========================= */

$netProfit = $totalRevenue - $totalExpense;

echo "<tr>
        <td><b>Total Revenue</b></td>
        <td></td>
        <td align='right'><b>" . number_format($totalRevenue, 2) . "</b></td>
      </tr>";

echo "<tr>
        <td><b>Total Expense</b></td>
        <td></td>
        <td align='right'><b>" . number_format($totalExpense, 2) . "</b></td>
      </tr>";

echo "<tr>
        <td><b>Net Profit</b></td>
        <td></td>
        <td align='right'><b>" . number_format($netProfit, 2) . "</b></td>
      </tr>";

echo "</table>";

mysqli_close($conn);
}
?>



