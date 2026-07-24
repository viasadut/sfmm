<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
      header('Location: login2?err=2');
    }
?>



<?php 
$dbhandle= new mysqli('localhost','root','Godiloveu16','sfmmkpjnew');
echo $dbhandle->connect_error;

$query="select desig, count(fresult) from covid group by desig";
$res=$dbhandle->query($query);

?>

<html>
  <head>

  <script type="text/javascript" src="loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        ['tresult','desig'],
<?php 
while($row=$res->fetch_assoc())
{
echo"['".$row['desig']."',".$row['count(fresult)']."],";
}
?>
        ]);

        var options = {
          title: 'Designation Wise Covid Test Graph'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
<style>
div.relative {
  position: relative;
  left: 240px;
  border: 3px solid black;
}
</style>


	</head>
  <body>
    <div class="relative" id="piechart" style="width: 900px; height: 500px;"></div>
	
  </body>
</html>
