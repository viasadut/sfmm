<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','staff')"; 
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

$user=$_SESSION["sess_username"];
//$id=$_REQUEST['ID'];
$id=$_REQUEST['id'];
$date77=date('Y-m-d');


//include("auth.php");

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from incident1 where id='$id'");
$data = mysqli_fetch_assoc($query4);
$m1=$data['m1'];
$m2=$data['m2'];
$m3=$data['m3'];
$m4=$data['m4'];
$m5=$data['m5'];

$m6=$data['m6'];
$m7=$data['m7'];
$m8=$data['m8'];
$m9=$data['m9'];
$m10=$data['m10'];




  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


//$dname =$_REQUEST["adoc"];
//$pname = $_REQUEST['pname'];
//$pmrn = $_REQUEST['pmrn'];
$adate= date('d/m/Y H:i:s');
$medi = $_REQUEST['medi'];
//$pins = $_REQUEST['pins'];

//$dtime = $_REQUEST['dtime'];

$sel90="SELECT * FROM staff3 WHERE `sid`='$medi' and status='Active';";
$result90 = mysqli_query($con,$sel90);

$sel90d="SELECT * FROM staff1 WHERE `sid`='$medi' and astatus='Active';";
$result90d = mysqli_query($con,$sel90d);

$sel90r = "SELECT COUNT(id) FROM incident1 WHERE '$medi' IN (`m1`,`m2`,`m3`,`m4`,`m5`,`m6`,`m7`,`m8`,`m9`,`m10`) and id='$id'";
$result90r = mysqli_query($con,$sel90r);
$fdata = mysqli_fetch_assoc($result90r);


if($res90=mysqli_num_rows($result90)==0 and $res90d=mysqli_num_rows($result90d)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Staff Name is not in the Database List.. Please contact with Concern Department"); ';
    echo '</script>';
    }
else if($fdata['COUNT(id)']>0)
	
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Staff Name is Already Added in the Incident List"); ';
    echo '</script>';
    }
else if($m1==''){

$ins_query="update incident1 set m1='$medi' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());
}

else if($m2==''){

$ins_query="update incident1 set m2='$medi' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());
}

else if($m3==''){

$ins_query="update incident1 set m3='$medi' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());
}

else if($m4==''){

$ins_query="update incident1 set m4='$medi' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());
}

else if($m5==''){

$ins_query="update incident1 set m5='$medi' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());
}

else if($m6==''){

$ins_query="update incident1 set m5='$medi' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());
}

else if($m7==''){

$ins_query="update incident1 set m5='$medi' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());
}

else if($m8==''){

$ins_query="update incident1 set m5='$medi' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());
}

else if($m9==''){

$ins_query="update incident1 set m5='$medi' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());
}

else if($m10==''){

$ins_query="update incident1 set m5='$medi' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());
}
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
$query23 = "DELETE FROM alltest WHERE id=$id"; 
$result23 = mysqli_query($con,$query23) or die ( mysqli_error());
//header("Location: newtest2.php"); 
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
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
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

<form action="" method="post">
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
				<tr>
					<td colspan="6"><label><strong>Incident Type:</strong></label></td>
					<td colspan="6"><label><strong>Incident Description:</strong></label></td>
					<td colspan="4"><label><strong>Incident Raise By:</strong></label></td>
					<td colspan="4"><label><strong>Incident Raise Against:</strong></label></td>

										<input type="hidden" name="new" value="1" />	
				</tr>
				
				<tr>	  
				<td colspan="6"><?php echo $data['itype']; ?></td>
				<td colspan="6"><?php echo $data["idetails"]; ?></td>
				<td colspan="4"><?php echo $data['rby']; ?></td>
				<td colspan="4"><?php echo $data['idept']; ?> </td>	
												
						
				
</tr>
						

						
						
					


				


<tr><td colspan="20" align="left"><label><strong>Select Staff</strong></label></td> 


</tr>
<tr>
<td colspan="20" align="center"><input list="browsers1" name="medi" size=60% class="form-control" autocomplete="off" required>
  <datalist id="browsers1">

						<option value=''>-Select Investigation</option>
				<?php 
			$sql = "select * from `staff3` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sid."'>".$row->sname."</option>";
				}
			}
			?>  
			
			
			<?php 
			$sql = "select * from `staff1` where ugroup='Doctor' and astatus='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sid."'>".$row->mname."</option>";
				}
			}
			?>
			
			
			</datalist></td>



</tr>			        

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">ADD</button></td>
	  
