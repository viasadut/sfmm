<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('bill','mng','billin')"; 
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
$dd= date('m/d/Y',strtotime("+1 days")); 
$user=$_SESSION["sess_username"];
$pdate=date("Y-m-d H:i:s");

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');


$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$dname=$row139['fullname'];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from ot where id='$id'");
$data59 = mysqli_fetch_assoc($query4);
  $date=date('d/m/Y');

  $noti=$data59['medinoti'];
  $proce=$data59['proce'];
  $dname5=$data59['dname'];
  
  $query44 = mysqli_query($db,"select * from privilege where pname='$proce' and dname='$dname5'");
  $data599 = mysqli_fetch_assoc($query44);
	$pri_charge=$data599['charge'];
  
//$sql90="Select * from imedi2 where pmrn= '$pmrn' and eid='$eid'and status !='Cancel' and odate='$dd' and pstatus='Ordered' order by `time` and `infusion` asc;";
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

	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			$strSQL = "UPDATE othoscharge1 set bstatus='Billed', buser='$user', bdate='$pdate' ";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);
		}
	}

	
	
	echo '<script language="javascript">';
    echo 'alert("Successfully Updated !!"); ';

    echo '</script>';

mysqli_close($objConnect);
}
?>

<?php
require('db1.php');
if(isset($_POST['btnDelete1']))

if(empty($_REQUEST['chkDel1']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}
else {
$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");

	for($i1=0;$i1<count($_POST["chkDel1"]);$i1++)
	{
		if($_POST["chkDel1"][$i1] != "")
		{
			$strSQL = "UPDATE otanaesmedi set bstatus='Billed', buser='$user', bdate='$pdate' ";
			$strSQL .="WHERE id = '".$_POST["chkDel1"][$i1]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);
		}
	}

	
	
	echo '<script language="javascript">';
    echo 'alert("Successfully Updated !!"); ';

    echo '</script>';

mysqli_close($objConnect);
}
?>


<?php
require('db1.php');
if(isset($_POST['btnDelete2']))

if(empty($_REQUEST['chkDel2']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}
else {
$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");

	for($i2=0;$i2<count($_POST["chkDel2"]);$i2++)
	{
		if($_POST["chkDel2"][$i2] != "")
		{
			$strSQL = "UPDATE otanaesinfusion set bstatus='Billed', buser='$user', bdate='$pdate' ";
			$strSQL .="WHERE id = '".$_POST["chkDel2"][$i2]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);
		}
	}

	
	
	echo '<script language="javascript">';
    echo 'alert("Successfully Updated !!"); ';

    echo '</script>';

mysqli_close($objConnect);
}
?>

<?php
require('db1.php');
if(isset($_POST['btnDelete3']))

if(empty($_REQUEST['chkDel3']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}
else {
$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");

	for($i3=0;$i3<count($_POST["chkDel3"]);$i3++)
	{
		if($_POST["chkDel3"][$i3] != "")
		{
			$strSQL = "UPDATE otanaesinfusion set bstatus='Billed', buser='$user', bdate='$pdate' ";
			$strSQL .="WHERE id = '".$_POST["chkDel3"][$i3]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);
		}
	}

	
	
	echo '<script language="javascript">';
    echo 'alert("Successfully Updated !!"); ';

    echo '</script>';

mysqli_close($objConnect);
}
?>



<?php
require('db1.php');
if(isset($_POST['btnDelete5']))

if(empty($_REQUEST['chkDel5']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}
else {
$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");

	for($i5=0;$i5<count($_POST["chkDel5"]);$i5++)
	{
		if($_POST["chkDel5"][$i5] != "")
		{
			$strSQL = "UPDATE otivisitendo set bstatus='Billed', buser='$user', bdate='$pdate' ";
			$strSQL .="WHERE id = '".$_POST["chkDel5"][$i5]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);
		}
	}

	
	
	echo '<script language="javascript">';
    echo 'alert("Successfully Updated !!"); ';

    echo '</script>';

mysqli_close($objConnect);
}
?>


<?php
require('db1.php');
if(isset($_POST['btnDelete6']))

