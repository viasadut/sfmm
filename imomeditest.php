<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
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
 
$pmrn=$_REQUEST['pmrn'];
$full=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$eid1=$_REQUEST['eido']; 
 
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
$full=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$eid1=$_REQUEST['eido'];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and eid='$eid1'");
$data = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn'");
$data1 = mysqli_fetch_assoc($query5);

$query59 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data59 = mysqli_fetch_assoc($query59);


  
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
$odate = date('m/d/Y H:i:s');
$infu = $_REQUEST['infu'];
$remarks = $_REQUEST['remarks'];

$ins_query="insert into iinves (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`user`,`room`) values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$infu','$user','$remarks')";
mysqli_query($con,$ins_query) or die(mysql_error());

}
?>

<?php 

if(isset($_POST['Submit1'])){
$medi1=$_REQUEST['medi1'];
$pdos=$_REQUEST['pdos'];
$pmrn=$data1["pmrn"];
$pname=$data1["pname"];
$date1 = date('m/d/Y');
$ins_query1="insert into pmedi (`dname`,`pmrn`,`pname`,`medi`,`pdos`,`eid`,`date`) values ('$full','$pmrn','$pname','$medi1','$pdos','$eid','$date1')";
mysqli_query($con,$ins_query1) or die(mysql_error());}

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
$objConnect1 = mysql_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB1 = mysql_select_db("sfmmkpjnew");

	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
			
			
		{
			
			$qq = mysqli_query($db,"select * from pmedi where id='".$_POST["chkDel"][$i]."'");
			$dd = mysqli_fetch_assoc($qq);
			$dname=$dd['dname'];
			$pmrn=$dd['pmrn'];
			$medi=$dd['medi'];
			$pdos=$dd['pdos'];
			//$eid=$qq['eid'];
			//$date=$qq['date'];
			$date1 = date('m/d/Y');
			//$pdos=$_POST["test3"][$i];
			
			$strSQL = "insert into pmedi (`dname`,`pmrn`,`medi`,`pdos`,`eid`,`date`) values ('$dname','$pmrn','$medi','$pdos','$eid','$date1')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}

	echo '<script language="javascript">';
    echo 'alert("Successfully Added !!"); ';

    echo '</script>';

	
	$url = "meditest222?pmrn=$pmrn&eid=$eid&eido=$eid1&dname=$full";
header("Location: $url");

mysql_close($objConnect1);

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



  
          <head>  
           <title>Webslesson Tutorial | PHP Ajax Update MySQL Data Through Bootstrap Modal</title>  
           
		   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
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

<form name="frmMain1" action="" method="post" >


				

        <table align="center" class="table table-bordered" id="dynamic_field"> 
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Medication Form</strong></label></td> </tr>
<tr><td colspan="10" align="center"><label><strong>Medicine</strong></label></td> 

<td colspan="10" align="center"><label><strong>Dosage</strong></label></td> 
</tr>
<tr>
<td colspan="10" align="center"><input list="browsers111" name="medi1" size=60% class="form-control" required/>
  <datalist id="browsers111">

						<option value=''>-Select Medicine</option>
				<?php 
			$sql = "select * from `medicine`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname." (".$row->brand1.")"."'>".$row->mname." - ".$row->brand1."</option>";
				}
			}
			?>  </datalist></td>

<td  colspan="10"align="center"><input list="browsers11" name="pdos" class="form-control">
  <datalist id="browsers11">

						<option value=''>-Select Dosage</option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>			        

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit1">ADD</button></td>
	  
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
$dd=date('m/d/Y');

$count=1;


$objConnect = mysql_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysql_select_db("sfmmkpjnew");
$strSQL = "Select * from imedi2 where pmrn= '$pmrn' and eid='$eid'and status !='Cancel' and odate='$dd'order by `time` and `infusion` asc;";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
//$sel_query="Select * from pmedi where pmrn= '$pmrn' and eid='$eid1'order by `id` DESC;";

?>


