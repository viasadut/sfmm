<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','ddf','staff','oic')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');
if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));

$bt=$_REQUEST["bt"];

$query43 = "SELECT COUNT(dname) FROM pappnew where adate1 BETWEEN '$start' and '$end' and status='SEEN' and dname in ('Dr. Fatema Yasmin','Dr. Sayada Sanjidara Nupur','Dr. Syeda Huma Rahman','Dr. Morsheda Pervin','Prof. Dr. Kashefa Khatun')"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$gynae = mysqli_fetch_assoc($result43);

$query43s = "SELECT COUNT(dname) FROM pappnew where adate1 BETWEEN '$start' and '$end' and status='SEEN' and dname in ('Dr. Razeeb Hassan','Dr. J.M.H Qausar Alam','Dr. Anas Ahmed','Dr. Khurshid Malik Hossain Tawhid','Dr. Md. Shariful Islam','Dr. Umme Habiba Saima','Prof. Dr. Md. Shah Alam Talukder','Dr. Tamanna Ferdousi')"; 
	 
$result43s = mysqli_query($con, $query43s) or die(mysqli_error());
$surgery = mysqli_fetch_assoc($result43s);


$query43o = "SELECT COUNT(dname) FROM pappnew where adate1 BETWEEN '$start' and '$end' and status='SEEN' and dname in ('Dr. Md. Rakibul Hassan','Dr. Gazi Mohammad Hasan Firoz','Dr. Md. Mahbubul Alam')"; 
	 
$result43o = mysqli_query($con, $query43o) or die(mysqli_error());
$ortho = mysqli_fetch_assoc($result43o);


$query43p = "SELECT COUNT(dname) FROM pappnew where adate1 BETWEEN '$start' and '$end' and status='SEEN' and dname in ('Dr. Rokhsana Haque','Dr. Tahmina Islam','Dr. Afsana Yasmin')"; 
	 
$result43p = mysqli_query($con, $query43p) or die(mysqli_error());
$pedi = mysqli_fetch_assoc($result43p);


$query43m = "SELECT COUNT(dname) FROM pappnew where adate1 BETWEEN '$start' and '$end' and status='SEEN' and dname in ('Dr. Amal Krishna Paul','Dr. Sonia Saif','Dr. K M Adnan Bulbul','Dr. Natasha Tarannum','Dr. Mohammad Nazmul Alam Khan','Dr. Md. Mostofa Kaisar','Dr. Md. Moniruzzaman Maruf','Dr. Md. Badrul Islam','Dr. Chowdhury Mohammed Anwar Parvez')"; 
	 
$result43m = mysqli_query($con, $query43m) or die(mysqli_error());
$medi = mysqli_fetch_assoc($result43m);



}

?>



<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>




<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/




?>

<!DOCTYPE html>
<html>
 <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /* Stephonce R. MOrris | 2014 */

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
  max-width: 300px;
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
  height: 50px;
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
    max-width: 1200px;
  }

}
      </style>

    <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

 <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>

 <script>
  $(document).ready(function() {
    $("#datepicker2").datepicker();
  });
  </script>

  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
</head>

<body>




<div id='cssmenu'>
<ul>
   <li><a href='homemng'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">Discipline wise Out Patient Report</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td colspan="2"><label><strong>Select Start Date:</strong></label></td>
						<td colspan="2"><label><strong>Select End Date:</strong></label></td>	

							<td colspan="3"><label><strong> Select Consultant</strong></label></td> 
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="2"><input type="text" name="stdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td colspan="2"><input type="text" name="endate" id="datepicker2" placeholder="Select Date" size="15"></td>  
					 
					 <script>
    $(document).ready(function () {
        $('input[id$=aa]').datepicker({});
    });
</script>		
					 
					 </td>  
					 <td colspan="3"><select name="bt" >
					 
					 
        
						<option value=''>-Select-</option>
						<option value='Surgery'>Surgery</option>
            <option value='Medicine'>Medicine</option>
            <option value='Obstetrics and Gynecology'>Obstetrics and Gynecology</option>
            <option value='Orthopedics'>Orthopedics</option>
            <option value='Medicine'>Medicine</option>
            <option value='Pediatrics'>Pediatrics</option>
					
				
				
