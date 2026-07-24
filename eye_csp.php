
<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','moopd')"; 
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
$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$full=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
$date2 = date('Y-m-d');	
$date1 = date('m/d/Y');
//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from user where uname='$user'");
$data = mysqli_fetch_assoc($query4);
$user_e=$data['fullname'];

$query5 = mysqli_query($db,"select * from pappnew where ID='$id'");
$data1 = mysqli_fetch_assoc($query5);

$url = "newtest5_1.php?pmrn=$pmrn&dname=$full&ID=$id&eid=$eid"; 
?>




<?php 

if(isset($_POST['Submit1'])){

$eye=$_REQUEST['eye'];
$eye1=$_REQUEST['eye1'];

$type_dv=$_REQUEST['type_dv'];
$type_nv=$_REQUEST['type_nv'];
$dv_sph=$_REQUEST['dv_sph'];
$dv_cyl=$_REQUEST['dv_cyl'];
$dv_axis=$_REQUEST['dv_axis'];
$nv_sph=$_REQUEST['nv_sph'];
$nv_cyl=$_REQUEST['nv_cyl'];
$nv_axis=$_REQUEST['nv_axis'];

$dv_va=$_REQUEST['dv_va'];
$dv_va1=$_REQUEST['dv_va1'];
$nv_va=$_REQUEST['nv_va'];
$nv_va1=$_REQUEST['nv_va1'];





$type_dv1=$_REQUEST['type_dv1'];
$type_nv1=$_REQUEST['type_nv1'];
$dv_sph1=$_REQUEST['dv_sph1'];
$dv_cyl1=$_REQUEST['dv_cyl1'];
$dv_axis1=$_REQUEST['dv_axis1'];
$nv_sph1=$_REQUEST['nv_sph1'];
$nv_cyl1=$_REQUEST['nv_cyl1'];
$nv_axis1=$_REQUEST['nv_axis1'];

$ipd=$_REQUEST["ipd"];
$comments=$_REQUEST["comments"];

//$pmrn=$data1["pmrn"];
$pname=$data1["pname"];



//$id=$row1["id"];

$ins_query1="insert into eye_medi (`dname`,`pmrn`,`pname`,`eid`,`date`,`ndate`,`eye`,`eye1`,`type_dv`,`dv_sph`,`dv_cyl`,`dv_axis`,`type_nv`,`nv_sph`,`nv_cyl`,`nv_axis`,`type_dv1`,`dv_sph1`,`dv_cyl1`,`dv_axis1`,`type_nv1`,`nv_sph1`,`nv_cyl1`,`nv_axis1`,`user`,`comments`,`ipd`,`dv_va`,`dv_va1`,`nv_va`,`nv_va1`) values 
('$full','$pmrn','$pname','$eid','$date1','$date2','$eye','$eye1','$type_dv','$dv_sph','$dv_cyl','$dv_axis','$type_nv','$nv_sph','$nv_cyl','$nv_axis','$type_dv1','$dv_sph1','$dv_cyl1','$dv_axis1','$type_nv1','$nv_sph1','$nv_cyl1','$nv_axis1','$user_e','$comments','$ipd','$dv_va','$dv_va1','$nv_va','$nv_va1')";
mysqli_query($con,$ins_query1) or die(mysql_error());

}

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
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="toastr.min.css">
    <style type="text/css">
        body{
            background:#d1d1d2;
        }
        .mian-section{
            padding:20px 60px;
            margin-top:100px;
            background:#fff;
        }
        .title{
            margin-bottom:50px;
        }
        .label-success{
            position: relative;
            top:20px;
        }
    </style>
  <title>Medication Form</title>
  
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
    max-width: 1600px;
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
  
  
  
   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>
  
  
  
  
  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	//$("#loding1").hide();
	//$("#loding2").hide();
	$(".country").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".state").find('option').remove();
		//$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				//$("#loding1").hide();
				$(".state").html(html);
			} 
		});
	});
	
	
	$(".country").change(function()
	{
		//$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	//$(".state").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state11.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
			//	$("#loding1").hide();
				$(".city").html(html);
			} 
		});
	});
	
	
	$(".country").change(function()
	{
		//$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	//$(".state").find('option').remove();
		$(".city22").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state12.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
			//	$("#loding1").hide();
				$(".city22").html(html);
			} 
		});
	});
	
	
		
	
});
</script>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   
   
   
   
              <script src="jsnew/jquery.min1.js"></script>  
           <link rel="stylesheet" href="jsnew/bootstrap.min1.css" />  
           <script src="jsnew/bootstrap.min1.js"></script>  



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


<form action="" method="post" name="form">
        
        <table align="center" class="table table-bordered" id="dynamic_field"> 
			
