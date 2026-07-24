<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
include("auth.php"); 
require('db1.php');

if(isset($_POST['Submit']))
{
$xl=$_REQUEST['xl'];
$lx= implode(",",$xl);

$ins_query="insert into pres (`xl`) values ('$lx')";
mysqli_query($con,$ins_query) or die(mysql_error());
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap-select test page</title>

  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/bootstrap-select.css">

  <style>
    body {
      padding-top: 70px;
    }
  </style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="dist/js/bootstrap-select.js"></script>
</head>
<body>


<form action="" method="POST" style="border:medium #333333">
  <hr>

  <div class="form-group">
    <label for="tokens">Key words (data-tokens)</label>
    <select name="xl[]"  class="selectpicker form-control" multiple data-live-search="true">
       <?php 
			$sql = "select * from `investigastion`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->iname."'>".$row->iname."</option>";
				}
			}
			?>
															
    </select>
  </div>

  <hr>
  <div><button type="submit" name="Submit">Confirm</button></div>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
</form>
</body>
<?php echo $lx; ?>
</html>
