<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','rad','mng','outdoc')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 30; URL=$url1");
 $test=date('Y-m-d', strtotime('-3 days') );
 $test1=date('Y-m-d');
 
 $tt=$_SERVER['HTTP_HOST']	;
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
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm this Request ?");
}

</script>

</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='outside_doc'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>







<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 


								
					
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
	  <th width="4%"><strong>Report Date</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
	        <th width="14%"><strong>MRN</strong> 
      <th width="10%"><strong>Referred By</strong></th>
	  <th width="10%"><strong>Investigation Name</strong></th>
	  <th width="10%"><strong>Report By</strong></th>
	 
	  <th width="14%"><strong>PACS VIEW</strong>
	        <th width="14%"><strong>Edit REPORT</strong>
	  



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
$rr1= date('Y-m-d');

$count=1;

$sel_query="Select * from radreport where status= 'SEEN' and rdate between '$test' and '$rr1' and dname='$full' ORDER BY id desc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
     <td align="center"><?php echo $count; ?></td>
	 <td align="center"><?php echo $row["rdate"]; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["dreffer"]; ?>
      <td align="center"><?php echo $row["type"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> 
<?php	  $date=$row["dname"] ;?>


	  	 
        
		   
	  	 	  <td align="center">
<?php
$ac_no=$row["ac_no"];
$ppr=$row["pmrn"];
if($tt=='192.168.100.252:8081')
{echo'

<form target="_blank" action="https://192.168.100.202:443/PACSAPI/Launch_Viewer?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$ac_no.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
</form>';}

else
	
	{
		echo'<form target="_blank" action="https://182.160.124.36:443/PACSAPI/Launch_Viewer?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$ac_no.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
</form>';
		
	}

?>


		   </td>
		   
		  	  <td align="center"><a target='_blank' href="radpreedit_out.php?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&type1=<?php echo $row['type1']; ?>">EDIT</a></td>


	       
	 
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>

<br><br>





</body>

</html>
