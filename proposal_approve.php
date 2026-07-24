<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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
$row39 = mysqli_fetch_array($result39);
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
return confirm("Are you Sure to Proceed ?");
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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s Doriddro Fund Pending Approval List </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Proposal Submitted By</strong></th>
      <th width="10%"><strong>Proposal Type</strong></th>
      <th width="15%"><strong>Proposal Title</strong>
      
	  <th width="14%"><strong>Proposal Time</strong> 
<th width="14%"><strong>Status</strong> 	  
      <th width="14%"><strong>Edit</strong>
	  <th width="14%"><strong>View</strong>
	  
	  <th width="14%"><strong>Approve / Comments</strong>
	  
	  
      
	   </tr>
  </thead>
  <tbody>
  
  
  <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count1=1;
$sel_query="Select * from proposal where status='Proposed' order by id desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count1; ?></td>
      <td align="center"><?php echo $row["eby"]; ?></td>
      <td align="center"><?php echo $row["discipline"]; ?></td>
	  <td align="center"><?php echo $row["tname"]; ?></td>
      
      <td align="center"><?php echo $row["adate"]; ?>  </td>
	  <td align="left"><?php 
	  if($row["a_by"]!='')
	  {echo   'CEO'.'-'.'<b>'.$row["status"].'</b>'.'<br>'.
	  
	  //else ($row['a_by']=='')
	  //{'CEO'.'-'.$row["status"].'<br>'.}
	  
	  'MD'.'-'.'<b>'.$row["md_status"].'</b>'.'<br>'.$row["md_com"].'</b>'.'<br>'.
	  'CFO'.'-'.'<b>'.$row["cfo_status"].'</b>'.'<br>'.$row["cfo_com"].'</b>'.'<br>'.
	  'CNO'.'-'.'<b>'.$row["cno_status"].'</b>'.$row["cno_com"].'</b>'.'<br>' ;}

else 
{echo   'CEO'.'-'.'<br>'.
	  
	  //else ($row['a_by']=='')
	  //{'CEO'.'-'.$row["status"].'<br>'.}
	  
	  'MD'.'-'.'<b>'.$row["md_status"].'</b>'.'<br>'.$row["md_com"].'</b>'.'<br>'.
	  'CFO'.'-'.'<b>'.$row["cfo_status"].'</b>'.'<br>'.$row["cfo_com"].'</b>'.'<br>'.
	  'CNO'.'-'.'<b>'.$row["cno_status"].'</b>'.$row["cno_com"].'</b>'.'<br>' ;}

	  ?>  </td>
	  
	  

	  <td align="center">
	  
	  <?php if($row['status']!='Approved' and $row['eby']==$full)
	  {echo
		  '<a href="edit_proposal?id='.$row["id"].'"><strong>Edit</strong></a>';}
		  
		  else {echo '';}?>
	  
	  
	  
	  </td>
	  <td align="center"><a href="report_proposal?id=<?php echo $row["id"]; ?>"><strong>View</strong></a></td>	   
<td align="center">

<?php if($row['status']!='Approved' and $full=='Mohd Taufik Bin Ismail')
	  {echo


	  '<a href="proposal_comment?id='.$row["id"].'"><strong>Confirm / Reject </strong></a>';}

	  else if($row['status']!='Approved' and $full=='Ruzita' || $full=='Dr. Razeeb Hassan' ||$full=='Nuradilah Shuib')

 {echo


	  '<a href="proposal_comment_other?id='.$row["id"].'"><strong>Comments</strong></a>';}
	  
	  else
	  {echo


	  '<strong>Already Approved</strong>';}
?>

</td>


<td align="center">

<?php if($row['eby']==$full)
	  {echo
	  '<a href="proposal_upload?id='.$row["id"].'"><strong>Upload Documents</strong></a>';
	  }

	  else
	  {	echo  '<a href="proposal_upload_view?id='.$row["id"].'"><strong>View Documents</strong></a>';
}
?>

</td>



	  
      </tr>
    <?php $count1++; } ?>

	
	
	
	
	

</tbody>
</table>

</form>

</body>

</html>

