<?php
	
//db
require('db1.php');
//GET Data
$opd=$_GET['opd'];

//var
$date1=date('Y-m-d');


//Query

//$query="SELECT d.dname,d.sid,d.c_call,COUNT(a.status) AS tot,p.id,p.pmrn,p.s_no,p.pname,p.bill,p.status FROM doctor d,opd_appoint1 a,pappnew p 
//WHERE d.status='Active' AND d.opd='$opd' AND a.dname=d.dname AND a.date1='$date1' AND a.status IN ('AVAILABLE','Booked') AND p.adate1='$date1' AND p.dname=d.dname AND p.status IN ('HISTORY UPDATED','NOT SEEN') GROUP BY d.dname ASC";

$query="SELECT distinct d.dname,d.sid,d.c_call,COUNT(a.status) AS tot FROM doctor d,opd_appoint1 a 
WHERE d.status='Active' AND d.opd='$opd' AND a.dname=d.dname AND a.date1='$date1' AND a.status IN ('AVAILABLE','Booked') GROUP BY d.dname ASC";


$execute = mysqli_query($con,$query);

//Loop
foreach($execute as $row){
echo "<td>";

//var
$url = "new_opd_1?sid=".$row['sid'];
$sid=$row['sid'];
$dn = $row['dname'];
$call_off_url = "doc_call_off_ca?dn=".$row['dname'].'&sid='.$row['sid'];
$details_url = "newcdetails_et1?ID=".$row['id'].'&pmrn='.$row['pmrn'];

$count = 1;


//appoint condition
	if($row['tot']!=0)
	       {
		    ?>
			<a href='<?= $url ?>'><img  src='prescription/prescription/doctor/<?= $sid ?>.jpg' width='60'  height='60' align='center'></a>
			<span style='color:red;text-align:center;font-size:14px'><a href='<?= $url ?>'><strong><?= $dn ?></strong></a>
		    <?php 
	       }

//call condition
	if($row['c_call']==1)
		   {
		     ?>
			<audio autoplay><source src='call1.mp3'></audio>
			<a onclick='return confirm_click1();' href='<?= $call_off_url ?>'>
			<img src='audio/call_bell1.gif' title='Calling...' width='80'  height='80'></a>
			</td>
			 <?php
		    }
//Patient list
          
        $query2="SELECT distinct id,pmrn,s_no,pname,bill,status FROM pappnew WHERE adate1='$date1' AND dname='$dn' AND status IN ('HISTORY UPDATED','NOT SEEN') ORDER BY aslot ASC";
         $execute2 = mysqli_query($con,$query2);

			foreach($execute2 as $row)
			{

				    if($row['s_no']=='' and $row['bill']=='BILLED' and $row['status']!='HISTORY UPDATED')
					{
					echo "<p align='left' style='font-weight:bold;color:blue;font-size:12px;'><a onclick='return confirm_click();' href='$details_url'>".$count++.' ) ' .$row["pname"].'<br> MRN-'.$row["pmrn"]."</a>";}



					else if($row['s_no']!='' and $row['bill']=='BILLED' and $row['status']!='HISTORY UPDATED')
					{
					echo "<p align='left' style='font-weight:bold;color:blue;font-size:12px;'><a onclick='return confirm_click();' href='$details_url'>".$count++.' ) ' .$row["pname"].'<br> MRN-'.$row["pmrn"];}


					else if($row['s_no']=='' and $row['bill']=='BILLED' and $row['status']=='HISTORY UPDATED')
					{
					echo "<p align='left' style='font-weight:bold;color:green;font-size:12px;'>".$count++.' ) ' .$row["pname"].'<br> MRN-'.$row["pmrn"];}


					else if($row['s_no']!='' and $row['bill']=='BILLED' and $row['status']=='HISTORY UPDATED')
					{
					echo "<p align='left' style='font-weight:bold;color:darkgreen;font-size:18px;'>".$count++.' ) ' .$row["pname"].' '.'-'.$row["s_no"].'<br> MRN-'.$row["pmrn"];}



					else if($row['s_no']=='' and $row['bill']!='BILLED' and $row['status']=='NOT SEEN')
					{
					echo "<p align='left' style='font-weight:bold;color:red;font-size:12px;'>".$count++.' ) ' .$row["pname"].'<br> MRN-'.$row["pmrn"];}



					else if($row['s_no']!='' and $row['bill']!='BILLED' and $row['status']=='NOT SEEN')
					{
					echo "<p align='left' style='font-weight:bold;color:red;font-size:12px;'>".$count++.' ) ' .$row["pname"].' '.'-'.$row["s_no"].'<br> MRN-'.$row["pmrn"];
				      }

	}





echo "</td>";
}?>	
<!-- Loop End -->
      
	

