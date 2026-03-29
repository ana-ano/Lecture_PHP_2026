<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>დავალება1_1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="get">
        <label >სახელი:</label>
        <input type="text" name="name" required>
        <label >გვარი:</label>
        <input type="text" name="lastname" required>
        <label >თანამდებობა:</label>
        <input type="text" name="position" required>
        <label > ხელფასი:</label>
        <input type="number" name="salary" required>
        <label> გადასახადის ტიპი:</label>
        <input type="radio " name="tax_type" value="fixed" required>20%
        <input type="radio " name="tax_type" value="costum" >სხვა
        <label > პროცენტი:</label>
        <input type="number" name="custom_tax">
        
        <input type="submit" value ="გაგზაზვნა">






    </form>
    
</body>
</html>