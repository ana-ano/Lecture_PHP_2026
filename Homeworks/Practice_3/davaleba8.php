<?php
// ფუნქცია მატრიცის შესაქმნელად
function createMatrix($m, $n, $a, $b) {
    $matrix = [];

    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $matrix[$i][$j] = rand($a, $b);
        }
    }

    return $matrix;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Matrix Generator</title>
</head>
<body>

<h2>MxN მატრიცის გენერაცია</h2>

<form method="post">
    M: <input type="number" name="m" required><br><br>
    N: <input type="number" name="n" required><br><br>
    a: <input type="number" name="a" required><br><br>
    b: <input type="number" name="b" required><br><br>

    <input type="submit" value="Generate">
</form>

<br>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $m = intval($_POST["m"]);
    $n = intval($_POST["n"]);
    $a = intval($_POST["a"]);
    $b = intval($_POST["b"]);

    // ვალიდაცია
    if ($m > 0 && $n > 0 && $a <= $b) {

        $matrix = createMatrix($m, $n, $a, $b);

        echo "<table border='1' cellpadding='5'>";

        for ($i = 0; $i < $m; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $n; $j++) {
                echo "<td>" . $matrix[$i][$j] . "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";

    } else {
        echo "<p style='color:red;'>არასწორი მონაცემები!</p>";
    }
}
?>

</body>
</html>