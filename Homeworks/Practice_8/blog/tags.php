<?php
$connect = mysqli_connect("localhost", "root", "", "blog_db");

if(isset($_POST['drop'])){
    mysqli_query($connect, "DELETE FROM tags WHERE tag_id=".$_POST['id']);
    header("Location: tags.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['tag_name'])){
        mysqli_query($connect, "UPDATE tags 
        SET tag_name='$_POST[tag_name]'
        WHERE tag_id=$id");

        header("Location: tags.php");
        exit;
    }

    $t = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM tags WHERE tag_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM tags"));
?>

<form method="post">
<?php if(isset($t)){ ?>
    Tag: <input name="tag_name" value="<?= $t['tag_name'] ?>">
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Tag</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $t){ ?>
<tr>
    <td><?= $t[0] ?></td>
    <td><?= $t[1] ?></td>
    <td><a href="?id=<?= $t[0] ?>">edit</a></td>
    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?= $t[0] ?>">
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