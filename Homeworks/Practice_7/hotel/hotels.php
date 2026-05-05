<?php
$connect = mysqli_connect("localhost", "root", "", "hotel_booking_db");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM hotels"));

if(isset($_POST['hotel_name'])){
    $name = $_POST['hotel_name'];
    $city = $_POST['city'];
    $rating = $_POST['rating'];

    mysqli_query($connect, "INSERT INTO hotels 
    (hotel_name, city, rating)
    VALUES ('$name','$city','$rating')");

    header("location: hotels.php");
}
?>
<link rel="stylesheet" href="style.css">

<form method="post">
Hotel <input name="hotel_name"><br>
City <input name="city"><br>
Rating <input name="rating"><br>
<button>Add</button>
</form>