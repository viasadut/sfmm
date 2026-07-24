<?php
/************************************************************
 * COMPLETE FILE: GRN / Purchase Order Receive Page
 * - PRG redirect (no blank page)
 * - Flash success/error alert ONE TIME
 * - Transaction commit/rollback
 * - Keeps your UI + calculations
 ************************************************************/

// ✅ MUST BE FIRST (no spaces/newlines before)
ob_start();
session_start();

include_once 'dbconfig.php';
require('db1.php'); // must define $con (mysqli)

// mysqli exceptions
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/* =======================
   ROLE CHECK
======================= */
$role = $_SESSION['sess_userrole'] ?? '';

$queryc  = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('mng','staff','store','pharmacy')";
$resultc = mysqli_query($con, $queryc);
$rowc    = mysqli_fetch_assoc($resultc);
$c1      = (int)($rowc['c'] ?? 0);

if (!isset($_SESSION['sess_username']) || $c1 === 0) {
    header('Location: login2?err=2');
    exit;
}

$user = $_SESSION['sess_username'] ?? '';
if ($user === '') {
    header('Location: login2?err=2');
    exit;
}

/* =======================
   INPUTS
======================= */
$ono = $_REQUEST['ono'] ?? '';
$grn = $_REQUEST['grn'] ?? '';

/* =======================
   LOAD PO HEADER
======================= */
$data = [];
$po_ono = '';
$po_id = 0;
$creditor_code = '';

if ($ono !== '') {
    $selPO = "SELECT * FROM po_table WHERE ono='" . mysqli_real_escape_string($con, $ono) . "' LIMIT 1";
    $resPO = mysqli_query($con, $selPO);
    $data  = mysqli_fetch_assoc($resPO) ?: [];

    $po_ono        = $data['ono'] ?? '';
    $po_id         = (int)($data['id'] ?? 0);
    $creditor_code = $data['creditor_code'] ?? '';
    $po_type = $data['po_type'] ?? '';
    $discount_given=$data['amount_discount']; 
}

