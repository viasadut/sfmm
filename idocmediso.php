<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2?err=2');
    }

	
	
	?>



<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION["sess_username"];

$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$dname=$row139['fullname'];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data59 = mysqli_fetch_assoc($query4);
  $date=date('d/m/Y');
  $ortime = date('d/m/Y H:i:s');
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{



$pname = $data59['pname'];
$pmrn = $data59['pmrn'];
$eid = $data59['eid'];
$padd = $data59['padd'];
$adm = $data59['adate'];
$pphone=$data59['pphone'];
$page=$data59['age'];
$psex=$data59['gender'];
$odate = date('m/d/Y H:i:s');
$odate1 = date('m/d/Y');
$infu = $_REQUEST['infu'];
$root = $_REQUEST['root'];

//$dtime = $_REQUEST['dtime'];
$infu1 = $_REQUEST['infu1'];
$infu2 = $_REQUEST['infu2'];
$alert=  $_REQUEST['alert'];
$ddate = $_REQUEST['ddate'];
$date1 = $_REQUEST['date'];
$dilu = $_REQUEST['dilu'];


$sel990="SELECT * FROM medicine WHERE `mname`='$infu';";
$result990 = mysqli_query($con,$sel990);

if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Medicine Name is not in the Database List.. Please contact with Pharmacy Department"); ';
    echo '</script>';
    }





else  if ($infu2==5)


{
	


$ins_query6="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query6);


$ins_query7="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query7);


$ins_query8="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query8);


$ins_query9="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query9);


$ins_query10="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query10);

echo '<script language="javascript">';
    echo 'alert("Successfully added !!"); ';
    echo '</script>';
}


else  if ($infu2==10)


{
	


$ins_query6="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query6);


$ins_query7="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query7);


$ins_query8="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query8);


$ins_query9="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query9);


$ins_query10="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query10);


$ins_query66="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query66);


$ins_query77="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query77);


$ins_query88="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query88);


$ins_query99="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query99);


$ins_query100="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query100);

echo '<script language="javascript">';
    echo 'alert("Successfully added !!"); ';
    echo '</script>';
}



else  if ($infu2==15)


{
	


$ins_query6="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query6);


$ins_query7="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query7);


$ins_query8="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query8);


$ins_query9="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query9);


$ins_query10="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query10);


$ins_query66="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query66);


$ins_query77="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query77);


$ins_query88="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query88);


$ins_query99="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query99);


$ins_query100="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query100);


$ins_query666="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query666);


$ins_query777="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query777);


$ins_query888="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query888);


$ins_query999="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query999);


$ins_query1000="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query1000);

echo '<script language="javascript">';
    echo 'alert("Successfully added !!"); ';
    echo '</script>';
}

else  if ($infu2==20)


{
	


$ins_query6="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query6);


$ins_query7="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query7);


$ins_query8="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query8);


$ins_query9="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query9);


$ins_query10="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query10);


$ins_query66="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query66);


$ins_query77="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query77);


$ins_query88="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query88);


$ins_query99="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query99);


$ins_query100="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query100);


$ins_query666="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query666);


$ins_query777="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query777);


$ins_query888="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query888);


$ins_query999="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query999);


$ins_query1000="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query1000);


$ins_query6661="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query6661);


$ins_query7771="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query7771);


$ins_query8881="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query8881);


$ins_query9991="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query9991);


$ins_query10001="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query10001);



echo '<script language="javascript">';
    echo 'alert("Successfully added !!"); ';
    echo '</script>';
}


else  if ($infu2==50)


