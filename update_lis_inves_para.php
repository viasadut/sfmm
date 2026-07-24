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
      $inves_name = mysqli_real_escape_string($connect, $_POST["inves_name"]);  
	  $inves_para = mysqli_real_escape_string($connect, $_POST["inves_para"]);  
	  $inves_code = mysqli_real_escape_string($connect, $_POST["code"]);  
	  
      
	  $inves_machine = mysqli_real_escape_string($connect, $_POST["inves_machine"]);
	  
//		  $strh = ;
		$adate1 = date('m/d/Y', strtotime($_POST["adate"]));  
		$adate2 = date('d/m/Y', strtotime($_POST["adate"]));  
		  
//$pbp1= implode(",",$pbp2);
	 //$temp = mysqli_real_escape_string($connect, $_POST["temp"]);	  
	
      //$user = mysqli_real_escape_string($connect, "$user");  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  
      
        
        
$query43 = "SELECT COUNT(id) FROM lis_inves_table where icode='$inves_code' and para='$inves_para' and mcode='$inves_machine';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
if ($row43['COUNT(id)']==0){

		
		
		
           $query = "insert into lis_inves_table (`inves`,`para`,`mcode`,`icode`) values('$inves_name','$inves_para','$inves_machine','$inves_code')";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		   
		   
}
        
      
}
 ?>
 