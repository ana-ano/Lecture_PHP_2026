<?php
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $score = 0;

    // ტესტური შეკითხვები
    if ($_POST["q1"] == "Paris") {
        $score++;
    }

    if ($_POST["q2"] == "4") {
        $score++;
    }

    if ($_POST["q3"] == "PHP") {
        $score++;
    }

    // ღია შეკითხვები
    if (strtolower(trim($_POST["q4"])) == "html") {
        $score++;
    }

    if (strtolower(trim($_POST["q5"])) == "css") {
        $score++;
    }

    $result = "სწორი პასუხების რაოდენობა: " . $score . "/5";
}
?>

<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>სტუდენტის შემოწმება</title>
</head>
<body>

<h2>სტუდენტის შემოწმების ფორმა</h2>

<form method="post">

    <p>1. საფრანგეთის დედაქალაქია:</p>
    <input type="radio" name="q1" value="London" required> ლონდონი<br>
    <input type="radio" name="q1" value="Berlin"> ბერლინი<br>
    <input type="radio" name="q1" value="Paris"> პარიზი<br>
    <input type="radio" name="q1" value="Rome"> რომი<br><br>

    <p>2. 2 + 2 = ?</p>
    <input type="radio" name="q2" value="3" required> 3<br>
    <input type="radio" name="q2" value="4"> 4<br>
    <input type="radio" name="q2" value="5"> 5<br>
    <input type="radio" name="q2" value="6"> 6<br><br>

    <p>3. რომელი ენა გამოიყენება ვებ-გვერდზე სერვერის მხარეს?</p>
    <input type="radio" name="q3" value="HTML" required> HTML<br>
    <input type="radio" name="q3" value="CSS"> CSS<br>
    <input type="radio" name="q3" value="PHP"> PHP<br>
    <input type="radio" name="q3" value="JavaScript"> JavaScript<br><br>

    <p>4. ჩაწერე ვებ-გვერდის სტრუქტურის ენა:</p>
    <input type="text" name="q4" required><br><br>

    <p>5. ჩაწერე ვებ-გვერდის გასტილვის ენა:</p>
    <textarea name="q5" required></textarea><br><br>

    <input type="submit" value="შემოწმება">
</form>

<?php
if ($result != "") {
    echo "<h3>$result</h3>";
}
?>

</body>
</html>