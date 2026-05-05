<?php
include "db.php";

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM enrollments"));

if(isset($_POST['student_id'])){
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $date = $_POST['date'];
    $grade = $_POST['grade'];

    mysqli_query($connect, "INSERT INTO enrollments 
    (student_id, course_id, enrollment_date, grade)
    VALUES ('$student_id','$course_id','$date','$grade')");

    header("location: enrollments.php");
}
?>
<link rel="stylesheet" href="style.css">

<form method="post">
Student ID <input name="student_id"><br>
Course ID <input name="course_id"><br>
Date <input type="date" name="date"><br>
Grade <input name="grade"><br>
<button>Add</button>
</form>