<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>სახელფასო უწყისი</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>სახელფასო უწყისის ფორმა</h2>

<form method="GET" action="">
    <label>სახელი:</label>
    <input type="text" name="name" required>

    <label>გვარი:</label>
    <input type="text" name="lastname" required>

    <label>თანამდებობა:</label>
    <input type="text" name="position" required>

    <label>ხელფასი:</label>
    <input type="number" name="salary" required>

    <label>გადასახადის ტიპი:</label>
    <input type="radio" name="tax_type" value="fixed" required> 20%
    <input type="radio" name="tax_type" value="custom"> სხვა

    <label>პროცენტი (%):</label>
    <input type="number" name="custom_tax">

    <input type="submit" value="გაგზავნა">
</form>

<?php
if (isset($_GET['name'], $_GET['lastname'], $_GET['position'], $_GET['salary'], $_GET['tax_type'])) {

    $name = htmlspecialchars($_GET['name']);
    $lastname = htmlspecialchars($_GET['lastname']);
    $position = htmlspecialchars($_GET['position']);
    $salary = (float)$_GET['salary'];
    $tax_type = $_GET['tax_type'];

    if ($tax_type == "fixed") {
        $tax_percent = 20;
    } else {
        $tax_percent = isset($_GET['custom_tax']) ? (float)$_GET['custom_tax'] : 0;
    }

    $tax_amount = $salary * ($tax_percent / 100);
    $net_salary = $salary - $tax_amount;

    echo "<table>
            <tr>
                <th>სახელი</th>
                <th>გვარი</th>
                <th>თანამდებობა</th>
                <th>ხელფასი</th>
                <th>გადასახადი (%)</th>
                <th>გადასახადი</th>
                <th>ხელზე ასაღები</th>
            </tr>
            <tr>
                <td>$name</td>
                <td>$lastname</td>
                <td>$position</td>
                <td>$salary</td>
                <td>$tax_percent%</td>
                <td>$tax_amount</td>
                <td>$net_salary</td>
            </tr>
          </table>";
}
?>

</body>
</html>