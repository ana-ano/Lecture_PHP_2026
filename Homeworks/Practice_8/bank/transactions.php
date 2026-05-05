<?php
$connect = mysqli_connect("localhost", "root", "", "bank_2026_2");

/* DELETE */
if(isset($_POST['drop'])){
    mysqli_query($connect, "UPDATE transactions SET deleted_at = NOW() WHERE id=".$_POST['id']);
    header("Location: transactions.php");
    exit;
}

/* UPDATE */
if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['amount'])){
        mysqli_query($connect, "UPDATE transactions 
        SET amount='$_POST[amount]', description='$_POST[description]', updated_at=NOW()
        WHERE id=$id");

        header("Location: transactions.php");
        exit;
    }

    $tr = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM transactions WHERE id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM transactions WHERE deleted_at IS NULL"));
?>

<form method="post">
<?php if(isset($tr)){ ?>
    Amount: <input name="amount" value="<?= $tr['amount'] ?>"><br>
    Description: <input name="description" value="<?= $tr['description'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr>
    <th>ID</th><th>Amount</th><th>Description</th><th>Edit</th><th>Drop</th>
</tr>

<?php foreach($data as $t){ ?>
<tr>
    <td><?= $t[0] ?></td>
    <td><?= $t[3] ?></td>
    <td><?= $t[4] ?></td>

    <td><a href="?id=<?= $t[0] ?>">edit</a></td>

    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?= $t[0] ?>">
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