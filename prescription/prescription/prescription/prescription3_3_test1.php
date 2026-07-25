<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','moopd')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php

require('db1.php');

$user=$_SESSION['sess_username'];
$date4=date('Y-m-d');
$uu=$user.'.jpg';
$rr='tt';
$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$tt=$_SERVER['HTTP_HOST']	;

//$id='304066';
//$pmrn='123456';



$query = "SELECT * from pappnew where ID='$id'"; 
$resultz = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($resultz);
$pn= $row['pname'];
$pm= $row['pmrn'];
$pg= $row['page'];
$pp= $row['pphone'];  
$pd= $row['dname'];
$pdate= $row['adate'];
$pa= $row['padd'];
$ps= $row['psex'];
$ph= $row['height'];
$pw= $row['weight'];
$pt= $row['temp'];
$pty= $row['yage'];
//$pa= $row['padd'];

$dd =$row['dname'];

$pbmi=("$pw" / "$ph"/"$ph") *10000;

  
$query5 = "SELECT * from pmedi where pmrn='$pmrn' and dname='$pd' order by id desc limit 1"; 
$result5 = mysqli_query($con, $query5) or die ( mysqli_error());
$row5 = mysqli_fetch_assoc($result5);
 $oeid=$row5["eid"];
//$oeid=1;
//echo $oeid;


$sel="SELECT * FROM presnew WHERE `pmrn`='$pmrn' and dname='$pd' and date='$pdate';";
$result = mysqli_query($con,$sel);  

$queryp = "SELECT * from patient where `pmrn`='$pmrn' "; 
$resultp = mysqli_query($con, $queryp) or die ( mysqli_error());
$rowp = mysqli_fetch_assoc($resultp);
$pic=$rowp['pic'];
  ?>


<?php
 
