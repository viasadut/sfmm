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
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
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
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
	
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data["age"]; ?></td>  
             		<td colspan="3"><?php echo $data["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data["gender"]; ?></td>
					 <td colspan="4"><?php echo $data["pphone"]; ?></td>  

				 </tr>



				

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Form</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Requested By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="6" align="center"><strong>Investigation</strong></td>
      <td colspan="3" align="center"><strong>Remarks</strong></td>   
       	  <td colspan="2" align="center"><strong>RECEIVED</strong></td>
		  <td colspan="2" align="center"><strong>REJECT</strong></td>

	   </tr>
	   
	   

	
 <?php
	
$user=$_SESSION["sess_username"];

//$id=$_REQUEST["id"];
//$episode=$data["eid"];

$count=1;
$sel_query="Select * from einves where pmrn= '$pmrn' and eid='$eeid1' and status='Data Updated' and type='lab' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="6"style="color: red;"><b><?php echo $row["infusion"]; ?><b></td>
	        <td align="center"colspan="3"><?php echo $row["room"]; ?></td>
      
<td colspan="2" align="center"><a href="emerlab2?pmrn=<?php echo "$row[pmrn]"; ?>&id=<?php echo "$row[id]"; ?>&eid=<?php echo "$row[eid]"; ?>"><strong>RECEIVE</strong></a></td>	    	  

<td colspan="2" align="center"><a href="labreject1emer?pmrn=<?php echo "$row[pmrn]"; ?>&id=<?php echo "$row[id]"; ?>&eid=<?php echo "$row[eid]"; ?>"><strong>REJECT</strong></a></td>	  


      </tr>
    <?php $count++; } ?>


	
	   
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
//$episode=$data["eid"];

$count=1;
$sel_query="Select * from iinves where pmrn= '$pmrn' and eid='$eid' and status='Data Updated' and type='lab' and rstatus !='Cancelled' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="6"><?php echo $row["infusion"]; ?></td>
	        <td align="center"colspan="3"><?php echo $row["room"]; ?></td>
      
  	  
<td colspan="2" align="center"><a href="labreceive?pmrn=<?php echo "$row[pmrn]"; ?>&id=<?php echo "$row[id]"; ?>&eid=<?php echo "$row[eid]"; ?>"><strong>RECEIVE</strong></a></td>	  
<td colspan="2" align="center"><a href="labreject1?pmrn=<?php echo "$row[pmrn]"; ?>&id=<?php echo "$row[id]"; ?>&eid=<?php echo "$row[eid]"; ?>"><strong>REJECT</strong></a></td>	  

      </tr>
    <?php $count++; } ?>
	
	<tr><td colspan="10"><a target='_blank' href="piinveslab.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	</tr>	
	
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
			<td align="center"colspan="3"<?php if($row['rstatus']== "REJECTED"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row['rstatus'];?></td>
        	  	  <td align="center"colspan="2"><?php echo $row["rcomments"]; ?></td>
	  
	  	  <td align="center"colspan="2"><?php echo $row["rby"]; ?></td>
		
  	  <td align="center"colspan="2"><a target='_blank' href="<?php echo $row['link']?>?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>">REPORT</a></td>  	  
  
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
		  
		  


<td align="center"colspan="2"><a target='_blank' href="<?php echo $row['link']?>?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>">REPORT</a></td>  	  
<td colspan="1"><a target='_blank' href="sample_receive_print?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>"><img src="print.png" title="Print Report" width="50" height="50" /></a></td>
  
      </tr>
    <?php $count++; } ?>
	


<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Result Done</strong></label></td> </tr>	

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="1" align="center"><strong>Requested By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="2" align="center"><strong>Investigation</strong></td>
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
		  		  
		<td colspan="1"><a target='_blank' href="<?php echo $row['report']?>?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>
		

  	  
  
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
		  		  
		<td colspan="1"><a target='_blank' href="<?php echo $row['report']?>?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>
		

  	  
  
      </tr>
    <?php $count++; } ?>
<tr><td colspan="10"><a target='_blank' href="piinveslabresult.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	</tr>	
</table>
</form>

</body>

 
 
</html>
<div id="dataModal" class="modal fade">  
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
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">INVESTIGATION RESULT UPDATE SCREEN</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Patient MRN</label>  
                          <input type="text" name="name" id="name" class="form-control" readonly/>  
                          <br />  
                          <label>Name Of The Investigation</label>  
                          <input type="text" name="address" id="address" class="form-control" readonly/>  
                          <br />  
                          <label>Result</label>  
                          <textarea rows="20" cols="50" name="result" id="result"></textarea>
                          
                          
                          <br />  
                          <input type="hidden" name="employee_id" id="employee_id" />  
						  <input type="hidden" name="eid" id="eid" />  
						  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
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
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"fetchmodallab.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#name').val(data.pmrn);  
                     $('#address').val(data.infusion);  
                     $('#result').val(data.result);  
					  
                     
					 
                     $('#employee_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#address').val() == '')  
           {  
                alert("Address is required");  
           }  
           else if($('#designation').val() == '')  
           {  
                alert("Designation is required");  
           }  
           else if($('#age').val() == '')  
           {  
                alert("Age is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"labedittest.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"selectmodallab.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>