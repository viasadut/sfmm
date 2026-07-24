<?php
session_start();
require('db1.php');

if (!empty($_SESSION['flash_msg'])) {
  $msg  = $_SESSION['flash_msg'];
  $type = $_SESSION['flash_type'] ?? 'success';

  unset($_SESSION['flash_msg'], $_SESSION['flash_type']);

  $bg = ($type === 'success') ? '#d4edda' : '#f8d7da';
  $bd = ($type === 'success') ? '#c3e6cb' : '#f5c6cb';
  $cl = ($type === 'success') ? '#155724' : '#721c24';

  echo "<div style='margin:10px auto;max-width:1100px;padding:10px;border:1px solid $bd;background:$bg;color:$cl;border-radius:6px;font-family:Arial;'>
          " . htmlspecialchars($msg) . "
        </div>";
}

/* ✅ ROLE CHECK */
$role = $_SESSION['sess_userrole'] ?? '';
$allowedRoles = ['billin','bill','mng','nurse'];
if (!isset($_SESSION['sess_username']) || !in_array($role, $allowedRoles, true)) {
    header('Location: login2?err=2');
    exit;
}

/* ✅ VARS */
$user = $_SESSION["sess_username"] ?? '';
$pmrn = $_REQUEST['pmrn'] ?? '';
$eid  = (int)($_REQUEST['eid'] ?? 0);

/* ✅ mysqli */
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
mysqli_set_charset($db,'utf8mb4');

/* ✅ LOAD PATIENT */
$qPatient = mysqli_query($db,"SELECT * FROM inpatient WHERE pmrn='$pmrn' AND discharge='' AND eid='$eid' LIMIT 1");
$pData = mysqli_fetch_assoc($qPatient);
$pname = $pData['pname'] ?? '';
$api_adminssion_no = (int)($pData['OUT_ADMISSION_NO_PK'] ?? 0);
$discharge_ipd = $pData['disstatus'] ?? '';

/* ✅ Allowed STOCK locations */
$allowedStockLocs = [
  '5th floor block ab',
  '5th floor block cd',
  '6th floor block (a+b)',
  '6th floor block c',
  '6th floor block d',
  'ccu',
  'dialysis',
  'hmd unit',
  'icu',
  'ipd',
  'ipd-gynae',
  'ipd-pedi',
  'nicu',
  'nursing services',
  'medical icu',
  'surgical icu',
  'hdu'
];

/* =========================================================
   ✅ SUBMIT LOGIC (3 TYPES: STOCK / NOSTOCK / PACKAGE)
   ========================================================= */
