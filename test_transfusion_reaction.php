<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="nurse"){
      header('Location: login2?err=2');
    }
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');







$user=$_SESSION['sess_username'];

//echo $rt ='test'.$user."<br />".'hhh:'.$user;
//echo $rt='test '.$user ;
//include("auth.php");
//echo $count1;
$id=$_REQUEST['id'];

//$id='10295';
$sno='O'.$id;
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from iblood where id='$id'");
$data = mysqli_fetch_assoc($query4);
$eid=$data['eid'];
$iname=$data['medi'];
$lis_code=$data['barcode1'];




?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


	$pmrn = $_REQUEST["pmrn"];  
	$pname = $_REQUEST["pname"];  
	$tst = $_REQUEST["tst"];  
	$rst = $_REQUEST["rst"];  
	
	
	$blood_remaining = $_REQUEST["blood_remaining"];
	$symptoms =implode(",",$_REQUEST["symptoms"]);
	$b_temp = $_REQUEST["b_temp"];
	$b_pulse = $_REQUEST["b_pulse"];
	$b_bp = $_REQUEST["b_bp"];
	$a_temp = $_REQUEST["a_temp"];

	$a_pulse = $_REQUEST["a_pulse"];
	$a_bp = $_REQUEST["a_bp"];
	$t_history = $_REQUEST["t_history"];
	$reporting_time =$_REQUEST["reporting_time"];
	
	
	//$pbp1 = implode(",",$_POST["pbp1"]);
  //  	  $pbp2 = mysqli_real_escape_string($connect, implode (", ", $_POST["pbp1"]));
//		  $strh = ;
	  $adate1 = date('m/d/Y', strtotime($_POST["adate"]));  
	  $adate2 = date('Y-m-d H:i:s');  
	  $user=$_SESSION["sess_username"];
	  $dtime= date('d/m/Y H:i:s');
  $date1 = date('m/d/Y');	
  $date2 = date('Y-m-d');	
  $etime= date('Y-m-d H:i:s');	 


$update="update iblood set 
tst='$tst',
rst='$rst',
blood_remaining='$blood_remaining',
symptoms='$symptoms', 
b_temp='$b_temp',
b_pulse='$b_pulse',
b_bp='$b_bp',
a_temp='$a_temp',
a_pulse='$a_pulse',
a_bp='$a_bp',
t_history='$t_history',
reporting_time='$reporting_time',
reporting_user='$user',
reporting_user_time='$adate2'
WHERE id = '$id'";;
mysqli_query($con,$update) or die(mysql_error());

/*
$update1="update alllab set resultstatus='Updated By Technologist',result='$rr',resulttime='$adate',resultby='$user',r1='$haemo',r2='$red',r3='$pcv',
 r4='$mcv',r5='$mch',r6='$mchc',r7='$rdw',r8='$pla',r9='$mpv',r10='$wbc',r11='$neu',r12='$lym',r13='$eos',r14='$mono',r15='$bas',esr='$esr',result1='$rr1' where `sno`='$sno'";
mysqli_query($con,$update1);
*/

//if ($con->query($ins_query) == TRUE) 
//{
	
	//$url = "cbc_view_result2?inid=$sno&id=$id" ;
//header("Location:$url");

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
} 

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Transfusion Reaction Form Form</title>
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
width: 25%;
}
textarea {
padding: 2px;
height: 100px;
border-radius: 2px;
width: 100%;
}

button {
padding: 19px 39px 18px 39px;
color: #FFF;
background-color: #A085C6;
/*#4bc970*/
font-size: 16px;
text-align: center;
font-style: normal;
border-radius: 5px;

width: 100%;
border: 1px solid #8265B0;
/*#3ac162*/
border-width: 1px 1px 3px;
box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
margin-bottom: 3px;
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
margin-bottom: 0px;
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
max-width: 1020px;
}

}


