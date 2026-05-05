<?php
$connect = mysqli_connect("localhost", "root", "", "bank_2026_2");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM transactions"));

if(isset($_POST['amount'])){
    $sender = $_POST['sender'];
    $receiver = $_POST['receiver'];
    $amount = $_POST['amount'];
    $desc = $_POST['desc'];

    mysqli_query($connect, "INSERT INTO transactions 
    (account_sender_id, account_reciver_id, amount, description)
    VALUES ('$sender','$receiver','$amount','$desc')");

    header("location: transactions.php");
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
Sender ID - <input type="number" name="sender"><br>
Receiver ID - <input type="number" name="receiver"><br>
Amount - <input type="number" name="amount"><br>
Description - <input type="text" name="desc"><br>
<button>Insert</button>
</form>

<table border="1">
<tr>
<th>ID</th><th>Sender</th><th>Receiver</th><th>Amount</th><th>Description</th>
</tr>

<?php foreach($data as $row){ ?>
<tr>
<td><?= $row[0] ?></td>
<td><?= $row[1] ?></td>
<td><?= $row[2] ?></td>
<td><?= $row[3] ?></td>
<td><?= $row[4] ?></td>
</tr>
<?php } ?>
</table>