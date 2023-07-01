<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

// Outlook SMTP server settings
$smtp_server = 'smtp.office365.com';
$smtp_port = 587;
$smtp_username = 'ncrcho@outlook.com';  // Replace with your Outlook email address
$smtp_password = 'Lwrnc11411488oojEzz';  // Replace with your Outlook email password

$sender_email = 'ncrcho@outlook.com';  // Replace with your Outlook email address
$receiver_email = 'ncrcho@gmail.com';  // Replace with the recipient's email address
$subject = "ChenaClient: " . $_POST['subject'];


$postData = $_POST;

// Convert $_POST array to string format
$postString = '';
foreach ($postData as $key => $value) {
    $postString .= $key . ' : ' . $value . "\n";
}

// echo $postString;




$message = $postString;
// $postString = implode("\n", $postData);

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Set the SMTP server details
    $mail->isSMTP();
    $mail->Host = $smtp_server;
    $mail->Port = $smtp_port;
    $mail->SMTPAuth = true;
    $mail->Username = $smtp_username;
    $mail->Password = $smtp_password;
    $mail->SMTPSecure = 'tls';

    // Set the sender and recipient email addresses
    $mail->setFrom($sender_email);
    $mail->addAddress($receiver_email);

    // Set the email subject and body
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send the email
    $mail->send();
    echo 'Thank you for your message. It has been sent.';
} catch (Exception $e) {
    echo 'Error sending email: ' . $mail->ErrorInfo;
}
?>
