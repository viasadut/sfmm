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
	  $start_remarks = mysqli_real_escape_string($connect, $_POST["start_remarks"]);  
	  $old_date = mysqli_real_escape_string($connect, $_POST["app_date"]);  
	  
      
	  $pbp = mysqli_real_escape_string($connect, $_POST["pbp"]);
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


	  $id = mysqli_real_escape_string($connect, $_POST["employee_id2"]);
	  $db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from iblood where id='$id'");
$data = mysqli_fetch_assoc($query4);

      if($_POST["employee_id2"] != '') { 

	  if($data['nstart']=='' and $data['start1by']=='' and $data['start2by']=='')
        
      {  
           $query = "update iblood set start_remarks='$start_remarks',nsby='$user',nstart='$dtime' WHERE id = '".$_POST["employee_id2"]."'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		   
		   
		  
		   
      }  


	  else if($data['nstart']!='' and $data['start1by']=='' and $data['start2by']=='')
        
      {  
           $query = "update iblood set start1_remarks='$start_remarks',start1by='$user',start1time='$dtime' WHERE id = '".$_POST["employee_id2"]."'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		   
		   
		  
		   
      }

	  else if($data['nstart']!='' and $data['start1by']!='' and $data['start2by']=='')
        
      {  
           $query = "update iblood set start2_remarks='$start_remarks',start2by='$user',start2time='$dtime' WHERE id = '".$_POST["employee_id2"]."'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		   
		   
		  
		   
      }
      

	}
}

 ?>
 