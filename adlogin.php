<?php 
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$password=md5($password);
if($username&&$password)
{
	$connect=mysql_connect("localhost","root","") or die("couldn't connect");
	mysql_select_db("logind") or die("can not find db");
	$query=mysql_query("select * from adlogin where username='$username' and password='$password'");
	$numrow=mysql_num_rows($query);
	if ($numrow!=0) {
		
	}
	else
		die("no such user exist");
	}		
else
die("please enter username and password"); 


?>