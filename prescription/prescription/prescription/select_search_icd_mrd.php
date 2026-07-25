<?php
include 'config.php';

// Number of records fetch
$numberofrecords = 500;

if(!isset($_POST['searchTerm'])){

	// Fetch records
	$stmt = $conn->prepare("SELECT * FROM icd_code ORDER BY code LIMIT :limit");
	$stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
	$stmt->execute();
	$usersList = $stmt->fetchAll();

}else{

	$search = $_POST['searchTerm'];// Search text
	
	// Fetch records
	$stmt = $conn->prepare("SELECT * FROM icd_code WHERE code like :code ORDER BY code LIMIT :limit");
	$stmt->bindValue(':code', '%'.$search.'%', PDO::PARAM_STR);
	$stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
	$stmt->execute();
	$usersList = $stmt->fetchAll();

}
	
$response = array();

// Read Data
foreach($usersList as $user){
	$response[] = array(
		"text" => $user['code'],
		"id" => $user['code']
	);
}

echo json_encode($response);
exit();
