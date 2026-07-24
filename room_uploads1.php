<?php
require('db1.php');
$rno=$_REQUEST['rno'];
$eid=$_REQUEST['eid'];
//echo $count1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Endoscopy Picture Upload</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="jsnew/3.3.7.css.bootstrap.min.css">
    <!-- References: https://github.com/fancyapps/fancyBox -->
    <link rel="stylesheet" href="jsnew/jquery.fancybox.min.css" media="screen">
    <script src="jsnew/jquery_3.2.1_jquery.min.js"></script>
    <script src="jsnew/fancybox.min.js"></script>


    <style type="text/css">
    .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }
    .close-icon{
    border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }
        .form-image-upload{
            background: #e8e8e8 none repeat scroll 0 0;
            padding: 15px;
        }
    </style>
</head>
<body>


<div class="container">


    <h3>Patient MRN: <?php echo $eid;?></h3>
    <form action="room_uploads.php" class="form-image-upload" method="POST" enctype="multipart/form-data">


        <?php if(!empty($_SESSION['error'])){ ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    <li><?php echo $_SESSION['error']; ?></li>
                </ul>
            </div>
        <?php unset($_SESSION['error']); } ?>


        <?php if(!empty($_SESSION['success'])){ ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo $_SESSION['success']; ?></strong>
        </div>
        <?php unset($_SESSION['success']); } ?>


        <div class="row">
            <div class="col-md-5">
                
            </div>
            <div class="col-md-10">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-2">
			<input type="hidden" name="eid" value="<?php echo $eid; ?>">
			<input type="hidden" name="rno" value="<?php echo $rno; ?>">
			
                <br/>
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>


    </form> 


    <div class="row">
    <div class='list-group gallery'>


            <?php
            require('db1.php');

			
			
			$sel_query="Select * from new_room where eid='$eid' and room_id='$rno';";
			$result = mysqli_query($con,$sel_query);
            //$sql = "SELECT * FROM image_gallery";
            //$images = $mysqli->query($sql);


            while($image = $result->fetch_assoc()){


            ?>
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="room_uploads/<?php echo $image['file_name'] ?>">
                        <img class="img-responsive" alt="" src="room_uploads/<?php echo $image['file_name'] ?>" />
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $image['file_name'] ?></small>
                        </div> <!-- text-center / end -->
                    </a>
                    <form action="room_delete.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $image['id'] ?>">
					<input type="hidden" name="eid" value="<?php echo $eid ?>">
					<input type="hidden" name="rno" value="<?php echo $rno ?>">
					  <input type="hidden" name="name" value="<?php echo $image['file_name'] ?>">
                    <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                    </form>
                </div> <!-- col-6 / end -->
            <?php } ?>


        </div> <!-- list-group / end -->
    </div> <!-- row / end -->
</div> <!-- container / end -->


</body>


<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
        <div class="row">
<div class="col-md-10"align='Right'><a target='_blank' href="endophoto3.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></div>  </div>
</html>