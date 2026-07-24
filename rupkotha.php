<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
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
$eid=$_REQUEST['eid'];
  $ortime = date('d/m/Y H:i:s');
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid' and discharge=''");
$data = mysqli_fetch_assoc($query4);



  
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
$padd = $data['padd'];
$adm = $data['adate'];
$pphone=$data['pphone'];
$page=$data['age'];
$psex=$data['gender'];
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
$alert=$_REQUEST['alert'];
$add1=$_REQUEST['add1'];
$qty1=$_REQUEST['qty1'];
$qty2=$_REQUEST['qty2'];

$sel90="SELECT * FROM medicine WHERE `mname`='$infu' and pre='infusion';";
$result90 = mysqli_query($con,$sel90);

$sel91="SELECT * FROM time WHERE `tt`='$time';";
$result91 = mysqli_query($con,$sel91);

$sel92="SELECT * FROM time WHERE `tt`='$otime1';";
$result92 = mysqli_query($con,$sel92);


$sel93="SELECT * FROM medicine WHERE `mname`='$add' and pre='injection';";
$result93 = mysqli_query($con,$sel93);

$sel94="SELECT * FROM medicine WHERE `mname`='$add1' and pre='injection';";
$result94 = mysqli_query($con,$sel94);


if($res90=mysqli_num_rows($result90)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Infusion Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }

else	if($res91=mysqli_num_rows($result91)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Start Time you selected is not in the database.. Select proper time from the List or Please contact with IT Department"); ';
    echo '</script>';
    }

	else	if($res92=mysqli_num_rows($result92)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The End Time you selected is not in the database.. Select proper time from the List or Please contact with IT Department"); ';
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

$ins_query="insert into iinfusion (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`user`,`status`,`alert`,`status1`,`odate1`,`otime`,`addi`,`otime1`,`infu1`,`add1`,`qty1`,`qty2`,`pstatus`,`ortime`) 
values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$date','$infu','$user','Data Updated','$alert','Active','$adate','$time',' $add','$otime1','$infu1',' $add1','$qty1','$qty2','Ordered','$ortime')";
mysqli_query($con,$ins_query) or die(mysql_error());

}
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
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>


<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;">INPATIENT INFUSION NOTE</h1>

<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td colspan="20" align="right"><button onClick="goBack()">Back</button></td></tr>
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				
				<tr>	  
				<td colspan="20"><?php echo $data['adoc'];?></td></tr>
				
						
						
				
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
						<td colspan="3"><label><strong>Phone NO:</strong></label></td>
						<td colspan="3"><label><strong>Phone NO:</strong></label></td>
							
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data["pmrn"]; ?></td>  
             		<td colspan="3"><?php echo $data["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data["gender"]; ?></td>
					 <td colspan="4"><?php echo $data["pphone"]; ?></td>  
					 <td colspan="3"><?php echo $data["room"]; ?></td>  
					 <td colspan="3"><?php echo $data["room1"]; ?></td>  

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
<td colspan="2" align="center"><label><strong>Coution</strong></label></td> 
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
			  <td colspan="2" align="left"><input type="radio" name="alert" value="" checked="checked"> Regular <br> <input type="radio" name="alert" value="H. Alert"> <b>High Alert Medication<b></td>

</tr>


<tr>
<td colspan="20"align="right">&nbsp;&nbsp;<a href="idocinfusiondateimo?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>"><font size="4.5" color="#FF0000"><br><b>(See Datewise Medicine List)<b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="Submit">Confirm</button></td>
	  
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
<td colspan="1" align="center"><strong>Coution</strong></td>
<td colspan="1" align="center"><strong>Stop</strong></td>
<td colspan="1" align="center"><strong>ADD</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
$sel_query="Select * from iinfusion where pmrn= '$pmrn'and eid='$episode'and odate='$ad' and status1='Active' order by `ddate` DESC;";

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
	   
  	  <td align="center"colspan="1"<?php if($row['alert']== "H. Alert"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row['alert'];?></td>
		
		
<td align="center" colspan="1"><a onclick="return confirm_click();" href="iinfuupdate2?id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Stop</a></td>
	  <td align="center" colspan="1"><a onclick="return confirm_click1();"href="indocinfusionadd1?pmrn=<?php echo $row["pmrn"]; ?>&pname=<?php echo $row["pname"]; ?>&eid=<?php echo $row["eid"]; ?>&infusion=<?php echo $row["infusion"]; ?>&stime=<?php echo $row["otime"]; ?>&etime=<?php echo $row["otime1"]; ?>&infuqty=<?php echo $row["room"]; ?>&qty1=<?php echo $row["qty1"]; ?>&qty2=<?php echo $row["qty2"]; ?>&add1=<?php echo $row["addi"]; ?>&add2=<?php echo $row["add1"]; ?>&infu1=<?php echo $row["infu1"]; ?>&orderby=<?php echo $user; ?>&alert=<?php echo $row["alert"]; ?>&status=<?php echo $row["status"]; ?>&status1=<?php echo $row["status1"]; ?>">ADD For Tomorrow</a></td>
      </tr>
    <?php $count++; } ?>
	<tr><td colspan="10"><a target='_blank' href="testpdfinfu.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	</tr>

</table>
</form>
</body>

</html>
