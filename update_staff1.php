<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];

	require('db1.php');

$user=$_SESSION["sess_username"];
$dtime= date('Y-m-d H:i:s');
$date1 = date('m/d/Y');	
$date33 = date('Y-m-d');	
$year = date('Y');	
$odate=date('m/d/Y',strtotime("+1 days"));	
$ndate=date('Y-m-d',strtotime("+1 days"));	

$aatime=date('d/m/Y H:i:s'); 
$adate1=date('Y-m-d'); 
$ct=date('H:i:s');





?>

  <?php  
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 
      $output = '';  
      $message = '';  
      $mrn = mysqli_real_escape_string($connect, $_POST["mrn"]);  
       
      
	  $name = mysqli_real_escape_string($connect, $_POST["name"]);
	  
	 $id = mysqli_real_escape_string($connect, $_POST["employee_idrr"]);	
	 $cno = mysqli_real_escape_string($connect, $_POST["cno"]);	
	 $padd = mysqli_real_escape_string($connect, $_POST["padd"]);	
	 $gender = mysqli_real_escape_string($connect, $_POST["gender"]);	
	 $district = mysqli_real_escape_string($connect, $_POST["district"]);	
	 $dob = mysqli_real_escape_string($connect, $_POST["dob"]);	
	 $sid = mysqli_real_escape_string($connect, $_POST["sid"]);	
	 
	 
	 
	 
	 
$ff=$dob;
$ffd=date('d', strtotime($ff));		
$ffm=date('m', strtotime($ff));		
$ffy=date('Y', strtotime($ff));		

$date1=date_create("$ffd-$ffm-$ffy");
$date91=date_format($date1,'Y-m-d');
$date= date('d-m-Y');
$date2=date_create($date);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date2,$date1);
$diff1= $diff->format("%y Y %m M %d D");
$diff2= $diff->format("%y");
$date23=date('m/d/Y');
	 
//$query1="update staff3 set score1='$sbp',remarks='$remarks',edit_by='$user',edit_time='$dtime' where id='$id'";

//$result1 = mysqli_query($con,$query1) or die ( mysqli_error());

//header("Location: $url?message=" . $message . ");


$ins_query="insert into pappnew (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`user`,`yage`,`bdate`,`dis`,`aatime`,`adate1`,`ptype`,`page1`) values 
('$name', '$mrn','$cno','$padd','MO(General OPD)','$date23','','NOT SEEN','$diff1','$gender','$user','$diff2','$date91','$district','$aatime','$adate1','Staff','Staff_Checkup')";
$res=mysqli_query($con,$ins_query) or die(mysql_error());


$ins_query1="insert into staff_checkup (`sname`,`pmrn`,`sid`,`date`,`year`) values 
('$name','$mrn','$sid','$date33','$year')";
$res1=mysqli_query($con,$ins_query1) or die(mysql_error());

if($res==true and $res1==true){
	echo '<script language="javascript">';
    echo 'alert("Send Successfully!!"); ';
    echo '</script>';
}
else {
	
	echo '<script language="javascript">';
    echo 'alert("Something Went Wrong!!"); ';
    echo '</script>';
}
	
//$url = "indocvitals_new.php?ename=$event&id=$id2";

//header("Refresh: .1; URL=$url");
 

 ?>
 