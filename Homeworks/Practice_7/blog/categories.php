<?php
$connect = mysqli_connect("localhost", "root", "", "blog_db");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM categories"));

if(isset($_POST['category_name'])){
    $name = $_POST['category_name'];

    mysqli_query($connect, "INSERT INTO categories (category_name)
    VALUES ('$name')");

    header("location: categories.php");
}
?>

<form method="post">
Category <input name="category_name">
<button>Add</button>
</form>