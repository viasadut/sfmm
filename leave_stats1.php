<?php
include_once 'dbconfig.php';
?>


<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff','diet')"; 
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
//$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
//$end=date('Y-m-d',strtotime($_REQUEST["endate"]));

$dept=$_REQUEST["dept"];
//$staff=$_REQUEST["staff"];

/*$query43 = "SELECT COUNT(dname) FROM pappnew where dname= '$bt' and adate1 BETWEEN '$start' and '$end' and status='SEEN';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);



$query44 = "SELECT COUNT(dname) FROM pappnew where adate1 BETWEEN '$start' and '$end' and status='SEEN';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44=mysqli_fetch_assoc($result44);*/
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
   
   
   <script type="text/javascript">
$(document).ready(function()
{
	$("#loding1").hide();
	$("#loding2").hide();
	$(".country").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".state").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_dept.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".state").html(html);
			} 
		});
	});
	
	
	$(".state").change(function()
	{
		$("#loding2").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding2").hide();
				$(".city").html(html);
			} 
		});
	});
	
});
</script>
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

<h1 align="center">Department Wise Carry Forward Leave Balance</h1>
<h1 align="center">Note: This stats might not be right If Leave is not applied in PMS </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						
							<td><label><strong> Select Department</strong></label></td> 
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 
					 
<td>
			
			<select name="dept" class="country" value=''required/>
<option ="">--Select Department--</option>
<option ="ALL">ALL</option>
<?php
	$stmt = $DB_con->prepare("SELECT distinct dept FROM staff3");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['dept']; ?>"><?php echo $row['dept']; ?></option>
        <?php
	} 
?>
</select>

</td>			       
	
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Staff's Name</strong></th>
      <th width="10%"><strong>Staff ID</strong></th>
      <th width="15%"><strong>Department</strong>
      <th width="14%"><strong>Carry Forward</strong>   
      <th width="14%"><strong>Annual Leave Taken</strong>
      <th width="14%"><strong>Balance Carry Forward </strong>
	  <th width="14%"><strong>Balance Annual Leave</strong>
	  <th width="14%"><strong>Balance Emergency Leave</strong>
	  <th width="14%"><strong>Emergency Leave Taken</strong>
	  <th width="14%"><strong>Balance Sick Leave</strong>
	  

	   </tr>
  </thead>
  <tbody>

  
     <?php
	 
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
//$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
//$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$dept=$_REQUEST["dept"];
//$staff=$_REQUEST["staff"];

if (($_POST['dept'])!="ALL"){
$sel_query="Select * from staff3 where dept='$dept' and status='Active' order by id asc";}

else 
	
	{$sel_query="Select * from staff3 where status='Active' order by id asc";}
//$start=$row["aadate"];
$count=1;
$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["sname"]; ?></a></td>
	  
	  <td align="center"><?php echo $row["sid"]; ?></a></td>
	  <td align="center"><?php echo $row["dept"]; ?></a></td>
       
	   
	   <td align="center"><?php echo $row['cfleave'];?></td>
	      <td align="center"><?php echo $row['ataken'];?></td>
		  
	   
	   
	   


	  <?php 
	  $sname=$row['sid'];
	  
	  $ttl=$row["tleave"];
	  $query39 = "SELECT * FROM staff3 where sid= '$sname' and status='Active'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
	  
	  $gd= $row39['gender'];
	  $el= $row39['etaken'];
$al= $row39['ataken'];
$sl= $row39['staken'];
$sl1= $row39['sleave'];
$ma= 112-$row39['mataken']; 
$pa= $row39['pataken'];
$doj= $row39['doj'];  
$status= $row39['status']; 
//$pa= $row['padd'];
$cf= $row39['cfleave'];

$sl1s=14-$sl;
	  
	  
	  
	  $status1= $row39['cstatus'];

$now = time(); // or your date as well
$year=date('Y');
$rr=date('Y');
$your_date = strtotime("$rr-01-01");
$your_date1 = strtotime("$doj");
//$your_date = strtotime("2019-01-01");
$datediff = $now - $your_date;
$datediff_y = $now - $your_date1;
//echo $datediff;
//$test= round ($your_date / (60 * 60 * 24));
$fday= round($datediff / (60 * 60 * 24)*.0438,2) ;
$fday1= round($datediff / (60 * 60 * 24)*.0274,2) ;
$fday_y= round($datediff_y / (60 * 60 * 24)*.0438,2) ;
$fday1_y= round($datediff_y / (60 * 60 * 24)*.0274,2) ;


$fday3= round($datediff / (60 * 60 * 24)*.0164,2) ;
//$fday4= round($datediff / (60 * 60 * 24)*.0274) ;
$fday3_y= round($datediff_y / (60 * 60 * 24)*.0164,2) ;

//echo $fday;
$aday=$fday+$cf-$al;
$aday1=$fday1-$el;

$aday_y=$fday_y+$cf-$al;
$aday1_y=$fday1_y-$el;


$aday2=$fday3-$al+$cf;
$aday2_y=$fday3_y-$al+$cf;

$cyear=date('Y');
$doj78=strtotime($doj);
$doj12=date('Y',strtotime($doj));
$datediff78 = $now - $doj78;
$fday8= round($datediff78 / (60 * 60 * 24)*.0164,2) ;
$fday9= round($datediff78 / (60 * 60 * 24)*.0274,2) ;


	  
	  
	  
	  ?>	

	   
<?php 
$al=$row['ataken'];
$cl=$row['cfleave'];
$bl=$cl-$al;
?>


<td align="center"><?php if($bl>0){echo $bl;} else {echo '0';}?></td>
	 

	
	  
	  
	 
	  
	  
	  
	
	<td> 
	 <?php 
	 
	  
	  
	  if($status1=='Confirm'and $cyear!=$doj12){echo $aday;} 
	  else if($status1=='Confirm'and $cyear==$doj12){echo $aday_y;}
	  else if($status1=='nonconfirm'and $cyear==$doj12){echo $aday2_y;}
	  else if($status1=='nonconfirm'and $cyear!=$doj12){echo $aday2;}
	  ?>
	  </td>
	  
	  <td> 
	 <?php 
	  if($status1=='Confirm' and $cyear!=$doj12){echo $aday1;} 
	  else if($status1=='Confirm' and $cyear==$doj12){echo $aday1_y;} 
	  else if($status1=='nonconfirm'){echo $aday1_y;}
	  
	  
	  ?>
	  </td>

	  <td>
	<?php echo $row['etaken'];?>
	  </td>

	  <td>
	  <?php 
	 if($status1=='Confirm'){echo $sl1s;} 
	  else if($status1=='nonconfirm'){echo $sl1s_p;}
	  ?>
	  </td>
	  

  
      </tr>
<?php $count++; } 
	}
?>

      <td colspan="10" align="right"><a target='_blank' href="pptt1?dname=<?php echo "$bt";?>&date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
  </tbody>
</table>


</form>
</body>
</html>
