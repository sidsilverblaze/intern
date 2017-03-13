<?php  
session_start();
session_destroy();
echo "you have been logged out <br>";
echo "click <a href='log.php'>here</a> to return";
?>