<table align="center" class="table table-bordered" id="dynamic_field">  
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>Order By</strong></td>
	  <td colspan="1" align="center"><strong>Order Date</strong></td>
	  <td colspan="1" align="center"><strong>Order Time</strong></td>
        
      <td colspan="5" align="center"><strong>Medication</strong></td>   
	  <td colspan="1" align="center"><strong>Route</strong></td>
	  <td colspan="2" align="center"><strong>Instruction</strong></td>
      
      <td colspan="1" align="center"><strong>User Done</strong></td>
	  <td colspan="2" align="center"><strong>Done time</strong></td>
	  <td colspan="1" align="center"><strong>Caution</strong></td>
	  <td colspan="1" align="center"><strong>PStatus</strong></td>
	  <td colspan="1" align="center"><strong>Stop</strong></td>
	  <td colspan="1" align="center"><strong>Stop ALL</strong></td>
      <td colspan="1" align="center"><strong>ADD</strong></td> 
					  <th width="30"> <div align="center">
      <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
    </div></th>
       

	   </tr>
	<?php
$i = 0;
while($row = mysql_fetch_array($objQuery))
{
$i++;

?>
   


<tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      
	  <td align="center"colspan="1"><?php echo $row["orderby"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["time"]; ?></td>  
	  <td align="center"colspan="5"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["root"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["instruc"]; ?></td>
	  
	  <td align="center"colspan="1"><?php echo $row["udone"]; ?></td>
	  
	  <td align="center"colspan="2"><?php echo $row["donet"]; ?></td>
	  <td align="center"colspan="1"<?php if($row['alert']== "H. Medi"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row['alert'];?></td>
  	  <td align="center"colspan="1"><?php echo $row["pstatus"]; ?></td>
<td align="center" colspan="1"><a onclick="return confirm_click();" href="imediupdate1?id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>&user=<?php echo $user; ?>">Stop</a></td>
<td align="center" colspan="1"><a href="imediupdatemo?id=<?php echo $row["id"]; ?>&user=<?php echo $user; ?>&pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>">Stop ALL</a></td>
<td align="center" colspan="1"><a onclick="return confirm_click1();" href="imoinmeditomorrow?pmrn=<?php echo $row["pmrn"]; ?>&dname=<?php echo $row["dname"]; ?>&eid=<?php echo $row["eid"]; ?>&infusion=<?php echo $row["infusion"]; ?>&time=<?php echo $row["time"]; ?>&instruc=<?php echo $row["instruc"]; ?>&orderby=<?php echo $user; ?>&root=<?php echo $row["root"]; ?>&alert=<?php echo $row["alert"]; ?>">ADD For Tomorrow</a></td>


<td align="center"><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $i;?>" value="<?php echo $row["id"];?>"></td>

	  
      </tr>
    <?php
 $count++;}
?>
<tr><td colspan="20" align="right"><button type="submit" id="btnDelete" name="btnDelete">ADD ALL</button><input type="hidden" name="hdnCount" value="<?php echo $i;?>"></td>
</tr>
</table>
<?php
mysql_close($objConnect);
?>

	        		  
	        <table align="center" class="table table-bordered" id="dynamic_field"> 	  

<tr><td colspan='20'align="center" font-size='16'bgcolor="lightblue"><b>NEW Medication<b></td></tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="10" align="center"><strong>Medicine NAME</strong></td>
      	  <td colspan="5" align="center"><strong>Dosage</strong></td>
		        	  <td colspan="2" align="center"><strong>DELETE</strong></td>
       

	   </tr>
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
$sel_query="Select * from pmedi where pmrn= '$pmrn' and eid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
			      <td align="center"colspan="5"><?php echo $row["pdos"]; ?></td>
				  
				  
	
				  
				  			  
				  
				 <td align="center" colspan="2"><a href="delete1tt?id=<?php echo $row["id"]; ?>&pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$dname"; ?>&eid=<?php echo "$eid"; ?>&eid1=<?php echo "$eid1"; ?>">DELETE</a></td>

  	  

	  
      </tr>
    <?php $count++; } ?>

	<tr><td align="right" colspan="20"><button onclick="self.close()">Close</button></td></tr>
</table>

</form>

</body>

 
 


 
 
 
 