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
		url : "http://192.168.100.252:8081/sfmm/temp1u.php?pmrn=<?php echo $pmrn?>&eid=<?php echo $eid?>&odate1=<?php echo $odate1?>",
//		var pmrn =data.pmrn;
		type : "GET",
		success : function(data){
			console.log(data);

			var score1 = {
				Temperature : [],
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
				rt25 : [],
				rt26 : [],
				rt27 : [],
				rt28 : [],
				rt29 : [],
				rt30 : [],
				rt31 : [],
				rt32 : [],
				rt33 : [],
				rt34 : [],
				rt35 : [],
				rt36 : [],
				rt37 : [],
				rt38 : [],
				rt39 : [],
				rt40 : [],
				rt41 : [],
				rt42 : [],
				rt43 : [],
				rt44 : [],
				rt45 : [],
				rt46 : [],
				rt47 : [],
				rt48 : [],
				rt49 : [],
				rt50 : [],
				rt51 : [],
				rt52 : [],
				rt53 : [],
				rt54 : [],
				rt55 : [],
				rt56 : [],
				rt57 : [],
				rt58 : [],
				rt59 : [],
				rt60 : [],
				
				
				
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
					time.rt1.push(data[i1].date7);
				}
								else if (data[i1].hrd == "2") {
					time.rt2.push(data[i1].date7);
				}
												else if (data[i1].hrd == "3") {
					time.rt3.push(data[i1].date7);
				}
												else if (data[i1].hrd == "4") {
					time.rt4.push(data[i1].date7);
				}
																else if (data[i1].hrd == "5") {
					time.rt5.push(data[i1].date7);
				}
													else if (data[i1].hrd == "6") {
					time.rt6.push(data[i1].date7);
				}
													else if (data[i1].hrd == "7") {
					time.rt7.push(data[i1].date7);
				}
												else if (data[i1].hrd == "8") {
					time.rt8.push(data[i1].date7);
				}
												else if (data[i1].hrd == "9") {
					time.rt9.push(data[i1].date7);
				}
												else if (data[i1].hrd == "10") {
					time.rt10.push(data[i1].date7);
				}
												else if (data[i1].hrd == "11") {
					time.rt11.push(data[i1].date7);
				}
												else if (data[i1].hrd == "12") {
					time.rt12.push(data[i1].date7);
				}
												else if (data[i1].hrd == "13") {
					time.rt13.push(data[i1].date7);
				}

												else if (data[i1].hrd == "14") {
					time.rt14.push(data[i1].date7);
				}

												else if (data[i1].hrd == "15") {
					time.rt15.push(data[i1].date7);
				}

												else if (data[i1].hrd == "16") {
					time.rt16.push(data[i1].date7);
				}
												else if (data[i1].hrd == "17") {
					time.rt17.push(data[i1].date7);
				}
												else if (data[i1].hrd == "18") {
					time.rt18.push(data[i1].date7);
				}
												else if (data[i1].hrd == "19") {
					time.rt19.push(data[i1].date7);
				}

												else if (data[i1].hrd == "20") {
					time.rt20.push(data[i1].date7);
				}
												else if (data[i1].hrd == "21") {
					time.rt21.push(data[i1].date7);
				}
												else if (data[i1].hrd == "22") {
					time.rt22.push(data[i1].date7);
				}
												else if (data[i1].hrd == "23") {
					time.rt23.push(data[i1].date7);
				}
												else if (data[i1].hrd == "24") {
					time.rt24.push(data[i1].date7);
				}

				
											else if (data[i1].hrd == "25") {
					time.rt25.push(data[i1].date7);
				}
											else if (data[i1].hrd == "26") {
					time.rt26.push(data[i1].date7);
				}
											else if (data[i1].hrd == "27") {
					time.rt27.push(data[i1].date7);
				}
				
											else if (data[i1].hrd == "28") {
					time.rt28.push(data[i1].date7);
				}

							else if (data[i1].hrd == "29") {
					time.rt29.push(data[i1].date7);
				}

											else if (data[i1].hrd == "30") {
					time.rt30.push(data[i1].date7);
				}

				
											else if (data[i1].hrd == "31") {
					time.rt31.push(data[i1].date7);
				}
				
				
											else if (data[i1].hrd == "32") {
					time.rt32.push(data[i1].date7);
				}
				
				
											else if (data[i1].hrd == "33") {
					time.rt33.push(data[i1].date7);
				}
				
				
											else if (data[i1].hrd == "34") {
					time.rt34.push(data[i1].date7);
				}
				
				
											else if (data[i1].hrd == "35") {
					time.rt35.push(data[i1].date7);
					
					
				}


											else if (data[i1].hrd == "36") {
					time.rt36.push(data[i1].date7);
				}
				
				
											else if (data[i1].hrd == "37") {
					time.rt37.push(data[i1].date7);
				}
				
				
											else if (data[i1].hrd == "38") {
					time.rt38.push(data[i1].date7);
				}
				
											else if (data[i1].hrd == "39") {
					time.rt39.push(data[i1].date7);
				}
				
											else if (data[i1].hrd == "40") {
					time.rt40.push(data[i1].date7);
				}
				
				
											else if (data[i1].hrd == "41") {
					time.rt41.push(data[i1].date7);
				}
				
				
											else if (data[i1].hrd == "42") {
					time.rt42.push(data[i1].date7);
				}
				
				
											else if (data[i1].hrd == "43") {
					time.rt43.push(data[i1].date7);
				}
				
				
											else if (data[i1].hrd == "44") {
					time.rt44.push(data[i1].date7);
				}
				
				
											else if (data[i1].hrd == "45") {
					time.rt45.push(data[i1].date7);
				}
				
											else if (data[i1].hrd == "46") {
					time.rt46.push(data[i1].date7);
				}
				
				
											else if (data[i1].hrd == "47") {
					time.rt47.push(data[i1].date7);
				}
				
				
											else if (data[i1].hrd == "48") {
					time.rt48.push(data[i1].date7);
				}
				
				
											else if (data[i1].hrd == "49") {
					time.rt49.push(data[i1].date7);
				}
				
				
											else if (data[i1].hrd == "50") {
					time.rt50.push(data[i1].date7);
				}

								else if (data[i1].hrd == "51") {
					time.rt51.push(data[i1].date7);
				}
				
								else if (data[i1].hrd == "52") {
					time.rt52.push(data[i1].date7);
				}
				
								else if (data[i1].hrd == "53") {
					time.rt53.push(data[i1].date7);
				}
				
								else if (data[i1].hrd == "54") {
					time.rt54.push(data[i1].date7);
				}
				
								else if (data[i1].hrd == "55") {
					time.rt55.push(data[i1].date7);
				}
				
								else if (data[i1].hrd == "56") {
					time.rt56.push(data[i1].date7);
				}
				
								else if (data[i1].hrd == "57") {
					time.rt57.push(data[i1].date7);
				}
				
								else if (data[i1].hrd == "58") {
					time.rt58.push(data[i1].date7);
				}
				
								else if (data[i1].hrd == "59") {
					time.rt59.push(data[i1].date7);
				}
				
								else if (data[i1].hrd == "60") {
					time.rt60.push(data[i1].date7);
				}


		}

			//get canvas
			var ctx = $("#line-chartcanvas");

			var data = {
				labels : [time.rt1, time.rt2, time.rt3, time.rt4, time.rt5,time.rt6,time.rt7,time.rt8,time.rt9,time.rt10,time.rt11,time.rt12,time.rt13,time.rt14,time.rt15,time.rt16,time.rt17,time.rt18,time.rt19,time.rt20,time.rt21,time.rt22,time.rt23,time.rt24,time.rt25,time.rt26,time.rt27,time.rt28,time.rt29,time.rt30,time.rt31,time.rt32,time.rt33,time.rt34,time.rt35,time.rt36,time.rt37,time.rt38,time.rt39,time.rt40,time.rt41,time.rt42,time.rt43,time.rt44,time.rt45,time.rt46,time.rt47,time.rt48,time.rt49,time.rt50,time.rt51,time.rt52,time.rt53,time.rt54,time.rt55,time.rt56,time.rt57,time.rt58,time.rt59,time.rt60],
				datasets : [
				
					{
						label : "Temperature",
						data : score1.Temperature,
						backgroundColor : "Red",
						borderColor : "black",
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
					text : "Temperature Graph of MRN- <?php echo $pmrn;?>",
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




