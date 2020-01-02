<html>
<body>
<?php 
 include("db.php");
$error = $user = $pass = "";
if (isset($_POST['user'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if ($user == "" || $pass == "") {
        $error = "Not all fields was entered";
    } else {
    	$data = [
        'name' => $name,
        'password' => $pass
    ];
       $stmt =  
        $pdo->prepare("SELECT * FROM users WHERE username = '$user' AND password = '$pass' AND status='1'");
        $stmt->execute($data);
        if ($stmt->num_rows == 0) {
            $error = "Username/Password invalid";
        } else {
            session_start();
            $_SESSION['uid'] = mysqli_fetch_array($stmt)[0];
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            header("Location: index.php"); //redirect to index.php
            die("You already log in. Please <a href='index.php'>click here</> to continue.");
        }
    }
}

?>

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