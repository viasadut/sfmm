<?php 
   session_start();
    require('../db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','staff','imo','mofficer','gpopd')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
require('../db1.php');
$pmrn = $_REQUEST['pmrn'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Patient Image</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="main.css">
    <style>
        p>audio,
        p>video,
        p>img{
            max-width:90%;
        }
    </style>
	
	<script src="../ckeditor_new/ckeditor.js"></script>
	
	
	
	 <script src="../jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="../jsnew/jquery-ui.css">
<script src="../jsnew/jquery.min.js"></script>
<script src="../jsnew/jquery-ui.min.js"></script>
  

  
  
  <link rel="stylesheet" href="../styles.css">
  <script type="text/javascript" src="../jquery-1.4.1.min.js"></script>
</head>
<body>
    <header>
        <h1>UPLOAD YOUR PHOTO HERE(MRN- <?php echo $pmrn;?>)</h1>
        
    </header>
    <main>
        <form action="storeImage2_dar.php" id="myform" enctype="multipart/form-data" method='POST'>
            <label for="capture"><strong>Capture Photo</strong></label>
            
            <input type="file" 
            id="capture" name="test" required>
            
            <br/>
			<br/>
			<label for="capture"><strong>Category</strong></label>
			<select name="cat" required class="form-control">
        					
						<option value='Dermascopy Image'>Dermascopy Image</option>
						
						
						
						
						
						
				
</select>
<input type="hidden" name="mrn" value="<?php echo $pmrn;?>">
				
			
			<br/>
			<br/>
			
			<label for="age"><strong>Remarks:</strong></label><br>
     
	  
	    <div>
                                           <textarea name="remarks" class="form-control" placeholder="Remarks"rows="10"cols="10"required></textarea>
                                               
										 
                                    </div>
                                </div>
								
								
  
  <script>
        CKEDITOR.replace( 'remarks' );
        $("form").submit( function(e) {
            var messageLength = CKEDITOR.instances['remarks'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                alert( 'Please enter a Remarks' );
                e.preventDefault();
            }
        });
    </script>
   <br/>
			<br/>
            <input type="submit" value="Upload" name="submit">
        </form>
        <p><img src="" id="img" name="img"></p>
        
        
    </main>    
    <script>
        
        document.addEventListener('DOMContentLoaded', (ev)=>{
            let form = document.getElementById('myform');
            //get the captured media file
            let input = document.getElementById('capture');
            
            input.addEventListener('change', (ev)=>{
                console.dir( input.files[0] );
                if(input.files[0].type.indexOf("image/") > -1){
                    let img = document.getElementById('img');
                    img.src = window.URL.createObjectURL(input.files[0]);
                }
                else if(input.files[0].type.indexOf("audio/") > -1 ){
                    let audio = document.getElementById('audio');
                    audio.src = window.URL.createObjectURL(input.files[0]);
                }
                else if(input.files[0].type.indexOf("video/") > -1 ){
                    let video = document.getElementById('video');
                    video.src=window.URL.createObjectURL(input.files[0]);
                }
                
                
            })
            
        })
    </script>
</body>
</html>