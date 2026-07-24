<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','nurse','doctor','imo')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
	
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
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>IMO PANEL</title>
	<link rel="stylesheet" href="notification-demo-style.css" type="text/css">
	<script src="jsnew/jquery-2.1.1.min.js" type="text/javascript"></script>
	
	 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
	
	<script> 
$(document).ready(function(){
setInterval(function(){
      $("#here").load(window.location.href + " #here" );
}, 50000);
});
</script>
	<script>
function showUser() {
 
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getuser22_package.php",true);
  xmlhttp.send();
}

showUser()
setInterval(function(){
showUser()

},50000);
</script>
	<style type="text/css">


div1 {
  height: 20px;
  width: 20%;
  border: 1px solid #4CAF50;
  float: right;
  
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

#myInput1 {
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
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

</style>
<link rel="stylesheet" href="styles.css">
	</head>
	<body>
	
	<div id='cssmenu' style="position: relative;top:5px;">
<ul>
   <li><a href='viewnewimo'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

	
	
	
		<p align="center" class="style1" style="background-color:lightgreen;font-size:22px;font-weight:bold;"><?php echo $user; ?>'s In-Patient list



</p>

<form action='' method='GET'>
<table width='100%' height ='100%' border='1' align='center' bgcolor='#eed7a1' style='border-collapse:collapse;' id='myTable'>
<tr>
      <td width='2%' style='font-size:13px; background-color:#eed7a1;'><strong>S.No</strong></td>
      <td width='7%' style='font-size:13px; background-color:#eed7a1;'><strong>Patient's Name</strong></td>
      <td width='7%' style='font-size:13px; background-color:#eed7a1;'><strong>MRN</strong></td>
	  <td width='7%' style='font-size:13px; background-color:#eed7a1;'><strong>Category</strong></td>
      <td width='7%' style='font-size:13px; background-color:#eed7a1;'><strong>Doctor's Name </strong></td>
      <td width='7%' style='font-size:13px; background-color:#eed7a1;'><strong>Admission Date</strong>   </td>
	   </tr>

<div id="txtHint" style="background-color:gold;font-size:22px;font-weight:bold;width:100%;"><b>Please Wait Patient List is Loading...</b></div>
	</body>
	
	
	

</html><script>
