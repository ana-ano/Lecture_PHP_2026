<?php
$dir = "files/";
$message = "";
$contentLines = [];

// საქაღალდის შექმნა თუ არ არსებობს
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

// ფაილის შექმნა
if (isset($_POST["create"])) {
    $filename = trim($_POST["filename"]);

    if ($filename == "") {
        $message = "შეიყვანე ფაილის სახელი!";
    } else {
        if (pathinfo($filename, PATHINFO_EXTENSION) != "txt") {
            $filename .= ".txt";
        }

        $path = $dir . basename($filename);

        if (!file_exists($path)) {
            file_put_contents($path, "");
            $message = "ფაილი შეიქმნა!";
        } else {
            $message = "ფაილი უკვე არსებობს!";
        }
    }
}

// ტექსტის ჩაწერა
if (isset($_POST["write"])) {
    if (isset($_POST["selectedFile"]) && $_POST["selectedFile"] != "") {
        $file = $_POST["selectedFile"];
        $text = trim($_POST["text"]);
        $path = $dir . basename($file);

        if (!file_exists($path)) {
            $message = "ფაილი ვერ მოიძებნა!";
        } elseif ($text == "") {
            $message = "ჩასაწერი ტექსტი ცარიელია!";
        } else {
            file_put_contents($path, $text . PHP_EOL, FILE_APPEND);
            $message = "ტექსტი დაემატა!";
        }
    } else {
        $message = "აირჩიე ფაილი!";
    }
}

// შიგთავსის წაკითხვა
if (isset($_POST["read"])) {
    if (isset($_POST["selectedFile"]) && $_POST["selectedFile"] != "") {
        $file = $_POST["selectedFile"];
        $path = $dir . basename($file);

        if (file_exists($path)) {
            $contentLines = file($path, FILE_IGNORE_NEW_LINES);
            $message = "ფაილის შიგთავსი ნაჩვენებია!";
        } else {
            $message = "ფაილი ვერ მოიძებნა!";
        }
    } else {
        $message = "აირჩიე ფაილი!";
    }
}

// წაშლა
if (isset($_GET["delete"])) {
    $file = basename($_GET["delete"]);
    $path = $dir . $file;

    if (file_exists($path)) {
        unlink($path);
        $message = "ფაილი წაიშალა!";
    } else {
        $message = "ფაილი ვერ მოიძებნა!";
    }
}

// ფაილების სია
$files = array_filter(scandir($dir), function($f) use ($dir) {
    return is_file($dir . $f) && strtolower(pathinfo($f, PATHINFO_EXTENSION)) == "txt";
});
?>

<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>TXT File Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">
    <h2>TXT File Manager</h2>

    <p class="message"><?php echo htmlspecialchars($message); ?></p>

    <form method="post">
        <h3>ფაილის შექმნა</h3>
        <input type="text" name="filename" placeholder="example.txt">
        <button type="submit" name="create">შექმნა</button>
    </form>

    <hr>

    <form method="post">
        <h3>ფაილის არჩევა</h3>

        <select name="selectedFile">
            <option value="">აირჩიე ფაილი</option>
            <?php foreach ($files as $f): ?>
                <option value="<?php echo htmlspecialchars($f); ?>">
                    <?php echo htmlspecialchars($f); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <textarea name="text" placeholder="ჩაწერე ტექსტი..."></textarea>

        <button type="submit" name="write">ჩაწერა</button>
        <button type="submit" name="read">შიგთავსის ნახვა</button>
    </form>

    <hr>

    <h3>ფაილები</h3>
    <ul>
        <?php if (!empty($files)): ?>
            <?php foreach ($files as $f): ?>
                <li>
                    <?php echo htmlspecialchars($f); ?>
                    <a href="?delete=<?php echo urlencode($f); ?>" style="color:red;" onclick="return confirm('წაშლა?')">[წაშლა]</a>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>ფაილები ჯერ არ არის შექმნილი.</li>
        <?php endif; ?>
    </ul>

    <?php if (!empty($contentLines)): ?>
        <h3>ფაილის შიგთავსი (სტრიქონებად)</h3>
        <ul>
            <?php foreach ($contentLines as $line): ?>
                <li><?php echo htmlspecialchars($line); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

</body>
</html>