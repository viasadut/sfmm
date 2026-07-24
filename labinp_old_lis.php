<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="lab"){
      header('Location: login2?err=2');
    }
?>
<?php  
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
//$dname=$_REQUEST['dname'];
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 $query3 = "select * from iinves where pmrn='$pmrn' and eid='$eid'";  
 $result3 = mysqli_query($connect, $query3);  

//$name=$_POST['data'];
//$query59 = mysqli_query($connect,"select * from medicine where mname='name'");
//$data59 = mysqli_fetch_assoc($query59);
 
 
 
 ?>  

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION["sess_username"];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data = mysqli_fetch_assoc($query4);
$eeid1=$data['emerid'];
  
 //echo $new_bar=date('sYd').'123'+'1239';
?>


<?php
require('db1.php');
if(isset($_POST['btnDelete']))
	
	{

if(empty($_REQUEST['chkDel']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}
else {
$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$lis_date=date('Y-m-d H:i:s');

$cdate=date('Y-m-d');
			$strSQL1 = "select DISTINCT MAX(s_no) from iinves where rdate='$cdate'";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);
			$obj = mysqli_fetch_array($objQuery1);
			$mno=$obj['MAX(s_no)']+1;
			
	
			function count_digit($number) {
return strlen((string) $number);
}
//$mno = "01";
$number_of_digits = count_digit($mno); //this is call :)
$number_of_digits;
	
		
			
			$new_bar=date('sYd').$mno+$user;
			
			$new_bar1=date('yms').'222'.$mno;
			$new_bar2=date('yms').'22'.$mno;
			$new_bar3=date('yms').'0'.$mno;
			$new_bar4=date('yms').'0'.$mno;

	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "" and $user!='')
		{
			//$result=$_REQUEST['result'][$i];
			
			$dtime1= date('Y-m-d H:i:s');
			$pdate=date('Y-m-d');  
			$dtime= date('d/m/Y H:i:s');
			//echo $_POST["chkDel"][$i];
			
			
			$strSQL = "UPDATE iinves set rstatus='RECEIVED', status='RECEIVED', rby='$user', rtime='$dtime' , barcode1='$new_bar',barcode='$new_bar',otime='$dtime1',rdate='$pdate',s_no='$mno'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);
			
			
			
			$qq = mysqli_query($db,"select * from iinves where id='".$_POST["chkDel"][$i]."'");
			$dd = mysqli_fetch_assoc($qq);
			$medi = $dd["infusion"];	
$icode = $dd["code"];				
				
				
				
				
				
				
				
		$query159 = mysqli_query($db,"select * from lis_inves_table where icode='$icode' and status='1'");

while($data159 = mysqli_fetch_assoc($query159)){
	
$ii=$data159["para"];	
$ii2=$data159["mcode"];	
	
	
/*$sel_lis="Select * from lis_inves_table where inves= '$medi' and status='1'";

$result_lis = mysqli_query($con,$sel_lis);
*/


//while($row_lis= mysqli_fetch_assoc($result_lis))

	
	$ins_lis1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$new_bar','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1);
	
}

			
			
			
			//$strSQL = "UPDATE iinves set rstatus='RECEIVED', status='RECEIVED', rby='$user', rtime='$pdate' ,rdate='$pdate', barcode1='$new_bar'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			//$objQuery = mysqli_query($objConnect,$strSQL);
		}
	}

	
	
	echo '<script language="javascript">';
    echo 'alert("Successfully Updated !!"); ';

    echo '</script>';

	$url = "lab_sample_receive_bar_lab.php?barcode=$new_bar";
header("Location: $url"); 

	
mysqli_close($objConnect);
}
	}
?>



