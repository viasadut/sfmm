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
	

?>

  <?php  
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $name = mysqli_real_escape_string($connect, $_POST["pmrn18"]);  
      $address = mysqli_real_escape_string($connect, $_POST["phyper8"]);  
      //$gender = mysqli_real_escape_string($connect, $_POST["gender"]);  
	  $brand = mysqli_real_escape_string($connect, $_POST["brand"]);  
	  $result = mysqli_real_escape_string($connect, $_POST["pheart8"]);
	 $dname = mysqli_real_escape_string($connect, $_POST["dname"]);	  
	 $pname = mysqli_real_escape_string($connect, $_POST["pname"]);	  
	 
	 
     $pheart28 = mysqli_real_escape_string($connect, $_POST["pheart28"]);
	 
	 $pheart38 = mysqli_real_escape_string($connect, $_POST["pheart38"]);
	 $code = mysqli_real_escape_string($connect, $_POST["code"]);
	 
	 
//	 $eid1=$eid+1;
	 
	 $query43 = "SELECT COUNT(pmrn) FROM presnew where pmrn= '$name';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;

$query44 = "SELECT * FROM medicine where mname= '$address' and status='Active';"; 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);
$brand24=$row44['brand1'];
      //$user = mysqli_real_escape_string($connect, "$user");  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  
      if($_POST["employee_id3"] != '')  
        
      {  
           $query = "  
           INSERT INTO pmedi(pmrn,medi,brand,pdos,eid,date,dname,pname,ndate,duration,frelation,code)  
           VALUES('$name','$address','$brand24','$result','$count1','$date1','$dname','$pname','$date2','$pheart28','$pheart38','$code');  
           ";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Inserted';  
		   
      }  
      
}
 ?>
 