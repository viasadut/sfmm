<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
   // if(!isset($_SESSION['sess_username']) || $role!="doctor")
   //{
   // header('Location: login2?err=2');
    //}
	require('db1.php');

	$user=$_SESSION["sess_username"];
	$dtime= date('d/m/Y H:i:s');
$date1 = date('m/d/Y');	
$date2 = date('Y-m-d');	
$etime= date('Y-m-d H:i:s');	

?>

  <?php  
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      
	  //$pbp1 = implode(",",$_POST["pbp1"]);
	//  	  $pbp2 = mysqli_real_escape_string($connect, implode (", ", $_POST["pbp1"]));
//		  $strh = ;
		  
//$pbp1= implode(",",$pbp2);
	 //$temp = mysqli_real_escape_string($connect, $_POST["temp"]);	  
	
      //$user = mysqli_real_escape_string($connect, "$user");  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  
$mtime=date('Y-m-d H:i:s');

	  $id = mysqli_real_escape_string($connect, $_POST["employee_id5"]);
	  $db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
      if($_POST["employee_id5"] != '' and $user!='')  {


		  
      
           $query = "update othoscharge1 set m_received='$user', m_time='$mtime' WHERE id = '$id'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		   
		
      
      }
 }
 ?>
 