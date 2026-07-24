<?php
include("auth.php"); 
require('db1.php');
?>

<!DOCTYPE html>

<html>
<title>Demo|Lisenme</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="1/css.css">   
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
h1,h2,h3,h4,h5,h6 {font-family: "Oswald"}
body {font-family: "Open Sans"}
</style>
      
    
<body>

<!-- Navigation bar with social media icons -->
<div class="w3-bar w3-black w3-hide-small">
  <a href="https://www.facebook.com/lisenme/" class="w3-bar-item w3-button"><i class="fa fa-facebook-official"></i></a>
  <a href="https://twitter.com/LisenMee" class="w3-bar-item w3-button"><i class="fa fa-twitter"></i></a>
  <a href="https://www.youtube.com/channel/UCEdC6Qk_DZ9fX_gUYFJ1tsA" class="w3-bar-item w3-button"><i class="fa fa-youtube"></i></a>
  <a href="https://plus.google.com/115714479889692934329" class="w3-bar-item w3-button"><i class="fa fa-google"></i></a>
  <a href="https://www.linkedin.com/in/lisen-me-b017a8137/" class="w3-bar-item w3-button"><i class="fa fa-linkedin"></i></a>
</div>
  
<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1600px">

  <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge"><a href="http://www.lisenme.com/"><img src="2/jquery-dropdown-checkbox/img/logo.jpg" alt="Girl Hat" style="width:20%" class="w3-padding-16"></a></h1>
    <h6>Welcome to our <span class="w3-tag">Tutorial</span></h6>

      
  </header>
  
  <!-- Image header -->
 

  <!-- Grid -->
  <div class="w3-row w3-padding w3-border">

    <!-- Blog entries -->
    <div class="w3-col l12 s12">
    
      <!-- Blog entry -->
      <div class="w3-container w3-white w3-margin w3-padding-large">
        
          
          
          
          
          <h1>jQuery Custom Dropdown with Checkbox</h1>
		
	<div id="checkbox-dropdown-container">
		<form id="fromCustomSelect" name="fromCustomSelect" action=""
			method="post">
			<div>
				<?php 
				    if(!empty($_POST["toys"])) { 
				    $selectedValues = implode(", ", $_POST["toys"]);
				?>
        			<div class="result-list">
            			<div class="result-list-heading">The selected options are: </div>
            			<div ><?php echo $selectedValues; ?></div>
        			</div>
        			<?php 
				    } 
				?>
				<div class="custom-select" id="custom-select">Select Multi Options...</div>
				<div id="custom-select-option-box">
					<div class="custom-select-option">
						<input onChange="toggleFillColor(this);"
							class="custom-select-option-checkbox" type="checkbox"
							name="toys[]" value="wordpress"> Wordpress
					</div>
					<div class="custom-select-option">
						<input onChange="toggleFillColor(this);"
							class="custom-select-option-checkbox" type="checkbox"
							name="toys[]" value="joomla"> Joomla
					</div>
					<div class="custom-select-option">
						<input onChange="toggleFillColor(this);"
							class="custom-select-option-checkbox" type="checkbox"
							name="toys[]" value="drupal"> Drupal
					</div>
					<div class="custom-select-option">
						<input onChange="toggleFillColor(this);"
							class="custom-select-option-checkbox" type="checkbox"
							name="toys[]" value="Magento"> Magento
					</div>
				</div>
			</div>
			<button type="submit" class="search btn" >Submit</button>
		</form>
	</div>
	<script src="2/jquery-dropdown-checkbox/jquery-3.2.1.min.js"></script>
	<script>
	$("#custom-select").on("click",function(){
		$("#custom-select-option-box").toggle();
	});
	function toggleFillColor(obj) {
		$("#custom-select-option-box").show();
		if($(obj).prop('checked') == true) {
			$(obj).parent().css("background",'#c6e7ed');
		} else {
			$(obj).parent().css("background",'#FFF');
		}
	}
	$(".custom-select-option").on("click", function() {
		var checkboxObj = $(this).children("input");
		$(checkboxObj).prop("checked",true);
		toggleFillColor(checkboxObj);
	});
		
	$("body").on("click",function(e){
		if(e.target.id != "custom-select" && $(e.target).attr("class") != "custom-select-option") {
			$("#custom-select-option-box").hide();
		}
	});
	</script>
          
            
      </div>
      
    </div>

  </div>

</div>

</body>
    
</html>
















 
