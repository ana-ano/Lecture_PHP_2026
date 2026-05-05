<?php
$connect = mysqli_connect("localhost", "root", "", "online_sales_db");

/* DELETE */
if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM customers WHERE customer_id=".$_POST['id']);
    header("Location: customers.php");
    exit;
}

/* UPDATE */
if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['full_name'])){
        mysqli_query($connect, "
            UPDATE customers SET 
            full_name='$_POST[full_name]',
            email='$_POST[email]',
            phone='$_POST[phone]',
            address='$_POST[address]'
            WHERE customer_id=$id
        ");
        header("Location: customers.php");
        exit;
    }

    $c = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM customers WHERE customer_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM customers"));
?>

<form method="post">
<?php if(isset($c)){ ?>
    Name: <input name="full_name" value="<?= $c['full_name'] ?>"><br>
    Email: <input name="email" value="<?= $c['email'] ?>"><br>
    Phone: <input name="phone" value="<?= $c['phone'] ?>"><br>
    Address: <input name="address" value="<?= $c['address'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr>
<th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Edit</th><th>Drop</th>
</tr>

<?php foreach($data as $c){ ?>
<tr>
<td><?= $c[0] ?></td>
<td><?= $c[1] ?></td>
<td><?= $c[2] ?></td>
<td><?= $c[3] ?></td>
<td><?= $c[4] ?></td>

<td><a href="?id=<?= $c[0] ?>">edit</a></td>

<td>
<form method="post">
<input type="hidden" name="id" value="<?= $c[0] ?>">
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