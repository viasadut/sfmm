<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 20; URL=$url1");

?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);

$full = $row39['fullname'];

$query3 = "SELECT * FROM staff where uname= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row7 = mysqli_fetch_array($result3);
$dept=$row7['sdept'];
//echo $dept;
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$query3 = "SELECT * FROM incident1 where itype= 'Clinical'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row7 = mysqli_fetch_array($result3);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Detail Roaster</title>



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
</style>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script src="./jquery.multiselect.js"></script>
<link href="./jquery.multiselect.css" rel="stylesheet" />
   
   <script src="jsnew/pprefixfree.min.js"></script>



<style>
    @media screen and (min-width: 1280px) {
        .modal-dialog {
          max-width: 1280px; /* New width for default modal */
        }
    }
</style>
   
 
</head>


<body>








<div id='cssmenu'>
<ul>
   <li><a href='viewnew11'><span>Home</span></a></li>
  <li class='last'><a href='leaveprint1'><span>Print Approved Leave</span></a></li>
   <li class='last'><a href='viewleave'><span>Leave Balance</span></a></li>
   <li class='last'><a href='leavestatsadm'><span>Consultant Wise Leave Stats</span></a></li>
   <li class='last'><a href='tadmleave'><span>Today's Present Consultant List</span></a></li>
   <li class='last'><a href='attnstatsadm'><span>Consultant Wise Attendance Stats</span></a></li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




<p align="center" class="style1">Todays Staff's Attendance  Status </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="10%"><strong>Name</strong></th>
	   <?php 
	   
$date = date('Y-m-01');
$end = date('Y-m-' . date('t', strtotime($date))); //get end date of month


	   
	   
	   while(strtotime($date) <= strtotime($end)) {
        $day_num = date('d', strtotime($date));
        $day_name = date('D', strtotime($date));
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
        echo "<th>$day_num <br/> $day_name</th>";
    }
    ?>
	  <th width="2%"><strong>T</strong></th>
	  
	  
      
      
	  
      
	   </tr>
  </thead>
  <tbody>

  
  
  

    


<?php
	
	

	
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');

$sel_query="Select * from staff3 where status ='Active' and dept='Nursing Services' order by dept asc";
//$start=$row["aadate"];
$count=1;
$rown = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($rown)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["sname"]; ?><?php echo $row["sid"]; ?></a>
	  
	  </td>
	  
	   <?php 

$d1=date('Y-m-01');
$d2=date('Y-m-02');
$d3=date('Y-m-03');
$d4=date('Y-m-04');
$d5=date('Y-m-05');
$d6=date('Y-m-06');
$d7=date('Y-m-07');
$d8=date('Y-m-08');
$d9=date('Y-m-09');
$d10=date('Y-m-10');
$d11=date('Y-m-11');
$d12=date('Y-m-12');
$d13=date('Y-m-13');
$d14=date('Y-m-14');
$d15=date('Y-m-15');
$d16=date('Y-m-16');
$d17=date('Y-m-17');
$d18=date('Y-m-18');
$d19=date('Y-m-19');
$d20=date('Y-m-20');
$d21=date('Y-m-21');
$d22=date('Y-m-22');
$d23=date('Y-m-23');
$d24=date('Y-m-24');
$d25=date('Y-m-25');
$d26=date('Y-m-26');
$d27=date('Y-m-27');
$d28=date('Y-m-28');
$d29=date('Y-m-29');
$d30=date('Y-m-30');
$d31=date('Y-m-31');



$uuid=$row['sid'];




$s1="Select COUNT(distinct(mor)),emor from roaster_2 where date='$d1' and mor='$uuid'";
$r1 = mysqli_query($con, $s1) or die(mysqli_error());
$row1 = mysqli_fetch_array($r1);
$n1=$row1['COUNT(distinct(mor))'];

