<?php include 'head.php';?>

<?php 
  
    require('../db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff')"; 
    $resultc = mysqli_query($con, $queryc) or die(mysqli_error());
    $rowc = mysqli_fetch_array($resultc);
    $c1=$rowc['COUNT(utype)'];
    if(!isset($_SESSION['sess_username']) || $c1==0){
        header('Location: login2?err=2');
    }

    $user=$_SESSION["sess_username"];
    $id=$_REQUEST['id'];
    $query4 = mysqli_query($con,"select * from itlog where id='$id'");
    $data = mysqli_fetch_assoc($query4);
    $dept=$data['room'];
    $pname=$data['pname'];
    $infu=$data['infusion'];
    $pp=$data['pmrn'];
    $sno=$data['sno'];

    $queryd = mysqli_query($con,"select * from staff3 where sid='$pp'");
    $datad = mysqli_fetch_assoc($queryd);
    $dept5=$datad['dept'];

    $querymax2 = "SELECT count(room) FROM itlog"; 
    $resultmax2 = mysqli_query($con, $querymax2) or die(mysqli_error());
    $rowmax2= mysqli_fetch_array($resultmax2);
    $max2=$rowmax2['count(room)']+1;

    if(isset($_POST['Submit'])){
        $pname = $data['sname'];
        $pmrn = $data['sid'];
        $infu = $_REQUEST['infu'];
        $adate1= date('m/d/Y H:i:s');
        $adate= date('Y-m-d');
        $infu1 = $_REQUEST['infu1'];

        $ins_query="insert into itlog (`pmrn`,`pname`,`odate`,`infusion`,`user`,`status`,`adate`,`room`,`fstatus`,`sno`) values 
        ( '$pmrn','$pname','$adate1','$infu','$user','Data Updated','$adate','$dept','$infu1','$max2')";
        mysqli_query($con,$ins_query) or die(mysql_error());

        $ins_query2="insert into itlog1 (`pmrn`,`pname`,`odate`,`infusion`,`user`,`status`,`adate`,`room`,`fstatus`,`sno`) values 
        ( '$pmrn','$pname','$adate1','$infu','$user','Data Updated','$adate','$dept','$infu1','$max2')";
        mysqli_query($con,$ins_query2) or die(mysql_error());
    }
?>
<script type="text/javascript">
    function confirm_click(){
        return confirm("Are you Sure to UPDATE The Status ?");
    }
</script>
<div class="container">
    <?php
        $user=$_SESSION["sess_username"];
        $count=1;
        $sel_query="Select * from itlog1 where sno='$sno' and room='$dept5' order by `id` ASC LIMIT 1;";
        $result = mysqli_query($con,$sel_query);
        while($row = mysqli_fetch_assoc($result)) { 
    ?>
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6">
                Replay By: <?php echo $row["pname"]; ?> <br>
                Department: <?php echo $data["room"]; ?> <br>
                Ticket No.: <?php echo $data["id"];?>
            </div>
            <div class="col-md-6 float-right">
                <div class="float-right"><?php echo $row["odate"]; ?></div>
                Status- <?php echo $row["status"]; ?> <br>
                Service Type: <?php echo $data["service_type"];?>
            </div>
        </div>
        <hr>
        <label for="">Problem Details:</label>
        <p><?php echo $row["infusion"]; ?> </p>
        
        <div class="row">
            <?php
                $ticket = $id;
                $images_query="SELECT * from ticket_gallery WHERE  `pmrn`= '$ticket'";
                $images_result = mysqli_query($con,$images_query);
                while($row = mysqli_fetch_assoc($images_result)) {
            ?>
            <div class="col-md-3">
                <a class="thumbnail fancybox" rel="ligthbox" href="ticketpic/<?php echo $row['image'] ?>">
                    <img class="img-responsive" alt="" src="ticketpic/<?php echo $row['image'] ?>" />
                    <div class='text-center'>
                        <small class='text-muted'><?php echo $row['image'] ?></small>
                    </div> <!-- text-center / end -->
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php $count++; } ?>

    <?php
        $user=$_SESSION["sess_username"];
        $count=1;
        $sel_query="Select * from itlog1 where sno='$sno' order by `id` ASC LIMIT 1, 50;";
        $result = mysqli_query($con,$sel_query);
        while($row = mysqli_fetch_assoc($result)) { 
    ?>
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6">
                Replay By: <?php echo $row["user"]; ?> <br>
                Department: <?php echo $row["room"]; ?> <br>
                
            </div>
            <div class="col-md-6 float-right">
                <div class="float-right"><?php echo $row["odate"]; ?></div>
                Status- <?php echo $row["status"]; ?>
            </div>
        </div>
        <hr>
        <label for="">Replay:</label>
        <p><?php echo $row["fstatus"]; ?> </p>
        
        <br>
        <a target='_blank' href="ticket_comment_photo?comment_id=<?php echo $row["id"]; ?>" class="btn btn-success">Upload photo</a>
        <br>
        <div class="row">
            <?php
                $comment = $row["id"];
                $images_query="SELECT * from ticket_gallery WHERE  `comment_id`= '$comment'";
                $images_result = mysqli_query($con,$images_query);
                while($row = mysqli_fetch_assoc($images_result)) {
            ?>
            <div class="col-md-3">
                <a class="thumbnail fancybox" rel="ligthbox" href="ticketpic/<?php echo $row['image'] ?>">
                    <img class="img-responsive" alt="" src="ticketpic/<?php echo $row['image'] ?>" />
                    <div class='text-center'>
                        <small class='text-muted'><?php echo $row['image'] ?></small>
                    </div> <!-- text-center / end -->
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php $count++; } ?>

</div>
<?php include 'footer.php'; ?>