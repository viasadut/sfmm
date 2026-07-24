


<script src="jsnew/jquery.min.js"></script>
<div class="field">
  <label for="field1">F1:</label>
  <input type="number" id="field1" min="0" placeholder="0" Title="Only positive numbers" required/>
</div>
<div class="field">
  <label for="field2">Field2:</label>
  <input type="number" id="field2"/>
</div>

<input type="number" disabled id="field3"></input>

<script>
  $("input").on("change", function() {
    var ret = parseInt($("#field1").val()) + parseInt($("#field2").val() || '0')
    $("#field3").val(ret);
  })
</script>