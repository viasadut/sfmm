<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','ddf','rad','doctor','moopd','ddf1','staff','histo','doctor','nurse','imo','mofficer','physio','outdoc','techbio','endo','oic','gpopd','mrd')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');
$tt=$_SERVER['HTTP_HOST']	;
$pmrn=$_REQUEST['pmrn'];
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

$death = "SELECT COUNT(id) FROM deathn where pmrn= '$pmrn'"; 
	 
$result_d = mysqli_query($con, $death) or die(mysqli_error());

// Print out result
$row_d = mysqli_fetch_array($result_d);

$d1=$row_d['COUNT(id)'];





$death_b = "SELECT COUNT(id) FROM deathb where pmrn= '$pmrn'"; 
	 
$result_b = mysqli_query($con, $death_b) or die(mysqli_error());

// Print out result
$row_b = mysqli_fetch_array($result_b);

$d2=$row_b['COUNT(id)'];

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
   <script src="jnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




   <script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Add This in the Favorite List?");
}

</script>


<script type="text/javascript">
function confirm_click_can()
{
return confirm("Are you Sure to Delete This From the Favorite List?");
}

</script>

</head>


<body>



<div id='cssmenu'>
<ul>
   <li><a href='viewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='prescription/prescription/viewnew'><span>OPD Patients</span></a>
            
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

<p align="center" class="style1">SUGGESTED SURGERY LIST</p> 


<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


<tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightbrown"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold;color:red;"><b>SUGGESTED PATIENTS LIST FOR SURGERY<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong>   
      <th width="14%"><strong>Diagnosis</strong>
      <th width="14%"><strong>PRINT</strong>
      <th width="14%"><strong>Done Status</strong>
      <th width="14%"><strong>Cancel</strong>
      
	  

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$count=1;
$sel_query="Select * from presnew where dname='$full' and surgery='1' order by id desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      
	  <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center">
      <a target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row['pmrn']; ?>">
      <?php echo $row["pmrn"]; ?></a></td>
      <td align="center"><?php echo date('d/m/Y',strtotime($row["date1"])); ?>
      <td align="center"><?php echo $row["pphone"]; ?>  
      
	  
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["diagnosis"];?> 
</td>
	  <td align="center"><a target='_blank' href="prescription/prescription/pdf_p_12?pmrn=<?php echo "$pmrn"; ?>&date=<?php echo "$date"?>&dname=<?php echo $row["dname"];?>&eid=<?php echo $row["eid"];?>"><img src="print.png" title="Print Report" width="50" height="40" /></a></td>
	  <td align="center">
    <?php 

if($row["surgery"]==1 and $row["dname"]==$full){?>  
    
    <a onclick="return confirm_click();" href="surgery_opd?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn'];?>">Surgery Done</a>
  
  </td>
	  <?php } ?>

    <td align="center">
    <?php 

if($row["surgery"]==1 and $row["dname"]==$full){?>  
    
    <a onclick="return confirm_click();" href="surgery_opd_cancel?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn'];?>">Cancel</a>
  
  </td>
	  <?php } ?>
      </tr>
    <?php $count++; } ?>
  </tbody>
  
  
  
  
  
  
  </table>
</form>

</body>

</html>
