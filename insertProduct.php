<!DOCTYPE html>
<html>
<head>
    <title>Create product</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
include("index.php"); 
 include("db.php");
    $name = $_POST["name"];
    $price = $_POST["price"];
    $data = [
        'name' => $name,
        'price' => $price
    ];
?>
    <form action="insertProduct.php" method="post">
        <h3>Create a product </h3><br>
        Product Name: <input type="text" name="name" id="pName" >
        <br>
        Price: <input type="text" name="price" id="price">
        <br>
        <input type="submit" value="Insert">
        <?php $stmt =  
        $pdo->prepare("INSERT INTO products(name, price) VALUES (:name,:price)");   
    $stmt->execute($data);
    if (!$stmt) {
        echo "<br>Can't add product, please try again";
    } else {
        echo "<br>Added successfully!";
    } ?>
    
    </form>
    
</body>
</html>
