<?php
$connect = mysqli_connect("localhost", "root", "", "blog_db");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM users"));

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = $_POST['date'];

    mysqli_query($connect, "INSERT INTO users (username, email, password_hash, registration_date)
    VALUES ('$username','$email','$password','$date')");

    header("location: users.php");
}
?>

<form method="post">
Username <input name="username"><br>
Email <input name="email"><br>
Password <input name="password"><br>
Date <input type="date" name="date"><br>
<button>Add</button>
</form>

<?php foreach($data as $row){ ?>
<?= $row[0] ?> - <?= $row[1] ?> - <?= $row[2] ?><br>
<?php } ?>