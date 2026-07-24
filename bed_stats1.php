<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','ddf')"; 
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

/*$query43 = "SELECT COUNT(bno) FROM newbed where dname= '$bt' and date1 BETWEEN '$start' and '$end' and dstatus='SEEN';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);



$query44 = "SELECT COUNT(dname) FROM presnew where date1 BETWEEN '$start' and '$end' and dstatus='SEEN';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44=mysqli_fetch_assoc($result44);
*/
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
    max-width: 1500px;
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

<h1 align="center">Bed Occupancy Stats Report</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td colspan="2"><label><strong>Select Start Date:</strong></label></td>
						<td colspan="2"><label><strong>Select End Date:</strong></label></td>	

							<td colspan="3"><label><strong> Select Bed</strong></label></td> 
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="2"><input type="text" name="stdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td colspan="2"><input type="text" name="endate" id="datepicker2" placeholder="Select Date" size="15"></td>  
					 <td colspan="3"><select name="bt">
        
						<option value=''>-Select-</option>
						<option value='all'>ALL</option>
						<?php 
			$sql = "select * from `bed` where bed_status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->bno."'>".$row->bno."</option>";
				}
			}
			?>
						
				
</select></td>  
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th style="color:lightgreen;font-size:40px;font-weight:bold"><strong>S.No</strong></th>
      <th style="color:lightgreen;font-size:40px;font-weight:bold"><strong>Bed NO</strong></th>
      <th style="color:lightgreen;font-size:40px;font-weight:bold"><strong>Days of Staying</strong></th>
      <th style="color:lightgreen;font-size:40px;font-weight:bold"><strong>Number Of Patient Admitted</strong>
	  <th style="color:lightgreen;font-size:40px;font-weight:bold"><strong>Rent</strong>
      
	  
	  
	  

	   </tr>
  </thead>
  <tbody>

  
     <?php
	 
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start1=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end1=date('Y-m-d',strtotime($_REQUEST["endate"]));

echo $start=$start1.' 00:00:00';
echo $end=$end1.' 23:59:59';
$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];


if (($_POST['bt'])=="all"){
echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $row44['COUNT(dname)'];
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;

$sel_query="Select * from bed where  bed_status='Active' order by bno asc";}
 else{
	 echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $row43['COUNT(dname)'];
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;
	 $sel_query="Select * from bed where bno='$bt'";
 } 
$count=1;
//$sel_query="Select * from presnew where dname='$bt' and date BETWEEN '$start' and '$end'";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" style="color:green;font-size:40px;font-weight:bold"><?php echo $count; ?></td>
      <td align="center" style="color:green;font-size:40px;font-weight:bold"><?php echo $row["bno"]; ?></td>
	  
	  
	      <td align="center" style="color:green;font-size:40px;font-weight:bold">
	  
	  <?php 
			
			
			$bed=$row['bno'];
			$bed_charge=$row['charge'];

			
			
			
			
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

	$query198j = "SELECT SUM(tdays) FROM newbed where bno= '$bed' and adatenew between '$start' and '$end'"; 
	 
$result198j = mysqli_query($dbhandle,$query198j) or die(mysql_error());

// Print out result
$row198j = mysqli_fetch_array($result198j);
$test1c=	$row198j['SUM(tdays)']/24;

/*$query198j = "SELECT COUNT(distinct adatenew) FROM newbed where bno= '$bed' and adatenew between '$start' and '$end'"; 
	 
$result198j = mysqli_query($dbhandle,$query198j) or die(mysql_error());

// Print out result
$row198j = mysqli_fetch_array($result198j);
$test1c=	$row198j['COUNT(distinct adatenew)'];
*/


$query1j = "SELECT COUNT(pmrn) FROM newbed where bno= '$bed' and adatenew between '$start' and '$end'"; 
	 
$result1j = mysqli_query($dbhandle,$query1j) or die(mysql_error());

// Print out result
$row1j = mysqli_fetch_array($result1j);
$test1=	$row1j['COUNT(pmrn)'];
			
			
			
			/*$date_v= date('m/d/Y');
			$start_d=$row["adatenew1"];
			$date=date('Y-m-d',strtotime($start_d));
			//$date=date('m/d/Y',strtotime($start_d));
			
			$start=$row["adatenew"];
			//$start1=date('m/d/Y',strtotime($start));
			$start1=date('Y-m-d',strtotime($start));
			$date1=date_create("$start1");
			//echo $date_t=date('H:i:s',strtotime($start));
$date2=date_create("$date");
$date2_v=date_create("$date_v");
$diff=date_diff($date1,$date2);

$diff1=date_diff($date1,$date2_v);

$now = strtotime("$start_d");
$now2 = date('Y-m-d H:i:s'); 
$now1 = strtotime($now2); 
$your_date = strtotime("$start");
$datediff = $now - $your_date;
$datediff1 = $now1 - $your_date;

$fday= round($datediff/(60*60*24),2) ;


$fday1= round($datediff1/(60*60*24),2) ;


*/



?>

<?php echo round($test1c,2) ?>	  
	   
    </td>  	  
	  
	  	  <td align="center" style="color:green;font-size:40px;font-weight:bold">
	  
	  <a target='_blank'href="bed_stat_details?start=<?php echo $start; ?>&end=<?php echo $end; ?>&bno=<?php echo $bed; ?>"><?php echo round($test1) ?></a>	  </td>
      <td style="color:green;font-size:40px;font-weight:bold"><?php echo round($test1c * $bed_charge);?></td>
	  
	  </tr>
	  
    <?php $count++; } }?>


     
  </tbody>
</table>


</form>
</body>
</html>
