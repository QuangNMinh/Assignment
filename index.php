<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
</head>
<body>
<?php include("menu.php"); 
 include("db.php");
session_start();
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
  echo '<h2>Welcome '.$_SESSION['sess_name'].'</h2>';
  echo '<h4><a href="logout.php">Logout</a></h4>';
} else { 
  header('');
  }
 ?>
</body>
</html>