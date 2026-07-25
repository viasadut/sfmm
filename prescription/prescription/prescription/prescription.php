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


$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];




$query43 = "SELECT COUNT(pmrn) FROM presnew where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;
$query = "SELECT * from pappnew where ID='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
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
  
$query5 = "SELECT * from pmedi where pmrn='$pmrn' and dname='$pd' order by id desc limit 1"; 
$result5 = mysqli_query($con, $query5) or die ( mysqli_error());
$row5 = mysqli_fetch_assoc($result5);
$oeid=$row5["eid"];
//echo $oeid;


$sel="SELECT * FROM presnew WHERE `pmrn`='$pmrn' and dname='$pd' and date='$pdate';";
$result = mysqli_query($con,$sel);  
  ?>


<?php
 
require('db1.php');
$stime=date("h:i:sa");
if(isset($_POST['Submit']))
{

$dname =$_REQUEST['dname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
//$xl=$_REQUEST['xl'];
//$lx= implode(",",$xl);

//$x2=$_REQUEST['x2'];
//$lx2= implode(",",$x2);


$other=$_REQUEST['other'];
$diagnosis=$_REQUEST['diagnosis'];
$cdetails=$_REQUEST['cdetails'];
$page=$_REQUEST['page'];
$pdiet=$_REQUEST['pdiet'];
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
$fdate1=$_REQUEST['fdate'];

$fdate=date('Y-m-d',strtotime($fdate1));



if($res=mysqli_num_rows($result)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Today you have already issued prescription for the Patient... Kindly go back and edit the prescription if need to modify"); ';
    echo '</script>';
    }

	
	
	
	else{
$ins_query="insert into presnew (`dname`,`pname`,`pmrn`,`pphone`,`cdetails`,`diagnosis`,`other`,`date`,`page`,`pdiet`,`pdiet2`,`pdiet3`,`pdiet4`,`pdiet5`,`pdiet6`,`pdiet7`,`reffer`,`reffer2`,`reffer3`,`reffer4`,`reffer5`,`reffer6`,`psex`,`eid`,`dstatus`,`date1`,`fdate`) values ('$dname', '$pname','$pmrn','$pphone','$cdetails','$diagnosis','$other','$pdate','$page','$pdiet','$ref1','$ref2','$ref3','$ref4','$ref5','$ref6','$reffer','$reffer2','$reffer3','$reffer4','$reffer5','$reffer6','$psex','$count1','SEEN','$date4','$fdate')";
mysqli_query($con,$ins_query) or die("Please avoid Apostrophe in your prescription");

//$gg= $_REQUEST['pname'];
//$update="update pappnew set status='SEEN' where `ID`='$id'";
//mysqli_query($con,$update) or die(mysql_error());


if (!empty ($_POST['reffer'])){
$ins_query21="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`height`,`weight`,`temp`,`page`,`psex`,`dreffer`,`padd`,`yage`,`adate1`) values ('$pname', '$pmrn','$pphone','$reffer','$pdate','NOT SEEN','$pheight','$pweight','$ptemp','$page','$psex','$dname','$pa','$pty','$date4')";
mysqli_query($con,$ins_query21) or die("Problem in Reffer1");}

if (!empty ($_POST['reffer2'])){
$ins_query22="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`height`,`weight`,`temp`,`page`,`psex`,`dreffer`,`padd`,`yage`,`adate1`) values ('$pname', '$pmrn','$pphone','$reffer','$pdate','NOT SEEN','$pheight','$pweight','$ptemp','$page','$psex','$dname','$pa','$pty','$date4')";
mysqli_query($con,$ins_query22) or die("Problem in Reffer12");}

if (!empty ($_POST['reffer3'])){
$ins_query23="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`height`,`weight`,`temp`,`page`,`psex`,`dreffer`,`padd`,`yage`,`adate1`) values ('$pname', '$pmrn','$pphone','$reffer','$pdate','NOT SEEN','$pheight','$pweight','$ptemp','$page','$psex','$dname','$pa','$pty','$date4')";
mysqli_query($con,$ins_query23) or die("Problem in Reffer3");}

if (!empty ($_POST['reffer4'])){
$ins_query24="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`height`,`weight`,`temp`,`page`,`psex`,`dreffer`,`padd`,`yage`,`adate1`) values ('$pname', '$pmrn','$pphone','$reffer','$pdate','NOT SEEN','$pheight','$pweight','$ptemp','$page','$psex','$dname','$pa','$pty','$date4')";
mysqli_query($con,$ins_query24) or die("Problem in Reffer4");}

if (!empty ($_POST['reffer5'])){
$ins_query25="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`height`,`weight`,`temp`,`page`,`psex`,`dreffer`,`padd`,`yage`,`adate1`) values ('$pname', '$pmrn','$pphone','$reffer','$pdate','NOT SEEN','$pheight','$pweight','$ptemp','$page','$psex','$dname','$pa','$pty','$date4')";
mysqli_query($con,$ins_query25) or die("Problem in Reffer5");}

if (!empty ($_POST['reffer6'])){
$ins_query26="insert into pappnew (`pname`,`pmrn`,`pphone`,`dname`,`adate`,`status`,`height`,`weight`,`temp`,`page`,`psex`,`dreffer`,`padd`,`yage`,`adate1`) values ('$pname', '$pmrn','$pphone','$reffer','$pdate','NOT SEEN','$pheight','$pweight','$ptemp','$page','$psex','$dname','$pa','$pty','$date4')";
mysqli_query($con,$ins_query26) or die("Problem in Reffer6");}

$update33="update pappnew set `height`='$pheight',`weight`='$pweight',`temp`='$ptemp',`pbp`='$pbp',`pbmi`='$pbmi',`phyper`='$phyper',`ppluse`='$ppluse',`pheart`='$pheart',`pdm`='$pdm',`pkid`='$pkid',`ptb`='$ptb',`pasthma`='$pasthma',`pthyroid`='$pthyroid',`pneuro`='$pneuro',`psurgery`='$psurgery',`pperiod`='$pperiod',`plmp`='$plmp',`pnochild`='$pnochild',`plchild`='$plchild',`palcohol`='$palcohol',`psmoking`='$psmoking',`pfamily`='$pfamily',`pdrug`='$pdrug',`mstatus`='$pmstatus',`occupation`='$poccupation',`eid`='$count1', `status`='SEEN',`stime`='$stime',`spo2`='$spo2',`rr`='$rr',`pperiod1`='$pperiod1',`plmp1`='$plmp1',`pnochild1`='$pnochild1',`plchild1`='$plchild1',`psurgery1`='$psurgery1',`palcohol1`='$palcohol1',`psmoking1`='$psmoking1',`pfamily1`='$pfamily1',`pdrug1`='$pdrug1',`phyper1`='$phyper1',`pheart1`='$pheart1',`pdm1`='$pdm1',`pkid1`='$pkid1',`ptb1`='$ptb1',`pasthma1`='$pasthma1',`pthyroid1`='$pthyroid1',`pneuro1`='$pneuro1',`liver`='$liver',`liver1`='$liver1',`para`='$para',`para1`='$para1',`gravida`='$gravida',`gravida1`='$gravida1',`clist`='$clist',`clist1`='$clist1',`adate1`='$date4' where `ID`='$id'";
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




<?php include '../template/header.php';?>

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
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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

                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Patient Information</h3>
                            <i class="fa fa-user float-right fa-lg"></i>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Name:</b><strong> <a href="#"> <?php echo $row['pname'];?></a></strong> <br>
                                    <b>PMRN:</b><strong><a href="#"> <?php echo $row['pmrn'];?></a></strong><br>
                                    <b>Age:</b> <?php echo $row['page'];?> <br>
                                    <b>Gender:</b> <?php echo $row['psex'];?>  <br>
                                    <b>Phone:</b> <?php echo $row['pphone'];?>
                                </div>
                                <div class="col-md-6">
                                    <b>Occupation:</b> <?php echo $row['occupation'];?> <br>
                                    <b>Marital Status:</b> <?php echo $row['mstatus'];?> <br>
                                    <b>Height (CM):</b> <?php echo $row['height'];?> <br>
                                    <b>Weight (KG):</b> <?php echo $row['weight'];?>  <br>
                                    <b>BMI:</b> <?php echo $row['pbmi'];?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Vitals Information</h3>
                            <i class="fa fa-heartbeat float-right fa-lg"></i>
                        </div>
                        <div class="card-body">
                            <b>Pulse:</b> <?php echo $row['ppluse'];?> <br>
                            <b>Blood Pressure:</b> <?php echo $row['pbp'];?> <br>
                            <b>Temperature:</b> <?php echo $row['temp'];?> <br>
                            <b>SPO2:</b> <?php echo $row['spo2'];?>  <br>
                            <b>RR:</b> <?php echo $row['rr'];?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Comorbidities</h3>
                            <i class="fa fa-stethoscope float-right fa-lg"></i>
                        </div>
                        <div class="card-body">
                            <b>Hypertension:</b> <?php echo $row['phyper'];?> <br>
                            <b>Heart Disease:</b> <?php echo $row['pheart'];?> <br>
                            <b>DM:</b> <?php echo $row['pdm'];?> <br>
                            <b>Kidney Disease</b> <?php echo $row['pkid'];?>  <br>
							<b>TB</b> <?php echo $row['ptb'];?>  <br>
                            <b>Asthma:</b> <?php echo $row['pasthma'];?><br>
                            <b>Thyriod Disease:</b> <?php echo $row['pthyroid'];?><br>
                            <b>Neuro Disorder:</b> <?php echo $row['pneuro'];?><br>
                            <b>Liver Disease:</b> <?php echo $row['liver'];?>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-9">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Prescription</h3>
                            <i class="fas fa-prescription float-right fa-lg"></i>
                        </div>
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Patient's Clinical Details:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="" id="" rows="3" placeholder="Patient's Clinical Details"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Patient's Diagnosis:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="" id="" rows="3" placeholder="Patient's Diagnosis"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Diet Instructions:</label>
                                    <div class="col-sm-10">
                                        <input list=diet1 name="pdiet" placeholder="Select Diet" class="form-control" >
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
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Other Instructions:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="" id="" rows="3" placeholder="Other Instructions"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Save</button>
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
                            <button type="button" class="btn btn-block btn-info"><i class="fa fa-pills float-left fa-2x"></i> <a target='_blank' href="newtest2?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$pd"?>&ID=<?php echo "$id"?>&eid=<?php echo "$count1"?>"style="color:white">Medication</a></button>
                            <button type="button" class="btn btn-block btn-info"><i class="fas fa-vials float-left fa-2x"></i> <a target='_blank' href="newtest5?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$pd"?>&ID=<?php echo "$id"?>&eid=<?php echo "$count1"?>"style="color:white">Investigation</a></button>
                            <button type="button" class="btn btn-block btn-warning"><i class="fa fa-pills float-left fa-2x"></i>							<a target='_blank' href="newtest5test?pmrn=<?php echo "$pm"; ?>&dname=<?php echo "$pd"?>&eid=<?php echo "$count1"?>&eido=<?php echo "$oeid"?>"style="color:white"><b>Load Last Medicine<b></a></button>
							
							</td><td align="left" colspan="3"></td>
							
                        </div>
                        <div class="card-footer">
                            Patient History
                        </div>
                    </div>
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">History</h3>
                            <i class="fas fa-hospital-user float-right fa-lg"></i>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-block btn-info"><i class="fa fa-stethoscope float-left fa-2x"></i> Record of Previous Visits</button>
                            <button type="button" class="btn btn-block btn-info"><i class="fas fa-notes-medical float-left fa-2x"></i> Template Of Previous Visits</button>
                            <button type="button" class="btn btn-block btn-info"><i class="fas fa-microscope float-left fa-2x"></i><a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"style="color:white">LAB REPORT</a></button>
                            <button type="button" class="btn btn-block btn-info"><i class="fa fa-user-md float-left fa-2x"></i> SURGERY NOTE</button>
                            <button type="button" class="btn btn-block btn-info"><i class="fas fa-lungs-virus float-left fa-2x"></i> COVID Record</button>
                            <button type="button" class="btn btn-block btn-info"><i class="fas fa-notes-medical float-left fa-2x"></i> OPD PROCEDURE NOTE </button>
                        </div>
                        <div class="card-footer">
                            Patient History
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

	


<?php include '../template/footer.php';?>