<?php
include_once 'dbconfig.php';

session_start();
require('db1.php'); // must provide $con (mysqli)

/* ===========================
   ERROR REPORTING (optional)
=========================== */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* ===========================
   ROLE CHECK (KEEP SAME LOGIC)
=========================== */
$role   = $_SESSION['sess_userrole'] ?? '';
$queryc = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('bill','billin')";
$resultc = mysqli_query($con, $queryc) or die(mysqli_error($con));
$rowc    = mysqli_fetch_assoc($resultc);
$c1      = (int)($rowc['c'] ?? 0);

if (!isset($_SESSION['sess_username']) || $c1 == 0) {
    header('Location: login2?err=2');
    exit;
}

$user = $_SESSION['sess_username'] ?? '';
$pmrn = $_REQUEST['pmrn'] ?? '';
$eid  = $_REQUEST['eid'] ?? '';

if ($pmrn === '' || $eid === '') {
    die("Missing pmrn or eid");
}

/* ===========================
   EXACT DB CODE (KEEP SAME)
=========================== */
$db = mysqli_connect('localhost', 'root', 'Godiloveu16');
if (!$db) die("Unable to connect to MySQL");
mysqli_select_db($db, 'sfmmkpjnew') or die("Could not select db");

/* ===========================
   LOAD SUMMARY (TOTAL COUNT & TOTAL AMOUNT)
=========================== */
$qCount = mysqli_query($db, "SELECT COUNT(id) AS c
                             FROM iinves
                             WHERE pmrn='$pmrn' AND eid='$eid'
                               AND rstatus='RECEIVED'
                               AND type IN('LAB','Lab','lab','RAD','Rad','rad')");
$rCount = mysqli_fetch_assoc($qCount);
$inves_num = (int)($rCount['c'] ?? 0);

$qSum = mysqli_query($db, "SELECT SUM(price) AS s
                           FROM iinves
                           WHERE pmrn='$pmrn' AND eid='$eid'
                             AND rstatus='RECEIVED'
                             AND type IN('LAB','Lab','lab','RAD','Rad','rad')");
$rSum = mysqli_fetch_assoc($qSum);
$sum_bill = (float)($rSum['s'] ?? 0);

/* ===========================
   FULL NAME
=========================== */
$fullname = $_SESSION['sess_username'] ?? '';
$query39  = "SELECT * FROM user WHERE uname='$fullname' LIMIT 1";
$result39 = mysqli_query($con, $query39) or die(mysqli_error($con));
$row39    = mysqli_fetch_assoc($result39);
$full     = $row39['fullname'] ?? '';

/* ==========================================================
   UPDATE DISCOUNT (TRANSACTION + ROLLBACK)
   Rules:
   - must select at least one row
   - discount cannot be more than charge (per row and total)
   - if any query fails => rollback everything
========================================================== */
if (isset($_POST['but_update'])) {

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        if (empty($_POST['update']) || !is_array($_POST['update'])) {
            throw new Exception("Unsuccessful !!! No Row Selected!!");
        }

        $discount_type = $_POST['discount_type'] ?? 'taka';
        $taka1         = (float)($_POST['taka'] ?? 0);
        $percentage1   = (float)($_POST['percentage'] ?? 0);

        // Clean
        if ($discount_type === 'percentage') {
            if ($percentage1 <= 0) throw new Exception("Please enter percentage.");
            if ($percentage1 > 100) throw new Exception("Percentage cannot be more than 100.");
        } else {
            if ($taka1 <= 0) throw new Exception("Please enter discount in taka.");
        }

        // Start transaction on SAME $db connection
        $db->begin_transaction();

        // Build selected IDs and compute selectedTotalCharge from DB (server-side, trusted)
        $ids = array_map('intval', $_POST['update']);
        $ids = array_values(array_filter($ids, fn($v) => $v > 0));
        if (count($ids) === 0) throw new Exception("No valid rows selected.");

        $idList = implode(',', $ids);

        $qSelSum = mysqli_query($db, "SELECT SUM(price) AS s
                                      FROM iinves
                                      WHERE id IN($idList)
                                        AND pmrn='$pmrn' AND eid='$eid'
                                        AND rstatus='RECEIVED'
                                        AND type IN('LAB','Lab','lab','RAD','Rad','rad')");
        $rSelSum = mysqli_fetch_assoc($qSelSum);
        $selectedTotalCharge = (float)($rSelSum['s'] ?? 0);

        if ($selectedTotalCharge <= 0) {
            throw new Exception("Selected charge total is 0. Nothing to discount.");
        }

        // Compute discount distribution
        $selectedCount = count($ids);
        $perItemTaka = ($discount_type === 'taka') ? ($taka1 / $selectedCount) : 0;

        // Total discount for accounting + inpatient
        $totalDiscount = 0;

        foreach ($ids as $updateid) {
            $updateid = (int)$updateid;

            $qRow = mysqli_query($db, "SELECT id, price
                                      FROM iinves
                                      WHERE id='$updateid'
                                        AND pmrn='$pmrn' AND eid='$eid'
                                        AND rstatus='RECEIVED'
                                        AND type IN('LAB','Lab','lab','RAD','Rad','rad')
                                      LIMIT 1");
            $row = mysqli_fetch_assoc($qRow);
            if (!$row) {
                throw new Exception("Invalid row id: $updateid");
            }

            $charge = (float)($row['price'] ?? 0);

            if ($charge <= 0) {
                throw new Exception("Charge is invalid for row id: $updateid");
            }

            if ($discount_type === 'percentage') {
                $disco = $charge * ($percentage1 / 100);
                $o_dis = $percentage1;
            } else {
                $disco = $perItemTaka;
                $o_dis = $taka1;
            }

            // ✅ RULE: discount cannot exceed that row charge
            if ($disco > $charge) {
                throw new Exception("Discount exceeds charge for row id $updateid (Charge=$charge, Discount=$disco).");
            }

            $dprice = $charge - $disco;

            // Update row
            $sqlUpdate = "UPDATE iinves
                          SET dprice='$dprice',
                              discount='$disco',
                              discount_type='$discount_type',
                              o_dis='$o_dis'
                          WHERE id='$updateid'";
            mysqli_query($db, $sqlUpdate);

            $totalDiscount += $disco;
        }

        // ✅ RULE: total discount cannot exceed selected total charge
        if ($totalDiscount > $selectedTotalCharge) {
            throw new Exception("Total discount cannot be more than selected total charge.");
        }

        // Update inpatient lab_dis
        $sqlInpatient = "UPDATE inpatient
                         SET lab_dis='$totalDiscount'
                         WHERE pmrn='$pmrn' AND eid='$eid'";
        mysqli_query($db, $sqlInpatient);

        // Insert TB DR/CR (same $db connection to rollback)
        $date = date('Y-m-d');

        $sqlTB1 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                   VALUES ('$pmrn','DR','211170','$date','$totalDiscount','IPD_LAB_DISCOUNT')";
        mysqli_query($db, $sqlTB1);

        $sqlTB2 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                   VALUES ('$pmrn','CR','111999','$date','$totalDiscount','IPD_LAB_DISCOUNT')";
        mysqli_query($db, $sqlTB2);

        // Commit
        $db->commit();

        $url = "ipall_new_1_new_0_new1?pmrn=$pmrn&eid=$eid";
        header("Location: $url");
        exit;

    } catch (Throwable $e) {
        if (isset($db) && $db) {
            try { $db->rollback(); } catch (Throwable $x) {}
        }
        echo "<script>alert('Transaction Failed! Rolled Back. Error: " . addslashes($e->getMessage()) . "');</script>";
    }
}

/* ===========================
   LOAD LIST (UI TABLE)
=========================== */
$sel_query = "SELECT *
              FROM iinves
              WHERE pmrn='$pmrn' AND eid='$eid'
                AND rstatus='RECEIVED'
                AND type IN('LAB','Lab','lab','RAD','Rad','rad')
              ORDER BY id DESC";
$result = mysqli_query($db, $sel_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LAB Discount</title>

  <link rel="stylesheet" href="jsnew/normalize.min.css">
  <link rel="stylesheet" href="jsnew/jquery-ui.css">
  <script src="jsnew/jquery.min.js"></script>
  <script src="jsnew/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="styles.css">

  <style>
    body { font-family: Arial, sans-serif; background:#A085C6; }
    form { max-width: 1200px; margin: 10px auto; padding: 12px 16px; background:#f4f7f8; border-radius: 8px; border: 1px solid #8265B0; }
    h1 { text-align:center; margin: 10px 0 16px; }
    table { width:100%; border-collapse: collapse; background: #fff; }
    th, td { border:1px solid #ccc; padding:8px; font-size: 14px; }
    th { background: #e9ecef; }
    input[type="text"], input[type="number"], select { padding: 8px; width: 100%; box-sizing: border-box; }
    .topgrid { display:grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 10px; }
    .previewgrid { display:grid; grid-template-columns: repeat(5, 1fr); gap: 10px; margin: 12px 0; }
    .previewgrid input { font-weight: bold; }
    .btn { padding: 12px; background:#A085C6; color:#fff; border:1px solid #8265B0; border-radius:6px; cursor:pointer; }
    .btn:disabled { opacity:0.6; cursor:not-allowed; }
    .warn { background:#fff3cd; }
    .ok { background:#d4edda; }
    .readonly { background:#e8eeef; }
  </style>
</head>

<body>
<div id='cssmenu'>
<ul>
   <li><a href='viewnew1'><span>Home</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<form method="post" action="">
  <h1>Investigation Charge Discount Panel</h1>

  <div class="topgrid">
    <div>
      <label><strong>MRN , Episode</strong></label>
      <input class="readonly" type="text" value="<?php echo htmlspecialchars($pmrn . ', ' . $eid); ?>" readonly>
    </div>
    <div>
      <label><strong>Charge Type</strong></label>
      <input class="readonly" type="text" value="LAB DISCOUNT" readonly>
    </div>
  </div>

  <div class="topgrid">
    <div>
      <label><strong>Total Investigation Amount (All RECEIVED)</strong></label>
      <input class="readonly" type="text" value="<?php echo number_format($sum_bill, 2); ?>" readonly style="color:blue;">
    </div>
    <div>
      <label><strong>Total Received Investigations</strong></label>
      <input class="readonly" type="text" value="<?php echo (int)$inves_num; ?>" readonly style="color:green;">
    </div>
  </div>

  <!-- Discount controls -->
  <div class="topgrid">
    <div>
      <label><strong>Discount Type</strong></label>
      <select name="discount_type" id="discount_type">
        <option value="taka">Discount In Taka</option>
        <option value="percentage">Discount In Percentage</option>
      </select>
    </div>

    <div>
      <label><strong>Discount Value</strong></label>
      <input type="number" name="taka" id="taka" placeholder="Discount In Taka" min="0" step="0.01">
      <input type="number" name="percentage" id="percentage" placeholder="Discount In Percentage" min="0" max="100" step="0.01" style="display:none;">
    </div>
  </div>

  <!-- Live preview -->
  <div class="previewgrid">
    <div>
      <label><strong>Selected Items</strong></label>
      <input class="readonly" type="text" id="selectedCount" value="0" readonly>
    </div>
    <div>
      <label><strong>Selected Total Amount</strong></label>
      <input class="readonly" type="text" id="selectedTotalAmount" value="0.00" readonly>
    </div>
    <div>
      <label><strong>Discount Per Item (Preview)</strong></label>
      <input class="readonly" type="text" id="discountPerItemPreview" value="0.00" readonly>
    </div>
    <div>
      <label><strong>Total Discount (Preview)</strong></label>
      <input class="readonly" type="text" id="totalDiscountPreview" value="0.00" readonly>
    </div>
    <div>
      <label><strong>Status</strong></label>
      <input class="readonly warn" type="text" id="warnMsg" value="" readonly>
    </div>
  </div>

  <table>
    <tr>
      <th style="width:60px;">S.No</th>
      <th style="width:120px;">MRN</th>
      <th>Order By</th>
      <th style="width:110px;">Date</th>
      <th style="width:90px;">Time</th>
      <th style="width:90px;">Inves</th>
      
      <th style="width:120px;">Charge</th>
      <th style="width:80px;"><input type="checkbox" id="checkAll"></th>
    </tr>

    <?php
    $count=1;
    while($row = mysqli_fetch_assoc($result)) {
        $id = (int)($row['id'] ?? 0);
        $charge = (float)($row['price'] ?? 0);
    ?>
      <tr>
        <td align="center"><?php echo $count; ?></td>
        <td align="center"><?php echo htmlspecialchars($row["pmrn"] ?? ''); ?></td>
        <td><?php echo htmlspecialchars($row["user"] ?? ''); ?></td>
        <td align="center"><?php echo htmlspecialchars($row["odate"] ?? ''); ?></td>
        <td align="center"><?php echo htmlspecialchars($row["otime"] ?? ''); ?></td>
        <td align="center"><?php echo htmlspecialchars($row["infusion"] ?? ''); ?></td>
      
        <td align="center">
          <input class="readonly chargeInput" type="text" value="<?php echo number_format($charge,2); ?>" readonly>
        </td>
        <td align="center">
          <input type="checkbox"
                 class="rowCheck"
                 name="update[]"
                 value="<?php echo $id; ?>"
                 data-charge="<?php echo htmlspecialchars($charge); ?>">
        </td>
      </tr>
    <?php
      $count++;
    }
    ?>

  </table>

  <input type="hidden" name="pmrn" value="<?php echo htmlspecialchars($pmrn); ?>">
  <input type="hidden" name="eid" value="<?php echo htmlspecialchars($eid); ?>">

  <br>
  <button class="btn" type="submit" name="but_update" id="confirmBtn">Confirm</button>
</form>

<script>
function toNum(v){
  v = (v ?? '').toString().replace(/,/g,'').trim();
  var n = parseFloat(v);
  return isNaN(n) ? 0 : n;
}
function money(n){
  return (Math.round((n + Number.EPSILON) * 100) / 100).toFixed(2);
}

function syncInputs(){
  var type = document.getElementById('discount_type').value;
  var taka = document.getElementById('taka');
  var perc = document.getElementById('percentage');

  if(type === "percentage"){
    taka.style.display = "none";
    taka.disabled = true;
    perc.style.display = "block";
    perc.disabled = false;
  } else {
    perc.style.display = "none";
    perc.disabled = true;
    taka.style.display = "block";
    taka.disabled = false;
  }
}

function calcPreview(){
  var type = document.getElementById('discount_type').value;
  var takaVal = toNum(document.getElementById('taka').value);
  var percVal = toNum(document.getElementById('percentage').value);

  var selected = Array.from(document.querySelectorAll('.rowCheck:checked'));
  var count = selected.length;

  document.getElementById('selectedCount').value = count;

  if(count === 0){
    document.getElementById('selectedTotalAmount').value = "0.00";
    document.getElementById('discountPerItemPreview').value = "0.00";
    document.getElementById('totalDiscountPreview').value = "0.00";
    document.getElementById('warnMsg').value = "Select at least 1 item";
    document.getElementById('confirmBtn').disabled = true;
    return;
  }

  var totalCharge = selected.reduce((sum, cb) => sum + toNum(cb.dataset.charge), 0);
  document.getElementById('selectedTotalAmount').value = money(totalCharge);

  var totalDiscount = 0;
  var perItem = 0;

  if(type === "percentage"){
    if(percVal <= 0){
      document.getElementById('warnMsg').value = "Enter percentage";
      document.getElementById('confirmBtn').disabled = true;
      return;
    }
    totalDiscount = selected.reduce((sum, cb) => {
      var ch = toNum(cb.dataset.charge);
      return sum + (ch * (percVal/100));
    }, 0);
    perItem = totalDiscount / count;
  } else {
    if(takaVal <= 0){
      document.getElementById('warnMsg').value = "Enter taka amount";
      document.getElementById('confirmBtn').disabled = true;
      return;
    }
    totalDiscount = takaVal;
    perItem = takaVal / count;
  }

  document.getElementById('discountPerItemPreview').value = money(perItem);
  document.getElementById('totalDiscountPreview').value = money(totalDiscount);

  // Rule: discount cannot be more than selected total charge
  if(totalDiscount > totalCharge){
    document.getElementById('warnMsg').value =
      "Discount cannot be more than Selected Total (" + money(totalCharge) + ")";
    document.getElementById('confirmBtn').disabled = true;
  } else {
    document.getElementById('warnMsg').value = "OK";
    document.getElementById('confirmBtn').disabled = false;
  }
}

document.getElementById('discount_type').addEventListener('change', function(){
  syncInputs();
  calcPreview();
});
document.getElementById('taka').addEventListener('input', calcPreview);
document.getElementById('percentage').addEventListener('input', calcPreview);

// Check all
document.getElementById('checkAll').addEventListener('change', function(){
  var checked = this.checked;
  document.querySelectorAll('.rowCheck').forEach(cb => cb.checked = checked);
  calcPreview();
});

// Single checkbox
document.querySelectorAll('.rowCheck').forEach(cb => {
  cb.addEventListener('change', function(){
    var all = document.querySelectorAll('.rowCheck').length;
    var sel = document.querySelectorAll('.rowCheck:checked').length;
    document.getElementById('checkAll').checked = (all > 0 && all === sel);
    calcPreview();
  });
});

// Init
syncInputs();
calcPreview();
</script>

</body>
</html>