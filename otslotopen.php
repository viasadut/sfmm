<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');
 $user = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');




//include("auth1.php");
$user1=$_SESSION["sess_userrole"];
$status = "";
if(isset($_POST['submit'])==1)
{

//$name =$_REQUEST['dname'];
//$did =$_REQUEST['did'];
$date = $_REQUEST['date'];
$checkbox = $_REQUEST['select'];
$date1=date('Y-m-d', strtotime($date));





 
if (($_POST['select'])=="OT01"){
	
	$sel90="SELECT * from otslot WHERE otname ='OT01' and otdate='$date1';";
$result90 = mysqli_query($con,$sel90);

	if($res90=mysqli_num_rows($result90)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Slot For This OT is Already Openned"); ';
    echo '</script>';
    }

else 
{


$ins_query132="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('06:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query132);

$ins_query133="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('06:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query133);

$ins_query134="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('07:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query134);

$ins_query135="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('07:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query135);

	
$ins_query1="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('08:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query1);
$ins_query100="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('08:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query100);
$ins_query101="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('09:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query101);
$ins_query102="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('09:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query102);
$ins_query103="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('10:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query103);
$ins_query104="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('10:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query104);
$ins_query105="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('11:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query105);
$ins_query106="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('11:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query106);
$ins_query107="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('12:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query107);
$ins_query108="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('12:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query108);
$ins_query109="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('13:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query109);
$ins_query110="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('13:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query110);
$ins_query111="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('14:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query111);
$ins_query112="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('14:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query112);
$ins_query113="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('15:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query113);
$ins_query114="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('15:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query114);
$ins_query115="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('16:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query115);
$ins_query116="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('16:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query116);
$ins_query117="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('17:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query117);
$ins_query118="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('17:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query118);
$ins_query119="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('18:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query119);
$ins_query120="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('18:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query120);
$ins_query121="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('19:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query121);
$ins_query122="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('19:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query122);
$ins_query123="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('20:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query123);

$ins_query124="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('20:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query124);

$ins_query125="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('21:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query125);

$ins_query126="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('21:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query126);

$ins_query127="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('22:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query127);

$ins_query128="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('22:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query128);

$ins_query129="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('23:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query129);

$ins_query130="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('23:30', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query130);

$ins_query131="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('00:00', '$date1','vacant','OT01')";
mysqli_query($con,$ins_query131);
   
    echo '<script language="javascript">';
    echo 'alert("OT Slot Open Successfully"); ';
    echo '</script>';
}
}


else if (($_POST['select'])=="OT02"){
	
$sel90="SELECT * from otslot WHERE otname ='OT02' and otdate='$date1';";
$result90 = mysqli_query($con,$sel90);

	if($res90=mysqli_num_rows($result90)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Slot For This OT is Already Openned"); ';
    echo '</script>';
    }
	else 
{
	
	
$ins_query132="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('06:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query132);

$ins_query133="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('06:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query133);

$ins_query134="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('07:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query134);

$ins_query135="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('07:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query135);

	
$ins_query1="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('08:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query1);
$ins_query100="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('08:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query100);
$ins_query101="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('09:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query101);
$ins_query102="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('09:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query102);
$ins_query103="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('10:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query103);
$ins_query104="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('10:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query104);
$ins_query105="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('11:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query105);
$ins_query106="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('11:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query106);
$ins_query107="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('12:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query107);
$ins_query108="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('12:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query108);
$ins_query109="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('13:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query109);
$ins_query110="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('13:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query110);
$ins_query111="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('14:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query111);
$ins_query112="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('14:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query112);
$ins_query113="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('15:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query113);
$ins_query114="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('15:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query114);
$ins_query115="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('16:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query115);
$ins_query116="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('16:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query116);
$ins_query117="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('17:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query117);
$ins_query118="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('17:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query118);
$ins_query119="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('18:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query119);
$ins_query120="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('18:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query120);
$ins_query121="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('19:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query121);
$ins_query122="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('19:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query122);
$ins_query123="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('20:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query123);

$ins_query124="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('20:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query124);

$ins_query125="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('21:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query125);

$ins_query126="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('21:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query126);

$ins_query127="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('22:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query127);

$ins_query128="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('22:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query128);

$ins_query129="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('23:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query129);

$ins_query130="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('23:30', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query130);

$ins_query131="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('00:00', '$date1','vacant','OT02')";
mysqli_query($con,$ins_query131);
   
    echo '<script language="javascript">';
    echo 'alert("OT Slot Open Successfully"); ';
    echo '</script>';

}


}

else if (($_POST['select'])=="OT03"){
	
	$sel90="SELECT * from otslot WHERE otname ='OT03' and otdate='$date1';";
$result90 = mysqli_query($con,$sel90);

	if($res90=mysqli_num_rows($result90)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Slot For This OT is Already Openned"); ';
    echo '</script>';
    }
	else 
{
	
	
$ins_query132="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('06:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query132);

$ins_query133="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('06:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query133);

$ins_query134="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('07:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query134);

$ins_query135="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('07:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query135);

	
$ins_query1="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('08:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query1);
$ins_query100="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('08:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query100);
$ins_query101="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('09:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query101);
$ins_query102="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('09:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query102);
$ins_query103="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('10:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query103);
$ins_query104="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('10:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query104);
$ins_query105="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('11:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query105);
$ins_query106="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('11:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query106);
$ins_query107="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('12:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query107);
$ins_query108="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('12:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query108);
$ins_query109="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('13:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query109);
$ins_query110="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('13:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query110);
$ins_query111="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('14:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query111);
$ins_query112="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('14:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query112);
$ins_query113="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('15:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query113);
$ins_query114="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('15:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query114);
$ins_query115="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('16:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query115);
$ins_query116="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('16:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query116);
$ins_query117="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('17:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query117);
$ins_query118="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('17:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query118);
$ins_query119="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('18:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query119);
$ins_query120="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('18:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query120);
$ins_query121="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('19:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query121);
$ins_query122="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('19:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query122);
$ins_query123="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('20:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query123);

$ins_query124="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('20:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query124);

$ins_query125="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('21:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query125);

$ins_query126="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('21:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query126);

$ins_query127="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('22:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query127);

$ins_query128="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('22:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query128);

$ins_query129="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('23:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query129);

$ins_query130="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('23:30', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query130);

$ins_query131="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('00:00', '$date1','vacant','OT03')";
mysqli_query($con,$ins_query131);
   
    echo '<script language="javascript">';
    echo 'alert("OT Slot Open Successfully"); ';
    echo '</script>';



}
}


else if (($_POST['select'])=="OT04"){
	
	$sel90="SELECT * from otslot WHERE otname ='OT04' and otdate='$date1';";
$result90 = mysqli_query($con,$sel90);

	if($res90=mysqli_num_rows($result90)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Slot For This OT is Already Openned"); ';
    echo '</script>';
    }
	else 
{
	
	
$ins_query132="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('06:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query132);

$ins_query133="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('06:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query133);

$ins_query134="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('07:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query134);

$ins_query135="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('07:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query135);

	
$ins_query1="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('08:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query1);
$ins_query100="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('08:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query100);
$ins_query101="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('09:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query101);
$ins_query102="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('09:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query102);
$ins_query103="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('10:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query103);
$ins_query104="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('10:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query104);
$ins_query105="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('11:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query105);
$ins_query106="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('11:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query106);
$ins_query107="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('12:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query107);
$ins_query108="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('12:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query108);
$ins_query109="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('13:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query109);
$ins_query110="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('13:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query110);
$ins_query111="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('14:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query111);
$ins_query112="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('14:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query112);
$ins_query113="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('15:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query113);
$ins_query114="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('15:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query114);
$ins_query115="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('16:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query115);
$ins_query116="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('16:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query116);
$ins_query117="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('17:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query117);
$ins_query118="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('17:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query118);
$ins_query119="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('18:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query119);
$ins_query120="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('18:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query120);
$ins_query121="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('19:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query121);
$ins_query122="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('19:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query122);
$ins_query123="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('20:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query123);

$ins_query124="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('20:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query124);

$ins_query125="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('21:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query125);

$ins_query126="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('21:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query126);

$ins_query127="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('22:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query127);

$ins_query128="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('22:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query128);

$ins_query129="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('23:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query129);

$ins_query130="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('23:30', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query130);

$ins_query131="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('00:00', '$date1','vacant','OT04')";
mysqli_query($con,$ins_query131);
   
    echo '<script language="javascript">';
    echo 'alert("OT Slot Open Successfully"); ';
    echo '</script>';
}

}

else if (($_POST['select'])=="OT05"){
	
	$sel90="SELECT * from otslot WHERE otname ='OT05' and otdate='$date1';";
$result90 = mysqli_query($con,$sel90);

	if($res90=mysqli_num_rows($result90)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Slot For This OT is Already Openned"); ';
    echo '</script>';
    }
	else 
{
	
	
$ins_query132="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('06:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query132);

$ins_query133="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('06:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query133);

$ins_query134="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('07:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query134);

$ins_query135="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('07:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query135);

	
$ins_query1="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('08:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query1);
$ins_query100="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('08:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query100);
$ins_query101="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('09:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query101);
$ins_query102="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('09:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query102);
$ins_query103="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('10:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query103);
$ins_query104="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('10:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query104);
$ins_query105="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('11:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query105);
$ins_query106="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('11:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query106);
$ins_query107="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('12:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query107);
$ins_query108="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('12:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query108);
$ins_query109="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('13:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query109);
$ins_query110="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('13:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query110);
$ins_query111="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('14:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query111);
$ins_query112="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('14:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query112);
$ins_query113="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('15:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query113);
$ins_query114="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('15:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query114);
$ins_query115="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('16:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query115);
$ins_query116="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('16:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query116);
$ins_query117="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('17:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query117);
$ins_query118="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('17:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query118);
$ins_query119="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('18:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query119);
$ins_query120="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('18:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query120);
$ins_query121="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('19:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query121);
$ins_query122="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('19:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query122);
$ins_query123="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('20:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query123);

$ins_query124="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('20:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query124);

$ins_query125="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('21:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query125);

$ins_query126="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('21:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query126);

$ins_query127="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('22:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query127);

$ins_query128="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('22:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query128);

$ins_query129="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('23:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query129);

$ins_query130="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('23:30', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query130);

$ins_query131="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('00:00', '$date1','vacant','OT05')";
mysqli_query($con,$ins_query131);
   
    echo '<script language="javascript">';
    echo 'alert("OT Slot Open Successfully"); ';
    echo '</script>';
}

}



else if (($_POST['select'])=="OT06"){
	
	$sel90="SELECT * from otslot WHERE otname ='OT06' and otdate='$date1';";
$result90 = mysqli_query($con,$sel90);

	if($res90=mysqli_num_rows($result90)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Slot For This OT is Already Openned"); ';
    echo '</script>';
    }
	else 
{
	
	
$ins_query132="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('06:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query132);

$ins_query133="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('06:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query133);

$ins_query134="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('07:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query134);

$ins_query135="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('07:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query135);

	
$ins_query1="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('08:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query1);
$ins_query100="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('08:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query100);
$ins_query101="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('09:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query101);
$ins_query102="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('09:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query102);
$ins_query103="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('10:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query103);
$ins_query104="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('10:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query104);
$ins_query105="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('11:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query105);
$ins_query106="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('11:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query106);
$ins_query107="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('12:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query107);
$ins_query108="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('12:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query108);
$ins_query109="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('13:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query109);
$ins_query110="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('13:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query110);
$ins_query111="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('14:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query111);
$ins_query112="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('14:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query112);
$ins_query113="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('15:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query113);
$ins_query114="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('15:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query114);
$ins_query115="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('16:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query115);
$ins_query116="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('16:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query116);
$ins_query117="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('17:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query117);
$ins_query118="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('17:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query118);
$ins_query119="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('18:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query119);
$ins_query120="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('18:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query120);
$ins_query121="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('19:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query121);
$ins_query122="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('19:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query122);
$ins_query123="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('20:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query123);

$ins_query124="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('20:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query124);

$ins_query125="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('21:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query125);

$ins_query126="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('21:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query126);

$ins_query127="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('22:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query127);

$ins_query128="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('22:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query128);

$ins_query129="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('23:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query129);

$ins_query130="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('23:30', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query130);

$ins_query131="insert into otslot (`ottime`,`otdate`,`status`,`otname`) values ('00:00', '$date1','vacant','OT06')";
mysqli_query($con,$ins_query131);
   
    echo '<script language="javascript">';
    echo 'alert("OT Slot Open Successfully"); ';
    echo '</script>';
}

}
else 
{
       echo '<script language="javascript">';
    echo 'alert("Not Successful !!"); ';
    echo '</script>';

    }
}

