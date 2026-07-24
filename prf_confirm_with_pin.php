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
      $po_no = mysqli_real_escape_string($connect, $_POST["po_no"]);  
	  $po_type = mysqli_real_escape_string($connect, $_POST["po_type"]);  
	  $req_department = mysqli_real_escape_string($connect, $_POST["req_department"]);  
	  $creditor_code = mysqli_real_escape_string($connect, $_POST["creditor_code"]);  
	  $pin_no = mysqli_real_escape_string($connect, $_POST["pin_no"]);  
	  
      

	  $query = "SELECT * FROM user WHERE uname = '".$user."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  

	  $pin=$row['p_no'];
	 
	  
	  //$pbp1 = implode(",",$_POST["pbp1"]);
	//  	  $pbp2 = mysqli_real_escape_string($connect, implode (", ", $_POST["pbp1"]));
//		  $strh = ;
		$adate1 = date('m/d/Y', strtotime($_POST["adate"]));  
		$adate2 = date('d/m/Y', strtotime($_POST["adate"]));  
		$ortime = date('Y-m-d H:i:s');
//$pbp1= implode(",",$pbp2);
	 //$temp = mysqli_real_escape_string($connect, $_POST["temp"]);	  
	
      //$user = mysqli_real_escape_string($connect, "$user");  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  
      if($_POST["employee_id"] != '' and $pin===$pin_no)  {
 if($user=='1601')       
      {  
		


           $query = "update purchase_stock3  set fstatus='3',cfo_time='$ortime'  WHERE rfid = '".$_POST["employee_id"]."'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
           $_SESSION['success'] = 'Successfully Approved.';
		   
      }  

      else if($user=='md'|| $user=='md01')       
      {  
		
          
           $query = "update purchase_stock3 set fstatus='4',ceo_time='$ortime' WHERE rfid = '".$_POST["employee_id"]."'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
           $_SESSION['success'] = 'Successfully Approved.';
      }  


      else if($user=='md' || $user=='md01')       
      {  
		

           $query = "update purchase_stock3 set fstatus='3',ceo_time='$ortime' WHERE rfid = '".$_POST["employee_id"]."'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
           $_SESSION['success'] = 'Successfully Approved.';
      }  


      
     }

     else{
		$_SESSION['error'] = 'Something Went Wrong !!';
		//header("Location: http://localhost:8000");
	}

      
}
 ?>
 