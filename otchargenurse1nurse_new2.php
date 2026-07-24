<?php
session_start();
require('db1.php');

/* ✅ ROLE CHECK (FIXED) */
$role = $_SESSION['sess_userrole'] ?? '';
$allowedRoles = ['billin','bill','mng','nurse'];

if (!isset($_SESSION['sess_username']) || !in_array($role, $allowedRoles, true)) {
  header('Location: login2?err=2');
  exit;
}

/* ✅ BASIC VARS */
$today = date('Y-m-d');
$timestamp = strtotime($today);
$formattedDate = date('d-M-Y', $timestamp);

$user = $_SESSION["sess_username"] ?? '';

$pmrn = $_REQUEST['pmrn'] ?? '';
$pmrn_int = (int)$pmrn;
$eid = (int)($_REQUEST['eid'] ?? 0);

/* ✅ PATIENT LOAD */
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query4 = mysqli_query($db,"SELECT * FROM inpatient WHERE pmrn='$pmrn' AND discharge='' AND eid='$eid'");
$data = mysqli_fetch_assoc($query4);

$ward = $data['room'] ?? '';
$bed1 = $data['room1'] ?? '';
$adoc = $data['adoc'] ?? '';
$pname = $data['pname'] ?? '';
$api_adminssion_no = (int)($data['OUT_ADMISSION_NO_PK'] ?? 0);
$discharge_ipd = $data['disstatus'] ?? '';

