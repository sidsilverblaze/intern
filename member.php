<?php  
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if($_SESSION['username']){
echo "welcome, ".$_SESSION['username']." !!! <br>";
echo"<a href='logout.php'>logout</a>";
echo "<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action='upload.php' method='POST' enctype='multipart/form-data'>
	<input type='file' name='file'>
	<input type='submit' name='upload'>
</form>
</body>
</html>";
}	
else{

echo "you must be logged in CLICK <a href='index.php'>HERE</a>";

}
?>
