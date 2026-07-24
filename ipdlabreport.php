<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="lab"){
      header('Location: login2?err=2');
    }
?>



<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 60; URL=$url1");

?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/


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
   <link rel="stylesheet" href="styles.css">
   
   <script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Reveive this Sample ?");
}

</script>

</head>
<body>
<div id='cssmenu'>
<ul>
   <li><a href='teslab'><span>Home</span></a></li>
   
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='preview'><span>Print Previous Prescription</span></a>
            
         </li>
		 <li class='has-sub'><a href='tes5lab'><span>Prescription Status Wise Report </span></a>
            
         </li>
         <li class='has-sub'><a href='tes6lab'><span>Consultant Wise Report</span></a>
            
         </li>
      </ul>
   </li>
  <li><a href='inplab'><span>Inpatient</span></a></li>
  <li><a href='emerlab'><span>Emergency</span></a></li>
  <li><a href='endoscopylab'><span>Endoscopy Suite</span></a></li>
  <li><a href='labsearchbar'><span>Search By Barcode</span></a></li>
  <li><a href='labstatlab'><span>Investigation Stats</span></a></li>
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<p align="center" class="style1">!! WELCOME !! <?php echo $row39['fullname']; ?>'s Dash Board </p> 
<p align="center" class="style1">OPD LAB REQUEST </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Barcode</strong></th>
      <th width="15%"><strong>Request Date </strong>
	  <th width="15%"><strong>Receive Date </strong>
      <th width="14%"><strong>Doctor's Name</strong>   
	        <th width="14%"><strong>ID</strong>   
      <th width="14%"><strong>RESULT</strong>
	  <th width="14%"><strong>EDIT</strong>
	  <th width="14%"><strong>PRINT</strong>
      

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$apdate=date('Y-m-d');
                        $test=date('Y-m-d', strtotime('-20 days') );
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from iinves where  type='lab' and status='Received' and result !='' and ndate between '$test' and '$apdate' and conby ='' and resultstatus ='Updated By Technologist' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
<td align="center"><?php echo $row["barcode"]; ?></td>
      <td align="center"><?php echo $row["ndate"]; ?></td>
	        <td align="center"><?php echo $row["rtime"]; ?></td>
	  <td align="center"><?php echo $row["dname"]; ?></td>
	  	  <td align="center"><?php echo $row["infusion"];?></td>
<td align="left"><?php echo $row["result"];?></td>		  
	  

	  
	  
	  <td align="center" colspan="1"><td align="center" colspan="1"><a target='_blank' href="<?php echo $row["linkv"]?>?id=<?php echo$row["id"];?>&pmrn=<?php echo $row["pmrn"];?>&eid=<?php echo $row["eid"];?>">EDIT</a>
	  </td>
 

	  	  	  <td colspan="1"><a target='_blank' href="<?php echo $row['report']?>?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>&sno=<?php echo 'I'.$row['id']; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>

      </tr>
    <?php $count++; } ?>
	
	
	
	
	
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$apdate=date('Y-m-d');
                        $test=date('Y-m-d', strtotime('-20 days') );
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from einves where  type='lab' and status='Received' and result !='' and ndate between '$test' and '$apdate' and conby ='' and resultstatus ='Updated By Technologist' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
<td align="center"><?php echo $row["barcode"]; ?></td>
      <td align="center"><?php echo $row["ndate"]; ?></td>
	        <td align="center"><?php echo $row["rtime"]; ?></td>
	  <td align="center"><?php echo $row["dname"]; ?></td>
	  	  <td align="center"><?php echo $row["infusion"];?></td>
<td align="left"><?php echo $row["result"];?></td>		  
	  

	  
	   
	  <td align="center" colspan="1"><a target="_blank" href="<?php echo $row["linkv"]?>?id=<?php echo$row["id"];?>&pmrn=<?php echo $row["pmrn"];?>&eid=<?php echo $row["eid"];?>">EDIT</a>
	  </td>
 

	  	  	  <td colspan="1"><a target='_blank' href="<?php echo $row['report']?>?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>&sno=<?php echo 'E'.$row['id']; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>

      </tr>
    <?php $count++; } ?>
	
  </tbody>
</table>
</form>
</body>
</html>
