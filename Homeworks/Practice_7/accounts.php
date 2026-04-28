<?php
$connect = mysqli_connect("localhost", "root", "", "bank_2026_2");

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM accounts"));

if(isset($_POST['user_id'])){
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $balance = $_POST['balance'];

    mysqli_query($connect, "INSERT INTO accounts 
    (user_id, name, number, balance)
    VALUES ('$user_id','$name','$number','$balance')");

    header("location: accounts.php");
}
?>

<form method="post">
User ID - <input type="number" name="user_id"><br>
Name - <input type="text" name="name"><br>
Number - <input type="text" name="number"><br>
Balance - <input type="number" name="balance"><br>
<button>Insert</button>
</form>

<table border="1">
<tr>
<th>ID</th><th>User</th><th>Name</th><th>Number</th><th>Balance</th>
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