$s2="Select COUNT(distinct(mor)),emor from roaster_2 where date='$d2' and mor='$uuid'";
$r2 = mysqli_query($con, $s2) or die(mysqli_error());
$row2 = mysqli_fetch_array($r2);
$n2=$row2['COUNT(distinct(mor))'];


$s3="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d3' and mor='$uuid'";
$r3 = mysqli_query($con, $s3) or die(mysqli_error());
$row3 = mysqli_fetch_array($r3);
$n3=$row3['COUNT(distinct(mor))'];

$s4="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d4' and mor='$uuid'";
$r4 = mysqli_query($con, $s4) or die(mysqli_error());
$row4 = mysqli_fetch_array($r4);
$n4=$row4['COUNT(distinct(mor))'];


$s5="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d5' and mor='$uuid'";
$r5 = mysqli_query($con, $s5) or die(mysqli_error());
$row5 = mysqli_fetch_array($r5);
$n5=$row5['COUNT(distinct(mor))'];


$s6="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d6' and mor='$uuid'";
$r6 = mysqli_query($con, $s6) or die(mysqli_error());
$row6 = mysqli_fetch_array($r6);
$n6=$row6['COUNT(distinct(mor))'];


$s7="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d7' and mor='$uuid'";
$r7 = mysqli_query($con, $s7) or die(mysqli_error());
$row7 = mysqli_fetch_array($r7);
$n7=$row7['COUNT(distinct(mor))'];


$s8="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d8' and mor='$uuid'";
$r8 = mysqli_query($con, $s8) or die(mysqli_error());
$row8 = mysqli_fetch_array($r8);
$n8=$row8['COUNT(distinct(mor))'];


$s9="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d9' and mor='$uuid'";
$r9 = mysqli_query($con, $s9) or die(mysqli_error());
$row9 = mysqli_fetch_array($r9);
$n9=$row9['COUNT(distinct(mor))'];

$s10="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d10' and mor='$uuid'";
$r10= mysqli_query($con, $s10) or die(mysqli_error());
$row10 = mysqli_fetch_array($r10);
$n10=$row10['COUNT(distinct(mor))'];



$s11="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d11' and mor='$uuid'";
$r11= mysqli_query($con, $s11) or die(mysqli_error());
$row11 = mysqli_fetch_array($r11);
$n11=$row11['COUNT(distinct(mor))'];


$s12="Select  COUNT(distinct(mor)),emor,id from roaster_2 where date='$d12' and mor='$uuid'";
$r12= mysqli_query($con, $s12) or die(mysqli_error());
$row12 = mysqli_fetch_array($r12);
$n12=$row12['COUNT(distinct(mor))'];


$s13="Select distinct COUNT(distinct(mor)),emor,id from roaster_2 where date='$d13' and mor='$uuid'";
$r13= mysqli_query($con, $s13) or die(mysqli_error());
$row13 = mysqli_fetch_array($r13);
$n13=$row13['COUNT(distinct(mor))'];


$s14="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d14' and mor='$uuid'";
$r14= mysqli_query($con, $s14) or die(mysqli_error());
$row14 = mysqli_fetch_array($r14);
$n14=$row14['COUNT(distinct(mor))'];


$s15="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d15' and mor='$uuid'";
$r15= mysqli_query($con, $s15) or die(mysqli_error());
$row15 = mysqli_fetch_array($r15);
$n15=$row15['COUNT(distinct(mor))'];

$s16="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d16' and mor='$uuid'";
$r16= mysqli_query($con, $s16) or die(mysqli_error());
$row16 = mysqli_fetch_array($r16);
$n16=$row16['COUNT(distinct(mor))'];

$s17="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d17' and mor='$uuid'";
$r17= mysqli_query($con, $s17) or die(mysqli_error());
$row17 = mysqli_fetch_array($r17);
$n17=$row17['COUNT(distinct(mor))'];


$s18="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d18' and mor='$uuid'";
$r18= mysqli_query($con, $s18) or die(mysqli_error());
$row18 = mysqli_fetch_array($r18);
$n18=$row18['COUNT(distinct(mor))'];

