<?php
$connect = mysqli_connect("localhost", "root", "", "blog_db");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM tags"));

if(isset($_POST['tag'])){
    $tag = $_POST['tag'];

    mysqli_query($connect, "INSERT INTO tags (tag_name)
    VALUES ('$tag')");

    header("location: tags.php");
}
?>

<form method="post">
Tag <input name="tag">
<button>Add</button>
</form>