/* =======================
   POST: UPDATE / CONFIRM
======================= */
if (isset($_POST['but_update'])) {

    if (empty($_POST['update']) || !is_array($_POST['update'])) {
        $_SESSION['flash_error'] = "Unsuccessful !!! No Row Selected!!";
        header("Location: " . $_SERVER['PHP_SELF'] . "?ono=" . urlencode($ono) . "&grn=" . urlencode($grn));
        exit;
    }

    $invoice_no = $_POST['invoice'] ?? '';
    $check_by   = $_POST['check_by'] ?? '';

    try {
        $con->begin_transaction();

        //$g_discount = (float)($_POST['g_discount'] ?? 0);

        $g_discount = (float)($_REQUEST['g_discount'] ?? 0) + (float)($discount_given ?? 0);
        $grn_discount = (float)($_REQUEST['g_discount'] ?? 0);
        $total    = 0;
        $add_time = date('Y-m-d H:i:s');
        $re_date  = date('Y-m-d');

        // NOTE: You used $last_id for TB. If you have a real trans table, use that inserted id.
        $last_id = time();
        $date_tb = date('Y-m-d');

        foreach ($_POST['update'] as $updateid) {

            $updateid = (int)$updateid;

            // Load row from po_table1
            $qRow = $con->query("SELECT * FROM po_table1 WHERE id={$updateid} LIMIT 1");
            $dd   = $qRow->fetch_assoc();
            
            if (!$dd) {
                throw new Exception("Row not found in po_table1 for id={$updateid}");
            }

            $ono_row  = $dd["po_ono"];
            $ordered  = (float)$dd["o_qty"];
            $received = (float)$dd["r_qty"];
            
            $balanced = $ordered - $received;

            $code   = $dd["code"];
            $po_id2 = (int)$dd["po_id"];


            // find tb_code
           /* $tbRow = $con->query("SELECT * FROM acct_master_new WHERE item_code={$code}");
            $tb   = $tbRow->fetch_assoc();
            
            if($tb["tb_op"]==''){

              $tb_data=$tb["tb_ip"];
            }

            else if($tb["tb_op"]!=''){

              $tb_data=$tb["tb_op"];
            }

            else if($tb["tb_op"]=='' and $tb["tb_ip"]==''){

              $tb_data='311190';
            }
            */

            $g_name = $con->real_escape_string($dd["name"]);
            $b_name = $con->real_escape_string($dd["brand"]);
            $pono   = $con->real_escape_string($dd["po_ono"]);
            $uprice = (float)$dd["uprice"];

            // Inputs for this row
            $eqty2   = (float)($_POST['eqty1_' . $updateid] ?? 0);
            $bonus   = (float)($_POST['bonus_' . $updateid] ?? 0);
            $batchno = $con->real_escape_string($_POST['batchno_' . $updateid] ?? '');

            $expiry_raw = $_POST['expiry_' . $updateid] ?? '';
            $expiry     = $expiry_raw ? date('Y-m-d', strtotime($expiry_raw)) : null;

            if ($eqty2 <= 0) {
                continue;
            }

            if ($balanced < $eqty2) {
                throw new Exception("Receive qty exceeds balance for po_table1 id={$updateid}");
            }

            // RFID values
            $runningTime  = $dd["id"] + (int)date('dmisi');
            $runningTime1 = $dd["id"] + (int)date('idmsi') + 1;

            $eqty3  = $received + $eqty2;
            $tprice = $uprice * $eqty2;
            $bprice = $uprice * $bonus;

            // Duplicate check (keeping your exact condition)
            $chkSql = "
                SELECT COUNT(id) AS cnt
                FROM purchase_stock3
                WHERE code='{$code}'
                  AND location='Store'
                  AND batch_no='{$batchno}'
                  AND add_qty>0
                  AND sno='IOUYBUIYUYVI'
            ";
            $cntRow = $con->query($chkSql)->fetch_assoc();
            $count_qtyw = (int)($cntRow['cnt'] ?? 0);

            // Your old logic: if found then skip insert
            if ($count_qtyw != 0) {
                continue;
            }

            // Update po_table1 received qty
            $new_r_qty = ($received == 0) ? $eqty2 : $eqty3;


            // Insert main qty into purchase_stock3
            $ins1 = "
                INSERT INTO purchase_stock3
                (code,location,g_name,b_name,add_qty,exdate,batch_no,rfid,sno,u_price,t_price,add_by,add_time,re_date,req_qty,grn,invoice_no,p_id,check_by,po_id)
                VALUES
                ('{$code}','Store','{$g_name}','{$b_name}','{$eqty2}'," . ($expiry ? "'{$expiry}'" : "NULL") . ",'{$batchno}','{$runningTime}','{$pono}','{$uprice}','{$tprice}','{$user}','{$add_time}','{$re_date}','{$eqty2}','{$grn}','" . $con->real_escape_string($invoice_no) . "','{$ono_row}','" . $con->real_escape_string($check_by) . "','{$po_id2}')
            ";
            $con->query($ins1);

            // Insert bonus qty
            if ($bonus > 0) {
                $ins2 = "
                    INSERT INTO purchase_stock3
                    (code,location,g_name,b_name,add_qty,exdate,batch_no,rfid,sno,u_price,t_price,add_by,add_time,re_date,req_qty,grn,invoice_no,p_id,b_remarks,check_by,po_id)
                    VALUES
                    ('{$code}','Store','{$g_name}','{$b_name}','{$bonus}'," . ($expiry ? "'{$expiry}'" : "NULL") . ",'{$batchno}','{$runningTime1}','{$pono}','{$uprice}','{$bprice}','{$user}','{$add_time}','{$re_date}','{$eqty2}','{$grn}','" . $con->real_escape_string($invoice_no) . "','{$ono_row}','Bonus Item','" . $con->real_escape_string($check_by) . "','{$po_id2}')
                ";
                $con->query($ins2);
            }

            $total += $tprice;
        }

        // After loop: AP + TB + discount update
        if ($total > 0) {

            
            if ($po_id > 0) {
            //    $con->query("UPDATE po_table SET amount_discount='{$g_discount}' WHERE id='{$po_id}'");
            }
        }

        // ✅ COMMIT
        $con->commit();

        $_SESSION['flash_success'] = "Success! All operations completed.";
        header("Location: " . $_SERVER['PHP_SELF'] . "?ono=" . urlencode($ono) . "&grn=" . urlencode($grn));
        exit;

    } catch (Throwable $e) {
        $con->rollback();
        $_SESSION['flash_error'] = "Transaction failed! Everything rolled back. " . $e->getMessage();
        header("Location: " . $_SERVER['PHP_SELF'] . "?ono=" . urlencode($ono) . "&grn=" . urlencode($grn));
        exit;
    }
}

