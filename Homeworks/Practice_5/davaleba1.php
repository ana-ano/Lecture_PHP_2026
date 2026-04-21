<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {

        $allowedTypes = ["image/png", "image/jpeg", "image/gif"];
        $maxSize = 100 * 1024 * 1024; // 100 MB

        $fileName = $_FILES["image"]["name"];
        $fileTmpName = $_FILES["image"]["tmp_name"];
        $fileSize = $_FILES["image"]["size"];
        $fileType = mime_content_type($fileTmpName);

        $uploadFolder = "uploads";

        if (!is_dir($uploadFolder)) {
            mkdir($uploadFolder, 0777, true);
        }

        if (!in_array($fileType, $allowedTypes)) {
            $message = "<div class='message error'>დაშვებულია მხოლოდ PNG, JPG, GIF ფაილები.</div>";
        } elseif ($fileSize > $maxSize) {
            $message = "<div class='message error'>ფაილის ზომა არ უნდა აღემატებოდეს 100 MB-ს.</div>";
        } else {
            $newFilePath = $uploadFolder . "/" . basename($fileName);

            if (move_uploaded_file($fileTmpName, $newFilePath)) {
                $message = "<div class='message success'>ფაილი წარმატებით აიტვირთა.</div>";
            } else {
                $message = "<div class='message error'>ფაილის ატვირთვა ვერ მოხერხდა.</div>";
            }
        }
    } else {
        $message = "<div class='message error'>გთხოვთ აირჩიოთ ფაილი.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ფაილის ატვირთვა</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="upload-container">
        <h2>ფაილის ატვირთვა</h2>
        <p>დაშვებულია მხოლოდ PNG, JPG, GIF ფორმატები. მაქსიმალური ზომა: 100 MB</p>

        <form method="post" enctype="multipart/form-data">
            <div class="file-box">
                <input type="file" name="image" accept=".png,.jpg,.jpeg,.gif">
            </div>
            <button type="submit" class="btn-upload">ატვირთვა</button>
        </form>

        <?php echo $message; ?>
    </div>

</body>
</html>