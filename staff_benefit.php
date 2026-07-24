<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','admin1','staff','staff1')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION["sess_username"];
//$id=$_REQUEST['ID'];
$sid=$_REQUEST['sid'];
$date1=date('Y-m-d');


//include("auth.php");

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from staff3 where sid='$sid'");
$data = mysqli_fetch_assoc($query4);
$ipd_bal=$data['ipd_bal'];
$opd_bal=$data['opd_bal'];
$year=date('Y');


  
?>


<?php
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

  
$query198 = "SELECT SUM(b_amount) FROM staff_benefit where s_id='$sid' and b_type='IPD' and year='$year' and status!='Cancel'"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
$ipd=$ipd_bal - $row198['SUM(b_amount)'];
$ipd1=$row198['SUM(b_amount)'];



$queryo = "SELECT SUM(b_amount) FROM staff_benefit where s_id='$sid' and b_type='OPD' and year='$year' and status!='Cancel'"; 
	 
$resulto = mysqli_query($dbhandle,$queryo) or die(mysql_error());

// Print out result
$rowo = mysqli_fetch_array($resulto);
$opd=$ipd_bal -	$rowo['SUM(b_amount)'];
$opd1=$rowo['SUM(b_amount)'];
//echo $test1;


?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit1']))
{


//$dname =$_REQUEST["adoc"];
//$pname = $_REQUEST['pname'];
$b_type = $_REQUEST['b_type'];
$b_amount = $_REQUEST['b_amount'];
$b_date = date('Y-m-d',strtotime($_REQUEST['b_date']));

$year = date('Y',strtotime($b_date));
//$cyear=date('Y-m-d', strtotime($cyear1));
//$institute = $_REQUEST['institute'];
//$result = $_REQUEST['result'];
$remarks = $_REQUEST['remarks'];
$a_date = date('Y-m-d h:i:s');

$i_amount=$ipd_bal - $b_amount;
$o_amount=$opd_bal - $b_amount;
//$dtime = $_REQUEST['dtime'];


if($b_type=='IPD')
{
$ins_query="insert into staff_benefit (`s_id`,`b_amount`,`year`,`remarks`,`b_date`,`a_by`,`a_date`,`b_type`) values 
('$sid', '$b_amount','$year','$remarks','$b_date','$user','$a_date','$b_type')";
mysqli_query($con,$ins_query) or die(mysql_error());

$query = "update staff3 set ipd_bal='$i_amount' where sid='$sid'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
$url = "staff_benefit.php?sid=$sid";
header("Location: $url"); 
}

else if($b_type=='OPD')
{
$ins_query="insert into staff_benefit (`s_id`,`b_amount`,`year`,`remarks`,`b_date`,`a_by`,`a_date`,`b_type`) values 
('$sid', '$b_amount','$year','$remarks','$b_date','$user','$a_date','$b_type')";
mysqli_query($con,$ins_query) or die(mysql_error());

$query = "update staff3 set opd_bal='$o_amount' where sid='$sid'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
$url = "staff_benefit.php?sid=$sid";
header("Location: $url"); 
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

input[type="text1"] {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 20px;
  font-weight:bold;
  font-color: Blue;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: yellow;
  color: Black;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}

      </style>

    <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

  
 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		
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
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>


<form action="" method="post">
        <table align="center" class="table table-bordered" id="dynamic_field"> 
		
		
		<tr>
		
		<td colspan="10" bgcolor='lightgreen' style='font-size:22px;font-weight:bold;align:center;'>Available IPD Balance</td>
		<td colspan="10"bgcolor='lightgreen' style='font-size:22px;font-weight:bold;align:center;'>Available OPD Balance</td>
		</tr>
		<tr>
		<td colspan="10" bgcolor='lightgreen' style='font-size:30px;font-weight:bold;color:red;align:center;'><?php echo $ipd_bal;?></td>
		<td colspan="10"bgcolor='lightgreen' style='font-size:30px;font-weight:bold;color:red;align:center;'><?php echo $opd_bal;?></td>
		
		</tr>
		
		<tr>
					
					<td colspan="10"><label><strong>Staff's Name :</strong></label></td>
					<td colspan="10"><label><strong>Staff's ID:</strong></label></td>
					

										<input type="hidden" name="new" value="1" />	
				</tr>
				
				<tr>	  
				
				<td colspan="10"><?php echo $data["sname"]; ?></td>
				<td colspan="10"><?php echo $data["sid"]; ?></td>
				
												
						
				
</tr>
		
		
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Medical Benefit Entry Panel</strong></label></td> </tr>
<tr><td colspan="5" align="center"><label><strong>Benefit Name</strong></label></td> 


<td colspan="4" align="center"><label><strong>Amount</strong></label></td> 
<td colspan="5" align="center"><label><strong>Benefit Date</strong></label></td> 

<td colspan="6" align="center"><label><strong>Remarks</strong></label></td> 
</tr>
<tr>
<td colspan="5">
	
	<select  name="b_type" required>

						<option value=''>-Select-</option>
						<option value='OPD'>OPD</option>
						<option value='IPD'>IPD</option>
						
						
						
				  </select></td>  
<td colspan="4"><input type="text" name="b_amount" placeholder="Amount" required></td>  
<td colspan="5"><input type="date" name="b_date" placeholder="Remarks" value=""></td>  
<td colspan="6"><input type="text" name="remarks" placeholder="Remarks" value=""></td>  

</tr>			        

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit1">ADD</button></td>
	  
</tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>SID</strong></td>
     	  <td colspan="4" align="center"><strong>Item Name</strong></td>
      	  
		  <td colspan="2" align="center"><strong>Quantity</strong></td>
		  <td colspan="3" align="center"><strong>Remarks</strong></td>
		  <td colspan="3" align="center"><strong>Given Date</strong></td>
		        	  <td colspan="1" align="center"><strong>DELETE</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$sid=$_REQUEST["sid"];

//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from staff_benefit where s_id= '$sid' and year='$year' and status !='Cancel' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["s_id"]; ?></td>
	        	        <td align="center"colspan="4"><?php echo $row["b_type"]; ?></td>
			
				  <td align="center"colspan="2"><?php echo $row["b_amount"]; ?></td>
				  <td align="center"colspan="3"><?php echo $row["remarks"]; ?></td>
				  <td align="center"colspan="3"><?php echo $row["b_date"]; ?></td>
				  <td align="center" colspan="1"><a href="staff_benefit_record_cancel?id=<?php echo $row["id"]; ?>&sid=<?php echo $sid; ?>&b_amount=<?php echo $row['b_amount']; ?>">Cancel</a></td>

  	  

	  
      </tr>
    <?php $count++; } ?>
	<tr><td align="right" colspan="20"><button onclick="self.close()">Close</button></td></tr>
	
	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Benefit Taken (OPD + IPD):(<?php if($opd1==0) {echo '0';} else {echo $opd1;}?> + <?php if($ipd1==0) {echo '0';} else {echo $ipd1;}?>)</strong></td></tr>
	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Grand Total Benefit Taken:(<?php if($opd1+$ipd1==0) {echo '0';} else {echo $opd1+$ipd1;}?>)</strong></td></tr>
</table>
</form>
</body>

</html>
