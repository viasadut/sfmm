<?php
require('db1.php');
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="rad"){
      header('Location: login2.php?err=2');
    }
?>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
      <th width="14%"><strong>Reffered From</strong>
      <th width="14%"><strong>Doctor Name</strong>  
      <th width="14%"><strong>Status</strong>

	  



	   </tr>
  </thead>
  <tbody>
  



  <?php

$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;
echo "Today's Seen Patients";

$sel_query="Select * from radreport where dname= 'Dr. Mir Latiar Hossain'";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["report"]; ?>
      <td align="center"><?php echo $row["test"]; ?>  
	  <td align="Left"><?php echo $row["dreffer"]; ?>  
	  	  <td align="Left"><?php echo $row["dname"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 

      </tr>
    <?php $count++; } ?>

  </tbody>
</table>

</body>

</html>
