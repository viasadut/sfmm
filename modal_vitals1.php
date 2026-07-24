<?php 

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
      google.charts.load('current',{'packages':['corechart']});
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

        //var options = {
          //title: 'Patient Vitals',
          //curveType: 'function',
          //legend: {'width':100, 'height':100 }
		  //legend: { position: 'left' }
        //};
		
		

		//var cli = chart.getChartLayoutInterface();
		
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        
chart.draw(data, {width: 550, height: 320, legend: 'left', title: 'Company Performance'});
		
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
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
            <div id="curve_chart" class="center"></div>
			
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
