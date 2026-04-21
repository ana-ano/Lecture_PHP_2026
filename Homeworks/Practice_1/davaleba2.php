<?php
$grade = "";
$description = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $course = $_POST["course"];
    $semester = $_POST["semester"];
    $subject = $_POST["subject"];
    $score = $_POST["score"];
    $lecturer = $_POST["lecturer"];
    $dean = $_POST["dean"];

    // შეფასების გამოთვლა
    if ($score >= 91) {
        $grade = "A";
        $description = "ფრიადი";
    } elseif ($score >= 81) {
        $grade = "B";
        $description = "ძალიან კარგი";
    } elseif ($score >= 71) {
        $grade = "C";
        $description = "კარგი";
    } elseif ($score >= 61) {
        $grade = "D";
        $description = "დამაკმაყოფილებელი";
    } elseif ($score >= 51) {
        $grade = "E";
        $description = "საკმარისი";
    } elseif ($score >= 41) {
        $grade = "FX";
        $description = "ვერ ჩააბარა";
    } else {
        $grade = "F";
        $description = "ჩაიჭრა";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ნიშნების უწყისი</title>
</head>
<body>

<h2>ნიშნების ფორმა</h2>

<form method="post">
    სახელი: <input type="text" name="name" required><br><br>
    გვარი: <input type="text" name="surname" required><br><br>
    კურსი: <input type="text" name="course" required><br><br>
    სემესტრი: <input type="text" name="semester" required><br><br>
    საგანი: <input type="text" name="subject" required><br><br>
    ქულა: <input type="number" name="score" required><br><br>
    ლექტორი: <input type="text" name="lecturer" required><br><br>
    დეკანი: <input type="text" name="dean" required><br><br>

    <input type="submit" value="გაგზავნა">
</form>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>

<h2>შედეგი</h2>

<table border="1">
    <tr>
        <th>ველი</th>
        <th>მონაცემი</th>
    </tr>
    <tr>
        <td>სტუდენტი</td>
        <td><?php echo $name . " " . $surname; ?></td>
    </tr>
    <tr>
        <td>კურსი</td>
        <td><?php echo $course; ?></td>
    </tr>
    <tr>
        <td>სემესტრი</td>
        <td><?php echo $semester; ?></td>
    </tr>
    <tr>
        <td>საგანი</td>
        <td><?php echo $subject; ?></td>
    </tr>
    <tr>
        <td>ქულა</td>
        <td><?php echo $score; ?></td>
    </tr>
    <tr>
        <td>შეფასება</td>
        <td><?php echo $grade . " - " . $description; ?></td>
    </tr>
    <tr>
        <td>ლექტორი</td>
        <td><?php echo $lecturer; ?></td>
    </tr>
    <tr>
        <td>დეკანი</td>
        <td><?php echo $dean; ?></td>
    </tr>
</table>

<?php } ?>

</body>
</html>