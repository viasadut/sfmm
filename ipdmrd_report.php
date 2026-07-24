<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mrd"){
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

$query43 = "SELECT COUNT(adoc) FROM inpatient where adoc= '$bt'and anew BETWEEN '$start' and '$end';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$query44 = "SELECT COUNT(adoc) FROM inpatient where anew BETWEEN '$start' and '$end';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);
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
   <li><a href='homemrd'><span>Home</span></a></li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">Combined Stats</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
						<td colspan="2"><label><strong>Select Start Date:</strong></label></td>
						<td colspan="2"><label><strong>Select End Date:</strong></label></td>	

							
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="2"><input type="date" name="stdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td colspan="2"><input type="date" name="endate" id="datepicker2" placeholder="Select Date" size="15"></td>  
			
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
					 
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Doctor's Name</strong></th>
      <th width="10%"><strong>OPD</strong></th>
	  <th width="10%"><strong>IPD</strong></th>
	  <th width="10%"><strong>OPD Lab inves</strong></th>
       <th width="10%"><strong>OPD Rab inves</strong></th>
      <th width="15%"><strong>IPD Lab Inves </strong>
      <th width="15%"><strong>IPD Rad Inves </strong>

      <th width="14%"><strong>Prescription</strong>   
      
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


	 echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $row43['COUNT(adoc)'];
echo " ,  From  ";
echo $start;
echo "  To  ";
echo $end;
	 $sel_query="Select * from doctor where status in ('Active','active')";

$count=1;
//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["dname"]; ?></td>
      
<?php	  

$dname=$row['dname'];
$dcode=$row['sid'];


$qu44 = "SELECT COUNT(ID),eid FROM pappnew where dname='$dname' and status='SEEN' and adate1 between '$start' and '$end';"; 
$re = mysqli_query($con, $qu44) or die(mysqli_error());
$re44 = mysqli_fetch_assoc($re);

$opd=$re44['COUNT(ID)'];


$qu44_p = "SELECT COUNT(*) as prescription FROM (SELECT * FROM pmedi WHERE ndate BETWEEN '$start' AND '$end' AND dname='$dname' GROUP BY pmrn,eid ) AS SubqueryAlias";
$re_p = mysqli_query($con, $qu44_p) or die(mysqli_error());
$re44_p = mysqli_fetch_assoc($re_p);





$qu44i = "SELECT COUNT(id) FROM inpatient where adoc='$dname' and anew between '$start' and '$end';"; 
$rei = mysqli_query($con, $qu44i) or die(mysqli_error());
$re44i = mysqli_fetch_assoc($rei);
$ipd=$re44i['COUNT(id)'];


$qu44io = "SELECT COUNT(id) FROM alltest where dname='$dname' and date1 between '$start' and '$end' and status in ('DONE','RECEIVED','SEEN') and type in ('LAB','Lab','lab');"; 
$reio = mysqli_query($con, $qu44io) or die(mysqli_error());
$re44io = mysqli_fetch_assoc($reio);
$opd_inves=$re44io['COUNT(id)'];

$qu44io_r = "SELECT COUNT(id) FROM alltest where dname='$dname' and date1 between '$start' and '$end' and status in ('DONE','RECEIVED','SEEN') and type in ('RAD','Rad','rad');"; 
$reio_r = mysqli_query($con, $qu44io_r) or die(mysqli_error());
$re44io_r = mysqli_fetch_assoc($reio_r);
$opd_inves_r=$re44io_r['COUNT(id)'];




$qu44ii = "SELECT COUNT(id) FROM iinves where dname='$dname' and ndate between '$start' and '$end' and status in ('DONE','RECEIVED','SEEN')and type in ('LAB','Lab','lab');"; 
$reii = mysqli_query($con, $qu44ii) or die(mysqli_error());
$re44ii = mysqli_fetch_assoc($reii);
$ipd_inves=$re44ii['COUNT(id)'];


$qu44ii_r = "SELECT COUNT(id) FROM iinves where dname='$dname' and ndate between '$start' and '$end' and status in ('DONE','RECEIVED','SEEN')and type in ('RAD','Rad','rad');"; 
$reii_r = mysqli_query($con, $qu44ii_r) or die(mysqli_error());
$re44ii_r = mysqli_fetch_assoc($reii_r);
$ipd_inves_r=$re44ii_r['COUNT(id)'];
?>

	  
	  <td align="center"><?php echo $opd; ?>  
      <td align="center"><?php echo $ipd; ?>  
	  <td align="center"><?php echo $opd_inves; ?>  
       <td align="center"><?php echo $opd_inves_r; ?>  
       <td align="center"><?php echo $ipd_inves; ?>  
       <td align="center"><?php echo $ipd_inves_r; ?>  
       <td align="center"><?php echo $re44_p['prescription']; ?>  
       
      </tr>
	  
    <?php $count++; } }?>


      <td colspan="10" align="right"><a target='_blank' href="pptt1?dname=<?php echo "$bt";?>&date=<?php echo "$start"; ?>&date1=<?php echo "$end"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
  </tbody>
</table>


</form>
</body>
</html>

<div id="dataModal3" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail3">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal3" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>ICD CODE UPDATE FORM</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form3" name="frmMain23">  
					 
					 
                                       
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="pmrn3" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="pname" id="ppluse3" class="form-control"  size="15" readonly>  
						  
						  
						             	
                         						 

                          <label>ICD CODE</label>                          
                          <select class="con_charge21"
                          multiple=true
					style="width: 445px; overflow-y: auto;" name="icd[]" id="con_charge1">
				
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
				
				
				
				
			

			</select>
            
		
			<script>
        $(document).ready(function(){

            $("#con_charge1").select2({
                ajax: {
                    url: "prescription/prescription/select_search_icd_mrd.php",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });

        </script>
		
                          
                           <input type="hidden" name="employee_id3" id="employee_id3" />  
                           <input type="hidden" name="eid" id="eid" />  
						   <input type="hidden" name="pphone" id="pphone" />  
					<br>	  
						  <label><input type="submit" name="insert" id="insert453" value="Insert" class="btn btn-success"></label>  
					 
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
</html>
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form3')[0].reset();  
      });  
      $(document).on('click', '.edit_data3', function(){  
           var employee_id3 = $(this).attr("id");  
           $.ajax({  
                url:"icd_data_ipd.php",  
                method:"POST",  
                data:{employee_id3:employee_id3},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn3').val(data.pmrn);  
                     $('#ppluse3').val(data.pname);  
					 $('#dname').val(data.dname);  
					$('#adate').val(data.adate1); 
					 $('#temp3').val(data.room); 
					 $('#app_dat3').val(data.infusion); 
					 $('#eid').val(data.eid); 
					 //$('#txtHint').val; 
                          $('#local').val(data.l_doc); 			 
                     $('#pbp').val(data.dname); 
					 $('#pbp3').val(data.status); 
					 
					 
					 
					  
                     
					 
                     $('#employee_id3').val(data.id);  
                     $('#insert453').val("Confirm");  
                     $('#add_data_Modal3').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form3').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn3').val() == "")  
           {  
                alert("MRN is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"update_icd_data_ipd.php",  
                     method:"POST",  
                     data:$('#insert_form3').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form3')[0].reset();  
                          $('#add_data_Modal3').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>