label {
	  float: left;
  }
	
  span {
	  display: block;
	  overflow: hidden;
	  padding: 0px 4px 0px 6px;
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



<link rel="stylesheet" href="styles.css">
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$("#loding1").hide();
$("#loding2").hide();
$(".country").change(function()
{
  $("#loding1").show();
  var id=$(this).val();
  var dataString = 'id='+ id;
  $(".state").find('option').remove();
  $(".city").find('option').remove();
  $.ajax
  ({
	  type: "POST",
	  url: "get_state.php",
	  data: dataString,
	  cache: false,
	  success: function(html)
	  {
		  $("#loding1").hide();
		  $(".state").html(html);
	  } 
  });
});


$(".state").change(function()
{
  $("#loding2").show();
  var id=$(this).val();
  var dataString = 'id='+ id;

  $.ajax
  ({
	  type: "POST",
	  url: "get_city.php",
	  data: dataString,
	  cache: false,
	  success: function(html)
	  {
		  $("#loding2").hide();
		  $(".city").html(html);
	  } 
  });
});

});
</script>
<script src="./jquery.multiselect.js"></script>
<link href="./jquery.multiselect.css" rel="stylesheet" />
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='edischarge3'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='esearch'><span>Patient Search By MRN</span></a>         </li>
         <li class='has-sub'><a href='eadm'><span>New Patient</span></a>         </li>
      </ul>
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

		<form method="post" id="insert_form5" name="frmMain25">  
					 
					 
                                       
					 <label><b>Patient MRN</b></label> <br> 
					 <input type="text" name="pmrn" id="pmrn5" class="form-control" size="80" readonly value="<?php echo $data['pmrn'];?>"> 
					 <br>	  
					 <label><b>Patient Name</b></label><br> 
					 <input type="text" name="pname" id="ppluse5" class="form-control"  size="80" readonly value="<?php echo $data['pname'];?>">  
					 <br>
					 
					 <label><b>Ordered Blood Group</b> </label>                          
					 <input type="text" name="bgroup" id="app_dat5" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;" value="<?php echo $data['infusion'];?>" size="80">
					 <br>
					 <label><b>Ordered Blood Type</b></label> <br>                         
					 <input type="text" name="btype" id="temp5" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;" value="<?php echo $data['room'];?>" size="80">
					 <br>

					 <label><b>Bagno</b></label>    <br>                                                
					 <input type="text" name="bagno" id="bagno" class="form-control"readonly style="font-size:18px;color:red;font-weight:blod;" value="<?php echo $data['bagno'];?>" size="80">
					 
					 <label><b>Transfusion Start Time</b></label>   <br>                                                 
					 <input type="text" name="tst" id="tst" class="form-control"required style="font-size:18px;color:red;font-weight:blod;" size="80">
					 
					 <label><b>Time Of Reaction Started</b></label>    <br>                                                
					 <input type="text" name="rst" id="rst" class="form-control" required style="font-size:18px;color:red;font-weight:blod;" size="80">
					 
					 <label><b>Amount Remaining in Bag</b></label> <br/>                         
					 <input type="number" name="blood_remaining" id="blood_remaining" class="form-control" style="font-size:18px;color:red;font-weight:blod;" size="100">
					 <br>
					 <label><b>Symptoms</b></label>                          
					 <select type="text" name="symptoms[]" id="symptoms" multiple="multiple" class="3col active" required size="80" required size="80">

	   <option value="Fever">Fever</option>
	   <option value="Rigor">Rigor</option>
	   <option value="Pain">Pain</option>
	   <option value="Hypotension">Hypotension</option>
	   <option value="Dyspnea">Dyspnea</option>
	   <option value="Urticaria">Urticaria</option>
	   <option value="Oedema">Oedema</option>
	   <option value="Nausea">Nausea</option>
	   <option value="Vomiting">Vomiting</option>
	   <option value="Oliguria">Oliguria</option>
	   <option value="Anaphylaxis">Anaphylaxis</option>
	   <option value="Others">Others</option>


</select>


<label><b>Temperature Before Transfusion</b></label>                          
					 <input type="text" name="b_temp" id="b_temp" class="form-control" required style="font-size:18px;color:red;font-weight:blod;" size="80" value="<?php echo $data['b_temp'];?>" readonly>
					 
					 <label><b>Pulse Before Transfusion</b></label>                          
					 <input type="text" name="b_pulse" id="b_pulse" class="form-control" required style="font-size:18px;color:red;font-weight:blod;" size="80" value="<?php echo $data['b_pulse'];?>" readonly>
					 
					 <label><b>Blood Pressure Before Transfusion</b></label>                          
					 <input type="text" name="b_bp" id="b_bp" class="form-control" required style="font-size:18px;color:red;font-weight:blod;" size="80" value="<?php echo $data['b_bp'];?>" readonly>
						
					 
					 
					 <label><b>Temperature At Start Of Reaction</b></label>                          
					 <input type="text" name="a_temp" id="a_temp" class="form-control" required style="font-size:18px;color:red;font-weight:blod;" size="80">
					 
					 <label><b>Pulse At Start Of Reaction</b></label>                          
					 <input type="text" name="a_pulse" id="a_pulse" class="form-control" required style="font-size:18px;color:red;font-weight:blod;" size="80">
					 <br>
					 <label><b>Blood Pressure At Start Of Reaction</b></label>                          
					 <input type="text" name="a_bp" id="a_bp"  size="80"class="form-control" required style="font-size:18px;color:red;font-weight:blod;">
					 
			   <br>
					 
					 <label><b>H/O Past Transfusion</b></label><br>                          
					 <input type="text" name="t_history" id="t_history" class="form-control" required style="font-size:18px;color:red;font-weight:blod;" size="80">
					 <br>
					 <label><b>Time Of Reporting To Blood Bank</b></label>                          
					 <input type="text" name="reporting_time" id="reporting_time" class="form-control" required style="font-size:18px;color:red;font-weight:blod;" size="80">
					 
					 <br>
					  
					 <label><b><input type="submit" name="Submit" id="insert455" value="Insert"></b></label>  
				
				</form>  
		   </div>  
		   

</body>

</html>
<script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 2,
            placeholder: 'Select',
            search: true,
            searchOptions: {
                'default': ''
            },
            selectAll: true
        });

    });
</script>	   