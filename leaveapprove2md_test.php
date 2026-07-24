<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
      header('Location: login2.php?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_REQUEST['user'];
$user=$_SESSION['sess_username'];

$id=$_REQUEST['id'];
$sid=$_REQUEST['sid'];
$tleave=$_REQUEST['tleave'];
$tdays=$_REQUEST['tdays'];
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
//$url = "leaveviewmd_test";
$appdate= date('Y-m-d');




//$id=$_REQUEST['id'];

$queryl = "SELECT * FROM conleavedetails where id= '$id'"; 
	 
$resultl = mysqli_query($con, $queryl) or die(mysqli_error());

// Print out result
$rowl = mysqli_fetch_array($resultl);
//$sid = $rowl['sid'];




$query2 = "SELECT * FROM staff1 where sid= '$sid'"; 
	 
$result2 = mysqli_query($con, $query2) or die(mysqli_error());

// Print out result
$row2 = mysqli_fetch_array($result2);
$email = $row2['email'];
$mname = $row2['mname'];






$query = "SELECT * from staff1 where sid='$sid'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$al= $row['curleave']-$tdays;
$ol= $row['oleave'] + $tdays;
$altaken= $row['altaken'] + $tdays;
$al1= $row['aleave']-$tdays;
if($tleave=='Annual Leave'){
$query = "UPDATE conleavedetails set status='Approved By ALL',mtime='$dtime',appdate='$appdate',appby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$ins_query3="update staff1 set aleave='$al1',altaken='$altaken',curleave='$al' where sid='$sid'";
mysqli_query($con,$ins_query3) or die(mysql_error());



$url = "https://script.google.com/macros/s/AKfycbx5mJa9dddnl1DSutImnF91Lq5_bXBhenK0MLfbVMRsMj1-inVJdsswjkfSQ_o4AfM/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
                  "recipient" => $email,
                  "subject"   => 'Leave Confirmmation'.'-'.$dtime,
                  "body"      => 'Hi '.$rowl['sname'].', Salam and Greetings. As referred to your leave application at PMS-

Please be informed that Your '.$rowl['tleave'].' from  '.$rowl['sdate'].' to '.$rowl['edate'].' is Approved.


Best Regards,
Human Resources Management,
Powered By KPJ_IT_DHAKA'
               ])
            ]);
            $result = curl_exec($ch);
            echo $result;
			header("Location:leaveviewmd_test");
			curl_close($ch);


//header("Location: $url"); 

}


else if($tleave=='Conference Leave'){
$query = "UPDATE conleavedetails set status='Approved By ALL',mtime='$dtime',appdate='$appdate',appby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$ins_query3="update staff1 set aleave='$al1',altaken='$altaken',curleave='$al' where sid='$sid'";
mysqli_query($con,$ins_query3) or die(mysql_error());



$url = "https://script.google.com/macros/s/AKfycbx5mJa9dddnl1DSutImnF91Lq5_bXBhenK0MLfbVMRsMj1-inVJdsswjkfSQ_o4AfM/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
                  "recipient" => $email,
                  "subject"   => 'Leave Confirmmation'.'-'.$dtime,
                  "body"      => 'Hi '.$rowl['sname'].', Salam and Greetings. As referred to your leave application at PMS-

Please be informed that Your '.$rowl['tleave'].' from  '.$rowl['sdate'].' to '.$rowl['edate'].' is Approved.


Best Regards,
Human Resources Management,
Powered By KPJ_IT_DHAKA'
               ])
            ]);
            $result = curl_exec($ch);
            echo $result;
			header("Location:leaveviewmd_test");
			curl_close($ch);

//header("Location: $url"); 

}


else if($tleave=='Training Leave'){
$query = "UPDATE conleavedetails set status='Approved By ALL',mtime='$dtime',appdate='$appdate',appby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$ins_query3="update staff1 set aleave='$al1',altaken='$altaken',curleave='$al' where sid='$sid'";
mysqli_query($con,$ins_query3) or die(mysql_error());


$url = "https://script.google.com/macros/s/AKfycbx5mJa9dddnl1DSutImnF91Lq5_bXBhenK0MLfbVMRsMj1-inVJdsswjkfSQ_o4AfM/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
                  "recipient" => $email,
                  "subject"   => 'Leave Confirmmation'.'-'.$dtime,
                  "body"      => 'Hi '.$rowl['sname'].', Salam and Greetings. As referred to your leave application at PMS-

Please be informed that Your '.$rowl['tleave'].' from  '.$rowl['sdate'].' to '.$rowl['edate'].' is Approved.


Best Regards,
Human Resources Management,
Powered By KPJ_IT_DHAKA'
               ])
            ]);
            $result = curl_exec($ch);
            echo $result;
			header("Location:leaveviewmd_test");
			curl_close($ch);

			}


else{
	$query = "UPDATE conleavedetails set status='Approved By ALL',mtime='$dtime',appdate='$appdate',appby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$ins_query3="update staff1 set oleave='$ol' where sid='$sid'";
mysqli_query($con,$ins_query3) or die(mysql_error());


$url = "https://script.google.com/macros/s/AKfycbx5mJa9dddnl1DSutImnF91Lq5_bXBhenK0MLfbVMRsMj1-inVJdsswjkfSQ_o4AfM/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
                  "recipient" => $email,
                  "subject"   => 'Leave Confirmmation'.'-'.$dtime,
                  "body"      => 'Hi '.$rowl['sname'].', Salam and Greetings. As referred to your leave application at PMS-

Please be informed that Your '.$rowl['tleave'].' from  '.$rowl['sdate'].' to '.$rowl['edate'].' is Approved.


Best Regards,
Human Resources Management,
Powered By KPJ_IT_DHAKA'
               ])
            ]);
            $result = curl_exec($ch);
            echo $result;
			header("Location:leaveviewmd_test");
			curl_close($ch);
	
}
?>