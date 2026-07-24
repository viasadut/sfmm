<?php
include('dbconfig.php');
if($_POST['id'])
{
	$id=$_POST['id'];
	$treat=explode(',',$id);
	
	$date=$treat[0];
	$id1=$treat[1];
		
	$stmt = $DB_con->prepare("SELECT ottime FROM otslot WHERE otname=:id1 and status='vacant' and otdate='$date'");
	$stmt->execute(array(':id1' => $id1));
	?><option selected=""></option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        	<option value="<?php echo $row['ottime']; ?>"><?php echo $row['ottime']; ?></option>
        <?php
	}
}
?>
<!-- www.techsofttutorials.com   Techsoft Tutorials, Free Latest Technology Tutorials and Demo. -->