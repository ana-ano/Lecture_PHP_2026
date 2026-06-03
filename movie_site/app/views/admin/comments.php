<!DOCTYPE html>
<html>
<head>
<title>კომენტარები</title>
<style>
    body { font-family: Arial; background: #111; color: #fff; margin: 0; padding: 20px; }
    h1, h2 { color: #e50914; }
    a { color: #e50914; text-decoration: none; }
    .nav { margin-bottom: 20px; }
    .nav a { margin-right: 15px; background: #222; padding: 8px 15px; border-radius: 5px; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 10px; border: 1px solid #333; text-align: left; }
    th { background: #222; color: #e50914; }
    tr:hover { background: #1a1a1a; }
    .btn-delete { padding: 5px 12px; background: #e50914; color: #fff; border-radius: 4px; font-size: 13px; }
</style>
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

<h2>💬 კომენტარები</h2>
<table>
    <tr>
        <th>მომხმარებელი</th>
        <th>ფილმი</th>
        <th>კომენტარი</th>
        <th>თარიღი</th>
        <th>მოქმედება</th>
    </tr>
    <?php foreach ($comments as $c): ?>
    <tr>
        <td><?= htmlspecialchars($c['username']) ?></td>
        <td><?= htmlspecialchars($c['movie_title']) ?></td>
        <td><?= htmlspecialchars($c['comment']) ?></td>
        <td><?= $c['created_at'] ?></td>
        <td>
            <a class="btn-delete" href="index.php?page=admin&action=delete_comment&id=<?= $c['id'] ?>" onclick="return confirm('წაიშალოს?')">🗑️ წაშლა</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>