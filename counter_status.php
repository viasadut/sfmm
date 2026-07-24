<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','nurse','imo')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<!DOCTYPE html>
<html>
	
	
	<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style2.css">
<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->

* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: center;
  padding: 12px;
  vertical-align: top;
  
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}


img {
  border-radius: 50%;
  
  display: block;
  margin-left: auto;
  margin-right: auto;
  
}

div1 {
  height: 50px;
  width: 50%;
  border: 1px solid #4CAF50;
  float: right;
  
}


div2 {
  height: 50px;
  width: 100%;
  border: 1px solid #4CAF50;
  float: right;
  
}



	
	.blink-bg{
		color: #fff;
		padding: 10px;
		display: inline-block;
		border-radius: 20px;
		animation: blinkingBackground 20s infinite;
	}
	@keyframes blinkingBackground{
		0%		{ background-color: #10c018;}
		25%		{ background-color: #1056c0;}
		50%		{ background-color: #ef0a1a;}
		75%		{ background-color: #254878;}
		100%	{ background-color: #04a1d5;}
	}
	
	
	
	
	blink {
  -webkit-animation: 2s linear infinite condemned_blink_effect; /* for Safari 4.0 - 8.0 */
  animation: 2s linear infinite condemned_blink_effect;
}

/* for Safari 4.0 - 8.0 */
@-webkit-keyframes condemned_blink_effect {
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}

@keyframes condemned_blink_effect {
  10% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}

.blink_img {
  animation: blinker 2s linear infinite;
  
}
@keyframes blinker {
  50% { opacity: 0; }
}
@keyframes blin {
  50% { opacity: 0; }
}




.button {
  background-color: #004A7F;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  border: none;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: 20px;
  padding: 5px 5px;
  text-align: center;
  text-decoration: none;
  -webkit-animation: glowing 1500ms infinite;
  -moz-animation: glowing 1500ms infinite;
  -o-animation: glowing 1500ms infinite;
  animation: glowing 1500ms infinite;
}
@-webkit-keyframes glowing {
  0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -webkit-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
}

@-moz-keyframes glowing {
  0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -moz-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
}

@-o-keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}

@keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Respond this Call?");
}

</script>

	
	
	
	<?php
	    session_start();
	require('db1.php');
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;


$search_counter="select COUNT(sno) from counter where status='Active'";
$serach_counter_result= mysqli_query($con, $search_counter);
$search_counter_row=mysqli_fetch_assoc($serach_counter_result);
echo $available_counter=$search_counter_row['COUNT(sno)'];


if($available_counter>0){


$date=date('Y-m-d H:i:s');	
$ad=date('Y-m-d H:i:s');
$ad1=date("Y-m-d H:i:s", time() + 10);
$current_counter = "select * from counter where status='Active' order by id asc LIMIT 1"; 
$current_counter_result = mysqli_query($con, $current_counter); 

$current_counter_row=mysqli_fetch_assoc($current_counter_result);



$current_token = "select * from counter_token where status='Active' order by id asc LIMIT 1"; 
$current_token_result= mysqli_query($con, $current_token);
$current_token_row=mysqli_fetch_assoc($current_token_result);

if($current_counter_row['sno']!='' and $current_token_row['token_no']!=''){
	
$query42 = "update counter_token set status='Call' where token_no=".$current_token_row['token_no']." and status='Active'"; 	
//$trt=mysqli_query($con, $query42);

$query44 = "update counter set status='Engage' where sno=".$current_counter_row['sno']." and status='Active'"; 	
//$trt4=mysqli_query($con, $query44);

$query45 = "insert into counter_history (`counter_no`,`date`,`date1`,`token_no`) values(".$current_counter_row['sno'].",'$ad','$ad1',".$current_token_row['token_no'].")"; 	

if(mysqli_query($con, $query42)==true and mysqli_query($con, $query44)==true and mysqli_query($con,$query45)==true){
	
	echo"";
	
}
}
}

/*$query42 = "insert into counter_history (`counter_no`,`date`,`token_no`) values('$current_counter_row','$date','$t_no')"; 
	 
//$result42 = mysqli_query($con, $query42) or die(mysqli_error());


if(mysqli_query($con, $query42)==true){
	
//$up_token = "update counter_token set status='Call' where token_no='$t_no'"; 	

$up_token = "insert into counter_history (`counter_no`,`date`,`token_no`) values('$t_no','$date','$t_no')"; 
$tr=mysqli_query($con, $up_token);
}
}
/*if(mysqli_query($con, $up_token)==true){
	
$se_counter="select * from counter where status='Active' order by id asc LIMIT 1"	
}
if(mysqli_query($con, $se_counter)==true){
	
$se_re = mysqli_fetch_array(mysqli_query($con, $se_counter));	
$c_no=$se_re['sno'];

	
$up_counter = "update counter set status='Engage' where sno='$c_no' and status='Active'"; 	
	$re_counter = mysqli_query($con, $up_counter) or die(mysqli_error());
	
}
	
*/




$sel_query="Select distinct sno from counter where status='Active' order by sno asc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      
      <?php
	  echo "<p align='left' style='font-weight:bold;color:blue;font-size:12px;'>".$row['sno']."</p>";
	  
	  ?>
	  
	   


<?php $count1++;  }?>



</td>


	

    
	
	