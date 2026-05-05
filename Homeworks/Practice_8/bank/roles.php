<?php
$connect = mysqli_connect("localhost", "root", "", "bank_2026_2");


if(isset($_POST['drop'])){
    $id = $_POST['id'];

    $delete_role = "UPDATE roles SET deleted_at = NOW() WHERE id = $id";
    mysqli_query($connect, $delete_role);

    header("Location: db_test_2.php");
    exit;
}


if(isset($_GET['id'])){

    $id = $_GET['id'];

    if(isset($_POST['role'])){
        $role = $_POST['role'];

        $update_role = "UPDATE roles SET role = '$role', updated_at = NOW() WHERE id = $id";
        mysqli_query($connect, $update_role);

        header("Location: db_test_2.php");
        exit;
    }

    $select_role_by_id = "SELECT * FROM roles WHERE id=$id";
    $result_role_by_id = mysqli_query($connect, $select_role_by_id);
    $row_role_by_id = mysqli_fetch_assoc($result_role_by_id);
}
?>

<style>
table {
    border: solid 1px black;
    border-collapse: collapse;
    margin: auto;
}

table th, td{
    border: solid 1px black;
    padding: 8px;
}

form{
    width: 300px;
    padding: 10px;
    border: solid 1px black;
    margin: auto;
}
</style>


<?php if(isset($row_role_by_id)){ ?>
    <form method="post">
        Role -
        <input type="text" name="role" value="<?= $row_role_by_id['role'] ?>">
        <br><br>
        <button>Update Role</button>
    </form>
<?php } ?>

<hr><hr>

<hr><hr>

<?php

$select_roles = "SELECT * FROM roles WHERE deleted_at IS NULL";
$result_roles = mysqli_query($connect, $select_roles);
$data_roles = mysqli_fetch_all($result_roles);
?>

<table>
    <tr>
        <th>ID</th>
        <th>Role</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th>Deleted_at</th>
        <th>Edit</th>
        <th>Drop</th>
    </tr>

    <?php foreach($data_roles as $row){ ?>
    <tr>
        <td><?= $row[0] ?></td>
        <td><?= $row[1] ?></td>
        <td><?= $row[2] ?></td>
        <td><?= $row[3] ?></td>
        <td><?= $row[4] ?></td>

        <td>
            <a href="?id=<?= $row[0] ?>">edit</a>
        </td>

        <td>
            <form method="post">
                <input type="hidden" name="id" value="<?= $row[0] ?>">
                <button name="drop">drop</button>
            </form>
        </td>
    </tr>
    <?php } ?>

</table>

<hr><hr>
<div style="text-align:center; margin:20px;">
    <a href="roles.php">Roles</a> |
    <a href="users.php">Users</a> |
    <a href="accounts.php">Accounts</a> |
    <a href="cards.php">Cards</a> |
    <a href="transactions.php">Transactions</a>
</div>