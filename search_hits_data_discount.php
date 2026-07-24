<?php
include 'config.php';

// Number of records fetch
$numberofrecords = 500;

if(!isset($_POST['searchTerm'])){

	// Fetch records
	$stmt = $conn->prepare("SELECT * FROM hits_list where item_name LIKE '%discount%' ORDER BY id LIMIT :limit");
	$stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
	$stmt->execute();
	$usersList = $stmt->fetchAll();

}else{

	//$search = $_POST['searchTerm'];// Search text
	$search = 'discount';// Search text
	// Fetch records
	$stmt = $conn->prepare("SELECT * FROM hits_list WHERE  item_name like :item_name ORDER BY id LIMIT :limit");
	$stmt->bindValue(':item_name', '%'.$search.'%', PDO::PARAM_STR);
	$stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
	$stmt->execute();
	$usersList = $stmt->fetchAll();

}
	
$response = array();

// Read Data
foreach($usersList as $user){
	$response[] = array(
		"text" => $user['item_name'],
		"id" => $user['id']
	);
}

echo json_encode($response);
exit();
