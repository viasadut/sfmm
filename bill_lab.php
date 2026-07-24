<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="bill"){
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
$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
//$full=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
$date77=date('Y-m-d');

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from alltest where pmrn='$pmrn'");
$data = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($db,"select * from patient where ID='$id'");
$data1 = mysqli_fetch_assoc($query5);
$bdate=$data1['bdate'];
$dd=date('d-m-Y',strtotime($data1['bdate']));
$dd2=date_create($dd);



$date= date('d-m-Y');
$date2=date_create($date);



$diff=date_diff($date2,$dd2);
$diff1= $diff->format("%y Y %m M %d D");
$diff1;


$query59 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data59 = mysqli_fetch_assoc($query59);
$eid=date('dmY');



$query55 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and eid='$eid'");
$data15 = mysqli_fetch_assoc($query55);
$ddd=$data15['dname'];

  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$pdate=date('Y-m-d');  
$dname =$_REQUEST["dname"];
//$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$date = date('m/d/Y');
$medi = $_REQUEST['medi'];
$pins = $_REQUEST['pins'];
$pname=$data1["pname"];
$psex=$data1["psex"];
//$dtime = $_REQUEST['dtime'];
$query159 = mysqli_query($db,"select * from radio where iname='$medi'");
$data159 = mysqli_fetch_assoc($query159);
$type=$data159["type"];
$price=$data159["price"];
$code=$data159["code"];
$subtype=$data159["subtype"];
//echo $type;
//echo $type;
$url = "newtest2lab.php?pmrn=$pmrn&ID=$id"; 


$link=$data159["link"];
$linkv=$data159["linkv"];
$report=$data159["report"];
$reportv=$data159["reportv"];

$sel90="SELECT * FROM radio WHERE `iname`='$medi';";
$result90 = mysqli_query($con,$sel90);

$sel900="SELECT * FROM doctor WHERE `dname`='$dname' and status in ('Active','active1');";
$result900 = mysqli_query($con,$sel900);
if($res900=mysqli_num_rows($result900)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Consultant Name is not in the Database List.. Please contact with Concern Department"); ';
    echo '</script>';
    }



else if($res90=mysqli_num_rows($result90)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Investigation Name is not in the Database List.. Please contact with Concern Department"); ';
    echo '</script>';
    }

else{



$ins_query="insert into alltest (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`price`,`code`,`link`,`date1`,`linkv`,`report`,`reportv`,`location`,`page`,`pgender`,`subtype`,`billstatus`,`billby`,`billdate`)
values ('$dname', '$pmrn','$pname','$eid','$medi','$pins','$date','$type','$price','$code','$link','$date77','$linkv','$report','$reportv','OPD','$diff1','$psex','$subtype','Billed','$user','$pdate')";
mysqli_query($con,$ins_query) or die(mysql_error());

header("Refresh:0; URL=$url");
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

  
$query198 = "SELECT SUM(price) FROM alltest where pmrn='$pmrn'and eid='$eid'"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
$test1=	$row198['SUM(price)'];
//echo $test1;


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
      </style>

    <script src="jsnew/prefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
  
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
}
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
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
				<tr>
					<td colspan="6"><label><strong>Doctors's Name :</strong></label></td>
					<td colspan="6"><label><strong>Patient's Name :</strong></label></td>
					<td colspan="4"><label><strong>Patient's MRN:</strong></label></td>
					<td colspan="4"><label><strong>Patient's Episode:</strong></label></td>

										<input type="hidden" name="new" value="1" />	
				</tr>
				
				<tr>	  
				<td colspan="6"><input list="browsers10" name="dname" size=60% class="form-control" autocomplete="off" value='<?php echo $ddd;?>'required>
  <datalist id="browsers10">
			        
					<option value='<?php echo $ddd;?>'selected><?php echo $ddd;?></option>
					
				<?php 
			$sql = "select * from `doctor` where status in ('Active','Active1')";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
			</datalist></td>
				<td colspan="6"><?php echo $data1["pname"]; ?></td>
				<td colspan="4"><?php echo $pmrn; ?></td>
				<td colspan="4"><?php echo $eid; ?> </td>	
												
						
				
</tr>
						

						
						
					


				

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Form</strong></label></td> </tr>
<tr><td colspan="10" align="center"><label><strong>Investigation</strong></label></td> 

<td colspan="10" align="center"><label><strong>Instructions</strong></label></td> 
</tr>
<tr>
<td colspan="10" align="center"><input list="browsers1" name="medi" size=60% class="form-control" autocomplete="off" required>
  <datalist id="browsers1">

						<option value=''>-Select Investigation</option>
				<?php 
			$sql = "select * from `radio` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->iname."'>".$row->iname."</option>";
				}
			}
			?>  </datalist></td>

<td colspan="10" align="center"><input type="text" name="pins" value="" ></td>

</tr>			        

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">ADD</button></td>
	  
</tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="10" align="center"><strong>TEST NAME</strong></td>
      	  <td colspan="3" align="center"><strong>Instruction</strong></td>
		  <td colspan="3" align="center"><strong>Price</strong></td>
		        	  <td colspan="2" align="center"><strong>DELETE</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=date('dmY');
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from alltest where pmrn= '$pmrn' and eid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
			      <td align="center"colspan="3"><?php echo $row["ins"]; ?></td>
				  <td align="center"colspan="2"><?php echo $row["price"]; ?></td>
				  <td align="center" colspan="2"><a href="deletelab?id=<?php echo $row["id"]; ?>&pmrn=<?php echo "$pmrn"; ?>&ID=<?php echo "$id"; ?>">DELETE</a></td>

  	  

	  
      </tr>
    <?php $count++; } ?>
<tr><td align="right" colspan="20"><button onclick="self.close()">Close</button></td></tr>

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Cost For The Selected Investigation Will Be:<?php echo $test1;?> (BDT)</strong></td></tr>
</table>

</form>


</body>

</html>
