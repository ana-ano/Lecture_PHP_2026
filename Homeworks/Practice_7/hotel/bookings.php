<?php
$connect = mysqli_connect("localhost", "root", "", "hotel_booking_db");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM bookings"));

if(isset($_POST['guest_id'])){
    $guest_id = $_POST['guest_id'];
    $room_id = $_POST['room_id'];
    $checkin = $_POST['check_in'];
    $checkout = $_POST['check_out'];
    $status = $_POST['status'];

    mysqli_query($connect, "INSERT INTO bookings 
    (guest_id, room_id, check_in_date, check_out_date, status)
    VALUES ('$guest_id','$room_id','$checkin','$checkout','$status')");

    header("location: bookings.php");
}
?>
<link rel="stylesheet" href="style.css">

<form method="post">
Guest ID <input name="guest_id"><br>
Room ID <input name="room_id"><br>
Check In <input type="date" name="check_in"><br>
Check Out <input type="date" name="check_out"><br>
Status <input name="status"><br>
<button>Add</button>
</form>