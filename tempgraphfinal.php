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
		url : "http://192.168.100.252:8080/sfmm/temp1test.php?pmrn=<?php echo $pmrn?>&eid=<?php echo $eid?>&odate1=<?php echo $odate1?>",
//		var pmrn =data.pmrn;
		type : "GET",
		success : function(data){
			console.log(data);

			var d1temp= {
				Day1 : [],
				};
			var d2temp= {
				Day2 : [],
				};
				
				
				var d3temp= {
				Day3 : [],
				};
				
				
				var d4temp= {
				Day4 : [],
				};
				
				
				var d5temp= {
				Day5 : [],
				};
				
				var d6temp= {
				Day6 : [],
				};
				
				var d7temp= {
				Day7 : [],
				};
				
				var d8temp= {
				Day8 : [],
				};
				
				var d9temp= {
				Day9 : [],
				};
				
				var d10temp= {
				Day10 : [],
				};
				
				var d11temp= {
				Day11 : [],
				};
			var d12temp= {
				Day12 : [],
				};
				
				
				var d13temp= {
				Day13 : [],
				};
				
				
				var d14temp= {
				Day14 : [],
				};
				
				
				var d15temp= {
				Day15 : [],
				};
				
				var d16temp= {
				Day16 : [],
				};
				
				var d17temp= {
				Day17 : [],
				};
				
				var d18temp= {
				Day18 : [],
				};
				
				var d19temp= {
				Day19 : [],
				};
				
				var d20temp= {
				Day20 : [],
				};
				
				var d21temp= {
				Day21 : [],
				};
			var d22temp= {
				Day22 : [],
				};
				
				
				var d23temp= {
				Day23 : [],
				};
				
				
				var d24temp= {
				Day24 : [],
				};
				
				
				var d25temp= {
				Day25 : [],
				};
				
				var d26temp= {
				Day26 : [],
				};
				
				var d27temp= {
				Day27 : [],
				};
				
				var d28temp= {
				Day28 : [],
				};
				
				var d29temp= {
				Day29 : [],
				};
				
				var d30temp= {
				Day30 : [],
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
				if (data[i].d1 == "Day1") {
					d1temp.Day1.push(data[i].d1temp);
				}

			}
var len2 = data.length;

			for (var i2 = 0; i2 < len2; i2++) {
				if (data[i2].d2 == "Day2") {
					d2temp.Day2.push(data[i2].d2temp);
				}

			}
			
			
			
			
			
			
			var len10 = data.length;

			for (var i10 = 0; i10 < len10; i10++) {
				if (data[i10].d3 == "Day3") {
					d3temp.Day3.push(data[i10].d3temp);
				}

			}
			
			var len11 = data.length;

			for (var i11 = 0; i11 < len11; i11++) {
				if (data[i11].d4 == "Day4") {
					d4temp.Day4.push(data[i11].d4temp);
				}

			}
			
			var len12 = data.length;

			for (var i12 = 0; i12 < len12; i12++) {
				if (data[i12].d5 == "Day5") {
					d5temp.Day5.push(data[i12].d5temp);
				}

			}

			
			var len13 = data.length;

			for (var i13 = 0; i13 < len13; i13++) {
				if (data[i13].d6 == "Day6") {
					d6temp.Day6.push(data[i13].d6temp);
				}

			}

			
			var len14 = data.length;

			for (var i14 = 0; i14 < len14; i14++) {
				if (data[i14].d7 == "Day7") {
					d7temp.Day7.push(data[i14].d7temp);
				}

			}

			var len15 = data.length;

			for (var i15 = 0; i15 < len15; i15++) {
				if (data[i15].d8 == "Day8") {
					d8temp.Day8.push(data[i15].d8temp);
				}

			}

			var len16 = data.length;

			for (var i16 = 0; i16 < len16; i16++) {
				if (data[i16].d9 == "Day9") {
					d9temp.Day9.push(data[i16].d9temp);
				}

			}

			var len17 = data.length;

			for (var i17 = 0; i17 < len17; i17++) {
				if (data[i17].d10 == "Day10") {
					d10temp.Day10.push(data[i17].d10temp);
				}

			}

			
			var len18 = data.length;

			for (var i18 = 0; i18 < len18; i18++) {
				if (data[i18].d10 == "Day11") {
					d11temp.Day11.push(data[i18].d11temp);
				}

			}
			
			var len19 = data.length;

			for (var i19 = 0; i19 < len19; i19++) {
				if (data[i19].d10 == "Day12") {
					d12temp.Day12.push(data[i19].d12temp);
				}

			}
			
						var len20 = data.length;

			for (var i20 = 0; i20 < len20; i20++) {
				if (data[i20].d13 == "Day13") {
					d13temp.Day13.push(data[i20].d13temp);
				}

			}
			
			var len21 = data.length;

			for (var i21 = 0; i21 < len21; i21++) {
				if (data[i21].d14 == "Day14") {
					d14temp.Day14.push(data[i21].d14temp);
				}

			}
			
			var len22 = data.length;

			for (var i22 = 0; i22 < len22; i22++) {
				if (data[i22].d15 == "Day15") {
					d15temp.Day15.push(data[i22].d15temp);
				}

			}

			var len23 = data.length;

			for (var i23 = 0; i23 < len23; i23++) {
				if (data[i23].d16 == "Day16") {
					d16temp.Day16.push(data[i23].d16temp);
				}

			}
			
						var len24 = data.length;

			for (var i24 = 0; i24 < len24; i24++) {
				if (data[i24].d17 == "Day17") {
					d17temp.Day17.push(data[i24].d17temp);
				}

			}
			
			
			var len25 = data.length;

			for (var i25 = 0; i25 < len25; i25++) {
				if (data[i25].d18 == "Day18") {
					d18temp.Day18.push(data[i25].d18temp);
				}

			}
			
			var len26 = data.length;

			for (var i26 = 0; i26 < len26; i26++) {
				if (data[i26].d19 == "Day19") {
					d19temp.Day19.push(data[i26].d19temp);
				}

			}
			
			var len27 = data.length;

			for (var i27 = 0; i27 < len27; i27++) {
				if (data[i27].d20 == "Day20") {
					d20temp.Day20.push(data[i27].d20temp);
				}

			}
			
			var len28 = data.length;

			for (var i28 = 0; i28 < len28; i28++) {
				if (data[i28].d21 == "Day21") {
					d21temp.Day21.push(data[i28].d21temp);
				}

			}
			
			var len29 = data.length;

			for (var i29 = 0; i29 < len29; i29++) {
				if (data[i29].d22 == "Day22") {
					d22temp.Day22.push(data[i29].d22temp);
				}

			}
			
			var len30 = data.length;

			for (var i30 = 0; i30 < len30; i30++) {
				if (data[i30].d23 == "Day23") {
					d23temp.Day23.push(data[i30].d23temp);
				}

			}
			
						var len31 = data.length;

			for (var i31 = 0; i31 < len31; i31++) {
				if (data[i31].d24 == "Day24") {
					d24temp.Day24.push(data[i31].d24temp);
				}

			}
			
			var len32 = data.length;

			for (var i32 = 0; i32 < len32; i32++) {
				if (data[i32].d25 == "Day25") {
					d25temp.Day25.push(data[i32].d25temp);
				}

			}
			
			var len33 = data.length;

			for (var i33 = 0; i33 < len33; i33++) {
				if (data[i33].d26 == "Day26") {
					d26temp.Day26.push(data[i33].d25temp);
				}

			}
			
						var len34 = data.length;

			for (var i34 = 0; i34 < len34; i34++) {
				if (data[i34].d27 == "Day27") {
					d27temp.Day27.push(data[i34].d27temp);
				}

			}
			
			var len35 = data.length;

			for (var i35 = 0; i35 < len35; i35++) {
				if (data[i35].d28 == "Day28") {
					d28temp.Day28.push(data[i35].d28temp);
				}

			}
			
			var len36 = data.length;

			for (var i36 = 0; i36 < len36; i36++) {
				if (data[i36].d29 == "Day29") {
					d29temp.Day29.push(data[i36].d29temp);
				}

			}
			
						var len37 = data.length;

			for (var i37 = 0; i37 < len36; i37++) {
				if (data[i37].d30 == "Day30") {
					d30temp.Day30.push(data[i37].d30temp);
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
						label : "Day1",
						data : d1temp.Day1,
						backgroundColor : "lightblue",
						borderColor : "lightblue",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},

				
					{
						label : "Day2",
						data : d2temp.Day2,
						backgroundColor : "lightgreen",
						borderColor : "lightgreen",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
						
						{
						label : "Day3",
						data : d3temp.Day3,
						backgroundColor : "red",
						borderColor : "red",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day4",
						data : d4temp.Day4,
						backgroundColor : "yellow",
						borderColor : "yellow",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day5",
						data : d5temp.Day5,
						backgroundColor : "brown",
						borderColor : "brown",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day6",
						data : d6temp.Day6,
						backgroundColor : "ash",
						borderColor : "ash",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day7",
						data : d7temp.Day7,
						backgroundColor : "orange",
						borderColor : "orange",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day8",
						data : d8temp.Day8,
						backgroundColor : "Olive",
						borderColor : "Olive",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day9",
						data : d9temp.Day9,
						backgroundColor : "maroon",
						borderColor : "maroon",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day10",
						data : d10temp.Day10,
						backgroundColor : "#EFFD5F",
						borderColor : "#EFFD5F",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					
					{
						label : "Day11",
						data : d11temp.Day11,
						backgroundColor : "#D9DDDC",
						borderColor : "#D9DDDC",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day12",
						data : d12temp.Day12,
						backgroundColor : "lime",
						borderColor : "lime",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day13",
						data : d13temp.Day13,
						backgroundColor : "#AF69EE",
						borderColor : "#AF69EE",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day14",
						data : d14temp.Day14,
						backgroundColor : "#EEDC82",
						borderColor : "#EEDC82",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day15",
						data : d15temp.Day15,
						backgroundColor : "#043927",
						borderColor : "#043927",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					
					{
						label : "Day16",
						data : d16temp.Day16,
						backgroundColor : "#C7EA46",
						borderColor : "#C7EA46",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					
					{
						label : "Day17",
						data : d17temp.Day17,
						backgroundColor : "silver",
						borderColor : "silver",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day18",
						data : d18temp.Day18,
						backgroundColor : "Indigo",
						borderColor : "Indigo",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day19",
						data : d19temp.Day19,
						backgroundColor : "coral",
						borderColor : "coral",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day20",
						data : d20temp.Day20,
						backgroundColor : "pink",
						borderColor : "pink",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					
					
					
					{
						label : "Day21",
						data : d21temp.Day21,
						backgroundColor : "#FFE5B4",
						borderColor : "#FFE5B4",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day22",
						data : d22temp.Day22,
						backgroundColor : "#F8DE7E",
						borderColor : "#F8DE7E",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day23",
						data : d23temp.Day23,
						backgroundColor : "#EF820D",
						borderColor : "#EF820D",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day24",
						data : d24temp.Day24,
						backgroundColor : "#FA8072",
						borderColor : "#FA8072",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day25",
						data : d25temp.Day25,
						backgroundColor : "#DE3163",
						borderColor : "#DE3163",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					
					{
						label : "Day26",
						data : d26temp.Day26,
						backgroundColor : "#C64B86",
						borderColor : "#C64B86",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					
					{
						label : "Day27",
						data : d27temp.Day27,
						backgroundColor : "#7852A9",
						borderColor : "#7852A9",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day28",
						data : d28temp.Day28,
						backgroundColor : "#4D5163",
						borderColor : "#4D5163",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day29",
						data : d29temp.Day29,
						backgroundColor : "#98FB98",
						borderColor : "#98FB98",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					
					{
						label : "Day30",
						data : d30temp.Day30,
						backgroundColor : "#4CBB17",
						borderColor : "#4CBB17",
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




