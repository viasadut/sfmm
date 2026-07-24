

html bit
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</style>
</head>
<body>
<script>
function handleEnter(event) {
   if (event.key==="Enter") {
      const form = document.getElementById('form')
      const index = [...form].indexOf(event.target);
      form.elements[index + 1].focus();
      //event.preventDefault();
    }
}
</script>
<form id= 'form' >
      <input onkeydown='handleEnter(event)' placeholder="field 1" /><br>
      
      <input onkeydown='handleEnter(event)' placeholder="field 2" /><br>
	  <input onkeydown='handleEnter(event)' placeholder="field 3" /><br>
	  <input onkeydown='handleEnter(event)' placeholder="field 4" /><br>
      <input placeholder="field 5" />
	  
    </form>

</body>
</html>