<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate the form fields
    if (empty($name) || empty($email) || empty($message)) {
        echo 'error: Missing required fields';
        return;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'error: Invalid email format';
        return;
    }

    // Send email
    $to = "contact@chena.pro";
    $subject = "New Contact Form Submission";
    $body = "Name: " . $name . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Message: " . $message;
    $headers = "From: " . $email;

    // Email configuration
    $mailConfig = array(
        'protocol' => 'imap',
        'host' => 'imap.barid.com',
        'port' => 993,
        'username' => 'fsd@barid.com',
        'password' => '@C4cYc6g9XHyw_v', // Replace with the actual password
        'encryption' => 'ssl',
        'smtpHost' => 'smtp.barid.com',
        'smtpPort' => 465,
        'smtpUsername' => 'fsd@barid.com',
        'smtpPassword' => '@C4cYc6g9XHyw_v', // Replace with the actual password
    );

    // Send email using the configured mail settings
    $result = sendMail($mailConfig, $to, $subject, $body, $headers);

    if ($result) {
        echo "success";
    } else {
        echo 'error: Failed to send email';
    }
}

function sendMail($mailConfig, $to, $subject, $body, $headers) {
    // Create an IMAP connection
    $imap = imap_open(
        '{' . $mailConfig['host'] . ':' . $mailConfig['port'] . '/imap/' . $mailConfig['encryption'] . '}',
        $mailConfig['username'],
        $mailConfig['password']
    );

    if (!$imap) {
        return false;
    }

    // Compose the email
    $message = "To: " . $to . "\r\n";
    $message .= "Subject: " . $subject . "\r\n";
    $message .= $headers . "\r\n\r\n";
    $message .= $body;

    // Send the email
    $sent = imap_mail($to, $subject, $message, $headers);

    // Close the IMAP connection
    imap_close($imap);

    return $sent;
}
?>
