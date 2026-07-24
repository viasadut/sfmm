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
$cdate= date('Y-m-d');
$count=1;
$ad3=date('Y-m-d H:i:s');



$search_counter1="select COUNT(sno) from counter where status='Active'";
$serach_counter_result1= mysqli_query($con, $search_counter1);
$search_counter_row1=mysqli_fetch_assoc($serach_counter_result1);
echo $available_counter1=$search_counter_row1['COUNT(sno)'];


if($available_counter1>0){


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

$query45 = "insert into counter_history (`counter_no`,`date`,`date1`,`token_no`,`user`,`status`,`cdate`) values
(".$current_counter_row['sno'].",'$ad','$ad1',".$current_token_row['token_no'].",".$current_counter_row['user'].",'1','$cdate')"; 	

if(mysqli_query($con, $query42)==true and mysqli_query($con, $query44)==true and mysqli_query($con,$query45)==true){
	
	echo"";
	
}
}
}









$sel3="Select * from counter_history where '$ad3' between date and date1 and counter_no='3' and status='1' order by id desc";

$resu3 = mysqli_query($con,$sel3);
$rw3 = mysqli_fetch_assoc($resu3);

$search_counter="select * from counter where status='Engage' and sno='3'";
$serach_counter_result= mysqli_query($con, $search_counter);
$search_counter_row=mysqli_fetch_assoc($serach_counter_result);
echo $available_counter=$search_counter_row['sno'];


if($available_counter!=''){


$date=date('Y-m-d H:i:s');	

/*
$current_counter = "select * from counter where status='Active' and sno='1'"; 
$current_counter_result = mysqli_query($con, $current_counter); 
$current_counter_row=mysqli_fetch_assoc($current_counter_result);
*/


$current_token = "select * from counter_history where counter_no='3' and cdate='$cdate' and status='1' order by id desc LIMIT 1"; 
$current_token_result= mysqli_query($con, $current_token);
$current_token_row=mysqli_fetch_assoc($current_token_result);

if($current_token_row['token_no']!=''){
	
/*$query42 = "update counter_token set status='Call' where token_no=".$current_token_row['token_no']." and status='Active'"; 	
//$trt=mysqli_query($con, $query42);

$query44 = "update counter set status='Engage' where sno=".$current_counter_row['sno']." and status='Active'"; 	
//$trt4=mysqli_query($con, $query44);

$query45 = "insert into counter_history (`counter_no`,`date`,`token_no`) values(".$current_counter_row['sno'].",'$date',".$current_token_row['token_no'].")"; 	

if(mysqli_query($con, $query42)==true and mysqli_query($con, $query44)==true and mysqli_query($con,$query45)==true){
	
	echo"";
	
}
}
}
*/



	 echo "<div style='background-color:lightgreen; width:800px;height:300px;position: relative;left: 200px; top:-20px;'><p style='font-weight:bold;color:red;font-size:80px;text-align:left;font-weight:bold'>Counter Number- 0".$current_token_row['counter_no']."
	 
	 <br>Token Number- ".$current_token_row['token_no']."
	 </p>
	 
	 
	 </div>";
	 
	 
	 
	 if($rw3==true){
	 $txt=' Counter Number'.$available_counter['sno'].' Token Number- '.$current_token_row['token_no'].'';
  $txt1=htmlspecialchars($txt);
  $txt2=rawurlencode($txt1);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt2.'&tl=en-US');
   
	echo '
	<audio autoplay>
	<source src="data:audio/mpeg;base64,'.base64_encode($html).'">
  <source src="data:audio/ogg;base64,'.base64_encode($html).'">
 
</audio>';
	 }
	 
	 
	 }

}	 
	  ?>
	  
	   







	

    
	
	