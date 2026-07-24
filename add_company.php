<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','pharmacy','mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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
//$id=$_REQUEST['id'];

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

$com_name = $_REQUEST['com_name'];
$con_name = $_REQUEST['con_name'];
$com_add = $_REQUEST['com_add'];
$coun = $_REQUEST['coun[]'];



$bin=$_REQUEST['bin'];

//$exdate=date('Y-m-d',strtotime($_REQUEST["exdate"]));
$remarks=$_REQUEST['remarks'];

//$adate=$_REQUEST['adate'];

//$padd=$_REQUEST['padd'];

$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');
$ittime1= date('Y-m-d H:i:s');
$date=date('Y-m-d H:i:s');


$query43 = "SELECT COUNT(id) FROM add_company;"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row1 = mysqli_fetch_assoc($result43);
$count=$row1['COUNT(id)']+1;



$ins_query1="insert into add_company (`com_name`,`con_name`,`com_add`,`remarks`,`aby`,`add_time`,`status`,`rid`)
 values ('$com_name','$con_name','$com_add','$remarks','$user','$ittime1','Requested','$count')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){
	
	$queryc = "SELECT * FROM add_company where com_name='$com_name' order by id limit 1"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$cid=$rowc['id'];
foreach($_POST['coun'] as $group_member){
	 
	 $treat=explode(',',$group_member);
	
	$g1=$treat[0];
	$g2=$treat[1];
	 
//$message= "this is a message";

$query="insert into add_com_product (`company`,`cid`,`product`,`status`,`date`,`mid`) values 
('$com_name','$cid','$g1','Active','$date','$g2')";

$result = mysqli_query($con,$query) or die ( mysqli_error());
 }


}

header("Location: company_document_upload?rid=$count");

/*$ins_query1="update medicine set mname='$mname', brand1='$bname', brand2='$cname', pre='$form', 
pcat='$cat', etime='$adate',eby='$user',frequency='$frequency',frelation='$frelation',pcategory='$pcategory',duration='$duration',contrain='$contrain',meffect='$meffect',uprice='$uprice' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());*/


//if ($con->query($ins_query) == TRUE) 
//{

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
 

}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Add Compnay Form</title>
  
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
		<h1>Add Company</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  <label for="age"><strong>Company Name :</strong></label>
      <input name="com_name" type="text" size="70" style="text-transform:uppercase" value="<?php echo $row1["code"];?>"required>
	  <label for="age"><strong>Contact Person :</strong></label>
      <input name="con_name" type="text" size="70" style="text-transform:uppercase" value="<?php echo $row1["mname"];?>"required>
 	  <label for="age"><strong>Company Address :</strong></label>
      <input name="com_add" type="text" size="70" style="text-transform:uppercase" value="<?php echo $row1["brand1"];?>"required>
	  <label for="age"><strong>BIN / TIN Number :</strong></label>
      <input name="bin" type="text" size="70" style="text-transform:uppercase" value="<?php echo $row1["brand2"];?>"required>
	  
	  
	  	 <label for="age"><strong>Remarks:</strong></label>
      <input name="remarks" type="text" size="70" style="text-transform:uppercase" value=""required>
	      
<label for="age"><strong>Available Product:</strong></label>
 <select class="country"
					multiple="true"
					style="width: 680px; height: 70px;" name="coun[]">
				
				<?php
				
				/* $cid=$row['id'];
	$stmt5 = $DB_con->prepare("select * from `add_com_product` where cid='$cid'");
	$stmt5->execute();
	while($row5=$stmt5->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row5['product']; ?>"selected><?php echo $row5['product']; ?></option>
        <?php
	} */
?>
				
				
				
				
				<?php
	$stmt = $DB_con->prepare("select * from `medicine` where status='Active'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['mname'].','.$row['id']; ?>"><?php echo $row['mname']; ?></option>
        <?php
	} 
?>

			</select>
					  
  </fieldset>


<table><tr><td colspan="15">		<button type="submit" name="Submit">Add</button></td>
</table>

</form>
  


</body>

<script>
			$(document).ready(function () {
				//Select2
				$(".country").select2({
					maximumSelectionLength: 50,
				});
				//Chosen
				/*$(".country1").chosen({
					max_selected_options: 20,
				});*/
			});
		</script>
		



		<!--These jQuery libraries for
		chosen need to be included-->
		
		<link rel="stylesheet"
			href=
"jsnew/chosen.min.css" />

		<!--These jQuery libraries for select2
			need to be included-->
		<script src=
"jsnew/select2.min.js">
	</script>
		<link rel="stylesheet"
			href=
"jsnew/select2.min.css" />
</html>
