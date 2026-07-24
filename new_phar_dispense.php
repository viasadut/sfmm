<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','pharmacy')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php 
include "con_db.php";

$days_ago=date('Y-m-d');
$ex_date = date('Y-m-d', strtotime('+7 days', strtotime($days_ago)));
?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$user=$_SESSION["sess_username"];
$req_loc=$_REQUEST['req_loc'];
$sno=$_REQUEST['rfid'];
$stime = date('d/m/Y H:i:s');
//$pmrn=$_REQUEST['pmrn'];
//$full=$_REQUEST['dreffer'];
//$eid=$_REQUEST['eid'];
//$ieid=$_REQUEST['ieid'];
//$type=$_REQUEST['type'];

//include("auth.php");
$add_time=date('Y-m-d h:i:s');
?>


<?php

if(isset($_POST['but_update'])){


if(empty($_REQUEST['update']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}


            else {
                foreach($_POST['update'] as $updateid){
					
					//echo date('i').''.rand();
			$runningTime = date('dsiY')+$updateid;
			$bar_code = date('iYds');
			$add_by=date('Y-m-d h:i:s');
			$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
			$objDB1 = mysqli_select_db($objConnect,"sfmmkpjnew");

			$qq = mysqli_query($db,"select * from medi_stock where id='".$updateid."'");
			$dd = mysqli_fetch_assoc($qq);
			$medi_1 = $dd["g_name"];
			$code_1 = $dd["code"];
			
			$qq1 = mysqli_query($db,"select * from medicine where code='".$code_1."' and status='Active'");
			$dd1 = mysqli_fetch_assoc($qq1);
			$p_price=$dd1['uprice'];
			$brand=$dd1['brand1'];
			$lqty=$dd1['tqty'];
			$ins = $dd["pdos"].','.$dd["frelation"].','.$dd["duration"];
			
$eqty2 = $_POST['eqty1_'.$updateid];
$eqty5 = $_POST['eqty2_'.$updateid];
$u_qty=$lqty-$eqty2;
$u_price=$eqty2*$p_price;

			$ortime = date('d/m/Y H:i:s');
			$adate = date('Y-m-d');
			
			
			
	$chk=mysqli_query($db,"SELECT * FROM phar_sale WHERE `sno`='$sno' and code='$code_1'");
	$chk_row=mysqli_fetch_assoc($chk);
	$mqty=$chk_row['qty'];
	$r_id=$chk_row['id'];
	$fqty=$mqty+$eqty2;
	$charge_f=$fqty*$p_price;
		
			

$sel96="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy'  order by exdate asc limit 1;";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=$b_chk_m['add_qty'];
$m_qty1=$b_chk_m['add_qty']-$eqty2;
$rf=$b_chk_m['rfid'];
$exdate=$b_chk_m['exdate'];
$bb_no=$b_chk_m['batch_no'];
$mid=$b_chk_m['id'];


			
			
			

			//if($eqty5!='0' and $eqty5 < $eqty2)
				



	
	

if($eqty5 >= $eqty2 and $mqty=='' and $mm_qty>=$eqty2 and $eqty2>0)
	{
			
	$ins_query3="update medi_stock set `add_qty`='$m_qty1' where id='$mid' and location='Pharmacy'";
mysqli_query($con,$ins_query3) or die(mysql_error());



$strSQL1 = "update medi_stock set status='Served',add_qty='$eqty2',given_qty='$eqty2',exdate='$exdate',u_price='$p_price',t_price='$u_price',batch_no='$bb_no',add_by='$user',add_time='$add_time' where id='".$updateid."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);
		$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`brand`,`ins`,`location`,`code`,`pmrn`,`pname`) values
			('$medi_1','$eqty2','$p_price','$u_price','$user','$adate','$sno','$brand','$ins','$req_loc','$code_1','$p_mrn','$p_name')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($objConnect,$strSQL2);

			
	}	
			

//#1
				
			
			else if($eqty5 >= $eqty2 and $mqty=='' and $mm_qty<$eqty2 and $eqty2>0)
	{
		

$strSQL1 = "update medi_stock set status='Served',add_qty='$eqty2',given_qty='$eqty2',exdate='$exdate',u_price='$p_price',t_price='$u_price',batch_no='$bb_no',add_by='$user',add_time='$add_time' where id='".$updateid."'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);
		$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`brand`,`ins`,`location`,`code`,`pmrn`,`pname`) values
			('$medi_1','$eqty2','$p_price','$u_price','$user','$adate','$sno','$brand','$ins','$req_loc','$code_1','$p_mrn','$p_name')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($objConnect,$strSQL2);


		
$ins_query3="update medi_stock set `add_qty`='0' where id='$mid' and location='Pharmacy'";
mysqli_query($con,$ins_query3) or die(mysql_error());




			$sel97="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy' order by exdate asc limit 1;";
			$result97 = mysqli_query($con,$sel97);
			$b_chk_7=mysqli_fetch_assoc($result97);
			$rfid1=$b_chk_7['rfid'];
			$mid1=$b_chk_7['id'];
			$second_qty=$b_chk_7['add_qty']-$m_qty1;
			$second_qty1=$m_qty1-$b_chk_7['add_qty'];


//#2
			
			if($b_chk_7['add_qty']>=$m_qty1)
	
			{
			$ins_query4="update medi_stock set `add_qty`='$second_qty' where id='$mid1' and location='Pharmacy'";
			mysqli_query($con,$ins_query4) or die(mysql_error());

			}
			
			else if($b_chk_7['add_qty']<$m_qty1)
		
			{
			
			$ins_query4="update medi_stock set `add_qty`='0' where id='$mid1' and location='Pharmacy'";
			mysqli_query($con,$ins_query4) or die(mysql_error());
				

$sel97b="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy' order by exdate asc limit 1;";
$result97b = mysqli_query($con,$sel97b);
$b_chk_7b=mysqli_fetch_assoc($result97b);
$rfid1b=$b_chk_7b['rfid'];
$midb=$b_chk_7b['id'];
$third_qtyb=$b_chk_7b['add_qty']-$second_qty1;
$third_qtyb1=$second_qty1-$b_chk_7b['add_qty'];

//#3

if($b_chk_7b['add_qty']>=$second_qty1)
{
$ins_query4="update medi_stock set `add_qty`='$third_qtyb' where id='$midb' and location='Pharmacy'";
mysqli_query($con,$ins_query4) or die(mysql_error());
}

else if($b_chk_7b['add_qty']<$second_qty1)
{
	
	$ins_query4="update medi_stock set `add_qty`='0' where id='$midb' and location='Pharmacy'";
mysqli_query($con,$ins_query4) or die(mysql_error());
		

$sel97c="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy' order by exdate asc limit 1;";
$result97c = mysqli_query($con,$sel97c);
$b_chk_7c=mysqli_fetch_assoc($result97c);
$rfid1c=$b_chk_7c['rfid'];
$midc=$b_chk_7c['id'];
$forth_qtyc=$b_chk_7c['add_qty']-$third_qtyb1;
$forth_qtyc1=$third_qtyb1-$b_chk_7c['add_qty'];

//#4

if($b_chk_7c['add_qty']>=$third_qtyb1)
{
$ins_query4="update medi_stock set `add_qty`='$forth_qtyc' where id='$midc' and location='Pharmacy'";
mysqli_query($con,$ins_query4) or die(mysql_error());
}
else if($b_chk_7c['add_qty']<$third_qtyb1)
{
	
	$ins_query4="update medi_stock set `add_qty`='0' where id='$midc' and location='Pharmacy'";
mysqli_query($con,$ins_query4) or die(mysql_error());
		

$sel97d="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy' order by exdate asc limit 1;";
$result97d = mysqli_query($con,$sel97d);
$b_chk_7d=mysqli_fetch_assoc($result97d);
$rfid1d=$b_chk_7d['rfid'];
$midd=$b_chk_7d['id'];
$fifth_qtyd=$b_chk_7d['add_qty']-$forth_qtyc1;
$fifth_qtyd1=$forth_qtyc1-$b_chk_7d['add_qty'];

//#5


if($b_chk_7d['add_qty']>=$forth_qtyc1)
{
$ins_query4="update medi_stock set `add_qty`='$fifth_qtyd' where id='$midd' and location='Pharmacy'";
mysqli_query($con,$ins_query4) or die(mysql_error());
}
else if($b_chk_7d['add_qty']<$forth_qtyc1)
{
	$ins_query4="update medi_stock set `add_qty`='0' where id='$midd' and location='Pharmacy'";
mysqli_query($con,$ins_query4) or die(mysql_error());

$sel97e="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy' order by exdate asc limit 1;";
$result97e = mysqli_query($con,$sel97e);
$b_chk_7e=mysqli_fetch_assoc($result97e);
$rfid1e=$b_chk_7e['rfid'];
$mide=$b_chk_7e['id'];
$sixth_qtyd=$b_chk_7e['add_qty']-$fifth_qtyd1;
$sixth_qtyd1=$fifth_qtyd1-$b_chk_7e['add_qty'];
	
	
	



//#6


if($b_chk_7e['add_qty']>=$fifth_qtyd1)
{
$ins_query4="update medi_stock set `add_qty`='$sixth_qtyd' where id='$mide' and location='Pharmacy'";
mysqli_query($con,$ins_query4) or die(mysql_error());
}
else if($b_chk_7e['add_qty']<$fifth_qtyd1)
{
	$ins_query4="update medi_stock set `add_qty`='0' where id='$mide' and location='Pharmacy'";
mysqli_query($con,$ins_query4) or die(mysql_error());

$sel97f="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy' order by exdate asc limit 1;";
$result97f = mysqli_query($con,$sel97f);
$b_chk_7f=mysqli_fetch_assoc($result97f);
$rfid1f=$b_chk_7f['rfid'];
$midf=$b_chk_7f['id'];
$seven_qtyd=$b_chk_7f['add_qty']-$sixth_qtyd1;
$seven_qtyd1=$sixth_qtyd1-$b_chk_7f['add_qty'];
	
	
	


//#7


if($b_chk_7f['add_qty']>=$sixth_qtyd1)
{
$ins_query4="update medi_stock set `add_qty`='$seven_qtyd' where id='$midf' and location='Pharmacy'";
mysqli_query($con,$ins_query4) or die(mysql_error());
}
else if($b_chk_7f['add_qty']<$sixth_qtyd1)
{
	$ins_query4="update medi_stock set `add_qty`='0' where id='$midf' and location='Pharmacy'";
mysqli_query($con,$ins_query4) or die(mysql_error());

$sel97g="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy' order by exdate asc limit 1;";
$result97g = mysqli_query($con,$sel97g);
$b_chk_7g=mysqli_fetch_assoc($result97g);
$rfid1g=$b_chk_7g['rfid'];
$midf=$b_chk_7g['id'];
$eight_qtyd=$b_chk_7g['add_qty']-$seven_qtyd1;
$eight_qtyd1=$seven_qtyd1-$b_chk_7g['add_qty'];
	
	
	


//#8


if($b_chk_7g['add_qty']>=$seven_qtyd1)
{
$ins_query4="update medi_stock set `add_qty`='$eight_qtyd' where id='$midf' and location='Pharmacy'";
mysqli_query($con,$ins_query4) or die(mysql_error());
}
else if($b_chk_7g['add_qty']<$seven_qtyd1)
{
	$ins_query4="update medi_stock set `add_qty`='0' where id='$midf' and location='Pharmacy'";
mysqli_query($con,$ins_query4) or die(mysql_error());

$sel97h="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy' order by exdate asc limit 1;";
$result97h = mysqli_query($con,$sel97h);
$b_chk_7h=mysqli_fetch_assoc($result97h);
$rfid1h=$b_chk_7h['rfid'];
$midh=$b_chk_7h['id'];
$nine_qtyd=$b_chk_7h['add_qty']-$eight_qtyd1;
$nine_qtyd1=$eight_qtyd1-$b_chk_7h['add_qty'];
	
	
	



//#9


if($b_chk_7h['add_qty']>=$eight_qtyd1)
{
$ins_query4="update medi_stock set `add_qty`='$nine_qtyd' where id='$midh' and location='Pharmacy'";
mysqli_query($con,$ins_query4) or die(mysql_error());
}
else if($b_chk_7h['add_qty']<$eight_qtyd1)
{
	$ins_query4="update medi_stock set `add_qty`='0' where id='$midh' and location='Pharmacy'";
mysqli_query($con,$ins_query4) or die(mysql_error());

$sel97i="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy' order by exdate asc limit 1;";
$result97i = mysqli_query($con,$sel97i);
$b_chk_7i=mysqli_fetch_assoc($result97i);
$rfid1i=$b_chk_7i['rfid'];
$midi=$b_chk_7i['id'];
$ten_qtyd=$b_chk_7i['add_qty']-$eight_qtyd1;
$ten_qtyd1=$eight_qtyd1-$b_chk_7i['add_qty'];



//#10


if($b_chk_7i['add_qty']>=$nine_qtyd1)
{
$ins_query4="update medi_stock set `add_qty`='$ten_qtyd' where id='$midi' and location='Pharmacy'";
mysqli_query($con,$ins_query4) or die(mysql_error());
}
else if($b_chk_7i['add_qty']<$nine_qtyd1)
{
	$ins_query4="update medi_stock set `add_qty`='0' where id='$midi' and location='Pharmacy'";
mysqli_query($con,$ins_query4) or die(mysql_error());

/*$sel97i="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy' order by exdate asc limit 1;";
$result97i = mysqli_query($con,$sel97i);
$b_chk_7i=mysqli_fetch_assoc($result97i);
$rfid1i=$b_chk_7i['rfid'];
$ten_qtyd=$b_chk_7i['add_qty']-$eight_qtyd1;
$ten_qtyd1=$eight_qtyd1-$b_chk_7i['add_qty'];
	*/
	
}}}}	}
}
	
}

		}
	//$url = "srequest2" ;
//header("Location:$url");
			
	}
	}
	
	
	
	
	

	


}		}
}


