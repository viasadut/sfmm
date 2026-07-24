<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','store','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION['sess_username'];
$id=$_REQUEST['id'];


//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "phar_approve_new.php";
$df=date('Y-m-d');


$query40 = "SELECT * FROM medicineedit where id='$id'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);
$cprice=$row40['cprice'];
$uprice=$row40['uprice'];
$uprice1=$row40['uprice1'];
$iid=$row40['mid'];
$brand1=$row40['brand1'];
$brand2=$row40['brand2'];
$mname=$row40['mname'];
$code=$row40['code'];
$pre=$row40['pre'];
$pcat=$row40['pcat'];
$code=$row40['code'];
$frequency=$row40['frequency'];
$frelation=$row40['frelation'];
$pcategory=$row40['pcategory'];
$contrain=$row40['contrain'];
$meffect=$row40['meffect'];
$duration=$row40['duration'];
$a_date=date('Y-m-d');

$query43 = "SELECT * FROM medicine where code='$code'"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());

// Print out result
$row43 = mysqli_fetch_array($result43);
$code_master=$row43['code'];

$gg_name=$row43['mname'];

if($user=='1601')
{
$query = "UPDATE medicineedit set status='WAITING FOR MD APPROVAL',cfotime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); }


else if($user=='md')
{
$query = "UPDATE medicineedit set status='WAITING FOR CEO APPROVAL',mdtime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); }


else if($user=='ceo')
{
$query = "UPDATE medicineedit set status='WAITING FOR IT ENTRY',ceotime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); }




else if($user=='338')
{
$query = "UPDATE medicineedit set status='WAITING FOR CFO APPROVAL',ftime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); }



else if($user=='1274' and $code!=$code_master)
{
	
	
$query = "UPDATE medicineedit set status='Updated',ittime='$dtime',it='$user'  where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


//$query1 = "UPDATE medicine set uprice='$uprice',uprice1='$uprice1',cprice='$cprice',brand1='$brand1',brand2='$brand2',code='$code' where id='$iid'"; 
//$result1 = mysqli_query($con,$query1) or die ( mysqli_error());



$query2 = "insert into medicine(`mname`,`brand1`,`brand2`,`code`,`uprice`,`uprice1`,`cprice`,`status`,`pre`,`pcat`,`frequency`,`frelation`,`pcategory`,`contrain`,`meffect`,`duration`,`a_date`)
values('$mname','$brand1','$brand2','$code','$uprice','$uprice1','$cprice','Active','$pre','$pcat','$frequency','$frelation','$pcategory','$contrain','$meffect','$duration','$a_date') "; 
$result2 = mysqli_query($con,$query2) or die ( mysqli_error());


header("Location: $url"); }



else if($user=='1274' and $code==$code_master)
{
	
	
$query = "UPDATE medicineedit set status='Updated',ittime='$dtime',it='$user'  where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


//$query1 = "UPDATE medicine set uprice='$uprice',uprice1='$uprice1',cprice='$cprice',brand1='$brand1',brand2='$brand2',code='$code' where id='$iid'"; 
//$result1 = mysqli_query($con,$query1) or die ( mysqli_error());




$query2 = "update medicine set `mname`='$mname',`brand1`='$brand1',`brand2`='$brand2',`uprice`='$uprice',`uprice1`='$uprice1',`cprice`='$cprice',`status`='Active',`pre`='$pre',
`pcat`='$pcat',`frequency`='$frequency',`frelation`='$frelation',`pcategory`='$pcategory',`contrain`='$contrain',`meffect`='$meffect',`duration`='$duration',`a_date`='$a_date' where code='$code'"; 
$result2 = mysqli_query($con,$query2) or die ( mysqli_error());

header("Location: $url"); }



/*else if($user=='322' and $lprice1!='')
{
	
	
$query = "UPDATE storenew set estatus='Active',ittime='$dtime',it='$user',ittime1='$df',price='$lprice1',uprice='' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); }
*/



?>