<?php 
$code = $_GET['q'];
$email=$_GET['u'];
 $con=mysqli_connect("localhost","root","") or die("cannot connect");
        mysqli_select_db($con,"logind") or die("can not connect to db");
        $query=mysqli_query($con,"select q from login where email='$email'");
        if(mysqli_fetch_row($query))
        {	echo "
			<form action='reset.php?q=$code&u=$email' method='POST'>
				Password:  <input type='password' name='password'><br>	
				Repassword:  <input type='password' name='repassword'><br>
				<input type='submit' value='submit'><br>
				</form>
				
    				";
        	}
        

        else 
        	echo "sorry not valid <a href='log.php'>click here to login</a>"
	 
 ?>