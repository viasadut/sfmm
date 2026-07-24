<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
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
return confirm("Are you Sure to Send this Report ?");
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
	  <th width="14%"><strong>Report</strong>      
      <th width="14%"><strong>Edit/Confirm</strong>
	  <th width="14%"><strong>Image</strong>
	  
      

	   </tr>
	   
	   
<tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="#ffbd1b" style="font-weight:bold;color:black;font-size:24px;"><b>Pending ECG Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron='ECG' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>
	
	
	
	<tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>Pending ECHO Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron like'%ECHO%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>
	
	
	<tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>Pending CORONARY ANGIOGRAM Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%CORONARY ANGIOGRAM%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>
	
		
	<tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>Pending Coronary Angioplasty Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%Coronary angioplasty%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>
	

    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%angioplasty%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>
	
	
	
	<tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>Pending EEG Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%EEG%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>
	
	
	<tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>Pending ETT Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%ETT%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>
	
	
	<tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>Pending Holter Monitoring Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%HOLTER%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>


    <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>Pending SPIROMETRY WITH REVERSIBILITY TEST Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%SPIROMETRY%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>


    <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>Pending NCV OF ONE SIDED LIMB Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%NCV OF ONE SIDED LIMB%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>

    <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>Pending NCV of Both Lower Limb Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%NCV of Both Lower Limb%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>

    
    <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>Pending NCV of Both Upper Limb Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%NCV of Both Upper Limb%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>

	
    
    <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>Pending NCV OF ONE LIMB Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%NCV OF ONE LIMB%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>


    <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>Pending FACIAL NERVE (NCV) Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%FACIAL NERVE (NCV)%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>

    <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>Pending CTS (NCV OF ONE UPPER LIMB) Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%CTS (NCV OF ONE UPPER LIMB)%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>



  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>RNS (REPETITIVE NERVE STIMULATION) Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%RNS (REPETITIVE NERVE STIMULATION)%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>


    <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>PERIPHERAL NEUROPATHY BRIEF PROTOCOL Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%PERIPHERAL NEUROPATHY BRIEF PROTOCOL%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>


    <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>PERIPHERAL NEUROPATHY BRIEF PROTOCOL Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%USG-UPPER AND LOWER LIMB%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>

    
    <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>NCV & EMG LIMB Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%NCV And EMG%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>


    




    <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>PPM<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%PACEMAKER%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>




    <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>Peripheral Angiogram Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%peripheral angiogram%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>




    <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>ICD Report<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%ICD%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>




    
    <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>RENAL ANGIOGRAM REPORT<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%renal%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>


    <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen" style="font-weight:bold;color:black;font-size:24px;"><b>RADIAL CAG	REPORT<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	   
	   
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron LIKE '%RADIAL CAG%' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>




  </tbody>
</table>
</form>
</body>
</html>
