<?php
    $connect = mysqli_connect("localhost", "root", "", "bank_2026_2");
    // echo "<pre>";
    // print_r($connect);
    // echo "</pre>";

    $select_roles = "SELECT * FROM roles";
    // echo $select_roles;

    $result_roles = mysqli_query($connect, $select_roles);
    // echo "<pre>";
    // print_r($result_roles);
    // echo "</pre>";

    $data_roles = mysqli_fetch_all($result_roles);
    // echo "<pre>";
    // print_r($data_roles);
    // echo "</pre>";

    if(isset($_POST['role']) && !empty($_POST['role'])){
        $role = $_POST['role'];
        $insert_role = "INSERT INTO roles (role) VALUES ('$role')";
        mysqli_query($connect, $insert_role);
        header("location: db_test.php");
    }
?>
<style>
    table {
        border: solid 1px black;
        border-collapse: collapse;
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
<form action="" method="post">
    Role - <input type="text" name="role">
    <br><br>
    <button>Insert Role</button>
</form>
<hr><hr>
<table>
    <tr>
        <th>ID</th>
        <th>Role</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th>Deleted_at</th>
    </tr>
    <?php 
        foreach($data_roles as $row){
    ?>
    <tr>
        <td><?= $row[0]?></td>
        <td><?= $row[1]?></td>
        <td><?= $row[2]?></td>
        <td><?= $row[3]?></td>
        <td><?= $row[4]?></td>
    </tr>
    <?php
        }
    ?>
</table>