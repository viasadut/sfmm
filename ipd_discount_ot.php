<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('bill','billin')"; 
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

$user=$_SESSION['sess_username'];
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];


//echo $new_charged=$charge*10/100;
//$pmrn=$_REQUEST['dname'];
//include("auth.php");
//echo $count1;
 
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);
$hos_doc_dis=$data['hos_doc_dis'];

$query45 = mysqli_query($db,"select * from ot where pmrn='$pmrn' and eid='$eid'");
$data5 = mysqli_fetch_assoc($query45);
$ot_id=$data5['id'];


$query4 = mysqli_query($db,"select COUNT(id) from otivisitendo where pmrn='$pmrn' and eid='$ot_id' and ugroup='Doctor'");
$data4= mysqli_fetch_assoc($query4);
$inves_num=$data4['COUNT(id)'];



$query5 = mysqli_query($db,"select SUM(charge) from otivisitendo where pmrn='$pmrn' and eid='$ot_id' and ugroup='Doctor'");
$data5= mysqli_fetch_assoc($query5);
$sum_bill=$data5['SUM(charge)'];
  
?>

<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);




?>
<?php
$full = $row39['fullname'];

?>

 


<?php

if(isset($_POST['but_update'])){


$pmrn1 = $_REQUEST['pmrn'];
$eid1 = $_REQUEST['eid'];
$discount_type = $_REQUEST['discount_type'];

$hos_dis = $_REQUEST['hos_dis'];
$rad_dis = $_REQUEST['rad_dis'];
$lab_dis = $_REQUEST['lab_dis'];

$taka1=$_REQUEST['taka'];
$taka=$taka1/$inves_num;
$percentage1=$_REQUEST['percentage'];
$percentage=$percentage1/100;
$sum_discount=$sum_bill*$percentage;



if(empty($_REQUEST['update']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}


            else {

              //$hos_doc_dis1=[];
                foreach($_POST['update'] as $updateid){

                  $db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
                  
$query3 = mysqli_query($db,"select * from otivisitendo where id='$updateid'");
                  $data3= mysqli_fetch_assoc($query3);
                  $inves_num3=$data3['user'];
                  $dname=$data3['infusion'];
                  $proce=$data3['vtype'];
                  $ot_id=$data3['eid'];
                  
$refund_time=date('Y-m-d H:i:s');
$edate=date('Y-m-d');
$disco=$_POST['eqty1_'.$updateid] / $inves_num;
$eqty2 = $_POST['eqty1_'.$updateid] - $disco;
$eqty22 = $_POST['eqty1_'.$updateid];
//$hos_doc_dis1=$hos_doc_dis+$eqty22;
			$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
			$objDB1 = mysqli_select_db($objConnect,"sfmmkpjnew");

			if($eqty22>0){
			$strSQL = "update otivisitendo set discount='$eqty22'";
			$strSQL .="WHERE id = '".$updateid."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);

            $strSQL1 = "insert into doc_dis(`dname`,`discount`,`proce`,`date`,`user`,`pmrn`,`eid`,`ot_id`,`edate`,`location`) values 
            ('$dname','$eqty22','$proce','$refund_time','$user','$pmrn','$eid','$ot_id','$edate','OT')";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);



      $date=date('Y-m-d');
      $ins_query3="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
        values ('$pmrn','DR','617410','$date','$eqty22','IPD_OT_DISCOUNT')";
        mysqli_query($con,$ins_query3) or die(mysql_error());
      
      
        $ins_query4="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
        values ('$pmrn','CR','111999','$date','$eqty22','IPD_OT_DISCOUNT')";
        mysqli_query($con,$ins_query4) or die(mysql_error());
      
    


      $query5555 = mysqli_query($db,"select SUM(discount) from doc_dis where pmrn='$pmrn' and eid='$eid' and location='OT'");
      $data5555= mysqli_fetch_assoc($query5555);
      
      
      $sum_bill55=$data5555['SUM(discount)'];
      
  
  
      $strSQL11 = "update inpatient set hos_doc_dis_ot='$sum_bill55' where pmrn='$pmrn' and eid='$eid'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery11 = mysqli_query($objConnect,$strSQL11);

      }

}


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
                 
$query555 = mysqli_query($db,"select SUM(discount) from otivisitendo where pmrn='$pmrn' and eid='$ot_id'");
$data555= mysqli_fetch_assoc($query555);
$sum_bill55=$data555['SUM(discount)'];


//$strSQL1 = "update inpatient set hos_doc_dis_ot='$sum_bill55' where pmrn='$pmrn' and eid='$eid'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
	//		$objQuery1 = mysqli_query($objConnect,$strSQL1);
			
$url="ipall_new_1_new_0?pmrn=$pmrn&id=$id&eid=$eid";
		
		header("Location: $url");
		
//echo '<script language="javascript">';
  //  echo 'alert("Succesful"); ';
    //echo '</script>';
	
			}
			
			
			
}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admission Form</title>
  
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
  width: 45%;
}

