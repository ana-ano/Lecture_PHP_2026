<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Users</title>
</head>
<body>
    <h1>მომხმარებლების  სია</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?> — <?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>