<?php
require('db1.php');
if(isset($_POST['btnDelete2']))
	
	{

if(empty($_REQUEST['chkDel2']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}
else {
$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");

$cdate=date('Y-m-d');
			$strSQL1 = "select DISTINCT MAX(s_no) from einves where rdate='$cdate'";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);
			$obj = mysqli_fetch_array($objQuery1);
			$mno=$obj['MAX(s_no)']+1;
			
$lis_date=date('Y-m-d H:i:s');			
			
			$new_bar=date('Yds').$mno;


	for($i=0;$i<count($_POST["chkDel2"]);$i++)
	{
		if($_POST["chkDel2"][$i] != "")
		{
			//$result=$_REQUEST['result'][$i];
			$dtime1= date('Y-m-d H:i:s');
			$pdate=date('Y-m-d');  
			$dtime= date('d/m/Y H:i:s');
			//echo $_POST["chkDel"][$i];
			
			
			$strSQL = "UPDATE einves set rstatus='RECEIVED', status='RECEIVED', rby='$user', rtime='$dtime' , barcode1='$new_bar',barcode='$new_bar',otime='$dtime1',rdate='$pdate',s_no='$mno'";
			$strSQL .="WHERE id = '".$_POST["chkDel2"][$i]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);
			
			
			$qq = mysqli_query($db,"select * from einves where id='".$_POST["chkDel"][$i]."'");
			$dd = mysqli_fetch_assoc($qq);
			$medi = $dd["infusion"];	
$icode = $dd["code"];							
				
				
				
				
			
				
				
		$query159 = mysqli_query($db,"select * from lis_inves_table where icode='$icode' and status='1'");

while($data159 = mysqli_fetch_assoc($query159)){
	
$ii=$data159["para"];	
	$ii2=$data159["mcode"];	
	
/*$sel_lis="Select * from lis_inves_table where inves= '$medi' and status='1'";

$result_lis = mysqli_query($con,$sel_lis);
*/


//while($row_lis= mysqli_fetch_assoc($result_lis))

	
	$ins_lis1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$new_bar','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1);
	
}
			
			
			
			//$strSQL = "UPDATE iinves set rstatus='RECEIVED', status='RECEIVED', rby='$user', rtime='$pdate' ,rdate='$pdate', barcode1='$new_bar'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			//$objQuery = mysqli_query($objConnect,$strSQL);
		}
	}

	
	
	echo '<script language="javascript">';
    echo 'alert("Successfully Updated !!"); ';

    echo '</script>';

	$url = "lab_sample_receive_bar_ae.php?barcode=$new_bar";
header("Location: $url"); 

	
mysqli_close($objConnect);
}
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
    max-width: 1600px;
  }

}
      </style>

    

  
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
</script>




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
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
return confirm("Are you Sure to Reveive this Sample ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Reject this Sample ?");
}

</script>
  
          <head>  
           <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>
	
	
	
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




	<script language="JavaScript">
	function ClickCheckAll2(vol)
	{
	
		var i=1;
		for(i=1;i<=document.frmMain2.hdnCount2.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain2.chkDel2"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain2.chkDel2"+i+".checked=false");
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

<form name="frmMain1" action="" method="post">
<h1 align="center"style="background-color:lightgreen;">INPATIENT INVESTIGATION </h1>
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
						<td colspan="10"><label><strong>Phone NO:</strong></label></td>
	
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data["age"]; ?></td>  
             		<td colspan="3"><?php echo $data["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data["gender"]; ?></td>
					 <td colspan="10"><?php echo $data["pphone"]; ?></td>  

				 </tr>

</form>



<form name="frmMain2" action="" method="post">		

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Form</strong></label></td> </tr>



 
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="1" align="center"><strong>Requested By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="10" align="center"><strong>Investigation</strong></td>
      <td colspan="2" align="center"><strong>Remarks</strong></td>   
       	  <td colspan="2" align="center"><strong>Barcode</strong></td>
		  


	  

       

	   
    
    <th colspan="1"> <div align="center">
      <input name="CheckAll2" type="checkbox" id="CheckAll2" value="Y" onClick="ClickCheckAll2(this);" style="height:22px; width:22px;">
    </div></th>
	
	<td colspan="1" align="center"><strong>Reject</strong></td>
  </tr>



	<?php
$user=$_SESSION["sess_username"];
//$pmrn=$pmrn;
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];
$dd=date('Y-m-d');
$test=date('Y-m-d', strtotime('-30 days') );
$count=1;


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from einves where pmrn= '$pmrn' and eid='$eeid1' and status='Data Updated' and type='lab' order by `id` DESC;";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
//$data = mysqli_fetch_array($objQuery);
?>


<?php
$i = 0;
while($row5 = mysqli_fetch_array($objQuery))
{
$i++;

?>

	  

  <tr>
 <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row5["pmrn"]; ?></td>
       <td align="center"colspan="1"><?php echo $row5["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row5["odate"]; ?></td>  
	  <td align="center"colspan="10"style="color: red;"><?php echo $row5["infusion"]; ?></td>
	        <td align="center"colspan="2"><?php echo $row5["room"]; ?></td>


				  
    <td colspan="2" align="left"><h3><input type="text" name="result[]" id="result<?php echo $i;?>" required readonly value="<?php echo $pmrn.date('dis');?>" style="font-size:12px; color:red;font-weight:bold;"></h3></td></td>
    <td align="center" colspan="1"><input type="checkbox" name="chkDel2[]" id="chkDel2<?php echo $i;?>" value="<?php echo $row5["id"];?>"style="height:22px; width:22px;"></td>
	<td colspan="1" align="center"><a href="labreject1emer?pmrn=<?php echo $row5['pmrn']; ?>&id=<?php echo $row5['id']; ?>&eid=<?php echo $row5['eid']; ?>"><strong>Reject</strong></a></td>	  
	
  
  </tr>
<?php
 $count++;}
?>
<tr><td colspan="25" align="right"><button type="submit" name="btnDelete2">Receive Sample</button><input type="hidden" name="hdnCount2" value="<?php echo $i;?>"></td>
</tr>

<?php
mysqli_close($objConnect);
?>






</form>

		<form name="frmMain" action="" method="post">		





 
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="1" align="center"><strong>Requested By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="10" align="center"><strong>Investigation</strong></td>
      <td colspan="2" align="center"><strong>Remarks</strong></td>   
       	  <td colspan="2" align="center"><strong>Barcode</strong></td>
		  


	  

       

	   
    
    <th colspan="1"> <div align="center">
      <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);" style="height:22px; width:22px;">
    </div></th>
	<td colspan="1" align="center"><strong>Reject</strong></td>
  </tr>



	<?php
$user=$_SESSION["sess_username"];
//$pmrn=$pmrn;
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];
$dd=date('Y-m-d');
$test=date('Y-m-d', strtotime('-30 days') );
$count=1;


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from iinves where pmrn= '$pmrn' and eid='$eid' and status='Data Updated' and type='lab' and rstatus !='Cancelled' order by `id` DESC;";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
//$data = mysqli_fetch_array($objQuery);
?>


