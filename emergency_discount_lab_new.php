<?php
include_once 'dbconfig.php';

session_start();
require('db1.php');

/* =========================
   ROLE CHECK
========================= */
$role = $_SESSION['sess_userrole'] ?? '';
$queryc = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('bill','billin')";
$resultc = mysqli_query($con, $queryc) or die(mysqli_error($con));
$rowc = mysqli_fetch_assoc($resultc);
$c1 = (int)($rowc['c'] ?? 0);

if (!isset($_SESSION['sess_username']) || $c1 === 0) {
  header('Location: login2?err=2');
  exit;
}

/* =========================
   INPUTS
========================= */
$user = $_SESSION['sess_username'] ?? '';

$eid  = $_REQUEST['eid'] ?? '';
$id   = $_REQUEST['id'] ?? '';
$pmrn = $_REQUEST['pmrn'] ?? '';

$hos_charge = $_REQUEST['hos_charge'] ?? '';
$charge     = $_REQUEST['charge'] ?? '';

/* =========================
   DB (use ONE connection style)
   We'll use $con from db1.php everywhere
========================= */
mysqli_set_charset($con, 'utf8mb4');

/* =========================
   LOAD USER FULLNAME
========================= */
$fullname = $_SESSION['sess_username'] ?? '';
$query39  = "SELECT * FROM user WHERE uname='$fullname' LIMIT 1";
$result39 = mysqli_query($con, $query39) or die(mysqli_error($con));
$row39    = mysqli_fetch_assoc($result39);
$full     = $row39['fullname'] ?? $fullname;

/* =========================
   LOAD INVESTIGATION COUNT
   (for display)
========================= */
$queryCount = mysqli_query($con, "SELECT COUNT(id) AS c FROM einves WHERE pmrn='$pmrn' AND eid='$eid' AND rstatus='RECEIVED'")
  or die(mysqli_error($con));
$dataCount = mysqli_fetch_assoc($queryCount);
$inves_num = (int)($dataCount['c'] ?? 0);

