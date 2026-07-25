<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','moopd')"; 
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
//$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
//$pname=$_REQUEST['pname'];
$full=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$eid1=$_REQUEST['eido'];
$date77=date('Y-m-d');

//include("auth.php");
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
//$query4 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and eid='$eid1'");
//$data = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' order by ID desc limit 1");
$data1 = mysqli_fetch_assoc($query5);
//$pname=$data1["pname"];
$page=$data1["page"];
$psex=$data1["psex"];
$pphone=$data1["pphone"];
$pname=$data1["pname"];

//$query59 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
//$data59 = mysqli_fetch_assoc($query59);

$url = "newtest2_edit.php?pmrn=$pmrn&dname=$full&eido=$eid1&eid=$eid&pname=$pname"; 

  
?>

<?php

if(isset($_POST['Submit1_a']))
{


//$dname =$_REQUEST["adoc"];
//$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$date = date('m/d/Y');
$medi1=$_REQUEST['medi'];

$page=$data1["page"];
$psex=$data1["psex"];
$pphone=$data1["pphone"];
//$pins = $_REQUEST['pins'];
//$pname=$data1["pname"];
//$dtime = $_REQUEST['dtime'];
$query159 = mysqli_query($db,"select * from doc_inves where iname='$medi1'");

while($data159 = mysqli_fetch_assoc($query159))
//while($row = mysqli_fetch_assoc($result)) 
{
$ii=$data159["medi"];
$ii2=$data159["ins"];



$query9 = mysqli_query($db,"select * from radio where iname='$ii' and status='Active'");
$data9 = mysqli_fetch_assoc($query9);


$type=$data9["type"];
$price=$data9["price"];
$code=$data9["code"];
//echo $type;
//echo $type;
$link=$data9["link"];
$linkv=$data9["linkv"];
$report=$data9["report"];
$reportv=$data9["reportv"];

$subtype=$data9["subtype"];



/*$sel9=mysqli_query($db,"SELECT * FROM radio WHERE `mname`='$ii'");
$result9 = mysqli_fetch_assoc($sel9);
$brand2=$result9["brand1"];*/
//echo $type;
//echo $type;

//$ins_query="insert into pmedi (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`date`) values ('$full', '$pmrn','$pname','$eid','$medi','$pins','$date','$type','$date')";
//mysqli_query($con,$ins_query) or die(mysql_error());


$ins_query="insert into alltest (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`price`,`code`,`link`,`date1`,`linkv`,`report`,`reportv`,`location`,`page`,`pgender`,`pphone`,`subtype`) values 
('$full', '$pmrn','$pname','$eid','$ii','$ii2','$date','$type','$price','$code','$link','$date77','$linkv','$report','$reportv','OPD','$page','$psex','$pphone','$subtype')";
mysqli_query($con,$ins_query) or die(mysql_error());


//$ins_query1="insert into pmedi (`dname`,`pmrn`,`pname`,`medi`,`eid`,`brand`,`pdos`,`date`,`ndate`) values ('$full','$pmrn','$pname','$ii','$eid','$brand2','$ii2','$date1','$date2')";
//mysqli_query($con,$ins_query1) or die(mysql_error());


}
header("location:$url");
}
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
$pmrn = $_REQUEST['pmrn'];
$date = date('m/d/Y');
$medi = $_REQUEST['medi'];
$pins = $_REQUEST['pins'];
//$pname=$_REQUEST["pname"];
$page=$data1["page"];
$psex=$data1["psex"];
$pphone=$data1["pphone"];
//$dtime = $_REQUEST['dtime'];
$query159 = mysqli_query($db,"select * from radio where iname='$medi' and status='Active'");
$data159 = mysqli_fetch_assoc($query159);
$type=$data159["type"];
$price=$data159["price"];
$code=$data159["code"];
//echo $type;
//echo $type;
$link=$data159["link"];
$linkv=$data159["linkv"];
$report=$data159["report"];
$reportv=$data159["reportv"];

$subtype=$data159["subtype"];

$sel90="SELECT * FROM radio WHERE `iname`='$medi' and status='Active';";
$result90 = mysqli_query($con,$sel90);
if($res90=mysqli_num_rows($result90)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Investigation Name is not in the Database List.. Please contact with Concern Department"); ';
    echo '</script>';
    }

else{



$ins_query="insert into alltest (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`price`,`code`,`link`,`date1`,`linkv`,`report`,`reportv`,`location`,`page`,`pgender`,`pphone`,`subtype`) values ('$full', '$pmrn','$pname','$eid','$medi','$pins','$date','$type','$price','$code','$link','$date77','$linkv','$report','$reportv','OPD','$page','$psex','$pphone','$subtype')";
mysqli_query($con,$ins_query) or die(mysql_error());

}
header("location:$url");
}
?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
/*if(isset($_POST['DELETE']))
{
require('db1.php');
$id=$_REQUEST['id'];
$query23 = "DELETE FROM alltest WHERE id=$id"; 
$result23 = mysqli_query($con,$query23) or die ( mysqli_error());
//header("Location: newtest2.php"); 
}*/
?>
<?php
$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database

