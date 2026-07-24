<?php
session_start();
require('db1.php');

// -------------------- ROLE CHECK (FIXED) --------------------
$role = $_SESSION['sess_userrole'] ?? '';
$allowedRoles = ['billin','bill','mng','nurse'];

if (!isset($_SESSION['sess_username']) || !in_array($role, $allowedRoles, true)) {
    header('Location: login2?err=2');
    exit;
}

// -------------------- BASIC DATA --------------------
$today = date('Y-m-d');
$timestamp = strtotime($today);
$formattedDate = date('d-M-Y', $timestamp);

$user = $_SESSION["sess_username"] ?? '';

$pmrn = $_REQUEST['pmrn'] ?? '';
$pmrn_int = (int)($pmrn);
$eid = (int)($_REQUEST['eid'] ?? 0);

// -------------------- LOAD PATIENT (USING mysqli like your code) --------------------
$db = mysqli_connect('localhost', 'root', 'Godiloveu16');
mysqli_select_db($db, 'sfmmkpjnew');

$query4 = mysqli_query($db, "SELECT * FROM inpatient WHERE pmrn='$pmrn' AND discharge='' AND eid='$eid'");
$data = mysqli_fetch_assoc($query4);

$ward = $data['room'] ?? '';
$bed1 = $data['room1'] ?? '';
$adoc = $data['adoc'] ?? '';
$pname = $data['pname'] ?? '';
$api_adminssion_no = (int)($data['OUT_ADMISSION_NO_PK'] ?? 0);
$discharge_ipd = $data['disstatus'] ?? '';


// -------------------- SUBMIT ADD (YOUR LOGIC + TRANSACTION) --------------------
if (isset($_POST['Submit1'])) {

    $medi6 = $_POST['medi6'] ?? '';       // sno from select2
    $pdos  = (int)($_POST['pdos'] ?? 0);
    $tqty  = (int)($_POST['tqty'] ?? 0);

    $date1 = date('m/d/Y'); // same as your table date
    $date2 = date('d/m/Y');

    if ($medi6 === '' || $pdos <= 0) {
        echo "<script>alert('Please select item and used qty.');</script>";
    } else {

        // ✅ Load stock row
        $sel18 = mysqli_query($db, "SELECT * FROM purchase_stock3 WHERE sno='$medi6' LIMIT 1");
        $result18 = mysqli_fetch_assoc($sel18);

        $p_code = $result18['code'] ?? '';
        $stock_qty = (int)($result18['add_qty'] ?? 0);

        // ✅ Load item row
        $sel1 = mysqli_query($db, "SELECT * FROM hits_list WHERE code='$p_code' LIMIT 1");
        $result1 = mysqli_fetch_assoc($sel1);

        $medi1_raw = $result1['item_name'] ?? '';
        $medi1 = str_replace("'", "''", $medi1_raw);
        $medi1_api = $medi1 . '-IPD';

        $dcode = $result1["code"] ?? '';
        $price = (int)($result1["ipd_charge"] ?? 0);
        $sub_type = $result1["sub_type"] ?? '';
        $ip = $result1["ip"] ?? '';
        $op = $result1["op"] ?? '';
        $acode = $result1["acode"] ?? '';
        $ccentre = $result1["ccentre"] ?? '';

        // ✅ package check
        $sel_p = mysqli_query($db, "SELECT COUNT(id) AS c FROM set_package WHERE iname='$medi1' ");
        $result_p = mysqli_fetch_assoc($sel_p);
        $dis_pack = (int)($result_p['c'] ?? 0);

        // ✅ qty calc
        $new_qty = $stock_qty - $pdos;
        $p11 = (int)$price * $pdos; // total price (your code uses p11)

        // ✅ validations (similar to your logic)
        if ($medi1_raw === '' || $p_code === '') {
            echo "<script>alert('Unsuccessful !!! Item not found in Database. Contact IT.');</script>";
        }
        else if ($user === '') {
            echo "<script>alert('Unsuccessful !!! Session Expired');</script>";
        }
        else if ($dis_pack > 0) {
            echo "<script>alert('This item is under package. Cannot add from here.');</script>";
        }
        else if ($pdos > $stock_qty) {
            echo "<script>alert('Used qty cannot be greater than stock!');</script>";
        }
        else {

            // ✅ Use mysqli transaction (clean)
            mysqli_begin_transaction($db);

            try {
                // 1) INSERT inhoscharge
                $sql = "INSERT INTO inhoscharge
                    (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`price`,`date1`,`type`,`ip`,`op`,`acct_code`,`ccentre`,`user`,`sno`,`e_point`)
                    VALUES
                    ('$pmrn','$pname','$medi1','$eid','$date1','$pdos','$dcode','$p11','$date2','$sub_type','$ip','$op','$acode','$ccentre','$user','$medi6','1')";

                if (!mysqli_query($db, $sql)) {
                    throw new Exception("Insert failed: " . mysqli_error($db));
                }
                $last_id = mysqli_insert_id($db);

                // 2) UPDATE stock
                $up_query1 = "UPDATE purchase_stock3 SET add_qty='$new_qty' WHERE sno='$medi6'";
                if (!mysqli_query($db, $up_query1)) {
                    throw new Exception("Stock update failed: " . mysqli_error($db));
                }
                if (mysqli_affected_rows($db) <= 0) {
                    throw new Exception("Stock update affected 0 rows.");
                }

                // 3) TB lookup
                $date = date('Y-m-d');
                $tb_q = mysqli_query($db, "SELECT tb_op, tb_ip FROM acct_master_new WHERE item_code='$dcode' LIMIT 1");
                if (!$tb_q) throw new Exception("TB lookup query failed: " . mysqli_error($db));

                $tb_result = mysqli_fetch_assoc($tb_q);
                if (!$tb_result) throw new Exception("acct_master_new not found for item_code: $dcode");

                $tb_data = ($tb_result['tb_op'] != '') ? $tb_result['tb_op'] : $tb_result['tb_ip'];

                // 4) pms_tb CR
                $ins_query = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                              VALUES ('$last_id','CR','$tb_data','$date','$p11','IPD_HOS_CHARGE')";
                if (!mysqli_query($db, $ins_query)) {
                    throw new Exception("TB CR insert failed: " . mysqli_error($db));
                }

                // 5) pms_tb DR
                $ins_query2 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                               VALUES ('$last_id','DR','111999','$date','$p11','IPD_HOS_CHARGE')";
                if (!mysqli_query($db, $ins_query2)) {
                    throw new Exception("TB DR insert failed: " . mysqli_error($db));
                }

                mysqli_commit($db);
                echo "<script>alert('SUCCESS: Charge added. ID: $last_id');</script>";

            } catch (Exception $e) {
                mysqli_rollback($db);
                echo "<script>alert('FAILED (rolled back): ".addslashes($e->getMessage())."');</script>";
            }
        }
    }
}


