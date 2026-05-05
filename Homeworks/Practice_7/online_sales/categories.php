<?php
$connect = mysqli_connect("localhost", "root", "", "online_sales_db");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM categories"));

if(isset($_POST['category_name'])){
    $name = $_POST['category_name'];

    mysqli_query($connect, "INSERT INTO categories (category_name)
    VALUES ('$name')");

    header("location: categories.php");
}
?>
<link rel="stylesheet" href="style.css">

<form method="post">
Category <input name="category_name">
<button>Add</button>
</form>

<?php foreach($data as $row){ ?>
<?= $row[0] ?> - <?= $row[1] ?><br>
<?php } ?>