?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>OT Slot</title>
  
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
  padding: 5px;
  width: 50%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 1px;
   margin-left: 100px;
 
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
  padding: 5px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 40%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 2px;
  margin-left: 140px;

}

fieldset {
  margin-bottom: 30px;
  border: none;
 
}

legend {
  font-size: 1.4em;
  margin-bottom: 1px;
}

label {
  display: block;
  margin-bottom: 1px;
    margin-left: 100px;
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
    max-width: 600px;
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
			maxDate: new Date(currentYear, currentMonth, currentDate+14)
		});
	});
</script>





  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='endonursehome'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h2 align="center">SET AVAILABLE OT SLOT DATE &amp; TIME </h2>
		
		<fieldset>

			<legend></legend>
            <!-- Name Input -->
			<span class="style1">
			<label for="age"><strong> OT Name :</strong></label>
			
			<select name="select" required>
	  <option value=''>-Select OT-</option>
	  
						<option value='OT01'>OT01(RED)</option>
						<option value='OT02'>OT02(GREEN)</option>
						<option value='OT03'>OT03(BLUE)</option>
						<option value='OT04'>OT04(YELLOW)</option>
						<option value='OT05'>OT05(WHITE)</option>
						<option value='OT06'>OT06(ORANGE)</option>
						<option value='OT07'>OT07(PINK)</option>
						<option value='OT08'>OT08(PURPLE)</option>
	  
      </select>
      

			
<!-- E-mail Input -->
			<label for="mail"><strong>Date :</strong></label>
									<input type="text" name="date" id="datepicker" placeholder="Select Date" required/>
<!-- Password Input --><!-- Age Dropdown -->
			
  </fieldset>

		<button type="submit" name="submit">Confirm</button>

</form>
  
  

</body>

</html>
