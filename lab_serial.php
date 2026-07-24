<?php 
    require('db1.php');
/*$sel7="Select COUNT(id) from noti where user in ('all','$user') and sa='0'";

$resu7 = mysqli_query($con,$sel7);
$rw7 = mysqli_fetch_assoc($resu7);
*/

/*$_SESSION['id'] = $rw7['COUNT(id)'];
echo $pid = $_SESSION['id'];

*/

    session_start();

	$role = $_SESSION['sess_userrole'];
	
    $objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");

$cdate=date('Y-m-d');


    $strSQL1 = "select DISTINCT MAX(s_no) from alltest where rdate='$cdate'";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);
			$obj = mysqli_fetch_array($objQuery1);
			$mno=$obj['MAX(s_no)']+1;
			$mno1=$obj['MAX(s_no)'];

            /*$strSQL5 = "select COUNT(s_no) from alltest where rdate='$cdate' and s_no=$mno";
			$objQuery5 = mysqli_query($objConnect,$strSQL5);
			$obj5 = mysqli_fetch_array($objQuery5);
			$count_result=$obj5['COUNT(s_no)'];

            
			*/

            $new_bar1=date('ymd').'000'.$mno;
			$new_bar2=date('ymd').'00'.$mno;
			$new_bar3=date('ymd').'0'.$mno;
			$new_bar4=date('ymd').$mno;

            $strSQL5 = "select COUNT(barcode1) from alltest where barcode1 in ('$new_bar1','$new_bar2','$new_bar3','$new_bar4')";
			$objQuery5 = mysqli_query($objConnect,$strSQL5);
			$obj5 = mysqli_fetch_array($objQuery5);
			$count_result=$obj5['COUNT(barcode1)'];
			



	?>

<!DOCTYPE html>

<body>
    
<input type="hidden" name='serial' value="<?php echo $mno;?>"> 



</body>


</html>