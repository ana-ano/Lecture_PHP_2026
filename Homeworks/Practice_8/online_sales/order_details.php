<?php
$connect = mysqli_connect("localhost", "root", "", "online_sales_db");

if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM order_details WHERE order_detail_id=".$_POST['id']);
    header("Location: order_details.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['quantity'])){
        mysqli_query($connect, "
            UPDATE order_details SET 
            quantity='$_POST[quantity]',
            unit_price='$_POST[unit_price]'
            WHERE order_detail_id=$id
        ");
        header("Location: order_details.php");
        exit;
    }

    $d = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM order_details WHERE order_detail_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM order_details"));
?>

<form method="post">
<?php if(isset($d)){ ?>
    Quantity: <input name="quantity" value="<?= $d['quantity'] ?>"><br>
    Price: <input name="unit_price" value="<?= $d['unit_price'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Order</th><th>Product</th><th>Qty</th><th>Price</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $d){ ?>
<tr>
<td><?= $d[0] ?></td>
<td><?= $d[1] ?></td>
<td><?= $d[2] ?></td>
<td><?= $d[3] ?></td>
<td><?= $d[4] ?></td>

<td><a href="?id=<?= $d[0] ?>">edit</a></td>

<td>
<form method="post">
<input type="hidden" name="id" value="<?= $d[0] ?>">
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