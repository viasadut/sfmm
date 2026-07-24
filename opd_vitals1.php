<?php 

$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$dbhandle= new mysqli('localhost','root','Godiloveu16','sfmmkpjnew');
echo $dbhandle->connect_error;

$query="select * from pappnew where pmrn='$pmrn' and status in ('HISTORY UPDATED','SEEN')";
$res=$dbhandle->query($query);






?>
  <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
 

 ['Date', 'Weight', 'teamperature','Pulse'],

<?php
 while($row=$res->fetch_assoc())
{
echo"['".$row['adate1']."',".$row['weight'].",".$row['temp'].",".$row['ppluse']."],";
}
?>
     
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 640px"></div>
  </body>
</html>
