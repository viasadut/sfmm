<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
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
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

$date1=date('Y-m-d');

//include("auth.php");
//$pmrn=$_REQUEST['pmrn'];
//$eid=$_REQUEST['eid'];
//$id=$_REQUEST['id'];

 
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{



$pname = $data['pname'];
$pmrn = $data['pmrn'];
//$eid = $data['eid'];
//$padd = $data['padd'];
//$adm = $data['adate'];
//$pphone=$data['pphone'];
//$page=$data['page'];
//$psex=$data['psex'];
//$odate = $_REQUEST['odate'];
//$otime = $_REQUEST['otime'];
//$infu = $_REQUEST['infu'];
$otdate=date('Y-m-d',strtotime($_REQUEST["adm"]));
$proname = $_REQUEST['proname'];
$sreport = $_REQUEST['sreport'];
//$otherins = $_REQUEST['otherins'];
$ottype = $_REQUEST['ottype'];
$adate1= date('m/d/Y H:i:s');
//$x=$_REQUEST['xl'];
//$lx= implode(",",$x);
$date1=date('Y-m-d');
$dname = $_REQUEST['dname'];

$sel95="SELECT * FROM mma1 WHERE `Proname`='$proname';";
$result95 = mysqli_query($con,$sel95);



if($res95=mysqli_num_rows($result95)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Procedure Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }



	
	


//else {
$ins_query="insert into otreport (`pmrn`,`eid`,`pname`,`otdate`,`sname`,`sreport`,`ottype`,`date1`) values ( '$pmrn','0','$proname','$otdate','$dname','$sreport','$ottype','$date1')";
mysqli_query($con,$ins_query) or die(mysql_error());

echo '<script language="javascript">';
    echo 'alert("Successfully Inserted !!!"); ';
    echo '</script>';
//}
}
?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    

  
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

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: lightgreen;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 10%;
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




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    


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

<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Add Inpatient Visit ?");
}

</script>
<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Add ICU Visit ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Add Emergency Visit ?");
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


<form action="" method="post">
<table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"></td></tr>
		
				<tr><td colspan="20"><label><strong>Surgenon's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20">
				
				<select name="dname" value="" required/>
			        <option value=''>-Select Surgeon-</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
			</select>
				
				</td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="7"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="7"><input type="text" name="pmrn" value=""required> </td>
				<td colspan="3"><input type="text" name="eid" value=""> </td>
					 <td colspan="10"><input type="text" name="pname" value=""required> </td>

					 
</tr>

						
						


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="5"><label><strong>OT Date:</strong></label></td>
						<td colspan="5"><label><strong>Gender:</strong></label></td>
						<td colspan="3"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>OT Type:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="page" value=""required> </td>  
             		<td colspan="5"> 
					
					<input type="text" name="adm" id="datepicker" placeholder="Select Date" required></td>					 	
					 <td colspan="5"><input type="text" name="psex" value=""required></td>
					 <td colspan="3"><input type="text" name="pphone" value="" readonly></td>  
				<td colspan="2"><select name="ottype" value="" required>
			        <option value=''>-Select Type-</option>
					<option value='Manjor Elective'>Major Elective</option>
					<option value='Minor Elective'>Minor Elective</option></td>
					<option value='Manjor Emergency'>Major Emergency</option>
					<option value='Minor Emergency'>Minor Emergency</option></td>
					 </tr>


						
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Surgeon's NOTE</strong></label></td> </tr>




<tr>

<tr><td colspan="20"><label><strong>Procedure Name:</strong></label></td>  </tr>


<tr><td colspan="20"><input list="proname" name="proname" class="form-control" value="" autocomplete="off" required>
	
	<datalist id="proname">
		


       <?php 
			$sql = "select * from `mma1`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->Proname."'>".$row->Proname."</option>";
				}
			}
			?>
    </datalist>

    
</td></tr>


<td colspan="20" align="center"><textarea rows="40"  name="sreport" required value=""></textarea></td>

</tr>


<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">Confirm</button></td>
	  
</tr>


</form>
</body>

</html>
