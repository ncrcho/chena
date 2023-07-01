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
    $to = "ncrcho@gmail.com";
    $subject = "New Contact Form Submission";
    $body = "Name: " . $name . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Message: " . $message;
    $headers = "From: " . $email;

    $result = mail($to, $subject, $body, $headers);
    echo $result;
    if ($result) {
        echo "success";
    } else {
        echo 'error: Failed to send email';
    }
}
?>
