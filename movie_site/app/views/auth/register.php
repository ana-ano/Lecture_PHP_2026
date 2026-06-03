<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>რეგისტრაცია</title>
<link rel="stylesheet" href="public/css/main.css">
<link rel="stylesheet" href="public/css/auth.css">
</head>
<body>

<div class="auth-container">
    <div class="auth-box">
        <div class="logo">MOVIE<span>SITE</span></div>
        <h2>ახალი ანგარიშის შექმნა</h2>

        <form method="POST">
            <input type="text" name="username" placeholder="სახელი" required>
            <input type="email" name="email" placeholder="მეილი" required>
            <input type="password" name="password" placeholder="პაროლი" required>
            <button type="submit">რეგისტრაცია</button>
        </form>

        <div class="switch">
            უკვე გაქვს ანგარიში? <a href="index.php?page=login">შესვლა</a>
        </div>
    </div>
</div>

</body>
</html>