<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

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

if(isset($_POST['btnDelete'])){
	
$aleave=$_REQUEST['aleave'];

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
			$aleave99=$dd['aleave'];
			$cfleave=30-$aleave99;
			//$pdos=$_POST["test3"][$i];
			
			$strSQL = "update staff1 set cfleave ='$cfleave', aleave='0'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}

	echo '<script language="javascript">';
    echo 'alert("Successfully Added !!"); ';

    echo '</script>';

	
	$url = "addcforward";
header("Location: $url");

mysql_close($objConnect1);

}
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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s In-Patients List </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form name="frmMain" action="" method="post" OnSubmit="return onDelete();">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<?php


$count=1;
$objConnect = mysql_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysql_select_db("sfmmkpjnew");
$strSQL = "Select * from staff1 where astatus='Active'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Requested By</strong></th>
      <th width="10%"><strong>Leave Type</strong></th>
      <th width="15%"><strong>Total Days Applied </strong>
      <th width="14%"><strong>Start From</strong>   
      <th width="14%"><strong>End Date</strong>
	  <th width="14%"><strong>Replacement Consultant</strong>
	  
	  <th width="14%"><strong>Status</strong>
	
      <th width="30"> <div align="center">
      <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
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
      <td align="center"><?php echo $row["sid"]; ?></a></td>
      <td align="center"><?php echo $row["mname"]; ?>
	  <td align="center"><?php echo $row["doj"]; ?>
      <td align="center"><?php echo $row["gender"]; ?>
      <td align="center"><?php echo $row["religion"]; ?>  
	  <td align="center"><?php echo $row["fname"]; ?>  
	  <td align="center"><?php 


	  
$al1= $row['aleave'];

$now = time(); // or your date as well
//$year=date('Y');
 //$your_date = date("2019-01-01");
$your_date = strtotime("2019-01-01");
$cyear=date('Y');
$datediff = $now - $your_date;
//echo $datediff;
//$test= round ($your_date / (60 * 60 * 24));
$fday= round($datediff / (60 * 60 * 24)*.0833);

$doj= $row['doj'];
$doj78=strtotime($doj);



$doj12=date('Y',strtotime($doj));


$datediff78 = $now - $doj78;

$fday8= round($datediff78 / (60 * 60 * 24)*.0833) ;


$al=$fday-$al1;
$al2=$fday8-$al1;






	  ?>  
	   
<input type="text1" name="aleave"  required value="<?php if($cyear==$doj12){echo $al2;} else {echo $al;} ;?>" readonly></td>

<td align="center"><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $i;?>" value="<?php echo $row["id"];?>"></td>


	  
      </tr>
    <?php $count++; } ?>

<tr><td colspan="20" align="right"><button type="submit" name="btnDelete">Serverd</button><input type="hidden" name="hdnCount" value="<?php echo $i;?>"></td>
	</table>

	
<?php
mysql_close($objConnect);
?>

</form>

</body>

</html>

