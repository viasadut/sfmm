
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
      header('Location: login2?err=2');
    }
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
$user=$_SESSION['sess_username'];
$ortime = date('d/m/Y H:i:s');

$url = "mmaapprove.php";



if($user=='md'){


$ins_query1="update privilege set status='Approved',atime='$ortime',aby='$user' where id='$id';";
mysqli_query($con,$ins_query1) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Successfully Approved  !!"); ';
    echo '</script>';

header("Refresh: .1; URL=$url");
}


?>