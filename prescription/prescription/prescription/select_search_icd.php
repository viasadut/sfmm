<?php
include 'config.php';

// Number of records fetch
$numberofrecords = 500;

if(!isset($_POST['searchTerm'])){

	// Fetch records
	$stmt = $conn->prepare("SELECT * FROM icd_code ORDER BY name LIMIT :limit");
	$stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
	$stmt->execute();
	$usersList = $stmt->fetchAll();

}else{

	$search = $_POST['searchTerm'];// Search text
	
	// Fetch records
	$stmt = $conn->prepare("SELECT * FROM icd_code WHERE name like :name ORDER BY name LIMIT :limit");
	$stmt->bindValue(':name', '%'.$search.'%', PDO::PARAM_STR);
	$stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
	$stmt->execute();
	$usersList = $stmt->fetchAll();

}
	
$response = array();

// Read Data
foreach($usersList as $user){
	$response[] = array(
		"id" => $user['code'],
		"text" => $user['name']
	);
}

echo json_encode($response);
exit();