<tr>
 <th width="5%"><strong>MRN</strong></td>     
	 <th width="5%"><strong>Eye</strong></td>
	  <th width="5%"><strong>Vision</strong></td>
     
      
     	  <th width="5%"><strong>DV(SPH)</strong></td>
      	  <th width="5%"><strong>DV(CYL)</strong></td>
		  <th width="5%"><strong>DV(AXIS)</strong></td>
		  <th width="5%"><strong>DV(VA)</strong></td>
		  <th width="5%"><strong>Vision</strong></td>
		  <th width="5%"><strong>NV(SPH)</strong></td>
      	  <th width="5%"><strong>NV(CYL)</strong></td>
		  <th width="5%"><strong>NV(AXIS)</strong></td>
		  <th width="5%"><strong>NV(VA)</strong></td>
		   <th width="5%"><strong>Eye</strong></td>
     <th width="5%"><strong>Vision</strong></td>
      
     	  <th width="5%"><strong>DV(SPH)</strong></td>
      	  <th width="5%"><strong>DV(CYL)</strong></td>
		  <th width="5%"><strong>DV(AXIS)</strong></td>
		  <th width="5%"><strong>DV(VA)</strong></td>
		  <th width="5%"><strong>Vision</strong></td>
		  <th width="5%"><strong>NV(SPH)</strong></td>
      	  <th width="5%"><strong>NV(CYL)</strong></td>
		  <th width="5%"><strong>NV(AXIS)</strong></td>
		  <th width="5%"><strong>NV(VA)</strong></td>
		  
		  <th width="5%"><strong>Comments</strong></td>
		  <th width="5%"><strong>IPD</strong></td>
		  <th width="5%"><strong>Date</strong></td>
		  <th width="5%"><strong>Entry By</strong></td>
		  <th width="5%"><strong>Receive / Print</strong></td>
					  
       

	   </tr>
	   <tbody class="row_position">
 <?php
					
					$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
$dname=$_REQUEST["dname"];
$count=1;
                        
						$sel_query="SELECT * FROM eye_medi where status_csp in ('','Received') ORDER BY id desc";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
                        {
                    ?>
                        
						      

      <tr>
	        <td align="left" ><strong><?php echo $row["pmrn"]; ?></strong></td>
			<td align="left" ><strong><?php echo $row["eye"]; ?></strong></td>
			      
				  <td align="left"><strong><?php echo $row["type_dv"]; ?></strong></td>
				  <td align="left"><?php echo $row["dv_sph"]; ?></td>
				  <td align="left"><?php echo $row["dv_cyl"]; ?></td>
				  <td align="left"><?php echo $row["dv_axis"]; ?></td>
				  <td align="left"><?php echo $row["dv_va"]; ?></td>
				  
				  
	        
			      <td align="left"><strong><?php echo $row["type_nv"]; ?></strong></td>
				  <td align="left"><?php echo $row["nv_sph"]; ?></td>
				  <td align="left"><?php echo $row["nv_cyl"]; ?></td>
				  <td align="left"><?php echo $row["nv_axis"]; ?></td>
				  <td align="left"><?php echo $row["nv_va"]; ?></td>
				  
				  <td align="left" ><strong><?php echo $row["eye1"]; ?></strong></td>
			      
				  <td align="left"><strong><?php echo $row["type_dv1"]; ?></strong></td>
				  <td align="left"><?php echo $row["dv_sph1"]; ?></td>
				  <td align="left"><?php echo $row["dv_cyl1"]; ?></td>
				  <td align="left"><?php echo $row["dv_axis1"]; ?></td>
				  <td align="left"><?php echo $row["dv_va1"]; ?></td>
				  
				  
	        
			      <td align="left"><strong><?php echo $row["type_nv1"]; ?></strong></td>
				  <td align="left"><?php echo $row["nv_sph1"]; ?></td>
				  <td align="left"><?php echo $row["nv_cyl1"]; ?></td>
				  <td align="left"><?php echo $row["nv_axis1"]; ?></td>
				  <td align="left"><?php echo $row["nv_va1"]; ?></td>
				  
				  <td align="left"><?php echo $row["comments"]; ?></td>
				  <td align="left"><?php echo $row["ipd"]; ?></td>
				  
				  <td align="left"><?php echo $row["ndate"]; ?></td>
				  <td align="left"><?php echo $row["user"]; ?></td>
				  
	<?php 
	echo $csp_recv=$row['status_csp'];
	$pmrn=$row['pmrn'];
	$eid=$row['eid'];
	$dname=$row['user'];
	
	if ($csp_recv!='Received')
	
	
	
	{
		echo"<td align='left'><a href='eye_csp_receive?id=".$row["id"]."'>Receive</a></td>";
		
	}
	
	else if($csp_recv=='Received')
	{
		echo"<td align='left'><a href='eye_csp_print?id=".$row["id"]."&pmrn=".$pmrn."&dname=".$dname."&eid=".$eid."&ID=".$id."'>Print</a></td>";
		}
		
		?>
				  
	
				  
				  </tr>
				  


  	  


                    <?php 
                       $count++; } 
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
	
</form>


</table>
</body>

</html>


    