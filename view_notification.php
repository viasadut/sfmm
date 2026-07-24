<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','nurse','doctor','imo')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
	
	$user=$_SESSION["sess_username"];
	$test=$_SESSION['user_session_id'];
	
	
	$stime=date('Y-m-d H:i:s');


    
$conn = new mysqli("localhost","root","Godiloveu16","sfmmkpjnew");

$sql="UPDATE noti SET status=0, seen_by='$user',seen_time='$stime' WHERE status=1 and user in ('$user','all')";	
$result=mysqli_query($conn, $sql);

$sql="SELECT * FROM noti where user in ('$user','all')  order by id desc LIMIT 25";
$result=mysqli_query($conn, $sql);


$response='<div class="notification-item" style="text-align:right"><a target="_blank" href="noti_details" style="color:white;font-weight:bold;align:right">See All</a></div>';


while($row=mysqli_fetch_array($result)) {
if($row['status']=='0'){	$response = $response . "<div class='notification-item'>" .
	
	"<div class='notification-subject'>
	<a target='_blank' href='".$row['link']."?pmrn=".$row['pmrn']."&eid=".$row['eid']."' style='color:black;'>" . $row["type"]  . ", By-".$row['add_by']."<br>MRN-".$row['pmrn']."  ".$row['add_time']."</a>

</div>".
	
	
"</div>";}

else if($row['status']=='1'){	$response = $response . "<div class='notification-item'>" .
	
	"<div class='notification-subject'>
	<a target='_blank' href='".$row['link']."?pmrn=".$row['pmrn']."&eid=".$row['eid']."' style='color:black;font-weight:bold'>" . $row["type"]  . ", By-".$row['add_by']."<br>MRN-".$row['pmrn']."  ".$row['add_time']."</a>

</div>".
	
	
"</div>";}
}


if(!empty($response)) {
	print $response;
}


?>