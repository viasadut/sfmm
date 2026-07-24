<?php
include_once 'dbconfig.php';
session_start();
require('db1.php');

/* =========================
   SESSION / ROLE CHECK
========================= */
$role = $_SESSION['sess_userrole'] ?? '';
$user = $_SESSION['sess_username'] ?? '';

$queryc  = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('mng','staff','store','pharmacy')";
$resultc = mysqli_query($con, $queryc) or die(mysqli_error($con));
$rowc    = mysqli_fetch_assoc($resultc);
$c1      = (int)($rowc['c'] ?? 0);

if ($user === '' || $c1 === 0) {
    header('Location: login2?err=2');
    exit;
}

/* =========================
   HELPERS
========================= */
function h($str)
{
    return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8');
}

function cleanAmount($value)
{
    return round((float)str_replace(',', '', trim((string)$value)), 2);
}

/* =========================
   REQUEST DATA
========================= */
$cname = $_REQUEST['cname'] ?? '';

if ($cname === '') {
    die('Supplier code missing.');
}

/* =========================
   SUPPLIER INFO
========================= */
$stmtSupplier = $con->prepare("SELECT * FROM suppliers_master WHERE supplier_code = ?");
$stmtSupplier->bind_param("s", $cname);
$stmtSupplier->execute();
$resultSupplier = $stmtSupplier->get_result();
$supplier = $resultSupplier->fetch_assoc();
$stmtSupplier->close();

if (!$supplier) {
    die('Supplier not found.');
}

$bank_name     = $supplier['bank_name'] ?? '';
$creditor_code = $supplier['creditor_code'] ?? '';

