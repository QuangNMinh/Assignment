<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<?php
    require_once 'menu.php'; 
    require_once 'db.php';    
    $name = $_POST["name"];
    $price = $_POST["price"];
    $data = [
        'name' => $name,
        'price' => $price
    ];
    
    
 
?>

<body>
<h1>Create Product </h1>
    <form action="insertProduct.php" method="post">
        <div class="error"><?php echo $error; ?></div>
        <div class="msg"><?php echo $msg; ?></div>
        Product Name: <input type="text" name="name" >
        <br>
        Price: <input type="text" name="price">
        <br>
        <input type="submit" value="Insert">
        <?php $stmt =  
        $pdo->prepare("INSERT INTO products(name, price) VALUES (:name,:price)");   
    $stmt->execute($data);
    if (!$stmt) {
        $error = $error . "<br>Can't add product, please try again";
    } else {
        $msg = "Added successfully!";
    } ?>
    </form>
    
</body>
</html>
