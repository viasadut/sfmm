<?php
include('dbconfig.php');
if($_POST['id'])
{
	$id=$_POST['dname'];
	
	
	
	
	
	
	
	
	
	

		
	$stmt = $DB_con->prepare("SELECT dslot FROM opd_appoint1 WHERE id=:id and status='Available'");
	$stmt->execute(array(':id' => $id));
	?><option selected=""></option><?php

	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
		
        	<option value="<?php echo $row['dslot']; ?>"><?php echo $row['dslot']; ?></option>
			
        <?php
	}
}
?>
<!-- www.techsofttutorials.com   Techsoft Tutorials, Free Latest Technology Tutorials and Demo. -->