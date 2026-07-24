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

<!DOCTYPE htm3l>
<htm3l>
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
    height: 40px;
    width: 30%;
    background-color: powderblue;
}
</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm this Leave ?");
}

</script>

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


<form action="" method="POST">

  <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td colspan="2"><label><strong>Select Month:</strong></label></td>
						

						<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					
					
					 
			    	 <td colspan="2">
					 
					 <select name="stdate" required>
	  <option value=''>-Select Month-</option>
	
  <option value='1'>January</option>
    <option value='2'>February</option>
	  <option value='3'>March</option>
	  <option value='4'>April</option>
	  <option value='5'>May</option>
	  <option value='6'>June</option>
	  <option value='7'>July</option>
	  	  <option value='8'>August</option>
	  	  <option value='9'>September</option>
		  <option value='10'>October</option>
	  <option value='11'>November</option>
	  <option value='12'>December</option>
	  
      </select>
					 
					 
					 
					 
					 
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>

</form>
					 
					 
					 

<p align="center" class="style1">Todays Staff's Attendance  Status </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="10%"><strong>Name</strong></th>
	  <th width="10%"><strong>ID</strong></th>
	  <th width="2%"><strong>1</strong></th>
	  <th width="2%"><strong>2</strong></th>
	  <th width="2%"><strong>3</strong></th>
	  <th width="2%"><strong>4</strong></th>
	  <th width="2%"><strong>5</strong></th>
	  <th width="2%"><strong>6</strong></th>
	  <th width="2%"><strong>7</strong></th>
	  <th width="2%"><strong>8</strong></th>
	  <th width="2%"><strong>9</strong></th>
	  <th width="2%"><strong>10</strong></th>
	  <th width="2%"><strong>11</strong></th>
	  <th width="2%"><strong>12</strong></th>
	  <th width="2%"><strong>13</strong></th>
	  <th width="2%"><strong>14</strong></th>
	  <th width="2%"><strong>15</strong></th>
	  <th width="2%"><strong>16</strong></th>
	  <th width="2%"><strong>17</strong></th>
	  <th width="2%"><strong>18</strong></th>
	  <th width="2%"><strong>19</strong></th>
	  <th width="2%"><strong>20</strong></th>
	  <th width="2%"><strong>21</strong></th>
	  <th width="2%"><strong>22</strong></th>
	  <th width="2%"><strong>23</strong></th>
	  <th width="2%"><strong>24</strong></th>
	  <th width="2%"><strong>25</strong></th>
	  <th width="2%"><strong>26</strong></th>
	  <th width="2%"><strong>27</strong></th>
	  <th width="2%"><strong>28</strong></th>
	  <th width="2%"><strong>29</strong></th>
	  <th width="2%"><strong>30</strong></th>
	  <th width="2%"><strong>31</strong></th>
	  <th width="2%"><strong>T</strong></th>
	  
	  
      
      
	  
      
	   </tr>
  </thead>
  <tbody>

  
  
  

    


<?php
	
	
if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$m=$_REQUEST["stdate"];
$m1=date('2025-'.$m.'-d');	
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$y=date('2025');

echo "<font color=blue font size=5> Attendance Report";

echo " of  ";
echo $month = date('F', strtotime($m1)).','.$y;



$sel_query="Select * from staff3 where status ='Active' order by dept asc";
//$start=$row["aadate"];
$count=1;
$rown = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($rown)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["sname"]; ?></a></td>
	  <td align="center"><?php echo $row["sid1"]; ?></a></td>
	  
	   <?php 

$d1=date('2025-'.$m.'-01');

