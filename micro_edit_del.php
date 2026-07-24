<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('imo','nurse','doctor','lab')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
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
$eid=$_REQUEST['eid'];
$id2=$_REQUEST['id2'];
$pmrn=$_REQUEST['pmrn'];
$url = "labmicro1_edit?";
$appdate= date('Y-m-d');


<?php

<a target="_blank"
                        href="<?php echo $row["linkv"]?>?id=<?php
                            $simple_string = $row["id"];
                            $ciphering = "AES-192-CTR";
                            $iv_length = openssl_cipher_iv_length($ciphering);
                            $options = 0;
                            $encryption_iv = "1234567891011121";
                            $encryption_key = "kpj";
                            $encryption = openssl_encrypt($simple_string,
                            $ciphering,
                            $encryption_key, $options, $encryption_iv);
                            echo $encryption;
                        ?>&pmrn=<?php
                            $simple_string = $row["pmrn"];
                            $encryption = openssl_encrypt($simple_string,
                            $ciphering,
                            $encryption_key, $options, $encryption_iv);
                            echo $encryption;
                        ?>&eid=<?php
                            $simple_string = $row["eid"];
                            $encryption = openssl_encrypt($simple_string,
                            $ciphering,
                            $encryption_key, $options, $encryption_iv);
                            echo $encryption;
                        ?>">EDIT</a>
?>

$query = "SELECT * from staff1 where sid='$sid'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$al= $row['curleave']-$tdays;
$ol= $row['oleave'] + $tdays;
$altaken=$row['altaken'] + $tdays;
$al1= $row['aleave']-$tdays;

if($tleave=='Annual Leave'){
$query = "UPDATE conleavedetails set status='Approved By ALL',mtime='$dtime',appdate='$appdate',appby='$user',status1='Approved' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



$ins_query3="update staff1 set aleave='$al1',altaken='$altaken',curleave='$al' where sid='$sid'";
mysqli_query($con,$ins_query3) or die(mysql_error());




header("Location: $url"); }

else if($tleave=='Conference Leave'){
$query = "UPDATE conleavedetails set status='Approved By ALL',mtime='$dtime',appdate='$appdate',appby='$user',status1='Approved' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$ins_query3="update staff1 set aleave='$al1',altaken='$altaken',curleave='$al' where sid='$sid'";
mysqli_query($con,$ins_query3) or die(mysql_error());



header("Location: $url"); }


else if($tleave=='Training Leave'){
$query = "UPDATE conleavedetails set status='Approved By ALL',mtime='$dtime',appdate='$appdate',appby='$user',status1='Approved' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$ins_query3="update staff1 set aleave='$al1',altaken='$altaken',curleave='$al' where sid='$sid'";
mysqli_query($con,$ins_query3) or die(mysql_error());



header("Location: $url"); }


else{
	$query = "UPDATE conleavedetails set status='Approved By ALL',mtime='$dtime',appdate='$appdate',appby='$user',status1='Approved'  where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$ins_query3="update staff1 set oleave='$ol' where sid='$sid'";
mysqli_query($con,$ins_query3) or die(mysql_error());


$url = "leaveviewmd";
header("Location: $url");
	
}
?>