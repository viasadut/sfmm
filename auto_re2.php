	<?php
	    session_start();
	require('db1.php');
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$query400 = "SELECT * FROM staff3 where sid= '$user'"; 
	 
$result400 = mysqli_query($con, $query400) or die(mysqli_error());

// Print out result
$row400 = mysqli_fetch_array($result400);

$opd=$row400['opd'];


$sel_query="Select distinct dname from doctor where status='Active' and opd='$opd' order by dname asc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      
      
	  
	   <?php
	   $date2=date('Y-m-d');
	   $dn = $row['dname'];
$query40 = "SELECT * FROM doctor where dname= '$dn' and status='Active'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);
$ss1=$row40['sid'];


			/*$sql1a = "select COUNT(status) from opd_appoint1 where dname='$dn' and date1='$date2' and status='NOT AVAILABLE'";
			$res1a = mysqli_query($con, $sql1a);
			$row41a = mysqli_fetch_array($res1a);
			*/
			$sql1aa = "select COUNT(status) from opd_appoint1 where dname='$dn' and date1='$date2' and status='AVAILABLE'";
			$res1aa = mysqli_query($con, $sql1aa);
			$row41aa = mysqli_fetch_array($res1aa);
			
			$sql1aaa = "select COUNT(status) from opd_appoint1 where dname='$dn' and date1='$date2' and status='Booked'";
			$res1aaa = mysqli_query($con, $sql1aaa);
			$row41aaa = mysqli_fetch_array($res1aaa);
			
			
			$bell = "select * from doctor where dname='$dn'";
			$bell_q = mysqli_query($con, $bell);
			$bell_r = mysqli_fetch_array($bell_q);
			$call_r = $bell_r['c_call'];

   $url = "new_opd_1?sid=$ss1"; 
   $url1 = "doc_call_off_ca?dn=$dn&sid=$ss";   
   
	  if($row41aa['COUNT(status)']!=0 || $row41aaa['COUNT(status)']!=0)
	
	{
	echo"		
	<td>
	<a href='$url'><img  src='prescription/prescription/doctor/".$ss1.".jpg' width='60'  height='60' align='center'></a>
	
	<span style='color:red;text-align:center;font-size:14px'><a href='$url'><strong>".$dn."</strong></a><br>";
	}
	?>
	
	
		  
<?php
	if($call_r==1)
		
		{
			
			echo "
			
			<audio autoplay><source src='call1.mp3'></audio>
			<a onclick='return confirm_click1();' href='$url1'>
			<img src='audio/call_bell1.gif' title='Calling...' width='80'  height='80'></a>
  ";
		}  
		
		
		


?>
	
	
	
	<?php

$date5=date('Y-m-d');
	
	
$sel_query5="Select * from pappnew where adate1='$date5' and dname='$dn' and status IN ('HISTORY UPDATED','NOT SEEN') ORDER BY aslot asc;";

$result5 = mysqli_query($con,$sel_query5);
$count4=1;

while($row5 = mysqli_fetch_assoc($result5)) { ?>



<?php 

$ID=$row5['ID'];
$pmrn=$row5['pmrn'];
$url = "newcdetails_et?ID=$ID&pmrn=$pmrn"; 


if($row5['s_no']=='' and $row5['bill']=='BILLED' and $row5['status']!='HISTORY UPDATED')
{
echo "<p align='left' style='font-weight:bold;color:blue;font-size:12px;'><a onclick='return confirm_click();' href='$url'>".$count4.' ) ' .$row5["pname"].'<br> MRN-'.$row5["pmrn"]."</a>";}



else if($row5['s_no']!='' and $row5['bill']=='BILLED' and $row5['status']!='HISTORY UPDATED')
{
echo "<p align='left' style='font-weight:bold;color:blue;font-size:12px;'><a onclick='return confirm_click();' href='$url'>".$count4.' ) ' .$row5["pname"].'<br> MRN-'.$row5["pmrn"];}


else if($row5['s_no']=='' and $row5['bill']=='BILLED' and $row5['status']=='HISTORY UPDATED')
{
echo "<p align='left' style='font-weight:bold;color:green;font-size:12px;'>".$count4.' ) ' .$row5["pname"].'<br> MRN-'.$row5["pmrn"];}


else if($row5['s_no']!='' and $row5['bill']=='BILLED' and $row5['status']=='HISTORY UPDATED')
{
echo "<p align='left' style='font-weight:bold;color:darkgreen;font-size:18px;'>".$count4.' ) ' .$row5["pname"].' '.'-'.$row5["s_no"].'<br> MRN-'.$row5["pmrn"];}



else if($row5['s_no']=='' and $row5['bill']!='BILLED' and $row5['status']=='NOT SEEN')
{
echo "<p align='left' style='font-weight:bold;color:red;font-size:12px;'>".$count4.' ) ' .$row5["pname"].'<br> MRN-'.$row5["pmrn"];}



else if($row5['s_no']!='' and $row5['bill']!='BILLED' and $row5['status']=='NOT SEEN')
{
echo "<p align='left' style='font-weight:bold;color:red;font-size:12px;'>".$count4.' ) ' .$row5["pname"].' '.'-'.$row5["s_no"].'<br> MRN-'.$row5["pmrn"];}

 ?>



<?php $count4++; } ?>



</td>
	

    <?php } ?>