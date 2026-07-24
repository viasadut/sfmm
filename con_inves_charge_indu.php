<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','lab','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }

	$user=$_SESSION['sess_username'];
	$query39 = "SELECT * FROM user where uname= '$user'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full=$row39['fullname'];
	
	?>

<?php
require('db1.php');
if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];

$query43 = "SELECT SUM(price) FROM alltest where billdate BETWEEN '$start' and '$end' and status in ('RECEIVED','DONE') and dname='$bt' and type in('lab','LAB','Lab','RAD','Rad','rad');"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$query44 = "SELECT SUM(price) FROM iinves where status in ('RECEIVED','DONE') and dname='$bt' and type in('lab','LAB','Lab','RAD','Rad','rad') and dis_date between '$start' and '$end';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);


$query45 = "SELECT SUM(price) FROM einves where ndate BETWEEN '$start' and '$end' and status in ('RECEIVED','DONE') and dname='$bt' and type in('lab','LAB','Lab','RAD','Rad','rad');"; 
	 
$result45 = mysqli_query($con, $query45) or die(mysqli_error());
$row45 = mysqli_fetch_assoc($result45);




$query43r = "SELECT COUNT(medi) FROM alltest where billdate BETWEEN '$start' and '$end' and type in('lab','LAB','Lab','RAD','Rad','rad') and rstatus='RECEIVED' and dname !='Outside Referral';"; 
	 
$result43r = mysqli_query($con, $query43r) or die(mysqli_error());
$row43r = mysqli_fetch_assoc($result43r);



$query43rr = "SELECT COUNT(medi) FROM alltest where billdate BETWEEN '$start' and '$end' and type in('lab','LAB','Lab','RAD','Rad','rad') and rstatus='RECEIVED' and dname ='Outside Referral';"; 
	 
$result43rr = mysqli_query($con, $query43rr) or die(mysqli_error());
$row43rr = mysqli_fetch_assoc($result43rr);


$query44r = "SELECT COUNT(infusion) FROM iinves where dis_date BETWEEN '$start' and '$end' and type in('lab','LAB','Lab','RAD','Rad','rad') and rstatus='RECEIVED' and dis_date between '$start' and '$end';"; 
	 
$result44r = mysqli_query($con, $query44r) or die(mysqli_error());
$row44r = mysqli_fetch_assoc($result44r);


$query45r = "SELECT COUNT(infusion) FROM einves where ndate BETWEEN '$start' and '$end' and type in('lab','LAB','Lab','RAD','Rad','rad') and rstatus='RECEIVED';"; 
	 
$result45r = mysqli_query($con, $query45r) or die(mysqli_error());
$row45r = mysqli_fetch_assoc($result45r);
$rr=$row43r['COUNT(medi)'] +$row43rr['COUNT(medi)'] + $row44r['COUNT(infusion)']+ $row45r['COUNT(infusion)'];

}

?>



<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>




<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/




?>

<!DOCTYPE html>
<html>
 <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /* Stephonce R. MOrris | 2014 */

html { box-sizing: border-box; }

*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito',sans-serif;
  color: #384047;
  background: #A085C6;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
  border: 1px solid #8265B0;
  box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}

input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 50px;
  border-radius: 2px;
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
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #A085C6;
  /*#5fcf80*/
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

abbr[title] {
	border-bottom-width: 0;
}


@media screen and (min-width: 480px) {

  form {
    max-width: 1200px;
  }

}
      </style>

    <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

 <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>

 <script>
  $(document).ready(function() {
    $("#datepicker2").datepicker();
  });
  </script>

  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
</head>

<body>




<div id='cssmenu'>
<ul>
   <li><a href='viewnew11'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='prescription/prescription/viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
  
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


<h1 align="center">Lab Investigation Request stats</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td colspan="2"><label><strong>Select Start Date:</strong></label></td>
						<td colspan="2"><label><strong>Select End Date:</strong></label></td>	

							<td colspan="3"><label><strong> Select Investigation</strong></label></td> 
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="2"><input type="date" name="stdate"  placeholder="Select Date" size="15"></td>  
					 <td colspan="2"><input type="date" name="endate"  placeholder="Select Date" size="15"></td>  
					<td colspan="3"><select name="bt" readonly>
        
						<option value='<?php echo $full;?>'><?php echo $full;?></option>
						
			
						
				
