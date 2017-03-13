<?php

// Connect to MySQL

    $username = "root";

    $password = "";

    $host = "localhost";

    $dbname = "logind";
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

try {

$conn = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

}

catch(PDOException $ex)

    {

        $msg = "Failed to connect to the database";

    }

 

// Was the form submitted?

if (isset($_POST["ForgotPassword"])) {

     

    // Harvest submitted e-mail address
/*
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

        $email = $_POST["email"];

         

    }else{

        echo "email is not valid";

        exit;

    }*/

    // Check to see if a user exists with this e-mail
     $email = $_POST["email"];
    $query = $conn->prepare('SELECT email FROM login WHERE email = :email');

    $query->bindParam(':email', $email);

   $query->execute();

    $userExists = $query->fetch(PDO::FETCH_ASSOC);

    $conn = null;

     

    if ($userExists["email"]==$email)

    {

        // Create a unique salt. This will never leave PHP unencrypted.

        $salt = rand(1000000,100000000000);

 

        // Create the unique user password reset key

        $code = hash('sha512', $salt.$userExists["email"]);

 

        // Create a url which we will direct them to reset their password

        $pwrurl = "http://localhost:1234/test/changepass.php?q=".$code;
        //save it to database
        $con=mysqli_connect("localhost","root","") or die("cannot connect");
        mysqli_select_db($con,"logind") or die("can not connect to db");
        $query=mysqli_query($con,"update login set q='$code' where email='$email'");
        
        //mew mail module
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'silverblazeabc@gmail.com';                 // SMTP username
        $mail->Password = 'sidrockp59';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to         
        $mail->setFrom('silverblazeabc@gmail.com', 'silver blaze007');
        $mail->addAddress($email, '');     // Add a recipient   
        $mail->addReplyTo('silverblazeabc@gmail.com', 'Information');
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Repassword link';
        $mailbody = "Dear user,\n\nIf this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at our website www.yoursitehere.com\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n" . $pwrurl . "\n\nThanks,\nThe Administration";

        $mail->Body    = $mailbody;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 







        // Mail them their key

        /*$mailbody = "Dear user,\n\nIf this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at our website www.yoursitehere.com\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n" . $pwrurl . "\n\nThanks,\nThe Administration";*/

        #mail($userExists["email"], "www.yoursitehere.com - Password Reset", $mailbody);

        #echo "Your password recovery key has been sent to your e-mail address.".$code;

         if(!$mail->send()) {
    var_dump($mail->send());
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    echo 'debug info'.$mail->SMTPDebug = 2;;
        } 
    else {
        echo 'Message has been sent';
        }

    }

    else

        echo "No user with that e-mail address exists.";

}

?>
