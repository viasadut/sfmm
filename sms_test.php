<?php
$staff_phone='01711206048';
$message = 'Order id#'.$order_id.', Total Bill'.$total_bill ;
$sms =  'https://api.mobireach.com.bd/SendTextMessage?Username=sfmc&Password=Dhaka@0088&From=SFMMKPJSH&To='.$staff_phone.'&Message='.$message;

?>