if(empty($_REQUEST['chkDel6']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}
else {
$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");

	for($i6=0;$i6<count($_POST["chkDel6"]);$i6++)
	{
		if($_POST["chkDel6"][$i6] != "")
		{
			$strSQL = "UPDATE othoscharge set bstatus='Billed', buser='$user', bdate='$pdate' ";
			$strSQL .="WHERE id = '".$_POST["chkDel6"][$i6]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);
		}
	}

	
	
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





//$update="update imedi2 set pstatus='served' where `id`='$name'";
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


<script language="JavaScript">
	function ClickCheckAll1(vol)
	{
	
		var i1=1;
		for(i1=1;i1<=document.frmMain1.hdnCount.value;i1++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain1.chkDel1"+i1+".checked=true");
			}
			else
			{
				eval("document.frmMain1.chkDel1"+i1+".checked=false");
			}
		}
	}

	function onDelete1()
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
	
		var i2=1;
		for(i2=1;i2<=document.frmMain2.hdnCount.value;i2++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain2.chkDel2"+i2+".checked=true");
			}
			else
			{
				eval("document.frmMain2.chkDel2"+i2+".checked=false");
			}
		}
	}

	function onDelete2()
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
	function ClickCheckAll3(vol)
	{
	
		var i3=1;
		for(i3=1;i3<=document.frmMain3.hdnCount.value;i3++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain3.chkDel3"+i3+".checked=true");
			}
			else
			{
				eval("document.frmMain3.chkDel3"+i3+".checked=false");
			}
		}
	}

	function onDelete3()
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
	function ClickCheckAll5(vol)
	{
	
		var i5=1;
		for(i5=1;i5<=document.frmMain5.hdnCount.value;i5++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain5.chkDel5"+i5+".checked=true");
			}
			else
			{
				eval("document.frmMain5.chkDel5"+i5+".checked=false");
			}
		}
	}

	function onDelete5()
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
	function ClickCheckAll6(vol)
	{
	
		var i6=1;
		for(i6=1;i6<=document.frmMain6.hdnCount.value;i6++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain6.chkDel6"+i6+".checked=true");
			}
			else
			{
				eval("document.frmMain6.chkDel6"+i6+".checked=false");
			}
		}
	}

	function onDelete6()
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

<form name="frmMain5" action="" method="post" OnSubmit="return onDelete5();">


<h1 align="center"style="background-color:lightgreen;">OT CHARGE</h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				
				<tr>	  
				<td colspan="20"><?php echo $data59["dname"]; ?></td></tr>
				
						
						
				
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
<tr>
<td colspan="20">
<h1 align="center"style="background-color:lightgreen;">Consultant Involved</h1>
</td>
</tr> 
<tr>
<td colspan="20">
<?php
$query1 = mysqli_query($db,"Select * from ot where pmrn= '$pmrn' and id='$id';");
$count=1;
while($data1 = mysqli_fetch_array($query1))
{


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);


echo '<h2>'.$data1['dname'].'<span style="color:red;font-weight:bold"> (Approved Charge: '.$pri_charge.' Taka)</span></h2>';

if($data1['dname1'] !='')
{
echo '<h2>'.$data1['dname1'].'</h2><br>';

}
if($data1['dname2'] !='')
{

echo '<h2>'.$data1['dname2'].'</h2><br>';
}
if($data1['dname3'] !='')
{
echo '<h2>'.$data1['dname3'].'</h2><br>';

}

if($data1['dname4'] !='')
{

echo '<h2>'.$data1['dname4'].'</h2><br>';

}

if($data1['nanes'] !='')
{

echo '<h2>'.$data1['nanes'].'</h2><br>';

}


if($data1['anes2'] !='' and $data1['anes2']!='N/A')
{
echo '<h2>'.$data1['anes2'].'</h2><br>';

}

if($data1['anes3'] !='' and $data1['anes3']!='N/A')
{
echo '<h2>'.$data1['anes3'].'</h2><br>';

}


$count++;

}

?>
</td>


</tr>						