/* ==========================================================
   ✅ STANDARD TRANSACTION DISCOUNT UPDATE (ROLLBACK ON FAIL)
========================================================== */
if (isset($_POST['but_update'])) {

  $pmrn1 = $_POST['pmrn'] ?? '';
  $eid1  = $_POST['eid'] ?? '';

  $discount_type = $_POST['discount_type'] ?? '';

  $selected = $_POST['update'] ?? [];

  if ($pmrn1 === '' || $eid1 === '') {
    echo "<script>alert('Missing pmrn or eid');</script>";
  } elseif (empty($selected) || !is_array($selected)) {
    echo "<script>alert('Unsuccessful !!! No Row Selected!!');</script>";
  } else {

    // Make mysqli throw exceptions so rollback works properly
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
      $con->begin_transaction();

      $taka_total        = (float)($_POST['taka'] ?? 0);
      $percentage_input  = (float)($_POST['percentage'] ?? 0);

      if ($discount_type === 'taka') {
        if ($taka_total <= 0) {
          throw new Exception("Discount in Taka must be greater than 0.");
        }
      } elseif ($discount_type === 'percentage') {
        if ($percentage_input <= 0) {
          throw new Exception("Discount in Percentage must be greater than 0.");
        }
        if ($percentage_input > 100) {
          throw new Exception("Percentage cannot exceed 100.");
        }
      } else {
        throw new Exception("Invalid discount type.");
      }

      // For taka: split equally among selected items
      $per_item_taka = 0.0;
      if ($discount_type === 'taka') {
        $count_selected = count($selected);
        if ($count_selected <= 0) throw new Exception("No rows selected.");
        $per_item_taka = $taka_total / $count_selected;
      }

      // Prepared statements
      $stmtGet = $con->prepare("SELECT price FROM einves WHERE id=? AND pmrn=? AND eid=? FOR UPDATE");
      $stmtUpd = $con->prepare("UPDATE einves 
                                SET dprice=?, discount=?, discount_type=?, o_dis=? 
                                WHERE id=? AND pmrn=? AND eid=?");

      foreach ($selected as $updateid_raw) {

        $updateid = (int)$updateid_raw;
        if ($updateid <= 0) continue;

        // Load original price
        $stmtGet->bind_param("iss", $updateid, $pmrn1, $eid1);
        $stmtGet->execute();
        $res = $stmtGet->get_result();
        $row = $res->fetch_assoc();

        if (!$row) {
          throw new Exception("Invalid row selected (ID: $updateid).");
        }

        $price = (float)$row['price'];

        // Calculate discount with cap
        if ($discount_type === 'percentage') {
          $disco = $price * ($percentage_input / 100.0);
          if ($disco > $price) $disco = $price;
          if ($disco < 0)      $disco = 0;

          $dprice     = $price - $disco;
          $o_dis_val  = (string)$percentage_input;

        } else { // taka
          $disco = $per_item_taka;
          if ($disco > $price) $disco = $price;
          if ($disco < 0)      $disco = 0;

          $dprice     = $price - $disco;
          $o_dis_val  = (string)$taka_total;
        }

        // Optional rounding for money
        $disco  = round($disco, 2);
        $dprice = round($dprice, 2);

        // Update row
        $stmtUpd->bind_param(
          "ddssiss",
          $dprice,
          $disco,
          $discount_type,
          $o_dis_val,
          $updateid,
          $pmrn1,
          $eid1
        );
        $stmtUpd->execute();
      }

      // Recalculate total discount from DB
      $stmtSum = $con->prepare("SELECT COALESCE(SUM(discount),0) AS total_dis 
                                FROM einves 
                                WHERE pmrn=? AND eid=? AND rstatus='RECEIVED'");
      $stmtSum->bind_param("ss", $pmrn1, $eid1);
      $stmtSum->execute();
      $sumRow = $stmtSum->get_result()->fetch_assoc();
      $total_dis_db = round((float)($sumRow['total_dis'] ?? 0), 2);

      // Update emergency table
      $stmtEmer = $con->prepare("UPDATE emergency SET lab_dis=? WHERE pmrn=? AND eid=?");
      $stmtEmer->bind_param("dss", $total_dis_db, $pmrn1, $eid1);
      $stmtEmer->execute();

      // Commit everything
      $con->commit();

      // Redirect to bill page
      header("Location: billpall?pmrn=" . urlencode($pmrn1) . "&id=" . urlencode($id) . "&eid=" . urlencode($eid1));
      exit;

    } catch (Throwable $e) {
      // Rollback all changes
      if ($con) $con->rollback();
      $msg = htmlspecialchars($e->getMessage());
      echo "<script>alert('Failed: {$msg}');</script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Investigation Charge Discount Panel</title>

  <link rel="stylesheet" href="jsnew/normalize.min.css">

  <style>
    html { box-sizing: border-box; }
    *, *:before, *:after { box-sizing: border-box; }

    body {
      font-family: 'Nunito', sans-serif;
      color: #384047;
      background: #A085C6;
    }

    form {
      max-width: 300px;
      margin: 10px auto;
      padding: 10px 20px;
      background: #f4f7f8;
      border-radius: 8px;
      border: 1px solid #8265B0;
      box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
    }

    h1 { margin: 0 0 30px 0; text-align: center; }

    input[type="text"], input[type="number"], select {
      background: rgba(255,255,255,0.1);
      border: none;
      font-size: 16px;
      height: auto;
      margin: 0;
      outline: 0;
      padding: 15px;
      background-color: #e8eeef;
      color: #111;
      box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
      margin-bottom: 10px;
      width: 100%;
    }

    input[type="checkbox"] { margin: 0 4px 8px 0; }

    select { height: 45px; border-radius: 4px; }

    button {
      padding: 16px;
      color: #FFF;
      background-color: #A085C6;
      font-size: 16px;
      border-radius: 5px;
      width: 100%;
      border: 1px solid #8265B0;
      border-width: 1px 1px 3px;
      margin-bottom: 3px;
      cursor: pointer;
    }

    table { border-collapse: collapse; }
    td, th { padding: 8px; }

    @media screen and (min-width: 1200px) {
      form { max-width: 1200px; }
    }
  </style>

  <link rel="stylesheet" href="jsnew/jquery-ui.css">
  <script src="jsnew/jquery.min.js"></script>
  <script src="jsnew/jquery-ui.min.js"></script>

  <script src='a_j_q/jquery-3.3.1.min.js' type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function(){

      // Check/Uncheck All
      $('#checkAll').change(function(){
        $('input[name="update[]"]').prop('checked', $(this).is(':checked'));
      });

      // Checkbox click
      $('input[name="update[]"]').click(function(){
        var total = $('input[name="update[]"]').length;
        var checked = $('input[name="update[]"]:checked').length;
        $('#checkAll').prop('checked', total === checked);
      });

      // initial toggle
      toggleDiscountInputs();
      $('#discount_type').on('change', toggleDiscountInputs);

      function toggleDiscountInputs(){
        var rt = $('#discount_type').val();
        if(rt === "percentage"){
          $('#percentage').prop('hidden', false).prop('disabled', false);
          $('#taka').prop('hidden', true).prop('disabled', true).val('');
        }else{
          $('#percentage').prop('hidden', true).prop('disabled', true).val('');
          $('#taka').prop('hidden', false).prop('disabled', false);
        }
      }
    });
  </script>
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
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a></li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a></li>
         <li class='has-sub'><a href='gg1newdoc'><span>Set Patients Appointment</span></a></li>
      </ul>
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='app1doc'><span>Appointment Report</span></a></li>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a></li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a></li>
         <li class='has-sub'><a href='con2'><span>OT Stats</span></a></li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a></li>
         <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a></li>
         <li class='has-sub'><a href='view3newrad'><span>Radiology Report</span></a></li>
      </ul>
   </li>
   <li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<form name="frmMain1" action="" method="post">

  <h1>Investigation Charge Discount Panel</h1>

  <fieldset>
    <label><strong>MRN / EID :</strong></label>
    <input name="fname" type="text" value="<?php echo htmlspecialchars($pmrn . ', ' . $eid); ?>" readonly style="font-size:20px;color:green;font-weight:bold;">

    <label><strong>Charge Type:</strong></label>
    <input name="mname" type="text" value="LAB DISCOUNT" readonly style="font-size:20px;color:green;font-weight:bold;">

    <table align="center" width="100%" border="1">
      <tr>
        <td colspan="20" align="center" bgcolor="skyblue"><label><strong>Investigations (RECEIVED)</strong></label></td>
      </tr>
      <tr>
        <td align="center"><strong>S.No</strong></td>
        <td align="center"><strong>MRN</strong></td>
        <td align="center" colspan="4"><strong>Note By</strong></td>
        <td align="center"><strong>Date</strong></td>
        <td align="center"><strong>Time</strong></td>
        <td align="center"><strong>Pain Score</strong></td>
        <td align="center" colspan="3"><strong>Progress Note</strong></td>
        <td align="center" colspan="6"><strong>Investigation</strong></td>
        <td align="center"><strong>Charge</strong></td>
        <td align="center"><strong>Price</strong></td>
        <td align="center"><input type="checkbox" id="checkAll"></td>
      </tr>

      <?php
      $count = 1;
      $sel_query = "SELECT * FROM einves 
                    WHERE pmrn='$pmrn' AND eid='$eid' 
                      AND rstatus='RECEIVED' 
                      AND type IN ('LAB','Lab','lab','RAD','Rad','rad') 
                    ORDER BY id DESC";
      $result = mysqli_query($con, $sel_query) or die(mysqli_error($con));

      while ($row = mysqli_fetch_assoc($result)) {
        $rid = (int)$row['id'];
      ?>
        <tr>
          <td align="center"><?php echo $count; ?></td>
          <td align="center"><?php echo htmlspecialchars($row["pmrn"]); ?></td>
          <td align="center" colspan="4"><?php echo htmlspecialchars($row["user"]); ?></td>
          <td align="center"><?php echo htmlspecialchars($row["odate"]); ?></td>
          <td align="center"><?php echo htmlspecialchars($row["otime"]); ?></td>
          <td align="center"><?php echo htmlspecialchars($row["infusion"]); ?></td>
          <td align="center" colspan="3"><?php echo htmlspecialchars($row["pnote"]); ?></td>
          <td align="center" colspan="6"><?php echo htmlspecialchars($row["inves"]); ?></td>
          <td align="center"><?php echo htmlspecialchars($row["visit"]); ?></td>

          <td align="center">
            <input name="eqty1_<?php echo $rid; ?>" type="text" value="<?php echo htmlspecialchars($row['price']); ?>" readonly>
          </td>
          <td align="center">
            <input type="checkbox" name="update[]" value="<?php echo $rid; ?>">
          </td>
        </tr>
      <?php
        $count++;
      }
      ?>

    </table>

    <input name="pmrn" type="hidden" value="<?php echo htmlspecialchars($pmrn); ?>">
    <input name="eid" type="hidden" value="<?php echo htmlspecialchars($eid); ?>">

    <table align="center" width="100%" border="1" style="margin-top:10px;">
      <tr>
        <td colspan="20" align="left" style="color:red;font-weight:bold;font-size:18px">
          <label><strong>Type</strong></label>

          <select name="discount_type" id="discount_type" class="style1">
            <option value="taka">Discount In Taka</option>
            <option value="percentage">Discount In Percentage</option>
          </select>

          <input name="taka" id="taka" type="number" placeholder="Total Discount In Taka" min="1" max="100000">

          <input type="number" name="percentage" id="percentage" hidden placeholder="Discount In Percentage" min="1" max="100">
        </td>
      </tr>
      <tr>
        <td colspan="15">
          <button type="submit" name="but_update">Confirm</button>
        </td>
      </tr>
    </table>

  </fieldset>
</form>

<form name="frmMain2" action="" method="post">
  <h1>Discount View</h1>

  <fieldset>
    <table align="center" width="100%" border="1">
      <tr>
        <td colspan="20" align="center" bgcolor="skyblue"><label><strong>Discounted Items</strong></label></td>
      </tr>
      <tr>
        <td align="center"><strong>S.No</strong></td>
        <td align="center"><strong>MRN</strong></td>
        <td align="center" colspan="10"><strong>Doctor Name</strong></td>
        <td align="center" colspan="2"><strong>Discount Amount</strong></td>
      </tr>

      <?php
      $count = 1;
      $sel_query = "SELECT * FROM einves WHERE pmrn='$pmrn' AND eid='$eid' AND discount > 0 ORDER BY id DESC";
      $result = mysqli_query($con, $sel_query) or die(mysqli_error($con));

      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <tr>
          <td align="center"><?php echo $count; ?></td>
          <td align="center"><?php echo htmlspecialchars($row["pmrn"]); ?></td>
          <td align="center" colspan="10"><?php echo htmlspecialchars($row["dname"]); ?></td>
          <td align="center" colspan="2"><?php echo htmlspecialchars($row["discount"]); ?></td>
        </tr>
      <?php
        $count++;
      }

      $qTotal = mysqli_query($con, "SELECT COALESCE(SUM(discount),0) AS t FROM einves WHERE pmrn='$pmrn' AND eid='$eid'")
        or die(mysqli_error($con));
      $rTotal = mysqli_fetch_assoc($qTotal);
      $totalDiscount = $rTotal['t'] ?? 0;
      ?>
      <tr>
        <td colspan="12" align="right"><b>Total Discount</b></td>
        <td colspan="2" align="center"><b><?php echo htmlspecialchars($totalDiscount); ?></b></td>
      </tr>

    </table>
  </fieldset>
</form>

</body>
</html>