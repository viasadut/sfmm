<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','mrd','covid','call','imo','mofficer','nurse','emergency','staff','ot','endo','bill','billin','lab')"; 
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

div2 {
  height: 50px;
  width: 25%;
  border: 1px solid #4CAF50;
  float: right;
  
  
  div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}

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


#myInput1 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}


#myInput2 {
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
  padding: 5px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
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
   
 

   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Last 2 Day's Notification</p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>

<p align="right"><div2><input style="background-color: lightgreen;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Doctor Name.." title="Type in a Discipline">
</div2></p>

<form action="" method="GET">
<table border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" id="myTable">

    <tr>
<th width="4%"><strong>S.No</strong></th>
      <th width="20%"><strong>Note Type</strong></th>
	  <th width="20%"><strong>Note By</strong></th>
	  <th width="20%"><strong>MRN</strong></th>
      <th width="46%"><strong>Note Time</strong></th>
	  <th width="10%"><strong>Details</strong></th>
      
	   </tr>
  </thead>
  <tbody>
  
   
	<?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date1= date('Y-m-d 23:59:59');
$date=date('Y-m-d 00:00:00', strtotime('-2 days'));

//echo $date1= date('Y-m-d 23:59:59',strtotime('-2 days', strtotime('Y-m-d 23:59:59')));
$count=1;
$sel_query="Select * from noti where add_time between '$date' and '$date1' order by id desc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><span style='color:red;text-align:center;font-size:20px'><b><?php echo $count; ?></td>
      <td align="center"><span style='color:red;text-align:center;font-size:20px'><b><?php echo $row["type"]; ?></td>
	   <td align="center"><span style='color:red;text-align:center;font-size:20px'><b><?php echo $row["add_by"]; ?></td>
	     <td align="center"><span style='color:red;text-align:center;font-size:20px'><b><?php echo $row["pmrn"]; ?></td>
	
	
	  <td align="center"><span style='color:red;text-align:center;font-size:20px'><b><?php echo $row["add_time"]; ?></td>
	
	
	  
	   <td align="center" colspan="1">
	   <?php if($row['type']=='Consultant Note'){echo'
	   
	   <a target="_blank" href="imoidocnotedoc?pmrn='.$row["pmrn"].'&eid='.$row['eid'].'">Details</a>';}
	   
	   else if($row['type']=='Handover Note'){
		   echo
		   '<a target="_blank" href="mo_pwl?pmrn='.$row["pmrn"].'&eid='.$row['eid'].'">Details</a>';
	   }?>
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