if(isset($_POST['Submit1'])){

    $item_id   = $_POST['item'] ?? '';                    // hits_list.id
    $item_type = strtoupper($_POST['item_type'] ?? '');   // STOCK / NOSTOCK / PACKAGE
    $pdos      = (int)($_POST['pdos'] ?? 0);

    $remarks   = $_POST['remarks'] ?? '';
    $remarks   = mysqli_real_escape_string($db, $remarks);

    // stock fields
    $sno       = $_POST['sno'] ?? '';
    $sno       = mysqli_real_escape_string($db, $sno);

    $location  = $_POST['location'] ?? '';
    $location  = strtolower(trim($location));
    $location  = mysqli_real_escape_string($db, $location);

    $date1 = date('m/d/Y');
    $date2 = date('d/m/Y');

    if($item_id === '' || $pdos <= 0){
        echo "<script>alert('Please select item and enter used qty');</script>";
    } else {

        $item_id_safe = mysqli_real_escape_string($db, $item_id);

        // ✅ load hits_list base
        $selHL = mysqli_query($db,"SELECT * FROM hits_list WHERE id='$item_id_safe' LIMIT 1");
        $hl = mysqli_fetch_assoc($selHL);

        if(!$hl){
            echo "<script>alert('Item not found in hits_list');</script>";
        } else {

            $medi1_raw = $hl['item_name'] ?? '';
            $medi1     = str_replace("'", "''", $medi1_raw);
            $dcode     = $hl['code'] ?? '';
            $price     = (int)($hl['ipd_charge'] ?? 0);

            $sub_type  = $hl['sub_type'] ?? '';
            $ip        = $hl['ip'] ?? '';
            $op        = $hl['op'] ?? '';
            $acode     = $hl['acode'] ?? '';
            $ccentre   = $hl['ccentre'] ?? '';

            $p11 = $price * $pdos;

            // ✅ find if this item is a package (dis_pack)
            $medi1_safe = mysqli_real_escape_string($db, $medi1_raw);
            $qPack = mysqli_query($db,"SELECT COUNT(id) AS c FROM set_package WHERE iname='$medi1_safe' LIMIT 1");
            $rPack = mysqli_fetch_assoc($qPack);
            $dis_pack = (int)($rPack['c'] ?? 0);

            // ✅ if it's package, force item_type PACKAGE (safety)
            if($dis_pack > 0){
                $item_type = 'PACKAGE';
            }

            if($user === ''){
                echo "<script>alert('Session Expired');</script>";
            }
            else if($dcode === ''){
                echo "<script>alert('Item code missing in hits_list');</script>";
            }

            /* =========================
               ✅ 3) PACKAGE LOGIC
               ========================= */
            else if($item_type === 'PACKAGE'){

                mysqli_begin_transaction($db);
                try {

                    $qItems = mysqli_query($db,"SELECT * FROM package_inves WHERE package_name='$medi1_safe' AND status='Active'");
                    if(!$qItems){
                        throw new Exception("package_inves query failed: ".mysqli_error($db));
                    }

                    $found = 0;

                    while($pkg = mysqli_fetch_assoc($qItems)){
                        $found = 1;

                        $ii      = $pkg["iname"];
                        $t_price = (int)$pkg["tprice"];
                        $qtyPkg  = (int)$pkg["qty"];
                        $codePkg = $pkg["code"];

                        $codePkgSafe = mysqli_real_escape_string($db, $codePkg);

                        // Load hits_list row for package item code (for accounts)
                        $qHL2 = mysqli_query($db,"SELECT * FROM hits_list WHERE code='$codePkgSafe' LIMIT 1");
                        $hl2  = mysqli_fetch_assoc($qHL2);

                        $sub_type_p = $hl2['sub_type'] ?? $sub_type;
                        $ip_p       = $hl2['ip'] ?? $ip;
                        $op_p       = $hl2['op'] ?? $op;
                        $acode_p    = $hl2['acode'] ?? $acode;
                        $ccentre_p  = $hl2['ccentre'] ?? $ccentre;

                        $ii_safe = str_replace("'", "''", $ii);

                        // insert inhoscharge for each package component
                        $sql = "INSERT INTO inhoscharge
                            (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`price`,`date1`,`type`,`remarks`,`ip`,`op`,`acct_code`,`ccentre`,`user`)
                            VALUES
                            ('$pmrn','$pname','$ii_safe','$eid','$date1','$qtyPkg','$codePkgSafe','$t_price','$date2','$sub_type_p','Package','$ip_p','$op_p','$acode_p','$ccentre_p','$user')";
                        if(!mysqli_query($db,$sql)){
                            throw new Exception("Package insert failed: ".mysqli_error($db));
                        }
                        $last_id = mysqli_insert_id($db);

                        // TB lookup
                        $date = date('Y-m-d');
                        $tb_q = mysqli_query($db,"SELECT tb_op, tb_ip FROM acct_master_new WHERE item_code='$codePkgSafe' LIMIT 1");
                        $tb_result = mysqli_fetch_assoc($tb_q);
                        if(!$tb_result){
                            throw new Exception("acct_master_new not found for item_code: ".$codePkgSafe);
                        }
                        $tb_data = ($tb_result['tb_op']!='') ? $tb_result['tb_op'] : $tb_result['tb_ip'];
                        if($tb_data==''){
                            throw new Exception("TB account missing for item_code: ".$codePkgSafe);
                        }

                        // TB CR
                        $ins1 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                                 VALUES ('$last_id','CR','$tb_data','$date','$t_price','IPD_HOS_CHARGE')";
                        if(!mysqli_query($db,$ins1)){
                            throw new Exception("TB CR failed: ".mysqli_error($db));
                        }

                        // TB DR
                        $ins2 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                                 VALUES ('$last_id','DR','111999','$date','$t_price','IPD_HOS_CHARGE')";
                        if(!mysqli_query($db,$ins2)){
                            throw new Exception("TB DR failed: ".mysqli_error($db));
                        }
                    }

                    if(!$found){
                        throw new Exception("No active items found in package_inves for: ".$medi1_raw);
                    }

                    mysqli_commit($db);
                    echo "<script>alert('SUCCESS: Package added');</script>";

                } catch(Exception $e){
                    mysqli_rollback($db);
                    echo "<script>alert('FAILED (rolled back): ".addslashes($e->getMessage())."');</script>";
                }

            }

            /* =========================
               ✅ 1) STOCK LOGIC (SNO-wise)
               ========================= */
            else if($item_type === 'STOCK'){

                if($sno === ''){
                    echo "<script>alert('Please select SNO stock item');</script>";
                }
                else if(!in_array($location, $allowedStockLocs, true)){
                    echo "<script>alert('Only CCU/ICU/NICU stock allowed. Selected: ".addslashes($location)."');</script>";
                }
                else {

                    $dcode_safe = mysqli_real_escape_string($db, $dcode);

                    $qStock = mysqli_query($db,"
                        SELECT sno, add_qty, location, code
                        FROM purchase_stock3
                        WHERE sno='$sno'
                          AND code='$dcode_safe'
                          AND LOWER(TRIM(location)) = '$location'
                        LIMIT 1
                    ");
                    $st = mysqli_fetch_assoc($qStock);

                    if(!$st){
                        echo "<script>alert('This SNO stock not found in selected location (CCU/ICU/NICU)');</script>";
                    } else {

                        $stock_qty = (int)$st['add_qty'];
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
                                    throw new Exception('inhoscharge insert failed: '.mysqli_error($db));
                                }
                                $last_id = mysqli_insert_id($db);

                                $up = "UPDATE purchase_stock3
                                       SET add_qty='$new_qty'
                                       WHERE sno='$sno'
                                         AND code='$dcode_safe'
                                         AND location='$location'";
                                if(!mysqli_query($db,$up)){
                                    throw new Exception('Stock update failed: '.mysqli_error($db));
                                }

                                $date = date('Y-m-d');
                                $tb_q = mysqli_query($db,"SELECT tb_op, tb_ip FROM acct_master_new WHERE item_code='$dcode_safe' LIMIT 1");
                                $tb_result = mysqli_fetch_assoc($tb_q);
                                if(!$tb_result) throw new Exception("acct_master_new not found for item_code: $dcode_safe");

                                $tb_data = ($tb_result['tb_op']!='') ? $tb_result['tb_op'] : $tb_result['tb_ip'];
                                if($tb_data=='') throw new Exception("TB account missing for item_code: $dcode_safe");

                                $ins1 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                                         VALUES ('$last_id','CR','$tb_data','$date','$p11','IPD_HOS_CHARGE')";
                                if(!mysqli_query($db,$ins1)) throw new Exception('TB CR failed: '.mysqli_error($db));

                                $ins2 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                                         VALUES ('$last_id','DR','111999','$date','$p11','IPD_HOS_CHARGE')";
                                if(!mysqli_query($db,$ins2)) throw new Exception('TB DR failed: '.mysqli_error($db));

                                mysqli_commit($db);
                                echo "<script>alert('SUCCESS: Stock item added');</script>";

                            } catch(Exception $e){
                                mysqli_rollback($db);
                                echo "<script>alert('FAILED (rolled back): ".addslashes($e->getMessage())."');</script>";
                            }
                        }
                    }
                }
            }

            /* =========================
               ✅ 2) NO STOCK LOGIC
               ========================= */
            else {

                mysqli_begin_transaction($db);
                try {

                    $sql = "INSERT INTO inhoscharge
                        (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`price`,`date1`,`type`,`remarks`,`ip`,`op`,`acct_code`,`ccentre`,`user`,`e_point`)
                        VALUES
                        ('$pmrn','$pname','$medi1','$eid','$date1','$pdos','$dcode','$p11','$date2','$sub_type','$remarks','$ip','$op','$acode','$ccentre','$user','1')";
                    if(!mysqli_query($db,$sql)){
                        throw new Exception("No-stock insert failed: ".mysqli_error($db));
                    }
                    $last_id = mysqli_insert_id($db);

                    $date = date('Y-m-d');
                    $dcode_safe = mysqli_real_escape_string($db, $dcode);
                    $tb_q = mysqli_query($db,"SELECT tb_op, tb_ip FROM acct_master_new WHERE item_code='$dcode_safe' LIMIT 1");
                    $tb_result = mysqli_fetch_assoc($tb_q);
                    if(!$tb_result) throw new Exception("acct_master_new not found for item_code: $dcode_safe");

                    $tb_data = ($tb_result['tb_op']!='') ? $tb_result['tb_op'] : $tb_result['tb_ip'];
                    if($tb_data=='') throw new Exception("TB account missing for item_code: $dcode_safe");

                    $ins1 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                             VALUES ('$last_id','CR','$tb_data','$date','$p11','IPD_HOS_CHARGE')";
                    if(!mysqli_query($db,$ins1)) throw new Exception("TB CR failed: ".mysqli_error($db));

                    $ins2 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                             VALUES ('$last_id','DR','111999','$date','$p11','IPD_HOS_CHARGE')";
                    if(!mysqli_query($db,$ins2)) throw new Exception("TB DR failed: ".mysqli_error($db));

                    mysqli_commit($db);
                    echo "<script>alert('SUCCESS: No-stock item added');</script>";

                } catch(Exception $e){
                    mysqli_rollback($db);
                    echo "<script>alert('FAILED (rolled back): ".addslashes($e->getMessage())."');</script>";
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
  <title>ADD HOSPITAL CHARGES</title>

  <link rel="stylesheet" href="jsnew/bootstrap.min.css">
  <link rel="stylesheet" href="jsnew/select2.min.css">

  <script src="jsnew/jquery.min.js"></script>
  <script src="jsnew/select2.min.js"></script>
  <script src="jsnew/bootstrap.min.js"></script>

  <style>
    body{ background:#f3f4f6; font-family: Arial, sans-serif; }
    form{ max-width:1200px; margin:20px auto; background:#fff; padding:18px; border-radius:12px; box-shadow:0 10px 28px rgba(0,0,0,.08); }
    .select2-container .select2-selection--single{ height:46px; }
    .select2-container--default .select2-selection--single .select2-selection__rendered{ line-height:44px; }
    .select2-container--default .select2-selection--single .select2-selection__arrow{ height:46px; }
    .form-control{ height:46px; font-weight:600; }

    /* ✅ badges */
    .loc-ccu{ background:#d1fae5!important; border:1px solid #10b981!important; color:#065f46!important; font-weight:800; }
    .loc-icu{ background:#dbeafe!important; border:1px solid #2563eb!important; color:#1e3a8a!important; font-weight:900; }
    .loc-nicu{ background:#ede9fe!important; border:1px solid #7c3aed!important; color:#4c1d95!important; font-weight:900; }

    .loc-nostock{ background:#f3f4f6!important; border:1px solid #6b7280!important; color:#111827!important; font-weight:800; }
    .loc-package{ background:#fee2e2!important; border:1px solid #dc2626!important; color:#7f1d1d!important; font-weight:900; }

    /* =====================================================
       ✅ NEW: SELECT2 LONG + MULTI-LINE DROPDOWN STYLE
       ===================================================== */
    .select2-container{ width:100% !important; }
    .select2-results__option{ white-space:normal !important; }
    .select2-dropdown{ min-width:780px !important; width:auto !important; }

    .s2-row{ display:flex; flex-direction:column; line-height:1.2; padding:6px 2px; }
    .s2-title{ font-weight:800; font-size:14px; color:#111827; white-space:normal; word-break:break-word; }
    .s2-meta{ margin-top:4px; display:flex; flex-wrap:wrap; gap:8px; font-size:12px; color:#374151; }
    .s2-pill{ padding:2px 8px; border-radius:999px; border:1px solid #e5e7eb; background:#f9fafb; font-weight:700; }
    .s2-pill.code{ background:#eef2ff; border-color:#c7d2fe; }
    .s2-pill.loc{ background:#ecfeff; border-color:#a5f3fc; }
    .s2-pill.qty{ background:#ecfdf5; border-color:#a7f3d0; }
    .s2-pill.qty.zero{ background:#fef2f2; border-color:#fecaca; }
    .s2-pill.type{ background:#fff7ed; border-color:#fed7aa; }
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
      <td colspan="8" class="text-center"><strong>Select Item (Stock / No Stock / Package)</strong></td>
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
        <input type="hidden" name="location" id="location">
        <input type="hidden" name="item_type" id="item_type">
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

        $rrt = $row['code'];
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
             href="inhosdelete_new?id3=<?php echo (int)$row["id"]; ?>&pmrn=<?php echo urlencode($pmrn); ?>&eid=<?php echo (int)$eid; ?>&invoice_no=<?php echo urlencode($row['invoice_no'] ?? ''); ?>&admission_no=<?php echo (int)$api_adminssion_no; ?>&code=<?php echo urlencode($rrt); ?>&pdos=<?php echo (int)$row['pdos']; ?>&sno=<?php echo (int)$row['sno']; ?>">
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

</form>

<script>
const ALLOWED_STOCK_LOCS = [
  "5th floor block ab",
  "5th floor block cd",
  "6th floor block (a+b)",
  "6th floor block c",
  "6th floor block d",
  "ccu",
  "dialysis",
  "hmd unit",
  "icu",
  "ipd",
  "ipd-gynae",
  "ipd-pedi",
  "nicu",
  "nursing services",
  "medical icu",
  "surgical icu",
  "hdu"
];

function setLocationBadge(type, loc){
  var $f = $("#location_display");
  $f.removeClass("loc-ccu loc-icu loc-nicu loc-nostock loc-package");

  if(type === "PACKAGE"){ $f.addClass("loc-package"); return; }
  if(type === "NOSTOCK"){ $f.addClass("loc-nostock"); return; }

  loc = (loc || "").toLowerCase().trim();

  if(loc === "ccu") $f.addClass("loc-ccu");
  else if(loc === "icu") $f.addClass("loc-icu");
  else if(loc === "nicu") $f.addClass("loc-nicu");
  else if(loc === "medical icu") $f.addClass("loc-icu");
  else if(loc === "surgical icu") $f.addClass("loc-icu");
  else if(loc === "hdu") $f.addClass("loc-icu"); // or make your own class
  else $f.addClass("loc-nostock");
}

function validateAddButton(){
  var type = ($("#item_type").val() || "").toUpperCase();

  var disable = false;
  var reason = "";

  if(type === "STOCK"){
    var loc = ($("#location").val() || "").toLowerCase();
    var stock = parseInt($("#tqty").val() || "0", 10);
    var used  = parseInt($("#pdos").val() || "0", 10);

    if(!ALLOWED_STOCK_LOCS.includes(loc)){
      disable = true;
      reason = "Only allowed stock locations.";
    } else if(used > stock && stock >= 0){
      disable = true;
      reason = "Used qty > stock";
    }
  }

  $("#btnAdd").prop("disabled", disable);
  $("#btnAdd").attr("title", reason);
}

/* =====================================================
   ✅ NEW: Multi-line Select2 Template
   ===================================================== */
function escapeHtml(str){
  return String(str)
    .replaceAll("&","&amp;")
    .replaceAll("<","&lt;")
    .replaceAll(">","&gt;")
    .replaceAll('"',"&quot;")
    .replaceAll("'","&#039;");
}

function formatHit(item){
  if (!item || item.loading) return item.text || "";

  const name = item.item_name || item.text || "";
  const code = item.code || "";
  const loc  = item.location || "";
  const qty  = (item.qty !== undefined && item.qty !== null) ? String(item.qty) : "";
  const sno  = item.sno || ""; // ✅ NEW
  const type = (item.item_type || "").toUpperCase();

  const qtyClass = (parseInt(qty || "0", 10) <= 0) ? "qty zero" : "qty";
  const locText  = (type === "PACKAGE") ? "PACKAGE" : (type === "NOSTOCK" ? "NO STOCK" : loc);

  return $(`
    <div class="s2-row">
      <div class="s2-title">${escapeHtml(name)}</div>
      <div class="s2-meta">
        ${code ? `<span class="s2-pill code">Code: ${escapeHtml(code)}</span>` : ""}
        ${type === "STOCK" && sno ? `<span class="s2-pill">SNO: ${escapeHtml(sno)}</span>` : ""}  <!-- ✅ NEW -->
        ${locText ? `<span class="s2-pill loc">Loc: ${escapeHtml(locText)}</span>` : ""}
        ${qty !== "" ? `<span class="s2-pill ${qtyClass}">Qty: ${escapeHtml(qty)}</span>` : ""}
        ${type ? `<span class="s2-pill type">Type: ${escapeHtml(type)}</span>` : ""}
      </div>
    </div>
  `);
}
$(function(){

  $("#con_charge1").select2({
    width: '100%',
    dropdownAutoWidth: true,   // ✅ helps dropdown expand
    placeholder: "---Type to Search---",
    allowClear: true,
    minimumInputLength: 2,
    ajax: {
      url: "search_hits_data_sno2.php",
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
    },

    // ✅ multi-line dropdown
    templateResult: formatHit,
    templateSelection: function(item){
      return item.item_name || item.text || "";
    },
    escapeMarkup: function(m){ return m; }
  });

  $("#con_charge1").on("select2:select", function(e){
    var d = e.params.data;

    $("#gname").val(d.item_name || "");
    $("#sno").val(d.sno || "");
    $("#location").val((d.location || "").toLowerCase());
    $("#item_type").val(d.item_type || "");

    var type = (d.item_type || "").toUpperCase();

    if(type === "STOCK"){
      $("#location_display").val(d.location || "");
      setLocationBadge("STOCK", d.location || "");
      $("#tqty").val(d.qty ?? "");
      var qty = parseInt(d.qty || 0, 10);
      $("#tqty").css("color", qty > 0 ? "green" : "red");
    }
    else if(type === "PACKAGE"){
      $("#location_display").val("PACKAGE");
      setLocationBadge("PACKAGE", "");
      $("#tqty").val("").css("color","");
    }
    else {
      $("#location_display").val("NO STOCK");
      setLocationBadge("NOSTOCK", "");
      $("#tqty").val("").css("color","");
    }

    validateAddButton();
  });

  $("#con_charge1").on("select2:clear", function(){
    $("#gname").val("");
    $("#tqty").val("").css("color","");
    $("#sno").val("");
    $("#location").val("");
    $("#item_type").val("");
    $("#location_display").val("").removeClass("loc-ccu loc-icu loc-nicu loc-nostock loc-package");
    validateAddButton();
  });

  $("#pdos").on("keyup change", function(){
    validateAddButton();
  });

  $("#chargeForm").on("submit", function(e){
    var type = ($("#item_type").val() || "").toUpperCase();
    if(type !== "STOCK") return true;

    var loc = ($("#location").val() || "").toLowerCase();
    if(!ALLOWED_STOCK_LOCS.includes(loc)){
      e.preventDefault();
      alert("Only allowed stock locations can be issued from this form.");
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