<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 120; URL=$url1");
$ct=date('H:i:s');
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
$mng=$row39['ugroup'];


$query40 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);

$opd=$row40['opd'];


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
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>View Records</title>
<link rel="stylesheet" href="css/style2.css">



<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}


img {
  border-radius: 50%;
  
}

div1 {
  height: 50px;
  width: 50%;
  border: 1px solid #4CAF50;
  float: right;
  
}

</style>
   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Approve this Leave ?");
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
   <li><a href='new_opd'><span>Home</span></a></li>

   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<h1 align="center" class="style1">Appointment Desk</h1> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>


<p align="right"><div1><input style="background-color: lightgreen;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Discipline.." title="Type in a Discipline">
</div1></p>

 

<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" id="myTable">

    <tr class="header">
	<th width="4%"><strong>S.No</strong></th>
      <th width="40%"><strong>Consultant Name</strong></th>
	  <th width="17%"><strong>Availability</strong></th>
      <th width="10%"><strong>Open Slot</strong></th>
	  <th width="10%"><strong>Block Doctor's Slot</strong></th>
	  <th width="10%"><strong>UnBlock Doctor's Slot</strong></th>
	  <th width="10%"><strong>Make Appointment(Old Patient)</strong></th>
	  <th width="10%"><strong>Make Appointment(New Patient)</strong></th>
	  
      
	   </tr>
  </thead>
  <tbody>
  
   
	<?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select distinct dname from doctor where status='Active' and type='res' and opd='$opd' order by dname asc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="left"><span style='color:red;text-align:center;font-size:20px'><b><?php echo $count; ?></td>
      
	  
	   <?php
	   $dn = $row['dname'];
$query40 = "SELECT * FROM doctor where dname= '$dn' and status='Active'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);
$ss=$row40['sid'];

   ?>
	  
	  
	  
	  <td align="left"><span style='color:red;text-align:center;font-size:14px'>
	  
	  <a href="doc_details?sid=<?php echo $ss; ?>" target="_blank"><img  src="prescription/prescription/doctor/<?php echo $ss.'.jpg' ?>" width="60"  height="60" align="center"></a>
	  
	  <b><a href="con_details?sid=<?php echo $ss; ?>" target="_blank"><?php echo $row["dname"]; ?></a>
	  
	  
	  
	  </td>
	  
	  <td style="display:none;">

	  
	  <?php echo $row40['details'];?>
	  
	  </td>

	  

<td>


<?php

$id=$row["id"];
$dname2=$row["dname"];
$date2=date('Y-m-d');
$url = "test_appoint5?dname=$dname2&date=$date2"; 


$sql = "select * from opd_appoint1 where dname='$dname2' and date1='$date2' and status='AVAILABLE' order by dslot asc limit 1";
			$res = mysqli_query($con, $sql);
			$row40 = mysqli_fetch_array($res);



$sql1 = "select * from opd_appoint1 where dname='$dname2' and date1='$date2' and status='AVAILABLE' order by dslot desc limit 1";
			$res1 = mysqli_query($con, $sql1);
			$row41 = mysqli_fetch_array($res1);


$sqlb = "select * from opd_appoint1 where dname='$dname2' and date1='$date2' and status='NOT AVAILABLE' order by dslot asc limit 1";
			$resb = mysqli_query($con, $sqlb);
			$row40b = mysqli_fetch_array($resb);



$sql1b = "select * from opd_appoint1 where dname='$dname2' and date1='$date2' and status='NOT AVAILABLE' order by dslot desc limit 1";
			$res1b = mysqli_query($con, $sql1b);
			$row41b = mysqli_fetch_array($res1b);
			
			
			$sql1a = "select COUNT(status) from opd_appoint1 where dname='$dname2' and date1='$date2' and status='NOT AVAILABLE'";
			$res1a = mysqli_query($con, $sql1a);
			$row41a = mysqli_fetch_array($res1a);
			
			$sql1aa = "select COUNT(status) from opd_appoint1 where dname='$dname2' and date1='$date2' and status='AVAILABLE'";
			$res1aa = mysqli_query($con, $sql1aa);
			$row41aa = mysqli_fetch_array($res1aa);
			
		
$sql1aab = "select COUNT(status) from opd_appoint1 where dname='$dname2' and date1='$date2' and status='Booked'";
			$res1aab = mysqli_query($con, $sql1aab);
			$row41aab = mysqli_fetch_array($res1aab);
			


