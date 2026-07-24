<!DOCTYPE html>
<html>
<head>
<title>Demo</title>
<script src="js/jquery.js"></script>
<script>
$(document).ready(function(){
var url = window.location.href;
var params = url.split('?ID=');
var id = (params[1]);
     $("#submit").click(function(){ $.ajax({
        type:"POST",
        url:"demo.php",
        data:{id:id},
        success:function(result){
        $("#content").html(result);
        $("#submit").hide();
        }
        });
        });
   });
   </script>
</head>
<body>
<button id="submit">Click Me</button>
<div id="content"></div>

</body>
</html>
<?php
$random = $_POST["id"];
echo $random;
?>