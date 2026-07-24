<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','bill','ot')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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
$ad= date('m/d/Y');
//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
//$id=$_REQUEST['id'];
$id=$_REQUEST['id'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from ot where pmrn='$pmrn' and id='$id'");
$data = mysqli_fetch_assoc($query4);
	$ot_charge=$data['ot_charge_status'];    


  
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
$eid = $data['eid'];
//$padd = $data['padd'];
$adm = $data['adate'];
$pphone=$data['pphone'];
$page=$data['page'];
$psex=$data['psex'];
//$odate = $_REQUEST['odate'];
$infu = $_REQUEST['infu'];
$adate1= date('d/m/Y H:i:s');
$adate= date('m/d/Y');
$date=$_REQUEST['date'];
$time=$_REQUEST['time'];
//$qty=$_REQUEST['qty'];
$add=$_REQUEST['add'];
$infu1 = $_REQUEST['infu1'];
$otime1 = $_REQUEST['otime1'];
//$alert=$_REQUEST['alert'];
$add1=$_REQUEST['add1'];
$qty1=$_REQUEST['qty1'];
$qty2=$_REQUEST['qty2'];

$sel90="SELECT * FROM medicine WHERE `mname`='$infu' and pre='infusion';";
$result90 = mysqli_query($con,$sel90);
$result1 = mysqli_fetch_assoc($result90);
$dcode=$result1["code"];
$price=$result1['uprice'];



$sel91="SELECT * FROM time WHERE `tt`='$time';";
$result91 = mysqli_query($con,$sel91);

$sel92="SELECT * FROM time WHERE `tt`='$otime1';";
$result92 = mysqli_query($con,$sel92);


$sel93="SELECT * FROM medicine WHERE `mname`='$add' and pre='injection';";
$result93 = mysqli_query($con,$sel93);
$result1_a = mysqli_fetch_assoc($result93);

$price_a=$result1_a['uprice'];




$sel94="SELECT * FROM medicine WHERE `mname`='$add1' and pre='injection';";
$result94 = mysqli_query($con,$sel94);
$result1_b = mysqli_fetch_assoc($result94);

$price_b=$result1_b['uprice'];
$price_f=$price+$price_a+$price_b;

if($res90=mysqli_num_rows($result90)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Infusion Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }


	else if(!empty($_REQUEST['add']) && $res93=mysqli_num_rows($result93)==0){
	
	

 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Additive-1 Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }
	
	
	
	else if(!empty($_REQUEST['add1']) && $res94=mysqli_num_rows($result94)==0){
	

 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Additive-2 Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }
	

else{

$ins_query="insert into otanaesinfusion (`pmrn`,`eid`,`pname`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`user`,`status`,`status1`,`odate1`,`otime`,`addi`,`otime1`,`infu1`,`add1`,`qty1`,`qty2`,`pstatus`,`ortime`,`price`) 
values ( '$pmrn','$id','$pname','$page','$adm','$psex','$pphone','$date','$infu','$user','Data Updated','Active','$adate','$time',' $add','$otime1','$infu1',' $add1','$qty1','$qty2','Ordered','$adate1','$price_f')";
mysqli_query($con,$ins_query) or die(mysql_error());

}
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
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
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
<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Stop The Infusion ?");
}

</script>
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
<h1 align="center"style="background-color:lightgreen;">INPATIENT INFUSION NOTE</h1>

<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td colspan="20" align="right"><button onClick="goBack()">Back</button></td></tr>
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				
				<tr>	  
				<td colspan="20"><?php echo $data["nanes"]; ?></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="5"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="12"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="5"><?php echo $data["pmrn"]; ?></td>
				<td colspan="3"><?php echo $data["eid"]; ?> </td>
					 <td colspan="12"><?php echo $data["pname"]; ?></td>

					 
</tr>

						
						
<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $data["padd"]; ?></td></tr>


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="3"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						<td colspan="6"><label><strong>Procedure Name:</strong></label></td>
							
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data["page"]; ?></td>  
             		<td colspan="3"><?php echo $data["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data["psex"]; ?></td>
					 <td colspan="4"><?php echo $data["pphone"]; ?></td>  

			    	 <td colspan="2"><?php echo $data["proce"].''.$data["Otherins"]; ?></td>  
					  
					 </tr>


						

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Infusion Form</strong></label></td> </tr>
<tr>


<td colspan="4" align="center"><label><strong>Date</strong></label></td> 
<td colspan="3" align="center"><label><strong>Start Time</strong></label></td> 
<td colspan="3" align="center"><label><strong>End Time</strong></label></td> 
<td colspan="10" align="center"><label><strong>Infusion</strong></label></td> 


</tr>
<tr>



<td colspan="4" align="left"><input type="text" class="style" name="date" id="datepicker" placeholder="Select Date" value="<?php echo date('m/d/Y');?>" required></td>
<td colspan="3" align="center"><input list="rr5" name="time" class="form-control" required>
  <datalist id="rr5">
<option value=''>-Select Time-</option>
				<?php 
			$sql = "select * from `time`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->tt."'>".$row->tt."</option>";
				}
			}
			?>  </datalist></td>
			  <td colspan="3" align="center"><input list="rr5" name="otime1" class="form-control" required>
  <datalist id="rr5">
