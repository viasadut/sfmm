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
		url : "http://192.168.100.252:8080/sfmm/ibp1.php?pmrn=<?php echo $pmrn?>&eid=<?php echo $eid?>&odate1=<?php echo $odate1?>",
//		var pmrn =data.pmrn;
		type : "GET",
		success : function(data){
			console.log(data);

			var score1= {
				sbp : [],
				};
			var score2= {
				dbp : [],
				};
				
				
			var time = {
				rt1 : [],
				rt2 : [],
				rt3 : [],
				rt4 : [],
				rt5 : [],
				rt6 : [],
				rt7 : [],
				rt8 : [],
				rt9 : [],
				rt10 : [],
				rt11 : [],
				rt12 : [],
				rt13 : [],
				rt14 : [],
				rt15 : [],
				rt16 : [],
				rt17 : [],
				rt18 : [],
				rt19 : [],
				rt20 : [],
				rt21 : [],
				rt22 : [],
				rt23 : [],
				rt24 : [],
			};
			

			var len = data.length;

			for (var i = 0; i < len; i++) {
				if (data[i].vitails1 == "sbp") {
					score1.sbp.push(data[i].score1);
				}

			}
var len2 = data.length;

			for (var i2 = 0; i2 < len2; i2++) {
				if (data[i2].vitails2 == "dbp") {
					score2.dbp.push(data[i2].score2);
				}

			}
			

var len1 = data.length;

			for (var i1 = 0; i1 < len1; i1++) {
				if (data[i1].hrd == "1") {
					time.rt1.push(data[i1].time);
				}
								else if (data[i1].hrd == "2") {
					time.rt2.push(data[i1].time);
				}
												else if (data[i1].hrd == "3") {
					time.rt3.push(data[i1].time);
				}
												else if (data[i1].hrd == "4") {
					time.rt4.push(data[i1].time);
				}
																else if (data[i1].hrd == "5") {
					time.rt5.push(data[i1].time);
				}
													else if (data[i1].hrd == "6") {
					time.rt6.push(data[i1].time);
				}
													else if (data[i1].hrd == "7") {
					time.rt7.push(data[i1].time);
				}
												else if (data[i1].hrd == "8") {
					time.rt8.push(data[i1].time);
				}
												else if (data[i1].hrd == "9") {
					time.rt9.push(data[i1].time);
				}
												else if (data[i1].hrd == "10") {
					time.rt10.push(data[i1].time);
				}
												else if (data[i1].hrd == "11") {
					time.rt11.push(data[i1].time);
				}
												else if (data[i1].hrd == "12") {
					time.rt12.push(data[i1].time);
				}
												else if (data[i1].hrd == "13") {
					time.rt13.push(data[i1].time);
				}

												else if (data[i1].hrd == "14") {
					time.rt14.push(data[i1].time);
				}

												else if (data[i1].hrd == "15") {
					time.rt15.push(data[i1].time);
				}

												else if (data[i1].hrd == "16") {
					time.rt16.push(data[i1].time);
				}
												else if (data[i1].hrd == "17") {
					time.rt17.push(data[i1].time);
				}
												else if (data[i1].hrd == "18") {
					time.rt18.push(data[i1].time);
				}
												else if (data[i1].hrd == "19") {
					time.rt19.push(data[i1].time);
				}

												else if (data[i1].hrd == "20") {
					time.rt20.push(data[i1].time);
				}
												else if (data[i1].hrd == "21") {
					time.rt21.push(data[i1].time);
				}
												else if (data[i1].hrd == "22") {
					time.rt22.push(data[i1].time);
				}
												else if (data[i1].hrd == "23") {
					time.rt23.push(data[i1].time);
				}
												else if (data[i1].hrd == "24") {
					time.rt24.push(data[i1].time);
				}

				

			}

			//get canvas
			var ctx = $("#line-chartcanvas");

			var data = {
				labels : [time.rt1, time.rt2, time.rt3, time.rt4, time.rt5,time.rt6,time.rt7,time.rt8,time.rt9,time.rt10,time.rt11,time.rt12,time.rt13,time.rt14,time.rt15,time.rt16,time.rt17,time.rt18,time.rt19,time.rt20,time.rt21,time.rt22,time.rt23,time.rt24],
				datasets : [
				
					{
						label : "Systolic",
						data : score1.sbp,
						backgroundColor : "blue",
						borderColor : "lightblue",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},

				
					{
						label : "Diastolic",
						data : score2.dbp,
						backgroundColor : "green",
						borderColor : "lightgreen",
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
					text : "Graph of BP",
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




