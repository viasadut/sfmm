<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','oic')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 120; URL=$url1");
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
<h1 align="center" class="style1">Today's Summary OPD Report</h1> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>


<p align="right"><div1><input style="background-color: lightgreen;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search with Consultant Name.." title="Type in a Discipline">
</div1></p>

 

<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" id="myTable">

<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
$date2=date('Y-m-d');
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	$query198j_bed = "SELECT SUM(payment) FROM pappnew where adate1= '$date2' and `bill`='BILLED'"; 
	 //Select * from pappnew where adate= '$date' and `bill`='Billed' and status ='SEEN'
$result198j_bed = mysqli_query($dbhandle,$query198j_bed) or die(mysql_error());

// Print out result
$row198j_bed = mysqli_fetch_array($result198j_bed);
$test1c_bed=	$row198j_bed['SUM(payment)'];
$test1c_bed4=	$row198j_bed['SUM(payment)']+$fday8;



	?>
	<td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Today's Total OPD Bill:<?php echo $test1c_bed;?> (BDT)</strong></td></tr>
    <tr class="header">
	<th width="4%"><strong>S.No</strong></th>
      <th width="40%"><strong>Consultant Name</strong></th>
	  <th width="10%"><strong>Total Patient</strong></th>
	  <th width="17%"><strong>Seen Patient</strong></th>
      <th width="10%"><strong>Pending Patient</strong></th>
	  <th width="10%"><strong>Amount(BDT)</strong></th>
	  
	  
      
	   </tr>
  </thead>
  <tbody>
  
   
	<?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$date1= date('Y-m-d');
$count=1;
$sel_query="Select distinct dname from opd_appoint1 where status='AVAILABLE' and date1='$date1' and dname!='Physiotherapy'order by dname asc";
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
	  
	 <img  src="prescription/prescription/doctor/<?php echo $ss.'.jpg' ?>" width="60"  height="60" align="center">
	  
	  <b><?php echo $row["dname"]; ?>
	  
	  
	  
	  </td>
	  
	    




<?php

$id=$row["id"];
$dname2=$row["dname"];
$date2=date('Y-m-d');
$url = "opd_indu_details?dname=$dname2"; 


$sql = "select COUNT(pmrn) from pappnew where dname='$dname2' and adate1='$date2' and status='SEEN'";
			$res = mysqli_query($con, $sql);
			$row40 = mysqli_fetch_array($res);
			$seen=$row40['COUNT(pmrn)'];
			
			
$sql1 = "select COUNT(pmrn) from pappnew where dname='$dname2' and adate1='$date2' and status in('NOT SEEN','HISTORY UPDATED') and `bill`='Billed'";
			$res1 = mysqli_query($con, $sql1);
			$row41 = mysqli_fetch_array($res1);
			$notseen=$row41['COUNT(pmrn)'];			

$total=$seen+$notseen;

			
?>


	<td><span style='color:red;text-align:center;font-size:20px'><b><a target='_blank' href="opd_indu_details?dname=<?php echo $dname2;?>"><?php echo $total;?></a></td>
	<td><span style='color:red;text-align:center;font-size:20px'><b><a target='_blank' href="opd_indu_details1?dname=<?php echo $dname2;?>"><?php echo $seen;?></a></td>
	<td><span style='color:red;text-align:center;font-size:20px'><b><a target='_blank' href="opd_indu_details2?dname=<?php echo $dname2;?>"><?php echo $notseen;?></a></td>

	  
	  
<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
$date2=date('Y-m-d');
$dname2=$row["dname"];
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	$query198j_bed = "SELECT SUM(payment) FROM pappnew where adate1= '$date2' and `bill`='BILLED' and dname='$dname2'"; 
	 //Select * from pappnew where adate= '$date' and `bill`='Billed' and status ='SEEN'
$result198j_bed = mysqli_query($dbhandle,$query198j_bed) or die(mysql_error());

// Print out result
$row198j_bed = mysqli_fetch_array($result198j_bed);
$test1c_bed=	$row198j_bed['SUM(payment)'];
$test1c_bed4=	$row198j_bed['SUM(payment)']+$fday8;



	?>
	<td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong><?php echo $test1c_bed;?></strong></td></tr>


      </tr>
    <?php $count++; } ?>
	
	
	
	
		<?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$date1= date('Y-m-d');
//$count=1;
$sel_query="Select distinct dname from pappnew where adate1='$date1' and dname in('Shamima Akter','Mr. K. Utshab Zaman','Al-Amin','Devjanee Sheel','Physiotherapy')order by dname asc";
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
	  
	 <img  src="prescription/prescription/doctor/<?php echo $ss.'.jpg' ?>" width="60"  height="60" align="center">
	  
	  <b><?php echo $row["dname"]; ?>
	  
	  
	  
	  </td>
	  
	    




<?php

$id=$row["id"];
$dname2=$row["dname"];
$date2=date('Y-m-d');
$url = "opd_indu_details?dname=$dname2"; 


$sql = "select COUNT(pmrn) from pappnew where dname='$dname2' and adate1='$date2' and status='SEEN'";
			$res = mysqli_query($con, $sql);
			$row40 = mysqli_fetch_array($res);
			$seen=$row40['COUNT(pmrn)'];
			
			
$sql1 = "select COUNT(pmrn) from pappnew where dname='$dname2' and adate1='$date2' and status in('NOT SEEN','HISTORY UPDATED') and `bill`='Billed'";
			$res1 = mysqli_query($con, $sql1);
			$row41 = mysqli_fetch_array($res1);
			$notseen=$row41['COUNT(pmrn)'];			

$total=$seen+$notseen;

			
?>


	<td><span style='color:red;text-align:center;font-size:20px'><b><a target='_blank' href="opd_indu_details?dname=<?php echo $dname2;?>"><?php echo $total;?></a></td>
	<td><span style='color:red;text-align:center;font-size:20px'><b><a target='_blank' href="opd_indu_details1?dname=<?php echo $dname2;?>"><?php echo $seen;?></a></td>
	<td><span style='color:red;text-align:center;font-size:20px'><b><a target='_blank' href="opd_indu_details2?dname=<?php echo $dname2;?>"><?php echo $notseen;?></a></td>

	  
	  
<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
$date2=date('Y-m-d');
$dname2=$row["dname"];
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	$query198j_bed = "SELECT SUM(payment) FROM pappnew where adate1= '$date2' and `bill`='BILLED' and dname='$dname2'"; 
	 //Select * from pappnew where adate= '$date' and `bill`='Billed' and status ='SEEN'
$result198j_bed = mysqli_query($dbhandle,$query198j_bed) or die(mysql_error());

// Print out result
$row198j_bed = mysqli_fetch_array($result198j_bed);
$test1c_bed=	$row198j_bed['SUM(payment)'];
$test1c_bed4=	$row198j_bed['SUM(payment)']+$fday8;



	?>
	<td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong><?php echo $test1c_bed;?></strong></td></tr>


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
    
	td = tr[i].getElementsByTagName("td")[1];
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

