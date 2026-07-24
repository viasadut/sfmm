<?php 
    require('db1.php');
/*$sel7="Select COUNT(id) from noti where user in ('all','$user') and sa='0'";

$resu7 = mysqli_query($con,$sel7);
$rw7 = mysqli_fetch_assoc($resu7);
*/

/*$_SESSION['id'] = $rw7['COUNT(id)'];
echo $pid = $_SESSION['id'];

*/

$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;



$sel_query="Select * from counter_token where status='Generated' and date='$date' order by id LIMIT 1";

$row1 = mysqli_query($con,$sel_query);
$row = mysqli_fetch_assoc($row1);
echo "".$row['token_no']."";

?>




