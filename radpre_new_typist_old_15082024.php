<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','rad','outdoc')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php

require('db1.php');

$user=$_SESSION['sess_username'];


$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());


$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];


$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$dreffer=$_REQUEST['dreffer'];
//$dname1=$_REQUEST['dname1'];



$query43 = "SELECT COUNT(pmrn) FROM radreport where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;





$query = "SELECT * from radpapp where ID='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$pp= $row['pphone'];  
$pd= $row['tname'];
$pdate= $row['adate'];
$pa= $row['page'];
$ps= $row['psex'];
$dname1= $row['dname'];
$a_no= $row['a_no'];
$ineid= $row['ineid'];
$emerid= $row['emerid'];
$location= $row['location'];
//$pa= $row['padd'];
$price= $row['price'];

$new_ano = preg_replace('/^./', '', $a_no);
//echo $new_ano;


$query22 = "SELECT COUNT(ac_no) FROM radreport where ac_no= '$a_no';"; 
$result22 = mysqli_query($con, $query22) or die(mysqli_error());
$row22 = mysqli_fetch_assoc($result22);
$count_ano =$row22['COUNT(ac_no)'];


  
?>


<?php
 
require('db1.php');

$user1='root';
$pass='Godiloveu16';
$db= new PDO('mysql:host=localhost; dbname=sfmmkpjnew', $user1, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_POST['Submit']))
{
$dname =$_REQUEST['dname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
$select=$_REQUEST['select'];
$cdetails=$_REQUEST['cdetails'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
$ptemp=$_REQUEST['ptemp'];
$find=$_REQUEST['find'];
$date= date('Y-m-d');
$date1=date('m/d/Y');
$date2=date('d/m/Y');
$date2=date('d/m/Y');
$stime=date("h:i:sa");
$type=$_REQUEST['type'];	
$critical=$_REQUEST['critical'];	
$ss='SEEN';
$up='Confirmed By Consultant';

$plaintext = strip_tags($cdetails);

$add_time=date('Y-m-d H:i:s');
$rr='Report:'.$cdetails."<br />".'Findings:'.$find;
//$url = "p4new1.php?pmrn=$pmrn&eid=$count1&dname=$full"; 
$date_d= date('Y-m-d');


$code = "SELECT * from radio where iname='$pd'"; 
$code_result = mysqli_query($con, $code) or die ( mysqli_error());
$code_row = mysqli_fetch_assoc($code_result);
$price_code=$code_row['code'];




if($count_ano>0)
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Report Already Uploaded!!"); ';
    echo '</script>';
	
}



else if($location=='OPD'){


try {
  $db->beginTransaction();


  $r_s='Confirmed By Consultant';
  $r_d=date('d/m/Y H:i:s');
  $qqt='1';
  $find1='';
  $critical1='critical';		

  $sh = $db->prepare("insert into his_report(Accession_Number,Report_Data,Status) VALUES(?, ?, ?)");
  $sh->execute([$a_no, $plaintext, $qqt]);

  $sh = $db->prepare("UPDATE radpapp SET status=?, done_date=? WHERE ID=?");
  $sh->execute([$ss, $date_d, $id]);

  $sh = $db->prepare("UPDATE alltest SET resultstatus=?, resulttime=?, rdate=?, critical=? WHERE id=?");
  $sh->execute([$r_s, $r_d, $date, $critical, $a_no]);

  $sh = $db->prepare("insert into radreport (dname,pmrn,pname,age,gender,pphone,dreffer,report,report1,type,eid,status,rdate,r1date,find,rdone,date2,type1,time,ac_no,status1,ineid,emerid,price,done_date,code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $sh->execute([$select, $pm, $pn, $pa, $ps, $pp, $dreffer, $cdetails, $plaintext, $pd, $count1, $ss, $date, $date1, $find1, $user, $date2, $dname1, $stime, $a_no, $up, $ineid, $emerid, $price, $date_d, $price_code]);

  

  $db->commit();
//$url = "historynewview?pmrn=$pm&eid=$count1&date=$pdate&dname=$pd" ;
//header("Location:$url");


/*echo '<script language="javascript">';
  echo 'alert("Medicine updated Added  !!"); ';
  echo '</script>';*/
//$url = "imedi1_new.php?pmrn=$pmrn&eid=$eid";

//header("Refresh: .1; URL=$url");
echo '<script language="javascript">';
      echo 'alert("Report Successfully Updated !!"); ';
      echo '</script>';


} catch ( Exception $e ) {
  $db->rollBack();

  echo '<script language="javascript">';
      echo 'alert("Something Went wrong !!"); ';
      echo '</script>';
}	

}


else if($location=='Inpatient'){


  try {
    $db->beginTransaction();
  
  
    $r_s='Confirmed By Consultant';
    $r_d=date('d/m/Y H:i:s');
    $qqt='1';
    $find1='';
    //$critical=$_REQUEST['critical'];	
  
    $sh = $db->prepare("insert into  his_report(Accession_Number,Report_Data,Status) VALUES(?, ?, ?)");
    $sh->execute([$a_no, $plaintext, $qqt]);
  
    $sh = $db->prepare("UPDATE radpapp SET status=?, done_date=? WHERE ID=?");
    $sh->execute([$ss, $date_d, $id]);
  
    $sh = $db->prepare("UPDATE iinves SET resultstatus=?, resulttime=?, critical=? WHERE id=?");
    $sh->execute([$r_s, $r_d, $critical, $new_ano]);
  
  $sh = $db->prepare("insert into radreport (dname,pmrn,pname,age,gender,pphone,dreffer,report,report1,type,eid,status,rdate,r1date,find,rdone,date2,type1,time,ac_no,status1,ineid,emerid,price,done_date,code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $sh->execute([$select, $pm, $pn, $pa, $ps, $pp, $dreffer, $cdetails, $plaintext, $pd, $count1, $ss, $date, $date1, $find1, $user, $date2, $dname1, $stime, $a_no, $up, $ineid, $emerid, $price, $date_d, $price_code]);

    
  
    $db->commit();
  //$url = "historynewview?pmrn=$pm&eid=$count1&date=$pdate&dname=$pd" ;
  //header("Location:$url");
  
  
  /*echo '<script language="javascript">';
    echo 'alert("Medicine updated Added  !!"); ';
    echo '</script>';*/
  $url = "imedi1_new.php?pmrn=$pmrn&eid=$eid";
  
  //header("Refresh: .1; URL=$url");
  
  echo '<script language="javascript">';
  echo 'alert("Report Successfully Updated !!"); ';
  echo '</script>';


} catch ( Exception $e ) {
$db->rollBack();

echo '<script language="javascript">';
  echo 'alert("Something Went wrong !!"); ';
  echo '</script>';
}	

  }
  
  else if($location=='A&E'){


    try {
      $db->beginTransaction();
    
    
      $r_s='Confirmed By Consultant';
      $r_d=date('d/m/Y H:i:s');
      $qqt='1';
      $find1='';
      $critical=$_REQUEST['critical'];	
     
      $sh = $db->prepare("insert into  his_report(Accession_Number,Report_Data,Status) VALUES(?, ?, ?)");
      $sh->execute([$a_no, $plaintext, $qqt]);
    
      $sh = $db->prepare("UPDATE radpapp SET status=?, done_date=? WHERE ID=?");
      $sh->execute([$ss, $date_d, $id]);
    
      $sh = $db->prepare("UPDATE einves SET resultstatus=?, resulttime=?, critical=? WHERE id=?");
      $sh->execute([$r_s, $r_d, $critical, $new_ano]);
    
      $sh = $db->prepare("insert into radreport (dname,pmrn,pname,age,gender,pphone,dreffer,report,report1,type,eid,status,rdate,r1date,find,rdone,date2,type1,time,ac_no,status1,ineid,emerid,price,done_date,code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $sh->execute([$select, $pm, $pn, $pa, $ps, $pp, $dreffer, $cdetails, $plaintext, $pd, $count1, $ss, $date, $date1, $find1, $user, $date2, $dname1, $stime, $a_no, $up, $ineid, $emerid, $price, $date_d, $price_code]);
    
      
    
      $db->commit();
    //$url = "historynewview?pmrn=$pm&eid=$count1&date=$pdate&dname=$pd" ;
    //header("Location:$url");
    
    
    /*echo '<script language="javascript">';
      echo 'alert("Medicine updated Added  !!"); ';
      echo '</script>';*/
    $url = "imedi1_new.php?pmrn=$pmrn&eid=$eid";
    
    //header("Refresh: .1; URL=$url");
    
    echo '<script language="javascript">';
    echo 'alert("Report Successfully Updated !!"); ';
    echo '</script>';


} catch ( Exception $e ) {
$db->rollBack();

echo '<script language="javascript">';
    echo 'alert("Something Went wrong !!"); ';
    echo '</script>';
}	

    
    }
    
else {

  echo '<script language="javascript">';
      echo 'alert("Something Went wrong !!"); ';
      echo '</script>';
}

}






?>

<?php

$query39v = "SELECT * FROM radreport where pmrn= '$pmrn' and eid='$count1'"; 
	 
$result39v = mysqli_query($con, $query39v) or die(mysqli_error());

// Print out result
$row39v = mysqli_fetch_array($result39v);
$dname3=$row39v['dname'];

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>DID REPORT</title>
  
<link rel="stylesheet">

  
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
  height: 32px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: lightgreen;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 50%;
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
    max-width: 1800px;
  }

}
      </style>

    <script src="jsnew/prefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
  
 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentMonth, currentDate,currentYear),
			maxDate: new Date(currentMonth, currentDate,currentYear)
		});
	});
