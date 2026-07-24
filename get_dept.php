<?php
include('dbconfig.php');
if($_POST['id'])
{
	$id=$_POST['id'];
		
	$stmt = $DB_con->prepare("SELECT * FROM staff3 WHERE dept=:id and status='Active'");
	$stmt->execute(array(':id' => $id));
	?><option selected="All">All</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        	
			<option value="<?php echo $row['sid1']; ?>"><?php echo $row['sname'].'('.$row['sid1'].')'; ?></option>
        <?php
	}
}
?>
<!-- www.techsofttutorials.com   Techsoft Tutorials, Free Latest Technology Tutorials and Demo. -->