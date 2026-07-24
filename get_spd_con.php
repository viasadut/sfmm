<?php
include('dbconfig.php');
if($_POST['id'])
{
	$id=$_POST['id'];
	//$treat=explode(',',$id);
	
	//$date=$treat[0];
	//$id1=$treat[1];
		
	$stmt = $DB_con->prepare("SELECT dname FROM privilege WHERE pname=:id and status in ('Approved','Waiting For CFO Approval')");
	
	$stmt->execute(array(':id' => $id));
	?><option selected=""></option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        	<option value="<?php echo $row['dname']; ?>"><?php echo $row['dname']; ?></option>
        <?php
	}
}
?>
<!-- www.techsofttutorials.com   Techsoft Tutorials, Free Latest Technology Tutorials and Demo. -->