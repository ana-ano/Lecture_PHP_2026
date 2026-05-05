<?php
include "db.php";

$connect = mysqli_connect("localhost", "root", "", "university_management_db");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM students"));

if(isset($_POST['full_name'])){
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $birth = $_POST['birth_date'];
    $faculty = $_POST['faculty'];

    mysqli_query($connect, "INSERT INTO students 
    (full_name, email, birth_date, faculty)
    VALUES ('$name','$email','$birth','$faculty')");

    header("location: students.php");
}
?>
<link rel="stylesheet" href="style.css">

<form method="post">
Name <input name="full_name"><br>
Email <input name="email"><br>
Birth <input type="date" name="birth_date"><br>
Faculty <input name="faculty"><br>
<button>Add</button>
</form>

<?php foreach($data as $row){ ?>
<?= $row[0] ?> - <?= $row[1] ?> - <?= $row[2] ?><br>
<?php } ?>