<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','staff','mng','ot','endo','imo','mofficer','nurse','emergency','moopd','call','bill','billin','diet','physio','mrd','adminmng','lab')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php


//session_start();
require('db1.php');

$id=$_REQUEST['id'];
$name=$_REQUEST['name'];


if(isset($_POST) && !empty($_POST['id']) && !empty($_POST['name'])){


/*$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel9=mysqli_query($db,"SELECT * FROM image_gallery WHERE id='$id'");
$result9 = mysqli_fetch_assoc($sel9);
$img=["image"];*/


$test ="incidnetpic/$name";

//$test= src=uploads/$name;
unlink($test);



		$sql = "update incident1 set image='' WHERE id = ".$_POST['id'];
		mysqli_query($con,$sql) or die(mysql_error());


		$_SESSION['success'] = 'Image Deleted successfully.';
		header("Location: incident_report?id=$id");
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: http://localhost:8000");
}


?>