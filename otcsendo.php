<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','endo','mng')"; 
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

$user=$_SESSION["sess_username"];



//$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$eid1=date('dmY').$eid;
$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$full = $row139['fullname'];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');





$query5 = mysqli_query($db,"select * from endopapp where pmrn='$pmrn' and eid='$eid'");
$data1 = mysqli_fetch_assoc($query5);
$dname=$data1['dreffer'];
$date3=$data1['adate'];
$page=$data1['page'];
$pgender=$data1['psex'];
$pphone=$data1['pphone'];
//$pname=$data1['pname'];

  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


//$dname =$_REQUEST["adoc"];
//$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$date = date('d/m/Y H:i:s');
$ndate = date('Y-m-d');
$medi = $_REQUEST['medi'];
$pins = $_REQUEST['pins'];
$pname=$data1["pname"];
//$dtime = $_REQUEST['dtime'];
$query159 = mysqli_query($db,"select * from radio where iname='$medi'");
$data159 = mysqli_fetch_assoc($query159);
$type=$data159["type"];
$code=$data159["code"];
$price=$data159["price"];
$type1=$data159["subtype"];
//$result=$data159["result"];
//$reference=$data159["reference"];
//$unit=$data159["unit"];
$link=$data159["link"];
$report=$data159["report"];
$linkv=$data159["linkv"];
$reportv=$data159["reportv"];

$query10 = mysqli_query($db,"select * from endopapp where pmrn='$pmrn' and eid='$eid'");
$data10 = mysqli_fetch_assoc($query10);
$dname1=$data10["dreffer"];




$ins_query="insert into alltest (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`price`,`code`,`link`,`date1`,`linkv`,`report`,`reportv`,`location`,`page`,`pgender`,`subtype`) 
values 
('$dname', '$pmrn','$pname','$eid1','$medi','$pins','$date','$type','$price','$code','$link','$ndate','$linkv','$report','$reportv','Endoscopy','$page','$pgender','$type1')";
mysqli_query($con,$ins_query) or die(mysql_error());


//$ins_query="insert into iinves (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`user`,`room`,`status`,`ordate`,`type`,`code`,`price`,`subtype`,`rstatus`,`link`,`report`,`ndate`,`linkv`,`reportv`) values 
//( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$infu','$user','$remarks','Data Updated','$ordate','$type','$code','$price','$subtype','Ordered','$link','$report','$ndate','$linkv','$reportv')";
//mysqli_query($con,$ins_query) or die(mysql_error());

}
?>
<?php 

if(isset($_POST['Submit1'])){
$medi1=$_REQUEST['medi1'];
$pdos=$_REQUEST['pdos'];
$pmrn=$data1["pmrn"];
$pname=$data1["pname"];
$ins_query1="insert into pmedi (`dname`,`pmrn`,`pname`,`medi`,`pdos`,`eid`) values ('$full','$pmrn','$pname','$medi1','$pdos','$eid')";
mysqli_query($con,$ins_query1) or die(mysql_error());}

?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
if(isset($_POST['DELETE']))
{
require('db1.php');
$id=$_REQUEST['id'];
$query23 = "DELETE FROM alltest WHERE id=$id"; 
$result23 = mysqli_query($con,$query23) or die ( mysqli_error());
//header("Location: newtest2.php"); 
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
  width: 10%;
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
    max-width: 1300px;
  }

}
      </style>

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
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   


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

<form action="" method="post">
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
				<tr>
					<td colspan="6"><label><strong>Doctors's Name :</strong></label></td>
					<td colspan="6"><label><strong>Patient's Name :</strong></label></td>
					<td colspan="4"><label><strong>Patient's MRN:</strong></label></td>
					<td colspan="4"><label><strong>Print:</strong></label></td>

										<input type="hidden" name="new" value="1" />	
				</tr>
				
				<tr>	  
				<td colspan="6"><?php echo $data1["dreffer"]; ?></td>
				<td colspan="6"><?php echo $data1["pname"]; ?></td>
				<td colspan="4"><?php echo $pmrn; ?></td>
				<td align="right" colspan="4"></td>	
												
						
				
</tr>
						

						
						
					


				

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Form</strong></label></td> </tr>
<tr><td colspan="10" align="center"><label><strong>Investigation</strong></label></td> 

<td colspan="10" align="center"><label><strong>Instructions</strong></label></td> 
</tr>
<tr>
<td colspan="10" align="center">
<input type="text" id="infu"  class="form-control action" list="categoryname" autocomplete="off" name='medi'>
<datalist id="categoryname">
  


						<option value=''>-Select Investigation</option>
				<?php 
			$sql = "select * from `radio` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->iname."'>".$row->iname."</option>";
				}
			}
			?>  </datalist></td>

<td colspan="10" align="center">

  <textarea name="pins" id="remarks" class="form-control action" cols="30" rows="10"></textarea>
</td>

</tr>			        

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">ADD</button></td>
	  
</tr>


<script>
$(document).ready(function(){
    $('.action').change(function(){
        if($(this).val() != ''){
            var action = $(this).attr("id");
            var query = $(this).val();
            var result = '';
            if(action == "infu"){  
                result = 'remarks';
				
            }
            $.ajax({
                url:"select_histo.php",
                method:"POST",
                data:{action:action, query:query},
                success:function(data){
                $('#'+result).html(data);
				
                }
            })
        }
    });
});
</script>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="10" align="center"><strong>TEST NAME</strong></td>
      	  <td colspan="5" align="center"><strong>Instruction</strong></td>
		        	  <td colspan="2" align="center"><strong>DELETE</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
//$eid=$_REQUEST["eid"];
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];
$date_endo=date('Y-m-d');

$count=1;
$sel_query="Select * from alltest where pmrn= '$pmrn' and date1='$date_endo' and eid='$eid1' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
			      <td align="center"colspan="5"><?php echo $row["ins"]; ?></td>
				  <td align="center" colspan="2"><a href="endodelete?eid=<?php echo $eid; ?>&pmrn=<?php echo $pmrn; ?>&id=<?php echo $row['id'];?>">DELETE</a></td>
				  <td colspan="1"><a target='_blank' href="sample_receive_print_opd?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>"><img src="print.png" title="Print Report" width="50" height="50" /></a></td>

  	  

	  
      </tr>
    <?php $count++; } ?>
<tr>
<td align="right" colspan="20"><a target='_blank' href="endocsinves?eid=<?php echo "$eid"; ?>&pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"; ?>"><img src="lab.png" title="Print Report" width="150" height="60" />
<a target='_blank' href="endocsinvesrad?eid=<?php echo "$eid"; ?>&pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"; ?>"><img src="rad.png" title="Print Report" width="150" height="60" />
<a target='_blank' href="endocsinvesspd?eid=<?php echo "$eid"; ?>&pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"; ?>"><img src="spd.png" title="Print Report" width="150" height="60" />




</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button onclick="self.close()">Close</button></td>
</tr>
</table>

</form>


</body>

</html>
