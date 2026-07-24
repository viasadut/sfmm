<?php 
      session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','rad','mng','outdoc')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");


$ad='b';
?>

<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);

$full = $row39['fullname'];

/*$query3 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$dept=$row3['dept'];
$cat=$row3['cat'];
$dd=$row3['dept'];
$in_id=$row3['sid1'];
$dt=date('Y-m-d');
*/


$query24a = "SELECT COUNT(id) FROM radpapp where status='NOT SEEN' and out_report='1' and report_dname='$full'"; 
$result24a = mysqli_query($con, $query24a) or die(mysqli_error());
$row24a = mysqli_fetch_array($result24a);


$query24d = "SELECT COUNT(id) FROM radreport where status='Draft' and dname='$full'"; 
$result24d = mysqli_query($con, $query24d) or die(mysqli_error());
$row24d = mysqli_fetch_array($result24d);


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

div1 {
    //height: 40px;
    width: 30%;
    background-color: powderblue;
}



img {
  border-radius: 50%;
  
}

</style>



   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" href="css/presentational.css">
    
    
    <link rel="stylesheet" href="css/circular-images.css">



</head>


<body>





<div id='cssmenu'>
<ul>
   <li><a href='outside_doc'><span>Home</span></a></li>
   
   
   
 
   <li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
   <?php if($fullname==284)
   {
   echo "<li class='active has-sub'><a href='#'><span>Customer Counselling Menu</span></a>
      <ul>
         <li class='has-sub'><a href='bedviewbill'><span>Bed Management</span></a>
            
         </li>
         <li class='has-sub'><a href='qcview'><span>Todays In-Patients List</span></a>
            
         </li>
		 <li class='has-sub'><a href='feed'><span>Add Feedback</span></a>
            
         </li>
		 <li class='has-sub'><a href='feedstats'><span>Feedback Stats</span></a>
            
         </li>
      </ul>
   </li>";
   }
   ?>
   
  
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>



        



 

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" >
<tr><td colspan="19"align="center"bgcolor="lightblue"class="style1" border="0">Welcome!! <?php echo $row39['fullname']; ?></td>
<td colspan="1"align="center"bgcolor="lightblue">
<a target='_blank' href="hinfo111"><img src="hinfo.jpg" title="Hospital Information" width="50" height="30" /></a>
<a target='_blank' href="task_index"><img src="to_do.jpg" title="ADD YOUR TO-DO-LIST" width="50" height="30" /></a>
</td>



</tr>
<tr><td colspan="19"align="center"bgcolor="lightgreen"><img  src="prescription/prescription/doctor/<?php echo $fullname.'.jpg' ?>" width="100"  height="100" align="center"></td>
<td colspan="1"align="center"bgcolor="lightgreen"><h3><?php echo date('d/m/Y').'<br>'.date('H:i:s')?></h3></td>
</tr>
<tr><td colspan="20"align="left"><a href="rad_report_outside2"><font size="4.5">New Pending Reports
<?php echo'
<font size="4.5" color="#FF0000"><b>(
	'.$row24a['COUNT(id)'].')<b>';
	
?>

</td></tr>

<tr><td colspan="20"align="left"><a href="rad_report_outside21_draft"><font size="4.5">Pending As Draft Reports
<?php echo'
<font size="4.5" color="#FF0000"><b>(
	'.$row24d['COUNT(id)'].')<b>';
	
?>

</td></tr>


<tr><td colspan="20"align="left"><a href="radconsultant_out"><font size="4.5">Datewise Stats</td></tr>
<tr><td colspan="20"align="left"><a href="rad_report_outside21"><font size="4.5">Edit Today's Report</td></tr>
<tr><td colspan="20"align="left"><a href="set_radio_template"><font size="4.5">Prepare Your Own Template</td></tr>



	
<?php /*if($ad=='b')
{
	$txt='Greetings'.' '.$full.'WELCOME TO SFMMKPJSH PATIENT Management SYStem';
  $txt1=htmlspecialchars($txt);
  $txt2=rawurlencode($txt1);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt2.'&tl=en-IN');
   
	echo '
	<audio autoplay>
	<source src="data:audio/mpeg;base64,'.base64_encode($html).'">
  <source src="data:audio/ogg;base64,'.base64_encode($html).'">
 
</audio>';}


*/?>
	



</table>
    



 
</form>

</body>

</html>
