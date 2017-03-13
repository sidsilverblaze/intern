<?php  
session_start();
if(isset($_FILES['file']))
	{
		$file = $_FILES['file'];	
		$username=$_SESSION['username'];
		$email=$_SESSION['email'];
		print_r($_SESSION);
	 //file properties
		$file_name= $file['name'];
		$date=date("Y-m-d H:i:s");
		$file_n=$file_name;
		$file_tmp=$file['tmp_name'];
		$file_size=$file['size'];
		$file_error=$file['error'];
		$file_ext=explode('.', $file_name);
		$file_ext=strtolower(end($file_ext));
		$file_name_new=$file_name.uniqid('',true) .'.'. $file_ext;
			if ($file_error===0) {
				$file_dest='uploads/'. $file_name_new;
				if (move_uploaded_file($file_tmp, $file_dest)) {
					echo " the file is stored at ".$file_dest;
					echo "click here to download <a href='$file_dest'>download</a>";
					echo "<br>";
					echo $file_n;	
					echo $date;	

					$con=mysqli_connect("localhost","root","") or die("couldnot connect");
					mysqli_select_db($con,'logind') or die("could not connect to db");
					#$query=mysqli_query($con,"INSERT INTO upload (username,email,fileloc) VALUES ('$username','$email','$file_dest')");
					$query=mysqli_query($con,"insert into uploads (username,email,filename,fileloc,time,ETA) values ('$username','$email','$file_n','$file_dest','$date','')");
					if($query)
	#echo "every thing is fine";
else
	echo "something's not right";


				}
				else
					echo "error";
			}
			else
				echo "error 1";
}

?>