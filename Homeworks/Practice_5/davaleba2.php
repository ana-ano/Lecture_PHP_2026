<?php
$uploadDir = "uploads/";
$message = "";

// თუ uploads საქაღალდე არ არსებობს, შეიქმნას
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// წაშლა
if (isset($_GET["delete"])) {
    $fileToDelete = basename($_GET["delete"]);
    $filePath = $uploadDir . $fileToDelete;

    if (file_exists($filePath)) {
        unlink($filePath);
        $message = "<p style='color: green;'>ფაილი წარმატებით წაიშალა.</p>";
    } else {
        $message = "<p style='color: red;'>ფაილი ვერ მოიძებნა.</p>";
    }
}

// ატვირთვა
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["myfile"]) && $_FILES["myfile"]["error"] == 0) {
        $fileName = basename($_FILES["myfile"]["name"]);
        $tmpName = $_FILES["myfile"]["tmp_name"];
        $fileSize = $_FILES["myfile"]["size"];
        $targetFile = $uploadDir . $fileName;

        $maxSize = 50 * 1024 * 1024; // 50 MB

        if ($fileSize > $maxSize) {
            $message = "<p style='color: red;'>ფაილის ზომა არ უნდა აღემატებოდეს 50 MB-ს.</p>";
        } else {
            if (move_uploaded_file($tmpName, $targetFile)) {
                $message = "<p style='color: green;'>ფაილი წარმატებით აიტვირთა.</p>";
            } else {
                $message = "<p style='color: red;'>ფაილის ატვირთვა ვერ მოხერხდა.</p>";
            }
        }
    } else {
        $message = "<p style='color: red;'>გთხოვთ აირჩიოთ ფაილი.</p>";
    }
}

// ატვირთული ფაილების მიღება
$files = array_diff(scandir($uploadDir), array(".", ".."));
?>

<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ფაილების ატვირთვა</title>
       <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container">
    <h2>ფაილების ატვირთვა</h2>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="myfile" required><br>
        <input type="submit" value="ატვირთვა">
    </form>

    <div class="message">
        <?php echo $message; ?>
    </div>

    <h3>ატვირთული ფაილები</h3>

    <table>
        <tr>
            <th>ფაილის სახელი</th>
            <th>ზომა</th>
            <th>მოქმედება</th>
        </tr>

        <?php
        if (count($files) > 0) {
            foreach ($files as $file) {
                $filePath = $uploadDir . $file;
                $fileSizeKB = round(filesize($filePath) / 1024, 2);

                echo "<tr>";
                echo "<td>" . htmlspecialchars($file) . "</td>";
                echo "<td>" . $fileSizeKB . " KB</td>";
                echo "<td>
                        <a href='" . $filePath . "' download>ჩამოტვირთვა</a>
                        |
                        <a class='delete-link' href='?delete=" . urlencode($file) . "' onclick=\"return confirm('ნამდვილად გსურთ წაშლა?')\">წაშლა</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>ფაილები არ არის ატვირთული.</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>