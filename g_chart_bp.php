<?php
//include "config.php";
    require('db1.php');

$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];	

$queryc = "SELECT * FROM inpatient where pmrn='$pmrn' and eid='$eid'"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$pname=$rowc['pname'];

	?>




<html>
  <head>
  <title>Blood Pressure Chart</title>
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
                     $chartQuery = "SELECT * FROM vitalsbp where pmrn='$pmrn' and eid='$eid'order by id desc limit 40";
                     $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while($row = mysqli_fetch_assoc($chartQueryRecords)){
                            echo "['".$row['date2']."',".$row['score1'].",".$row['score2']."],";
                        }
                     ?>
                ]);



    
	
	var view = new google.visualization.DataView(data);
    
	view.setColumns( [0, 1, { calc: 'stringify', sourceColumn: 1, type: 'string', role: 'annotation' }, 2 , { calc: 'stringify', sourceColumn: 2, type: 'string', role: 'annotation' }] );
	
	

    var options = {
         title: 'BP Graph',
		  pointSize: 10,
        width: 1600,
        height: 600,
        //legend: {position: 'bottom'}
		hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'BP Chart'
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
  <div id=''style='text-align: center; font-size: 40px; color: red;'><b>Patient Name- <?php echo $pname;?>&nbsp;&nbsp;MRN-<?php echo $pmrn;?></b></div>
    <div id='chart_div' style='width: 900px; height: 600px;'></div>
  </body>
</html>