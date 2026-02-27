<?php
    echo "<h1>worker</h1>";
   
    if(isset($_GET['saxeli'])){
        echo "<pre>";
        print_r($_GET);
        echo "</pre>";
        echo "<p>".$_GET['saxeli']." სწავლობს ".$_GET['sagani']."-ს</p>";
    }

    if(isset($_POST['saxeli'])){
        echo "<hr><hr>";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        echo "<p>".$_POST['saxeli']." სწავლობს ".$_POST['sagani']."-ს</p>";
    }
?>