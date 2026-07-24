<?php 
       session_start();
       include_once 'dbconfig.php';
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
//$eid=date('dmY');
$eid=$_REQUEST["eid"];
$url="package_bill?pmrn=$pmrn&ID=$id&dname=$dname&bdate=$bdate&pphone=$pphone&pname=$pname&psex=$psex&eid=$eid";

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
$ptype=$data1['type'];
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

if(isset($_POST['Submit4']))
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
('$pmrn', '$eid', 'OPD', '$t_price', '$appdate', '$apptime', '$user', 'Package', '$pack','$mno', '$vehicle1','$due_remarks')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;


$query1="update alltest set `billno`='$last_id',billstatus='Billed',billby='$user' where `pmrn`='$pmrn' and eid='$eid'";

$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query12="update package_bill_con set `billno`='$last_id' where `pmrn`='$pmrn' and eid='$eid'";

$result12 = mysqli_query($con,$query12) or die ( mysqli_error());




$date=date('Y-m-d');


		$ins_query="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','CR','$tb_data','$date','$t_price','OPD_INVES_PACKAGE')";
		mysqli_query($con,$ins_query) or die(mysql_error());

		
		$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','DR','615100','$date','$t_price','OPD_INVES_PACKAGE')";
		mysqli_query($con,$ins_query2) or die(mysql_error());
		



//header("Location: bill_module/package_bill_pdf.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid");
header("Location: new_bill/new_opd_payment_consultation1_new_inves.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid");
      


//  header("location:$url");
  
}

else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>


<?php
if(isset($_POST['Submit12']))
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
$ctype = $_REQUEST['ctype'];
//$dtime = $_REQUEST['dtime'];

$sel90="SELECT * FROM set_package WHERE `iname`='$medi';";
$result90 = mysqli_query($con,$sel90);

/*$sel900="SELECT * FROM doctor WHERE `dname`='$dname' and status in ('Active','active1');";
$result900 = mysqli_query($con,$sel900);
if($res900=mysqli_num_rows($result900)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Consultant Name is not in the Database List.. Please contact with Concern Department"); ';
    echo '</script>';
    }

*/

