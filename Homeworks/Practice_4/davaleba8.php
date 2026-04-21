<?php
function findTxtFiles($folder) {

    if (!is_dir($folder)) {
        echo "<p style='color:red;'>საქაღალდე არ არსებობს!</p>";
        return;
    }

    $files = scandir($folder);

    echo "<table border='1' cellpadding='6'>";
    echo "<tr><th>ფაილის სახელი</th><th>ზომა (bytes)</th><th>შექმნის თარიღი</th></tr>";

    foreach ($files as $file) {
        $path = $folder . "/" . $file;

        if (is_file($path) && pathinfo($file, PATHINFO_EXTENSION) == "txt") {

            $size = filesize($path);
            $date = date("Y-m-d H:i:s", filectime($path));

            echo "<tr>
                    <td>$file</td>
                    <td>$size</td>
                    <td>$date</td>
                  </tr>";
        }
    }

    echo "</table>";
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["folder"])) {
        $error = "გთხოვთ შეიყვანოთ საქაღალდის სახელი!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>TXT File Finder</title>
</head>
<body>

<h2>TXT ფაილების ძებნა</h2>

<form method="post">
    საქაღალდის სახელი: 
    <input type="text" name="folder">
    <input type="submit" value="ძებნა">
</form>

<br>

<?php
if ($error != "") {
    echo "<p style='color:red;'>$error</p>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $error == "") {
    $folder = trim($_POST["folder"]);
    findTxtFiles($folder);
}
?>

</body>
</html>