<?php
$connect = mysqli_connect("localhost", "root", "", "online_sales_db");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM customers"));

if(isset($_POST['full_name'])){
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    mysqli_query($connect, "INSERT INTO customers 
    (full_name, email, phone, address)
    VALUES ('$name','$email','$phone','$address')");

    header("location: customers.php");
}
?>
<link rel="stylesheet" href="style.css">

<form method="post">
Name <input name="full_name"><br>
Email <input name="email"><br>
Phone <input name="phone"><br>
Address <input name="address"><br>
<button>Add</button>
</form>