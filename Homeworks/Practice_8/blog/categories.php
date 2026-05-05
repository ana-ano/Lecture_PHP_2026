<?php
$connect = mysqli_connect("localhost", "root", "", "blog_db");

if(isset($_POST['drop'])){
    $id = $_POST['id'];
    mysqli_query($connect, "DELETE FROM categories WHERE category_id=$id");
    header("Location: categories.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_POST['category_name'])){
        $name = $_POST['category_name'];

        mysqli_query($connect, "UPDATE categories 
        SET category_name='$name' 
        WHERE category_id=$id");

        header("Location: categories.php");
        exit;
    }

    $cat = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM categories WHERE category_id=$id"));
}

$data = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM categories"));
?>

<form method="post">
<?php if(isset($cat)){ ?>
    Name: <input name="category_name" value="<?= $cat['category_name'] ?>">
    <button>Update</button>
<?php } ?>
</form>

<table border="1">
<tr><th>ID</th><th>Name</th><th>Edit</th><th>Drop</th></tr>

<?php foreach($data as $c){ ?>
<tr>
    <td><?= $c[0] ?></td>
    <td><?= $c[1] ?></td>
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