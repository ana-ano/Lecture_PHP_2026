<?php
$connect = mysqli_connect("localhost", "root", "", "bank_2026_2");

$result = mysqli_query($connect, "SELECT * FROM users");
$data = mysqli_fetch_all($result);

if(isset($_POST['email']) && !empty($_POST['email'])){
    $role_id = $_POST['role_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];

    mysqli_query($connect, "INSERT INTO users 
    (role_id, email, password, name, lastname)
    VALUES ('$role_id','$email','$password','$name','$lastname')");

    header("location: users.php");
}
?>
 
<link rel="stylesheet" href="style.css">

<nav>
    <a href="roles.php">Roles</a>
    <a href="users.php">Users</a>
    <a href="accounts.php">Accounts</a>
    <a href="cards.php">Cards</a>
    <a href="transactions.php">Transactions</a>
</nav>

<form method="post">
Role ID - <input type="number" name="role_id"><br>
Email - <input type="text" name="email"><br>
Password - <input type="text" name="password"><br>
Name - <input type="text" name="name"><br>
Lastname - <input type="text" name="lastname"><br>
<button>Insert</button>
</form>

<table border="1">
<tr>
<th>ID</th><th>Role</th><th>Email</th><th>Password</th><th>Name</th><th>Lastname</th>
</tr>

<?php foreach($data as $row){ ?>
<tr>
<td><?= $row[0] ?></td>
<td><?= $row[1] ?></td>
<td><?= $row[2] ?></td>
<td><?= $row[3] ?></td>
<td><?= $row[4] ?></td>
<td><?= $row[5] ?></td>
</tr>
<?php } ?>
</table>