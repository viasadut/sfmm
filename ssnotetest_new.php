<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
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
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

$date1=date('Y-m-d');

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
//$eid=$_REQUEST['eid'];
$id=$_REQUEST['id'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from ot where id='$id'");
$data = mysqli_fetch_assoc($query4);

$otdate=$data['otdate'];
$ottype=$data['typeo'];


 
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
//$pmrn = $data['pmrn'];
//$eid = $data['eid'];
//$padd = $data['padd'];
//$adm = $data['adate'];
//$pphone=$data['pphone'];
//$page=$data['page'];
//$psex=$data['psex'];
//$odate = $_REQUEST['odate'];
//$otime = $_REQUEST['otime'];
//$infu = $_REQUEST['infu'];

$proname = $_REQUEST['proname'];
$sreport = $_REQUEST['sreport'];
$charge = $_REQUEST['charge'];
$inorder = $_REQUEST['inorder'];
//$otherins = $_REQUEST['otherins'];

$adate1= date('d/m/Y H:i:s');
//$x=$_REQUEST['xl'];
//$lx= implode(",",$x);
$plevel = $_REQUEST['plevel'];

$sel90="SELECT * FROM otreport WHERE `pmrn`='$pmrn' and `eid`='$id' and `pname`='$proname' and sname='$full';";
$result90 = mysqli_query($con,$sel90);

$sel95="SELECT * FROM privilege WHERE `pname`='$proname';";
$result95 = mysqli_query($con,$sel95);



if($res95=mysqli_num_rows($result95)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Procedure Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }




else if($res90=mysqli_num_rows($result90)==1)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Note Already Written.. To Modify it Please go to Edit Option"); ';
    echo '</script>';
    }
	
else if(empty($_REQUEST['plevel']))


{
	
	
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Please select participation level"); ';
    echo '</script>';
}	
	

else if($full=='')


{
	
	
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Session Closed"); ';
    echo '</script>';
}	


else{
$ins_query="insert into otreport (`pmrn`,`eid`,`pname`,`otdate`,`sname`,`sreport`,`ottype`,`date1`,`charge`,`plevel`) values ( '$pmrn','$id','$proname','$otdate','$full','$sreport','$ottype','$date1','$charge','$plevel')";
mysqli_query($con,$ins_query) or die(mysql_error());

$ins_query7="insert into otivisitendo (`pmrn`,`eid`,`infusion`,`room`,`cdate`,`user`,`vtype`,`odate`) values 
( '$pmrn','$id','$full','$charge','$date1','$user','$proname','$adate1')";
mysqli_query($con,$ins_query7) or die(mysql_error());



$update90= "update ot set inorder='$inorder' where `id`='$id'";

mysqli_query($con,$update90);


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
    max-width: 1200px;
  }

}
      </style>

    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>

  
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
<script src="ckeditor_new/ckeditor.js"></script>  
  <head>
    
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
return confirm("Are You Sure to Delete This Note ?");
}

</script>
<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Add ICU Visit ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Add Emergency Visit ?");
}

</script>
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
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">
<table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><a target='_blank' href="history11dochis?pmrn=<?php echo "$pmrn"; ?>"><b>Patient's Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="opdradreport?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Radiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="endoreportin?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Endoscopy Report<b></a>&nbsp;&nbsp<a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>LAB REPORT<b></a></td></tr>
		
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><input type="text" name="dname" value="<?php echo $data["dname"]; ?>"disabled></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="7"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="7"><input type="text" name="pmrn" value="<?php echo $data["pmrn"]; ?>"disabled> </td>
				<td colspan="3"><input type="text" name="eid" value="<?php echo $data["eid"]; ?>"disabled> </td>
					 <td colspan="10"><input type="text" name="pname" value="<?php echo $data["pname"]; ?>"disabled> </td>

					 
</tr>

						
						


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="5"><label><strong>Admission Date:</strong></label></td>
						<td colspan="5"><label><strong>Gender:</strong></label></td>
						<td colspan="5"><label><strong>Phone NO:</strong></label></td>
						
						
						</tr>
						
						<tr>				
						<td colspan="5"><input type="text" name="page" value="<?php echo $data["page"]; ?>"disabled> </td>  
             		<td colspan="5"> <input type="text" name="adm" value="<?php echo $data["adate"]; ?>"disabled> </td>					 	
					 <td colspan="5"><input type="text" name="psex" value="<?php echo $data["psex"]; ?>"disabled></td>
					 <td colspan="5"><input type="text" name="pphone" value="<?php echo $data["pphone"]; ?>"disabled></td>  

			    	 
					 </tr>


						
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Doctor's NOTE</strong></label></td> </tr>




<tr>



