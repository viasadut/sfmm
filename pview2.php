<?php
// Include the database configuration file
include_once 'db1.php';

// Get images from the database
$query = $con->query("SELECT * FROM photo");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        
		$imageURL1 = $row["image2"];
		
?>
    <table>
	<tr>
	<td align="center"><img src="<?php echo $imageURL; ?>" alt="" style="width:500px;height:500px;"/></td>
	<td align="center"><img src="<?php echo $imageURL1; ?>" alt="" style="width:500px;height:500px;"/></td>
</tr>
<tr>
	<td><img src="<?php echo $imageURL2; ?>" alt="" style="width:500px;height:500px;"/></td>
	<td><img src="<?php echo $imageURL3; ?>" alt="" style="width:500px;height:500px;"/></td>
</tr>

	<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?> 


