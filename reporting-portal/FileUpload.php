<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_POST['upload']) {
    $base64Image = $_POST['upload'];

    // Extract the image data from the base64 string
    list($type, $data) = explode(';', $base64Image);
    list(, $data) = explode(',', $data);

    // Decode the base64 image data
    $imageData = base64_decode($data);

    // Generate a unique filename for the uploaded image using the original file extension
    $originalExtension = '';
    
    if (strpos($type, 'jpeg') !== false) {
        $originalExtension = 'jpg';
    } elseif (strpos($type, 'gif') !== false) {
        $originalExtension = 'gif';
    } elseif (strpos($type, 'png') !== false) {
        $originalExtension = 'png';
    }

    $randomNumber = uniqid();
    $newFilename = $randomNumber . '.' . $originalExtension;

    $uploadDirectory = 'uploads/ckeditor/'; // Set your upload directory path
    $targetPath = $uploadDirectory . $newFilename;

    if (file_put_contents($targetPath, $imageData)) {
        // Success response in CKEditor format
        $functionNumber = $_GET['CKEditorFuncNum'];
        $url = $targetPath; // URL to the uploaded image
        $message = 'Image uploaded successfully';

        // Additional image properties (width, height, file extension)
        $imageProperties = getimagesize($targetPath);
        $width = $imageProperties[0];
        $height = $imageProperties[1];
        
        $response = "<img src='$url' alt='' width='$width' height='$height' data-extension='$originalExtension'>";
    } else {
        $response = 'Image Upload Failed';
    }
} else {
    $response = 'No image data received';
}

header('Content-type: text/html; charset=utf-8');
echo $response;
?>
