<html>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<br>
<form method="post" action="login.php" >
    <fieldset class="fitContent">
        <legend>Please log in</legend>
        Username: <br>
        <input type="text" name="user" value=""/><br>
        Password : <br>
        <input type="password" name="pass" value=""/><br>
        <input type="submit" value="Login"/>
        <?php
        //get the username and password value
        include("db.php");
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        if ($user == "" || $pass == "") {
        	//error message when one of the field is not filled
        echo "<br>Not all fields was entered";
        } else {
        $data = [
        'user' => $user,
        'pass' => $pass
                ];
                //run the query
        $stmt = $pdo->prepare("select * from users where username=:user and password=:pass");   
    	$stmt->execute($data);
    	$count = $stmt->rowCount();
    	//check for correct username and pass
        if ($count == 0) {
            echo "<br>Username/Password invalid";
        } else {
            session_start();
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            header("Location: index.php"); //redirect to index.php
            die("You already log in. Please <a href='index.php'>click here</> to continue.");
        }
    }
        ?>

    </fieldset>
</form>
</body>
</html>