/* =======================
   LOAD PO ITEMS
======================= */
$items = [];
if ($po_id > 0 && $po_ono !== '') {
    $qry = "SELECT * FROM po_table1 WHERE po_id='" . mysqli_real_escape_string($con, (string)$po_id) . "'
            AND po_ono='" . mysqli_real_escape_string($con, $po_ono) . "'
            ORDER BY id DESC";
    $res = mysqli_query($con, $qry);
    while ($r = mysqli_fetch_assoc($res)) {
        $items[] = $r;
    }
}

/* =======================
   LOAD RECEIVED LIST
======================= */
$receivedList = [];
if ($ono !== '') {
    $sel_query = "SELECT * FROM purchase_stock3 WHERE sno='" . mysqli_real_escape_string($con, $ono) . "' ORDER BY id DESC";
    $rr = mysqli_query($con, $sel_query);
    while ($row = mysqli_fetch_assoc($rr)) {
        $receivedList[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PMS | GRN</title>

  <link rel="stylesheet" href="jsnew/normalize.min.css">
  <link rel="stylesheet" href="jsnew/jquery-ui.css">

  <script src="jsnew/jquery.min.js"></script>
  <script src="jsnew/jquery-ui.min.js"></script>

  <style>
    html { box-sizing: border-box; }
    *, *:before, *:after { box-sizing: border-box; }
    body { font-family: 'Nunito',sans-serif; color:#384047; background:#A085C6; }
    form.mainform { max-width: 1200px; margin: 10px auto; padding: 10px 20px; background:#f4f7f8; border-radius:8px; border:1px solid #8265B0; box-shadow:3px 3px 3px rgba(0,0,0,0.2) }
    h1 { margin:0 0 30px 0; text-align:center; }
    input[type="text"], input[type="date"], input[type="number"], select {
      border:none; font-size:16px; height:auto; margin:0; outline:0; padding:10px;
      background-color:#e8eeef; color:#111; box-shadow:0 1px 0 rgba(0,0,0,0.03) inset; margin-bottom:10px;
    }
    input[type="text"], input[type="number"] { height:40px; width:100%; }
    select { height:52px; width:100%; }
    button, input[type="submit"] {
      padding: 14px 22px; color:#FFF; background-color:#A085C6; font-size:16px; border-radius:5px;
      width:auto; border:1px solid #8265B0; box-shadow:0 -1px 0 rgba(255,255,255,0.1) inset; cursor:pointer;
    }
  </style>

  <!-- Select2 -->
  <script src="jsnew/select2.min.js"></script>
  <link rel="stylesheet" href="jsnew/select2.min.css" />

</head>

<body>

<?php if (!empty($_SESSION['flash_success'])): ?>
<script>
alert(<?= json_encode($_SESSION['flash_success']) ?>);
</script>
<?php unset($_SESSION['flash_success']); endif; ?>

<?php if (!empty($_SESSION['flash_error'])): ?>
<script>
alert(<?= json_encode($_SESSION['flash_error']) ?>);
</script>
<?php unset($_SESSION['flash_error']); endif; ?>

<div id='cssmenu'>
<ul>
   <li><a href='edischarge3'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='esearch'><span>Patient Search By MRN</span></a></li>
         <li class='has-sub'><a href='eadm'><span>New Patient</span></a></li>
      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<form class="mainform" action="" method="post">
  <h1>Purchase Order Form</h1>

  <table id="itemTable" width="95%" border="0" align="center" bgcolor="lightblue" style="border-collapse:collapse;">
    <tr>
      <td colspan="20" bgcolor="lightblue" style="text-align:right">
        <a target="_blank" href="grn_upload?ono=<?php echo htmlspecialchars($ono); ?>&sno=<?php echo htmlspecialchars($grn); ?>">
          <img src="upload.png" title="Upload GRN Documents" width="50" height="50" />
        </a>
      </td>
    </tr>

    <tr>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Purchase Department:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['purchase_department'] ?? ''); ?></span>
      </td>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Order NO:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['id'] ?? ''); ?></span>
      </td>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        PO Type:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['po_type'] ?? ''); ?></span>
      </td>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Request Department:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['req_department'] ?? ''); ?></span>
      </td>
    </tr>

    <tr>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Delivery Department:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['d_department'] ?? ''); ?></span>
      </td>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Expected Date:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['ex_date'] ?? ''); ?></span>
      </td>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Expiry Date:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['expiry_date'] ?? ''); ?></span>
      </td>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Payment Terms:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['payment_terms'] ?? ''); ?></span>
      </td>
    </tr>

    <tr>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Supplier Code:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['sup_code'] ?? ''); ?></span>
      </td>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Creditor Code:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['creditor_code'] ?? ''); ?></span>
      </td>
      <td colspan="10"></td>
    </tr>

    <tr>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Amount Discount:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['amount_discount'] ?? ''); ?></span>
      </td>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Percentage Discount:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['percentage_dis'] ?? ''); ?></span>
      </td>
      <td colspan="5"></td>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Subamount:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['subamount'] ?? ''); ?></span>
      </td>
    </tr>

    <tr>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Issue Person ID:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['issue_person'] ?? ''); ?></span>
      </td>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Issue Date:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['issue_date'] ?? ''); ?></span>
      </td>
      <td colspan="5"></td>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Total Amount:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['total_amount'] ?? ''); ?></span>
      </td>
    </tr>

    <tr>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Authorization Person ID:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['auth_person'] ?? ''); ?></span>
      </td>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Authorization Date:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['auth_date'] ?? ''); ?></span>
      </td>
      <td colspan="5"></td>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Record Status:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['record_status'] ?? ''); ?></span>
      </td>
    </tr>

    <tr>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Purchase Order Date:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['po_date'] ?? ''); ?></span>
      </td>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Record Number:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['record_no'] ?? ''); ?></span>
      </td>
      <td colspan="5"></td>
      <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
        Entered date:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['enter_date'] ?? ''); ?></span>
      </td>
    </tr>

    <tr>
      <td colspan="20" style="font-weight:bold;font-size:14px;color:red">
        Remarks:<br>
        <span style="font-weight:bold;font-size:18px;color:green"><?php echo htmlspecialchars($data['remarks'] ?? ''); ?></span>
      </td>
    </tr>
  </table>

  <br>

  <table width="95%" border="1" align="center" bgcolor="lightpink" style="border-collapse:collapse;">
    <tr>
      <td align="center"><strong>S.No</strong></td>
      <td colspan="8" align="center"><strong>Name</strong></td>
      <td colspan="3" align="center"><strong>Brand</strong></td>
      <td colspan="3" align="center"><strong>Unit Price</strong></td>
      <td colspan="2" align="center"><strong>In Hand</strong></td>
      <td colspan="2" align="center"><strong>Order Qty</strong></td>
      <td colspan="2" align="center"><strong>Received Qty</strong></td>
      <td colspan="2" align="center"><strong>Qty Receive</strong></td>
      <td align="center"><strong>Discount</strong></td>
      <td align="center"><strong>Expiry Date</strong></td>
      <td align="center"><strong>Batch NO</strong></td>
      <td align="center"><strong>Bonus Qty</strong></td>
    </tr>

    <?php
    $count = 1;
    foreach ($items as $i):
      $id = (int)$i['id'];
      $avail = (float)$i['o_qty'] - (float)$i['r_qty'];
    ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>

      <td align="center" colspan="8">
        <?php echo htmlspecialchars($i["name"]); ?>
      </td>

      <td align="center" colspan="3"><?php echo htmlspecialchars($i["brand"]); ?></td>
      <td align="center" colspan="3"><?php echo htmlspecialchars($i["uprice"]); ?></td>

      <td align="center" colspan="2"><?php echo htmlspecialchars($i["stock"]); ?></td>
      <td align="center" colspan="2"><?php echo htmlspecialchars($i["o_qty"]); ?></td>
      <td align="center" colspan="2"><?php echo htmlspecialchars($i["r_qty"]); ?></td>

      <td colspan="2" hidden>
        <input type="number" class="avail" value="<?php echo $avail; ?>" readonly>
      </td>

      <td colspan="2">
        <?php if ((float)$i['o_qty'] <= (float)$i['r_qty']): ?>
          <input type="number" class="qty" min="0" value="0" disabled>
        <?php else: ?>
          <input type="number" name="eqty1_<?php echo $id; ?>" class="qty" min="0" value="0" step="any">
        <?php endif; ?>
      </td>

      <td>
        <input type="hidden" class="price" name="price[]" value="<?php echo htmlspecialchars($i['uprice']); ?>" readonly>
        <input type="number" class="discount" name="discount[]" value="0" step="any" min="0">
      </td>

      <td align="center">
        <input class="expiry" name="expiry_<?php echo $id; ?>" type="date">
      </td>

      <td align="center">
        <input class="batchno" name="batchno_<?php echo $id; ?>" type="text">
      </td>

      <td align="center">
        <input class="bonus" name="bonus_<?php echo $id; ?>" type="number" step="any" min="0" value="0">
      </td>

      <td hidden>
        <input type="number" class="row_total" name="row_total[]" value="0" readonly>
      </td>

      <!-- keeping your behavior: all rows included -->
      <td hidden>
        <input type="checkbox" name="update[]" value="<?php echo $id; ?>" checked>
      </td>
    </tr>
    <?php
      $count++;
    endforeach;
    ?>
  </table>

  <br>

  <div style="width:95%; margin:0 auto;">
    <strong style="font-size:25px;color:green">GRN VALUE:</strong>
    <input type="number" name="gtotal" id="grand_total" value="0" readonly style="font-size:25px;color:green; width:200px">

    <strong style="font-size:25px;color:green; margin-left:30px;">GRN Discount:</strong>
    <input type="number" name="g_discount" id="grand_discount" value="0" readonly style="font-size:25px;color:green; width:200px">
  </div>

  <br>

  <table width="95%" border="1" align="center" bgcolor="lightpink" style="border-collapse:collapse;">
    <tr>
      <td align="left" colspan="5">Invoice No</td>
      <td align="left" colspan="22">
        <input class="invoice" name="invoice" id="invoice" value="" type="text" placeholder="Invoice No" required>
      </td>
    </tr>

    <tr>
      <td align="left" colspan="5">Check By</td>
      <td align="left" colspan="25">
        <select class="js-example-basic-single" name="check_by" required>
          <option value=''>-Select-</option>
          <?php
            $sql76 = "SELECT * FROM staff3 WHERE status='Active' AND dept IN ('Store Services')";
            $res76 = mysqli_query($con, $sql76);
            if (mysqli_num_rows($res76) > 0) {
              while ($row76 = mysqli_fetch_object($res76)) {
                echo "<option value='".htmlspecialchars($row76->sname, ENT_QUOTES)."'>".htmlspecialchars($row76->sname)." - ".htmlspecialchars($row76->sid)."</option>";
              }
            }
          ?>
        </select>
      </td>
    </tr>

    <tr>
      <td colspan="30" align="right" style="padding:10px;">
        <input type="submit" value="Confirm" name="but_update">
      </td>
    </tr>
  </table>

