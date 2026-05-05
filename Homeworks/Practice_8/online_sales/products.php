<?php
$connect = mysqli_connect("localhost", "root", "", "online_sales_db");

if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM products WHERE product_id=".$_POST['id']);
    header("Location: products.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['product_name'])){
        mysqli_query($connect, "
            UPDATE products SET 
            product_name='$_POST[product_name]',
            price='$_POST[price]',
            stock='$_POST[stock]'
            WHERE product_id=$id
        ");
        header("Location: products.php");
        exit;
    }

    $p = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM products WHERE product_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM products"));
?>

<form method="post">
<?php if(isset($p)){ ?>
    Name: <input name="product_name" value="<?= $p['product_name'] ?>"><br>
    Price: <input name="price" value="<?= $p['price'] ?>"><br>
    Stock: <input name="stock" value="<?= $p['stock'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Name</th><th>Price</th><th>Stock</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $p){ ?>
<tr>
<td><?= $p[0] ?></td>
<td><?= $p[1] ?></td>
<td><?= $p[2] ?></td>
<td><?= $p[3] ?></td>

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
    <a href="categories.php">Categories</a> |
    <a href="customers.php">Customers</a> |
    <a href="orders.php">Orders</a> |
    <a href="order_details.php">Order Details</a> |
    <a href="products.php">Products</a>
</div>