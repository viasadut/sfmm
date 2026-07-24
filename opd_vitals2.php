<?php 

$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$dbhandle= new mysqli('localhost','root','Godiloveu16','sfmmkpjnew');
echo $dbhandle->connect_error;

$query="select * from pappnew where pmrn='$pmrn'";
$res=$dbhandle->query($query);






?>
  <html>
  <head>
    <script type="text/javascript" src="jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["linechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Weight', 'Temperature'],
          <?php
 while($row=$res->fetch_assoc())
{
echo"['".$row['adate1']."',".$row['weight'].",".$row['temp']."],";
}
?>

        ]);

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 900, height: 640, legend: 'bottom', title: 'Company Performance'});
      }
    </script>
  </head>

  <body>
    <div id="chart_div"></div>
  </body>
</html>