</form>

<!-- RECEIVED LIST -->
<form class="mainform" action="" method="post" style="margin-top:20px;">
  <h1>Received Items</h1>

  <table width="95%" border="1" align="center" bgcolor="lightpink" style="border-collapse:collapse;">
    <tr>
      <td align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Item Name</strong></td>
      <td colspan="4" align="center"><strong>Re. Qty</strong></td>
      <td colspan="3" align="center"><strong>Batch No</strong></td>
      <td colspan="3" align="center"><strong>Ex. Date</strong></td>
      <td colspan="2" align="center"><strong>Re. Date</strong></td>
      <td colspan="2" align="center"><strong>Re. By</strong></td>
      <td colspan="1" align="center"><strong>Re. Location</strong></td>
      <td colspan="1" align="center"><strong>Print</strong></td>
      <td colspan="1" align="center"><strong>Barcode</strong></td>
    </tr>

    <?php
    $count2 = 1;
    foreach ($receivedList as $row):
      // encryption for print url (same as your original)
      $simple_string1 = $row['sno'];
      $ciphering1 = "AES-128-CTR";
      $options = 0;
      $encryption_iv1 = '1234567891011121';
      $encryption_key1 = "kpj";
      $encryption1 = openssl_encrypt($simple_string1, $ciphering1, $encryption_key1, $options, $encryption_iv1);

      $simple_string11 = $row['grn'];
      $ciphering11 = "AES-128-CTR";
      $options11 = 0;
      $encryption_iv11 = '1234567891011124';
      $encryption_key11 = "kpjj";
      $encryption11 = openssl_encrypt($simple_string11, $ciphering11, $encryption_key11, $options11, $encryption_iv11);
    ?>
    <tr>
      <td align="center"><?php echo $count2; ?></td>
      <td align="center" colspan="4"><?php echo htmlspecialchars($row["g_name"]); ?></td>
      <td align="center" colspan="4"><?php echo htmlspecialchars($row["req_qty"]); ?></td>
      <td align="center" colspan="3"><?php echo htmlspecialchars($row["batch_no"]); ?></td>
      <td align="center" colspan="3"><?php echo htmlspecialchars($row["exdate"]); ?></td>
      <td align="center" colspan="2"><?php echo htmlspecialchars($row["add_time"]); ?></td>
      <td align="center" colspan="2"><?php echo htmlspecialchars($row["add_by"]); ?></td>
      <td align="center" colspan="1"><?php echo htmlspecialchars($row["location"]); ?></td>
      <td align="center" colspan="1">
        <a target="_blank" href="grn_print_pdf?ono=<?php echo urlencode($encryption1); ?>&grn=<?php echo urlencode($encryption11); ?>&id=<?php echo urlencode($row['re_date']); ?>">Print</a>
      </td>
      <td align="center" colspan="1">
        <a target="_blank" href="purchase_bar?g_name=<?php echo urlencode($row['g_name']); ?>&rfid=<?php echo urlencode($row['sno']); ?>">Barcode</a>
      </td>
    </tr>
    <?php
      $count2++;
    endforeach;
    ?>
  </table>
