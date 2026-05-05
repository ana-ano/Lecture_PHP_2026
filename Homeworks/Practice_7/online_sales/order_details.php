<?php
$connect = mysqli_connect("localhost", "root", "", "online_sales_db");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM order_details"));

if(isset($_POST['order_id'])){
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    mysqli_query($connect, "INSERT INTO order_details 
    (order_id, product_id, quantity, unit_price)
    VALUES ('$order_id','$product_id','$quantity','$price')");

    header("location: order_details.php");
}
?>
<link rel="stylesheet" href="style.css">

<form method="post">
Order ID <input name="order_id"><br>
Product ID <input name="product_id"><br>
Quantity <input name="quantity"><br>
Price <input name="price"><br>
<button>Add</button>
</form>