<?php

include "db.php";
$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM courses"));

if(isset($_POST['course_name'])){
    $name = $_POST['course_name'];
    $credits = $_POST['credits'];
    $professor_id = $_POST['professor_id'];
    $department_id = $_POST['department_id'];

    mysqli_query($connect, "INSERT INTO courses 
    (course_name, credits, professor_id, department_id)
    VALUES ('$name','$credits','$professor_id','$department_id')");

    header("location: courses.php");
}
?>
<link rel="stylesheet" href="style.css">

<form method="post">
Course <input name="course_name"><br>
Credits <input name="credits"><br>
Professor ID <input name="professor_id"><br>
Department ID <input name="department_id"><br>
<button>Add</button>
</form>