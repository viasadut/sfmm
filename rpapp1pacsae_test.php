<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="rad"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
$infu=$_REQUEST['infu'];

$user=$_SESSION["sess_username"];
$btime=date('d/m/Y H:i:s');
$adate1=date('Y-m-d');
//$app_date=date('Ymd');

$query339 = "SELECT * FROM einves where id= '$id'"; 
$result339 = mysqli_query($con, $query339) or die(mysqli_error());
$row339 = mysqli_fetch_array($result339);
$tname=$row339['infusion'];
$link=$row339['link'];
$a_id='E'.$row339['id'];
$pname=$row339['pname'];

$eidin=$row339['eid'];
$page=$row339['page'];
$euser=$row339['user'];
$price=$row339['price'];

$query39 = "SELECT * FROM patient where pmrn= '$pmrn'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());
$row39 = mysqli_fetch_array($result39);
//$pbirth=$row39['bdate'];
$age=$row39['bdate'];
$age1=date('Ymd',strtotime($age));
$date10=date_create($age);
//$date20=date_format('d-m-Y',($date1));
$date= date('d-m-Y');
$date2=date_create($date);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date2,$date10);
$diff1= $diff->format("%y Y %m M %d D");


$query49 = "SELECT * FROM user where uname= '$euser'"; 
$result49 = mysqli_query($con, $query49) or die(mysqli_error());
$row49 = mysqli_fetch_array($result49);
$ddname=$row339['dname'];

$query40 = "SELECT * FROM emergency where pmrn= '$pmrn' and eid='$eidin'"; 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());
$row40 = mysqli_fetch_array($result40);
$rdate=date('Y-m-d');
$ppage=$row40['age'];


if(isset($_POST['Submit'])==1)
{

$name =$_REQUEST['name'];
$pmrn =$_REQUEST['pmrn'];
$padd =$_REQUEST['padd'];
//$did =$_REQUEST['did'];
$dname =$_REQUEST['dname'];
$date = $_REQUEST['date'];
$date1 =$_REQUEST[ 'date1'];
$app_date=date('Ymd', strtotime($date1));
$slot = $_REQUEST['slot'];
$doc1 = $_REQUEST['doc'];
$pphone= $_REQUEST['pphone'];
//$pheight= $_REQUEST['pheight'];
//$pweight= $_REQUEST['pweight'];
//$ptemp= $_REQUEST['ptemp'];
$page= $_REQUEST['page'];
$psex = $_REQUEST['psex'];
//$bill = $_REQUEST['bill'];


$url = "bar_pos/index5.php?a_no=$a_id";


$sel2="SELECT * FROM radpapp WHERE `pmrn`='$pmrn' and `tname`='$tname' and adate='$date1' and status not in ('CANCEL','NOT SEEN');";
$result2 = mysqli_query($con,$sel2);



if(empty($_REQUEST['slot']))

{
       echo '<script language="javascript">';
    echo 'alert("No Appointment Slot Selected!!"); ';
    echo '</script>';

    }
	
if($res2=mysqli_num_rows($result2)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Patient Already Have an Appointment, Pls check Appointment List"); ';
    echo '</script>';
    }	

	
//$book = $_REQUEST['book'];
//$checkbox1 = $_REQUEST['checkbox1'];
else if ($dname=='MR')
{
//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 


//$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`link`) values ('$name', '$pmrn','$pphone','$padd','$dname','$date1','$slot','NOT SEEN','$page','$psex','$dname1','$tname','$btime','$link')";
//mysqli_query($con,$ins_query);




$ins_querypac="insert into his_order (`Accession_Number`,`Modality`,`Patient_Name`,`Patient_ID`,`Patient_Sex`,`Req_Proc_Desc`,`Sch_Station_AE_Title`,`Sch_Station_Name`,
`Sch_Proc_Step_Start_Date`,`Sch_Proc_Step_Start_Time`,`Sch_Proc_Step_Desc`,`Sch_Proc_Step_ID`,`Req_Proc_ID`,`Order_Status`,`Ref_Physician_Name`,`Patient_Age`,`Requesting_Physician`,`Institution_Name`,`Patient_Birth_Date`,`Patient_Weight`) values 
('$a_id','$dname','$pname','$pmrn','$psex','$tname','NODENAME','$dname','$app_date','$slot','$tname','$a_id','$a_id','1','$ddname','','','SFMMKPJSH','$age1','000.000')";
mysqli_query($con,$ins_querypac);



$query = "UPDATE einves set rby='$user',rtime='$btime', rstatus='RECEIVED', status='RECEIVED',rdate='$rdate' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());





$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
mysqli_query($con,$update);

$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`dname`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`a_no`,`link`,`adate`,`aslot`,`location`,`emerid`,`adate1`,`price`) 
values ('$pname', '$pmrn','$pphone','$dname','NOT SEEN','$page','$psex','$ddname','$tname','$btime','$a_id','$link','$date1','$slot','A&E','$eidin','$adate1','$price')";
mysqli_query($con,$ins_query);



