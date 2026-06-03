<!DOCTYPE html>
<html>
<head>
<title><?= htmlspecialchars($movie['title']) ?></title>
<style>
    body { font-family: Arial; background: #111; color: #fff; margin: 0; padding: 20px; }
    h1, h2, h3 { color: #e50914; }
    a { color: #e50914; text-decoration: none; }
    .movie-detail { display: flex; gap: 30px; margin-top: 20px; }
    .movie-detail img { width: 250px; height: 370px; object-fit: cover; border-radius: 8px; }
    .watch-btn { display: inline-block; margin-top: 15px; padding: 10px 20px; background: #e50914; color: #fff; border-radius: 5px; }
    .fav-btn { display: inline-block; margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border-radius: 5px; text-decoration: none; }
    .stars a { font-size: 28px; text-decoration: none; }
    .stars a:hover { color: gold; }
    .comment-box { margin-top: 30px; }
    .comment-box textarea { width: 100%; padding: 10px; background: #222; color: #fff; border: 1px solid #444; border-radius: 5px; }
    .comment-box button { margin-top: 10px; padding: 8px 20px; background: #e50914; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
    .comment { background: #222; padding: 10px; margin-top: 10px; border-radius: 5px; }
    .comment strong { color: #e50914; }
    .comment small { color: #aaa; }
</style>
<link rel="stylesheet" href="public/css/main.css">
<link rel="stylesheet" href="public/css/home.css">
</head>
<body>

<a href="index.php">← უკან</a>

<div class="movie-detail">
    <img src="<?= !empty($movie['image']) ? htmlspecialchars($movie['image']) : 'https://via.placeholder.com/250x370?text=No+Image' ?>" alt="">
    <div class="movie-info">
        <h1><?= htmlspecialchars($movie['title']) ?></h1>
        <p>📅 წელი: <?= $movie['year'] ?></p>
        <p>🎭 კატეგორია: <?= htmlspecialchars($movie['category_name'] ?? '') ?></p>
        <p><?= nl2br(htmlspecialchars($movie['description'])) ?></p>

        <?php if (!empty($movie['watch_link'])): ?>
            <a class="watch-btn" href="<?= htmlspecialchars($movie['watch_link']) ?>" target="_blank">🎬 Watch Movie</a>
        <?php endif; ?>

        <?php if (isset($_SESSION['user_id'])): ?>
            <br>
            <a class="fav-btn" href="index.php?page=movies&action=favorite&movie_id=<?= $movie['id'] ?>">
                <?= $isFavorite ? '❤️ ფავორიტებიდან წაშლა' : '🤍 ფავორიტებში დამატება' ?>
            </a>
        <?php endif; ?>

        <h3>⭐ რეიტინგი: <?= $avgRating ?> / 5</h3>

        <?php if (isset($_SESSION['user_id'])): ?>
            <form method="POST" action="index.php?page=movies&action=rate">
                <input type="hidden" name="movie_id" value="<?= $movie['id'] ?>">
                <div class="stars">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <button type="submit" name="rating" value="<?= $i ?>" style="background:none;border:none;cursor:pointer;font-size:28px;color:<?= $i <= $userRating ? 'gold' : '#aaa' ?>">★</button>
                    <?php endfor; ?>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>

<div class="comment-box">
    <h2>💬 კომენტარები</h2>

    <?php if (isset($_SESSION['user_id'])): ?>
        <form method="POST" action="index.php?page=movies&action=comment">
            <input type="hidden" name="movie_id" value="<?= $movie['id'] ?>">
            <textarea name="comment" rows="3" placeholder="დაწერე კომენტარი..." required></textarea>
            <button type="submit">გაგზავნა</button>
        </form>
    <?php else: ?>
        <p><a href="index.php?page=login">შედი</a> კომენტარის დასაწერად</p>
    <?php endif; ?>

    <?php if (!empty($comments)): ?>
        <?php foreach ($comments as $c): ?>
            <div class="comment">
                <strong><?= htmlspecialchars($c['username']) ?></strong>
                <small> — <?= $c['created_at'] ?></small>
                <p><?= nl2br(htmlspecialchars($c['comment'])) ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>კომენტარები არ არის</p>
    <?php endif; ?>
</div>

</body>
</html>