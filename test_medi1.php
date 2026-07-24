<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="pharmacy"){
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
$dd= date('m/d/Y',strtotime("+1 days")); 
$user=$_SESSION["sess_username"];
$pdate=date("d/m/Y H:i:s");
$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$dname=$row139['fullname'];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data59 = mysqli_fetch_assoc($query4);
  $date=date('d/m/Y');

  $noti=$data59['medinoti'];
  

  
//$sql90="Select * from imedi3 where pmrn= '$pmrn' and eid='$eid'and status !='Cancel' and odate='$dd' and pstatus='Ordered' order by `time` and `infusion` asc;";
//$result90=mysql_query($sql90);

//$count90=mysql_num_rows($result90);
  
  
?>


<?php
require('db1.php');
if(isset($_POST['btnDelete']))

if(empty($_REQUEST['chkDel']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}
else {
$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");

$pno=date('iims');  


	for($count=0;$count<count($_POST["chkDel"]);$count++)
	{
		if($_POST["chkDel"][$count] != "")
		{
			
$runningTime = date('dsiY')+$_POST["chkDel"][$count];
			$bar_code = date('iYds');			
			
			
			$sel99="SELECT * FROM imedi3 WHERE `id`='".$_POST["chkDel"][$count]."'";
$result99 = mysqli_query($con,$sel99);
$medi_take=mysqli_fetch_assoc($result99);
$mcode=$medi_take['code'];
$iidd=$medi_take['id'];
$reuse=$medi_take['reuse'];
			
			$sel95="SELECT * FROM medicine WHERE `code`='$mcode' and status='Active';";
$result95 = mysqli_query($con,$sel95);
$b_chk=mysqli_fetch_assoc($result95);
$brand=$b_chk['brand1'];
$m_qty=$b_chk['tqty']-1;

//$sel_re="SELECT * FROM medicine WHERE `code`='$mcode' and status='Active' and pre IN('Syrup','PEDIATRIC DROPS','Nasal Spray','Ointment','Eye Drop','Powder','Ear Drop','Soap','Cream','Spray','Shampoo','Jelly','Lotion','Gel','ORAL GEL','Eye Ointment','Nasal Drop','Inhaler','Oral paste','Drop','Pediatric drop','viscous eye drop','Pediatrics Drop');";
//$result_re = mysqli_query($con,$sel_re);


$sel96="SELECT * FROM medi_stock WHERE `code`='$mcode' and add_qty>0 and location='Pharmacy' order by id asc limit 1;";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=$b_chk_m['add_qty'];
$m_qty1=$b_chk_m['add_qty']-1;
$tfid=$b_chk_m['rfid'];
$g_name=$b_chk_m['g_name'];
$bb_name=$b_chk_m['b_name'];
$u_price=$b_chk_m['u_price'];


$dd=date('m/d/Y');
			




$adate= date('Y-m-d');

if($res95=mysqli_num_rows($result95)>0 and $mm_qty>0 and $reuse==''){
	

$strSQL = "UPDATE imedi3 set pstatus='Served', puser='$user', pdate='$pdate',rfid='$runningTime',pno='$pno',rfid1='$tfid' ";
			$strSQL .="WHERE id = '".$iidd."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);
	
	
	
$ins_query4="update medi_stock set `add_qty`='$m_qty1' where code='$mcode' and location='Pharmacy' and rfid='$tfid'";
mysqli_query($con,$ins_query4) or die(mysql_error());

$strSQL4 = "UPDATE medicine set tqty='$m_qty'";
			$strSQL4 .="WHERE code = '$mcode' ";
			$objQuery4 = mysqli_query($con,$strSQL4);

	$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`brand`,`pmrn`,`eid`,`rfid`,`status`,`location`,`iidd`,`code`) values
			('$g_name','1','$u_price','$u_price','$user','$adate','$bb_name','$pmrn','$eid','$tfid','Sale','IPD','$iidd','$mcode')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);





			
}

else if($res95=mysqli_num_rows($result95)>0 and $mm_qty>0 and $reuse=='Reuse'){
	

	
$strSQL = "UPDATE imedi3 set pstatus='Served', puser='$user', pdate='$pdate',rfid='$runningTime',pno='$pno',rfid1='$tfid' ";
			$strSQL .="WHERE pmrn ='$pmrn' and eid ='$eid' and code ='$mcode' and odate='$dd'";
			$objQuery = mysqli_query($objConnect,$strSQL);
	
	
	
$ins_query4="update medi_stock set `add_qty`='$m_qty1' where code='$mcode' and location='Pharmacy' and rfid='$tfid'";
mysqli_query($con,$ins_query4) or die(mysql_error());

$strSQL4 = "UPDATE medicine set tqty='$m_qty'";
			$strSQL4 .="WHERE code = '$mcode' ";
			$objQuery4 = mysqli_query($con,$strSQL4);

	$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`brand`,`pmrn`,`eid`,`rfid`,`status`,`location`,`iidd`,`code`) values
			('$g_name','1','$u_price','$u_price','$user','$adate','$bb_name','$pmrn','$eid','$tfid','Sale','IPD','$iidd','$mcode')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);





			
}
			
		}
	}

	$query="update inpatient set medinoti='', medinotitime='$pdate' where pmrn='$pmrn' and eid='$eid'";