//$update1="update alltest set status='DONE' where `id`='$id'";
//mysqli_query($con,$update1);
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';
	
	header("Location: $url");
} 





else if ($dname=='DX')
{
//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 


//$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`link`) values ('$name', '$pmrn','$pphone','$padd','$dname','$date1','$slot','NOT SEEN','$page','$psex','$dname1','$tname','$btime','$link')";
//mysqli_query($con,$ins_query);




$ins_querypac="insert into his_order (`Accession_Number`,`Modality`,`Patient_Name`,`Patient_ID`,`Patient_Sex`,`Req_Proc_Desc`,`Sch_Station_AE_Title`,`Sch_Station_Name`,
`Sch_Proc_Step_Start_Date`,`Sch_Proc_Step_Start_Time`,`Sch_Proc_Step_Desc`,`Sch_Proc_Step_ID`,`Req_Proc_ID`,`Order_Status`,`Ref_Physician_Name`,`Patient_Age`,`Requesting_Physician`,`Institution_Name`,`Patient_Birth_Date`,`Patient_Weight`) values 
('$a_id','$dname','$pname','$pmrn','$psex','$tname','CALYPSO','$dname','$app_date','$slot','$tname','$a_id','$a_id','1','$ddname','','','SFMMKPJSH','$age1','000.000')";
mysqli_query($con,$ins_querypac);



$query = "UPDATE einves set rby='$user',rtime='$btime', rstatus='RECEIVED', status='RECEIVED',rdate='$rdate' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());





$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
mysqli_query($con,$update);

$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`dname`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`a_no`,`link`,`adate`,`aslot`,`location`,`emerid`,`adate1`,`price`) 
values ('$pname', '$pmrn','$pphone','$dname','NOT SEEN','$page','$psex','$ddname','$tname','$btime','$a_id','$link','$date1','$slot','A&E','$eidin','$adate1','$price')";
mysqli_query($con,$ins_query);



//$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";//
//mysqli_query($con,$update);
//$update1="update alltest set status='DONE' where `id`='$id'";
//mysqli_query($con,$update1);
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';
	
	header("Location: $url");
} 




else if ($dname=='DX1')
{
//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 


//$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`link`) values ('$name', '$pmrn','$pphone','$padd','$dname','$date1','$slot','NOT SEEN','$page','$psex','$dname1','$tname','$btime','$link')";
//mysqli_query($con,$ins_query);




$ins_querypac="insert into his_order (`Accession_Number`,`Modality`,`Patient_Name`,`Patient_ID`,`Patient_Sex`,`Req_Proc_Desc`,`Sch_Station_AE_Title`,`Sch_Station_Name`,
`Sch_Proc_Step_Start_Date`,`Sch_Proc_Step_Start_Time`,`Sch_Proc_Step_Desc`,`Sch_Proc_Step_ID`,`Req_Proc_ID`,`Order_Status`,`Ref_Physician_Name`,`Patient_Age`,`Requesting_Physician`,`Institution_Name`,`Patient_Birth_Date`,`Patient_Weight`) values 
('$a_id','DX','$pname','$pmrn','$psex','$tname','HIRISRF43','$dname','$app_date','$slot','$tname','$a_id','$a_id','1','$ddname','','','SFMMKPJSH','$age1','000.000')";
mysqli_query($con,$ins_querypac);




$query = "UPDATE einves set rby='$user',rtime='$btime', rstatus='RECEIVED', status='RECEIVED',rdate='$rdate' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());





$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
mysqli_query($con,$update);

$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`dname`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`a_no`,`link`,`adate`,`aslot`,`emerid`,`location`,`adate1`,`price`) 
values ('$pname', '$pmrn','$pphone','$dname','NOT SEEN','$page','$psex','$ddname','$tname','$btime','$a_id','$link','$date1','$slot','$eidin','A&E','$adate1','$price')";
mysqli_query($con,$ins_query);


