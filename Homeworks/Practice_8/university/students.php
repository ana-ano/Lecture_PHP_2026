<?php
$connect = mysqli_connect("localhost", "root", "", "university_management_db");

/* DELETE */
if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM students WHERE student_id=".$_POST['id']);
    header("Location: students.php");
    exit;
}

/* UPDATE */
if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['full_name'])){
        mysqli_query($connect, "
            UPDATE students SET 
            full_name='$_POST[full_name]',
            email='$_POST[email]',
            birth_date='$_POST[birth_date]',
            faculty='$_POST[faculty]'
            WHERE student_id=$id
        ");
        header("Location: students.php");
        exit;
    }

    $s = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM students WHERE student_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM students"));
?>

<form method="post">
<?php if(isset($s)){ ?>
    Name: <input name="full_name" value="<?= $s['full_name'] ?>"><br>
    Email: <input name="email" value="<?= $s['email'] ?>"><br>
    Birth: <input name="birth_date" value="<?= $s['birth_date'] ?>"><br>
    Faculty: <input name="faculty" value="<?= $s['faculty'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Birth</th><th>Faculty</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $s){ ?>
<tr>
<td><?= $s[0] ?></td>
<td><?= $s[1] ?></td>
<td><?= $s[2] ?></td>
<td><?= $s[3] ?></td>
<td><?= $s[4] ?></td>

<td><a href="?id=<?= $s[0] ?>">edit</a></td>

<td>
<form method="post">
<input type="hidden" name="id" value="<?= $s[0] ?>">
<button name="drop">drop</button>
</form>
</td>
</tr>
<?php } ?>
</table>
<div style="text-align:center; margin:20px;">
    <a href="students.php">Students</a> |
    <a href="professors.php">Professors</a> |
    <a href="departments.php">Departments</a> |
    <a href="courses.php">Courses</a> |
    <a href="enrollments.php">Enrollments</a>
</div>