?>
<?php


if(isset($_POST['insert'])){
	
	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Procedure Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    

  
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
  
  height: 10px;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 30%;
  background-color: #e8eeef;
  color: red;
  font-weight: bold;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}


input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 10px;
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
  width: 20%;
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






* {
    box-sizing: border-box;
}
#data {
    overflow:hidden;
    padding:0;
	width:94vw;
	
}
select {
	padding:0;
	padding-left:1px;
	border:none;
	background-color:#eee;
	width:100%;
	white-space: normal;
	height:200px;
}
option {
	height:40px;
	width:52px;
	border:1px solid #000;
	background-color:white;
	margin-left:-1px;
	display:inline-block;
}




      </style>

    
<link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
  
  




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  

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
return confirm("Are you Sure to Reveive this Sample ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Reject this Sample ?");
}

</script>
<script src="jsnew/pprefixfree.min.js"></script>



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
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
		
		$('#datepicker1').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
	});
</script>


  
          
           <title>Webslesson Tutorial | PHP Ajax Update MySQL Data Through Bootstrap Modal</title>  
           
		   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    
    <script src="jsnew/jquery-ui.js"></script>
	
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='inviewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<div class='container'>
<form name="frmMain1" action="" method="post" > 
        <table align="center" class="table table-bordered" id="dynamic_field"> 
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><h1 style="color:red"><strong>Bill No - <?php echo $sno;?></strong></h1></label></td> </tr>
<tr><td colspan="7" align="center"><label><strong>S/No- <?php echo $sid;?></strong></label></td> 
<td colspan="10" align="center"><label><strong>User- <?php echo $user ;?></strong></label></td> 
<td colspan="7" align="center"><label><strong>Date & Time:<?php echo $stime ;?> </strong></label></td> 



