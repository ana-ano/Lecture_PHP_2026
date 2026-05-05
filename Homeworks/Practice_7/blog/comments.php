<?php
$connect = mysqli_connect("localhost", "root", "", "blog_db");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM comments"));

if(isset($_POST['comment'])){
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];
    $text = $_POST['comment'];
    $date = $_POST['date'];

    mysqli_query($connect, "INSERT INTO comments 
    (post_id, user_id, comment_text, comment_date)
    VALUES ('$post_id','$user_id','$text','$date')");

    header("location: comments.php");
}
?>

<form method="post">
Post ID <input name="post_id"><br>
User ID <input name="user_id"><br>
Comment <input name="comment"><br>
Date <input type="date" name="date"><br>
<button>Add</button>
</form>