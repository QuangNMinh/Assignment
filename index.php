<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
</head>
<body>
<?php 
session_start();
include("menu.php"); 
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