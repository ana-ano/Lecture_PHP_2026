<?php
$connect = mysqli_connect("localhost", "root", "", "hotel_booking_db");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM rooms"));

if(isset($_POST['room_number'])){
    $hotel_id = $_POST['hotel_id'];
    $number = $_POST['room_number'];
    $type = $_POST['room_type'];
    $price = $_POST['price'];

    mysqli_query($connect, "INSERT INTO rooms 
    (hotel_id, room_number, room_type, price_per_night)
    VALUES ('$hotel_id','$number','$type','$price')");

    header("location: rooms.php");
}
?>
<link rel="stylesheet" href="style.css">

<form method="post">
Hotel ID <input name="hotel_id"><br>
Room Number <input name="room_number"><br>
Type <input name="room_type"><br>
Price <input name="price"><br>
<button>Add</button>
</form>