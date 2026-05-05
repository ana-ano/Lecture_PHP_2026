<?php

include "db.php";
$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM departments"));

if(isset($_POST['department_name'])){
    $name = $_POST['department_name'];
    $building = $_POST['building'];

    mysqli_query($connect, "INSERT INTO departments 
    (department_name, building)
    VALUES ('$name','$building')");

    header("location: departments.php");
}
?>
<link rel="stylesheet" href="style.css">


<form method="post">
Department <input name="department_name"><br>
Building <input name="building"><br>
<button>Add</button>
</form>