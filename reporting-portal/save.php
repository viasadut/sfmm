<?php
session_start();
include 'db.php';

// ==========================
// VALIDATION
// ==========================
if (empty($_POST['report_date'])) {
    $_SESSION['fail'] = "Report date is required";
    header("Location: index.php");
    exit;
}

// ==========================
// START TRANSACTION
// ==========================
$db->begin_transaction();

try {

    // ==========================
    // INSERT REPORT
    // ==========================
    $stmt = $db->prepare("INSERT INTO reporting_portal 
    (report_date, from_date, to_date, department, sub_department, approved_manpower, current_staff, vacant_post, departmental_stock_update, stock_value, performance_statistics, any_requirement, miscellaneous, departmental_consultant_status, created_by)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        throw new Exception("Prepare failed: " . $db->error);
    }

    $stmt->bind_param(
        "sssssiiisssssss",
        $_POST['report_date'],
        $_POST['from_date'],
        $_POST['to_date'],
        $_POST['department'],
        $_POST['sub_department'],
        $_POST['approved'],
        $_POST['staff'],
        $_POST['vacant'],
        $_POST['stock'],
        $_POST['stock_value'],
        $_POST['performance'],
        $_POST['requirement'],
        $_POST['misc'],
        $_POST['consultant'],
        $_POST['created_by']
    );

    $stmt->execute();
    $report_id = $stmt->insert_id;

    // ==========================
    // FILE UPLOAD
    // ==========================
    $uploadDir = "uploads/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $allowed_ext = ['jpg','jpeg','png','pdf'];
    $allowed_mime = ['image/jpeg','image/png','application/pdf'];
    $maxSize = 5 * 1024 * 1024; // 5MB

    $errors = [];

    if (!empty($_FILES['files']['name'][0])) {

        foreach ($_FILES['files']['name'] as $key => $name) {

            $tmp_name = $_FILES['files']['tmp_name'][$key];
            $size = $_FILES['files']['size'][$key];
            $error = $_FILES['files']['error'][$key];
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            // Upload error check
            if ($error !== 0) {
                $errors[] = "Upload error: $name";
                continue;
            }

            // Extension check
            if (!in_array($ext, $allowed_ext)) {
                $errors[] = "Invalid file type: $name";
                continue;
            }

            // Size check
            if ($size > $maxSize) {
                $errors[] = "File too large (Max 2MB): $name";
                continue;
            }

            // MIME check
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $tmp_name);

            if (!in_array($mime, $allowed_mime)) {
                $errors[] = "Invalid file content: $name";
                continue;
            }

            // Unique filename
            $new_name = time() . "_" . $key . "." . $ext;
            $path = $uploadDir . $new_name;

            if (!move_uploaded_file($tmp_name, $path)) {
                $errors[] = "Failed to upload: $name";
                continue;
            }

            // Insert file record
            $stmt2 = $db->prepare("INSERT INTO reporting_portal_documents (report_id, file_name, created_by) VALUES (?, ?, ?)");
            $stmt2->bind_param("iss", $report_id, $new_name, $_POST['created_by']);
            $stmt2->execute();
        }
    }

    // ==========================
    // COMMIT
    // ==========================
    $db->commit();

    if (!empty($errors)) {
        $_SESSION['fail'] = implode("<br>", $errors);
    } else {
        $_SESSION['success'] = "Data created successfully.";
    }

} catch (Exception $e) {

    // Rollback if error
    $db->rollback();
    $_SESSION['fail'] = "Error: " . $e->getMessage();
}

header("Location: index.php");
exit;