/* ✅ SUBMIT */
if(isset($_POST['Submit1'])){

    $item_id = $_POST['item'] ?? '';       // hits_list.id
    $pdos    = (int)($_POST['pdos'] ?? 0);
    $remarks = $_POST['remarks'] ?? '';
    $remarks = mysqli_real_escape_string($db, $remarks);
  
    $sno_post = $_POST['sno'] ?? '';       // from select2 (normal items)
    $sno_post = mysqli_real_escape_string($db, $sno_post);
  
    $date1 = date('m/d/Y');
    $date2 = date('d/m/Y');
  
    if($item_id==='' || $pdos<=0){
      echo "<script>alert('Please select item and used qty');</script>";
    } else {
  
      // 1) hits_list row
      $item_id_safe = mysqli_real_escape_string($db, $item_id);
      $sel1 = mysqli_query($db,"SELECT * FROM hits_list WHERE id='$item_id_safe' LIMIT 1");
      $result1 = mysqli_fetch_assoc($sel1);
  
      if(!$result1){
        echo "<script>alert('Item not found in hits_list');</script>";
      } else {
  
        $medi1_raw = $result1['item_name'] ?? '';
        $medi1 = str_replace("'", "''", $medi1_raw);
  
        $dcode = $result1['code'] ?? '';
        $price = (int)($result1['ipd_charge'] ?? 0);
        $sub_type = $result1['sub_type'] ?? '';
        $ip = $result1['ip'] ?? '';
        $op = $result1['op'] ?? '';
        $acode = $result1['acode'] ?? '';
        $ccentre = $result1['ccentre'] ?? '';
  
        $p11 = $price * $pdos;
  
        // 2) package check
        $sel_p = mysqli_query($db,"SELECT COUNT(id) AS c FROM set_package WHERE iname='$medi1' LIMIT 1");
        $result_p = mysqli_fetch_assoc($sel_p);
        $dis_pack = (int)($result_p['c'] ?? 0);
  
        if($user==''){
          echo "<script>alert('Session Expired');</script>";
        }
        else if($dcode==''){
          echo "<script>alert('Item code missing in hits_list');</script>";
        }
        else {
  
          /* ============================================================
             ✅ CASE A: PACKAGE → NO STOCK CHECK, NO STOCK DEDUCTION
          ============================================================ */
          if($dis_pack > 0){
  
            mysqli_begin_transaction($db);
  
            try {
  
              // Insert inhoscharge (NO sno needed)
              $sql = "INSERT INTO inhoscharge
                (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`price`,`date1`,`type`,`remarks`,`ip`,`op`,`acct_code`,`ccentre`,`user`,`e_point`)
                VALUES
                ('$pmrn','$pname','$medi1','$eid','$date1','$pdos','$dcode','$p11','$date2','$sub_type','$remarks','$ip','$op','$acode','$ccentre','$user','1')";
  
              if(!mysqli_query($db,$sql)){
                throw new Exception("Package insert failed: ".mysqli_error($db));
              }
              $last_id = mysqli_insert_id($db);
  
              // TB lookup
              $date = date('Y-m-d');
              $dcode_safe = mysqli_real_escape_string($db, $dcode);
              $tb_q = mysqli_query($db,"SELECT tb_op, tb_ip FROM acct_master_new WHERE item_code='$dcode_safe' LIMIT 1");
              $tb_result = mysqli_fetch_assoc($tb_q);
              if(!$tb_result) throw new Exception("acct_master_new not found for item_code: $dcode");
  
              $tb_data = ($tb_result['tb_op']!='') ? $tb_result['tb_op'] : $tb_result['tb_ip'];
              if($tb_data=='') throw new Exception("TB account code empty for item_code: $dcode");
  
              // TB CR
              $ins1 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                       VALUES ('$last_id','CR','$tb_data','$date','$p11','IPD_HOS_CHARGE')";
              if(!mysqli_query($db,$ins1)){
                throw new Exception("TB CR insert failed: ".mysqli_error($db));
              }
  
              // TB DR
              $ins2 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                       VALUES ('$last_id','DR','111999','$date','$p11','IPD_HOS_CHARGE')";
              if(!mysqli_query($db,$ins2)){
                throw new Exception("TB DR insert failed: ".mysqli_error($db));
              }
  
              mysqli_commit($db);
              echo "<script>alert('SUCCESS: Package charge added. ID: $last_id');</script>";
  
            } catch(Exception $e){
              mysqli_rollback($db);
              echo "<script>alert('FAILED (rolled back): ".addslashes($e->getMessage())."');</script>";
            }
  
          }
  
          /* ============================================================
             ✅ CASE B: NORMAL ITEM → CHECK STOCK (CCU) + DEDUCT
          ============================================================ */
          else {
  
            $dcode_safe = mysqli_real_escape_string($db, $dcode);
  
            // Use sno from select2 if given, else pick oldest batch in CCU
            if($sno_post !== ''){
              $stock_q = mysqli_query($db,"
                SELECT sno, add_qty
                FROM purchase_stock3
                WHERE sno='$sno_post'
                  AND code='$dcode_safe'
                  AND location='ccu'
                LIMIT 1
              ");
            } else {
              $stock_q = mysqli_query($db,"
                SELECT sno, add_qty
                FROM purchase_stock3
                WHERE code='$dcode_safe'
                  AND location='ccu'
                  AND add_qty > 0
                ORDER BY sno ASC
                LIMIT 1
              ");
            }
  
            $stock_row = mysqli_fetch_assoc($stock_q);
  
            if(!$stock_row){
              echo "<script>alert('No stock found in CCU for this item');</script>";
            } else {
  
              $sno = $stock_row['sno'];
              $stock_qty = (int)$stock_row['add_qty'];
  
              if($pdos > $stock_qty){
                echo "<script>alert('Used qty cannot be greater than stock! Stock: $stock_qty');</script>";
              } else {
  
                $new_qty = $stock_qty - $pdos;
  
                mysqli_begin_transaction($db);
  
                try {
  
                  // Insert inhoscharge (WITH sno)
                  $sql = "INSERT INTO inhoscharge
                    (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`price`,`date1`,`type`,`remarks`,`ip`,`op`,`acct_code`,`ccentre`,`user`,`sno`,`e_point`)
                    VALUES
                    ('$pmrn','$pname','$medi1','$eid','$date1','$pdos','$dcode','$p11','$date2','$sub_type','$remarks','$ip','$op','$acode','$ccentre','$user','$sno','1')";
  
                  if(!mysqli_query($db,$sql)){
                    throw new Exception("Insert failed: ".mysqli_error($db));
                  }
                  $last_id = mysqli_insert_id($db);
  
                  // Update stock
                  $up = "UPDATE purchase_stock3 SET add_qty='$new_qty' WHERE sno='$sno' AND location='ccu'";
                  if(!mysqli_query($db,$up)){
                    throw new Exception("Stock update failed: ".mysqli_error($db));
                  }
  
                  // TB lookup
                  $date = date('Y-m-d');
                  $tb_q = mysqli_query($db,"SELECT tb_op, tb_ip FROM acct_master_new WHERE item_code='$dcode_safe' LIMIT 1");
                  $tb_result = mysqli_fetch_assoc($tb_q);
                  if(!$tb_result) throw new Exception("acct_master_new not found for item_code: $dcode");
  
                  $tb_data = ($tb_result['tb_op']!='') ? $tb_result['tb_op'] : $tb_result['tb_ip'];
                  if($tb_data=='') throw new Exception("TB account code empty for item_code: $dcode");
  
                  // TB CR
                  $ins1 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                           VALUES ('$last_id','CR','$tb_data','$date','$p11','IPD_HOS_CHARGE')";
                  if(!mysqli_query($db,$ins1)){
                    throw new Exception("TB CR insert failed: ".mysqli_error($db));
                  }
  
                  // TB DR
                  $ins2 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                           VALUES ('$last_id','DR','111999','$date','$p11','IPD_HOS_CHARGE')";
                  if(!mysqli_query($db,$ins2)){
                    throw new Exception("TB DR insert failed: ".mysqli_error($db));
                  }
  
                  mysqli_commit($db);
                  echo "<script>alert('SUCCESS: Charge added. ID: $last_id');</script>";
  
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Medicine</title>

  <!-- ✅ Load only once (FAST) -->
  <link rel="stylesheet" href="jsnew/bootstrap.min.css">
  <link rel="stylesheet" href="jsnew/select2.min.css">

  <script src="jsnew/jquery.min.js"></script>
  <script src="jsnew/select2.min.js"></script>
  <script src="jsnew/bootstrap.min.js"></script>

  <style>
    body{ background:#f3f4f6; font-family: Arial, sans-serif; }
    form{ max-width:1200px; margin:20px auto; background:#fff; padding:18px; border-radius:12px; box-shadow:0 10px 28px rgba(0,0,0,.08);}
    .select2-container .select2-selection--single{ height:42px; }
    .select2-container--default .select2-selection--single .select2-selection__rendered{ line-height:40px; }
    .select2-container--default .select2-selection--single .select2-selection__arrow{ height:42px; }
  </style>
</head>

<body>

<form action="" method="post">
  <table align="center" class="table table-bordered" id="dynamic_field">
    <tr>
      <td colspan="20" align="center" bgcolor="lightgreen">
        <label><strong>ADD HOSPITAL CHARGES</strong></label>
      </td>
    </tr>

    <tr>
      <td colspan="15" align="center"><label><strong>Select Used Items</strong></label></td>
      <td colspan="5" align="center"><label><strong>Select Used QTY</strong></label></td>
    </tr>

    <tr>
      <td colspan="15" align="center">

        <!-- ✅ FIXED: id/class correct + no onchange/GetDetail needed -->
        <select name="item" id="con_charge1" class="form-control" required style="width:100%;">
          <option value="">---Type to Search---</option>
          <!-- Optional static option (will break unless you handle it in PHP) -->
          <option value="Service Charge">Service Charge</option>
        </select>

        <script>
        $(function(){
          $("#con_charge1").select2({
            width: '100%',
            placeholder: "---Type to Search---",
            allowClear: true,
            minimumInputLength: 2, // ✅ big speed boost
            ajax: {
              url: "search_hits_data_new.php",
              type: "POST",
              dataType: "json",
              delay: 400,           // ✅ reduce requests
              data: function (params) {
                return { searchTerm: params.term || "" };
              },
              processResults: function (response) {
                return { results: response };
              },
              cache: true
            }
          });
        });
        </script>

      </td>

      <td colspan="5" align="center">
        <input type="number" name="pdos" class="form-control" required min="1">
      </td>
    </tr>

    <tr>
      <td colspan="20" align="right">
        <?php
          if($discharge_ipd!='Discharge Bill Confirmed'){
            echo '<button type="submit" name="Submit1" class="btn btn-success">ADD</button>';
          } else {
            echo '<button type="button" class="btn btn-danger" disabled>Bill Already Confirmed</button>';
          }
        ?>
      </td>
    </tr>

    <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="2" align="center"><strong>MRN</strong></td>
      <td colspan="5" align="center"><strong>ITEM</strong></td>
      <td colspan="5" align="center"><strong>Date</strong></td>
      <td colspan="5" align="center"><strong>QTY</strong></td>
      <td colspan="2" align="center"><strong>DELETE</strong></td>
    </tr>

    <?php
      $count=1;
      $sel_query="SELECT * FROM inhoscharge WHERE pmrn='$pmrn' AND eid='$eid' ORDER BY `date` DESC";
      $result = mysqli_query($con,$sel_query);

      while($row = mysqli_fetch_assoc($result)){
    ?>
      <tr>
        <td align="center" colspan="1"><?php echo $count; ?></td>
        <td align="center" colspan="2"><?php echo $row["pmrn"]; ?></td>
        <td align="center" colspan="5"><?php echo $row["medi"]; ?></td>
        <td align="center" colspan="5"><?php echo $row["date"]; ?></td>

        <?php
          $rrt=$row['code'];
          $query4p = mysqli_query($db,"SELECT * FROM storenew WHERE eid='$rrt' LIMIT 1");
          $datap = mysqli_fetch_assoc($query4p);
          $uom = $datap['uom'] ?? '';
        ?>

        <td align="center" colspan="5"><?php echo $row["pdos"].' ('.$uom.')'; ?></td>

        <td align="center" colspan="2">
          <a class="btn btn-sm btn-outline-danger"
             href="inhosdelete?id3=<?php echo $row["id"]; ?>&pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>&invoice_no=<?php echo $row['invoice_no']; ?>&admission_no=<?php echo $api_adminssion_no; ?>&code=<?php echo $rrt; ?>&pdos=<?php echo $row['pdos']; ?>&price=<?php echo $row['price']; ?>">
            DELETE
          </a>
        </td>
      </tr>
    <?php $count++; } ?>

    <tr>
      <td align="right" colspan="20">
        <button class="btn btn-secondary" type="button" onclick="self.close()">Close</button>
      </td>
    </tr>

  </table>
</form>

</body>
</html>