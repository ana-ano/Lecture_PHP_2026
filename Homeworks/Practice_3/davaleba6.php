<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $m = $_POST["m"];
    $n = $_POST["n"];
    $a = $_POST["a"];
    $b = $_POST["b"];

    $matrix = [];
    $colSum = array_fill(0, $n, 0);

    echo "<table border='1'>";

    for ($i = 0; $i < $m; $i++) {
        $rowSum = 0;
        echo "<tr>";

        for ($j = 0; $j < $n; $j++) {
            $val = rand($a, $b);
            $matrix[$i][$j] = $val;
            $rowSum += $val;
            $colSum[$j] += $val;

            echo "<td>$val</td>";
        }

        echo "<td><b>$rowSum</b></td>";
        echo "</tr>";
    }

    echo "<tr>";
    foreach ($colSum as $sum) {
        echo "<td><b>$sum</b></td>";
    }
    echo "</tr>";

    echo "</table>";
}
?>

<form method="post">
M: <input name="m"><br>
N: <input name="n"><br>
a: <input name="a"><br>
b: <input name="b"><br>
<input type="submit">
</form>