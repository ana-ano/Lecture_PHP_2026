<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width: 400px;
            margin: auto;
            border: solid 1px black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <form action="worker.php" method="get">
        <input type="text" placeholder="name" id="name" name="saxeli">
        <br><br>
        <input type="text" placeholder="subject" id="subject" name="sagani">
        <br><br>
        <button>send information (GET)</button>
        <!-- <button onclick="send_information()">send information</button> -->
    </form>
    
    <hr><hr>

    <form action="worker.php" method="post">
        <input type="text" placeholder="name" id="name" name="saxeli">
        <br><br>
        <input type="text" placeholder="subject" id="subject" name="sagani">
        <br><br>
        <button>send information (POST)</button>
        <!-- <button onclick="send_information()">send information</button> -->
    </form>  
    

    <!-- <pre>
        Lorem ipsum, dolor sit amet consectetur 
        
        adipisicing elit. Voluptate excepturi possimus nobis perferendis illum qui iusto, perspiciatis officiis? Molestiae, 
        
        nam dicta! Quis magnam tempore id nostrum nemo vitae illum natus?

        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus atque, recusandae repudiandae sed facere eum optio numquam illum dolorem quod, hic labore ea, perferendis quis porro at architecto perspiciatis temporibus.

        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, perspiciatis dolores! Quaerat explicabo fuga rerum repudiandae corporis ad fugit eum magni nihil dolores! Quos a voluptates voluptatum molestias accusamus necessitatibus.
    </pre> -->
    <script>
        function send_information(){
            alert(document.getElementById("name").value + "სწავლობს "+document.getElementById("subject").value)
        }
    </script>
</body>
</html>