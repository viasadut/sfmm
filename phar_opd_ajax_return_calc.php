<?php

$gtotal = floatval($_POST['gtotal'] ?? 0);
$total_discount = floatval($_POST['dis_amount'] ?? 0);
$total_bill = floatval($_POST['total_bill'] ?? 0);

// Proportional discount
$return_discount = ($total_bill > 0) 
    ? ($gtotal * $total_discount) / $total_bill 
    : 0;

$final_return = $gtotal - $return_discount;

// Extra safety
if($final_return < 0){
    $final_return = 0;
}

echo json_encode([
    'final_return' => round($final_return, 2)
]);