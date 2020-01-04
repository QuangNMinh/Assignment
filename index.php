<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
session_start();
include("db.php");

    $userstr = '(Guest)';
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $userstr = "($user)";
        $loggedin = TRUE;
    } else {
        $loggedin = FALSE;
    }
    if ($loggedin) {
        include_once 'menu.php';
    } else {
        include_once 'menuguest.php';
    }
    ?>
</body>
</html>