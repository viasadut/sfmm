<?php
include('dbconfig.php');
if($_POST['id'])
{
	$id=$_POST['id'];
		
	$stmt = $DB_con->prepare("SELECT pname FROM privilege WHERE dname=:id and status in ('Approved','Waiting For CFO Approval')");
	$stmt->execute(array(':id' => $id));
	?><option selected=""></option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        	<option value="<?php echo $row['pname']; ?>"><?php echo $row['pname']; ?></option>
        <?php
	}
}
?>
<!-- www.techsofttutorials.com   Techsoft Tutorials, Free Latest Technology Tutorials and Demo. -->