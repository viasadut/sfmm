<!DOCTYPE HTML>
<html>
<head>
  <script type="text/javascript">
      window.onload = function () {
          var chart = new CanvasJS.Chart("chartContainer", {
              title:{
                  text: "Basic Line Chart - CanvasJS"              
             },
              data: [              
              {
                  type: "line",//column, bar, pie
                  dataPoints: [
                  { label: "A", y: 20 },
                  { label: "B", y: 26 },
                  { label: "C", y: 28 },
                  { label: "D", y: 36 },
                  { label: "E", y: 32 },
                  { label: "F", y: 34 }
                  ]
              }
              ],
                  theme: "theme1"
          });

          chart.render();
      }

  </script>
  <script type="text/javascript" src="/assets/script/canvasjs.min.js"></script>
</head>
<body>
  <div id="chartContainer" style="height: 300px; width: 100%;">
  </div>
</body>
</html>
