<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>6x5 მატრიცა</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>6x5 მატრიცა</h1>

<?php
// 6x5 მატრიცის შექმნა
$matrix = [];

for ($i = 0; $i < 6; $i++) {
    for ($j = 0; $j < 5; $j++) {
        $matrix[$i][$j] = $i + $j; // ინდექსების ჯამი
    }
}

// ცხრილის გამოტანა
echo "<table>";
for ($i = 0; $i < 6; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 5; $j++) {
        echo "<td>" . $matrix[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>

</div>

</body>
</html>