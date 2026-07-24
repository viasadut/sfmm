<?php
//include "config.php";
    require('db1.php');

$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];	
	
	?>




<html>
  <head>
    <script type="text/javascript" src="g_chart.js"></script>
    <script type='text/javascript'>
      google.charts.load('current', {'packages':['annotationchart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		  
	google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart(){
    var data = google.visualization.arrayToDataTable([
       ['Time', 'SBP', 'DBP'],
                     <?php
                     $chartQuery = "SELECT * FROM vitalsbp where pmrn='$pmrn' and eid='$eid'";
                     $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while($row = mysqli_fetch_assoc($chartQueryRecords)){
                            echo "['".$row['date2']."',".$row['score1'].",".$row['score2']."],";
                        }
                     ?>
                ]);



    
	
	var view = new google.visualization.DataView(data);
    
	view.setColumns( [0, 1, { calc: 'stringify', sourceColumn: 1, type: 'string', role: 'annotation' }, 2 , { calc: 'stringify', sourceColumn: 2, type: 'string', role: 'annotation' }] );
	
	

    var options = {
         title: 'Temperature Graph',
		  pointSize: 10,
        width: 1200,
        height: 600,
        //legend: {position: 'bottom'}
		hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'Temperature Chart'
        },
        series: {
          1: {curveType: 'function'}
		  
		  
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

    chart.draw(view, options);  // <-- use data view
}
      }
    </script>
  </head>

  <body>
    <div id='chart_div' style='width: 900px; height: 600px;'></div>
  </body>
</html>