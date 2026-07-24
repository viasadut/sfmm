<?php
include('dbconfig.php');
if($_POST['id'])
{
	$id=$_POST['id'];
		
	$stmt = $DB_con->prepare("SELECT cheque_number FROM cheque_registers WHERE bank_account_code=:id and status='1'");
	$stmt->execute(array(':id' => $id));
	?><option selected=""></option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        	<option value="<?php echo $row['cheque_number']; ?>"><?php echo $row['cheque_number']; ?></option>
        <?php
	}
}
?>
<!-- www.techsofttutorials.com   Techsoft Tutorials, Free Latest Technology Tutorials and Demo. -->