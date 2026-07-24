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
//session_start();
//index.php

include('database_connection.php');

//require('dbconfig.php');

$query = "
SELECT * FROM user 
ORDER BY id ASC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

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


$loc=$_REQUEST['loc'];
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
('$pbp1','$pbp1','$pbp1_1','$pbp1_2','$user','$loc','Nursing','$r_date','$ddate1')";  
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
('Morning','$item','$user','$loc','Nursing','$r_date','$ddate1')";  
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
('Late','$item1','$user','$loc','Nursing','$r_date','$ddate1')";  
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
('Night','$item2','$user','$loc','Nursing','$r_date','$ddate1')";  
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
 
$name           = $_POST['name']; 

               if($name !=''){
            $ins_query="INSERT INTO roaster_location (
                    `dept`
                    
                ) VALUES(
                    '$name'
                    
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

	  
	  
	  
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

	  
	  
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
		
<section class="container">
  <div class="one">




<!-- Form Title -->

<a type="button" onclick="setEventId(1)" class="btn btn-primary" data-toggle="modal"
                                    data-target="#product_view" href="javascript:void(0)">
                                    <i class="fa fa-search"></i> Read more</a>
		
		<label>Select Date</label> 
			
		  
	</div>	  
	
	
	
	<div class="one">


<a type="button" onclick="setEventId(1)" class="btn btn-primary" data-toggle="modal"
                                    data-target="#product_view1" href="javascript:void(0)">
                                    <i class="fa fa-search"></i> Read more</a>

	
		
		<label>Select Date</label> 
		
	</div>	  
	</section>



	
	<div class="modal fade product_view" id="product_view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <a href="#" data-dismiss="modal" class="class pull-right"><span
                            class="glyphicon glyphicon-remove"></span></a>
                 <br>
				 <form id="test">
				 
				 <label>Location</label> 
	  <select type="text" name="loc" id="loc" class="form-control" required>
				
                          
			<?php 
			$sql = "Select * from roaster_location;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>

				 
				 <label>Select Staff</label>  
				 <select type="text" name="pbp1_2[]" id="pbp1" multiple="multiple" class="3col active" required>
						
            

<?php 
	  
	   		
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sid."'>".$row->sname."</option>";
				}
			}
			
			?>
		  </select>
		  
		  
		  
		  <button type="submit" name="Submit9">Confirm</button>
		  </form>
            </div>

            </div>
        </div>
    </div>
	
	
	<div class="modal fade product_view" id="product_view1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Department</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" action=""  method="post"">
                            <div class="container">
      <h3 align="center">Dynamic Dependent Searchable Select Box with PHP Ajax jQuery</h3>
      <br />
      <div class="panel panel-default">
        <div class="panel-heading">Select Data</div>
        <div class="panel-body">
          <div class="form-group">
            <label>Select Category</label>
            <select name="category_item" id="category_item" class="form-control " data-live-search="true" title="Select Category">

            </select>
          </div>
          <div class="form-group">
            <label>Select Sub Category</label>
            <select name="sub_category_item" id="sub_category_item" class="form-control" data-live-search="true" title="Select Sub Category">

            </select>
          </div>
        </div>
      </div>
    </div>

                            
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fas fa-times"></i></button>
                            <button name="submit10" type="submit" id="btn-submit" class="btn btn-info">Save  <i class="fas fa-save"></i></button>
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
														



<script>
$(document).ready(function(){

  $('#category_item').selectpicker();

  $('#sub_category_item').selectpicker();

  load_data('category_data');

  function load_data(type, category_id = '')
  {
    $.ajax({
      url:"load_data.php",
      method:"POST",
      data:{type:type, category_id:category_id},
      dataType:"json",
      success:function(data)
      {
        var html = '';
        for(var count = 0; count < data.length; count++)
        {
          html += '<option value="'+data[count].id+'">'+data[count].name+'</option>';
        }
        if(type == 'category_data')
        {
          $('#category_item').html(html);
          $('#category_item').selectpicker('refresh');
        }
        else
        {
          $('#sub_category_item').html(html);
          $('#sub_category_item').selectpicker('refresh');
        }
      }
    })
  }

  $(document).on('change', '#category_item', function(){
    var category_id = $('#category_item').val();
    load_data('sub_category_data', category_id);
  });
  
});
</script>

	  				


</body>

</html>
