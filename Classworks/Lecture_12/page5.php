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
        <h1>PAGE 5</h1>
        <a href="page4.php">page 4</a>
        <a href="page6.php">page 6</a>

        <hr>
        <?php 
            ECHO "<pre>";
            print_r($_SESSION);
            ECHO "</PRE>"; 
            session_destroy();
            
            

        ?>
    </div>
    
</body>
</html>