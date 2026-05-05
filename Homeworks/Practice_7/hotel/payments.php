<?php
$connect = mysqli_connect("localhost", "root", "", "hotel_booking_db");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM payments"));

if(isset($_POST['booking_id'])){
    $booking_id = $_POST['booking_id'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $method = $_POST['method'];

    mysqli_query($connect, "INSERT INTO payments 
    (booking_id, amount, payment_date, payment_method)
    VALUES ('$booking_id','$amount','$date','$method')");

    header("location: payments.php");
}
?>
<link rel="stylesheet" href="style.css">

<form method="post">
Booking ID <input name="booking_id"><br>
Amount <input name="amount"><br>
Date <input type="date" name="date"><br>
Method <input name="method"><br>
<button>Add</button>
</form>