// -------------------- DELETE (kept same style) --------------------
if (isset($_POST['DELETE'])) {
    $id = (int)($_REQUEST['id'] ?? 0);
    if ($id > 0) {
        $query23 = "DELETE FROM alltest WHERE id=$id";
        mysqli_query($con, $query23) or die(mysqli_error($con));
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Medicine - Hospital Charges</title>

  <!-- ✅ Bootstrap + Select2 -->
  <link rel="stylesheet" href="jsnew/bootstrap.min.css">
  <link rel="stylesheet" href="jsnew/select2.min.css">

  <style>
    body { background:#f3f4f6; font-family: Arial, sans-serif; }
    .card { border-radius: 14px; box-shadow: 0 8px 24px rgba(0,0,0,.08); border:0; }
    .card-header { border-radius: 14px 14px 0 0; font-weight: 800; }
    .form-label { font-weight: 700; }
    .select2-container .select2-selection--single { height: 46px; }
    .select2-container--default .select2-selection--single .select2-selection__rendered { line-height: 44px; }
    .select2-container--default .select2-selection--single .select2-selection__arrow { height: 46px; }
    .form-control { height: 46px; font-weight: 700; }
    table td, table th { vertical-align: middle !important; }
  </style>

</head>

<body>

<!-- ✅ MENU (your existing menu can stay; keeping minimal) -->
<div class="container my-4">

  <div class="card">
    <div class="card-header bg-success text-white text-center">
      ADD HOSPITAL CHARGES
    </div>

    <div class="card-body">

      <form action="" method="post" id="chargeForm">
        <div class="row g-3 align-items-end">

          <!-- ✅ Select item (Select2) -->
          <div class="col-lg-5">
            <label class="form-label">Select Used Item</label>
            <select name="medi6" id="medi6" class="form-control" required></select>
            <small class="text-muted">Type to search by sno / code / item name</small>
          </div>

          <!-- ✅ Item Name -->
          <div class="col-lg-4">
            <label class="form-label">Item Name</label>
            <input type="text" name="medi1" id="gname" class="form-control" readonly required>
          </div>

          <!-- ✅ Stock -->
          <div class="col-lg-1">
            <label class="form-label">Stock</label>
            <input type="text" name="tqty" id="tqty" class="form-control" readonly required>
          </div>

          <!-- ✅ Used Qty -->
          <div class="col-lg-1">
            <label class="form-label">Used</label>
            <input type="number" name="pdos" id="pdos" class="form-control" min="1" required>
          </div>

          <!-- ✅ Remarks -->
          <div class="col-lg-1">
            <label class="form-label">Remarks</label>
            <input type="text" name="remarks" class="form-control">
          </div>

          <!-- ✅ Submit button -->
          <div class="col-12 text-end mt-2">
            <?php if ($discharge_ipd != 'Discharge Bill Confirmed') { ?>
              <button type="submit" name="Submit1" class="btn btn-success px-4">ADD</button>
            <?php } else { ?>
              <button type="button" class="btn btn-danger px-4" disabled>Bill Already Confirmed</button>
            <?php } ?>
          </div>

        </div>
      </form>

      <hr class="my-4">

      <!-- ✅ LIST TABLE -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-success">
            <tr>
              <th style="width:70px;">S.No</th>
              <th>MRN</th>
              <th>ITEM</th>
              <th>Date</th>
              <th>QTY</th>
              <th style="width:120px;">DELETE</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $count = 1;
            $sel_query = "SELECT * FROM inhoscharge WHERE pmrn='$pmrn' AND eid='$eid' ORDER BY `date` DESC";
            $result = mysqli_query($con, $sel_query);

            while ($row = mysqli_fetch_assoc($result)) {

              $rrt = $row['code']; // you used it as code
              $query4p = mysqli_query($db, "SELECT * FROM storenew WHERE eid='$rrt' LIMIT 1");
              $datap = mysqli_fetch_assoc($query4p);
              $uom = $datap['uom'] ?? '';

          ?>
            <tr>
              <td class="text-center"><?php echo $count; ?></td>
              <td class="text-center"><?php echo htmlspecialchars($row["pmrn"]); ?></td>
              <td><?php echo htmlspecialchars($row["medi"]); ?></td>
              <td class="text-center"><?php echo htmlspecialchars($row["date"]); ?></td>
              <td class="text-center"><?php echo (int)$row["pdos"] . ' (' . htmlspecialchars($uom) . ')'; ?></td>
              <td class="text-center">
                <a class="btn btn-sm btn-outline-danger"
                   href="inhosdelete?id3=<?php echo (int)$row["id"]; ?>&pmrn=<?php echo urlencode($pmrn); ?>&eid=<?php echo (int)$eid; ?>&invoice_no=<?php echo urlencode($row['invoice_no'] ?? ''); ?>&admission_no=<?php echo (int)$api_adminssion_no; ?>&code=<?php echo urlencode($rrt); ?>&pdos=<?php echo (int)$row['pdos']; ?>&price=<?php echo (int)$row['price']; ?>">
                   DELETE
                </a>
              </td>
            </tr>
          <?php
              $count++;
            }
          ?>
          </tbody>
        </table>
      </div>

      <div class="text-end">
        <button class="btn btn-secondary" onclick="self.close()">Close</button>
      </div>

    </div>
  </div>

</div>

<!-- ✅ JS -->
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/bootstrap.min.js"></script>
<script src="jsnew/select2.min.js"></script>

<script>
$(function () {

  // ✅ Select2 AJAX search
  $('#medi6').select2({
    placeholder: 'Search item...',
    allowClear: true,
    width: '100%',
    ajax: {
      url: 'ajax_items.php',
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return { q: params.term || '' };
      },
      processResults: function (data) {
        return { results: data };
      },
      cache: true
    }
  });

  // ✅ when item selected, fill item name + qty
  $('#medi6').on('select2:select', function (e) {
    var item = e.params.data;

    $('#gname').val(item.item_name || '');
    $('#tqty').val(item.qty ?? '');

    var qty = parseInt(item.qty || 0, 10);
    $('#tqty').css('color', qty > 0 ? 'green' : 'red');
  });

  // ✅ clear fields when cleared
  $('#medi6').on('select2:clear', function () {
    $('#gname').val('');
    $('#tqty').val('').css('color', '');
  });

  // ✅ stop submit if used qty > stock
  $('#chargeForm').on('submit', function(e){
    var stock = parseInt($('#tqty').val() || 0, 10);
    var used  = parseInt($('#pdos').val() || 0, 10);

    if (used > stock) {
      e.preventDefault();
      alert('Used qty cannot be greater than stock!');
    }
  });

});
</script>

</body>
</html>