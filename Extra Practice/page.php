<?php
$connect = mysqli_connect("localhost", "root", "", "bank_2026_2");

// INSERT (დამატება)
if(isset($_POST['role']) && !empty($_POST['role'])){
    $role = $_POST['role'];
    $insert = "INSERT INTO roles (role) VALUES ('$role')";
    mysqli_query($connect, $insert);
}

// UPDATE (შეცვლა)
if(isset($_POST['update_id']) && isset($_POST['new_role'])){
    $id = $_POST['update_id'];
    $new_role = $_POST['new_role'];
    $update = "UPDATE roles SET role = '$new_role' WHERE id = $id";
    mysqli_query($connect, $update);
}

// DELETE (წაშლა)
if(isset($_POST['delete_id'])){
    $id = $_POST['delete_id'];
    $delete = "DELETE FROM roles WHERE id = $id";
    mysqli_query($connect, $delete);
}

// SELECT (ამოღება)
$select = "SELECT * FROM roles";
$result = mysqli_query($connect, $select);
$data = mysqli_fetch_all($result);


?>
<form method="post">
    <input type="text" name="role" placeholder="Role">
    <button name="insert">Insert</button>
</form>

<hr>

<table border="1">
<tr>
    <th>ID</th>
    <th>Role</th>
    <th>Action</th>
</tr>

<?php foreach($data as $row){ ?>
<tr>
    <td><?= $row[0] ?></td>
    <td><?= $row[1] ?></td>
    <td>
        <!-- UPDATE -->
        <form method="post" style="display:inline;">
            <input type="hidden" name="id" value="<?= $row[0] ?>">
            <input type="text" name="role" placeholder="New role">
            <button name="update">Update</button>
        </form>

        <!-- DELETE -->
        <form method="post" style="display:inline;">
            <input type="hidden" name="id" value="<?= $row[0] ?>">
            <button name="delete">Delete</button>
        </form>
    </td>
</tr>
<?php } ?>
</table>