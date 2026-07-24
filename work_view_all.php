<?php 
    session_start();
    require('db1.php');
	include_once 'dbconfig.php';
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','staff')"; 
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
   <li><a href='homestaff'><span>Home</span></a></li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
   
</ul>
</div>
<input type="submit" name="btn" id="hh" value="Reload" onclick="window.location.reload();" style="visibility:hidden"> 

<input list="24" name="customerType" id="customerType" onchange="customerTypeFunction()" placeholder="--Select Consultant--">
			        <datalist id="24" name="customerType" id="customerType" >

                    <?php
	$stmt = $DB_con->prepare("SELECT distinct dname,sid FROM doctor where status='Active'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['dname'].','.$row['sid']; ?>"><?php echo $row['dname']; ?></option>
        <?php
	} 
?>
                </datalist>



                <div id="nonCorpCustDetails" class="custDetails">
                   <p id="demo" style="align:right;font-size:26px;color:red;"></p>
					
                </div>

                <div id="corporateCustDetails" class="custDetails" style="visibility:hidden">
                   
                </div>
				 
				
				
				
				<script>
				
				
				
			function customerTypeFunction() {

			
				
var customerTypeSelect = document.getElementById("customerType").value;

var customerTypeSelect1 = document.getElementById("customerType");
var corpCustomer = document.getElementById("corporateCustDetails");
var nonCorpCustomer = document.getElementById("nonCorpCustDetails");
var hh = document.getElementById("hh");

document.getElementById("demo").innerHTML =customerTypeSelect;

if ( customerTypeSelect === '') {

    corpCustomer.style.visibility = "hidden";
    nonCorpCustomer.style.visibility = "visible";

}

if ( customerTypeSelect != '' ) {


    nonCorpCustomer.style.visibility = "visible";
customerTypeSelect1.style.visibility = "hidden";
	corpCustomer.style.visibility = "visible";
	hh.style.visibility = "visible";
	
var t1 = document.getElementById("customerType").value;



					var calendar = $('#corporateCustDetails').fullCalendar({
						
						
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay',
	 
    },
	

	 events: {
    
	url: 'load_cal1.php?t1='+t1,
	Boolean, default: true,
    
	


  }
	
  /*events: 'load_cal1.php?t1='+t1, 
   selectable:false,
   selectHelper:false,
   */
   

    

   });

    

}

}

</script>
</html>