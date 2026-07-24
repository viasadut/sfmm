<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','rad')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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

if (($_POST['select'])=="CR")
{
//$ins_query="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','10:00AM','AVAILABLE','$user')";
//if ($con->query($ins_query) === TRUE) 
//{


$ins_query906="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','080000','AVAILABLE','$user')";
mysqli_query($con,$ins_query906);
$ins_query907="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','081000','AVAILABLE','$user')";
mysqli_query($con,$ins_query907);
$ins_query908="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','082000','AVAILABLE','$user')";
mysqli_query($con,$ins_query908);
$ins_query909="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','083000','AVAILABLE','$user')";
mysqli_query($con,$ins_query909);
$ins_query910="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','084000','AVAILABLE','$user')";
mysqli_query($con,$ins_query910);
$ins_query911="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','085000','AVAILABLE','$user')";
mysqli_query($con,$ins_query911);





$ins_query900="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','090000','AVAILABLE','$user')";
mysqli_query($con,$ins_query900);
$ins_query901="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','091000','AVAILABLE','$user')";
mysqli_query($con,$ins_query901);
$ins_query902="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','092000','AVAILABLE','$user')";
mysqli_query($con,$ins_query902);
$ins_query903="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','093000','AVAILABLE','$user')";
mysqli_query($con,$ins_query903);
$ins_query904="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','094000','AVAILABLE','$user')";
mysqli_query($con,$ins_query904);
$ins_query905="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','095000','AVAILABLE','$user')";
mysqli_query($con,$ins_query905);

$ins_query="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','100000','AVAILABLE','$user')";
mysqli_query($con,$ins_query);

$ins_query143="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','101000','AVAILABLE','$user')";
mysqli_query($con,$ins_query143);
$ins_query543="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','102000','AVAILABLE','$user')";
mysqli_query($con,$ins_query543);
$ins_query544="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','103000','AVAILABLE','$user')";
mysqli_query($con,$ins_query544);

$ins_query545="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','104000','AVAILABLE','$user')";
mysqli_query($con,$ins_query545);

$ins_query546="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','105000','AVAILABLE','$user')";
mysqli_query($con,$ins_query546);

$ins_query547="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','110000','AVAILABLE','$user')";
mysqli_query($con,$ins_query547);

$ins_query548="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','111000','AVAILABLE','$user')";
mysqli_query($con,$ins_query548);

$ins_query549="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','112000','AVAILABLE','$user')";
mysqli_query($con,$ins_query549);

$ins_query550="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','113000','AVAILABLE','$user')";
mysqli_query($con,$ins_query550);

$ins_query551="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','114000','AVAILABLE','$user')";
mysqli_query($con,$ins_query551);

$ins_query552="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','115000','AVAILABLE','$user')";
mysqli_query($con,$ins_query552);

$ins_query553="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','120000','AVAILABLE','$user')";
mysqli_query($con,$ins_query553);

$ins_query554="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','121000','AVAILABLE','$user')";
mysqli_query($con,$ins_query554);

$ins_query555="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','122000','AVAILABLE','$user')";
mysqli_query($con,$ins_query555);

$ins_query556="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','123000','AVAILABLE','$user')";
mysqli_query($con,$ins_query556);

$ins_query557="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','124000','AVAILABLE','$user')";
mysqli_query($con,$ins_query557);

$ins_query558="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','125000','AVAILABLE','$user')";
mysqli_query($con,$ins_query558);

$ins_query559="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','140000','AVAILABLE','$user')";
mysqli_query($con,$ins_query559);

$ins_query560="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','141000','AVAILABLE','$user')";
mysqli_query($con,$ins_query560);

$ins_query561="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','142000','AVAILABLE','$user')";
mysqli_query($con,$ins_query561);

$ins_query562="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','143000','AVAILABLE','$user')";
mysqli_query($con,$ins_query562);

$ins_query563="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','144000','AVAILABLE','$user')";
mysqli_query($con,$ins_query563);

$ins_query564="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','145000','AVAILABLE','$user')";
mysqli_query($con,$ins_query564);

$ins_query565="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','150000','AVAILABLE','$user')";
mysqli_query($con,$ins_query565);

$ins_query566="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','151000','AVAILABLE','$user')";
mysqli_query($con,$ins_query566);

$ins_query567="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','152000','AVAILABLE','$user')";
mysqli_query($con,$ins_query567);

$ins_query568="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','153000','AVAILABLE','$user')";
mysqli_query($con,$ins_query568);


$ins_query569="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','154000','AVAILABLE','$user')";
mysqli_query($con,$ins_query569);

$ins_query570="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','155000','AVAILABLE','$user')";
mysqli_query($con,$ins_query570);

$ins_query571="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','160000','AVAILABLE','$user')";
mysqli_query($con,$ins_query571);

$ins_query572="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','161000','AVAILABLE','$user')";
mysqli_query($con,$ins_query572);

$ins_query573="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','162000','AVAILABLE','$user')";
mysqli_query($con,$ins_query573);

$ins_query574="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','163000','AVAILABLE','$user')";
mysqli_query($con,$ins_query574);

$ins_query575="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','164000','AVAILABLE','$user')";
mysqli_query($con,$ins_query575);

$ins_query576="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','165000','AVAILABLE','$user')";
mysqli_query($con,$ins_query576);


$ins_query912="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','170000','AVAILABLE','$user')";
mysqli_query($con,$ins_query912);
$ins_query913="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','171000','AVAILABLE','$user')";
mysqli_query($con,$ins_query913);
$ins_query914="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','172000','AVAILABLE','$user')";
mysqli_query($con,$ins_query914);
$ins_query915="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','173000','AVAILABLE','$user')";
mysqli_query($con,$ins_query915);
$ins_query916="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','174000','AVAILABLE','$user')";
mysqli_query($con,$ins_query916);
$ins_query917="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','175000','AVAILABLE','$user')";
mysqli_query($con,$ins_query917);


$ins_query918="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','180000','AVAILABLE','$user')";
mysqli_query($con,$ins_query918);
$ins_query919="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','181000','AVAILABLE','$user')";
mysqli_query($con,$ins_query919);
$ins_query920="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','182000','AVAILABLE','$user')";
mysqli_query($con,$ins_query920);
$ins_query921="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','183000','AVAILABLE','$user')";
mysqli_query($con,$ins_query921);
$ins_query922="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','184000','AVAILABLE','$user')";
mysqli_query($con,$ins_query922);
$ins_query923="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','185000','AVAILABLE','$user')";
mysqli_query($con,$ins_query923);

$ins_query924="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','190000','AVAILABLE','$user')";
mysqli_query($con,$ins_query924);
$ins_query925="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','191000','AVAILABLE','$user')";
mysqli_query($con,$ins_query925);
$ins_query926="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','192000','AVAILABLE','$user')";
mysqli_query($con,$ins_query926);
$ins_query927="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','193000','AVAILABLE','$user')";
mysqli_query($con,$ins_query927);
$ins_query928="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','194000','AVAILABLE','$user')";
mysqli_query($con,$ins_query928);
$ins_query929="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','195000','AVAILABLE','$user')";
mysqli_query($con,$ins_query929);


$ins_query930="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','200000','AVAILABLE','$user')";
mysqli_query($con,$ins_query930);
$ins_query931="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','201000','AVAILABLE','$user')";
mysqli_query($con,$ins_query931);
$ins_query932="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','202000','AVAILABLE','$user')";
mysqli_query($con,$ins_query932);
$ins_query933="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','203000','AVAILABLE','$user')";
mysqli_query($con,$ins_query933);
$ins_query934="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','204000','AVAILABLE','$user')";
mysqli_query($con,$ins_query934);
$ins_query935="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','205000','AVAILABLE','$user')";
mysqli_query($con,$ins_query935);


$ins_query936="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','210000','AVAILABLE','$user')";
mysqli_query($con,$ins_query936);
$ins_query937="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','211000','AVAILABLE','$user')";
mysqli_query($con,$ins_query937);
$ins_query938="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','212000','AVAILABLE','$user')";
mysqli_query($con,$ins_query938);
$ins_query939="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','213000','AVAILABLE','$user')";
mysqli_query($con,$ins_query939);
$ins_query940="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','214000','AVAILABLE','$user')";
mysqli_query($con,$ins_query940);
$ins_query941="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','215000','AVAILABLE','$user')";
mysqli_query($con,$ins_query941);



    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
echo '</script>';


}



