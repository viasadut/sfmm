<?php
session_start();
require('db1.php');

// AUTH CHECK
if(!isset($_SESSION['sess_username'])){
    header('Location: login2');
    exit;
}

$user = $_SESSION["sess_username"];
$sno = $_GET['sno'] ?? 0;

// GET BILL
$billQ = mysqli_query($con,"SELECT * FROM pms_bill WHERE billno='$sno'");
$bill = mysqli_fetch_assoc($billQ);

$total_bill_amount = $bill['amount'];
$dis_amount = $bill['dis_amount'];
$pmrn = $bill['pmrn'];
$pname = $bill['pname'];
$eid = $bill['eid'];
$location = $bill['location'];
$appdate = date('Y-m-d');

// ================= SAVE =================
if(isset($_POST['save'])){

    $gtotal = $_POST['gtotal'];
    $total_discount = $_POST['dis_amount'];
    $total_bill = $total_bill_amount;

    // CORRECT DISCOUNT
    $return_discount = ($total_bill > 0) ? ($gtotal * $total_discount) / $total_bill : 0;
    $final_return = $gtotal - $return_discount;

    $vehicle1 = $_POST['vehicle1'];
    $due_remarks = $_POST['due_remarks'];
    $remarks = $_POST['remarks'];

    $apptime = date('Y-m-d H:i:s');

    // INSERT REFUND
    mysqli_query($con,"
        INSERT INTO refund_bill 
        (pmrn,eid,location,amount,dis_amount,r_amount,date,refund_time,refund_by,remarks,p_mode,p_remarks,billno)
        VALUES
        ('$pmrn','$eid','$location','$gtotal','$return_discount','$final_return','$appdate','$apptime','$user','$remarks','$vehicle1','$due_remarks','$sno')
    ");

    $last_id = mysqli_insert_id($con);

    // ACCOUNTING
    mysqli_query($con,"INSERT INTO pms_tb (trans_id,trans_type,acct_code,date,amount,location) VALUES  
    ('$last_id','DR','615100','$appdate','$return_amount','PHARMACY RETURN')");

    mysqli_query($con,"INSERT INTO pms_tb (trans_id,trans_type,acct_code,date,amount,location) VALUES   
    ('$last_id','CR','112000','$appdate','$return_amount','PHARMACY RETURN')");

    mysqli_query($con,"INSERT INTO pms_tb (trans_id,trans_type,acct_code,date,amount,location) VALUES  
    ('$last_id','DR','112000','$appdate','$return_amount','PHARMACY RETURN')");

    mysqli_query($con,"INSERT INTO pms_tb (trans_id,trans_type,acct_code,date,amount,location) VALUES   
    ('$last_id','CR','615100','$appdate','$return_amount','PHARMACY RETURN')");

    // UPDATE BILL
    mysqli_query($con,"UPDATE pms_bill 
        SET r_amount='$final_return', refund_by='$user', refund_time='$apptime'
        WHERE billno='$sno'
    ");

    // LOOP ITEMS
    $q = mysqli_query($con,"SELECT * FROM medi_stock2 WHERE billno='$sno'");
    while($row = mysqli_fetch_assoc($q)){
        $id = $row['id'];
        $qty = $_POST['qty_'.$id] ?? 0;
    
        if($qty > 0){
            $phar_id = $row['phar_id'];
            $phar_sales=mysqli_query($con,"SELECT * FROM phar_sale where id='$phar_id'");
            $phar_sales_data=mysqli_fetch_assoc($phar_sales);
            $phar_id = $row['phar_id'];
            $medi_id = $row['medi_id'];
            $brand     = $row['b_name'];
            $code      = $row['code'];
            $rfid      = $row['rfid'];
            $medi_name = $row['g_name'];
            $uprice    = $phar_sales_data['uprice'];
            $tprice    = $qty * $uprice;
    
            // ===============================
            // INSERT RETURN DETAILS
            // ===============================
            mysqli_query($con,"
                INSERT INTO phar_sale_return
                (`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`brand`,`ins`,`location`,`code`,`pmrn`,`pname`,`rfid`,`billno`,`eid`,`rid`)
                VALUES
                ('$medi_name','$qty','$uprice','$tprice','$user','$appdate','$sno','$brand','0','OPD','$code','$pmrn','$pname','$rfid','$sno','$eid','$last_id')
            ");
    
            // ===============================
            // UPDATE STOCK & SALES
            // ===============================
            mysqli_query($con,"UPDATE medi_stock2 SET r_qty = r_qty + $qty WHERE id='$id'");
            mysqli_query($con,"UPDATE medi_stock SET add_qty = add_qty + $qty WHERE id='$medi_id'");
            mysqli_query($con,"UPDATE phar_sale SET r_qty = r_qty + $qty WHERE id='$phar_id'");
        }
    }

    header("Location: refund_phar_bill_pdf.php?billno=$sno&refundno=$last_id");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pharmacy Return</title>

    <link rel="stylesheet" href="jsnew/bootstrap.min.css">
    <script src="jsnew/jquery.min.js"></script>

    <style>
        body { background:#f5f7fb; }
        .card { border-radius:12px; }
        .table td, .table th { vertical-align: middle; }
    </style>
</head>

<body>

<div class="container mt-4">

    <!-- Header -->
    <div class="card shadow-sm mb-4">
        <div class="card-body text-center bg-primary text-white">
            <h3> Pharmacy Return</h3>
        </div>
    </div>

    <!-- Info -->
    <div class="row mb-3">
        <div class="col-md-4"><div class="alert alert-success">MRN: <?= $pmrn ?></div></div>
        <div class="col-md-4"><div class="alert alert-info">User: <?= $user ?></div></div>
        <div class="col-md-4"><div class="alert alert-warning">Bill No: <?= $sno ?> | <?= date('Y-m-d H:i') ?></div></div>
    </div>

    <form method="post">

    <input type="hidden" id="total_bill_amount" value="<?= $total_bill_amount ?>">
    <input type="hidden" name="gtotal44" id="gtotal_hidden">

    <!-- TABLE -->
    <div class="card shadow-sm">
        <div class="card-body table-responsive">

            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Medicine</th>
                        <th>Code</th>
                        <th>Stock</th>
                        <th>Sold</th>
                        <th>Returned</th>
                        <th>Price</th>
                        <th>Return Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $count=1;
                    $q = mysqli_query($con,"SELECT * FROM medi_stock2 WHERE billno='$sno'");
                    while($row = mysqli_fetch_assoc($q)){

                        $id = $row['id'];
                        $code = $row['code'];
                        $batch_no = $row['batch_no'];
                        $sale = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM phar_sale WHERE code='$code' AND billno='$sno'"));
                        $price = $sale['uprice'];

                        $stockQ = mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(add_qty) as qty FROM medi_stock WHERE code='$code' AND location='Pharmacy_opd' AND batch_no='$batch_no'"));
                        $stock = $stockQ['qty'] ?? 0;

                        $given = $row['given_qty'];
                        $returned = $row['r_qty'];
                        $max = $given - $returned;
                    ?>

                    <tr>
                        <td><?= $count ?></td>
                        <td class="text-start"><?= $row['g_name'] ?></td>
                        <td><?= $code ?></td>
                        <td><span class="badge bg-success"><?= $stock ?></span></td>
                        <td><span class="badge bg-primary"><?= $given ?></span></td>
                        <td><span class="badge bg-danger"><?= $returned ?></span></td>

                        <td>
                            <?= $price ?>
                            <input type="hidden" class="iprice" value="<?= $price ?>">
                        </td>

                        <td>
                            
                        <input type="number"
                        name="qty_<?= $id ?>"
                        class="form-control iquantity"
                        min="0"
                        max="<?= $max ?>"
                        value="0"
                        oninput="calculateTotals()"
                        style="text-align:center; font-weight:bold;">

                        </td>

                        <td class="itotal text-danger fw-bold">0</td>
                    </tr>

                    <?php $count++; } ?>

                </tbody>
            </table>
        </div>
    </div>

    <!-- TOTAL -->
    <div class="row mt-3">
        <div class="col-md-4">
            <label>Grand Total</label>
            <input type="text" name="gtotal" id="gtotal" class="form-control text-end text-danger" readonly>
        </div>

        <div class="col-md-4">
            <label>Discount</label>
            <input type="text" id="dis_amount" name="dis_amount"
                   value="<?= $dis_amount ?>" class="form-control text-end text-warning" readonly>
        </div>

        <div class="col-md-4">
            <label>Return Amount</label>
            <input type="text" id="dis_taka" name="return_amount"
                   class="form-control text-end text-success" readonly>
        </div>
    </div>

    <!-- Totals -->
    <div class="row mt-4">

    <div class="col-md-4">
            <label>Payment Method</label><br>
            <input type="radio" name="vehicle1"  class="mt-2" value="Cash" checked> Cash 
        </div>

        <div class="col-md-4">
            <label>Remark</label>
            <input type="text" name="remarks" class="form-control mt-2" placeholder="Remark">
        </div>




        <div class="col-md-4">
            <label>Confirm Return</label>
            <button type="submit" name="save" class="btn btn-success mt-2 form-control">Confirm Return</button>
        </div>

    </div>

    </form>

    <div class="col-md-12 text-center"><br>
            <a href="phar_home_opd.php" class="btn btn-danger mt-2">Back</a>
    </div>

</div>

<script>
function calculateTotals(){

    let gtotal = 0;

    let iprice = document.getElementsByClassName('iprice');
    let iquantity = document.getElementsByClassName('iquantity');
    let itotal = document.getElementsByClassName('itotal');

    for(let i=0;i<iprice.length;i++){

        let price = parseFloat(iprice[i].value) || 0;
        let qtyInput = iquantity[i];

        let qty = parseFloat(qtyInput.value) || 0;
        let max = parseFloat(qtyInput.max) || 0;

        //VALIDATION
        if(qty > max){
            alert("Return quantity cannot be greater than Sold Qty!");
            qtyInput.value = max;
            qty = max;
        }

        if(qty < 0){
            qtyInput.value = 0;
            qty = 0;
        }

        let total = price * qty;
        itotal[i].innerText = total.toFixed(2);

        gtotal += total;
    }

    $("#gtotal").val(gtotal.toFixed(2));

    // AJAX CALL
    $.ajax({
        url: "phar_opd_ajax_return_calc.php",
        type: "POST",
        data: {
            gtotal: gtotal,
            dis_amount: $("#dis_amount").val(),
            total_bill: $("#total_bill_amount").val()
        },
        success: function(res){
            let data = JSON.parse(res);
            $("#dis_taka").val(parseInt(data.final_return));
        }
    });
}

// 🔥 LIVE EVENT (better than onchange)
$(document).on("input", ".iquantity", function(){
    calculateTotals();
});
</script>

</body>
</html>