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
       echo "<div  style='float: left; margin-right: 5px;'>
            <video id='myvideo' width='320' height='240' controls style='background:black'>
  
  <source class='active'src='".$vdo_address."' />
</video>
		  
		
          <br>
          <span>".$name."</span>
       </div>";
     }
     ?>
 
    </div>

	  <script>
  
  var myvid = document.getElementById('myvideo');

myvid.addEventListener('ended', function(e) {
  // get the active source and the next video source.
  // I set it so if there's no next, it loops to the first one
  var activesource = document.querySelector("#myvideo source.active");
  var nextsource = document.querySelector("#myvideo source.active + source") || document.querySelector("#myvideo source:first-child");
  
  // deactivate current source, and activate next one
  activesource.className = "";
  nextsource.className = "active";
  
  // update the video source and play
  myvid.src = nextsource.src;
  myvid.play();
});
  </script>
	
  </body>
</html>