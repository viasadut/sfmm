oldest votes

2

<?php
$servername = "localhost";
$username = "root";
$password = "Godiloveu16";
$dbname="sfmmkpjnew";
// Create connection
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    // set the PDO error mode to exception

    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
?>

<select name="name" id="name" onchange="myFunction()" class="form-control">
<option value="Select">Select</option>
<?php
$qu="Select * from medicine";
$res=$conn->query($qu);

while($r=mysqli_fetch_row($res))
{ 
    echo "<option data-add='$r[3]'  data-con='$r[2]' data-con1='$r[16]'  value='$r[1]'> $r[1] </option>";
}
?> 

 
			  
</select>

        
<label>Address</label><input type="text" name="add" id="add"/>
<label>Contact</label><input type="text" name="con" id="con"/>
<label>Contact</label><input type="text" name="con1" id="con1"/>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>


    function myFunction(){
        var address = $('#name').find(':selected').data('add');
        var contact = $('#name').find(':selected').data('con');
		var contact1 = $('#name').find(':selected').data('con1');
        $('#add').val(address);
        $('#con').val(contact);
		$('#con1').val(contact1);
		
    }
</script>

