<?php
include_once 'dbconfig.php';
session_start();
require('db1.php'); // must provide $con (mysqli)

/* =========================
   DEBUG
========================= */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* =========================
   ROLE CHECK
========================= */
$role = $_SESSION['sess_userrole'] ?? '';
$c1   = in_array($role, ['bill', 'billin'], true) ? 1 : 0;

if (!isset($_SESSION['sess_username']) || $c1 === 0) {
    header('Location: login2?err=2');
    exit;
}

$user = $_SESSION['sess_username'] ?? '';
$pmrn = $_REQUEST['pmrn'] ?? $_POST['pmrn'] ?? '';
$eid  = $_REQUEST['eid'] ?? $_POST['eid'] ?? '';

if ($pmrn === '' || $eid === '') {
    die("Missing pmrn or eid");
}

/* ==========================================================
   SAME DB CONNECTION FOR ALL QUERIES
========================================================== */
$db = mysqli_connect('localhost', 'root', 'Godiloveu16', 'sfmmkpjnew') or die("Unable to connect to MySQL");
mysqli_set_charset($db, 'utf8mb4');

/* =========================
   HELPERS
========================= */
function h($v) {
    return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
}

/* =========================
   Load OT
========================= */
$query45 = mysqli_query($db, "SELECT * FROM ot WHERE pmrn='" . mysqli_real_escape_string($db, $pmrn) . "' AND eid='" . mysqli_real_escape_string($db, $eid) . "' ORDER BY id DESC LIMIT 1");
$data5   = mysqli_fetch_assoc($query45);
$ot_id   = (int)($data5['id'] ?? 0);

