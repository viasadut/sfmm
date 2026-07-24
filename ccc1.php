<?php
include('dbconfig.php');
if($_POST['id'])
{
	$id=$_POST['id'];
		
	$stmt = $DB_con->prepare("SELECT * FROM medicine WHERE mname=:id and status='Active'");
	$stmt->execute(array(':id' => $id));
	?><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        	
			<option value="<?php echo $row['duration']; ?>"><?php echo $row['duration']; ?></option>
        <?php
	}
}
?>
<!-- www.techsofttutorials.com   Techsoft Tutorials, Free Latest Technology Tutorials and Demo. -->