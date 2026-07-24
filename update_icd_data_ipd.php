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
    $eid = mysqli_real_escape_string($connect, $_POST["eid"]);  
	  $icd = mysqli_real_escape_string($connect, implode(",",$_POST["icd"]));  

    $icd_n = explode(",", $icd);



	  
	  //$pbp1 = implode(",",$_POST["pbp1"]);
	//  	  $pbp2 = mysqli_real_escape_string($connect, implode (", ", $_POST["pbp1"]));
//		  $strh = ;
		  
//$pbp1= implode(",",$pbp2);
	 //$temp = mysqli_real_escape_string($connect, $_POST["temp"]);	  
	
      //$user = mysqli_real_escape_string($connect, "$user");  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  


	  $id = mysqli_real_escape_string($connect, $_POST["employee_id3"]);
	  $db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
      if($_POST["employee_id3"] != '')  {


		
           $query = "update inpatient set icd='$icd' WHERE id = '".$_POST["employee_id3"]."'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		   

           foreach ($icd_n as $icd_nn) {
            //echo $fruit . "<br>"; // Output: apple, banana, orange (each on a new line)

            $query2 = "insert icd_stats (icd,pmrn,eid,user,time) values('$icd_nn','$pmrn','$eid','$user','$date2')";  
		   mysqli_query($connect,$query2) or die(mysql_error());
        }
		   
        }



        
		
 }
 ?>
 