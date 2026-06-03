<!DOCTYPE html>
<html>
<head>
<title>რედაქტირება</title>
<style>
    body { font-family: Arial; background: #111; color: #fff; margin: 0; padding: 20px; }
    h1 { color: #e50914; }
    a { color: #e50914; text-decoration: none; }
    input, textarea, select { width: 100%; padding: 10px; margin-bottom: 15px; background: #222; color: #fff; border: 1px solid #444; border-radius: 5px; box-sizing: border-box; }
    button { padding: 10px 25px; background: #e50914; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 15px; }
    .form-box { max-width: 600px; }
</style>
<link rel="stylesheet" href="public/css/main.css">
<link rel="stylesheet" href="public/css/admin.css">
</head>
<body>

<a href="index.php?page=admin">← უკან</a>
<h1>✏️ ფილმის რედაქტირება</h1>

<div class="form-box">
<form method="POST">
    <input type="text" name="title" value="<?= htmlspecialchars($movie['title']) ?>" required>
    <textarea name="description" rows="4"><?= htmlspecialchars($movie['description']) ?></textarea>
    <input type="text" name="image" value="<?= htmlspecialchars($movie['image']) ?>">
    <input type="number" name="year" value="<?= $movie['year'] ?>">
    <select name="category_id">
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $movie['category_id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="watch_link" value="<?= htmlspecialchars($movie['watch_link']) ?>">
    <button type="submit">შენახვა</button>
</form>
</div>

</body>
</html>