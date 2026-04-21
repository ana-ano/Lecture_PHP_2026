<?php
$uploadDir = "uploads/";
$message = "";

// თუ საქაღალდე არ არსებობს, შევქმნათ
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// ბოლო რიგითი ნომრის წამოღება
function getLastUploadNumber($uploadDir) {
    $counterFile = $uploadDir . "counter.txt";

    if (!file_exists($counterFile)) {
        file_put_contents($counterFile, "0");
        return 0;
    }

    return (int)file_get_contents($counterFile);
}

// ახალი რიგითი ნომრის შენახვა
function setLastUploadNumber($uploadDir, $number) {
    $counterFile = $uploadDir . "counter.txt";
    file_put_contents($counterFile, $number);
}

// წაშლა
if (isset($_GET["delete"])) {
    $fileToDelete = basename($_GET["delete"]);
    $filePath = $uploadDir . $fileToDelete;

    if (file_exists($filePath) && is_file($filePath)) {
        unlink($filePath);
        $message = "ფაილი წარმატებით წაიშალა.";
    } else {
        $message = "ფაილი ვერ მოიძებნა.";
    }
}

// ატვირთვა
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {

        $allowedExtensions = ["png", "jpg", "jpeg", "gif"];
        $maxSize = 100 * 1024 * 1024; // 100 MB

        $originalName = $_FILES["image"]["name"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $fileSize = $_FILES["image"]["size"];

        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

        if (!in_array($extension, $allowedExtensions)) {
            $message = "დაშვებულია მხოლოდ PNG, JPG, JPEG, GIF ფაილები.";
        } elseif ($fileSize > $maxSize) {
            $message = "ფაილის ზომა არ უნდა აღემატებოდეს 100 MB-ს.";
        } else {
            $lastNumber = getLastUploadNumber($uploadDir);
            $newNumber = $lastNumber + 1;

            $datePart = date("d-m-Y");
            $newFileName = $newNumber . "-" . $datePart . "." . $extension;
            $targetFile = $uploadDir . $newFileName;

            if (move_uploaded_file($tmpName, $targetFile)) {
                setLastUploadNumber($uploadDir, $newNumber);
                $message = "ფაილი წარმატებით აიტვირთა.";
            } else {
                $message = "ფაილის ატვირთვა ვერ მოხერხდა.";
            }
        }
    } else {
        $message = "გთხოვთ აირჩიოთ ფაილი.";
    }
}

// ატვირთული ფაილების სია
$files = [];
if (is_dir($uploadDir)) {
    $allFiles = scandir($uploadDir);
    foreach ($allFiles as $file) {
        if ($file != "." && $file != ".." && $file != "counter.txt" && is_file($uploadDir . $file)) {
            $files[] = $file;
        }
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

<div class="container">
    <h2>სურათის ატვირთვის ფორმა</h2>
    <p class="info">დაშვებულია მხოლოდ PNG, JPG, GIF ფორმატი. მაქსიმალური ზომა: 100 MB</p>

    <?php if ($message != ""): ?>
        <p class="message"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept=".png,.jpg,.jpeg,.gif" required><br>
        <button type="submit">ატვირთვა</button>
    </form>

    <h3>ატვირთული ფაილები</h3>

    <?php if (count($files) > 0): ?>
        <table>
            <tr>
                <th>#</th>
                <th>სურათი</th>
                <th>ფაილის სახელი</th>
                <th>ზომა</th>
                <th>წაშლა</th>
            </tr>

            <?php foreach ($files as $index => $file): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td>
                        <img class="preview" src="<?php echo $uploadDir . htmlspecialchars($file); ?>" alt="image">
                    </td>
                    <td><?php echo htmlspecialchars($file); ?></td>
                    <td><?php echo round(filesize($uploadDir . $file) / 1024, 2); ?> KB</td>
                    <td>
                        <a class="delete-btn" href="?delete=<?php echo urlencode($file); ?>" onclick="return confirm('ნამდვილად გსურთ წაშლა?')">წაშლა</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p class="empty">ჯერ ფაილები არ არის ატვირთული.</p>
    <?php endif; ?>
</div>

</body>
</html>