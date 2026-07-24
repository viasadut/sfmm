<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
        header('Location: login2?err=2');
    }
?>
<?php
// Turn off all error reporting
error_reporting(0);
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
// header("Refresh: 20; URL=$url1");
?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());
// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];
$query3 = "SELECT * FROM staff3 where sname= '$fullname'"; 	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error($con));

// Print out result
$row7 = mysqli_fetch_array($result3);
$dept=$row7['dept'];
//echo $dept;
?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$query3 = "SELECT * FROM incident1 where itype= 'Clinical'"; 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());
// Print out result
$row7 = mysqli_fetch_array($result3);
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <title>View Records</title>
    <link rel="stylesheet" href="css/style2.css">
    <style type="text/css">
    <!--
    .style1 {
        font-size: x-large;
        font-weight: bold;
        font-style: italic;
    }
    -->
    div1
    {
    height:
    40px;
    width:
    30%;
    background-color:
    powderblue;
    }
    </style>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
    
</head>
<body>
    <div id='cssmenu'>
        <ul>
            <li><a href='viewnew11'><span>Home</span></a></li>
            <li class='last'><a href='leaveprint1'><span>Print Approved Leave</span></a></li>
            <li class='last'><a href='viewleave'><span>Leave Balance</span></a></li>
            <li class='last'><a href='leavestatsadm'><span>Consultant Wise Leave Stats</span></a></li>
            <li class='last'><a href='tadmleave'><span>Today's Present Consultant List</span></a></li>
            <li class='last'><a href='attnstatsadm'><span>Consultant Wise Attendance Stats</span></a></li>
            <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
        </ul>
    </div>
    <p align="center" class="style1">Todays Staff's Attendance Status </p>
    <div class="container">

     	    <form action="" method="post">
                <!-- <div class="col-md-3"></div> -->
                <div class="form-group col-md-6">
		        <!-- Department dropdown -->

		        <label for="department">Department</label>
			    <select class="form-control" id="department">
			        <option value="">Select Department</option>
                    <?php 
                        $query = "SELECT distinct(dept) FROM staff3";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row["dept"]}'>{$row['dept']}</option>";
                                }
                                }else{
                            echo "<option value=''>Department not available</option>"; 
                        }
                    ?>
                </select>

			     	<!-- Employee dropdown -->
			    	<label for="Employee">Employee</label>
			    	<select class="form-control" id="emp">
			     	    <option value="">Select Employee</option>
			    	</select><br>

			    	 

			  	</div>
                  
			</form>
            <div class="col-md-6"></div>
            </div>


<div class="container">
    <div class="row">
        <div id="result"></div>

    </div>
</div>
        

<script type="text/javascript">
        $(document).ready(function(){
            load_data();

        function load_data(query){
            $.ajax({
            url:"selectemployee.php",
            method:"POST",
            data:{query:query},
            success:function(data){
                $('#result').html(data);
            }
            });
        }
        $('#department').on("change",function(){
            var search = $(this).val();
            if(search != ''){
                load_data(search);
            }
            else{
                load_data();
            }
        });
        $('#emp').on("change",function(){
            var search = $(this).val();
            alert(search);
            if(search != ''){
                load_data(search);
            }
            else{
                load_data();
            }
        }); 
		$("#department").on("change",function(){
			var departmentId = $(this).val();
            
			if (departmentId) {
				$.ajax({
					url :"selectemployee.php",
					type:"POST",
					cache:false,
					data:{departmentId:departmentId},
					success:function(data){
						$("#emp").html(data);
					}
				});
			}else{
				$('#department').html('<option value="">Select Department</option>');
			}
		});
	});
</script>
</body>
</html>