$d2=date('2025-'.$m.'-02');
$d3=date('2025-'.$m.'-03');
$d4=date('2025-'.$m.'-04');
$d5=date('2025-'.$m.'-05');
$d6=date('2025-'.$m.'-06');
$d7=date('2025-'.$m.'-07');
$d8=date('2025-'.$m.'-08');
$d9=date('2025-'.$m.'-09');
$d10=date('2025-'.$m.'-10');
$d11=date('2025-'.$m.'-11');
$d12=date('2025-'.$m.'-12');
$d13=date('2025-'.$m.'-13');
$d14=date('2025-'.$m.'-14');
$d15=date('2025-'.$m.'-15');
$d16=date('2025-'.$m.'-16');
$d17=date('2025-'.$m.'-17');
$d18=date('2025-'.$m.'-18');
$d19=date('2025-'.$m.'-19');
$d20=date('2025-'.$m.'-20');
$d21=date('2025-'.$m.'-21');
$d22=date('2025-'.$m.'-22');
$d23=date('2025-'.$m.'-23');
$d24=date('2025-'.$m.'-24');
$d25=date('2025-'.$m.'-25');
$d26=date('2025-'.$m.'-26');
$d27=date('2025-'.$m.'-27');
$d28=date('2025-'.$m.'-28');
$d29=date('2025-'.$m.'-29');
$d30=date('2025-'.$m.'-30');
$d31=date('2025-'.$m.'-31');



$uuid=$row['sid1'];




$s1="Select COUNT(distinct(uid)),status from tm3 where date1='$d1' and uid='$uuid' and status!='A'";
$r1 = mysqli_query($con, $s1) or die(mysqli_error());
$row1 = mysqli_fetch_array($r1);
$n1=$row1['COUNT(distinct(uid))'];

$s2="Select COUNT(distinct(uid)),status from tm3 where date1='$d2' and uid='$uuid' and status!='A'";
$r2 = mysqli_query($con, $s2) or die(mysqli_error());
$row2 = mysqli_fetch_array($r2);
$n2=$row2['COUNT(distinct(uid))'];


$s3="Select COUNT(distinct(uid)),status from tm3 where date1='$d3' and uid='$uuid' and status!='A'";
$r3 = mysqli_query($con, $s3) or die(mysqli_error());
$row3 = mysqli_fetch_array($r3);
$n3=$row3['COUNT(distinct(uid))'];

$s4="Select COUNT(distinct(uid)),status from tm3 where date1='$d4' and uid='$uuid' and status!='A'";
$r4 = mysqli_query($con, $s4) or die(mysqli_error());
$row4 = mysqli_fetch_array($r4);
$n4=$row4['COUNT(distinct(uid))'];


$s5="Select COUNT(distinct(uid)),status from tm3 where date1='$d5' and uid='$uuid' and status!='A'";
$r5 = mysqli_query($con, $s5) or die(mysqli_error());
$row5 = mysqli_fetch_array($r5);
$n5=$row5['COUNT(distinct(uid))'];


$s6="Select COUNT(distinct(uid)),status from tm3 where date1='$d6' and uid='$uuid' and status!='A'";
$r6 = mysqli_query($con, $s6) or die(mysqli_error());
$row6 = mysqli_fetch_array($r6);
$n6=$row6['COUNT(distinct(uid))'];


$s7="Select COUNT(distinct(uid)),status from tm3 where date1='$d7' and uid='$uuid' and status!='A'";
$r7 = mysqli_query($con, $s7) or die(mysqli_error());
$row7 = mysqli_fetch_array($r7);
$n7=$row7['COUNT(distinct(uid))'];


$s8="Select COUNT(distinct(uid)),status from tm3 where date1='$d8' and uid='$uuid' and status!='A'";
$r8 = mysqli_query($con, $s8) or die(mysqli_error());
$row8 = mysqli_fetch_array($r8);
$n8=$row8['COUNT(distinct(uid))'];


$s9="Select COUNT(distinct(uid)),status from tm3 where date1='$d9' and uid='$uuid' and status!='A'";
$r9 = mysqli_query($con, $s9) or die(mysqli_error());
$row9 = mysqli_fetch_array($r9);
$n9=$row9['COUNT(distinct(uid))'];

$s10="Select COUNT(distinct(uid)),status from tm3 where date1='$d10' and uid='$uuid' and status!='A'";
$r10= mysqli_query($con, $s10) or die(mysqli_error());
$row10 = mysqli_fetch_array($r10);
$n10=$row10['COUNT(distinct(uid))'];



