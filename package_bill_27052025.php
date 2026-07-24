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
$aatime=date('d/m/Y H:i:s'); 
$user=$_SESSION["sess_username"];
$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$dname=$_REQUEST['dname'];
//$full=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
$date77=date('Y-m-d');
$pdate=date('Y-m-d'); 
$pdate1=date('Y-m-d H:i:s');  

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$bdate=$_REQUEST['bdate'];
$pphone=$_REQUEST['pphone'];
$pname=$_REQUEST["pname"];
$psex=$_REQUEST["psex"];
$eid=date('dmY');
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

/*$query4 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);
$ddd=$data['dname'];
*/
$query5 = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
$data1 = mysqli_fetch_assoc($query5);
$bdate_p=$data1['bdate'];
$bdate_p1=date('d-m-Y', strtotime($data1['bdate']));
$bdate_p2=date_create($data1['bdate']);
$pdate5= date('d-m-Y');
$pdate6=date_create($pdate5);


$dis=$data1['dis'];
$ptype=$data1['ptype'];
$padd=$data1['padd'];

$diff=date_diff($pdate6,$bdate_p2);
$diff1= $diff->format("%y Y %m M %d D");
$diff1;
$diff2= $diff->format("%y");

/*$dd=date('d-m-Y',strtotime($data1['bdate']));
$dd2=date_create($dd);
*/




  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


$dname =$_REQUEST["dname"];
//$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$date = date('m/d/Y');
$medi = $_REQUEST['medi'];
$pins = $_REQUEST['pins'];
$bar = $_REQUEST['bar'];
$vehicle1 = $_REQUEST['vehicle1'];
$due_remarks = $_REQUEST['due_remarks'];
$t_price=$_REQUEST['t_price'];
//$dtime = $_REQUEST['dtime'];

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

  
$query198 = "SELECT SUM(price), package FROM alltest where pmrn='$pmrn'and eid='$eid' and package!='' and billstatus='Billed'"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
$test1=	$row198['SUM(price)'];
$pack=	$row198['package'];



$servername = "localhost";
$username1 = "root";
$password1 = "Godiloveu16";
$dbname1 = "sfmmkpjnew";
$appdate=date('Y-m-d');
$apptime=date('Y-m-d H:i:s');
// Create connection
$conn = new mysqli($servername, $username1, $password1, $dbname1);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "insert into pms_bill(pmrn,eid,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks) VALUES
('$pmrn', '$eid', 'OPD', '$t_price', '$appdate', '$apptime', '$user', '$pack', '$pack','$mno', '$vehicle1','$due_remarks')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;


$query1="update alltest set `billno`='$last_id' where `pmrn`='$pmrn' and eid='$eid' and billstatus='Billed'";

$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query12="update package_bill_con set `billno`='$last_id' where `pmrn`='$pmrn' and eid='$eid'";

$result12 = mysqli_query($con,$query12) or die ( mysqli_error());


header("Location: bill_module/package_bill_pdf.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid");
      


//  header("location:$url");
  
}

else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>


