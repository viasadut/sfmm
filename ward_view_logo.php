<?php 
    session_start();
    require('db1.php');
	//$role = $_SESSION['sess_userrole'];
	
/*$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','nurse','doctor','imo')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }*/
	
	$user=$_SESSION["sess_username"];
	$test=$_SESSION['user_session_id'];
?>

<?php
$conn = new mysqli("localhost","root","Godiloveu16","sfmmkpjnew");
$sql2="select * from noti where user in ('$user','all') and status='1'";

$result=mysqli_query($conn, $sql2);
$count=mysqli_num_rows($result);


?>
<html>
	<head>

	<title>WARD VIEW PANEL</title>
	<script>
function showUser() {
 
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","ward_view1_test.php",true);
  xmlhttp.send();
}

showUser()
setInterval(function(){
showUser()

},15000);
</script>
	
	</head>
	<body>

<?php  
	   $aa=date('d/m/Y');
	   echo"

	   <table >	   
	   <tr>
	  
		<td style='color:red;text-align:right;font-weight:bold;font-size:20px;border:none;'>
		<img src='kpj_logo/2.png' style='width:30px;height:30px;'>&nbsp;&nbsp;&nbsp;&nbsp;SHEIKH FAZILATUNNESSA MUJIB MEMORIAL
KPJ SPECIALIZED HOSPITAL

<img src='kpj_logo/1.png' style='width:50px;height:30px;'>
		</td>
		
		<td id='span' style='color:red;text-align:right;font-weight:bold;font-size:20px;border:none;'>
		 
	</td>
		
	   </tr>

	 </table>


	   
	   
	   ";
	   




?>
	
	
	


<div id="txtHint" style=""><b>Please Wait Patient List is Loading...</b></div>
	
	
	<script>
var span = document.getElementById('span');

function time() {
  var d = new Date();
  var day = d.getDate();
var month = d.getMonth() +1;
var year = d.getFullYear();
  var s = d.getSeconds();
  var m = d.getMinutes();
  var h = d.getHours();
  span.textContent = 
  ("0" +day).substr(-2) +"/"+ ("0" +month).substr(-2) +"/"+year + " " + ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
}

setInterval(time, 1000);
</script>

	
	</body>
	
	
	
</html>