</script>




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="jsnew/jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="jsnew/jquery.multiselect.js"></script>


 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
    <script>
function goBack() {
    window.history.back();
}
</script>

<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Add Inpatient Visit ?");
}

</script>
<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Add ICU Visit ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Add Emergency Visit ?");
}

</script>


<script type="text/javascript">
function confirm_click3()
{
return confirm("Are you Sure to Add After Office Hour Visit ?");
}

</script>

<script src="ckeditor_1/ckeditor.js"></script>
<script src="ckeditor_1/samples/js/sample.js"></script>



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

<h1 align="center">Reporting Panel</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
	

<form action="" method="post" onSubmit="if(confirm('Want to proceed the submission?')){return true;}" autocomplete="on">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><a target='_blank' href="deathstatdetailsmng?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>"><b>All Records<b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="allreportdocnew?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>"><b>All Reports<b></a></td></tr>
				<tr><td colspan="20" style="font-size:18px;color:green;"><label><strong> Reporting Doctors's Name : </strong></label></td></tr>
<tr>
<td colspan="20"><select name="select" required>
	  <option value='<?php echo $full;?>'><?php echo $full;?></option>
	  <?php 
			$sql_1 = "select * from `doctor` where status='Active' and tt='radio'";
			$res_1 = mysqli_query($con, $sql_1);
			if(mysqli_num_rows($res_1) > 0) {
				while($row_1 = mysqli_fetch_object($res_1)) {
					echo "<option value='".$row_1->dname."'>".$row_1->dname."</option>";
				}
			}
			?>
	  
	  


      </select></td>
