<?php
 require_once 'menu.php'; 
 require_once 'db.php';
     $id = $_POST["id"];
   
     $data = [
         'id' => $id
     ];
     $stmt =  
         $pdo->prepare("delete from products where id = :id");	
     $stmt->execute($data);
     echo("delete ok!");
?>