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
      
	  //$pbp1 = implode(",",$_POST["pbp1"]);
	//  	  $pbp2 = mysqli_real_escape_string($connect, implode (", ", $_POST["pbp1"]));
//		  $strh = ;
		$adate1 = date('m/d/Y', strtotime($_POST["adate"]));  
		$adate2 = date('d/m/Y', strtotime($_POST["adate"]));  
		  
//$pbp1= implode(",",$pbp2);
	 //$temp = mysqli_real_escape_string($connect, $_POST["temp"]);	  
	
      $dname = mysqli_real_escape_string($connect, $_POST["doc_name"]);  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  


	  $id = mysqli_real_escape_string($connect, $_POST["employee_id3"]);
	  $db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from package_bill_con where id='$id'");
$data = mysqli_fetch_assoc($query4);

$pmrn=$data['pmrn'];
$pname=$data['pname'];
$eid=$data['eid'];
$pphone=$data['pphone'];
$padd=$data['padd'];
$page=$data['page'];
$psex=$data['psex'];
$eid=$data['eid'];
$yage=$data['yage'];
$bdate=$data['bdate'];
$dis=$data['dis'];
$ptype=$data['ptype'];
$date=date('m/d/Y');
$aatime=date('d/m/Y H:i:s');
$adate1=date('Y-m-d');

      if($_POST["employee_id3"] != '' and $dname!='' and $user !='')  {


        
      
         $ins_query="insert into pappnew (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`user`,`yage`,`bdate`,`dis`,`aatime`,`adate1`,`ptype`,`page1`,`bill`,`billby`,`billtime`,`eid`) values 
         ('$pname', '$pmrn','$pphone','$padd','$dname','$date','Package','NOT SEEN','$page','$psex','$user','$yage','$bdate','$dis','$aatime','$adate1','$ptype','Package','BILLED','$user','$aatime','$eid')";
         mysqli_query($con,$ins_query) or die(mysql_error());
		   
         $query = "update package_bill_con set a_status='1' WHERE id = '$id'";  
         mysqli_query($connect,$query) or die(mysql_error());
         $message = 'Data Updated';  

        

      }
        
		
      
 }
 ?>
 