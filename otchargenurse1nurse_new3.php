<?php
session_start();
require('db1.php');

/* ✅ ROLE CHECK */
$role = $_SESSION['sess_userrole'] ?? '';
$allowedRoles = ['billin','bill','mng','nurse'];
if (!isset($_SESSION['sess_username']) || !in_array($role, $allowedRoles, true)) {
  header('Location: login2?err=2');
  exit;
}

$user = $_SESSION["sess_username"] ?? '';
$pmrn = $_REQUEST['pmrn'] ?? '';
$eid  = (int)($_REQUEST['eid'] ?? 0);

/* ✅ DB */
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
mysqli_set_charset($db,'utf8mb4');

/* ✅ LOAD PATIENT */
$query4 = mysqli_query($db,"SELECT * FROM inpatient WHERE pmrn='$pmrn' AND discharge='' AND eid='$eid' LIMIT 1");
$data = mysqli_fetch_assoc($query4);

$pname = $data['pname'] ?? '';
$api_adminssion_no = (int)($data['OUT_ADMISSION_NO_PK'] ?? 0);
$discharge_ipd = $data['disstatus'] ?? '';

/* ✅ SUBMIT */
if(isset($_POST['Submit1'])){

  $item_id = $_POST['item'] ?? '';               // hits_list.id
  $pdos    = (int)($_POST['pdos'] ?? 0);
  $remarks = $_POST['remarks'] ?? '';
  $remarks = mysqli_real_escape_string($db, $remarks);

  // For stock items
  $sno     = $_POST['sno'] ?? '';
  $sno     = mysqli_real_escape_string($db, $sno);

  $location = $_POST['location'] ?? '';
  $location = mysqli_real_escape_string($db, $location);

  $stock_required = (int)($_POST['stock_required'] ?? 1);

  $date1 = date('m/d/Y');
  $date2 = date('d/m/Y');

  if($item_id==='' || $pdos<=0){
    echo "<script>alert('Please select item and used qty');</script>";
  } else {

    $item_id_safe = mysqli_real_escape_string($db, $item_id);
    $sel1 = mysqli_query($db,"SELECT * FROM hits_list WHERE id='$item_id_safe' LIMIT 1");
    $result1 = mysqli_fetch_assoc($sel1);

    if(!$result1){
      echo "<script>alert('Item not found in hits_list');</script>";
    } else {

      $medi1_raw = $result1['item_name'] ?? '';
      $medi1     = str_replace("'", "''", $medi1_raw);

      $dcode    = $result1['code'] ?? '';
      $price    = (int)($result1['ipd_charge'] ?? 0);
      $sub_type = $result1['sub_type'] ?? '';
      $ip       = $result1['ip'] ?? '';
      $op       = $result1['op'] ?? '';
      $acode    = $result1['acode'] ?? '';
      $ccentre  = $result1['ccentre'] ?? '';

      $p11 = $price * $pdos;

      /* ✅ PACKAGE CHECK */
      $medi1_safe = mysqli_real_escape_string($db, $medi1_raw);
      $sel_p = mysqli_query($db,"SELECT COUNT(id) AS c FROM set_package WHERE iname='$medi1_safe' LIMIT 1");
      $result_p = mysqli_fetch_assoc($sel_p);
      $dis_pack = (int)($result_p['c'] ?? 0);

      if($user==''){
        echo "<script>alert('Session Expired');</script>";
      } else if($dcode==''){
        echo "<script>alert('Item code missing');</script>";
      }

      /* ===========================
         ✅ PACKAGE INSERT
         - no stock check
         - no stock update
         =========================== */
      else if($dis_pack > 0){

        mysqli_begin_transaction($db);
        try {

          $query15 = mysqli_query($db,"SELECT * FROM package_inves WHERE package_name='$medi1_safe' AND status='Active'");
          if(!$query15){
            throw new Exception("package_inves query failed: ".mysqli_error($db));
          }

          $found = 0;

          while($data15 = mysqli_fetch_assoc($query15)){
            $found = 1;

            $ii       = $data15["iname"];
            $t_price  = (int)$data15["tprice"];
            $pdos_p   = (int)$data15["qty"];
            $code     = $data15["code"];

            $code_safe = mysqli_real_escape_string($db, $code);

            $sel_pkg = mysqli_query($db,"SELECT * FROM hits_list WHERE code='$code_safe' LIMIT 1");
            $result_pkg = mysqli_fetch_assoc($sel_pkg);

            $sub_type_p = $result_pkg['sub_type'] ?? $sub_type;
            $ip_p       = $result_pkg["ip"] ?? $ip;
            $op_p       = $result_pkg["op"] ?? $op;
            $acode_p    = $result_pkg["acode"] ?? $acode;
            $ccentre_p  = $result_pkg["ccentre"] ?? $ccentre;

            $ii_safe = str_replace("'", "''", $ii);

            $sql = "INSERT INTO inhoscharge
              (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`price`,`date1`,`type`,`remarks`,`ip`,`op`,`acct_code`,`ccentre`,`user`)
              VALUES
              ('$pmrn','$pname','$ii_safe','$eid','$date1','$pdos_p','$code_safe','$t_price','$date2','$sub_type_p','Package','$ip_p','$op_p','$acode_p','$ccentre_p','$user')";

            if(!mysqli_query($db, $sql)){
              throw new Exception("Package inhoscharge insert failed: ".mysqli_error($db));
            }
            $last_id = mysqli_insert_id($db);

            $date = date('Y-m-d');
            $tb_q = mysqli_query($db,"SELECT tb_op, tb_ip FROM acct_master_new WHERE item_code='$code_safe' LIMIT 1");
            $tb_result = mysqli_fetch_assoc($tb_q);

            if(!$tb_result){
              throw new Exception("acct_master_new not found for item_code: $code_safe");
            }

            $tb_data = ($tb_result['tb_op']!='') ? $tb_result['tb_op'] : $tb_result['tb_ip'];
            if($tb_data==''){
              throw new Exception("TB account empty for item_code: $code_safe");
            }

            $ins_query = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                          VALUES ('$last_id','CR','$tb_data','$date','$t_price','IPD_HOS_CHARGE')";
            if(!mysqli_query($db, $ins_query)){
              throw new Exception("TB CR insert failed: ".mysqli_error($db));
            }

            $ins_query2 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                           VALUES ('$last_id','DR','111999','$date','$t_price','IPD_HOS_CHARGE')";
            if(!mysqli_query($db, $ins_query2)){
              throw new Exception("TB DR insert failed: ".mysqli_error($db));
            }
          }

          if(!$found){
            throw new Exception("No active package items found in package_inves for: ".$medi1_raw);
          }

          mysqli_commit($db);
          echo "<script>alert('SUCCESS: Package added successfully');</script>";

        } catch(Exception $e){
          mysqli_rollback($db);
          echo "<script>alert('FAILED (rolled back): ".addslashes($e->getMessage())."');</script>";
        }

      }

      /* ===========================
         ✅ NORMAL STOCK ITEM (SNO)
         - must be CCU
         - sno-wise stock only
         =========================== */
      else {

        if($sno===''){
          echo "<script>alert('Please select SNO from stock list');</script>";
        } else {

          // ✅ enforce CCU for stock items
          if(strtolower($location) !== 'ccu'){
            echo "<script>alert('Only CCU stock can be issued from this form. Selected location: ".addslashes($location)."');</script>";
          } else {

            $dcode_safe = mysqli_real_escape_string($db, $dcode);

            $stock_q = mysqli_query($db,"
              SELECT sno, add_qty, location
              FROM purchase_stock3
              WHERE sno='$sno'
                AND code='$dcode_safe'
                AND location='ccu'
              LIMIT 1
            ");
            $stock_row = mysqli_fetch_assoc($stock_q);

            if(!$stock_row){
              echo "<script>alert('Selected SNO stock not found in CCU');</script>";
            } else {

              $stock_qty = (int)$stock_row['add_qty'];

              if($pdos > $stock_qty){
                echo "<script>alert('Used qty cannot be greater than stock! Stock: $stock_qty');</script>";
              } else {

                $new_qty = $stock_qty - $pdos;

                mysqli_begin_transaction($db);
                try {

                  $sql = "INSERT INTO inhoscharge
                    (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`price`,`date1`,`type`,`remarks`,`ip`,`op`,`acct_code`,`ccentre`,`user`,`sno`,`e_point`)
                    VALUES
                    ('$pmrn','$pname','$medi1','$eid','$date1','$pdos','$dcode','$p11','$date2','$sub_type','$remarks','$ip','$op','$acode','$ccentre','$user','$sno','1')";

                  if(!mysqli_query($db,$sql)){
                    throw new Exception("inhoscharge insert failed: ".mysqli_error($db));
                  }
                  $last_id = mysqli_insert_id($db);

                  $up = "UPDATE purchase_stock3 SET add_qty='$new_qty' WHERE sno='$sno' AND location='ccu'";
                  if(!mysqli_query($db,$up)){
                    throw new Exception("Stock update failed: ".mysqli_error($db));
                  }

                  $date = date('Y-m-d');
                  $tb_q = mysqli_query($db,"SELECT tb_op, tb_ip FROM acct_master_new WHERE item_code='$dcode_safe' LIMIT 1");
                  $tb_result = mysqli_fetch_assoc($tb_q);
                  if(!$tb_result) throw new Exception("acct_master_new not found for item_code: $dcode");

                  $tb_data = ($tb_result['tb_op']!='') ? $tb_result['tb_op'] : $tb_result['tb_ip'];
                  if($tb_data=='') throw new Exception("TB account empty for item_code: $dcode");

                  $ins1 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                           VALUES ('$last_id','CR','$tb_data','$date','$p11','IPD_HOS_CHARGE')";
                  if(!mysqli_query($db,$ins1)) throw new Exception("TB CR insert failed: ".mysqli_error($db));

                  $ins2 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                           VALUES ('$last_id','DR','111999','$date','$p11','IPD_HOS_CHARGE')";
                  if(!mysqli_query($db,$ins2)) throw new Exception("TB DR insert failed: ".mysqli_error($db));

                  mysqli_commit($db);
                  echo "<script>alert('SUCCESS: Charge added');</script>";

                } catch(Exception $e){
                  mysqli_rollback($db);
                  echo "<script>alert('FAILED (rolled back): ".addslashes($e->getMessage())."');</script>";
                }
              }
            }
          }
        }
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital Charges</title>

  <link rel="stylesheet" href="jsnew/bootstrap.min.css">
  <link rel="stylesheet" href="jsnew/select2.min.css">

  <script src="jsnew/jquery.min.js"></script>
  <script src="jsnew/select2.min.js"></script>
  <script src="jsnew/bootstrap.min.js"></script>

  <style>
    body { background:#f3f4f6; font-family: Arial, sans-serif; }
    form { max-width:1200px; margin:20px auto; background:#fff; padding:18px; border-radius:12px; box-shadow:0 10px 28px rgba(0,0,0,.08); }
    .select2-container .select2-selection--single{ height:46px; }
    .select2-container--default .select2-selection--single .select2-selection__rendered{ line-height:44px; }
    .select2-container--default .select2-selection--single .select2-selection__arrow{ height:46px; }
    .form-control{ height:46px; font-weight:600; }

    /* ✅ location badge styles */
    .loc-ccu { background:#d1fae5 !important; border:1px solid #10b981 !important; color:#065f46 !important; }
    .loc-icu { background:#dbeafe !important; border:1px solid #3b82f6 !important; color:#1e3a8a !important; }
    .loc-ot  { background:#ffedd5 !important; border:1px solid #f97316 !important; color:#7c2d12 !important; }
    .loc-er  { background:#fee2e2 !important; border:1px solid #ef4444 !important; color:#7f1d1d !important; }
    .loc-store { background:#f3f4f6 !important; border:1px solid #6b7280 !important; color:#111827 !important; }
    .loc-package { background:#fee2e2 !important; border:1px solid #dc2626 !important; color:#7f1d1d !important; font-weight:800; }
  </style>
</head>

<body>

<form action="" method="post" id="chargeForm">
  <table class="table table-bordered">
    <tr>
      <td colspan="20" class="text-center bg-success text-white">
        <strong>ADD HOSPITAL CHARGES</strong>
      </td>
    </tr>

    <tr>
      <td colspan="8" class="text-center"><strong>Select Used Item (SNO wise)</strong></td>
      <td colspan="4" class="text-center"><strong>Item Name</strong></td>
      <td colspan="2" class="text-center"><strong>Location</strong></td>
      <td colspan="2" class="text-center"><strong>Available Stock</strong></td>
      <td colspan="2" class="text-center"><strong>Used Qty</strong></td>
      <td colspan="2" class="text-center"><strong>Remarks</strong></td>
    </tr>

    <tr>
      <td colspan="8">
        <select name="item" id="con_charge1" class="form-control" required style="width:100%;">
          <option value="">---Type to Search---</option>
        </select>

        <input type="hidden" name="sno" id="sno">
        <input type="hidden" name="stock_required" id="stock_required" value="1">
        <input type="hidden" name="location" id="location">
      </td>

      <td colspan="4">
        <input type="text" name="medi1" id="gname" class="form-control" readonly required>
      </td>

      <td colspan="2">
        <input type="text" id="location_display" class="form-control" readonly>
      </td>

      <td colspan="2">
        <input type="text" name="tqty" id="tqty" class="form-control" readonly>
      </td>

      <td colspan="2">
        <input type="number" name="pdos" id="pdos" class="form-control" min="1" required>
      </td>

      <td colspan="2">
        <input type="text" name="remarks" id="remarks" class="form-control" placeholder="Remarks">
      </td>
    </tr>

    <tr>
      <td colspan="20" class="text-end">
        <?php if($discharge_ipd!='Discharge Bill Confirmed'){ ?>
          <button type="submit" name="Submit1" id="btnAdd" class="btn btn-success px-4">ADD</button>
        <?php } else { ?>
          <button type="button" class="btn btn-danger px-4" disabled>Bill Already Confirmed</button>
        <?php } ?>
      </td>
    </tr>

  </table>
</form>

<script>
function setLocationStyle(loc, isPackage){
  var $f = $("#location_display");
  $f.removeClass("loc-ccu loc-icu loc-ot loc-er loc-store loc-package");

  if(isPackage){
    $f.addClass("loc-package");
    return;
  }

  loc = (loc || "").toLowerCase();
  if(loc === "ccu") $f.addClass("loc-ccu");
  else if(loc === "icu") $f.addClass("loc-icu");
  else if(loc === "ot")  $f.addClass("loc-ot");
  else if(loc === "er")  $f.addClass("loc-er");
  else $f.addClass("loc-store");
}

function validateAddButton(){
  var stockRequired = parseInt($("#stock_required").val() || "1", 10);
  var loc = ($("#location").val() || "").toLowerCase();
  var stock = parseInt($("#tqty").val() || "0", 10);
  var used  = parseInt($("#pdos").val() || "0", 10);

  // default: enabled
  var disable = false;
  var reason = "";

  if(stockRequired === 1){
    if(loc !== "ccu"){
      disable = true;
      reason = "Only CCU stock allowed";
    }
    if(used > stock && stock > 0){
      disable = true;
      reason = "Used qty > stock";
    }
  }

  $("#btnAdd").prop("disabled", disable);
  $("#btnAdd").attr("title", reason);
}

$(function(){

  $("#con_charge1").select2({
    width: '100%',
    placeholder: "---Type to Search---",
    allowClear: true,
    minimumInputLength: 2,
    ajax: {
      url: "search_hits_data_new1.php",
      type: "POST",
      dataType: "json",
      delay: 350,
      data: function (params) {
        return { searchTerm: params.term || "" };
      },
      processResults: function (response) {
        return { results: response };
      },
      cache: true
    }
  });

  $("#con_charge1").on("select2:select", function(e){
    var d = e.params.data;

    $("#gname").val(d.item_name || "");
    $("#sno").val(d.sno || "");
    $("#stock_required").val(d.stock_required ?? 1);
    $("#location").val(d.location || "");

    var isPackage = parseInt(d.is_package || 0, 10) === 1;

    if(isPackage){
      $("#location_display").val("PACKAGE");
      setLocationStyle("", true);
      $("#tqty").val("");
    } else {
      $("#location_display").val(d.location || "");
      setLocationStyle(d.location || "", false);
      $("#tqty").val(d.qty ?? "");
      var qty = parseInt(d.qty || 0, 10);
      $("#tqty").css("color", qty > 0 ? "green" : "red");
    }

    validateAddButton();
  });

  $("#con_charge1").on("select2:clear", function(){
    $("#gname").val("");
    $("#tqty").val("").css("color","");
    $("#sno").val("");
    $("#stock_required").val("1");
    $("#location").val("");
    $("#location_display").val("").removeClass("loc-ccu loc-icu loc-ot loc-er loc-store loc-package");
    validateAddButton();
  });

  $("#pdos").on("keyup change", function(){
    validateAddButton();
  });

  $("#chargeForm").on("submit", function(e){
    var stockRequired = parseInt($("#stock_required").val() || "1", 10);
    if(stockRequired === 0) return true; // package ok

    var loc = ($("#location").val() || "").toLowerCase();
    if(loc !== "ccu"){
      e.preventDefault();
      alert("Only CCU stock can be issued from this form.");
      return false;
    }

    var stock = parseInt($("#tqty").val() || "0", 10);
    var used  = parseInt($("#pdos").val() || "0", 10);
    if(used > stock){
      e.preventDefault();
      alert("Used qty cannot be greater than stock!");
      return false;
    }
  });

});
</script>

</body>
</html>