$result = mysqli_query($con,$query) or die ( mysqli_error());

	
	echo '<script language="javascript">';
    echo 'alert("Successfully Updated !!"); ';

    echo '</script>';

mysqli_close($objConnect);
}
?>




<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
$dd=date('m/d/Y');
require('db1.php');



// if successful redirect to delete_multiple.php 





//$update="update imedi3 set pstatus='served' where `id`='$name'";
//mysqli_query($con,$update) or die(mysql_error());





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
  width: 60%;
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
return confirm("Are you Sure to Send Medicine Update Notification ??");
}

</script>
</head>


<body>
<script language="JavaScript">
	function ClickCheckAll(vol)
	{
	
		var i=1;
		for(i=1;i<=document.frmMain.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain.chkDel"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain.chkDel"+i+".checked=false");
			}
		}
	}

	function onDelete()
	{
		if(confirm('Do you want to Update the Status ?')==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>
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

<form name="frmMain" action="" method="post" OnSubmit="return onDelete();">


<h1 align="center"style="background-color:lightgreen;">INPATIENT MEDICINE </h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td colspan="20" align="right"><button onClick="goBack()">Back</button></td></tr>
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				
				<tr>	  
				<td colspan="20"><?php echo $data59["adoc"]; ?></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="5"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="12"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="5"><?php echo $data59["pmrn"]; ?></td>
				<td colspan="3"><?php echo $data59["eid"]; ?> </td>
					 <td colspan="12"><?php echo $data59["pname"]; ?></td>

					 
</tr>

						
						
<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $data59["padd"]; ?></td></tr>


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="3"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Room Type:</strong></label></td>
						<td colspan="4"><label><strong>Bed No:</strong></label></td>		
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data59["age"]; ?></td>  
             		<td colspan="3"><?php echo $data59["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data59["gender"]; ?></td>
					 <td colspan="4"><?php echo $data59["pphone"]; ?></td>  

			    	 <td colspan="2"><?php echo $data59["room"]; ?></td>  
					 <td colspan="4"><?php echo $data59["room1"]; ?></td>  
					 </tr>

						


<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Medication Form</strong></label></td> </tr>



		<td colspan="20"align="right"><font size="4.5" color="#FF0000"><b><label><strong><a href="addpharmedi?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>&tdate=<?php echo "$dd";?>">Tomorrow's Medicine</a></strong>&nbsp;&nbsp;<a href="phardatewise?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>"><font size="4.5" color="#FF0000"><b>(See Datewise Medicine List)<b></a>&nbsp;&nbsp;<a href="cancelmediphar?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>"><font size="4.5" color="#FF0000"><b>(Today's Cancelled Medicine List)<b></a></td>
	   
</tr>
<tr><td align="left" colspan="20"><font size="4.5" color="#FF000"><b><a onclick="return confirm_click();" href="medinoti?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>">Send Medicine Prepare Notification: </a>(<?php echo $noti;?>)</td></tr>

<tr><td align="left" colspan="20"><a target='_blank' href="phar_medi_bar.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>">bar_print</a></td></tr>	



<?php
$user=$_SESSION["sess_username"];
$pmrn=$pmrn;
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];
$dd=date('m/d/Y');
$count=1;


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from imedi3 where pmrn= '$pmrn' and eid='$eid'and status !='Cancel' and odate='$dd' and pstatus='Ordered' and status1 not in ('SEEN','implemented') and reuse='' order by `time` and `infusion` asc;";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");

