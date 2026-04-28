<?php
$connect = mysqli_connect("localhost", "root", "", "bank_2026_2");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM cards"));

if(isset($_POST['number'])){
    $user_id = $_POST['user_id'];
    $account_id = $_POST['account_id'];
    $number = $_POST['number'];
    $date = $_POST['date'];
    $cvc = $_POST['cvc'];

    mysqli_query($connect, "INSERT INTO cards 
    (user_id, account_id, number, expired_date, cvc)
    VALUES ('$user_id','$account_id','$number','$date','$cvc')");

    header("location: cards.php");
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
User ID - <input type="number" name="user_id"><br>
Account ID - <input type="number" name="account_id"><br>
Number - <input type="text" name="number"><br>
Expire Date - <input type="date" name="date"><br>
CVC - <input type="text" name="cvc"><br>
<button>Insert</button>
</form>

<table border="1">
<tr>
<th>ID</th><th>User</th><th>Account</th><th>Number</th><th>Date</th><th>CVC</th>
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