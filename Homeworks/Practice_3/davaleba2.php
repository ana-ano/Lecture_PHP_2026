<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $m = intval($_POST["m"]);
    $n = intval($_POST["n"]);
    $a = intval($_POST["a"]);
    $b = intval($_POST["b"]);

    if ($m > 0 && $n > 0 && $a <= $b) {
        echo "<table border='1'>";
        for ($i = 0; $i < $m; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $n; $j++) {
                echo "<td>" . rand($a, $b) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "არასწორი მონაცემები!";
    }
}
?>

<form method="post">
M: <input type="number" name="m"><br>
N: <input type="number" name="n"><br>
a: <input type="number" name="a"><br>
b: <input type="number" name="b"><br>
<input type="submit">
</form>