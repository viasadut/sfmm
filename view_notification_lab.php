<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('lab','nurse','doctor','imo')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
	
	$user=$_SESSION["sess_username"];
	$test=$_SESSION['user_session_id'];
	
	
	$ndate=date('Y-m-d');
	$t = strtotime("-2 days");
$ndate1= date("Y-m-d", $t);


    
$conn = new mysqli("localhost","root","Godiloveu16","sfmmkpjnew");

/*$sql="UPDATE noti SET status=0, seen_by='$user',seen_time='$stime' WHERE status=1 and user in ('$user','all')";	
$result=mysqli_query($conn, $sql);
*/
$sql="SELECT * FROM iinves where status='Data Updated' and collect='0' and type in ('Lab','LAB','lab') and rstatus!='Cancelled' and ndate between '$ndate1' and '$ndate'";
$result=mysqli_query($conn, $sql);





while($row=mysqli_fetch_array($result)) {
$response = $response . "<div class='notification-item'>" .
	
	"<div class='notification-subject' style='font-weight:bold;color:black'>
	" . $row["infusion"]  . ", Patient Name-".$row['pname']."<br>MRN-".$row['pmrn']."  (".$row['dname'].")

</div>".
	
	
"</div>";}




if(!empty($response)) {
	print $response;
}


?>