require('db1.php');
$stime=date("h:i:sa");
if(isset($_POST['Submit']))
{

//$dname =$_REQUEST['dname'];
//$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
//$pphone=$_REQUEST['pphone'];
//$pg=$_REQUEST['page'];
//$xl=$_REQUEST['xl'];
//$lx= implode(",",$xl);

//$x2=$_REQUEST['x2'];
//$lx2= implode(",",$x2);


$other=$_REQUEST['other'];
$other_b=$_REQUEST['other_b'];
$diagnosis=$_REQUEST['diagnosis'];
$cdetails=$_REQUEST['cdetails'];

$pdiet=$_REQUEST['pdiet'];
/*$page=$_REQUEST['page'];

$ref1=$_REQUEST['ref1'];
$ref2=$_REQUEST['ref2'];
$ref3=$_REQUEST['ref3'];
$ref4=$_REQUEST['ref4'];
$ref5=$_REQUEST['ref5'];
$ref6=$_REQUEST['ref6'];
$reffer=$_REQUEST['reffer'];
$reffer2=$_REQUEST['reffer2'];
$reffer3=$_REQUEST['reffer3'];
$reffer4=$_REQUEST['reffer4'];
$reffer5=$_REQUEST['reffer5'];
$reffer6=$_REQUEST['reffer6'];
$psex=$_REQUEST['psex'];
$pheight=$_REQUEST['pheight'];
$pweight=$_REQUEST['pweight'];
$ptemp=$_REQUEST['ptemp'];
//$padm=$_REQUEST['padm'];
$pbp=$_REQUEST['pbp'];
$pbmi=$_REQUEST['pbmi'];
$phyper=$_REQUEST['phyper'];
$ppluse=$_REQUEST['ppluse'];
$pheart=$_REQUEST['pheart'];
$pdm=$_REQUEST['pdm'];
$pkid=$_REQUEST['pkid'];
$ptb=$_REQUEST['ptb'];
$pasthma =$_REQUEST['pasthma'];
$pthyroid =$_REQUEST['pthyroid'];
$pneuro =$_REQUEST['pneuro'];
$psurgery =$_REQUEST['psurgery'];
$pperiod =$_REQUEST['pperiod'];
$plmp =$_REQUEST['plmp'];
$pnochild =$_REQUEST['pnochild'];
$plchild =$_REQUEST['plchild'];
//$pmenopause =$_REQUEST['pmanopause'];
$palcohol =$_REQUEST['palcohol'];
$psmoking =$_REQUEST['psmoking'];
$pfamily =$_REQUEST['pfamily'];
$pasthma =$_REQUEST['pasthma'];
$pdrug =$_REQUEST['pdrug'];
$pmstatus =$_REQUEST['pmstatus'];
$poccupation =$_REQUEST['poccupation'];
$spo2 =$_REQUEST['spo2'];
$rr =$_REQUEST['rr'];
$pperiod1=$_REQUEST['pperiod1'];
$plmp1=$_REQUEST['plmp1'];
$pnochild1=$_REQUEST['pnochild1'];
$plchild1=$_REQUEST['plchild1'];
//$pmanopause1=$_REQUEST['pmanopause1'];
$psurgery1=$_REQUEST['psurgery1'];
$palcohol1=$_REQUEST['palcohol1'];
$psmoking1=$_REQUEST['psmoking1'];
$pfamily1=$_REQUEST['pfamily1'];
$pdrug1=$_REQUEST['pdrug1'];
$phyper1=$_REQUEST['phyper1'];
$pheart1=$_REQUEST['pheart1'];
$pdm1=$_REQUEST['pdm1'];
$pkid1=$_REQUEST['pkid1'];
$ptb1=$_REQUEST['ptb1'];
$pasthma1=$_REQUEST['pasthma1'];
$pthyroid1=$_REQUEST['pthyroid1'];
$pneuro1=$_REQUEST['pneuro1'];
$liver=$_REQUEST['liver'];
$liver1=$_REQUEST['liver1'];
$para=$_REQUEST['para'];
$para1=$_REQUEST['para1'];
$gravida=$_REQUEST['gravida'];
$gravida1=$_REQUEST['gravida1'];
$clist=$_REQUEST['clist'];
$clist1=$_REQUEST['clist1'];
$
*/
$fdate1=$_REQUEST['fdate'];
$fdate=date('Y-m-d',strtotime($fdate1));


$query43 = "SELECT COUNT(pmrn) FROM presnew where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;



if($res=mysqli_num_rows($result)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Today you have already issued prescription for the Patient... Kindly go back and edit the prescription if need to modify"); ';
    echo '</script>';
    }

	
	
	
	else{
$ins_query="insert into presnew (`dname`,`pname`,`pmrn`,`pphone`,`cdetails`,`diagnosis`,`other`,`other_b`,`date`,`page`,`pdiet`,`psex`,`eid`,`dstatus`,`date1`,`fdate`) values 
('$dd', '$pn','$pm','$pp','$cdetails','$diagnosis','$other','$other_b','$pdate','$pg','$pdiet','$ps','$count1','SEEN','$date4','$fdate')";
mysqli_query($con,$ins_query) or die("Please avoid Apostrophe in your prescription");

//$gg= $_REQUEST['pname'];
$update33="update pappnew set `eid`='$count1', `status`='SEEN',`stime`='$stime',`adate1`='$date4',pbmi='$pbmi' where `ID`='$id'";
mysqli_query($con,$update33) or die("Problem in Update pappnew");







$url = "historynewview?pmrn=$pm&eid=$count1&date=$pdate&dname=$pd" ;
header("Location:$url");
}
}
?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

?>




<?php //include '../template/header.php';?>

    
 <!DOCTYPE html>
<html lang="en" >

