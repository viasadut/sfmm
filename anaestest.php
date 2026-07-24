<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#payment_method").change(function() {
			console.log($("#payment_method option:selected").val());
			if ($("#payment_method option:selected").val() == 2) {
				$('#shipping_carrier').prop('disabled', 'disabled');
				$('#shipping_carrier').val(1);
				$('#shipping_number').hide();
			} else {
				$('#shipping_carrier').prop('disabled', false);
				$('#shipping_number').show();
			}
		});
});
</script>
</head>
<body>

<label>
	Payment method: <br />
	<select id="payment_method" name="payment_method">
		<option value="1">paid by reciever</option>
		<option value="2">charge through invoices</option>
	</select>
</label>

<label>
	Shipping Carrier
	<select id="shipping_carrier" name="shipping_carrier">
		<option value="1">Fedex</option>
		<option value="2">DHL</option>
	</select><br />

</label>

<label>
	Shipping number<br />
 	<input type="text" name="shipping_number" id="shipping_number" value="" />
</label>

</body>
</html>
