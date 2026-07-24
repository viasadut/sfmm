<?php
include('dbconfig.php');
if($_POST['id'])
{
	$id=$_POST['id'];
		
	$stmt = $DB_con->prepare("SELECT aslot FROM opd_appointment1 WHERE type=:id and status='vacant' and bed_status='Active'");
	$stmt->execute(array(':id' => $id));
	?><option selected=""></option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        	<option value="<?php echo $row['bno']; ?>"><?php echo $row['bno'].'('.$row['bbtype'].')'; ?></option>
        <?php
	}
}
?>
<!-- www.techsofttutorials.com   Techsoft Tutorials, Free Latest Technology Tutorials and Demo. -->