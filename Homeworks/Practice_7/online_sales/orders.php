<?php
$connect = mysqli_connect("localhost", "root", "", "online_sales_db");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM orders"));

if(isset($_POST['customer_id'])){
    $customer_id = $_POST['customer_id'];
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];

    mysqli_query($connect, "INSERT INTO orders 
    (customer_id, order_date, total_amount, status)
    VALUES ('$customer_id','$date','$amount','$status')");

    header("location: orders.php");
}
?>
<link rel="stylesheet" href="style.css">

<form method="post">
Customer ID <input name="customer_id"><br>
Date <input type="date" name="date"><br>
Amount <input name="amount"><br>
Status <input name="status"><br>
<button>Add</button>
</form>