</tr>				
				
				<tr>
				<td colspan="20" style="font-size:18px;color:blue;"><label><strong>Referral Doctors's Name : <?php echo $dreffer;?></strong></label></td></tr>
				
				</tr>
				
						
						
						
						
						
						
												<tr>
						
						
						<td colspan="4" style="font-size:18px;color:red;"><label><strong>Patient's MRN: <?php echo $pm;?></strong></label></td>
						<td colspan="10" style="font-size:18px;color:red;"><label><strong>Patient's Name: <?php echo $pn;?></strong></label></td>
						
						
						


						
						



		
						
						<td colspan="2" style="font-size:18px;color:red;"><label><strong>Age: <?php echo $pa;?></strong></label></td>
						<td colspan="2" style="font-size:18px;color:red;"><label><strong>Gender: <?php echo $ps;?></strong></label></td>
						<td colspan="2" style="font-size:18px;color:red;"><label><strong>Phone NO: <?php echo $pp;?></strong></label></td>
						
						
						</tr>
						<tr>
						<td colspan="20" style="font-size:18px;color:green;"><label><strong>REPORT ON: <?php echo $pd;?></strong></label></td></tr>
				<tr>

<td colspan="20">
	  <input type="text" id="pmrn" onkeyup="GetDetail(this.value)" class="form-control action" list="categoryname" autocomplete="off" name='vtype' placeholder='Use Previous Template'>

    <datalist id="categoryname">
	<option value=''>-Select-</option>
				
				<?php
            require('db1.php');
            $uname = '';
            $query_1 = "select * from `rad_report_format` where status='A'";
            $result_1 = mysqli_query($con, $query_1);
            while($row_1 = mysqli_fetch_array($result_1)) {
        ?>
            <option value="<?php echo $row_1['type'];?>"><?php echo $row_1['type']; ?></option>
        <?php } ?>
        
    </datalist>
	
	
	
</td>
</tr>				

						 <tr><td colspan="20"><label><strong>Patient's Details Report:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="charge" name="cdetails" rows="40" ></textarea></td>  </tr>
						 
						 <script>
                                                    CKEDITOR.replace( 'charge',{
  height: 700,
  
  
 

 } );
													
                                                </script>
						
				
														


<tr>

				 
					 <script type="text/javascript">
    function EnableDisableTextBox(chkPassport) {
        var txtPassportNumber = document.getElementById("txtPassportNumber");
        txtPassportNumber.disabled = chkPassport.checked ? false : true;
        if (!txtPassportNumber.disabled) {
            txtPassportNumber.focus();
        }
    }
</script>
	 
<td colspan="5">
	 <input type="checkbox" id="critical" name="critical" value="critical" style="height:20px; width:20px; color:red;"><span style="color:red; font-size:30px; font-weight:bold;">&nbsp;Critical / Abnormal Report</span>				 
	 
</td> 

		<td colspan="8"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="7"><a target='_blank' href="rad_report_new2.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$count1"; ?>&dname=<?php echo "$dname3"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>


<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				//document.getElementById("sformat").value = "";

				document.getElementById("charge").value = "";
				//document.getElementById("porder").value = "";
				
				return;
			}
			else {
//var variables = "pmrn=Regular Visit&pd=$pd";
				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						//document.getElementById("porder").value = myObj[1];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById("charge").value = myObj[0];
							
							//document.getElementById("pd").value = myObj[2];
							
							
							CKEDITOR.instances["charge"].setData(myObj[0]);
							//CKEDITOR.instances["pd"].setData(myObj[2]);
					}
				};
//var variables = "pmrn=str&string=$pd";

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "pro_radio_test.php?pmrn=" + str + "&porder=<?php echo $pd;?>", true);
//				xmlhttp.open("GET","getuser.php?q=" + q + "&r=" + r, true);

				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  

</body>

</html>
