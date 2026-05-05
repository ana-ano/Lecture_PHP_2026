<?php
$connect = mysqli_connect("localhost", "root", "", "hotel_booking_db");

if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM bookings WHERE booking_id=".$_POST['id']);
    header("Location: bookings.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['status'])){
        mysqli_query($connect, "UPDATE bookings 
        SET status='$_POST[status]'
        WHERE booking_id=$id");

        header("Location: bookings.php");
        exit;
    }

    $b = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM bookings WHERE booking_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM bookings"));
?>

<form method="post">
<?php if(isset($b)){ ?>
    Status: <input name="status" value="<?= $b['status'] ?>">
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Guest</th><th>Room</th><th>Status</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $b){ ?>
<tr>
    <td><?= $b[0] ?></td>
    <td><?= $b[1] ?></td>
    <td><?= $b[2] ?></td>
    <td><?= $b[5] ?></td>

    <td><a href="?id=<?= $b[0] ?>">edit</a></td>

    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?= $b[0] ?>">
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