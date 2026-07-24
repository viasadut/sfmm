<?php
require('db1.php');

$id=$_REQUEST['id'];
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


    <h3>Proposal ID: <?php echo $id?></h3>
    


    <div class="row">
    <div class='list-group gallery'>


            <?php
            require('db1.php');

			
			
			$sel_query="Select * from proposal_files where ticket_id='$id';";
			$result = mysqli_query($con,$sel_query);
            //$sql = "SELECT * FROM image_gallery";
            //$images = $mysqli->query($sql);


            while($image = $result->fetch_assoc()){


            ?>
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="proposal/uploads/<?php echo $image['file_name'] ?>">
                        <img class="img-responsive" alt="" src="proposal/uploads/<?php echo $image['file_name'] ?>" />
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $image['file_name'] ?></small>
                        </div> <!-- text-center / end -->
                    </a>
                    
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
        
</html>