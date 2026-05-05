<?php
$connect = mysqli_connect("localhost", "root", "", "university_management_db");

if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM courses WHERE course_id=".$_POST['id']);
    header("Location: courses.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['course_name'])){
        mysqli_query($connect, "
            UPDATE courses SET 
            course_name='$_POST[course_name]',
            credits='$_POST[credits]'
            WHERE course_id=$id
        ");
        header("Location: courses.php");
        exit;
    }

    $c = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM courses WHERE course_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM courses"));
?>

<form method="post">
<?php if(isset($c)){ ?>
    Name: <input name="course_name" value="<?= $c['course_name'] ?>"><br>
    Credits: <input name="credits" value="<?= $c['credits'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Name</th><th>Credits</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $c){ ?>
<tr>
<td><?= $c[0] ?></td>
<td><?= $c[1] ?></td>
<td><?= $c[2] ?></td>

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
    <a href="students.php">Students</a> |
    <a href="professors.php">Professors</a> |
    <a href="departments.php">Departments</a> |
    <a href="courses.php">Courses</a> |
    <a href="enrollments.php">Enrollments</a>
</div>