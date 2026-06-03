<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>შესვლა</title>
<link rel="stylesheet" href="public/css/main.css">
<link rel="stylesheet" href="public/css/auth.css">
</head>
<body>

<div class="auth-container">
    <div class="auth-box">
        <div class="logo">MOVIE<span>SITE</span></div>
        <h2>კეთილი იყოს შენი მობრძანება</h2>

        <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>

        <form method="POST">
            <input type="email" name="email" placeholder="მეილი" required>
            <input type="password" name="password" placeholder="პაროლი" required>
            <button type="submit">შესვლა</button>
        </form>

        <div class="switch">
            არ გაქვს ანგარიში? <a href="index.php?page=register">რეგისტრაცია</a>
        </div>
    </div>
</div>

</body>
</html>