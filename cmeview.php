<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="admin1"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');


//$datediff78 = $now - $doj78;

//echo $fday8= round($datediff78 / (60 * 60 * 24)*.0833) ;



?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

//echo $now = time(); // or your date as well
$now = time(); // or your date as well
//$year=date('Y');
 //$your_date = date("2019-01-01");
 $rr=date('Y');
$your_date = strtotime("$rr-01-01");
$cyear=date('Y');
$datediff = $now - $your_date;
//echo $datediff;
//$test= round ($your_date / (60 * 60 * 24));
$fday= round($datediff / (60 * 60 * 24)*.0833) ;

$query39 = "SELECT * FROM staff1 where sid= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
//$idept=$row39['sdept'];
//$gender= $row39['gender'];
$doj= $row39['doj'];
$doj78=strtotime($doj);
$datediff = $your_date - $doj78;
$fday1= round($datediff / (60 * 60 * 24)*.0833) ;

?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$query3 = "SELECT * FROM incident1 where itype= 'Clinical'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
?>

<?php

if(isset($_POST['btnDelete']))

	
	
if(empty($_REQUEST['chkDel']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}
else {
$objConnect1 = mysql_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB1 = mysql_select_db("sfmmkpjnew");

	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
			
			
		{
			
			$qq = mysqli_query($db,"select * from staff1 where id='".$_POST["chkDel"][$i]."'");
			$dd = mysqli_fetch_assoc($qq);
			$aleave=$dd['aleave'];
			$cleave=$aleave;
			if($aleave<=10){
			
			$strSQL = "update staff1 set cfleave='$cleave',curleave='0',aleave='30'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
			
			}
			
			else if ($aleave>10)
			{
				$strSQL = "update staff1 set cfleave='10',curleave='0',aleave='30'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);}
		}
	}

	echo '<script language="javascript">';
    echo 'alert("Successfully Added !!"); ';

    echo '</script>';

	
	$url = "addcforward1";
header("Location: $url");

mysql_close($objConnect1);

}
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style2.css">
<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}
</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Approve this Leave ?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Reject this Leave ?");
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






<div id='cssmenu'>
<ul>
   <li><a href='viewnew11'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Welcome !! <?php echo $full; ?>To Consultant Leave Balance Panel</p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form name="frmMain" action="" method="post" OnSubmit="return onDelete();">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<?php


$count=1;
$objConnect = mysql_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysql_select_db("sfmmkpjnew");
$strSQL = "Select * from staff1 where astatus='Active' and ugroup='Doctor'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Staff ID</strong></th>
      <th width="10%"><strong>Consultant Name</strong></th>
      <th width="15%"><strong>Date Of Join</strong>
      <th width="14%"><strong>Gender</strong>   
      
	  <th width="14%"><strong>Religion</strong>
	  
	  <th width="14%"><strong>Leave Balance</strong>
	
      
      
    </div></th>
  </tr>
<?php
$i = 0;
while($row = mysql_fetch_array($objQuery))
{
$i++;

?>
	   </tr>
  </thead>
  <tbody>
  
    

	
	
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><a  target='_blank' href="leaveviewindiadm?sid=<?php echo $row["sid"]; ?>"><?php echo $row["sid"];?></a></td>
      <td align="center"><a  target='_blank' href="leaveviewindiadm?sid=<?php echo $row["sid"]; ?>"><?php echo $row["mname"]; ?>
	  <td align="center"><?php echo $row["doj"]; ?>
      <td align="center"><?php echo $row["gender"]; ?>
      <td align="center"><?php echo $row["religion"]; ?>  
	  

	  
	<?php 
	$ttid=$row['sid'];
	$query = "SELECT * from staff1 where sid=$ttid"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$al1= $row['aleave'];
$ol= $row['oleave'];
//$pa= $row['padd'];
$cl= $row['cfleave'];
$altaken= $row['altaken'];
$doj= $row['doj'];
$doj78=strtotime($doj);
 
/*$date2=date('01/01/2019');
$date1= date('m/d/Y');
$date3=date_create("$date2");
$date4=date_create("$date1");
$diff=date_diff($date4,$date3);
echo $diff->format("%d");*/
$al=$cl+$fday-$altaken;
//$al2=$cl+$fday8-$altaken;  
$cyear=date('Y');
$doj12=date('Y',strtotime($doj));
$datediff78 = $now - $doj78;

//echo $fday8= round($datediff78 / (60 * 60 * 24)*.0833) ;
$fday8= round($datediff78 / (60 * 60 * 24)*.0833) ;
$al2=$cl+$fday8-$altaken;
?>	  



<td colspan="10"><?php if($cyear==$doj12){echo $al2;} else {echo $al;}?></td>
	  
      </tr>
    <?php $count++; } ?>


	</table>

	
<?php
mysql_close($objConnect);
?>

</form>

</body>

</html>

