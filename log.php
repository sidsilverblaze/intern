<html>
<form action="login.php" method="POST">
Username: <input type="text" name="username"><br>	
Password:  <input type="password" name="password"><br>
<input type="submit" value="login"><br>
<a href="registerer.php?il=0">register</a><br>
<a href="forgot.php">forgot password</a>
<?php 
session_start();
$_SESSION['username'] = $var_value;

?>
</form>
</html>