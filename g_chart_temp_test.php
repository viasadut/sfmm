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
  <title>Temperature Chart</title>
    <script type="text/javascript" src="g_chart.js"></script>
    <script type='text/javascript'>
      google.charts.load('current', {'packages':['annotationchart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		  
	google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart(){
    var data = google.visualization.arrayToDataTable([
       ['Time', 'Temperature'],
                     <?php
                     $chartQuery = "SELECT * FROM vitalstemp where pmrn='$pmrn' and eid='$eid' order by id desc limit 40";
                     $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while($row = mysqli_fetch_assoc($chartQueryRecords)){
                            echo "['".$row['date2']."',".$row['score1']."],";
                        }
                     ?>
                ]);


    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,{
        calc: 'stringify',
        sourceColumn: 1,
        type: 'string',
        role: 'annotation'
    }]);
	
	
	

    var options = {
         title: 'Temperature Graph',
		  pointSize: 10,
        width: 1600,
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

    var chart = new google.visualization.LineChart(document.getElementById('chart_div_temp'));

    chart.draw(view, options);  // <-- use data view
}
      }
    </script>
	
	
	
	<script type='text/javascript'>
      google.charts.load('current', {'packages':['annotationchart']});
      google.charts.setOnLoadCallback(drawChart_bp);

      function drawChart_bp() {
		  
	google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart_bp);
function drawChart_bp(){
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

    var chart = new google.visualization.LineChart(document.getElementById('chart_div_bp'));

    chart.draw(view, options);  // <-- use data view
}
      }
    </script>
	
	
	<script type='text/javascript'>
      google.charts.load('current', {'packages':['annotationchart']});
      google.charts.setOnLoadCallback(drawChart_pulse);

      function drawChart_pulse() {
		  
	google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart_pulse);
function drawChart_pulse(){
    var data = google.visualization.arrayToDataTable([
        ['Time', 'Pulse'],
                     <?php
                     $chartQuery = "SELECT * FROM vitalspulse where pmrn='$pmrn' and eid='$eid' order by id desc limit 40";
                     $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while($row = mysqli_fetch_assoc($chartQueryRecords)){
                            echo "['".$row['date2']."',".$row['score1']."],";
                        }
                     ?>
                ]);


    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,{
        calc: 'stringify',
        sourceColumn: 1,
        type: 'string',
        role: 'annotation'
    }]);
	
	
	

    var options = {
         title: 'Pulse Graph',
		  pointSize: 10,
        width: 1600,
        height: 600,
        //legend: {position: 'bottom'}
		hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'Pulse Chart'
        },
        series: {
          1: {curveType: 'function'}
		  
		  
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div_pulse'));

    chart.draw(view, options);  // <-- use data view
}
      }
    </script>
	
	<script type='text/javascript'>
      google.charts.load('current', {'packages':['annotationchart']});
      google.charts.setOnLoadCallback(drawChart_sa);

      function drawChart_sa() {
		  
	google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart_sa);
function drawChart_sa(){
    var data = google.visualization.arrayToDataTable([
        ['Time', 'Saturation'],
                     <?php
                     $chartQuery = "SELECT * FROM vitalsspo2 where pmrn='$pmrn' and eid='$eid' order by id desc limit 40";
                     $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while($row = mysqli_fetch_assoc($chartQueryRecords)){
                            echo "['".$row['date2']."',".$row['score1']."],";
                        }
                     ?>
                ]);


    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,{
        calc: 'stringify',
        sourceColumn: 1,
        type: 'string',
        role: 'annotation'
    }]);
	
	
	

    var options = {
         title: 'Saturation Graph',
		  pointSize: 10,
        width: 1600,
        height: 600,
        //legend: {position: 'bottom'}
		hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'Saturation Chart'
        },
        series: {
          1: {curveType: 'function'}
		  
		  
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div_sa'));

    chart.draw(view, options);  // <-- use data view
}
      }
    </script>
	
	
	<script type='text/javascript'>
      google.charts.load('current', {'packages':['annotationchart']});
      google.charts.setOnLoadCallback(drawChart_rr);

      function drawChart_rr() {
		  
	google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart_rr);
function drawChart_rr(){
    var data = google.visualization.arrayToDataTable([
        ['Time', 'RR'],
                     <?php
                     $chartQuery = "SELECT * FROM vitalsrr where pmrn='$pmrn' and eid='$eid' order by id desc limit 40";
                     $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while($row = mysqli_fetch_assoc($chartQueryRecords)){
                            echo "['".$row['date2']."',".$row['score1']."],";
                        }
                     ?>
                ]);


    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,{
        calc: 'stringify',
        sourceColumn: 1,
        type: 'string',
        role: 'annotation'
    }]);
	
	
	

    var options = {
         title: 'RR Graph',
		  pointSize: 10,
        width: 1600,
        height: 600,
        //legend: {position: 'bottom'}
		hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'RR Chart'
        },
        series: {
          1: {curveType: 'function'}
		  
		  
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div_rr'));

    chart.draw(view, options);  // <-- use data view
}
      }
    </script>
	
	
	
	 <script type='text/javascript'>
      google.charts.load('current', {'packages':['annotationchart']});
      google.charts.setOnLoadCallback(drawChart_pain);

      function drawChart_pain() {
		  
	google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart_pain);