if($row41aa['COUNT(status)']==0 and $row41a['COUNT(status)']==0 and $row41aab['COUNT(status)']==0)
	
	{
		echo "<span style='color:red;text-align:left;font-size:20px'><b>Not Available";
		
	}
	
	
	
	else if($row41aa['COUNT(status)']!=0 and $row41a['COUNT(status)']==0)
	
	{
		echo "<span style='color:green;text-align:left;font-size:20px'><b>Available";
		
	}
	
	
	
	else if($row41aa['COUNT(status)']!=0 and $row41a['COUNT(status)']!=0)

	
	{
		
echo"<span style='color:lightgreen;text-align:left;font-size:20px'><b>Available Except: From".' -  '.$row40b['dslot'].' To'.$row41b['dslot'].' For '.$row41b['remarks'];	
	}
	
	else if($row41aa['COUNT(status)']==0 and $row41a['COUNT(status)']!=0)
	
	{
		echo "<span style='color:red;text-align:left;font-size:20px'><b>All Slots Are Booked ";
		
	}
	
	else if($row41aa['COUNT(status)']==0 and $row41a['COUNT(status)']==0)
	
	{
		echo "<span style='color:red;text-align:left;font-size:20px'><b>All Slots Are Booked ";
		
	}?>
</td>

	  
	  
<td>	  
<?php

$id=$row["id"];
$dname2=$row["dname"];
$date2=date('Y-m-d');
$url = "test_appoint5?dname=$dname2&date=$date2"; 


$sql = "select * from opd_appoint1 where dname='$dname2' and date1='$date2' and status='AVAILABLEm'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {


	
echo "AVAILABLE";}

else {
	
	echo "<a target='_blank' href='$url'>Open Slot</a>";
}
?>	
</td>



<td>	  
<?php

$id=$row["id"];
$dname2=$row["dname"];
$date2=date('Y-m-d');
$url = "test_appoint8?dname=$dname2&date=$date2"; 


/*$sql = "select * from opd_appoint1 where dname='$dname2' and date1='$date2' and status='AVAILABLE'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {

*/
	
echo "<a target='_blank' href='$url'>Block</a>";

/*}

else {
	
echo "Slot Not Available";
}
*/
?>	
</td>  
	  

	  
<td>	  





<?php

$id=$row["id"];
$dname2=$row["dname"];
$date2=date('Y-m-d');
$url = "test_appoint8_un?dname=$dname2&date=$date2"; 


/*$sql = "select * from opd_appoint1 where dslot>='$ct' and dname='$dname2' and date1='$date2' and status='NOT AVAILABLE'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {

*/
	
echo "<a target='_blank' href='$url'>Unblock</a>";

/*}

else {
	
	echo "No Slot Available for Unblock";
}*/
?>	
</td>  
	  




<td>	  
<?php

$id=$row["id"];
$dname2=$row["dname"];
$date2=date('Y-m-d');
$url = "ccgg1new_test1_new1?dname=$dname2"; 



	
echo "<a target='_blank' href='$url'>Make Appointment(Old Patient)</a>";


?>	
</td>  



<td>	  
<?php

$id=$row["id"];
$dname2=$row["dname"];
$date2=date('Y-m-d');
$url = "ccgg1new_test1_call_new?dname=$dname2"; 

	
echo "<a target='_blank' href='$url'>Make Appointment(New Patient)</a>";


?>	
</td>  


      </tr>
    <?php $count++; } ?>
	
	
	
	
	
	
	
	
	<?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$count=1;
$sel_query="Select distinct dname from doctor where status='Active' and type='out' and opd='$opd' order by dname asc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="left"><span style='color:red;text-align:center;font-size:20px'><b><?php echo $count; ?></td>
      
	  
	   <?php
	   $dn = $row['dname'];
$query40 = "SELECT * FROM doctor where dname= '$dn' and status='Active'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);
$ss=$row40['sid'];

   ?>
	  
	  
	  
	  <td align="left"><span style='color:red;text-align:center;font-size:14px'>
	  
	  <a href="doc_details?sid=<?php echo $ss; ?>" target="_blank"><img  src="prescription/prescription/doctor/<?php echo $ss.'.jpg' ?>" width="60"  height="60" align="center"></a>
	  
	  <b><a href="con_details?sid=<?php echo $ss; ?>" target="_blank"><?php echo $row["dname"]; ?></a>
	  
	  
	 
	  
	  </td>
	  

<td>


<?php

$id=$row["id"];
$dname2=$row["dname"];
$date2=date('Y-m-d');
$url = "test_appoint5?dname=$dname2&date=$date2"; 


$sql = "select * from opd_appoint1 where dname='$dname2' and date1='$date2' and status='AVAILABLE' order by dslot asc limit 1";
			$res = mysqli_query($con, $sql);
			$row40 = mysqli_fetch_array($res);



$sql1 = "select * from opd_appoint1 where dname='$dname2' and date1='$date2' and status='AVAILABLE' order by dslot desc limit 1";
			$res1 = mysqli_query($con, $sql1);
			$row41 = mysqli_fetch_array($res1);


