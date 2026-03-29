<?php 
    $f = $_GET['f-name'];
    $f = $f.".txt";
    $f = "folder1/.$f";
    echo $f;
    fopen($f,"w");
?>