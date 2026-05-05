<?php
$connect = mysqli_connect("localhost", "root", "", "bank_2026_2");

/* DELETE */
if(isset($_POST['drop'])){
    mysqli_query($connect, "UPDATE accounts SET deleted_at = NOW() WHERE id=".$_POST['id']);
    header("Location: accounts.php");
    exit;
}

/* UPDATE */
if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['name'])){
        mysqli_query($connect, "UPDATE accounts 
        SET name='$_POST[name]', balance='$_POST[balance]', updated_at=NOW()
        WHERE id=$id");

        header("Location: accounts.php");
        exit;
    }

    $acc = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM accounts WHERE id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM accounts WHERE deleted_at IS NULL"));
?>

<form method="post">
<?php if(isset($acc)){ ?>
    Name: <input name="name" value="<?= $acc['name'] ?>"><br>
    Balance: <input name="balance" value="<?= $acc['balance'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr>
    <th>ID</th><th>Name</th><th>Balance</th><th>Edit</th><th>Drop</th>
</tr>

<?php foreach($data as $a){ ?>
<tr>
    <td><?= $a[0] ?></td>
    <td><?= $a[2] ?></td>
    <td><?= $a[3] ?></td>

    <td><a href="?id=<?= $a[0] ?>">edit</a></td>

    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?= $a[0] ?>">
            <button name="drop">drop</button>
        </form>
    </td>
</tr>
<?php } ?>
</table>
<div style="text-align:center; margin:20px;">
    <a href="roles.php">Roles</a> |
    <a href="users.php">Users</a> |
    <a href="accounts.php">Accounts</a> |
    <a href="cards.php">Cards</a> |
    <a href="transactions.php">Transactions</a>
</div>