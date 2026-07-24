<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','mng','rad')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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
$search = $_REQUEST['search'];

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
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




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

<p align="center" class="style1">PATIENTS RECORD SEARCH PANEL </p> 

<h2 align="right" style="color:red;">	
<form target="_blank" action="http://192.168.100.202/Launch_Viewer.asp?" method="post" id='tt5' >
<input type="hidden" name="PatientID" value="<?php echo $search;?>"></input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit49" form="tt5" value="ALL PACS VIEW AGAINST MRN"></input>
</form></h2>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



<tr> 
<td colspan="5"><input type="text" name="search"></td>
<td colspan="3"><button type="submit" name="bsearch">Search</button></td>
</tr>
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Reffer Doctor </strong>
      <th width="14%"><strong>Type</strong>   
      <th width="14%"><strong>Report Done By</strong>
	  <th width="14%"><strong>Date</strong>   
      <th width="14%"><strong>PRINT(Old Format)</strong>
	  <th width="14%"><strong>PRINT(New Format)</strong>
	  <th width="14%"><strong>PACS View</strong>

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["search"];
//$id=$_REQUEST["id"];

$count=1;
$sel_query="Select * from radreport where pmrn= '$pmrn' order by ID desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["dreffer"]; ?>
      <td align="center"><?php echo $row["type"]; ?>  
	  
	  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> 
<?php	  $date=$row["dname"] ;
?>
	  <td align="center"><?php echo date('d/m/Y',strtotime($row["rdate"])); ?></td>

	  <td ><a target='_blank' href="p4new1.php?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&dname=<?php echo $row['dname']; ?>"><img src="print.png" title="Print Report" width="60" height="20" /></a></td>
	  <td ><a target='_blank' href="rad_report_new2_1.php?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&dname=<?php echo $row['dname']; ?>&acno=<?php echo $row['ac_no']; ?>"><img src="print.png" title="Print Report" width="60" height="20" /></a></td>
	  
	  
<td>

<form target="_blank" action="http://192.168.100.202/Launch_Viewer.asp?" method="post" id='tt' >
<input type="hidden" name="AccessionNumber" value="<?php echo $row['ac_no'];?>"></input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit4" value="PACS VIEW"></input>
</form></td>
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>


</body>

</html>
