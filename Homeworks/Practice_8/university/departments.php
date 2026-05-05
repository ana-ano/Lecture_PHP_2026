<?php
$connect = mysqli_connect("localhost", "root", "", "university_management_db");

if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM departments WHERE department_id=".$_POST['id']);
    header("Location: departments.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['department_name'])){
        mysqli_query($connect, "
            UPDATE departments SET 
            department_name='$_POST[department_name]',
            building='$_POST[building]'
            WHERE department_id=$id
        ");
        header("Location: departments.php");
        exit;
    }

    $d = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM departments WHERE department_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM departments"));
?>

<form method="post">
<?php if(isset($d)){ ?>
    Name: <input name="department_name" value="<?= $d['department_name'] ?>"><br>
    Building: <input name="building" value="<?= $d['building'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Name</th><th>Building</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $d){ ?>
<tr>
<td><?= $d[0] ?></td>
<td><?= $d[1] ?></td>
<td><?= $d[2] ?></td>

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