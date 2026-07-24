<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2?err=2');
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
   <li><a href='viewnew1'><span>Home</span></a></li>
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

<h1 align="center">Monthly Endoscopic Procedure Report</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td colspan="2"><label><strong>Select Start Date:</strong></label></td>
						<td colspan="2"><label><strong>Select End Date:</strong></label></td>	

							<td colspan="3"><label><strong> Select Consultant</strong></label></td> 
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="2"><input type="text" name="stdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td colspan="2"><input type="text" name="endate" id="datepicker2" placeholder="Select Date" size="15"></td>  
					 <td colspan="3"><select name="bt">
        
						<option value=''>-Select-</option>
						<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
				
</select></td>  
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		



  
     <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=$_REQUEST["stdate"];
$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];


//$fullname = $_SESSION['sess_username'];


$link = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
//$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];

//$eid=$_REQUEST['eid'];




$dd=date('m/d/Y');

$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($link, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];




$query2 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='$full' and type='ENDOSCOPY OF UPPER GIT' and r1date BETWEEN '$start' and '$end'" );
$data2 = mysqli_fetch_array($query2);


$sum1=$data2['count(*)'];


$query8 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='$full' and type='COLONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data8 = mysqli_fetch_array($query8);





$query14 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='$full' and type='SIGMOIDOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data14 = mysqli_fetch_array($query14);

$query15 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='$full' and type='POLYPECTOMY' and r1date BETWEEN '$start' and '$end'" );
$data15 = mysqli_fetch_array($query15);

$query16 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='$full' and type='CYSTOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data16 = mysqli_fetch_array($query16);

$query17 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='$full' and type='DJ. STENT REMOVE' and r1date BETWEEN '$start' and '$end'" );
$data17 = mysqli_fetch_array($query17);

$query18 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='$full' and type='F.B REMOVE' and r1date BETWEEN '$start' and '$end'" );
$data18 = mysqli_fetch_array($query18);

$query19 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='$full' and type='FOL' and r1date BETWEEN '$start' and '$end'" );
$data19 = mysqli_fetch_array($query19);

$query20 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='$full' and type='UROFLOWMETRY' and r1date BETWEEN '$start' and '$end'" );
$data20 = mysqli_fetch_array($query20);

$query21 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='$full' and type='ERCP SCREENING' and r1date BETWEEN '$start' and '$end'" );
$data21 = mysqli_fetch_array($query21);

$query22 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='$full' and type='EVL' and r1date BETWEEN '$start' and '$end'" );
$data22 = mysqli_fetch_array($query22);

$query23 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='$full' and type='DUDONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data23 = mysqli_fetch_array($query23);





$i1=$data2['count(*)']+$data8['count(*)']+$data14['count(*)']+$data15['count(*)']+$data16['count(*)']+$data17['count(*)']+$data18['count(*)']+$data19['count(*)']+$data20['count(*)']+$data21['count(*)']+$data22['count(*)']+$data23['count(*)'];

//$gsum=$sum1;










//$date1=date_create("$start");
//$date2=date_create("$end");
//$diff=date_diff($date1,$date2);
//echo $diff->format("%R%a days");


$count=1;
$sel_query="Select type,dname,count(*) from endoreport where r1date BETWEEN '$start' and '$end' group by dname, type order by type";


$result = mysqli_query($con,$sel_query);

$row = mysqli_fetch_assoc($result);

echo "<font color=blue font size=5> Total Record found in the search  -";

echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;

 ?>   

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <td align="center"><strong>S.No</strong></td>
      <td align="center"><strong>Name Of The Procedure</strong></td>
      <td align="center"><strong>QTY</strong></td>
      
	  

	   </tr>
  </thead>
  <tbody>


 <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><strong>Endoscopy</strong></td>
	  <td align="center"><?php echo $data2["count(*)"]; ?>  
	  
	  
	  
	  
      </tr>
	  <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><strong>Colonoscopy</strong></td>
	  <td align="center"><?php echo $data8["count(*)"]; ?>  
	  
	  
	 
	  
      </tr>
	  
	  
	  <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><strong>Sigmoidoscopy</strong></td>
	  <td align="center"><?php echo $data14["count(*)"]; ?>
	  </tr>
	  
	    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><strong>Polypectomy</strong></td>
	  <td align="center"><?php echo $data15["count(*)"]; ?>
	  </tr>
	    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><strong>Cystoscopy</strong></td>
	  <td align="center"><?php echo $data16["count(*)"]; ?>
	  </tr>
	  
	    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><strong>DJ. Stent Remove</strong></td>
	  <td align="center"><?php echo $data17["count(*)"]; ?>
	  </tr>
	  
	    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><strong>F.B Remove</strong></td>
	  <td align="center"><?php echo $data18["count(*)"]; ?>
	  </tr>
	  
	  
	    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><strong>FOL</strong></td>
	  <td align="center"><?php echo $data19["count(*)"]; ?>
	  </tr>
	   
	     <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><strong>Uroflowmetry</strong></td>
	  <td align="center"><?php echo $data20["count(*)"]; ?>
	  </tr>
	  
	  
	    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><strong>ERCP Screening</strong></td>
	  <td align="center"><?php echo $data21["count(*)"]; ?>
	  </tr>
	  
	  
	    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><strong>EVL</strong></td>
	  <td align="center"><?php echo $data22["count(*)"]; ?>
	  </tr>
	  
	    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><strong>Dudonoscopy</strong></td>
	  <td align="center"><?php echo $data23["count(*)"]; ?>
	  </tr>
	  
	   
	   
	   <tr>
	   
	   

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><strong>Grand Total</strong></td>
	  
	  
	  
	  <td align="center"><?php echo "$i1"; ?>  
	  
      </tr>

    <?php $count++; } ?>


      <td colspan="10" align="right"><a target='_blank' href="?date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
  </tbody>
  
</table>


</form>
</body>
</html>