textarea {
  padding: 2px;
  height: 100px;
  border-radius: 2px;
  width: 100%;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 16px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;

  width: 100%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 3px;
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
  margin-bottom: 0px;
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
label1 {
  background-color: lightgreen;
  color: black;
  font-weight: bold;
  padding: 4px;
  text-transform: uppercase;
  
}


@media screen and (min-width: 1200px) {

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
  
  
  
  <link rel="stylesheet" href="styles.css">
  <script src='a_j_q/jquery-3.3.1.min.js' type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                // Check/Uncheck ALl
                $('#checkAll').change(function(){
                    if($(this).is(':checked')){
                        $('input[name="update[]"]').prop('checked',true);
                    }else{
                        $('input[name="update[]"]').each(function(){
                            $(this).prop('checked',false);
                        }); 
                    }
                });

                // Checkbox click
                $('input[name="update[]"]').click(function(){
                    var total_checkboxes = $('input[name="update[]"]').length;
                    var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

                    if(total_checkboxes_checked == total_checkboxes){
                        $('#checkAll').prop('checked',true);
                    }else{
                        $('#checkAll').prop('checked',false);
                    }
                });
            });
        </script>	
 <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='viewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='prescription/prescription/viewnew'><span>OPD Patients</span></a>
            
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
		 <li class='has-sub'><a href='gg1newdoc'><span>Set Patients Appointment</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
	   <li class='has-sub'><a href='app1doc'><span>Appointment Report</span></a>
            
         </li>
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
		<li class='has-sub'><a href='view3newrad'><span>Radiology Report</span></a>
            
         </li>
      </ul>
   </li>
   <li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form name="frmMain1" action="" method="post" > 

<!-- Form Title -->
		<h1>Investigation Charge Discount Panel</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->

		<label for="age"><strong>Doctor Name :</strong></label>
		<input name="fname" type="text" size="70" value="<?php echo $pmrn.', '.$eid;?>"readonly  style="font-size:20px; color:green;font-weight:bold;">
		<label for="age"><strong>Charge Type:</strong></label>
		<input name="mname" type="text"  size="70" value="OT DISCOUNT"readonly  style="font-size:20px; color:green;font-weight:bold;">

		
<table align="center" class="table table-bordered" id="dynamic_field" width="100%" border="1">  
		
		<tr><td colspan="20" align="center"bgcolor="skyblue"><label><strong>Doctor's Note</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="10" align="center"><strong>Doctor Name</strong></td>
      <td colspan="2" align="center"><strong>Date </strong></td>
      <td colspan="3" align="center"><strong>Charge</strong></td>
      <td colspan="3" align="center"><strong>Discount</strong></td>
	  		  

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];

$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
//$pmrn=$row['pmrn'];
//$id=$row['id'];
//$eid=$row['eid'];
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

$query198j_doc_ot = "SELECT * FROM ot where pmrn= '$pmrn' and eid='$eid' ORDER BY id DESC"; 
	 
  $result198j_doc_ot = mysqli_query($dbhandle,$query198j_doc_ot) or die(mysql_error());
  $row198j_doc_ot = mysqli_fetch_array($result198j_doc_ot);
  $test1c_doc_ot=	$row198j_doc_ot['eid'];



$count=1;
$sel_query="Select * from otivisitendo where pmrn= '$pmrn' and ieid='$test1c_doc_ot'  and c_status='0'group by `infusion` asc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

     
<td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
      <td align="center"colspan="10"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["odate"]; ?></td>  
      
	  
	  
<?php

$uu=$row["user"];
$dd=$row["infusion"];

$query55 = mysqli_query($db,"select SUM(room) from otivisitendo where pmrn='$pmrn' and ieid='$test1c_doc_ot' and user='$uu'");
$data55= mysqli_fetch_assoc($query55);



$query555 = mysqli_query($db,"select SUM(discount) from doc_dis where pmrn='$pmrn' and ieid='$test1c_doc_ot' and dname='$dd' and location='OT'");
$data555= mysqli_fetch_assoc($query555);
$sum_bill55=$data555['SUM(discount)'];



$sum_bill5=$data55['SUM(room)'];
?>
      
	  <td align="center"colspan="3"><?php echo $sum_bill5; ?>
  <input type="text" name="total_sum" value="<?php echo $sum_bill5;?>" />
  </td>  
<?php
$id = $row["id"];
?>	  
<td align="center"colspan="3"><input name="eqty1_<?= $id ?>" type="number" value="" max="<?php echo $sum_bill5-$sum_bill55;?>" id="eqty1" required ></td>                            
<td align="center"colspan="1"><input type='checkbox' name='update[]' value='<?= $id ?>' checked readonly hidden></td>						
	  
  	  

	  
      </tr>
    <?php $count++; } ?>

	
	
<input name="pmrn" type="text" value="<?php echo $pmrn;?>" required hidden>

<input name="eid" type="text" value="<?php echo $eid;?>"  required hidden>


<table>

<?php if($pmrn!='' and $pmrn!=0){echo'
<tr><td colspan="15">		<button type="submit" name="but_update">Confirm</button></td>';}?>

</table>
</form>






<form name="frmMain1" action="" method="post" > 

<!-- Form Title -->
		<h1>Discount View</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->

		
<table align="center" class="table table-bordered" id="dynamic_field" width="100%" border="1">  
		
		<tr><td colspan="20" align="center"bgcolor="skyblue"><label><strong>Doctor's Note</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="10" align="center"><strong>Doctor Name</strong></td>
      <td colspan="2" align="center"><strong>Discount Amount </strong></td>
      	  

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];

$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
//$pmrn=$row['pmrn'];
//$id=$row['id'];
//$eid=$row['eid'];
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

$count=1;
$sel_query="Select * from doc_dis where pmrn= '$pmrn' and eid='$eid' and location='OT';";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

     
<td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
      <td align="center"colspan="10"><?php echo $row["dname"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["discount"]; ?></td>  
      
	  
	  

	  
      </tr>
    <?php $count++; } ?>

	
	
</table>
</form>



</body>

</html>
