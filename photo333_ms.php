<?php
require('db1.php');
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$pro=$_REQUEST['pro'];
$query43 = "SELECT COUNT(pmrn) FROM image_gallery where pmrn= '$pmrn' and eid='$eid';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;
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


    <h3>Patient MRN: <?php echo $pmrn?></h3>
    <form action="imageupload_ms.php" class="form-image-upload" method="POST" enctype="multipart/form-data">


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
			<input type="hidden" name="pmrn" value="<?php echo $pmrn; ?>">
			<input type="hidden" name="eid" value="<?php echo $eid; ?>">
			<input type="hidden" name="pro" value="<?php echo $pro; ?>">
			<input type="hidden" name="sno" value="<?php echo $count1; ?>">
                <br/>
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>


    </form> 


    <div class="row">
    <div class='list-group gallery'>


            <?php
            require('db1.php');

			
			
			$sel_query="Select * from image_gallery_ms where pmrn='$pmrn' and eid='$eid';";
			$result = mysqli_query($con,$sel_query);
            //$sql = "SELECT * FROM image_gallery";
            //$images = $mysqli->query($sql);


            while($image = $result->fetch_assoc()){


            ?>
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="uploads_ms/<?php echo $image['image'] ?>">
                        <img class="img-responsive" alt="" src="uploads_ms/<?php echo $image['image'] ?>" />
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $image['image'] ?></small>
                        </div> <!-- text-center / end -->
                    </a>
                    <form action="image_delete_ms.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $image['id']; ?>">
					  <input type="hidden" name="name" value="<?php echo $image['image']; ?>">
                      <input type="hidden" name="pmrn" value="<?php echo $pmrn; ?>">
                      <input type="hidden" name="eid" value="<?php echo $eid; ?>">
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