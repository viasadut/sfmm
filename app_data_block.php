
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





$date11=date('Y-m-d',strtotime($g));
$ct=date('H:i:s');
				
				$tday=date('Y-m-d');
				
				if($date11==$tday){
	
					
			$sql = "select * from opd_appoint1 where dslot>='$ct' and date1='$date11' and dname='$dname2' order by dslot";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
			

		if($row->status=='AVAILABLE'){
					echo "<option style='color:green' value='".$row->dslot."'>".$row->dslot.'-'.$row->status."</option>";
					}
					
					else if($row->status=='NOT AVAILABLE'){
					echo "<option style='color:lightred' value='".$row->dslot."'>".$row->dslot.'-'.$row->status."</option>";
					}
					else if($row->status=='Booked'){
					echo "<option style='color:red' value='".$row->dslot."'>".$row->dslot.'-'.$row->status."</option>";
					}
						
						
						
				}
			}
			
				}
			
				else if($date11!=$tday){
			$sql = "select * from opd_appoint1 where dname='$dname2' and date1='$date11' order by dslot";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
			
			
//echo "<option value='".$row->dslot."'>".$row->dslot.'-'.$row1->status."</option>";
			
					
					
					
					if($row->status=='AVAILABLE'){
					echo "<option style='color:green' value='".$row->dslot."'>".$row->dslot.'-'.$row->status."</option>";
					}
					
					else if($row->status=='NOT AVAILABLE'){
					echo "<option style='color:lightred' value='".$row->dslot."'>".$row->dslot.'-'.$row->status."</option>";
					}
					else if($row->status=='Booked'){
					echo "<option style='color:red' value='".$row->dslot."'>".$row->dslot.'-'.$row->status."</option>";
					}
						
						
						
				}
			}
			
				}
			
			
			  
			
			  ?>