/* =========================
   Total Cathlab Charge
========================= */
$qTotal = mysqli_query($db, "
    SELECT SUM(charge) AS total_charge
    FROM cath_charge
    WHERE pmrn='" . mysqli_real_escape_string($db, $pmrn) . "'
      AND ieid='" . mysqli_real_escape_string($db, $eid) . "'
      AND (c_status='' OR c_status IS NULL)
");
$rTotal = mysqli_fetch_assoc($qTotal);
$totalCathCharge = (float)($rTotal['total_charge'] ?? 0);

/* =========================
   Total Cathlab Discount
========================= */
$qDisc = mysqli_query($db, "
    SELECT SUM(discount) AS total_discount
    FROM doc_dis
    WHERE pmrn='" . mysqli_real_escape_string($db, $pmrn) . "'
      AND eid='" . mysqli_real_escape_string($db, $eid) . "'
      AND location='Cathlab'
");
$rDisc = mysqli_fetch_assoc($qDisc);
$totalCathDiscount = (float)($rDisc['total_discount'] ?? 0);

/* =========================
   User full name
========================= */
$fullname = $_SESSION['sess_username'] ?? '';
$query39  = "SELECT * FROM user WHERE uname='" . mysqli_real_escape_string($con, $fullname) . "' LIMIT 1";
$result39 = mysqli_query($con, $query39) or die(mysqli_error($con));
$row39    = mysqli_fetch_assoc($result39);
$full     = $row39['fullname'] ?? '';

/* ==========================================================
   UPDATE DISCOUNT
========================================================== */
if (isset($_POST['but_update'])) {

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        if (empty($_POST['update']) || !is_array($_POST['update'])) {
            throw new Exception("Unsuccessful !!! No Row Selected!!");
        }

        $db->begin_transaction();

        $refund_time = date('Y-m-d H:i:s');
        $edate       = date('Y-m-d');
        $date_tb     = date('Y-m-d');

        $processedRows = 0;

        foreach ($_POST['update'] as $snameRaw) {

            $sname = trim((string)$snameRaw);
            if ($sname === '') {
                continue;
            }

            $snameEsc = mysqli_real_escape_string($db, $sname);
            $pmrnEsc  = mysqli_real_escape_string($db, $pmrn);
            $eidEsc   = mysqli_real_escape_string($db, $eid);
            $userEsc  = mysqli_real_escape_string($db, $user);

            $field = 'eqty1_' . md5($sname);
            $newDiscount = isset($_POST[$field]) ? (float)$_POST[$field] : 0;

            if ($newDiscount <= 0) {
                continue;
            }

            /* Total charge for this sname */
            $qCharge = mysqli_query($db, "
                SELECT SUM(charge) AS s
                FROM cath_charge
                WHERE pmrn='$pmrnEsc'
                  AND ieid='$eidEsc'
                  AND (c_status='' OR c_status IS NULL)
                  AND TRIM(sname)='$snameEsc'
            ");
            $rCharge = mysqli_fetch_assoc($qCharge);
            $groupCharge = (float)($rCharge['s'] ?? 0);

            /* Already discounted for this sname */
            $qAlready = mysqli_query($db, "
                SELECT SUM(discount) AS s
                FROM doc_dis
                WHERE pmrn='$pmrnEsc'
                  AND eid='$eidEsc'
                  AND location='Cathlab'
                  AND TRIM(dname)='$snameEsc'
            ");
            $rAlready = mysqli_fetch_assoc($qAlready);
            $already = (float)($rAlready['s'] ?? 0);

            $remaining = $groupCharge - $already;
            if ($remaining < 0) {
                $remaining = 0;
            }

            if ($groupCharge <= 0) {
                throw new Exception("No charge found for ($sname)");
            }

            if ($newDiscount > $remaining) {
                throw new Exception("Discount cannot be more than remaining charge for ($sname). Max allowed: " . number_format($remaining, 2));
            }

            /* Get one row for vtype/eid */
            $qOne = mysqli_query($db, "
                SELECT *
                FROM cath_charge
                WHERE pmrn='$pmrnEsc'
                  AND ieid='$eidEsc'
                  AND (c_status='' OR c_status IS NULL)
                  AND TRIM(sname)='$snameEsc'
                ORDER BY id DESC
                LIMIT 1
            ");
            $one = mysqli_fetch_assoc($qOne);

            if (!$one) {
                throw new Exception("Cathlab row not found for ($sname)");
            }

            $proce = mysqli_real_escape_string($db, $one['vtype'] ?? '');
            $ot_id_from_row = mysqli_real_escape_string($db, $one['eid'] ?? '');

            /* Insert doc_dis */
            $sqlDocDis = "
                INSERT INTO doc_dis
                (`dname`,`discount`,`proce`,`date`,`user`,`pmrn`,`eid`,`ot_id`,`edate`,`location`)
                VALUES
                ('$snameEsc','$newDiscount','$proce','$refund_time','$userEsc','$pmrnEsc','$eidEsc','$ot_id_from_row','$edate','Cathlab')
            ";
            mysqli_query($db, $sqlDocDis);

            /* Accounting TB */
            $sqlTB1 = "
                INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                VALUES ('$pmrnEsc','DR','211170','$date_tb','$newDiscount','IPD_CATH_DISCOUNT')
            ";
            mysqli_query($db, $sqlTB1);

            $sqlTB2 = "
                INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                VALUES ('$pmrnEsc','CR','111999','$date_tb','$newDiscount','IPD_CATH_DISCOUNT')
            ";
            mysqli_query($db, $sqlTB2);

            $processedRows++;
        }

        if ($processedRows === 0) {
            throw new Exception("No valid discount amount found in selected row(s).");
        }

        /* Recompute inpatient.hos_doc_dis */
        $qAll = mysqli_query($db, "
            SELECT SUM(discount) AS s
            FROM doc_dis
            WHERE pmrn='" . mysqli_real_escape_string($db, $pmrn) . "'
              AND eid='" . mysqli_real_escape_string($db, $eid) . "'
              AND location IN ('IPD','Cathlab')
        ");
        $rAll = mysqli_fetch_assoc($qAll);
        $hos_doc_dis_new = (float)($rAll['s'] ?? 0);

        mysqli_query($db, "
            UPDATE inpatient
            SET hos_doc_dis='$hos_doc_dis_new'
            WHERE pmrn='" . mysqli_real_escape_string($db, $pmrn) . "'
              AND eid='" . mysqli_real_escape_string($db, $eid) . "'
        ");

        $db->commit();

        $url = "ipall_new_1_new_0_new1?pmrn=" . urlencode($pmrn) . "&eid=" . urlencode($eid);
        header("Location: $url");
        exit;

    } catch (Throwable $e) {
        try {
            $db->rollback();
        } catch (Throwable $x) {
        }
        echo "<script>alert('Transaction Failed! Rolled Back. Error: " . addslashes($e->getMessage()) . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cathlab Discount Panel</title>
    <link rel="stylesheet" href="jsnew/normalize.min.css">
    <link rel="stylesheet" href="jsnew/jquery-ui.css">
    <script src="jsnew/jquery.min.js"></script>
    <script src="jsnew/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="styles.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            color: #384047;
            background: #A085C6;
        }
        form {
            max-width: 1200px;
            margin: 10px auto;
            padding: 10px 20px;
            background: #f4f7f8;
            border-radius: 8px;
            border: 1px solid #8265B0;
            box-shadow: 3px 3px 3px rgba(0,0,0,0.2);
        }
        h1 {
            margin: 0 0 20px 0;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        th {
            background: #e9ecef;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            background: #e8eeef;
            border: none;
            box-sizing: border-box;
        }
        button {
            padding: 16px;
            color: #fff;
            background: #A085C6;
            font-size: 16px;
            border-radius: 5px;
            width: 100%;
            border: 1px solid #8265B0;
            cursor: pointer;
        }
        .row2 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
            margin: 10px 0;
        }
        .box {
            background: #e8eeef;
            padding: 10px;
            border-radius: 6px;
        }
    </style>

    <script>
        $(function () {
            $('#checkAll').on('change', function () {
                $('.row-check').prop('checked', this.checked).trigger('change');
            });

            $(document).on('change', '.row-check', function () {
                let row = $(this).closest('tr');
                let input = row.find('.discount-input');

                if ($(this).is(':checked')) {
                    input.prop('required', true);
                } else {
                    input.prop('required', false).val('');
                }
            });
        });
    </script>
</head>

<body>

<div id='cssmenu'>
    <ul>
        <li><a href='viewnew1'><span>Home</span></a></li>
        <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
    </ul>
</div>

<form action="" method="post">
    <h1>Investigation Charge Discount Panel (Cathlab)</h1>

    <div class="row2">
        <div class="box"><strong>MRN , Episode:</strong><br><?php echo h($pmrn . ', ' . $eid); ?></div>
        <div class="box"><strong>Total Cathlab Charge:</strong><br><?php echo number_format($totalCathCharge, 2); ?></div>
        <div class="box"><strong>Total Cathlab Discount:</strong><br><?php echo number_format($totalCathDiscount, 2); ?></div>
    </div>

    <table>
        <tr>
            <th style="width:60px;">S.No</th>
            <th>Cath Name</th>
            <th style="width:130px;">Date</th>
            <th style="width:120px;">Level</th>
            <th style="width:140px;">Charge</th>
            <th style="width:140px;">Already Discount</th>
            <th style="width:180px;">New Discount</th>
            <th style="width:80px;"><input type="checkbox" id="checkAll"></th>
        </tr>

        <?php
        $count = 1;

        $sel_query = "
            SELECT
                TRIM(sname) AS sname,
                MAX(date1) AS date1,
                MAX(plevel) AS plevel,
                SUM(charge) AS total_charge
            FROM cath_charge
            WHERE pmrn='" . mysqli_real_escape_string($db, $pmrn) . "'
              AND ieid='" . mysqli_real_escape_string($db, $eid) . "'
              AND (c_status='' OR c_status IS NULL)
            GROUP BY TRIM(sname)
            ORDER BY TRIM(sname) ASC
        ";
        $result = mysqli_query($db, $sel_query);

        while ($row = mysqli_fetch_assoc($result)) {
            $sname = trim((string)($row['sname'] ?? ''));
            $groupCharge = (float)($row['total_charge'] ?? 0);

            $qAlready = mysqli_query($db, "
                SELECT SUM(discount) AS s
                FROM doc_dis
                WHERE pmrn='" . mysqli_real_escape_string($db, $pmrn) . "'
                  AND eid='" . mysqli_real_escape_string($db, $eid) . "'
                  AND location='Cathlab'
                  AND TRIM(dname)='" . mysqli_real_escape_string($db, $sname) . "'
            ");
            $rAlready = mysqli_fetch_assoc($qAlready);
            $already = (float)($rAlready['s'] ?? 0);

            $remaining = $groupCharge - $already;
            if ($remaining < 0) {
                $remaining = 0;
            }

            $inputName = 'eqty1_' . md5($sname);
        ?>
            <tr>
                <td align="center"><?php echo $count; ?></td>
                <td><?php echo h($sname); ?></td>
                <td align="center"><?php echo h($row['date1'] ?? ''); ?></td>
                <td align="center"><?php echo h($row['plevel'] ?? ''); ?></td>
                <td align="center"><?php echo number_format($groupCharge, 2); ?></td>
                <td align="center"><?php echo number_format($already, 2); ?></td>
                <td align="center">
                    <input
                        class="discount-input"
                        name="<?php echo h($inputName); ?>"
                        type="number"
                        min="0"
                        step="0.01"
                        max="<?php echo h($remaining); ?>"
                        placeholder="Max <?php echo number_format($remaining, 2); ?>"
                    >
                </td>
                <td align="center">
                    <input type="checkbox" class="row-check" name="update[]" value="<?php echo h($sname); ?>">
                </td>
            </tr>
        <?php
            $count++;
        }
        ?>
    </table>

    <input type="hidden" name="pmrn" value="<?php echo h($pmrn); ?>">
    <input type="hidden" name="eid" value="<?php echo h($eid); ?>">

    <br>
    <button type="submit" name="but_update">Confirm</button>
</form>

<form action="" method="post">
    <h1>Discount View</h1>

    <table>
        <tr>
            <th style="width:60px;">S.No</th>
            <th style="width:120px;">MRN</th>
            <th>Doctor / Cath Name</th>
            <th style="width:160px;">Discount Amount</th>
        </tr>

        <?php
        $count = 1;
        $sel_query = "
            SELECT *
            FROM doc_dis
            WHERE pmrn='" . mysqli_real_escape_string($db, $pmrn) . "'
              AND eid='" . mysqli_real_escape_string($db, $eid) . "'
              AND location='Cathlab'
            ORDER BY id DESC
        ";
        $result = mysqli_query($db, $sel_query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td align="center"><?php echo $count; ?></td>
                <td align="center"><?php echo h($row['pmrn']); ?></td>
                <td><?php echo h($row['dname']); ?></td>
                <td align="center"><?php echo h($row['discount']); ?></td>
            </tr>
        <?php
            $count++;
        }
        ?>
    </table>
</form>

</body>
</html>