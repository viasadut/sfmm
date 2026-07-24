
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
//$ip=$_SERVER['REMOTE_ADDR'];




    //$ip = "195.123.321.456";
  //  $split = explode(".", $ip);
    //$last= $split[3];
    //$host=substr($last, -2);

//    $grn=$host.date(ymds)

?>

<?php
$full = $row39['fullname'];

$user=$_SESSION["sess_username"];

$query40 = "SELECT * FROM staff3 where sid='$fullname'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);

$sid1=$row40['sid1'];
$cat=$row40['cat'];
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
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

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}
</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm this Request ?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Reject this Leave ?");
}

</script>

</head>


<body>








<div id='cssmenu'>
<ul>
   <li><a href='viewnew11'><span>Home</span></a></li>
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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s Charge Code Pending Approval List </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      
	  
	  <th width="17%"><strong>Request Department</strong></th>
      <th width="10%"><strong>PO NO</strong></th>
	  <th width="10%"><strong>Supplier</strong></th>
	  <th width="10%"><strong>Discount</strong></th>
	  	  
	  <th width="10%"><strong>Total Amount</strong></th>
      
      <th width="14%"><strong>Issue Date</strong>   
      
	  
	  <th width="14%"><strong>Status</strong>
	  <th width="14%"><strong>Print PO</strong>
	   
	   </tr>
  </thead>
  <tbody>


  
	
	

    <?php
    $db = new PDO("mysql:host=localhost;dbname=sfmmkpjnew", "root", "Godiloveu16");
    
    $sql = "
    SELECT 
    p.id,
       SUM(p.total_amount) AS total_po_amount,
        SUM(p1.tprice) AS total_used_amount
    FROM po_table p
    JOIN po_table1 p1 
    ON p.id = p1.po_id
    WHERE p.po_type != 'Pharmacy'
    GROUP BY p.id
    HAVING SUM(p.total_amount) + SUM(p.amount_discount) > SUM(p1.tprice) 
    ORDER BY p.id DESC
    ";
    
    $stmt = $db->prepare($sql);
    $stmt->execute();
    
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($rows) {
        echo "<table border='1' cellpadding='5'>
                <tr>
                    <th>ID</th>
                    <th>PO No</th>
                    <th>Total PO Amount</th>
                    <th>Total Used Amount</th>
                </tr>";
    
        foreach ($rows as $row) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['po_no']}</td>
                    <td>{$row['total_po_amount']}</td>
                    <td>{$row['total_used_amount']}</td>
                  </tr>";
        }
    
        echo "</table>";
    } else {
        echo "No records found.";
    }
    ?>
        
	
</tbody>
</table>

</form>

</body>

</html>