if (($_POST['select'])=="CR1")
{
//$ins_query="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','10:00AM','AVAILABLE','$user')";
//if ($con->query($ins_query) === TRUE) 
//{


$ins_query906="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','080000','AVAILABLE','$user')";
mysqli_query($con,$ins_query906);
$ins_query907="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','081000','AVAILABLE','$user')";
mysqli_query($con,$ins_query907);
$ins_query908="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','082000','AVAILABLE','$user')";
mysqli_query($con,$ins_query908);
$ins_query909="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','083000','AVAILABLE','$user')";
mysqli_query($con,$ins_query909);
$ins_query910="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','084000','AVAILABLE','$user')";
mysqli_query($con,$ins_query910);
$ins_query911="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','085000','AVAILABLE','$user')";
mysqli_query($con,$ins_query911);





$ins_query900="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','090000','AVAILABLE','$user')";
mysqli_query($con,$ins_query900);
$ins_query901="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','091000','AVAILABLE','$user')";
mysqli_query($con,$ins_query901);
$ins_query902="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','092000','AVAILABLE','$user')";
mysqli_query($con,$ins_query902);
$ins_query903="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','093000','AVAILABLE','$user')";
mysqli_query($con,$ins_query903);
$ins_query904="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','094000','AVAILABLE','$user')";
mysqli_query($con,$ins_query904);
$ins_query905="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','095000','AVAILABLE','$user')";
mysqli_query($con,$ins_query905);

$ins_query="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','100000','AVAILABLE','$user')";
mysqli_query($con,$ins_query);

$ins_query143="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','101000','AVAILABLE','$user')";
mysqli_query($con,$ins_query143);
$ins_query543="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','102000','AVAILABLE','$user')";
mysqli_query($con,$ins_query543);
$ins_query544="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','103000','AVAILABLE','$user')";
mysqli_query($con,$ins_query544);

$ins_query545="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','104000','AVAILABLE','$user')";
mysqli_query($con,$ins_query545);

$ins_query546="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','105000','AVAILABLE','$user')";
mysqli_query($con,$ins_query546);

$ins_query547="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','110000','AVAILABLE','$user')";
mysqli_query($con,$ins_query547);

$ins_query548="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','111000','AVAILABLE','$user')";
mysqli_query($con,$ins_query548);

$ins_query549="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','112000','AVAILABLE','$user')";
mysqli_query($con,$ins_query549);

$ins_query550="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','113000','AVAILABLE','$user')";
mysqli_query($con,$ins_query550);

$ins_query551="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','114000','AVAILABLE','$user')";
mysqli_query($con,$ins_query551);

$ins_query552="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','115000','AVAILABLE','$user')";
mysqli_query($con,$ins_query552);

$ins_query553="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','120000','AVAILABLE','$user')";
mysqli_query($con,$ins_query553);

$ins_query554="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','121000','AVAILABLE','$user')";
mysqli_query($con,$ins_query554);

$ins_query555="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','122000','AVAILABLE','$user')";
mysqli_query($con,$ins_query555);

$ins_query556="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','123000','AVAILABLE','$user')";
mysqli_query($con,$ins_query556);

$ins_query557="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','124000','AVAILABLE','$user')";
mysqli_query($con,$ins_query557);

$ins_query558="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','125000','AVAILABLE','$user')";
mysqli_query($con,$ins_query558);

$ins_query559="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','140000','AVAILABLE','$user')";
mysqli_query($con,$ins_query559);

$ins_query560="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','141000','AVAILABLE','$user')";
mysqli_query($con,$ins_query560);

$ins_query561="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','142000','AVAILABLE','$user')";
mysqli_query($con,$ins_query561);

$ins_query562="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','143000','AVAILABLE','$user')";
mysqli_query($con,$ins_query562);

$ins_query563="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','144000','AVAILABLE','$user')";
mysqli_query($con,$ins_query563);

$ins_query564="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','145000','AVAILABLE','$user')";
mysqli_query($con,$ins_query564);

$ins_query565="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','150000','AVAILABLE','$user')";
mysqli_query($con,$ins_query565);

$ins_query566="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','151000','AVAILABLE','$user')";
mysqli_query($con,$ins_query566);

$ins_query567="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','152000','AVAILABLE','$user')";
mysqli_query($con,$ins_query567);

$ins_query568="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','153000','AVAILABLE','$user')";
mysqli_query($con,$ins_query568);


$ins_query569="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','154000','AVAILABLE','$user')";
mysqli_query($con,$ins_query569);

$ins_query570="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','155000','AVAILABLE','$user')";
mysqli_query($con,$ins_query570);

$ins_query571="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','160000','AVAILABLE','$user')";
mysqli_query($con,$ins_query571);

$ins_query572="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','161000','AVAILABLE','$user')";
mysqli_query($con,$ins_query572);

$ins_query573="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','162000','AVAILABLE','$user')";
mysqli_query($con,$ins_query573);

$ins_query574="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','163000','AVAILABLE','$user')";
mysqli_query($con,$ins_query574);

$ins_query575="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','164000','AVAILABLE','$user')";
mysqli_query($con,$ins_query575);

$ins_query576="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','165000','AVAILABLE','$user')";
mysqli_query($con,$ins_query576);


$ins_query912="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','170000','AVAILABLE','$user')";
mysqli_query($con,$ins_query912);
$ins_query913="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','171000','AVAILABLE','$user')";
mysqli_query($con,$ins_query913);
$ins_query914="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','172000','AVAILABLE','$user')";
mysqli_query($con,$ins_query914);
$ins_query915="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','173000','AVAILABLE','$user')";
mysqli_query($con,$ins_query915);
$ins_query916="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','174000','AVAILABLE','$user')";
mysqli_query($con,$ins_query916);
$ins_query917="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','175000','AVAILABLE','$user')";
mysqli_query($con,$ins_query917);


$ins_query918="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','180000','AVAILABLE','$user')";
mysqli_query($con,$ins_query918);
$ins_query919="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','181000','AVAILABLE','$user')";
mysqli_query($con,$ins_query919);
$ins_query920="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','182000','AVAILABLE','$user')";
mysqli_query($con,$ins_query920);
$ins_query921="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','183000','AVAILABLE','$user')";
mysqli_query($con,$ins_query921);
$ins_query922="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','184000','AVAILABLE','$user')";
mysqli_query($con,$ins_query922);
$ins_query923="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','185000','AVAILABLE','$user')";
mysqli_query($con,$ins_query923);

$ins_query924="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','190000','AVAILABLE','$user')";
mysqli_query($con,$ins_query924);
$ins_query925="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','191000','AVAILABLE','$user')";
mysqli_query($con,$ins_query925);
$ins_query926="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','192000','AVAILABLE','$user')";
mysqli_query($con,$ins_query926);
$ins_query927="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','193000','AVAILABLE','$user')";
mysqli_query($con,$ins_query927);
$ins_query928="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','194000','AVAILABLE','$user')";
mysqli_query($con,$ins_query928);
$ins_query929="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','195000','AVAILABLE','$user')";
mysqli_query($con,$ins_query929);


$ins_query930="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','200000','AVAILABLE','$user')";
mysqli_query($con,$ins_query930);
$ins_query931="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','201000','AVAILABLE','$user')";
mysqli_query($con,$ins_query931);
$ins_query932="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','202000','AVAILABLE','$user')";
mysqli_query($con,$ins_query932);
$ins_query933="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','203000','AVAILABLE','$user')";
mysqli_query($con,$ins_query933);
$ins_query934="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','204000','AVAILABLE','$user')";
mysqli_query($con,$ins_query934);
$ins_query935="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','205000','AVAILABLE','$user')";
mysqli_query($con,$ins_query935);


$ins_query936="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','210000','AVAILABLE','$user')";
mysqli_query($con,$ins_query936);
$ins_query937="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','211000','AVAILABLE','$user')";
mysqli_query($con,$ins_query937);
$ins_query938="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','212000','AVAILABLE','$user')";
mysqli_query($con,$ins_query938);
$ins_query939="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','213000','AVAILABLE','$user')";
mysqli_query($con,$ins_query939);
$ins_query940="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','214000','AVAILABLE','$user')";
mysqli_query($con,$ins_query940);
$ins_query941="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','215000','AVAILABLE','$user')";
mysqli_query($con,$ins_query941);



    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
echo '</script>';


}


else if (($_POST['select'])=="DX")
{
//$ins_query="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','10:00AM','AVAILABLE','$user')";
//if ($con->query($ins_query) === TRUE) 
//{


$ins_query906="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','080000','AVAILABLE','$user')";
mysqli_query($con,$ins_query906);
$ins_query907="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','081000','AVAILABLE','$user')";
mysqli_query($con,$ins_query907);
$ins_query908="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','082000','AVAILABLE','$user')";
mysqli_query($con,$ins_query908);
$ins_query909="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','083000','AVAILABLE','$user')";
mysqli_query($con,$ins_query909);
$ins_query910="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','084000','AVAILABLE','$user')";
mysqli_query($con,$ins_query910);
$ins_query911="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','085000','AVAILABLE','$user')";
mysqli_query($con,$ins_query911);





$ins_query900="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','090000','AVAILABLE','$user')";
mysqli_query($con,$ins_query900);
$ins_query901="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','091000','AVAILABLE','$user')";
mysqli_query($con,$ins_query901);
$ins_query902="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','092000','AVAILABLE','$user')";
mysqli_query($con,$ins_query902);
$ins_query903="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','093000','AVAILABLE','$user')";
mysqli_query($con,$ins_query903);
$ins_query904="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','094000','AVAILABLE','$user')";
mysqli_query($con,$ins_query904);
$ins_query905="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','095000','AVAILABLE','$user')";
mysqli_query($con,$ins_query905);

$ins_query="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','100000','AVAILABLE','$user')";
mysqli_query($con,$ins_query);

$ins_query143="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','101000','AVAILABLE','$user')";
mysqli_query($con,$ins_query143);
$ins_query543="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','102000','AVAILABLE','$user')";
mysqli_query($con,$ins_query543);
$ins_query544="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','103000','AVAILABLE','$user')";
mysqli_query($con,$ins_query544);

$ins_query545="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','104000','AVAILABLE','$user')";
mysqli_query($con,$ins_query545);

$ins_query546="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','105000','AVAILABLE','$user')";
mysqli_query($con,$ins_query546);

$ins_query547="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','110000','AVAILABLE','$user')";
mysqli_query($con,$ins_query547);

$ins_query548="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','111000','AVAILABLE','$user')";
mysqli_query($con,$ins_query548);

$ins_query549="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','112000','AVAILABLE','$user')";
mysqli_query($con,$ins_query549);

$ins_query550="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','113000','AVAILABLE','$user')";
mysqli_query($con,$ins_query550);

$ins_query551="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','114000','AVAILABLE','$user')";
mysqli_query($con,$ins_query551);

$ins_query552="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','115000','AVAILABLE','$user')";
mysqli_query($con,$ins_query552);

$ins_query553="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','120000','AVAILABLE','$user')";
mysqli_query($con,$ins_query553);

$ins_query554="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','121000','AVAILABLE','$user')";
mysqli_query($con,$ins_query554);

$ins_query555="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','122000','AVAILABLE','$user')";
mysqli_query($con,$ins_query555);

$ins_query556="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','123000','AVAILABLE','$user')";
mysqli_query($con,$ins_query556);

$ins_query557="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','124000','AVAILABLE','$user')";
mysqli_query($con,$ins_query557);

$ins_query558="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','125000','AVAILABLE','$user')";
mysqli_query($con,$ins_query558);

$ins_query559="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','140000','AVAILABLE','$user')";
mysqli_query($con,$ins_query559);

$ins_query560="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','141000','AVAILABLE','$user')";
mysqli_query($con,$ins_query560);

$ins_query561="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','142000','AVAILABLE','$user')";
mysqli_query($con,$ins_query561);

$ins_query562="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','143000','AVAILABLE','$user')";
mysqli_query($con,$ins_query562);

$ins_query563="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','144000','AVAILABLE','$user')";
mysqli_query($con,$ins_query563);

$ins_query564="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','145000','AVAILABLE','$user')";
mysqli_query($con,$ins_query564);

$ins_query565="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','150000','AVAILABLE','$user')";
mysqli_query($con,$ins_query565);

$ins_query566="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','151000','AVAILABLE','$user')";
mysqli_query($con,$ins_query566);

$ins_query567="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','152000','AVAILABLE','$user')";
mysqli_query($con,$ins_query567);

$ins_query568="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','153000','AVAILABLE','$user')";
mysqli_query($con,$ins_query568);


$ins_query569="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','154000','AVAILABLE','$user')";
mysqli_query($con,$ins_query569);

$ins_query570="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','155000','AVAILABLE','$user')";
mysqli_query($con,$ins_query570);

$ins_query571="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','160000','AVAILABLE','$user')";
mysqli_query($con,$ins_query571);

$ins_query572="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','161000','AVAILABLE','$user')";
mysqli_query($con,$ins_query572);

$ins_query573="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','162000','AVAILABLE','$user')";
mysqli_query($con,$ins_query573);

$ins_query574="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','163000','AVAILABLE','$user')";
mysqli_query($con,$ins_query574);

$ins_query575="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','164000','AVAILABLE','$user')";
mysqli_query($con,$ins_query575);

$ins_query576="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','165000','AVAILABLE','$user')";
mysqli_query($con,$ins_query576);


$ins_query912="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','170000','AVAILABLE','$user')";
mysqli_query($con,$ins_query912);
$ins_query913="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','171000','AVAILABLE','$user')";
mysqli_query($con,$ins_query913);
$ins_query914="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','172000','AVAILABLE','$user')";
mysqli_query($con,$ins_query914);
$ins_query915="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','173000','AVAILABLE','$user')";
mysqli_query($con,$ins_query915);
$ins_query916="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','174000','AVAILABLE','$user')";
mysqli_query($con,$ins_query916);
$ins_query917="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','175000','AVAILABLE','$user')";
mysqli_query($con,$ins_query917);


$ins_query918="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','180000','AVAILABLE','$user')";
mysqli_query($con,$ins_query918);
$ins_query919="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','181000','AVAILABLE','$user')";
mysqli_query($con,$ins_query919);
$ins_query920="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','182000','AVAILABLE','$user')";
mysqli_query($con,$ins_query920);
$ins_query921="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','183000','AVAILABLE','$user')";
mysqli_query($con,$ins_query921);
$ins_query922="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','184000','AVAILABLE','$user')";
mysqli_query($con,$ins_query922);
$ins_query923="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','185000','AVAILABLE','$user')";
mysqli_query($con,$ins_query923);

$ins_query924="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','190000','AVAILABLE','$user')";
mysqli_query($con,$ins_query924);
$ins_query925="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','191000','AVAILABLE','$user')";
mysqli_query($con,$ins_query925);
$ins_query926="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','192000','AVAILABLE','$user')";
mysqli_query($con,$ins_query926);
$ins_query927="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','193000','AVAILABLE','$user')";
mysqli_query($con,$ins_query927);
$ins_query928="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','194000','AVAILABLE','$user')";
mysqli_query($con,$ins_query928);
$ins_query929="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','195000','AVAILABLE','$user')";
mysqli_query($con,$ins_query929);


$ins_query930="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','200000','AVAILABLE','$user')";
mysqli_query($con,$ins_query930);
$ins_query931="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','201000','AVAILABLE','$user')";
mysqli_query($con,$ins_query931);
$ins_query932="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','202000','AVAILABLE','$user')";
mysqli_query($con,$ins_query932);
$ins_query933="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','203000','AVAILABLE','$user')";
mysqli_query($con,$ins_query933);
$ins_query934="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','204000','AVAILABLE','$user')";
mysqli_query($con,$ins_query934);
$ins_query935="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','205000','AVAILABLE','$user')";
mysqli_query($con,$ins_query935);


$ins_query936="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','210000','AVAILABLE','$user')";
mysqli_query($con,$ins_query936);
$ins_query937="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','211000','AVAILABLE','$user')";
mysqli_query($con,$ins_query937);
$ins_query938="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','212000','AVAILABLE','$user')";
mysqli_query($con,$ins_query938);
$ins_query939="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','213000','AVAILABLE','$user')";
mysqli_query($con,$ins_query939);
$ins_query940="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','214000','AVAILABLE','$user')";
mysqli_query($con,$ins_query940);
$ins_query941="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','215000','AVAILABLE','$user')";
mysqli_query($con,$ins_query941);



    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
echo '</script>';


}