<head>   
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PMS | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="../template/plugins/fontawesome-free/css/fonts.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="../template/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="../template/plugins/tempusdominus-bootstrap-4/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="../template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="../template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="../template/plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../template/dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="../template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="../template/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="../template/plugins/summernote/summernote-bs4.min.css">
<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script>


  
  

    
    

	
	
	
	
	



   
   

	<script language="Javascript" src="jquery-1.3.2.min.js" type="text/javascript"></script>
	<script language="Javascript" src="htmlbox.min.js" type="text/javascript"></script>	
   
   		
		

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="viewnew" class="nav-link">Home</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
        </nav>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="viewnew" class="brand-link">
        <img src="../template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PMS</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    
					<img src="doctor/<?php echo $uu;?>" class="img elevation-2" alt="User Image"  style="height:80px; width:70px;">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $dd;?></a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        </aside>
        <div class="content-wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
        <h1>Prescription</h1>
    </div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Prescription</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="viewnew.php">Home</a></li>
                        <li class="breadcrumb-item active">Prescription</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- patient info -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
            
                <div class="col-md-7">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Patient Information</h3>
                            <i class="fa fa-user float-right fa-lg"></i>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Name:</b><strong class="text-danger h5 font-weight-bold"><?php echo $row['pname'];?></strong> <br>
                                    <b>PMRN:</b><strong class="text-danger h5 font-weight-bold"> <?php echo $row['pmrn'];?></strong><br>
                                    <b>Age:</b> <?php echo $row['page'];?> <br>
                                    <b>Gender:</b> <?php echo $row['psex'];?>  <br>
                                    <b>Phone:</b> <?php echo $row['pphone'];?>
                                </div>
                                <div class="col-md-4">
                                    <b>Occupation:</b> <?php echo $row['occupation'];?> <br>
                                    <b>Marital Status:</b> <?php echo $row['mstatus'];?> <br>
                                    <b>Height (CM):</b> <?php echo $row['height'];?> <br>
                                    <b>Weight (KG):</b> <?php echo $row['weight'];?>  <br>
                                    <b>BMI:</b> <?php if ($pbmi=='<br /'){echo '';} else {echo $pbmi;}?><br>
									
									<b>Past Surgery:</b> <?php echo $row['psurgery'];?> <br>
                                    <b>Alcohol:</b> <?php if ($row['palcohol']=='YES'){echo '<strong class="text-danger h5 font-weight-bold">YES</strong>';} else {echo $row['palcohol'];}?> <br>
                                    <b>Smoking:</b> <?php if ($row['psmoking']=='YES'){echo '<strong class="text-danger h5 font-weight-bold">YES</strong>';} else {echo $row['psmoking'];}?> <br>
                                    <b>Family History:</b> <?php echo $row['pfamily'];?>  <br>
                                    <b>Drug History:</b> <?php if ($row['pdrug']=='YES'){echo '<strong class="text-danger h5 font-weight-bold">YES</strong>';} else {echo $row['pdrug'];}?>
                                </div>
                                <div class="col-md-2">
                                   <img alt="" src="upload/<?php echo $rowp['pic'] ?>" class="img-flex-rounded" width="100"  height="100" align="center"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"><input type="button" name="edit" value="Vitals Information" id="<?php echo $id; ?>" class="btn btn-info btn-xs edit_data" /></h3>
                            <i class="fa fa-heartbeat float-right fa-lg"></i>
                        </div>
                        <div class="card-body">
						
						
                            <b>Pulse:</b> <?php echo $row['ppluse'];?> <br>
                            <b>Blood Pressure:</b> <?php echo $row['pbp'].'/'.$row['pbp1'];?><br>
                            <b>Temperature:</b> <?php echo $row['temp'];?> <br>
                            <b>SPO2:</b> <?php echo $row['spo2'];?>  <br>
                            <b>RR:</b> <?php echo $row['rr'];?><br>
							<b>Waist Circumference:</b> <?php echo $row['hwc'];?><br>
							<b>Hip Circumference:</b> <?php echo $row['hhc'];?>
														<b></b> <br>
                            <b></b> <br>
                                    <b></b> <br>
									                                    <b></b> <br>
                                    
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-info">
                        <div class="card-header">
                             <h3 class="card-title"><input type="button" name="edit_co" value="Comorbidities" id="<?php echo $id; ?>" class="btn btn-info btn-xs edit_data_co" /></h3>
							
                            <i class="fa fa-stethoscope float-right fa-lg"></i>
                        </div>
                        <div class="card-body">
                            <b>Hypertension:</b> <?php if ($row['phyper']=='YES'){echo '<strong class="text-danger h5 font-weight-bold">YES</strong>';} else {echo $row['phyper'];}?> <br>
							
							
							
                            <b>Heart Disease:</b> <?php if ($row['pheart']=='YES'){echo '<strong class="text-danger h5 font-weight-bold">YES</strong>';} else {echo $row['pheart'];}?> <br>
							
                            <b>DM:</b> <?php if ($row['pdm']=='YES'){echo '<strong class="text-danger h5 font-weight-bold">YES</strong>';} else {echo $row['pdm'];}?> <br>
                            <b>Kidney Disease</b> <?php if ($row['pkid']=='YES'){echo '<strong class="text-danger h5 font-weight-bold">YES</strong>';} else {echo $row['pkid'];}?>  <br>
							<b>TB</b> <?php if ($row['ptb']=='YES'){echo '<strong class="text-danger h5 font-weight-bold">YES</strong>';} else {echo $row['ptb'];}?>  <br>
                            <b>Asthma:</b> <?php if ($row['pasthma']=='YES'){echo '<strong class="text-danger h5 font-weight-bold">YES</strong>';} else {echo $row['pasthma'];}?><br>
                            <b>Thyriod Disease:</b> <?php if ($row['pthyroid']=='YES'){echo '<strong class="text-danger h5 font-weight-bold">YES</strong>';} else {echo $row['pthyroid'];}?><br>
                            <b>Neuro Disorder:</b> <?php if ($row['pneuro']=='YES'){echo '<strong class="text-danger h5 font-weight-bold">YES</strong>';} else {echo $row['pneuro'];}?><br>
                            <b>Liver Disease:</b> <?php if ($row['liver']=='YES'){echo '<strong class="text-danger h5 font-weight-bold">YES</strong>';} else {echo $row['liver'];}?>
							<b></b> <br>
							<b></b> <br>
							
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-3">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">History</h3>
                            <i class="fas fa-hospital-user float-right fa-lg"></i>
                        </div>
                        <div class="card-body">
                             <button type="button" class="btn btn-block btn-info font-weight-bold"><i class="fa fa-stethoscope float-left fa-2x"></i><a target='_blank' href="view3newtest?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>" style="color:white"> Record of Previous Visits</a></button>
                            <button type="button" class="btn btn-block btn-info font-weight-bold"><i class="fas fa-notes-medical float-left fa-2x"></i><a href="view3newtesttest?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>&eid=<?php echo "$count1"?>"style="color:white"> Template Of Previous Visits</a></button>
                            <button type="button" class="btn btn-block btn-info font-weight-bold"><i class="fas fa-microscope float-left fa-2x"></i><a target='_blank' href="../../allreportdocnew?pmrn=<?php echo "$pmrn"; ?>"style="color:white">ALL REPORTS</a></button>
                            <button type="button" class="btn btn-block btn-info font-weight-bold"><i class="fa fa-user-md float-left fa-2x"></i><a target='_blank' href="noteviewdoc?pmrn=<?php echo "$pmrn"; ?>" style="color:white"> SURGERY NOTE</a></button>
                            <button type="button" class="btn btn-block btn-info font-weight-bold"><i class="fas fa-lungs-virus float-left fa-2x"></i><a target='_blank' href="pcovidresult?pmrn=<?php echo "$pmrn"; ?>" class="blink1"style="color:white"> COVID Record</a></button>
                            <button type="button" class="btn btn-block btn-info font-weight-bold"><i class="fas fa-notes-medical float-left fa-2x"></i><a target='_blank' href="opdprocedurenote?pmrn=<?php echo "$pmrn"; ?>"style="color:white"> OPD PROCEDURE NOTE</a> </button>
                        
						<button type="submit" class="btn btn-block btn-info font-weight-bold"><i class="fas fa-notes-medical float-left fa-2x"></i>
