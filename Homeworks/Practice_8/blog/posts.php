<?php
$connect = mysqli_connect("localhost", "root", "", "blog_db");

if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM posts WHERE post_id=".$_POST['id']);
    header("Location: posts.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['title'])){
        mysqli_query($connect, "UPDATE posts 
        SET title='$_POST[title]', content='$_POST[content]'
        WHERE post_id=$id");

        header("Location: posts.php");
        exit;
    }

    $p = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM posts WHERE post_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM posts"));
?>

<form method="post">
<?php if(isset($p)){ ?>
    Title: <input name="title" value="<?= $p['title'] ?>"><br>
    Content: <input name="content" value="<?= $p['content'] ?>"><br>
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Title</th><th>Content</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $p){ ?>
<tr>
    <td><?= $p[0] ?></td>
    <td><?= $p[1] ?></td>
    <td><?= $p[2] ?></td>
    <td><a href="?id=<?= $p[0] ?>">edit</a></td>
    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?= $p[0] ?>">
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