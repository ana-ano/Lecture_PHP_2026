<?php
$connect = mysqli_connect("localhost", "root", "", "bank_2026_2");

/* DELETE */
if(isset($_POST['drop'])){
    mysqli_query($connect, "UPDATE cards SET deleted_at = NOW() WHERE id=".$_POST['id']);
    header("Location: cards.php");
    exit;
}

/* UPDATE */
if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['number'])){
        mysqli_query($connect, "UPDATE cards 
        SET number='$_POST[number]', cvc='$_POST[cvc]', expired_date='$_POST[expired_date]', updated_at=NOW()
        WHERE id=$id");

        header("Location: cards.php");
        exit;
    }

    $card = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM cards WHERE id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM cards WHERE deleted_at IS NULL"));
?>

<form method="post">
<?php if(isset($card)){ ?>
    Number: <input name="number" value="<?= $card['number'] ?>"><br>
    CVC: <input name="cvc" value="<?= $card['cvc'] ?>"><br>
    Date: <input name="expired_date" value="<?= $card['expired_date'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr>
    <th>ID</th><th>Number</th><th>CVC</th><th>Date</th><th>Edit</th><th>Drop</th>
</tr>

<?php foreach($data as $c){ ?>
<tr>
    <td><?= $c[0] ?></td>
    <td><?= $c[3] ?></td>
    <td><?= $c[4] ?></td>
    <td><?= $c[5] ?></td>

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
    <a href="roles.php">Roles</a> |
    <a href="users.php">Users</a> |
    <a href="accounts.php">Accounts</a> |
    <a href="cards.php">Cards</a> |
    <a href="transactions.php">Transactions</a>
</div>