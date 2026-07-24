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
		url : "http://192.168.100.252:8080/sfmm/evitals1.php?pmrn=<?php echo $pmrn?>&eid=<?php echo $eid?>&odate1=<?php echo $odate1?>",
//		var pmrn =data.pmrn;
		type : "GET",
		success : function(data){
			console.log(data);

					var score = {
				Temp : [],
				};
			var score1 = {
				BP : [],
				};
	
			var bp2 = {
				systolic : [],
				};
				
				
			var bp4 = {
				diastolic : [],
				};
				
				
				
			var hr = {
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
				if (data[i].vitals == "Temp") {
					score.Temp.push(data[i].score);
				}

			}
			
						var len2 = data.length;

			for (var i2 = 0; i2 < len2; i2++) {
				if (data[i2].vitals1 == "BP") {
					score1.BP.push(data[i2].score1);
				}

			}


var len3 = data.length;

			for (var i3 = 0; i3 < len3; i3++) {
				if (data[i3].bp1 == "systolic") {
					bp2.systolic.push(data[i3].bp2);
				}

			}


var len4 = data.length;

			for (var i4 = 0; i4 < len4; i4++) {
				if (data[i4].bp3 == "diastolic") {
					bp4.diastolic.push(data[i4].bp4);
				}

			}



var len1 = data.length;

			for (var i1 = 0; i1 < len1; i1++) {
				if (data[i1].hrd == "1") {
					hr.rt1.push(data[i1].hr);
				}
								else if (data[i1].hrd == "2") {
					hr.rt2.push(data[i1].hr);
				}
												else if (data[i1].hrd == "3") {
					hr.rt3.push(data[i1].hr);
				}
												else if (data[i1].hrd == "4") {
					hr.rt4.push(data[i1].hr);
				}
																else if (data[i1].hrd == "5") {
					hr.rt5.push(data[i1].hr);
				}
													else if (data[i1].hrd == "6") {
					hr.rt6.push(data[i1].hr);
				}
													else if (data[i1].hrd == "7") {
					hr.rt7.push(data[i1].hr);
				}
												else if (data[i1].hrd == "8") {
					hr.rt8.push(data[i1].hr);
				}
												else if (data[i1].hrd == "9") {
					hr.rt9.push(data[i1].hr);
				}
												else if (data[i1].hrd == "10") {
					hr.rt10.push(data[i1].hr);
				}
												else if (data[i1].hrd == "11") {
					hr.rt11.push(data[i1].hr);
				}
												else if (data[i1].hrd == "12") {
					hr.rt12.push(data[i1].hr);
				}
												else if (data[i1].hrd == "13") {
					hr.rt13.push(data[i1].hr);
				}

												else if (data[i1].hrd == "14") {
					hr.rt14.push(data[i1].hr);
				}

												else if (data[i1].hrd == "15") {
					hr.rt15.push(data[i1].hr);
				}

												else if (data[i1].hrd == "16") {
					hr.rt16.push(data[i1].hr);
				}
												else if (data[i1].hrd == "17") {
					hr.rt17.push(data[i1].hr);
				}
												else if (data[i1].hrd == "18") {
					hr.rt18.push(data[i1].hr);
				}
												else if (data[i1].hrd == "19") {
					hr.rt19.push(data[i1].hr);
				}

												else if (data[i1].hrd == "20") {
					hr.rt20.push(data[i1].hr);
				}
												else if (data[i1].hrd == "21") {
					hr.rt21.push(data[i1].hr);
				}
												else if (data[i1].hrd == "22") {
					hr.rt22.push(data[i1].hr);
				}
												else if (data[i1].hrd == "23") {
					hr.rt23.push(data[i1].hr);
				}
												else if (data[i1].hrd == "24") {
					hr.rt24.push(data[i1].hr);
				}

				

			}

			//get canvas
			var ctx = $("#line-chartcanvas");

			var data = {
				labels : [hr.rt1, hr.rt2, hr.rt3, hr.rt4, hr.rt5,hr.rt6,hr.rt7,hr.rt8,hr.rt9,hr.rt10,hr.rt11,hr.rt12,hr.rt13,hr.rt14,hr.rt15,hr.rt16,hr.rt17,hr.rt18,hr.rt19,hr.rt20,hr.rt21,hr.rt22,hr.rt23,hr.rt24],
				datasets : [
				
					{
						label : "Temperature",
						data : score.Temp,
						backgroundColor : "blue",
						borderColor : "lightblue",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},

						{
						label : "Pulse",
						data : score1.BP,
						backgroundColor : "Green",
						borderColor : "lightGreen",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "BP(Systolic)",
						data : bp2.systolic,
						backgroundColor : "RED",
						borderColor : "Red",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "BP(diastolic)",
						data : bp4.diastolic,
						backgroundColor : "Brown",
						borderColor : "Brown",
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
					text : "Graph of Temperature, Pulse And BP",
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




