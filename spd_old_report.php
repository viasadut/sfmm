<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="cath"){
      header('Location: login2?err=2');
    }
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
 
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
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>


<body>
<div id='cssmenu'>
<ul>
   <li><a href='tescath'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


<p align="center" class="style1">SEARCH PANEL FOR  PATIENTS RECORD</p> 


<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr> 
<td colspan="2"><select name="select" required/>
	 
	 
	  <option value='MRN'>MRN</option>
	  </select></td>

<td colspan="3"><input type="text" name="search"placeholder="ENTER PHONE NO OR MRN"></td>

<td colspan="3"><button type="submit" name="bsearch">Search</button></td>
</tr>

    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Done Date </strong>
      <th width="14%"><strong>Procedure Name</strong>   
	        
      
      <th width="14%"><strong>PRINT</strong>

	   </tr>
  
  <tbody>
  
    <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["search"];
//$id=$_REQUEST["id"];



$sel_query="Select * from ecg_test where pmrn='$pmrn' and status1 in ('Updated','Confirmed') and con_by!='' order by id desc";
 
$count=1;	 
$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

     <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	   
	  
	  

 

	  <td colspan="10"><a target='_blank' href="ecg_pdf1.php?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>&ac_no=<?php echo $row["lid"]; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  

	  
      </tr>

	<?php $count++;  }}?>

  </tbody>
</table>

</form>

</body>

</html>
