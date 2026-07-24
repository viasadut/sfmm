<?php include 'head.php';?>

<?php 
    
  
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
      header('Location: login2?err=2');
    }
    require('../db1.php');

    $user=$_SESSION["sess_username"];

    $id=$_REQUEST['id'];
    $query4 = mysqli_query($con,"select * from itlog where sno='$id'");
    $data = mysqli_fetch_assoc($query4);
    // $dept=$data['room'];
    $pname=$data['pname'];
    $infu=$data['infusion'];
    $pmrn=$data['pmrn'];

    $query44 = mysqli_query($con,"select * from staff3 where sid='$user'");
    $data1 = mysqli_fetch_assoc($query44);
    $user_1 = $data1['sname'];
    $dept=$data1['dept'];

    if(isset($_POST['Submit'])){
        $fstatus = $_REQUEST['fstatus'];
        $adate1= date('m/d/Y H:i:s');
        $adate= date('Y-m-d');
        $ins_query="update itlog set fstatus='$fstatus', ftime='$adate1' where sno='$id'";
        $result = mysqli_query($con,$ins_query) or die(mysql_error());

        $ins_query2="insert into itlog1 (`pmrn`,`pname`,`odate`,`user`,`status`,`adate`,`room`,`fstatus`,`sno`,`infusion`) values 
        ('$user','$pname','$adate1','$user_1','Open','$adate','$dept','$fstatus','$id','$infu')";
        mysqli_query($con,$ins_query2) or die(mysql_error());
        header('Location: index_it');
    }

    if(isset($_POST['Submit1'])){
        $fstatus = $_REQUEST['fstatus'];
        $infu = $_REQUEST['infu'];
        $adate1= date('m/d/Y H:i:s');
        $adate= date('Y-m-d');

        $ins_query="update itlog set fstatus='$fstatus', status='Closed', ftime='$adate1' where sno='$id'";
        mysqli_query($con,$ins_query) or die(mysql_error());


        $ins_query2="insert into itlog1 (`pmrn`,`pname`,`odate`,`user`,`status`,`adate`,`room`,`fstatus`,`sno`,`infusion`) values 
        ('$user','$pname','$adate1','$user_1','Closed','$adate','$dept','$fstatus','$id','$infu')";
        mysqli_query($con,$ins_query2) or die(mysql_error());

        header('Location: index_it');
    }
?>
<script type="text/javascript">
    function confirm_click(){
        return confirm("Are you Sure to UPDATE The Status ?");
    }
</script>
<div class="container">
    <div class="jumbotron">
        <h1>Ticketing System</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput2">Problem Details</label>
                <textarea class="form-control" name="infu" id="" cols="30" rows="10" disabled><?php echo $data['infusion']?></textarea>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Problem Details</label>
                <textarea class="form-control" name="fstatus" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="row">
                <div class="col-md-6"><button type="submit" name="Submit" class="btn btn-info">Update</button></div>
                <div class="col-md-6"><button type="submit" name="Submit1" class="btn btn-danger">Close</button></div>
            </div>
        </form>
    </div>

</div>
<?php include 'footer.php'; ?>