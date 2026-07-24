<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
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

$user=$_SESSION["sess_username"];
$cname=$_REQUEST["cname"];




$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$fname=$row139['fullname'];

//include("auth.php");
//echo $count1;


  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


//$cname = $_REQUEST['cname'];
$mname = $_REQUEST['mname'];
$mrole = $_REQUEST['mrole'];

$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
//$bname = $_REQUEST['bname'];
//$cname=$_REQUEST['cname'];
//$form=$_REQUEST['form'];
//$cat=$_REQUEST['cat'];
//$adate=$_REQUEST['adate'];

//$padd=$_REQUEST['padd'];

$adate1= date('d/m/Y H:i:s');

$adate= date('Y-m-d');


$query1390 = "SELECT * FROM user where uname= '$mname'"; 
	 
$result1390 = mysqli_query($con, $query1390) or die(mysqli_error());

// Print out result
$row1390 = mysqli_fetch_array($result1390);
$fname6=$row1390['fullname'];



$sel91="SELECT * FROM ccomm WHERE `cname`='$cname' and mrole='Chairman' and status='Active';";
$result91 = mysqli_query($con,$sel91);


$sel90="SELECT * FROM ccomm WHERE `cname`='$cname' and uid='$mname'and status='Active';";
$result90 = mysqli_query($con,$sel90);
if($res90=mysqli_num_rows($result90)>0)
{
echo '<script language="javascript">';
    echo 'alert("Member is Already Listed in The Committee !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}


else if($res91=mysqli_num_rows($result91)>0 && $mrole=='Chairman')
{
echo '<script language="javascript">';
    echo 'alert("There is already a Chairman for this Committee !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}

else{

$ins_query1="insert into ccomm (`cname`,`mname`,`mrole`,`adate`,`adate1`,`aby`,`status`,`uid`,`sdate`,`edate`) values ('$cname','$fname6','$mrole','$adate','$adate1','$user','Active','$mname','$start','$end')";
mysqli_query($con,$ins_query1) or die(mysql_error());


//if ($con->query($ins_query) == TRUE) 
//{

    echo '<script language="javascript">';
    echo 'alert("Entry Successful"); ';
    echo '</script>';
} 

}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
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
    max-width: 750px;
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

<form action="" method="post">

<!-- Form Title -->
		<h1>ADD MEMBER</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  
	  <label for="age"><strong>Committee Name :</strong></label>
      
	  
	  <input list="browsers111" name="cname"  size="80"  value="<?php echo $cname;?>" style="text-transform:uppercase"required autocomplete='off' readonly>
  <datalist id="browsers111">

						
				 </datalist>
	  
	  	 
	  <label for="age"><strong>Member Name :</strong></label>
	  
	  
	  <input list="browsers1114" name="mname"  size="80"  style="text-transform:uppercase"required autocomplete='off'>
  <datalist id="browsers1114">

						<option value=''>-Select Member</option>
						<option value='ceo'>Mohd. Taufik Bin Ismail</option>
						<option value='cfo'>Madam Nuradilah Shuib</option>
						<option value='ruzita'>Madam Ruzita Mohd Dan</option>
				<?php 
			$sql = "select * from `staff1` where astatus='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sid." "."'>".$row->mname."- ".$row->sdepartment."- ".$row->designation."</option>";
				}
			}
			
			$sql1 = "select * from `staff3` where status='Active'";
			$res1 = mysqli_query($con, $sql1);
			if(mysqli_num_rows($res1) > 0) {
				while($row1 = mysqli_fetch_object($res1)) {
					echo "<option value='".$row1->sid." "."'>".$row1->sname."- ".$row1->dept."- ".$row1->designation."</option>";
				}
			}
			?>

			</datalist>
			
			<label for="age"><strong>Member Role :</strong></label>
			
			<input list="browsers1115" name="mrole"  size="80"  style="text-transform:uppercase"required autocomplete='off'>
  <datalist id="browsers1115">

						<option value=''>-Select Role</option>
								<option value='Advisor'>Advisor</option>
								<option value='Chairman'>Chairman</option>
								<option value='Secretary'>Secretary</option>
										<option value='Member'>Member</option>
				 </datalist>
				 
				 <label for="age"><strong>Start :</strong></label>
				 <input type="text" name="stdate" id="datepicker1" placeholder="Select Date" size="15" required>
				 
				 <label for="age"><strong>End:</strong></label>
				<input type="text" name="endate" id="datepicker2" placeholder="Select Date" size="15" required>  
	  	  
	        
  </fieldset>

 
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">ADD</button></td>
</table>

</form>
  

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
	  
      <th width="17%"><strong>Member Name</strong></th>
      <th width="10%"><strong>Member Role</strong></th>
      
	  
	  <th width="14%"><strong>Remove</strong>
	  <th width="14%"><strong>Print Appointment Letter</strong>
	  
      
	   </tr>
  </thead>
  <tbody>
  
  
  <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count1=1;
$sel_query="Select * from ccomm where cname='$cname' and status='Active' order by mrole asc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count1; ?></td>
      
      <td align="center"><?php echo $row["mname"]; ?></a></td>
	  <td align="center"><?php echo $row["mrole"]; ?></a></td>
	  
	  	  <td align="center" ><a onclick="return confirm_click();" href="cremove?id=<?php echo $row["id"]; ?>&cname=<?php echo $row["cname"]; ?>">Remove</a></td>
<td align="center"><a target='_blank' href="com_appoint1?id=<?php echo $row['id']; ?>"><img src="print.png" title="Print Report" width="40" height="30" /></a></td>	
	  
      </tr>
    <?php $count1++; } ?>

</body>

</html>
