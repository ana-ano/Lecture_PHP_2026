<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>მასივის ელემენტების შედარება</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>რიცხვითი მასივი</h1>
    <p>მოცემულია 12 ელემენტიანი მასივი [10;100] შუალედიდან.</p>

    <form method="POST" action="">
        <label for="x">შეიყვანეთ X რიცხვი:</label>
        <input type="number" name="x" id="x" required>
        <button type="submit">შემოწმება</button>
    </form>

    <?php
    // 12 ელემენტიანი მასივი
    $arr = [12, 25, 37, 44, 56, 63, 71, 85, 91, 18, 29, 100];

    echo "<div class='result'>";
    echo "<h3>მასივი:</h3>";
    echo "<p>";
    for ($i = 0; $i < count($arr); $i++) {
        echo $arr[$i] . " ";
    }
    echo "</p>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $x = $_POST["x"];

        $lessCount = 0;
        $greaterCount = 0;

        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] < $x) {
                $lessCount++;
            } elseif ($arr[$i] > $x) {
                $greaterCount++;
            }
        }

        echo "<h3>შედეგი:</h3>";
        echo "<p><strong>X = " . $x . "</strong></p>";
        echo "<p>X-ზე ნაკლები ელემენტების რაოდენობა: " . $lessCount . "</p>";
        echo "<p>X-ზე მეტი ელემენტების რაოდენობა: " . $greaterCount . "</p>";
    }

    echo "</div>";
    ?>
</div>

</body>
</html>