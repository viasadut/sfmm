<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('nurse','doctor','imo','lab')"; 
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

$ndate=date('Y-m-d');
	$t = strtotime("-2 days");
$ndate1= date("Y-m-d", $t);
$conn = new mysqli("localhost","root","Godiloveu16","sfmmkpjnew");
$sql2="select * from iinves where status='Data Updated' and type  in ('Lab','LAB','lab') and collect='0' and rstatus!='Cancelled'and ndate between '$ndate1' and '$ndate'";

$result=mysqli_query($conn, $sql2);
$count=mysqli_num_rows($result);

	

?>

<?php
	
	if(isset($_POST['but_update'])){
$dname=$_REQUEST['dname'];
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];

if(empty($_REQUEST['update']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}


            else {
                foreach($_POST['update'] as $updateid){
			$updateid;
			
      $treat=explode(',',$updateid);

  echo $pp=$treat[0];
  echo '<br />';
	echo $id=$treat[1];
  echo '<br />';
  echo $time=$treat[2];
  echo '<br />';

      $sql2="select * from inpatient where id='$updateid'";

$result=mysqli_query($conn, $sql2);
$data=mysqli_fetch_assoc($result);

/*echo $pmrn=$data['pmrn'];
echo $eid=$data['eid'];
echo $name=$data['pname'];
echo $dname;*/

			//$ins_query3="update iinves set `collect`='1' where id='".$updateid."'";
			//mysqli_query($con,$ins_query3) or die(mysql_error());
				
				
			}
			
			
			echo '<script language="javascript">';
    echo 'alert("'.$updateid.'"); ';
    echo '</script>';
	
			
	}
	}
	
	?>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lab Sample Receive Panel</title>
	<link rel="stylesheet" href="notification-demo-style.css" type="text/css">
	<script src="jsnew/jquery-2.1.1.min.js" type="text/javascript"></script>
	
	 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

	<script> 
