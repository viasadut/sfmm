<?php
include("db1.php");
?>
<!doctype html>
<html>
  <head>
    <title>View Uploaded Video</title>
  </head>
  <body>
  
    <div>
 
     <?php
     $fetchVideos = mysqli_query($con, "SELECT * FROM videos ORDER BY id DESC");
     while($row = mysqli_fetch_assoc($fetchVideos)){
       $vdo_address = $row['vdo_address'];
       $name = $row['name'];
       echo "<div style='float: left; margin-right: 5px;'>
          <video src='".$vdo_address."' controls width='320px' height='320px' autoplay='autoplay'muted loop='true'></video>     
          <br>
          <span>".$name."</span>
       </div>";
     }
     ?>
 
    </div>

	
	
  </body>
</html>