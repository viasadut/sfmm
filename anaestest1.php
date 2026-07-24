<!DOCTYPE html>
<html>
<head>
<script src="jsnew/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $('#dropdown').change(function() {
    if( $(this).val() == 1) {
        $('#textInput').prop( "disabled", false );
    } else {       
        $('#textInput').prop( "disabled", true );
    }
});
});
</script>
</head>
<body>

<select id='dropdown'>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
</select>
<input type="text" id="textInput" />
</body>
</html>