//$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";//
//mysqli_query($con,$update);
//$update1="update alltest set status='DONE' where `id`='$id'";
//mysqli_query($con,$update1);
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';
	
	header("Location: $url");
} 

else if ($dname=='DX2')
{
//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 


//$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`link`) values ('$name', '$pmrn','$pphone','$padd','$dname','$date1','$slot','NOT SEEN','$page','$psex','$dname1','$tname','$btime','$link')";
//mysqli_query($con,$ins_query);




$ins_querypac="insert into his_order (`Accession_Number`,`Modality`,`Patient_Name`,`Patient_ID`,`Patient_Sex`,`Req_Proc_Desc`,`Sch_Station_AE_Title`,`Sch_Station_Name`,
`Sch_Proc_Step_Start_Date`,`Sch_Proc_Step_Start_Time`,`Sch_Proc_Step_Desc`,`Sch_Proc_Step_ID`,`Req_Proc_ID`,`Order_Status`,`Ref_Physician_Name`,`Patient_Age`,`Requesting_Physician`,`Institution_Name`,`Patient_Birth_Date`,`Patient_Weight`) values 
('$a_id','DX','$pname','$pmrn','$psex','$tname','SWINGPONTE','$dname','$app_date','$slot','$tname','$a_id','$a_id','1','$ddname','','','SFMMKPJSH','$age1','000.000')";
mysqli_query($con,$ins_querypac);




$query = "UPDATE einves set rby='$user',rtime='$btime', rstatus='RECEIVED', status='RECEIVED',rdate='$rdate' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());





$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
mysqli_query($con,$update);

$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`dname`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`a_no`,`link`,`adate`,`aslot`,`emerid`,`location`,`adate1`,`price`) 
values ('$pname', '$pmrn','$pphone','$dname','NOT SEEN','$page','$psex','$ddname','$tname','$btime','$a_id','$link','$date1','$slot','$eidin','A&E','$adate1','$price')";
mysqli_query($con,$ins_query);


//$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";//
//mysqli_query($con,$update);
//$update1="update alltest set status='DONE' where `id`='$id'";
//mysqli_query($con,$update1);
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';
	
	header("Location: $url");
} 



else if ($dname=='CR')
{
//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 


//$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`link`) values ('$name', '$pmrn','$pphone','$padd','$dname','$date1','$slot','NOT SEEN','$page','$psex','$dname1','$tname','$btime','$link')";
//mysqli_query($con,$ins_query);




$ins_querypac="insert into his_order (`Accession_Number`,`Modality`,`Patient_Name`,`Patient_ID`,`Patient_Sex`,`Req_Proc_Desc`,`Sch_Station_AE_Title`,`Sch_Station_Name`,
`Sch_Proc_Step_Start_Date`,`Sch_Proc_Step_Start_Time`,`Sch_Proc_Step_Desc`,`Sch_Proc_Step_ID`,`Req_Proc_ID`,`Order_Status`,`Ref_Physician_Name`,`Patient_Age`,`Requesting_Physician`,`Institution_Name`,`Patient_Birth_Date`,`Patient_Weight`) values 
('$a_id','$dname','$pname','$pmrn','$psex','$tname','NODENAME','$dname','$app_date','$slot','$tname','$a_id','$a_id','1','$ddname','','','SFMMKPJSH','$age1','000.000')";
mysqli_query($con,$ins_querypac);


$query = "UPDATE einves set rby='$user',rtime='$btime', rstatus='RECEIVED', status='RECEIVED',rdate='$rdate' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());





$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
mysqli_query($con,$update);

$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`dname`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`a_no`,`link`,`adate`,`aslot`,`location`,`emerid`,`adate1`,`price`) 
values ('$pname', '$pmrn','$pphone','$dname','NOT SEEN','$page','$psex','$ddname','$tname','$btime','$a_id','$link','$date1','$slot','A&E','$eidin','$adate1','$price')";
mysqli_query($con,$ins_query);



//$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";//
//mysqli_query($con,$update);
//$update1="update alltest set status='DONE' where `id`='$id'";
//mysqli_query($con,$update1);
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';
	
	header("Location: $url");
} 