else if (($_POST['select'])=="DX1")
{
//$ins_query="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','10:00AM','AVAILABLE','$user')";
//if ($con->query($ins_query) === TRUE) 
//{


$ins_query906="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','080000','AVAILABLE','$user')";
mysqli_query($con,$ins_query906);
$ins_query907="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','081000','AVAILABLE','$user')";
mysqli_query($con,$ins_query907);
$ins_query908="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','082000','AVAILABLE','$user')";
mysqli_query($con,$ins_query908);
$ins_query909="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','083000','AVAILABLE','$user')";
mysqli_query($con,$ins_query909);
$ins_query910="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','084000','AVAILABLE','$user')";
mysqli_query($con,$ins_query910);
$ins_query911="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','085000','AVAILABLE','$user')";
mysqli_query($con,$ins_query911);





$ins_query900="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','090000','AVAILABLE','$user')";
mysqli_query($con,$ins_query900);
$ins_query901="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','091000','AVAILABLE','$user')";
mysqli_query($con,$ins_query901);
$ins_query902="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','092000','AVAILABLE','$user')";
mysqli_query($con,$ins_query902);
$ins_query903="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','093000','AVAILABLE','$user')";
mysqli_query($con,$ins_query903);
$ins_query904="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','094000','AVAILABLE','$user')";
mysqli_query($con,$ins_query904);
$ins_query905="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','095000','AVAILABLE','$user')";
mysqli_query($con,$ins_query905);

$ins_query="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','100000','AVAILABLE','$user')";
mysqli_query($con,$ins_query);

$ins_query143="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','101000','AVAILABLE','$user')";
mysqli_query($con,$ins_query143);
$ins_query543="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','102000','AVAILABLE','$user')";
mysqli_query($con,$ins_query543);
$ins_query544="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','103000','AVAILABLE','$user')";
mysqli_query($con,$ins_query544);

$ins_query545="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','104000','AVAILABLE','$user')";
mysqli_query($con,$ins_query545);

$ins_query546="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','105000','AVAILABLE','$user')";
mysqli_query($con,$ins_query546);

$ins_query547="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','110000','AVAILABLE','$user')";
mysqli_query($con,$ins_query547);

$ins_query548="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','111000','AVAILABLE','$user')";
mysqli_query($con,$ins_query548);

$ins_query549="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','112000','AVAILABLE','$user')";
mysqli_query($con,$ins_query549);

$ins_query550="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','113000','AVAILABLE','$user')";
mysqli_query($con,$ins_query550);

$ins_query551="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','114000','AVAILABLE','$user')";
mysqli_query($con,$ins_query551);

$ins_query552="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','115000','AVAILABLE','$user')";
mysqli_query($con,$ins_query552);

$ins_query553="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','120000','AVAILABLE','$user')";
mysqli_query($con,$ins_query553);

$ins_query554="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','121000','AVAILABLE','$user')";
mysqli_query($con,$ins_query554);

$ins_query555="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','122000','AVAILABLE','$user')";
mysqli_query($con,$ins_query555);

$ins_query556="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','123000','AVAILABLE','$user')";
mysqli_query($con,$ins_query556);

$ins_query557="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','124000','AVAILABLE','$user')";
mysqli_query($con,$ins_query557);

$ins_query558="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','125000','AVAILABLE','$user')";
mysqli_query($con,$ins_query558);

$ins_query559="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','140000','AVAILABLE','$user')";
mysqli_query($con,$ins_query559);

$ins_query560="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','141000','AVAILABLE','$user')";
mysqli_query($con,$ins_query560);

$ins_query561="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','142000','AVAILABLE','$user')";
mysqli_query($con,$ins_query561);

$ins_query562="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','143000','AVAILABLE','$user')";
mysqli_query($con,$ins_query562);

$ins_query563="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','144000','AVAILABLE','$user')";
mysqli_query($con,$ins_query563);

$ins_query564="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','145000','AVAILABLE','$user')";
mysqli_query($con,$ins_query564);

$ins_query565="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','150000','AVAILABLE','$user')";
mysqli_query($con,$ins_query565);

$ins_query566="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','151000','AVAILABLE','$user')";
mysqli_query($con,$ins_query566);

$ins_query567="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','152000','AVAILABLE','$user')";
mysqli_query($con,$ins_query567);

$ins_query568="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','153000','AVAILABLE','$user')";
mysqli_query($con,$ins_query568);


$ins_query569="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','154000','AVAILABLE','$user')";
mysqli_query($con,$ins_query569);

$ins_query570="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','155000','AVAILABLE','$user')";
mysqli_query($con,$ins_query570);

$ins_query571="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','160000','AVAILABLE','$user')";
mysqli_query($con,$ins_query571);

$ins_query572="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','161000','AVAILABLE','$user')";
mysqli_query($con,$ins_query572);

$ins_query573="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','162000','AVAILABLE','$user')";
mysqli_query($con,$ins_query573);

$ins_query574="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','163000','AVAILABLE','$user')";
mysqli_query($con,$ins_query574);

$ins_query575="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','164000','AVAILABLE','$user')";
mysqli_query($con,$ins_query575);

$ins_query576="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','165000','AVAILABLE','$user')";
mysqli_query($con,$ins_query576);


$ins_query912="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','170000','AVAILABLE','$user')";
mysqli_query($con,$ins_query912);
$ins_query913="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','171000','AVAILABLE','$user')";
mysqli_query($con,$ins_query913);
$ins_query914="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','172000','AVAILABLE','$user')";
mysqli_query($con,$ins_query914);
$ins_query915="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','173000','AVAILABLE','$user')";
mysqli_query($con,$ins_query915);
$ins_query916="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','174000','AVAILABLE','$user')";
mysqli_query($con,$ins_query916);
$ins_query917="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','175000','AVAILABLE','$user')";
mysqli_query($con,$ins_query917);


$ins_query918="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','180000','AVAILABLE','$user')";
mysqli_query($con,$ins_query918);
$ins_query919="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','181000','AVAILABLE','$user')";
mysqli_query($con,$ins_query919);
$ins_query920="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','182000','AVAILABLE','$user')";
mysqli_query($con,$ins_query920);
$ins_query921="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','183000','AVAILABLE','$user')";
mysqli_query($con,$ins_query921);
$ins_query922="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','184000','AVAILABLE','$user')";
mysqli_query($con,$ins_query922);
$ins_query923="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','185000','AVAILABLE','$user')";
mysqli_query($con,$ins_query923);

$ins_query924="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','190000','AVAILABLE','$user')";
mysqli_query($con,$ins_query924);
$ins_query925="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','191000','AVAILABLE','$user')";
mysqli_query($con,$ins_query925);
$ins_query926="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','192000','AVAILABLE','$user')";
mysqli_query($con,$ins_query926);
$ins_query927="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','193000','AVAILABLE','$user')";
mysqli_query($con,$ins_query927);
$ins_query928="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','194000','AVAILABLE','$user')";
mysqli_query($con,$ins_query928);
$ins_query929="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','195000','AVAILABLE','$user')";
mysqli_query($con,$ins_query929);


$ins_query930="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','200000','AVAILABLE','$user')";
mysqli_query($con,$ins_query930);
$ins_query931="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','201000','AVAILABLE','$user')";
mysqli_query($con,$ins_query931);
$ins_query932="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','202000','AVAILABLE','$user')";
mysqli_query($con,$ins_query932);
$ins_query933="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','203000','AVAILABLE','$user')";
mysqli_query($con,$ins_query933);
$ins_query934="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','204000','AVAILABLE','$user')";
mysqli_query($con,$ins_query934);
$ins_query935="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','205000','AVAILABLE','$user')";
mysqli_query($con,$ins_query935);


$ins_query936="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','210000','AVAILABLE','$user')";
mysqli_query($con,$ins_query936);
$ins_query937="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','211000','AVAILABLE','$user')";
mysqli_query($con,$ins_query937);
$ins_query938="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','212000','AVAILABLE','$user')";
mysqli_query($con,$ins_query938);
$ins_query939="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','213000','AVAILABLE','$user')";
mysqli_query($con,$ins_query939);
$ins_query940="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','214000','AVAILABLE','$user')";
mysqli_query($con,$ins_query940);
$ins_query941="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','215000','AVAILABLE','$user')";
mysqli_query($con,$ins_query941);



    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
echo '</script>';


}


