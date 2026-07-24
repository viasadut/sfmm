<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="vc"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION["sess_username"];
//$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$pname=$_REQUEST['pname'];

 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);

$full = $row39['fullname'];




//$full=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];

//$query43 = "SELECT COUNT(pmrn) FROM presnew where pmrn= '$pmrn';"; 
//$result43 = mysqli_query($con, $query43) or die(mysqli_error());
//$row43 = mysqli_fetch_assoc($result43);
//$count =$row43['COUNT(pmrn)'];
//$count1 = $count+1;
$date2=date('Y-m-d');

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
/*$query4 = mysqli_query($db,"select * from alltest where pmrn='$pmrn'");
$data = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn'");
$data1 = mysqli_fetch_assoc($query5);

$query59 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data59 = mysqli_fetch_assoc($query59);*/
//$ss='31';
  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


//$dname =$_REQUEST["adoc"];
//$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$date = date('m/d/Y');
$medi = $_REQUEST['medi'];
$pins = $_REQUEST['pins'];
$remarks = $_REQUEST['remarks'];
$dosage = $_REQUEST['dose'];
$route = $_REQUEST['route'];
$site = $_REQUEST['site'];
$next = $_REQUEST['next'];
//$pname=$data1["pname"];
//$dtime = $_REQUEST['dtime'];
$query159 = mysqli_query($db,"select type from radio where iname='$medi'");
$data159 = mysqli_fetch_assoc($query159);
$type=$data159["type"];
//echo $type;
//echo $type;


$sql = "select COUNT(id) from `medicine` where mname='$medi'";
			$res = mysqli_query($con, $sql);
			$medi1=mysqli_fetch_assoc($res);



$test=date('Y-m-d', strtotime(''.$next.' days') );

$date1=date('Y-m-d', strtotime($_REQUEST['pins']));

if($medi1['COUNT(id)']>0)

{
$ins_query="insert into allvacine (`dname`,`pmrn`,`pname`,`medi`,`ins`,`date`,`type`,`date2`,`date1`,`remarks`,`dose`,`site`,`route`,`next`) values ('$full', '$pmrn','$pname','$medi','$pins','$date','$type','$date2','$date1','$remarks','$dosage','$site','$route','$test')";
mysqli_query($con,$ins_query) or die(mysql_error());
}

else 
	
	{
		
		echo '<script language="javascript">';
    echo 'alert("Vaccine Name is not in the Database !!"); ';

    echo '</script>';
	}
}
?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
if(isset($_POST['DELETE']))
{
require('db1.php');
$id=$_REQUEST['id'];
$query23 = "DELETE FROM alltest WHERE id=$id"; 
$result23 = mysqli_query($con,$query23) or die ( mysqli_error());
//header("Location: newtest2.php"); 
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
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
  height: 32px;
  border-radius: 2px;
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentMonth, currentDate,currentYear),
			maxDate: new Date(currentMonth, currentDate,currentYear)
		});
	});
</script>

 <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>


  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script>
function goBack() {
    window.history.back();
}
</script>


</head>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='inviewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
				<tr>
					<td colspan="6"><label><strong>Doctors's Name :</strong></label></td>
					<td colspan="10"><label><strong>Patient's Name :</strong></label></td>
					<td colspan="6"><label><strong>Patient's MRN:</strong></label></td>
					

										<input type="hidden" name="new" value="1" />	
				</tr>
				
				<tr>	  
				<td colspan="6"><?php echo "$full"; ?></td>
				<td colspan="10"><?php echo $pname; ?></td>
				<td colspan="6"><?php echo $pmrn; ?></td>
				
												
						
				
</tr>
						

						
						
					


<p align='Right'>
<a target='_blank' href="vcprint_all?pmrn=<?php echo "$pmrn"; ?>">All</a>

</p>				

<tr><td colspan="22" align="center"bgcolor="lightgreen"><label><strong>Vaccine History</strong></label></td> </tr>
<tr><td colspan="5" align="center"><label><strong>Name of Vaccine</strong></label></td> 

<td colspan="3" align="center"><label><strong>Date</strong></label></td> 
<td colspan="3" align="center"><label><strong>Dosage</strong></label></td> 
<td colspan="3" align="center"><label><strong>Route</strong></label></td> 
<td colspan="2" align="center"><label><strong>Site</strong></label></td> 
<td colspan="2" align="center"><label><strong>Next</strong></label></td> 
<td colspan="4" align="center"><label><strong>Remarks</strong></label></td> 
</tr>
<tr>
<td colspan="5" align="center"><input list="browsers1" name="medi" size=60% class="form-control" required autocomplete='Off'>
  <datalist id="browsers1">

						<option value=''>-Select Vacine-</option>
				<?php 
			$sql = "select * from `medicine` where pcat='Vaccine'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist></td>

<td colspan="3" align="center">
<input type="text" name="pins" id="" placeholder="MM/DD/YYYY" size="15" value="<?php echo date('d/m/Y');?>" readonly></td>


<td colspan="3" align="center">
<input type="text" name="dose" id="" placeholder="Dosage" size="15" value="" ></td>

<td colspan="3" align="center">
<input type="text" name="route" id="" placeholder="Route" size="15" value="" ></td>

<td colspan="2" align="center">
<input type="text" name="site" id="" placeholder="Site" size="15" value=""></td>


<td colspan="2" align="center">
<input type="number" name="next" id="" placeholder="days" size="15" value=""></td>



<td colspan="4" align="center">

<input type="text" name="remarks" id="" placeholder="Remarks" size="15" value=""></td>



</tr>			        

<tr>
		<td colspan="22"align="right"><button type="submit" name="Submit">ADD</button></td>
	  
</tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="3" align="center"><strong>Vaccine NAME</strong></td>
		  <td colspan="3" align="center"><strong>Dosage</strong></td>
		  <td colspan="2" align="center"><strong>Route</strong></td>
		  <td colspan="3" align="center"><strong>Site</strong></td>
      	  <td colspan="2" align="center"><strong>Date</strong></td>
		  
		  <td colspan="3" align="center"><strong>Remarks</strong></td>
		    <td colspan="1" align="center"><strong>Added By</strong></td>
			<td colspan="1" align="center"><strong>Next Date</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
//$eid=$_REQUEST["eid"];
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from allvacine where pmrn= '$pmrn' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="3"><a target='_blank' href="vcprint1?pmrn=<?php echo "$pmrn"; ?>&medi=<?php echo $row['medi']; ?>"><?php echo $row["medi"]; ?></a></td>
			      <td align="center"colspan="3"><?php echo $row["dose"]; ?></td>
				  <td align="center"colspan="2"><?php echo $row["route"]; ?></td>
				  <td align="center"colspan="3"><?php echo $row["site"]; ?></td>
				  <td align="center"colspan="2"><?php echo $row["ins"]; ?></td>
				  <td align="center"colspan="3"><?php echo $row["remarks"]; ?></td>
				  <td align="center" colspan="1"><?php echo $row["dname"]; ?></td>
				  <td align="center" colspan="1"><?php echo $row["next"]; ?></td>

  	  

	  
      </tr>
    <?php $count++; } ?>
	<tr>
	
	<td colspan="10" align="right"><a target='_blank' href="vcprint?pmrn=<?php echo "$pmrn"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	<td align="right" colspan="10"><button onclick="self.close()">Close</button></td>
	
	
	
	</tr>
</table>
</form>

</body>

</html>