/* =========================
   FORM SUBMIT
========================= */
if (isset($_POST['but_update'])) {

    if (empty($_POST['update']) || !is_array($_POST['update'])) {
        echo '<script>alert("Unsuccessful! No row selected.");</script>';
        exit;
    }

    if ($user === '') {
        echo '<script>alert("User session missing.");</script>';
        exit;
    }

    $bankno        = trim($_POST['bankno'] ?? '');
    $chequeno      = trim($_POST['chequeno'] ?? '');
    $cheque_date   = trim($_POST['cheque_date'] ?? date('Y-m-d'));
    $p_remarks     = trim($_POST['p_remarks'] ?? '');
    $cheque_amount = cleanAmount($_POST['cheque_amount'] ?? '0');
    $gtotal        = cleanAmount($_POST['gtotal'] ?? '0');

    if ($bankno === '' || $bankno === '--Select Bank--') {
        echo '<script>alert("Please select a bank.");</script>';
        exit;
    }

    if ($chequeno === '') {
        echo '<script>alert("Please select a cheque number.");</script>';
        exit;
    }

    if ($cheque_amount <= 0) {
        echo '<script>alert("Cheque amount must be greater than 0.");</script>';
        exit;
    }

    if ($gtotal <= 0) {
        echo '<script>alert("Grand total must be greater than 0.");</script>';
        exit;
    }

    if (abs($cheque_amount - $gtotal) > 0.009) {
        echo '<script>alert("Cheque Amount and Grand Total are not equal.");</script>';
        exit;
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $con->begin_transaction();

        $time       = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $as_date    = date('Y-m-d 00:00:00');

        $processedCount = 0;
        $last_creditor_name = '';

        /* =========================
           LOCK CHEQUE ROW
        ========================= */
        $stmtCheque = $con->prepare("
            SELECT id, status, bank_account_code
            FROM cheque_registers
            WHERE cheque_number = ? AND bank_account_code = ? 
            FOR UPDATE
        ");
        $stmtCheque->bind_param("ss", $chequeno, $bankno);
        $stmtCheque->execute();
        $resultCheque = $stmtCheque->get_result();
        $chequeRow = $resultCheque->fetch_assoc();
        $stmtCheque->close();

        if (!$chequeRow) {
            throw new Exception("Selected cheque not found.");
        }

        if ((string)$chequeRow['status'] !== '1') {
            throw new Exception("Selected cheque is no longer available.");
        }

        /* =========================
           PREPARE STATEMENTS
        ========================= */
        $stmtAcct = $con->prepare("
            SELECT id, pono, creditor_code, payable, paid, grn, invoice_no
            FROM acct_ap
            WHERE id = ?
            FOR UPDATE
        ");

        $stmtFullCheck = $con->prepare("
            SELECT COUNT(billno) AS cnt
            FROM pms_bill_payment
            WHERE invoice_no = ? AND remarks = 'FULL'
        ");

        $stmtInsertPayment = $con->prepare("
            INSERT INTO pms_bill_payment
            (
                creditor_name,
                cheque_amount,
                bankno,
                chequeno,
                gtotal,
                remarks,
                user,
                date,
                time,
                grn,
                pono,
                a_id,
                invoice_no,
                p_remarks,
                approve_status
            )
            VALUES
            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '1')
        ");

        $stmtUpdateAcct = $con->prepare("
            UPDATE acct_ap
            SET paid = ?, status = ?, payment_id = ?
            WHERE id = ?
        ");

        $stmtUpdateCheque = $con->prepare("
            UPDATE cheque_registers
            SET status = '2',
                assigned_to = ?,
                updated_by = ?,
                updated_at = ?,
                amount = ?,
                assigned_at = ?
            WHERE cheque_number = ? AND bank_account_code = ?
        ");

        /* =========================
           PROCESS SELECTED ROWS
        ========================= */
        foreach ($_POST['update'] as $updateidRaw) {

            $updateid = (int)$updateidRaw;
            $eqty2    = cleanAmount($_POST['eqty1_' . $updateid] ?? '0');

            if ($eqty2 <= 0) {
                continue;
            }

            $stmtAcct->bind_param("i", $updateid);
            $stmtAcct->execute();
            $resultAcct = $stmtAcct->get_result();
            $dd = $resultAcct->fetch_assoc();

            if (!$dd) {
                throw new Exception("acct_ap row not found for ID {$updateid}");
            }

            $ono           = $dd['pono'];
            $creditor_name = $dd['creditor_code'];
            $payable       = (float)$dd['payable'];
            $paid          = (float)$dd['paid'];
            $aid           = (int)$dd['id'];
            $grn           = $dd['grn'];
            $invoice_no    = $dd['invoice_no'];

            if ($creditor_name !== $cname) {
                throw new Exception("Invalid row selection detected for ID {$updateid}");
            }

            $new_pay = round($paid + $eqty2, 2);

            $stmtFullCheck->bind_param("s", $invoice_no);
            $stmtFullCheck->execute();
            $resultFullCheck = $stmtFullCheck->get_result();
            $fullCheck = $resultFullCheck->fetch_assoc();
            $count_in = (int)($fullCheck['cnt'] ?? 0);

            if ($count_in > 0) {
                throw new Exception("Invoice already has FULL payment: {$invoice_no}");
            }

            if ($new_pay > $payable) {
                throw new Exception("Payment exceeds payable amount for ID {$updateid}");
            }

            if (abs($new_pay - $payable) < 0.009) {
                $remarks = 'FULL';
                $acct_status = 'Paid';
            } else {
                $remarks = 'PARTIAL';
                $acct_status = 'Partially Paid';
            }

            $stmtInsertPayment->bind_param(
                "sdssdssssssiss",
                $creditor_name,
                $cheque_amount,
                $bankno,
                $chequeno,
                $eqty2,
                $remarks,
                $user,
                $cheque_date,
                $time,
                $grn,
                $ono,
                $aid,
                $invoice_no,
                $p_remarks
            );
            $stmtInsertPayment->execute();

            $last_id = $con->insert_id;

            $stmtUpdateAcct->bind_param(
                "dsii",
                $new_pay,
                $acct_status,
                $last_id,
                $updateid
            );
            $stmtUpdateAcct->execute();

            $last_creditor_name = $creditor_name;
            $processedCount++;
        }

        if ($processedCount === 0) {
            throw new Exception("No valid payment amount entered.");
        }

        $stmtUpdateCheque->bind_param(
            "sssds ss",
            $last_creditor_name,
            $user,
            $updated_at,
            $cheque_amount,
            $as_date,
            $chequeno,
            $bankno
        );
        // fix for accidental spaces in type string by rebinding correctly:
        $stmtUpdateCheque->bind_param(
            "sssdsss",
            $last_creditor_name,
            $user,
            $updated_at,
            $cheque_amount,
            $as_date,
            $chequeno,
            $bankno
        );
        $stmtUpdateCheque->execute();

        if ($stmtUpdateCheque->affected_rows <= 0) {
            throw new Exception("Cheque register update failed.");
        }

        $stmtAcct->close();
        $stmtFullCheck->close();
        $stmtInsertPayment->close();
        $stmtUpdateAcct->close();
        $stmtUpdateCheque->close();

        $con->commit();

        echo '<script>
            alert("Success! All updates committed.");
            window.location.href="prepare_ap_cheque.php?cname=' . urlencode($cname) . '";
        </script>';
        exit;

    } catch (Throwable $e) {
        $con->rollback();

        echo '<script>alert("Transaction Failed! All changes rolled back.\n\nError: ' . addslashes($e->getMessage()) . '");</script>';
        exit;
    }
}

/* =========================
   FETCH AP ROWS
========================= */
$stmtApRows = $con->prepare("
    SELECT *
    FROM acct_ap
    WHERE creditor_code = ? AND status IN ('Waiting For Payment', 'Partially Paid')
    ORDER BY id ASC
");
$stmtApRows->bind_param("s", $cname);
$stmtApRows->execute();
$apRowsResult = $stmtApRows->get_result();

$apRows = [];
while ($row = $apRowsResult->fetch_assoc()) {
    $apRows[] = $row;
}
$stmtApRows->close();

/* =========================
   COUNT OPEN AP
========================= */
$stmtCount = $con->prepare("
    SELECT COUNT(id) AS t_count
    FROM acct_ap
    WHERE creditor_code = ? AND status NOT IN ('Paid')
");
$stmtCount->bind_param("s", $cname);
$stmtCount->execute();
$countResult = $stmtCount->get_result();
$data_count = $countResult->fetch_assoc();
$stmtCount->close();

/* =========================
   FETCH HISTORY
========================= */
$stmtHistory = $con->prepare("
    SELECT *
    FROM pms_bill_payment
    WHERE creditor_name = ?
    GROUP BY chequeno
    ORDER BY billno DESC
");
$stmtHistory->bind_param("s", $cname);
$stmtHistory->execute();
$historyResult = $stmtHistory->get_result();

$historyRows = [];
while ($row = $historyResult->fetch_assoc()) {
    $historyRows[] = $row;
}
$stmtHistory->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cheque Prepare Form</title>

    <link rel="stylesheet" href="jsnew/normalize.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="jsnew/jquery-ui.css">
    <link rel="stylesheet" href="jsnew/select2.min.css">

    <script src="jsnew/jquery.min.js"></script>
    <script src="jsnew/jquery-ui.min.js"></script>
    <script src="jsnew/select2.min.js"></script>
    <script src="jsnew/pprefixfree.min.js"></script>

    <style>
        html { box-sizing: border-box; }
        *, *:before, *:after { box-sizing: border-box; }

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

        input[type="text"],
        input[type="password"],
        input[type="date"],
        input[type="datetime"],
        input[type="email"],
        input[type="number"],
        input[type="search"],
        input[type="tel"],
        input[type="time"],
        input[type="url"],
        textarea,
        select {
            background: #e8eeef;
            border: none;
            font-size: 16px;
            margin: 0 0 20px 0;
            outline: 0;
            padding: 10px;
            color: #333;
            box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
        }

        textarea { height: 70px; }

        button,
        input[type="submit"] {
            padding: 12px 20px;
            color: #FFF;
            background-color: #A085C6;
            font-size: 16px;
            text-align: center;
            border-radius: 5px;
            border: 1px solid #8265B0;
            cursor: pointer;
        }

        table {
            width: 95%;
            border-collapse: collapse;
            margin: 0 auto 20px auto;
            background: #fff;
        }

        td, th {
            padding: 8px;
            border: 1px solid #aaa;
        }

        .big-input {
            font-weight: bold;
            font-size: 24px;
            color: red;
        }
    </style>

    <script>
        $(document).ready(function () {
            $(".state").select2();

            $(".country").change(function () {
                var id = $(this).val();
                $(".state").html('<option value="">Loading...</option>');

                $.ajax({
                    type: "POST",
                    url: "get_cheque.php",
                    data: { id: id },
                    cache: false,
                    success: function (html) {
                        $(".state").html(html).trigger('change');
                    }
                });
            });
        });

        function subTotal() {
            let gt = 0;
            document.querySelectorAll('.paid').forEach(function (el) {
                let val = parseFloat(el.value || 0);
                gt += val;
            });
            document.getElementById("gtotal").value = gt.toFixed(2);
        }

        document.addEventListener("input", function (e) {
            if (e.target.classList.contains("paid")) {
                let row = e.target.closest("tr");
                let available = parseFloat(row.querySelector(".paid3").value || 0);
                let qty = parseFloat(e.target.value || 0);

                if (qty > available) {
                    alert("You cannot pay more than due amount.");
                    e.target.value = available.toFixed(2);
                }

                if (qty < 0) {
                    e.target.value = 0;
                }

                subTotal();
            }
        });

        window.onload = function () {
            subTotal();
        };
    </script>
</head>
<body>

<div id='cssmenu'>
    <ul>
        <li><a href='inviewnew1'><span>Home</span></a></li>
        <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
    </ul>
</div>

<form action="" method="post">
    <table bgcolor="lightblue">
        <tr>
            <td colspan="10" style="font-weight:bold;font-size:14px;color:red">
                Company Name:<br>
                <span style="font-weight:bold;font-size:25px;color:green"><?= h($supplier['supplier_name'] ?? '') ?></span>
            </td>
            <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
                Address:<br>
                <span style="font-weight:bold;font-size:18px;color:green"><?= h($supplier['address'] ?? '') ?></span>
            </td>
            <td colspan="5" style="font-weight:bold;font-size:14px;color:red">
                Contact No:<br>
                <span style="font-weight:bold;font-size:18px;color:green">
                    <?= h(($supplier['contact_person'] ?? '') . ' (' . ($supplier['contact_person_phone'] ?? '') . ')') ?>
                </span>
            </td>
        </tr>
    </table>
</form>

<form name="frmMain1" action="" method="post">
    <input type="hidden" name="cname" value="<?= h($cname) ?>">

    <table bgcolor="lightpink">
        <tr>
            <td align="center"><strong>S.No</strong></td>
            <td align="center" colspan="3"><strong>GRN NO</strong></td>
            <td align="center" colspan="3"><strong>PO NO</strong></td>
            <td align="center" colspan="3"><strong>INVOICE NO</strong></td>
            <td align="center" colspan="2"><strong>REMARKS</strong></td>
            <td align="center" colspan="2"><strong>INVOICE AMOUNT</strong></td>
            <td align="center" colspan="2"><strong>PAYABLE AMOUNT</strong></td>
            <td align="center" colspan="2"><strong>PAID AMOUNT</strong></td>
            <td align="center" colspan="2"><strong>PAYING AMOUNT</strong></td>
        </tr>

        <?php
        $count = 1;
        foreach ($apRows as $row):
            $id = (int)$row['id'];
            $payable = (float)$row['payable'];
            $paid = (float)$row['paid'];
            $due = round($payable - $paid, 2);
        ?>
        <tr>
            <td align="center"><?= $count ?></td>
            <td align="center" colspan="3"><?= h($row['grn']) ?></td>
            <td align="center" colspan="3"><?= h($row['pono']) ?></td>
            <td align="center" colspan="3"><?= h($row['invoice_no']) ?></td>
            <td align="center" colspan="2"><?= h($row['remarks']) ?></td>
            <td align="center" colspan="2">
                <?= h($row['amount']) ?><br>
                VAT: <?= h($row['vat']) ?><br>
                TAX: <?= h($row['tax']) ?>
            </td>
            <td align="center" colspan="2"><?= h($row['payable']) ?></td>
            <td align="center" colspan="2"><?= h($row['paid']) ?></td>

            <input type="hidden" class="paid3" value="<?= $due ?>">

            <td align="center" colspan="2">
                <?php if ($due > 0): ?>
                    <input
                        class="paid big-input"
                        name="eqty1_<?= $id ?>"
                        value="0"
                        type="number"
                        step="0.01"
                        min="0"
                        max="<?= $due ?>"
                        required
                        onchange="subTotal()"
                    >
                    <input type="checkbox" name="update[]" value="<?= $id ?>" checked hidden>
                <?php endif; ?>
            </td>
        </tr>
        <?php
            $count++;
        endforeach;
        ?>

        <tr>
            <td colspan="20" align="right" style="font-weight:bold;font-size:30px;color:red;text-align:right">
                Grand Total
                <input id="gtotal" name="gtotal" class="big-input" readonly>
            </td>
        </tr>

        <tr>
            <td colspan="5">
                <select name="bankno" class="country" required style="width:150px;">
                    <option value="">--Select Bank--</option>
                    <option value="619910">619910</option>
                    <option value="619920">BRAC</option>
                </select>
            </td>

            <td colspan="5">
                <select name="chequeno" class="state" required style="width:150px;">
                    <option value="">--Select Cheque--</option>
                </select>
            </td>

            <td colspan="10" align="right" style="font-weight:bold;font-size:30px;color:red;text-align:right">
                Cheque Amount
                <input id="ooo" name="cheque_amount" class="big-input" required>
            </td>
        </tr>

        <tr>
            <td align="left" colspan="5">Cheque Date</td>
            <td align="left" colspan="15">
                <input name="cheque_date" id="cheque_date" value="<?= date('Y-m-d') ?>" type="date" required>
            </td>
        </tr>

        <tr>
            <td align="left" colspan="5">Remarks</td>
            <td align="left" colspan="15">
                <input name="p_remarks" id="invoice" value="" type="text" placeholder="Remarks" required>
            </td>
        </tr>

        <?php if ((int)($data_count['t_count'] ?? 0) > 0): ?>
        <tr>
            <td colspan="20" align="right">
                <input type="submit" value="Confirm" name="but_update">
            </td>
        </tr>
        <?php endif; ?>
    </table>
</form>

<form name="done" action="" method="post">
    <table bgcolor="lightpink">
        <tr>
            <td align="center"><strong>S.No</strong></td>
            <td align="center" colspan="4"><strong>A ID</strong></td>
            <td align="center" colspan="4"><strong>Cheque No</strong></td>
            <td align="center" colspan="3"><strong>PO No</strong></td>
            <td align="center" colspan="3"><strong>GRN</strong></td>
            <td align="center" colspan="2"><strong>Bank</strong></td>
            <td align="center" colspan="2"><strong>User</strong></td>
            <td align="center" colspan="1"><strong>Time</strong></td>
            <td align="center" colspan="1"><strong>Print</strong></td>
        </tr>

        <?php
        $count = 1;
        foreach ($historyRows as $row):
        ?>
        <tr>
            <td align="center"><?= $count ?></td>
            <td align="center" colspan="4"><?= h($row['a_id']) ?></td>
            <td align="center" colspan="4"><?= h($row['chequeno']) ?></td>
            <td align="center" colspan="3"><?= h($row['pono']) ?></td>
            <td align="center" colspan="3"><?= h($row['grn']) ?></td>
            <td align="center" colspan="2"><?= h($row['bankno']) ?></td>
            <td align="center" colspan="2"><?= h($row['user']) ?></td>
            <td align="center" colspan="1"><?= h($row['time']) ?></td>
            <td align="center" colspan="1">
                <a target="_blank" href="print_allocate_cheque?cname=<?= urlencode($row['creditor_name']) ?>&chequeno=<?= urlencode($row['chequeno']) ?>&id=<?= (int)$row['id'] ?>">Print</a>
            </td>
        </tr>
        <?php
            $count++;
        endforeach;
        ?>
    </table>
</form>

</body>
</html>