$s11="Select COUNT(distinct(uid)),status from tm3 where date1='$d11' and uid='$uuid' and status!='A'";
$r11= mysqli_query($con, $s11) or die(mysqli_error());
$row11 = mysqli_fetch_array($r11);
$n11=$row11['COUNT(distinct(uid))'];


$s12="Select  COUNT(distinct(uid)),status from tm3 where date1='$d12' and uid='$uuid' and status!='A'";
$r12= mysqli_query($con, $s12) or die(mysqli_error());
$row12 = mysqli_fetch_array($r12);
$n12=$row12['COUNT(distinct(uid))'];


$s13="Select distinct COUNT(distinct(uid)),status from tm3 where date1='$d13' and uid='$uuid' and status!='A'";
$r13= mysqli_query($con, $s13) or die(mysqli_error());
$row13 = mysqli_fetch_array($r13);
$n13=$row13['COUNT(distinct(uid))'];


$s14="Select COUNT(distinct(uid)),status from tm3 where date1='$d14' and uid='$uuid' and status!='A'";
$r14= mysqli_query($con, $s14) or die(mysqli_error());
$row14 = mysqli_fetch_array($r14);
$n14=$row14['COUNT(distinct(uid))'];


$s15="Select COUNT(distinct(uid)),status from tm3 where date1='$d15' and uid='$uuid' and status!='A'";
$r15= mysqli_query($con, $s15) or die(mysqli_error());
$row15 = mysqli_fetch_array($r15);
$n15=$row15['COUNT(distinct(uid))'];

$s16="Select COUNT(distinct(uid)),status from tm3 where date1='$d16' and uid='$uuid' and status!='A'";
$r16= mysqli_query($con, $s16) or die(mysqli_error());
$row16 = mysqli_fetch_array($r16);
$n16=$row16['COUNT(distinct(uid))'];

$s17="Select COUNT(distinct(uid)),status from tm3 where date1='$d17' and uid='$uuid' and status!='A'";
$r17= mysqli_query($con, $s17) or die(mysqli_error());    
$row17 = mysqli_fetch_array($r17);
$n17=$row17['COUNT(distinct(uid))'];


$s18="Select COUNT(distinct(uid)),status from tm3 where date1='$d18' and uid='$uuid' and status!='A'";
$r18= mysqli_query($con, $s18) or die(mysqli_error());
$row18 = mysqli_fetch_array($r18);
$n18=$row18['COUNT(distinct(uid))'];

$s19="Select COUNT(distinct(uid)),status from tm3 where date1='$d19' and uid='$uuid' and status!='A'";
$r19= mysqli_query($con, $s19) or die(mysqli_error());
$row19 = mysqli_fetch_array($r19);
$n19=$row19['COUNT(distinct(uid))'];

$s20="Select COUNT(distinct(uid)),status from tm3 where date1='$d20' and uid='$uuid' and status!='A'";
$r20= mysqli_query($con, $s20) or die(mysqli_error());
$row20 = mysqli_fetch_array($r20);
$n20=$row20['COUNT(distinct(uid))'];

$s21="Select COUNT(distinct(uid)),status from tm3 where date1='$d21' and uid='$uuid' and status!='A'";
$r21= mysqli_query($con, $s21) or die(mysqli_error());
$row21 = mysqli_fetch_array($r21);
$n21=$row21['COUNT(distinct(uid))'];

$s22="Select COUNT(distinct(uid)),status from tm3 where date1='$d22' and uid='$uuid' and status!='A'";
$r22= mysqli_query($con, $s22) or die(mysqli_error());
$row22 = mysqli_fetch_array($r22);
$n22=$row22['COUNT(distinct(uid))'];


$s23="Select COUNT(distinct(uid)),status from tm3 where date1='$d23' and uid='$uuid' and status!='A'";
$r23= mysqli_query($con, $s23) or die(mysqli_error());
$row23 = mysqli_fetch_array($r23);
$n23=$row23['COUNT(distinct(uid))'];


