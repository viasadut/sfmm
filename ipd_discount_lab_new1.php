<?php
include_once 'dbconfig.php';

session_start();
require('db1.php'); // must provide $con (mysqli)

// ===== optional error show =====
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// =======================
// ROLE CHECK (same logic)
// =======================
$role = $_SESSION['sess_userrole'] ?? '';

$queryc  = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('bill','billin')";
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

/* ==========================================================
   ✅ KEEP ORIGINAL DB CODE (same host/user/pass/db)
   IMPORTANT: rollback works only if ALL queries use SAME $db
========================================================== */
$db = mysqli_connect('localhost', 'root', 'Godiloveu16') or die("Unable to connect to MySQL");
mysqli_select_db($db, 'sfmmkpjnew') or die("Could not select db");

// =======================
// LOAD inpatient + totals
// =======================
$query4 = mysqli_query($db, "SELECT * FROM inpatient WHERE pmrn='$pmrn' AND eid='$eid' LIMIT 1");
$data   = mysqli_fetch_assoc($query4);
$hos_doc_dis = (float)($data['hos_doc_dis'] ?? 0);

$queryCount = mysqli_query($db, "SELECT COUNT(id) AS c FROM icnote WHERE pmrn='$pmrn' AND eid='$eid' AND ugroup='Doctor'");
$dataCount  = mysqli_fetch_assoc($queryCount);
$inves_num  = (int)($dataCount['c'] ?? 0);

$querySum = mysqli_query($db, "SELECT SUM(charge) AS s FROM icnote WHERE pmrn='$pmrn' AND eid='$eid' AND ugroup='Doctor'");
$dataSum  = mysqli_fetch_assoc($querySum);
$sum_bill = (float)($dataSum['s'] ?? 0);

// =======================
// USER full name
// =======================
$fullname = $_SESSION['sess_username'] ?? '';
$query39  = "SELECT * FROM user WHERE uname='$fullname' LIMIT 1";
$result39 = mysqli_query($con, $query39) or die(mysqli_error($con));
$row39    = mysqli_fetch_assoc($result39);
$full     = $row39['fullname'] ?? '';