$(document).ready(function(){
setInterval(function(){
      $("#here").load(window.location.href + " #here" );
}, 100000);
});
</script>
	<script type="text/javascript">

	function myFunction() {
		$.ajax({
			url: "view_notification_lab.php",
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
	<style>
table {
  width: 90%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 13px;
}

#myInput1 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 13px;
}



#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 13px;
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
   <li><a href='own_work_list'><span>Home</span></a></li>
      
		  		  
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
				 
				 
				 $sel7="Select COUNT(id) from iinves where status='Data Updated' and collect='0' and type in ('Lab','LAB','lab') and rstatus!='Cancelled'";

$resu7 = mysqli_query($con,$sel7);
$rw7 = mysqli_fetch_assoc($resu7);
				 
				 
				 
				 if($rw7['COUNT(id)']>0){
					 
					 $conn = new mysqli("localhost","root","Godiloveu16","sfmmkpjnew");
					 
					 
					 
					 
//$sql4="UPDATE noti SET sa='1' WHERE sa='0' and user in ('$user','all')";	
//$result4=mysqli_query($conn, $sql4);

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
<?php

require('db1.php');



$user=$_SESSION["sess_username"];

//$con = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');




if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
else{
//mysqli_select_db($con,"ajax_demo");


$ad3=date('d/m/Y H:i:s');

echo '





<table width="100%" height ="100%" border="1" align="center" background-color="lightgreen" style="border-collapse:collapse;" id="myTable">
 <tr>
      <th width="5%"><strong>S.No</strong></th>
      <th width="20%"><strong>Doctor Name</strong></th>
      <th width="75%"><strong>Patient Name</strong></th>

      

';

$date=date('Y-m-d');											
$today=date('Y-m-d');											
$date1=date('Y-m-d', strtotime ('-2 days'));

$sql="SELECT * FROM `doctor` WHERE status='Active'";


$result = mysqli_query($con,$sql);
$count=1;
while($row = mysqli_fetch_assoc($result)) {
	
	$dname=$row['dname'];
	
  echo "<tr>";
  
  
  
  
  echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $count . "</td>";
   echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $dname . "</td>";
   
  
$sql1="SELECT * FROM `inpatient` WHERE adoc='$dname' and discharge=''";


$result1 = mysqli_query($con,$sql1);
  
  //$row1 = mysqli_fetch_assoc($result1);
  
  if(mysqli_fetch_assoc($result1)==true){

    $row1 = mysqli_fetch_assoc($result1);
    $pp=$row1['pmrn'];
    $ee=$row1['eid'];
  
 
  
  echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>";
  
   $sql2="SELECT * FROM `inpatient` WHERE adoc='$dname' and discharge=''";


$result2 = mysqli_query($con,$sql2);
  
  
  while($row2 = mysqli_fetch_assoc($result2)) {
  $iidd=$row2['id'];
  $pp1=$row2['pmrn'];
  $ee1=$row2['eid'];

$morn_q="SELECT COUNT(id) FROM `icnote` WHERE pmrn='$pp' and eid='$ee' and user='$dname' and daten='$today'";
$result_mron = mysqli_query($con,$morn_q);
$row_morn=mysqli_fetch_assoc($result_mron);

    



  echo"<form name='frmMain1' action='' method='post'>";
  echo$row2['pname'].' ('.$row2['pmrn'].' )';
  echo"<br>";
  

  if($row_morn['COUNT(id)']=='0'){

    echo"<input type='checkbox' name='update[]' value='$pp1,$ee1,Morning' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    echo 'Morning';
    
    echo"<input type='checkbox' name='update[]' value='$pp1,$ee1,Evening' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    echo 'Evening';
    
    echo"<input type='checkbox' name='update[]' value='$pp1,$ee1,Emergency' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    echo 'Emergency';
    

    echo"<input type='hidden' name='dname' value='".$dname."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    echo"<input type='hidden' name='pmrn' value='".$pp1."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    echo"<input type='hidden' name='eid' value='".$ee1."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    
    echo"<br /><br />";
  }

  else if($row_morn['COUNT(id)']=='1'){

    echo"<input type='checkbox' name='update[]' value='Evening' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    echo 'Evening';
    
    echo"<input type='checkbox' name='update[]' value='Emergency' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    echo 'Emergency';
    
    echo"<br /><br />";
  }

  else if($row_morn['COUNT(id)']=='2'){

    
    echo"<input type='checkbox' name='update[]' value='Emergency' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    echo 'Emergency';
    
    echo"<br /><br />";
  }
  
  
  
  
  }

$sql22="SELECT * FROM `irefferal` WHERE infusion='$dname' and cstatus='Active' and status=''";


$result22 = mysqli_query($con,$sql22);
  
  
  while($row22 = mysqli_fetch_assoc($result22)) {
  $iidd2=$row22['id'];
  $pp2=$row22['pmrn'];
  $ee2=$row22['eid'];





$morn_q="SELECT COUNT(id) FROM `icnote` WHERE pmrn='$pp2' and eid='$ee2' and user='$dname' and daten='$today'";
$result_mron = mysqli_query($con,$morn_q);
$row_morn=mysqli_fetch_assoc($result_mron);

    



  echo"<form name='frmMain1' action='' method='post'>";
  echo$row22['pname'].' ('.$row22['pmrn'].' )';
  echo"<br>";
  

  if($row_morn['COUNT(id)']=='0'){

    echo"<input type='checkbox' name='update[]' value='$pp2,$ee2,Morning' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    echo 'Morning';
    
    echo"<input type='checkbox' name='update[]' value='$pp2,$ee2,Evening' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    echo 'Evening';
    
    echo"<input type='checkbox' name='update[]' value='$pp2,$ee,Emergency' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    echo 'Emergency';
    

    echo"<input type='hidden' name='dname' value='".$dname."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    echo"<input type='hidden' name='pmrn' value='".$pp1."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    echo"<input type='hidden' name='eid' value='".$ee1."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    
    echo"<br /><br />";
  }

  else if($row_morn['COUNT(id)']=='1'){

    echo"<input type='checkbox' name='update[]' value='Evening' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    echo 'Evening';
    
    echo"<input type='checkbox' name='update[]' value='Emergency' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    echo 'Emergency';
    
    echo"<br /><br />";
  }

  else if($row_morn['COUNT(id)']=='2'){

    
    echo"<input type='checkbox' name='update[]' value='Emergency' style='height:22px; width:22px;'>&nbsp;&nbsp;";
    echo 'Emergency';
    
    echo"<br /><br />";
  }
  

  
  
  }
  
  echo"
  <input type='submit' value='Confirm' name='but_update' class='btn btn-default' style='background-color:lightgreen'><i class='fas fa-times'></i>
  
  </td></form>";
  
 											
											



  
  
  echo "</tr>";

  $count++;
  }
}
echo "<form></table>";

mysqli_close($con);

}

//$cc=1;

?>
	</body>
	
	
	
<script>
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
	td = tr[i].getElementsByTagName("td")[3];
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
    
	td = tr[i].getElementsByTagName("td")[2];
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


