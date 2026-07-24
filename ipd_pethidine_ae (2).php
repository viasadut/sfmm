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
      $pmrn = mysqli_real_escape_string($connect, $_POST["pmrn"]);  
	  $pname = mysqli_real_escape_string($connect, $_POST["pname"]);  
	  $return_remarks = mysqli_real_escape_string($connect, $_POST["return_remarks"]);  
	  $old_date = mysqli_real_escape_string($connect, $_POST["app_date"]);  
	  
      
	  $roption = mysqli_real_escape_string($connect, $_POST["roption"]);
      $bagno = mysqli_real_escape_string($connect, $_POST["bagno"]);
	  $l_doc = mysqli_real_escape_string($connect, $_POST["local"]);
	  $pname = mysqli_real_escape_string($connect, $_POST["ppluse"]);
	  $dname = mysqli_real_escape_string($connect, $_POST["dname"]);
	  $adate = mysqli_real_escape_string($connect, $_POST["adate"]);
	  $aslot = mysqli_real_escape_string($connect, $_POST["txtHint"]);
	  
	  //$pbp1 = implode(",",$_POST["pbp1"]);
	//  	  $pbp2 = mysqli_real_escape_string($connect, implode (", ", $_POST["pbp1"]));
//		  $strh = ;
		$adate1 = date('m/d/Y', strtotime($_POST["adate"]));  
		$adate2 = date('d/m/Y', strtotime($_POST["adate"]));  
		  
//$pbp1= implode(",",$pbp2);
	 //$temp = mysqli_real_escape_string($connect, $_POST["temp"]);	  
	
      //$user = mysqli_real_escape_string($connect, "$user");  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  
$mtime=date('Y-m-d H:i:s');

	  $id = mysqli_real_escape_string($connect, $_POST["employee_id3"]);
	  $db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
      if($_POST["employee_id3"] != '' and $user!='')  {


		  
      
           $query = "update imedi3 set m_received='$user', m_time='$mtime' WHERE id = '$id'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		   
		
      
      }
 }
 ?>
 