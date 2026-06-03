<!DOCTYPE html>
<html>
<head>
<title>Movie Site</title>
<link rel="stylesheet" href="public/css/main.css">
<link rel="stylesheet" href="public/css/home.css">
</head>
<body>

<h1>🎬 Movie Site</h1>

<div class="nav">
    <?php if (isset($_SESSION['username'])): ?>
        <span>გამარჯობა, <?= $_SESSION['username'] ?></span>
        <a href="index.php?page=favorites">❤️ ფავორიტები</a>
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <a href="index.php?page=admin">⚙️ Admin</a>
        <?php endif; ?>
        <a href="index.php?page=logout">გამოსვლა</a>
    <?php else: ?>
        <a href="index.php?page=login">შესვლა</a>
        <a href="index.php?page=register">რეგისტრაცია</a>
    <?php endif; ?>
</div>

<form class="search-form" method="GET" action="index.php">
    <input type="hidden" name="page" value="movies">
    <input type="hidden" name="action" value="search">
    <input type="text" name="keyword" placeholder="🔍 ფილმის ძებნა..." value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>">

    <select name="category" onchange="this.form.submit()">
        <option value="0">ყველა კატეგორია</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>" <?= ($category_id ?? 0) == $cat['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">ძებნა</button>
</form>

<div class="movies-grid">
<?php if (!empty($movies)): ?>
    <?php foreach ($movies as $movie): ?>
        <div class="movie-card">
            <img src="<?= !empty($movie['image']) ? htmlspecialchars($movie['image']) : 'https://via.placeholder.com/180x250?text=No+Image' ?>" alt="<?= htmlspecialchars($movie['title']) ?>">
            <div class="info">
                <h3><?= htmlspecialchars($movie['title']) ?></h3>
                <p><?= htmlspecialchars($movie['category_name'] ?? '') ?> | <?= $movie['year'] ?></p>
                <a href="index.php?page=movie&id=<?= $movie['id'] ?>">დეტალები →</a>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>ფილმები ვერ მოიძებნა</p>
<?php endif; ?>
</div>

</body>
</html>