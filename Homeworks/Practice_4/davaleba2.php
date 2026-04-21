<?php
function saveUserText($text) {
    $filename = "user.txt";

    // ჩაწერა ფაილში (განახლება)
    file_put_contents($filename, $text);

    // წაკითხვა
    return file_get_contents($filename);
}

$error = "";
$content = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["userText"])) {
        $error = "ველი ცარიელია!";
    } else {
        $text = htmlspecialchars(trim($_POST["userText"]));
        $content = saveUserText($text);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User File</title>
</head>
<body>

<h2>შეიყვანე ტექსტი</h2>

<form method="post">
    <textarea name="userText" rows="5" cols="40"></textarea><br><br>
    <input type="submit" value="შენახვა">
</form>

<br>

<?php
if ($error != "") {
    echo "<p style='color:red;'>$error</p>";
}

if ($content != "") {
    echo "<h3>ფაილის შიგთავსი:</h3>";
    echo "<p>$content</p>";
}
?>

</body>
</html>