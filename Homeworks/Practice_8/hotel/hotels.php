<?php
$connect = mysqli_connect("localhost", "root", "", "hotel_booking_db");

/* DELETE */
if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM hotels WHERE hotel_id=".$_POST['id']);
    header("Location: hotels.php");
    exit;
}

/* UPDATE */
if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['hotel_name'])){
        mysqli_query($connect, "UPDATE hotels 
        SET hotel_name='$_POST[hotel_name]', city='$_POST[city]', rating='$_POST[rating]'
        WHERE hotel_id=$id");

        header("Location: hotels.php");
        exit;
    }

    $h = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM hotels WHERE hotel_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM hotels"));
?>

<form method="post">
<?php if(isset($h)){ ?>
    Name: <input name="hotel_name" value="<?= $h['hotel_name'] ?>"><br>
    City: <input name="city" value="<?= $h['city'] ?>"><br>
    Rating: <input name="rating" value="<?= $h['rating'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Name</th><th>City</th><th>Rating</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $h){ ?>
<tr>
    <td><?= $h[0] ?></td>
    <td><?= $h[1] ?></td>
    <td><?= $h[2] ?></td>
    <td><?= $h[3] ?></td>

    <td><a href="?id=<?= $h[0] ?>">edit</a></td>

    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?= $h[0] ?>">
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