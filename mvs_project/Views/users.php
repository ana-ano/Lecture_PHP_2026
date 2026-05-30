<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Users</title>
</head>
<body>

    <h1>იუზერების სია</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= $user['name'] ?></li>
        <?php endforeach; ?>
    </ul>

</body>
</html>