<?php
session_start();
require('db1.php');
$id=$_REQUEST['ID'];
$queryc  = "SELECT * FROM endopapp WHERE ID='$id'";
$resultc = mysqli_query($con, $queryc);
$row    = mysqli_fetch_assoc($resultc);


/* =========================
   DATABASE CONNECTION
========================= */
$host = "localhost";
$user = "root";
$pass = "Godiloveu16";
$db   = "sfmmkpjnew";

$con = new mysqli($host, $user, $pass, $db);
if ($con->connect_error) {
    die("Database connection failed: " . $con->connect_error);
}

function h($str) {
    return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8');
}

$msg = "";
$msgType = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $identity_no     = trim($_POST['identity_no'] ?? '');
    $patient_name    = trim($_POST['patient_name'] ?? '');
    $mrn             = trim($_POST['mrn'] ?? '');
    $visit_date      = trim($_POST['visit_date'] ?? '');
    $age_sex         = trim($_POST['age_sex'] ?? '');
    $referrer        = trim($_POST['referrer'] ?? '');
    $bed             = trim($_POST['bed'] ?? '');
    $instrument_name = trim($_POST['instrument_name'] ?? '');
    $procedure_name  = trim($_POST['procedure_name'] ?? '');
    $indication      = trim($_POST['indication'] ?? '');
    $medication      = trim($_POST['medication'] ?? '');
    $surgeon_name    = trim($_POST['surgeon_name'] ?? '');
    $details_note    = trim($_POST['details_note'] ?? '');
    $comments_text   = trim($_POST['comments_text'] ?? '');

    if ($identity_no === '' || $patient_name === '') {
        $msg = "Identity No and Patient Name are required.";
        $msgType = "danger";
    } else {

        $uploadDir = "procedure_reports/";
        $saveDir   = "procedure_reports/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $allowedExt = ['jpg', 'jpeg', 'png', 'webp'];
        $savedImages = ["", "", "", ""];

        for ($i = 1; $i <= 4; $i++) {
            $field = "image" . $i;

            if (isset($_FILES[$field]) && $_FILES[$field]['error'] === 0) {
                $tmpName = $_FILES[$field]['tmp_name'];
                $fileName = $_FILES[$field]['name'];
                $fileSize = $_FILES[$field]['size'];

                $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if (!in_array($ext, $allowedExt)) {
                    $msg = "Only JPG, JPEG, PNG, WEBP allowed for Image $i.";
                    $msgType = "danger";
                    break;
                }

                if ($fileSize > 5 * 1024 * 1024) {
                    $msg = "Image $i is too large. Max 5 MB allowed.";
                    $msgType = "danger";
                    break;
                }

                $newName = "report_" . time() . "_" . $i . "_" . mt_rand(1000, 9999) . "." . $ext;
                $dest = $uploadDir . $newName;

                if (move_uploaded_file($tmpName, $dest)) {
                    $savedImages[$i - 1] = $saveDir . $newName;
                } else {
                    $msg = "Failed to upload Image $i.";
                    $msgType = "danger";
                    break;
                }
            }
        }

        if ($msgType !== "danger") {
            $stmt = $con->prepare("INSERT INTO procedure_reports (
                identity_no, patient_name, mrn, visit_date, age_sex, referrer, bed,
                instrument_name, procedure_name, indication, medication,
                surgeon_name, details_note, comments_text,
                image1, image2, image3, image4
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->bind_param(
                "ssssssssssssssssss",
                $identity_no, $patient_name, $mrn, $visit_date, $age_sex, $referrer, $bed,
                $instrument_name, $procedure_name, $indication, $medication,
                $surgeon_name, $details_note, $comments_text,
                $savedImages[0], $savedImages[1], $savedImages[2], $savedImages[3]
            );

            if ($stmt->execute()) {
                $msg = "Procedure report saved successfully.";
                $msgType = "success";
            } else {
                $msg = "Database insert failed: " . $stmt->error;
                $msgType = "danger";
            }

            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Procedure Report Upload Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f6f9;
            margin:0;
            padding:20px;
        }
        .container{
            max-width:1100px;
            margin:0 auto;
            background:#fff;
            border-radius:10px;
            box-shadow:0 2px 10px rgba(0,0,0,.08);
            padding:20px;
        }
        h2{
            margin-top:0;
            color:#1d3557;
        }
        .row{
            display:flex;
            flex-wrap:wrap;
            gap:15px;
        }
        .col-4{ width:calc(33.333% - 10px); }
        .col-6{ width:calc(50% - 8px); }
        .col-12{ width:100%; }

        @media(max-width:900px){
            .col-4,.col-6{ width:100%; }
        }

        label{
            display:block;
            font-weight:bold;
            margin-bottom:6px;
            font-size:14px;
        }
        input[type="text"],
        input[type="date"],
        textarea,
        input[type="file"]{
            width:100%;
            padding:10px;
            border:1px solid #ccc;
            border-radius:6px;
            box-sizing:border-box;
            font-size:14px;
        }
        textarea{
            min-height:120px;
            resize:vertical;
        }
        .mb-15{ margin-bottom:15px; }

        .btn{
            background:#1d3557;
            color:#fff;
            border:none;
            padding:12px 20px;
            border-radius:6px;
            cursor:pointer;
            font-size:15px;
        }
        .btn:hover{
            background:#16304d;
        }
        .alert{
            padding:12px 15px;
            border-radius:6px;
            margin-bottom:15px;
        }
        .success{
            background:#d1e7dd;
            color:#0f5132;
        }
        .danger{
            background:#f8d7da;
            color:#842029;
        }
        .preview-grid{
            display:flex;
            flex-wrap:wrap;
            gap:15px;
            margin-top:10px;
        }
        .preview-box{
            width:180px;
            border:1px solid #ddd;
            border-radius:8px;
            padding:10px;
            text-align:center;
            background:#fafafa;
            position:relative;
        }
        .preview-box img{
            width:100%;
            height:140px;
            object-fit:cover;
            border-radius:6px;
            display:block;
        }
        .remove-btn{
            margin-top:8px;
            background:#dc3545;
            color:#fff;
            border:none;
            padding:7px 10px;
            border-radius:5px;
            cursor:pointer;
            font-size:13px;
        }
        .remove-btn:hover{
            background:#b52a37;
        }
        .section-title{
            margin:20px 0 10px;
            padding-bottom:8px;
            border-bottom:2px solid #e9ecef;
            color:#333;
            font-size:18px;
            font-weight:bold;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Procedure Report & Upload Panel</h2>

    <?php if ($msg !== ''): ?>
        <div class="alert <?php echo h($msgType); ?>">
            <?php echo h($msg); ?>
        </div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <div class="section-title">Patient Information</div>

        <div class="row">
            <div class="col-4 mb-15">
                <label>Identity No</label>
                <input type="text" name="" value="<?php echo $row['pmrn'];?>" required>
            </div>
            <div class="col-4 mb-15">
                <label>Patient Name</label>
                <input type="text" name="patient_name" value="<?php echo $row['pname'];?>"  required>
            </div>
            <div class="col-4 mb-15">
                <label>MRN</label>
                <input type="text" name="mrn" value="<?php echo $row['pmrn'];?>" >
            </div>

            <div class="col-4 mb-15">
                <label>Visit Date</label>
                <input type="date" name="visit_date" value="<?php echo $row['adate'];?>" >
            </div>
            <div class="col-4 mb-15">
                <label>Age / Sex</label>
                <input type="text" name="age_sex" value="<?php echo $row['page'];?>" >
            </div>
            <div class="col-4 mb-15">
                <label>Bed</label>
                <input type="text" name="bed" value="<?php echo 'ENDOSCOPY-01';?>" >
            </div>

            <div class="col-6 mb-15">
                <label>Referrer</label>
                <input type="text" name="referrer" value="<?php echo $row['dreffer'];?>" >
            </div>
            
        </div>

        <div class="section-title">Procedure Information</div>

        <div class="row">
            <div class="col-4 mb-15">
                <label>Procedure Name</label>
                <input type="text" name="procedure_name" value="<?php echo $row['tname'];?>" >
            </div>
            <div class="col-4 mb-15">
                <label>Indication</label>
                <input type="text" name="indication" value="CERVICAL CANCER SCREENING">
            </div>
            <div class="col-4 mb-15">
                <label>Medication</label>
                <input type="text" name="medication" value="N/A">
            </div>

            <div class="col-12 mb-15">
                <label>Surgeon Name</label>
                <input type="text" name="surgeon_name">
            </div>

            <div class="col-6 mb-15">
                <label>Details Note</label>
                <textarea name="details_note">Colposcopically: Normal
SCJ/TZ: Seen clearly, type 1
Acetowhite: Absent
Punctations: Absent
Mosaicism: Absent
Vessels: Absent
Biopsy: taken</textarea>
            </div>

            <div class="col-6 mb-15">
                <label>Comments</label>
                <textarea name="comments_text">Normal</textarea>
            </div>
        </div>

        <div class="section-title">Upload Images (Max 4)</div>

        <div class="row">
            <div class="col-6 mb-15">
                <label>Image 1</label>
                <input type="file" name="image1" accept=".jpg,.jpeg,.png,.webp" onchange="previewFile(this, 1)">
            </div>
            <div class="col-6 mb-15">
                <label>Image 2</label>
                <input type="file" name="image2" accept=".jpg,.jpeg,.png,.webp" onchange="previewFile(this, 2)">
            </div>
            <div class="col-6 mb-15">
                <label>Image 3</label>
                <input type="file" name="image3" accept=".jpg,.jpeg,.png,.webp" onchange="previewFile(this, 3)">
            </div>
            <div class="col-6 mb-15">
                <label>Image 4</label>
                <input type="file" name="image4" accept=".jpg,.jpeg,.png,.webp" onchange="previewFile(this, 4)">
            </div>
        </div>

        <div class="preview-grid">
            <div class="preview-box" id="previewBox1" style="display:none;">
                <img id="preview1" src="" alt="Preview 1">
                <button type="button" class="remove-btn" onclick="removeImage(1)">Delete</button>
            </div>
            <div class="preview-box" id="previewBox2" style="display:none;">
                <img id="preview2" src="" alt="Preview 2">
                <button type="button" class="remove-btn" onclick="removeImage(2)">Delete</button>
            </div>
            <div class="preview-box" id="previewBox3" style="display:none;">
                <img id="preview3" src="" alt="Preview 3">
                <button type="button" class="remove-btn" onclick="removeImage(3)">Delete</button>
            </div>
            <div class="preview-box" id="previewBox4" style="display:none;">
                <img id="preview4" src="" alt="Preview 4">
                <button type="button" class="remove-btn" onclick="removeImage(4)">Delete</button>
            </div>
        </div>

        <br>
        <button type="submit" class="btn">Save Report</button>
    </form>
</div>

<script>
function previewFile(input, index) {
    const file = input.files[0];
    const preview = document.getElementById('preview' + index);
    const previewBox = document.getElementById('previewBox' + index);

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewBox.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        previewBox.style.display = 'none';
    }
}

function removeImage(index) {
    const fileInput = document.querySelector('input[name="image' + index + '"]');
    const preview = document.getElementById('preview' + index);
    const previewBox = document.getElementById('previewBox' + index);

    fileInput.value = '';
    preview.src = '';
    previewBox.style.display = 'none';
}
</script>
</body>
</html>