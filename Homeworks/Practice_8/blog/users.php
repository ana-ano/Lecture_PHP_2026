<?php
$connect = mysqli_connect("localhost", "root", "", "blog_db");

if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM users WHERE user_id=".$_POST['id']);
    header("Location: users.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['username'])){
        mysqli_query($connect, "UPDATE users 
        SET username='$_POST[username]', email='$_POST[email]'
        WHERE user_id=$id");

        header("Location: users.php");
        exit;
    }

    $u = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM users WHERE user_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM users"));
?>

<form method="post">
<?php if(isset($u)){ ?>
    Username: <input name="username" value="<?= $u['username'] ?>"><br>
    Email: <input name="email" value="<?= $u['email'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Username</th><th>Email</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $u){ ?>
<tr>
    <td><?= $u[0] ?></td>
    <td><?= $u[1] ?></td>
    <td><?= $u[2] ?></td>
    <td><a href="?id=<?= $u[0] ?>">edit</a></td>
    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?= $u[0] ?>">
            <button name="drop">drop</button>
        </form>
    </td>
</tr>
<?php } ?>
</table>~
<div style="text-align:center; margin:20px;">
    <a href="categories.php">Categories</a> |
    <a href="posts.php">Posts</a> |
    <a href="comments.php">Comments</a> |
    <a href="tags.php">Tags</a> |
    <a href="users.php">Users</a>
</div>