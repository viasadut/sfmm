<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="nurse"){
    header('Location: login2?err=2');
    }
	require('db1.php');

$user=$_SESSION["sess_username"];
$dtime= date('d/m/Y H:i:s');
$date1 = date('m/d/Y');	
$date2 = date('Y-m-d');	
$odate=date('m/d/Y',strtotime("+1 days"));	
$ndate=date('Y-m-d',strtotime("+1 days"));	





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
     
      $infu = mysqli_real_escape_string($connect, $_POST["address1"]);  
     
	 $dilu = mysqli_real_escape_string($connect, $_POST["dilu"]);	
	 

$uprice = mysqli_real_escape_string($connect, $_POST["uprice1"]);		 
$id = mysqli_real_escape_string($connect, $_POST["employee_id2"]);		 
	 

	 
$sel96="SELECT * FROM medi_stock WHERE `rfid`='$dilu';";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=$b_chk_m['add_qty'];
$m_qty1=$b_chk_m['add_qty']-1;
	 
$tfid=$b_chk_m['rfid'];
$g_name=$b_chk_m['g_name'];
$bb_name=$b_chk_m['b_name'];
$u_price=$b_chk_m['u_price'];
$adate= date('Y-m-d');
$code=$b_chk_m['code'];	 
	 
$ddate = date('d/m/Y H:i:s');
if($uprice==$code)
{

//$message= "this is a message";

//$query="update imedi2 set `instruc`='$instruc',`root`='$root',`dilu`='$dilu',`editby`='$user',`edittime`='$dtime' where `pmrn`='$pmrn' and `eid`='$eid' and infusion='$infu' and status1!='SEEN'";

//$result = mysqli_query($con,$query) or die ( mysqli_error());



$query1="update medi_stock set `add_qty`='$m_qty1' where `rfid`='$dilu'";

$result1 = mysqli_query($con,$query1) or die ( mysqli_error());



//header("Location: $url?message=" . $message . ");

	echo '<script language="javascript">';
    echo 'alert("Medicine updated Added  !!"); ';
    echo '</script>';
$url = "discard_medi.php";

header("Refresh: .1; URL=$url");

}

 else {
	 
	 echo '<script language="javascript">';
    echo 'alert("NOT SUCCESSFUL  !!"); ';
    echo '</script>';
 }
	 
}
 ?>
 