<?php
include_once 'dbconfig.php';
session_start();
require('db1.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

/* ===== EXACT DB CODE (as you use) ===== */
$db = mysqli_connect('localhost', 'root', 'Godiloveu16');
if (!$db) die("DB connect failed");
mysqli_select_db($db, 'sfmmkpjnew');

/* ===== Load inpatient ===== */
$query4 = mysqli_query($db, "SELECT * FROM inpatient WHERE pmrn='$pmrn' AND eid='$eid' LIMIT 1");
$data   = mysqli_fetch_assoc($query4);
$hos_doc_dis = $data['hos_doc_dis'] ?? 0;

/* ===== Load OT row ===== */
$query45 = mysqli_query($db, "SELECT * FROM ot WHERE pmrn='$pmrn' AND eid='$eid' ORDER BY id DESC LIMIT 1");
$data5   = mysqli_fetch_assoc($query45);
$ot_id   = $data5['id'] ?? 0;

if (!$ot_id) {
    die("OT record not found for this PMRN/EID");
}

/* ==========================================================
   IMPORTANT FIX:
   - removed ugroup='Doctor' because column doesn't exist
   - also your otivisitendo uses 'room' as charge in your UI
========================================================== */
$queryCount = mysqli_query($db, "SELECT COUNT(id) AS c FROM otivisitendo WHERE pmrn='$pmrn' AND eid='$ot_id'");
$dataCount  = mysqli_fetch_assoc($queryCount);
$inves_num  = (int)($dataCount['c'] ?? 0);

$querySum = mysqli_query($db, "SELECT SUM(room) AS s FROM otivisitendo WHERE pmrn='$pmrn' AND eid='$ot_id'");
$dataSum  = mysqli_fetch_assoc($querySum);
$sum_bill = (float)($dataSum['s'] ?? 0);

/* ===== Load user fullname ===== */
$fullname = $_SESSION['sess_username'] ?? '';
$query39  = "SELECT * FROM user WHERE uname='$fullname' LIMIT 1";
$result39 = mysqli_query($con, $query39) or die(mysqli_error($con));
$row39    = mysqli_fetch_assoc($result39);
$full     = $row39['fullname'] ?? '';

/* ==========================================================
   UPDATE DISCOUNT (WITH FULL ROLLBACK)
========================================================== */
if (isset($_POST['but_update'])) {

  // Force mysqli to throw exceptions (so catch can rollback)
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  try {

      if (empty($_POST['update']) || !is_array($_POST['update'])) {
          throw new Exception("Unsuccessful !!! No Row Selected!!");
      }

      // Start transaction on SAME connection ($db)
      $db->begin_transaction();

      foreach ($_POST['update'] as $updateid) {
          $updateid = (int)$updateid;

          $query3 = mysqli_query($db, "SELECT * FROM otivisitendo WHERE id='$updateid' LIMIT 1");
          $data3  = mysqli_fetch_assoc($query3);
          if (!$data3) {
              throw new Exception("Invalid row id: $updateid");
          }

          $dname  = $data3['infusion'] ?? '';
          $proce  = $data3['vtype'] ?? '';
          $ot_id2 = $data3['ieid'] ?? $ot_id;
          $ot_discount_doc  = $data3['discount'] ?? '';

          $refund_time = date('Y-m-d H:i:s');
          $edate       = date('Y-m-d');

          $field  = 'eqty1_' . $updateid;
          $eqty22 = (float)($_POST[$field] ?? 0);

if ($eqty22 <= 0) {
    continue;
}

/* ====== SERVER SIDE LIMIT (discount cannot exceed charge) ====== */
/* charge = SUM(room) for this user/doctor */
$uu = $data3['user'];      // same as in listing
$dd = $data3['infusion'];  // doctor name

$qCharge = mysqli_query($db, "SELECT SUM(room) AS s 
                             FROM otivisitendo 
                             WHERE pmrn='$pmrn' AND ieid='$ot_id2' AND user='$uu'");
$dCharge = mysqli_fetch_assoc($qCharge);
$charge  = (float)($dCharge['s'] ?? 0);

/* already discounted from doc_dis */
$qAlready = mysqli_query($db, "SELECT SUM(discount) AS s 
                              FROM doc_dis 
                              WHERE pmrn='$pmrn' AND eid='$eid' AND dname='$dd' AND location='OT'");
$dAlready = mysqli_fetch_assoc($qAlready);
$already  = (float)($dAlready['s'] ?? 0);

$remaining = $charge - $already;
if ($remaining < 0) $remaining = 0;

/* if user tries more than remaining -> STOP + ROLLBACK */
if ($eqty22 > $remaining) {
    throw new Exception("Discount too high for $dd. Max allowed: $remaining, You entered: $eqty22");
}

/* update discount field in otivisitendo (additive) */
$ot_discount_doc = (float)($data3['discount'] ?? 0);
$eqty222 = $ot_discount_doc + $eqty22;

          // 1) Update otivisitendo
          mysqli_query($db, "UPDATE otivisitendo SET discount='$eqty222' WHERE id='$updateid'");

          // 2) Insert doc_dis
          $sqlDocDis = "INSERT INTO doc_dis
              (`dname`,`discount`,`proce`,`date`,`user`,`pmrn`,`eid`,`ot_id`,`edate`,`location`)
              VALUES
              ('$dname','$eqty22','$proce','$refund_time','$user','$pmrn','$eid','$ot_id2','$edate','OT')";
          mysqli_query($db, $sqlDocDis);

          // 3) Insert pms_tb DR/CR (MUST be same $db connection for rollback)
          $date = date('Y-m-d');

         $sqlTB1 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                     VALUES ('$pmrn','DR','617410','$date','$eqty22','IPD_OT_DISCOUNT')";
          mysqli_query($db, $sqlTB1);

          $sqlTB2 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                     VALUES ('$pmrn','CR','111999','$date','$eqty22','IPD_OT_DISCOUNT')";
          mysqli_query($db, $sqlTB2);

          // 4) Update inpatient summary
          $qSum = mysqli_query($db, "SELECT SUM(discount) AS s
                                    FROM doc_dis
                                    WHERE pmrn='$pmrn' AND eid='$eid' AND location='OT'");
          $dSum = mysqli_fetch_assoc($qSum);
          $sum_bill55 = (float)($dSum['s'] ?? 0);

          mysqli_query($db, "UPDATE inpatient
                             SET hos_doc_dis_ot='$sum_bill55'
                             WHERE pmrn='$pmrn' AND eid='$eid'");
      }

      // If everything ok
      $db->commit();

      $url = "ipall_new_1_new_00_new?pmrn=$pmrn&eid=$eid";
      header("Location: $url");
      exit;

  } catch (Throwable $e) {

      // Any failure = rollback everything
      if ($db && $db->errno === 0) {
          // even if no SQL error, still rollback if begun
      }
      if ($db) {
          $db->rollback();
      }

      echo "<script>alert('Transaction Failed! Rolled Back. Error: " . addslashes($e->getMessage()) . "');</script>";
  }
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>OT Discount</title>
  <link rel="stylesheet" href="jsnew/normalize.min.css">
  <link rel="stylesheet" href="jsnew/jquery-ui.css">
  <script src="jsnew/jquery.min.js"></script>
  <script src="jsnew/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="styles.css">
  <style>
    body { font-family:'Nunito',sans-serif; color:#384047; background:#A085C6; }
    form { max-width:1200px; margin:10px auto; padding:10px 20px; background:#f4f7f8; border-radius:8px; border:1px solid #8265B0; }
    h1 { text-align:center; }
    input[type="text"], input[type="number"] { padding:10px; background:#e8eeef; margin-bottom:10px; width:100%; }
    button { padding:14px; color:#fff; background:#A085C6; border:1px solid #8265B0; border-radius:5px; width:100%; }
    table { width:100%; border-collapse:collapse; }
    td, th { padding:8px; }
  </style>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='viewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='prescription/prescription/viewnew'><span>OPD Patients</span></a></li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a></li>
      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<form name="frmDiscount" action="" method="post">
  <h1>Investigation Charge Discount Panel</h1>

  <label><strong>MRN , Episode :</strong></label>
  <input type="text" value="<?php echo htmlspecialchars($pmrn . ', ' . $eid); ?>" readonly>

  <label><strong>Charge Type :</strong></label>
  <input type="text" value="OT DISCOUNT" readonly>

  <table border="1">
    <tr><td colspan="20" align="center" bgcolor="skyblue"><strong>Doctor's Note</strong></td></tr>
    <tr>
      <th>S.No</th>
      <th>MRN</th>
      <th>Doctor Name</th>
      <th>Date</th>
      <th>Charge</th>
      <th>Discount</th>
    </tr>

<?php
/* find latest OT eid value */
$dbhandle = mysqli_connect("localhost", "root", "Godiloveu16") or die("Unable to connect to MySQL");
mysqli_select_db($dbhandle, "sfmmkpjnew") or die("Could not select db");

$query198j_doc_ot = "SELECT * FROM ot WHERE pmrn='$pmrn' AND eid='$eid' ORDER BY id DESC LIMIT 1";
$result198j_doc_ot = mysqli_query($dbhandle, $query198j_doc_ot) or die(mysqli_error($dbhandle));
$row198j_doc_ot = mysqli_fetch_assoc($result198j_doc_ot);
$test1c_doc_ot = $row198j_doc_ot['eid'] ?? '';

$count = 1;
$sel_query = "SELECT * FROM otivisitendo
              WHERE pmrn='$pmrn' AND ieid='$test1c_doc_ot' AND c_status='0'
              GROUP BY infusion
              ORDER BY infusion ASC";
$result = mysqli_query($con, $sel_query) or die(mysqli_error($con));

while ($row = mysqli_fetch_assoc($result)) {

    $uu = $row["user"];
    $dd = $row["infusion"];

    $query55 = mysqli_query($db, "SELECT SUM(room) AS s FROM otivisitendo WHERE pmrn='$pmrn' AND ieid='$test1c_doc_ot' AND user='$uu'");
    $data55 = mysqli_fetch_assoc($query55);
    $sum_bill5 = (float)($data55['s'] ?? 0);

    /* IMPORTANT FIX: doc_dis uses eid NOT ieid */
    $query555 = mysqli_query($db, "SELECT SUM(discount) AS s FROM doc_dis WHERE pmrn='$pmrn' AND eid='$eid' AND dname='$dd' AND location='OT'");
    $data555  = mysqli_fetch_assoc($query555);
    $sum_bill55 = (float)($data555['s'] ?? 0);

    $idRow = (int)$row["id"];
    $maxDis = max(0, $sum_bill5 - $sum_bill55);
?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo htmlspecialchars($row["pmrn"]); ?></td>
      <td align="center"><?php echo htmlspecialchars($row["infusion"]); ?></td>
      <td align="center"><?php echo htmlspecialchars($row["odate"]); ?></td>
      <td align="center"><?php echo $sum_bill5; ?></td>
      <td align="center">
        <input name="eqty1_<?php echo $idRow; ?>" type="number" min="0" step="0.01" max="<?php echo $maxDis; ?>" required>
        <input type="hidden" name="update[]" value="<?php echo $idRow; ?>">
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
  <button type="submit" name="but_update">Confirm</button>
</form>

<form name="frmDiscountView" action="" method="post">
  <h1>Discount View</h1>

  <table border="1">
    <tr><td colspan="20" align="center" bgcolor="skyblue"><strong>Doctor's Note</strong></td></tr>
    <tr>
      <th>S.No</th>
      <th>MRN</th>
      <th>Doctor Name</th>
      <th>Discount Amount</th>
    </tr>

<?php
$count = 1;
$sel_query = "SELECT * FROM doc_dis WHERE pmrn='$pmrn' AND eid='$eid' AND location='OT' ORDER BY id DESC";
$result = mysqli_query($con, $sel_query) or die(mysqli_error($con));

while ($row = mysqli_fetch_assoc($result)) {
?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo htmlspecialchars($row["pmrn"]); ?></td>
      <td align="center"><?php echo htmlspecialchars($row["dname"]); ?></td>
      <td align="center"><?php echo htmlspecialchars($row["discount"]); ?></td>
    </tr>
<?php
$count++;
}
?>
  </table>
</form>

</body>
</html>