<tr><td colspan="20"><label><strong>Participation Level:</strong></label></td></tr>
<tr>
					 <td colspan="20">
	
	<select id="" name='plevel' required>
		
<option value='<?php if(isset($_POST['load'])==1){echo $_REQUEST['plevel'];}?>'><?php if(isset($_POST['load'])==1){echo $_REQUEST['plevel'];}?></option>
<option value='Surgeon'>Surgeon</option>
<option value='Assist'>Assist</option>

      
    </select>

    
</td></tr>
		  


<tr><td colspan="20"><label><strong>Procedure Name:</strong></label></td>  </tr>


<tr><td colspan="20"><input list="proname11" name="proname" class="form-control" value="<?php if(isset($_POST['load'])==1)
{ $date10 = $_REQUEST['proname'];
echo $date10;

$query45 = mysqli_query($db,"select * from privilege where pname='$date10' and dname='$full'");
$data45 = mysqli_fetch_assoc($query45);
}
?>" autocomplete="off" >
	
	<datalist id="proname11">
		


       <?php 
			$sql = "select * from `privilege` where dname='$full' and status='Approved'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->pname."'>".$row->pname."</option>";
				}
			}
			?>
    </datalist>

    
</td></tr>


<tr><td colspan="20">



									  
                                      <!-- Password Input -->
									  <!-- Age Dropdown -->
                                      <input name="load" type="submit" id="load" value="Load Template">
									  </td></tr>
									  

							

		  
									  
									  <tr>	
	  <td colspan="20" align="center">

									
                                    
                                           <textarea name="sreport" id="sformat1"rows="25"cols="25" >
										   
										   <?php if(isset($_POST['load'])==1){echo $data45['sformat'];}?>
										   
										   </textarea>
                                               
										 
                                    </td>
									</tr>
                                
								
								
  
  <script>
 CKEDITOR.replace( 'sreport', {
  height: 700,
  
  
  extraPlugins : 'filebrowser',
    filebrowserBrowseUrl:'browser.php?type=Images',
    filebrowserUploadMethod:"form",
    filebrowserUploadUrl: "upload_topic.php"
 });
</script>
									  
									  






<tr><td colspan="20" bgcolor="lightgreen"><label><strong>Post Operative Order:</strong></label></td></tr>

	
<tr><td colspan="20"><textarea class="form-control" name="inorder" rows="25" id="porder">

<?php if(isset($_POST['load'])==1){echo $data45['porder'];}?>


</textarea></td>  </tr>


<script>
 CKEDITOR.replace( 'inorder', {
  height: 400,
  
  
  extraPlugins : 'filebrowser',
    filebrowserBrowseUrl:'browser.php?type=Images',
    filebrowserUploadMethod:"form",
    filebrowserUploadUrl: "upload_topic.php"
 });
</script>


<tr><td colspan="20" align="left"bgcolor="lightgreen"><label><strong>Charge</strong></label></td> </tr><tr>
<td colspan="20" ><input type="text" name="charge" id="charge" value="<?php if(isset($_POST['load'])==1){echo $data45['charge'];}?>"></td>
</tr>
<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">Confirm</button></td>
	  
</tr>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Note By</strong></td>
      <td colspan="1" align="center"><strong>Date </strong></td>
      
      <td colspan="3" align="center"><strong>Procedure Name</strong></td>
	  <td colspan="7" align="center"><strong>Surgery Note</strong></td>
	  <td colspan="2" align="center"><strong>Charge</strong></td>
	  <td colspan="1" align="center"><strong>Delete</strong></td>
	  

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
//$episode=$data["eid"];

$count=1;
$sel_query="Select * from otreport where pmrn= '$pmrn' and eid='$id' and c_status=''order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["sname"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["otdate"]; ?></td>  
      
	  <td align="center"colspan="3"><?php echo $row["pname"].' '.$row["others"]; ?></td>
	  <td align="center"colspan="7"><?php echo $row["sreport"]; ?></td>
	  	  <td align="center"colspan="2"><?php echo $row["charge"]; ?></td>
      
	  


	  
	   <?php 
	  $id1=$row["id"];
	  $user7=$row["sname"];
	  $url7 = "ot_note_delete?pmrn=$pmrn&id=$id1&id1=$id"; 
	  
	  if($user7==$full){echo"
	  <td colspan='1' align='center'><a href='$url7'><strong>Delete</strong></a></td>
	  ";} else{echo"<td colspan='1'></td>";}?>	
	  
      </tr>
    <?php $count++; } ?>
</table>

<td colspan="10"><a target='_blank' href="newotnote?eid=<?php echo "$id"; ?>&pmrn=<?php echo "$pmrn"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
</form>
</body>

</html>
