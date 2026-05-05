<?php
$connect = mysqli_connect("localhost", "root", "", "hotel_booking_db");

if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM guests WHERE guest_id=".$_POST['id']);
    header("Location: guests.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['full_name'])){
        mysqli_query($connect, "UPDATE guests 
        SET full_name='$_POST[full_name]', email='$_POST[email]', phone='$_POST[phone]'
        WHERE guest_id=$id");

        header("Location: guests.php");
        exit;
    }

    $g = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM guests WHERE guest_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM guests"));
?>

<form method="post">
<?php if(isset($g)){ ?>
    Name: <input name="full_name" value="<?= $g['full_name'] ?>"><br>
    Email: <input name="email" value="<?= $g['email'] ?>"><br>
    Phone: <input name="phone" value="<?= $g['phone'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $g){ ?>
<tr>
    <td><?= $g[0] ?></td>
    <td><?= $g[1] ?></td>
    <td><?= $g[2] ?></td>
    <td><?= $g[3] ?></td>

    <td><a href="?id=<?= $g[0] ?>">edit</a></td>

    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?= $g[0] ?>">
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