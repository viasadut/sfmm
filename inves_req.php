<?php include 'head.php';?>
<?php
    
	require('db1.php');   
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','staff','mng','ot','endo','imo','mofficer','nurse','emergency','moopd','call','bill','billin','diet','physio','mrd','adminmng','lab')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
	
	
        header('Location: login2?err=2');
    }

    require('db1.php');

    $user=$_SESSION["sess_username"];

    $query4 = mysqli_query($con,"select * from staff3 where sid='$user'");
    $data = mysqli_fetch_assoc($query4);
    $dept=$data['dept'];

    $querymax2 = "SELECT count(room) FROM itlog"; 
    $resultmax2 = mysqli_query($con, $querymax2) or die(mysqli_error());
    $rowmax2= mysqli_fetch_array($resultmax2);
    $max2=$rowmax2['count(room)']+1;

    if(isset($_POST['Submit'])){
        $pname = $data['sname'];
        $pmrn = $data['sid'];
        $infu = $_REQUEST['infu'];
        $service_type = $_REQUEST['service_type'];
        $service_category = $_REQUEST['service_category'];
        $ticket_for = $_REQUEST['ticket_for'];
        $adate1= date('m/d/Y H:i:s');
        $adate= date('Y-m-d');

        $ins_query="insert into itlog (`pmrn`,`pname`,`odate`,`infusion`,`user`,`status`,`adate`,`room`,`sno`,`service_type`,`service_category`,`ticket_for`) values 
        ( '$pmrn','$pname','$adate1','$infu','$user','In Progress','$adate','$dept','$max2','$service_type','$service_category','$ticket_for')";
        mysqli_query($con,$ins_query) or die(mysql_error());

        $ins_query2="insert into itlog1 (`pmrn`,`pname`,`odate`,`infusion`,`user`,`status`,`adate`,`room`,`sno`,`service_type`,`service_category`,`ticket_for`) values 
        ( '$pmrn','$pname','$adate1','$infu','$user','In Progress','$adate','$dept','$max2','$service_type','$service_category','$ticket_for')";
        mysqli_query($con,$ins_query2) or die(mysql_error());
header("location:index");
    }
?>
<script type="text/javascript">
    function confirm_click(){
        return confirm("Are you Sure to UPDATE The Status ?");
    }
