<?php

session_start();
$user = $_SESSION['sess_username'];
require('db1.php');
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$query43 = "SELECT COUNT(pmrn) FROM consent_form where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;
//echo $count1;
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Other Form Upload</title>
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
   <table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr>
      
      <th width="17%"><strong>Patient MRN</strong></th>
      <th width="10%"><strong>EID</strong></th>
      <th width="15%"><strong>Type</strong>
      <th width="14%"><strong>Document</strong>   
      

	   </tr>

    <div class="row">
    <div class='list-group gallery'>


            <?php
            require('db1.php');

			
			
			$sel_query="Select * from other_doc_form order by id desc;";
			$result = mysqli_query($con,$sel_query);
            //$sql = "SELECT * FROM image_gallery";
            //$images = $mysqli->query($sql);


            while($image = $result->fetch_assoc()){


            ?><tr>
			<td><?php echo $image['pmrn'];?></td>
			<td><?php echo $image['eid'];?></td>
			<td><?php echo $image['type'];?></td>
               <td> <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="other_doc_pic/<?php echo $image['file'] ?>">
                        <img class="img-responsive" alt="" src="other_doc_pic/<?php echo $image['file'] ?>" />
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $image['file'] ?></small>
                        </div> <!-- text-center / end -->
                    </a>
                   
				
</tr>				<!-- col-6 / end -->
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