else if (($_POST['select'])=="DX2")
{
//$ins_query="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','10:00AM','AVAILABLE','$user')";
//if ($con->query($ins_query) === TRUE) 
//{


$ins_query906="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','080000','AVAILABLE','$user')";
mysqli_query($con,$ins_query906);
$ins_query907="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','081000','AVAILABLE','$user')";
mysqli_query($con,$ins_query907);
$ins_query908="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','082000','AVAILABLE','$user')";
mysqli_query($con,$ins_query908);
$ins_query909="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','083000','AVAILABLE','$user')";
mysqli_query($con,$ins_query909);
$ins_query910="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','084000','AVAILABLE','$user')";
mysqli_query($con,$ins_query910);
$ins_query911="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','085000','AVAILABLE','$user')";
mysqli_query($con,$ins_query911);





$ins_query900="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','090000','AVAILABLE','$user')";
mysqli_query($con,$ins_query900);
$ins_query901="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','091000','AVAILABLE','$user')";
mysqli_query($con,$ins_query901);
$ins_query902="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','092000','AVAILABLE','$user')";
mysqli_query($con,$ins_query902);
$ins_query903="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','093000','AVAILABLE','$user')";
mysqli_query($con,$ins_query903);
$ins_query904="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','094000','AVAILABLE','$user')";
mysqli_query($con,$ins_query904);
$ins_query905="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','095000','AVAILABLE','$user')";
mysqli_query($con,$ins_query905);

$ins_query="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','100000','AVAILABLE','$user')";
mysqli_query($con,$ins_query);

$ins_query143="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','101000','AVAILABLE','$user')";
mysqli_query($con,$ins_query143);
$ins_query543="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','102000','AVAILABLE','$user')";
mysqli_query($con,$ins_query543);
$ins_query544="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','103000','AVAILABLE','$user')";
mysqli_query($con,$ins_query544);

$ins_query545="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','104000','AVAILABLE','$user')";
mysqli_query($con,$ins_query545);

$ins_query546="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','105000','AVAILABLE','$user')";
mysqli_query($con,$ins_query546);

$ins_query547="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','110000','AVAILABLE','$user')";
mysqli_query($con,$ins_query547);

$ins_query548="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','111000','AVAILABLE','$user')";
mysqli_query($con,$ins_query548);

$ins_query549="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','112000','AVAILABLE','$user')";
mysqli_query($con,$ins_query549);

$ins_query550="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','113000','AVAILABLE','$user')";
mysqli_query($con,$ins_query550);

$ins_query551="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','114000','AVAILABLE','$user')";
mysqli_query($con,$ins_query551);

$ins_query552="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','115000','AVAILABLE','$user')";
mysqli_query($con,$ins_query552);

$ins_query553="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','120000','AVAILABLE','$user')";
mysqli_query($con,$ins_query553);

$ins_query554="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','121000','AVAILABLE','$user')";
mysqli_query($con,$ins_query554);

$ins_query555="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','122000','AVAILABLE','$user')";
mysqli_query($con,$ins_query555);

$ins_query556="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','123000','AVAILABLE','$user')";
mysqli_query($con,$ins_query556);

$ins_query557="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','124000','AVAILABLE','$user')";
mysqli_query($con,$ins_query557);

$ins_query558="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','125000','AVAILABLE','$user')";
mysqli_query($con,$ins_query558);

$ins_query559="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','140000','AVAILABLE','$user')";
mysqli_query($con,$ins_query559);

$ins_query560="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','141000','AVAILABLE','$user')";
mysqli_query($con,$ins_query560);

$ins_query561="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','142000','AVAILABLE','$user')";
mysqli_query($con,$ins_query561);

$ins_query562="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','143000','AVAILABLE','$user')";
mysqli_query($con,$ins_query562);

$ins_query563="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','144000','AVAILABLE','$user')";
mysqli_query($con,$ins_query563);

$ins_query564="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','145000','AVAILABLE','$user')";
mysqli_query($con,$ins_query564);

$ins_query565="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','150000','AVAILABLE','$user')";
mysqli_query($con,$ins_query565);

$ins_query566="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','151000','AVAILABLE','$user')";
mysqli_query($con,$ins_query566);

$ins_query567="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','152000','AVAILABLE','$user')";
mysqli_query($con,$ins_query567);

$ins_query568="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','153000','AVAILABLE','$user')";
mysqli_query($con,$ins_query568);


$ins_query569="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','154000','AVAILABLE','$user')";
mysqli_query($con,$ins_query569);

$ins_query570="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','155000','AVAILABLE','$user')";
mysqli_query($con,$ins_query570);

$ins_query571="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','160000','AVAILABLE','$user')";
mysqli_query($con,$ins_query571);

$ins_query572="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','161000','AVAILABLE','$user')";
mysqli_query($con,$ins_query572);

$ins_query573="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','162000','AVAILABLE','$user')";
mysqli_query($con,$ins_query573);

$ins_query574="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','163000','AVAILABLE','$user')";
mysqli_query($con,$ins_query574);

$ins_query575="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','164000','AVAILABLE','$user')";
mysqli_query($con,$ins_query575);

$ins_query576="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','165000','AVAILABLE','$user')";
mysqli_query($con,$ins_query576);


$ins_query912="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','170000','AVAILABLE','$user')";
mysqli_query($con,$ins_query912);
$ins_query913="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','171000','AVAILABLE','$user')";
mysqli_query($con,$ins_query913);
$ins_query914="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','172000','AVAILABLE','$user')";
mysqli_query($con,$ins_query914);
$ins_query915="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','173000','AVAILABLE','$user')";
mysqli_query($con,$ins_query915);
$ins_query916="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','174000','AVAILABLE','$user')";
mysqli_query($con,$ins_query916);
$ins_query917="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','175000','AVAILABLE','$user')";
mysqli_query($con,$ins_query917);


$ins_query918="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','180000','AVAILABLE','$user')";
mysqli_query($con,$ins_query918);
$ins_query919="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','181000','AVAILABLE','$user')";
mysqli_query($con,$ins_query919);
$ins_query920="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','182000','AVAILABLE','$user')";
mysqli_query($con,$ins_query920);
$ins_query921="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','183000','AVAILABLE','$user')";
mysqli_query($con,$ins_query921);
$ins_query922="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','184000','AVAILABLE','$user')";
mysqli_query($con,$ins_query922);
$ins_query923="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','185000','AVAILABLE','$user')";
mysqli_query($con,$ins_query923);

$ins_query924="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','190000','AVAILABLE','$user')";
mysqli_query($con,$ins_query924);
$ins_query925="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','191000','AVAILABLE','$user')";
mysqli_query($con,$ins_query925);
$ins_query926="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','192000','AVAILABLE','$user')";
mysqli_query($con,$ins_query926);
$ins_query927="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','193000','AVAILABLE','$user')";
mysqli_query($con,$ins_query927);
$ins_query928="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','194000','AVAILABLE','$user')";
mysqli_query($con,$ins_query928);
$ins_query929="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','195000','AVAILABLE','$user')";
mysqli_query($con,$ins_query929);


$ins_query930="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','200000','AVAILABLE','$user')";
mysqli_query($con,$ins_query930);
$ins_query931="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','201000','AVAILABLE','$user')";
mysqli_query($con,$ins_query931);
$ins_query932="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','202000','AVAILABLE','$user')";
mysqli_query($con,$ins_query932);
$ins_query933="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','203000','AVAILABLE','$user')";
mysqli_query($con,$ins_query933);
$ins_query934="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','204000','AVAILABLE','$user')";
mysqli_query($con,$ins_query934);
$ins_query935="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','205000','AVAILABLE','$user')";
mysqli_query($con,$ins_query935);


$ins_query936="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','210000','AVAILABLE','$user')";
mysqli_query($con,$ins_query936);
$ins_query937="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','211000','AVAILABLE','$user')";
mysqli_query($con,$ins_query937);
$ins_query938="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','212000','AVAILABLE','$user')";
mysqli_query($con,$ins_query938);
$ins_query939="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','213000','AVAILABLE','$user')";
mysqli_query($con,$ins_query939);
$ins_query940="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','214000','AVAILABLE','$user')";
mysqli_query($con,$ins_query940);
$ins_query941="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','215000','AVAILABLE','$user')";
mysqli_query($con,$ins_query941);



    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
echo '</script>';


}