</script>
<div class="container">

    <div class="jumbotron">
        <h3>Ticketing System</h3>
        <link rel="stylesheet" href="bootstrap.min.css">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header bg-danger text-center">Ticket In Progress <br> (Response Pending)</div>
                    <div class="card-body">
                        <br>
                            <a href="report_on_status_user?status=In Progress">
                                <p class="card-text text-center" style ="color: white;  font-size: 1em;">
                                    <?php
                                        $result = mysqli_query($con,"select count(1) FROM itlog WHERE pmrn='$user' AND status='In Progress'");
                                        $row = mysqli_fetch_array($result);
                                        $total = $row[0];
                                        echo $total;
                                    ?>
                                </p>
                            </a>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-header bg-info text-center">Open Ticket <br> (Responsed)</div>
                    <div class="card-body">
                        <br>
                            <a href="report_on_status_user?status=Open">
                                <p class="card-text text-center" style ="color: white;  font-size: 1em;">
                                    <?php
                                        $result = mysqli_query($con,"select count(1) FROM itlog WHERE pmrn='$user' AND status='Open'");
                                        $row = mysqli_fetch_array($result);
                                        $total = $row[0];
                                        echo $total;
                                    ?>
                                </p>
                            </a>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header bg-success text-center">Closed Ticket <br> (Solved)</div>
                    <div class="card-body">
                        <br>
                            <a href="report_on_status_user?status=Closed">
                                <p class="card-text text-center" style ="color: white;  font-size: 1em;">
                                    <?php
                                        $result = mysqli_query($con,"select count(1) FROM itlog WHERE pmrn='$user' AND status='Closed'");
                                        $row = mysqli_fetch_array($result);
                                        $total = $row[0];
                                        echo $total;
                                    ?>
                                </p>
                            </a>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Service Type</label>
                        <select name="service_type" id="" class="form-control" required>
                            <option value="">-- Select Service --</option>
                            <option value="Problem">Problem</option>
                            <option value="Request">Request</option>
                            <option value="Inquery">Inquery</option>
                            <option value="Development">Development</option>
                            <option value="Customization">Customization</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Service Category</label>
                        <select name="service_category" id="" class="form-control" required>
                            <option value="">-- Select Category --</option>
                            <option value="Hardware">Hardware</option>
                            <option value="Network">Network</option>
                            <option value="PMS">PMS</option>
                            <option value="HITS">HITS</option>
                            <option value="Winlab">Winlab</option>
                            <option value="PACS">PACS</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <label for="formGroupExampleInput2">Ticket For:</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ticket_for" id="exampleRadios1" value="<?php echo $user; ?>" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            My Ticket
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ticket_for" id="exampleRadios2" value="Other">
                        <label class="form-check-label" for="exampleRadios2">
                            For Other (Please mention in the details)
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="formGroupExampleInput2">Problem Details</label>
                <textarea class="form-control" name="infu" id="" cols="30" rows="6" required></textarea>
            </div>
            <p>
                <button type="submit" class="btn btn-primary" name="Submit">Confirm</button>
            </p>
        </form>
    </div>

    

    <div class="jumbotron">
        <h3>Pending Ticket</h3>
        <table class="table">
            <tr>
                <th>S.No</th>
                <th>Ticket No.</th>
                <th>Entry By</th>
                <th>Entry Time</th>
                <th>Service Type</th>
                <th>Current Status</th>
                <th>Action</th>
            </tr>
            <?php
                $user=$_SESSION["sess_username"];
                $count=1;
                $sel_query="Select * from itlog where pmrn= '$user' and status in ('Open','IN Progress') order by `id` DESC;";  
                $result = mysqli_query($con,$sel_query);
                while($row = mysqli_fetch_assoc($result)){
            ?>    
            <tr>
                <td  ><?php echo $count; ?></td>
                <td ><a href="ticket_details?id=<?php echo "$row[sno]"; ?>"><?php echo $row["id"]; ?></a></td>
                <td ><?php echo $row["pname"]; ?></td>
                <td ><?php echo $row["odate"]; ?></td>
                <td ><a href="ticket_details?id=<?php echo "$row[sno]"; ?>"><?php echo $row["service_type"]; ?></a></td>
                <td ><?php echo $row["status"]; ?></td>
                <td>
                <?php
                    $id=$row["id"];
                    $url = "ticket_photo?pmrn=$id"; 
                    if($user='$rby'){
                        echo "<a target='_blank' href='$url'>Upload Photo</a>";
                    }
                    else{
                        echo'';
                    }
                ?>
              </td>
            </tr>
            <?php $count++; } ?>
        </table>
    </div>

    <div class="jumbotron"> 
        <h3>Closed Ticket</h3>
        <table class="table">
            <tr>
                <th>S.No</th>
                <th>Ticket No.</th>
                <th>Entry By</th>
                <th>Entry Time</th>
                <th>Service Type</th>
                <th>Details</th>
            </tr>
            <?php
                $user=$_SESSION["sess_username"];
                $count=1;
                $sel_query="Select * from itlog where pmrn= '$user' and status='Closed' order by `id` DESC;";  
                $result = mysqli_query($con,$sel_query);
                while($row = mysqli_fetch_assoc($result)){
            ?>    
            <tr>
                <td ><?php echo $count; ?></td>
                <td ><a href="ticket_details?id=<?php echo "$row[sno]"; ?>"><?php echo $row["id"]; ?></a></td>
                <td ><?php echo $row["pname"]; ?></td>
                <td ><?php echo $row["odate"]; ?></td>
                <td ><?php echo $row["service_type"]; ?></td>
                <td ><a href="ticket_details?id=<?php echo "$row[sno]"; ?>"><?php echo $row["infusion"]; ?></a></td>
            </tr>
            <?php $count++; } ?>
        </table>
    </div>
</div>
<?php include 'footer.php'; ?>