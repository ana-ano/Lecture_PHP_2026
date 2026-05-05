<?php
$connect = mysqli_connect("localhost", "root", "", "blog_db");

if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM comments WHERE comment_id=".$_POST['id']);
    header("Location: comments.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['comment_text'])){
        mysqli_query($connect, "UPDATE comments 
        SET comment_text='$_POST[comment_text]'
        WHERE comment_id=$id");

        header("Location: comments.php");
        exit;
    }

    $c = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM comments WHERE comment_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM comments"));
?>

<form method="post">
<?php if(isset($c)){ ?>
    Comment: <input name="comment_text" value="<?= $c['comment_text'] ?>">
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Comment</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $c){ ?>
<tr>
    <td><?= $c[0] ?></td>
    <td><?= $c[3] ?></td>
    <td><a href="?id=<?= $c[0] ?>">edit</a></td>
    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?= $c[0] ?>">
            <button name="drop">drop</button>
        </form>
    </td>
</tr>
<?php } ?>
</table>
<div style="text-align:center; margin:20px;">
    <a href="categories.php">Categories</a> |
    <a href="posts.php">Posts</a> |
    <a href="comments.php">Comments</a> |
    <a href="tags.php">Tags</a> |
    <a href="users.php">Users</a>
</div>