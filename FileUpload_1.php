<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_FILES['upload']['name']) {
    $filename       = $_FILES['upload']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

    // Allowed file types
    $allowed_extensions = ['gif', 'jpg','JPG','JPEG', 'jpeg', 'png'];

    // Maximum file size in bytes (2MB)
    $max_file_size = 2 * 1024 * 1024;

    if ($_FILES['upload']['size'] <= $max_file_size) {
        if (in_array(strtolower($file_extension), $allowed_extensions)) {
            $random_number = uniqid();
            $new_filename  = $random_number . '.' . $file_extension;

            $upload_directory = 'vitals_pic/uploads/';
            $target_path      = $upload_directory . $new_filename;

            if (move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)) {
                $function_number = $_GET['CKEditorFuncNum'];
                $re="<script>window.parent.CKEDITOR.tools.callFunction($function_number, '$target_path', 'Image Upload Successfull');</script>";
            } else {
                $re = '<script>alert("Image Upload Failed")</script>';
            }
        } else {
            $re = '<script>alert("Only GIF,JPG,JPEG,PNG Image Allow")</script>'; 
        }
    } else {
        $re = '<script>alert("Maximum 2 MB Image Allow")</script>';
    }
} else {
   $re = '<script>alert("Please Enter Image")</script>';
}
 
 
header('Content-type: text/html; charset=utf-8');
echo $re;

?>