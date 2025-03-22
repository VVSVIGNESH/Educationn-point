<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    </head>
    <body>
        <form action="mail.php" method="POST">
        Email:
        <input type="text" name="email" placeholder="enter your mail address">
        Message:
        <input type="text" name="message" placeholder="enter the message you want to send">
        <input type="submit" value="submit">
        </form>
    </body>
</html>
<?php

require 'E:\xampp\htdocs\web\PHPMailermaster\src\Exception.php';
require 'E:\xampp\htdocs\web\PHPMailermaster\src\PHPMailer.php';
require 'E:\xampp\htdocs\web\PHPMailermaster\src\SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'educationn939@gmail.com'; // SMTP username
    $mail->Password = 'hlta pwwp tmqr hvqj'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    //Recipients
    $mail->setFrom("educationn939@gmail.com"); // Sender's email address and name
    $email=($_POST["email"]);
    $mail->addAddress($email); // Recipient's email address and name

    //Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'reset code';
    $mail->Body = "hlo abhishek";

    // Send email
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

