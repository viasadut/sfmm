<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('lab','mrd')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php
require('db1.php');
if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];

$query43 = "SELECT COUNT(medi) FROM alltest where medi= '$bt'and date1 BETWEEN '$start' and '$end' and billstatus='Billed' and result!='';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$query44 = "SELECT COUNT(infusion) FROM iinves where infusion= '$bt'and ndate BETWEEN '$start' and '$end' and result!='';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);


$query45 = "SELECT COUNT(infusion) FROM einves where infusion= '$bt'and odate BETWEEN '$start' and '$end' and result!='';"; 
	 
$result45 = mysqli_query($con, $query45) or die(mysqli_error());
$row45 = mysqli_fetch_assoc($result45);





$query43p = "SELECT COUNT(medi) FROM alltest where medi= '$bt'and date1 BETWEEN '$start' and '$end' and billstatus='Billed' and result!='' and result LIKE '%Positive%';"; 
	 
$result43p = mysqli_query($con, $query43p) or die(mysqli_error());
$row43p = mysqli_fetch_assoc($result43p);

$query44p = "SELECT COUNT(infusion) FROM iinves where infusion= '$bt'and ndate BETWEEN '$start' and '$end' and result!='' and result LIKE '%Positive%';"; 
	 
$result44p = mysqli_query($con, $query44p) or die(mysqli_error());
$row44p = mysqli_fetch_assoc($result44p);


$query45p = "SELECT COUNT(infusion) FROM einves where infusion= '$bt'and odate BETWEEN '$start' and '$end' and result!='' and result LIKE '%Positive%';"; 
	 
$result45p = mysqli_query($con, $query45p) or die(mysqli_error());
$row45p = mysqli_fetch_assoc($result45p);



$query43n = "SELECT COUNT(medi) FROM alltest where medi= '$bt'and date1 BETWEEN '$start' and '$end' and billstatus='Billed' and result!='' and result LIKE '%Negative%';"; 
	 
$result43n = mysqli_query($con, $query43n) or die(mysqli_error());
$row43n = mysqli_fetch_assoc($result43n);

$query44n = "SELECT COUNT(infusion) FROM iinves where infusion= '$bt'and ndate BETWEEN '$start' and '$end' and result!='' and result LIKE '%Negative%';"; 
	 
$result44n = mysqli_query($con, $query44n) or die(mysqli_error());
$row44n = mysqli_fetch_assoc($result44n);


$query45n = "SELECT COUNT(infusion) FROM einves where infusion= '$bt'and odate BETWEEN '$start' and '$end' and result!='' and result LIKE '%Negative%';"; 
	 
$result45n = mysqli_query($con, $query45n) or die(mysqli_error());
$row45n = mysqli_fetch_assoc($result45n);


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
   <li><a href='homemng'><span>Home</span></a></li>
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
						
             		
					 
			    	 <td colspan="2"><input type="text" name="stdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td colspan="2"><input type="text" name="endate" id="datepicker2" placeholder="Select Date" size="15"></td>  
					 <td colspan="3">
        <input list="browsers111" name="bt"  size="80"  style="text-transform:uppercase"required/>
  <datalist id="browsers111">
						
						
						<option value=''>-Select-</option>
						<option value='all'>ALL</option>
						<?php 
			$sql = "select * from `radio` where type='lab'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->iname."'>".$row->iname."</option>";
				}
			}
			?>
						
				
</datalist></td>  
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Request By</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Patient Name</strong>
      <th width="14%"><strong>Investigation</strong>   
      

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


echo "<font color=blue font size=5> Total Record found in the search  -";

	 
	 
	 

echo "   OPD-  ";	 
echo $row43['COUNT(medi)'];

echo " ,  IPD-  ";	 
echo $row44['COUNT(infusion)'];

echo " ,  A&E-  ";	 
echo $row45['COUNT(infusion)'];
echo " ,  ";

echo "<font color=red font size=6> TOTAL  -  ";	 
echo $row43['COUNT(medi)'] + $row44['COUNT(infusion)']+ $row45['COUNT(infusion)'];
echo " ,  ";
echo "<font color=red font size=6> POSITIVE  -  ";	 
echo $row43p['COUNT(medi)'] + $row44p['COUNT(infusion)']+ $row45p['COUNT(infusion)'];
echo " ,  ";
echo "<font color=green font size=6> NEGATIVE  -  ";	 
echo $row43n['COUNT(medi)'] + $row44n['COUNT(infusion)']+ $row45n['COUNT(infusion)'];


echo " <br> ";	 	 
echo "<font color=blue font size=5>From  ";
echo $start;
echo "  To  ";
echo $end;
$count=1;

$sel_query1="Select * from alltest where medi='$bt' and date1 BETWEEN '$start' and '$end' and billstatus='Billed' and result!='' order by id";
 

//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result1 = mysqli_query($con,$sel_query1);

while($row1 = mysqli_fetch_assoc($result1)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row1["dname"]; ?></td>
      <td align="center"><?php echo $row1["pmrn"]; ?></td>
	  <td align="center"><?php echo $row1["pname"]; ?></td>
      <td align="center"><?php echo $row1["medi"]; ?></td>
	  <td align="center">
	  
	  <?php if($row1["result"] == 'Positive')
	  {echo"<span style='color:red;font-weight:bold'>".$row1["result"]."</span>";} else
{echo"<span style='color:green;font-weight:bold'>".$row1["result"]."</span>";}	?>
	  
	  </td>
        
	  
      </tr>
	  
    <?php $count++; } ?>
	
	
	
	<?php
	
	$sel_query2="Select * from iinves where infusion='$bt' and ndate BETWEEN '$start' and '$end' and result!='' order by id";
 

//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result2 = mysqli_query($con,$sel_query2);

while($row2 = mysqli_fetch_assoc($result2)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row2["user"]; ?></td>
      <td align="center"><?php echo $row2["pmrn"]; ?></td>
	  <td align="center"><?php echo $row2["pname"]; ?></td>
      <td align="center"><?php echo $row2["infusion"]; ?></td>
	  <td align="center">
	  
	  <?php if($row2["result"]=='%Positive%')
	  {echo"<span style='color:red;font-weight:bold'>".$row2["result"]."</span>";} else
{echo"<span style='color:green;font-weight:bold'>".$row2["result"]."</span>";}	?>
	  
	  </td>
        
	  
      </tr>
	  
    <?php $count++; }?>
	
	<?php
	$sel_query3="Select * from einves where infusion='$bt' and odate BETWEEN '$start' and '$end' and result!='' order by id";
 
$count=1;
//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result3 = mysqli_query($con,$sel_query3);

while($row3 = mysqli_fetch_assoc($result3)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row3["user"]; ?></td>
      <td align="center"><?php echo $row3["pmrn"]; ?></td>
	  <td align="center"><?php echo $row3["pname"]; ?></td>
      <td align="center"><?php echo $row3["infusion"]; ?></td>
	  <td align="center"><?php if($row3["result"]=="%Positive%")
	  {echo"<span style='color:red;font-weight:bold'>".$row3["result"]."</span>";} else
{echo"<span style='color:green;font-weight:bold'>".$row3["result"]."</span>";}	?>	  
	  
	  
	  </td>
        
	  
      </tr>
	  
    <?php $count++; } }?>
	
	
	


      <td colspan="10" align="right"><a target='_blank' href="pptt1?dname=<?php echo "$bt";?>&date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
  </tbody>
</table>


</form>
</body>
</html>
