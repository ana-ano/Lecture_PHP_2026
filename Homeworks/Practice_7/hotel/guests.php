<?php
$connect = mysqli_connect("localhost", "root", "", "hotel_booking_db");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM guests"));

if(isset($_POST['full_name'])){
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    mysqli_query($connect, "INSERT INTO guests 
    (full_name, email, phone, address)
    VALUES ('$name','$email','$phone','$address')");

    header("location: guests.php");
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

<?php foreach($data as $row){ ?>
<?= $row[0] ?> - <?= $row[1] ?> - <?= $row[2] ?><br>
<?php } ?>