{
	


$ins_query6="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query6);


$ins_query7="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query7);


$ins_query8="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query8);


$ins_query9="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query9);


$ins_query10="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query10);


$ins_query66="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query66);


$ins_query77="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query77);


$ins_query88="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query88);


$ins_query99="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query99);


$ins_query100="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query100);


$ins_query666="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query666);


$ins_query777="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query777);


$ins_query888="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query888);


$ins_query999="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query999);


$ins_query1000="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query1000);


$ins_query6661="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query6661);


$ins_query7771="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query7771);


$ins_query8881="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query8881);


$ins_query9991="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query9991);


$ins_query10001="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query10001);



$ins_query620="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query620);


$ins_query720="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query720);


$ins_query820="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query820);


$ins_query920="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query920);


$ins_query1020="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query1020);


$ins_query6620="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query6620);


$ins_query7720="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query7720);


$ins_query8820="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query8820);


$ins_query9920="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query9920);


$ins_query10020="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query10020);


$ins_query66620="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query66620);


$ins_query77720="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query77720);


$ins_query88820="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query88820);


$ins_query99920="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query99920);


$ins_query100020="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query100020);


$ins_query666120="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query666120);


$ins_query777120="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query777120);


$ins_query888120="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query888120);


$ins_query999120="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query999120);


$ins_query1000120="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query1000120);



$ins_query66620a="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query66620a);


$ins_query77720a="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query77720a);


$ins_query88820a="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query88820a);


$ins_query99920a="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query99920a);


$ins_query100020a="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query100020a);


$ins_query666120a="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query666120a);


$ins_query777120a="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query777120a);


$ins_query888120a="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query888120a);


$ins_query999120a="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query999120a);


$ins_query1000120a="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime','$dilu')";
mysqli_query($con,$ins_query1000120a);


echo '<script language="javascript">';
    echo 'alert("Successfully added !!"); ';
    echo '</script>';
}
}


?>







<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /* Stephonce R. MOrris | 2014 */

html { box-sizing: border-box; }

*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito',sans-serif;
  color: #384047;
  background: #A085C6;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
  border: 1px solid #8265B0;
  box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}


input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: lightgreen;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 10%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #A085C6;
  /*#5fcf80*/
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

abbr[title] {
	border-bottom-width: 0;
}


@media screen and (min-width: 480px) {

  form {
    max-width: 1200px;
  }

}
      </style>

    <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

  
 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
	});
</script>




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew//jquery-ui.css" rel="stylesheet" />
    
    <script src="jsnew//jquery-1.12.4.js"></script>
    <script src="jsnew//jquery-ui.js"></script>
    

 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
<script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Stop The Medicine ?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Add The Medicine for Tomorrow?");
}

</script>



</head>


<body>



<script language="JavaScript">
	function ClickCheckAll(vol)
	{
	
		var i=1;
		for(i=1;i<=document.frmMain.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain.chkDel"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain.chkDel"+i+".checked=false");
			}
		}
	}

	function onDelete()
	{
		if(confirm('Do you want to Update the Status ?')==true)
		{
			return true;
			
		}
		else
		{
			return false;
			
		}
	}
</script>


<script language="JavaScript">
	function ClickCheckAll(vol)
	{
	
		var i=1;
		for(i=1;i<=document.frmMain1.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain1.chkDel"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain1.chkDel"+i+".checked=false");
			}
		}
	}

	function onDelete()
	{
		if(confirm('Do you want to Update the Status ?')==true)
		{
			return true;
			
		}
		else
		{
			return false;
			
		}
	}
</script>
<div id='cssmenu'>
<ul>
   <li><a href='inviewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;">INPATIENT MEDICINE (BULK ORDER) </h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td colspan="20" align="right"><button onClick="goBack()">Back</button></td></tr>
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				
				<tr>	  
				<td colspan="20"><?php echo $data59["adoc"]; ?></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="5"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="12"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="5"><?php echo $data59["pmrn"]; ?></td>
				<td colspan="3"><?php echo $data59["eid"]; ?> </td>
					 <td colspan="12"><?php echo $data59["pname"]; ?></td>

					 
</tr>

						
						