else if ($dname=='MG')
{
//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 


//$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`link`) values ('$name', '$pmrn','$pphone','$padd','$dname','$date1','$slot','NOT SEEN','$page','$psex','$dname1','$tname','$btime','$link')";
//mysqli_query($con,$ins_query);




$ins_querypac="insert into his_order (`Accession_Number`,`Modality`,`Patient_Name`,`Patient_ID`,`Patient_Sex`,`Req_Proc_Desc`,`Sch_Station_AE_Title`,`Sch_Station_Name`,
`Sch_Proc_Step_Start_Date`,`Sch_Proc_Step_Start_Time`,`Sch_Proc_Step_Desc`,`Sch_Proc_Step_ID`,`Req_Proc_ID`,`Order_Status`,`Ref_Physician_Name`,`Patient_Age`,`Requesting_Physician`,`Institution_Name`,`Patient_Birth_Date`,`Patient_Weight`) values 
('$a_id','$dname','$pname','$pmrn','$psex','$tname','FDR-MG','$dname','$app_date','$slot','$tname','$a_id','$a_id','1','$ddname','','','SFMMKPJSH','$age1','000.000')";
mysqli_query($con,$ins_querypac);


$query = "UPDATE einves set rby='$user',rtime='$btime', rstatus='RECEIVED', status='RECEIVED',rdate='$rdate' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());





$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
mysqli_query($con,$update);

$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`dname`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`a_no`,`link`,`adate`,`aslot`,`location`,`emerid`,`adate1`,`price`) 
values ('$pname', '$pmrn','$pphone','$dname','NOT SEEN','$page','$psex','$ddname','$tname','$btime','$a_id','$link','$date1','$slot','A&E','$eidin','$adate1','$price')";
mysqli_query($con,$ins_query);



//$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";//
//mysqli_query($con,$update);
//$update1="update alltest set status='DONE' where `id`='$id'";
//mysqli_query($con,$update1);
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';
	
	header("Location: $url");
}


else if ($dname=='OPG')
{
//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 


//$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`link`) values ('$name', '$pmrn','$pphone','$padd','$dname','$date1','$slot','NOT SEEN','$page','$psex','$dname1','$tname','$btime','$link')";
//mysqli_query($con,$ins_query);




$ins_querypac="insert into his_order (`Accession_Number`,`Modality`,`Patient_Name`,`Patient_ID`,`Patient_Sex`,`Req_Proc_Desc`,`Sch_Station_AE_Title`,`Sch_Station_Name`,
`Sch_Proc_Step_Start_Date`,`Sch_Proc_Step_Start_Time`,`Sch_Proc_Step_Desc`,`Sch_Proc_Step_ID`,`Req_Proc_ID`,`Order_Status`,`Ref_Physician_Name`,`Patient_Age`,`Requesting_Physician`,`Institution_Name`,`Patient_Birth_Date`,`Patient_Weight`) values 
('$a_id','$dname','$pname','$pmrn','$psex','$tname','DESKTOP-890K9IG','$dname','$app_date','$slot','$tname','$a_id','$a_id','1','$ddname','','','SFMMKPJSH','$age1','000.000')";
mysqli_query($con,$ins_querypac);


$query = "UPDATE einves set rby='$user',rtime='$btime', rstatus='RECEIVED', status='RECEIVED',rdate='$rdate' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());





$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
mysqli_query($con,$update);

$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`dname`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`a_no`,`link`,`adate`,`aslot`,`location`,`emerid`,`adate1`,`price`) 
values ('$pname', '$pmrn','$pphone','$dname','NOT SEEN','$page','$psex','$ddname','$tname','$btime','$a_id','$link','$date1','$slot','A&E','$eidin','$adate1','$price')";
mysqli_query($con,$ins_query);



