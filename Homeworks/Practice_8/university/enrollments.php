<?php
$connect = mysqli_connect("localhost", "root", "", "university_management_db");

if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM enrollments WHERE enrollment_id=".$_POST['id']);
    header("Location: enrollments.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['grade'])){
        mysqli_query($connect, "
            UPDATE enrollments SET grade='$_POST[grade]'
            WHERE enrollment_id=$id
        ");
        header("Location: enrollments.php");
        exit;
    }

    $e = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM enrollments WHERE enrollment_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM enrollments"));
?>

<form method="post">
<?php if(isset($e)){ ?>
    Grade: <input name="grade" value="<?= $e['grade'] ?>">
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Student</th><th>Course</th><th>Date</th><th>Grade</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $e){ ?>
<tr>
<td><?= $e[0] ?></td>
<td><?= $e[1] ?></td>
<td><?= $e[2] ?></td>
<td><?= $e[3] ?></td>
<td><?= $e[4] ?></td>

<td><a href="?id=<?= $e[0] ?>">edit</a></td>

<td>
<form method="post">
<input type="hidden" name="id" value="<?= $e[0] ?>">
<button name="drop">drop</button>
</form>
</td>
</tr>
<?php } ?>
</table>