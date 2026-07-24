<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('bill','billin')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');
//include("auth.php");
$d1 =date('m');
$d2 =date('Y');
$d3=date($d2.'-'.$d1.'-'.'01');
$d4=date($d2.'-'.$d1.'-'.'31');
$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

$query498 = "SELECT bfigure, SUM(bfigure) FROM preadm where aldate between '$d3' and '$d4';";
	 
$result498 = mysqli_query($dbhandle,$query498) or die(mysql_error());

// Print out result
$row498 = mysqli_fetch_array($result498);


$query499 = "SELECT bfigure, SUM(bfigure) FROM endopapp where aldate between '$d3' and '$d4';";
	 
$result499 = mysqli_query($dbhandle,$query499) or die(mysql_error());

// Print out result
$row499 = mysqli_fetch_array($result499);


//echo $yy=cal_days_in_month(calendar,month,year);



$queryd = "SELECT * FROM ddf where mon= '$d1' and  year='$d2' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$amount=$rowd['amount'];



$test4= $row498['SUM(bfigure)'] + $row499['SUM(bfigure)'];

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




</head>


<body>

<div id='cssmenu'>
<ul>
   <li><a href='edischarge3'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='esearch'><span>Patient Search By MRN</span></a>         </li>
         <li class='has-sub'><a href='eadm'><span>New Patient</span></a>         </li>
      </ul>
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">WELCOME TO PATIENT'S SEARCH PANEL FOR ADMISSION </p> 


<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr> 
<td colspan="2"><select name="select" required/>
	  <option value=''>-Select Option-</option>
	  <option value='phone'>PHONE</option>
	  <option value='MRN'>MRN</option>
	  </select></td>

<td colspan="3"><input type="text" name="search"placeholder="ENTER PHONE NO OR MRN"></td>

<td colspan="3"><button type="submit" name="bsearch">Search</button></td>
</tr>

    <tr>
      <td colspan="1"align="center"><strong>S.No</strong></td>
      <td colspan="1"align="center"><strong>Patient's Name</strong></td>
      <td colspan="1"align="center"><strong>MRN</strong></td>
      <td colspan="1"align="center"><strong>EID </strong></td>
      <td colspan="2"align="center"><strong>Address</strong></td> 
<td colspan="1"align="center"><strong>Phone</strong></td> 	  
      <td colspan="1"align="center"><strong>Doctor Name</strong></td>
	  <td colspan="1"align="center"><strong>Phone</strong></td>
	  <td colspan="1"align="center"><strong>Location</strong></td>
      <td colspan="1"align="center"><strong>History</strong></td>
	  <td colspan="1"align="center"><strong>GO</strong></td>

	   </tr>
  
  <tbody>
  
    <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["search"];
//$id=$_REQUEST["id"];
if (($_POST['select'])=="phone"){


$sel_query="Select * from preadm where pphone= '$pmrn' order by id desc;";}
 else{
	 $sel_query="Select * from preadm where pmrn= '$pmrn' order by id desc;";
 } 
$count=1;	 
$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td colspan="1" align="center"><?php echo $count; ?></td>
      <td colspan="1"align="center"><?php echo $row["pname"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["pmrn"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["eid"]; ?> </td> 
      <td colspan="2"align="center"><?php echo $row["padd"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["pphone"]; ?> </td>
	  <td colspan="1"align="center"><?php echo $row["anew"]; ?> </td>
	  <td colspan="1"align="center"><?php echo $row["dname"]; ?> </td>
	  <td colspan="1"align="center"><?php echo "Inpatient"; ?> </td>
<td align="center"><a href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>">History</a></td>
	 


<?php 
	  
	  $pmrn4=$row['pmrn'];
	  $id4=$row['id'];
	  $eid4=$row['eid'];
	  
	  $url4="ddmanualbill1_manual?pmrn=$pmrn4&id=$id4&eid=$eid4";
	  ?>
	  
	  
	  <td align="center"><?php if($test4<$amount){echo"<a onclick='return confirm_click();' href='$url4'><strong>GO</strong></a>";} else {echo 'Allocation Amount Exceeded for the Month';}?></td>
	  
      </tr>
    <?php $count++; } }?>
	
	
	
	
	<?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["search"];
//$id=$_REQUEST["id"];
if (($_POST['select'])=="phone"){


$sel_query="Select * from endopapp where pphone= '$pmrn' order by id desc;";}
 else{
	 $sel_query="Select * from endopapp where pmrn= '$pmrn'  order by id desc;";
 } 
$count=1;	 
$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td colspan="1" align="center"><?php echo $count; ?></td>
      <td colspan="1"align="center"><?php echo $row["pname"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["pmrn"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["eid"]; ?> </td> 
      <td colspan="2"align="center"><?php echo $row["padd"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["pphone"]; ?> </td>
	  <td colspan="1"align="center"><?php echo $row["adate"]; ?> </td>
	  <td colspan="1"align="center"><?php echo $row["dreffer"]; ?> </td>
	  <td colspan="1"align="center"><?php echo "Endoscopy"; ?> </td>
	  <td align="center"><a href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>">History</a></td>
	  

	  <?php 
	  
	  $pmrn4=$row['pmrn'];
	  $id4=$row['ID'];
	  
	  
	  $url4="ddmanualbill1endodoc_manual?pmrn=$pmrn4&id=$id4";
	  ?>
	  
	  
	  <td align="center"><?php if($test4<$amount){echo"<a onclick='return confirm_click();' href='$url4'><strong>GO</strong></a>";} else {echo 'Allocation Amount Exceeded for the Month';}?></td>


      </tr>
    <?php $count++; } }?>
  </tbody>
</table>
</form>

</body>

</html>
