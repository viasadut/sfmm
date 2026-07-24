<?php
require('db1.php');
//$pmrn=$_REQUEST['ono'];

//echo $count1;


 $encryption=$_REQUEST['ono'];
    $options = 0;
    $ciphering = "AES-128-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "kpj";
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    $pmrn = $decryption;
	
	
	$encryption1=$_REQUEST['eid'];
    $options1 = 0;
    $ciphering1 = "AES-128-CTR";
    $decryption_iv1 = '123esed';
    $decryption_key1 = "kpj1";
    $decryption1=openssl_decrypt ($encryption1, $ciphering1,
    $decryption_key1, $options1, $decryption_iv1);
    $eid4 = $decryption1;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Quotation Upload</title>
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


    <h3>Request NO: <?php echo $encryption1?></h3>
    


    <div class="row">
    <div class='list-group gallery'>


            <?php
            require('db1.php');

			
			
			$sel_query="Select * from po_gallery where pmrn='$encryption' and eid='$encryption1';";
			$result = mysqli_query($con,$sel_query);
            //$sql = "SELECT * FROM image_gallery";
            //$images = $mysqli->query($sql);


            while($image = $result->fetch_assoc()){


            ?>
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="popic/<?php echo $image['image'] ?>">
                        <img class="img-responsive" alt="" src="popic/<?php echo $image['image'] ?>" />
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $image['image'] ?></small>
                        </div> <!-- text-center / end -->
                    </a>
                    <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $image['id'] ?>">
					<input type="hidden" name="poid" value="<?php echo $eid ?>">
					<input type="hidden" name="ono" value="<?php echo $pmrn ?>">
					  <input type="hidden" name="name" value="<?php echo $image['image'] ?>">
                    
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
       
</html>