<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="cath"){
      header('Location: login2?err=2');
    }
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
$test=date('Y-m-d', strtotime('-10 days') );

?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 20; URL=$url1");

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
   <link rel="stylesheet" href="styles.css">
   
   
   
   <script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Delete this Report ?");
}

</script>

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


<p align="center" class="style1">Pending Report Approval </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Done Date </strong>
      <th width="14%"><strong>Procedure Name</strong>   
	  <th width="14%"><strong>Location</strong>   
	      
      <th width="14%"><strong>Edit</strong>
	  <th width="14%"><strong>Upload</strong>
	  <th width="14%"><strong>Send</strong>
	  <th width="14%"><strong>Delete</strong>
      

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and pstatus='' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']=='Updated' and $row['con_by']==''){echo'
	  <a target="_blank" href="spd_report_edit_doc?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']=='Updated' and $row['con_by']=='' and $row['ron']=='ECG' and $row['upload']==''){echo'
	  <a target="_blank" href="spdupload_new?eid='.$row["eid"].'&pmrn='.$row["pmrn"].'">Upload</a>';
	  }
	  
	  else if($row['status1']=='Updated' and $row['con_by']=='' and $row['ron']=='ecg'and $row['upload']==''){echo'
	  <a target="_blank" href="spdupload_new?eid='.$row["eid"].'&pmrn='.$row["pmrn"].'">Upload</a>';
	  }
	  
	  else if($row['status1']=='Updated' and $row['con_by']=='' and $row['ron']=='EEG - 30 minutes' and $row['upload']==''){echo'
	  <a target="_blank" href="spdupload_new?eid='.$row["eid"].'&pmrn='.$row["pmrn"].'">Upload</a>';
	  }
	  
	  else if($row['status1']=='Updated' and $row['con_by']=='' and $row['ron']=='EEG - 2 hours' and $row['upload']==''){echo'
	  <a target="_blank" href="spdupload_new?eid='.$row["eid"].'&pmrn='.$row["pmrn"].'">Upload</a>';
	  }
	  
	  else if($row['status1']=='Updated' and $row['con_by']=='' and $row['ron']=='ETT' and $row['upload']==''){echo'
	  <a target="_blank" href="spdupload_new?eid='.$row["eid"].'&pmrn='.$row["pmrn"].'">Upload</a>';
	  }
	  
	    else if($row['status1']=='Updated' and $row['con_by']=='' and $row['ron']=='HOLTER MONITORING' and $row['upload']==''){echo'
	  <a target="_blank" href="spdupload_new?eid='.$row["eid"].'&pmrn='.$row["pmrn"].'">Upload</a>';
	  }
	  
     else if($row['status1']=='Updated' and $row['con_by']=='' and $row['ron']=='SPIROMETRY WITH REVERSIBILITY TEST' and $row['upload']==''){echo'
      <a target="_blank" href="spdupload_new?eid='.$row["eid"].'&pmrn='.$row["pmrn"].'">Upload</a>';
      }

	   else if($row['status1']=='Updated' and $row['con_by']=='' and $row['ron']!='ECG' and $row['upload']==''){echo'';}
	  else{echo "<a target='_blank' href='spdpic/".$row['upload']."?id=".$row['id']."'>View File</a>";}
	  ?>
	  
	  </td>
	  

 
   
	  
<td align="center"><a onclick="return confirm_click();" href="spd_send_r_d?id=<?php echo $row["id"]; ?>"><strong>Send</strong></a></td>

<td align="left"><a onclick="return confirm_click();" href="delete1_spd?id=<?php echo $row["id"]; ?>">Delete</a></td>
      </tr>
    <?php $count++; } ?>
	
		
  </tbody>
</table>
</form>
</body>
</html>