<?php
$user=$_SESSION["sess_username"];
$pmrn=$pmrn;
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];
$dd=date('m/d/Y');
$count=1;


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from otivisitendo where pmrn= '$pmrn' and eid='$id' order by `id` desc;";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
?>

<table align="center" class="table table-bordered" id="dynamic_field"> 
<tr>
<h1 align="center"style="background-color:lightgreen;">Consultant Charge</h1>
</tr> 
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>Consultant Name</strong></td>
	  <td colspan="5" align="center"><strong>Procedure Name</strong></td>
	  <td colspan="1" align="center"><strong>Date</strong></td>
	  <td colspan="1" align="center"><strong>Charge</strong></td>
        
      <td colspan="1" align="center"><strong>Status</strong></td>   
	  
	  
	  

       

	   
    
    <th width="30"> <div align="center">
      <input name="CheckAll5" type="checkbox" id="CheckAll5" value="Y" onClick="ClickCheckAll5(this);">
    </div></th>
  </tr>
<?php
$i5 = 0;
while($row = mysqli_fetch_array($objQuery))
{
$i5++;

?>

	  

  <tr>
  <td align="center" colspan="1"><?php echo $count; ?></td>
    <td align="center"colspan="1"><?php echo $row["infusion"]; ?></td>
	<td align="center"colspan="5"><?php echo $row["vtype"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>
	  
	  <td align="center"colspan="1"><?php echo $row["room"]; ?></td>
      
	  
	  
	  
	  
	  
	  
	  
	  <td align="center"colspan="1"><?php if($row['bstatus']=='Billed') {echo "<span style='color:green;text-align:center;'><b>".$row['bstatus']."";} else {echo "<span style='color:Red;text-align:center;'><b>".$row['bstatus']."";}?></td>
	  
	  
	  
		
    
    <td align="center"><input type="checkbox" name="chkDel5[]" id="chkDel5<?php echo $i5;?>" value="<?php echo $row["id"];?>"></td>
  
  </tr>
<?php
 $count++;}
?>
<tr><td colspan="20" align="right"><button type="submit" name="btnDelete5">Billed</button><input type="hidden" name="hdnCount" value="<?php echo $i5;?>"></td>
</tr>
</table>
<?php
mysqli_close($objConnect);
?>



</form>





<form name="frmMain6" action="" method="post" OnSubmit="return onDelete6();">
		

	


<?php
$user=$_SESSION["sess_username"];
$pmrn=$pmrn;
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];
$dd=date('m/d/Y');
$count=1;


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from othoscharge where pmrn= '$pmrn' and eid='$id' order by `id` desc;";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
?>

<table align="center" class="table table-bordered" id="dynamic_field">  
<tr>
<h1 align="center"style="background-color:lightgreen;">Disposible List(OT)</h1>
</tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>Order By</strong></td>
	  <td colspan="1" align="center"><strong>Date</strong></td>
	  <td colspan="1" align="center"><strong>Date</strong></td>
	  <td colspan="1" align="center"><strong>Disposible Name</strong></td>
        
      <td colspan="5" align="center"><strong>Quantity</strong></td>   
	  <td colspan="1" align="center"><strong>Code</strong></td> 
<td colspan="1" align="center"><strong>Price</strong></td> 	  
<td colspan="1" align="center"><strong>Status</strong></td> 	  
	  
	  

       

	   
    
    <th width="30"> <div align="center">
      <input name="CheckAll6" type="checkbox" id="CheckAll6" value="Y" onClick="ClickCheckAll6(this);">
    </div></th>
  </tr>
