<?php
$connect = mysqli_connect("localhost", "root", "", "blog_db");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM posts"));

if(isset($_POST['title'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $user_id = $_POST['user_id'];
    $category_id = $_POST['category_id'];

    mysqli_query($connect, "INSERT INTO posts 
    (title, content, publish_date, user_id, category_id)
    VALUES ('$title','$content','$date','$user_id','$category_id')");

    header("location: posts.php");
}
?>

<form method="post">
Title <input name="title"><br>
Content <textarea name="content"></textarea><br>
Date <input type="date" name="date"><br>
User ID <input name="user_id"><br>
Category ID <input name="category_id"><br>
<button>Add</button>
</form>