<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style2.css">




</head>
<body>

<div id="getdata"></div>

<script type="text/javascript">

function dis()

{

xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","auto_re1.php",false);
xmlhttp.send(null);
document.getElementById("getdata").innerHTML=xmlhttp.responseText;

}
dis()
setInterval(function(){
dis()

},2000);
</script>

</body>
</html>