else if (($_POST['select'])=="DX3")
{
//$ins_query="insert into test (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$name', '$date','10:00AM','AVAILABLE','$user')";
//if ($con->query($ins_query) === TRUE) 
//{


$ins_query906="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','080000','AVAILABLE','$user')";
mysqli_query($con,$ins_query906);
$ins_query907="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','081000','AVAILABLE','$user')";
mysqli_query($con,$ins_query907);
$ins_query908="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','082000','AVAILABLE','$user')";
mysqli_query($con,$ins_query908);
$ins_query909="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','083000','AVAILABLE','$user')";
mysqli_query($con,$ins_query909);
$ins_query910="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','084000','AVAILABLE','$user')";
mysqli_query($con,$ins_query910);
$ins_query911="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','085000','AVAILABLE','$user')";
mysqli_query($con,$ins_query911);





$ins_query900="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','090000','AVAILABLE','$user')";
mysqli_query($con,$ins_query900);
$ins_query901="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','091000','AVAILABLE','$user')";
mysqli_query($con,$ins_query901);
$ins_query902="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','092000','AVAILABLE','$user')";
mysqli_query($con,$ins_query902);
$ins_query903="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','093000','AVAILABLE','$user')";
mysqli_query($con,$ins_query903);
$ins_query904="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','094000','AVAILABLE','$user')";
mysqli_query($con,$ins_query904);
$ins_query905="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','095000','AVAILABLE','$user')";
mysqli_query($con,$ins_query905);

$ins_query="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','100000','AVAILABLE','$user')";
mysqli_query($con,$ins_query);

$ins_query143="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','101000','AVAILABLE','$user')";
mysqli_query($con,$ins_query143);
$ins_query543="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','102000','AVAILABLE','$user')";
mysqli_query($con,$ins_query543);
$ins_query544="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','103000','AVAILABLE','$user')";
mysqli_query($con,$ins_query544);

$ins_query545="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','104000','AVAILABLE','$user')";
mysqli_query($con,$ins_query545);

$ins_query546="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','105000','AVAILABLE','$user')";
mysqli_query($con,$ins_query546);

$ins_query547="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','110000','AVAILABLE','$user')";
mysqli_query($con,$ins_query547);

$ins_query548="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','111000','AVAILABLE','$user')";
mysqli_query($con,$ins_query548);

$ins_query549="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','112000','AVAILABLE','$user')";
mysqli_query($con,$ins_query549);

$ins_query550="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','113000','AVAILABLE','$user')";
mysqli_query($con,$ins_query550);

$ins_query551="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','114000','AVAILABLE','$user')";
mysqli_query($con,$ins_query551);

$ins_query552="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','115000','AVAILABLE','$user')";
mysqli_query($con,$ins_query552);

$ins_query553="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','120000','AVAILABLE','$user')";
mysqli_query($con,$ins_query553);

$ins_query554="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','121000','AVAILABLE','$user')";
mysqli_query($con,$ins_query554);

$ins_query555="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','122000','AVAILABLE','$user')";
mysqli_query($con,$ins_query555);

$ins_query556="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','123000','AVAILABLE','$user')";
mysqli_query($con,$ins_query556);

$ins_query557="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','124000','AVAILABLE','$user')";
mysqli_query($con,$ins_query557);

$ins_query558="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','125000','AVAILABLE','$user')";
mysqli_query($con,$ins_query558);

$ins_query559="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','140000','AVAILABLE','$user')";
mysqli_query($con,$ins_query559);

$ins_query560="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','141000','AVAILABLE','$user')";
mysqli_query($con,$ins_query560);

$ins_query561="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','142000','AVAILABLE','$user')";
mysqli_query($con,$ins_query561);

$ins_query562="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','143000','AVAILABLE','$user')";
mysqli_query($con,$ins_query562);

$ins_query563="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','144000','AVAILABLE','$user')";
mysqli_query($con,$ins_query563);

$ins_query564="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','145000','AVAILABLE','$user')";
mysqli_query($con,$ins_query564);

$ins_query565="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','150000','AVAILABLE','$user')";
mysqli_query($con,$ins_query565);

$ins_query566="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','151000','AVAILABLE','$user')";
mysqli_query($con,$ins_query566);

$ins_query567="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','152000','AVAILABLE','$user')";
mysqli_query($con,$ins_query567);

$ins_query568="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','153000','AVAILABLE','$user')";
mysqli_query($con,$ins_query568);


$ins_query569="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','154000','AVAILABLE','$user')";
mysqli_query($con,$ins_query569);

$ins_query570="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','155000','AVAILABLE','$user')";
mysqli_query($con,$ins_query570);

$ins_query571="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','160000','AVAILABLE','$user')";
mysqli_query($con,$ins_query571);

$ins_query572="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','161000','AVAILABLE','$user')";
mysqli_query($con,$ins_query572);

$ins_query573="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','162000','AVAILABLE','$user')";
mysqli_query($con,$ins_query573);

$ins_query574="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','163000','AVAILABLE','$user')";
mysqli_query($con,$ins_query574);

$ins_query575="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','164000','AVAILABLE','$user')";
mysqli_query($con,$ins_query575);

$ins_query576="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','165000','AVAILABLE','$user')";
mysqli_query($con,$ins_query576);


$ins_query912="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','170000','AVAILABLE','$user')";
mysqli_query($con,$ins_query912);
$ins_query913="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','171000','AVAILABLE','$user')";
mysqli_query($con,$ins_query913);
$ins_query914="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','172000','AVAILABLE','$user')";
mysqli_query($con,$ins_query914);
$ins_query915="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','173000','AVAILABLE','$user')";
mysqli_query($con,$ins_query915);
$ins_query916="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','174000','AVAILABLE','$user')";
mysqli_query($con,$ins_query916);
$ins_query917="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','175000','AVAILABLE','$user')";
mysqli_query($con,$ins_query917);


$ins_query918="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','180000','AVAILABLE','$user')";
mysqli_query($con,$ins_query918);
$ins_query919="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','181000','AVAILABLE','$user')";
mysqli_query($con,$ins_query919);
$ins_query920="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','182000','AVAILABLE','$user')";
mysqli_query($con,$ins_query920);
$ins_query921="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','183000','AVAILABLE','$user')";
mysqli_query($con,$ins_query921);
$ins_query922="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','184000','AVAILABLE','$user')";
mysqli_query($con,$ins_query922);
$ins_query923="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','185000','AVAILABLE','$user')";
mysqli_query($con,$ins_query923);

$ins_query924="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','190000','AVAILABLE','$user')";
mysqli_query($con,$ins_query924);
$ins_query925="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','191000','AVAILABLE','$user')";
mysqli_query($con,$ins_query925);
$ins_query926="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','192000','AVAILABLE','$user')";
mysqli_query($con,$ins_query926);
$ins_query927="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','193000','AVAILABLE','$user')";
mysqli_query($con,$ins_query927);
$ins_query928="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','194000','AVAILABLE','$user')";
mysqli_query($con,$ins_query928);
$ins_query929="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','195000','AVAILABLE','$user')";
mysqli_query($con,$ins_query929);


$ins_query930="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','200000','AVAILABLE','$user')";
mysqli_query($con,$ins_query930);
$ins_query931="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','201000','AVAILABLE','$user')";
mysqli_query($con,$ins_query931);
$ins_query932="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','202000','AVAILABLE','$user')";
mysqli_query($con,$ins_query932);
$ins_query933="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','203000','AVAILABLE','$user')";
mysqli_query($con,$ins_query933);
$ins_query934="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','204000','AVAILABLE','$user')";
mysqli_query($con,$ins_query934);
$ins_query935="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','205000','AVAILABLE','$user')";
mysqli_query($con,$ins_query935);


$ins_query936="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','210000','AVAILABLE','$user')";
mysqli_query($con,$ins_query936);
$ins_query937="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','211000','AVAILABLE','$user')";
mysqli_query($con,$ins_query937);
$ins_query938="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','212000','AVAILABLE','$user')";
mysqli_query($con,$ins_query938);
$ins_query939="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','213000','AVAILABLE','$user')";
mysqli_query($con,$ins_query939);
$ins_query940="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','214000','AVAILABLE','$user')";
mysqli_query($con,$ins_query940);
$ins_query941="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','215000','AVAILABLE','$user')";
mysqli_query($con,$ins_query941);



    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
echo '</script>';


}



 
else if (($_POST['select'])=="US")
{
	

	
$ins_query2190="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','060000','AVAILABLE','$user')";
mysqli_query($con,$ins_query2190);
$ins_query2191="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','062000','AVAILABLE','$user')";
mysqli_query($con,$ins_query2191);
$ins_query2192="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','064000','AVAILABLE','$user')";
mysqli_query($con,$ins_query2192);


$ins_query3190="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','070000','AVAILABLE','$user')";
mysqli_query($con,$ins_query3190);
$ins_query3191="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','072000','AVAILABLE','$user')";
mysqli_query($con,$ins_query3191);
$ins_query3192="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','074000','AVAILABLE','$user')";
mysqli_query($con,$ins_query3192);
	
	
	
	

	
	
	
$ins_query1190="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','080000','AVAILABLE','$user')";
mysqli_query($con,$ins_query1190);
$ins_query1191="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','082000','AVAILABLE','$user')";
mysqli_query($con,$ins_query1191);
$ins_query1192="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','084000','AVAILABLE','$user')";
mysqli_query($con,$ins_query1192);




	
$ins_query1="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','090000','AVAILABLE','$user')";
mysqli_query($con,$ins_query1);
$ins_query100="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','092000','AVAILABLE','$user')";
mysqli_query($con,$ins_query100);
$ins_query101="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','094000','AVAILABLE','$user')";
mysqli_query($con,$ins_query101);
$ins_query102="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','100000','AVAILABLE','$user')";
mysqli_query($con,$ins_query102);
$ins_query103="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','102000','AVAILABLE','$user')";
mysqli_query($con,$ins_query103);
$ins_query104="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','104000','AVAILABLE','$user')";
mysqli_query($con,$ins_query104);
$ins_query105="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','110000','AVAILABLE','$user')";
mysqli_query($con,$ins_query105);
$ins_query106="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','112000','AVAILABLE','$user')";
mysqli_query($con,$ins_query106);
$ins_query107="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','114000','AVAILABLE','$user')";
mysqli_query($con,$ins_query107);
$ins_query108="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','120000','AVAILABLE','$user')";
mysqli_query($con,$ins_query108);
$ins_query109="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','122000','AVAILABLE','$user')";
mysqli_query($con,$ins_query109);
$ins_query110="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','124000','AVAILABLE','$user')";
mysqli_query($con,$ins_query110);



$ins_query4190="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','130000','AVAILABLE','$user')";
mysqli_query($con,$ins_query4190);
$ins_query4191="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','132000','AVAILABLE','$user')";
mysqli_query($con,$ins_query4191);
$ins_query4192="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','134000','AVAILABLE','$user')";
mysqli_query($con,$ins_query4192);




$ins_query111="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','140000','AVAILABLE','$user')";
mysqli_query($con,$ins_query111);
$ins_query112="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','142000','AVAILABLE','$user')";
mysqli_query($con,$ins_query112);
$ins_query113="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','144000','AVAILABLE','$user')";
mysqli_query($con,$ins_query113);
$ins_query114="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','150000','AVAILABLE','$user')";
mysqli_query($con,$ins_query114);
$ins_query115="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','152000','AVAILABLE','$user')";
mysqli_query($con,$ins_query115);
$ins_query116="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','154000','AVAILABLE','$user')";
mysqli_query($con,$ins_query116);
$ins_query117="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','160000','AVAILABLE','$user')";
mysqli_query($con,$ins_query117);
$ins_query118="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','162000','AVAILABLE','$user')";
mysqli_query($con,$ins_query118);
$ins_query119="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','164000','AVAILABLE','$user')";
mysqli_query($con,$ins_query119);
$ins_query120="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','170000','AVAILABLE','$user')";
mysqli_query($con,$ins_query120);
$ins_query121="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','172000','AVAILABLE','$user')";
mysqli_query($con,$ins_query121);
$ins_query122="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','174000','AVAILABLE','$user')";
mysqli_query($con,$ins_query122);
$ins_query123="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','180000','AVAILABLE','$user')";
mysqli_query($con,$ins_query123);
$ins_query124="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','182000','AVAILABLE','$user')";
mysqli_query($con,$ins_query124);
$ins_query125="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','184000','AVAILABLE','$user')";
mysqli_query($con,$ins_query125);
$ins_query126="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','190000','AVAILABLE','$user')";
mysqli_query($con,$ins_query126);
$ins_query127="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','192000','AVAILABLE','$user')";
mysqli_query($con,$ins_query127);
$ins_query128="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','194000','AVAILABLE','$user')";
mysqli_query($con,$ins_query128);
$ins_query129="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','200000','AVAILABLE','$user')";
mysqli_query($con,$ins_query129);
$ins_query130="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','202000','AVAILABLE','$user')";
mysqli_query($con,$ins_query130);
$ins_query131="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','204000','AVAILABLE','$user')";
mysqli_query($con,$ins_query131);
$ins_query132="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','210000','AVAILABLE','$user')";
mysqli_query($con,$ins_query132);
$ins_query133="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','212000','AVAILABLE','$user')";
mysqli_query($con,$ins_query133);
$ins_query134="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','214000','AVAILABLE','$user')";
mysqli_query($con,$ins_query134);
$ins_query135="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','220000','AVAILABLE','$user')";
mysqli_query($con,$ins_query135);
$ins_query136="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','222000','AVAILABLE','$user')";
mysqli_query($con,$ins_query136);
$ins_query137="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','224000','AVAILABLE','$user')";
mysqli_query($con,$ins_query137);
$ins_query138="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','230000','AVAILABLE','$user')";
mysqli_query($con,$ins_query138);
$ins_query139="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','232000','AVAILABLE','$user')";
mysqli_query($con,$ins_query139);
$ins_query140="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','234000','AVAILABLE','$user')";
mysqli_query($con,$ins_query140);

$ins_query141="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','000000','AVAILABLE','$user')";
mysqli_query($con,$ins_query141);









   
    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';

}


