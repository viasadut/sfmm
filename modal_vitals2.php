<<?php 

$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
$dbhandle= new mysqli('localhost','root','Godiloveu16','sfmmkpjnew');
echo $dbhandle->connect_error;

$query="select * from pappnew where pmrn='$pmrn'";
$res=$dbhandle->query($query);






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
  
  
  
  
       <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {
  packages: ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Name', 'Age', {
      role: 'style'
    }],
    ['Kaleb', 1, 'cyan', ],
    ['Dakota', 1, 'orange', ],
    ['Jaden', 4, 'yellow'],
    ['Kayla', 25, 'pink'],
    ['Thomas', 28, 'lime']
  ]);

  var options = {
    bar: {
      groupWidth: '80%'
    },
    height: '300',
    legend: 'none',
    width: '550',
  };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

  if (navigator.userAgent.match(/Trident\/7\./)) {
    google.visualization.events.addListener(chart, 'click', function() {
      chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
      console.log(chart_div.innerHTML);
    });
    chart.draw(data, options);
  } else {
    google.visualization.events.addListener(chart, 'select png', function() {
      chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
      console.log(chart_div.innerHTML);
    });
    chart.draw(data, options);
    document.getElementById('png').innerHTML = '<a href="' + chart.getImageURI() + '" target="_blank"><span class="glyphicon glyphicon-print"></span></a>';
  }
}
    </script>


.button {
  left: 50%;
  margin: 0;
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.chart {
  align-content: center;
  display: flex;
  justify-content: center;
}

.modal {
  text-align: center;
}

@media screen and (min-width: 768px) {
  .modal:before {
    content: " ";
    display: inline-block;
    height: 100%;
    vertical-align: middle;
  }
}

.modal-dialog {
  display: inline-block;
  text-align: center;
  vertical-align: middle;
}

.modal-footer {
  color: #00b5e6;
  font-size: 25px;
  text-align: center;
}	
  
</head>
<body>

<!-- Chart -->
<div class="button">
  <button class="btn btn-primary" onclick="drawChart()" data-toggle="modal" data-target="#myModal" class="myModal">Chart</button>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="chart" id="chart_div"></div>
      </div>
      <div class="modal-footer">
        <div id='png'></div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
