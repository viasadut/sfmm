<?php
include('dbconfig.php');
if($_POST['id'])
{
	$id=$_POST['id'];
		
	$stmt = $DB_con->prepare("SELECT ccharge FROM concharge WHERE ctype=:id");
	$stmt->execute(array(':id' => $id));
	?><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        	<option selected value="<?php echo $row['ccharge']; ?>"><?php echo $row['ccharge']; ?></option>
        <?php
	}
}
?>
<!-- www.techsofttutorials.com   Techsoft Tutorials, Free Latest Technology Tutorials and Demo. -->