$s19="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d19' and mor='$uuid'";
$r19= mysqli_query($con, $s19) or die(mysqli_error());
$row19 = mysqli_fetch_array($r19);
$n19=$row19['COUNT(distinct(mor))'];

$s20="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d20' and mor='$uuid'";
$r20= mysqli_query($con, $s20) or die(mysqli_error());
$row20 = mysqli_fetch_array($r20);
$n20=$row20['COUNT(distinct(mor))'];

$s21="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d21' and mor='$uuid'";
$r21= mysqli_query($con, $s21) or die(mysqli_error());
$row21 = mysqli_fetch_array($r21);
$n21=$row21['COUNT(distinct(uid))'];

$s22="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d22' and mor='$uuid'";
$r22= mysqli_query($con, $s22) or die(mysqli_error());
$row22 = mysqli_fetch_array($r22);
$n22=$row22['COUNT(distinct(mor))'];


$s23="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d23' and mor='$uuid'";
$r23= mysqli_query($con, $s23) or die(mysqli_error());
$row23 = mysqli_fetch_array($r23);
$n23=$row23['COUNT(distinct(mor))'];


$s24="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d24' and mor='$uuid'";
$r24= mysqli_query($con, $s24) or die(mysqli_error());
$row24 = mysqli_fetch_array($r24);
$n24=$row24['COUNT(distinct(mor))'];


$s25="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d25' and mor='$uuid'";
$r25= mysqli_query($con, $s25) or die(mysqli_error());
$row25 = mysqli_fetch_array($r25);
$n25=$row25['COUNT(distinct(mor))'];


$s26="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d26' and mor='$uuid'";
$r26= mysqli_query($con, $s26) or die(mysqli_error());
$row26 = mysqli_fetch_array($r26);
$n26=$row26['COUNT(distinct(mor))'];

$s27="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d27' and mor='$uuid'";
$r27= mysqli_query($con, $s27) or die(mysqli_error());
$row27 = mysqli_fetch_array($r27);
$n27=$row27['COUNT(distinct(mor))'];


$s28="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d28' and mor='$uuid'";
$r28= mysqli_query($con, $s28) or die(mysqli_error());
$row28 = mysqli_fetch_array($r28);
$n28=$row28['COUNT(distinct(mor))'];


$s29="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d29' and mor='$uuid'";
$r29= mysqli_query($con, $s29) or die(mysqli_error());
$row29 = mysqli_fetch_array($r29);
$n29=$row29['COUNT(distinct(mor))'];


$s30="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d30' and mor='$uuid'";
$r30= mysqli_query($con, $s30) or die(mysqli_error());
$row30 = mysqli_fetch_array($r30);
$n30=$row30['COUNT(distinct(mor))'];



$s31="Select COUNT(distinct(mor)),emor,id from roaster_2 where date='$d31' and mor='$uuid'";
$r31= mysqli_query($con, $s31) or die(mysqli_error());
$row31 = mysqli_fetch_array($r31);
$n31=$row31['COUNT(distinct(mor))'];



$ntotal=$n1+$n2+$n3+$n4+$n5+$n6+$n7+$n8+$n9+$n10+$n11+$n12+$n13+$n14+$n15+$n16+$n17+$n18+$n19+$n20+$n21+$n22+$n23+$n24+$n25+$n26+$n27+$n28+$n29+$n30+$n31;


