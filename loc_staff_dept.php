<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('store','staff','ot','nurse','imo','mofficer','emergency','mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php
require('db1.php');
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];


?>

<?php

require('db1.php');

$user=$_SESSION['sess_username'];


$query40 = "SELECT * FROM staff3 where sid= '$user'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);

$dept=$row40['dept'];




//$loc=$_REQUEST['loc'];
//$date3=$_REQUEST['date'];

//$dreffer=$_REQUEST['dreffer'];
//$dname1=$_REQUEST['dname1'];






/*$query = "SELECT * from roaster where id='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row_r = mysqli_fetch_assoc($result);
$ddate=$row_r['date'];*/
$ddate1=date('d/m/Y h:i:s');
  
?>


<?php
 
require('db1.php');

if(isset($_POST['Submit']))
{
$loc=$_REQUEST['loc'];	
$pbp1 = implode(",",$_POST["pbp1"]);
$pbp1_1 = implode(",",$_POST["pbp1_1"]);
$pbp1_2 = implode(",",$_POST["pbp1_2"]);
$r_date=date('Y-m-d',strtotime($_REQUEST['r_date']));	  
/*$sel="SELECT * FROM alltest where pmrn= '$pmrn' and type='spd1' and medi='ECHO IMAGING' and status='' and date1='$datenew';"; 
$result = mysqli_query($con,$sel);

if($res3=mysqli_num_rows($result)>0)
{
 	
    echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!The patient Already Have pending Echo Request"); ';
    echo '</script>';
    }

else {*/


$query = " insert into roaster_1 (`emor`,`mor`,`late`,`night`,`aby`,`location`,`dept`,`date`,`adate`) values 
('$pbp1','$pbp1','$pbp1_1','$pbp1_2','$user','$loc','$dept','$r_date','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
           $message = 'Data Updated';  

		   
//$update="update ecgapp set status='SEEN' where `id`='$id'";
//mysqli_query($con,$update);



	  
	  
$treat=explode(',',$pbp1);
$treat1=explode(',',$pbp1_1);
$treat2=explode(',',$pbp1_2);
//$treat2=explode(',',$pbp3);

foreach ($treat as $item) {
	    $item = trim($item);
		
		
		
		
$querycz = "SELECT COUNT(mor) FROM roaster_2 where date ='$r_date' and mor='$item' and emor='Morning'"; 
$resultcz = mysqli_query($con, $querycz) or die(mysqli_error());
$rowcz = mysqli_fetch_array($resultcz);
$c1z=$rowcz['COUNT(mor)'];


if($c1z>0)
      
{
 	
       
    }
		else {
		$query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`) values 
('Morning','$item','$user','$loc','$dept','$r_date','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
		}
}


foreach ($treat1 as $item1) {
	    $item1 = trim($item1);
		
		
		$querycz = "SELECT COUNT(mor) FROM roaster_2 where date ='$r_date' and mor='$item' and emor='Late'"; 
$resultcz = mysqli_query($con, $querycz) or die(mysqli_error());
$rowcz = mysqli_fetch_array($resultcz);
$c1z=$rowcz['COUNT(mor)'];


if($c1z>0)
      
{
 	
       
    }
		else {
		
		$query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`) values 
('Late','$item1','$user','$loc','$dept','$r_date','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
		}

}

foreach ($treat2 as $item2) {
	    $item2 = trim($item2);
		
		$querycz = "SELECT COUNT(mor) FROM roaster_2 where date ='$r_date' and mor='$item' and emor='Night'"; 
$resultcz = mysqli_query($con, $querycz) or die(mysqli_error());
$rowcz = mysqli_fetch_array($resultcz);
$c1z=$rowcz['COUNT(mor)'];


if($c1z>0)
      
{
 	
       
    }
		else {
		$query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`) values 
('Night','$item2','$user','$loc','$dept','$r_date','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
		}

}


//header("Location: roaster_11?date=$date3");

}
?>
<?php 
$query39 = "SELECT * FROM radreport where pmrn= '$pmrn' and eid='$count1'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$dname3=$row39['dname'];

?>

<?php
if(isset($_POST['submit10']))
{
 
$staff = implode(",",$_POST["staff"]);
$l_name           = $_REQUEST['l_name']; 

               if($staff !=''){
				   
				   $staff1=explode(',',$staff);
//$treat2=explode(',',$pbp3);

foreach ($staff1 as $staff_1) {
	//    $staff_1 = trim($staff_1);
				   
				   
            $ins_query="update roaster_location set s_name='$staff' where loc='$l_name' and dept='$dept'";
            mysqli_query($con,$ins_query);
			
			
			$ins_query_s="update staff3 set c_location='$l_name' where sid='$staff_1'";
            mysqli_query($con,$ins_query_s);
			
                
                //header("location:departments.php?alert=$alert");
            
			
}
        
			   }		else {
                $alert = 'error';
                echo "error";
            }
        
    }
            


?>


<?php
if(isset($_POST['submit9']))
{
 
$loc1           = $_POST['loc1']; 

               if($loc1 !=''){
            $ins_query="INSERT INTO roaster_location (
                    `loc`,`dept`
                    
                ) VALUES(
                    '$loc1','$dept'
                    
                )";
            if (mysqli_query($con,$ins_query) == true) {
                $alert = 'success';
                //header("location:departments.php?alert=$alert");
            }
            else {
                $alert = 'error';
                echo "error";
            }
        }
    }
            


?>

<?php
if(isset($_POST['submit_edit']))
{
 $nid1=$_REQUEST['nid1'];
$loc1           = $_POST['loc1']; 

               if($loc1 !=''){
            $ins_query="Update roaster_location set loc='$loc1' where id='$nid1'";
            if (mysqli_query($con,$ins_query) == true) {
                $alert = 'success';
                //header("location:departments.php?alert=$alert");
            }
            else {
                $alert = 'error';
                echo "error";
            }
        }
    }
            


?>

<?php
if(isset($_POST['submit_assign']))
{
 
$staff = implode(",",$_POST["staff"]);
$l_name           = $_REQUEST['l_name3']; 
$sid3           = $_REQUEST['sid3']; 

               if($staff !=''){
				   
				   $staff1=explode(',',$staff);
//$treat2=explode(',',$pbp3);

foreach ($staff1 as $staff_1) {
	//    $staff_1 = trim($staff_1);
				   
				   
            $ins_query="update roaster_location set s_name='$staff' where id='$sid3'";
            mysqli_query($con,$ins_query);
			
			
			$ins_query_s="update staff3 set c_location='$l_name' where sid='$staff_1'";
            mysqli_query($con,$ins_query_s);
			
                
                //header("location:departments.php?alert=$alert");
            
			
}
        
			   }		else {
                $alert = 'error';
                echo "error";
            }
        
    }
            


?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>DID REPORT</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <style>

html { box-sizing: border-box; }

*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito',sans-serif;
  color: #384047;
  background: #A085C6;
}

form {
  max-width: 2000px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
  border: 1px solid #8265B0;
  box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}


input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #A085C6;
  /*#5fcf80*/
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

abbr[title] {
	border-bottom-width: 0;
}


@media screen and (min-width: 480px) {

  form {
    max-width: 2000px;
  }

}


.container {
  width: 100%;
  
  background: white;
  margin: auto;
  padding: 10px;
}

.one {
  width: 50%;
  padding: 10px;
  
  float: left;
}

.two {
	padding: 10px;
  margin-left: 15%;
  width: 50%;
  
}
      </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
      <script src="./jquery.multiselect.js"></script>
	  
	  
	  
	  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>



  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='tesrad'><span>Home</span></a></li>
      <li><a href='radapp'><span>Appointment</span></a></li>
      
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='last'><a href='todayreport'><span>Today's Report</span></a></li>
		 <li class='has-sub'><a href='donereport'><span>Search Done Reports</span></a>
		 <li class='has-sub'><a href='allreport'><span>Datewise All Done Report </span></a>
            <li class='last'><a href='raddtsearch2'><span>Patients pending Report Search</span></a></li>
			<li class='last'><a href='radapp22'><span>Patients Appointment Report</span></a></li>
         </li>
		 
      </ul>
   </li>
	  <li class='last'><a href='radview1'><span>Pending Reports</span></a></li>
	  	  <li class='last'><a href='viewnewrad'><span>Search Pervious Patients</span></a></li>
		  <li class='last'><a href='rpapp22'><span>New Patients</span></a></li>
		  <li class='last'><a href='raddtsearch'><span>Patients pending request Search</span></a></li>
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center"><?php echo $row_r['date'];?></h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		
<section class="content">
        <div class="container-fluid">
            <!-- <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default">
                Add New Department <i class="fas fa-plus"></i>
            </button> -->
            
                <div class="row">
                    <h3>
                        <?php echo $hod_user_dept_data["name"]; ?>
                    </h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Roaster Location</h3>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#product_view">
                                    Add New Location <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
								
								
                                    <tr>
                                        <th>Location Name</th>
                                    </tr>
                                </thead>
                                
									<?php
                                        
											
											
									$type_query = "SELECT * FROM `roaster_location` WHERE dept='$dept'";
	 
$run_type = mysqli_query($con, $type_query) or die(mysqli_error());

while($row = mysqli_fetch_array($run_type))
{
// Print out result

		
                                    ?>
								
                                    <tr>
                                       <td><button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#product_view_edit<?php echo $row["id"];?>">
                                    <?php echo $row["loc"] ;?> <i class="fas fa-plus"></i>
                                </button></td>
                                    </tr>
									
									<div class="modal fade product_view" id="product_view_edit<?php echo $row["id"];?>">
            <div class="modal-dialog">
                <div class="modal-content">
				
				<?php
				$nid=$row['id'];
	$type = "SELECT * FROM `roaster_location` WHERE id='$nid'";
	 
$run = mysqli_query($con, $type) or die(mysqli_error());
$row_n = mysqli_fetch_array($run);
$nloc=$row_n['loc'];
		
				?>

                    <div class="modal-header">
<a href="#" data-dismiss="modal" class="class pull-right"><span
                            class="glyphicon glyphicon-remove"></span></a>
                        <h4 class="modal-title">Edit Location</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" action=""  method="post"">
                        <div id="modal-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Edit Location:</label>
                                <div class="col-sm-12">
                                    
											 <input type="text" name="loc1" id="loc" class="form-control" value="<?php echo $nloc;?>" required>
											 <input type="hidden" name="nid1" id="nid1" class="form-control" value="<?php echo $nid;?>" required>
						
            
	
									
									
                                </div>
                            </div>

							
							
                            
                        <div class="modal-footer justify-content-between">
                            
                            <button name="submit_edit" type="submit" id="btn-submit" class="btn btn-info">Save  <i class="fas fa-save"></i></button><br>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fas fa-times"></i></button>
                        </div>
                    </form>
                </div>
            </div>
 
       </div>
        </div>	
		
									
									
                                     <?php }  ?>
                                </table>        
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Staff List Based on Location</h3>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#product_view1">
                                    Assign Staff to a Location <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="card-body">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Assign Staff by Location</th>
                                    </tr>
                                </thead>
                                    <?php
                                        $type_query = "SELECT * FROM `roaster_location` WHERE dept='$dept'";
                                        $run_type = $con->query($type_query) or die("".$con->error);
                                        while ($row = $run_type->fetch_object()){
                                    ?>
                                    <tr>
                                        
										
										
										
										
										<td><button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#product_view_edit_assign<?php echo $row->id;?>">
                                    <?php echo $row->loc ;?> <i class="fas fa-plus"></i>
                                </button></td>
										
										
										
										
										
										
										<td><?php 
										$tr=$row->s_name;
										$treat=explode(',',$tr);
										foreach ($treat as $item) {
											$item = trim($item);
											
											$query0 = "SELECT * FROM staff3 where sid= '$item'"; 
	 
$result0 = mysqli_query($con, $query0) or die(mysqli_error());
$row0 = mysqli_fetch_array($result0);

										echo $row0['sname'].'<br>';
										
										}
										
										
										//echo $row->s_name ;?></td>
                                    </tr>
									
									<div class="modal fade product_view" id="product_view_edit_assign<?php echo $row->id;?>">
									<?php
									$sid3=$row->id;
									$query00 = "SELECT * FROM roaster_location where id= '$sid3'"; 
	 
$result00 = mysqli_query($con, $query00) or die(mysqli_error());
$row00 = mysqli_fetch_array($result00);
									
									?>
									
									
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Staff To A Location</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" action=""  method="post"">
                        <div id="modal-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Department Name:</label>
                                <div class="col-sm-12">
                                    
												 <input type="text" name="l_name3" id="l_name3" class="form-control" value="<?php echo $row00['loc'];?>" readonly>
												 <input type="hidden" name="sid3" id="sid3" class="form-control" value="<?php echo $row00['id'];?>" readonly>
		
									
									
                                </div>
                            </div>
                            <div class="form-group row">
                            
							<label>Select Staff</label>  
				 <select type="text" name="staff[]" id="staff" multiple="multiple" class="3col active" required value="">
					<option value='<?php echo $row00['s_name'];?>' selected><?php echo $row00['s_name'];?></option>	
            

<?php 
	  
	   		
			$sql = "Select * from staff3 where dept='$dept' and status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sid."'>".$row->sname."</option>";
				}
			}
			
			?>
		  </select>
							
                            </div>
							
							
                            
                        <div class="modal-footer justify-content-between">
                            <button name="submit_assign" type="submit" id="btn-submit" class="btn btn-info">Save  <i class="fas fa-save"></i></button><br>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fas fa-times"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	

						 
							 <script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 3,
            placeholder: 'Select Nurse',
            search: true,
            searchOptions: {
                'default': ''
            },
            selectAll: true
        });

    });
</script>	   
									
										<?php } ?>
                                </table>        
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </div>
  
		</div>
	</div>	  
	</section>



	
	

	<div class="modal fade product_view" id="product_view">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
<a href="#" data-dismiss="modal" class="class pull-right"><span
                            class="glyphicon glyphicon-remove"></span></a>
                        <h4 class="modal-title">Create New Location</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" action=""  method="post"">
                        <div id="modal-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Create Location:</label>
                                <div class="col-sm-12">
                                    
											 <input type="text" name="loc1" id="loc" class="form-control" required>
						
            
	
									
									
                                </div>
                            </div>

							
							
                            
                        <div class="modal-footer justify-content-between">
                            
                            <button name="submit9" type="submit" id="btn-submit" class="btn btn-info">Save  <i class="fas fa-save"></i></button><br>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fas fa-times"></i></button>
                        </div>
                    </form>
                </div>
            </div>
 
       </div>
        </div>
		
		
		
		
		
	
	
		
		
		
		
		
		
	
	
	<div class="modal fade product_view" id="product_view1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Assign Staff To A Location</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" action=""  method="post"">
                        <div id="modal-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Department Name:</label>
                                <div class="col-sm-12">
                                    
											 <select type="text" name="l_name" id="l_name" class="form-control" required>
						
            
			
<?php 
	  
	   		
			$sql = "Select * from roaster_location where dept='$dept'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			
			?>
		  </select>
		
									
									
                                </div>
                            </div>
                            <div class="form-group row">
                            
							<label>Select Staff</label>  
				 <select type="text" name="staff[]" id="staff" multiple="multiple" class="3col active" required>
						
            

<?php 
	  
	   		
			$sql = "Select * from staff3 where dept='$dept' and status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sid."'>".$row->sname."</option>";
				}
			}
			
			?>
		  </select>
							
                            </div>
							
							
                            
                        <div class="modal-footer justify-content-between">
                            <button name="submit10" type="submit" id="btn-submit" class="btn btn-info">Save  <i class="fas fa-save"></i></button><br>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fas fa-times"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	

						 
							 <script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 3,
            placeholder: 'Select Nurse',
            search: true,
            searchOptions: {
                'default': ''
            },
            selectAll: true
        });

    });
</script>	   
														




	  				


</body>

</html>