$strSQLa = "Select * from imedi3 where pmrn= '$pmrn' and eid='$eid'and status !='Cancel' and odate='$dd' and pstatus='Ordered' and status1 not in ('SEEN','implemented') and reuse='Reuse' group by infusion;";
$objQuerya = mysqli_query($objConnect,$strSQLa) or die ("Error Query [".$strSQLa."]");




?>

<table align="center" class="table table-bordered" id="dynamic_field">  
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>Order By</strong></td>
	  <td colspan="1" align="center"><strong>Order Date</strong></td>
	  <td colspan="1" align="center"><strong>Due Date</strong></td>
	  <td colspan="1" align="center"><strong>Due Time</strong></td>
        
      <td colspan="4" align="center"><strong>Medication</strong></td>   
	  <td colspan="1" align="center"><strong>Stock</strong></td>   
	  <td colspan="1" align="center"><strong>Dilution</strong></td>   
	  <td colspan="1" align="center"><strong>Route</strong></td>
	  <td colspan="5" align="center"><strong>Instruction</strong></td>
      <td colspan="1" align="center"><strong>Status</strong></td>

	  <td colspan="1" align="center"><strong>Caution</strong></td>
	  <td colspan="1" align="center"><strong>O.Type</strong></td>

       

	   
    
    <th width="30"> <div align="center">
      <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
    </div></th>
  </tr>

  
  <?php