?>

	   
	   <td align="center">
	   
	   <?php 
	   if($n1>0 and $row1['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row1['emor'].'</p>';}
	   else if($n1>0 and $row1['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row1['emor'].'</p>';}
	   else if($n1>0 and $row1['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row1['emor'].'</p>';}
	   else if($n1>0 and $row1['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row1['emor'].'</p>';}
	   else if($n1>0 and $row1['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row1['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n2>0 and $row2['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row2['emor'].'</p>';}
	   else if($n2>0 and $row2['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row2['emor'].'</p>';}
	   else if($n2>0 and $row2['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row2['emor'].'</p>';}
	   else if($n2>0 and $row2['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row2['emor'].'</p>';}
	   else if($n2>0 and $row2['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row2['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n3>0 and $row3['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row3['emor'].'</p>';}
	   else if($n3>0 and $row3['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row3['emor'].'</p>';}
	   else if($n3>0 and $row3['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row3['emor'].'</p>';}
	   else if($n3>0 and $row3['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row3['emor'].'</p>';}
	   else if($n3>0 and $row3['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row3['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n4>0 and $row4['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row4['emor'].'</p>';}
	   else if($n4>0 and $row4['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row4['emor'].'</p>';}
	   else if($n4>0 and $row4['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row4['emor'].'</p>';}
	   else if($n4>0 and $row4['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row4['emor'].'</p>';}
	   else if($n4>0 and $row4['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row4['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n5>0 and $row5['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row5['emor'].'</p>';}
	   else if($n5>0 and $row5['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row5['emor'].'</p>';}
	   else if($n5>0 and $row5['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row5['emor'].'</p>';}
	   else if($n5>0 and $row5['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row5['emor'].'</p>';}
	   else if($n5>0 and $row5['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row5['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   
	   </td>
	   <td align="center">
	   
	   
	   <?php 
	   if($n6>0 and $row6['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row6['emor'].'</p>';}
	   else if($n6>0 and $row6['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row6['emor'].'</p>';}
	   else if($n6>0 and $row6['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row6['emor'].'</p>';}
	   else if($n6>0 and $row6['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row6['emor'].'</p>';}
	   else if($n6>0 and $row6['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row6['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n7>0 and $row7['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row7['emor'].'</p>';}
	   else if($n7>0 and $row7['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row7['emor'].'</p>';}
	   else if($n7>0 and $row7['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row7['emor'].'</p>';}
	   else if($n7>0 and $row7['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row7['emor'].'</p>';}
	   else if($n7>0 and $row7['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row7['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n8>0 and $row8['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row8['emor'].'</p>';}
	   else if($n8>0 and $row8['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row8['emor'].'</p>';}
	   else if($n8>0 and $row8['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row8['emor'].'</p>';}
	   else if($n8>0 and $row8['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row8['emor'].'</p>';}
	   else if($n8>0 and $row8['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row8['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n9>0 and $row9['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row9['emor'].'</p>';}
	   else if($n9>0 and $row9['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row9['emor'].'</p>';}
	   else if($n9>0 and $row9['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row9['emor'].'</p>';}
	   else if($n9>0 and $row9['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row9['emor'].'</p>';}
	   else if($n9>0 and $row9['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row9['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   
	   </td>
	   <td align="center"><?php 
	   if($n10>0 and $row10['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row10['emor'].'</p>';}
	   else if($n10>0 and $row10['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row10['emor'].'</p>';}
	   else if($n10>0 and $row10['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row10['emor'].'</p>';}
	   else if($n10>0 and $row10['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row10['emor'].'</p>';}
	   else if($n10>0 and $row10['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row10['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   
	   </td>
	   <td align="center">
	   <?php 
	   if($n11>0 and $row11['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row11['emor'].'</p>';}
	   else if($n11>0 and $row11['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row11['emor'].'</p>';}
	   else if($n11>0 and $row11['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row11['emor'].'</p>';}
	   else if($n11>0 and $row11['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row11['emor'].'</p>';}
	   else if($n11>0 and $row11['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row11['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   </td>
	   <td align="center">
	   
	   
	   <?php 
	   if($n12>0 and $row12['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row12['emor'].'</p>';}
	   else if($n12>0 and $row12['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row12['emor'].'</p>';}
	   else if($n12>0 and $row12['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row12['emor'].'</p>';}
	   else if($n12>0 and $row12['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row12['emor'].'</p>';}
	   else if($n12>0 and $row12['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row12['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n13>0 and $row13['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row13['emor'].'</p>';}
	   else if($n13>0 and $row13['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row13['emor'].'</p>';}
	   else if($n13>0 and $row13['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row13['emor'].'</p>';}
	   else if($n13>0 and $row13['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row13['emor'].'</p>';}
	   else if($n13>0 and $row13['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row13['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   </td>
	   <td align="center"><?php 
	   if($n14>0 and $row14['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row14['emor'].'</p>';}
	   else if($n14>0 and $row14['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row14['emor'].'</p>
	   <input type="button" name="edit" value="E" id="'.$row14['id'].'" class="btn btn-info btn-xs edit_data">
	   
	   '
;}
	   else if($n14>0 and $row14['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row14['emor'].'</p>
	   
	   <input type="button" name="edit" value="E" id="'.$row14['id'].'" class="btn btn-info btn-xs edit_data">
	   ';}
	   else if($n14>0 and $row14['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row14['emor'].'</p>
	   
	   <input type="button" name="edit" value="E" id="'.$row14['id'].'" class="btn btn-info btn-xs edit_data">
	   ';}
	   else if($n14>0 and $row14['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row14['emor'].'</p>
	   
	   <input type="button" name="edit" value="E" id="'.$row14['id'].'" class="btn btn-info btn-xs edit_data">
	   ';}
	     
	   else {echo '<input type="button" name="add" value="A" id="'.$row['sid'].'" class="btn btn-info btn-xs edit_data1">';}?>
	   
	   
	   
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n15>0 and $row15['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row15['emor'].'</p>';}
	   else if($n15>0 and $row15['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row15['emor'].'</p>';}
	   else if($n15>0 and $row15['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row15['emor'].'</p>';}
	   else if($n15>0 and $row15['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row15['emor'].'</p>';}
	   else if($n15>0 and $row15['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row15['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   </td>
	   <td align="center">
	   
	   
	   <?php 
	   if($n16>0 and $row16['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row16['emor'].'</p>';}
	   else if($n16>0 and $row16['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row16['emor'].'</p>';}
	   else if($n16>0 and $row16['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row16['emor'].'</p>';}
	   else if($n16>0 and $row16['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row16['emor'].'</p>';}
	   else if($n16>0 and $row16['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row16['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n17>0 and $row17['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row17['emor'].'</p>';}
	   else if($n17>0 and $row17['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row17['emor'].'</p>';}
	   else if($n17>0 and $row17['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row17['emor'].'</p>';}
	   else if($n17>0 and $row17['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row17['emor'].'</p>';}
	   else if($n17>0 and $row17['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row17['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   </td>
	   <td align="center">
	   
	   
	   <?php 
	   if($n18>0 and $row18['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row18['emor'].'</p>';}
	   else if($n18>0 and $row18['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row18['emor'].'</p>';}
	   else if($n18>0 and $row18['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row18['emor'].'</p>';}
	   else if($n18>0 and $row18['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row18['emor'].'</p>';}
	   else if($n18>0 and $row18['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row18['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n19>0 and $row19['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row19['emor'].'</p>';}
	   else if($n19>0 and $row19['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row19['emor'].'</p>';}
	   else if($n19>0 and $row19['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row19['emor'].'</p>';}
	   else if($n19>0 and $row19['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row19['emor'].'</p>';}
	   else if($n19>0 and $row19['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row19['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n20>0 and $row20['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row20['emor'].'</p>';}
	   else if($n20>0 and $row20['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row20['emor'].'</p>';}
	   else if($n20>0 and $row20['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row20['emor'].'</p>';}
	   else if($n20>0 and $row20['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row20['emor'].'</p>';}
	   else if($n20>0 and $row20['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row20['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n21>0 and $row21['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row21['emor'].'</p>';}
	   else if($n21>0 and $row21['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row21['emor'].'</p>';}
	   else if($n21>0 and $row21['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row21['emor'].'</p>';}
	   else if($n21>0 and $row21['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row21['emor'].'</p>';}
	   else if($n21>0 and $row21['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row21['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n22>0 and $row22['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row22['emor'].'</p>';}
	   else if($n22>0 and $row22['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row22['emor'].'</p>';}
	   else if($n22>0 and $row22['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row22['emor'].'</p>';}
	   else if($n22>0 and $row22['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row22['emor'].'</p>';}
	   else if($n22>0 and $row22['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row22['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n23>0 and $row23['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row23['emor'].'</p>';}
	   else if($n23>0 and $row23['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row23['emor'].'</p>';}
	   else if($n23>0 and $row23['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row23['emor'].'</p>';}
	   else if($n23>0 and $row23['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row23['emor'].'</p>';}
	   else if($n23>0 and $row23['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row23['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n24>0 and $row24['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row24['emor'].'</p>';}
	   else if($n24>0 and $row24['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row24['emor'].'</p>';}
	   else if($n24>0 and $row24['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row24['emor'].'</p>';}
	   else if($n24>0 and $row24['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row24['emor'].'</p>';}
	   else if($n24>0 and $row24['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row24['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n25>0 and $row25['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row25['emor'].'</p>';}
	   else if($n25>0 and $row25['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row25['emor'].'</p>';}
	   else if($n25>0 and $row25['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row25['emor'].'</p>';}
	   else if($n25>0 and $row25['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row25['emor'].'</p>';}
	   else if($n25>0 and $row25['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row25['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n26>0 and $row26['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row26['emor'].'</p>';}
	   else if($n26>0 and $row26['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row26['emor'].'</p>';}
	   else if($n26>0 and $row26['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row26['emor'].'</p>';}
	   else if($n26>0 and $row26['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row26['emor'].'</p>';}
	   else if($n26>0 and $row26['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row26['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n27>0 and $row27['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row27['emor'].'</p>';}
	   else if($n27>0 and $row27['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row27['emor'].'</p>';}
	   else if($n27>0 and $row27['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row27['emor'].'</p>';}
	   else if($n27>0 and $row27['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row27['emor'].'</p>';}
	   else if($n27>0 and $row27['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row27['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n28>0 and $row28['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row28['emor'].'</p>';}
	   else if($n28>0 and $row28['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row28['emor'].'</p>';}
	   else if($n28>0 and $row28['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row28['emor'].'</p>';}
	   else if($n28>0 and $row28['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row28['emor'].'</p>';}
	   else if($n28>0 and $row28['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row28['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   </td>
	   <td align="center">
	   <?php 
	   if($n29>0 and $row29['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row29['emor'].'</p>';}
	   else if($n29>0 and $row29['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row29['emor'].'</p>';}
	   else if($n29>0 and $row29['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row29['emor'].'</p>';}
	   else if($n29>0 and $row29['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row29['emor'].'</p>';}
	   else if($n29>0 and $row29['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row29['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n30>0 and $row30['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row30['emor'].'</p>';}
	   else if($n30>0 and $row30['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row30['emor'].'</p>';}
	   else if($n30>0 and $row30['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row30['emor'].'</p>';}
	   else if($n30>0 and $row30['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row30['emor'].'</p>';}
	   else if($n30>0 and $row30['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row30['emor'].'</p>';}
	     
	   else {echo '<input type="button" name="2021-08-30" value="A" id="'.$row['sid'].'" class="btn btn-info btn-xs edit_data1 ">';}
	   
	   ?>
	   
	   
	   </td>
	   <td align="center">
	   
	   <?php 
	   if($n31>0 and $row31['emor']=='Early') {echo '<p style="color: lightgreen; font-weight:bold;">'.$row31['emor'].'</p>';}
	   else if($n31>0 and $row31['emor']=='Morning') {echo '<p style="color: green; font-weight:bold;">'.$row31['emor'].'</p>';}
	   else if($n31>0 and $row31['emor']=='Late') {echo '<p style="color: Blue; font-weight:bold;">'.$row31['emor'].'</p>';}
	   else if($n31>0 and $row31['emor']=='Night') {echo '<p style="color: grey; font-weight:bold;">'.$row31['emor'].'</p>';}
	   else if($n31>0 and $row31['emor']=='Off') {echo '<p style="color: red; font-weight:bold;">'.$row31['emor'].'</p>';}
	     
	   else {echo 'NS';}?>
	   
	   
	   </td>
	   <td align="center"><?php echo $ntotal;?></td>
	   
	

  
      </tr>
<?php $count++; } 

?>

  </tbody>
  
  
  
</table>
</form>

</body>

</html>


<div id="dataModal" class="modal fade">  
      <div class="modal-dialog" style="max-width: 80%;" role="document">  
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
                     <h4 class="modal-title"align='center'>Update Roaster Duty</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" name="frmMain2">  
                          <label>Staff ID</label>  
                          <input type="text" name="pmrn" id="pmrn" class="form-control" size="15" readonly>  
						   
						  
                          
						  
						  
		  
		   <label>Duty Location</label>  
						  <select type="text" name="pbp1" id="pbp1" class="form-control" required>
						
                          
			<?php 
			$sql = "Select * from roaster_location;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  
		  <label>Duty Shift</label>  
						  <select type="text" name="pbp3" id="pbp3" class="form-control" required>
						
            <option value='Morning'>Morning</option>             
<option value='Late'>Late</option>             
<option value='Night'>Night</option>     
<option value='Off'>Off</option>             			
			
		  </select>
		  
		  
		  
					 
						  
						  
                          
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert45" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
</html>
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"roaster_2_2.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.mor);  
                     
					 $('#pbp1').val(data.location); 
					 $('#pbp3').val(data.emor); 
					                  
					 
                     $('#employee_id').val(data.id);  
                     $('#insert45').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn').val() == "")  
           {  
                alert("MRN is required");  
           }  
          
           
           else  
           {  
                $.ajax({  
                     url:"roaster_3_3.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>

 
 
 <div id="add_data_Modal1" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Add Roaster Duty</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form2" name="frmMain22">  
                          <label>Staff ID</label>  
                          <input type="text" name="pmrn1" id="pmrn1" class="form-control" size="15" readonly>  
						   
						   
						   <label>Date</label>  
						  
                          <input type="date" class="form-control" name="date" id="date"></td>
						  
						  
		  
		   <label>Duty Location</label>  
						  <select type="text" name="pbp11" id="pbp11" class="form-control" required>
						
                          
			<?php 
			$sql = "Select * from roaster_location;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  
		  <label>Duty Shift</label>  
						  <select type="text" name="pbp31" id="pbp31" class="form-control" required>
						
            <option value='Morning'>Morning</option>             
<option value='Late'>Late</option>             
<option value='Night'>Night</option>     
<option value='Off'>Off</option>             			
			
		  </select>
		  
		  
		  
					 
						  
						  
                          
                          
                          <input type="text" name="employee_id2" id="employee_id2" />  
						  
						       
							   <input type="submit" name="insert" id="insert4" value="Insert" class="btn btn-success" />  

                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
</html>
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form2')[0].reset();  
      });  
      $(document).on('click', '.edit_data1', function(){  
           var employee_id2 = $(this).attr("id");  
		   
           $.ajax({  
                url:"roaster_2_21.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn1').val(data.sid);  
                     
					 $('#pbp11').val(data.location); 
					 $('#pbp31').val(data.emor); 
					 $('#date').val(data.date); 
					 
					 
					  
                     
					 
                     $('#employee_id2').val(data.id);  
                     $('#insert4').val("Add");  
                     $('#add_data_Modal1').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form2').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn1').val() == "")  
           {  
                alert("MRN is required");  
           }  
          
           
           else  
           {  
                $.ajax({  
                     url:"roaster3_31.php",  
                     method:"POST",  
                     data:$('#insert_form2').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form2')[0].reset();  
                          $('#add_data_Modal1').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>