<?php
if(isset($_POST['Submit1']))
{


$dname =$_REQUEST["dname"];
//$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$date = date('m/d/Y');
$date5 = date('Y-m-d');
$medi = $_REQUEST['medi'];
$pins = $_REQUEST['pins'];
$bar = $_REQUEST['bar'];
$vehicle1 = $_REQUEST['vehicle1'];
$due_remarks = $_REQUEST['due_remarks'];

//$dtime = $_REQUEST['dtime'];

$sel90="SELECT * FROM set_package WHERE `iname`='$medi';";
$result90 = mysqli_query($con,$sel90);

$sel900="SELECT * FROM doctor WHERE `dname`='$dname' and status in ('Active','active1');";
$result900 = mysqli_query($con,$sel900);
if($res900=mysqli_num_rows($result900)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Consultant Name is not in the Database List.. Please contact with Concern Department"); ';
    echo '</script>';
    }



/*else if($res90=mysqli_num_rows($result90)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Investigation Name is not in the Database List.. Please contact with Concern Department"); ';
    echo '</script>';
    }*/



    
    else if($res90=mysqli_num_rows($result90)>0)
{

  $appdate=date(Y-m-d);
  $db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');


$strSQL1 = "select DISTINCT MAX(s_no) from pms_bill where date='$appdate'";
$objQuery1 = mysqli_query($con,$strSQL1);
$obj = mysqli_fetch_array($objQuery1);
$mno=$obj['MAX(s_no)']+1;
$mno1=$obj['MAX(s_no)'];
$billno=date('ymd').$mno;


$apptime=date('Y-m-d H:i:s');


$strSQL2 = "select SUM(tprice) from pms_bill where date='$appdate'";
$objQuery2 = mysqli_query($con,$strSQL2);
$obj2 = mysqli_fetch_array($objQuery2);


//$query15 = mysqli_query($db,"select * from package_inves where package_name='$medi' and status='Active' and type in ('LAB','Lab','lab','RAD','Rad','rad','spd','spd1','SPD')");
$query15 = mysqli_query($db,"select * from package_inves where package_name='$medi' and status='Active'");
  while($data15 = mysqli_fetch_assoc($query15))
  //while($row = mysqli_fetch_assoc($result)) 
  {
  
    //$pack_name=$data15["package_name"];
  $ii=$data15["iname"];
  $p_price=$data15["p_price"];
  
  
  $query159 = mysqli_query($db,"select * from radio where iname='$ii'");
  $data159 = mysqli_fetch_assoc($query159);
  $type=$data159["type"];
  $price=$data159["price"];
  $code=$data15["code"];
  $subtype=$data159["subtype"];
  //echo $type;
  //echo $type;
  $url = "manual_bill1.php?pmrn=$pmrn&ID=$id"; 
  
  
  $link=$data159["link"];
  $linkv=$data159["linkv"];
  $report=$data159["report"];
  $reportv=$data159["reportv"];
  
  

  
  
  if($code!='' and $data15['type']!='Consultation')
  {
  
  
  $ins_query="insert into alltest (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`price`,`code`,`link`,`date1`,`linkv`,`report`,`reportv`,`location`,`page`,`pgender`,`subtype`,`billstatus`,`billby`,`billdate`,`pphone`,`barcode`,`barcode1`,`billtime`,`package`,`billno`) 
  values ('$dname', '$pmrn','$pname','$eid','$ii','$pins','$date','$type','$p_price','$code','$link','$date77','$linkv','$report','$reportv','OPD','$bdate','$psex','$subtype','Billed','$user','$pdate','$pphone','$bar','$bar','$pdate1','$medi','')";
  mysqli_query($con,$ins_query) or die(mysql_error());
  
  }


  else if($code!='' and $data15['type']=='Consultation')
  {
  
  
  /*$ins_query="insert into pappnew (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`price`,`code`,`link`,`date1`,`linkv`,`report`,`reportv`,`location`,`page`,`pgender`,`subtype`,`billstatus`,`billby`,`billdate`,`pphone`,`barcode`,`barcode1`,`billtime`,`package`,`billno`) 
  values ('$iname', '$pmrn','$pname','$eid','$ii','$pins','$date','$type','$p_price','$code','$link','$date77','$linkv','$report','$reportv','OPD','$bdate','$psex','$subtype','Billed','$user','$pdate','$pphone','$bar','$bar','$pdate1','$medi','')";
  mysqli_query($con,$ins_query) or die(mysql_error());
*/


  $ins_query="insert into pappnew (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`user`,`yage`,`bdate`,`dis`,`aatime`,`adate1`,`ptype`,`page1`,`bill`,`billby`,`billtime`) values 
('$pname', '$pmrn','$pphone','$padd','$ii','$date','$medi','NOT SEEN','$bdate','$psex','$user','$diff2','$bdate_p','$dis','$aatime','$date77','$ptype','$ii','BILLED','$user','$aatime')";
mysqli_query($con,$ins_query) or die(mysql_error());
  }
  }


  $ins_query55="insert into package_screening (`pname`,`pmrn`,`pphone`,`padd`,`sdate`,`page`,`status`,`package_name`,`psex`,`eid`) values 
  ('$pname', '$pmrn','$pphone','$padd','$date77','$bdate','Active','$medi','$psex','$eid')";
  mysqli_query($con,$ins_query55) or die(mysql_error());
  
}

/*else {

  $ins_query="insert into package_bill_con (`dname`,`pmrn`,`eid`,`remarks`,`amount`,`date`) 
  values ('$dname', '$pmrn','$eid','$medi','$pins','$date5')";
  mysqli_query($con,$ins_query) or die(mysql_error());


}*/



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

  
$query198 = "SELECT SUM(price), package FROM alltest where pmrn='$pmrn'and eid='$eid' and package!=''"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
$test_inves=	$row198['SUM(price)'];
//echo $test1;
$package_name=$row198['package'];
$query198p = "SELECT SUM(amount) FROM package_bill_con where pmrn='$pmrn'and eid='$eid'"; 
	 
$result198p = mysqli_query($dbhandle,$query198p) or die(mysql_error());

// Print out result
$row198p = mysqli_fetch_array($result198p);
$test_con=	$row198p['SUM(amount)'];


$query198_d = "SELECT SUM(tprice) FROM package_inves where package_name='$package_name' and type IN('Disposable','Medical Disposable','MEDICAL EQUIPMENT','MEDICAL DISPOSAL')"; 
	 
$result198_d = mysqli_query($dbhandle,$query198_d) or die(mysql_error());

// Print out result
$row198_d = mysqli_fetch_array($result198_d);
$test_con_d=	$row198_d['SUM(tprice)'];



$test1=$test_inves+$test_con+$test_con_d;





$query198_all = "SELECT SUM(tprice) FROM package_inves where package_name='$package_name' and status='Active'"; 
	 
$result198_all = mysqli_query($dbhandle,$query198_all) or die(mysql_error());

// Print out result
$row198_all = mysqli_fetch_array($result198_all);
$test1_all=	$row198_all['SUM(tprice)'];
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
   <li><a href='manual_bill.php'><span>Home</span></a></li>
   
   
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
				<td colspan="6"><input list="browsers10" name="dname" size=60% class="form-control" autocomplete="off" value='<?php echo $dname;?>'required readonly>
  <datalist id="browsers10">
			        
					<option value='<?php echo $dname;?>'selected><?php echo $dname;?></option>
			</datalist></td>
				<td colspan="6"><?php echo $pname; ?></td>
				<td colspan="4"><?php echo $pmrn; ?></td>
				<td colspan="4"><?php echo $eid; ?> </td>	
												
						
				
</tr>
						

						
						
					


				

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Form</strong></label></td> </tr>
<tr><td colspan="10" align="center"><label><strong>Investigation</strong></label></td> 

<td colspan="8" align="center"><label><strong>Price</strong></label></td> 
<td colspan="2" align="center"><label><strong>Add</strong></label></td> 
</tr>
<tr>
<td colspan="10" align="center">



<select id="pmrn" onchange="GetDetail(this.value)" class="con_charge" list="categoryname" autocomplete="off" name='medi' >						<option value=''>-Select Package-</option>
				<?php 
			$sql = "select * from `radio` where type='Package'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->iname."'>".$row->iname."</option>";
				}
			}
			?>
      
      <?php 
			$sql1 = "select * from `privilege` where status='Approved' and dname='$dname'";
			$res1 = mysqli_query($con, $sql1);
			if(mysqli_num_rows($res1) > 0) {
				while($row1 = mysqli_fetch_object($res1)) {
					echo "<option value='".$row1->pname."'>".$row1->pname."</option>";
				}
			}
			?>
      
      
      </select>
			
			
			
			<link rel="stylesheet"
			href=
