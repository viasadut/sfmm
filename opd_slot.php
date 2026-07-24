
<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','call','bill','mng','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


 <?php 
$g=$_REQUEST['q'];
$dname2=$_REQUEST['dname2'];
$dd=date('Y-m-d');




$date22=date('Y-m-d',strtotime($g));		
if($dd==$date22){
		$ct=date('H:i:s');
			$sql = "select * from opd_appoint1 where dslot>='$ct' and dname='$dname2' and date1='$date22' and status='AVAILABLE' order by dslot asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "
					
					<option value='".$row->dslot."'>".$row->dslot."</option>";
				}
			}
}

else if($dd!=$date22 and $date22>$dd){
		$ct=date('H:i:s');
			$sql = "select * from opd_appoint1 where dname='$dname2' and date1='$date22' and status='AVAILABLE' order by dslot asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dslot."'>".$row->dslot."</option>";
				}
			}
}
			?>