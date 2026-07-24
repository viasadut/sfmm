<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');
if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];

$pmrn=$_REQUEST["pmrn"];


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

$query = "SELECT * from user where uname='".$user."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$full=$row['fullname'];




?>

<!DOCTYPE html>
<html>
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


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script src="./jquery.multiselect.js"></script>
<link href="./jquery.multiselect.css" rel="stylesheet" />
   
   <script src="jsnew/pprefixfree.min.js"></script>
   <script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Start The Blood?");
}

</script>

<link href="prescription/prescription/css/select2.min.css" rel="stylesheet" />
<script src="prescription/prescription/css/select2.min.js"></script>
</head>

<body>




<div id='cssmenu'>
<ul>
   <li><a href='homemrd'><span style="color:red;font-weight:bold">Home</span></a></li>
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

<h1 align="center">Search By Patient MRN</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td><label><strong>Type MRN:</strong></label></td>
						

						
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
                              <td>	<input type="text" name="pmrn" class="form-control" style="color:green;font-size:22px;font-weight:bold" autocomplete="off"></td>	 
			    	 	<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



<tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="14%"><strong>Consultant Name</strong>
	  <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>OT Time </strong>
      <th width="14%"><strong>Anaethetist Name</strong> 
      <th width="14%"><strong>Duration</strong>
      <th width="14%"><strong>Procedure</strong> 
<th width="14%"><strong>Date</strong> 	  
      
	        <th width="14%"><strong>Type</strong>
			<th width="14%"><strong>OT Note</strong>
	  


	   </tr>
  </thead>
  <tbody>

  
     <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];

$pmrn=$_REQUEST["pmrn"];
//$id=$_REQUEST["id"];

	 
	 $sel_query="Select * from ot where '$full' in (`dname`) and pmrn='$pmrn' and status='Received' and dnamestatus !='Written'  order by id desc";

$count=1;
//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>
     <td align="center"><?php echo $count; ?></td>
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> </td> 
     <td align="center"><?php echo $row["pname"]; ?></td>
     <td align="center"><?php echo $row["pmrn"]; ?>
     <td align="center"><?php echo $row["duration"]; ?>
     <td align="center"><?php echo $row["nanes"]; ?>  
      <td align="Left"><?php echo $row["duration1"]; ?>  
             <td align="Left"><?php echo $row["proce"]; ?> 
           <td align="Left"><?php echo $row["otdate"]; ?> 
     

           <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["ptype"];?></td>

            
           
                   
            


           <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="ssnotetest_update_old_data?id=<?php echo $row["id"];?>&pmrn=<?php echo $row["pmrn"];?>">OT Note</a> </td>
      

     </tr>
	  
    <?php $count++;  }}?>


      
  </tbody>
</table>


</form>
</body>
</html>


