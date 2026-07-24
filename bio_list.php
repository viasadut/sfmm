<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('store','staff','ot','nurse','imo','mofficer','emergency','mng','lab','rad')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 20; URL=$url1");

?>



<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

$query3 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$dept=$row3['dept'];
$cat=$row3['cat'];
$dd=$row3['dept'];
$dd1=$row3['subdept'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Reports</title>
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
  height: 50px;
  width: 20%;
  border: 1px solid #4CAF50;
  float: right;
  
}
button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  height: 5%
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
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

</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='histohome'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>







<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<p align="right"><div1><input style="background-color: lightblue;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Asset Name.." title="Type in a Discipline">
</div1></p>
<p><div1><input style="background-color: lightgreen;" type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search by Current Location.." title="Type in a Discipline">
</div1>

</p>

<form action="" method="Post">

								
					
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" id="myTable">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>MSNO</strong></th>
	  <th width="17%"><strong>ID</strong></th>
      <th width="10%"><strong>Equipment Name</strong></th>
	  <th width="17%"><strong>VA</strong></th>
	  <th width="10%"><strong>Chargeable Name</strong></th>
	  <th width="17%"><strong>Add BY</strong></th>
	  <th width="17%"><strong>Serial No</strong></th>
      <th width="15%"><strong>Current Location</strong>
	  <th width="15%"><strong>Stakeholder</strong>
      <th width="14%"><strong>Asset TAG</strong> 
      <th width="14%"><strong>Vendor</strong>
      <th width="14%"><strong>Model</strong>  
      <th width="14%"><strong>Transfer to</strong>
	  <th width="14%"><strong>Edit</strong>
	  <th width="14%"><strong>Send For Servecing</strong>
	  <th width="14%"><strong>Feedback</strong>
	  <th width="14%"><strong>Maintenance Note</strong>
	  
	  
	  
	        
	  



	   </tr>
  </thead>
  <tbody>
  
    
	
	
	
		<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from storenew where trans_to in ('$dd') and etype='Asset' ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Today's Unseen Patients";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  <td align="center"><?php echo $row["msno"]; ?></td>
      <td align="center"><a target='_blank' href="materialhistory1.php?eid=<?php echo $row['id']; ?>"><?php echo $row["id"]; ?></a> </td>
      <td align="center"><a target='_blank' href="transfer_his.php?eid=<?php echo $row['id']; ?>"><?php echo $row["ename1"]; ?></a> </td>
	  <td align="center"><a target='_blank' href="all_asset_list_indu.php?ename1=<?php echo $row['ename1']; ?>"><img src="eye.png" title="Print Report" width="30" height="15" /></a></td>
	  
      <td align="center"><?php echo $row["ename"]; ?></td>
	  <?php
	   $dn = $row['aby'];
$query40 = "SELECT * FROM staff3 where sid= '$dn'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);
$ss=$row40['sname'];

   ?>
	  
	  <td align="center"><?php echo $ss; ?></td>
	  <td align="center"><?php echo $row["serialno"]; ?></td>
	  
	  <td align="center"><?php echo $row["trans_to"]; ?>
      <td align="center"><?php echo $row['elocation_s'];?>
      
	  <td align="center"><?php echo $row["supplier"]; ?>
	  <td align="center"><?php echo $row["warrenty"]; ?>
	  <td align="center"><?php echo $row["p_by"]; ?>
	  	  

		  <?php		 
				 
		$id=$row["id"];
		//$status=$row["status"];
		$tt=$row['trans_to'];
		$a_by=$row['aby'];
		$es=$row['elocation_s'];
		$url = "transfer_to?id=$id"; 
		$url2 = "dmsend?id=$id"; 
		$url3 = "dmsendbio1?id=$id"; 
		$url4 = "dmsendbio12?id=$id"; 
		$url5 = "asset_edit?id=$id"; 
				 
				 
				 ?>
		  
	        <td align="center">
			<?php if($tt==$dd or $tt==$dd1)
			
		
			{ 
echo "<a href='$url'>Transfer To</a>";

	}
	
	else if($tt=='')
			
		
			{ 
echo "<a href='$url'>Transfer To</a>";

	}
	
	else
	{ 
echo "";	

	}
?>
			
			
			
			</td>	
				        
<td align="center">
<?php if($a_by==$fullname)
			
		
			{ 
echo "<a href='$url5'>Edit</a>";

	}
	
	else
	{ 
echo "";	

	}
?>



