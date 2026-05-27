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
        <h1>PAGE 1</h1>
        <a href="page2.php">page 2</a>
        <hr>
        <?php 
            $x = 2;
            echo "<p>$x</p>";
        ?>
    </div>
    
</body>
</html>