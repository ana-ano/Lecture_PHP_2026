<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>4x4 მატრიცა</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>4x4 მატრიცა</h1>

    <form method="POST">
        <input type="number" name="x" placeholder="შეიყვანე X" required>
        <button type="submit">გამოთვლა</button>
    </form>

<?php
// 4x4 მატრიცა
$matrix = [
    [12, 45, 67, 89],
    [23, 56, 78, 90],
    [34, 65, 87, 100],
    [11, 22, 33, 44]
];

// =====================
// მატრიცის გამოტანა
echo "<h3>მატრიცა:</h3><table>";
foreach ($matrix as $row) {
    echo "<tr>";
    foreach ($row as $num) {
        echo "<td>$num</td>";
    }
    echo "</tr>";
}
echo "</table>";

// =====================
// მთავარი დიაგონალის ზემოთ
echo "<h3>დიაგონალის ზემოთ ელემენტები:</h3><table>";
for ($i = 0; $i < 4; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 4; $j++) {
        if ($j > $i) {
            echo "<td>".$matrix[$i][$j]."</td>";
        } else {
            echo "<td></td>";
        }
    }
    echo "</tr>";
}
echo "</table>";

// =====================
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $x = $_POST["x"];

    $sum = 0;
    $product = 1;
    $count = 0;
    $max = $matrix[0][0];

    echo "<h3>X-ის ჯერადი რიცხვები:</h3><p>";

    foreach ($matrix as $row) {
        foreach ($row as $num) {

            // ჯამი
            $sum += $num;

            // ნამრავლი
            $product *= $num;

            // ელემენტების რაოდენობა
            $count++;

            // მაქსიმუმი
            if ($num > $max) {
                $max = $num;
            }

            // X-ის ჯერადი
            if ($num % $x == 0) {
                echo $num . " ";
            }
        }
    }

    echo "</p>";

    // საშუალო
    $average = $sum / $count;

    echo "<h3>სტატისტიკა:</h3>";
    echo "<p>ჯამი: $sum</p>";
    echo "<p>ნამრავლი: $product</p>";
    echo "<p>საშუალო: $average</p>";
    echo "<p>მაქსიმუმი (განი): $max</p>";

    // =====================
    // ციფრთა ჯამი
    echo "<h3>ციფრთა ჯამები:</h3><table>";

    foreach ($matrix as $row) {
        echo "<tr>";
        foreach ($row as $num) {

            $digitSum = 0;
            $temp = $num;

            while ($temp > 0) {
                $digitSum += $temp % 10;
                $temp = intdiv($temp, 10);
            }

            echo "<td>$digitSum</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}
?>

</div>

</body>
</html>