<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $data59["padd"]; ?></td></tr>


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="3"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Room Type:</strong></label></td>
						<td colspan="4"><label><strong>Bed No:</strong></label></td>		
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data59["age"]; ?></td>  
             		<td colspan="3"><?php echo $data59["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data59["gender"]; ?></td>
					 <td colspan="4"><?php echo $data59["pphone"]; ?></td>  

			    	 <td colspan="2"><?php echo $data59["room"]; ?></td>  
					 <td colspan="4"><?php echo $data59["room1"]; ?></td>  
					 </tr>

						


<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Medication Form</strong></label></td> </tr>
<td colspan="3" align="center"><label><strong>Date</strong></label></td>
<td colspan="8" align="center"><label><strong>Medication</strong></label></td> 
<td colspan="2" align="center"><label><strong>Route</strong></label></td>
<td colspan="1" align="center"><label><strong>Dilution</strong></label></td>
<td colspan="5" align="center"><label><strong>Instruction</strong></label></td>

<td colspan="1" align="center"><label><strong>Caution</strong></label></td>
</tr>


<td colspan="3" align="left"><input type="text" class="style" name="date" id="datepicker" placeholder="Select Date" value="<?php echo date('m/d/Y');?>" required></td>
<td colspan="8" align="center"><input list="rr" name="infu" class="form-control" autocomplete="off">
  <datalist id="rr">

						<option value=''>-Select Medicine</option>
				<?php 
			$sql76 = "select * from `medicine` where status='Active'";
			$res76 = mysqli_query($con, $sql76);
			if(mysqli_num_rows($res76) > 0) {
				while($row76 = mysqli_fetch_object($res76)) {
					echo "<option value='".$row76->mname."'>".$row76->mname."</option>";
				}
			}
			?>  </datalist></td>

<td colspan="2" align="center"><input list="rr10" name="root" class="form-control">
  <datalist id="rr10">

						<option value=''>-Select Route</option>
						<option value='Intravenous'>Intravenous</option>
						<option value='Intramuscular'>Intramuscular</option>
						<option value='Oral'>Oral</option>
						<option value='Per Rectal'>Per Rectal</option>
						<option value='Sub Cutaneous'>Sub Cutaneous</option>
						<option value='Infusion'>Infusion</option>
						<option value='Deep Intramuscular'>Deep Intramuscular</option>
						<option value='Eye'>Eye</option>
						<option value='Ear'>Ear</option>
						<option value='Epidural'>Epidural</option>
						<option value='Nebulizer'>Nebulizer</option>
						<option value='Inhaler'>Inhaler</option>
						<option value='Nose'>Nose</option>
						<option value='Local'>Local</option>
						<option value='Per Vaginal'>Per Vaginal</option>
			  </datalist></td>
			  
			  
			  
			  
			  <td colspan="1" align="center"><input list="dilu" name="dilu" class="form-control">
  <datalist id="dilu">

						<option value=''>-Select Dilution</option>
				<?php 
			$sql76 = "select * from `medicine` where status='Active'";
			$res76 = mysqli_query($con, $sql76);
			if(mysqli_num_rows($res76) > 0) {
				while($row76 = mysqli_fetch_object($res76)) {
					echo "<option value='".$row76->mname."'>".$row76->mname."</option>";
				}
			}
			?> 
			  </datalist></td>
			  
			  
			  
			  <td colspan="5" align="center"><textarea name="ddate"  value="" /></textarea></td>

			  <td colspan="1" align="left"><input type="radio" name="alert" value="" checked="checked"> Regular <br> <input type="radio" name="alert" value="H. Medi"> <b>High Alert Medication<b></td>

</tr>
<tr>
<td colspan="4" align="center"><label><strong>Time</strong></label></td> 
<td colspan="4" align="center"><label><strong>Quantity</strong></label></td>
</tr>
<tr>
<td colspan="4" align="center"><select list="rr1" name="infu1"  class="form-control">
  
<option value=''>-Select-</option>

<option value='SOS'>SOS</option>
						<option value='00:00'>00:00</option>
						<option value='01:00'>01:00</option>
						<option value='02:00'>02:00</option>
						<option value='03:00'>03:00</option>
						<option value='04:00'>04:00</option>
						<option value='05:00'>05:00</option>
						<option value='06:00'>06:00</option>
						<option value='07:00'>07:00</option>
						<option value='08:00'>08:00</option>
						<option value='09:00'>09:00</option>
						<option value='10:00'>10:00</option>
						<option value='11:00'>11:00</option>
						<option value='12:00'>12:00</option>
						<option value='13:00'>13:00</option>
						<option value='14:00'>14:00</option>
						<option value='15:00'>15:00</option>
						<option value='16:00'>16:00</option>
						<option value='17:00'>17:00</option>
						<option value='18:00'>18:00</option>
						<option value='19:00'>19:00</option>
						<option value='20:00'>20:00</option>
						<option value='21:00'>21:00</option>
						<option value='22:00'>22:00</option>
						<option value='23:00'>23:00</option>
			  </select></td>
<td colspan="4" align="center"><select list="rr2" name="infu2"  class="form-control">
  
<option value=''>-Select-</option>

<option value='5'>5</option>
<option value='10'>10</option>
<option value='15'>15</option>
<option value='20'>20</option>
<option value='50'>50</option>

						
			  </select></td>



</tr>

			        
<tr><td colspan="20"align="right"><button type="submit" name="Submit">Confirm</button> </td></tr>

</form>



</body>

</html>
