<html>
<head>
	<title>Register</title>
</head>
<body>
<?php 
if ($_GET['il']) {
	print_r("username exist");
}
elseif ($_GET['email']) {
	print_r("email exist");
}
 ?>
 <br>
<form action="register.php" method="POST">
	EMAIL: <input type="text" name="email"><br>
	USERNAME: <input type="text" name="username"><br>
	PASSWORD: <input type="password" name="password"><br>
	RETYPE 
	PASSWORD: <input type="password" name="repassword"><br>
	<input type="submit" name="submit">
</form>
</body>
</html>