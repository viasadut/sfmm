<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
    header('Location: login2?err=2');
    }
	require('db1.php');

	$user=$_SESSION["sess_username"];
	$dtime= date('d/m/Y H:i:s');
$date1 = date('m/d/Y');	
$date2 = date('Y-m-d');	
$odate=date('m/d/Y',strtotime("+1 days"));	





$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$dname=$row139['fullname'];

?>

  <?php  
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $pmrn = mysqli_real_escape_string($connect, $_POST["name"]);  
      $infu = mysqli_real_escape_string($connect, $_POST["address"]);  
      $instruc = mysqli_real_escape_string($connect, $_POST["ins"]);  
	  $root = mysqli_real_escape_string($connect, $_POST["route"]);  
	  $dilu = mysqli_real_escape_string($connect, $_POST["result"]);
	 $eid = mysqli_real_escape_string($connect, $_POST["eid"]);	  
	 $time = mysqli_real_escape_string($connect, $_POST["time"]);	
$alert = mysqli_real_escape_string($connect, $_POST["alert"]);		 
	 
	$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid"; 
	 
	 
	 $sel90="SELECT * FROM imedi3 WHERE `pmrn`='$pmrn' and `eid`='$eid' and`infusion`='$infu' and odate='$odate' and `time`='$time' and `status`='Active';";
$result90 = mysqli_query($con,$sel90);

$sel95 = "SELECT * from medicine where mname='$infu' and pre in('Tablet','Vaginal Suppository','VT','Suppository','Soft Capsule','Sachet','Capsule','Injection','Infusion','Laxative Saline','Nebuliser Suspension','Inhalation  Solution','Rectal Solution')"; 
$result95 = mysqli_query($con,$sel95);


if($res90=mysqli_num_rows($result90)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Medicine is Already Added in Tommorows Order  !!"); ';

    echo '</script>';
	
	header("Refresh: .1; URL=$url");
}


else if($row95=mysqli_num_rows($result95)>0)

	
	
	{




//$message= "this is a message";

$query="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values 
('$pmrn','$dname','$eid','$infu','$time','$instruc','$alert','$user','$odate','Active','$root','Rupdated','Ordered','$dtime','$dilu')";

$result = mysqli_query($con,$query) or die ( mysqli_error());

//header("Location: $url?message=" . $message . ");

	echo '<script language="javascript">';
    echo 'alert("Medicine Successfully Added  !!"); ';
    echo '</script>';
$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid";

header("Refresh: .1; URL=$url");
}

else{




//$message= "this is a message";

$query="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`,`reuse`) values 
('$pmrn','$dname','$eid','$infu','$time','$instruc','$alert','$user','$odate','Active','$root','Rupdated','Ordered','$dtime','$dilu','Reuse')";

$result = mysqli_query($con,$query) or die ( mysqli_error());

//header("Location: $url?message=" . $message . ");

	echo '<script language="javascript">';
    echo 'alert("Medicine Successfully Added  !!"); ';
    echo '</script>';
$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid";

header("Refresh: .1; URL=$url");
}

 
	 
}
 ?>
 