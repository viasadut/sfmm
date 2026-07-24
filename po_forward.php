<?php 
   session_start();
    require('db1.php');
	
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_SESSION['sess_username'];
$id=$_REQUEST['id'];
$va=$_REQUEST['va'];


$encryption=$_REQUEST['ono'];
    $options = 0;
    $ciphering = "AES-192-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "kpj";
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    $ono = $decryption;

//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "po_prepare1_purchase.php?ono=$encryption";
$df=date('Y-m-d H:i:s');







if($user=='p01'||$user=='322'||$user=='345' || $user=='1603' || $user=='45')
{
$query = "UPDATE po_table set status='FORWARD FOR APPROVAL',f_time='$df',f_by='$user', total_amount='$va' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); 
}

if($user=='md')
{
$query = "UPDATE storenew set estatus='WAITING FOR CEO APPROVAL',cfotime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); }


else if($user=='ceo')
{
$query = "UPDATE storenew set estatus='WAITING FOR IT ENTRY',ceotime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); }




else if($user=='338')
{
$query = "UPDATE storenew set estatus='WAITING FOR CFO APPROVAL',financetime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); }



else if($user=='322')
{
	
	
$query = "UPDATE storenew set estatus='Active',ittime='$dtime',it='$user',ittime1='$df' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); }



/*else if($user=='322' and $lprice1!='')
{
	
	
$query = "UPDATE storenew set estatus='Active',ittime='$dtime',it='$user',ittime1='$df',price='$lprice1',uprice='' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); }
*/



?>