</select></td>  
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Appointment Date </strong>
      <th width="14%"><strong>Patient Phone</strong>   
      <th width="14%"><strong>Doctor's Name</strong>
      <th width="14%"><strong>Status</strong>
	  <th width="14%"><strong>Slot</strong>
	  <th width="14%"><strong>Appointment Time</strong>
	  <th width="14%"><strong>Bill Time</strong>
	 
	  <th width="14%"><strong>Vitals Time</strong>
	  <th width="14%"><strong>Seen Time</strong>
	  
	  
	  <th width="14%"><strong>Details</strong>

	   </tr>
  </thead>
  <tbody>

  
     <?php
	 
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];


if (($_POST['bt'])=="Surgery"){
echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $surgery['COUNT(dname)'];
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;

$sel_query="Select * from pappnew where  adate1 BETWEEN '$start' and '$end' and status='SEEN' and dname in ('Dr. Razeeb Hassan','Dr. J.M.H Qausar Alam','Dr. Anas Ahmed','Dr. Khurshid Malik Hossain Tawhid','Dr. Md. Shariful Islam','Dr. Umme Habiba Saima','Prof. Dr. Md. Shah Alam Talukder','Dr. Tamanna Ferdousi') order by aatime asc"; }
 else if (($_POST['bt'])=="Medicine"){
	 echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $medi['COUNT(dname)'];
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;
	 $sel_query="Select * from pappnew where adate1 BETWEEN '$start' and '$end' and status='SEEN' and dname in ('Dr. Amal Krishna Paul','Dr. Sonia Saif','Dr. K M Adnan Bulbul','Dr. Natasha Tarannum','Dr. Mohammad Nazmul Alam Khan','Dr. Md. Mostofa Kaisar','Dr. Md. Moniruzzaman Maruf','Dr. Md. Badrul Islam','Dr. Chowdhury Mohammed Anwar Parvez') order by aatime asc";
 } 


 else if (($_POST['bt'])=="Obstetrics and Gynecology"){
    echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $gynae['COUNT(dname)'];
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;
    $sel_query="Select * from pappnew where adate1 BETWEEN '$start' and '$end' and status='SEEN' and dname in ('Dr. Fatema Yasmin','Dr. Sayada Sanjidara Nupur','Dr. Syeda Huma Rahman','Dr. Morsheda Pervin','Prof. Dr. Kashefa Khatun') order by aatime asc";
} 


else if (($_POST['bt'])=="Orthopedics"){
    echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $ortho['COUNT(dname)'];
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;
    $sel_query="Select * from pappnew where adate1 BETWEEN '$start' and '$end' and status='SEEN' and dname in ('Dr. Md. Rakibul Hassan','Dr. Gazi Mohammad Hasan Firoz','Dr. Md. Mahbubul Alam') order by aatime asc";
} 


else if (($_POST['bt'])=="Pediatrics"){
    echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $pedi['COUNT(dname)'];
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;
    $sel_query="Select * from pappnew where adate1 BETWEEN '$start' and '$end' and status='SEEN' and dname in ('Dr. Rokhsana Haque','Dr. Tahmina Islam','Dr. Afsana Yasmin') order by aatime asc";
} 


else if (($_POST['bt'])=="Medicine"){
    echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $medi['COUNT(dname)'];
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;
    $sel_query="Select * from pappnew where adate1 BETWEEN '$start' and '$end' and status='SEEN' and dname in ('Dr. Amal Krishna Paul','Dr. Sonia Saif','Dr. K M Adnan Bulbul') order by aatime asc";
} 
$count=1;
//$sel_query="Select * from presnew where dname='$bt' and date BETWEEN '$start' and '$end'";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>
      <td align="center"><?php echo $row["pphone"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> 
      <td align="center"><?php echo $row["status"]; ?>  
	  <td align="center"><?php echo $row["aslot"]; ?>  
	  <td align="center"><?php echo $row["aatime"]; ?> 
	  <td align="center"><?php echo $row["billtime"]; ?>  
	  <td align="center"><?php echo $row["vtime"]; ?>  
	  <td align="center"><?php echo $row["stime"]; ?>  
	  
	   
	  
	  
	  
	  
	  
	  
	  
	  
	  <td align="center"><a target='_blank' href="historynewmng?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row["eid"]?>&date=<?php echo $row["adate"]?>&dname=<?php echo $row["dname"]?>"><b>Details<b></a></td>	  
	  
	  <td align="center"><a target='_blank' href="prescription/prescription/pdf_p_12?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row["eid"]?>&date=<?php echo $row["adate"]?>&dname=<?php echo $row["dname"]?>"><b>Prescription<b></a></td>	  
      </tr>
	  
    <?php $count++; } }?>


      
  </tbody>
</table>


</form>
</body>
</html>
