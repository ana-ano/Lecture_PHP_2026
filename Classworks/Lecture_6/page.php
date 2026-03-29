<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture 6</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="file1.php" method="get">
        File Name - <input type="text" name="f-name">
        <br><br>
        <button>Create File</button>
    </form>
    <hr>
    <form action="file2.php" method="get">
        File Name - <input type="text" name="f-name">
        <br><br>
        File Content - <textarea name="f-content"></textarea>
        <br><br>
        <button>Write to File</button>
    </form>
    <hr>
    <div class="list">
        <h1>List Of Folder 2</h1>
        <ol>
            <?php
                $L = scandir("folder2");
                // echo "<pre>";
                // print_r($L);
                // echo "</pre>";
                for($i=2; $i<count($L); $i++){
                    echo "<li>$L[$i]</li>";
                }
            ?>
        </ol>
    </div>
    <hr><hr>
    <div class="list">
    <h1>Read text.txt file by lines</h1>
    <?php
        $f = fopen("text.txt", "r"); 
        $i = 1;
        while(!feof($f)){
            $s = fgets($f);
            if ($s !== false) { 
                echo "<p>Line $i - $s</p>";
                $i++;
            }
        }
        fclose($f); 
    ?>
</div>
    <br><br><br><br><br><br>

</body>
</html>