<?php
$i6 = 0;
while($row = mysqli_fetch_array($objQuery))
{
$i6++;

?>

	  

  <tr>
  <td align="center" colspan="1"><?php echo $count; ?></td>
    <td align="center"colspan="1"><?php echo $row["pname"]; ?></td>
	<td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["date"]; ?></td>
      
	  <td align="center"colspan="5"><?php echo $row["medi"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["pdos"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["code"]; ?></td>
	
	  
<?php	  
/*$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$qqt=$row['medi'];

$sel1=mysqli_query($db,"SELECT * FROM storenew WHERE `ename`='$qqt';");
$result1 = mysqli_fetch_assoc($sel1);
//$dcode=$result1["dcode"];
$price=$result1["price"];
*/
?>

  <td align="center"colspan="1"><?php echo $row["ins"]; ?></td>

	  <td align="center"colspan="1"><?php if($row['bstatus']=='Billed') {echo "<span style='color:green;text-align:center;'><b>".$row['bstatus']."";} else {echo "<span style='color:Red;text-align:center;'><b>".$row['bstatus']."";}?></td>
	  
	  
		
    
    <td align="center"><input type="checkbox" name="chkDel6[]" id="chkDel6<?php echo $i6;?>" value="<?php echo $row["id"];?>"></td>
  
  </tr>
<?php
 $count++;}
?>
<tr><td colspan="20" align="right"><button type="submit" name="btnDelete6">Billed</button><input type="hidden" name="hdnCount" value="<?php echo $i6;?>"></td>
</tr>
</table>
<?php
mysqli_close($objConnect);
?>
</form>




<form name="frmMain" action="" method="post" OnSubmit="return onDelete();">






		

	


<?php
$user=$_SESSION["sess_username"];
$pmrn=$pmrn;
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];
$dd=date('m/d/Y');
$count=1;


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from othoscharge1 where pmrn= '$pmrn' and eid='$id' order by `id` desc;";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
?>

<table align="center" class="table table-bordered" id="dynamic_field">  
<tr>
<h1 align="center"style="background-color:lightgreen;">Medication List(OT)</h1>
</tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>Order By</strong></td>
	  <td colspan="1" align="center"><strong>Order Date</strong></td>
	  <td colspan="1" align="center"><strong>Due Date</strong></td>
	  <td colspan="1" align="center"><strong>Due Time</strong></td>
        
      <td colspan="5" align="center"><strong>Medication</strong></td>   
	  <td colspan="1" align="center"><strong>Dilution</strong></td>  
	  <td colspan="1" align="center"><strong>Price</strong></td>  
<td colspan="1" align="center"><strong>Status</strong></td> 	  
	  
	  

       

	   
    
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
    <td align="center"colspan="1"><?php echo $row["pname"]; ?></td>
	<td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["date"]; ?></td>
      
	  <td align="center"colspan="5"><?php echo $row["medi"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["pdos"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["code"]; ?></td>
	  
	  
	  
	  <?php	  
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$qqt=$row['medi'];

$sel1=mysqli_query($db,"SELECT * FROM medicine WHERE `mname`='$qqt';");
$result1 = mysqli_fetch_assoc($sel1);
//$dcode=$result1["dcode"];
$price=$result1["uprice"];

?>
	  
	  <td align="center"colspan="1"><?php echo $row["pdos"]*$price; ?></td>
	  
	  
	  <td align="center"colspan="1"><?php if($row['bstatus']=='Billed') {echo "<span style='color:green;text-align:center;'><b>".$row['bstatus']."";} else {echo "<span style='color:Red;text-align:center;'><b>".$row['bstatus']."";}?></td>
	  
		
    
    <td align="center"><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $i;?>" value="<?php echo $row["id"];?>"></td>
  
  </tr>
<?php
 $count++;}
?>
<tr><td colspan="20" align="right"><button type="submit" name="btnDelete">Billed</button><input type="hidden" name="hdnCount" value="<?php echo $i;?>"></td>
</tr>
</table>
<?php
mysqli_close($objConnect);
?>
</form>

<form name="frmMain1" action="" method="post" OnSubmit="return onDelete1();">
<?php
$user=$_SESSION["sess_username"];
$pmrn=$pmrn;
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];
$dd=date('m/d/Y');
$count=1;


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from otanaesmedi where pmrn= '$pmrn' and eid='$id' order by `id` desc;";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
?>

<table align="center" class="table table-bordered" id="dynamic_field"> 
<tr>
<h1 align="center"style="background-color:lightgreen;">Medication List(Anaesthesia)</h1>
</tr> 
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>Order By</strong></td>
	  <td colspan="1" align="center"><strong>Order Date</strong></td>
	  <td colspan="1" align="center"><strong>Due Date</strong></td>
	  <td colspan="1" align="center"><strong>Due Time</strong></td>
        
      <td colspan="5" align="center"><strong>Medication</strong></td>   
	  <td colspan="1" align="center"><strong>Dilution</strong></td>   
	  <td colspan="1" align="center"><strong>Price</strong></td>  
	  <td colspan="1" align="center"><strong>Status</strong></td> 
	  
	  

       

	   
    
    <th width="30"> <div align="center">
      <input name="CheckAll1" type="checkbox" id="CheckAll1" value="Y" onClick="ClickCheckAll1(this);">
    </div></th>
  </tr>
<?php
$i1 = 0;
while($row = mysqli_fetch_array($objQuery))
{
$i1++;

?>

	  

  <tr>
  <td align="center" colspan="1"><?php echo $count; ?></td>
    <td align="center"colspan="1"><?php echo $row["pname"]; ?></td>
	<td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["ortime"]; ?></td>
      
	  <td align="center"colspan="5"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["instruc"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["code"]; ?></td>
	  
	  
	    <?php	  
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$qqt=$row['infusion'];

$sel1=mysqli_query($db,"SELECT * FROM medicine WHERE `mname`='$qqt';");
$result1 = mysqli_fetch_assoc($sel1);
//$dcode=$result1["dcode"];
$price=$result1["uprice"];

?>
	  
		  <td align="center"colspan="1"><?php echo $row["instruc"]*$price; ?></td>  
	  <td align="center"colspan="1"><?php if($row['bstatus']=='Billed') {echo "<span style='color:green;text-align:center;'><b>".$row['bstatus']."";} else {echo "<span style='color:Red;text-align:center;'><b>".$row['bstatus']."";}?></td>
	  
		
    
    <td align="center"><input type="checkbox" name="chkDel1[]" id="chkDel1<?php echo $i1;?>" value="<?php echo $row["id"];?>"></td>
  
  </tr>
<?php
 $count++;}
?>
<tr><td colspan="20" align="right"><button type="submit" name="btnDelete1">Billed</button><input type="hidden" name="hdnCount" value="<?php echo $i1;?>"></td>
</tr>
</table>
<?php
mysqli_close($objConnect);
?>



</form>


<form name="frmMain2" action="" method="post" OnSubmit="return onDelete2();">
<?php
$user=$_SESSION["sess_username"];
$pmrn=$pmrn;
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];
$dd=date('m/d/Y');
$count=1;


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from otanaesinfusion where pmrn= '$pmrn' and eid='$id' order by `id` desc;";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
?>

<table align="center" class="table table-bordered" id="dynamic_field">  
<tr>
<h1 align="center"style="background-color:lightgreen;">Infusion List(Anaesthesia)</h1>
</tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>Order By</strong></td>
	  <td colspan="1" align="center"><strong>Order Date</strong></td>
	  <td colspan="1" align="center"><strong>Due Date</strong></td>
	  <td colspan="1" align="center"><strong>Infusion</strong></td>
        
      <td colspan="5" align="center"><strong>Additive</strong></td>   
	  <td colspan="1" align="center"><strong>Dilution</strong></td> 
	  <td colspan="1" align="center"><strong>Price</strong></td>  
<td colspan="1" align="center"><strong>Status</strong></td> 	  
	  
	  

       

	   
    
    <th width="30"> <div align="center">
      <input name="CheckAll2" type="checkbox" id="CheckAll2" value="Y" onClick="ClickCheckAll2(this);">
    </div></th>
  </tr>
<?php
$i2 = 0;
while($row = mysqli_fetch_array($objQuery))
{
$i2++;

?>

	  

  <tr>
  <td align="center" colspan="1"><?php echo $count; ?></td>
    <td align="center"colspan="1"><?php echo $row["pname"]; ?></td>
	<td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["ortime"]; ?></td>
      
	  <td align="center"colspan="5"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["addi"].'-'.$row["qty1"].', '.$row["add1"].$row["qty2"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["code"]; ?></td>
	  
	  
	    <?php	  
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$qqt=$row['infusion'];

$sel1=mysqli_query($db,"SELECT * FROM medicine WHERE `mname`='$qqt';");
$result1 = mysqli_fetch_assoc($sel1);
//$dcode=$result1["dcode"];
$price=$result1["uprice"];

?>
	  
	  <td align="center"colspan="1"><?php echo $price; ?></td>
	  
	  <td align="center"colspan="1"><?php if($row['bstatus']=='Billed') {echo "<span style='color:green;text-align:center;'><b>".$row['bstatus']."";} else {echo "<span style='color:Red;text-align:center;'><b>".$row['bstatus']."";}?></td>
	  
		
    
    <td align="center"><input type="checkbox" name="chkDel2[]" id="chkDel2<?php echo $i2;?>" value="<?php echo $row["id"];?>"></td>
  
  </tr>
<?php
 $count++;}
?>
<tr><td colspan="20" align="right"><button type="submit" name="btnDelete2">Billed</button><input type="hidden" name="hdnCount" value="<?php echo $i2;?>"></td>
</tr>
</table>
<?php
mysqli_close($objConnect);
?>



</form>


<form name="frmMain3" action="" method="post" OnSubmit="return onDelete3();">
<?php
$user=$_SESSION["sess_username"];
$pmrn=$pmrn;
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];
$dd=date('m/d/Y');
$count=1;


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from otendoinfusion where pmrn= '$pmrn' and eid='$id' order by `id` desc;";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
?>

<table align="center" class="table table-bordered" id="dynamic_field">  
<tr>
<h1 align="center"style="background-color:lightgreen;">Infusion List(OT)</h1>
</tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>Order By</strong></td>
	  <td colspan="1" align="center"><strong>Order Date</strong></td>
	  <td colspan="1" align="center"><strong>Due Date</strong></td>
	  <td colspan="1" align="center"><strong>Infusion</strong></td>
        
      <td colspan="5" align="center"><strong>Additive</strong></td>   
	  <td colspan="1" align="center"><strong>Dilution</strong></td> 
	  <td colspan="1" align="center"><strong>Price</strong></td>  
<td colspan="1" align="center"><strong>Status</strong></td> 	  
	  
	  

       

	   
    
    <th width="30"> <div align="center">
      <input name="CheckAll3" type="checkbox" id="CheckAll3" value="Y" onClick="ClickCheckAll3(this);">
    </div></th>
  </tr>
<?php
$i3 = 0;
while($row = mysqli_fetch_array($objQuery))
{
$i3++;

?>

	  

  <tr>
  <td align="center" colspan="1"><?php echo $count; ?></td>
    <td align="center"colspan="1"><?php echo $row["pname"]; ?></td>
	<td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["ortime"]; ?></td>
      
	  <td align="center"colspan="5"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["addi"].'-'.$row["qty1"].', '.$row["add1"].$row["qty2"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["code"]; ?></td>
	  
	  
	  
	  
	    <?php	  
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$qqt=$row['infusion'];

$sel1=mysqli_query($db,"SELECT * FROM medicine WHERE `mname`='$qqt';");
$result1 = mysqli_fetch_assoc($sel1);
//$dcode=$result1["dcode"];
$price=$result1["uprice"];

?>
	  
	  <td align="center"colspan="1"><?php echo $price; ?></td>
	  
<td align="center"colspan="1"><?php if($row['bstatus']=='Billed') {echo "<span style='color:green;text-align:center;'><b>".$row['bstatus']."";} else {echo "<span style='color:Red;text-align:center;'><b>".$row['bstatus']."";}?></td>
	  
		
    
    <td align="center"><input type="checkbox" name="chkDel3[]" id="chkDel3<?php echo $i3;?>" value="<?php echo $row["id"];?>"></td>
  
  </tr>
<?php
 $count++;}
?>
<tr><td colspan="20" align="right"><button type="submit" name="btnDelete3">Billed</button><input type="hidden" name="hdnCount" value="<?php echo $i3;?>"></td>
</tr>
</table>
<?php
mysqli_close($objConnect);
?>



</form>


</body>

</html>
