<?php
require_once 'db.php'; 
session_start();

$msg = ""; 
if(isset($_POST['submitBtnLogin'])) {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  if($username != "" && $password != "") {
    try {
      $query = "select * from `users` where `username`=:username and `password`=:password";
      $stmt = $db->prepare($query);
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        /******************** Your code ***********************/
        $_SESSION['sess_user_id']   = $row['uid'];
        $_SESSION['sess_user_name'] = $row['username'];
        $_SESSION['sess_name'] = $row['name'];
       
      } else {
        $msg = "Invalid username and password!";
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    $msg = "Both fields are required!";
  }
}
?>
<html>
<body>
<br>
<form method="post" action="login.php">
    <fieldset class="fitContent">
        <legend>Please login</legend>
        Username: <br>
        <input type="text" name="user" value="<?php echo $user; ?>"/><br>
        Password : <br>
        <input type="password" name="pass" value="<?php echo $pass; ?>"/><br>
        <input type="submit" value="Login"/>
    </fieldset>
</form>
</body>
</html>