</td>  

	       
 <td align="center">
 
 		<?php if($tt==$dd or $tt=$dd1)
			
		
			{ 
echo "<a href='$url2'>Send For Servecing</a>";

	}
	
	else
	{ 
echo "";	

	}
?>
 
 
 
 
 
 
 </td>	

<td align="center">


<?php if($es==$dd or $es==$dd1 and $row['status']=='Not Functioning')
			
		
			{ 
echo "<a href='$url3'>Give Feedback</a>";

	}
	
	else
	{ 
echo "";	

	}
?>







</td>	

 <td>
 
 
 <?php if($es==$dd or $es=$dd1)
			
		
			{ 
echo "<a href='$url4'>Maintenance Note</a>";



	}
	
	else
	{ 
echo "";	

	}
?>
 

 
 
 
 
 </td>	

	  
      </tr>
    <?php $count++; } ?>

	
	
	
			<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from storenew where elocation_s='$dd' and etype='Asset' ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Today's Unseen Patients";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  <td align="center"><?php echo $row["msno"]; ?></td>
     <td align="center"><a target='_blank' href="materialhistory1.php?eid=<?php echo $row['id']; ?>"><?php echo $row["id"]; ?></a> </td>
      <td align="center"><a target='_blank' href="transfer_his.php?eid=<?php echo $row['id']; ?>"><?php echo $row["ename1"]; ?></a> </td>
	  <td align="center"><a target='_blank' href="all_asset_list_indu.php?ename1=<?php echo $row['ename1']; ?>"><img src="eye.png" title="Print Report" width="30" height="15" /></a></td>
	  
      <td align="center"><?php echo $row["ename"]; ?></td>
	  	  <?php
	   $dn = $row['aby'];
$query40 = "SELECT * FROM staff3 where sid= '$dn'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);
$ss=$row40['sname'];

   ?>
	  
	  <td align="center"><?php echo $ss; ?></td>
	  <td align="center"><?php echo $row["serialno"]; ?></td>
	  
      <td align="center"><?php if($row['trans_to']==''){echo $row['elocation_s'];} else {echo $row["trans_to"];} ?>
      
	  <td align="center"><?php echo $row["supplier"]; ?>
	  <td align="center"><?php echo $row["warrenty"]; ?>
	  <td align="center"><?php echo $row["p_by"]; ?>
	  	  

		  <?php		 
				 
		$id=$row["id"];
		//$status=$row["status"];
		$tt=$row['trans_to'];
		$es=$row['elocation_s'];
		$url = "transfer_to?id=$id"; 
		$url2 = "dmsend?id=$id"; 
		$url3 = "dmsendbio1?id=$id"; 
		$url4 = "dmsendbio12?id=$id"; 
		$url5 = "asset_edit?id=$id"; 
		$a_by=$row['aby'];		 
				 
				 ?>
		  
	        <td align="center">
			<?php if($tt==$dd or $tt==$dd1)
			
		
			{ 
echo "<a href='$url'>Transfer To</a>";

	}
	
	else if($tt=='')
			
		
			{ 
echo "<a href='$url'>Transfer To</a>";

	}
	
	else
	{ 
echo "";	

	}
?>
			
			
			
			</td>	
				        
<td align="center">
<?php if($es==$dd)
			
		
			{ 
echo "<a href='$url5'>Edit</a>";

	}
	
	else
	{ 
echo "";	

	}
?>



</td>  

	       
 <td align="center">
 
 		<?php if($tt==$dd or $tt=$dd1)
			
		
			{ 
echo "<a href='$url2'>Send For Servecing</a>";

	}
	
	else
	{ 
echo "";	

	}
?>
 
 
 
 
 
 
 </td>	

<td align="center">


<?php if($es==$dd or $es==$dd1 and $row['status']=='Not Functioning')
			
		
			{ 
echo "<a href='$url3'>Give Feedback</a>";

	}
	
	else
	{ 
echo "";	

	}
?>







</td>	

 <td>
 
 
 <?php if($es==$dd or $es=$dd1)
			
		
			{ 
echo "<a href='$url4'>Maintenance Note</a>";



	}
	
	else
	{ 
echo "";	

	}
?>
 

 
 
 
 
 </td>	
 

 <td align="center"><a target='_blank' href="asset_upload.php?id=<?php echo $row['id']; ?>">Upload Photo</a></td>
      </tr>
    <?php $count++; } ?>

  </tbody>
</table>

<br><br>


</form>


<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
	td = tr[i].getElementsByTagName("td")[3];
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


<script>
function myFunction1() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
	td = tr[i].getElementsByTagName("td")[8];
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
