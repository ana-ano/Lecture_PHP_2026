<?php
$connect = mysqli_connect("localhost", "root", "", "online_sales_db");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM products"));

if(isset($_POST['product_name'])){
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category_id = $_POST['category_id'];

    mysqli_query($connect, "INSERT INTO products 
    (product_name, price, stock, category_id)
    VALUES ('$name','$price','$stock','$category_id')");

    header("location: products.php");
}
?>
<link rel="stylesheet" href="style.css">

<form method="post">
Product <input name="product_name"><br>
Price <input name="price"><br>
Stock <input name="stock"><br>
Category ID <input name="category_id"><br>
<button>Add</button>
</form>