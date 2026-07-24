<?php
include("db1.php");
 
if(isset($_POST['but_uploads'])){
   $maxsize = 5242880; // 5MB
   if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
       $name = $_FILES['file']['name'];
	   
	   $loc1=$_REQUEST['loc'];
$loc= implode(",",$loc1);

       $target_dir = "hos_video/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($extension,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
             $_SESSION['message'] = "File too large. File must be less than 5MB.";
          }else{
             // Upload
             if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
               // Insert record
               $query = "INSERT INTO videos(name,vdo_address,loc) VALUES('".$name."','".$target_file."','".$loc."')";

               mysqli_query($con,$query);
               $_SESSION['message'] = "Upload successfully.";
             }
          }

       }else{
          $_SESSION['message'] = "Invalid file extension.";
       }
   }else{
       $_SESSION['message'] = "Please select a file.";
   }
   header('location: upload_video1.php');
   exit;
} 
?>
<!doctype html> 
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>



<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}
</style>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script src="./jquery.multiselect.js"></script>
<link href="./jquery.multiselect.css" rel="stylesheet" />
   
   <script src="jsnew/pprefixfree.min.js"></script>




   
   
   
   
</head>
  <body>

    <!-- Upload response -->
    <?php 
    if(isset($_SESSION['message'])){
       echo $_SESSION['message'];
       unset($_SESSION['message']);
    }
    ?>
    <form method="post" action="" enctype='multipart/form-data'>
      <label for="age"><strong>Select Video:</strong></label>
	  <input type='file' name='file' /><br><br>
	  
	  <label for="age"><strong>Select Location:</strong></label>
	   <select name="loc[]" id="pbp1" multiple="multiple" class="3col active" required>
						  
                          
			<option value="1st OPD">1st OPD</option>
		  <option value="2nd OPD">2nd OPD</option>
		  <option value="3rd OPD">3rd OPD</option>
		  <option value="4th OPD">4th OPD</option>
		  <option value="5th OPD">5th OPD</option>
		  
		  
		  </select>
		  
		  <script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 3,
            placeholder: 'Select Location',
            search: true,
            searchOptions: {
                'default': ''
            },
            selectAll: true
        });

    });
</script>	  
		  
	  <br><br>
      <input type='submit' value='Upload' name='but_uploads'>
    </form>

  </body>
</html>