<?php if($tt=='192.168.100.252:8081')
{ echo	
		'				<form target="_blank" action="http://192.168.100.202/Launch_Viewer.asp?" method="post" id="tt" >
<input type="hidden" name="PatientID" value="'.$pmrn.'"></input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW"align="left"></input>
</form>';

}
else 
{
	echo '
	
	<form target="_blank" action="http://182.160.124.36?" method="post" id="tt" >
<input type="hidden" name="PatientID" value="'.$pmrn.'"></input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW"align="left"></input>
</form>
	';
}
?>

</button>
						
						</div>
                        <div class="card-footer">
                            Patient History
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Prescription</h3>
                            <i class="fas fa-prescription float-right fa-lg"></i>
                        </div>
                        
						<form  class="form-horizontal" action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");'id="prescrip" name="prescrip" />
                            <div class="card-body">
                                <div class="form-group row">
                                    
						    <label for="inputEmail3" class="col-sm-12 col-form-label">Patient's Clinical Details:</label>
									
                                    <div class="col-sm-12">
                                           <textarea id="editor1" name="cdetails" class="form-control" placeholder="Enter Product's Comparison"></textarea>
                                               
										 
                                    </div>
                                </div>
								
								 <script>
                                                    CKEDITOR.replace( 'cdetails' );
                                                </script>

                                <div class="form-group row">
                                   <label for="inputEmail3" class="col-sm-12 col-form-label">Patient's Diagnosis:</label> 
                                    <div class="col-sm-12">
                                   <textarea id="editor1" name="diagnosis" class="form-control" placeholder="Enter Product's Comparison"></textarea>
                                               
										 
                                    </div>
                                </div>
								 <script>
                                                    CKEDITOR.replace( 'diagnosis' );
                                                </script>


                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-12 col-form-label">Patient's Diet:</label>
                                    <div class="col-sm-12">
                                         <input list=diet1 name="pdiet" placeholder="Select Diet" class="form-control" value="" >
					<datalist id="diet1">	
						
						<option value=''>-Select Diet-</option>
				 <?php 
			$sql = "select * from `diet`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dietn."'>".$row->dietn."</option>";
				}
			}
			?>	
						
						</datalist>
                                    </div>
                                </div>

                                <div class="form-group row">
                                   <label for="inputEmail3" class="col-sm-12 col-form-label">Other Instructions (In English):</label>
                                    <div class="col-sm-12">
                                       <textarea id="editor1" name="other" class="form-control" placeholder="Enter Product's Comparison"></textarea>
                                               
										 
                                    </div>
                                </div>
								 <script>
                                                    CKEDITOR.replace( 'other' );
                                                </script>


								
								
								<div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-12 col-form-label">Other Instructions (In Bangla):</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="other_b" id="ha" rows="3" placeholder="Other Instructions (In Bangla)"></textarea>
                                    </div>
									
									
									
									
							
                                </div>
								
								
								<div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-12 col-form-label">Follow Up Date:</label>
                                    <div class="col-sm-12">
                                        
										<input type="date" class="form-control" name="fdate" id="" placeholder="Next Follow Up Date" value="">
                                    </div>
								</div>
                            </div>
							
							
							
							
							
							
							
							
							
							
									
                                
                            <div class="card-footer">
                                
								<button type="submit" class="btn btn-info" name="Submit">Confirm</button>
								
                                <button type="submit" class="btn btn-default float-right">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Medication & Investigation</h3>
                            <i class="fas fa-notes-medical float-right fa-lg"></i>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-block btn-info font-weight-bold"><i class="fas fa-pills float-left fa-2x"></i> <a target='_blank' href="newtest5_1?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$pd"?>&ID=<?php echo "$id"?>&eid=<?php echo "$count1"?>"style="color:white">Medication</a></button>
							<button type="button" class="btn btn-block btn-warning font-weight-bold"><i class="fa fa-pills float-left fa-2x"></i><a target='_blank' href="newtest2test2?pmrn=<?php echo "$pm"; ?>&dname=<?php echo "$pd"?>&eid=<?php echo "$count1"?>&eido=<?php echo "$oeid"?>"style="color:white">Load Last Medicine</a></button>
                            <button type="button" class="btn btn-block btn-info font-weight-bold"><i class="fas fa-vials float-left fa-2x"></i> <a target='_blank' href="newtest2?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$pd"?>&ID=<?php echo "$id"?>&eid=<?php echo "$count1"?>&eido=<?php echo "$oeid"?>"style="color:white">Investigation</a></button>
							<button type="button" class="btn btn-block btn-info font-weight-bold"><i class="fas fa-id-card-alt float-left fa-2x"></i> <a target='_blank' href="opd_referral?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$pd"?>&ID=<?php echo "$id"?>&eid=<?php echo "$count1"?>"style="color:white">Referral</a></button>
							
							
							
							<?php


		
