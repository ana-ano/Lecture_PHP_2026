<?php
function saveOrAppendToFile($folder, $filename, $text) {
    $fullPath = rtrim($folder, "/\\") . DIRECTORY_SEPARATOR . $filename;

    if (file_exists($fullPath)) {
        file_put_contents($fullPath, PHP_EOL . $text, FILE_APPEND);
    } else {
        file_put_contents($fullPath, $text);
    }

    return file_get_contents($fullPath);
}

$error = "";
$content = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folder = trim($_POST["folder"]);
    $filename = trim($_POST["filename"]);
    $text = trim($_POST["text"]);

    if (empty($folder) || empty($filename) || empty($text)) {
        $error = "ყველა ველი სავალდებულოა!";
    } elseif (!is_dir($folder)) {
        $error = "მითითებული საქაღალდე არ არსებობს!";
    } else {
        $content = saveOrAppendToFile($folder, $filename, $text);
    }
}
?>

<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>ფაილის შექმნა და რედაქტირება</title>
</head>
<body>

<h2>ფაილის შექმნა / განახლება</h2>

<form method="post">
    საქაღალდის სახელი:<br>
    <input type="text" name="folder"><br><br>

    ფაილის სახელი:<br>
    <input type="text" name="filename"><br><br>

    ტექსტი:<br>
    <textarea name="text" rows="5" cols="40"></textarea><br><br>

    <input type="submit" value="შენახვა">
</form>

<br>

<?php
if ($error != "") {
    echo "<p style='color:red;'>$error</p>";
}

if ($content != "") {
    echo "<h3>ფაილის სრული შიგთავსი:</h3>";
    echo "<pre>" . htmlspecialchars($content) . "</pre>";
}
?>

</body>
</html>