$dbhandle = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
mysqli_select_db($dbhandle, "sfmmkpjnew");
//$dbhandle = mysql_connect($hostname, $username, $password) 
 //or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
//$selected = mysql_select_db("sfmmkpjnew",$dbhandle) 
  //or die("Could not select examples");

  
$query198 = "SELECT SUM(price) FROM alltest where pmrn='$pmrn'and eid='$eid'"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
$test1=	$row198['SUM(price)'];
//echo $test1;


?>



<?php

if(isset($_POST['btnDelete']))

{	
	
if(empty($_REQUEST['chkDel']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}
else {
$objConnect1 = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB1 = mysqli_select_db($objConnect1,"sfmmkpjnew");

	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
			
			
		{
			
			$qq = mysqli_query($db,"select * from alltest where id='".$_POST["chkDel"][$i]."'");
			$dd = mysqli_fetch_assoc($qq);
			
			
			//$edit= $dd["pdos"];
			//$edit1= $dd["duration"];
			
			$medi=$dd['medi'];
//			$pins=$_REQUEST['pins'][$i];
$pins=$dd['ins'];
			$type=$dd["type"];
			$price=$dd["price"];
			$code=$dd["code"];
			//echo $type;
			//echo $type;
			$link=$dd["link"];
			$linkv=$dd["linkv"];
			$report=$dd["report"];
			$reportv=$dd["reportv"];

			$subtype=$dd["subtype"];
			
			
			//$eid=$qq['eid'];
			//$date=$qq['date'];
			$date1 = date('m/d/Y');
			$date2 = date('Y-m-d');
			//$pdos=$_POST["test3"][$i];
			
			$strSQL = "insert into alltest (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`price`,`code`,`link`,`date1`,`linkv`,`report`,`reportv`,`location`,`page`,`pgender`,`pphone`,`subtype`) values 
			('$full', '$pmrn','$pname','$eid','$medi','$pins','$date','$type','$price','$code','$link','$date77','$linkv','$report','$reportv','OPD','$page','$psex','$pphone','$subtype')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysqli_query($objConnect1,$strSQL);
		}
	}

	echo '<script language="javascript">';
    echo 'alert("Successfully Added !!"); ';

    echo '</script>';

	
	$url = "newtest2_edit?pmrn=$pmrn&eid=$eid&eido=$eid1&dname=$full&pname=$pname";
//header("Location: $url");


mysqli_close($objConnect1);
}
header("location:$url");
}

?>

<!DOCTYPE html>
<html lang="en" >

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
  width: 20%;
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
		if(confirm('Do you want to Add the Medicine ?')==true)
		{
			return true;
			
		}
		else
		{
			return false;
			
		}
	}
</script>

  
          <head>  
           <title>Load Previous Investigation</title>  
           
		   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
      </head>  


<script type="text/javascript">
$(document).ready(function()
{
	$("#loding1").hide();
	
	$(".form-control").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".state").find('option').remove();
	
		$.ajax
		({
			type: "POST",
			url: "ccc.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".state").html(html);
			} 
		});
		
		
		
		$.ajax
		({
			type: "POST",
			url: "ccc1.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				
				$(".state1").html(html);
			} 
		});
	
	
	
	
	$.ajax
		({
			type: "POST",
			url: "ccc2.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".state2").html(html);
			} 
		});
		
	});
	
});
</script>
<head>  

  
		   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
           
           
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
   
   <li class='last'><a href='../../logout'><span>LOGOUT</span></a></li>
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
				<td colspan="6"><?php echo $full; ?></td>
				<td colspan="6"><?php echo $data1["pname"]; ?></td>
				<td colspan="4"><?php echo $pmrn; ?></td>
				<td colspan="4"><?php echo $eid; ?> </td>	
												
						
				
</tr>
						

						
						
					


				

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Form</strong></label></td> </tr>
<tr><td colspan="10" align="center"><label><strong>Investigation</strong></label></td> 

<td colspan="10" align="center"><label><strong>Instructions</strong></label></td> 
</tr>
<tr>
<td colspan="10" align="center">
<select id="pmrn" onchange="GetDetail(this.value)" class="con_charge" list="categoryname" autocomplete="off" name='medi' required>

						<option value=''>-Select Investigation-</option>
				
				<?php 
			$sql = "select distinct iname from `doc_inves` where dname='$user'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->iname."'>".$row->iname."</option>";
				}
			}
			?>
				<?php 
			$sql = "select distinct iname from `doc_inves` where uname='$user'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->iname."'>".$row->iname."</option>";
				}
			}
			?>
				
				
				
				<?php 
			$sql = "select * from `radio` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->iname."'>".$row->iname." (TAT-".$row->tat_r.")</option>";
				}
			}
			?>  </select>
			
			
					
			<link rel="stylesheet"
			href=
"jsnew_1/chosen.min.css" />

		<!--These jQuery libraries for select2
			need to be included-->
		<script src=
"jsnew_1/select2.min.js">
	</script>
		<link rel="stylesheet"
			href=
"jsnew_1/select2.min.css" />			
			<script>
