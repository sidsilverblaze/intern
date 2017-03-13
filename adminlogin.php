<?php  
session_start();
error_reporting(E_ALL & ~E_NOTICE);

if($_SESSION['username'])
{}
else 
die("<h3>you cannot enter</h3>");
echo "<h3>Downloads<br>";

$username=$_SESSION['username'];
$con=mysqli_connect("localhost","root","") or die("cannot connect");
mysqli_select_db($con,"logind") or die("can not connect to db");
$query=mysqli_query($con,"select * from uploads");
if($username==="abc3"){	
while($row=mysqli_fetch_assoc($query))
{
	$username1=$row['username'];
	$download=$row['fileloc'];
	echo " username: ".$username1. "-> download_link:<a href='$download'>'$download'</a><br>";

}
echo "<a href='logout.php'>click here to logout</a> ";
}
else
die("you cannot enter");
?>