<?php
$i = 0;
while($row5 = mysqli_fetch_array($objQuery))
{
$i++;

?>

	  

  <tr>
 <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row5["pmrn"]; ?></td>
       <td align="center"colspan="1"><?php echo $row5["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row5["odate"]; ?></td>  
	  <td align="center"colspan="10"><?php echo $row5["infusion"]; ?></td>
	        <td align="center"colspan="2"><?php echo $row5["room"]; ?></td>


				  
    <td colspan="2" align="left"><h3><input type="text" name="result[]" id="result<?php echo $i;?>" required readonly value="<?php echo $pmrn.date('dis');?>" style="font-size:12px; color:green;font-weight:bold;"></h3></td></td>
    <td align="center" colspan="1"><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $i;?>" value="<?php echo $row5["id"];?>"style="height:22px; width:22px;"></td>
	
	<td colspan="1" align="center"><a href="labreject1?pmrn=<?php echo $row5['pmrn']; ?>&id=<?php echo $row5['id']; ?>&eid=<?php echo $row5['eid']; ?>"><strong>Reject</strong></a></td>	  
  
  </tr>
<?php
 $count++;}
?>
<tr><td colspan="25" align="right"><button type="submit" name="btnDelete">Receive Sample</button><input type="hidden" name="hdnCount" value="<?php echo $i;?>"></td>
</tr>

<?php
mysqli_close($objConnect);
?>






</form>


	


	
	
	
	
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>RECEIVED SAMPLE</strong></label></td> </tr>	

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="2" align="center"><strong>Requested By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="3" align="center"><strong>Investigation</strong></td>
      <td colspan="2" align="center"><strong>Remarks</strong></td>   
      <td colspan="2" align="center"><strong>Done Date</strong></td>
	  <td colspan="1" align="center"><strong>Status</strong></td>
       	  <td colspan="2" align="center"><strong>Received Comments</strong></td>
		  <td colspan="2" align="center"><strong>Received By</strong></td>
		  <td colspan="2" align="center"><strong>Update</strong></td>
		    <td colspan="1" align="center"><strong>Print</strong></td>
		  
		  

	   </tr>
	   
	   <?php
	
$user=$_SESSION["sess_username"];


$count=1;
$sel_query="Select * from einves where pmrn= '$pmrn' and eid='$eeid1' and type='lab' and rstatus IN ('RECEIVED','REJECTED') and status IN ('RECEIVED','REJECTED') and resultstatus=''   order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="2"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	   <td align="center"colspan="3"style="color: red;"><b><?php echo $row["infusion"]; ?><b></td>
	        <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
			<td align="center"colspan="2"><?php echo $row["rtime"]; ?></td>  
			<td align="center"colspan="2"<?php if($row['rstatus']== "REJECTED"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row['rstatus'];?></td>
        	  	  <td align="center"colspan="2"><?php echo $row["rcomments"]; ?></td>
	  
	  	  <td align="center"colspan="1"><?php echo $row["rby"]; ?></td>
		
  	  <td align="center"colspan="2"><a target='_blank' href="<?php echo $row['link']?>?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>">REPORT</a></td>  	  
	  <td colspan="1"><a target='_blank' href="lab_sample_receive_indu_ae?id=<?php echo $row['id']; ?>">Barcode</a></td>
  
      </tr>
    <?php $count++; } ?>
	   
	   
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from iinves where pmrn= '$pmrn' and eid='$eid' and type='lab' and rstatus IN ('RECEIVED','REJECTED') and status IN ('RECEIVED','REJECTED') and resultstatus=''   order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="2"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
	        <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
			<td align="center"colspan="2"><?php echo $row["rtime"]; ?></td>  
			<td align="center"colspan="1"<?php if($row['rstatus']== "REJECTED"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row['rstatus'];?></td>
        	  	  <td align="center"colspan="2"><?php echo $row["rcomments"]; ?></td>
	  
	  	  <td align="center"colspan="2"><?php echo $row["rby"]; ?></td>
		  
		  
		  


<td align="center"colspan="1"><a target='_blank' href="<?php echo $row['link']?>?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>">REPORT</a></td>  	  
<td colspan="1"><a target='_blank' href="sample_receive_print?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>"><img src="print.png" title="Print Report" width="50" height="50" /></a></td>
<td colspan="1"><a target='_blank' href="lab_sample_receive_indu_in?id=<?php echo $row['id']; ?>">Barcode</a></td>
  
      </tr>
    <?php $count++; } ?>
	


<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Result Done</strong></label></td> </tr>	

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="1" align="center"><strong>Requested By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="2" align="center"><strong>Investigation</strong></td>
	  <td colspan="2" align="center"><strong>Remarks</strong></td>
            <td colspan="2" align="center"><strong>Result Date</strong></td>
	   <td colspan="2" align="center"><strong>Update By</strong></td>
	   <td colspan="8" align="center"><strong>Result</strong></td>
	   <td colspan="1" align="center"><strong>Edit</strong></td>
	   <td colspan="1" align="center"><strong>Print</strong></td>
	   
		  

	   </tr>
	   
	   
	   
	   
	   
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from einves where pmrn= '$pmrn' and eid='$eeid1' and type='lab' and rstatus IN ('RECEIVED','REJECTED') and status IN ('RECEIVED','REJECTED') and resultstatus in('UPDATED','Updated By Technologist','Confirmed By Consultant')   order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="1"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	   <td align="center"colspan="2"style="color: red;"><b><?php echo $row["infusion"]; ?><b></td>
	   <td align="center"colspan="2"style="color: red;"><b><?php echo $row["room"]; ?><b></td>
	        
			<td align="center"colspan="2"><?php echo $row["resulttime"]; ?></td>  
				  
	  	  <td align="center"colspan="2"><?php echo $row["resultby"]; ?></td>
		  <td align="center"colspan="8"><?php echo $row["result"]; ?></td>
		  


<?php 
$id5=$row['id'];
$rstatus5=$row["resultstatus"];
$link5=$row["linkv"];
$pmrn5=$row["pmrn"];
$eid5=$row["eid"];
$url="$link5?id=$id5&pmrn=$pmrn5&eid=$eid5";


?>


		  
		  <td align="center" colspan="1" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php if($rstatus5!='Confirmed By Consultant'){echo"<a target='_blank' href='$url'>Edit</a>";} else{echo'';} ?></td>
		  		  
		<td colspan="1"><a target='_blank' href="<?php echo $row['report']?>?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>"><img src="print.png" title="Print Report" width="50" height="40" /></a></td>
		

  	  
  
      </tr>
    <?php $count++; } ?>
	   
	   
	   
	   
	   
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from iinves where pmrn= '$pmrn' and eid='$eid' and type='lab' and rstatus IN ('RECEIVED','REJECTED') and status IN ('RECEIVED','REJECTED') and resultstatus in('UPDATED','Updated By Technologist','Confirmed By Consultant')   order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="1"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
	        
			<td align="center"colspan="2"><?php echo $row["resulttime"]; ?></td>  
				  
	  	  <td align="center"colspan="2"><?php echo $row["resultby"]; ?></td>
		  <td align="center"colspan="8"><?php echo $row["result"]; ?></td>


<?php 
$id5=$row['id'];
$rstatus5=$row["resultstatus"];
$link5=$row["linkv"];
$pmrn5=$row["pmrn"];
$eid5=$row["eid"];
$url="$link5?id=$id5&pmrn=$pmrn5&eid=$eid5";
$sno='I'.$row['id'];



?>


		  
		  <td align="center" colspan="1" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php if($rstatus5!='Confirmed By Consultant'){echo"<a target='_blank' href='$url'>Edit</a>";} else{echo'';} ?></td>
		  		  
		<td colspan="1"><a target='_blank' href="<?php echo $row['report']?>?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>&sno=<?php echo $sno; ?>"><img src="print.png" title="Print Report" width="50" height="40" /></a></td>
		

  	  
  
      </tr>
    <?php $count++; } ?>
<tr><td colspan="10"><a target='_blank' href="piinveslabresult.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	</tr>	
</table>




</body>

 
 
</html>
