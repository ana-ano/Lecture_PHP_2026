<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>Cars Table</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>მანქანების სია</h1>

<?php
$cars = array(
    array(
        "Make"=>"Toyota",
        "Model"=>"Corolla",
        "Color"=>"White",
        "Mileage"=>24000,
        "Status"=>"Sold"
    ),
    array(
        "Make"=>"Toyota",
        "Model"=>"Camry",
        "Color"=>"Black",
        "Mileage"=>56000,
        "Status"=>"Available"
    ),
    array(
        "Make"=>"Honda",
        "Model"=>"Accord",
        "Color"=>"White",
        "Mileage"=>15000,
        "Status"=>"Sold"
    )
);

// ცხრილის გამოტანა
echo "<table>";

// header
echo "<tr>";
echo "<th>Make</th>";
echo "<th>Model</th>";
echo "<th>Color</th>";
echo "<th>Mileage</th>";
echo "<th>Status</th>";
echo "</tr>";

// მონაცემები
foreach ($cars as $car) {
    echo "<tr>";
    echo "<td>".$car["Make"]."</td>";
    echo "<td>".$car["Model"]."</td>";
    echo "<td>".$car["Color"]."</td>";
    echo "<td>".$car["Mileage"]."</td>";
    echo "<td>".$car["Status"]."</td>";
    echo "</tr>";
}

echo "</table>";
?>

</div>

</body>
</html>