"jsnew/chosen.min.css" />

		<!--These jQuery libraries for select2
			need to be included-->
		<script src=
"jsnew/select2.min.js">
	</script>
		<link rel="stylesheet"
			href=
"jsnew/select2.min.css" />			
			<script>
$(document).ready(function() {
    $('.con_charge').select2();
});
</script>
			
			</td>

			
			
<td colspan="8" align="center"><input type="text" name="pins" value="" id="price" class="form-control action">
<input  name="bar"  id="bar" type="hidden" value="<?php echo date('dmYs');?>">






</td>
<td colspan="2"align="right"><button type="submit" name="Submit1">Add</button>

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
$sel_query="Select * from alltest where pmrn= '$pmrn' and eid='$eid' and package !='' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
			      <td align="center"colspan="3"><?php echo $row["ins"]; ?></td>
				  <td align="center"colspan="2"><?php echo $row["price"]; ?></td>
				  
				  
				  
				  
  	  

	  
      </tr>
    <?php $count++; } ?>


    <?php
	
  $user=$_SESSION["sess_username"];
  $pmrn=$_REQUEST["pmrn"];
  $eid=date('dmY');
  //$dname=$_REQUEST["dname"];
  //$id1=$_REQUEST["ID"];
  
  //$id=$_REQUEST["id"];
  //$episode=$data59["eid"];
  
  //$count=1;
  $sel_query_o="Select * from package_inves where package_name= '$package_name' and status='Active' and type IN('Disposable','Medical Disposable','MEDICAL EQUIPMENT','MEDICAL DISPOSAL','Consultation') order by `id` DESC;";
  
  $result_o = mysqli_query($con,$sel_query_o);
  
  while($row_o = mysqli_fetch_assoc($result_o)) 
  { ?>    <tr>
  
        <td align="center" colspan="1"><?php echo $count; ?></td>
        <td align="center"colspan="2"><?php echo $pmrn; ?></td>
        <td align="center"colspan="10"><?php echo $row_o["iname"]; ?></td>
            <td align="center"colspan="3"><?php echo $row_o["qty"]; ?></td>
            <td align="center"colspan="2"><?php echo $row_o["tprice"]; ?></td>
              
            
            
            
           
  
      
        </tr>
      <?php $count++; } ?>
  