else if (($_POST['select'])=="US1")
{
	

	
$ins_query2190="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','060000','AVAILABLE','$user')";
mysqli_query($con,$ins_query2190);
$ins_query2191="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','062000','AVAILABLE','$user')";
mysqli_query($con,$ins_query2191);
$ins_query2192="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','064000','AVAILABLE','$user')";
mysqli_query($con,$ins_query2192);


$ins_query3190="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','070000','AVAILABLE','$user')";
mysqli_query($con,$ins_query3190);
$ins_query3191="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','072000','AVAILABLE','$user')";
mysqli_query($con,$ins_query3191);
$ins_query3192="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','074000','AVAILABLE','$user')";
mysqli_query($con,$ins_query3192);
	
	
	
	

	
	
	
$ins_query1190="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','080000','AVAILABLE','$user')";
mysqli_query($con,$ins_query1190);
$ins_query1191="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','082000','AVAILABLE','$user')";
mysqli_query($con,$ins_query1191);
$ins_query1192="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','084000','AVAILABLE','$user')";
mysqli_query($con,$ins_query1192);




	
$ins_query1="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','090000','AVAILABLE','$user')";
mysqli_query($con,$ins_query1);
$ins_query100="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','092000','AVAILABLE','$user')";
mysqli_query($con,$ins_query100);
$ins_query101="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','094000','AVAILABLE','$user')";
mysqli_query($con,$ins_query101);
$ins_query102="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','100000','AVAILABLE','$user')";
mysqli_query($con,$ins_query102);
$ins_query103="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','102000','AVAILABLE','$user')";
mysqli_query($con,$ins_query103);
$ins_query104="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','104000','AVAILABLE','$user')";
mysqli_query($con,$ins_query104);
$ins_query105="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','110000','AVAILABLE','$user')";
mysqli_query($con,$ins_query105);
$ins_query106="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','112000','AVAILABLE','$user')";
mysqli_query($con,$ins_query106);
$ins_query107="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','114000','AVAILABLE','$user')";
mysqli_query($con,$ins_query107);
$ins_query108="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','120000','AVAILABLE','$user')";
mysqli_query($con,$ins_query108);
$ins_query109="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','122000','AVAILABLE','$user')";
mysqli_query($con,$ins_query109);
$ins_query110="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','124000','AVAILABLE','$user')";
mysqli_query($con,$ins_query110);



$ins_query4190="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','130000','AVAILABLE','$user')";
mysqli_query($con,$ins_query4190);
$ins_query4191="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','132000','AVAILABLE','$user')";
mysqli_query($con,$ins_query4191);
$ins_query4192="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','134000','AVAILABLE','$user')";
mysqli_query($con,$ins_query4192);




$ins_query111="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','140000','AVAILABLE','$user')";
mysqli_query($con,$ins_query111);
$ins_query112="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','142000','AVAILABLE','$user')";
mysqli_query($con,$ins_query112);
$ins_query113="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','144000','AVAILABLE','$user')";
mysqli_query($con,$ins_query113);
$ins_query114="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','150000','AVAILABLE','$user')";
mysqli_query($con,$ins_query114);
$ins_query115="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','152000','AVAILABLE','$user')";
mysqli_query($con,$ins_query115);
$ins_query116="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','154000','AVAILABLE','$user')";
mysqli_query($con,$ins_query116);
$ins_query117="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','160000','AVAILABLE','$user')";
mysqli_query($con,$ins_query117);
$ins_query118="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','162000','AVAILABLE','$user')";
mysqli_query($con,$ins_query118);
$ins_query119="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','164000','AVAILABLE','$user')";
mysqli_query($con,$ins_query119);
$ins_query120="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','170000','AVAILABLE','$user')";
mysqli_query($con,$ins_query120);
$ins_query121="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','172000','AVAILABLE','$user')";
mysqli_query($con,$ins_query121);
$ins_query122="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','174000','AVAILABLE','$user')";
mysqli_query($con,$ins_query122);
$ins_query123="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','180000','AVAILABLE','$user')";
mysqli_query($con,$ins_query123);
$ins_query124="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','182000','AVAILABLE','$user')";
mysqli_query($con,$ins_query124);
$ins_query125="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','184000','AVAILABLE','$user')";
mysqli_query($con,$ins_query125);
$ins_query126="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','190000','AVAILABLE','$user')";
mysqli_query($con,$ins_query126);
$ins_query127="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','192000','AVAILABLE','$user')";
mysqli_query($con,$ins_query127);
$ins_query128="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','194000','AVAILABLE','$user')";
mysqli_query($con,$ins_query128);
$ins_query129="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','200000','AVAILABLE','$user')";
mysqli_query($con,$ins_query129);
$ins_query130="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','202000','AVAILABLE','$user')";
mysqli_query($con,$ins_query130);
$ins_query131="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','204000','AVAILABLE','$user')";
mysqli_query($con,$ins_query131);
$ins_query132="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','210000','AVAILABLE','$user')";
mysqli_query($con,$ins_query132);
$ins_query133="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','212000','AVAILABLE','$user')";
mysqli_query($con,$ins_query133);
$ins_query134="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','214000','AVAILABLE','$user')";
mysqli_query($con,$ins_query134);
$ins_query135="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','220000','AVAILABLE','$user')";
mysqli_query($con,$ins_query135);
$ins_query136="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','222000','AVAILABLE','$user')";
mysqli_query($con,$ins_query136);
$ins_query137="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','224000','AVAILABLE','$user')";
mysqli_query($con,$ins_query137);
$ins_query138="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','230000','AVAILABLE','$user')";
mysqli_query($con,$ins_query138);
$ins_query139="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','232000','AVAILABLE','$user')";
mysqli_query($con,$ins_query139);
$ins_query140="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','234000','AVAILABLE','$user')";
mysqli_query($con,$ins_query140);

$ins_query141="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','000000','AVAILABLE','$user')";
mysqli_query($con,$ins_query141);









   
    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';

}



else if (($_POST['select'])=="US2")
{
	

	
$ins_query2190="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','060000','AVAILABLE','$user')";
mysqli_query($con,$ins_query2190);
$ins_query2191="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','062000','AVAILABLE','$user')";
mysqli_query($con,$ins_query2191);
$ins_query2192="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','064000','AVAILABLE','$user')";
mysqli_query($con,$ins_query2192);


$ins_query3190="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','070000','AVAILABLE','$user')";
mysqli_query($con,$ins_query3190);
$ins_query3191="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','072000','AVAILABLE','$user')";
mysqli_query($con,$ins_query3191);
$ins_query3192="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','074000','AVAILABLE','$user')";
mysqli_query($con,$ins_query3192);
	
	
	
	

	
	
	
$ins_query1190="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','080000','AVAILABLE','$user')";
mysqli_query($con,$ins_query1190);
$ins_query1191="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','082000','AVAILABLE','$user')";
mysqli_query($con,$ins_query1191);
$ins_query1192="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','084000','AVAILABLE','$user')";
mysqli_query($con,$ins_query1192);




	
$ins_query1="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','090000','AVAILABLE','$user')";
mysqli_query($con,$ins_query1);
$ins_query100="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','092000','AVAILABLE','$user')";
mysqli_query($con,$ins_query100);
$ins_query101="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','094000','AVAILABLE','$user')";
mysqli_query($con,$ins_query101);
$ins_query102="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','100000','AVAILABLE','$user')";
mysqli_query($con,$ins_query102);
$ins_query103="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','102000','AVAILABLE','$user')";
mysqli_query($con,$ins_query103);
$ins_query104="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','104000','AVAILABLE','$user')";
mysqli_query($con,$ins_query104);
$ins_query105="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','110000','AVAILABLE','$user')";
mysqli_query($con,$ins_query105);
$ins_query106="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','112000','AVAILABLE','$user')";
mysqli_query($con,$ins_query106);
$ins_query107="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','114000','AVAILABLE','$user')";
mysqli_query($con,$ins_query107);
$ins_query108="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','120000','AVAILABLE','$user')";
mysqli_query($con,$ins_query108);
$ins_query109="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','122000','AVAILABLE','$user')";
mysqli_query($con,$ins_query109);
$ins_query110="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','124000','AVAILABLE','$user')";
mysqli_query($con,$ins_query110);



$ins_query4190="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','130000','AVAILABLE','$user')";
mysqli_query($con,$ins_query4190);
$ins_query4191="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','132000','AVAILABLE','$user')";
mysqli_query($con,$ins_query4191);
$ins_query4192="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','134000','AVAILABLE','$user')";
mysqli_query($con,$ins_query4192);




$ins_query111="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','140000','AVAILABLE','$user')";
mysqli_query($con,$ins_query111);
$ins_query112="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','142000','AVAILABLE','$user')";
mysqli_query($con,$ins_query112);
$ins_query113="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','144000','AVAILABLE','$user')";
mysqli_query($con,$ins_query113);
$ins_query114="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','150000','AVAILABLE','$user')";
mysqli_query($con,$ins_query114);
$ins_query115="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','152000','AVAILABLE','$user')";
mysqli_query($con,$ins_query115);
$ins_query116="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','154000','AVAILABLE','$user')";
mysqli_query($con,$ins_query116);
$ins_query117="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','160000','AVAILABLE','$user')";
mysqli_query($con,$ins_query117);
$ins_query118="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','162000','AVAILABLE','$user')";
mysqli_query($con,$ins_query118);
$ins_query119="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','164000','AVAILABLE','$user')";
mysqli_query($con,$ins_query119);
$ins_query120="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','170000','AVAILABLE','$user')";
mysqli_query($con,$ins_query120);
$ins_query121="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','172000','AVAILABLE','$user')";
mysqli_query($con,$ins_query121);
$ins_query122="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','174000','AVAILABLE','$user')";
mysqli_query($con,$ins_query122);
$ins_query123="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','180000','AVAILABLE','$user')";
mysqli_query($con,$ins_query123);
$ins_query124="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','182000','AVAILABLE','$user')";
mysqli_query($con,$ins_query124);
$ins_query125="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','184000','AVAILABLE','$user')";
mysqli_query($con,$ins_query125);
$ins_query126="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','190000','AVAILABLE','$user')";
mysqli_query($con,$ins_query126);
$ins_query127="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','192000','AVAILABLE','$user')";
mysqli_query($con,$ins_query127);
$ins_query128="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','194000','AVAILABLE','$user')";
mysqli_query($con,$ins_query128);
$ins_query129="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','200000','AVAILABLE','$user')";
mysqli_query($con,$ins_query129);
$ins_query130="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','202000','AVAILABLE','$user')";
mysqli_query($con,$ins_query130);
$ins_query131="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','204000','AVAILABLE','$user')";
mysqli_query($con,$ins_query131);
$ins_query132="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','210000','AVAILABLE','$user')";
mysqli_query($con,$ins_query132);
$ins_query133="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','212000','AVAILABLE','$user')";
mysqli_query($con,$ins_query133);
$ins_query134="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','214000','AVAILABLE','$user')";
mysqli_query($con,$ins_query134);
$ins_query135="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','220000','AVAILABLE','$user')";
mysqli_query($con,$ins_query135);
$ins_query136="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','222000','AVAILABLE','$user')";
mysqli_query($con,$ins_query136);
$ins_query137="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','224000','AVAILABLE','$user')";
mysqli_query($con,$ins_query137);
$ins_query138="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','230000','AVAILABLE','$user')";
mysqli_query($con,$ins_query138);
$ins_query139="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','232000','AVAILABLE','$user')";
mysqli_query($con,$ins_query139);
$ins_query140="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','234000','AVAILABLE','$user')";
mysqli_query($con,$ins_query140);

$ins_query141="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','000000','AVAILABLE','$user')";
mysqli_query($con,$ins_query141);









   
    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';

}


