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
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/


$pid=$_REQUEST['pid'];
$query23 = "select * FROM presnew WHERE id='$pid'"; 
$er = mysqli_query($con,$query23) or die ( mysqli_error());

$err = mysqli_fetch_array($er);
//header("Location: newtest2.php"); 

 $pmrn=$err['pmrn'];
 $eid=$err['eid'];
 $dname=$err['dname'];
 $pname=$err['pname'];
 $page=$err['page'];
 $psex=$err['psex'];
 $pphone=$err['pphone'];

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
//$pmrn=$_REQUEST['pmrn'];
//$eid=$_REQUEST['eid'];
//$dname=$_REQUEST['dname'];
$sno=$_REQUEST['sno'];
$stime = date('d/m/Y H:i:s');
//$pmrn=$_REQUEST['pmrn'];
//$full=$_REQUEST['dreffer'];
//$eid=$_REQUEST['eid'];
//$ieid=$_REQUEST['ieid'];
//$type=$_REQUEST['type'];

//include("auth.php");

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

			


      $query_p = "select * FROM pappnew WHERE ID='$updateid'"; 
$er_p = mysqli_query($con,$query_p) or die ( mysqli_error());

$err_p = mysqli_fetch_array($er_p);

$dcode=$err_p['dcode'];
$cost_centre=$err_p['ccentre'];
$cr_code=$err_p['op'];
$dr_code=$err_p['app_con'];
$amount=$err_p['payment'];
			
//$eqty2 = $_POST['eqty1_'.$updateid];
$eqty5 = $_POST['eqty2_'.$updateid];
$date=date('Y-m-d');
			
			
			$strSQL = "insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`dcode`,`c_centre`,`date`,`status`,`amount`) values 
      ('$updateid','CR','$cr_code','$dcode','$cost_centre','$date','1','$amount')";
			$objQuery = mysqli_query($objConnect,$strSQL);

      $strSQL1 = "insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`status`,`amount`) values 
      ('$updateid','DR','$dr_code','$date','1','$amount')";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);
			
			

	


	


}		}
echo '<script language="javascript">';
    echo 'alert("Successfully Added !!"); ';

    echo '</script>';


}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Medicine</title>
  
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
    max-width: 1200px;
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
    <title>Investigation</title>
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
   <script>
function goBack() {
    window.history.back();
}
</script>



</head>
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


<tr><td colspan="20" align="left"bgcolor="lightgreen"><label><h1 style="color:"><strong>Patient Name  - <?php echo $pname;?></strong></h1></label></td> </tr>
<tr>
<td colspan="5" align="left"bgcolor="lightgreen"><label style="color:red;font-size:18px">MRN  - <?php echo $pmrn;?></label></td> 
<td colspan="5" align="left"bgcolor="lightgreen"><label style="color:red;font-size:18px">Age  - <?php echo $page;?></label></td> 
<td colspan="5" align="left"bgcolor="lightgreen"><label style="color:red;font-size:18px">Gender  - <?php echo $psex;?></label></td> 
<td colspan="5" align="left"bgcolor="lightgreen"><label style="color:red;font-size:18px">Phone  - <?php echo $pphone;?></label></td> 
</tr>



</tr>



<tr>
      <td align="center"><strong>S.No</strong></td>
     
      <td align="center"><strong>Account Code</strong></td>
      <td align="center"><strong>Account Name</strong></td>
	  
     	  <td align="center"><strong>DR</strong></td>
		  <td align="center"><strong>CR</strong></td>
      	 
		  
		  <td align="center"><input type='checkbox' id='checkAll' ></td>
		
       

	   </tr>
	   
	   
	    <?php 
                    $query = "Select * from pms_tb where  date='2025-12-21'";
					//$query = "Select * from medi_stock where add_qty>0 and status NOT IN ('Pending','Rejected')";
                    $result = mysqli_query($con,$query);
					$count=1;

                    
                    while($row = mysqli_fetch_array($result) ){
                        $id = $row['id'];
                       $acct_group=$row['acct_code'];
                        
                        $query2 = "select SUM(amount) FROM pms_tb WHERE trans_type='CR' and acct_code='$acct_group' and trans_id='2451793'"; 
                        $result2 = mysqli_query($con,$query2) or die ( mysqli_error());
                        
                        $data2 = mysqli_fetch_array($result2);	   


                        $query1 = "select SUM(amount) FROM pms_tb WHERE trans_type='DR' and acct_code='$acct_group' and trans_id='2451793'"; 
                        $result1 = mysqli_query($con,$query1) or die ( mysqli_error());
                        
                        $data1 = mysqli_fetch_array($result1);	

                        $query3 = "select SUM(amount) FROM pms_tb WHERE trans_type='DR' and acct_code='0' and trans_id='2451793'"; 
                        $result3 = mysqli_query($con,$query3) or die ( mysqli_error());
                        
                        $data3 = mysqli_fetch_array($result3);	
                        
                        

                        $query22 = "select * FROM tb_master WHERE acct_code='$acct_group'"; 
                        $result22 = mysqli_query($con,$query22) or die ( mysqli_error());
                        
                        $data22 = mysqli_fetch_array($result22);	   



                        $querydr = "select COUNT(id) FROM pms_tb WHERE acct_code='$acct_group' and trans_type='DR'"; 
                        $resultdr = mysqli_query($con,$querydr) or die ( mysqli_error());
                        
                        $datadr = mysqli_fetch_array($resultdr);	   
                        $dr=$datadr['COUNT(id)'];

                        $querycr = "select COUNT(id) FROM pms_tb WHERE acct_code='$acct_group' and trans_type='CR'"; 
                        $resultcr = mysqli_query($con,$querycr) or die ( mysqli_error());
                        
                        $datacr = mysqli_fetch_array($resultcr);	   
                        $cr=$datacr['COUNT(id)'];


                        if($acct_group=='0')
{
                          $value4=$data2['SUM(amount)']-$data1['SUM(amount)'];
                        }

                        else if($data22['acct_type']=='R')
                        {

                          $value=$data2['SUM(amount)']-$data1['SUM(amount)'];
                        }

                        else if($data22['acct_type']=='A')
                        {

                          $value1=$data1['SUM(amount)']-$data2['SUM(amount)'];
                        }

                        
                    ?>
	   
   
     <td align="center" ><?php echo $row['trans_id']; ?></td>


                            
                  
                  
	 
      <td align="center" ><a href="report_tb_details?id=<?php echo $row["acct_code"]; ?>"><?php echo $row["acct_code"]; ?></a></td>
	  
      <td align="center" ><a href="report_tb_details?id=<?php echo $data22["acct_name"]; ?>"><?php echo $data22["acct_name"]; ?></a></td>
	  
		  <td align="center">
      <?php 
      
      if($data22['acct_type']=='A') 
      {echo $value1;} 
      
      
      ?>
      </td>
          <td align="center">
          <?php 
        
        if($data22['acct_type']=='R')
        {echo $value;} 

        
        if($acct_group=='0')
        {echo $value4;} 

        
          ?>
          </td>
	  



	  




							  
                  
			      

  	  

	  
      </tr>
	  
    <?php $count++; } ?>
	
	
	<td colspan='10' align='right'><br><br></td></tr>
	
	
	 </table>
            </form>
        </div>








</body>

</html>