$sqlb = "select * from opd_appoint1 where dname='$dname2' and date1='$date2' and status='NOT AVAILABLE' order by dslot asc limit 1";
			$resb = mysqli_query($con, $sqlb);
			$row40b = mysqli_fetch_array($resb);



$sql1b = "select * from opd_appoint1 where dname='$dname2' and date1='$date2' and status='NOT AVAILABLE' order by dslot desc limit 1";
			$res1b = mysqli_query($con, $sql1b);
			$row41b = mysqli_fetch_array($res1b);
			
			
			$sql1a = "select COUNT(status) from opd_appoint1 where dname='$dname2' and date1='$date2' and status='NOT AVAILABLE'";
			$res1a = mysqli_query($con, $sql1a);
			$row41a = mysqli_fetch_array($res1a);
			
			$sql1aa = "select COUNT(status) from opd_appoint1 where dname='$dname2' and date1='$date2' and status='AVAILABLE'";
			$res1aa = mysqli_query($con, $sql1aa);
			$row41aa = mysqli_fetch_array($res1aa);
			
		$sql1aab = "select COUNT(status) from opd_appoint1 where dname='$dname2' and date1='$date2' and status='Booked'";
			$res1aab = mysqli_query($con, $sql1aab);
			$row41aab = mysqli_fetch_array($res1aab);
			


if($row41aa['COUNT(status)']==0 and $row41a['COUNT(status)']==0 and $row41aab['COUNT(status)']==0)
	
	{
		echo "<span style='color:red;text-align:left;font-size:20px'><b>Not Available";
		
	}
	
	
	
	else if($row41aa['COUNT(status)']!=0 and $row41a['COUNT(status)']==0)
	
	{
		echo "<span style='color:green;text-align:left;font-size:20px'><b>Available";
		
	}
	
	
	
	else if($row41aa['COUNT(status)']!=0 and $row41a['COUNT(status)']!=0)

	
	{
		
echo"<span style='color:lightgreen;text-align:left;font-size:20px'><b>Available Except: From".' -  '.$row40b['dslot'].' To'.$row41b['dslot'].' For '.$row41b['remarks'];	
	}
	
	else if($row41aa['COUNT(status)']==0 and $row41a['COUNT(status)']!=0)
	
	{
		echo "<span style='color:red;text-align:left;font-size:20px'><b>All Slots Are Booked ";
		
	}
	
	else if($row41aa['COUNT(status)']==0 and $row41a['COUNT(status)']==0)
	
	{
		echo "<span style='color:red;text-align:left;font-size:20px'><b>All Slots Are Booked ";
		
	}
?>
</td>

	  
	  
<td>	  
<?php

$id=$row["id"];
$dname2=$row["dname"];
$date2=date('Y-m-d');
$url = "test_appoint5?dname=$dname2&date=$date2"; 


$sql = "select * from opd_appoint1 where dname='$dname2' and date1='$date2' and status='AVAILABLEm'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {


	
echo "AVAILABLE";}

else {
	
	echo "<a target='_blank' href='$url'>Open Slot</a>";
}
?>	
</td>



<td>	  
<?php

$id=$row["id"];
$dname2=$row["dname"];
$date2=date('Y-m-d');
$url = "test_appoint8?dname=$dname2&date=$date2"; 


/*$sql = "select * from opd_appoint1 where dname='$dname2' and date1='$date2' and status='AVAILABLE'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {

*/
	
echo "<a target='_blank' href='$url'>Block</a>";

/*}

else {
	
echo "Slot Not Available";
}*/
?>	
</td>  
	  

	  
<td>	  





<?php

$id=$row["id"];
$dname2=$row["dname"];
$date2=date('Y-m-d');
$url = "test_appoint8_un?dname=$dname2&date=$date2"; 

/*
$sql = "select * from opd_appoint1 where dslot>='$ct' and dname='$dname2' and date1='$date2' and status='NOT AVAILABLE'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {

*/
	
echo "<a target='_blank' href='$url'>Unblock</a>";

/*}

else {
	
	echo "No Slot Available for Unblock";
}
*/
?>	
</td>  
	  



 








<td>	  
<?php

$id=$row["id"];
$dname2=$row["dname"];
$date2=date('Y-m-d');
$url = "ccgg1new_test1_new1?dname=$dname2"; 



	
echo "<a target='_blank' href='$url'>Make Appointment(Old Patient)</a>";


?>	
</td>  



<td>	  
<?php

$id=$row["id"];
$dname2=$row["dname"];
$date2=date('Y-m-d');
$url = "ccgg1new_test1_call_new?dname=$dname2"; 

	
echo "<a target='_blank' href='$url'>Make Appointment(New Patient)</a>";


?>	
</td>  





      </tr>
    <?php $count++; } ?>


</tbody>
</table>

</form>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
	td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


</body>

</html>