else if (($_POST['select'])=="US3")
{
	

	
$ins_query2190="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','060000','AVAILABLE','$user')";
mysqli_query($con,$ins_query2190);
$ins_query2191="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','062000','AVAILABLE','$user')";
mysqli_query($con,$ins_query2191);
$ins_query2192="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','064000','AVAILABLE','$user')";
mysqli_query($con,$ins_query2192);


$ins_query3190="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','070000','AVAILABLE','$user')";
mysqli_query($con,$ins_query3190);
$ins_query3191="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','072000','AVAILABLE','$user')";
mysqli_query($con,$ins_query3191);
$ins_query3192="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','074000','AVAILABLE','$user')";
mysqli_query($con,$ins_query3192);
	
	
	
	

	
	
	
$ins_query1190="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','080000','AVAILABLE','$user')";
mysqli_query($con,$ins_query1190);
$ins_query1191="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','082000','AVAILABLE','$user')";
mysqli_query($con,$ins_query1191);
$ins_query1192="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','084000','AVAILABLE','$user')";
mysqli_query($con,$ins_query1192);




	
$ins_query1="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','090000','AVAILABLE','$user')";
mysqli_query($con,$ins_query1);
$ins_query100="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','092000','AVAILABLE','$user')";
mysqli_query($con,$ins_query100);
$ins_query101="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','094000','AVAILABLE','$user')";
mysqli_query($con,$ins_query101);
$ins_query102="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','100000','AVAILABLE','$user')";
mysqli_query($con,$ins_query102);
$ins_query103="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','102000','AVAILABLE','$user')";
mysqli_query($con,$ins_query103);
$ins_query104="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','104000','AVAILABLE','$user')";
mysqli_query($con,$ins_query104);
$ins_query105="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','110000','AVAILABLE','$user')";
mysqli_query($con,$ins_query105);
$ins_query106="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','112000','AVAILABLE','$user')";
mysqli_query($con,$ins_query106);
$ins_query107="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','114000','AVAILABLE','$user')";
mysqli_query($con,$ins_query107);
$ins_query108="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','120000','AVAILABLE','$user')";
mysqli_query($con,$ins_query108);
$ins_query109="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','122000','AVAILABLE','$user')";
mysqli_query($con,$ins_query109);
$ins_query110="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','124000','AVAILABLE','$user')";
mysqli_query($con,$ins_query110);



$ins_query4190="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','130000','AVAILABLE','$user')";
mysqli_query($con,$ins_query4190);
$ins_query4191="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','132000','AVAILABLE','$user')";
mysqli_query($con,$ins_query4191);
$ins_query4192="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','134000','AVAILABLE','$user')";
mysqli_query($con,$ins_query4192);




$ins_query111="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','140000','AVAILABLE','$user')";
mysqli_query($con,$ins_query111);
$ins_query112="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','142000','AVAILABLE','$user')";
mysqli_query($con,$ins_query112);
$ins_query113="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','144000','AVAILABLE','$user')";
mysqli_query($con,$ins_query113);
$ins_query114="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','150000','AVAILABLE','$user')";
mysqli_query($con,$ins_query114);
$ins_query115="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','152000','AVAILABLE','$user')";
mysqli_query($con,$ins_query115);
$ins_query116="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','154000','AVAILABLE','$user')";
mysqli_query($con,$ins_query116);
$ins_query117="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','160000','AVAILABLE','$user')";
mysqli_query($con,$ins_query117);
$ins_query118="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','162000','AVAILABLE','$user')";
mysqli_query($con,$ins_query118);
$ins_query119="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','164000','AVAILABLE','$user')";
mysqli_query($con,$ins_query119);
$ins_query120="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','170000','AVAILABLE','$user')";
mysqli_query($con,$ins_query120);
$ins_query121="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','172000','AVAILABLE','$user')";
mysqli_query($con,$ins_query121);
$ins_query122="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','174000','AVAILABLE','$user')";
mysqli_query($con,$ins_query122);
$ins_query123="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','180000','AVAILABLE','$user')";
mysqli_query($con,$ins_query123);
$ins_query124="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','182000','AVAILABLE','$user')";
mysqli_query($con,$ins_query124);
$ins_query125="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','184000','AVAILABLE','$user')";
mysqli_query($con,$ins_query125);
$ins_query126="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','190000','AVAILABLE','$user')";
mysqli_query($con,$ins_query126);
$ins_query127="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','192000','AVAILABLE','$user')";
mysqli_query($con,$ins_query127);
$ins_query128="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','194000','AVAILABLE','$user')";
mysqli_query($con,$ins_query128);
$ins_query129="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','200000','AVAILABLE','$user')";
mysqli_query($con,$ins_query129);
$ins_query130="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','202000','AVAILABLE','$user')";
mysqli_query($con,$ins_query130);
$ins_query131="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','204000','AVAILABLE','$user')";
mysqli_query($con,$ins_query131);
$ins_query132="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','210000','AVAILABLE','$user')";
mysqli_query($con,$ins_query132);
$ins_query133="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','212000','AVAILABLE','$user')";
mysqli_query($con,$ins_query133);
$ins_query134="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','214000','AVAILABLE','$user')";
mysqli_query($con,$ins_query134);
$ins_query135="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','220000','AVAILABLE','$user')";
mysqli_query($con,$ins_query135);
$ins_query136="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','222000','AVAILABLE','$user')";
mysqli_query($con,$ins_query136);
$ins_query137="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','224000','AVAILABLE','$user')";
mysqli_query($con,$ins_query137);
$ins_query138="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','230000','AVAILABLE','$user')";
mysqli_query($con,$ins_query138);
$ins_query139="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','232000','AVAILABLE','$user')";
mysqli_query($con,$ins_query139);
$ins_query140="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','234000','AVAILABLE','$user')";
mysqli_query($con,$ins_query140);

$ins_query141="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','000000','AVAILABLE','$user')";
mysqli_query($con,$ins_query141);









   
    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';

}


