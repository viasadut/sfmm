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
      
	  $pbp2 = mysqli_real_escape_string($connect, $_POST["pbp2"]);
	  	  $pmrn = mysqli_real_escape_string($connect, $_POST["pmrn"]);
	  
	  $pbp22=date('m/d/Y',strtotime($pbp2));
	  //$pbp1 = implode(",",$_POST["pbp1"]);
	//  	  $pbp2 = mysqli_real_escape_string($connect, implode (", ", $_POST["pbp1"]));
//		  $strh = ;
		  
		  
//$pbp1= implode(",",$pbp2);
	 //$temp = mysqli_real_escape_string($connect, $_POST["temp"]);	  
	
      //$user = mysqli_real_escape_string($connect, "$user");  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  
	  
	  
	  
$ot_q = "SELECT COUNT(pmrn) FROM ot where pmrn='$pmrn' and date5='$pbp2' and status !='Cancel'"; 
	 
$ot_r = mysqli_query($con, $ot_q) or die(mysqli_error());

// Print out result
$ot_data = mysqli_fetch_array($ot_r);

if($ot_data['COUNT(pmrn)']>0)

{
       echo '<script language="javascript">';
    echo 'alert("Patient Has Already Booked For An OT On Mentioned Date !!"); ';
    echo '</script>';

    }
	  
	  
	  
	  
      else if($_POST["employee_id"] != '')  
        
      {  
           $query = "update ot set otdate='$pbp22',date5='$pbp2' WHERE id = '".$_POST["employee_id"]."'";  
		   mysqli_query($connect,$query) or die(mysql_error());
           $message = 'Data Updated';  
		   
		   /*$query2 = "insert into covid_stage (`pmrn`,`eid`,`pname`,`stage`,`treat`,`eby`,`etime`) values
		   ('$pmrn','$peid','$ppluse','$pbp','$pbp1','$user','$etime')";  
		   mysqli_query($connect,$query2) or die(mysql_error());
           */
		   
		   //$update33="update pappnew set `height`='$pheight',`weight`='$pweight',`temp`='$ptemp',`pbp`='$pbp',`pbmi`='$pbmi',`phyper`='$phyper',`ppluse`='$ppluse',`pheart`='$pheart',`pdm`='$pdm',`pkid`='$pkid',`ptb`='$ptb',`pasthma`='$pasthma',`pthyroid`='$pthyroid',`pneuro`='$pneuro',`psurgery`='$psurgery',`pperiod`='$pperiod',`plmp`='$plmp',`pnochild`='$pnochild',`plchild`='$plchild',`palcohol`='$palcohol',`psmoking`='$psmoking',`pfamily`='$pfamily',`pdrug`='$pdrug',`mstatus`='$pmstatus',`occupation`='$poccupation',`eid`='$count1', `status`='SEEN',`stime`='$stime',`spo2`='$spo2',`rr`='$rr',`pperiod1`='$pperiod1',`plmp1`='$plmp1',`pnochild1`='$pnochild1',`plchild1`='$plchild1',`psurgery1`='$psurgery1',`palcohol1`='$palcohol1',`psmoking1`='$psmoking1',`pfamily1`='$pfamily1',`pdrug1`='$pdrug1',`phyper1`='$phyper1',`pheart1`='$pheart1',`pdm1`='$pdm1',`pkid1`='$pkid1',`ptb1`='$ptb1',`pasthma1`='$pasthma1',`pthyroid1`='$pthyroid1',`pneuro1`='$pneuro1',`liver`='$liver',`liver1`='$liver1',`para`='$para',`para1`='$para1',`gravida`='$gravida',`gravida1`='$gravida1',`clist`='$clist',`clist1`='$clist1',`adate1`='$date4' where `ID`='$id'";
//mysqli_query($con,$update33) or die("Problem in Update pappnew");
      }  
      
}
 ?>
 