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
      //$name = mysqli_real_escape_string($connect, $_POST["name"]);  
     $code_name = mysqli_real_escape_string($connect, $_POST["code_name"]);  
     $location = mysqli_real_escape_string($connect, $_POST["location"]);
	 $c_incharge = mysqli_real_escape_string($connect, $_POST["c_incharge"]);
	 $c_time=date('d/m/Y H:i:s');
	 //$doc_phone='01711206048';
	 	  
	 $staff = "select * from staff1 where sid='$c_incharge'";  
	 $staff_result = mysqli_query($connect, $staff);  
	
      
	  $staff_data = mysqli_fetch_array($staff_result);        
	  $doc_phone=$staff_data['phone'];
	  
	  
	  $staff1 = "select * from staff3 where sid='$c_incharge'";  
	$staff_result1 = mysqli_query($connect, $staff1);  
	
      
	  $staff_data1 = mysqli_fetch_array($staff_result1);        
	  $doc_phone1=$staff_data1['cno'];
	 
	 
      if($_POST["employee_id2"] != '')  
        
      {  
           $query = "insert into code_call (`code_name`,`location`,`code_call_from`,`code_incharge`) values('$code_name','$location','$user','$c_incharge')";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		  
		  if($doc_phone !=''){
		   $message = 'Code '.$code_name.' is called in '.$location. ' at '.$c_time;
		   header("location:/sfmm/sms/public/posprint?message=$message&phone=$doc_phone");
		   }
		   
		   
		   if($doc_phone1 !='')
		   {
			   
			    $message = 'Code '.$code_name.' is called in '.$location. ' at '.$c_time;
		   header("location:/sfmm/sms/public/posprint?message=$message&phone=$doc_phone1");
		   }
		   //$update33="update pappnew set `height`='$pheight',`weight`='$pweight',`temp`='$ptemp',`pbp`='$pbp',`pbmi`='$pbmi',`phyper`='$phyper',`ppluse`='$ppluse',`pheart`='$pheart',`pdm`='$pdm',`pkid`='$pkid',`ptb`='$ptb',`pasthma`='$pasthma',`pthyroid`='$pthyroid',`pneuro`='$pneuro',`psurgery`='$psurgery',`pperiod`='$pperiod',`plmp`='$plmp',`pnochild`='$pnochild',`plchild`='$plchild',`palcohol`='$palcohol',`psmoking`='$psmoking',`pfamily`='$pfamily',`pdrug`='$pdrug',`mstatus`='$pmstatus',`occupation`='$poccupation',`eid`='$count1', `status`='SEEN',`stime`='$stime',`spo2`='$spo2',`rr`='$rr',`pperiod1`='$pperiod1',`plmp1`='$plmp1',`pnochild1`='$pnochild1',`plchild1`='$plchild1',`psurgery1`='$psurgery1',`palcohol1`='$palcohol1',`psmoking1`='$psmoking1',`pfamily1`='$pfamily1',`pdrug1`='$pdrug1',`phyper1`='$phyper1',`pheart1`='$pheart1',`pdm1`='$pdm1',`pkid1`='$pkid1',`ptb1`='$ptb1',`pasthma1`='$pasthma1',`pthyroid1`='$pthyroid1',`pneuro1`='$pneuro1',`liver`='$liver',`liver1`='$liver1',`para`='$para',`para1`='$para1',`gravida`='$gravida',`gravida1`='$gravida1',`clist`='$clist',`clist1`='$clist1',`adate1`='$date4' where `ID`='$id'";
//mysqli_query($con,$update33) or die("Problem in Update pappnew");
      }  
      
}
 ?>
 