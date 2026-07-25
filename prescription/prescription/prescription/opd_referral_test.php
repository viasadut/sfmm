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
$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$full=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$eid1=$_REQUEST['eido'];
$date77=date('Y-m-d');

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($db,"select * from pappnew where ID='$id'");
$data1 = mysqli_fetch_assoc($query5);

//$query59 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
//$data59 = mysqli_fetch_assoc($query59);

$pname=$data1["pname"];  
?>

<?php

if(isset($_POST['Submit']))
{


//$dname =$_REQUEST["adoc"];
//$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$date = date('m/d/Y');
$medi1=$_REQUEST['medi'];

$page=$data1["page"];
$psex=$data1["psex"];
$pphone=$data1["pphone"];
$pins = $_REQUEST['pins'];
$pname=$data1["pname"];
//$dtime = $_REQUEST['dtime'];





$sel990="SELECT * FROM doctor1 WHERE `dname`='$medi1' and status='Active';";
$result990 = mysqli_query($con,$sel990);
$data11 = mysqli_fetch_assoc($result990);
$dis=$data11['Discipline'];




if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The "); ';
    echo '</script>';
    }


/*$sel9=mysqli_query($db,"SELECT * FROM radio WHERE `mname`='$ii'");
$result9 = mysqli_fetch_assoc($sel9);
$brand2=$result9["brand1"];*/
//echo $type;
//echo $type;

//$ins_query="insert into pmedi (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`date`) values ('$full', '$pmrn','$pname','$eid','$medi','$pins','$date','$type','$date')";
//mysqli_query($con,$ins_query) or die(mysql_error());

else {
$ins_query="insert into opd_referral (`ref_name`,`dis`,`reason`,`ref_by`,`pname`,`pmrn`,`eid`,`rdate`) values 
('$medi1', '$dis','$pins','$full','$pname','$pmrn','$eid','$date77')";
mysqli_query($con,$ins_query) or die(mysql_error());

}
//$ins_query1="insert into pmedi (`dname`,`pmrn`,`pname`,`medi`,`eid`,`brand`,`pdos`,`date`,`ndate`) values ('$full','$pmrn','$pname','$ii','$eid','$brand2','$ii2','$date1','$date2')";
//mysqli_query($con,$ins_query1) or die(mysql_error());



//header("Refresh: .1;");
}
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

  
/*$query198 = "SELECT SUM(price) FROM alltest where pmrn='$pmrn'and eid='$eid'"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
$test1=	$row198['SUM(price)'];
//echo $test1;

*/
?>



<?php

if(isset($_POST['btnDelete']))

	
	
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
			
			$qq = mysqli_query($db,"select * from opd_referral where id='".$_POST["chkDel"][$i]."'");
			$dd = mysqli_fetch_assoc($qq);
			
			
			//$edit= $dd["pdos"];
			//$edit1= $dd["duration"];
			//$pins1=$_REQUEST['pins'][$i];
			$pins1=$dd['reason'];
			$medi=$dd['ref_name'];
			$dis=$dd['dis'];
			
			/*$type=$dd["type"];
			$price=$dd["price"];
			$code=$dd["code"];
			//echo $type;
			//echo $type;
			$link=$dd["link"];
			$linkv=$dd["linkv"];
			$report=$dd["report"];
			$reportv=$dd["reportv"];

			$subtype=$dd["subtype"];
			*/
			
			//$eid=$qq['eid'];
			//$date=$qq['date'];
			$date1 = date('m/d/Y');
			$date2 = date('Y-m-d');
			//$pdos=$_POST["test3"][$i];
			
			

			$strSQL = "insert into opd_referral (`ref_name`,`dis`,`reason`,`ref_by`,`pname`,`pmrn`,`eid`,`rdate`) values
			
('$medi', '$dis','$pins1','$full','$pname','$pmrn','$eid','$date77')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysqli_query($objConnect1,$strSQL);
		}
	}

	echo '<script language="javascript">';
    echo 'alert("Successfully Added !!"); ';

    echo '</script>';

	
	$url = "opd_referral?pmrn=$pmrn&eid=$eid&eido=$eid1&dname=$full&ID=$id";
//header("Location: $url");

header("Refresh: .01;");
mysqli_close($objConnect1);

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
		if(confirm('Do you want to Add the referral ?')==true)
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
           <title>Load Previous Referral</title>  
           
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
				<td colspan="6"><?php echo $full; ?></td>
				<td colspan="6"><?php echo $data1["pname"]; ?></td>
				<td colspan="4"><?php echo $pmrn; ?></td>
				<td colspan="4"><?php echo $eid; ?> </td>	
												
						
				
</tr>
						

						
						
					


				

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Referral Form</strong></label></td> </tr>
<tr><td colspan="10" align="center"><label><strong>Referral Consultant Name</strong></label></td> 

<td colspan="10" align="center"><label><strong>Remarks</strong></label></td> 
</tr>
<tr>
<td colspan="10" align="center"><input list="browsers1" name="medi" size=60% class="form-control" autocomplete="off" required>
  <datalist id="browsers1">

						<option value=''>-Select Consultant-</option>
				
				
			<?php 
			$sql = "select * from `doctor1` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."-".$row->Discipline."</option>";
				}
			}
			?>
				
				 </datalist></td>

<td colspan="10" align="center"><input type="text" name="pins" value="" ></td>

</tr>			        

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">ADD</button></td>
	 
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
$strSQL = "Select * from opd_referral where pmrn= '$pmrn' and eid='$eid1'order by `id` DESC;";
$objQuery = mysqli_query($objConnect, $strSQL) or die ("Error Query [".$strSQL."]");
//$sel_query="Select * from pmedi where pmrn= '$pmrn' and eid='$eid1'order by `id` DESC;";

?>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="6" align="center" bgcolor="lightgreen"><strong>Referral Consultant</strong></td>
     	  <td colspan="12" align="center"><strong>Remarks</strong></td>
      	  	  
		        	  
					  
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

      <td align="center"colspan="6"><input type="text" name="test1" id="test1" value="<?php echo $row["ref_name"]; ?>"readonly></td>
	  
	  <td align="center"colspan="12"><input type="text" name="pins[]" id="pins<?php echo $i;?>"value="<?php echo $row["reason"]; ?>"></td>
	  
				  
				  




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
     	  <td colspan="10" align="center"><strong>Referral Consultant</strong></td>
      	  <td colspan="3" align="center"><strong>Instruction</strong></td>
		  <td colspan="3" align="center"><strong>Referred By</strong></td>
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
$sel_query="Select * from opd_referral where pmrn= '$pmrn' and eid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["ref_name"]; ?></td>
			      <td align="center"colspan="3"><?php echo $row["reason"]; ?></td>
				  <td align="center"colspan="2"><?php echo $row["ref_by"]; ?></td>
				  <td align="center" colspan="2"><a href="delete_opd?id=<?php echo $row["id"]; ?>&pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$dname"; ?>&eid=<?php echo "$eid"; ?>&ID=<?php echo "$id"; ?>">DELETE</a></td>

  	  

	  
      </tr>
    <?php $count++; } ?>
<tr><td align="right" colspan="20"><button onclick="self.close()">Close</button></td></tr>


</table>

</form>


</body>

</html>
 
 