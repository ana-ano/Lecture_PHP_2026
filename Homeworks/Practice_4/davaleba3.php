<?php
function checkFile() {
    $filename = "data.txt";

    if (file_exists($filename)) {
        echo "ფაილი უკვე არსებობს!";
    } else {
        file_put_contents($filename, "New File Created");
        echo "ფაილი არ არსებობდა და შეიქმნა.";
    }
}

// ფუნქციის გამოძახება
checkFile();
?>