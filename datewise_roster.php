<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff','emergency','lab','imo','mofficer','nurse')"; 
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
$date = $_REQUEST['date'];

$query3 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row7 = mysqli_fetch_array($result3);
$dept=$row7['dept'];


?>

<?php

require('db1.php');

$user=$_SESSION['sess_username'];


$loc=$_REQUEST['loc'];
$date3=$_REQUEST['date'];
$id=$_REQUEST['id'];
$id1=$_REQUEST['id1'];

//$dreffer=$_REQUEST['dreffer'];
//$dname1=$_REQUEST['dname1'];






$query = "SELECT * from roaster where id='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row_r = mysqli_fetch_assoc($result);
$ddate=$row_r['date'];
$ddate1=date('d/m/Y h:i:s');
  
?>


<?php
 
require('db1.php');

if(isset($_POST['Submit']))
{
$loc=$_REQUEST['loc'];	
$pbp1 = implode(",",$_POST["pbp1"]);
$pbp1_1 = implode(",",$_POST["pbp1_1"]);
$pbp1_2 = implode(",",$_POST["pbp1_2"]);
$pbp1_3 = implode(",",$_POST["pbp1_3"]);
$pbp1_4 = implode(",",$_POST["pbp1_4"]);
$pbp1_5 = implode(",",$_POST["pbp1_5"]);
$pbp1_6 = implode(",",$_POST["pbp1_6"]);
$pbp1_7 = implode(",",$_POST["pbp1_7"]);
	  
/*$sel="SELECT * FROM alltest where pmrn= '$pmrn' and type='spd1' and medi='ECHO IMAGING' and status='' and date1='$datenew';"; 
$result = mysqli_query($con,$sel);

if($res3=mysqli_num_rows($result)>0)
{
 	
    echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!The patient Already Have pending Echo Request"); ';
    echo '</script>';
    }

else {*/


$query = " insert into roaster_1 (`emor`,`mor`,`late`,`night`,`aby`,`location`,`dept`,`date`,`adate`) values 
('$pbp1_3','$pbp1','$pbp1_1','$pbp1_2','$user','$loc','Nursing','$date3','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
           $message = 'Data Updated';  

		   
//$update="update ecgapp set status='SEEN' where `id`='$id'";
//mysqli_query($con,$update);



	  
	  
$treat=explode(',',$pbp1);
$treat1=explode(',',$pbp1_1);
$treat2=explode(',',$pbp1_2);
$treat3=explode(',',$pbp1_3);
$treat4=explode(',',$pbp1_4);
$treat5=explode(',',$pbp1_5);
$treat6=explode(',',$pbp1_6);
$treat7=explode(',',$pbp1_7);






if($pbp1_3!='')
{
foreach ($treat3 as $item3) {
	    $item3 = trim($item3);
		
		
		
		
$queryem = "SELECT COUNT(mor) FROM roaster_2 where date ='$date3' and mor='$item3' and emor='Office Duty'"; 
$resultem = mysqli_query($con, $queryem) or die(mysqli_error());
$rowem = mysqli_fetch_array($resultem);
$c1em=$rowem['COUNT(mor)'];


if($c1em>0)
      
{
 	
       
    }
		else {
		$query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`) values 
('Office Duty','$item3','$user','$loc','$dept','$date3','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
		}
}


}

if($pbp1_4!='')
{

foreach ($treat4 as $item4) {
	    $item4 = trim($item4);
		
		
		
		
$queryem4 = "SELECT COUNT(mor) FROM roaster_2 where date ='$date3' and mor='$item4' and emor='24 Hour Duty'"; 
$resultem4 = mysqli_query($con, $queryem4) or die(mysqli_error());
$rowem4 = mysqli_fetch_array($resultem4);
$c1em4=$rowem4['COUNT(mor)'];


if($c1em4>0)
      
{
 	
       
    }
		else {
		$query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`) values 
('24 Hour Duty','$item4','$user','$loc','$dept','$date3','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
		}
}

}

if($pbp1_5!='')
{


foreach ($treat5 as $item5) {
	    $item5 = trim($item5);
		
		
		
		
$queryem5 = "SELECT COUNT(mor) FROM roaster_2 where date ='$date3' and mor='$item5' and emor='24 Hour On-Call'"; 
$resultem5 = mysqli_query($con, $queryem5) or die(mysqli_error());
$rowem5 = mysqli_fetch_array($resultem5);
$c1em5=$rowem5['COUNT(mor)'];


if($c1em5>0)
      
{
 	
       
    }
		else {
		$query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`) values 
('24 Hour On-Call','$item5','$user','$loc','$dept','$date3','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
		}
}
}

if($pbp1_6!='')
{

foreach ($treat6 as $item6) {
	    $item6 = trim($item6);
		
		
		
		
$queryem6 = "SELECT COUNT(mor) FROM roaster_2 where date ='$date3' and mor='$item5' and emor='Off'"; 
$resultem6 = mysqli_query($con, $queryem6) or die(mysqli_error());
$rowem6 = mysqli_fetch_array($resultem6);
$c1em6=$rowem6['COUNT(mor)'];


if($c1em6>0)
      
{
 	
       
    }
		else {
		$query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`) values 
('Off','$item6','$user','$loc','$dept','$date3','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
		}
}


}

if($pbp1!='')
{



foreach ($treat as $item) {
	    $item = trim($item);
		
		
		
		
$querycz = "SELECT COUNT(mor) FROM roaster_2 where date ='$date3' and mor='$item' and emor='Morning'"; 
$resultcz = mysqli_query($con, $querycz) or die(mysqli_error());
$rowcz = mysqli_fetch_array($resultcz);
$c1z=$rowcz['COUNT(mor)'];


if($c1z>0)
      
{
 	
       
    }
		else {
		$query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`) values 
('Morning','$item','$user','$loc','$dept','$date3','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
		}
}
}


if($pbp1_7!='')
{
foreach ($treat7 as $item7) {
	    $item7 = trim($item7);
		
		
		
		
$queryem = "SELECT COUNT(mor) FROM roaster_2 where date ='$date3' and mor='$item3' and emor='Night Off'"; 
$resultem = mysqli_query($con, $queryem) or die(mysqli_error());
$rowem = mysqli_fetch_array($resultem);
$c1em=$rowem['COUNT(mor)'];


if($c1em>0)
      
{
 	
       
    }
		else {
		$query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`) values 
('Night Off','$item3','$user','$loc','$dept','$date3','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
		}
}


}





if($pbp1_1!='')
{

foreach ($treat1 as $item1) {
	    $item1 = trim($item1);
		
		
		$querycz = "SELECT COUNT(mor) FROM roaster_2 where date ='$date3' and mor='$item1' and emor='Evening'"; 
$resultcz = mysqli_query($con, $querycz) or die(mysqli_error());
$rowcz = mysqli_fetch_array($resultcz);
$c1z=$rowcz['COUNT(mor)'];


if($c1z>0)
      
{
 	
       
    }
		else {
		
		$query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`) values 
('Evening','$item1','$user','$loc','$dept','$date3','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
		}

}

}

if($pbp1_2!='')
{

foreach ($treat2 as $item2) {
	    $item2 = trim($item2);
		
		$querycz = "SELECT COUNT(mor) FROM roaster_2 where date ='$date3' and mor='$item2' and emor='Night'"; 
$resultcz = mysqli_query($con, $querycz) or die(mysqli_error());
$rowcz = mysqli_fetch_array($resultcz);
$c1z=$rowcz['COUNT(mor)'];


if($c1z>0)
      
{
 	
       
    }
		else {
		$query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`) values 
('Night','$item2','$user','$loc','$dept','$date3','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
		}

}
}

header("Location: roaster_details1?id=$id&id1=$id1");

}
?>
<?php 
$query39 = "SELECT * FROM radreport where pmrn= '$pmrn' and eid='$count1'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$dname3=$row39['dname'];

?>


<!DOCTYPE html>
<html lang="en" >

<head>
<meta charset="utf-8">
<title>Detail Roster</title>



<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->



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


img {
  border-radius: 50%;
  
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

</style>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script src="./jquery.multiselect.js"></script>
<link href="./jquery.multiselect.css" rel="stylesheet" />
   
   <script src="jsnew/pprefixfree.min.js"></script>



<style>
    @media screen and (min-width: 1280px) {
        .modal-dialog {
          max-width: 1280px; /* New width for default modal */
        }
    }
</style>
   
 
</head>


<body>

<div id='cssmenu'>
<ul>
   <li><a href='tesrad'><span>Home</span></a></li>
      <li><a href='radapp'><span>Appointment</span></a></li>
      
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='last'><a href='todayreport'><span>Today's Report</span></a></li>
		 <li class='has-sub'><a href='donereport'><span>Search Done Reports</span></a>
		 <li class='has-sub'><a href='allreport'><span>Datewise All Done Report </span></a>
            <li class='last'><a href='raddtsearch2'><span>Patients pending Report Search</span></a></li>
			<li class='last'><a href='radapp22'><span>Patients Appointment Report</span></a></li>
         </li>
		 
      </ul>
   </li>
	  <li class='last'><a href='radview1'><span>Pending Reports</span></a></li>
	  	  <li class='last'><a href='viewnewrad'><span>Search Pervious Patients</span></a></li>
		  <li class='last'><a href='rpapp22'><span>New Patients</span></a></li>
		  <li class='last'><a href='raddtsearch'><span>Patients pending request Search</span></a></li>
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center"><?php echo $row_r['date'];?></h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->


<p align="right"><div2><input style="background-color: lightblue;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Staff Name.." title="Type in a Discipline" autocomplete="on">
</div2></p>


<p align="right"><div2><input style="background-color: lightgreen;" type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search By Department Name.." title="Type in a Discipline" autocomplete="on">
</div2></p>

<p align="right"><div2><input style="background-color: lightgrey;" type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search By Location Name.." title="Type in a Discipline" autocomplete="on">
</div2></p>
		

<form action="" method="post">


<!-- Form Title -->
        

<table border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" id="myTable">


    



    <tr>
      <td width="4%" align="center"><strong>S.No</strong></td>
      <td width="10%" align="center"><strong>Date</strong></td>
      <td width="20%" align="center"><strong>Name</strong></td>
	  <td width="15%" align="center"><strong>Dept</strong></td>
      <td width="15%" align="center"><strong>Roster Type</strong></td>
	  <td width="15%" align="center"><strong>Location</strong></td>
	  
	  
      

	   </tr>
  </thead>
  <tbody>

  
     <?php
$count=1;
$sel_query="Select * from roaster_2 where emor!='Delete' and date='$date' order by dept asc;";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
	 

<?php


$name=$row['mor'];	 

	  $query9= "SELECT * FROM staff3 where sid= '$name'"; 
	 
$result9 = mysqli_query($con, $query9) or die(mysqli_error());

// Print out result
$row9 = mysqli_fetch_array($result9);

?>

	  
	  <td align="center"><?php echo $date; ?></td>      
      <td align="center"><?php echo $row9["sname"]; ?></td>
	  <td align="center"><?php echo $row["dept"]; ?>  
      <td align="center"><?php echo $row["emor"]; ?>
      <td align="center"><?php echo $row["location"]; ?>
      
      
      </tr>
	  
    <?php $count++; } ?>


      
  </tbody>
</table>
		
		

</body>

</html>
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






<script>
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
	td = tr[i].getElementsByTagName("td")[5];
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