<option value=''>-Select Time-</option>
				<?php 
			$sql = "select * from `time`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->tt."'>".$row->tt."</option>";
				}
			}
			?>  </datalist></td>

<td colspan="10" align="center"><input list="in" name="infu" class="form-control">
  <datalist id="in">
<option value=''>-Select Infusion-</option>
				<?php 
			$sql = "select * from `medicine` where pre='infusion'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>  </datalist></td>
			
			</tr>
			 
			 <tr>
<td colspan="3" align="center"><label><strong>Additive-1</strong></label></td> 
<td colspan="3" align="center"><label><strong>Quantity(ml)</strong></label></td>
<td colspan="3" align="center"><label><strong>Additive-2</strong></label></td> 
<td colspan="3" align="center"><label><strong>Quantity(ml)</strong></label></td> 
<td colspan="6" align="center"><label><strong>Instruction</strong></label></td>

 </tr>
			 <tr>
			 <td colspan="3" align="center"><input list="in1" name="add" class="form-control">
  <datalist id="in1">  
<option value=''>-Select Additive-</option>
				<?php 
			$sql = "select * from `medicine` where pre='injection'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>
						
			  </datalist></td>
			  
			  <td colspan="3" align="center"><input type="text" name="qty1"value="" ></td>
			  
			  <td colspan="3" align="center"><input list="in2" name="add1" class="form-control">
  <datalist id="in2">
  
<option value=''>-Select Additive-</option>
				<?php 
			$sql = "select * from `medicine` where pre='injection'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname."</option>";
				}
			}
			?>
						
			  </datalist></td>
			  
			  <td colspan="3" align="center"><input type="text" name="qty2"value="" >
</td>
<td colspan="6" align="center"><input type="text" name="infu1" required value="" ></td>
			  

</tr>

<tr>
		
	  
	  
	  
	  <td colspan="20"align="right"><strong><a href="addpharmedidoctorinfu?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>">View Tomorrow's Medicine</a></strong>&nbsp;&nbsp;<a href="idocinfusiondate?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>"><font size="4.5" color="#FF0000"><b>(See Datewise Medicine List)<b></a></tr>
<tr>	  
	  
  <td colspan="20"align="right">
  
  
  <?php if($ot_charge=='')
{ echo'
<td colspan="20"align="right"><button type="submit" name="Submit">Confirm</button></td>';}

else {
	
	echo '<td colspan="20"align="right"><button type="submit" name="Submit" disabled><font size="4.5" color="#FF000"><b>Charge Already Confirmed</button></td>';
}
	  
	  ?>
  
 
</tr>

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Infusion Form</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
	  <td colspan="1" align="center"><strong>STime </strong></td>
	  <td colspan="1" align="center"><strong>ETime </strong></td>
      <td colspan="2" align="center"><strong>Infusion</strong></td>
	  <td colspan="2" align="center"><strong>Additive-1</strong></td>
	  <td colspan="1" align="center"><strong>Qty</strong></td>
	  <td colspan="2" align="center"><strong>Additive-2</strong></td>
	  <td colspan="1" align="center"><strong>Qty</strong></td>
	  
	  <td colspan="2" align="center"><strong>Instruction</strong></td>
	  <td colspan="1" align="center"><strong>Done Date</strong></td>

	  	  <td colspan="1" align="center"><strong>Done By</strong></td>

<td colspan="1" align="center"><strong>Stop</strong></td>
<td colspan="1" align="center"><strong>ADD</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
//$episode=$data["eid"];
$count=1;
$sel_query="Select * from otanaesinfusion where pmrn= '$pmrn'and eid='$id' and status1='Active' order by `ddate` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="1"><?php echo $row["otime"]; ?></td>  
	  <td align="center"colspan="1"><?php echo $row["otime1"]; ?></td> 
      <td align="center"colspan="2"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["addi"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["qty1"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["add1"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["qty2"]; ?></td>
	  
	  <td align="center"colspan="2"><?php echo $row["infu1"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["ddate"]; ?></td>  

	  <td align="center"colspan="1"><?php echo $row["duser"]; ?></td>
	   
  	  
        <?php echo $row['alert'];?></td>
	</tr>
<?php $count++; } ?>
</table>
</form>
</body>

</html>
