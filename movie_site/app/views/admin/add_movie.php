<!DOCTYPE html>
<html>
<head>
<title>ფილმის დამატება</title>
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
<h1>+ ფილმის დამატება</h1>

<div class="form-box">
<form method="POST">
    <input type="text" name="title" placeholder="სათაური" required>
    <textarea name="description" rows="4" placeholder="აღწერა"></textarea>
    <input type="text" name="image" placeholder="სურათის URL">
    <input type="number" name="year" placeholder="წელი">
    <select name="category_id">
        <option value="">კატეგორია</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="watch_link" placeholder="Watch Link (URL)">
    <button type="submit">დამატება</button>
</form>
</div>

</body>
</html>