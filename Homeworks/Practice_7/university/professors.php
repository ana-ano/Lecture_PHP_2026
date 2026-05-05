<?php
include "db.php";

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM professors"));

if(isset($_POST['full_name'])){
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $dep = $_POST['department'];

    mysqli_query($connect, "INSERT INTO professors 
    (full_name, email, department)
    VALUES ('$name','$email','$dep')");

    header("location: professors.php");
}
?>
<link rel="stylesheet" href="style.css">

<form method="post">
Name <input name="full_name"><br>
Email <input name="email"><br>
Department <input name="department"><br>
<button>Add</button>
</form>