$i = 0;
while($row = mysqli_fetch_array($objQuery))
{
$i++;

?>

	  

  <tr>
  <td align="center" colspan="1"><?php echo $count; ?></td>
    <td align="center"colspan="1"><?php echo $row["orderby"]; ?></td>
	<td align="center"colspan="1"><?php echo $row["ortime"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["time"]; ?></td>  
	  
	  
	  <?php
	  $mcode = $row['code'];
	  $sum = "SELECT SUM(add_qty) FROM medi_stock where code='$mcode' and location='Pharmacy'" ;
	 
$sum1 = mysqli_query($con, $sum) or die(mysqli_error());
$sumr = mysqli_fetch_assoc($sum1);
$new_qty=$sumr['SUM(add_qty)'];
         
	  
	  ?>
	  
	  <td align="center"colspan="4"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="1" <?php if($new_qty!=0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $new_qty; ?></td>
	  <td align="center"colspan="1"><?php echo $row["dilu"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["root"]; ?></td>
	  <td align="center"colspan="5"><?php echo $row["instruc"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["status"]; ?></td>
	  <td align="center"colspan="1"<?php if($row['alert']== "H. Medi"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row['alert'];?></td>
		<td align="center"colspan="1"><?php echo $row["reuse"]; ?></td>
    <?php if ($new_qty!=0 and $row['discard']!='' and $row['reuse']=='Reuse'){echo'
    <td align="center"><input type="checkbox" name="chkDel[]" id="chkDel'.$count.'" value="'.$row["id"].'"></td>';}
	
	
	else if ($new_qty!=0 and $row['discard']=='' and $row['reuse']==''){echo'
    <td align="center"><input type="checkbox" name="chkDel[]" id="chkDel'.$count.'" value="'.$row["id"].'"></td>';}
	
	else if ($new_qty!=0 and $row['discard']=='' and $row['reuse']=='Reuse')
	{
		echo'<td align="center" style="font-weight: bold;font-size:22px;color:red">Reuse Item Not Finished</td>';
		
	}
	else if ($new_qty==0)
	{
		echo'<td align="center" style="font-weight: bold;font-size:22px;color:red">Stock Out</td>';
		
	}
	
	else if ($row['discard']='Discarded')
	{
		echo'<td align="center" style="font-weight: bold;font-size:22px;color:red">Stock Out</td>';
		
	}
	?>
  </tr>
  
  
  
  
<?php
 $count++;}
?>

  
  <?php
$i1 = 0;
while($row1 = mysqli_fetch_array($objQuerya))
{
$i1++;

?>

	  

  <tr>
  <td align="center" colspan="1"><?php echo $count; ?></td>
    <td align="center"colspan="1"><?php echo $row1["orderby"]; ?></td>
	<td align="center"colspan="1"><?php echo $row1["ortime"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row1["odate"]; ?></td>
      <td align="center"colspan="1"><?php echo $row1["time"]; ?></td>  
	  
	  
	  <?php
	  $mcode1 = $row1['code'];
	  $sum1 = "SELECT SUM(add_qty) FROM medi_stock where code='$mcode1' and location='Pharmacy'" ;
	 
$sum11 = mysqli_query($con, $sum1) or die(mysqli_error());
$sumr1 = mysqli_fetch_assoc($sum11);
$new_qty1=$sumr1['SUM(add_qty)'];
         
	  
	  ?>
	  
	  <td align="center"colspan="4"><?php echo $row1["infusion"]; ?></td>
	  <td align="center"colspan="1" <?php if($new_qty1!=0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $new_qty1; ?></td>
	  <td align="center"colspan="1"><?php echo $row1["dilu"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row1["root"]; ?></td>
	  <td align="center"colspan="5"><?php echo $row1["instruc"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row1["status"]; ?></td>
	  <td align="center"colspan="1"<?php if($row1['alert']== "H. Medi"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row1['alert'];?></td>
		<td align="center"colspan="1"><?php echo $row1["reuse"]; ?></td>
    <?php if ($new_qty1!=0 and $row1['discard']!='Discarded' and $row1['reuse']=='Reuse'){echo'
    <td align="center"><input type="checkbox" name="chkDel[]" id="chkDel'.$count.'" value="'.$row1["id"].'"></td>';}
	
	
	else if ($new_qty1!=0 and $row1['discard']=='' and $row1['reuse']==''){echo'
    <td align="center"><input type="checkbox" name="chkDel[]" id="chkDel'.$count.'" value="'.$row1["id"].'"></td>';}
	
	else if ($new_qty1!=0 and $row1['discard']!='' and $row1['reuse']=='Reuse')
	{
		echo'<td align="center" style="font-weight: bold;font-size:22px;color:red">Reuse Item Not Finished</td>';
		
	}
	else if ($new_qty1==0)
	{
		echo'<td align="center" style="font-weight: bold;font-size:22px;color:red">Stock Out</td>';
		
	}
	
	else if ($row1['discard']='Discarded')
	{
		echo'<td align="center" style="font-weight: bold;font-size:22px;color:red">Stock </td>';
		
	}
	?>
  </tr>
  
  
  
  
<?php
 $count++;}
?>
<tr><td colspan="20" align="right"><button type="submit" name="btnDelete">Serverd</button><input type="hidden" name="hdnCount" value="<?php echo $count;?>"></td>
</tr>
</table>
<?php
mysqli_close($objConnect);
?>


<table align="center" class="table table-bordered" id="dynamic_field">  
 <tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Served Medicine List</strong></label></td> </tr>



		
	   
</tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>Order By</strong></td>
	  <td colspan="1" align="center"><strong>Order Date</strong></td>
	  <td colspan="1" align="center"><strong>Order Time</strong></td>
        
      <td colspan="7" align="center"><strong>Medication</strong></td>   
	  <td colspan="2" align="center"><strong>Route</strong></td>
	  <td colspan="5" align="center"><strong>Instruction</strong></td>
      <td colspan="1" align="center"><strong>Status</strong></td>

	  <td colspan="1" align="center"><strong>Caution</strong></td>

       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$pmrn;
//$id=$_REQUEST["id"];
$episode=$data59["eid"];
$dd=date('m/d/Y');
$count=1;
$sel_query="Select * from imedi3 where pmrn= '$pmrn' and eid='$eid'and pstatus ='served' and odate='$dd' and status1 not in('SEEN','implemented')order by `time` and `infusion` asc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      
	  <td align="center"colspan="1"><?php echo $row["orderby"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["time"]; ?></td>  
	  <td align="center"colspan="7"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["root"]; ?></td>
	  <td align="center"colspan="5"><?php echo $row["instruc"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["pstatus"]; ?></td>
	  <td align="center"colspan="1"<?php if($row['alert']== "H. Medi"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row['alert'];?></td>
  	  
<td align="left" colspan="20"><a target='_blank' href="phar_bar_print_indu1.php?id=<?php echo $row['id']; ?>">bar_print</a></td>


      </tr>
    <?php $count++; } ?>
	 
<tr><td colspan="5"><a target='_blank' href="testpdfphar.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	 
</table>


</form>


</body>
<?php echo $data59["eid"]; ?>
</html>
