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

	  $pbp1 = $_POST["pbp1"];
	  $pbp3 = $_POST["pbp3"];
	  
	  

$query = "SELECT * FROM roaster_2 where id='".$_POST["employee_id"]."'"; 
$result = mysqli_query($con, $query) or die(mysqli_error());
$row = mysqli_fetch_array($result);
$rdate=$row['date'];
$rmor=$row['mor'];
$remor=$row['emor'];

	  
	  
$queryem = "SELECT COUNT(mor) FROM roaster_2 where date ='$rdate' and mor='$rmor' and emor='$pbp3'"; 
$resultem = mysqli_query($con, $queryem) or die(mysqli_error());
$rowem = mysqli_fetch_array($resultem);
$c1em=$rowem['COUNT(mor)'];

	  
	  
      if($_POST["employee_id"] != '' and $c1em==0)  
        
      {  
	  
	    
	  
	  
	  
	  
           $query = "update roaster_2 set emor='$pbp3',location='$pbp1',e_ap_by='$user',e_ap_time='$etime',e_status='Approved',a_status='approved',ap_by='$user',ap_time='$etime' WHERE id = '".$_POST["employee_id"]."'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		   
		   //$query2 = "insert into covid_stage (`pmrn`,`eid`,`pname`,`stage`,`treat`,`eby`,`etime`) values
		   //('$pmrn','$peid','$ppluse','$pbp','$pbp1','$user','$etime')";  
		   //mysqli_query($connect,$query2) or die(mysql_error());
           
		   
		   //$update33="update pappnew set `height`='$pheight',`weight`='$pweight',`temp`='$ptemp',`pbp`='$pbp',`pbmi`='$pbmi',`phyper`='$phyper',`ppluse`='$ppluse',`pheart`='$pheart',`pdm`='$pdm',`pkid`='$pkid',`ptb`='$ptb',`pasthma`='$pasthma',`pthyroid`='$pthyroid',`pneuro`='$pneuro',`psurgery`='$psurgery',`pperiod`='$pperiod',`plmp`='$plmp',`pnochild`='$pnochild',`plchild`='$plchild',`palcohol`='$palcohol',`psmoking`='$psmoking',`pfamily`='$pfamily',`pdrug`='$pdrug',`mstatus`='$pmstatus',`occupation`='$poccupation',`eid`='$count1', `status`='SEEN',`stime`='$stime',`spo2`='$spo2',`rr`='$rr',`pperiod1`='$pperiod1',`plmp1`='$plmp1',`pnochild1`='$pnochild1',`plchild1`='$plchild1',`psurgery1`='$psurgery1',`palcohol1`='$palcohol1',`psmoking1`='$psmoking1',`pfamily1`='$pfamily1',`pdrug1`='$pdrug1',`phyper1`='$phyper1',`pheart1`='$pheart1',`pdm1`='$pdm1',`pkid1`='$pkid1',`ptb1`='$ptb1',`pasthma1`='$pasthma1',`pthyroid1`='$pthyroid1',`pneuro1`='$pneuro1',`liver`='$liver',`liver1`='$liver1',`para`='$para',`para1`='$para1',`gravida`='$gravida',`gravida1`='$gravida1',`clist`='$clist',`clist1`='$clist1',`adate1`='$date4' where `ID`='$id'";
//mysqli_query($con,$update33) or die("Problem in Update pappnew");
      }  
	  
	  
	  else if($_POST["employee_id"] != '' and $pbp3=='Delete')  
        
      {  
	  
	    
	  
	  
	  
	  
           $query = "update roaster_2 set emor='$pbp3',location='$pbp1',e_ap_by='$user',e_ap_time='$etime',e_status='Approved' WHERE id = '".$_POST["employee_id"]."'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		   
		   //$query2 = "insert into covid_stage (`pmrn`,`eid`,`pname`,`stage`,`treat`,`eby`,`etime`) values
		   //('$pmrn','$peid','$ppluse','$pbp','$pbp1','$user','$etime')";  
		   //mysqli_query($connect,$query2) or die(mysql_error());
           
		   
		   //$update33="update pappnew set `height`='$pheight',`weight`='$pweight',`temp`='$ptemp',`pbp`='$pbp',`pbmi`='$pbmi',`phyper`='$phyper',`ppluse`='$ppluse',`pheart`='$pheart',`pdm`='$pdm',`pkid`='$pkid',`ptb`='$ptb',`pasthma`='$pasthma',`pthyroid`='$pthyroid',`pneuro`='$pneuro',`psurgery`='$psurgery',`pperiod`='$pperiod',`plmp`='$plmp',`pnochild`='$pnochild',`plchild`='$plchild',`palcohol`='$palcohol',`psmoking`='$psmoking',`pfamily`='$pfamily',`pdrug`='$pdrug',`mstatus`='$pmstatus',`occupation`='$poccupation',`eid`='$count1', `status`='SEEN',`stime`='$stime',`spo2`='$spo2',`rr`='$rr',`pperiod1`='$pperiod1',`plmp1`='$plmp1',`pnochild1`='$pnochild1',`plchild1`='$plchild1',`psurgery1`='$psurgery1',`palcohol1`='$palcohol1',`psmoking1`='$psmoking1',`pfamily1`='$pfamily1',`pdrug1`='$pdrug1',`phyper1`='$phyper1',`pheart1`='$pheart1',`pdm1`='$pdm1',`pkid1`='$pkid1',`ptb1`='$ptb1',`pasthma1`='$pasthma1',`pthyroid1`='$pthyroid1',`pneuro1`='$pneuro1',`liver`='$liver',`liver1`='$liver1',`para`='$para',`para1`='$para1',`gravida`='$gravida',`gravida1`='$gravida1',`clist`='$clist',`clist1`='$clist1',`adate1`='$date4' where `ID`='$id'";
//mysqli_query($con,$update33) or die("Problem in Update pappnew");
      }  
      
}
 ?>
 