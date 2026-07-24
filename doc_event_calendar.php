<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','moopd')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<html>

<head>

<link rel="stylesheet" href="doc_cal/fullcalendar.css" />
  <link rel="stylesheet" href="doc_cal/bootstrap.css" />
  <script src="doc_cal/jquery.min.js"></script>
  <script src="doc_cal/jquery-ui.min.js"></script>
  <script src="doc_cal/moment.min.js"></script>
  <script src="doc_cal/fullcalendar.min.js"></script>
  
  
   <link rel="stylesheet" href="styles.css">
   
   <script src="script.js"></script>

</head>


<div id='cssmenu'>
<ul>
   <li><a href='own_work_list'><span>Home</span></a></li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
   
</ul>
</div>

				
				<script>
				
				
				
			
$(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'load_cal_doc.php',
    selectable:true,
    selectHelper:true,
    

   });
  });

</script>
<body>
<div class="container" align="right" style="font-size:22px; color:red; font-weight:bold;"><a href='con_work_self_test.php'>Set Procedure</a>
   <div id="calendar"></div>
  </div>
</body>
</html>