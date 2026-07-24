<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="pharmacy"){
      header('Location: login2?err=2');
    }
?>



<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url1");
$user=$_SESSION['sess_username'];
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/
if(isset($_POST['GO'])){
//$rr =$_REQUEST['rr'];
$update="update pmedi set `status`='$rr' where `id`='".$id."'";
mysqli_query($con,$update) or die(mysql_error());
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
button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 8px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 30%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

</style>

<script type="text/javascript">
function confirm_click()
{
return confirm("Are You Sure To Delete This Request ?");
}

</script>

   <link rel="stylesheet" href="styles.css">
</head>
<body>
<div id='cssmenu'>
<ul>
   <li><a href='tes'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Prescription</span></a>
      <ul>
         <li class='has-sub'><a href='tes'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='pharinview'><span>IPD Prescription</span></a>
            
         </li>
      </ul>
   </li>
   
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='preview'><span>Print Previous Prescription</span></a>
            
         </li>
		 <li class='has-sub'><a href='tes5'><span>Prescription Status Wise Report </span></a>
            
         </li>
         <li class='has-sub'><a href='tes6'><span>Consultant Wise Report</span></a>
            
         </li>
		 <li class='has-sub'><a href='tesaudit'><span>All Consultant Prescription Report</span></a>
            
         </li>
      </ul>
   </li>
   
   
   <li class='active has-sub'><a href='#'><span>Search</span></a>
      <ul>
         <li class='last'><a href='categoryphar'><span>Categorywise Medicine</span></a></li>
		 <li class='last'><a href='genericsearch'><span>Generic Name wise Medicine</span></a></li>
            
         
      </ul>
      <li class='last'><a href='imoinviewphar'><span>Inpatient</span></a></li>
	  
	  <li class='last'><a href='addmedicine'><span>Add Medicine</span></a></li>
	  <li class='last'><a href='pendingrequest'><span>Pending Request</span></a></li>
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>

</div>


<p align="center" class="style1">WelCome To Pharmacy Module </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Generic Name</strong></th>
      <th width="10%"><strong>Requested By</strong></th>
      <th width="15%"><strong>Request Date </strong>
      <th width="14%"><strong>Consultant Remarks</strong>   
	  <th width="14%"><strong>Proceed</strong>   
	  <th width="14%"><strong>Delete</strong>   
	        

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from newmaterial where rstatus='Pending' ORDER BY id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["mname"]; ?></td>
      <td align="center"><?php echo $row["rby"]; ?></td>

      <td align="center"><?php echo $row["rtime"]; ?></td>
	  <td align="center"><?php echo $row["cremarks"]; ?></td>
	  
	  <td align="center"><a href="addmedicinerequest?id=<?php echo $row["id"]; ?>">Proceed</a></td>
	  <td align="center"><a href="addmedicinerequestdelete?id=<?php echo $row["id"]; ?>"><strong>Delete</strong></a></td>
	  

 

	  

      </tr>
    <?php $count++; } ?>
	
  </tbody>
</table>
<br><br>

<p align="center" class="style1">Pending Approval List</p> 
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    



    <tr>
     <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Generic Name</strong></th>
      <th width="10%"><strong>Requested By</strong></th>
      <th width="15%"><strong>Request Date </strong>
      <th width="14%"><strong>Chariman</strong>   
	  <th width="14%"><strong>MD</strong>   
	  <th width="14%"><strong>CFO</strong>   
	  <th width="14%"><strong>CEO</strong>   
	  <th width="14%"><strong>ADD</strong>   
	        

	   </tr>
      

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from newmaterial where a1='Approved' and a2='Approved' and rstatus NOT IN ('DONE','Cancelled') ORDER BY id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["mname"]; ?></td>
      <td align="center"><?php echo $row["rby"]; ?></td>

      <td align="center"><?php echo $row["rtime"]; ?></td>
	  <td align="center"><?php echo $row["a1"]; ?></td>
	  <td align="center"><?php echo $row["a2"]; ?></td>
	  <td align="center"><?php echo $row["a3"]; ?></td>
	  <td align="center"><?php echo $row["a4"]; ?></td>
	  
	  <td align="center"><a href="addmedicinerequestfinal?id=<?php echo $row["id"]; ?>&user=<?php echo "$user"; ?>">ADD</a></td>
	  

 

	  

      </tr>
    <?php $count++; } ?>



    <?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
//$count=1;
$sel_query="Select * from newmaterial where a1 ='waiting' or a2 ='waiting' and rstatus ='waiting for approval'  ORDER BY id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["mname"]; ?></td>
      <td align="center"><?php echo $row["rby"]; ?></td>

      <td align="center"><?php echo $row["rtime"]; ?></td>
	  <td align="center"><?php echo $row["a1"]; ?></td>
	  <td align="center"><?php echo $row["a2"]; ?></td>
	  <td align="center"><?php echo $row["a3"]; ?></td>
	  <td align="center"><?php echo $row["a4"]; ?></td>
<td align="center">ADD</td>
	  

	  

 

	  

      </tr>
    <?php $count++; } ?>
	
  </tbody>
</table>
</form>
</body>
</html>
