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

$query="select type, count(fresult) from covid group by type";
$res=$dbhandle->query($query);

/*$query1="select tresult, count(tresult) from covid";
$res1=$dbhandle->query($query1);

$row1=$res1->fetch_assoc();*/
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
echo"['".$row['type']."',".$row['count(fresult)']."],";
}
?>
        ]);

        var options = {
          title: 'Department Wise Covid Test Graph'
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
<style>
div.re {
  position: relative;
  left: 60px;
  border: 3px solid black;
}
</style>

  </head>
  <body>
    <div class="relative"id="piechart" style="width: 900px; height: 500px;"></div>
	    


	</body>
</html>
