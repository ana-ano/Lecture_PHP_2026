<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<style>
    body { font-family: Arial; background: #111; color: #fff; margin: 0; padding: 20px; }
    h1, h2 { color: #e50914; }
    a { color: #e50914; text-decoration: none; }
    .nav { margin-bottom: 20px; }
    .nav a { margin-right: 15px; background: #222; padding: 8px 15px; border-radius: 5px; }
    .nav a:hover { background: #e50914; color: #fff; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 10px; border: 1px solid #333; text-align: left; }
    th { background: #222; color: #e50914; }
    tr:hover { background: #1a1a1a; }
    .btn { padding: 5px 12px; border-radius: 4px; text-decoration: none; font-size: 13px; }
    .btn-edit { background: #f0ad4e; color: #000; }
    .btn-delete { background: #e50914; color: #fff; }
    .btn-add { display: inline-block; margin-bottom: 15px; padding: 10px 20px; background: #28a745; color: #fff; border-radius: 5px; }
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

<h2>🎬 ფილმების სია</h2>
<a class="btn-add" href="index.php?page=admin&action=add_movie">+ ფილმის დამატება</a>

<table>
    <tr>
        <th>ID</th>
        <th>სათაური</th>
        <th>კატეგორია</th>
        <th>წელი</th>
        <th>მოქმედება</th>
    </tr>
    <?php foreach ($movies as $movie): ?>
    <tr>
        <td><?= $movie['id'] ?></td>
        <td><?= htmlspecialchars($movie['title']) ?></td>
        <td><?= htmlspecialchars($movie['category_name'] ?? '') ?></td>
        <td><?= $movie['year'] ?></td>
        <td>
            <a class="btn btn-edit" href="index.php?page=admin&action=edit_movie&id=<?= $movie['id'] ?>">✏️ რედაქტირება</a>
            <a class="btn btn-delete" href="index.php?page=admin&action=delete_movie&id=<?= $movie['id'] ?>" onclick="return confirm('დარწმუნებული ხარ?')">🗑️ წაშლა</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>