//$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";//
//mysqli_query($con,$update);
//$update1="update alltest set status='DONE' where `id`='$id'";
//mysqli_query($con,$update1);
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';
	
	header("Location: $url");
}
else if ($dname=='CT')
{
//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 


//$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`link`) values ('$name', '$pmrn','$pphone','$padd','$dname','$date1','$slot','NOT SEEN','$page','$psex','$dname1','$tname','$btime','$link')";
//mysqli_query($con,$ins_query);




$ins_querypac="insert into his_order (`Accession_Number`,`Modality`,`Patient_Name`,`Patient_ID`,`Patient_Sex`,`Req_Proc_Desc`,`Sch_Station_AE_Title`,`Sch_Station_Name`,
`Sch_Proc_Step_Start_Date`,`Sch_Proc_Step_Start_Time`,`Sch_Proc_Step_Desc`,`Sch_Proc_Step_ID`,`Req_Proc_ID`,`Order_Status`,`Ref_Physician_Name`,`Patient_Age`,`Requesting_Physician`,`Institution_Name`,`Patient_Birth_Date`,`Patient_Weight`) values 
('$a_id','$dname','$pname','$pmrn','$psex','$tname','NODENAME','$dname','$app_date','$slot','$tname','$a_id','$a_id','1','$ddname','','','SFMMKPJSH','$age1','000.000')";
mysqli_query($con,$ins_querypac);



//$query = "UPDATE einves set rby='$user',rtime='$btime', rstatus='RECEIVED', status='RECEIVED' where id='$id'"; 
//$result = mysqli_query($con,$query) or die ( mysqli_error());



$query = "UPDATE einves set rby='$user',rtime='$btime', rstatus='RECEIVED', status='RECEIVED',rdate='$rdate' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
mysqli_query($con,$update);

$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`dname`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`a_no`,`link`,`adate`,`aslot`,`location`,`emerid`,`adate1`,`price`) 
values ('$pname', '$pmrn','$pphone','$dname','NOT SEEN','$page','$psex','$ddname','$tname','$btime','$a_id','$link','$date1','$slot','A&E','$eidin','$adate1','$price')";
mysqli_query($con,$ins_query);





//$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";//
//mysqli_query($con,$update);
//$update1="update alltest set status='DONE' where `id`='$id'";
//mysqli_query($con,$update1);
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';
	
	header("Location: $url");
} 


else if ($dname=='US')
{
//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 


//$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`link`) values ('$name', '$pmrn','$pphone','$padd','$dname','$date1','$slot','NOT SEEN','$page','$psex','$dname1','$tname','$btime','$link')";
//mysqli_query($con,$ins_query);




$ins_querypac="insert into his_order (`Accession_Number`,`Modality`,`Patient_Name`,`Patient_ID`,`Patient_Sex`,`Req_Proc_Desc`,`Sch_Station_AE_Title`,`Sch_Station_Name`,
`Sch_Proc_Step_Start_Date`,`Sch_Proc_Step_Start_Time`,`Sch_Proc_Step_Desc`,`Sch_Proc_Step_ID`,`Req_Proc_ID`,`Order_Status`,`Ref_Physician_Name`,`Patient_Age`,`Requesting_Physician`,`Institution_Name`,`Patient_Birth_Date`,`Patient_Weight`) values 
('$a_id','$dname','$pname','$pmrn','$psex','$tname','LOGIQP9-000000','$dname','$app_date','$slot','$tname','$a_id','$a_id','1','$ddname','','','SFMMKPJSH','$age1','000.000')";
mysqli_query($con,$ins_querypac);


$query = "UPDATE einves set rby='$user',rtime='$btime', rstatus='RECEIVED', status='RECEIVED',rdate='$rdate' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());





$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
mysqli_query($con,$update);

$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`dname`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`a_no`,`link`,`adate`,`aslot`,`location`,`emerid`,`adate1`,`price`) 
values ('$pname', '$pmrn','$pphone','$dname','NOT SEEN','$page','$psex','$ddname','$tname','$btime','$a_id','$link','$date1','$slot','A&E','$eidin','$adate1','$price')";
mysqli_query($con,$ins_query);




//$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";//
//mysqli_query($con,$update);
//$update1="update alltest set status='DONE' where `id`='$id'";
//mysqli_query($con,$update1);
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';
	
	header("Location: $url");
} 




else if ($dname=='US1')
{
//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 


//$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`link`) values ('$name', '$pmrn','$pphone','$padd','$dname','$date1','$slot','NOT SEEN','$page','$psex','$dname1','$tname','$btime','$link')";
//mysqli_query($con,$ins_query);




$ins_querypac="insert into his_order (`Accession_Number`,`Modality`,`Patient_Name`,`Patient_ID`,`Patient_Sex`,`Req_Proc_Desc`,`Sch_Station_AE_Title`,`Sch_Station_Name`,
`Sch_Proc_Step_Start_Date`,`Sch_Proc_Step_Start_Time`,`Sch_Proc_Step_Desc`,`Sch_Proc_Step_ID`,`Req_Proc_ID`,`Order_Status`,`Ref_Physician_Name`,`Patient_Age`,`Requesting_Physician`,`Institution_Name`,`Patient_Birth_Date`,`Patient_Weight`) values 
('$a_id','US','$pname','$pmrn','$psex','$tname','USG','US','$app_date','$slot','$tname','$a_id','$a_id','1','$ddname','','','SFMMKPJSH','$age1','000.000')";
mysqli_query($con,$ins_querypac);





