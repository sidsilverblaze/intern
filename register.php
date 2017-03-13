<?php  
$username=$_POST['username'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$email=$_POST['email'];
$connect=mysqli_connect("localhost","root","aki123") or die("could not connect") ;
mysqli_select_db($connect,'clientinfo') or die("could not connect your database");
$query1=mysqli_query($connect,"SELECT * FROM login WHERE username ='$username' ");
$query2=mysqli_query($connect,"SELECT * FROM login WHERE email ='$email'");
$numrow=mysqli_num_rows($query1);
	if ($numrow!=0) {
		header("Location: http://localhost/test/registerer.php?il=3");
		exit();	
	}

$numrow1=mysqli_num_rows($query2);
	if ($numrow1!=0) {
		header("Location: http://localhost/test/registerer.php?email=3");
		exit();	
	}	
	
if($query1)
{ #echo()
	//header("Location: http://localhost/test/registerer.php?il=3");
//exit();
}

if($username&&$password&&$repassword&&$email)
{
	if($password===$repassword)
	{}
		else
			die("password and repassword do not match");
		
#$connect=mysqli_connect("localhost","root","") or die("could not connect") ;
#mysqli_select_db($connect,'logind') or die("could not connect your database");
$password=md5($password);
$query=mysqli_query($connect,"insert into login (username,password,email) values ('$username','$password','$email')");
echo "you did it <a href='log.php'>click here</a> to login";
}
else
die("enter all fields");

?>