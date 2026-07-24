<?php 

$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$dbhandle= new mysqli('localhost','root','Godiloveu16','sfmmkpjnew');
echo $dbhandle->connect_error;

$querym="select * from pappnew where pmrn='$pmrn' order by id desc limit 3";
$resm=$dbhandle->query($querym);






?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  
  
  
<script type="text/javascript" src="jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["linechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Weight', 'Temperature','Pluse','SPO2'],
          <?php
 while($rowm=$resm->fetch_assoc())
{
echo"['".$rowm['adate1']."',".$rowm['weight'].",".$rowm['temp'].",".$rowm['ppluse'].",".$rowm['spo2']."],";
}
?>

        ]);

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 550, height: 320, legend: 'left', title: 'Patient Last 3 visit Vitals Chart'});
      }
    </script>
  
<style>
.center {
  leftmargin: 0px;
  
  border: 0px solid #73AD21;
  padding: 0px;
  display: block;
  width: 550px; 
  height: 320px;
}
</style>  
</head>
<body>

<div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
            <div id="chart_div" class="center"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>
