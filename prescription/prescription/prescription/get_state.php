<?php
include('dbconfig.php');
if($_POST['id'])
{
	$id=$_POST['id'];
	
	
	
	
	
	
	
	
	
	

		
	$stmt = $DB_con->prepare("SELECT frequency FROM medicine WHERE mname=:id");
	$stmt->execute(array(':id' => $id));
	?><option selected=""></option><?php

	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
		
        	<option value="<?php echo $row['frequency']; ?>"><?php echo $row['frequency']; ?></option>
			
        <?php
	}
}
?>
<!-- www.techsofttutorials.com   Techsoft Tutorials, Free Latest Technology Tutorials and Demo. -->