</tr>
<tr>
      
     
      <td colspan="2" align="center"><strong>Staff1</strong></td>
     	  <td colspan="2" align="center"><strong>Staff2</strong></td>
		  <td colspan="2" align="center"><strong>Staff3</strong></td>
		  <td colspan="2" align="center"><strong>Staff4</strong></td>
		  <td colspan="2" align="center"><strong>Staff5</strong></td>
		  <td colspan="2" align="center"><strong>Staff6</strong></td>
		  <td colspan="2" align="center"><strong>Staff7</strong></td>
		  <td colspan="2" align="center"><strong>Staff8</strong></td>
		  <td colspan="2" align="center"><strong>Staff9</strong></td>
		  <td colspan="2" align="center"><strong>Staff10</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];

$id=$_REQUEST["id"];

$count=1;
$sel_query="Select * from incident1 where id= '$id';";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>



      <td align="center"colspan="2"><?php echo $row["m1"]; ?>
	  <br><?php if($row['m1com']!='' and $row['m1']!='') {echo "<span style='color:green; font-weight:bold'>Already Commented</span>";} else if($row['m1com']=='' and $row['m1']!='') {echo "<span style='color:red; font-weight:bold'>NOT Commented</span>";} else {}?>
	  </td>
	        <td align="center"colspan="2"><?php echo $row["m2"]; ?>
			<br><?php if($row['m2com']!='' and $row['m2']!='') {echo "<span style='color:green; font-weight:bold'>Already Commented</span>";}else if($row['m2com']=='' and $row['m2']!='') {echo "<span style='color:red; font-weight:bold'>NOT Commented</span>";} else {}?>
			
			</td>
			<td align="center"colspan="2"><?php echo $row["m3"]; ?>
<br><?php if($row['m3com']!='' and $row['m3']=='') {echo "<span style='color:green; font-weight:bold'>Already Commented</span>";}else if($row['m3com']=='' and $row['m3']!='') {echo "<span style='color:red; font-weight:bold'>NOT Commented</span>";} else {}?>
			
			</td>
			<td align="center"colspan="2"><?php echo $row["m4"]; ?>
			
<br><?php if($row['m4com']!='' and $row['m4']!='') {echo "<span style='color:green; font-weight:bold'>Already Commented</span>";}else if($row['m4com']=='' and $row['m4']!='') {echo "<span style='color:red; font-weight:bold'>NOT Commented</span>";} else {}?>
			
			</td>
			<td align="center"colspan="2"><?php echo $row["m5"]; ?>
			
			<br><?php if($row['m5com']!='' and $row['m5']!='') {echo "<span style='color:green; font-weight:bold'>Already Commented</span>";}else if($row['m5com']=='' and $row['m5']!='') {echo "<span style='color:red; font-weight:bold'>NOT Commented</span>";} else {}?>
			</td>
			<td align="center"colspan="2"><?php echo $row["m6"]; ?>
			
			<br><?php if($row['m6com']!='' and $row['m6']!='') {echo "<span style='color:green; font-weight:bold'>Already Commented</span>";}else if($row['m6com']=='' and $row['m6']!='') {echo "<span style='color:red; font-weight:bold'>NOT Commented</span>";} else {}?>
			
			</td>
			<td align="center"colspan="2"><?php echo $row["m7"]; ?>
			<br><?php if($row['m7com']!='' and $row['m7']!='') {echo "<span style='color:green; font-weight:bold'>Already Commented</span>";}else if($row['m7com']=='' and $row['m7']!='') {echo "<span style='color:red; font-weight:bold'>NOT Commented</span>";} else {}?>
			
			</td>
			<td align="center"colspan="2"><?php echo $row["m8"]; ?>
			
			<br><?php if($row['m8com']!='' and $row['m8']!='') {echo "<span style='color:green; font-weight:bold'>Already Commented</span>";}else if($row['m8com']=='' and $row['m8']!='') {echo "<span style='color:red; font-weight:bold'>NOT Commented</span>";} else {}?>
			</td>
			<td align="center"colspan="2"><?php echo $row["m9"]; ?>
			<br><?php if($row['m9com']!='' and $row['m9']!='') {echo "<span style='color:green; font-weight:bold'>Already Commented</span>";}else if($row['m9com']=='' and $row['m9']!='') {echo "<span style='color:red; font-weight:bold'>NOT Commented</span>";} else {}?>
			</td>
			<td align="center"colspan="2"><?php echo $row["m10"]; ?>
<br><?php if($row['m10com']!='' and $row['m10']!='') {echo "<span style='color:green; font-weight:bold'>Already Commented</span>";}else if($row['m10com']=='' and $row['m10']!='') {echo "<span style='color:red; font-weight:bold'>NOT Commented</span>";} else {}?>
			</td>
			      

  	  

	  
      </tr>
    <?php $count++; } ?>
	<tr><td align="right" colspan="20"><button onclick="self.close();">Close</button></td></tr>
	





	</table>

	
	</form>

</body>

</html>