</select></td>  
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
	  <th width="14%"><strong>Date</strong></th>
      <th width="17%"><strong>Request By</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Patient Name</strong>
      <th width="14%"><strong>Investigation</strong>  
<th width="14%"><strong>Price</strong>  	  
      

	   </tr>
  </thead>
  <tbody>

  
     <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];

$income=$row43['SUM(price)'] + $row44['SUM(price)']+ $row45['SUM(price)'];
$pay=$income*.05;

echo "<font color=blue font size=5> Total Record found in the search  -";

	 
	 
	 

echo "   OPD-  ";	 
echo $row43['SUM(price)'];


echo " ,  IPD-  ";	 
echo $row44['SUM(price)'];

echo " ,  A&E-  ";	 
echo $row45['SUM(price)'];
echo " ,  ";

echo "<font color=red font size=6> TOTAL  -  ";	 
echo $income;



echo " <br> ";	 	 
echo "<font color=blue font size=5>From  ";
echo $start;
echo "  To  ";
echo $end;

echo"<br>";
echo "<font color=green font size=6> Payable  -  ";	 
echo $pay;
echo"<br>";

echo '<font color=red font size=4 font weight=bold> NOTE: If Any Discrepancy OR Mismatch Found Kindly communicate With Madam CFO (01810008053) directly to get further explanation ';
echo '<br><font color=red font size=4 font weight=bold> The Price is without TAX and Discount';

echo'
<tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold;color:red;"><b>OPD<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>';
	



$count=1;

$sel_query1="Select * from alltest where billdate BETWEEN '$start' and '$end' and status in ('RECEIVED','DONE') and dname='$bt' and type in('lab','LAB','Lab','RAD','Rad','rad') order by type asc";
 

//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result1 = mysqli_query($con,$sel_query1);

while($row1 = mysqli_fetch_assoc($result1)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo date('d/m/Y',strtotime($row1["billdate"])); ?></td>
	  <td align="center"><?php echo $row1["dname"]; ?></td>
      <td align="center"><?php echo $row1["pmrn"]; ?>
	  <td align="center"><?php echo $row1["pname"]; ?>
      <td align="center"><?php echo $row1["medi"]; ?>
        <td align="center"><?php echo $row1["price"]; ?>
	  
      </tr>
	  
    <?php $count++; } ?>
	
	
	
	<tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold;color:red;"><b>Inpatient<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
	
	
	<?php
	
	$sel_query2="Select * from iinves where status in ('RECEIVED','DONE') and dname='$bt' and type in('lab','LAB','Lab','RAD','Rad','rad') and dis_date between '$start' and '$end' order by type asc";
 

//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result2 = mysqli_query($con,$sel_query2);

while($row2 = mysqli_fetch_assoc($result2)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo date('d/m/Y',strtotime($row2["ndate"])); ?></td>
	  <td align="center"><?php echo $row2["dname"]; ?></td>
      <td align="center"><?php echo $row2["pmrn"]; ?>
	  <td align="center"><?php echo $row2["pname"]; ?>
      <td align="center"><?php echo $row2["infusion"]; ?>
	  <td align="center"><?php echo $row2["price"]; ?>
        
	  
      </tr>
	  
    <?php $count++; }?>
	
	
	
	<tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold;color:red;"><b>Emergency<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
	
	
	
	<?php
	$sel_query3="Select * from einves where ndate BETWEEN '$start' and '$end' and status in ('RECEIVED','DONE') and dname='$bt' and type in('lab','LAB','Lab','RAD','Rad','rad') order by type asc";
 
$count=1;
//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result3 = mysqli_query($con,$sel_query3);

while($row3 = mysqli_fetch_assoc($result3)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo date('d/m/Y',strtotime($row3["ndate"])); ?></td>
	  <td align="center"><?php echo $row3["dname"]; ?></td>
      <td align="center"><?php echo $row3["pmrn"]; ?>
	  <td align="center"><?php echo $row3["pname"]; ?>
      <td align="center"><?php echo $row3["infusion"]; ?>
	  <td align="center"><?php echo $row3["price"]; ?>
        
	  
      </tr>
	  
    <?php $count++; } }?>
	
	


	


      
  </tbody>
</table>


</form>
</body>
</html>
