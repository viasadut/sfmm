<?php
error_reporting(0);
    require('db1.php');
    $departmentId = $_POST['departmentId'];

    if (!empty($departmentId)) {
        $query = "SELECT sname FROM staff3 WHERE dept = '$departmentId' ORDER BY `staff3`.`sname` ASC";
        echo $query;
        $result_sname = $con->query($query);
        
        if ($result_sname->num_rows > 0) {
            while ($row = $result_sname->fetch_assoc()) {
                echo '<option value="'.$row['sname'].'">'.$row['sname'].'</option>'; 
            }
        }else{
            echo '<option value="">Employee not available</option>'; 
        }
    }


    $output = '';
    if(isset($_POST["query"]))
    {
     $search = mysqli_real_escape_string($con, $_POST["query"]);
     $query = "
      SELECT * FROM staff3 
      WHERE dept LIKE '%".$search."%' OR sname LIKE '%".$search."%' AND status ='Active'
     ";
    }
    else
    {
     $query = "
      SELECT * FROM staff3 ORDER BY id
     ";
    }

    $result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>#</th>
     <th>Employee Name</th>
     <th>Employee ID</th>
     <th>Department</th>
     <th>	Start Time</th>
     <th>date</th>
     <th>status</th>
     
    </tr>
 ';
 $count=1;
 while($row = mysqli_fetch_assoc($result))
 {




    $adate=date('Y-m-d');
    $ssid=$row["sid1"];
    $query40 = "SELECT * FROM tm where uid= '$ssid' and date1='$adate';"; 
        
    $result40 = mysqli_query($con, $query40) or die(mysqli_error());

    // Print out result
    $row40 = mysqli_fetch_array($result40);
    $mname=$row40["status"];
    //$location=$row40["location"];

    $myvalue = $row40["date"];
    $datetime = new DateTime($myvalue); 
    $sdate = $datetime->format('Y-m-d'); 
    $stime = $datetime->format('His');

    $stime1='083000';
    //$stime2 = strtotime('H:i:s' $stime1);
    $stime3=$stime-$stime1;

    $q9 = "SELECT * from dleave where hstatus='Confirmed By TM' and sid='$ssid' and '$adate' between sdate and edate"; 
    $re9 = mysqli_query($con, $q9) or die ( mysqli_error());
    $r9 = mysqli_fetch_assoc($re9);
    //$stime=$row40["date"];


    $qh = "SELECT * from hday where hdate='$adate'"; 
    $reh = mysqli_query($con, $qh) or die ( mysqli_error($con));
    $rh = mysqli_fetch_assoc($reh);




    $ssid=$row[sid1];
    $query40 = "SELECT status FROM tm where uid= '$ssid' and date1='$adate';";
    $result40 = mysqli_query($con, $query40) or die(mysqli_error()); 
    $row40 = mysqli_fetch_array($result40);
    $mname=$row40["status"];



    

    $count++;
  $output .= '
   <tr>
    <td>'.$count.'</td>
    <td>'.$row["sname"].'</td>
    <td>'.$row["sid1"].'</td>
    <td>'.$row["dept"].'</td>

    <td>'.$myvalue.'</td>
    <td>'.$sdate.'</td>
    <td>'.$mname.'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}
    
?>