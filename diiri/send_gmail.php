<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';
// Make sure you have the full PHPMailer library in phpmailer/ directory
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

    //Server settings
    $mail->isSMTP();

    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
     $mail->Username   = 'diiriamunoni@gmail.com'; // Your Gmail address
    $mail->Password   = 'your_app_password';    // Your Gmail App Password
     $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    //Recipients
     $mail->setFrom('diiriamunoni@gmail.com', 'Diiri Amunoni');
    $mail->addAddress('recipient@example.com', 'Recipient');

//Content
$mail->isHTML(true);
$mail->Subject = 'Test Email from PHPMailer';
$mail->Body    = 'This is a <b>test email</b> sent using PHPMailer via Gmail SMTP.';

try {
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