$(document).ready(function() {
    $('.con_charge').select2();
});
</script>
			
			</td>

<td colspan="10" align="center">
<textarea name="pins" id="remarks" class="form-control action" cols="30" rows="10"></textarea>
</td>


</tr>

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit1">ADD</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="Submit1_a">ADD SET</button></td>
		
	  
</tr>	

</form>

<form name="frmMain" action="" method="post" OnSubmit="return onDelete();">


<?php

$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];
//$test=$_REQUEST["test"];
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from alltest where pmrn= '$pmrn' and eid='$eid1'order by `id` DESC;";
$objQuery = mysqli_query($objConnect, $strSQL) or die ("Error Query [".$strSQL."]");
//$sel_query="Select * from pmedi where pmrn= '$pmrn' and eid='$eid1'order by `id` DESC;";

?>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="12" align="center"bgcolor="lightgreen"><strong>Previous Investigation</strong></td>
      	  <td colspan="4" align="center"><strong>Instruction</strong></td>		  
		        	  
					  
					  <td colspan="1"> <div align="center">
      <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
    </div></td>
       

	   </tr>
	<?php
$i = 0;
while($row = mysqli_fetch_array($objQuery))
{
$i++;

?>
   


<tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><input type="text" name="test1" id="test1" value="<?php echo $row["pmrn"]; ?>"readonly></td>
	  <td align="center"colspan="12"><input type="text" name="medi" id="test2" value="<?php echo $row["medi"]; ?>" readonly></td>
	  <td align="center"colspan="4"><input type="text" name="pins[]" id="pins<?php echo $i;?>"value="<?php echo $row["ins"]; ?>"></td>
	  
				  
				  




<td align="center"colspan="1"><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $i;?>" value="<?php echo $row["id"];?>">



</td>

	  
      </tr>
    <?php
 $count++;}
?>
<tr><td colspan="21" align="right"><button type="submit" id="btnDelete" name="btnDelete">ADD SELECTED</button><input type="hidden" name="hdnCount" value="<?php echo $i;?>"></td>
</tr>

<?php
mysqli_close($objConnect);
?>




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
$eid=$_REQUEST["eid"];
$dname=$_REQUEST["dname"];
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
			      <td align="center"colspan="3"><?php echo $row["ins"]; ?><input type="button" name="edit_co" value="E" id="<?php echo $row['id']; ?>" class="btn btn-info btn-xs edit_data_co" /></td>
				  <td align="center"colspan="2"><?php echo $row["price"]; ?></td>
				  <td align="center" colspan="2"><a href="delete_edit?id=<?php echo $row["id"]; ?>&pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$dname"; ?>&eid=<?php echo "$eid"; ?>&eido=<?php echo "$eid1"; ?>">DELETE</a></td>

  	  

	  
      </tr>
    <?php $count++; } ?>
<tr><td align="right" colspan="20"><button onclick="self.close()">Close</button></td></tr>

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Cost For The Selected Investigation Will Be:<?php echo $test1;?> (BDT)</strong></td></tr>
</table>

</form>


</body>

</html>
 
  <div id="dataModal7" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal7" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Edit Instruction</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" name="insert_form7" id="insert_form7">  
                         <label>Patient MRN</label>  
                          <input type="text" name="pmrn1" id="pmrn1" class="form-control" size="15" readonly>  
                          
                          <label>Investigation</label>  
                          <input type="text" name="phyper" id="phyper" class="form-control"  size="15" readonly>  
                          
                          <label>Instruction</label>  
                          <input type="text" name="pheart" id="pheart" class="form-control" />  
						  
						  
                          
                          <input type="hidden" name="employee_id2" id="employee_id2" />  
                         <input type="submit" name="insert" id="insert450" value="Insert" class="btn btn-success" />  
													
													
                           
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  

<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form7')[0].reset();  
      });  
      $(document).on('click', '.edit_data_co', function(){  
           var employee_id2 = $(this).attr("id");  
           $.ajax({  
                url:"edit_opd_inves.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn1').val(data.pmrn);  
                     $('#phyper').val(data.medi);  
                     $('#pheart').val(data.ins); 
					 $('#employee_id2').val(data.id);  
                     $('#insert450').val("Update");  
                     $('#add_data_Modal7').modal('show');  
					  
                     
					 
          

		  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form7').on("submit", function(event){  
           event.preventDefault();  
           if($('#phyper').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#pheart').val() == '')  
           {  
                alert("Address is required");  
           }  
           
           else  
           {  
          $.ajax({  
                     url:"edit_opd_inves1.php",  
                     method:"POST",  
                     data:$('#insert_form7').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form7')[0].reset();  
                          $('#add_data_Modal7').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });   
     
 });  
 </script>
 
 
 
 <script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				//document.getElementById("sformat").value = "";

				document.getElementById("remarks").value = "";
				//document.getElementById("porder").value = "";
				
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
						
						//document.getElementById
						//("sformat").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"remarks").value = myObj[0];
							
							//document.getElementById(
							//"porder").value = myObj[2];
							
							
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "inves_details_new.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script> 