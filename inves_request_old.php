<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('lab','doctor','mng')"; 
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
//include("auth.php"); 
require('db1.php');

$user=$_SESSION['sess_username'];

$user1='root';
$pass='Godiloveu16';
$db= new PDO('mysql:host=localhost; dbname=sfmmkpjnew', $user1, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


$mname = $_REQUEST['mname'];
$bname = $_REQUEST['bname'];
$cname=$_REQUEST['cname'];
$form=$_REQUEST['form'];
$form1=$_REQUEST['form1'];
$cprice=$_REQUEST['cprice'];
$cat=$_REQUEST['cat'];
$result=$_REQUEST['result'];
$reference=$_REQUEST['reference'];
$unit=$_REQUEST['unit'];
//$adate=$_REQUEST['adate'];
$indication=$_REQUEST['indication'];
$specimen=$_REQUEST['specimen'];
$amount=$_REQUEST['amount'];
$ccode=$_REQUEST['ccode'];
$ref2=$_REQUEST['ref2'];
$remarks=$_REQUEST['remarks'];
$instruction=$_REQUEST['instruction'];
$ins1=$_REQUEST['ins1'];
$tcentre=$_REQUEST['tcentre'];
$interpretation=$_REQUEST['interpretation'];
$remarks1=$_REQUEST['remarks1'];
$mar=$_REQUEST['mar'];
$adate= date('d/m/Y H:i:s');
$com_remarks=$_REQUEST['com_remarks'];
$com_price=$_REQUEST['com_price'];

$adate1= date('m/d/Y');
$ittime1= date('Y-m-d');

$bill='338';
$bf='Waiting For Finance Fowrading';
$ceo='ceo';
$cfo='cfo';
$it='322';
$md='md';
$blue='2.7 ml';
$red='6 ml';
$yellow='5 ml';
$green='3 ml';
$purple='4 ml';
$gray='2 ml';
$bcb='10 ml';

if($ccode=='Blue')
{

  try {
    $db->beginTransaction();
  

  $sh = $db->prepare("insert into radio (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
  ,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
  $blue,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);

 
  $sh = $db->prepare("insert into radio1 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
  ,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
  $blue,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);

  $sh = $db->prepare("insert into radio2 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
  ,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
  $blue,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);


  $db->commit();

  echo '<script language="javascript">';
  echo 'alert("Update Successful"); ';
  echo '</script>';



  }

  catch ( Exception $e ) {
    $db->rollBack();
  }
  

/*$ins_query="insert into radio (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'2.7 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query) or die(mysql_error());
	

$ins_query1="insert into radio1 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'2.7 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="insert into radio2 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'2.7 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query2) or die(mysql_error());
*/
	


   /* echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
*/

}

else if($ccode=='Red')
{
/*$ins_query="insert into radio (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'6 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query) or die(mysql_error());
	

$ins_query1="insert into radio1 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'6 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="insert into radio2 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'6 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query2) or die(mysql_error());
*/

try {
  $db->beginTransaction();


$sh = $db->prepare("insert into radio (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$red,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);


$sh = $db->prepare("insert into radio1 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$red,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);

$sh = $db->prepare("insert into radio2 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$red,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);


$db->commit();

echo '<script language="javascript">';
echo 'alert("Update Successful"); ';
echo '</script>';



}

catch ( Exception $e ) {
  $db->rollBack();
}

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';


}

else if($ccode=='Yellow')
{

  /*
$ins_query="insert into radio (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'5 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query) or die(mysql_error());
	

$ins_query1="insert into radio1 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'5 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="insert into radio2 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'5 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query2) or die(mysql_error());
*/

try {
  $db->beginTransaction();


$sh = $db->prepare("insert into radio (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$yellow,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);


$sh = $db->prepare("insert into radio1 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$yellow,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);

$sh = $db->prepare("insert into radio2 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$yellow,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);


$db->commit();

echo '<script language="javascript">';
echo 'alert("Update Successful"); ';
echo '</script>';



}

catch ( Exception $e ) {
  $db->rollBack();
}


}

else if($ccode=='Green')
{

/*  $ins_query="insert into radio (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'3 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query) or die(mysql_error());
	

$ins_query1="insert into radio1 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'3 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="insert into radio2 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'3 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar')";
mysqli_query($con,$ins_query2) or die(mysql_error());

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';*/

    try {
      $db->beginTransaction();
    
    
    $sh = $db->prepare("insert into radio (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
    ,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
    $green,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);
    
    
    $sh = $db->prepare("insert into radio1 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
    ,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
    $green,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);
    
    $sh = $db->prepare("insert into radio2 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
    ,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
    $green,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);
    
    
    $db->commit();
    
    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
    
    
    
    }
    
    catch ( Exception $e ) {
      $db->rollBack();
    }
    

}

else if($ccode=='Light Green')
{
/*$ins_query="insert into radio (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'3 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar')";
mysqli_query($con,$ins_query) or die(mysql_error());
	

$ins_query1="insert into radio1 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'3 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="insert into radio2 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'3 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query2) or die(mysql_error());

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
*/

try {
  $db->beginTransaction();


$sh = $db->prepare("insert into radio (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$green,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);


$sh = $db->prepare("insert into radio1 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$green,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);

$sh = $db->prepare("insert into radio2 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$green,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);


$db->commit();

echo '<script language="javascript">';
echo 'alert("Update Successful"); ';
echo '</script>';



}

catch ( Exception $e ) {
  $db->rollBack();
}

}


else if($ccode=='Purple')
{
  /*
$ins_query="insert into radio (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'4 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query) or die(mysql_error());
	

$ins_query1="insert into radio1 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'4 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="insert into radio2 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'4 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query2) or die(mysql_error());

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
*/

try {
  $db->beginTransaction();


$sh = $db->prepare("insert into radio (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$purple,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);


$sh = $db->prepare("insert into radio1 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$purple,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);

$sh = $db->prepare("insert into radio2 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$purple,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);


$db->commit();

echo '<script language="javascript">';
echo 'alert("Update Successful"); ';
echo '</script>';



}

catch ( Exception $e ) {
  $db->rollBack();
}

}

else if($ccode=='Gray')
{
  /*
$ins_query="insert into radio (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'2 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query) or die(mysql_error());
	

$ins_query1="insert into radio1 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'2 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="insert into radio2 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'2 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query2) or die(mysql_error());

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
    */
    try {
      $db->beginTransaction();
    
    
    $sh = $db->prepare("insert into radio (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
    ,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
    $gray,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);
    
    
    $sh = $db->prepare("insert into radio1 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
    ,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
    $gray,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);
    
    $sh = $db->prepare("insert into radio2 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
    ,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
    $gray,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);
    
    
    $db->commit();
    
    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
    
    
    
    }
    
    catch ( Exception $e ) {
      $db->rollBack();
    }
    

}


else if($ccode=='Blood Culture Bottle')
{
/*$ins_query="insert into radio (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'10 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query) or die(mysql_error());
	

$ins_query1="insert into radio1 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'10 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="insert into radio2 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'10 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query2) or die(mysql_error());

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
*/
try {
  $db->beginTransaction();


$sh = $db->prepare("insert into radio (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$bcb,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);


$sh = $db->prepare("insert into radio1 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$bcb,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);

$sh = $db->prepare("insert into radio2 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$bcb,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);


$db->commit();

echo '<script language="javascript">';
echo 'alert("Update Successful"); ';
echo '</script>';



}

catch ( Exception $e ) {
  $db->rollBack();
}

}


else if($ccode=='Plastic Urine Container')
{
  /*
$ins_query="insert into radio (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'10 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query) or die(mysql_error());
	

$ins_query1="insert into radio1 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'10 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$ins_query2="insert into radio2 (`iname`,`type`,`subtype`,`price`,`code`,`adtime`,`adby`,`result`,`reference`,`unit`,`ref2`
,`indication`,`specimen`,`amount`,`ccode`,`remarks`,`instruction`,`ins1`,`tcentre`,`interpretation`,`fby`,`status`,`ceo`,`cfo`,`itby`,`md`,`price1`,`cprice`,`ittime1`,`remarks1`,`mar`,`com_remarks`,`com_price`) values 
( '$mname','$bname','$cname','$form','$cat','$adate','$user','$result','$reference','$unit','$ref2','$indication','$specimen',
'10 ml','$ccode','$remarks','$instruction','$ins1','$tcentre','$interpretation','338','Waiting For Finance Fowrading','ceo','cfo','322','md','$form1','$cprice','$ittime1','$remarks1','$mar','$com_remarks','$com_price')";
mysqli_query($con,$ins_query2) or die(mysql_error());

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
*/
try {
  $db->beginTransaction();


$sh = $db->prepare("insert into radio (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$bcb,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);


$sh = $db->prepare("insert into radio1 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$bcb,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);

$sh = $db->prepare("insert into radio2 (iname,type,subtype,price,code,adtime,adby,result,reference,unit,ref2
,indication,specimen,amount,ccode,remarks,instruction,ins1,tcentre,interpretation,fby,status,ceo,cfo,itby,md,price1,cprice,ittime1,remarks1,mar,com_remarks,com_price) VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$mname,$bname,$cname,$form,$cat,$adate,$user,$result,$reference,$unit,$ref2,$indication,$specimen,
$bcb,$ccode,$remarks,$instruction,$ins1,$tcentre,$interpretation,$bill,$bf,$ceo,$cfo,$it,$md,$form1,$cprice,$ittime1,$remarks1,$mar,$com_remarks,$com_price]);


$db->commit();

echo '<script language="javascript">';
echo 'alert("Update Successful"); ';
echo '</script>';



}

catch ( Exception $e ) {
  $db->rollBack();
}

}



else {
	
	
	    echo '<script language="javascript">';
    echo 'alert("Update Not Successful"); ';
    echo '</script>';

}

 

}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
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
  max-width: 300px;
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
textarea {
  padding: 2px;
  height: 100px;
  border-radius: 2px;
  width: 100%;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 16px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;

  width: 100%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 3px;
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

    <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
  
  
  
  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$("#loding1").hide();
	$("#loding2").hide();
	$(".country").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".state").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".state").html(html);
			} 
		});
	});
	
	
	$(".state").change(function()
	{
		$("#loding2").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding2").hide();
				$(".city").html(html);
			} 
		});
	});
	
});
</script>

</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='edischarge3'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='esearch'><span>Patient Search By MRN</span></a>         </li>
         <li class='has-sub'><a href='eadm'><span>New Patient</span></a>         </li>
      </ul>
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>ADD INVESTIGATION</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  
	  <label for="age"><strong>Investigation Name :</strong></label>
      <input name="mname" type="text" size="70" value=""required>
 	  <label for="age"><strong>Type :</strong></label>
      
	  <input name="bname" type="text" size="70"  value="LAB"readonly>
	  
	  
	  
	  
	  
	  <label for="age"><strong>Subtype :</strong></label>
	  
	  <select name="cname" required>
        
						<option value=''>-Select-</option>
							<option value='VIROLOGY'>VIROLOGY</option>
						
						<?php 
			$sql = "Select DISTINCT subtype  from radio where type='lab';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->subtype."'>".$row->subtype."</option>";
				}
			}
			?>
						
				
</select>
	  
	  
      <label for="age"><strong>Cost Price :</strong></label>
      <input name="cprice"id="cprice" type="text" size="70" value=""required>
	  
	  <label for="age"><strong>Out Patient Price :</strong></label>
      <input name="form" id="form" type="text" size="70" value=""required>
	  
	  <label for="age"><strong>In Patient Price :</strong></label>
      <input name="form1" type="text" size="70" value=""required>
	  
	  <label for="age"><strong>Margin(%):</strong></label>
      <input name="mar" id="mar" type="text" size="70" value=""required>
	  
	  <script>
  $("input").on("change", function() {
   // var ret = parseInt($("#field1").val()) - parseInt($("#field2").val())
	var ret1 = parseInt($("#cprice").val()) 
	var ret2 = parseInt($("#form").val())
	var ret3=ret2-ret1
	var ret4=ret3 * 100
	var ret5=ret4 / ret1
	
    $("#mar").val(ret5);
  })
</script>
	  
	  <label for="age"><strong>Competitor Price :</strong></label>
      <input name="com_price" type="text" size="70" value=""required>
	  
	  <label for="age"><strong>Code :</strong></label>
      <input name="cat" type="text" size="70"  value=""required>
	  
	  <label for="age"><strong>Result Format :</strong></label>
      <textarea rows="4" cols="50" name="result" id="result" ></textarea>
	  
	  <label for="age"><strong>Unit :</strong></label>
      <textarea rows="4" cols="50" name="unit" id="unit"></textarea>
	  
	  <label for="age"><strong>Reference(From) :</strong></label>
      <textarea rows="4" cols="50" name="reference" id="reference" ></textarea>

	  <label for="age"><strong>Reference(To) :</strong></label>
      <textarea rows="4" cols="50" name="ref2" id="reference" ></textarea>
      
	  
	  <label for="age"><strong>Indication Of The Test :</strong></label>
      <textarea rows="4" cols="50" name="indication" id="unit"></textarea>
	  
	  <label for="age"><strong>Specimen :</strong></label>
      <textarea rows="4" cols="50" name="specimen" id="unit"></textarea>
	  
	  
	  <label for="age"><strong>Color Code of the Vaccuum Tube :</strong></label>
      
	  <select name="ccode" >
        
						
						<option value='Blue'>Blue</option>
						<option value='Red'>Red</option>
						<option value='Yellow'>Yellow</option>
						<option value='Green'>Green</option>
						<option value='Light Green'>Light Green</option>
						<option value='Purple'>Purple</option>
						<option value='Gray'>Gray</option>
						<option value='Plastic Urine Container'>Plastic Urine Container</option>
						<option value='Blood Culture Bottle'>Blood Culture Bottle</option>
		
	


					
</select>
	  
	  
	  <label for="age"><strong>Amount :</strong></label>
      <textarea rows="4" cols="50" name="amount" id="unit" readonly></textarea>
	  <label for="age"><strong>Reference Range which will be shown in report :</strong></label>
      <textarea rows="4" cols="50" name="remarks" id="unit"></textarea>
	  <label for="age"><strong>instructions to patient before test :</strong></label>
      <textarea rows="4" cols="50" name="instruction" id="unit"></textarea>


<label for="age"><strong>instruction to Phlebotomist or Nurse :</strong></label>
      <textarea rows="4" cols="50" name="ins1" id="unit"></textarea>	  
	  
	<label for="age"><strong>Test Centre:</strong></label>
      
	  <select name="tcentre" >
        
						<option value='<?php echo $row1["tcentre"];?>'></option>
						<option value='Sfmmkpjsh Lab'>Sfmmkpjsh Lab</option>
						<option value='DMFR'>DMFR</option>
						<option value='ICDDRB'>ICDDRB</option>
						<option value='IPH'>IPH</option>
						
						<option value='IEDCR'>IEDCR</option>
						<option value='NILMRC'>NILMRC</option>
						<option value='Thyrocare'>Thyrocare</option>
		
	


					
</select>

<label for="age"><strong>Interpretation:</strong></label>
      <textarea rows="4" cols="50" name="interpretation" id="unit"></textarea>	  

	  
	  
	  <label for="age"><strong>Remarks:</strong></label>
      <textarea rows="10" name="remarks" id="unit"></textarea>	  

	  
	  	  <label for="age"><strong>Price Related Remarks:</strong></label>
      <textarea rows="10" name="com_remarks" id="unit"></textarea>	  

  </fieldset>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">Insert</button></td>
</table>

</form>
  


</body>

</html>
