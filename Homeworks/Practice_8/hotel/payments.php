<?php
$connect = mysqli_connect("localhost", "root", "", "hotel_booking_db");

if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM payments WHERE payment_id=".$_POST['id']);
    header("Location: payments.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['amount'])){
        mysqli_query($connect, "UPDATE payments 
        SET amount='$_POST[amount]', payment_method='$_POST[payment_method]'
        WHERE payment_id=$id");

        header("Location: payments.php");
        exit;
    }

    $p = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM payments WHERE payment_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM payments"));
?>

<form method="post">
<?php if(isset($p)){ ?>
    Amount: <input name="amount" value="<?= $p['amount'] ?>"><br>
    Method: <input name="payment_method" value="<?= $p['payment_method'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Amount</th><th>Method</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $p){ ?>
<tr>
    <td><?= $p[0] ?></td>
    <td><?= $p[2] ?></td>
    <td><?= $p[4] ?></td>

    <td><a href="?id=<?= $p[0] ?>">edit</a></td>

    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?= $p[0] ?>">
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