$url = "obs_history?pmrn=$pmrn&ID=$id&dname=$pd"; 

if($ps=='F')
	
	{
		echo
		
		"<button type='button' class='btn btn-block btn-info font-weight-bold'><i class='fas fa-venus float-left fa-2x'></i><a target='_blank' href='$url' style='color:white'>Obstetrical History</a></button>
		
	";}
?>

							
                            
							
							<button type="button" class="btn btn-block btn-info font-weight-bold"><i class="fas fa-id-card-alt float-left fa-2x"></i> <a target='_blank' href="docadm?pmrn=<?php echo "$pm"; ?>&dname=<?php echo "$pd"; ?>&eid=<?php echo "$count1"; ?>"style="color:white">Admission Advise</a></button>

							
							
                        </div>
                        <div class="card-footer">
                            Patient History
                        </div>
                    </div>
                    
                </div>

            </div>

        </div>

    </section>
<?php //include '../templa8te/footer.php';?>
</div>



  <footer class="main-footer">
    <strong>Copyright &copy; -2021 <a href="#">PMS</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../template/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../template/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../template/plugins/moment/moment.min.js"></script>
<script src="../template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../template/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../template/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../template/dist/js/pages/dashboard.js"></script>
<!-- <script src="../../plugins/summernote/summernote-bs4.min.js"></script> -->
<!-- <script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script> -->


<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Patient Vitals Edit Form</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" name="frmMain2">  
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn" class="form-control" size="15" readonly/>  
                          
                          <label>Pulse</label>  
                          <input type="text" name="ppluse" id="ppluse" class="form-control"  size="15">  
                          
                          <label>SBP</label>  
                          <input type="text" name="pbp" id="pbp" class="form-control" />  
						  
						  <label>DBP</label>  
                          <input type="text" name="pbp1" id="pbp1" class="form-control" />  
						  
						  
						  <label>Temp</label>                          
                          <input type="text" name="temp" id="temp" class="form-control"/>
<label>SPO2</label>  						  
						  <input type="text" name="spo2" id="spo2" class="form-control"/> 
<label>RR</label>  						  
						  <input type="text" name="rr" id="rr" class="form-control"/>  

<label>Waist Circumference</label>  						  
						  <input type="text" name="hwc" id="hwc" class="form-control"/>  

<label>Hip Circumference</label>  						  
						  <input type="text" name="hhc" id="hhc" class="form-control"/>  
						  
						  
                          
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert45" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
</html>
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"select_vitals.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.pmrn);  
                     $('#ppluse').val(data.ppluse);  
                     $('#pbp').val(data.pbp); 
					 $('#pbp1').val(data.pbp1); 
					 $('#temp').val(data.temp); 
					 $('#spo2').val(data.spo2); 
					 $('#rr').val(data.rr); 
					 $('#hwc').val(data.hwc); 
					 $('#hhc').val(data.hhc); 
					 
					 
					
					  
                     
					 
                     $('#employee_id').val(data.ID);  
                     $('#insert45').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn').val() == "")  
           {  
                alert("MRN is required");  
           }  
           else if($('#ppluse').val() == '')  
           {  
                alert("Medicine is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"edit_vitals.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>
 
 
 
 
 
 
 
 <div id="dataModal7" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal7" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Edit Comorbidities</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form7">  
                         <label>Patient MRN</label>  
                          <input type="text" name="pmrn1" id="pmrn1" class="form-control" size="15" readonly/>  
                          
                          <label>Hypertension</label>  
                          <input type="text" name="phyper" id="phyper" class="form-control"  size="15">  
						  
                          
                          <label>Heart Disease</label>  
                          <input type="text" name="pheart" id="pheart" class="form-control" />  
						  
						  
						  <label>DM</label>                          
                          <input type="text" name="pdm" id="pdm" class="form-control"/>
<label>Kidney Disease</label>  						  
						  <input type="text" name="pkid" id="pkid" class="form-control"/> 
<label>TB</label>  						  
						  <input type="text" name="ptb" id="ptb" class="form-control"/>  
						  
						  <label>Asthma</label>  						  
						  <input type="text" name="pasthma" id="pasthma" class="form-control"/>  
						  
						  <label>Thyriod Disease</label>  						  
						  <input type="text" name="pthyroid" id="pthyroid" class="form-control"/>  
						  
						  <label>Neuro Disorder</label>  						  
						  <input type="text" name="pneuro" id="pneuro" class="form-control"/>  
						  
						  <label>Liver Disease</label>  						  
						  <input type="text" name="liver" id="liver" class="form-control"/>  
						  
						
						  
                          
                          <input type="hidden" name="employee_id2" id="employee_id2" />  
                         <input type="submit" name="insert" id="insert450" value="Insert" class="btn btn-success" />  
													
													
                           
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  

<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form7')[0].reset();  
      });  
      $(document).on('click', '.edit_data_co', function(){  
           var employee_id2 = $(this).attr("id");  
           $.ajax({  
                url:"select_vitals_co.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn1').val(data.pmrn);  
                     $('#phyper').val(data.phyper);  
                     $('#pheart').val(data.pheart); 
					 $('#pdm').val(data.pdm); 
					 $('#pkid').val(data.pkid); 
					 $('#ptb').val(data.ptb); 
					 $('#pasthma').val(data.pasthma); 
					 $('#pthyroid').val(data.pthyroid); 
					 $('#pneuro').val(data.pneuro); 
					 $('#liver').val(data.liver); 

							  
                     
					 
                     $('#employee_id2').val(data.ID);  
                     $('#insert450').val("Update");  
                     $('#add_data_Modal7').modal('show');  
					  
                     
					 
          

		  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form7').on("submit", function(event){  
           event.preventDefault();  
           if($('#pkid').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#pheart').val() == '')  
           {  
                alert("Address is required");  
           }  
           
           else  
           {  
          $.ajax({  
                     url:"edit_vitals_co.php",  
                     method:"POST",  
                     data:$('#insert_form7').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form7')[0].reset();  
                          $('#add_data_Modal7').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });   
     
 });  
 </script>
 
 
<script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+365)
		});
	});
</script>


