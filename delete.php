<?php
 include("menu.php"); 
 include("db.php");
     $id = $_POST["id"];
   
     $data = [
         'id' => $id
     ];
     $stmt =  
         $pdo->prepare("delete from products where id = :id");	
     $stmt->execute($data);
     echo("delete ok!Please <a href='index.php'>click here</> to continue");
?>