<?php 
    $f = $_GET['f-name'];
    $content = $_GET['f-content'];
    $f = $f . ".txt";
    $f = "folder2/" . $f;
    echo $f;
    $d  = fopen($f, "w");
    fwrite($d, $content);
    fclose($d);
    
?>