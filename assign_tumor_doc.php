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
	  $doc = mysqli_real_escape_string($connect, $_POST["doc"]);  
	  $tid = mysqli_real_escape_string($connect, $_POST["employee_id"]);  
	  
	  
      
	  
	  //$pbp1 = implode(",",$_POST["pbp1"]);
	//  	  $pbp2 = mysqli_real_escape_string($connect, implode (", ", $_POST["pbp1"]));
//		  $strh = ;
		$adate1 = date('m/d/Y', strtotime($_POST["adate"]));  
		$adate2 = date('d/m/Y', strtotime($_POST["adate"]));  
		  
//$pbp1= implode(",",$pbp2);
	 //$temp = mysqli_real_escape_string($connect, $_POST["temp"]);	  
	
      //$user = mysqli_real_escape_string($connect, "$user");  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  
      if($_POST["employee_id"] != '')  
        
      {  

		//foreach($doc as $group_member){
			$query = "insert into tumor_board_doc (dname,pmrn,pname,tid,assign_by,assign_time) values('$doc','$pmrn','$pname','$tid','$user','$etime') ";  
			mysqli_query($connect,$query) or die(mysql_error());
			$message = 'Data Updated';  
		//}
           
		       }  
      
}
 ?>
 