<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('store','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$user=$_SESSION["sess_username"];
$sid=$_REQUEST['sid'];
$sdate=$_REQUEST['sdate'];
$stime = date('d/m/Y H:i:s');
//$pmrn=$_REQUEST['pmrn'];
//$full=$_REQUEST['dreffer'];
//$eid=$_REQUEST['eid'];
//$ieid=$_REQUEST['ieid'];
//$type=$_REQUEST['type'];

//include("auth.php");

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
$objConnect = mysql_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB1 = mysql_select_db("sfmmkpjnew");

	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
			
			
		{
			
			$qq = mysqli_query($db,"select * from cafesale where id='".$_POST["chkDel"][$i]."'");
			$dd = mysqli_fetch_assoc($qq);
			
			
			
			$ortime = date('d/m/Y H:i:s');
			$eqty2 = $_REQUEST["eqty1"][$i];
			$eqty = $dd["eqty"];
			$eqtyn = $dd["eqty1"];
			$eqty1=$eqtyn+$eqty2;
			
			
			if($eqty < $eqty1)
				
				{
					echo '<script language="javascript">';
    echo 'alert("Unsuccessful !! Dispense Quantity in Greater than requested quantity!!"); ';

    echo '</script>';
					
					
				}
			
			if($eqty > $eqty1)
	{
			
			
			
			$strSQL = "update cafesale set eqty1=$eqty1 where id='".$_POST["chkDel"][$i]."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
			
			$strSQL1 = "update srequest set status='Partial Given' where rid='$sid'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery1 = mysql_query($strSQL1);

	$url = "srequest2" ;
header("Location:$url");
			
	}
	
	if($eqty == $eqty1)
	{
			
			
			
			$strSQL = "update cafesale set eqty1=$eqty1, status='Closed' where id='".$_POST["chkDel"][$i]."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);

	
			$strSQL1 = "update srequest set status='Closed' where rid='$sid'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery1 = mysql_query($strSQL1);

	}

			}
	}

	
	
	
echo '<script language="javascript">';
    echo 'alert("Successfully Added !!"); ';

    echo '</script>';
	
	$url = "srequest2" ;
header("Location:$url");

mysql_close($objConnect);
	
}
?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
if(isset($_POST['DELETE']))
{
require('db1.php');
$id=$_REQUEST['id'];
$query23 = "DELETE FROM cafesale WHERE id=$id"; 
$result23 = mysqli_query($con,$query23) or die ( mysqli_error());
//header("Location: newtest2.php"); 
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Medicine</title>
  
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

    <script src="jsnew/prefixfree.min.js"></script>



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
			minDate: new Date(currentMonth, currentDate,currentYear),
			maxDate: new Date(currentMonth, currentDate,currentYear)
		});
	});
</script>




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>Investigation</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


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
		if(confirm('Do you want to Add the Medicine ?')==true)
		{
			return true;
			
		}
		else
		{
			return false;
			
		}
	}
</script>

</head>
</head>

<body>

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


<form name="frmMain1" action="" method="post" OnSubmit="return onDelete();"> 
        <table align="center" class="table table-bordered" id="dynamic_field"> 
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>DISPANSE PANEL</strong></label></td> </tr>
<tr><td colspan="5" align="center"><label><strong>S/No- <?php echo $sid;?></strong></label></td> 
<td colspan="10" align="center"><label><strong>User- <?php echo $user ;?></strong></label></td> 
<td colspan="5" align="center"><label><strong>Date & Time:<?php echo $stime ;?> </strong></label></td> 



</tr>

 <?php




//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];
//$test=$_REQUEST["test"];
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];


$count=1;


$objConnect = mysql_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysql_select_db("sfmmkpjnew");
$strSQL = "Select * from cafesale where sid= '$sid' and sdate='$sdate'order by `id` DESC;";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
//$sel_query="Select * from pmedi where pmrn= '$pmrn' and eid='$eid1'order by `id` DESC;";

?>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>Request_ID</strong></td>
     	  <td colspan="10" align="center"><strong>ITEM</strong></td>
      	  <td colspan="2" align="center"><strong>Request QTY</strong></td>
		  <td colspan="2" align="center"><strong>Given QTY</strong></td>
		  
		
       

	   </tr>
	   
	   <?php
$i = 0;
while($row = mysql_fetch_array($objQuery))
{
$i++;

?>
   
     <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["ename"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["sid"]; ?></td>
				        <td align="center"colspan="2"><?php echo $row["eqty"]; ?></td>
						<td align="center"colspan="2"><?php echo $row["eqty1"]; ?></td>
						
	
			      
				 

  	  

	  
      </tr>
    <?php $count++; } ?>
	
	
	
<?php
mysql_close($objConnect);
?>

</form>



</body>

</html>