/*else if($res90=mysqli_num_rows($result90)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Investigation Name is not in the Database List.. Please contact with Concern Department"); ';
    echo '</script>';
    }*/



    
    //else if($res90=mysqli_num_rows($result90)>0)

    if($res90=mysqli_num_rows($result90)>0)
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
  //$url = "manual_bill1.php?pmrn=$pmrn&ID=$id"; 
  
  
  $link=$data159["link"];
  $linkv=$data159["linkv"];
  $report=$data159["report"];
  $reportv=$data159["reportv"];
  
  

  
  
  if($code!='' and $data15['type']!='Consultation')
  {
  
  
  $ins_query="insert into alltest (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`price`,`code`,`link`,`date1`,`linkv`,`report`,`reportv`,`location`,`page`,`pgender`,`subtype`,`billdate`,`pphone`,`barcode`,`barcode1`,`billtime`,`package`,`billno`,`dprice`) 
  values ('Medical Officer', '$pmrn','$pname','$eid','$ii','$pins','$date','$ptype','$p_price','$code','$link','$date77','$linkv','$report','$reportv','OPD','$bdate','$psex','$subtype','$pdate','$pphone','$bar','$bar','$pdate1','$medi','','$p_price')";
  mysqli_query($con,$ins_query) or die(mysql_error());
  
  }


  else if($code!='' and $data15['type']=='Consultation')
  {
  
  
  /*$ins_query="insert into pappnew (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`price`,`code`,`link`,`date1`,`linkv`,`report`,`reportv`,`location`,`page`,`pgender`,`subtype`,`billstatus`,`billby`,`billdate`,`pphone`,`barcode`,`barcode1`,`billtime`,`package`,`billno`) 
  values ('$iname', '$pmrn','$pname','$eid','$ii','$pins','$date','$type','$p_price','$code','$link','$date77','$linkv','$report','$reportv','OPD','$bdate','$psex','$subtype','Billed','$user','$pdate','$pphone','$bar','$bar','$pdate1','$medi','')";
  mysqli_query($con,$ins_query) or die(mysql_error());
*/


  /*$ins_query="insert into pappnew (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`user`,`yage`,`bdate`,`dis`,`aatime`,`adate1`,`ptype`,`page1`,`bill`,`billby`,`billtime`) values 
('$pname', '$pmrn','$pphone','$padd','$ii','$date','$medi','NOT SEEN','$bdate','$psex','$user','$diff2','$bdate_p','$dis','$aatime','$date77','$ptype','$ii','BILLED','$user','$aatime')";
mysqli_query($con,$ins_query) or die(mysql_error());

*/
$ins_query="insert into package_bill_con (`dname`,`pmrn`,`eid`,`remarks`,`amount`,`date`,`location`,`type`,`pname`,`padd`,`pphone`,`page`,`psex`,`yage`,`bdate`,`dis`,`ptype`) 
  values ('$ii', '$pmrn','$eid','$medi','$p_price','$date5','Consultation','Package','$pname','$padd','$pphone','$diff1','$psex','$diff2','$bdate_p','$dis','$ptype')";
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
header("Refresh: .1; URL=$url");


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





$query198_all = "SELECT SUM(tprice) FROM package_inves where package_name='$package_name' and status='Active' and type NOT IN ('Consultation')"; 
	 
$result198_all = mysqli_query($dbhandle,$query198_all) or die(mysql_error());

// Print out result
$row198_all = mysqli_fetch_array($result198_all);
$test1_all1=	$row198_all['SUM(tprice)'];



$query198_all5 = "SELECT SUM(amount) FROM package_bill_con where pmrn='$pmrn' and eid='$eid'"; 
	 
$result198_all5 = mysqli_query($dbhandle,$query198_all5) or die(mysql_error());

// Print out result
$row198_all5 = mysqli_fetch_array($result198_all5);

$test1_con=	$row198_all5['SUM(amount)'];


$test1_all=	$test1_all1+$test1_con;
?>

<!DOCTYPE html>
<html lang="en" >

<head>
<meta charset="utf-8">
<title>View Records</title>
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
<tr><td colspan="18" align="center"><label><strong>Investigation</strong></label></td> 


<td colspan="2" align="center"><label><strong>Add</strong></label></td> 
</tr>
<tr>
<td colspan="18" align="center">



<select id="pmrn" onchange="GetDetail(this.value)" class="con_charge" list="categoryname" autocomplete="off" name='medi' style="width:700px;">						<option value=''>-Select Package-</option>
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

<?php 
			$sql2 = "select * from `doctor` where status='Active'";
			$res2 = mysqli_query($con, $sql2);
			if(mysqli_num_rows($res1) > 0) {
				while($row2 = mysqli_fetch_object($res2)) {
					echo "<option value='".$row2->dname."'>".$row2->dname."</option>";
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

			
			
			

<input  name="bar"  id="bar" type="hidden" value="<?php echo date('dmYs');?>">







<td colspan="2"align="right"><button type="submit" name="Submit12">Add</button>

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
//$eid=date('dmY');
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
  //$eid=date('dmY');
  //$dname=$_REQUEST["dname"];
  //$id1=$_REQUEST["ID"];
  
  //$id=$_REQUEST["id"];
  //$episode=$data59["eid"];
  
  //$count=1;
  $sel_query_o="Select * from package_inves where package_name= '$package_name' and status='Active' and type IN('Disposable','Medical Disposable','MEDICAL EQUIPMENT','MEDICAL DISPOSAL') order by `id` DESC;";
  
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
  //$eid=date('dmY');
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
            
          <td>  <?php if($row1['a_status']==0 and $row1['location']=='Consultation'){
echo '<input type="button" name="edit" value="Set Appointment" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data3">';
}

/*if($row1['a_status']==0 and $row1['location']=='Procedure'){
     echo '<input type="button" name="edit" value="Set Appointment" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data4">';
     }
  */          
else { echo "<span style='color:green;font-weight:bold;font-size:16px;'>appointment Set";}
            
            
   ?>     
  
      </td>
        </tr>
      <?php $count++; } ?>

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Cost For The Selected Investigation Will Be:<?php echo $test1_all;?> (BDT)</strong></td></tr>
<input type="hidden" value="<?php echo $test1;?>" name="t_price">
<tr>
<td colspan="20" hidden>	     
<input type="radio" id="vehicle1" name="vehicle1" value="Cash"  id="chkPassport"onclick="EnableDisableTextBox(this)"  style="height:20px; width:20px; color:red;"checked><span style="font-size:20px;color:red;font-weight:bold;">Cash</span>				 
<input type="radio" id="vehicle1" name="vehicle1" value="Bikash"id="chkPassport1" onclick="EnableDisableTextBox1(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Bikash</span>	
<input type="radio" id="vehicle1" name="vehicle1" value="Card"id="chkPassport2" onclick="EnableDisableTextBox2(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Card</span>				 
<input name="due_remarks" type="text" size="20" style="text-transform:uppercase" value="" id="sdate21" disabled="disabled" placeholder="Reference No">
</td>
</tr>	     

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit4">Confirm</button>
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


<div id="dataModal3" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail3">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal3" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Consultation Appointment Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form3" name="frmMain23">  
					 
					 
                                       
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn3" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Package Name</label>  
                          <input type="text" name="pname" id="ppluse3" class="form-control"  size="15" readonly>  
						  
						  
						  <label>Service Type</label>                          
                          <input type="text" name="bgroup" id="dname" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">
						  
                         						 

                          <label>Select Consultant</label>                          
                          
                          <select class="con_charge1" name='doc_name' style="font-size:18px;color:red;font-weight:blod;width:565px;">						<option value=''>-Select Consultant-</option>
                          <?php 
			$sql22 = "select * from `doctor` where status in ('Active','active')";
			$res22 = mysqli_query($con, $sql22);
			if(mysqli_num_rows($res22) > 0) {
				while($row22 = mysqli_fetch_object($res22)) {
					echo "<option value='".$row22->dname."'>".$row22->dname."</option>";
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
    $('.con_charge1').select2();
});
</script>



                          
                           <input type="hidden" name="employee_id3" id="employee_id3" />  
						   
                           
						   <input type="hidden" name="pphone" id="pphone" />  
					<br>	  
						  <label><input type="submit" name="insert" id="insert453" value="Insert" class="btn btn-success"></label>  
					 
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
</html>
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form3')[0].reset();  
      });  
      $(document).on('click', '.edit_data3', function(){  
           var employee_id3 = $(this).attr("id");  
           $.ajax({  
                url:"package_patient.php",  
                method:"POST",  
                data:{employee_id3:employee_id3},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn3').val(data.pmrn);  
                     $('#ppluse3').val(data.remarks);  
					 $('#dname').val(data.dname);  
					$('#adate').val(data.adate1); 
					 $('#temp3').val(data.room); 
					 $('#app_dat3').val(data.infusion); 
					 $('#bagno').val(data.bagno); 
					 //$('#txtHint').val; 
                          $('#local').val(data.l_doc); 			 
                     $('#pbp').val(data.dname); 
					 $('#pbp3').val(data.status); 
					 
					 
					 
					  
                     
					 
                     $('#employee_id3').val(data.id);  
                     $('#insert453').val("Confirm");  
                     $('#add_data_Modal3').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form3').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn3').val() == "")  
           {  
                alert("MRN is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"update_doc_appointment.php",  
                     method:"POST",  
                     data:$('#insert_form3').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form3')[0].reset();  
                          $('#add_data_Modal3').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>




<div id="dataModal4" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail4">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal4" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Procedure Appointment Form</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form4" name="frmMain24">  
					 
					 
                                       
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn4" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Package Name</label>  
                          <input type="text" name="pname" id="ppluse4" class="form-control"  size="15" readonly>  
						  
						  
						  <label>Service Type</label>                          
                          <input type="text" name="bgroup" id="dname4" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;">
						  
                         						 

                          <label>Select Consultant</label>                          
                          
                          <select class="con_charge4" name='doc_name4' style="font-size:18px;color:red;font-weight:blod;width:565px;">						<option value=''>-Select Package-</option>
                          <?php 
			$sql2 = "select * from `doctor` where status='Active'";
			$res2 = mysqli_query($con, $sql2);
			if(mysqli_num_rows($res1) > 0) {
				while($row2 = mysqli_fetch_object($res2)) {
					echo "<option value='".$row2->dname."'>".$row2->dname."</option>";
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
    $('.con_charge4').select2();
});
</script>



                          
                           <input type="hidden" name="employee_id4" id="employee_id4" />  
						   
                           
						   <input type="hidden" name="pphone" id="pphone" />  
					<br>	  
						  <label><input type="submit" name="insert" id="insert454" value="Insert" class="btn btn-success"></label>  
					 
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
</html>
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form4')[0].reset();  
      });  
      $(document).on('click', '.edit_data4', function(){  
           var employee_id4 = $(this).attr("id");  
           $.ajax({  
                url:"package_patient_pro.php",  
                method:"POST",  
                data:{employee_id4:employee_id4},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn4').val(data.pmrn);  
                     $('#ppluse4').val(data.remarks);  
					 $('#dname4').val(data.dname);  
					$('#adate').val(data.adate1); 
					 $('#temp3').val(data.room); 
					 $('#app_dat4').val(data.infusion); 
					 $('#bagno').val(data.bagno); 
					 //$('#txtHint').val; 
                          $('#local').val(data.l_doc); 			 
                     $('#pbp').val(data.dname); 
					 $('#pbp4').val(data.status); 
					 
					 
					 
					  
                     
					 
                     $('#employee_id4').val(data.id);  
                     $('#insert454').val("Confirm");  
                     $('#add_data_Modal4').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form4').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn4').val() == "")  
           {  
                alert("MRN is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"update_doc_appointment.php",  
                     method:"POST",  
                     data:$('#insert_form4').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form4')[0].reset();  
                          $('#add_data_Modal4').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>
