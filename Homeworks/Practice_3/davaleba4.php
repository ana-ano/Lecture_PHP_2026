<?php
session_start();

if (!isset($_SESSION["num1"])) {
    $_SESSION["num1"] = rand(10, 99);
    $_SESSION["num2"] = rand(10, 99);
    $_SESSION["op"] = rand(0,1) ? '+' : '-';
}

$num1 = $_SESSION["num1"];
$num2 = $_SESSION["num2"];
$op = $_SESSION["op"];

$correct = ($op == '+') ? $num1 + $num2 : $num1 - $num2;

if (isset($_POST["answer"])) {
    if ($_POST["answer"] == $correct) {
        echo "სწორია!";
    } else {
        echo "არასწორია!";
    }
    session_destroy();
}
?>

<form method="post">
<?php echo "$num1 $op $num2 = "; ?>
<input type="number" name="answer">
<input type="submit">
</form>