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
  //$min="2025-02-01";

  $pmrn=$_REQUEST['pmrn'];
  $eid=$_REQUEST['eid'];


  $db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);
$min=$data['anew'];
?>

<!DOCTYPE html>
<html>
<head>
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getinves.php?q="+str+ "&pmrn=<?php echo $pmrn;?>"+ "&eid=<?php echo $eid;?>",true);
  xmlhttp.send();
}
</script>



  
<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}
button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  height: 5%
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>


</head>
<body>
<div id='cssmenu'>
<ul>
   <li><a href='own_work_list'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>



<p align="center" style="background-color:gold;font-size:22px;font-weight:bold;">Datewise Investigation List</p>


<form>

<input type='date' name="users" onchange="showUser(this.value)"size="20" style='background-color:lightbllue;font-size:22px;font-weight:bold;color-scheme: dark;' max="<?php echo date('Y-m-d');?>" min="<?php echo $min;?>">

</form>
<br>
<div id="txtHint" style="background-color:gold;font-size:22px;font-weight:bold"><b>Select A Date to View All Investigation.</b></div>

</body>
</html>