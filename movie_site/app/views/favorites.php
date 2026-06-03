<!DOCTYPE html>
<html>
<head>
<title>ფავორიტები</title>
<style>
    body { font-family: Arial; background: #111; color: #fff; margin: 0; padding: 20px; }
    h1 { color: #e50914; }
    a { color: #e50914; text-decoration: none; }
    .movies-grid { display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px; }
    .movie-card { background: #222; width: 180px; border-radius: 8px; overflow: hidden; }
    .movie-card img { width: 100%; height: 250px; object-fit: cover; }
    .movie-card .info { padding: 10px; }
    .movie-card h3 { margin: 0 0 5px; font-size: 14px; }
    .movie-card a { display: block; margin-top: 8px; color: #e50914; font-size: 13px; }
</style>
</head>
<body>

<a href="index.php">← უკან</a>
<h1>❤️ ჩემი ფავორიტები</h1>

<div class="movies-grid">
<?php if (!empty($movies)): ?>
    <?php foreach ($movies as $movie): ?>
        <div class="movie-card">
            <img src="<?= !empty($movie['image']) ? htmlspecialchars($movie['image']) : 'https://via.placeholder.com/180x250?text=No+Image' ?>" alt="">
            <div class="info">
                <h3><?= htmlspecialchars($movie['title']) ?></h3>
                <a href="index.php?page=movie&id=<?= $movie['id'] ?>">დეტალები →</a>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>ფავორიტები არ გაქვს დამატებული</p>
<?php endif; ?>
</div>

</body>
</html>