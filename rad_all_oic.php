<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="oic"){
      header('Location: login2?err=2');
    }
?>

<?php
    /*
    Author: Javed Ur Rehman
    Website: https://www.allphptricks.com/
    */
    //session_start();
    require('db1.php');
    //include("auth.php");
    $fullname = $_SESSION['sess_username'];
    $query39 = "SELECT * FROM user where uname= '$fullname'"; 
    $result39 = mysqli_query($con, $query39) or die(mysqli_error());
    // Print out result
    $row39 = mysqli_fetch_array($result39);
    $full = $row39['fullname'];
    $ugroup = $row39['ugroup'];
    $status = $row39['status'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>View Records</title>
    <link rel="stylesheet" href="css/style2.css">
    <style type="text/css">
    <!--
    .style1 {
        font-size: x-large;
        font-weight: bold;
        font-style: italic;
    }
    -->
    div1
    {
    height:
    40px;
    width:
    30%;
    background-color:
    powderblue;
    }
    </style>
    <link rel="stylesheet" href="styles.css">
    <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
	
	<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm this Report ?");
}

</script>

</head>
<body>
    <div id='cssmenu'>
        <ul>
            <li><a href='endohome'><span>Home</span></a></li>
            <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
        </ul>
    </div>
     <p align="center" class="style1">RADIOLOGY STATS</p>
    <form action="" method="POST">
        <h1 align="center" style="background-color:lightgreen;">DATEWISE RADIOLOGY STATS</h1>
        <!-- Form Title -->
     <table width="100%" height="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
		
		

				
					
						<td colspan="8"><label><strong>Select Start Date:</strong></label></td>
						<td colspan="8"><label><strong>Select End Date:</strong></label></td>	

							
			 				<td colspan="4">	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 <td colspan="8"><input type="date" name="stdate" id="datepicker1" placeholder="Select Date" size="15"></td>  
					 <td colspan="8"><input type="date" name="endate" id="datepicker2" placeholder="Select Date" size="15"></td>  
					 
					
					<td colspan="4">	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
		
		
		
			  
<?php
	 
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));


	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
$date2=date('Y-m-d');
$dname2=$row["dname"];
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	$query198j_bed = "SELECT SUM(price) FROM radpapp where adate1='$date2'"; 
	 //Select * from pappnew where adate= '$date' and `bill`='Billed' and status ='SEEN'
$result198j_bed = mysqli_query($dbhandle,$query198j_bed) or die(mysql_error());

// Print out result
$row198j_bed = mysqli_fetch_array($result198j_bed);
$test1c_bed=	$row198j_bed['SUM(price)'];



	echo'
	<td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Amount-'.$test1c_bed.' BDT</strong></td></tr>

            <tr>
                <td colspan="1" align="center"><strong>S.No</strong></td>
                <td colspan="1" align="center"><strong>MRN</strong></td>

                <td colspan="1" align="center"><strong>Order Date </strong></td>
                <td colspan="2" align="center"><strong>Investigation</strong></td>

                <td colspan="1" align="center"><strong>Done Date</strong></td>
                <td colspan="4" align="center"><strong>Result</strong></td>
                <td colspan="4" align="center"><strong>Reference Value</strong></td>
                <td colspan="2" align="center"><strong>Received Comments</strong></td>
                <td colspan="1" align="center"><strong>Received By</strong></td>
                
                <td colspan="1" align="center"><strong>Report</strong></td>
            </tr>
	<tbody>';}?>
                <?php
	 
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
                    
                        $apdate=date('Y-m-d');
                       
                        $count=1;
                        $sel_query="Select * from radpapp where adate1 between '$start' and '$end'  order by `id` DESC;";
                        $result = mysqli_query($con,$sel_query);
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                   
                    <td align="center" colspan="1"><?php echo $count; ?></td>
                    <td align="center"colspan="1"><a target='_blank' href="allreportdocnew?pmrn=<?php echo $row['pmrn']; ?>"style="color:#FF0000;"><?php echo $row["pmrn"]; ?></a></td>
                    <td align="center" colspan="1"><?php echo date('d/m/Y',strtotime($row["adate1"])); ?></td>
                    <td align="center" colspan="2"><a target='_blank' href="all_test_compare?pmrn=<?php echo $row['pmrn']; ?>&infu=<?php echo $row['medi']; ?>"style="color:#FF0000;"><?php echo $row["medi"]; ?></a></td>
                    <td align="center" colspan="1"><?php echo $row["resulttime"]; ?></td>
                    <td align="center" colspan="4"><?php echo $row["result"]; ?></td>
                    <td align="center" colspan="4"><?php echo $remarks;?></td>
                    <td align="center" colspan="2"><?php echo $row["rcomments"]; ?></td>
                    <td align="center" colspan="1"><?php echo $row["rby"]; ?></td>
                    
                    
                    <td align="center" colspan="1"><a target='_blank'
                        href="<?php echo $row['report']?>?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&sno=<?php echo 'O'.$row['id']; ?>">REPORT</a>
                    </td>
                </tr>
	<?php $count++;  }}
                    
                ?>
				



            </tbody>
        </table>
    </form>
</body>

</html>