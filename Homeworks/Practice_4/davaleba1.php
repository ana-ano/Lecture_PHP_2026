<?php
function fileExample() {
    $filename = "test.txt";

    // ჩაწერა ფაილში
    $file = fopen($filename, "w");
    fwrite($file, "Hello World");
    fclose($file);

    // წაკითხვა ფაილიდან
    $file = fopen($filename, "r");
    $content = fread($file, filesize($filename));
    fclose($file);

    // გამოტანა ეკრანზე
    echo $content;
}

// ფუნქციის გამოძახება
fileExample();
?>