else if  (($_POST['select'])=="CT")
{
	
	
$ins_query300="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','090000','AVAILABLE','$user')";
mysqli_query($con,$ins_query300);
$ins_query302="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','093000','AVAILABLE','$user')";
mysqli_query($con,$ins_query302);
$ins_query303="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','100000','AVAILABLE','$user')";
mysqli_query($con,$ins_query303);
$ins_query306="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','103000','AVAILABLE','$user')";
mysqli_query($con,$ins_query306);
$ins_query310="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','110000','AVAILABLE','$user')";
mysqli_query($con,$ins_query310);
$ins_query311="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','113000','AVAILABLE','$user')";
mysqli_query($con,$ins_query311);
$ins_query313="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','120000','AVAILABLE','$user')";
mysqli_query($con,$ins_query313);
$ins_query314="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','123000','AVAILABLE','$user')";
mysqli_query($con,$ins_query314);
$ins_query315="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','140000','AVAILABLE','$user')";
mysqli_query($con,$ins_query315);
$ins_query316="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','143000','AVAILABLE','$user')";
mysqli_query($con,$ins_query316);
$ins_query317="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','150000','AVAILABLE','$user')";
mysqli_query($con,$ins_query317);
$ins_query318="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','153000','AVAILABLE','$user')";
mysqli_query($con,$ins_query318);
$ins_query319="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','160000','AVAILABLE','$user')";
mysqli_query($con,$ins_query319);

$ins_query320="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','163000','AVAILABLE','$user')";
mysqli_query($con,$ins_query320);
   
    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';

}
else if (($_POST['select'])=="MR")
{
	
	
$ins_query200="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','090000','AVAILABLE','$user')";
mysqli_query($con,$ins_query200);
$ins_query201="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','093000','AVAILABLE','$user')";
mysqli_query($con,$ins_query201);
$ins_query202="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','100000','AVAILABLE','$user')";
mysqli_query($con,$ins_query202);
$ins_query203="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','103000','AVAILABLE','$user')";
mysqli_query($con,$ins_query203);
$ins_query204="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','110000','AVAILABLE','$user')";
mysqli_query($con,$ins_query204);
$ins_query205="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','113000','AVAILABLE','$user')";
mysqli_query($con,$ins_query205);
$ins_query206="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','120000','AVAILABLE','$user')";
mysqli_query($con,$ins_query206);
$ins_query207="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','123000','AVAILABLE','$user')";
mysqli_query($con,$ins_query207);
$ins_query208="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','130000','AVAILABLE','$user')";
mysqli_query($con,$ins_query208);
$ins_query209="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','140000','AVAILABLE','$user')";
mysqli_query($con,$ins_query209);
$ins_query210="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','143000','AVAILABLE','$user')";
mysqli_query($con,$ins_query210);
$ins_query211="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','150000','AVAILABLE','$user')";
mysqli_query($con,$ins_query211);
$ins_query212="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','153000','AVAILABLE','$user')";
mysqli_query($con,$ins_query212);
$ins_query213="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','160000','AVAILABLE','$user')";
mysqli_query($con,$ins_query213);
$ins_query214="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','163000','AVAILABLE','$user')";
mysqli_query($con,$ins_query214);

$ins_query215="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','170000','AVAILABLE','$user')";
mysqli_query($con,$ins_query215);
$ins_query216="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','173000','AVAILABLE','$user')";
mysqli_query($con,$ins_query216);
$ins_query217="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','180000','AVAILABLE','$user')";
mysqli_query($con,$ins_query217);
$ins_query218="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','183000','AVAILABLE','$user')";
mysqli_query($con,$ins_query218);


$ins_query219="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','190000','AVAILABLE','$user')";
mysqli_query($con,$ins_query219);
$ins_query220="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','193000','AVAILABLE','$user')";
mysqli_query($con,$ins_query220);
$ins_query221="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','200000','AVAILABLE','$user')";
mysqli_query($con,$ins_query221);
$ins_query222="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','203000','AVAILABLE','$user')";
mysqli_query($con,$ins_query222);


$ins_query223="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','210000','AVAILABLE','$user')";
mysqli_query($con,$ins_query223);
$ins_query224="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','213000','AVAILABLE','$user')";
mysqli_query($con,$ins_query224);
$ins_query225="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','220000','AVAILABLE','$user')";
mysqli_query($con,$ins_query225);
$ins_query226="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','223000','AVAILABLE','$user')";
mysqli_query($con,$ins_query226);

$ins_query227="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','230000','AVAILABLE','$user')";
mysqli_query($con,$ins_query227);
$ins_query228="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','233000','AVAILABLE','$user')";
mysqli_query($con,$ins_query228);

   
    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';

}
else if (($_POST['select'])=="BMD")
{
	
	
$ins_query900="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','090000','AVAILABLE','$user')";
mysqli_query($con,$ins_query900);
$ins_query901="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','093000','AVAILABLE','$user')";
mysqli_query($con,$ins_query901);
$ins_query902="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','100000','AVAILABLE','$user')";
mysqli_query($con,$ins_query902);
$ins_query903="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','103000','AVAILABLE','$user')";
mysqli_query($con,$ins_query903);
$ins_query904="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','110000','AVAILABLE','$user')";
mysqli_query($con,$ins_query904);
$ins_query905="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','113000','AVAILABLE','$user')";
mysqli_query($con,$ins_query905);
$ins_query906="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','120000','AVAILABLE','$user')";
mysqli_query($con,$ins_query906);
$ins_query907="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','123000','AVAILABLE','$user')";
mysqli_query($con,$ins_query907);
$ins_query908="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','130000','AVAILABLE','$user')";
mysqli_query($con,$ins_query908);
$ins_query909="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','140000','AVAILABLE','$user')";
mysqli_query($con,$ins_query909);
$ins_query910="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','143000','AVAILABLE','$user')";
mysqli_query($con,$ins_query910);
$ins_query911="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','150000','AVAILABLE','$user')";
mysqli_query($con,$ins_query911);
$ins_query912="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','153000','AVAILABLE','$user')";
mysqli_query($con,$ins_query912);
$ins_query913="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','160000','AVAILABLE','$user')";
mysqli_query($con,$ins_query913);
$ins_query914="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','163000','AVAILABLE','$user')";
mysqli_query($con,$ins_query914);

   
    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';

}

else if (($_POST['select'])=="OPG")
{
	
	
$ins_query900="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','090000','AVAILABLE','$user')";
mysqli_query($con,$ins_query900);
$ins_query901="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','093000','AVAILABLE','$user')";
mysqli_query($con,$ins_query901);
$ins_query902="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','100000','AVAILABLE','$user')";
mysqli_query($con,$ins_query902);
$ins_query903="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','103000','AVAILABLE','$user')";
mysqli_query($con,$ins_query903);
$ins_query904="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','110000','AVAILABLE','$user')";
mysqli_query($con,$ins_query904);
$ins_query905="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','113000','AVAILABLE','$user')";
mysqli_query($con,$ins_query905);
$ins_query906="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','120000','AVAILABLE','$user')";
mysqli_query($con,$ins_query906);
$ins_query907="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','123000','AVAILABLE','$user')";
mysqli_query($con,$ins_query907);
$ins_query908="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','130000','AVAILABLE','$user')";
mysqli_query($con,$ins_query908);
$ins_query909="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','140000','AVAILABLE','$user')";
mysqli_query($con,$ins_query909);
$ins_query910="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','143000','AVAILABLE','$user')";
mysqli_query($con,$ins_query910);
$ins_query911="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','150000','AVAILABLE','$user')";
mysqli_query($con,$ins_query911);
$ins_query912="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','153000','AVAILABLE','$user')";
mysqli_query($con,$ins_query912);
$ins_query913="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','160000','AVAILABLE','$user')";
mysqli_query($con,$ins_query913);
$ins_query914="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','163000','AVAILABLE','$user')";
mysqli_query($con,$ins_query914);

   
    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';

}

else if  (($_POST['select'])=="MG")
{
	
	
$ins_query300="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','090000','AVAILABLE','$user')";
mysqli_query($con,$ins_query300);
$ins_query302="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','093000','AVAILABLE','$user')";
mysqli_query($con,$ins_query302);
$ins_query303="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','100000','AVAILABLE','$user')";
mysqli_query($con,$ins_query303);
$ins_query306="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','103000','AVAILABLE','$user')";
mysqli_query($con,$ins_query306);
$ins_query310="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','110000','AVAILABLE','$user')";
mysqli_query($con,$ins_query310);
$ins_query311="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','113000','AVAILABLE','$user')";
mysqli_query($con,$ins_query311);
$ins_query313="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','120000','AVAILABLE','$user')";
mysqli_query($con,$ins_query313);
$ins_query314="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','123000','AVAILABLE','$user')";
mysqli_query($con,$ins_query314);
$ins_query315="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','140000','AVAILABLE','$user')";
mysqli_query($con,$ins_query315);
$ins_query316="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','143000','AVAILABLE','$user')";
mysqli_query($con,$ins_query316);
$ins_query317="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','150000','AVAILABLE','$user')";
mysqli_query($con,$ins_query317);
$ins_query318="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','153000','AVAILABLE','$user')";
mysqli_query($con,$ins_query318);
$ins_query319="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','160000','AVAILABLE','$user')";
mysqli_query($con,$ins_query319);

$ins_query320="insert into rapp (`dname`,`ddate`,`dslot`,`status`,`user`) values ('$checkbox', '$date','163000','AVAILABLE','$user')";
mysqli_query($con,$ins_query320);
   
    echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';

}


else 
{
       echo '<script language="javascript">';
    echo 'alert("Appointment time is not set because Modalitys Appointment Already set for requested Date !!"); ';
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
<script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
<link rel="stylesheet" href="styles.css">

  
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

   
  
  <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+10)
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
   <li><a href='tesrad'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment Menu</span></a>
	  <ul>
	  <li class='last'><a href='radapp'><span>Appointment</span></a></li>
	  <li class='last'><a href='radblock'><span>Block Appointment Slot</span></a></li>
	  <li class='last'><a href='radeditapp'><span>Cancel Patient Appointment </span></a></li>
	  
	  
	  
	  
	  </ul>
      
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='last'><a href='todayreport'><span>Today's Report</span></a></li>
		 <li class='has-sub'><a href='donereport'><span>Search Done Reports</span></a>
		 <li class='has-sub'><a href='allapp'><span>Print Appointment Report </span></a>
		 <li class='has-sub'><a href='allpen'><span>Search all Pending Reports </span></a>
		 <li class='has-sub'><a href='allreport'><span>Datewise All Done Report </span></a>
            <li class='last'><a href='raddtsearch2'><span>pending Report Search By MRN</span></a></li>
			<li class='last'><a href='radapp22'><span>Patients Appointment Report</span></a></li>
			<li class='last'><a href='radview3'><span>All Confirmed Reports</span></a></li>
         </li>
		 
      </ul>
   </li>
	  <li class='last'><a href='radview1'><span>Pending Reports</span></a></li>
	  	  <li class='last'><a href='viewnewrad'><span>Search Patients</span></a></li>
		  <li class='last'><a href='rpapp22'><span>New Patients</span></a></li>
		  <li class='last'><a href='newdoc'><span>Add New Doctor</span></a></li>
		  <li class='last'><a href='raddtsearch'><span>Search pending request </span></a></li>
		  		        <li class='last'><a href='donereportedit'><span>EDIT</span></a></li>
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>



  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
				<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h2 align="center">SET RADIOLOGY DEPARTMENT'S AVAILABLE DATE &amp; TIME </h2>
		
		<fieldset>

			<legend></legend>
            <!-- Name Input -->
			<span class="style1">
			<label for="age"><strong>Service Name :</strong></label>
			
			<select name="select" required/>
	  <option value=''>-Select Time-</option>
	
  <option value='CR'>CR</option>
    <option value='CR1'>CR1</option>
	  <option value='DX'>DX</option>
	  <option value='DX1'>DX1</option>
	  <option value='DX2'>DX2</option>
    <option value='DX3'>DX3</option>
	  <option value='US'>US</option>
	  <option value='US1'>US1</option>
	  	  <option value='US2'>US2</option>
		  <option value='US3'>US3</option>
	  	  <option value='CT'>CT</option>
		  <option value='MR'>MR</option>
	  <option value='BMD'>BMD</option>
	  <option value='OPG'>OPG</option>
	  <option value='MG'>Mammography</option>
      </select>
      

			
<!-- E-mail Input -->
			<label for="mail"><strong>Appointment Date :</strong></label>
									<input type="text" name="date" id="datepicker" placeholder="Select Date" required/>
<!-- Password Input --><!-- Age Dropdown -->
			
  </fieldset>

		<button type="submit" name="submit">Confirm</button>

</form>
  
  

</body>

</html>
