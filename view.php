<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Product management</title>
</head>
<body>
    <?php
    include("index.php"); 
 include("db.php");
        $sql = "select * from products";
        //compile the sql
        $stmt = $pdo->prepare($sql);
        //execute the query on the server and return the result set
       
    ?>
    <br>
    <table class="tbl">
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Price</th>
    </tr>
        <?php
         $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
            foreach ($resultSet as $row) {
                echo 
                "<tr> 
                <td>$row[id] </td>
                <td>$row[name] </td>
                <td>$row[price] </td>";
            }
        ?>
        <td>
         <form class="frminline" action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row[id] ?>" />
                <input type="submit" value="Delete" />
            </form>
        </td>
        <?php echo "</tr>"; ?>
</body>
</html>