$s24="Select COUNT(distinct(uid)),status from tm3 where date1='$d24' and uid='$uuid' and status!='A'";
$r24= mysqli_query($con, $s24) or die(mysqli_error());
$row24 = mysqli_fetch_array($r24);
$n24=$row24['COUNT(distinct(uid))'];


$s25="Select COUNT(distinct(uid)),status from tm3 where date1='$d25' and uid='$uuid' and status!='A'";
$r25= mysqli_query($con, $s25) or die(mysqli_error());
$row25 = mysqli_fetch_array($r25);
$n25=$row25['COUNT(distinct(uid))'];


$s26="Select COUNT(distinct(uid)),status from tm3 where date1='$d26' and uid='$uuid' and status!='A'";
$r26= mysqli_query($con, $s26) or die(mysqli_error());
$row26 = mysqli_fetch_array($r26);
$n26=$row26['COUNT(distinct(uid))'];

$s27="Select COUNT(distinct(uid)),status from tm3 where date1='$d27' and uid='$uuid' and status!='A'";
$r27= mysqli_query($con, $s27) or die(mysqli_error());
$row27 = mysqli_fetch_array($r27);
$n27=$row27['COUNT(distinct(uid))'];


$s28="Select COUNT(distinct(uid)),status from tm3 where date1='$d28' and uid='$uuid' and status!='A'";
$r28= mysqli_query($con, $s28) or die(mysqli_error());
$row28 = mysqli_fetch_array($r28);
$n28=$row28['COUNT(distinct(uid))'];


$s29="Select COUNT(distinct(uid)),status from tm3 where date1='$d29' and uid='$uuid' and status!='A'";
$r29= mysqli_query($con, $s29) or die(mysqli_error());
$row29 = mysqli_fetch_array($r29);
$n29=$row29['COUNT(distinct(uid))'];


$s30="Select COUNT(distinct(uid)),status from tm3 where date1='$d30' and uid='$uuid' and status!='A'";
$r30= mysqli_query($con, $s30) or die(mysqli_error());
$row30 = mysqli_fetch_array($r30);
$n30=$row30['COUNT(distinct(uid))'];



$s31="Select COUNT(distinct(uid)),status from tm3 where date1='$d31' and uid='$uuid' and status!='A'";
$r31= mysqli_query($con, $s31) or die(mysqli_error());
$row31 = mysqli_fetch_array($r31);
$n31=$row31['COUNT(distinct(uid))'];



$ntotal=$n1+$n2+$n3+$n4+$n5+$n6+$n7+$n8+$n9+$n10+$n11+$n12+$n13+$n14+$n15+$n16+$n17+$n18+$n19+$n20+$n21+$n22+$n23+$n24+$n25+$n26+$n27+$n28+$n29+$n30+$n31;


?>

	   
	   <td align="center"><?php if($n1>0) {echo $row1['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n2>0) {echo $row2['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n3>0) {echo $row3['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n4>0) {echo $row4['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n5>0) {echo $row5['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n6>0) {echo $row6['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n7>0) {echo $row7['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n8>0) {echo $row8['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n9>0) {echo $row9['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n10>0) {echo $row10['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n11>0) {echo $row11['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n12>0) {echo $row12['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n13>0) {echo $row13['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n14>0) {echo $row14['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n15>0) {echo $row15['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n16>0) {echo $row16['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n17>0) {echo $row17['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n18>0) {echo $row18['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n19>0) {echo $row19['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n20>0) {echo $row20['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n21>0) {echo $row21['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n22>0) {echo $row22['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n23>0) {echo $row23['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n24>0) {echo $row24['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n25>0) {echo $row25['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n26>0) {echo $row26['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n27>0) {echo $row27['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n28>0) {echo $row28['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n29>0) {echo $row29['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n30>0) {echo $row30['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php if($n31>0) {echo $row31['status'];} else {echo 'A';}?></td>
	   <td align="center"><?php echo $ntotal;?></td>
	   
	

  
      </tr>
<?php $count++; } }

?>

  </tbody>
  
  
  
</table>













</form>

</body>

</htm3l>