/* ==========================================================
   UPDATE (TRANSACTION + ROLLBACK)
   - if any query fails => rollback all
   - discount cannot be more than charge (per doctor)
========================================================== */
if (isset($_POST['but_update'])) {

  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  try {

    if (empty($_POST['update']) || !is_array($_POST['update'])) {
      throw new Exception("Unsuccessful !!! No Row Selected!!");
    }

    // Start transaction
    $db->begin_transaction();

    $refund_time = date('Y-m-d H:i:s');
    $edate       = date('Y-m-d');
    $date_tb     = date('Y-m-d');

    foreach ($_POST['update'] as $updateid) {

      $updateid = (int)$updateid;

      // Load the icnote row (used to get doctor username)
      $query3 = mysqli_query($db, "SELECT * FROM icnote WHERE id='$updateid' LIMIT 1");
      $data3  = mysqli_fetch_assoc($query3);
      if (!$data3) {
        throw new Exception("Invalid row id: $updateid");
      }

      $doctor = $data3['user'] ?? '';
      if ($doctor === '') {
        throw new Exception("Doctor name missing for row id: $updateid");
      }

      // posted discount input for this doctor group
      $field  = 'eqty1_' . $updateid;
      $eqty22 = (float)($_POST[$field] ?? 0);

      if ($eqty22 <= 0) {
        // ignore 0, but do not fail
        continue;
      }

      // Doctor total charge (server-side trusted)
      $qDocCharge = mysqli_query($db, "SELECT SUM(charge) AS s
                                      FROM icnote
                                      WHERE pmrn='$pmrn' AND eid='$eid'
                                        AND ugroup='Doctor' AND user='$doctor'");
      $rDocCharge = mysqli_fetch_assoc($qDocCharge);
      $docCharge  = (float)($rDocCharge['s'] ?? 0);

      // Already discounted for this doctor (from doc_dis)
      $qAlready = mysqli_query($db, "SELECT SUM(discount) AS s
                                    FROM doc_dis
                                    WHERE pmrn='$pmrn' AND eid='$eid'
                                      AND location='IPD' AND dname='$doctor'");
      $rAlready = mysqli_fetch_assoc($qAlready);
      $already  = (float)($rAlready['s'] ?? 0);

      $remaining = $docCharge - $already;
      if ($remaining < 0) $remaining = 0;

      // ✅ RULE: discount cannot be more than remaining charge
      if ($eqty22 > $remaining) {
        throw new Exception("Discount cannot be more than charge for doctor ($doctor). Max allowed: $remaining");
      }

      // 1) Insert doc_dis (same as your columns)
      $sqlDoc = "INSERT INTO doc_dis
        (`dname`,`discount`,`proce`,`date`,`user`,`pmrn`,`eid`,`ot_id`,`edate`,`location`)
        VALUES
        ('$doctor','$eqty22','IPD visit','$refund_time','$user','$pmrn','$eid','$updateid','$edate','IPD')";
      mysqli_query($db, $sqlDoc);

      // 2) Accounting TB DR/CR (MUST use SAME $db for rollback)
      $sqlTB1 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                 VALUES ('$pmrn','DR','211170','$date_tb','$eqty22','IPD_DOC_DISCOUNT')";
      mysqli_query($db, $sqlTB1);

      $sqlTB2 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                 VALUES ('$pmrn','CR','111999','$date_tb','$eqty22','IPD_DOC_DISCOUNT')";
      mysqli_query($db, $sqlTB2);
    }

    // 3) Update inpatient hos_doc_dis from doc_dis (IPD)
    $query5555 = mysqli_query($db, "SELECT SUM(discount) AS s
                                   FROM doc_dis
                                   WHERE pmrn='$pmrn' AND eid='$eid' AND location='IPD'");
    $data5555  = mysqli_fetch_assoc($query5555);
    $sum_bill55 = (float)($data5555['s'] ?? 0);

    $strSQL1 = "UPDATE inpatient SET hos_doc_dis='$sum_bill55' WHERE pmrn='$pmrn' AND eid='$eid'";
    mysqli_query($db, $strSQL1);

    // Commit everything
    $db->commit();

    $url = "ipall_new_1_new_0_new1?pmrn=$pmrn&eid=$eid";
    header("Location: $url");
    exit;

  } catch (Throwable $e) {
    // Rollback everything
    try { $db->rollback(); } catch (Throwable $x) {}
    echo "<script>alert('Transaction Failed! Rolled Back. Error: " . addslashes($e->getMessage()) . "');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Consultant Discount</title>
  <link rel="stylesheet" href="jsnew/normalize.min.css">
  <link rel="stylesheet" href="jsnew/jquery-ui.css">
  <script src="jsnew/jquery.min.js"></script>
  <script src="jsnew/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="styles.css">

  <style>
    body { font-family: 'Nunito',sans-serif; color:#384047; background:#A085C6; }
    form { max-width:1200px; margin:10px auto; padding:10px 20px; background:#f4f7f8; border-radius:8px; border:1px solid #8265B0; box-shadow:3px 3px 3px rgba(0,0,0,0.2); }
    h1 { margin:0 0 20px 0; text-align:center; }
    input[type="text"], input[type="number"] { background:#e8eeef; border:none; font-size:16px; padding:12px; width:100%; box-sizing:border-box; }
    table { width:100%; border-collapse:collapse; background:#fff; }
    th, td { border:1px solid #ccc; padding:8px; }
    th { background:#e9ecef; }
    button { padding:16px; color:#fff; background:#A085C6; font-size:16px; border-radius:5px; width:100%; border:1px solid #8265B0; cursor:pointer; }
    .toprow { display:grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 10px; }
    .info { background:#e8eeef; padding:10px; border-radius:6px; }
  </style>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='viewnew1'><span>Home</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<form name="frmMain1" action="" method="post">
  <h1>Investigation Charge Discount Panel</h1>

  <div class="toprow">
    <div>
      <label><strong>MRN , Episode :</strong></label>
      <input type="text" value="<?php echo htmlspecialchars($pmrn . ', ' . $eid); ?>" readonly>
    </div>
    <div>
      <label><strong>Charge Type:</strong></label>
      <input type="text" value="CONSULTANT DISCOUNT" readonly>
    </div>
  </div>

  <div class="toprow">
    <div class="info">
      <strong>Total Doctor Charge (All):</strong>
      <?php echo number_format($sum_bill, 2); ?>
    </div>
    <div class="info">
      <strong>Total Doctor Notes:</strong>
      <?php echo (int)$inves_num; ?>
    </div>
  </div>

  <table>
    <tr>
      <th style="width:60px;">S.No</th>
      <th style="width:120px;">MRN</th>
      <th>Doctor</th>
      <th style="width:120px;">Date</th>
      <th style="width:120px;">Total Charge</th>
      <th style="width:140px;">Already Discount</th>
      <th style="width:180px;">New Discount</th>
    </tr>

<?php
$count=1;

// group by doctor
$sel_query = "SELECT * FROM icnote
              WHERE pmrn='$pmrn' AND eid='$eid' AND ugroup='Doctor'
              GROUP BY `user`
              ORDER BY `user` ASC";
$result = mysqli_query($db, $sel_query);

while($row = mysqli_fetch_assoc($result)) {

  $doctor = $row["user"];

  $qDocCharge = mysqli_query($db, "SELECT SUM(charge) AS s
                                  FROM icnote
                                  WHERE pmrn='$pmrn' AND eid='$eid' AND ugroup='Doctor' AND user='$doctor'");
  $rDocCharge = mysqli_fetch_assoc($qDocCharge);
  $docCharge  = (float)($rDocCharge['s'] ?? 0);

  $qAlready = mysqli_query($db, "SELECT SUM(discount) AS s
                                FROM doc_dis
                                WHERE pmrn='$pmrn' AND eid='$eid' AND location='IPD' AND dname='$doctor'");
  $rAlready = mysqli_fetch_assoc($qAlready);
  $already  = (float)($rAlready['s'] ?? 0);

  $remaining = $docCharge - $already;
  if ($remaining < 0) $remaining = 0;

  $id = (int)$row["id"];
?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo htmlspecialchars($row["pmrn"]); ?></td>
      <td><?php echo htmlspecialchars($doctor); ?></td>
      <td align="center"><?php echo htmlspecialchars($row["odate"]); ?></td>
      <td align="center"><?php echo number_format($docCharge, 2); ?></td>
      <td align="center"><?php echo number_format($already, 2); ?></td>
      <td align="center">
        <!-- ✅ cannot more than remaining -->
        <input
          name="eqty1_<?php echo $id; ?>"
          type="number"
          min="0"
          step="0.01"
          max="<?php echo htmlspecialchars($remaining); ?>"
          placeholder="Max <?php echo number_format($remaining,2); ?>"
          required
        >
        <input type="hidden" name="update[]" value="<?php echo $id; ?>">
      </td>
    </tr>
<?php
  $count++;
}
?>
  </table>

  <input name="pmrn" type="hidden" value="<?php echo htmlspecialchars($pmrn); ?>">
  <input name="eid"  type="hidden" value="<?php echo htmlspecialchars($eid); ?>">

  <br>
  <button type="submit" name="but_update">Confirm</button>
</form>

</body>
</html>