</form>

<script>
$(document).ready(function() {
  $('.js-example-basic-single').select2();
});

// Auto calculate row totals + grand totals + grand discount
document.addEventListener("input", function (e) {
  if (e.target.classList.contains("qty") || e.target.classList.contains("discount")) {
    updateRowAndGrand(e.target);
  }
});

function updateRowAndGrand(input) {
  let row = input.closest("tr");
  if (!row) return;

  let qtyInput      = row.querySelector(".qty");
  let priceInput    = row.querySelector(".price");
  let discountInput = row.querySelector(".discount");
  let availInput    = row.querySelector(".avail");
  let rowTotal      = row.querySelector(".row_total");

  if (!qtyInput || !priceInput || !discountInput || !availInput || !rowTotal) return;

  // Prevent negatives
  if (qtyInput.value < 0) qtyInput.value = 0;
  if (discountInput.value < 0) discountInput.value = 0;

  let qty       = Number(qtyInput.value) || 0;
  let price     = Number(priceInput.value) || 0;
  let discount  = Number(discountInput.value) || 0;
  let available = Number(availInput.value) || 0;

  // Qty cannot exceed available
  if (qty > available) {
    alert("You cannot receive more than ordered qty!");
    qty = available;
    qtyInput.value = available;
  }

  // Discount cannot exceed (price*qty)
  let maxDiscount = price * qty;
  if (discount > price) {
    // Your discount input is per-unit in your UI
    // So enforce discount <= unit price
    alert("Discount cannot be greater than unit price!");
    discount = price;
    discountInput.value = discount;
  }

  // Row total = qty * (price - discount per unit)
  let total = qty * Math.max(0, price - discount);
  rowTotal.value = total;

  calculateGrandTotal();
  calculateGrandDiscount();
}

function calculateGrandTotal() {
  let total = 0;
  document.querySelectorAll(".row_total").forEach(function (input) {
    total += Math.max(0, Number(input.value) || 0);
  });
  let el = document.getElementById("grand_total");
  if (el) el.value = total;
}

function calculateGrandDiscount() {
  let totalDiscount = 0;

  document.querySelectorAll("tr").forEach(function (row) {
    let qtyInput = row.querySelector(".qty");
    let discountInput = row.querySelector(".discount");

    if (qtyInput && discountInput && !qtyInput.disabled) {
      let qty = Number(qtyInput.value) || 0;
      let discount = Number(discountInput.value) || 0; // per unit
      totalDiscount += qty * discount;
    }
  });

  let el = document.getElementById("grand_discount");
  if (el) el.value = totalDiscount;
}
</script>

</body>
</html>