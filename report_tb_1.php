<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');


?>



<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

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
					
			
			$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
			$objDB1 = mysqli_select_db($objConnect,"sfmmkpjnew");

			


      $query_p = "select * FROM icnote WHERE id='$updateid'"; 
$er_p = mysqli_query($con,$query_p) or die ( mysqli_error());

$err_p = mysqli_fetch_array($er_p);

$dcode=$err_p['dcode'];
$cost_centre=$err_p['ccentre'];
$cr_code=$err_p['ip'];
$dr_code=$err_p['app_con'];
$amount=$err_p['charge'];
			
//$eqty2 = $_POST['eqty1_'.$updateid];
$eqty5 = $_POST['eqty2_'.$updateid];
$date=$err_p['daten'];
			
			
			$strSQL = "insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`dcode`,`c_centre`,`date`,`status`,`amount`,`location`) values 
      ('$updateid','CR','$cr_code','$dcode','$cost_centre','$date','1','$amount','IPD')";
			$objQuery = mysqli_query($objConnect,$strSQL);

      /*$strSQL1 = "insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`status`,`amount`) values 
      ('$updateid','DR','$dr_code','$date','1','$amount')";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);
			*/
			$strSQL1 = "insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`dcode`,`c_centre`,`date`,`status`,`amount`,`location`) values 
      ('$updateid','DR','$dr_code','$dcode','$cost_centre','$date','1','$amount','IPD')";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);


	


	


}		}
echo '<script language="javascript">';
    echo 'alert("Successfully Added !!"); ';

    echo '</script>';


}
?>



<!DOCTYPE html>
<html>
<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}
</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script src="./jquery.multiselect.js"></script>
<link href="./jquery.multiselect.css" rel="stylesheet" />
   
   <script src="jsnew/pprefixfree.min.js"></script>
   <script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Start The Blood?");
}

</script>

<link href="prescription/prescription/css/select2.min.css" rel="stylesheet" />
<script src="prescription/prescription/css/select2.min.js"></script>
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

<h1 align="center">PROCESSED OPD-IPD DATA</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td ><label><strong>Select Start Date:</strong></label></td>
						<td ><label><strong>Select End Date:</strong></label></td>	

							
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td ><input type="date" name="stdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td ><input type="date" name="endate" id="datepicker2" placeholder="Select Date" size="15"></td>  
					 
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



<form name="frmMain1" action="" method="post" > 
        <table align="center" class="table table-bordered" id="dynamic_field"> 




        <tr>
      <td align="center"><strong>S.No</strong></td>
     
      <td align="center"><strong>Account Code</strong></td>
	  
     	  <td align="center"><strong>CR</strong></td>
		  <td align="center"><strong>DR</strong></td>
      	 
		  
		  
		
       

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





	 $query="Select * from pms_tb where date BETWEEN '$start' and '$end' group by acct_code";

     $result = mysqli_query($con,$query);
     $count=1;

     
     while($row = mysqli_fetch_array($result) ){
         $id = $row['id'];
        $acct_group=$row['acct_code'];
         
         $query2 = "select SUM(amount) FROM pms_tb WHERE trans_type='CR' and acct_code='$acct_group'"; 
         $result2 = mysqli_query($con,$query2) or die ( mysqli_error());
         
         $data2 = mysqli_fetch_array($result2);	   


         $query1 = "select SUM(amount) FROM pms_tb WHERE trans_type='DR' and acct_code='$acct_group'"; 
         $result1 = mysqli_query($con,$query1) or die ( mysqli_error());
         
         $data1 = mysqli_fetch_array($result1);	   
         
     ?>
<tr>

<td align="center" ><?php echo $count; ?></td>


                            
                  
                  
	 
<td align="center" ><a href="report_tb_details?id=<?php echo $row["acct_code"]; ?>"><?php echo $row["acct_code"]; ?></a></td>


    <td align="center"><?php if($row["trans_type"]=='CR') {echo $data2["SUM(amount)"];} ?></td>
    <td align="center"><?php if($row["trans_type"]=='DR') {echo $data1["SUM(amount)"];} ?></td>









                        
            
            

  


</tr>

<?php $count++; }} ?>

     

    
  </tbody>
</table>

<script src='a_j_q/jquery-3.3.1.min.js' type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                // Check/Uncheck ALl
                $('#checkAll').change(function(){
                    if($(this).is(':checked')){
                        $('input[name="update[]"]').prop('checked',true);
                    }else{
                        $('input[name="update[]"]').each(function(){
                            $(this).prop('checked',false);
                        }); 
                    }
                });

                // Checkbox click
                $('input[name="update[]"]').click(function(){
                    var total_checkboxes = $('input[name="update[]"]').length;
                    var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

                    if(total_checkboxes_checked == total_checkboxes){
                        $('#checkAll').prop('checked',true);
                    }else{
                        $('#checkAll').prop('checked',false);
                    }
                });
            });
        </script>	
</form>
</body>
</html>

