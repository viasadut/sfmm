<?php
// ==========================
// decision.php
// ==========================

// Start session and DB
session_start();
include 'db.php';
$_SESSION['user_id']="1274";
// ==========================
// SECURITY: Only allow specific users
// ==========================
$allowed_users = ['1274','md']; // allowed user IDs
if (!isset($_SESSION['user_id']) || !in_array($_SESSION['user_id'], $allowed_users)) {
    die("Unauthorized access!");
}

// ==========================
// VALIDATE GET PARAMETERS
// ==========================
if (!isset($_GET['id']) || !isset($_GET['action'])) {
    die("Invalid request");
}

$report_id = intval($_GET['id']);
$action = $_GET['action'];

// Map action to status
$status_map = [
    'accept' => 2,
    'reject' => 3
];

if (!array_key_exists($action, $status_map)) {
    die("Invalid action");
}

$new_status = $status_map[$action];

// ==========================
// UPDATE REPORT STATUS
// ==========================
$stmt = $db->prepare("UPDATE reporting_portal SET approve_status = ?, updated_by = ? WHERE id = ?");
$stmt->bind_param("isi", $new_status, $_SESSION['user_id'], $report_id);

if ($stmt->execute()) {
    $_SESSION['success'] = "Report has been " . ucfirst($action) . "ed successfully.";
} else {
    $_SESSION['fail'] = "Failed to update report status.";
}

// ==========================
// REDIRECT BACK
// ==========================
header("Location: reports-list.php");
exit;