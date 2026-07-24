<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','nurse','doctor','imo')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
	
	$user=$_SESSION["sess_username"];
	$test=$_SESSION['user_session_id'];
?>

<?php
$conn = new mysqli("localhost","root","Godiloveu16","sfmmkpjnew");
$sql2="select * from noti where user in ('$user','all') and status='1'";

$result=mysqli_query($conn, $sql2);
$count=mysqli_num_rows($result);


?>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>IMO PANEL</title>
	<link rel="stylesheet" href="notification-demo-style.css" type="text/css">
	<script src="jsnew/jquery-2.1.1.min.js" type="text/javascript"></script>
	
	 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
	
	<script> 
$(document).ready(function(){
setInterval(function(){
      $("#here").load(window.location.href + " #here" );
}, 50000);
});
</script>
	<script type="text/javascript">

	function myFunction() {
		$.ajax({
			url: "view_notification.php",
			type: "POST",
			processData:false,
			success: function(data){
				$("#notification-count").remove();					
				$("#notification-latest").show();$("#notification-latest").html(data);
			},
			error: function(){}           
		});
	 }
	 
	 $(document).ready(function() {
		$('body').click(function(e){
			if ( e.target.id != 'notification-icon'){
				$("#notification-latest").hide();
			}
		});
	});
		 
	</script>
	<script>
function showUser() {
 
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getuser22_test1_26_covid.php",true);
  xmlhttp.send();
}

showUser()
setInterval(function(){
showUser()

},50000);
</script>
	<style type="text/css">


div1 {
  height: 20px;
  width: 20%;
  border: 1px solid #4CAF50;
  float: right;
  
}


#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myInput1 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}



#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

</style>
<link rel="stylesheet" href="styles.css">
	</head>
	<body>
	
	<div id='cssmenu' style="position: relative;top:5px;">
<ul>
   <li><a href='viewnewimo'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

	
	
	<div class="demo-content">
		<div id="notification-header">
			   <div style="position:relative" id='here'>
			   <button style="width:100px;"id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><img src="bell.png" style="width:30px;height:30px;"><span id="notification-count">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($count>0) { echo"<span style='font-weight:bold;font-size:15px;'>(".$count.")</span>"; } ?></span>
			</button>
				 <div id="notification-latest"></div>
				 
				 <?php 
				 
				 
				 $sel7="Select COUNT(id) from noti where user in ('all','$user') and sa='0'";

$resu7 = mysqli_query($con,$sel7);
$rw7 = mysqli_fetch_assoc($resu7);
				 
				 
				 
				 if($rw7['COUNT(id)']>0){
					 
					 $conn = new mysqli("localhost","root","Godiloveu16","sfmmkpjnew");
					 
					 
					 
					 
$sql4="UPDATE noti SET sa='1' WHERE sa='0' and user in ('$user','all')";	
$result4=mysqli_query($conn, $sql4);

					 echo '<audio autoplay>
  <source src="audio/fb_noti.mp3" type="audio/mpeg">
  <source src="audio/fb_noti.ogg" type="audio/ogg">
 
</audio>';
				 
				 }?>
				</div>			
		</div>
	<?php if(isset($message)) { ?> <div class="error"><?php echo $message; ?></div> <?php } ?>


	<?php if(isset($success)) { ?> <div class="success"><?php echo $success;?></div> <?php } ?>

	
		</div>
		<p align="center" class="style1" style="background-color:lightgreen;font-size:22px;font-weight:bold;"><?php echo $user; ?>'s In-Patient list



</p>

<div style="text-align:right">
<input style="background-color: lightblue; width:250px;" type="text" id="myInput" onkeyup="myFunction2()" placeholder="Search by Ward" title="Search by Ward"><input style="background-color: lightgreen;width:250px;" type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search by Consultant" title="Search by Consultant">
</div>
<div id="txtHint" style="background-color:gold;font-size:22px;font-weight:bold;width:100%;"><b>Please Wait Patient List is Loading...</b></div>
	</body>
	
	
	
<script>
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
	td = tr[i].getElementsByTagName("td")[7];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


<script>
function myFunction1() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
	td = tr[i].getElementsByTagName("td")[6];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</html><script>
/*
function check_session_id()
{
    var session_id = "<?php echo $test; ?>";

    fetch('check_login.php').then(function(response){

        return response.json();

    }).then(function(responseData){

        if(responseData.output == 'logout')
        {
            window.location.href = 'logout_new.php';
        }

    });
}

setInterval(function(){

    check_session_id();
    
}, 10000);
*/
</script>


