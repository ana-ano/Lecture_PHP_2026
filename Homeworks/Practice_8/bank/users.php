<?php
$connect = mysqli_connect("localhost", "root", "", "bank_2026_2");

/* DELETE (soft) */
if(isset($_POST['drop'])){
    $id = $_POST['id'];
    mysqli_query($connect, "UPDATE users SET deleted_at = NOW() WHERE id=$id");
    header("Location: users.php");
    exit;
}

/* UPDATE */
if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];

        mysqli_query($connect, "UPDATE users 
        SET email='$email', name='$name', lastname='$lastname', updated_at=NOW()
        WHERE id=$id");

        header("Location: users.php");
        exit;
    }

    $user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM users WHERE id=$id"));
}

$users = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM users WHERE deleted_at IS NULL"));
?>

<form method="post">
<?php if(isset($user)){ ?>
    Email: <input name="email" value="<?= $user['email'] ?>"><br>
    Name: <input name="name" value="<?= $user['name'] ?>"><br>
    Lastname: <input name="lastname" value="<?= $user['lastname'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr>
    <th>ID</th><th>Email</th><th>Name</th><th>Lastname</th><th>Edit</th><th>Drop</th>
</tr>

<?php foreach($users as $u){ ?>
<tr>
    <td><?= $u[0] ?></td>
    <td><?= $u[2] ?></td>
    <td><?= $u[4] ?></td>
    <td><?= $u[5] ?></td>

    <td><a href="?id=<?= $u[0] ?>">edit</a></td>

    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?= $u[0] ?>">
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