</tr>



<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="8" align="center"><strong>Medicine Name</strong></td>
	  <td colspan="7" align="center"><strong>Code</strong></td>
     	  <td colspan="1" align="center"style="font-weight: bold;font-size:22px;color:red"><strong>Stock In Hand</strong></td>
		  <td colspan="1" align="center"><strong>Request_QTY</strong></td>
		  <td colspan="1" align="center"><strong>Available_QTY</strong></td>
      	  <td colspan="1" align="center"><strong>Issue_Qty</strong></td>
		  
		  <td colspan="1" align="center"><strong>Serve</strong></td>
		
       

	   </tr>
	   
	   
	    <?php 
                    $query = "select * from medi_stock where rfid='$sno' and req_loc='$req_loc' and status in ('Pending','Served','Partially Served')";
                    $result = mysqli_query($con,$query);
					$count=1;
                    while($row = mysqli_fetch_array($result) ){
                        $id = $row['id'];
                        $medi = $row['g_name'];
						$pdos = $row['pdos'];
						$duration = $row['duration'];
						$frelation = $row['frelation'];
						$ccode = $row['code'];
                       
$query1 = "select * from medicine where code='$ccode' and status='Active'";
                    $result1 = mysqli_query($con,$query1);
					   $row1 = mysqli_fetch_array($result1);
                     
$mcode = $row['code'];
	  $sum = "SELECT SUM(add_qty) FROM medi_stock where code='$mcode' and location='Pharmacy'" ;
	 
$sum1 = mysqli_query($con, $sum) or die(mysqli_error());
$sumr = mysqli_fetch_assoc($sum1);
$new_qty=$sumr['SUM(add_qty)'];		



$sum_r = "SELECT SUM(add_qty) FROM medi_stock where code='$mcode' and location='$req_loc' and add_qty>0 and status='Served'" ;
	 
$sum1_r = mysqli_query($con, $sum_r) or die(mysqli_error());
$sumr_r = mysqli_fetch_assoc($sum1_r);
$new_qty_r=$sumr_r['SUM(add_qty)'];					 
                    ?>
	   
   
     <td align="center" colspan="1" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $count; ?></td>


                            
                  
                  
	 
      <td align="center"colspan="8" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $row["g_name"]; ?></td>
	  
	  <td align="center"colspan="7" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $row["code"].'<br>'.$row["frelation"].'<br>'.$row["duration"]; ?></td>
	        
<td align="center"colspan="1"style="font-weight: bold;font-size:22px;color:red"><?php echo $new_qty_r;?></td>

			<td align="center"colspan="1" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $row["req_qty"]; ?></td>
			
		
 <td align="center" colspan="1" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $new_qty; ?></td>
		
		
		


 <td align="center" colspan="1" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $row['add_qty']; ?></td>

							  
                            
						
	 
			      

  	  <td align="center"colspan="1">
	  <?php if($row['add_qty']!=$row['req_qty']){echo'
	  
	  <input type="button" name="edit" value="Serve" id="'.$id.'" class="btn btn-info btn-xs edit_data" />
	  ';}
	  ?>
	  </td>  		  	  

	  
	  <td align="center"colspan="1">
	 <?php
	 
	                    $medi = $row['code'];
						
						$pno = $row['sno'];
	                $queryg = "select COUNT(id) from medi_stock2 where sno='$pno' and code='$medi'";
                    $resultg = mysqli_query($con,$queryg);
					$countg=1;
                    $rowg = mysqli_fetch_array($resultg);
     if($rowg['COUNT(id)']>0){
	 echo'
	 
	 <a target="_blank" href="department_bar_transfer_new?sno='.$pno.'"><img src="phar_pic/barcode.png" title="Print Instruction" width="20" height="20" /></a>';}
	 ?>
	 </td>						
	
	  
      </tr>
	  
    <?php $count++; } ?>
	
	
	
	
	 </table>
            </form>
        </div>





 <div id="add_data_Modal" class="modal fade" tabindex="-1" >  
      <div class="modal-dialog">  
           <div class="modal-content">  
                
                <div class="modal-body">  
                     <form method="post" id="insert_form" name="frmMain2">  
                          
                          
						  <input type="text" name="address" id="address" style="width:500px;" readonly> 
						  
			

                          <input type="hidden" name="id" id="id" /> 
						   <input type="hidden" name="code2" id="code2" /> 
						   <input type="hidden" name="add2" id="add2" /> 
						   <input type="hidden" name="rloc" id="rloc" />
						   <input type="hidden" name="lrfid" id="lrfid" />
						  
						   
						
						  
						  
            
       				  
						  
						  <label for="age" style="width:500px;"><strong>Barcode:</strong></label>
      <input type="text" id="pmrn" onkeyup="GetDetail(this.value)" class="form-control action" list="categoryname" autocomplete="off" name='code' required style="font-weight: bold;font-size:22px;color:green;width:500px;">

    <datalist id="categoryname">
	<option value=''>-Select-</option>
				
				<?php
            require('db1.php');
            $uname = '';
            $query = "select * from `medi_stock` where add_qty>0 and location='Pharmacy'";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['rfid']; ?>"><?php echo $row['rfid'].'('.$row['g_name'].')'; ?></option>
        <?php } ?>
        
    </datalist>

<label for="age"><strong>Generic Name:</strong></label>							
	<textarea name="g_name" id="code" class="form-control action" cols="1" rows="1"style="font-weight: bold;font-size:22px;color:green"readonly required>


</textarea>

<br>
<label for="age"><strong>Brand Name:</strong></label>						
						
						 
						
						
		<input type="text" name="b_name" id="brand" required value="" readonly style="font-weight: bold;font-size:22px;color:green"></td>
		

		<label for="age"><strong>Expiry Date:</strong></label>						
						<input type="hidden" name="prfid" id="prfid" required readonly>
						
						
		
						<input type="text" name="location" id="location" required readonly value="" style="font-weight: bold;font-size:22px;color:green"></td>
		
 
		
		
		<label for="age"><strong>R.Qty:</strong></label>	
						  <input type="number" name="result5" id="result5" readonly style="width:70px;"> 
		
		
		<label for="age"><strong>G.Qty:</strong></label>	
						  <input type="number" name="gqty" id="gqty" readonly style="width:70px;"> 
						  <input type="hidden" name="exdate" id="exdate" value="<?php echo $ex_date;?>"readonly style="width:70px;"> 
		
<label for="age"><strong>A. Qty:</strong></label>								

<input type="number" name="tqty" id="tqty" required value="" readonly style="font-weight: bold;font-size:16px;color:green;width:90px">


		  
						  
						  
				


<label for="age"><strong>S.Qty:</strong></label>	
<input type="number" name="sqty" id="sqty"  required value="" style="font-weight: bold;font-size:16px;color:green;width:80px" >





	<label for="age"><strong>Batch NO:</strong></label>	
	<input type="text" name="u_price" id="u_price" readonly value="" style="font-weight: bold;font-size:20px;color:red;width:250px">
				
						
&nbsp;&nbsp;						<input type="submit" name="insert" id="insert45" value="Insert" class="btn btn-success" style="font-weight: bold;font-size:22px;color:red;width:80px">  
						</strong>&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="button" class="btn btn-default" name="close" id="close" data-dismiss="modal" style="font-weight: bold;font-size:22px;color:red;width:80px">Close</button>  
						</label>
						
						
	  

	
		
	  
	  
	  
                     </form>  
                </div>  
                  
           </div>  
      </div>  
 </div>  
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){ 
//$('insert_form').trigger('reset');	  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
	  
	  jQuery(document).ready(function(e) {
  $('#add_data_Modal').on('shown.bs.modal', function() {
    $('input[name="code"]').focus();
  });
});

	  
	  
      $(document).on('click', '.edit_data', function(){  
	  
	  $('#add_data_Modal').modal({backdrop: 'static', keyboard: false})  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"medi_dispense_phar.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                    
                     $('#address').val(data.g_name); 
					 $('#add2').val(data.code); 

					// $('#code').val(code); 		
                     $('#result5').val(data.req_qty); 
					 
					 $('#gqty').val(data.add_qty); 
					$('#id').val(data.id);					 
					
					 $('#rloc').val(data.location);
$('#lrfid').val(data.sno);					 
					 //$('#ggqty').val(data.req_qty); 
					  
                     
					 
                     $('#employee_id').val(data.id);  
                     $('#insert45').val("Serve");  
                     $('#add_data_Modal').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form').on("submit", function(event){  
	  
	  //var tr = $('#sqty').val() + $('#gqty').val();
           event.preventDefault();  
		   
		     var x = document.forms["insert_form"]["sqty"].value;
			 var xx = document.forms["insert_form"]["gqty"].value;
			 var z = document.forms["insert_form"]["tqty"].value;
			  var xy = document.forms["insert_form"]["result5"].value;
			  var exdate = document.forms["insert_form"]["location"].value;
			  var ex_date = document.forms["insert_form"]["exdate"].value;

			  
			 var ox = +x + +xx;
           if($('#code2').val() != $('#add2').val())  
           {  
                alert("Medicine is Not Mactched");  
           }
		   
		   else if(ox > +xy)  
			  // else if(x !='')  
           {  
                alert("Servering Qty is Grater Than The Request Qty- " + ox);  
           } 



		   else if(+x > +z)  
		    //else if(ox > z)  
			  // else if(x !='')  
           {  
                alert("Insufficient Balance- " +z);  
           }
		   
		   
		   
		   else if(exdate<ex_date)  
			  // else if(x !='')  
           {  
                alert("Expiry Date is over or close to be expired");  
           } 
		   
		    
		   
           else  
           {  
                $.ajax({  
                     url:"new_phar_dispense3.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     } 






					 
                });  
           }  
      });  
	  
	  $('#close').click(function(){
	  
          
						$('#insert_form')[0].reset();    
						// parent.location.reload();
                       
                });  
				
				
    


       
	  
	  
	  
	  
	  
	  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"selectmodallab.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 
 
 </script>
 
	<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			
			
			
			
			if (str.length == 0) {
				document.getElementById("tqty").value = "";

				document.getElementById("brand").value = "";
				document.getElementById("code").value = "";
				document.getElementById("uprice").value = "";
				document.getElementById("location").value = "";
				document.getElementById("perlevel").value = "";
				
				//document.getElementById("pp").value = "";
				
				return;
			}
			else {

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
						
						document.getElementById
							("tqty").value = myObj[0];
						
						
						document.getElementById
							("code2").value = myObj[5];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"u_price").value = myObj[1];
							
							
							
							document.getElementById(
							"code").value = myObj[2];
							
							document.getElementById(
							"brand").value = myObj[3];
							
														document.getElementById(
							"location").value = myObj[4];
							
							
							document.getElementById(
							"prfid").value = myObj[6];
							//document.getElementById(
							//"perlevel").value = myObj[5];
							
							//document.getElementById(
							//"pp").value = myObj[3];
							
							//document.getElementById(
							//"qty").value = 0;
							
							
							
							if(myObj[0]>0){
							document.getElementById('tqty').style.color = "green";}
else {
							document.getElementById('tqty').style.color = "red";}		




							

					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "stock_medi_test.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
				
				
				
					
			}
		}
		
		
	
	</script>  
	
	
	<script>
	
	
	</script>

</body>	
</html>

	
	

