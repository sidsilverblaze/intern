 <?php  
 session_start();
#error_reporting(E_ALL & ~E_NOTICE);
 
if($_SESSION['username'])
{}
else 
die("<h3>you cannot enter</h3>");
#echo "<h3>Downloads<br>";
$user=$_GET['u'];
$eta=$_POST['eta'];
$file=$_GET['f'];
#$username=$_SESSION['username'];
$con=mysqli_connect("localhost","root","") or die("cannot connect");
mysqli_select_db($con,"logind") or die("can not connect to db");
 $query=mysqli_query($con,"UPDATE uploads set ETA='$eta' WHERE username='$user'AND filename='$file'");
 if($query)
header("Location: http://localhost:1234/test/adtest.php");
else{
	echo $user;
	echo $file;
	echo $eta;
	echo "somethin";
}
?>
