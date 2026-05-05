<?php
$connect = mysqli_connect("localhost", "root", "", "university_management_db");

if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM professors WHERE professor_id=".$_POST['id']);
    header("Location: professors.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['full_name'])){
        mysqli_query($connect, "
            UPDATE professors SET 
            full_name='$_POST[full_name]',
            email='$_POST[email]',
            department='$_POST[department]'
            WHERE professor_id=$id
        ");
        header("Location: professors.php");
        exit;
    }

    $p = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM professors WHERE professor_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM professors"));
?>

<form method="post">
<?php if(isset($p)){ ?>
    Name: <input name="full_name" value="<?= $p['full_name'] ?>"><br>
    Email: <input name="email" value="<?= $p['email'] ?>"><br>
    Department: <input name="department" value="<?= $p['department'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Department</th><th>Edit</th><th>Drop</th></tr>

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