$query = "UPDATE einves set rby='$user',rtime='$btime', rstatus='RECEIVED', status='RECEIVED',rdate='$rdate' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());





$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
mysqli_query($con,$update);

$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`dname`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`a_no`,`link`,`adate`,`aslot`,`location`,`emerid`,`adate1`,`price`) 
values ('$pname', '$pmrn','$pphone','$dname','NOT SEEN','$page','$psex','$ddname','$tname','$btime','$a_id','$link','$date1','$slot','A&E','$eidin','$adate1','$price')";
mysqli_query($con,$ins_query);



//$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";//
//mysqli_query($con,$update);
//$update1="update alltest set status='DONE' where `id`='$id'";
//mysqli_query($con,$update1);
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';
	
	header("Location: $url");
} 

else if ($dname=='OPG')
{
//$ins_query1="insert into patient (`pname`,`pmrn`,`pphone`,`padd`,`page`,`psex`) values ('$name', '$pmrn','$pphone','$padd','$page','$psex')";
//mysqli_query($con,$ins_query1);
//if ($con->query($ins_query1) == TRUE) 


//$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`padd`,`dname`,`adate`,`aslot`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`link`) values ('$name', '$pmrn','$pphone','$padd','$dname','$date1','$slot','NOT SEEN','$page','$psex','$dname1','$tname','$btime','$link')";
//mysqli_query($con,$ins_query);




$ins_querypac="insert into his_order (`Accession_Number`,`Modality`,`Patient_Name`,`Patient_ID`,`Patient_Sex`,`Req_Proc_Desc`,`Sch_Station_AE_Title`,`Sch_Station_Name`,
`Sch_Proc_Step_Start_Date`,`Sch_Proc_Step_Start_Time`,`Sch_Proc_Step_Desc`,`Sch_Proc_Step_ID`,`Req_Proc_ID`,`Order_Status`,`Ref_Physician_Name`,`Patient_Age`,`Requesting_Physician`,`Institution_Name`,`Patient_Birth_Date`,`Patient_Weight`) values 
('$a_id','DX','$pname','$pmrn','$psex','$tname','DESKTOP-890K9IG','DX','$app_date','$slot','$tname','$a_id','$a_id','1','$ddname','','','SFMMKPJSH','$age1','000.000')";
mysqli_query($con,$ins_querypac);





$query = "UPDATE einves set rby='$user',rtime='$btime', rstatus='RECEIVED', status='RECEIVED',rdate='$rdate' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());





$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
mysqli_query($con,$update);

$ins_query="insert into radpapp (`pname`,`pmrn`,`pphone`,`dname`,`status`,`page`,`psex`,`dreffer`,`tname`,`btime`,`a_no`,`link`,`adate`,`aslot`,`location`,`emerid`,`adate1`,`price`) 
values ('$pname', '$pmrn','$pphone','$dname','NOT SEEN','$page','$psex','$ddname','$tname','$btime','$a_id','$link','$date1','$slot','A&E','$eidin','$adate1','$price')";
mysqli_query($con,$ins_query);



//$update="update rapp set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";//
//mysqli_query($con,$update);
//$update1="update alltest set status='DONE' where `id`='$id'";
//mysqli_query($con,$update1);
echo '<script language="javascript">';
    echo 'alert("Appointment Set Successfully"); ';
    echo '</script>';
	
	header("Location: $url");
} 
}


?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>SFMMKPJSH DHAKA</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">
<script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
<link rel="stylesheet" href="styles.css">
		<link href='jsnew/fjsnwonts' rel='stylesheet' type='text/css'>







 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /* Stephonce R. MOrris | 2014 */

html { box-sizing: border-box; }

*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito',sans-serif;
  color: #384047;
  background: #A085C6;
}

form {
  max-width: 280px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
  border: 1px solid #8265B0;
  box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}


