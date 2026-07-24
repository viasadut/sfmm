<?php

$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$odate1=$_REQUEST['odate1'];
?>
<html>
<head>
    <title>ChartJS - Line</title>
    
    <link href="css/default.css" rel="stylesheet">
<script>

function test(){

var pmrn ="<?php echo $pmrn?>";
var eid ="<?php echo $eid?>";
var odate1 ="<?php echo $odate1?>";

}

</script>
    
</head>

<body>

	<div class="chart-container">
		<canvas id="line-chartcanvas"></canvas>
	</div>

	<!-- javascript -->
    <script src="ChartJS2/js/jquery.min.js"></script>
    <script src="ChartJS2/js/Chart.min.js"></script>

<script>
//var pmrn=;
$(document).ready(function() {

	/**
	 * call the data.php file to fetch the result from db table.
	 */
	
			
			
			$.ajax({
		url : "http://192.168.100.252:8080/sfmm/datewisetemp22.php?pmrn=<?php echo $pmrn?>&eid=<?php echo $eid?>&odate1=<?php echo $odate1?>",
//		var pmrn =data.pmrn;
		type : "GET",
		success : function(data){
			console.log(data);

			var score1 = {
				Temperature : [],
				};
				
				var score2= {
				hrd : [],
				};
				
				
				
			var time = {
				rt1 : [],
				
			};
			

			var len = data.length;

			for (var i = 0; i < len; i++) {
				if (data[i].vitails1 == "Temperature") {
					score1.Temperature.push(data[i].score1);
				}

			}
			

var len1 = data.length;

			for (var i1 = 0; i1 < len1; i1++) {
				if (data[i1].hrd == "1") {
					time.rt1.push(data[i1].date7,data[i1].time);
				}


				

			}
			
					
			
			
			

					
			//get canvas
			var ctx = $("#line-chartcanvas");

			var data = {
				labels : [time.rt1,time.rt2],
				datasets : [
				
					{
						label : "Temperature",
						data : score1.Temperature,
						backgroundColor : "Red",
						borderColor : "lightred",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},

					
					{
						label : score1.Temperature,
						data : score2.hrd,
						backgroundColor : "Red",
						borderColor : "lightred",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},

						
					
				]
				
				
			};

			var options = {
				title : {
					display : true,
					position : "top",
					text : "Graph of Temperature",
					fontSize : 18,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "bottom"
				}
			};

			var chart = new Chart( ctx, {
				type : "line",
				data : data,
				options : options
			} );

		},
		error : function(data) {
			console.log(data);
		}
	});

});

</script>






    
    
</body>
</html>




