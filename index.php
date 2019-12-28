<!DOCTYPE html>
<html>
<?php require_once 'menu.php'; ?>
<body>
	<h1>Create Product </h1>
	<form action="insertProduct.php" method="post">
		Name <input type="text" name="name" >
		<br>
		Price <input type="text" name="price">
		<br>
		<input type="submit" value="Insert">
	</form>
	
</body>
</html>