input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
  width: 25%;
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
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 0px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #A085C6;
  /*#5fcf80*/
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

abbr[title] {
	border-bottom-width: 0;
}


@media screen and (min-width: 480px) {

  form {
    max-width: 750px;
  }

}
      </style>

    
  
  <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+20)
		});
	});
</script>
  <link rel="stylesheet" href="styles.css">
  
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='tesrad'><span>Home</span></a></li>
      <li><a href='radapp'><span>Appointment</span></a></li>
      
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='last'><a href='todayreport'><span>Today's Report</span></a></li>
		 <li class='has-sub'><a href='donereport'><span>Search Done Reports</span></a>
		 <li class='has-sub'><a href='allreport'><span>Datewise All Done Report </span></a>
            <li class='last'><a href='raddtsearch2'><span>Patients pending Report Search</span></a></li>
			<li class='last'><a href='radapp22'><span>Patients Appointment Report</span></a></li>
         </li>
		 
      </ul>
   </li>
	  <li class='last'><a href='radview1'><span>Pending Reports</span></a></li>
	  	  <li class='last'><a href='viewnewrad'><span>Search Pervious Patients</span></a></li>
		  <li class='last'><a href='rpapp22'><span>New Patients</span></a></li>
		  <li class='last'><a href='raddtsearch'><span>Patients pending request Search</span></a></li>
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
	

<form action="" method="post">

<!-- Form Title -->
		<h1>PATIENT'S APPOINTMENT </h1>

        <fieldset>

			<label for="tname"><strong>Investigation Name:</strong></label>
      <input name="tname" type="text" size="70" class="style1" value="<?php echo $row339['infusion'];?>" readonly/>

            <!-- Name Input -->
			<label for="name"><strong>Service Name :</strong></label>
			<select name="doc" value="" class="style1">
			        <option value=''>-Select SERVICE-</option>
					<option value='CR'>CR</option>
					<option value='CT'>CT</option>
					<option value='DX'>DX</option>
					<option value='DX1'>DX1</option>
					<option value='DX2'>DX2</option>
					<option value='MR'>MR</option>
					<option value='US'>US</option>
					<option value='US1'>US1</option>
					<option value='OPG'>OPG</option>
					<option value='MG'>Mammography</option>
				
			</select>
			        <input name="dname" class="style1" type="text"  size =50% value="<?php	  if(isset($_POST['load'])==1)
{ $doc1 = $_REQUEST['doc'];
echo $doc1;
}
?>" size="57" >
		<!-- E-mail Input -->
		
		<label for="mail"><strong>Appointment Date :</strong></label>
									<p>
									  <input type="text" class="style1" name="date" id="datepicker" placeholder="Select Date" size="15" value="<?php echo date('m/d/Y');?>">
									  <input name="date1" type="text" size=48% class="style1" value="<?php if(isset($_POST['load'])==1)
{ $date1 = $_REQUEST['date'];
echo $date1;
}
?>" size ="57" >
									  
                                      <!-- Password Input -->
									  <!-- Age Dropdown -->
                                      <input name="load" class="style1" type="submit" id="load" value="Check Available Time">
	    </p>

									<label for="age"><strong>Available Slot :</strong></label>
			
			<select name="slot" class="style1"> <option value=''>--Select--</option>
	   <?php 
	   $doc1= $_REQUEST['doc'];
			$sql = "select * from `rapp` where `dname`='$doc1' and `status`='AVAILABLE'and `ddate`='$date1'order by id asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dslot."'>".$row->dslot."</option>";
				}
			}
			?>
      </select>
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" type="text" size="70" class="style1" value="<?php echo $row39['pname'];?>" readonly>
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="70" class="style1" value="<?php echo $row39['padd'];?>"readonly>

	  <label for="age"><strong>Patient's Details :</strong></label>
      <input name="psex" type="text" size="70" class="style1" value="<?php echo $row39['psex'];?>"readonly>
	  
      <input name="pmrn" type="text" size="15"Placeholder="Patient's MRN" class="style1" value="<?php echo $row39['pmrn'];?>" readonly>
      <input name="pphone" type="text" size="13" Placeholder="Patient's Phone NO" class="style1"value="<?php  echo $row39['pphone'];?>"readonly>	  
	  <input name="page" type="text" size="5"Placeholder="Patient's AGE" class="style1" value="<?php echo $diff1;?>"readonly>
      



  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
