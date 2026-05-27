<?php  
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page 1</title>
</head>
<style>
    .container{
        width:400px ;
        border: solid 2px black;
        padding: 20px;
        margin: 20px auto;
    }
    
</style>
<body>
    <div class="container">
        <h1>PAGE 4</h1>
        <a href="page3.php">page 3</a>
        <a href="page5.php">page 5</a>

        <hr>
        <?php 
            ECHO "<pre>";
            print_r($_SESSION);
            ECHO "</PRE>"; 
            unset($_SESSION['Y']);
            unset( $_SESSION['z']);

        ?>
    </div>
    
</body>
</html>