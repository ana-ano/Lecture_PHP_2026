<?php
$connect = mysqli_connect("localhost", "root", "", "online_sales_db");

if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM orders WHERE order_id=".$_POST['id']);
    header("Location: orders.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['status'])){
        mysqli_query($connect, "
            UPDATE orders SET status='$_POST[status]'
            WHERE order_id=$id
        ");
        header("Location: orders.php");
        exit;
    }

    $o = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM orders WHERE order_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM orders"));
?>

<form method="post">
<?php if(isset($o)){ ?>
    Status: <input name="status" value="<?= $o['status'] ?>">
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Customer</th><th>Date</th><th>Total</th><th>Status</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $o){ ?>
<tr>
<td><?= $o[0] ?></td>
<td><?= $o[1] ?></td>
<td><?= $o[2] ?></td>
<td><?= $o[3] ?></td>
<td><?= $o[4] ?></td>

<td><a href="?id=<?= $o[0] ?>">edit</a></td>

<td>
<form method="post">
<input type="hidden" name="id" value="<?= $o[0] ?>">
<button name="drop">drop</button>
</form>
</td>
</tr>
<?php } ?>
</table>
<div style="text-align:center; margin:20px;">
    <a href="categories.php">Categories</a> |
    <a href="customers.php">Customers</a> |
    <a href="orders.php">Orders</a> |
    <a href="order_details.php">Order Details</a> |
    <a href="products.php">Products</a>
</div>