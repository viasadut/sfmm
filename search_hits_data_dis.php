<?php
include 'config.php';

// Number of records fetch
$numberofrecords = 500;

$excludeWord = 'discount'; // word to exclude

if (!isset($_POST['searchTerm']) || $_POST['searchTerm'] === '') {

    // Fetch records EXCEPT item_name containing "discount"
    $stmt = $conn->prepare("
        SELECT id, item_name
        FROM hits_list
        WHERE LOWER(item_name) NOT LIKE :exclude
        ORDER BY id
        LIMIT :limit
    ");
    $stmt->bindValue(':exclude', '%'.strtolower($excludeWord).'%', PDO::PARAM_STR);
    $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
    $stmt->execute();
    $usersList = $stmt->fetchAll(PDO::FETCH_ASSOC);

} else {

    $search = $_POST['searchTerm']; // Search text

    // Fetch records matching search, but EXCEPT item_name containing "discount"
    $stmt = $conn->prepare("
        SELECT id, item_name
        FROM hits_list
        WHERE LOWER(item_name) NOT LIKE :exclude
          AND item_name LIKE :item_name
        ORDER BY id
        LIMIT :limit
    ");
    $stmt->bindValue(':exclude', '%'.strtolower($excludeWord).'%', PDO::PARAM_STR);
    $stmt->bindValue(':item_name', '%'.$search.'%', PDO::PARAM_STR);
    $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
    $stmt->execute();
    $usersList = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$response = [];

foreach ($usersList as $user) {
    $response[] = [
        "text" => $user['item_name'],
        "id"   => $user['id'],
    ];
}

echo json_encode($response);
exit();