<?php
	
  $user=$_SESSION["sess_username"];
  $pmrn=$_REQUEST["pmrn"];
  $eid=date('dmY');
  //$dname=$_REQUEST["dname"];
  //$id1=$_REQUEST["ID"];
  
  //$id=$_REQUEST["id"];
  //$episode=$data59["eid"];
  
  //$count=1;
  $sel_query1="Select * from package_bill_con where pmrn= '$pmrn' and eid='$eid' order by `id` DESC;";
  
  $result1 = mysqli_query($con,$sel_query1);
  
  while($row1 = mysqli_fetch_assoc($result1)) 
  { ?>    <tr>
  
        <td align="center" colspan="1"><?php echo $count; ?></td>
  
        <td align="center"colspan="2"><?php echo $row1["pmrn"]; ?></td>
            <td align="center"colspan="10"><?php echo $row1["dname"]; ?></td>
              <td align="center"colspan="3"><?php echo $row1["remarks"]; ?></td>
            <td align="center"colspan="2"><?php echo $row1["amount"]; ?></td>
            
            
            
            
        
  
      
        </tr>
      <?php $count++; } ?>

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Cost For The Selected Investigation Will Be:<?php echo $test1_all;?> (BDT)</strong></td></tr>
<input type="hidden" value="<?php echo $test1;?>" name="t_price">
<tr>
<td colspan="20">	     
<input type="radio" id="vehicle1" name="vehicle1" value="Cash"  id="chkPassport"onclick="EnableDisableTextBox(this)"  style="height:20px; width:20px; color:red;"checked><span style="font-size:20px;color:red;font-weight:bold;">Cash</span>				 
<input type="radio" id="vehicle1" name="vehicle1" value="Bikash"id="chkPassport1" onclick="EnableDisableTextBox1(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Bikash</span>	
<input type="radio" id="vehicle1" name="vehicle1" value="Card"id="chkPassport2" onclick="EnableDisableTextBox2(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Card</span>				 
<input name="due_remarks" type="text" size="20" style="text-transform:uppercase" value="" id="sdate21" disabled="disabled" placeholder="Reference No">
</td>
</tr>	     

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">Confirm</button>
    </td>
	  
</tr>

</table>

</form>


<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("sformat").value = "";

				document.getElementById("charge").value = "";
				document.getElementById("porder").value = "";
				
				return;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						document.getElementById
							("price").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
						//	document.getElementById(
							//"charge").value = myObj[1];
							
							//document.getElementById(
							//"porder").value = myObj[2];
							
							
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "pri_price.php?pmrn=" + str + "&dname=<?php echo $dname;?>", true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  


</body>



</html>


<script type="text/javascript">
    function EnableDisableTextBox(chkPassport) {
   
        
        var txtPassportNumber4 = document.getElementById("sdate21");
        txtPassportNumber4.disabled = chkPassport.unchecked ? false : true;
        if (!txtPassportNumber4.disabled) {
            txtPassportNumber4.focus();
        }
		
		
    }
	
		function EnableDisableTextBox1(chkPassport1) {
   
        
        var txtPassportNumber6 = document.getElementById("sdate21");
        txtPassportNumber6.disabled = chkPassport1.checked ? false : true;
        if (!txtPassportNumber6.disabled) {
            txtPassportNumber6.focus();
        }
	}
	
	function EnableDisableTextBox2(chkPassport2) {
   
        
        var txtPassportNumber6 = document.getElementById("sdate21");
        txtPassportNumber6.disabled = chkPassport2.checked ? false : true;
        if (!txtPassportNumber6.disabled) {
            txtPassportNumber6.focus();
        }
	}
</script>