function drawChart_pain(){
    var data = google.visualization.arrayToDataTable([
        ['Time', 'Pain Score'],
                     <?php
                     $chartQuery = "SELECT * FROM vitalspscore where pmrn='$pmrn' and eid='$eid' order by id desc limit 40";
                     $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while($row = mysqli_fetch_assoc($chartQueryRecords)){
                            echo "['".$row['date2']."',".$row['score1']."],";
                        }
                     ?>
                ]);


    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,{
        calc: 'stringify',
        sourceColumn: 1,
        type: 'string',
        role: 'annotation'
    }]);
	
	
	

    var options = {
         title: 'Pain Score Graph',
		  pointSize: 10,
        width: 1600,
        height: 600,
        //legend: {position: 'bottom'}
		hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'Pain Score Chart'
        },
        series: {
          1: {curveType: 'function'}
		  
		  
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div_pain'));

    chart.draw(view, options);  // <-- use data view
}
      }
    </script>
	
	
	<script type='text/javascript'>
      google.charts.load('current', {'packages':['annotationchart']});
      google.charts.setOnLoadCallback(drawChart_dia);

      function drawChart_dia() {
		  
	google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart_dia);
function drawChart_dia(){
    var data = google.visualization.arrayToDataTable([
        ['Time', 'Diabetic'],
                     <?php
                     $chartQuery = "SELECT * FROM indm where pmrn='$pmrn' and eid='$eid' order by id desc";
                     $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while($row = mysqli_fetch_assoc($chartQueryRecords)){
                            echo "['".$row['rr1'].' '.$row['rr2'].' '.$row['rr4']."',".$row['rr3']."],";
                        }
                     ?>
                ]);


    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1, {
        calc: 'stringify',
        sourceColumn: 1,
        type: 'string',
        role: 'annotation'
    }]);

    var options = {
         title: 'Diabetic Graph',
		  pointSize: 10,
        width: 1200,
        height: 600,
        //legend: {position: 'bottom'}
		hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'Diabetic'
        },
        series: {
          1: {curveType: 'function'}
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div_dia'));

    chart.draw(view, options);  // <-- use data view
}
      }
    </script>
	
	
	<script type='text/javascript'>
      google.charts.load('current', {'packages':['annotationchart']});
      google.charts.setOnLoadCallback(drawChart_flu);

      function drawChart_flu() {
		  
	google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart_flu);
function drawChart_flu(){
    var data = google.visualization.arrayToDataTable([
        ['Time', 'Input', 'Output'],
                     <?php
                     $chartQuery = "SELECT SUM(qty),SUM(qty1),date1 FROM influid where pmrn='$pmrn' and eid='$eid' group by date1 desc";
                     $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while($row = mysqli_fetch_assoc($chartQueryRecords)){
                            echo "['".$row['date1']."',".$row['SUM(qty)'].",".$row['SUM(qty1)']."],";
                        }
                     ?>
                ]);


    var view = new google.visualization.DataView(data);
    view.setColumns( [0, 1, { calc: 'stringify', sourceColumn: 1, type: 'string', role: 'annotation' }, 2 , { calc: 'stringify', sourceColumn: 2, type: 'string', role: 'annotation' }] );
	
	
	

    var options = {
         title: 'Fluid Graph',
		  pointSize: 10,
        width: 1200,
        height: 600,
        //legend: {position: 'bottom'}
		hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'Fluid Chart'
        },
        series: {
          1: {curveType: 'function'}
		  
		  
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div_flu'));

    chart.draw(view, options);  // <-- use data view
}
      }
    </script>
  </head>

  <body>
    <div id=''style='text-align: center; font-size: 40px; color: red;'><b>Patient Name- <?php echo $pname;?>&nbsp;&nbsp;MRN-<?php echo $pmrn;?></b></div>
	<div id='chart_div_bp' style='width: 900px; height: 600px;'></div>
	<div id='chart_div_pulse' style='width: 900px; height: 600px;'></div>
	<div id='chart_div_temp' style='width: 900px; height: 600px;'></div>
	<div id='chart_div_sa' style='width: 900px; height: 600px;'></div>
	<div id='chart_div_rr' style='width: 900px; height: 600px;'></div>
	<div id='chart_div_pain' style='width: 900px; height: 600px;'></div>
	<div id='chart_div_dia' style='width: 900px; height: 600px;'></div>
	<div id='chart_div_flu' style='width: 900px; height: 600px;'></div>
  </body>
</html>