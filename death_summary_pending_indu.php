<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','imo','doctor')"; 
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

$add_time=strtotime($row['add_time']);
$add_time1=date('Y-m-d H:i:s', strtotime('+7 days', $add_time) );

$c_date22=date('Y-m-d H:i:s');
$c_date2=strtotime(date('Y-m-d H:i:s'));
$c_date3=date('Y-m-d H:i:s', strtotime('-30 days', $c_date2) );

$user=$_SESSION['sess_username'];
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];

$query397 = "SELECT * FROM inpatient where pmrn= '$pmrn' and eid='$eid'"; 
$result397 = mysqli_query($con, $query397) or die(mysqli_error());

// Print out result
$row397 = mysqli_fetch_array($result397);
$pname=$row397['pname'];


//include("auth.php");
//echo $count1;
$query39 = "SELECT * FROM user where uname= '$user'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full=$row39['fullname'];


$anes = "SELECT COUNT(did) FROM doctor where Discipline='anes' and sid='$user' and status in ('Active','active')"; 
$anes_res = mysqli_query($con, $anes) or die(mysqli_error());

// Print out result
$anes_data = mysqli_fetch_array($anes_res);

$anes_count=$anes_data['COUNT(did)'];


$query43 = "SELECT COUNT(id) FROM death_summary where pmrn='$pmrn' and eid='$eid';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count1 =$row43['COUNT(id)'];
//$count1 = $count+1;  
  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


    $diagnosis=$_REQUEST['diagnosis'];
    $cod=$_REQUEST['cod'];
    $mlc=$_REQUEST['mlc'];
$details=$_REQUEST['details'];
$count=strlen($_REQUEST['details']);

//$page=$_REQUEST['page'];
//$psex=$_REQUEST['psex'];
//$adate=$_REQUEST['adate'];

//$padd=$_REQUEST['padd'];

$add_time= date('Y-m-d H:i:s');

$adate1= date('Y-m-d');


$url = "topicupload.php?eid=$count1";

if($count1>0){

  echo '<script language="javascript">';
    echo 'alert("Death Summary is Written Already !!"); ';
    echo '</script>';

}


else if($count<100){

  echo '<script language="javascript">';
    echo 'alert("At Least 100 character is needed !!"); ';
    echo '</script>';

}
	
	/*$ins_query1="insert into topic (`discipline`,`tname`,`details`,`adate`,`adate1`,`eby`,`type`,`eid`) values ('$discipline','$tname','$details','$adate','$adate1','$full','$tt','$count1')";
mysqli_query($con,$ins_query1) or die(mysql_error());

 if(mysqli_affected_rows($con)==true){
 
 echo '<script language="javascript">';
    echo 'alert("successful !!"); ';
    echo '</script>';

 }
 else {
	 
 echo '<script language="javascript">';
    echo 'alert("Failed !!"); ';
    echo '</script>';

 }*/

//if ($con->query($ins_query) == TRUE) 
//{

	//header("Refresh: .1; URL=$url");
else {
  $ins_query1="insert into death_summary (`dsummary`,`pname`,`pmrn`,`eid`,`add_by`,`add_time`,`diagnosis`,`cod`,`mlc`) values 
  ('$details','$pname','$pmrn','$eid','$full','$add_time','$diagnosis','$cod','$mlc')";
  mysqli_query($con,$ins_query1) or die(mysql_error());
  
   if(mysqli_affected_rows($con)==true){
   
   echo '<script language="javascript">';
      echo 'alert("successful !!"); ';
      echo '</script>';
  

}
  
}

}

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Death Summary</title>
  
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
  width: 55%;
}
textarea {
  padding: 2px;
  height: 500px;
  border-radius: 2px;
  width: 100%;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 16px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;

  width: 100%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 3px;
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
  margin-bottom: 0px;
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
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
  
  
  
  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$("#loding1").hide();
	$("#loding2").hide();
	$(".country").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".state").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".state").html(html);
			} 
		});
	});
	
	
	$(".state").change(function()
	{
		$("#loding2").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding2").hide();
				$(".city").html(html);
			} 
		});
	});
	
});
</script>


                  <script src="ckeditor/ckeditor.js"></script>
				  



</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='edischarge3'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='esearch'><span>Patient Search By MRN</span></a>         </li>
         <li class='has-sub'><a href='eadm'><span>New Patient</span></a>         </li>
      </ul>
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>



<form action="" method="">
<table align="center" class="table table-bordered" id="dynamic_field" border="1" width="100%">  

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Death Summary (Edit possible with in 7 days upon writing)</strong></label></td> </tr>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Patient's Name</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="1" align="center"><strong>Diagnosis </strong></td>
      <td colspan="1" align="center"><strong>Cause Of Death </strong></td>
      <td colspan="1" align="center"><strong>Death Summary </strong></td>

	  <td colspan="3" align="center"><strong>Add By</strong></td>
      <td colspan="2" align="center"><strong>Add Time</strong></td> 
      <td colspan="2" align="center"><strong>MLC</strong></td> 
      <td colspan="3" align="center"><strong>Print</strong></td>
      <td colspan="2" align="center"><strong>Edit</strong></td>   
	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
//$eid=$data["eid"];

$count=1;
$sel_query="Select * from death_summary where add_by='$full' and add_time between '$c_date3' and '$c_date22'  order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["pname"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["diagnosis"]; ?></td>  
      <td align="center"colspan="1"><?php echo $row["cod"]; ?></td>
        
      <td align="center"colspan="1"><?php echo $row["dsummary"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["add_by"]; ?></td>
      <td align="center"colspan="2"><?php echo $row["add_time"]; ?></td>  
      <td align="center"colspan="2"><?php echo $row["mlc"]; ?></td>  

      <?php
$add_time=strtotime($row['add_time']);
$add_time1=date('Y-m-d H:i:s', strtotime('+7 days', $add_time) );

$c_date=date('Y-m-d H:i:s');

//echo date('Y-m-d H:i:s', $new_date);
?>

      <td align="center"colspan="3"><a href="death_summary_print?pmrn=<?php echo $row["pmrn"];?>&eid=<?php echo $row["eid"];?>">Print</a></td>
      <td align="center" colspan="2">
      <?php if ($full==$row['add_by'] and $c_date<=$add_time1){echo'  
      <a href="death_summary_edit?id='.$row["id"].'">Edit</a>';}

      else if ($anes_count['COUNT(did)']>0){echo'  
        <a href="death_summary_edit?id='.$row["id"].'">Edit</a>';}
  	  ?>
</td>
	  
      </tr>
    <?php $count++; } ?>



</table>



</form>
  


</body>

</html>