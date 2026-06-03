<!DOCTYPE html>
<html>
<head>
<title>მომხმარებლები</title>
<link rel="stylesheet" href="public/css/main.css">
<link rel="stylesheet" href="public/css/admin.css">
</head>
<body>

<h1>⚙️ Admin Panel</h1>
<div class="nav">
    <a href="index.php?page=admin">🎬 ფილმები</a>
    <a href="index.php?page=admin&action=comments">💬 კომენტარები</a>
    <a href="index.php?page=admin&action=users">👤 მომხმარებლები</a>
    <a href="index.php">🏠 მთავარი</a>
</div>

<h2>👤 მომხმარებლები</h2>
<table>
    <tr>
        <th>ID</th>
        <th>სახელი</th>
        <th>მეილი</th>
        <th>როლი</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user['id'] ?></td>
        <td><?= htmlspecialchars($user['username']) ?></td>
        <td><?= htmlspecialchars($user['email']) ?></td>
        <td><?= $user['role'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>