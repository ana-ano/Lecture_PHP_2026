<?php
$connect = mysqli_connect("localhost", "root", "", "hotel_booking_db");

if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM rooms WHERE room_id=".$_POST['id']);
    header("Location: rooms.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['room_number'])){
        mysqli_query($connect, "UPDATE rooms 
        SET room_number='$_POST[room_number]', room_type='$_POST[room_type]', price_per_night='$_POST[price]'
        WHERE room_id=$id");

        header("Location: rooms.php");
        exit;
    }

    $r = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM rooms WHERE room_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM rooms"));
?>

<form method="post">
<?php if(isset($r)){ ?>
    Number: <input name="room_number" value="<?= $r['room_number'] ?>"><br>
    Type: <input name="room_type" value="<?= $r['room_type'] ?>"><br>
    Price: <input name="price" value="<?= $r['price_per_night'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Number</th><th>Type</th><th>Price</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $r){ ?>
<tr>
    <td><?= $r[0] ?></td>
    <td><?= $r[2] ?></td>
    <td><?= $r[3] ?></td>
    <td><?= $r[4] ?></td>

    <td><a href="?id=<?= $r[0] ?>">edit</a></td>

    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?= $r[0] ?>">
            <button name="drop">drop</button>
        </form>
    </td>
</tr>
<?php } ?>
</table>
<div style="text-align:center; margin:20px;">
    <a href="bookings.php">Bookings</a> |
    <a href="guests.php">Guests</a> |
    <a href="hotels.php">Hotels</a> |
    <a href="rooms.php">Rooms</a> |
    <a href="payments.php">Payments</a>
</div>